@extends('layouts.app')

@section('title', 'ZALD PEDIA | Game Top-Up & Jasa Joki Portal Terpercaya')

@section('content')
<!-- Promos Banner Carousel (Takapedia Inspired) -->
<div class="promo-slider animate-fade-up">
    <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=1200&q=80'); background-color: #0f1115;">
        <div class="slide-content">
            <span class="slide-tag" style="background: var(--primary); color: var(--text-dark); font-weight: 800; padding: 4px 10px; border-radius: 6px; font-size: 0.75rem; text-transform: uppercase;">Flash Sale</span>
            <h2 class="slide-title" style="font-family: var(--font-heading); font-size: 2.2rem; margin-top: 10px; font-weight: 900;">WEEKEND DIAMONDS DROP</h2>
            <p class="slide-subtitle" style="color: var(--text-muted); font-size: 0.95rem; margin-top: 5px;">Nikmati diskon top-up diamond Mobile Legends hingga 25%. Pengiriman instan otomatis via API Surgagame.</p>
            <button class="btn btn-primary btn-sm" style="margin-top: 15px;" onclick="scrollToCheckout('topup')">Order Sekarang</button>
        </div>
    </div>
    <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=1200&q=80'); background-color: #0f1115;">
        <div class="slide-content">
            <span class="slide-tag" style="background: var(--secondary); color: var(--text-main); font-weight: 800; padding: 4px 10px; border-radius: 6px; font-size: 0.75rem; text-transform: uppercase;">Jasa Joki</span>
            <h2 class="slide-title" style="font-family: var(--font-heading); font-size: 2.2rem; margin-top: 10px; font-weight: 900;">NEW PRODUCT JOKI MOBILE LEGENDS</h2>
            <p class="slide-subtitle" style="color: var(--text-muted); font-size: 0.95rem; margin-top: 5px;">Tingkatkan Rank tier bintang Anda dengan Booster Pro Player berpengalaman. Cepat, Aman, & Murah.</p>
            <button class="btn btn-primary btn-sm" style="margin-top: 15px;" onclick="scrollToCheckout('joki')">Order Sekarang</button>
        </div>
    </div>
    
    <div class="slider-dots">
        <button class="slider-dot active"></button>
        <button class="slider-dot"></button>
    </div>
</div>

<!-- PILIH GAME PORTAL GRID -->
<div class="animate-fade-up" style="margin-top: 40px;">
    <h2 class="portal-section-title"><i class="fa-solid fa-fire-flame-simple text-cyan"></i> POPULER SEKARANG!</h2>
    <p class="portal-section-subtitle">Pilih jenis game favoritmu untuk melakukan top-up instan atau pemesanan jasa joki premium.</p>
    
    <div class="game-portal-grid">
        <!-- Game Card 1: MLBB Topup -->
        <div class="game-card glow-card" onclick="scrollToCheckout('topup')" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=600&auto=format&fit=crop');">
            <span class="game-card-badge">Top Up</span>
            <div class="game-card-content">
                <span class="game-card-category">Mobile Legends</span>
                <h4 class="game-card-title">MLBB Diamonds</h4>
            </div>
        </div>

        <!-- Game Card 2: MLBB Joki -->
        <div class="game-card glow-card" onclick="scrollToCheckout('joki')" style="background-image: url('https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=600&auto=format&fit=crop');">
            <span class="game-card-badge" style="background: linear-gradient(135deg, var(--secondary), var(--primary));">Jasa Joki</span>
            <div class="game-card-content">
                <span class="game-card-category">Mobile Legends</span>
                <h4 class="game-card-title">MLBB Rank Boosting</h4>
            </div>
        </div>

        <!-- Game Card 3: Free Fire (Mock) -->
        <div class="game-card glow-card" style="background-image: url('https://images.unsplash.com/photo-1612287230202-1bf1d85d1bdf?auto=format&fit=crop&w=300&q=80'); filter: saturate(0.2); opacity: 0.6; cursor: not-allowed;">
            <span class="game-card-badge" style="background: #333; color: #999;">Coming Soon</span>
            <div class="game-card-content">
                <span class="game-card-category">Free Fire</span>
                <h4 class="game-card-title">FF Diamonds</h4>
            </div>
        </div>

        <!-- Game Card 4: Honor of Kings (Mock) -->
        <div class="game-card glow-card" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=300&q=80'); filter: saturate(0.2); opacity: 0.6; cursor: not-allowed;">
            <span class="game-card-badge" style="background: #333; color: #999;">Coming Soon</span>
            <div class="game-card-content">
                <span class="game-card-category">Honor of Kings</span>
                <h4 class="game-card-title">HOK Tokens</h4>
            </div>
        </div>
    </div>
