<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ZALD PEDIA | Premium Gaming Top-Up & Boosting Store')</title>
    <meta name="description" content="Instant, secure, and automated Mobile Legends top-up and Joki rank boosting. Buy diamonds, starlight member, and Twilight Pass.">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- FontAwesome CDN for Gaming Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body>

    <!-- Header Navbar -->
    <header>
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo brand-pulse">
                <span class="logo-icon"><i class="fa-solid fa-gamepad"></i></span>
                <span class="logo-text">ZALD<span class="text-pink"> PEDIA</span></span>
            </a>
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link active"><i class="fa-solid fa-house"></i> Home</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Layout Container -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div style="max-width: 1200px; margin: 0 auto; padding: 40px 24px; border-bottom: 1px solid var(--border-color);">
            <div class="footer-grid">
                
                <!-- Column 1: Brand Info -->
                <div class="footer-col">
                    <a href="{{ route('home') }}" class="logo brand-pulse" style="margin-bottom: 10px; display: inline-flex;">
                        <span class="logo-icon"><i class="fa-solid fa-gamepad"></i></span>
                        <span class="logo-text">ZALD<span class="text-pink"> PEDIA</span></span>
                    </a>
                    <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.6;">
                        ZALD PEDIA adalah platform penyedia layanan Top-Up Game & Jasa Joki Rank Boosting Terpercaya, Tercepat, dan Termurah di Indonesia. Transaksi otomatis diproses 24 Jam Non-Stop!
                    </p>
                    <div class="footer-social-links">
                        <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://wa.me/6285135689013" target="_blank" class="social-icon"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="https://telegram.org" target="_blank" class="social-icon"><i class="fa-brands fa-telegram"></i></a>
                    </div>
                </div>

                <!-- Column 2: Sitemap -->
                <div class="footer-col">
                    <h4 style="font-family: var(--font-heading); color: var(--text-main); font-weight: 800; font-size: 1.15rem; border-bottom: 2px solid var(--primary); padding-bottom: 8px; width: fit-content; margin-bottom: 15px;">Peta Situs</h4>
                    <ul class="footer-links-list">
                        <li class="footer-link-item"><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right text-pink" style="font-size:0.7rem;"></i> Beranda</a></li>
                        <li class="footer-link-item"><a href="#catalog-topup-section"><i class="fa-solid fa-chevron-right text-pink" style="font-size:0.7rem;"></i> Top-Up Game</a></li>
                        <li class="footer-link-item"><a href="#catalog-joki-section"><i class="fa-solid fa-chevron-right text-pink" style="font-size:0.7rem;"></i> Jasa Joki</a></li>
                    </ul>
                </div>

                <!-- Column 3: Dukungan & Bantuan -->
                <div class="footer-col">
                    <h4 style="font-family: var(--font-heading); color: var(--text-main); font-weight: 800; font-size: 1.15rem; border-bottom: 2px solid var(--primary); padding-bottom: 8px; width: fit-content; margin-bottom: 15px;">Dukungan</h4>
                    <ul class="footer-links-list">
                        <li class="footer-link-item"><a href="https://wa.me/6285135689013" target="_blank"><i class="fa-solid fa-envelope text-pink" style="font-size:0.8rem;"></i> Customer Service</a></li>
                        <li class="footer-link-item"><a href="https://wa.me/6285135689013" target="_blank"><i class="fa-solid fa-circle-question text-pink" style="font-size:0.8rem;"></i> Bantuan Order</a></li>
                    </ul>
                </div>

                <!-- Column 4: Metode Pembayaran -->
                <div class="footer-col">
                    <h4 style="font-family: var(--font-heading); color: var(--text-main); font-weight: 800; font-size: 1.15rem; border-bottom: 2px solid var(--primary); padding-bottom: 8px; width: fit-content; margin-bottom: 15px;">Metode Pembayaran</h4>
                    <div class="payment-logo-grid">
                        <div class="payment-logo-item"><img src="https://i.ibb.co/sK3Yh5v/dana.png" alt="DANA"></div>
                        <div class="payment-logo-item"><img src="https://i.ibb.co/q9r62vW/gopay.png" alt="GOPAY"></div>
                        <div class="payment-logo-item"><img src="https://i.ibb.co/K2J9B62/ovo.png" alt="OVO"></div>
                        <div class="payment-logo-item"><img src="https://i.ibb.co/jH0wXqC/shopeepay.png" alt="ShopeePay"></div>
                        <div class="payment-logo-item"><img src="https://i.ibb.co/P4N4cwy/qris.png" alt="QRIS"></div>
                        <div class="payment-logo-item"><img src="https://i.ibb.co/b3wH07W/linkaja.png" alt="LinkAja"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 ZALD PEDIA. Inspired by Takapedia & Aoshimarket. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Animations system -->
    <script src="{{ asset('js/animations.js') }}"></script>
    @yield('scripts')
</body>
</html>
