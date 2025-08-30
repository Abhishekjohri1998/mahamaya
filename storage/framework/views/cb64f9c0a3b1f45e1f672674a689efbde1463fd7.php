
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content">
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
                   <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Transactions List</h5>
                                <div class="table-responsive"> 
                                    <table class="table" id="ttable"> 
                                        <thead> 
                                            <tr> 
                                                <th>TRANX NO.</th>
                                                <th>WALLET ADDRESS</th>
                                                <th>TOKENS</th>
                                                <th>ETH AMOUNT</th>
                                                <th>USD AMOUNT</th>
                                                <th>GST (18%)</th>
                                                <th>TYPE</th>
                                                <th>DATE</th>
                                                <th>STATUS</th>
                                                <th>ETHERSCAN</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <?php $__currentLoopData = $recent_txn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <tr> 
                                                <td>
                                                    <small><?php echo e(substr($txn->txn_id, 0, 10)); ?>...</small>
                                                </td>
                                                <td>
                                                    <?php if($txn->wallet_address): ?>
                                                        <small><?php echo e(substr($txn->wallet_address, 0, 6)); ?>...<?php echo e(substr($txn->wallet_address, -4)); ?></small>
                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(number_format($txn->tokens)); ?> <?php echo e($settings->token_symbol); ?></td> 
                                                <td><?php echo e($txn->amount); ?> <?php echo e($txn->to); ?></td>
                                                <td>$<?php echo e(number_format($txn->base_amt, 2)); ?> USD</td>
                                                <td>
                                                    <?php if($txn->gst_amount_eth): ?>
                                                        <?php echo e($txn->gst_amount_eth); ?> ETH
                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info"><?php echo e($txn->type); ?></span>
                                                </td>
                                                <td><?php echo e(\Carbon\Carbon::parse($txn->created_at)->toDayDateTimeString()); ?></td>
                                                <td>
                                                    <?php if($txn->status == "pending"): ?>
                                                        <span class="badge badge-warning"><?php echo e($txn->status); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-success"><?php echo e($txn->status); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($txn->type == 'MetaMask Purchase' && $txn->txn_id): ?>
                                                        <a href="https://etherscan.io/tx/<?php echo e($txn->txn_id); ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-external-link-alt"></i> View
                                                        </a>
                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                            </tr>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/user/transactions.blade.php ENDPATH**/ ?>