<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($settings->site_name); ?> - Bitcoin and Cryptocurrency ICO System</title>
    <meta name="description" content="<?php echo e($settings->site_name); ?> is a Bitcoin and Cryptocurrency ICO System." />
    <meta name="keywords" content="bitcoin, ethereum, monero, ico, token, free token, btc, eth" />

    <link rel="icon" href="<?php echo e(asset('storage/app/public/'. $settings->favicon)); ?>" type="image/png"/>

    <!-- Bootstrap & Plugins CSS -->
    <link href="<?php echo e(asset('front/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('front/assets/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('front/assets/css/styles.css')); ?>" rel="stylesheet" type="text/css">

<style>
    /* Fix for header overlap - adjust margin-top as needed */
    body {
        margin-top: 80px; /* Add space to prevent header overlap */
    }
    
    .welcome-area {
        padding-top: 20px; /* Additional padding for welcome section */
    }
    
    .metamask-btn {
        background: linear-gradient(135deg, #f6851b, #e2761b);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .metamask-btn:hover {
        background: linear-gradient(135deg, #e2761b, #d0651b);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(246, 133, 27, 0.4);
    }
    
    .metamask-btn:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }
    
    .wallet-info {
        background: rgba(255, 255, 255, 0.1);
        padding: 15px;
        border-radius: 8px;
        margin: 10px 0;
        color: white;
    }
    
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s ease-in-out infinite;
    }
    
    @keyframes  spin {
        to { transform: rotate(360deg); }
    }
    
    .alert {
        padding: 15px;
        margin: 10px 0;
        border-radius: 5px;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    /* Additional spacing for sections to avoid overlap */
    .section {
        scroll-margin-top: 80px; /* For smooth scrolling with fixed header */
    }
    
    /* Header adjustments - ALWAYS VISIBLE */
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
    }
    
    /* FORCE NAVIGATION MENU TO ALWAYS BE VISIBLE */
    .nav, .main-nav, .header-area nav {
        top: 0 !important;
        transform: translateY(0) !important;
        opacity: 1 !important;
        visibility: visible !important;
        transition: none !important;
    }
    
    /* Prevent menu items from being hidden */
    .nav li, .main-nav li, .header-area nav ul li {
        opacity: 1 !important;
        visibility: visible !important;
        display: block !important;
    }
</style>

</head>

<body>

    <script>
        {<?php echo $settings->livechat; ?>}	
    </script>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                       <a href="/" class="logo">
                            <img src="<?php echo e(asset('front/assets/images/mahamaya-logo.png')); ?>" class="light-logo" alt="<?php echo e($settings->site_name); ?>" />
                            <img src="<?php echo e(asset('front/assets/images/mahamaya-logo.png')); ?>" class="dark-logo" alt="<?php echo e($settings->site_name); ?>" />
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#what-is-ico">WHAT IS ICO</a></li>
                            <li><a href="#token-sale">TOKEN SALE</a></li>
                            <li><a href="#roadmap">ROADMAP</a></li>
                            <li><a href="#apps">APPS</a></li>
                            <li><a href="#team">TEAM</a></li>
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
                        <h1><?php echo e($settings->site_name); ?> Decentralized Blockchain ICO System</h1>
                        <p><?php echo e($settings->site_name); ?> makes it easy for user or Businesses who wants to Create there own Coins, <?php echo e($settings->site_name); ?>

                            is A fully Fledge Blockchain ICO System</p>
                        <a href="#" class="btn-secondary-box">Download Whitepaper</a>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 align-self-center">
                        <div class="box">
                            <div class="token">
                                <h6 class="title"><span class="text-primary"><?php echo e($settings->site_name); ?></span> ICO SALE IS OPEN</h6>
                                
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
                                
                                <!-- MetaMask Integration -->
                                <div id="metamask-alerts"></div>
                                <div id="wallet-info" class="wallet-info" style="display: none;">
                                    <p><strong>Connected Wallet:</strong> <span id="wallet-address"></span></p>
                                    <p><strong>Balance:</strong> <span id="wallet-balance"></span> ETH</p>
                                    <p><strong>Network:</strong> <span id="network-name"></span></p>
                                </div>
                                
                                <div class="token-input">
    <input type="number" id="token-amount" placeholder="100" min="1" value="100" />
    <i class="fa fa-plus" id="increase-btn"></i>
    <i class="fa fa-minus" id="decrease-btn"></i>
    <button id="purchase-btn" class="metamask-btn" onclick="purchaseTokens()" style="display: none;">
        <span id="btn-text">PURCHASE TOKEN NOW</span>
    </button>
