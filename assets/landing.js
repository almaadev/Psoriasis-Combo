// Ensure API_URL is defined globaly before this script runs
    const apiUrl = window.API_URL || '';

    async function fetchProduct(productId) {
        if (!apiUrl) {
            console.error('API_URL is not defined');
            return null;
        }
        try {
            const res = await fetch(`${apiUrl}?gofor=productdetaill&product_id=${productId}`);
            const data = await res.json();
            if (data && data.product_details && data.product_details.length > 0) {
                const product = data.product_details[0];
                const price = (data.product_attributes && data.product_attributes.length > 0)
                    ? data.product_attributes[0].product_mrp
                    : 0;
                const unit = (data.product_attributes && data.product_attributes.length > 0)
                    ? data.product_attributes[0].product_measuring_unit_id
                    : '';

                return {
                    id: product.product_id,
                    name: product.product_name,
                    price: price,
                    unit: unit,
                    image: product.product_image1 || 'assets/img/Care Combo01.png'
                };
            }
            return null;
        } catch (error) {
            console.error('Error fetching product:', error);
            return null;
        }
    }

    async function handleBuyNow(productId, qty = 1) {
        // Exposed global for other scripts if needed
    }
    
    // Assign to window to be accessible
    window.handleBuyNow = async (productId, qty = 1) => {
        let product = await fetchProduct(productId);
        
        let cartItem = product;
        // If product fetch fails, use fallback
        if (!cartItem) {
            let pName = 'Product ' + (productId || '');
            let pPrice = 2319; // Hardcoded fallback
            const nameEl = document.querySelector('.product-title');
            if (nameEl) pName = nameEl.innerText;
            
            cartItem = { id: productId || 'LP-PILES-1', name: pName, price: pPrice, image: 'assets/img/Care Combo01.png' };
        }
        
        cartItem.qty = qty;
        
        localStorage.setItem('landingProduct', JSON.stringify(cartItem));
        window.location.href = `checkout`;
    };

    // ===== Shop Now =====
    document.querySelectorAll('.shop-now-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            window.handleBuyNow(productId);
        });
    });
