<div>
    <?php
        $bg = (Auth::user()->dashboard_style == 'light') ? 'light' : 'dark';
        $text = ($bg === 'light') ? 'dark' : 'light';
    ?>

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
    
    <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?>">
        <div class="card-body">
            <h5 class="card-title text-<?php echo e($text); ?>">Transfer <?php echo e($settings->token_symbol); ?> Tokens</h5>
            <p class="card-text text-<?php echo e($text); ?>">Transfer your tokens to another user registered in our system.</p>
            
            <form wire:submit.prevent='transfer'>
                <div class="form-group">
                    <label class="text-<?php echo e($text); ?>">Recipient Email Address</label>
                    <input type="email" wire:model='email' wire:keyup='validateentry' 
                           class="form-control" placeholder="Enter recipient's email" required>
                    <small class="form-text text-muted">
                        Enter the email of the user you want to transfer tokens to. The email must be registered in our system.
                    </small>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label text-<?php echo e($text); ?>">Amount of <?php echo e($settings->token_symbol); ?> to transfer</label>
                    <input type="number" wire:model='token' wire:keyup='validateentry' 
                           class="form-control" min="1" step="1" placeholder="Enter token amount" required>
                    <small class="form-text text-muted">
                        Available balance: <?php echo e(number_format(Auth::user()->tot_tk_bal ?? 0)); ?> <?php echo e($settings->token_symbol); ?>

                    </small>
                </div>
                
                <div class="form-group">
                    <button wire:target='transfer' wire:loading.attr="disabled" 
                            wire:loading.class='bg-secondary' 
                            class='p-2 px-4 btn btn-primary' type="submit" <?php echo e($dis); ?>>
                        <div wire:target='transfer' wire:loading class="sk-chase">
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                        </div>
                        <span wire:loading.remove wire:target='transfer'>
                            <i class="fas fa-paper-plane"></i> Transfer Now
                        </span> 
                    </button>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <strong>Important:</strong> Token transfers are immediate and cannot be reversed. 
                    Please verify the recipient email address before confirming the transfer.
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Transfers -->
    <div class="card bg-<?php echo e($bg == 'light' ? 'white' : 'dark'); ?> border-<?php echo e($bg == 'light' ? 'light' : 'secondary'); ?> mt-4">
        <div class="card-body">
            <h5 class="card-title text-<?php echo e($text); ?>">Recent Transfers</h5>
            <div class="table-responsive">
                <table class="table table-<?php echo e($bg == 'light' ? 'light' : 'dark'); ?>">
                    <thead>
                        <tr>
                            <th class="text-<?php echo e($text); ?>">Date</th>
                            <th class="text-<?php echo e($text); ?>">Recipient</th>
                            <th class="text-<?php echo e($text); ?>">Amount</th>
                            <th class="text-<?php echo e($text); ?>">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentTransfers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-<?php echo e($text); ?>"><?php echo e($transfer->created_at->format('M d, Y')); ?></td>
                            <td class="text-<?php echo e($text); ?>"><?php echo e($transfer->recipient_email); ?></td>
                            <td class="text-<?php echo e($text); ?>"><?php echo e(number_format($transfer->amount)); ?> <?php echo e($settings->token_symbol); ?></td>
                            <td>
                                <?php if($transfer->status == 'completed'): ?>
                                    <span class="badge badge-success">Completed</span>
                                <?php elseif($transfer->status == 'pending'): ?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Failed</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center text-<?php echo e($text); ?>">
                                <i class="fas fa-info-circle"></i> No transfers found
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Mahamaya\mahamaya\resources\views/livewire/transfer-token.blade.php ENDPATH**/ ?>