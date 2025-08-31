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
                <div class="mt-2 mb-4">
                    <h2 class="text-<?php echo e($text); ?> pb-2">
                        <i class="fas fa-user-edit"></i> Account Settings
                    </h2>
                    <p class="text-<?php echo e($text); ?>">Manage your personal information, security settings, and wallet configuration.</p>
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
                <?php if (isset($component)) { $__componentOriginalb5cdbe3a1bc3848636cb76bad87486f6477a292c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ErrorAlert::class, []); ?>
<?php $component->withName('error-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5cdbe3a1bc3848636cb76bad87486f6477a292c)): ?>
<?php $component = $__componentOriginalb5cdbe3a1bc3848636cb76bad87486f6477a292c; ?>
<?php unset($__componentOriginalb5cdbe3a1bc3848636cb76bad87486f6477a292c); ?>
<?php endif; ?>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Profile Information Card -->
                            <div class="col-md-12">
                                <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                    <div class="card-body">
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item">
                                                <a href="#per" class="nav-link active" data-toggle="tab">
                                                    <i class="fas fa-user"></i> Personal Data
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#pas" class="nav-link" data-toggle="tab">
                                                    <i class="fas fa-lock"></i> Password
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#wallet" class="nav-link" data-toggle="tab">
                                                    <i class="fab fa-ethereum"></i> MetaMask Wallet
                                                </a>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content mt-4">
                                            <!-- Personal Data Tab -->
                                            <div class="tab-pane fade show active" id="per">
                                                <h5 class="text-<?php echo e($text); ?> mb-3">
                                                    <i class="fas fa-info-circle text-primary"></i> Personal Information
                                                </h5>
                                                
                                                <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-user"></i> Full Name
                                                            </label>
                                                            <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>" name="fullname" required>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-envelope"></i> Email Address
                                                            </label>
                                                            <input type="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>" name="email" readonly>
                                                            <small class="form-text text-muted">Email cannot be changed for security reasons</small>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-phone"></i> Mobile Number
                                                            </label>
                                                            <input type="text" class="form-control" value="<?php echo e(Auth::user()->phone_number); ?>" name="number">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-calendar"></i> Date of Birth
                                                            </label>
                                                            <input type="date" value="<?php echo e(Auth::user()->dob); ?>" class="form-control" name="dob">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-globe"></i> Nationality
                                                            </label>
                                                            <select class="form-control" name="nationality">
                                                                <option selected><?php echo e(Auth::user()->nationality ?? 'Select Country'); ?></option>
                                                                <?php echo $__env->make('profile.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            </select>
                                                        </div>
                                                        
                                                        <?php if(Auth::user()->verification_status == "Verified" && isset($address)): ?>
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-map-marker-alt"></i> Verified Address
                                                            </label>
                                                            <textarea class="form-control" disabled rows="3"><?php echo e($address->address ?? 'No address on file'); ?></textarea>
                                                            <small class="form-text text-muted">Address verified through KYC process</small>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-save"></i> Update Profile
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- Password Tab -->
                                            <div class="tab-pane fade" id="pas">
                                                <h5 class="text-<?php echo e($text); ?> mb-3">
                                                    <i class="fas fa-shield-alt text-warning"></i> Change Password
                                                </h5>
                                                
                                                <form method="POST" action="<?php echo e(route('password.update')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-key"></i> Current Password
                                                            </label>
                                                            <input type="password" class="form-control" name="old_password" required>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-lock"></i> New Password
                                                            </label>
                                                            <input type="password" class="form-control" name="password" required minlength="8">
                                                            <small class="form-text text-muted">Minimum 8 characters required</small>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-<?php echo e($text); ?>">
                                                                <i class="fas fa-check-circle"></i> Confirm New Password
                                                            </label>
                                                            <input type="password" class="form-control" name="password_confirmation" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-warning">
                                                            <i class="fas fa-key"></i> Update Password
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- MetaMask Wallet Tab -->
                                            <div class="tab-pane fade" id="wallet">
                                                <h5 class="text-<?php echo e($text); ?> mb-3">
                                                    <i class="fab fa-ethereum text-primary"></i> MetaMask Wallet Configuration
                                                </h5>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if(Auth::user()->wallet_address): ?>
                                                            <!-- Current Wallet Display -->
                                                            <div class="alert alert-success">
                                                                <h6><i class="fas fa-check-circle"></i> Wallet Connected</h6>
                                                                <p class="mb-2">
                                                                    <strong>Address:</strong><br>
                                                                    <code class="text-success"><?php echo e(Auth::user()->wallet_address); ?></code>
                                                                </p>
                                                                <div class="mt-2">
                                                                    <button class="btn btn-sm btn-outline-primary" onclick="copyWalletAddress()">
                                                                        <i class="fas fa-copy"></i> Copy Address
                                                                    </button>
                                                                    <a href="https://etherscan.io/address/<?php echo e(Auth::user()->wallet_address); ?>" target="_blank" class="btn btn-sm btn-outline-info">
                                                                        <i class="fas fa-external-link-alt"></i> View on Etherscan
                                                                    </a>
                                                                    <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#walletmodal">
                                                                        <i class="fas fa-edit"></i> Change Wallet
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Wallet Statistics -->
                                                            <div class="card bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                                                <div class="card-body">
                                                                    <h6 class="text-<?php echo e($text); ?>">MetaMask Integration Status</h6>
                                                                    <div class="row text-center">
                                                                        <div class="col-md-4">
                                                                            <div class="p-2">
                                                                                <i class="fas fa-check text-success fa-2x"></i>
                                                                                <p class="text-<?php echo e($text); ?> mt-2 mb-0">Wallet Connected</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="p-2">
                                                                                <i class="fas fa-coins text-primary fa-2x"></i>
                                                                                <p class="text-<?php echo e($text); ?> mt-2 mb-0">Ready for Purchases</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="p-2">
                                                                                <i class="fas fa-shield-alt text-warning fa-2x"></i>
                                                                                <p class="text-<?php echo e($text); ?> mt-2 mb-0">Secure Transactions</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <!-- No Wallet Connected -->
                                                            <div class="alert alert-warning">
                                                                <h6><i class="fas fa-exclamation-triangle"></i> No Wallet Connected</h6>
                                                                <p>Connect your MetaMask wallet to enable cryptocurrency purchases and enhanced security features.</p>
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#walletmodal">
                                                                    <i class="fab fa-ethereum"></i> Connect MetaMask Wallet
                                                                </button>
                                                            </div>
                                                            
                                                            <!-- Wallet Benefits -->
                                                            <div class="card bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                                                <div class="card-body">
                                                                    <h6 class="text-<?php echo e($text); ?>">Benefits of Connecting MetaMask</h6>
                                                                    <ul class="list-unstyled text-<?php echo e($text); ?>">
                                                                        <li><i class="fas fa-check text-success"></i> Direct cryptocurrency payments</li>
                                                                        <li><i class="fas fa-check text-success"></i> Lower transaction fees</li>
                                                                        <li><i class="fas fa-check text-success"></i> Instant token purchases</li>
                                                                        <li><i class="fas fa-check text-success"></i> Blockchain transaction verification</li>
                                                                        <li><i class="fas fa-check text-success"></i> Enhanced account security</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Two-Factor Authentication Card -->
                            <div class="col-md-12">
                                <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                    <div class="card-body">
                                        <h3 class="card-title text-<?php echo e($text); ?>">
                                            <i class="fas fa-mobile-alt text-success"></i> Two-Factor Authentication
                                        </h3>
                                        <p class="card-text text-<?php echo e($text); ?>">
                                            Two-factor authentication adds an extra layer of security to your account. When activated, you'll need to enter both your password and a special code from your mobile authenticator app to access your account.
                                        </p>
                                        
                                        <?php if(Laravel\Fortify\Features::canManageTwoFactorAuthentication()): ?>
                                            <div class="mt-3">
                                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.two-factor-authentication-form')->html();
} elseif ($_instance->childHasBeenRendered('tQv6Ni0')) {
    $componentId = $_instance->getRenderedChildComponentId('tQv6Ni0');
    $componentTag = $_instance->getRenderedChildComponentTagName('tQv6Ni0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tQv6Ni0');
} else {
    $response = \Livewire\Livewire::mount('profile.two-factor-authentication-form');
    $html = $response->html();
    $_instance->logRenderedChild('tQv6Ni0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <!-- Account Overview Card -->
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-<?php echo e($text); ?>">
                                    <i class="fas fa-user-circle"></i> Account Overview
                                </h5>
                                <div class="mb-2">
                                    <strong class="text-<?php echo e($text); ?>">Name:</strong><br>
                                    <span class="text-<?php echo e($text); ?>"><?php echo e(Auth::user()->name); ?></span>
                                </div>
                                <div class="mb-2">
                                    <strong class="text-<?php echo e($text); ?>">Email Status:</strong><br>
                                    <?php if(Auth::user()->email_verified_at): ?>
                                        <span class="badge badge-success">
                                            <i class="fas fa-check-circle"></i> Verified
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-warning">
                                            <i class="fas fa-exclamation-circle"></i> Not Verified
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-2">
                                    <strong class="text-<?php echo e($text); ?>">KYC Status:</strong><br>
                                    <?php if(Auth::user()->verification_status == "Verified"): ?>
                                        <span class="badge badge-success">
                                            <i class="fas fa-shield-alt"></i> Verified
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock"></i> Pending
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <strong class="text-<?php echo e($text); ?>">Member Since:</strong><br>
                                    <span class="text-<?php echo e($text); ?>"><?php echo e(Auth::user()->created_at->format('M d, Y')); ?></span>
                                </div>
                            </div>
                        </div>

                        <?php echo $__env->make('user.include.sideaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copy Wallet Address Script -->
    <script>
        function copyWalletAddress() {
            const walletAddress = '<?php echo e(Auth::user()->wallet_address); ?>';
            navigator.clipboard.writeText(walletAddress).then(function() {
                // Success notification
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
                alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 300px;';
                alertDiv.innerHTML = `
                    <i class="fas fa-check-circle"></i> Wallet address copied to clipboard!
                    <button type="button" class="close" onclick="this.parentElement.remove()">
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
                alert('Copy failed. Address: ' + walletAddress);
            });
        }
    </script>
    
    <?php echo $__env->make('user.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/profile/show.blade.php ENDPATH**/ ?>