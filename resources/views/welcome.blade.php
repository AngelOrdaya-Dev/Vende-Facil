@extends('layouts.app')

@section('title', 'VendeFácil | La Definición de la Excelencia Digital')

@section('content')

{{-- ==================== HERO ==================== --}}
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container" style="position: relative; z-index: 2; width: 100%;">
        <div class="hero-content animate-fade-up">
            <div class="hero-eyebrow">Edición Limitada</div>
            <h1 class="hero-title">
                La Definición de la<br>
                <em>Excelencia Digital.</em>
            </h1>
            <p class="hero-desc">
                Descubre una curaduría exclusiva de tecnología diseñada para quienes exigen lo extraordinario. Innovación sin compromisos.
            </p>
            <div class="hero-actions">
                <a href="/shop" class="btn btn-primary">
                    <i data-lucide="shopping-bag" style="width:16px;height:16px;"></i>
                    Comprar Ahora
                </a>
                <a href="#colecciones" class="btn btn-secondary">
                    Explorar Más
                </a>
            </div>

            <div class="hero-stats">
                <div>
                    <div class="stat-num">124+</div>
                    <div class="stat-label">Productos Exclusivos</div>
                </div>
                <div>
                    <div class="stat-num">50k+</div>
                    <div class="stat-label">Clientes Satisfechos</div>
                </div>
                <div>
                    <div class="stat-num">100%</div>
                    <div class="stat-label">Garantía Aura</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== TRUST STRIP ==================== --}}
<div class="container">
    <div class="trust-strip reveal">
        <div class="trust-item">
            <div class="trust-item-icon"><i data-lucide="truck" style="width:22px;height:22px;"></i></div>
            <div>
                <div class="trust-item-label">Envío VIP Gratuito</div>
                <div class="trust-item-sub">En pedidos +$500</div>
            </div>
        </div>
        <div class="trust-item">
            <div class="trust-item-icon"><i data-lucide="shield-check" style="width:22px;height:22px;"></i></div>
            <div>
                <div class="trust-item-label">Garantía Aura</div>
                <div class="trust-item-sub">2 años de cobertura</div>
            </div>
        </div>
        <div class="trust-item">
            <div class="trust-item-icon"><i data-lucide="refresh-cw" style="width:22px;height:22px;"></i></div>
            <div>
                <div class="trust-item-label">Devoluciones</div>
                <div class="trust-item-sub">30 días sin preguntas</div>
            </div>
        </div>
        <div class="trust-item">
            <div class="trust-item-icon"><i data-lucide="headphones" style="width:22px;height:22px;"></i></div>
            <div>
                <div class="trust-item-label">Concierge 24/7</div>
                <div class="trust-item-sub">Atención personalizada</div>
            </div>
        </div>
    </div>
</div>

{{-- ==================== COLECCIONES ==================== --}}
<section id="colecciones">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:2.5rem;">
            <div class="reveal">
                <div class="section-eyebrow">Colecciones</div>
                <h2 class="section-title">Categorías de Prestigio</h2>
            </div>
            <a href="/shop" class="reveal" style="color:var(--text-secondary); font-size:0.85rem; text-decoration:underline; text-underline-offset:4px;">Ver Todo</a>
        </div>

        <div class="categories-grid reveal">
            {{-- Electrónica --}}
            <a href="/shop?cat=electronica" class="category-card" style="min-height:500px;">
                <img src="/images/category_electronics.png" alt="Electrónica" loading="lazy">
                <div class="category-label">
                    <h3>Electrónica</h3>
                    <p>124 Objetos de Deseo</p>
                </div>
            </a>
            {{-- Right column --}}
            <div class="category-card-right">
                {{-- Moda --}}
                <a href="/shop?cat=moda" class="category-card">
                    <img src="/images/category_fashion.png" alt="Moda" loading="lazy" style="min-height:230px;">
                    <div class="category-label">
                        <h3>Moda</h3>
                        <p>Nuevas Tendencias</p>
                    </div>
                </a>
                {{-- Accesorios --}}
                <a href="/shop?cat=accesorios" class="category-card">
                    <img src="/images/category_accessories.png" alt="Accesorios" loading="lazy" style="min-height:230px;">
                    <div class="category-label">
                        <h3>Accesorios</h3>
                        <p>Detalles Esenciales</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ==================== CURADURÍA ==================== --}}