</div>

                                
                                <div class="token-input" style="margin-top: 10px;">
                                    <button id="connect-btn" class="metamask-btn" onclick="connectWallet()" style="display: block;">
                                        Connect MetaMask Wallet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-to">
            <a href="#what-is-ico">
                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </a>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** What is ICO Start ***** -->
    <section class="section bg-bottom" id="what-is-ico">
        <div class="container">
            <!-- ***** Features Items Start ***** -->
            <div class="row m-bottom-70">
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
            </div>
            <!-- ***** Features Items End ***** -->

            <!-- ***** About Start ***** -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <div class="left-heading">
                        <h2 class="section-title">A compelling value proposition.</h2>
                    </div>
                    <div class="left-text">
                        <p class="dark"><?php echo e($settings->site_name); ?> (<?php echo e($settings->site_name); ?>) is an open source, Bitcoin-like digital currency
                            which uses a proof of work script algorithm.</p>
                        <p>The genesis block was mined on March 1st, 2014. The total number of mineable <?php echo e($settings->site_name); ?> is
                            245,465,283. The mining of <?php echo e($settings->site_name); ?> is divided into Epochs: each Epoch mines 36000 blocks of
                            coins and is targeted to last approximately 25 days. </p>
                    </div>
                    <a href="#" class="btn-secondary-line mobile-bottom-fix">Download Whitepaper</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <img src="<?php echo e(asset('front/assets/images/theme-1-about.svg')); ?>" class="img-fluid float-right"
                        alt="<?php echo e($settings->site_name); ?> ICO">
                </div>
            </div>
            <!-- ***** About End ***** -->
        </div>
    </section>
    <!-- ***** What is ICO End ***** -->

    <!-- ***** Token Sale Start ***** -->
    <section class="section gradient" id="token-sale">
        <div class="container">
            <div class="row">
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
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <!-- ***** Token Progress and Info Start ***** -->
                            <div class="col-lg-6 col-md-6 cols-m-12">
                                <!-- ***** Token Progress Start ***** -->
                                <div class="token-progress">
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
                                </div>
                                <!-- ***** Token Progress End ***** -->

                                <!-- ***** Token Info Table Start ***** -->
                                <div class="token-info">
                                    <div class="item">
                                        <strong>Start</strong>
                                        <span>Started</span>
                                    </div>
                                    <div class="item">
                                        <strong>Token Supply</strong>
                                        <span>100.000.000 <?php echo e($settings->site_name); ?> ETH</span>
                                    </div>
                                    <div class="item">
                                        <strong>Accepted Tokens</strong>
                                        <span>BTC, ETH, ETC, NEM, EOS</span>
                                    </div>
                                    <div class="item">
                                        <strong>Project Protocol</strong>
                                        <span>ETH, ETC - <?php echo e($settings->site_name); ?> 20</span>
                                    </div>
                                    <div class="item">
                                        <strong>Circulation Supply</strong>
                                        <span>37.000.000 <?php echo e($settings->site_name); ?> ETH</span>
                                    </div>
                                    <div class="item">
                                        <strong>Maximum Cap</strong>
                                        <span>60 M USD</span>
                                    </div>
                                </div>
                                <!-- ***** Token Info Table End ***** -->
                            </div>
                            <!-- ***** Token Progress and Info End ***** -->

                            <!-- ***** Token Countdown and Payment Start ***** -->
                            <div class="col-lg-6 col-md-6 cols-m-12">
                                <div class="token">
                                    <h6 class="title">ICO SALE IS OPEN</h6>
                                    <!-- ***** Countdown Start ***** -->
                                    <ul class="countdown">
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
                                    </ul>
                                    <!-- ***** Countdown End ***** -->
                                    
                                    <div class="token-payment">
                                        <span>Select Payment Method</span>
                                        <div class="radios">
                                            <div class="form-radio">
                                                <input type="radio" id="check1" name="payment" checked="" />
                                                <label for="check1">
                                                    <i class="fa fa-bitcoin"></i>
                                                </label>
                                            </div>
                                            <div class="form-radio">
                                                <input type="radio" id="check2" name="payment" />
                                                <label for="check2">
                                                    <i class="fa fa-paypal"></i>
                                                </label>
                                            </div>
                                            <div class="form-radio">
                                                <input type="radio" id="check3" name="payment" />
                                                <label for="check3">
                                                    <i class="fa fa-cc-visa"></i>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <!-- MetaMask Purchase Button -->
                                        <div id="metamask-alerts-2"></div>
                                        <div id="wallet-info-2" class="wallet-info" style="display: none;">
                                            <p><strong>Connected:</strong> <span id="wallet-address-2"></span></p>
                                            <p><strong>Balance:</strong> <span id="wallet-balance-2"></span> ETH</p>
                                            <p><strong>Network:</strong> <span id="network-name-2"></span></p>
                                        </div>
                                        
                                        <div style="margin: 15px 0;">
                                            <input type="number" id="token-amount-2" placeholder="Token Amount" min="1" value="100" 
                                                   style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ddd;" />
                                        </div>
                                        
                                        <button id="purchase-btn-2" class="btn-primary-line metamask-btn" onclick="purchaseTokens2()" 
                                                style="width: 100%; margin-bottom: 10px; display: none;">
                                            <span id="btn-text-2">PURCHASE TOKEN NOW</span>
                                        </button>
                                        
                                        <button id="connect-btn-2" class="btn-primary-line metamask-btn" onclick="connectWallet2()" 
                                                style="width: 100%; display: block;">
                                            Connect MetaMask
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- ***** Token Countdown and Payment End ***** -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <h6 class="date">04 2018</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status complate"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Development of a desktop application for Windows, Android Wallet. Connecting Sidechain +
                                Secure Sandbox. Opportunity to create decentralized applications on the <?php echo e($settings->site_name); ?>

                                platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">05 2018</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status complate"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Running the delegate system. As soon as the system of delegates on the platform is
                                launched, the documentation on how to start the delegate will be available in the FAQ
                                section</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">06 2018</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status complate"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Placement of <?php echo e($settings->site_name); ?> on exchanges. The list of exchanges that placed <?php echo e($settings->site_name); ?> will be
                                constantly updated, please, kindly check our site.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">07 2018</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Updating the consensus of the Delegates. Increase in decentralization, through the
                                distribution of a portion of the delegate's income to those who vote for them.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">08 2018</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Adding additional crypto currencies to the wallet. Priority: Bitcoin, Litecoin, Dash,
                                Zcash and Monero. The rest will be added during voting.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-item-full" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <h6 class="date">09 2018</h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 position-relative">
                            <div class="status"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <p>Creating a DAO module. Increase the effectiveness of the community through the creation
                                of a special section of decision-making and budget management.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Roadmap End ***** -->

    <!-- ***** Apps Start ***** -->
    <section class="section gradient" id="apps">
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
                                <li> <?php echo e($settings->site_name); ?> Wallet</li>
                            </a>
                            <li>Transaction info</li>
                            <li>My account</li>
                            <li>Blockchain Explorer</li>
                            <li>Transfer</li>
                            <li>Connected peers to network <?php echo e($settings->site_name); ?></li>
                        </ul>
                        <a class="app-download" href="#"><img
                                src="<?php echo e(asset('front/assets/images/store-btn-apple.svg')); ?>" alt=""></a>
                        <a class="app-download" href="#"><img
                                src="<?php echo e(asset('front/assets/images/store-btn-google.svg')); ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <img src="<?php echo e(asset('front/assets/images/mockups/dark.png')); ?>" class="img-fluid float-right"
                        alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Apps End ***** -->

    <!-- ***** Team Start ***** -->
    <section class="section bg-bottom" id="team">
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
                                <img src="<?php echo e(asset('front/assets/images/1.jpg')); ?>" alt="">
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
                                <img src="<?php echo e(asset('front/assets/images/2.jpg')); ?>" alt="">
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
                                <img src="<?php echo e(asset('front/assets/images/3.jpg')); ?>" alt="">
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
                                <img src="<?php echo e(asset('front/assets/images/4.jpg')); ?>" alt="">
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
    </section>
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
                    <div class="center-text">
                        <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi
                            erat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                    <span class="badge">1</span> What are the benefits of digital currency?
                                </button>
                            </h2>
                            <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    <span class="badge">2</span> How long has digital currency existed?
                                </button>
                            </h2>
                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    <span class="badge">3</span> How will digital currency affect daily life
                                    in the US
                                    and around the world?
                                </button>
                            </h2>
                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficiur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    <span class="badge">4</span> Why should I use <?php echo e($settings->site_name); ?> currency and how is
                                    it
                                    different
                                    from other currencies?
                                </button>
                            </h2>
                            <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="heading-4"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    <span class="badge">5</span> How is <?php echo e($settings->site_name); ?> helping entrepreneurs?
                                </button>
                            </h2>
                            <div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="heading-5"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                                    <span class="badge">6</span> What benefits can I get from joining the
                                    <?php echo e($settings->site_name); ?> crowd
                                    funding platform?
                                </button>
                            </h2>
                            <div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="heading-6"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                                    <span class="badge">7</span> How do I convert my <?php echo e($settings->site_name); ?> currency into US
                                    dollars
                                    or
                                    other currencies?
                                </button>
                            </h2>
                            <div id="collapse-7" class="accordion-collapse collapse" aria-labelledby="heading-7"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu
                                        purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna
                                        pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus
                                        et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit
                                        amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
                                    <p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam
                                        fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue
                                        ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit
                                        amet massa venenatis, ut convallis justo ultricies.</p>
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
                                        href="mailto:<?php echo e($settings->site_email); ?>"><?php echo e($settings->site_email); ?></a>
                                </li>
                                <li><i class="fa fa-phone"></i><span><?php echo e($settings->phone); ?></span></li>
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
                            <?php if (isset($component)) { $__componentOriginalaecef5a97d3402afc3bd193fb4467fecf7e8bb4a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DangerAlert::class, []); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaecef5a97d3402afc3bd193fb4467fecf7e8bb4a)): ?>
