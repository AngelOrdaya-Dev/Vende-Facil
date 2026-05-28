<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="VendeFácil — Curaduría de excelencia para el consumidor moderno. Tecnología y lujo en cada detalle.">
    <title>@yield('title', 'VendeFácil | La Definición de la Excelencia Digital')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="/js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* SweetAlert2 custom theme */
        .swal-vendefacil .swal2-popup {
            background: #111 !important;
            border: 1px solid #2a2a2a !important;
            color: #f0ede8 !important;
            border-radius: 8px !important;
            font-family: 'Inter', sans-serif !important;
        }
        .swal-vendefacil .swal2-title { color: #f0ede8 !important; font-family: 'Cormorant Garamond', serif !important; }
        .swal-vendefacil .swal2-html-container { color: #a0998e !important; }
        .swal-vendefacil .swal2-confirm {
            background: #e5b94e !important;
            color: #0d0d0d !important;
            font-weight: 700 !important;
            border-radius: 4px !important;
            border: none !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
        }
        .swal-vendefacil .swal2-cancel {
            background: transparent !important;
            color: #a0998e !important;
            border: 1px solid #2a2a2a !important;
            border-radius: 4px !important;
            font-weight: 600 !important;
        }
        .swal-vendefacil .swal2-icon.swal2-success { border-color: #e5b94e !important; }
        .swal-vendefacil .swal2-icon.swal2-success [class^='swal2-success-line'] { background: #e5b94e !important; }
        .swal-vendefacil .swal2-icon.swal2-success .swal2-success-ring { border-color: #e5b94e50 !important; }
        .swal-vendefacil .swal2-icon.swal2-warning { border-color: #e5b94e !important; color: #e5b94e !important; }
    </style>
</head>
<body>

    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <span>✦</span> &nbsp; Envío VIP gratuito en pedidos superiores a <span>$500</span> &nbsp; <span>✦</span> &nbsp; Atención al cliente Lunes–Sábado &nbsp; <span>✦</span>
    </div>

    <!-- Sticky Navbar -->
    <div class="navbar-wrap" id="navbar">
        <div class="container">
            <nav>
                <!-- Mobile Hamburger -->
                <button class="hamburger icon-btn" id="menuBtn" aria-label="Abrir menú">
                    <i data-lucide="menu"></i>
                </button>

                <!-- Left Nav Links -->
                <div class="nav-links" id="navLinks">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a>
                    <a href="/shop" class="{{ request()->is('shop') ? 'active' : '' }}">Colecciones</a>
                    <a href="/#soporte" class="{{ request()->is('soporte') ? 'active' : '' }}">Soporte</a>
                </div>

                <!-- Logo (centered) -->
                <a href="/" class="logo">VENDEFÁCIL</a>

                <!-- Right Icons -->
                <div class="nav-icons">
                    <button class="icon-btn" aria-label="Buscar" id="searchBtn">
                        <i data-lucide="search"></i>
                    </button>
                    <a href="/cart" class="icon-btn cart-badge" aria-label="Ver carrito">
                        <i data-lucide="shopping-bag"></i>
                        <span class="badge">3</span>
                    </a>
                    <a href="/orders" class="icon-btn" aria-label="Mis Pedidos">
                        <i data-lucide="list" style="width: 20px; height: 20px;"></i>
                    </a>
                </div>
            </nav>
            
            <!-- Custom Search Overlay -->
            <div id="searchOverlay" style="display:none; position:absolute; top:100%; left:0; width:100%; background:rgba(17,17,17,0.98); padding:2rem 0; border-top:1px solid var(--border-color); border-bottom:1px solid var(--border-color); z-index:999; box-shadow:0 10px 30px rgba(0,0,0,0.8); backdrop-filter:blur(10px);">
                <div class="container" style="display:flex; gap:1rem; max-width:600px;">
                    <input type="text" id="searchInput" placeholder="Buscar relojes, audífonos..." style="flex:1; background:transparent; border:none; border-bottom:2px solid var(--color-gold); color:white; font-size:1.25rem; outline:none; padding:0.5rem 0; font-family:var(--font-body);">
                    <button class="btn btn-primary" onclick="executeSearch()">Buscar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Brand -->
                <div>
                    <a href="/" class="logo" style="display:inline-block; margin-bottom: 1.5rem;">VENDEFÁCIL</a>
                    <p class="footer-desc">Curaduría de excelencia para el consumidor moderno. Tecnología y lujo en cada detalle.</p>
                </div>

                <!-- Navegación -->
                <div>
                    <h4 class="footer-col-title">Navegación</h4>
                    <div class="footer-links">
                        <a href="/shop">Colecciones</a>
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Sostenibilidad')">Sostenibilidad</a>
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Atelier Privado')">Atelier Privado</a>
                        <a href="/#soporte">Contacto</a>
                    </div>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="footer-col-title">Legal</h4>
                    <div class="footer-links">
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Términos')">Términos de Servicio</a>
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Privacidad')">Privacidad</a>
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Cookies')">Cookies</a>
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Envío VIP')">Envío VIP</a>
                        <a href="javascript:void(0)" onclick="showToast('Próximamente: Garantía')">Garantía Aura</a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 class="footer-col-title">Newsletter</h4>
                    <p class="footer-desc" style="margin-bottom: 1.25rem;">Únete al círculo exclusivo y recibe acceso anticipado a nuevas colecciones.</p>
                    <div class="newsletter-row" id="newsletterForm">
                        <input type="email" id="newsletterEmail" placeholder="Tu email" aria-label="Correo para newsletter" required>
                        <button type="button" class="btn btn-primary" aria-label="Suscribirse" onclick="subscribeNewsletter()">
                            <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="footer-copy">© 2026 VENDEFÁCIL. TODOS LOS DERECHOS RESERVADOS.</p>
                <div class="footer-bottom-links">
                    <a href="javascript:void(0)" onclick="showToast('Próximamente: Privacidad')">Privacidad</a>
                    <a href="javascript:void(0)" onclick="showToast('Próximamente: Términos')">Términos</a>
                    <a href="javascript:void(0)" onclick="showToast('Próximamente: Cookies')">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <button class="float-btn" id="whatsappBtn" aria-label="WhatsApp Concierge" onclick="window.open('https://wa.me/51954827167', '_blank')">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.091.534 4.058 1.47 5.77L0 24l6.364-1.47A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.87 0-3.63-.48-5.165-1.32l-.37-.217-3.779.872.888-3.689-.24-.38A9.96 9.96 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
        </svg>
    </button>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        });

        // Reveal on scroll (Intersection Observer)
        const revealEls = document.querySelectorAll('.reveal');
        if (revealEls.length) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });
            revealEls.forEach(el => observer.observe(el));
        }

        // Mobile menu toggle
        const menuBtn = document.getElementById('menuBtn');
        const navLinks = document.getElementById('navLinks');
        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
                navLinks.style.flexDirection = 'column';
                navLinks.style.position = 'absolute';
                navLinks.style.top = '100%';
                navLinks.style.left = '0';
                navLinks.style.right = '0';
                navLinks.style.background = 'rgba(13,13,13,0.98)';
                navLinks.style.padding = '1.5rem 2rem';
                navLinks.style.borderTop = '1px solid #2a2a2a';
                navLinks.style.zIndex = '999';
            });
        }

        // Global Toast Notification
        function showToast(message) {
            const toast = document.createElement('div');
            toast.innerText = message;
            toast.style.position = 'fixed';
            toast.style.bottom = '2rem';
            toast.style.left = '50%';
            toast.style.transform = 'translateX(-50%)';
            toast.style.background = 'var(--color-gold)';
            toast.style.color = '#000';
            toast.style.padding = '1rem 2rem';
            toast.style.borderRadius = '30px';
            toast.style.fontWeight = '600';
            toast.style.zIndex = '9999';
            toast.style.boxShadow = '0 10px 20px rgba(0,0,0,0.5)';
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.3s ease';
            document.body.appendChild(toast);
            
            setTimeout(() => toast.style.opacity = '1', 10);
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        // Custom Search Logic
        function executeSearch() {
            const query = document.getElementById('searchInput').value;
            if(query.trim() !== '') window.location.href = '/shop?q=' + encodeURIComponent(query.trim());
        }

        // Enter key for search
        document.getElementById('searchInput')?.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') executeSearch();
        });

        // Newsletter Subscription
        function subscribeNewsletter() {
            const email = document.getElementById('newsletterEmail').value;
            if (!email) {
                showToast('Por favor ingresa tu email.');
                return;
            }
            // Simulating email send
            showToast(`¡Suscripción exitosa! Se ha enviado una confirmación a angel1120171@hotmail.com`);
            document.getElementById('newsletterEmail').value = '';
        }
    </script>

    @stack('scripts')
</body>
</html>