<section style="background: var(--bg-subtle); padding: 5rem 0;">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:3.5rem;">
            <div class="section-eyebrow" style="justify-content:center;">Curaduría</div>
            <h2 class="section-title italic">Selección del Director</h2>
            <div class="divider-gold" style="margin: 1rem auto; background: linear-gradient(90deg, transparent, var(--color-gold), transparent);"></div>
        </div>

        <div class="products-grid">
            {{-- Product 1 --}}
            <div class="product-card reveal">
                <div class="product-img-wrap">
                    <img src="/images/product_headphones.png" alt="Aura Pro Headphones" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Aura Pro Headphones</h4>
                        <span class="product-price">$499</span>
                    </div>
                    <p class="product-desc">Sonido inmersivo sin precedentes. Audio de estudio en cada escucha.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'aura-pro', 'Aura Pro Headphones', 499, '/images/product_headphones.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>
            {{-- Product 2 --}}
            <div class="product-card reveal delay-100">
                <div class="product-img-wrap">
                    <img src="/images/product_smartwatch.png" alt="Chronos V2 Smartwatch" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Chronos V2 Smartwatch</h4>
                        <span class="product-price">$750</span>
                    </div>
                    <p class="product-desc">El tiempo, reinventado digitalmente. Precisión suiza en tu muñeca.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'chronos-v2', 'Chronos V2 Smartwatch', 750, '/images/product_smartwatch.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>
            {{-- Product 3 --}}
            <div class="product-card reveal delay-200">
                <div class="product-img-wrap">
                    <img src="/images/product_keyboard.png" alt="Mech-Gold Keyboard" loading="lazy">
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Mech-Gold Keyboard</h4>
                        <span class="product-price">$320</span>
                    </div>
                    <p class="product-desc">Precisión táctil con baño en oro. La herramienta del artista digital.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'mech-gold', 'Mech-Gold Keyboard', 320, '/images/product_keyboard.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>
            {{-- Product 4 --}}
            <div class="product-card reveal delay-300">
                <div class="product-img-wrap">
                    <img src="/images/product_laptop.png" alt="Nebula Ultrabook" loading="lazy">
                    <span class="product-badge">Limitado</span>
                </div>
                <div class="product-info">
                    <div class="product-meta">
                        <h4 class="product-name">Nebula Ultrabook</h4>
                        <span class="product-price">$2,800</span>
                    </div>
                    <p class="product-desc">Potencia absoluta en 12mm. El ultrabook más delgado de su clase.</p>
                    <button class="btn btn-secondary" onclick="addToCart(this, 'nebula', 'Nebula Ultrabook', 2800, '/images/product_laptop.png')">
                        <i data-lucide="shopping-bag" style="width:14px;height:14px;"></i>
                        Añadir al Carrito
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center" style="margin-top:3rem;">
            <a href="/shop" class="btn btn-secondary">Ver Todas las Colecciones</a>
        </div>
    </div>
</section>

{{-- ==================== TESTIMONIALS ==================== --}}
<section>
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:3rem;">
            <div class="section-eyebrow" style="justify-content:center;">Experiencias</div>
            <h2 class="section-title">Lo Que Dicen Nuestros Clientes</h2>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card reveal">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"Una experiencia de compra absolutamente impecable. Los Aura Pro Headphones llegaron en un empaque digno de joyería. Calidad sin igual."</p>
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 1.5rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--bg-subtle); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-color);">
                        <i data-lucide="user" style="width: 20px; height: 20px; color: var(--color-gold);"></i>
                    </div>
                    <div>
                        <div class="testimonial-author" style="margin: 0;">Alejandro M.</div>
                        <div class="testimonial-role" style="margin: 0;">Madrid, España</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card reveal delay-100">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"El Chronos V2 superó todas mis expectativas. El servicio de concierge fue extraordinario — entrega al día siguiente, empaque de lujo."</p>
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 1.5rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--bg-subtle); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-color);">
                        <i data-lucide="user" style="width: 20px; height: 20px; color: var(--color-gold);"></i>
                    </div>
                    <div>
                        <div class="testimonial-author" style="margin: 0;">Isabella R.</div>
                        <div class="testimonial-role" style="margin: 0;">Ciudad de México</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card reveal delay-200">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"VendeFácil redefine el comercio electrónico premium. La atención al cliente es verdaderamente de clase mundial. No compraré en otro lugar."</p>
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 1.5rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--bg-subtle); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-color);">
                        <i data-lucide="user" style="width: 20px; height: 20px; color: var(--color-gold);"></i>
                    </div>
                    <div>
                        <div class="testimonial-author" style="margin: 0;">Carlos V.</div>
                        <div class="testimonial-role" style="margin: 0;">Buenos Aires, Argentina</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== CONTACTO / SOPORTE ==================== --}}
