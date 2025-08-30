<?php
if (Auth::user()->dashboard_style == "light") {
    $bg = "light";
    $text = "dark";
} else {
    $bg = "dark";
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
                    <div class="col-md-12">
                        <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
                            <div class="card-body">
                                <h5 class="card-title text-<?php echo e($text); ?>">Transactions List</h5>
                                <div class="table-responsive"> 
                                    <table class="table table-striped table-bordered table-hover table-sm table-<?php echo e($bg == 'light' ? 'light' : 'dark'); ?>" id="ttable"> 
                                        <thead class="thead-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>"> 
                                            <tr> 
                                                <th class="text-<?php echo e($text); ?>">TRANX NO.</th>
                                                <th class="text-<?php echo e($text); ?>">TOKENS</th>
                                                <th class="text-<?php echo e($text); ?>">AMOUNT</th>
                                                <th class="text-<?php echo e($text); ?>">USD AMOUNT</th>
                                                <th class="text-<?php echo e($text); ?>">TYPE</th>
                                                <th class="text-<?php echo e($text); ?>">DATE</th>
                                                <th class="text-<?php echo e($text); ?>">STATUS</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <?php $__empty_1 = true; $__currentLoopData = $recent_txn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                               <tr class="bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> text-<?php echo e($text); ?>"> 
                                                <td class="text-<?php echo e($text); ?>"><?php echo e($txn->txn_id); ?></td>
                                                <td class="text-<?php echo e($text); ?>"><?php echo e($txn->tokens); ?> <?php echo e($settings->token_symbol); ?></td> 
                                                <td class="text-<?php echo e($text); ?>"><?php echo e($txn->amount); ?> <?php echo e($txn->to); ?></td>
                                                <td class="text-<?php echo e($text); ?>"><?php echo e($txn->base_amt); ?> USD</td>
                                                <td class="text-<?php echo e($text); ?>"><?php echo e($txn->type); ?></td>
                                                <td class="text-<?php echo e($text); ?>"><?php echo e(\Carbon\Carbon::parse($txn->created_at)->toDayDateTimeString()); ?></td>
                                                <td> 
                                                    <?php if($txn->status == "pending"): ?>
                                                        <span class="badge badge-warning"><?php echo e($txn->status); ?></span>
                                                    <?php elseif($txn->status == "completed"): ?>
                                                        <span class="badge badge-success"><?php echo e($txn->status); ?></span>
                                                    <?php elseif($txn->status == "failed"): ?>
                                                        <span class="badge badge-danger"><?php echo e($txn->status); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary"><?php echo e($txn->status); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr class="bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?>">
                                                <td colspan="7" class="text-center text-<?php echo e($text); ?>">
                                                    <i class="fa fa-info-circle"></i> No transactions found
                                                </td>
                                            </tr>
                                            <?php endif; ?>
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

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $('#ttable').DataTable({
        "responsive": true,
        "pageLength": 25,
        "order": [[ 5, "desc" ]], // Order by date column
        "columnDefs": [
            { "orderable": false, "targets": 6 } // Disable sorting on status column
        ]
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/user/transactions.blade.php ENDPATH**/ ?>