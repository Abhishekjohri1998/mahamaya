<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$settings->site_name}} - Bitcoin and Cryptocurrency ICO System</title>
    <meta name="description" content="{{$settings->site_name}} is a Bitcoin and Cryptocurrency ICO System." />
    <meta name="keywords" content="bitcoin, ethereum, monero, ico, token, free token, btc, eth" />

    <link rel="icon" href="{{ asset('storage/app/public/'. $settings->favicon) }}" type="image/png"/>

    <!-- Bootstrap & Plugins CSS -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('front/assets/css/styles.css') }}" rel="stylesheet" type="text/css">

<style>
    /* Logo sizing and alignment fixes */
    .header-area .logo {
        display: flex;
        align-items: flex-start; /* Changed from center to flex-start to move up */
        height: 100px;
        line-height: 1;
        padding-top: 2px; /* Add padding to move logo up */
    }

    .header-area .logo img {
        max-height: 70px !important; /* Increased from 40px to make it larger */
        width: auto !important;
        object-fit: contain;
        vertical-align: middle;
    }

    /* Header container height control */
    .header-area {
        position: fixed !important;
        top: 0 !important; /* Always at top, never hide */
        left: 0;
        right: 0;
        z-index: 1000;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: none !important; /* Remove transition that may hide header */
        visibility: visible !important;
        opacity: 1 !important;
        pointer-events: auto !important;
        height: 80px; /* Fixed header height */
        overflow: hidden; /* Prevent logo from extending below */
    }

    /* Navigation alignment */
    .main-nav {
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* FORCE NAVIGATION MENU TO ALWAYS BE VISIBLE */
    .nav, .main-nav, .header-area nav {
        top: 0 !important;
        transform: translateY(0) !important;
        opacity: 1 !important;
        visibility: visible !important;
        transition: none !important;
    }

    /* Navigation menu alignment */
    .nav {
        display: flex;
        align-items: center;
        height: 70px;
        margin: 0;
        padding: 0;
    }

    .nav li {
        display: flex;
        align-items: center;
        height: 70px;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .nav li a {
        display: flex;
        align-items: center;
        height: 100%;
        padding: 0 15px;
    }

    /* Prevent menu items from being hidden */
    .nav li, .main-nav li, .header-area nav ul li {
        opacity: 1 !important;
        visibility: visible !important;
        display: block !important;
    }

    /* Container row alignment */
    .header-area .container .row {
        align-items: center;
        height: 70px;
    }

    .header-area .col-12 {
        display: flex;
        align-items: center;
        height: 70px;
    }

    /* Mobile menu trigger alignment */
    .menu-trigger {
        display: flex;
        align-items: center;
        height: 70px;
    }

    /* Fix for header overlap - adjust margin-top to match header height */
    body {
        margin-top: 70px; /* Match the header height */
    }
    
    .welcome-area {
        padding-top: 20px; /* Additional padding for welcome section */
    }

    /* Additional spacing for sections to avoid overlap */
    .section {
        scroll-margin-top: 70px; /* For smooth scrolling with fixed header */
    }

    /* Information display styling */
    .info-display {
        background: rgba(255, 255, 255, 0.95);
        padding: 20px;
        border-radius: 12px;
        margin: 15px 0;
        border: 2px solid rgba(0, 123, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .token-info-text {
        color: #333;
        font-size: 16px;
        margin-bottom: 10px;
    }
    
    .countdown-info {
        text-align: center;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.1), rgba(40, 167, 69, 0.1));
        padding: 25px;
        border-radius: 15px;
        margin: 20px 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .header-area .logo img {
            max-height: 42px !important; /* Increased from 35px */
        }
        
        .header-area .logo {
            padding-top: 6px; /* Reduced padding for mobile */
        }
        
        .header-area {
            height: 60px; /* Smaller header on mobile */
        }
        
        .main-nav, .nav, .nav li, .header-area .container .row, .header-area .col-12 {
            height: 60px;
        }
        
        .menu-trigger {
            height: 60px;
        }
        
        /* Adjust body margin for smaller mobile header */
        body {
            margin-top: 60px;
        }

        .section {
            scroll-margin-top: 60px;
        }
    }

    @media (max-width: 480px) {
        .header-area .logo img {
            max-height: 38px !important; /* Increased from 30px */
        }
        
        .header-area .logo {
            padding-top: 4px; /* Minimal padding for very small screens */
        }
        
        .header-area {
            height: 55px;
        }
        
        .main-nav, .nav, .nav li, .header-area .container .row, .header-area .col-12 {
            height: 55px;
        }
        
        .menu-trigger {
            height: 55px;
        }
        
        body {
            margin-top: 55px;
        }

        .section {
            scroll-margin-top: 55px;
        }
    }
</style>


</head>

<body>

    <script>
        {{!! $settings->livechat !!}}	
    </script>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                       <a href="/" class="logo">
                            <img src="{{ asset('front/assets/images/mahamaya-logo.png') }}" class="light-logo" alt="{{ $settings->site_name }}" />
                            <img src="{{ asset('front/assets/images/mahamaya-logo.png') }}" class="dark-logo" alt="{{ $settings->site_name }}" />
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <!-- <li><a href="#what-is-ico">WHAT IS ICO</a></li> -->
                            <!-- <li><a href="#token-sale">TOKEN SALE</a></li> -->
                            <li><a href="#roadmap">ROADMAP</a></li>
                            <!-- <li><a href="#apps">APPS</a></li> -->
                            <!-- <li><a href="#team">TEAM</a></li> -->
                            <li><a href="#faq">FAQ</a></li>
                            <li><a href="#contact">CONTACT</a></li>
                            <li><a href="/login" class="btn-nav-box">BUY TOKEN</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area bg-top-right section" id="welcome-1">
        <div class="header-token basic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 align-self-center">
                        <h1>{{$settings->site_name}} is a mythologically inspired Web3 game universe powered by MAYX</h1>
                        <p>{{$settings->site_name}} is a utility and governance token designed to align player actions with spiritual progression, Sanskrit learning, PvP competition, and NFT-powered ownership.</p>                      
                        <a href="/login" class="btn-secondary-box">Purchase Token</a>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 align-self-center">
                        <div class="box">
                            <div class="token">
                                <h6 class="title"><span class="text-primary">{{$settings->site_name}}</span> ICO SALE IS OPEN</h6>
                                
                                <!-- ***** Countdown Start ***** -->
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
                                <!-- ***** Countdown End ***** -->
                                
                                <!-- Information Display -->
                                <div class="info-display">
                                    <div class="token-info-text text-center">
                                        <h6 class="mb-3"><i class="fas fa-info-circle text-primary"></i> Token Sale Information</h6>
                                        <p class="mb-2"><strong>Token Symbol:</strong> {{$settings->site_name}}</p>
                                        <p class="mb-2"><strong>Platform:</strong> Ethereum Blockchain</p>
                                        <p class="mb-2"><strong>Token Standard:</strong> ERC-20</p>
                                       <p class="mb-0"><strong>Status:</strong> <span class="sale-status text-success">Sale Active</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="scroll-to">
            <a href="#what-is-ico">
                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </a>
        </div> -->
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** What is ICO Start ***** -->
    <!-- <section class="section bg-bottom" id="what-is-ico">
        <div class="container"> -->
            <!-- ***** Features Items Start ***** -->
            <!-- <div class="row m-bottom-70">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="features-elliptical elliptical-bottom"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.2s">
                        <div class="icon">
                            <i class="fa fa-cube"></i>
                        </div>
                        <h5 class="features-title">Easy Token Integration</h5>
                        <p>Morbi pharetra sapien ut mattis viverra. Curabitur sit amet mattis magna lipsum.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="features-elliptical elliptical-top"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h5 class="features-title">Advanced Security</h5>
                        <p>Donec pellentesque turpis utium lorem imperdiet semper. Ut mat viverra mattis.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <div class="features-elliptical">
                        <div class="icon">
                            <i class="fa fa-server"></i>
                        </div>
                        <h5 class="features-title">Decentralized</h5>
                        <p>Proin arcu ligula, malesuada id tincidunt laoreet, facilisis at justo. Sed at lorem
                            malesuada.</p>
                    </div>
                </div>
            </div> -->
            <!-- ***** Features Items End ***** -->

            <!-- ***** About Start ***** -->
            <!-- <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <div class="left-heading">
                        <h2 class="section-title">A compelling value proposition.</h2>
                    </div>
                    <div class="left-text">
                        <p class="dark">{{$settings->site_name}} ({{$settings->site_name}}) is an open source, Bitcoin-like digital currency
                            which uses a proof of work script algorithm.</p>
                        <p>The genesis block was mined on March 1st, 2014. The total number of mineable {{$settings->site_name}} is
                            245,465,283. The mining of {{$settings->site_name}} is divided into Epochs: each Epoch mines 36000 blocks of
                            coins and is targeted to last approximately 25 days. </p>
                    </div>
                    <a href="#" class="btn-secondary-line mobile-bottom-fix">Download Whitepaper</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <img src="{{ asset('front/assets/images/theme-1-about.svg') }}" class="img-fluid float-right"
                        alt="{{$settings->site_name}} ICO">
                </div>
            </div> -->
            <!-- ***** About End ***** -->
        <!-- </div>
    </section> -->
    <!-- ***** What is ICO End ***** -->

    <!-- ***** Token Sale Start ***** -->
    <!-- <section class="section gradient" id="token-sale"> -->
        <!-- <div class="container"> -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading colored">
                        <h2 class="section-title">Token Sale</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text colored">
                        <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi
                            erat. </p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row"> -->
                <!-- <div class="col-lg-12"> -->
                    <!-- <div class="box"> -->
                        <!-- <div class="row"> -->
                            <!-- ***** Token Progress and Info Start ***** -->
                            <!-- <div class="col-lg-6 col-md-6 cols-m-12"> -->
                                <!-- ***** Token Progress Start ***** -->
                                <!-- <div class="token-progress">
                                    <ul id="test">
                                        <li class="progress-active" data-progress="50%"></li>
                                        <li class="item complate" data-position="0%">
                                            <strong>0</strong>
                                            <span>Start</span>
                                        </li>
                                        <li class="item complate" data-position="25%">
                                            <strong>$2 M</strong>
                                            <span>Pre Sale</span>
                                        </li>
                                        <li class="item complate" data-position="48%">
                                            <strong>$12 M</strong>
                                            <span>Soft Cap</span>
                                        </li>
                                        <li class="item" data-position="73%"></li>
                                    </ul>
                                </div> -->
                                <!-- ***** Token Progress End ***** -->

                                <!-- ***** Token Info Table Start ***** -->
                                <!-- <div class="token-info">
                                    <div class="item">
                                        <strong>Start</strong>
                                        <span>Started</span>
                                    </div>
                                    <div class="item">
                                        <strong>Token Supply</strong>
                                        <span>100.000.000 {{$settings->site_name}} ETH</span>
                                    </div>
                                    <div class="item">
                                        <strong>Accepted Tokens</strong>
                                        <span>BTC, ETH, ETC, NEM, EOS</span>
                                    </div>
                                    <div class="item">
                                        <strong>Project Protocol</strong>
                                        <span>ETH, ETC - {{$settings->site_name}} 20</span>
                                    </div>
                                    <div class="item">
                                        <strong>Circulation Supply</strong>
                                        <span>37.000.000 {{$settings->site_name}} ETH</span>
                                    </div>
                                    <div class="item">
                                        <strong>Maximum Cap</strong>
                                        <span>60 M USD</span>
                                    </div>
                                </div> -->
                                <!-- ***** Token Info Table End ***** -->
                            <!-- </div> -->
                            <!-- ***** Token Progress and Info End ***** -->

                            <!-- ***** Token Countdown and Information Start ***** -->
                            <!-- <div class="col-lg-6 col-md-6 cols-m-12"> -->
                                <!-- <div class="token"> -->
                                    <!-- <h6 class="title">ICO SALE IS OPEN</h6> -->
                                    <!-- ***** Countdown Start ***** -->
                                    <!-- <ul class="countdown">
                                        <li>
                                            <span class="days" id="daylss">0</span>
                                            <p class="days_ref">days</p>
                                        </li>
                                        <li class="seperator"></li>
                                        <li>
                                            <span class="hours" id="hourss">0</span>
                                            <p class="hours_ref">hours</p>
                                        </li>
                                        <li class="seperator"></li>
                                        <li>
                                            <span class="minutes" id="minutess">0</span>
                                            <p class="minutes_ref">minutes</p>
                                        </li>
                                        <li class="seperator"></li>
                                        <li>
                                            <span class="seconds" id="secondss">0</span>
                                            <p class="seconds_ref">seconds</p>
                                        </li>
                                    </ul> -->
                                    <!-- ***** Countdown End ***** -->
                                    
                                    <!-- Information Section -->
                                    <!-- <div class="countdown-info">
                                        <h6 class="mb-3 text-primary"><i class="fas fa-rocket"></i> Join Our Token Sale</h6>
                                        <p class="mb-3">To participate in our token sale and purchase {{$settings->site_name}} tokens, please visit our secure purchase portal.</p>
                                        <div class="mb-3">
                                            <p class="mb-2"><strong><i class="fas fa-shield-alt text-success"></i> Secure Platform</strong></p>
                                            <p class="mb-2"><strong><i class="fas fa-clock text-info"></i> 24/7 Support</strong></p>
                                            <p class="mb-0"><strong><i class="fas fa-gem text-warning"></i> Premium Tokens</strong></p>
                                        </div>
                                        <a href="/login" class="btn btn-primary btn-lg">
                                            <i class="fas fa-sign-in-alt"></i> Access Purchase Portal
                                        </a>
                                    </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <!-- ***** Token Countdown and Information End ***** -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div>
        </div>
    </section> -->
    <!-- ***** Token Sale End ***** -->

    <!-- ***** Roadmap Start ***** -->
    <section class="section" id="roadmap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Roadmap</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Cras at leo et lacus laoreet euismod. Nulla malesuada tortor ac scelerisque sollicitudin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="roadmap-full">
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">Q2 2026</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status complate"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>NFT Drop, Gameplay Demo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">Q1 2027</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status complate"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>PvP Launch, Sanskrit Shrine MVP</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">Q4 2027</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status complate"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Leaderboard Rewards, Staking</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">Q1 2029</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>DAO Activation, CEX Listing, Metaverse Gateway, Expansions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Roadmap End ***** -->

    <!-- ***** Apps Start ***** -->
    <!-- <section class="section gradient" id="apps">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading light">
                        <h2 class="section-title">Apps</h2>
                    </div>
                    <div class="left-text light m-bottom-0">
                        <p>Maecenas et consequat nunc. Duis faucibus orci eu varius sagittis. In quam elit, euismod a
                            urna quis</p>
                        <ul>
                            <a href="">
                                <li> {{$settings->site_name}} Wallet</li>
                            </a>
                            <li>Transaction info</li>
                            <li>My account</li>
                            <li>Blockchain Explorer</li>
                            <li>Transfer</li>
                            <li>Connected peers to network {{$settings->site_name}}</li>
                        </ul>
                        <a class="app-download" href="#"><img
                                src="{{ asset('front/assets/images/store-btn-apple.svg') }}" alt=""></a>
                        <a class="app-download" href="#"><img
                                src="{{ asset('front/assets/images/store-btn-google.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <img src="{{ asset('front/assets/images/mockups/dark.png') }}" class="img-fluid float-right"
                        alt="App">
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Apps End ***** -->

    <!-- ***** Team Start ***** -->
    <!-- <section class="section bg-bottom" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Team</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi
                            erat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12"
                    data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="team-round">
                        <div class="profile">
                            <div class="img">
                                <img src="{{ asset('front/assets/images/1.jpg') }}" alt="">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="team-name">Lance Bogrol</h3>
                        <span>CEO & Lead Blockchain</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12"
                    data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                    <div class="team-round">
                        <div class="profile">
                            <div class="img">
                                <img src="{{ asset('front/assets/images/2.jpg') }}" alt="">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="team-name">Brian Cumin</h3>
                        <span>CTO & Senior Developer</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12"
                    data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="team-round">
                        <div class="profile">
                            <div class="img">
                                <img src="{{ asset('front/assets/images/3.jpg') }}" alt="">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="team-name">Jackson Pot</h3>
                        <span>Blockchain App Developer</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12"
                    data-scroll-reveal="enter bottom move 50px over 0.6s after 0.8s">
                    <div class="team-round">
                        <div class="profile">
                            <div class="img">
                                <img src="{{ asset('front/assets/images/4.jpg') }}" alt="">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="team-name">Douglas Lyphe</h3>
                        <span>Community Management</span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Team End ***** -->

    <!-- ***** Telegram Parallax Start ***** -->
    <section class="parallax">
        <div class="parallax-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="section-title">Join Us On Telegram</h1>
                    </div>
                    <div class="offset-lg-3 col-lg-6">
                        <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi
                            erat.</p>
                    </div>
                    <div class="offset-lg-3 col-lg-6">
                        <a href="#" class="btn-white-line">Join Us On Telegram</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Telegram Parallax End ***** -->

    <!-- ***** FAQ Start ***** -->
    <section class="section bg-top" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h1 class="section-title">FAQ</h1>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                    <span class="badge">1</span> What is MAYX Coin?
                                </button>
                            </h2>
                            <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>MAYX is the native cryptocurrency powering the Mahamaya Web3 ecosystem, combining blockchain, gaming, Sanskrit learning, and Vedic Cultural innovation. Omni Manual Private Limited a IT Services company developing and providing technical supports to the Mahamaya ecosystem.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    <span class="badge">2</span> How can I buy MAYX?
                                </button>
                            </h2>
                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>You can purchase MAYX by clicking the "Buy MAYX" button on the homepage. It will guide you to ICO (Initial Coin Offering) platforms during the ICO token sale.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    <span class="badge">3</span> Which blockchain does MAYX run on?
                                </button>
                            </h2>
                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>MAYX is deployed on the Polygon network (Smart Contract:0xc38475656538D79a977FAF39C7713b76F69b1fa6), ensuring fast, secure, and low-cost transactions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    <span class="badge">4</span> What is the maximum supply of MAYX?
                                </button>
                            </h2>
                            <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="heading-4"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>The total max supply is 1,000,000,000 MAYX, with an initial circulation of 50,000,000 tokens.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    <span class="badge">5</span> What are the utilities of MAYX?
                                </button>
                            </h2>
                            <div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="heading-5"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>MAYX can be staked for rewards, used to unlock in-game shrines, participate in governance of the game, join PvP tournaments, and purchase NFT assets.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                                    <span class="badge">6</span> How does staking work?
                                </button>
                            </h2>
                            <div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="heading-6"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Players can lock their MAYX tokens to earn passive yields and bonus rewards from special "spiritual quests."</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                                    <span class="badge">7</span> What is the Mahamaya game?
                                </button>
                            </h2>
                            <div id="collapse-7" class="accordion-collapse collapse" aria-labelledby="heading-7"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Mahamaya is a mythologically inspired survival and co-op Web3 game where players explore Vedic lore, engage in PvP, and learn Sanskrit Vedic Culture through immersive gameplay.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                                    <span class="badge">8</span> Is there governance in the ecosystem?
                                </button>
                            </h2>
                            <div id="collapse-8" class="accordion-collapse collapse" aria-labelledby="heading-8"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, MAYX holders will be able to vote on shrine placements, PvP balance, Sanskrit Vedic Cultural curriculum expansion, and ecosystem updates through a DAO system.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-9">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-9" aria-expanded="false" aria-controls="collapse-9">
                                    <span class="badge">9</span> How will the community grow?
                                </button>
                            </h2>
                            <div id="collapse-9" class="accordion-collapse collapse" aria-labelledby="heading-9"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Through Sanskrit Vedic Cultural challenges, PvP leaderboards, NFT drops, partnerships with cultural foundations, and collaborations with Web3 guilds worldwide.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-10">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-10" aria-expanded="false" aria-controls="collapse-10">
                                    <span class="badge">10</span> Is MAYX safe and compliant?
                                </button>
                            </h2>
                            <div id="collapse-10" class="accordion-collapse collapse" aria-labelledby="heading-10"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, smart contracts will be audited, KYC will be required for private investors, and the project aligns with GDPR and Indian IT regulations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** FAQ End ***** -->

    <!-- ***** Contact & Footer Start ***** -->
    <footer id="contact">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="contact">
                            <h3 class="section-title">Get In Touch</h3>
                            <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi
                                erat.</p>
                            <ul class="list">
                                <li><i class="fa fa-envelope-o"></i><a
                                        href="mailto:{{$settings->site_email}}">{{$settings->site_email}}</a>
                                </li>
                                <li><i class="fa fa-phone"></i><span>{{$settings->phone}}</span></li>
                                <li><i class="fa fa-paper-plane-o"></i><a href="#">Join us on Telegram</a></li>
                            </ul>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-github-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-6 col-md-12 col-sm-12">
                        <div class="contact-form">
                            <x-danger-alert/>
                            <x-success-alert/>
                            <h3 class="section-title">Say Something</h3>
                            <form action="{{route('enquiry')}}" method="post">
                                @csrf
                                <div class="form-element">
                                    <input type="text" name="name" placeholder="Name, surname" required>
                                </div>
                                <div class="form-element">
                                    <input type="email" name="email" placeholder="E-Mail" required>
                                </div>
                                <div class="form-element">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-element">
                                    <textarea placeholder="Message" name="message" required></textarea>
                                </div>
                                <div class="form-element">
                                    <button class="btn-secondary-box">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <p class="copyright">{{date('Y')}} © {{$settings->site_name}} - Bitcoin and Cryptocurrency ICO System </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Contact & Footer End ***** -->

    <!-- jQuery -->
    <script src="{{ asset('front/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('front/assets/js/popper.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('front/assets/js/particles.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.downCount.js') }}"></script>
    <script src="{{ asset('front/assets/js/parallax.min.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('front/assets/js/particle-dark.js') }}"></script>
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>

<script type="text/javascript">
    // Force header to always be visible - this overrides any hiding behavior
    function forceHeaderVisible() {
        const header = document.querySelector('.header-area');
        const nav = document.querySelector('.main-nav');
        const navItems = document.querySelectorAll('.nav li');
        
        if (header) {
            header.style.position = 'fixed';
            header.style.top = '0';
            header.style.zIndex = '1000';
            header.style.visibility = 'visible';
            header.style.opacity = '1';
            header.style.pointerEvents = 'auto';
            header.style.left = '0';
            header.style.right = '0';
            header.style.background = 'white';
            header.style.transform = 'translateY(0)';
        }
        
        if (nav) {
            nav.style.top = '0';
            nav.style.opacity = '1';
            nav.style.visibility = 'visible';
            nav.style.transform = 'translateY(0)';
        }
        
        navItems.forEach(item => {
            item.style.opacity = '1';
            item.style.visibility = 'visible';
            item.style.display = 'block';
        });
    }

    // Override scroll behavior to always keep header visible
    window.addEventListener('scroll', forceHeaderVisible);
    window.addEventListener('load', function() {
        forceHeaderVisible();
        initCountdown();
    });
    window.addEventListener('resize', forceHeaderVisible);
    setInterval(forceHeaderVisible, 100);

    // Initialize countdown timer with admin-set date
    function initCountdown() {
        @php
            $salesDate = $settings->sales_start_date ?? now()->addDays(30);
            $salesTimestamp = strtotime($salesDate) * 1000;
        @endphp
        
        const countdownDate = {{ $salesTimestamp }};
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = countdownDate - now;
            
            if (distance < 0) {
                // Sale has ended - update all countdown elements
                const countdownElements = ['dayls', 'hours', 'minutes', 'seconds', 'daylss', 'hourss', 'minutess', 'secondss'];
                countdownElements.forEach(id => {
                    const element = document.getElementById(id);
                    if (element) element.innerHTML = 0;
                });
                
                // Update status elements
                const statusElements = document.querySelectorAll('.sale-status');
                statusElements.forEach(element => {
                    element.innerHTML = '<span class="text-danger">Sale Ended</span>';
                });
                
                // Update info display status
                const infoStatusElements = document.querySelectorAll('.info-display .text-success');
                infoStatusElements.forEach(element => {
                    element.innerHTML = 'Sale Ended';
                    element.className = 'text-danger';
                });
                
                clearInterval(countdownInterval);
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Update first countdown (welcome section)
            const firstCountdown = ['dayls', 'hours', 'minutes', 'seconds'];
            const values = [days, hours, minutes, seconds];
            
            firstCountdown.forEach((id, index) => {
                const element = document.getElementById(id);
                if (element) {
                    element.innerHTML = values[index] >= 0 ? values[index] : 0;
                }
            });

            // Update second countdown (token sale section)
            const secondCountdown = ['daylss', 'hourss', 'minutess', 'secondss'];
            secondCountdown.forEach((id, index) => {
                const element = document.getElementById(id);
                if (element) {
                    element.innerHTML = values[index] >= 0 ? values[index] : 0;
                }
            });
        }
        
        // Start the countdown
        updateCountdown();
        const countdownInterval = setInterval(updateCountdown, 1000);
    }

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initCountdown();
    });
</script>

</body>
</html>
