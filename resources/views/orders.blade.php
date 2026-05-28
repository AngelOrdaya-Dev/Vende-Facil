@extends('layouts.app')

@section('title', 'VendeFácil | Mis Pedidos')

@section('content')
<section class="container" style="padding: 4rem 0; min-height: 70vh;">
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem;">Historial de Pedidos</h1>
    <div id="ordersContainer" style="display: flex; flex-direction: column; gap: 2rem;">
        <!-- Orders will be rendered here -->
    </div>
</section>
@endsection

@push('scripts')
<script>
    function renderOrders() {
        const container = document.getElementById('ordersContainer');
        container.innerHTML = '';
        const orders = JSON.parse(localStorage.getItem('vendefacil_orders') || '[]');
        if (orders.length === 0) {
            container.innerHTML = `<p style="color: var(--text-secondary);">No tienes pedidos registrados.</p>`;
            return;
        }
        // Render each order
        orders.slice().reverse().forEach(order => {
            const orderDiv = document.createElement('div');
            orderDiv.style.cssText = 'background: var(--bg-card); padding: 2rem; border-radius: 8px; border: 1px solid var(--border-color);';
            const itemsList = order.items.map(item => `<li>🛒 <strong>${item.name}</strong> – $${item.price} ×${item.qty}</li>`).join('');
            orderDiv.innerHTML = `
                <div style="display:flex; justify-content:space-between; margin-bottom:1rem;">
                    <span style="color:#e5b94e; font-weight:700;">${order.number}</span>
                    <span style="color:#a0998e; font-size:0.85rem;">${new Date(order.date).toLocaleDateString('es-PE')}</span>
                </div>
                <p style="color:#a0998e; margin-bottom:0.5rem;">Subtotal: <strong style="color:#f0ede8;">$${order.subtotal.toLocaleString('en-US', {minimumFractionDigits:2})}</strong></p>
                <p style="color:#a0998e; margin-bottom:0.5rem;">Descuento: <strong style="color:#f0ede8;">-$${order.discount.toLocaleString('en-US', {minimumFractionDigits:2})}</strong></p>
                <p style="color:#a0998e; margin-bottom:0.5rem;">Total: <strong style="color:#e5b94e;">$${order.total.toLocaleString('en-US', {minimumFractionDigits:2})}</strong></p>
                <h4 style="color:#f0ede8; margin:1rem 0 0.5rem;">Productos:</h4>
                <ul style="list-style:none; padding:0; margin:0; color:#a0998e; font-size:0.85rem;">
                    ${itemsList}
                </ul>
            `;
            container.appendChild(orderDiv);
        });
    }
    document.addEventListener('DOMContentLoaded', renderOrders);
</script>
@endpush
