@extends('layouts.app')

@section('title', 'VendeFácil | Colecciones')

@section('content')
<section style="padding: 4rem 0 2rem;">
    <div class="container">
        <div class="animate-fade-up">
            <div class="section-eyebrow">Explorar</div>
            <h1 class="section-title" style="margin-bottom:0.5rem;">Todas las Colecciones</h1>
            <p style="color:var(--text-secondary); font-size:0.95rem; margin-bottom:3rem;">Descubre nuestra curaduría de productos exclusivos seleccionados con criterio de excelencia.</p>
        </div>

        <!-- Filter Bar -->
        <div class="shop-filter-bar reveal">
            <button class="filter-chip active" data-filter="all">Todos</button>
            <button class="filter-chip" data-filter="electronica">Electrónica</button>
            <button class="filter-chip" data-filter="moda">Moda</button>
            <button class="filter-chip" data-filter="accesorios">Accesorios</button>
            <button class="filter-chip" data-filter="limitado">Edición Limitada</button>
        </div>

        <!-- Products Grid -->
        <div class="shop-grid" id="shopGrid">

            <!-- 1 -->
            <div class="product-card reveal" data-cat="electronica">
                <div class="product-img-wrap">
                    <img src="/images/product_headphones.png" alt="Aura Pro Headphones" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Aura Pro Headphones</h4>
                        <span class="product-price">$499</span>
                    </div>
                    <p class="product-desc">Sonido inmersivo sin precedentes. Drivers de titanio de 40mm con cancelación activa de ruido.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'aura-pro', 'Aura Pro Headphones', 499, '/images/product_headphones.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>

            <!-- 2 -->
            <div class="product-card reveal delay-100" data-cat="accesorios">
                <div class="product-img-wrap">
                    <img src="/images/product_smartwatch.png" alt="Chronos V2 Smartwatch" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Chronos V2 Smartwatch</h4>
                        <span class="product-price">$750</span>
                    </div>
                    <p class="product-desc">El tiempo, reinventado digitalmente. Movimiento automático híbrido con pantalla AMOLED.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'chronos-v2', 'Chronos V2 Smartwatch', 750, '/images/product_smartwatch.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>

            <!-- 3 -->
            <div class="product-card reveal delay-200" data-cat="electronica">
                <div class="product-img-wrap">
                    <img src="/images/product_keyboard.png" alt="Mech-Gold Keyboard" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Mech-Gold Keyboard</h4>
                        <span class="product-price">$320</span>
                    </div>
                    <p class="product-desc">Precisión táctil con baño en oro 24k. Switches lineales personalizados silenciosos.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'mech-gold', 'Mech-Gold Keyboard', 320, '/images/product_keyboard.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>

            <!-- 4 -->
            <div class="product-card reveal" data-cat="electronica limitado">
                <div class="product-img-wrap">
                    <img src="/images/product_laptop.png" alt="Nebula Ultrabook" loading="lazy">
                    <span class="product-badge">Limitado</span>
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Nebula Ultrabook</h4>
                        <span class="product-price">$2,800</span>
                    </div>
                    <p class="product-desc">Potencia absoluta en 12mm. Chip M4 Ultra con pantalla Liquid Retina XDR.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'nebula', 'Nebula Ultrabook', 2800, '/images/product_laptop.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>

            <!-- 5 -->
            <div class="product-card reveal delay-100" data-cat="accesorios limitado">
                <div class="product-img-wrap">
                    <img src="/images/category_accessories.png" alt="Atelier Edition One" loading="lazy">
                    <span class="product-badge">Limitado</span>
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Atelier Edition One</h4>
                        <span class="product-price">$2,450</span>
                    </div>
                    <p class="product-desc">Reloj artesanal de edición numerada. Caja en oro rosa 18k con correa de cocodrilo.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'atelier', 'Atelier Edition One', 2450, '/images/category_accessories.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>

            <!-- 6 -->
            <div class="product-card reveal delay-200" data-cat="moda">
                <div class="product-img-wrap">
                    <img src="/images/category_fashion.png" alt="Traje Atelier Noir" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Traje Atelier Noir</h4>
                        <span class="product-price">$1,200</span>
                    </div>
                    <p class="product-desc">Traje de corte italiano confeccionado en lana merino de primera calidad. A medida.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'traje', 'Traje Atelier Noir', 1200, '/images/category_fashion.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Filter chips
const chips = document.querySelectorAll('.filter-chip');
const cards = document.querySelectorAll('#shopGrid .product-card');

function filterProducts(filter, query = '') {
    cards.forEach(card => {
        const cats = card.dataset.cat || '';
        const name = card.querySelector('.product-name').innerText.toLowerCase();
        const desc = card.querySelector('.product-desc').innerText.toLowerCase();
        
        const matchesCategory = (filter === 'all' || cats.includes(filter));
        const matchesQuery = (query === '' || name.includes(query) || desc.includes(query));

        if (matchesCategory && matchesQuery) {
            card.style.display = '';
            card.style.animation = 'fadeInUp 0.4s ease both';
        } else {
            card.style.display = 'none';
        }
    });
}

chips.forEach(chip => {
    chip.addEventListener('click', () => {
        chips.forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
        
        const urlParams = new URLSearchParams(window.location.search);
        const query = (urlParams.get('q') || '').toLowerCase();
        
        filterProducts(chip.dataset.filter, query);
    });
});

// Check if there is a search query on load
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const query = (urlParams.get('q') || '').toLowerCase();
    
    if (query) {
        // Change title to indicate search
        const titleEl = document.querySelector('.section-title');
        if (titleEl) titleEl.innerText = `Resultados para "${urlParams.get('q')}"`;
        
        // Remove active class from all chips
        chips.forEach(c => c.classList.remove('active'));
        
        filterProducts('all', query);
    }
});
</script>
@endpush