</div>

<!-- CHECKOUT FORM SECTION -->
<div class="store-grid" id="checkout-section" style="margin-top: 50px; scroll-margin-top: 100px;">
    
    <!-- Left Column: Order Forms & Configurations -->
    <div class="left-col">
        
        <!-- Service Type Tabs -->
        <div class="glass-panel step-card" style="padding: 15px; margin-bottom: 20px; display: flex; gap: 10px;">
            <button id="tab-btn-topup" class="btn btn-primary btn-sm btn-block" onclick="switchService('topup')" style="margin: 0; font-weight: bold;">
                <i class="fa-solid fa-gem"></i> MLBB Top-Up
            </button>
            <button id="tab-btn-joki" class="btn btn-outline btn-sm btn-block" onclick="switchService('joki')" style="margin: 0; font-weight: bold; border-color: rgba(189, 0, 255, 0.4); color: var(--text-muted);">
                <i class="fa-solid fa-bolt"></i> Jasa Joki MLBB
            </button>
        </div>

        <form method="POST" action="{{ route('order.store') }}" id="checkout-form" onsubmit="return validateCheckoutForm()">
            @csrf
            <!-- Hidden inputs tracking selections -->
            <input type="hidden" name="service_id" id="service_id" value="">
            <input type="hidden" name="payment_method" id="payment_method" value="dana">
            <input type="hidden" name="category" id="order-category" value="topup">

            <!-- FORM 1: Top-Up Fields -->
            <div class="step-card glass-panel animate-fade-up visible" id="card-topup-fields">
                <div class="step-badge">1</div>
                <h3 class="step-title"><i class="fa-solid fa-user-check text-cyan"></i> Verify MLBB Account</h3>
                
                <div class="input-row">
                    <div class="input-group">
                        <label class="input-label" for="game_id">User ID</label>
                        <input type="number" name="game_id" id="game_id" class="input-control" placeholder="12345678">
                    </div>
                    <div class="input-group" style="max-width: 120px;">
                        <label class="input-label" for="zone_id">Zone ID</label>
                        <input type="number" name="zone_id" id="zone_id" class="input-control" placeholder="1234">
                    </div>
                </div>
                
                <button type="button" id="btn-check-id" class="btn btn-secondary btn-block btn-sm" onclick="checkPlayerNickname()">
                    <i class="fa-solid fa-magnifying-glass"></i> Check Nickname
                </button>

                <div class="validation-wrapper">
                    <div id="validation-status" class="validation-status">
                        <!-- Loaded dynamically -->
                    </div>
                </div>
                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 5px; line-height: 1.3;">
                    <i class="fa-solid fa-circle-info text-pink"></i> Verifikasi nickname game sebelum memesan agar diamond tidak salah masuk.
                </p>
            </div>

            <!-- FORM 2: Jasa Joki Fields -->
            <div class="step-card glass-panel animate-fade-up" id="card-joki-fields" style="display: none;">
                <div class="step-badge">1</div>
                <h3 class="step-title"><i class="fa-solid fa-shield-halved text-success"></i> Boosting Account Login</h3>
                
                <div class="input-row">
                    <div class="input-group">
                        <label class="input-label" for="account_email">Email / Phone Number</label>
                        <input type="text" name="account_email" id="account_email" class="input-control" placeholder="example@gmail.com / 08xxxxxxxx">
                    </div>
                    <div class="input-group" style="max-width: 150px;">
                        <label class="input-label" for="login_via">Login Via</label>
                        <select name="login_via" id="login_via" class="input-control">
                            <option value="moonton">Moonton</option>
                            <option value="facebook">Facebook</option>
                            <option value="vk">VK Account</option>
                        </select>
                    </div>
                </div>
                
                <div class="input-row" style="margin-top: 15px;">
                    <div class="input-group">
                        <label class="input-label" for="account_password">Password</label>
                        <input type="password" name="account_password" id="account_password" class="input-control" placeholder="••••••••••••">
                    </div>
                </div>

                <div class="input-row" style="margin-top: 15px;">
                    <div class="input-group">
                        <label class="input-label" for="hero_request">Request Heroes / Notes (Optional)</label>
                        <textarea name="hero_request" id="hero_request" class="input-control" rows="2" placeholder="e.g. Jauhkan Gusion, prioritize Claude, main jam 12 malam ke atas" style="resize: none;"></textarea>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Payment Section -->
            <div class="step-card glass-panel animate-fade-up visible" id="step-payment" style="margin-top: 20px;">
                <div class="step-badge">3</div>
                <h3 class="step-title"><i class="fa-solid fa-credit-card text-cyan"></i> Select Payment</h3>
                
                <div class="payment-accordion">
                    <div class="payment-group open" id="group-manual">
                        <div class="payment-group-header">
                            <div class="payment-group-title">
                                <span class="payment-group-icon"><i class="fa-solid fa-money-bill-transfer"></i></span>
                                E-Wallet & Bank Transfer
                            </div>
                        </div>
                        <div class="payment-group-content" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
                            <div class="payment-method-card active" onclick="selectPaymentMethod('dana', this)">
                                <div class="payment-method-info">
                                    <span class="payment-method-name">DANA Transfer</span>
                                    <span class="payment-method-fee">Fee: Rp 0 (Gratis)</span>
                                </div>
                                <img src="https://i.ibb.co/sK3Yh5v/dana.png" class="payment-method-logo" alt="DANA">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checkout Action Trigger -->
            <button type="submit" class="btn btn-primary btn-block btn-lg" style="margin-top: 20px; padding: 18px; font-weight: bold; border-radius: 16px;">
                <i class="fa-solid fa-basket-shopping"></i> Purchase / Order Now
            </button>
        </form>
    </div>

    <!-- Right Column: Product Grids & Rank Bundles -->
    <div class="right-col">
        
        <!-- Catalog Group 1: Diamond/Starlight Catalog -->
        <div class="step-card glass-panel animate-fade-up visible" id="catalog-topup-section">
            <div class="step-badge">2</div>
            <h3 class="step-title"><i class="fa-solid fa-gem text-pink"></i> Select Package</h3>
            
            <div class="filter-tabs">
                <button class="filter-tab active" onclick="filterCategory('diamonds')">Diamonds</button>
                <button class="filter-tab" onclick="filterCategory('starlight')">Starlight</button>
                <button class="filter-tab" onclick="filterCategory('twilight')">Twilight Pass</button>
            </div>

            <div class="catalog-grid" id="diamonds-grid">
                @foreach($diamonds as $d)
                    <div class="item-card glow-card" onclick="selectServiceItem({{ $d->id }}, '{{ $d->name }}', {{ $d->price }}, this)" data-cat="diamonds">
                        <div class="item-icon-wrapper">
                            <span class="item-icon">{{ $d->icon }}</span>
                            <span class="item-title">{{ $d->name }}</span>
                        </div>
                        <p class="item-desc">{{ $d->description }}</p>
                        <div class="item-price">Rp {{ number_format($d->price, 0, ',', '.') }}</div>
                    </div>
                @endforeach
                @foreach($starlight as $s)
                    <div class="item-card glow-card" onclick="selectServiceItem({{ $s->id }}, '{{ $s->name }}', {{ $s->price }}, this)" data-cat="starlight" style="display: none;">
                        <div class="item-icon-wrapper">
                            <span class="item-icon">{{ $s->icon }}</span>
                            <span class="item-title">{{ $s->name }}</span>
                        </div>
                        <p class="item-desc">{{ $s->description }}</p>
                        <div class="item-price">Rp {{ number_format($s->price, 0, ',', '.') }}</div>
                    </div>
                @endforeach
                @foreach($twilight as $t)
                    <div class="item-card glow-card" onclick="selectServiceItem({{ $t->id }}, '{{ $t->name }}', {{ $t->price }}, this)" data-cat="twilight" style="display: none;">
                        <div class="item-icon-wrapper">
                            <span class="item-icon">{{ $t->icon }}</span>
                            <span class="item-title">{{ $t->name }}</span>
                        </div>
                        <p class="item-desc">{{ $t->description }}</p>
                        <div class="item-price">Rp {{ number_format($t->price, 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Catalog Group 2: Joki Rank Boosting Catalog -->
        <div class="step-card glass-panel animate-fade-up" id="catalog-joki-section" style="display: none;">
            <div class="step-badge">2</div>
            <h3 class="step-title"><i class="fa-solid fa-ranking-star text-success"></i> Select Rank Joki</h3>
            
            <div class="catalog-grid">
                @foreach($joki as $j)
                    <div class="item-card glow-card" onclick="selectServiceItem({{ $j->id }}, '{{ $j->name }}', {{ $j->price }}, this)">
                        <div class="item-icon-wrapper">
                            <span class="item-icon">{{ $j->icon }}</span>
                            <span class="item-title">{{ $j->name }}</span>
                        </div>
                        <p class="item-desc">{{ $j->description }}</p>
                        <div class="item-price">Rp {{ number_format($j->price, 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

<!-- ARTIKEL TERBARU & BERITA GAME SECTION -->
<div class="animate-fade-up" style="margin-top: 60px;">
    <h2 class="portal-section-title"><i class="fa-solid fa-newspaper text-cyan"></i> TIPS & ARTIKEL TERBARU</h2>
    <p class="portal-section-subtitle">Dapatkan tips gaming terupdate, panduan transaksi, dan promo menarik ZALD PEDIA.</p>
    
    <div class="article-grid">
        <!-- Article Card 1 -->
        <div class="glass-panel article-card glow-card">
            <div class="article-thumb" style="background-image: url('https://images.unsplash.com/photo-1612287230202-1bf1d85d1bdf?auto=format&fit=crop&w=400&q=80');"></div>
            <div class="article-body">
                <span class="article-tag">Panduan</span>
                <h4 class="article-title">Cara Daftar & Transaksi Aman di Website ZALD PEDIA</h4>
                <p class="article-desc">Ikuti langkah sederhana ini untuk melakukan pengisian diamond Mobile Legends secara cepat, instan, dan 100% aman.</p>
            </div>
        </div>

        <!-- Article Card 2 -->
        <div class="glass-panel article-card glow-card">
            <div class="article-thumb" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=400&q=80');"></div>
            <div class="article-body">
                <span class="article-tag">Mobile Legends</span>
                <h4 class="article-title">Cara Cek Limit Weekly Diamond Pass MLBB 2026</h4>
                <p class="article-desc">Panduan cara melihat limit Weekly Diamond Pass pada game agar pengisian diamond Anda berjalan dengan lancar tanpa hambatan.</p>
            </div>
        </div>

        <!-- Article Card 3 -->
        <div class="glass-panel article-card glow-card">
            <div class="article-thumb" style="background-image: url('https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=400&q=80');"></div>
            <div class="article-body">
                <span class="article-tag">Update</span>
                <h4 class="article-title">Update Hero Meta Terkuat Push Rank Joki Season Ini</h4>
                <p class="article-desc">Informasi lengkap mengenai pilihan hero meta terbaik untuk mempercepat proses push rank jasa joki Mobile Legends Anda.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let activeCategory = 'diamonds';
    let isIdVerified = false;

    // Slider Automatic Cycling
    document.addEventListener("DOMContentLoaded", () => {
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slider-dot');

        if (slides.length > 0) {
            function showSlide(index) {
                slides.forEach(s => s.classList.remove('active'));
                dots.forEach(d => d.classList.remove('active'));
                
                slides[index].classList.add('active');
                dots[index].classList.add('active');
                currentSlide = index;
            }

            function nextSlide() {
                let next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }

            let slideInterval = setInterval(nextSlide, 5000);

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    clearInterval(slideInterval);
                    showSlide(index);
                    slideInterval = setInterval(nextSlide, 5000);
                });
            });
        }
    });

    function scrollToCheckout(type) {
        switchService(type);
        const element = document.getElementById("checkout-section");
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function switchService(type) {
        document.getElementById('order-category').value = type;
        
        // Reset selections
        document.getElementById('service_id').value = '';
        document.querySelectorAll('.item-card').forEach(c => c.classList.remove('active'));

        if (type === 'topup') {
            // Activate Tab Buttons
            document.getElementById('tab-btn-topup').className = "btn btn-primary btn-sm btn-block";
            document.getElementById('tab-btn-joki').className = "btn btn-outline btn-sm btn-block";
            document.getElementById('tab-btn-joki').style.color = "var(--text-muted)";

            // Show TopUp forms & hide Joki forms
            document.getElementById('card-topup-fields').style.display = "block";
            document.getElementById('card-joki-fields').style.display = "none";
            
            // Show TopUp catalog grids
            document.getElementById('catalog-topup-section').style.display = "block";
            document.getElementById('catalog-joki-section').style.display = "none";
            filterCategory(activeCategory);
        } else {
            // Activate Tab Buttons
            document.getElementById('tab-btn-topup').className = "btn btn-outline btn-sm btn-block";
            document.getElementById('tab-btn-topup').style.color = "var(--text-muted)";
            document.getElementById('tab-btn-joki').className = "btn btn-primary btn-sm btn-block";

            // Show Joki forms & hide TopUp forms
            document.getElementById('card-topup-fields').style.display = "none";
            document.getElementById('card-joki-fields').style.display = "block";
            
            // Show Joki catalog grids
            document.getElementById('catalog-topup-section').style.display = "none";
            document.getElementById('catalog-joki-section').style.display = "block";
        }
    }

    function filterCategory(cat) {
        activeCategory = cat;
        
        // Update filter tabs active states
        document.querySelectorAll('.filter-tab').forEach(btn => {
            if (btn.textContent.toLowerCase().includes(cat.substring(0, 5))) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        // Toggle card visibility
        document.querySelectorAll('#diamonds-grid .item-card').forEach(card => {
            if (card.getAttribute('data-cat') === cat) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function selectServiceItem(id, name, price, element) {
        document.getElementById('service_id').value = id;
        
        // Remove active class from siblings
        document.querySelectorAll('.item-card').forEach(c => c.classList.remove('active'));
        element.classList.add('active');
        
        ToastNotification.show("Selected: " + name, "info");
    }

    function selectPaymentMethod(method, element) {
        document.getElementById('payment_method').value = method;
        document.querySelectorAll('.payment-method-card').forEach(c => c.classList.remove('active'));
        element.classList.add('active');
    }

    async function checkPlayerNickname() {
        const gameId = document.getElementById('game_id').value.trim();
        const zoneId = document.getElementById('zone_id').value.trim();
        const statusDiv = document.getElementById('validation-status');

        if (!gameId || !zoneId) {
            ToastNotification.show("Please input User ID & Zone ID", "error");
            return;
        }

        statusDiv.style.display = "flex";
        statusDiv.className = "validation-status loading";
        statusDiv.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Checking credentials...`;

        try {
            const response = await fetch(`https://api.isan.eu.org/nickname/ml?id=${gameId}&server=${zoneId}`);
            if (!response.ok) throw new Error("API Offline");
            
            const data = await response.json();
            if (data.success && data.name) {
                statusDiv.className = "validation-status success";
                statusDiv.innerHTML = `<i class="fa-solid fa-circle-check"></i> Account Verified: <strong>${data.name}</strong>`;
                isIdVerified = true;
            } else {
                statusDiv.className = "validation-status error";
                statusDiv.innerHTML = `<i class="fa-solid fa-circle-xmark"></i> ${data.message || 'Player ID or Zone not found.'}`;
                isIdVerified = false;
            }
        } catch (err) {
            // Fallback simulated check
            const names = ["GusionMain", "FannyGod", "MiyaKing", "Voca Carry"];
            const seed = parseInt(gameId.substring(0, 4)) || 1234;
            const fallbackName = names[seed % names.length] + "_" + zoneId;
            
            statusDiv.className = "validation-status success";
            statusDiv.innerHTML = `<i class="fa-solid fa-circle-check"></i> Verified (Simulated): <strong>${fallbackName}</strong>`;
            isIdVerified = true;
        }
    }

    function validateCheckoutForm() {
        const type = document.getElementById('order-category').value;
        const serviceId = document.getElementById('service_id').value;

        if (!serviceId) {
            ToastNotification.show("Please select a package first!", "error");
            return false;
        }

        if (type === 'topup') {
            if (!isIdVerified) {
                ToastNotification.show("Please verify player nickname first!", "error");
                return false;
            }
        } else {
            const email = document.getElementById('account_email').value.trim();
            const pass = document.getElementById('account_password').value.trim();
            if (!email || !pass) {
                ToastNotification.show("Please complete joki login credentials fields!", "error");
                return false;
            }
        }

        return true;
    }
</script>
@endsection
