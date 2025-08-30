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
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                               <h2 class="text-<?php echo e($text); ?>">
                                                   <i class="fas fa-coins text-primary"></i> Stake Your <?php echo e($settings->token_symbol); ?> Tokens
                                               </h2>
                                               <div class="text-right">
                                                   <small class="text-<?php echo e($text); ?>">Available Balance:</small><br>
                                                   <strong class="text-success"><?php echo e(number_format(Auth::user()->tot_tk_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?></strong>
                                               </div>
                                            </div>
                                            
                                            <div class="p-4 mt-3 shadow-lg rounded bg-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                                <?php if(!$mystake): ?>
                                                    <!-- Staking Information -->
                                                    <div class="row mb-4">
                                                        <div class="col-md-6">
                                                            <div class="text-center p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                                <span class="text-danger"><i class="fas fa-arrow-down"></i> <strong>Minimum Amount</strong></span><br>
                                                                <span class="text-<?php echo e($text); ?>"><?php echo e(number_format($settings->minstake)); ?> <?php echo e($settings->token_symbol); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="text-center p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                                <span class="text-danger"><i class="fas fa-arrow-up"></i> <strong>Maximum Amount</strong></span><br>
                                                                <span class="text-<?php echo e($text); ?>"><?php echo e(number_format($settings->maxstake)); ?> <?php echo e($settings->token_symbol); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Staking Form -->
                                                    <div class="p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                        <h5 class="text-<?php echo e($text); ?> mb-3">
                                                            <i class="fas fa-lock"></i> Create New Stake
                                                        </h5>
                                                        <form action="<?php echo e(route('stakenow')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label class="text-<?php echo e($text); ?>">Duration</label>
                                                                    <select name="duration" id="dura" class="form-control" onchange="calcAmount(this)">
                                                                        <?php if(in_array("onem", $duraarray)): ?>
                                                                        <option value="1 Month">1 Month</option> 
                                                                        <?php endif; ?>
                                                                        <?php if(in_array("fourm", $duraarray)): ?>
                                                                          <option value="4 Months">4 Months</option>  
                                                                        <?php endif; ?>
                                                                        <?php if(in_array("sixm", $duraarray)): ?>
                                                                          <option value="6 Months">6 Months</option>  
                                                                        <?php endif; ?>
                                                                        <?php if(in_array("ninem", $duraarray)): ?>
                                                                          <option value="9 Months">9 Months</option>  
                                                                        <?php endif; ?>
                                                                        <?php if(in_array("oney", $duraarray)): ?>
                                                                          <option value="1 Year">1 Year</option>  
                                                                        <?php endif; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="text-<?php echo e($text); ?>">Expected ROI</label>
                                                                    <input type="text" id="exroi" value="<?php echo e($settings->one_month_roi ?? 0); ?>%" class="form-control" readonly>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="text-<?php echo e($text); ?>">Amount to Stake</label>
                                                                    <input type="number" name="amount" min="<?php echo e($settings->minstake); ?>" placeholder="Enter amount" max="<?php echo e($settings->maxstake); ?>" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="text-<?php echo e($text); ?>">&nbsp;</label>
                                                                    <button type="submit" class="btn btn-primary btn-block">
                                                                        <i class="fas fa-lock"></i> Stake Now
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="roiexpected" id="exroireal">
                                                        </form>
                                                    </div>
                                                <?php else: ?>
                                                   <!-- Active Stake Display -->
                                                   <div class="text-center">
                                                        <div class="mb-4">
                                                            <h4 class="text-<?php echo e($text); ?>">Your Stake is Currently 
                                                                <?php if($mystake->status == 'active'): ?>
                                                                    <span class="badge badge-success badge-lg">
                                                                        <i class="fas fa-check-circle"></i> Active
                                                                    </span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-danger badge-lg">
                                                                        <i class="fas fa-times-circle"></i> Expired
                                                                    </span>
                                                                <?php endif; ?>
                                                            </h4>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                                    <h5 class="text-primary"><?php echo e(number_format($mystake->amount)); ?> <?php echo e($settings->token_symbol); ?></h5>
                                                                    <small class="text-<?php echo e($text); ?>">Amount Staked</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                                    <h5 class="text-success"><?php echo e($mystake->expected_roi); ?>%</h5>
                                                                    <small class="text-<?php echo e($text); ?>">Expected ROI</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mt-3">
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                                    <h5 class="text-info"><?php echo e(\Carbon\Carbon::parse($mystake->created_at)->format('M d, Y')); ?></h5>
                                                                    <small class="text-<?php echo e($text); ?>">Start Date</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                                    <h5 class="text-warning"><?php echo e(\Carbon\Carbon::parse($mystake->expire_date)->format('M d, Y')); ?></h5>
                                                                    <small class="text-<?php echo e($text); ?>">Expiry Date</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mt-4">
                                                          <a href="<?php echo e(route('cancelstake',$mystake->id)); ?>" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure you want to cancel this stake?')">
                                                              <i class="fas fa-unlock"></i> Cancel Stake
                                                          </a>  
                                                        </div>
                                                </div> 
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <!-- ROI Log Section -->
                                        <div class="mt-4">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h3 class="text-<?php echo e($text); ?>">
                                                    <i class="fas fa-chart-line text-success"></i> ROI History
                                                </h3>
                                                <div class="text-right">
                                                    <small class="text-<?php echo e($text); ?>">Total ROI Earned:</small><br>
                                                    <strong class="text-success"><?php echo e(number_format(Auth::user()->roi_bal ?? 0, 2)); ?> <?php echo e($settings->token_symbol); ?></strong>
                                                </div>
                                            </div>
                                            
                                            <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                                                <div class="card-body">
                                                    <?php if($rois && $rois->count() > 0): ?>
                                                        <div class="table-responsive"> 
                                                            <table class="table table-<?php echo e($bg == 'light' ? 'light' : 'dark'); ?>" id="ttable"> 
                                                                <thead> 
                                                                    <tr> 
                                                                        <th class="text-<?php echo e($text); ?>">
                                                                            <i class="fas fa-coins"></i> Token Received
                                                                        </th>
                                                                        <th class="text-<?php echo e($text); ?>">
                                                                            <i class="fas fa-info-circle"></i> Narration
                                                                        </th>
                                                                        <th class="text-<?php echo e($text); ?>">
                                                                            <i class="fas fa-calendar"></i> Date
                                                                        </th>
                                                                    </tr> 
                                                                </thead> 
                                                                <tbody> 
                                                                    <?php $__currentLoopData = $rois; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr> 
                                                                            <td class="text-<?php echo e($text); ?>">
                                                                                <strong class="text-success"><?php echo e(number_format($profit->amount, 2, '.', ',')); ?> <?php echo e($settings->token_symbol); ?></strong>
                                                                            </td> 
                                                                            <td class="text-<?php echo e($text); ?>">
                                                                                <span class="badge badge-info"><?php echo e($profit->narration); ?></span>
                                                                            </td> 
                                                                            <td class="text-<?php echo e($text); ?>">
                                                                                <?php echo e(\Carbon\Carbon::parse($profit->created_at)->format('M d, Y h:i A')); ?>

                                                                            </td>
                                                                        </tr>   
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody> 
                                                            </table>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="text-center py-4">
                                                            <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                                                            <h5 class="text-<?php echo e($text); ?>">No ROI History Yet</h5>
                                                            <p class="text-muted">Your ROI earnings will appear here once you start staking tokens.</p>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <!-- Staking Stats Card -->
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-<?php echo e($text); ?>">
                                    <i class="fas fa-chart-pie"></i> Staking Statistics
                                </h5>
                                <ul class="list-unstyled">
                                    <li class="text-<?php echo e($text); ?> mb-2">
                                        <i class="fas fa-coins text-primary"></i> 
                                        Available Balance: <strong><?php echo e(number_format(Auth::user()->tot_tk_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?></strong>
                                    </li>
                                    <li class="text-<?php echo e($text); ?> mb-2">
                                        <i class="fas fa-lock text-warning"></i> 
                                        Currently Staked: 
                                        <strong><?php echo e($mystake ? number_format($mystake->amount) : 0); ?> <?php echo e($settings->token_symbol); ?></strong>
                                    </li>
                                    <li class="text-<?php echo e($text); ?> mb-2">
                                        <i class="fas fa-percentage text-success"></i> 
                                        Total ROI Earned: <strong><?php echo e(number_format(Auth::user()->roi_bal ?? 0, 2)); ?> <?php echo e($settings->token_symbol); ?></strong>
                                    </li>
                                    <li class="text-<?php echo e($text); ?>">
                                        <i class="fas fa-calendar text-info"></i> 
                                        Staking Status: 
                                        <?php if($mystake): ?>
                                            <strong class="text-success">Active</strong>
                                        <?php else: ?>
                                            <strong class="text-muted">Not Staking</strong>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <?php echo $__env->make('user.include.sideaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>   
                </div>
                
                <!-- ROI Calculation Script -->
                <script type="text/javascript">
                    var amount = document.getElementById('exroi');
                    var amountpay = document.getElementById('exroireal');
                    
                    // Set default values
                    if(amount && amountpay) {
                        amount.value = "<?php echo e($settings->one_month_roi ?? 0); ?>" + '%';
                        amountpay.value = "<?php echo e($settings->one_month_roi ?? 0); ?>";
                    }
                    
                    function calcAmount(sub) {
                        if(!amount || !amountpay) return;
                        
                        if(sub.value == "1 Month"){
                            amount.value = "<?php echo e($settings->one_month_roi ?? 0); ?>" + '%';
                            amountpay.value = "<?php echo e($settings->one_month_roi ?? 0); ?>";
                        }
                        else if(sub.value == "4 Months"){
                            amount.value = "<?php echo e($settings->four_month_roi ?? 0); ?>" + '%';
                            amountpay.value = "<?php echo e($settings->four_month_roi ?? 0); ?>";
                        }
                        else if(sub.value == "6 Months"){
                            amount.value = "<?php echo e($settings->six_month_roi ?? 0); ?>" + '%';
                            amountpay.value = "<?php echo e($settings->six_month_roi ?? 0); ?>";
                        }
                        else if(sub.value == "9 Months"){
                            amount.value = "<?php echo e($settings->nine_month_roi ?? 0); ?>" + '%';
                            amountpay.value = "<?php echo e($settings->nine_month_roi ?? 0); ?>";
                        }
                        else if(sub.value == "1 Year"){
                            amount.value = "<?php echo e($settings->one_year_roi ?? 0); ?>" + '%';
                            amountpay.value = "<?php echo e($settings->one_year_roi ?? 0); ?>";
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/user/staketoken.blade.php ENDPATH**/ ?>