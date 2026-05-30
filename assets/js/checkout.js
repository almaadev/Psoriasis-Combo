/**
 * Checkout Controller Script
 * Handles state populating, progressive form revealing, blur-triggered customer lookup,
 * multiple-address prompt dialogs, Razorpay secure window initialization, and COD/Online checkout redirects.
 */
document.addEventListener("DOMContentLoaded", function () {

    // ─────────────────────────────────────────────
    // CONFIG
    // ─────────────────────────────────────────────
    const API_URL = window.API_URL || "https://almaherbal.top/Staging-App/api.php";

    // ─────────────────────────────────────────────
    // fetchJson: safe wrapper – never throws unhandled
    // ─────────────────────────────────────────────
    async function fetchJson(url, options = {}) {
        const res = await fetch(url, options);
        const text = await res.text();
        try {
            return JSON.parse(text);
        } catch (e) {
            console.error("fetchJson parse error for", url, ":", text);
            throw new Error("Invalid JSON response from server.");
        }
    }

    // ─────────────────────────────────────────────
    // STATE
    // ─────────────────────────────────────────────
    let fetchedCustomerId = null;   // set when auto-fill finds a customer
    let selectedAddressId = null;   // set when user selects/auto-fills an address

    // ─────────────────────────────────────────────
    // 1. STATE DROPDOWN
    // ─────────────────────────────────────────────
    const stateSelect = document.getElementById("state");
    const states = [
        "Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
        "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli and Daman and Diu", "Delhi", "Goa",
        "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka",
        "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur",
        "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan",
        "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand",
        "West Bengal", "Other"
    ];

    if (stateSelect) {
        while (stateSelect.options.length > 1) stateSelect.remove(1);
        states.forEach(st => {
            const o = document.createElement("option");
            o.value = st;
            o.text = st;
            stateSelect.add(o);
        });
        stateSelect.addEventListener("change", updateCheckoutSummary);
    }

    // ─────────────────────────────────────────────
    // 2. PRODUCT DATA & QUANTITY (API + localStorage)
    // ─────────────────────────────────────────────
    let landingProduct = {};
    let qty = 1;

    async function initProduct() {
        try {
            // Check if product details are passed in the URL parameters first
            const params = new URLSearchParams(window.location.search);
            const urlProduct = params.get('product');
            const urlPrice = parseFloat(params.get('price'));

            if (urlProduct && !isNaN(urlPrice)) {
                landingProduct.id = window.PRODUCT_ID || 96;
                let decodedName = decodeURIComponent(urlProduct);
                if (decodedName.toUpperCase() === 'PSORIATIC COMBO') {
                    decodedName = 'Almaa Psoriasis Combo';
                }
                landingProduct.name = decodedName;
                landingProduct.price = urlPrice;
                landingProduct.unit = "";
                console.log("Product data loaded from URL params:", landingProduct);
            } else {
                // Try to fetch from API first to get latest details
                const productId = window.PRODUCT_ID || 96;
                const response = await fetch(`${API_URL}?gofor=productdetail&product_id=${productId}`);
                const data = await response.json();

                if (data && data.product_details && data.product_details[0]) {
                    const product = data.product_details[0];
                    const attr = data.product_attributes ? data.product_attributes[0] : {};

                    landingProduct.id = product.product_id;
                    landingProduct.name = product.product_name;
                    landingProduct.price = parseFloat(attr.selling_price) || 2884.00;
                    landingProduct.unit = attr.prod_attri_id || "";

                    console.log("Product data fetched from API:", landingProduct);
                } else {
                    throw new Error("Invalid API response");
                }
            }
        } catch (e) {
            console.error("Error fetching product from API, using local storage fallback:", e);
            let lpData = localStorage.getItem("landingProduct") || localStorage.getItem("checkout_product");
            if (lpData === "undefined" || lpData === "null") lpData = null;
            landingProduct = JSON.parse(lpData || "{}");

            if (!landingProduct.id || isNaN(landingProduct.id)) {
                landingProduct.id = window.PRODUCT_ID || 96;
                if (!landingProduct.name) landingProduct.name = "Psoriasis Care Combo";
                if (!landingProduct.price) landingProduct.price = 2884.00;
            }
        }

        // Handle quantity
        const params = new URLSearchParams(window.location.search);
        const urlQty = parseInt(params.get('qty'));

        qty = (urlQty && urlQty > 0) ? urlQty : (parseInt(landingProduct.qty) || 1);
        if (qty > 10) qty = 10;
        if (qty < 1) qty = 1;

        landingProduct.qty = qty;
        updateCheckoutSummary();
    }

    initProduct();

    // Customizable state-specific shipping charges mapping
    // Default charge is 50, but states in this map can have custom charges
    const shippingChargesByState = {
        "Tamil Nadu": 50,
        // "Kerala": 60,
        // "Karnataka": 60,
        // "Andhra Pradesh": 70,
        // "Delhi": 80
        // You can add more states and custom rates here
    };

    // Shipping logic
    function calculateShipping(state) {
        if (!state) return 50; // default if state is not selected yet
        return shippingChargesByState[state] !== undefined ? shippingChargesByState[state] : 50;
    }

    // Update order summary UI
    function updateCheckoutSummary() {
        const price = parseFloat(landingProduct.price) || 0;
        const stateVal = stateSelect ? stateSelect.value : "";
        const shipping = calculateShipping(stateVal);
        const subtotal = price * qty;
        const total = subtotal + shipping;

        const elName = document.getElementById("order-item-name");
        if (elName) elName.innerText = landingProduct.name || "Product";

        const elPrice = document.getElementById("item-price");
        if (elPrice) elPrice.innerText = subtotal.toFixed(2); // In original, item-price shows "unitPrice * qty"

        const elQty = document.getElementById("qty-input");
        if (elQty) elQty.value = qty;

        const elShipping = document.getElementById("shipping-cost");
        if (elShipping) elShipping.innerText = shipping.toFixed(2);

        const elTotal = document.getElementById("total-price");
        if (elTotal) elTotal.innerText = total.toFixed(2);
    }

    // Qty +/- buttons
    window.adjustCheckoutQty = function (change) {
        qty += change;
        if (qty < 1) qty = 1;
        if (qty > 10) {
            qty = 10;
            alert("You can only add up to 10 items.");
        }
        landingProduct.qty = qty;
        localStorage.setItem("landingProduct", JSON.stringify(landingProduct));
        updateCheckoutSummary();
    };

    const qtyMinus = document.getElementById("qty-minus");
    const qtyPlus = document.getElementById("qty-plus");

    if (qtyMinus) {
        qtyMinus.addEventListener("click", function (e) {
            e.preventDefault();
            window.adjustCheckoutQty(-1);
        });
    }

    if (qtyPlus) {
        qtyPlus.addEventListener("click", function (e) {
            e.preventDefault();
            window.adjustCheckoutQty(1);
        });
    }

    // Payment Method Selection Logic
    const paymentOptions = document.querySelectorAll('.payment-option');

    paymentOptions.forEach(option => {
        option.addEventListener('click', function () {
            paymentOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
        });
    });

    updateCheckoutSummary();

    // ─────────────────────────────────────────────
    // 3. PROGRESSIVE DISCLOSURE
    // ─────────────────────────────────────────────
    const hiddenFields = document.getElementById("hidden-fields");
    const emailInput = document.getElementById("email");
    const mobileInput = document.getElementById("phone");

    function revealAddressFields() {
        if (hiddenFields) hiddenFields.style.display = "block";
    }

    // ─────────────────────────────────────────────
    // Address overlay helpers
    // ─────────────────────────────────────────────
    function openAddressModal() {
        const overlay = document.getElementById("addressModal");
        if (overlay) {
            overlay.classList.add("open");
            overlay.setAttribute("aria-hidden", "false");
            document.body.style.overflow = "hidden";
        }
    }

    function closeAddressModal() {
        const overlay = document.getElementById("addressModal");
        if (overlay) {
            overlay.classList.remove("open");
            overlay.setAttribute("aria-hidden", "true");
            document.body.style.overflow = "";
        }
    }

    // Wire close & cancel buttons
    const addrCloseBtn = document.getElementById("addr-close-btn");
    const addrCancelBtn = document.getElementById("addr-cancel-btn");
    if (addrCloseBtn) addrCloseBtn.addEventListener("click", closeAddressModal);
    if (addrCancelBtn) addrCancelBtn.addEventListener("click", closeAddressModal);

    // Close on backdrop click
    const addressModalEl = document.getElementById("addressModal");
    if (addressModalEl) {
        addressModalEl.addEventListener("click", function (e) {
            if (e.target === this) closeAddressModal();
        });
    }

    // Email validation
    if (emailInput) {
        emailInput.addEventListener("input", function () {
            const emailVal = emailInput.value.trim();
            if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                revealAddressFields();
            }
        });
    }

    // Mobile validation
    if (mobileInput) {
        mobileInput.addEventListener("input", function () {
            const mobileVal = mobileInput.value.trim();
            if (/^\d{10}$/.test(mobileVal)) {
                revealAddressFields();
            }
        });
    }

    // ─────────────────────────────────────────────
    // 4. AUTO-FILL: blur on email / mobile
    // ─────────────────────────────────────────────

    // Populates form fields from an address+customer object
    function populateAddress(addr) {
        const set = (id, val) => {
            const el = document.getElementById(id);
            if (el) el.value = val || "";
        };
        set("door-no", addr.doorno);
        set("street", addr.street);
        set("location", addr.location);
        set("city", addr.city);
        set("pincode", addr.pincode);

        if (stateSelect && addr.state) {
            // Try to select matching state option
            for (let i = 0; i < stateSelect.options.length; i++) {
                if (stateSelect.options[i].value === addr.state) {
                    stateSelect.selectedIndex = i;
                    break;
                }
            }
            updateCheckoutSummary();
        }

        selectedAddressId = addr.address_id || addr.id || null;
        if (!selectedAddressId) console.warn("Address auto-fill: address_id missing in response");
    }

    function isTemporaryEmail(email, mobile) {
        if (!email || !mobile) return false;
        return email.trim().toLowerCase() === `${mobile.trim()}@gmail.com`;
    }

    // Locks customer fields after auto-fill (prevents customer mismatch)
    function lockCustomerFields(isTempEmail = false) {
        const fn = document.getElementById("f-name");
        const ln = document.getElementById("l-name");
        const em = document.getElementById("email");
        if (fn) { fn.readOnly = true; fn.classList.add("autofill-locked"); fn.style.backgroundColor = '#e9ecef'; fn.style.opacity = '0.7'; fn.style.cursor = 'not-allowed'; }
        if (ln) { ln.readOnly = true; ln.classList.add("autofill-locked"); ln.style.backgroundColor = '#e9ecef'; fn.style.opacity = '0.7'; fn.style.cursor = 'not-allowed'; }
        if (em) {
            if (isTempEmail) {
                em.readOnly = false; em.classList.remove("autofill-locked"); em.style.backgroundColor = ''; em.style.opacity = ''; em.style.cursor = '';
            } else {
                em.readOnly = true; em.classList.add("autofill-locked"); em.style.backgroundColor = '#e9ecef'; em.style.opacity = '0.7'; em.style.cursor = 'not-allowed';
            }
        }
    }

    // Unlocks customer fields (called when user manually edits email/mobile)
    function unlockCustomerFields() {
        const fn = document.getElementById("f-name");
        const ln = document.getElementById("l-name");
        const em = document.getElementById("email");
        if (fn) { fn.readOnly = false; fn.classList.remove("autofill-locked"); fn.style.backgroundColor = ''; fn.style.opacity = ''; fn.style.cursor = ''; }
        if (ln) { ln.readOnly = false; ln.classList.remove("autofill-locked"); fn.style.backgroundColor = ''; fn.style.opacity = ''; fn.style.cursor = ''; }
        if (em) { em.readOnly = false; em.classList.remove("autofill-locked"); em.style.backgroundColor = ''; em.style.opacity = ''; em.style.cursor = ''; }
    }

    // Fetch customer by ID and populate fields
    async function fetchAndPopulateCustomer(customerId) {
        try {
            const data = await fetchJson(`${API_URL}?gofor=customersget&customer_id=${encodeURIComponent(customerId)}`);
            if (data) {
                const fn = document.getElementById("f-name");
                const ln = document.getElementById("l-name");
                const em = document.getElementById("email");
                const mo = document.getElementById("phone");

                if (fn) fn.value = data.first_name || data.fname || "";
                if (ln) ln.value = data.last_name || data.lname || "";
                
                const fetchedEmail = data.email || "";
                const currentMobile = (mo ? mo.value.trim() : "") || (data.mobilenumber || data.phone || "");

                const isTemp = isTemporaryEmail(fetchedEmail, currentMobile);

                // If backend returns an official email (not temp), autofill
                if (fetchedEmail && !isTemp) {
                    if (em) em.value = fetchedEmail;
                } else {
                    // If backend email is temporary, only autofill if empty
                    if (em && !em.value) em.value = fetchedEmail;
                }

                lockCustomerFields(isTemp);

                if (mo && !mo.value) mo.value = data.mobilenumber || data.phone || "";

                fetchedCustomerId = customerId;
            }
        } catch (err) {
            console.error("fetchAndPopulateCustomer error:", err);
        }
    }

    // Handle address list response (0, 1, or many)
    function handleAddressList(addresses) {
        if (!Array.isArray(addresses) || addresses.length === 0) {
            // No match – user fills manually
            return;
        }

        if (addresses.length === 1) {
            // Exactly 1 match – auto-fill silently
            populateAddress(addresses[0]);
            revealAddressFields();
            if (addresses[0].customer_id) {
                fetchAndPopulateCustomer(addresses[0].customer_id);
            }
            return;
        }

        // Multiple matches – show custom overlay
        const container = document.getElementById("address-list-container");
        if (!container) return;

        container.innerHTML = "";
        addresses.forEach((addr) => {
            const card = document.createElement("button");
            card.type = "button";
            card.className = "addr-card";
            card.innerHTML = `
                <div class="addr-card-line1">${addr.doorno || ""}, ${addr.street || ""}</div>
                <div class="addr-card-line2">${addr.city || ""}, ${addr.state || ""} &ndash; ${addr.pincode || ""}</div>
            `;
            card.addEventListener("click", function () {
                populateAddress(addr);
                revealAddressFields();
                if (addr.customer_id) {
                    fetchAndPopulateCustomer(addr.customer_id);
                }
                closeAddressModal();
            });
            container.appendChild(card);
        });

        // Option to enter a new address
        const newBtn = document.createElement("button");
        newBtn.type = "button";
        newBtn.className = "addr-new-btn";
        newBtn.textContent = "+ Use a different address";
        newBtn.addEventListener("click", function () {
            selectedAddressId = null;
            closeAddressModal();
        });
        container.appendChild(newBtn);

        openAddressModal();
    }

    // Trigger auto-fill on blur
    async function triggerAutoFill(type, value) {
        try {
            const param = type === "email"
                ? `email=${encodeURIComponent(value)}`
                : `mobilenumber=${encodeURIComponent(value)}`;

            const data = await fetchJson(`${API_URL}?gofor=addresslist_by_contact&${param}`);

            // API may return array directly or under a key
            const list = Array.isArray(data) ? data : (data?.addresses || data?.data || []);
            handleAddressList(list);
        } catch (err) {
            console.error("triggerAutoFill error:", err);
            // Fail silently – user fills manually
        }
    }

    if (emailInput) {
        emailInput.addEventListener("blur", function () {
            const emailVal = emailInput.value.trim();
            const mobileVal = mobileInput ? mobileInput.value.trim() : "";
            if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal) && !isTemporaryEmail(emailVal, mobileVal)) {
                triggerAutoFill("email", emailVal);
            }
        });
    }

    if (mobileInput) {
        mobileInput.addEventListener("blur", function () {
            const mobileVal = mobileInput.value.trim();
            const emailVal = emailInput ? emailInput.value.trim() : "";
            if (/^\d{10}$/.test(mobileVal)) {
                if (emailVal === "" || isTemporaryEmail(emailVal, mobileVal)) {
                    triggerAutoFill("mobile", mobileVal);
                }
            }
        });
    }

    // Reset fetchedCustomerId when email or mobile changes
    if (emailInput) {
        emailInput.addEventListener("change", function () {
            fetchedCustomerId = null;
            unlockCustomerFields();
        });
    }
    if (mobileInput) {
        mobileInput.addEventListener("change", function () {
            fetchedCustomerId = null;
            unlockCustomerFields();
        });
    }

    // Watch address fields – reset selectedAddressId if user edits
    ["door-no", "street", "location", "city", "pincode"].forEach(fieldId => {
        const el = document.getElementById(fieldId);
        if (el) {
            el.addEventListener("input", function () {
                selectedAddressId = null;
            });
        }
    });
    if (stateSelect) {
        stateSelect.addEventListener("change", function () {
            selectedAddressId = null;
            updateCheckoutSummary();
        });
    }

    // ─────────────────────────────────────────────
    // 5. PLACE ORDER
    // ─────────────────────────────────────────────
    // Robust extraction helpers for API responses
    const getCustomerId = (cust) => {
        if (!cust) return null;
        if (typeof cust === 'string' || typeof cust === 'number') return cust;
        if (Array.isArray(cust) && cust[0]) return getCustomerId(cust[0]);
        return cust.customer_id || cust.id || (cust.data && (cust.data.customer_id || cust.data.id));
    };

    const getAddressId = (addr) => {
        if (!addr) return null;
        if (typeof addr === 'string' || typeof addr === 'number') return addr;
        if (Array.isArray(addr) && addr[0]) return getAddressId(addr[0]);
        return addr.address_id || addr.id || (addr.data && (addr.data.address_id || addr.data.id));
    };

    const getOrderId = (order) => {
        if (!order) return null;
        if (typeof order === 'string' || typeof order === 'number') return order;
        if (Array.isArray(order) && order[0]) return getOrderId(order[0]);
        return order.order_id || order.orderid || order.id || (order.data && (order.data.order_id || order.data.id || order.data.orderid));
    };

    function validateCheckoutForm() {
        // Helper to set error
        function setError(el, msg) {
            if (el) {
                el.style.border = "2px solid #dc3545"; // Red border
                el.focus();
            }
            alert(msg);
            return false;
        }

        // Helper to clear errors
        function clearError(el) {
            if (el) el.style.border = "";
        }

        const mobileInput = document.getElementById("phone");
        const emailInput = document.getElementById("email");
        const fnameInput = document.getElementById("f-name");
        const lnameInput = document.getElementById("l-name");
        const doorInput = document.getElementById("door-no");
        const streetInput = document.getElementById("street");
        const locationInput = document.getElementById("location");
        const cityInput = document.getElementById("city");
        const stateSelect = document.getElementById("state");
        const pincodeInput = document.getElementById("pincode");

        // Clear all previous errors
        [mobileInput, emailInput, fnameInput, lnameInput, doorInput, streetInput, locationInput, cityInput, stateSelect, pincodeInput].forEach(clearError);

        // 1. Mobile validation (exactly 10 digits, starts with 6,7,8,9)
        const mobileVal = mobileInput ? mobileInput.value.trim() : "";
        if (!/^[6-9]\d{9}$/.test(mobileVal)) {
            return setError(mobileInput, "Please enter a valid 10 digit Indian mobile number.");
        }

        // 2. Email validation (Optional but must be valid if entered)
        const emailVal = emailInput ? emailInput.value.trim() : "";
        if (emailVal !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
            return setError(emailInput, "Please enter a valid email address.");
        }

        // 3. First Name (min 2, alphabets + spaces)
        const fnameVal = fnameInput ? fnameInput.value.trim() : "";
        if (!/^[a-zA-Z\s]{2,}$/.test(fnameVal)) {
            return setError(fnameInput, "Please enter your first name.");
        }

        // 4. Last Name (min 1, alphabets + spaces)
        const lnameVal = lnameInput ? lnameInput.value.trim() : "";
        if (!/^[a-zA-Z\s]{1,}$/.test(lnameVal)) {
            return setError(lnameInput, "Please enter your last name.");
        }

        // 5. Door Number
        const doorVal = doorInput ? doorInput.value.trim() : "";
        if (doorVal === "") {
            return setError(doorInput, "Please enter your door number.");
        }

        // 6. Street
        const streetVal = streetInput ? streetInput.value.trim() : "";
        if (streetVal.length < 3) {
            return setError(streetInput, "Please enter your street name (minimum 3 characters).");
        }

        // 6.5 Location
        const locationVal = locationInput ? locationInput.value.trim() : "";
        if (locationVal.length < 3) {
            return setError(locationInput, "Please enter your location (minimum 3 characters).");
        }

        // 7. City
        const cityVal = cityInput ? cityInput.value.trim() : "";
        if (!/^[a-zA-Z\s]+$/.test(cityVal)) {
            return setError(cityInput, "Please enter a valid city name (alphabets only).");
        }

        // 8. State
        const stateVal = stateSelect ? stateSelect.value.trim() : "";
        if (stateVal === "") {
            return setError(stateSelect, "Please select your state.");
        }

        // 9. Pincode
        const pincodeVal = pincodeInput ? pincodeInput.value.trim() : "";
        if (!/^\d{6}$/.test(pincodeVal)) {
            return setError(pincodeInput, "Please enter a valid 6 digit pincode.");
        }

        // 10. Payment Method
        const activePaymentOption = document.querySelector('.payment-option.active');
        if (!activePaymentOption) {
            alert("Please select a payment method.");
            return false;
        }
        const paymentMethod = activePaymentOption.getAttribute('data-method');
        if (paymentMethod !== "online" && paymentMethod !== "cod") {
            alert("Invalid payment method selected.");
            return false;
        }

        // 11. QTY Validation
        const currentQty = parseInt(qty) || 1;
        if (currentQty < 1 || currentQty > 10) {
            alert("Quantity must be between 1 and 10.");
            return false;
        }

        return true;
    }

    const cmdPlaceOrderEl = document.getElementById("cmd-place-order");
    if (cmdPlaceOrderEl) {
        cmdPlaceOrderEl.addEventListener("click", async function (e) {
            e.preventDefault();
            const btn = this;

            // Run robust validation before processing
            if (!validateCheckoutForm()) {
                return;
            }

            // Step 1: Prevent duplicate submission
            if (btn.dataset.processing === 'true') return;
            btn.dataset.processing = 'true';

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

            try {
                // Step 2: Normalize inputs
                const mobileInput = document.getElementById("phone");
                const emailInput = document.getElementById("email");
                const mobile = mobileInput.value.replace(/\D/g, '');
                const normalizedMobile = mobile;
                const originalEmail = emailInput.value.trim().toLowerCase();

                const razorpayEmail =
                    originalEmail && originalEmail.trim() !== ''
                        ? originalEmail
                        : normalizedMobile + '@gmail.com';

                const email = razorpayEmail;

                const fname = document.getElementById("f-name")?.value.trim() || "";
                const lname = document.getElementById("l-name")?.value.trim() || "";
                const door = document.getElementById("door-no")?.value.trim() || "";
                const street = document.getElementById("street")?.value.trim() || "";
                const location = document.getElementById("location")?.value.trim() || "";
                const city = document.getElementById("city")?.value.trim() || "";
                const state = document.getElementById("state")?.value.trim() || "";
                const pincode = document.getElementById("pincode")?.value.trim() || "";

                const activePaymentOption = document.querySelector('.payment-option.active');
                const paymentMethod = activePaymentOption ? activePaymentOption.getAttribute('data-method') : 'cod';
                const paymentSelected = paymentMethod === "online" ? "OnlinePayment" : "COD";

                const price = parseFloat(landingProduct.price) || 0;
                const shipping = calculateShipping(state);
                const subtotal = price * qty;
                const total = subtotal + shipping;

                // Step 3: Check existing customer
                let customerId = fetchedCustomerId;

                if (!customerId) {
                    const list = await fetchJson(`${API_URL}?gofor=customerslist`);
                    const existing = (Array.isArray(list) ? list : []).find(c => (c.mobilenumber || '').trim() === mobile);
                    if (existing) {
                        customerId = getCustomerId(existing);
                    }
                }

                // Step 4: Create customer if not exists
                if (!customerId) {
                    const last4 = mobile.slice(-4);
                    const password = `almaa${last4}`;

                    const cust = await fetchJson(`${API_URL}?gofor=landingcustomersadd`, {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({
                            first_name: fname,
                            last_name: lname,
                            email: email,
                            mobilenumber: mobile,
                            password: password
                        })
                    });

                    customerId = getCustomerId(cust);
                    if (customerId) {
                        localStorage.setItem('guest_password', password);
                    }
                }

                // Step 5: Fallback lookup
                if (!customerId) {
                    const list = await fetchJson(`${API_URL}?gofor=customerslist`);
                    const fallback = (Array.isArray(list) ? list : []).find(c => c.email === email || (c.mobilenumber || '').trim() === mobile);
                    if (fallback) {
                        customerId = getCustomerId(fallback);
                    }
                }

                if (!customerId) {
                    throw new Error("Customer creation failed. Please check your details and try again.");
                }

                if (customerId && razorpayEmail) {
                    try {
                        await fetchJson(`${API_URL}?gofor=updatecontact`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                customer_id: customerId,
                                email: razorpayEmail,
                                mobilenumber: normalizedMobile
                            })
                        });

                        console.log('Customer contact details updated successfully');
                    } catch (err) {
                        console.error('Customer contact update failed:', err);
                    }
                }

                // Step 6: Address handling
                let addressId = selectedAddressId;

                if (!addressId) {
                    const addr = await fetchJson(`${API_URL}?gofor=landingaddaddress`, {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({
                            doorno: door,
                            street,
                            location,
                            city,
                            state,
                            pincode,
                            customer_id: customerId
                        })
                    });

                    addressId = getAddressId(addr);
                    if (!addressId) throw new Error("Address creation failed.");
                }

                // Step 7: Order creation
                const finalEmail = razorpayEmail;

                const orderPayload = {
                    customer_id: customerId,
                    address_id: addressId,
                    product_details: [{
                        product_id: landingProduct.id || "",
                        product_name: landingProduct.name || "",
                        prod_attri_id: landingProduct.unit || "",
                        amount: price,
                        quantity: qty
                    }],
                    fullquantity: qty,
                    invoice_amount: subtotal,
                    delivery_charge: shipping,
                    discount_amount: 0,
                    total_amount: total,
                    payment_mode: paymentSelected,
                    email: finalEmail,
                    mobilenumber: normalizedMobile
                };

                const order = await fetchJson(`${API_URL}?gofor=landingcreateorders`, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(orderPayload)
                });

                const orderId = getOrderId(order);
                if (!orderId) throw new Error("Order creation failed.");

                // Payment handling
                if (paymentSelected === "COD") {
                    const isNewCustomer = localStorage.getItem('guest_password') ? 1 : 0;

                    // Store invoice details in sessionStorage for seamless invoice generation
                    const invoiceData = {
                        name: fname + " " + lname,
                        email: email,
                        phone: mobile,
                        address: `${door}, ${street}, ${city}, ${state} - ${pincode}`,
                        product: landingProduct.name || "Psoriasis Care Combo",
                        qty: qty,
                        price: price,
                        shipping: shipping,
                        payment: paymentSelected
                    };
                    sessionStorage.setItem('last_order_invoice', JSON.stringify(invoiceData));

                    localStorage.clear();
                    fetch("session.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ order_id: orderId })
                    })
                        .then(res => res.json())
                        .then(data => {
                            window.location.href = "thankyou.php?new=" + isNewCustomer;
                        })
                        .catch(() => {
                            window.location.href = "thankyou.php?new=" + isNewCustomer;
                        });
                    return;
                }

                // Online Payment
                const razorData = await fetchJson(`${API_URL}?gofor=razorpay_test_handler`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        customer_id: customerId,
                        order_id: orderId,
                        email: razorpayEmail,
                        mobilenumber: normalizedMobile
                    })
                });

                if (!razorData?.order_id || !razorData?.razorpay_key) {
                    throw new Error("Razorpay initialisation failed.");
                }

                const options = {
                    key: razorData.razorpay_key,
                    amount: Math.round(total * 100),
                    currency: "INR",
                    name: "ALMAA HERBAL",
                    image: "https://almaherbal.com/product/ulcer-combo/lp-1/assets/img/logo.png",
                    description: `Order #${orderId}`,
                    order_id: razorData.order_id,
                    prefill: {
                        name: fname + " " + lname,
                        email: email,
                        contact: mobile
                    },
                    handler: async function (response) {
                        try {
                            await fetchJson(`${API_URL}?gofor=razorpay_test_handler`, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({
                                    customer_id: customerId,
                                    order_id: orderId,
                                    email: razorpayEmail,
                                    mobilenumber: normalizedMobile,
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    razorpay_order_id: response.razorpay_order_id,
                                    razorpay_signature: response.razorpay_signature
                                })
                            });

                            const confirmUrl = `${API_URL}?gofor=confirmorder&order_id=${orderId}&razorpay_payment_id=${encodeURIComponent(response.razorpay_payment_id)}`;
                            await fetchJson(confirmUrl);
                        } catch (err) {
                            console.error("Razorpay confirmation error:", err);
                        }
                        const isNewCustomer = localStorage.getItem('guest_password') ? 1 : 0;

                        // Store invoice details in sessionStorage for seamless invoice generation
                        const invoiceData = {
                            name: fname + " " + lname,
                            email: email,
                            phone: mobile,
                            address: `${door}, ${street}, ${city}, ${state} - ${pincode}`,
                            product: landingProduct.name || "Psoriasis Care Combo",
                            qty: qty,
                            price: price,
                            shipping: shipping,
                            payment: paymentSelected
                        };
                        sessionStorage.setItem('last_order_invoice', JSON.stringify(invoiceData));

                        localStorage.clear();
                        fetch("session.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ order_id: orderId })
                        })
                            .then(res => res.json())
                            .then(data => {
                                window.location.href = "thankyou.php?new=" + isNewCustomer;
                            })
                            .catch(() => {
                                window.location.href = "thankyou.php?new=" + isNewCustomer;
                            });
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();

                setTimeout(() => resetBtn(btn), 2000);

            } catch (err) {
                console.error("Place Order error:", err);
                alert(err.message || "An error occurred while placing your order.");
                resetBtn(btn);
            }
        });
    }

    // Helper: reset button state
    function resetBtn(btn) {
        btn.dataset.processing = 'false';
        btn.disabled = false;
        btn.innerHTML = `Place Order
        <i class="fas fa-check" style="margin-left: 10px;"></i>`;
    }

});
