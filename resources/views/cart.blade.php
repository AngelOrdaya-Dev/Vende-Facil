@extends('layouts.app')

@section('title', 'VendeFácil | Carrito')

@section('content')
<section class="container" style="padding: 4rem 0; min-height: 70vh;">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem;">
        <h1 style="font-size: 3rem; margin: 0;">Carrito</h1>
        <p style="color: var(--color-gold); font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;"><span id="cartCountLabel">0</span> ARTÍCULOS</p>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem;">
        <!-- Cart Items -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div id="cartItemsContainer" style="display: flex; flex-direction: column; gap: 1.5rem;">
                <!-- JavaScript will render items here -->
            </div>
            
            <div style="display: flex; gap: 0.5rem; align-items: center; margin-top: 1rem;">
                <i data-lucide="info" style="color: var(--text-secondary); width: 16px; height: 16px;"></i>
                <p style="color: var(--text-secondary); font-size: 0.85rem;">Envío prioritario gratuito incluido en esta orden.</p>
            </div>
        </div>

        <!-- Summary -->
        <div>
            <div class="cart-summary-box">
                <h3 style="font-size: 1.5rem; margin-bottom: 2rem;">Resumen</h3>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                    <span style="color: var(--text-secondary); font-size: 0.9rem;">Subtotal</span>
                    <span style="font-weight: 500;" id="summarySubtotal">$0.00</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                    <span style="color: var(--text-secondary); font-size: 0.9rem;">Envío Premium</span>
                    <span class="text-gold" style="font-weight: 600; font-size: 0.9rem;">GRATIS</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;" id="discountRow" style="display:none;">
                    <span style="color: var(--color-gold); font-size: 0.9rem;">Descuento VIP20</span>
                    <span style="color: var(--color-gold); font-weight: 500;" id="summaryDiscount">-$0.00</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 2rem;">
                    <span style="color: var(--text-secondary); font-size: 0.9rem;">Impuestos est. (16%)</span>
                    <span style="font-weight: 500;" id="summaryTaxes">$0.00</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-color); padding-top: 2rem; margin-bottom: 2.5rem;">
                    <span style="font-size: 1.25rem; font-family: var(--font-heading); font-weight: bold;">Total</span>
                    <span class="text-gold font-heading" style="font-size: 2rem; font-weight: bold;" id="summaryTotal">$0.00</span>
                </div>
                
                <div style="display: flex; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem; margin-bottom: 2rem;">
                    <input type="text" id="couponInput" placeholder="Código de Descuento (ej. VIP20)" style="flex: 1; background: transparent; border: none; color: white; font-family: var(--font-body); outline: none; font-size: 0.85rem;">
                    <button onclick="checkCoupon()" style="background: none; border: none; color: var(--color-gold); font-weight: 600; cursor: pointer; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">Aplicar</button>
                </div>

                <a href="/checkout" class="btn btn-primary text-center" style="width: 100%; margin-bottom: 1rem;">Finalizar Compra</a>
                <a href="/shop" class="btn btn-secondary text-center" style="width: 100%;">Seguir Comprando</a>
                
                <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem; color: var(--text-secondary);">
                    <i data-lucide="shield-check" style="width: 20px; height: 20px;"></i>
                    <i data-lucide="credit-card" style="width: 20px; height: 20px;"></i>
                    <i data-lucide="lock" style="width: 20px; height: 20px;"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function renderCart() {
        const container = document.getElementById('cartItemsContainer');
        container.innerHTML = '';

        if (!cart || cart.length === 0) {
            container.innerHTML = `
                <div style="text-align:center; padding: 4rem 0; color: var(--text-secondary);">
                    <i data-lucide="shopping-bag" style="width:48px; height:48px; margin-bottom:1rem; color: var(--border-color);"></i>
                    <p style="font-size: 1.1rem;">Tu carrito está vacío.</p>
                    <a href="/shop" class="btn btn-primary" style="margin-top:1.5rem; display:inline-block;">Ir a la Tienda</a>
                </div>`;
            if (window.lucide) lucide.createIcons();
            recalculateCart();
            return;
        }

        cart.forEach((item, index) => {
            const row = document.createElement('div');
            row.className = 'cart-item';
            row.id = 'cart-row-' + item.id;
            row.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                <div style="flex: 1;">
                    <h4 style="font-size: 1.25rem; font-family: var(--font-heading); margin-bottom: 0.25rem;">${item.name}</h4>
                    <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 1rem;">Colección Premium</p>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="updateItemQty('${item.id}', -1)">-</button>
                        <span class="qty-num">${item.qty}</span>
                        <button class="qty-btn" onclick="updateItemQty('${item.id}', 1)">+</button>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-end; height: 110px;">
                    <button style="background: none; border: none; color: var(--text-secondary); cursor: pointer;" onclick="confirmRemove('${item.id}', '${item.name.replace(/'/g, "\\'")}')">
                        <i data-lucide="trash-2" style="width: 18px; height: 18px;"></i>
                    </button>
                    <span class="text-gold font-heading item-total-price" style="font-weight: bold; font-size: 1.25rem;">$${(item.price * item.qty).toLocaleString('en-US', {minimumFractionDigits: 2})}</span>
                </div>
            `;
            container.appendChild(row);
        });

        if (window.lucide) lucide.createIcons();
        recalculateCart();
    }

    function updateItemQty(id, change) {
        const item = cart.find(i => i.id === id);
        if (item) {
            item.qty += change;
            if (item.qty < 1) item.qty = 1;
            saveCart();
            renderCart();
        }
    }

    function confirmRemove(id, name) {
        Swal.fire({
            customClass: { popup: 'swal-vendefacil' },
            title: '¿Eliminar producto?',
            html: `<span style="color:#a0998e;">¿Deseas quitar <strong style="color:#f0ede8;">${name}</strong> de tu carrito?</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const row = document.getElementById('cart-row-' + id);
                if (row) {
                    row.style.transition = 'opacity 0.3s, transform 0.3s';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-20px)';
                }
                setTimeout(() => {
                    cart = cart.filter(i => i.id !== id);
                    saveCart();
                    renderCart();
                }, 300);
            }
        });
    }

    function checkCoupon() {
        const input = document.getElementById('couponInput');
        if (applyCoupon(input.value)) {
            Swal.fire({
                customClass: { popup: 'swal-vendefacil' },
                title: '¡Cupón Aplicado!',
                html: '<span style="color:#a0998e;">Has obtenido un <strong style="color:#e5b94e;">20% de descuento</strong> en tu orden.</span>',
                icon: 'success',
                confirmButtonText: '¡Excelente!',
            });
            input.value = '';
            document.getElementById('discountRow').style.display = 'flex';
        } else {
            Swal.fire({
                customClass: { popup: 'swal-vendefacil' },
                title: 'Cupón no válido',
                html: '<span style="color:#a0998e;">El código ingresado no es válido. Prueba con <strong style="color:#e5b94e;">VIP20</strong>.</span>',
                icon: 'warning',
                confirmButtonText: 'Entendido',
            });
            currentDiscount = 0;
            document.getElementById('discountRow').style.display = 'none';
        }
        recalculateCart();
    }

    function recalculateCart() {
        let subtotal = 0;
        let count = 0;
        cart.forEach(item => {
            subtotal += item.price * item.qty;
            count += item.qty;
        });

        const discountAmt = subtotal * currentDiscount;
        const subtotalAfterDiscount = subtotal - discountAmt;
        const taxes = subtotalAfterDiscount * 0.16;
        const total = subtotalAfterDiscount + taxes;

        document.getElementById('cartCountLabel').innerText = count;
        document.getElementById('summarySubtotal').innerText = '$' + subtotal.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('summaryDiscount').innerText = '-$' + discountAmt.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('summaryTaxes').innerText = '$' + taxes.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('summaryTotal').innerText = '$' + total.toLocaleString('en-US', {minimumFractionDigits: 2});
    }

    document.addEventListener('DOMContentLoaded', () => {
        renderCart();
    });
</script>
@endpush
