@extends('layouts.app')

@section('title', 'VendeFácil | Pedido Confirmado')

@section('content')
<section class="container" style="padding: 6rem 0; min-height: 70vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <div style="text-align: center; margin-bottom: 4rem;">
        <div style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid var(--color-gold); display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; color: var(--color-gold);">
            <i data-lucide="check" style="width: 40px; height: 40px;"></i>
        </div>
        <h1 style="font-size: 3.5rem; margin-bottom: 1rem; color: var(--color-gold);">Pedido Confirmado</h1>
        <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 500px; margin: 0 auto;">
            Gracias por su compra. Su pedido <strong style="color: var(--color-gold);" id="orderNumber">#VF-0000</strong> está siendo procesado por nuestro concierge.
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; max-width: 800px; width: 100%; margin-bottom: 4rem;">
        <!-- Delivery Details -->
        <div style="background: var(--bg-card); padding: 2.5rem; border-radius: 8px; border: 1px solid var(--border-color);">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; color: var(--color-gold);">
                <i data-lucide="truck" style="width: 20px; height: 20px;"></i>
                <h3 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Detalles de Entrega</h3>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 0.25rem;">Entrega Estimada</p>
                <p style="font-size: 0.95rem;" id="deliveryDate">Calculando...</p>
            </div>
            
            <div>
                <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 0.25rem;">Estado</p>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 8px; height: 8px; border-radius: 50%; background: var(--color-gold); animation: pulse 2s infinite;"></div>
                    <p style="font-size: 0.95rem; color: var(--color-gold); font-weight: 600;">Procesando orden</p>
                </div>
            </div>
        </div>

        <!-- Concierge Service -->
        <div style="background: var(--bg-card); padding: 2.5rem; border-radius: 8px; border: 1px solid var(--border-color); display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; color: var(--color-gold);">
                <i data-lucide="gift" style="width: 20px; height: 20px;"></i>
                <h3 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Servicio Concierge</h3>
            </div>
            
            <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2rem; flex: 1;">
                Su paquete está siendo preparado con nuestro empaque insignia de edición limitada.
            </p>
            
            <a href="javascript:void(0)" onclick="trackOrder()" style="color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
                Rastrear Envío <i data-lucide="arrow-right" style="width: 14px; height: 14px;"></i>
            </a>
        </div>
    </div>

    <div style="display: flex; gap: 1.5rem;">
        <a href="/" class="btn btn-primary" style="padding: 1rem 2rem; border-radius: 30px;">Volver al Inicio</a>
        <a href="javascript:void(0)" onclick="viewOrders()" class="btn btn-secondary" style="padding: 1rem 2rem; border-radius: 30px;">Ver Mis Pedidos</a>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Generate or retrieve order number
    let orderNum = localStorage.getItem('vendefacil_last_order');
    if (!orderNum) {
        orderNum = '#VF-' + Math.floor(10000 + Math.random() * 90000);
        localStorage.setItem('vendefacil_last_order', orderNum);
    }
    document.getElementById('orderNumber').innerText = orderNum;

    // Calculate delivery date (7 business days from now)
    function getDeliveryDate() {
        const d = new Date();
        let added = 0;
        while (added < 7) {
            d.setDate(d.getDate() + 1);
            const day = d.getDay();
            if (day !== 0 && day !== 6) added++;
        }
        return d.toLocaleDateString('es-PE', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    }
    document.getElementById('deliveryDate').innerText = getDeliveryDate().charAt(0).toUpperCase() + getDeliveryDate().slice(1);

    function trackOrder() {
        const order = localStorage.getItem('vendefacil_last_order') || orderNum;
        Swal.fire({
            customClass: { popup: 'swal-vendefacil' },
            title: `Rastreo de Pedido`,
            html: `
                <p style="color:#e5b94e; font-weight:700; margin-bottom:1.5rem;">${order}</p>
                <div style="text-align:left; display:flex; flex-direction:column; gap:1rem;">
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#e5b94e; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <p style="color:#f0ede8; font-weight:600; font-size:0.9rem;">Orden recibida</p>
                            <p style="color:#a0998e; font-size:0.8rem;">Hoy · Pago confirmado</p>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#e5b94e; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <p style="color:#f0ede8; font-weight:600; font-size:0.9rem;">En preparación</p>
                            <p style="color:#a0998e; font-size:0.8rem;">Empaque premium en curso</p>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#2a2a2a; border:1px solid #3a3a3a; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#a0998e" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        </div>
                        <div>
                            <p style="color:#a0998e; font-weight:600; font-size:0.9rem;">En camino</p>
                            <p style="color:#a0998e; font-size:0.8rem;">Pendiente · Courier asignado pronto</p>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#2a2a2a; border:1px solid #3a3a3a; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#a0998e" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        </div>
                        <div>
                            <p style="color:#a0998e; font-weight:600; font-size:0.9rem;">Entregado</p>
                            <p style="color:#a0998e; font-size:0.8rem;">Pendiente · ${getDeliveryDate()}</p>
                        </div>
                    </div>
                </div>`,
            confirmButtonText: 'Cerrar',
            width: '500px',
        });
    }

    function viewOrders() {
        const order = localStorage.getItem('vendefacil_last_order') || orderNum;
        Swal.fire({
            customClass: { popup: 'swal-vendefacil' },
            title: 'Mis Pedidos',
            html: `
                <div style="text-align:left; border:1px solid #2a2a2a; border-radius:6px; overflow:hidden;">
                    <div style="background:#1a1a1a; padding:1rem 1.25rem; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <p style="color:#e5b94e; font-weight:700; font-size:0.95rem;">${order}</p>
                            <p style="color:#a0998e; font-size:0.8rem; margin-top:0.2rem;">Hoy · Pago completado</p>
                        </div>
                        <span style="background:rgba(229,185,78,0.15); color:#e5b94e; font-size:0.75rem; font-weight:700; padding:0.3rem 0.75rem; border-radius:30px; text-transform:uppercase; letter-spacing:0.05em;">En proceso</span>
                    </div>
                    <div style="padding:1rem 1.25rem; border-top:1px solid #2a2a2a;">
                        <p style="color:#a0998e; font-size:0.8rem;">Entrega estimada: <strong style="color:#f0ede8;">${getDeliveryDate()}</strong></p>
                        <a href="javascript:void(0)" onclick="Swal.close(); setTimeout(trackOrder, 200);" style="color:#e5b94e; font-size:0.8rem; font-weight:600; text-transform:uppercase; letter-spacing:0.05em; display:inline-block; margin-top:0.75rem;">Rastrear →</a>
                    </div>
                </div>
                <p style="color:#3a3a3a; font-size:0.75rem; margin-top:1.5rem; text-align:center;">Los pedidos anteriores aparecerán aquí</p>`,
            confirmButtonText: 'Cerrar',
            width: '480px',
        });
    }
</script>
@endpush
