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
    <?php echo $__env->make('user.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel bg-<?php echo e($bg); ?>">
        <div class="content bg-<?php echo e($bg); ?>">
            <div class="page-inner">
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
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                    <div class="p-4 card-body">
                                        <h3 class="card-title text-<?php echo e($text); ?>">My <?php echo e($settings->token_symbol); ?> Token Portfolio</h3>
                                        
                                        <!-- Token Purchased Section -->
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <h5 class="text-<?php echo e($text); ?>">Token Purchased</h5> 
                                            <h1 class="text-primary d-inline"><?php echo e(number_format(Auth::user()->token_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?></h1>
                                            <div class="float-right">
                                                <a href="<?php echo e(route('buytoken')); ?>" class="p-2 btn btn-primary">
                                                    <i class="fas fa-plus"></i> Buy More Tokens
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p class="mt-2 text-<?php echo e($text); ?>">
                                                <i class="fas fa-dollar-sign"></i> 
                                                Equivalent to <strong><?php echo e(number_format($total)); ?> USD</strong>
                                            </p>
                                        </div>

                                        <!-- Total Token Balance Section -->
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="text-<?php echo e($text); ?> mb-2">Total Token Balance</h5> 
                                                    <h1 class="text-success d-inline"><?php echo e(number_format(Auth::user()->tot_tk_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?></h1>
                                                </div>
                                                <div>
                                                    <a href="#" data-toggle="modal" data-target="#transfermodal" class="btn btn-warning">
                                                        <i class="fas fa-exchange-alt"></i> Transfer
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <!-- Token Breakdown -->
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <div class="text-center p-2 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                        <span class="text-<?php echo e($text); ?>"><strong>Referral Tokens</strong></span><br>
                                                        <span class="text-info"><?php echo e(number_format(Auth::user()->ref_bonus ?? 0)); ?> <?php echo e($settings->token_symbol); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center p-2 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                        <span class="text-<?php echo e($text); ?>"><strong>Bonus Tokens</strong></span><br>
                                                        <span class="text-warning"><?php echo e(number_format(Auth::user()->tk_bonus_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center p-2 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                        <span class="text-<?php echo e($text); ?>"><strong>ROI Tokens</strong></span><br>
                                                        <span class="text-success"><?php echo e(number_format(Auth::user()->roi_bal ?? 0, 2, '.', ',')); ?> <?php echo e($settings->token_symbol); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Total Contributed Section -->
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <h5 class="text-<?php echo e($text); ?>">Total Contributed</h5> 
                                            <h1 class="text-info">
                                                <i class="fas fa-chart-line"></i> 
                                                <?php echo e(number_format($total)); ?> USD
                                            </h1>
                                            <p class="text-<?php echo e($text); ?> mb-0">
                                                Your total investment in <?php echo e($settings->token_symbol); ?> tokens
                                            </p>
                                        </div>

                                        <!-- Recent MetaMask Transactions Section -->
                                        <?php if(isset($recent_metamask_txn) && $recent_metamask_txn->count() > 0): ?>
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="text-<?php echo e($text); ?> mb-0">
                                                    <i class="fab fa-ethereum text-warning"></i> Recent MetaMask Purchases
                                                </h5>
                                                <a href="<?php echo e(route('transactions')); ?>" class="btn btn-sm btn-outline-primary">
                                                    View All
                                                </a>
                                            </div>
                                            
                                            <?php $__currentLoopData = $recent_metamask_txn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                                <div>
                                                    <strong class="text-<?php echo e($text); ?>"><?php echo e(number_format($txn->tokens)); ?> <?php echo e($settings->token_symbol); ?></strong><br>
                                                    <small class="text-muted">
                                                        <?php echo e($txn->amount); ?> ETH 
                                                        <?php if($txn->gst_amount_eth): ?>
                                                            (inc. <?php echo e($txn->gst_amount_eth); ?> ETH GST)
                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                                <div class="text-right">
                                                    <small class="text-<?php echo e($text); ?>"><?php echo e($txn->created_at->diffForHumans()); ?></small><br>
                                                    <?php if($txn->txn_id): ?>
                                                        <a href="https://etherscan.io/tx/<?php echo e($txn->txn_id); ?>" target="_blank" class="btn btn-xs btn-outline-info">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Recent Transactions Overview -->
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="text-<?php echo e($text); ?> mb-0">All Transaction Activity</h5>
                                                <a href="<?php echo e(route('transactions')); ?>" class="btn btn-sm btn-outline-primary">
                                                    View All Transactions
                                                </a>
                                            </div>
                                            <div class="mt-2">
                                                <small class="text-<?php echo e($text); ?>">
                                                    <i class="fas fa-info-circle"></i> 
                                                    View your complete transaction history including MetaMask purchases, traditional payments, transfers, and bonuses
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Token Distribution Chart -->
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <h5 class="text-<?php echo e($text); ?>">Token Distribution</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-primary" role="progressbar" 
                                                             style="width: <?php echo e(Auth::user()->token_bal > 0 && Auth::user()->tot_tk_bal > 0 ? (Auth::user()->token_bal / Auth::user()->tot_tk_bal * 100) : 0); ?>%">
                                                        </div>
                                                    </div>
                                                    <small class="text-<?php echo e($text); ?>">Purchased Tokens (<?php echo e(number_format((Auth::user()->token_bal / max(Auth::user()->tot_tk_bal, 1)) * 100, 1)); ?>%)</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-success" role="progressbar" 
                                                             style="width: <?php echo e(Auth::user()->tot_tk_bal > 0 ? ((Auth::user()->ref_bonus + Auth::user()->tk_bonus_bal + Auth::user()->roi_bal) / Auth::user()->tot_tk_bal * 100) : 0); ?>%">
                                                        </div>
                                                    </div>
                                                    <small class="text-<?php echo e($text); ?>">Earned Tokens (<?php echo e(number_format(((Auth::user()->ref_bonus + Auth::user()->tk_bonus_bal + Auth::user()->roi_bal) / max(Auth::user()->tot_tk_bal, 1)) * 100, 1)); ?>%)</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Quick Actions -->
                                        <div class="p-3 mt-3 border rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                            <h5 class="text-<?php echo e($text); ?> mb-3">Quick Actions</h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-primary btn-block">
                                                        <i class="fas fa-shopping-cart"></i><br>
                                                        <small>Buy with Card/Bank</small>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-warning btn-block">
                                                        <i class="fab fa-ethereum"></i><br>
                                                        <small>Buy with MetaMask</small>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="#" data-toggle="modal" data-target="#transfermodal" class="btn btn-info btn-block">
                                                        <i class="fas fa-paper-plane"></i><br>
                                                        <small>Transfer Tokens</small>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="<?php echo e(route('transactions')); ?>" class="btn btn-success btn-block">
                                                        <i class="fas fa-history"></i><br>
                                                        <small>View History</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <!-- Wallet Information Card -->
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-<?php echo e($text); ?>">
                                    <i class="fas fa-wallet"></i> Wallet Information
                                </h5>
                                <?php if(Auth::user()->wallet_address): ?>
                                    <p class="text-<?php echo e($text); ?>">
                                        <strong>Address:</strong><br>
                                        <small class="text-muted font-monospace"><?php echo e(Str::limit(Auth::user()->wallet_address, 30, '...')); ?></small>
                                    </p>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-info" onclick="copyToClipboard('<?php echo e(Auth::user()->wallet_address); ?>')">
                                            <i class="fas fa-copy"></i> Copy Address
                                        </button>
                                        <a href="https://etherscan.io/address/<?php echo e(Auth::user()->wallet_address); ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-external-link-alt"></i> View on Etherscan
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center p-3">
                                        <i class="fas fa-exclamation-triangle text-warning fa-2x mb-2"></i>
                                        <p class="text-danger mb-2">No wallet address added</p>
                                        <a href="#" data-toggle="modal" data-target="#walletmodal" class="btn btn-warning btn-sm">
                                            <i class="fas fa-plus"></i> Add Wallet Address
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Token Stats Card -->
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-<?php echo e($text); ?>">Token Statistics</h5>
                                <ul class="list-unstyled">
                                    <li class="text-<?php echo e($text); ?> mb-2">
                                        <i class="fas fa-coins text-primary"></i> 
                                        Current Price: <strong>$<?php echo e(number_format($settings->amt_usd ?? 0, 2)); ?></strong>
                                    </li>
                                    <li class="text-<?php echo e($text); ?> mb-2">
                                        <i class="fas fa-chart-line text-success"></i> 
                                        Your Holdings: <strong><?php echo e(number_format(Auth::user()->tot_tk_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?></strong>
                                    </li>
                                    <li class="text-<?php echo e($text); ?> mb-2">
                                        <i class="fas fa-percentage text-info"></i> 
                                        Portfolio Value: <strong>$<?php echo e(number_format($total)); ?></strong>
                                    </li>
                                    <li class="text-<?php echo e($text); ?>">
                                        <i class="fab fa-ethereum text-warning"></i> 
                                        MetaMask Ready: 
                                        <?php if(Auth::user()->wallet_address): ?>
                                            <strong class="text-success">Yes</strong>
                                        <?php else: ?>
                                            <strong class="text-danger">Setup Required</strong>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Purchase Methods Card -->
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-<?php echo e($text); ?>">Purchase Methods</h5>
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-outline-primary btn-block">
                                            <i class="fas fa-credit-card"></i><br>
                                            <small>Traditional</small>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="<?php echo e(route('buytoken')); ?>" class="btn btn-outline-warning btn-block">
                                            <i class="fab fa-ethereum"></i><br>
                                            <small>MetaMask</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php echo $__env->make('user.include.sideaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('user.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Copy to Clipboard Script -->
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Create a temporary notification
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
                alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 300px;';
                alertDiv.innerHTML = `
                    <i class="fas fa-check-circle"></i> Wallet address copied to clipboard!
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                `;
                document.body.appendChild(alertDiv);
                
                // Auto-remove after 3 seconds
                setTimeout(() => {
                    if (alertDiv.parentNode) {
                        alertDiv.parentNode.removeChild(alertDiv);
                    }
                }, 3000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
                alert('Copy failed. Please copy manually: ' + text);
            });
        }

        // Auto-refresh token data every 30 seconds to show updated balances
        setInterval(function() {
            // Only refresh if user seems active (has moved mouse recently)
            if (document.hasFocus()) {
                location.reload();
            }
        }, 30000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/user/mytoken.blade.php ENDPATH**/ ?>