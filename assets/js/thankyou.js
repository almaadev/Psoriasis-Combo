/**
 * Thank You Screen Scripts
 * Generates the flying leaves micro-animation and reads the invoice details
 * from browser session storage to construct URL query strings for invoice.php.
 */

/* Generate Falling Leaves */
const container = document.getElementById("leafContainer");

function createLeaf() {
  if (!container) return;
  const leaf = document.createElement("div");
  leaf.classList.add("leaf");
  leaf.innerHTML = "🍃";

  leaf.style.left = Math.random() * 100 + "vw";
  leaf.style.animationDuration = (5 + Math.random() * 5) + "s";
  leaf.style.fontSize = (18 + Math.random() * 18) + "px";

  container.appendChild(leaf);

  setTimeout(() => {
    leaf.remove();
  }, 10000);
}

if (container) {
  setInterval(createLeaf, 200);
}

// Dynamically inject order details from sessionStorage into the invoice download link
document.addEventListener("DOMContentLoaded", () => {
  const invoiceLink = document.querySelector('a[href="./invoice.php"]');
  if (invoiceLink) {
    const lastOrderStr = sessionStorage.getItem("last_order_invoice");
    if (lastOrderStr) {
      try {
        const orderData = JSON.parse(lastOrderStr);
        const params = new URLSearchParams();
        
        if (orderData.name) params.set("name", orderData.name);
        if (orderData.email) params.set("email", orderData.email);
        if (orderData.phone) params.set("phone", orderData.phone);
        if (orderData.address) params.set("address", orderData.address);
        if (orderData.product) params.set("product", orderData.product);
        if (orderData.qty) params.set("qty", orderData.qty);
        if (orderData.price) params.set("price", orderData.price);
        if (orderData.shipping !== undefined) params.set("shipping", orderData.shipping);
        if (orderData.payment) params.set("payment", orderData.payment);
        
        invoiceLink.href = "./invoice.php?" + params.toString();
      } catch (e) {
        console.error("Error building invoice URL parameters:", e);
      }
    }
  }
});