<section id="soporte" style="background: var(--bg-subtle);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:4rem;">
            <div class="section-eyebrow" style="justify-content:center;">Concierge</div>
            <h2 class="section-title">Concierge &amp; Soporte</h2>
            <div class="divider-gold" style="margin: 1rem auto; background: linear-gradient(90deg, transparent, var(--color-gold), transparent);"></div>
            <p style="color:var(--text-secondary); max-width:520px; margin: 0 auto; font-size:1rem;">
                Experimente la atención personalizada de VendeFácil. Nuestro equipo está a su disposición para elevar su experiencia de compra.
            </p>
        </div>

        <div class="contact-grid">
            {{-- Formulario --}}
            <div class="contact-card-box reveal">
                <h3 style="font-size:1.75rem; margin-bottom:2.5rem;">Envíenos un mensaje</h3>
                <form id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" id="contactName" class="form-input" placeholder="Su nombre aquí" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" id="contactEmail" class="form-input" placeholder="email@ejemplo.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asunto</label>
                        <input type="text" id="contactSubject" class="form-input" placeholder="¿Cómo podemos ayudarle?" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mensaje</label>
                        <textarea id="contactMessage" class="form-input" rows="4" placeholder="Escriba su consulta detalladamente..." style="resize:none;" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-top:0.5rem;" onclick="sendContactEmail()">
                        <i data-lucide="send" style="width:16px;height:16px;"></i>
                        Enviar Solicitud
                    </button>
                </form>
            </div>

            {{-- Sidebar --}}
            <div style="display:flex; flex-direction:column; gap:1.75rem;" class="reveal delay-100">
                {{-- WhatsApp --}}
                <div style="background:var(--bg-card); padding:2rem; border-radius:var(--radius-md); border:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <span style="display:inline-block; background:var(--color-gold); color:#000; padding:0.2rem 0.6rem; font-size:0.6rem; font-weight:700; border-radius:2px; margin-bottom:0.6rem; text-transform:uppercase; letter-spacing:0.1em;">Instantáneo</span>
                        <h4 style="font-size:1.15rem; color:var(--color-gold); margin-bottom:0.3rem;">WhatsApp Concierge</h4>
                        <p style="color:var(--text-secondary); font-size:0.85rem;">Resolución inmediata de dudas.</p>
                    </div>
                    <button class="btn btn-primary" style="border-radius:50%; width:52px; height:52px; padding:0; flex-shrink:0;" onclick="window.open('https://wa.me/51954827167', '_blank')">
                        <i data-lucide="message-circle" style="width:20px;height:20px;"></i>
                    </button>
                </div>

                {{-- Phone & Email --}}
                <div class="contact-sidebar-row">
                    <div style="flex:1; background:var(--bg-card); padding:1.5rem; border-radius:var(--radius-md); border:1px solid var(--border-color); text-align:center;">
                        <i data-lucide="phone" style="color:var(--color-gold); margin-bottom:0.75rem; width:20px; height:20px;"></i>
                        <div style="font-size:0.65rem; text-transform:uppercase; letter-spacing:0.12em; color:var(--text-secondary); margin-bottom:0.3rem;">Teléfono</div>
                        <div style="font-size:0.85rem; font-weight:600;">+51 954 827 167</div>
                    </div>
                    <div style="flex:1; background:var(--bg-card); padding:1.5rem; border-radius:var(--radius-md); border:1px solid var(--border-color); text-align:center;">
                        <i data-lucide="mail" style="color:var(--color-gold); margin-bottom:0.75rem; width:20px; height:20px;"></i>
                        <div style="font-size:0.65rem; text-transform:uppercase; letter-spacing:0.12em; color:var(--text-secondary); margin-bottom:0.3rem;">Email</div>
                        <div style="font-size:0.85rem; font-weight:600;">angel1120171@hotmail.com</div>
                    </div>
                </div>

                {{-- Ubicación --}}
                <div style="background:var(--bg-card); border-radius:var(--radius-md); border:1px solid var(--border-color); overflow:hidden; flex:1;">
                    <div style="height:130px; background:linear-gradient(135deg, #141014, #1a1a2e 50%, #111); display:flex; align-items:center; justify-content:center;">
                        <i data-lucide="map" style="color:var(--color-gold); width:48px; height:48px; opacity:0.5;"></i>
                    </div>
                    <div style="padding:1.75rem;">
                        <h4 style="font-size:1.1rem; margin-bottom:1.25rem;">Ubicación Central</h4>
                        <div style="display:flex; gap:0.75rem; margin-bottom:1rem;">
                            <i data-lucide="map-pin" style="color:var(--color-gold); flex-shrink:0; width:16px; height:16px; margin-top:2px;"></i>
                            <p style="color:var(--text-secondary); font-size:0.85rem; line-height:1.6;">Av. 23 de diciembre 199,<br>Frente a la loza deportiva, Lima, Perú</p>
                        </div>
                        <div style="display:flex; gap:0.75rem;">
                            <i data-lucide="clock" style="color:var(--color-gold); flex-shrink:0; width:16px; height:16px; margin-top:2px;"></i>
                            <p style="color:var(--text-secondary); font-size:0.85rem; line-height:1.6;">Lunes–Viernes: 09:00–20:00<br>Sábados: 10:00–14:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function sendContactEmail() {
    const name = document.getElementById('contactName').value;
    const email = document.getElementById('contactEmail').value;
    const subject = document.getElementById('contactSubject').value;
    const message = document.getElementById('contactMessage').value;

    if (!name || !email || !subject || !message) {
        showToast('Por favor, complete todos los campos antes de enviar.');
        return;
    }

    // Simulate sending
    showToast('¡Mensaje enviado! Nos pondremos en contacto con usted pronto.');
    
    // Clear form
    document.getElementById('contactName').value = '';
    document.getElementById('contactEmail').value = '';
    document.getElementById('contactSubject').value = '';
    document.getElementById('contactMessage').value = '';
}
</script>
@endpush
