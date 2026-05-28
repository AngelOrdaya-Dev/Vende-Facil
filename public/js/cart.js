// cart.js - Simple local storage cart

let cart = JSON.parse(localStorage.getItem('vendefacil_cart')) || [];

function saveCart() {
    localStorage.setItem('vendefacil_cart', JSON.stringify(cart));
    updateBadge();
}

function updateBadge() {
    const badge = document.querySelector('.cart-badge .badge');
    if (!badge) return;
    
    let count = cart.reduce((sum, item) => sum + item.qty, 0);
    badge.innerText = count;
    badge.style.display = count > 0 ? 'inline-block' : 'none';
}

function addToCart(btn, id, name, price, image) {
    const existing = cart.find(i => i.id === id);
    if (existing) {
        existing.qty += 1;
    } else {
        cart.push({ id, name, price, image, qty: 1 });
    }
    saveCart();

    // Visual feedback
    const original = btn.innerHTML;
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> ¡Añadido!';
    btn.style.borderColor = 'var(--color-gold)';
    btn.style.color = 'var(--color-gold)';
    setTimeout(() => { 
        btn.innerHTML = original; 
        btn.style.borderColor = ''; 
        btn.style.color = ''; 
        if(window.lucide) lucide.createIcons(); 
    }, 1800);
}

function clearCart() {
    cart = [];
    saveCart();
}

// Global Search - toggle overlay
function initSearch() {
    const searchBtn = document.getElementById('searchBtn');
    const overlay = document.getElementById('searchOverlay');
    if (searchBtn && overlay) {
        searchBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isVisible = overlay.style.display === 'flex';
            overlay.style.display = isVisible ? 'none' : 'flex';
            overlay.style.alignItems = 'center';
            if (!isVisible) {
                setTimeout(() => document.getElementById('searchInput')?.focus(), 100);
            }
        });
        // Close overlay on outside click
        document.addEventListener('click', (e) => {
            if (!overlay.contains(e.target) && e.target !== searchBtn) {
                overlay.style.display = 'none';
            }
        });
    }
}

// Discount logic
let currentDiscount = 0;
function applyCoupon(code) {
    if (code.toUpperCase() === 'VIP20') {
        currentDiscount = 0.20; // 20% off
        return true;
    }
    return false;
}

document.addEventListener('DOMContentLoaded', () => {
    updateBadge();
    initSearch();
});
