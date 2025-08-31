<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAYX - Empowering a Spiritual Web3 Future</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Arial', sans-serif;
            background: #000;
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .hero { text-align: center; padding: 80px 0 60px 0; position: relative; }
        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at center, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 40px;
            background: linear-gradient(45deg, #ffd700, #ffed4e, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.3);
            animation: glow 2s ease-in-out infinite alternate;
        }
        @keyframes  glow {
            from { text-shadow: 0 0 30px rgba(255, 215, 0, 0.3); }
            to { text-shadow: 0 0 40px rgba(255, 215, 0, 0.6); }
        }
        .symbol-image { width: 100%; height: 100%; object-fit: contain; pointer-events: none; }
        .token-symbol {
            width: 200px; height: 200px; margin: 40px auto;
            background: transparent; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 4rem; font-weight: bold; color: #1a0d2e;
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.5),
                        0 0 100px rgba(255, 215, 0, 0.3),
                        inset 0 0 30px rgba(255, 255, 255, 0.2);
            animation: pulse 3s ease-in-out infinite; position: relative;
        }
        .token-symbol::before {
            content: '';
            position: absolute;
            inset: -20px;
            background: url('assets/MAYX_coin_Ring.png') no-repeat center center;
            background-size: contain;
            z-index: -1;
            animation: rotate 6s linear infinite;
        }
        @keyframes  pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes  rotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        
        /* Dynamic Countdown styles */
        .countdown {
            display: flex; justify-content: center; align-items: center; margin: 30px 0 0 0; gap: 15px;
            font-family: inherit; list-style: none;
        }
        .countdown li { text-align: center; }
        .countdown .seperator {
            width: 10px; height: 0; border-left: 2px solid #ffd700; margin: 0 10px; opacity: 0.6;
        }
        .countdown span {
            font-size: 2.4rem;
            font-weight: bold;
            color: #ffd700;
            display: block;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        }
        .countdown p {
            font-size: 0.9rem;
            color: #fff;
            opacity: 0.7;
            margin-top: 2px;
            text-transform: uppercase;
        }
        
        /* Sale Status */
        .sale-status {
            margin: 20px 0;
            padding: 15px 30px;
            border-radius: 25px;
            background: rgba(255, 215, 0, 0.1);
            border: 2px solid rgba(255, 215, 0, 0.3);
            font-size: 1.1rem;
            font-weight: bold;
        }
        .sale-status.active { color: #4CAF50; border-color: #4CAF50; }
        .sale-status.ended { color: #f44336; border-color: #f44336; }
        
        .action-buttons { display: flex; gap: 20px; justify-content: center; margin: 40px 0; flex-wrap: wrap; }
        .btn { padding: 15px 30px; border: 2px solid #ffd700; background: rgba(255, 215, 0, 0.1); color: #ffd700;
            text-decoration: none; border-radius: 30px; font-weight: bold; transition: all 0.3s ease; backdrop-filter: blur(10px);
        }
        .btn:hover {
            background: #ffd700; color: #1a0d2e; transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }
        .btn.primary { background: linear-gradient(45deg, #ffd700, #ffed4e); color: #1a0d2e;}
        .btn.primary:hover { transform: translateY(-2px) scale(1.05);}
        
        /* Token Utility, section-title, utility grid, roadmap etc. unchanged */
        .utility-section { padding: 80px 0; }
        .section-title { font-size: 2.5rem; text-align: center; margin-bottom: 60px; color: #ffd700; }
        .utility-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;
            max-width: 1000px; margin: 0 auto;
        }
        .utility-card {
            background: rgba(255, 215, 0, 0.05);
            border: 2px solid rgba(255, 215, 0, 0.2);
            border-radius: 20px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            text-decoration: none;
            color: inherit;
            display: block;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .utility-card h3, .utility-card p {
            text-decoration: none; color: inherit; transition: color 0.3s, text-shadow 0.3s;
        }
        .utility-card:hover h3, .utility-card:hover p { color: #ffd700; text-shadow: 0 0 8px rgba(255,215,0,0.7);}
        .utility-card:hover { transform: translateY(-10px); border-color: #ffd700; box-shadow: 0 20px 40px rgba(255,215,0,0.2);}
        .utility-icon { font-size: 3rem; color: #ffd700; margin-bottom: 20px; display: block; }
        .utility-title { font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #ffd700; }
        .utility-desc { color: #ccc; font-size: 0.9rem; }
        .roadmap-section { padding: 80px 0; background: rgba(0,0,0,0.2);}
        .roadmap-timeline { display: flex; justify-content: space-between; align-items: center; max-width: 900px; margin: 60px auto 0; position: relative; flex-wrap: wrap; }
        .roadmap-timeline::before { content: ''; position: absolute; top: 50%; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, #ffd700, #ffed4e, #ffd700); z-index: 1;}
        .roadmap-item { text-align: center; z-index: 2; background: #1a0d2e; padding: 20px; border-radius: 10px; min-width: 150px; margin: 10px;}
        .roadmap-dot { width: 20px; height: 20px; border-radius: 50%; background: #ffd700; margin: 0 auto 10px; box-shadow: 0 0 20px rgba(255, 215, 0, 0.5);}
        .roadmap-title { font-weight: bold; color: #ffd700; margin-bottom: 5px;}
        .roadmap-date { font-size: 0.9rem; color: #ccc;}
        .footer { padding: 60px 0 40px 0; text-align: center;}
        .social-links { display: flex; justify-content: center; gap: 30px; margin-bottom: 40px; flex-wrap: wrap;}
        .social-link { color: #ffd700; text-decoration: none; font-size: 1.2rem; transition: all 0.3s;}
        .social-link:hover { transform: translateY(-3px); text-shadow: 0 5px 10px rgba(255,215,0,0.5);}
        .footer-info { display: flex; justify-content: space-between; align-items: center; max-width: 600px; margin: 0 auto; flex-wrap: wrap; gap: 20px;}
        .contract-info { font-size: 0.9rem; color: #ccc;}
        .contract-address { color: #ffd700; font-family: monospace;}
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .token-symbol { width: 150px;height: 150px;font-size: 3rem;}
            .utility-grid { grid-template-columns: 1fr; }
            .roadmap-timeline { flex-direction: column; gap: 20px; }
            .roadmap-timeline::before { display: none; }
            .footer-info { flex-direction: column; text-align: center; }
            .countdown span { font-size: 1.8rem; }
        }
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px; height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #1a0d2e;
            font-size: 1.5rem;
            font-weight: bold;
            border: none;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(255, 215, 0, 0.4);
            transition: opacity 0.4s ease, transform 0.3s ease;
            opacity: 0; visibility: hidden; z-index: 999;
        }
        #backToTop:hover { transform: scale(1.1) translateY(-3px);}
        #backToTop.show { opacity: 1; visibility: visible;}
        #bgAudio { display: none; }
        #bgGif { position: fixed; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;}
        #soundToggle {
            position: fixed; bottom: 100px; right: 30px;
            padding: 10px 15px;
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #1a0d2e; border: none; border-radius: 8px; cursor: pointer;
            font-weight: bold; z-index: 1000;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: transform 0.2s;
        }
        #soundToggle:hover { transform: scale(1.1);}
        .floating-particle {
            position: absolute; width: 4px; height: 4px;
            background: #ffd700; border-radius: 50%; opacity: 0.6;
            animation: float 6s ease-in-out infinite;
        }
        @keyframes  float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.6; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
        }
    </style>
</head>
<body>
    <img src="assets/background.gif" id="bgGif">

    <audio id="bgAudio" loop>
        <source src="assets/background.mp3" type="audio/mpeg">
    </audio>

    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <h1 class="hero-title">
                Empowering a<br>
                Spiritual Web3 Future
            </h1>

            <div class="token-symbol">
                <img src="assets/MAYX_coin_M.png" alt="MAYX Coin Symbol" class="symbol-image">
            </div>

            <!-- Dynamic Countdown Timer -->
            <ul class="countdown" id="countdown">
                <li>
                    <span class="days" id="dayls">0</span>
                    <p class="days_ref">days</p>
                </li>
                <li class="seperator"></li>
                <li>
                    <span class="hours" id="hours">0</span>
                    <p class="hours_ref">hours</p>
                </li>
                <li class="seperator"></li>
                <li>
                    <span class="minutes" id="minutes">0</span>
                    <p class="minutes_ref">minutes</p>
                </li>
                <li class="seperator"></li>
                <li>
                    <span class="seconds" id="seconds">0</span>
                    <p class="seconds_ref">seconds</p>
                </li>
            </ul>

            <!-- Sale Status -->
            <div id="sale-status" class="sale-status active">
                🚀 Token Sale is Active
            </div>

            <div class="action-buttons">
                <a href="mahamaya_whitepaper.html" class="btn primary">📄 Whitepaper</a>
                <a href="faq.html" class="btn">❓ FAQs</a>
                <a href="/home" class="btn primary">🪙 Buy MAYX</a>
                <a href="#" onclick="joinCommunity()" class="btn">👥 Join Community</a>
            </div>
        </section>

        <!-- Token Utility Section -->
        <section class="utility-section">
            <h2 class="section-title">Token Utility</h2>
            <div class="utility-grid">
                <a href="mahamaya_whitepaper.html#use-cases" target="whitepaper" class="utility-card">
                    <span class="utility-icon">↗</span>
                    <h3 class="utility-title">Stake<br>to Earn</h3>
                    <p class="utility-desc">Lock MAYX for rewards</p>
                </a>
                <a href="mahamaya_whitepaper.html#use-cases" target="whitepaper" class="utility-card">
                    <span class="utility-icon">🏛</span>
                    <h3 class="utility-title">Unlock<br>Shrines</h3>
                    <p class="utility-desc">Access Sanskrit shrines</p>
                </a>
                <a href="mahamaya_whitepaper.html#governance" target="whitepaper" class="utility-card">
                    <span class="utility-icon">⚡</span>
                    <h3 class="utility-title">Govern<br>the Game</h3>
                    <p class="utility-desc">Shape ecosystem decisions</p>
                </a>
                <a href="mahamaya_whitepaper.html#use-cases" target="whitepaper" class="utility-card">
                    <span class="utility-icon">⚔</span>
                    <h3 class="utility-title">PvP<br>Tournaments</h3>
                    <p class="utility-desc">Join competitive missions</p>
                </a>
            </div>
        </section>

        <!-- Roadmap Section -->
        <section class="roadmap-section">
            <h2 class="section-title">Roadmap</h2>
            <div class="roadmap-timeline">
                <div class="roadmap-item">
                    <div class="roadmap-dot"></div>
                    <div class="roadmap-title">Genesis NFT Drop</div>
                    <div class="roadmap-date">Q2 2026</div>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-dot"></div>
                    <div class="roadmap-title">PvP Launch</div>
                    <div class="roadmap-date">Q1 2027</div>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-dot"></div>
                    <div class="roadmap-title">Staking Begins</div>
                    <div class="roadmap-date">Q4 2027</div>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-dot"></div>
                    <div class="roadmap-title">DAO Voting</div>
                    <div class="roadmap-date">Q1 2029</div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="social-links">
                <a href="#" class="social-link" onclick="openTelegram()">📱 Telegram</a>
                <a href="#" class="social-link" onclick="openDiscord()">💬 Discord</a>
                <a href="#" class="social-link" onclick="openTwitter()">🐦 Twitter</a>
            </div>
            <div class="footer-info">
                <div class="contract-info">
                    <button id="backToTop">↑</button>
                    <strong>Smart Contract (Polygon)</strong>
                </div>
                <div class="contract-address">
                    0xc38475656538D79a977FAF39C7713b76F69b1fa6
                </div>
            </div>
        </div>
    </footer>

<!-- Dynamic Countdown Timer Script - Synced with Admin Settings -->
<script type="text/javascript">
    // Initialize countdown timer with admin-set date
    function initCountdown() {
        <?php
            $salesDate = $settings->sales_start_date ?? now()->addDays(30);
            $salesTimestamp = strtotime($salesDate) * 1000;
        ?>
        
        const countdownDate = <?php echo e($salesTimestamp); ?>;
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = countdownDate - now;
            
            if (distance < 0) {
                // Sale has ended - update all countdown elements
                document.getElementById("dayls").innerText = 0;
                document.getElementById("hours").innerText = 0;
                document.getElementById("minutes").innerText = 0;
                document.getElementById("seconds").innerText = 0;
                
                // Update status
                const statusElement = document.getElementById('sale-status');
                if (statusElement) {
                    statusElement.innerHTML = '⏰ Token Sale Has Ended';
                    statusElement.className = 'sale-status ended';
                }
                
                clearInterval(countdownInterval);
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Update countdown display
            document.getElementById("dayls").innerText = days >= 0 ? days : 0;
            document.getElementById("hours").innerText = hours >= 0 ? hours : 0;
            document.getElementById("minutes").innerText = minutes >= 0 ? minutes : 0;
            document.getElementById("seconds").innerText = seconds >= 0 ? seconds : 0;
        }
        
        // Start the countdown
        updateCountdown();
        const countdownInterval = setInterval(updateCountdown, 1000);
    }

    // Initialize countdown when page loads
    document.addEventListener('DOMContentLoaded', function() {
        initCountdown();
    });
</script>

<script>
    // Back to Top functionality
    const backToTopBtn = document.getElementById("backToTop");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add("show");
        } else {
            backToTopBtn.classList.remove("show");
        }
    });
    backToTopBtn.addEventListener("click", () => {
        document.querySelector(".hero").scrollIntoView({behavior: "smooth"});
    });
    
    function buyToken() {
        window.location.href = '/home';
    }
    
    function joinCommunity() {
        document.querySelector("footer").scrollIntoView({behavior: "smooth"});
        const footer = document.querySelector("footer");
        footer.style.transition = "box-shadow 0.5s ease";
        footer.style.boxShadow = "0 0 20px 5px rgba(255, 215, 0, 0.7)";
        setTimeout(() => { footer.style.boxShadow = "none"; }, 1500);
    }
    
    function openTelegram() { alert('Opening Telegram...\n\nThis would open the project\'s Telegram channel.'); }
    function openDiscord() { alert('Opening Discord...\n\nThis would open the project\'s Discord server.'); }
    function openTwitter() { alert('Opening Twitter...\n\nThis would open the project\'s Twitter profile.'); }
    function openWhitepaper() { window.open('mahamaya_whitepaper.html', '_blank'); }

    // Card hover, roadmap click, smooth anchor scroll, contract copy
    document.addEventListener('DOMContentLoaded', function () {
        const utilityCards = document.querySelectorAll('.utility-card');
        utilityCards.forEach(card => {
            card.addEventListener('mouseenter', function () { this.style.transform = 'translateY(-10px) scale(1.05)'; });
            card.addEventListener('mouseleave', function () { this.style.transform = 'translateY(0) scale(1)'; });
        });
        
        const roadmapItems = document.querySelectorAll('.roadmap-item');
        roadmapItems.forEach((item, index) => {
            item.addEventListener('click', function () {
                const phases = ['Genesis NFT Drop', 'PvP Launch', 'Staking Begins', 'DAO Voting'];
                alert(`${phases[index]}\n\nClick to learn more about this roadmap phase.`);
            });
            item.style.cursor = 'pointer';
        });
        
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({behavior: 'smooth', block: 'start'});
                }
            });
        });
    });

    // Parallax scrolling effects
    window.addEventListener('scroll', function () {
        const scrolled = window.pageYOffset;
        const heroTitle = document.querySelector('.hero-title');
        const tokenSymbol = document.querySelector('.token-symbol');
        if (heroTitle) { heroTitle.style.transform = `translateY(${scrolled * 0.5}px)`; }
        if (tokenSymbol) { tokenSymbol.style.transform = `translateY(${scrolled * 0.3}px) rotate(${scrolled * 0.1}deg)`; }
    });

    // Overlap fade functionality
    let fadeInTimeout;
    function checkOverlap() {
        const heroTitle = document.querySelector('.hero-title');
        const tokenSymbol = document.querySelector('.token-symbol');
        if (!heroTitle || !tokenSymbol) return;
        
        const titleRect = heroTitle.getBoundingClientRect();
        const symbolRect = tokenSymbol.getBoundingClientRect();
        const isOverlapping = !(titleRect.bottom < symbolRect.top ||
            titleRect.top > symbolRect.bottom ||
            titleRect.right < symbolRect.left ||
            titleRect.left > symbolRect.right);
            
        if (isOverlapping) {
            clearTimeout(fadeInTimeout);
            heroTitle.style.transition = "none";
            heroTitle.style.opacity = "0";
        } else {
            clearTimeout(fadeInTimeout);
            fadeInTimeout = setTimeout(() => {
                heroTitle.style.transition = "opacity 0.3s ease-in-out";
                heroTitle.style.opacity = "1";
            }, 200);
        }
    }
    window.addEventListener('scroll', checkOverlap);
    window.addEventListener('resize', checkOverlap);
    document.addEventListener('DOMContentLoaded', checkOverlap);

    // Audio functionality
    function unlockAudio() {
        const audio = document.getElementById("bgAudio");
        if (audio && audio.paused) {
            audio.play().catch(err => console.log("Autoplay blocked:", err));
        }
        document.removeEventListener("click", unlockAudio);
        document.removeEventListener("scroll", unlockAudio);
    }
    document.addEventListener("click", unlockAudio, { once: true });
    document.addEventListener("scroll", unlockAudio, { once: true });

    document.addEventListener("click", () => {
        const audio = document.getElementById("bgAudio");
        if (audio.paused) {
            audio.play().catch(err => console.log("Autoplay blocked:", err));
        }
    }, { once: true });

    // Copy contract address to clipboard
    document.querySelector('.contract-address').addEventListener('click', function () {
        navigator.clipboard.writeText('0xc38475656538D79a977FAF39C7713b76F69b1fa6').then(function () {
            alert('Contract address copied to clipboard!');
        }).catch(function () {
            alert('Failed to copy contract address');
        });
    });
</script>
</body>
</html>
<?php /**PATH D:\Mahamaya\mahamaya\resources\views/landing.blade.php ENDPATH**/ ?>