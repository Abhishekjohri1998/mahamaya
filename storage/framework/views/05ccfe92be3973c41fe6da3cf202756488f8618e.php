<?php
if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}
?>



<?php $__env->startSection('content'); ?>
    <!-- Add this CSS to force text visibility -->
    <style>
        .token-balance-card .numbers {
            color: white !important;
        }
        .token-balance-card .numbers * {
            color: white !important;
        }
        .token-balance-card .text-warning {
            color: #ffc107 !important;
        }
    </style>

    <?php echo $__env->make('user.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel bg-<?php echo e($bg); ?>">
        <div class="content bg-<?php echo e($bg); ?>">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h2 class="text-<?php echo e($text); ?> pb-2">Welcome, <?php echo e(Auth::user()->name); ?>!</h2>
                    <?php if(isset($settings->annoucement) && !empty($settings->annoucement)): ?>
                        <div class="alert alert-info alert-dismissible fade show">
                            <i class="fas fa-info-circle"></i>
                            <strong>Announcement:</strong> <?php echo e($settings->annoucement); ?>

                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                
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

                <!-- Enhanced Dashboard Stats -->
                <div class="row row-card-no-pd bg-<?php echo e($bg); ?> shadow-none">
                    <!-- Token Balance Card - FIXED WITH FORCED WHITE TEXT -->
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-round bg-gradient-primary token-balance-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-3 col-12 col-stats">
                                        <div class="numbers">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-coins fa-2x text-warning"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="card-category" style="color: black !important; font-size: 14px;">Total Token Balance</p>
                                                    <h4 class="card-title mb-0" style="color: black !important; font-weight: bold; font-size: 18px;">
                                                        <?php echo e(number_format(Auth::user()->tot_tk_bal ?? 0, 2, ".", ",")); ?> <?php echo e($settings->token_symbol); ?>

                                                    </h4>
                                                    <small style="color: black !important; opacity: 0.8;">≈ $<?php echo e(number_format((Auth::user()->tot_tk_bal ?? 0) * $settings->amt_usd, 2)); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stage Information Card -->
                    <div class="p-2 col-sm-6 col-md-4">
                        <div class="card card-round bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-stats">
                                        <div class="numbers">
                                            <h3 class="card-category text-<?php echo e($text); ?>">
                                                <?php if($stage): ?>
                                                    <i class="fas fa-rocket text-primary"></i> <?php echo e($stage->stage_name); ?> 
                                                    <?php if($stage->sales == "on" && $stage->status == "active"): ?>
                                                    <span class="px-2 py-1 badge badge-success">
                                                        <i class="fas fa-play"></i> Active
                                                    </span>
                                                    <?php else: ?>
                                                    <span class="px-2 py-1 badge badge-warning">
                                                        <i class="fas fa-pause"></i> Paused
                                                    </span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <i class="fas fa-info-circle text-muted"></i> No Active Stage
                                                <?php endif; ?>
                                            </h3>
                                            <h4 class="card-title text-<?php echo e($text); ?> mb-3">
                                                <i class="fas fa-tag text-success"></i> 1 <?php echo e($settings->token_symbol); ?> = $<?php echo e(number_format($settings->amt_usd, 2)); ?>

                                            </h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-primary btn-block btn-sm">
                                                        <i class="fas fa-credit-card"></i><br>
                                                        <small>Buy Traditional</small>
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-warning btn-block btn-sm">
                                                        <i class="fab fa-ethereum"></i><br>
                                                        <small>Buy MetaMask</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Status Card -->
                    <div class="p-2 col-sm-6 col-md-4">
                        <div class="card card-round bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-3 col-12 col-stats">
                                        <div class="numbers">
                                            <h3 class="mb-3 card-category text-bold text-<?php echo e($text); ?>">
                                                <i class="fas fa-user-check"></i> Account Status
                                            </h3>
                                            <div class="mb-2">
                                                <?php if(Auth::user()->email_verified_at): ?>
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check-circle"></i> Email Verified
                                                    </span>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('verification.notice')); ?>" class="badge badge-danger">
                                                        <i class="fas fa-exclamation-circle"></i> Email Not Verified
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <?php if(Auth::user()->verification_status != "Verified"): ?>
                                                    <a href="<?php echo e(route('kycinfo')); ?>" class="badge badge-warning">
                                                        <i class="fas fa-id-card"></i> Complete KYC
                                                    </a>
                                                <?php else: ?>
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-shield-alt"></i> KYC Verified
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <div>
                                                <?php if(Auth::user()->wallet_address): ?>
                                                    <span class="badge badge-info">
                                                        <i class="fab fa-ethereum"></i> MetaMask Ready
                                                    </span>
                                                <?php else: ?>
                                                    <a href="#" data-toggle="modal" data-target="#walletmodal" class="badge badge-secondary">
                                                        <i class="fas fa-wallet"></i> Add Wallet
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent MetaMask Transactions (if any) -->
                <?php if(isset($recent_metamask_txn) && $recent_metamask_txn->count() > 0): ?>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-<?php echo e($text); ?>">
                                        <i class="fab fa-ethereum text-warning"></i> Recent MetaMask Purchases
                                    </h4>
                                    <a href="<?php echo e(route('transactions')); ?>" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-list"></i> View All
                                    </a>
                                </div>
                                
                                <div class="row">
                                    <?php $__currentLoopData = $recent_metamask_txn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="card bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> border">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="text-<?php echo e($text); ?> mb-1"><?php echo e(number_format($txn->tokens)); ?> <?php echo e($settings->token_symbol); ?></h6>
                                                        <small class="text-muted">
                                                            <?php echo e($txn->amount); ?> ETH
                                                            <?php if($txn->gst_amount_eth): ?>
                                                                <br><span class="text-info">(+<?php echo e($txn->gst_amount_eth); ?> GST)</span>
                                                            <?php endif; ?>
                                                        </small>
                                                    </div>
                                                    <div class="text-right">
                                                        <small class="text-muted"><?php echo e($txn->created_at->diffForHumans()); ?></small>
                                                        <?php if($txn->txn_id): ?>
                                                            <br><a href="https://etherscan.io/tx/<?php echo e($txn->txn_id); ?>" target="_blank" class="btn btn-xs btn-outline-info">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Welcome Section -->
                <div class="row row-card-no-pd bg-<?php echo e($bg); ?> shadow-none mt-4">
                    <div class="col-md-12">
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-3 col-md-3 text-center">
                                        <img src="<?php echo e(asset('storage/app/public/'. $settings->logo)); ?>" class="img-fluid" style="max-width: 150px;"> 
                                    </div> 
                                    <div class="p-3 col-md-9">
                                        <h3 class="text-<?php echo e($text); ?>">
                                            <i class="fas fa-handshake text-primary"></i> Thank you for choosing <?php echo e($settings->site_name); ?>

                                        </h3>
                                        <p class="text-<?php echo e($text); ?> mb-3">
                                            <?php echo e($settings->whitepaper); ?>

                                        </p>
                                        
                                        <!-- Quick Actions -->
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-primary btn-block">
                                                    <i class="fas fa-shopping-cart"></i> Buy Tokens
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <a href="<?php echo e(route('mytoken')); ?>" class="btn btn-info btn-block">
                                                    <i class="fas fa-coins"></i> My Portfolio
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <a href="<?php echo e(route('transactions')); ?>" class="btn btn-success btn-block">
                                                    <i class="fas fa-history"></i> Transactions
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <a href="#" class="btn btn-secondary btn-block">
                                                    <i class="fas fa-download"></i> Whitepaper
                                                </a>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/user/dashboard.blade.php ENDPATH**/ ?>