<?php $component = $__componentOriginalaecef5a97d3402afc3bd193fb4467fecf7e8bb4a; ?>
<?php unset($__componentOriginalaecef5a97d3402afc3bd193fb4467fecf7e8bb4a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalefb6c7ab9c534676ce498db452c30763ee219126 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SuccessAlert::class, []); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalefb6c7ab9c534676ce498db452c30763ee219126)): ?>
<?php $component = $__componentOriginalefb6c7ab9c534676ce498db452c30763ee219126; ?>
<?php unset($__componentOriginalefb6c7ab9c534676ce498db452c30763ee219126); ?>
<?php endif; ?>
                            <h3 class="section-title">Say Something</h3>
                            <form action="<?php echo e(route('enquiry')); ?>" method="post">
                                <?php echo csrf_field(); ?>
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
                        <p class="copyright"><?php echo e(date('Y')); ?> © <?php echo e($settings->site_name); ?> - Bitcoin and Cryptocurrency ICO System </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Contact & Footer End ***** -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('front/assets/js/jquery-3.6.0.min.js')); ?>"></script>

    <!-- Bootstrap -->
    <script src="<?php echo e(asset('front/assets/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/bootstrap.min.js')); ?>"></script>

    <!-- Plugins -->
    <script src="<?php echo e(asset('front/assets/js/particles.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/scrollreveal.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/jquery.downCount.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/parallax.min.js')); ?>"></script>

    <!-- Web3 and MetaMask Integration -->
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>

    <!-- Global Init -->
    <script src="<?php echo e(asset('front/assets/js/particle-dark.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/custom.js')); ?>"></script>

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

        // Add event listeners after DOM loads
