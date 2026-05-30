document.addEventListener('DOMContentLoaded', function () {
    // Functionality for Product Page (Home)
    const activePack = document.getElementById("pack-1");
    let selectedPack = 1;
    let selectedQty = 1;
    let selectedPrice = activePack ? parseFloat(activePack.dataset.price) : 2427;

    function syncWhatsAppLinks() {
        const productName = "Natural Piles Care Combo";
        
        let baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
        if (!baseUrl.endsWith('/')) baseUrl += '/';
        const imageUrl = baseUrl + 'assets/img/pro/pro1.webp';
        
        const message = `*Support Chat* \n\n*Product:* ${productName}\n\n*Product Image:* ${imageUrl}\n\n*Source Website:* ${window.location.href}\n\n\nHello, I am interested in Piles combo product and need some help to place an order.`;
        const encodedText = encodeURIComponent(message);
        const url = `https://wa.me/917401403011?text=${encodedText}`;
        
        document.querySelectorAll('a[href*="wa.me/917401403011"]').forEach(link => {
            link.href = url;
        });
    }

    // Add to Cart Logic
    const addToCartBtn = document.getElementById('cmd-add-to-cart');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function () {
            const productData = {
                id: 85,
                name: "Natural Piles Care Combo",
                price: selectedPrice, // single pack price
                qty: selectedQty,
                unit: ""
            };
            localStorage.setItem('checkout_product', JSON.stringify(productData));
            localStorage.setItem('landingProduct', JSON.stringify(productData));
        });
    }

    // Initial Sync
    syncWhatsAppLinks();
});