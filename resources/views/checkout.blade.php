@extends('layouts.app')

@section('title', 'VendeFácil | Pago Seguro')

@section('content')
<section class="container" style="padding: 4rem 0; min-height: 70vh;">
    <a href="/cart" style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--text-secondary); margin-bottom: 2rem; font-size: 0.9rem;">
        <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i> Volver al Carrito
    </a>
    
    <h1 style="font-size: 2.5rem; margin-bottom: 3rem;">Pago Seguro</h1>

    <div style="display: grid; grid-template-columns: 3fr 2fr; gap: 4rem;">
        <!-- Payment Details -->
        <div>
            <h3 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-secondary); margin-bottom: 1.5rem; font-family: var(--font-body);">Selecciona el Método de Pago</h3>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 3rem;" id="payMethodBtns">
                <button class="pay-method-btn active" data-method="card" onclick="selectPayMethod(this)" style="flex: 1; background: transparent; border: 1px solid var(--color-gold); border-radius: 8px; padding: 1.5rem; display: flex; flex-direction: column; align-items: center; gap: 0.5rem; color: var(--color-gold); cursor: pointer; transition: all 0.3s;">
                    <i data-lucide="credit-card"></i>
                    <span style="font-size: 0.9rem; font-weight: 500;">Tarjeta</span>
                </button>
                <button class="pay-method-btn" data-method="apple" onclick="selectPayMethod(this)" style="flex: 1; background: transparent; border: 1px solid var(--border-color); border-radius: 8px; padding: 1.5rem; display: flex; flex-direction: column; align-items: center; gap: 0.5rem; color: var(--text-secondary); cursor: pointer; transition: all 0.3s;">
                    <i data-lucide="smartphone"></i>
                    <span style="font-size: 0.9rem; font-weight: 500;">Apple Pay</span>
                </button>
                <button class="pay-method-btn" data-method="paypal" onclick="selectPayMethod(this)" style="flex: 1; background: transparent; border: 1px solid var(--border-color); border-radius: 8px; padding: 1.5rem; display: flex; flex-direction: column; align-items: center; gap: 0.5rem; color: var(--text-secondary); cursor: pointer; transition: all 0.3s;">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <span style="font-size: 0.9rem; font-weight: 500;">PayPal</span>
                </button>
            </div>

            <div id="cardForm">
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; color: var(--text-secondary); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; font-weight: 600;">Nombre en la Tarjeta</label>
                    <input type="text" id="cardName" maxlength="30" placeholder="Como aparece en la tarjeta" style="width: 100%; background: #222; border: 1px solid var(--border-color); border-radius: 4px; padding: 1rem; color: white; font-family: var(--font-body); outline: none; text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </div>
                
                <div style="margin-bottom: 1.5rem; position: relative;">
                    <label style="display: block; color: var(--text-secondary); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; font-weight: 600;">Número de Tarjeta</label>
                    <input type="text" id="cardNumber" placeholder="0000 0000 0000 0000" maxlength="19" style="width: 100%; background: #222; border: 1px solid var(--border-color); border-radius: 4px; padding: 1rem; color: white; font-family: var(--font-body); outline: none; letter-spacing: 0.05em;" oninput="formatCardNumber(this)">
                    <i data-lucide="lock" style="position: absolute; right: 1rem; top: 2.2rem; color: var(--text-secondary); width: 16px; height: 16px;"></i>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2.5rem;">
                    <div>
                        <label style="display: block; color: var(--text-secondary); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; font-weight: 600;">Fecha Expiración</label>
                        <input type="text" id="cardExpiry" placeholder="MM/AA" maxlength="5" style="width: 100%; background: #222; border: 1px solid var(--border-color); border-radius: 4px; padding: 1rem; color: white; font-family: var(--font-body); outline: none;" oninput="formatExpiry(this)">
                    </div>
                    <div>
                        <label style="display: block; color: var(--text-secondary); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; font-weight: 600;">CVV</label>
                        <input type="password" id="cardCVV" placeholder="•••" maxlength="4" style="width: 100%; background: #222; border: 1px solid var(--border-color); border-radius: 4px; padding: 1rem; color: white; font-family: var(--font-body); outline: none;" oninput="this.value = this.value.replace(/\D/g,'').substring(0,4)">
                    </div>
                </div>
            </div>

            <div id="altPayForm" style="display:none; padding: 2rem; background: #1a1a1a; border-radius: 8px; text-align: center; margin-bottom: 2.5rem; color: var(--text-secondary);">
                <p style="margin-bottom: 0.5rem; font-size: 1rem;">Serás redirigido a completar tu pago de forma segura.</p>
                <p style="font-size: 0.85rem; color: var(--color-gold);">🔒 Conexión encriptada SSL</p>
            </div>

            <button type="button" onclick="handleCheckout()" class="btn btn-primary" style="width: 100%; padding: 1.25rem; font-size: 1rem; border-radius: 4px;">
                Completar Pago - <span id="btnTotal">$0.00</span>
            </button>
            
            <div style="display: flex; justify-content: space-between; margin-top: 2.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color); color: var(--text-secondary); font-size: 0.75rem;">
                <div style="display: flex; gap: 1.5rem;">
                    <span style="display: flex; align-items: center; gap: 0.5rem;"><i data-lucide="shield" style="width: 14px; height: 14px;"></i> SSL SEGURO</span>
                    <span style="display: flex; align-items: center; gap: 0.5rem;"><i data-lucide="alert-circle" style="width: 14px; height: 14px;"></i> PROTECCIÓN ANTI-FRAUDE</span>
                </div>
                <a href="javascript:void(0)" onclick="showToast('Próximamente: Términos & Condiciones')" style="text-decoration: underline;">Términos & Condiciones</a>
            </div>
        </div>

        <!-- Order Summary -->
        <div>
            <div style="background: var(--bg-card); padding: 2.5rem; border-radius: 8px; border: 1px solid var(--border-color);">
                <h3 style="font-size: 1.25rem; margin-bottom: 2rem; font-family: var(--font-heading);">Resumen de Orden</h3>
                
                <div id="checkoutItemsContainer" style="display: flex; flex-direction: column; gap: 1.5rem; margin-bottom: 2rem;">
                    <!-- Items from JS -->
                </div>
                
                <div style="border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); padding: 1.5rem 0; margin-bottom: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="color: var(--text-secondary); font-size: 0.9rem;">Subtotal</span>
                        <span style="font-weight: 500;" id="checkoutSubtotal">$0.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;" id="checkoutDiscountLine" style="display:none;">
                        <span style="color: var(--color-gold); font-size: 0.9rem;">Descuento VIP20</span>
                        <span style="color: var(--color-gold); font-weight: 500;" id="checkoutDiscountAmt">-$0.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: var(--text-secondary); font-size: 0.9rem;">Envío</span>
                        <span class="text-gold" style="font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Gratis</span>
                    </div>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
                    <span style="font-size: 1.1rem; font-family: var(--font-heading); font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em;">Total</span>
                    <span class="text-gold font-heading" style="font-size: 2rem; font-weight: bold;" id="checkoutTotal">$0.00</span>
                </div>
                
                <div style="display: flex; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">
                    <input type="text" id="checkoutCoupon" placeholder="Cupón (ej. VIP20)" style="flex: 1; background: transparent; border: none; color: white; font-family: var(--font-body); outline: none; font-size: 0.9rem;">
                    <button type="button" onclick="applyCheckoutCoupon()" style="background: none; border: none; color: var(--color-gold); font-weight: 600; cursor: pointer; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">Aplicar</button>
                </div>
                <div id="checkoutDiscountMsg" style="color: var(--color-gold); font-size: 0.8rem; margin-top: 0.5rem; display: none;">✓ Cupón de 20% aplicado</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    let checkoutDiscount = 0;
    let selectedMethod = 'card';

    function selectPayMethod(btn) {
        document.querySelectorAll('.pay-method-btn').forEach(b => {
            b.style.borderColor = 'var(--border-color)';
            b.style.color = 'var(--text-secondary)';
            b.style.background = 'transparent';
        });
        btn.style.borderColor = 'var(--color-gold)';
        btn.style.color = 'var(--color-gold)';
        btn.style.background = 'rgba(229,185,78,0.06)';
        selectedMethod = btn.dataset.method;

        const cardForm = document.getElementById('cardForm');
        const altForm = document.getElementById('altPayForm');
        if (selectedMethod === 'card') {
            cardForm.style.display = 'block';
            altForm.style.display = 'none';
        } else {
            cardForm.style.display = 'none';
            altForm.style.display = 'block';
        }
    }

    function formatCardNumber(input) {
        let v = input.value.replace(/\D/g, '').substring(0, 16);
        input.value = v.replace(/(.{4})/g, '$1 ').trim();
    }

    function formatExpiry(input) {
        let v = input.value.replace(/\D/g, '').substring(0, 4);
        if (v.length >= 3) v = v.substring(0, 2) + '/' + v.substring(2);
        input.value = v;
    }

    function applyCheckoutCoupon() {
        const code = document.getElementById('checkoutCoupon').value;
        if (code.toUpperCase() === 'VIP20') {
            checkoutDiscount = 0.20;
            document.getElementById('checkoutDiscountMsg').style.display = 'block';
            document.getElementById('checkoutDiscountLine').style.display = 'flex';
            Swal.fire({
                customClass: { popup: 'swal-vendefacil' },
                title: '¡Cupón Aplicado!',
                html: '<span style="color:#a0998e;">Has obtenido un <strong style="color:#e5b94e;">20% de descuento</strong> en tu orden.</span>',
                icon: 'success',
                confirmButtonText: '¡Excelente!',
            });
        } else {
            checkoutDiscount = 0;
            document.getElementById('checkoutDiscountMsg').style.display = 'none';
            document.getElementById('checkoutDiscountLine').style.display = 'none';
            Swal.fire({
                customClass: { popup: 'swal-vendefacil' },
                title: 'Cupón no válido',
                html: '<span style="color:#a0998e;">Prueba con <strong style="color:#e5b94e;">VIP20</strong>.</span>',
                icon: 'warning',
                confirmButtonText: 'Entendido',
            });
        }
        renderCheckout();
    }

    function renderCheckout() {
        const container = document.getElementById('checkoutItemsContainer');
        container.innerHTML = '';
        
        if (!cart || cart.length === 0) {
            container.innerHTML = '<p style="color:var(--text-secondary);">Tu carrito está vacío.</p>';
            ['checkoutSubtotal','checkoutTotal','btnTotal'].forEach(id => document.getElementById(id).innerText = '$0.00');
            return;
        }

        let subtotal = 0;
        cart.forEach(item => {
            subtotal += item.price * item.qty;
            const row = document.createElement('div');
            row.style.cssText = 'display:flex; gap:1rem; align-items:center;';
            row.innerHTML = `
                <img src="${item.image}" alt="${item.name}" style="width:60px; height:60px; border-radius:4px; flex-shrink:0; object-fit:cover; background:#111;">
                <div style="flex:1;">
                    <h4 style="font-size:0.9rem; font-weight:600;">${item.name}</h4>
                    <p style="color:var(--text-secondary); font-size:0.8rem;">Cant: ${item.qty}</p>
                </div>
                <span style="font-size:0.9rem; font-weight:600;">$${(item.price * item.qty).toLocaleString('en-US', {minimumFractionDigits: 2})}</span>
            `;
            container.appendChild(row);
        });

        const discount = subtotal * checkoutDiscount;
        const total = subtotal - discount;

        document.getElementById('checkoutSubtotal').innerText = '$' + subtotal.toLocaleString('en-US', {minimumFractionDigits: 2});
        if (discount > 0) document.getElementById('checkoutDiscountAmt').innerText = '-$' + discount.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('checkoutTotal').innerText = '$' + total.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('btnTotal').innerText = '$' + total.toLocaleString('en-US', {minimumFractionDigits: 2});
    }

    function handleCheckout() {
        if (!cart || cart.length === 0) {
            Swal.fire({
                customClass: { popup: 'swal-vendefacil' },
                title: 'Carrito vacío',
                html: '<span style="color:#a0998e;">Agrega productos antes de continuar.</span>',
                icon: 'warning',
                confirmButtonText: 'Ir a la tienda',
            }).then(() => window.location.href = '/shop');
            return;
        }

        if (selectedMethod === 'card') {
            const name = document.getElementById('cardName').value;
            const number = document.getElementById('cardNumber').value.replace(/\s/g,'');
            const expiry = document.getElementById('cardExpiry').value;
            const cvv = document.getElementById('cardCVV').value;

            if (!name || number.length < 16 || expiry.length < 5 || cvv.length < 3) {
                Swal.fire({
                    customClass: { popup: 'swal-vendefacil' },
                    title: 'Datos incompletos',
                    html: '<span style="color:#a0998e;">Por favor completa todos los campos de tu tarjeta correctamente.</span>',
                    icon: 'warning',
                    confirmButtonText: 'Entendido',
                });
                return;
            }
        }

        // Store order details before proceeding
        const orderNum = '#VF-' + Math.floor(10000 + Math.random() * 90000);
        localStorage.setItem('vendefacil_last_order', orderNum);
        // Calculate totals (same as renderCheckout)
        let subtotal = 0;
        cart.forEach(item => {
            subtotal += item.price * item.qty;
        });
        const discountAmt = subtotal * checkoutDiscount;
        const total = subtotal - discountAmt;
        // Save order history
        const orderDetails = {
            number: orderNum,
            items: cart,
            subtotal: subtotal,
            discount: discountAmt,
            total: total,
            date: new Date().toISOString()
        };
        const orders = JSON.parse(localStorage.getItem('vendefacil_orders') || '[]');
        orders.push(orderDetails);
        localStorage.setItem('vendefacil_orders', JSON.stringify(orders));
        // Clear cart and proceed
        localStorage.setItem('checkoutItems', JSON.stringify(cart));
        clearCart();
        Swal.fire({
            customClass: { popup: 'swal-vendefacil' },
            title: '¡Compra Exitosa!',
            html: `
                <span style="color:#a0998e;">
                    Tu pedido ha sido procesado con éxito.<br>
                    <strong style="color:#e5b94e;">Número de orden: ${orderNum}</strong><br><br>
                    Recibirás una confirmación a tu correo pronto.
                </span>`,
            icon: 'success',
            confirmButtonText: 'Ver Confirmación',
            allowOutsideClick: false,
        }).then(() => {
            window.location.href = '/confirmation';
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        renderCheckout();
    });
</script>
@endpush