document.addEventListener('DOMContentLoaded', function() {
    const plusBtn = document.getElementById('increase-btn');
    const minusBtn = document.getElementById('decrease-btn');
    const inputField = document.getElementById('token-amount');

    if (plusBtn && inputField) {
        plusBtn.addEventListener('click', function() {
            let currentValue = parseInt(inputField.value) || 0;
            inputField.value = currentValue + 100;
        });
    }

    if (minusBtn && inputField) {
        minusBtn.addEventListener('click', function() {
            let currentValue = parseInt(inputField.value) || 0;
            let newValue = currentValue - 100;
            inputField.value = newValue > 0 ? newValue : 1;
        });
    }
});

        // Override scroll behavior to always keep header visible
        window.addEventListener('scroll', function() {
            forceHeaderVisible();
        });

        window.addEventListener('load', function() {
            forceHeaderVisible();
            initWeb3();
            initCountdown();
        });

        window.addEventListener('resize', function() {
            forceHeaderVisible();
        });

        // Run every 100ms to ensure header stays visible
        setInterval(forceHeaderVisible, 100);

        // Configuration
        const CONFIG = {
            contractAddress: '0xf66cc5B1a36f97996b6feced5C6FC6C2a96225CA', // Your contract address
            chainId: '0x1', // Ethereum Mainnet
            chainName: 'Ethereum Mainnet',
            tokenPrice: 0.001, // Price per token in ETH
            rpcUrl: 'https://mainnet.infura.io/v3/9615666ceef74a58b3f46782c9974678',
            gasLimit: 100000
        };

        // Global variables
        let web3;
        let userAccount;
        let connected = false;

        // Initialize Web3
        async function initWeb3() {
            try {
                if (typeof window.ethereum !== 'undefined') {
                    web3 = new Web3(window.ethereum);
                    console.log('MetaMask detected');
                    
                    // Check if already connected
                    const accounts = await web3.eth.getAccounts();
                    if (accounts.length > 0) {
                        userAccount = accounts[0];
                        connected = true;
                        updateUI();
                    }
                } else {
                    console.log('MetaMask not detected');
                    showAlert('Please install MetaMask extension to use this feature.', 'error');
                }
            } catch (error) {
                console.error('Web3 initialization error:', error);
                showAlert('Failed to initialize Web3', 'error');
            }
        }

        // Connect to MetaMask
        async function connectWallet() {
            try {
                if (typeof window.ethereum === 'undefined') {
                    showAlert('MetaMask not installed. Please install MetaMask extension first.', 'error');
                    window.open('https://metamask.io/', '_blank');
                    return;
                }

                // Request account access
                const accounts = await window.ethereum.request({
                    method: 'eth_requestAccounts'
                });

                if (accounts.length === 0) {
                    showAlert('No accounts found. Please create an account in MetaMask.', 'error');
                    return;
                }

                // Switch to correct network
                await switchToEthereumNetwork();

                userAccount = accounts[0];
                connected = true;
                updateUI();
                showAlert('Wallet connected successfully!', 'success');

            } catch (error) {
                console.error('Error connecting wallet:', error);
                if (error.code === 4001) {
                    showAlert('Connection rejected by user', 'warning');
                } else {
                    showAlert('Failed to connect wallet: ' + error.message, 'error');
                }
            }
        }

        // Connect to MetaMask (second section)
        async function connectWallet2() {
            await connectWallet();
        }

        // Switch to Ethereum network
        async function switchToEthereumNetwork() {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{ chainId: CONFIG.chainId }]
                });
            } catch (switchError) {
                if (switchError.code === 4902) {
                    try {
                        await window.ethereum.request({
                            method: 'wallet_addEthereumChain',
                            params: [{
                                chainId: CONFIG.chainId,
                                chainName: CONFIG.chainName,
                                rpcUrls: [CONFIG.rpcUrl],
                                nativeCurrency: {
                                    name: 'ETH',
                                    symbol: 'ETH',
                                    decimals: 18
                                }
                            }]
                        });
                    } catch (addError) {
                        throw new Error('Failed to add Ethereum network');
                    }
                } else {
                    throw switchError;
                }
            }
        }

        // Purchase tokens
        async function purchaseTokens() {
            if (!connected) {
                showAlert('Please connect your wallet first', 'warning');
                await connectWallet();
                return;
            }

            const tokenAmount = parseInt(document.getElementById('token-amount').value);
            if (tokenAmount <= 0 || isNaN(tokenAmount)) {
                showAlert('Please enter a valid token amount', 'error');
                return;
            }

            const ethAmount = (tokenAmount * CONFIG.tokenPrice);
            
            // Check if user has enough balance
            try {
                const balance = await web3.eth.getBalance(userAccount);
                const balanceInEth = parseFloat(web3.utils.fromWei(balance, 'ether'));
                const requiredEth = ethAmount + 0.01; // Adding gas fee buffer
                
                if (balanceInEth < requiredEth) {
                    showAlert(`Insufficient balance! You need at least ${requiredEth.toFixed(4)} ETH (including gas fees). Your balance: ${balanceInEth.toFixed(4)} ETH`, 'error');
                    return;
                }
            } catch (error) {
                showAlert('Failed to check balance', 'error');
                return;
            }
            
            try {
                setButtonLoading(true);

                const transaction = {
                    from: userAccount,
                    to: CONFIG.contractAddress,
                    value: web3.utils.toWei(ethAmount.toString(), 'ether'),
                    gas: CONFIG.gasLimit
                };

                const txHash = await web3.eth.sendTransaction(transaction);
                
                showAlert(`Transaction submitted successfully! Hash: ${txHash.transactionHash}`, 'success');
                console.log('Transaction hash:', txHash.transactionHash);

                // Optional: Open etherscan link
                setTimeout(() => {
                    showAlert(`View transaction on Etherscan: https://etherscan.io/tx/${txHash.transactionHash}`, 'success');
                }, 2000);

            } catch (error) {
                console.error('Purchase error:', error);
                if (error.code === 4001) {
                    showAlert('Transaction rejected by user', 'warning');
                } else if (error.message.includes('insufficient funds')) {
                    showAlert('Insufficient funds for gas fees', 'error');
                } else {
                    showAlert('Transaction failed: ' + error.message, 'error');
                }
            } finally {
                setButtonLoading(false);
            }
        }

        // Purchase tokens (second section)
        async function purchaseTokens2() {
            if (!connected) {
                showAlert('Please connect your wallet first', 'warning', 2);
                await connectWallet2();
                return;
            }

            const tokenAmount = parseInt(document.getElementById('token-amount-2').value);
            if (tokenAmount <= 0 || isNaN(tokenAmount)) {
                showAlert('Please enter a valid token amount', 'error', 2);
                return;
            }

            const ethAmount = (tokenAmount * CONFIG.tokenPrice);
            
            // Check if user has enough balance
            try {
                const balance = await web3.eth.getBalance(userAccount);
                const balanceInEth = parseFloat(web3.utils.fromWei(balance, 'ether'));
                const requiredEth = ethAmount + 0.01; // Adding gas fee buffer
                
                if (balanceInEth < requiredEth) {
                    showAlert(`Insufficient balance! You need at least ${requiredEth.toFixed(4)} ETH (including gas fees). Your balance: ${balanceInEth.toFixed(4)} ETH`, 'error', 2);
                    return;
                }
            } catch (error) {
                showAlert('Failed to check balance', 'error', 2);
                return;
            }
            
            try {
                setButtonLoading(true, 2);

                const transaction = {
                    from: userAccount,
                    to: CONFIG.contractAddress,
                    value: web3.utils.toWei(ethAmount.toString(), 'ether'),
                    gas: CONFIG.gasLimit
                };

                const txHash = await web3.eth.sendTransaction(transaction);
                
                showAlert(`Transaction submitted successfully! Hash: ${txHash.transactionHash}`, 'success', 2);
                console.log('Transaction hash:', txHash.transactionHash);

                // Optional: Open etherscan link
                setTimeout(() => {
                    showAlert(`View transaction on Etherscan: https://etherscan.io/tx/${txHash.transactionHash}`, 'success', 2);
                }, 2000);

            } catch (error) {
                console.error('Purchase error:', error);
                if (error.code === 4001) {
                    showAlert('Transaction rejected by user', 'warning', 2);
                } else if (error.message.includes('insufficient funds')) {
                    showAlert('Insufficient funds for gas fees', 'error', 2);
                } else {
                    showAlert('Transaction failed: ' + error.message, 'error', 2);
                }
            } finally {
                setButtonLoading(false, 2);
            }
        }

        // Update UI based on connection status
        async function updateUI() {
            const connectBtn = document.getElementById('connect-btn');
            const connectBtn2 = document.getElementById('connect-btn-2');
            const purchaseBtn = document.getElementById('purchase-btn');
            const purchaseBtn2 = document.getElementById('purchase-btn-2');
            const walletInfo = document.getElementById('wallet-info');
            const walletInfo2 = document.getElementById('wallet-info-2');

            if (connected && userAccount) {
                try {
                    // Hide connect buttons, show purchase buttons
                    connectBtn.style.display = 'none';
                    connectBtn2.style.display = 'none';
                    purchaseBtn.style.display = 'block';
                    purchaseBtn2.style.display = 'block';
                    
                    // Update wallet info
                    const balance = await web3.eth.getBalance(userAccount);
                    const ethBalance = web3.utils.fromWei(balance, 'ether');
                    const networkId = await web3.eth.net.getId();
                    
                    document.getElementById('wallet-address').textContent = 
                        userAccount.substring(0, 6) + '...' + userAccount.substring(38);
                    document.getElementById('wallet-address-2').textContent = 
                        userAccount.substring(0, 6) + '...' + userAccount.substring(38);
                    document.getElementById('wallet-balance').textContent = parseFloat(ethBalance).toFixed(4);
                    document.getElementById('wallet-balance-2').textContent = parseFloat(ethBalance).toFixed(4);
                    
                    // Update network name
                    const networkName = networkId === 1 ? 'Ethereum Mainnet' : `Network ID: ${networkId}`;
                    document.getElementById('network-name').textContent = networkName;
                    document.getElementById('network-name-2').textContent = networkName;
                    
                    walletInfo.style.display = 'block';
                    walletInfo2.style.display = 'block';

                    // Show warning if balance is too low
                    if (parseFloat(ethBalance) < 0.01) {
                        showAlert('Warning: Your ETH balance is very low. You need ETH to make transactions and pay gas fees.', 'warning');
                    }
                    
                } catch (error) {
                    console.error('Error updating UI:', error);
                    showAlert('Failed to load wallet information', 'error');
                }
            } else {
                // Show connect buttons, hide purchase buttons
                connectBtn.style.display = 'block';
                connectBtn2.style.display = 'block';
                purchaseBtn.style.display = 'none';
                purchaseBtn2.style.display = 'none';
                walletInfo.style.display = 'none';
                walletInfo2.style.display = 'none';
            }
        }

        // Set button loading state
        function setButtonLoading(loading, section = 1) {
            const btnId = section === 1 ? 'purchase-btn' : 'purchase-btn-2';
            const textId = section === 1 ? 'btn-text' : 'btn-text-2';
            
            const btn = document.getElementById(btnId);
            const btnText = document.getElementById(textId);
            
            if (loading) {
                btn.disabled = true;
                btnText.innerHTML = '<div class="loading"></div> Processing...';
            } else {
                btn.disabled = false;
                btnText.textContent = 'PURCHASE TOKEN NOW';
            }
        }

        // Show alert messages
        function showAlert(message, type, section = 1) {
            const alertId = section === 1 ? 'metamask-alerts' : 'metamask-alerts-2';
            const alertContainer = document.getElementById(alertId);
            
            let alertClass;
            switch(type) {
                case 'success': alertClass = 'alert-success'; break;
                case 'warning': alertClass = 'alert-warning'; break;
                case 'error': 
                default: alertClass = 'alert-error'; break;
            }
            
            alertContainer.innerHTML = `
                <div class="alert ${alertClass}">
                    ${message}
                </div>
            `;

            // Clear alert after 8 seconds
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 8000);
        }

        // Token amount controls
        function increaseAmount() {
            const input = document.getElementById('token-amount');
            const currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 100;
        }

        function decreaseAmount() {
            const input = document.getElementById('token-amount');
            const currentValue = parseInt(input.value) || 0;
            const newValue = currentValue - 100;
            input.value = newValue > 0 ? newValue : 1;
        }

        // Listen for account changes
        if (window.ethereum) {
            window.ethereum.on('accountsChanged', function (accounts) {
                if (accounts.length === 0) {
                    connected = false;
                    userAccount = null;
                    showAlert('Wallet disconnected', 'warning');
                } else {
                    userAccount = accounts[0];
                    connected = true;
                    showAlert('Account changed', 'success');
                }
                updateUI();
            });

            window.ethereum.on('chainChanged', function (chainId) {
                showAlert('Network changed. Reloading page...', 'warning');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            });
        }

        // Initialize countdown timer
        function initCountdown() {
            // Set countdown date (30 days from now as example)
            const countdownDate = new Date();
            countdownDate.setDate(countdownDate.getDate() + 30);
            
            const x = setInterval(function() {
                const now = new Date().getTime();
                const distance = countdownDate.getTime() - now;
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Update both countdowns
                document.getElementById("dayls").innerHTML = days >= 0 ? days : 0;
                document.getElementById("hours").innerHTML = hours >= 0 ? hours : 0;
                document.getElementById("minutes").innerHTML = minutes >= 0 ? minutes : 0;
                document.getElementById('seconds').innerHTML = seconds >= 0 ? seconds : 0;

                document.getElementById("daylss").innerHTML = days >= 0 ? days : 0;
                document.getElementById("hourss").innerHTML = hours >= 0 ? hours : 0;
                document.getElementById("minutess").innerHTML = minutes >= 0 ? minutes : 0;
                document.getElementById('secondss').innerHTML = seconds >= 0 ? seconds : 0;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("dayls").innerHTML = 0;
                    document.getElementById("hours").innerHTML = 0;
                    document.getElementById("minutes").innerHTML = 0;
                    document.getElementById('seconds').innerHTML = 0;
                    document.getElementById("daylss").innerHTML = 0;
                    document.getElementById("hourss").innerHTML = 0;
                    document.getElementById("minutess").innerHTML = 0;
                    document.getElementById('secondss').innerHTML = 0;
                }
            }, 1000);
        }
    </script>

</body>
</html>
<?php /**PATH D:\Mahamaya\mahamaya\resources\views/home/index.blade.php ENDPATH**/ ?>