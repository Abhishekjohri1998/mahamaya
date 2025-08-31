
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <!-- Beginning of  Dashboard Stats  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <span class="card-title">
                                    <i class="fas fa-list"></i> All Transactions
                                    <small class="text-muted">(Including MetaMask Purchases)</small>
                                </span>
                                <a href="#" data-toggle="modal" data-target="#addtoken" class="float-right btn btn-primary"> 
                                    <i class='fas fa-plus-circle'></i> Add Tokens
                                </a>
                                
                                <!-- Modal for Adding Tokens -->
                                <div class="modal fade" id="addtoken" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Manually Add Tokens</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo e(route('addtoken')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Transaction Type</label>
                                                            <select class="form-control" name="t_type" required>
                                                                <option selected disabled>Select Type</option>
                                                                <option>PURCHASE</option>
                                                                <option>BONUS</option>
                                                                <option>MANUAL</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Transaction Date</label>
                                                            <input type="datetime-local" class="form-control" name="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Token Added To</label>
                                                            <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="user" required>
                                                                <option selected disabled>Select User</option>
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <option value='<?php echo e($user->id); ?>'><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Token for Stage</label>
                                                            <select class="form-control" name="stage" required>
                                                                <option selected disabled>Select Stage</option>
                                                                <?php $__currentLoopData = $stage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <option value='<?php echo e($stg->stage_name); ?>'>
                                                                       <?php echo e($stg->stage_name); ?>

                                                                        <?php if($stg->status == "active"): ?>
                                                                            <span class="text-success">(Active)</span>
                                                                        <?php endif; ?>
                                                                    </option> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Payment Gateway</label>
                                                            <select class="form-control" name="payment_mode" required>
                                                                <option selected disabled>Select Gateway</option>
                                                                <option>MetaMask</option>
                                                                <option>Paypal</option>
                                                                <option>Manual</option>
                                                                <option>Bitcoin</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Payment Amount</label>
                                                            <input type="number" class="form-control" name="amount" step="0.000001" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Wallet Address (Optional)</label>
                                                            <input type="text" class="form-control" name="address" placeholder="0x...">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Number of Tokens</label>
                                                            <input type="number" class="form-control" name="tokens" required>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="px-3 btn btn-primary">
                                                        <i class="fas fa-plus"></i> Add Token
                                                    </button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive"> 
                                <table class="table table-hover" id="ttable"> 
                                    <thead> 
                                        <tr> 
                                            <th>TRANX NO.</th>
                                            <th>USER</th>
                                            <th>WALLET ADDRESS</th>
                                            <th>TOKENS</th>
                                            <th>ETH AMOUNT</th>
                                            <th>USD AMOUNT</th>
                                            <th>GST (18%)</th>
                                            <th>TYPE</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        <?php $__empty_1 = true; $__currentLoopData = $trxns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                         <tr> 
                                            <td>
                                                <small><code><?php echo e(substr($txn->txn_id, 0, 12)); ?>...</code></small>
                                            </td> 
                                            <td>
                                                <?php if($txn->tuser): ?>
                                                    <strong><?php echo e($txn->tuser->name); ?></strong>
                                                    <br><small class="text-muted"><?php echo e($txn->tuser->email); ?></small>
                                                <?php else: ?>
                                                    <span class="text-muted">Unknown User</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($txn->wallet_address): ?>
                                                    <small><code><?php echo e(substr($txn->wallet_address, 0, 6)); ?>...<?php echo e(substr($txn->wallet_address, -4)); ?></code></small>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo e(number_format($txn->tokens)); ?></strong> <?php echo e($settings->token_symbol); ?>

                                            </td> 
                                            <td>
                                                <span class="text-primary"><?php echo e($txn->amount); ?> <?php echo e($txn->to); ?></span>
                                            </td>
                                            <td>
                                                <span class="text-success">$<?php echo e(number_format($txn->base_amt, 2)); ?></span>
                                            </td>
                                            <td>
                                                <?php if($txn->gst_amount_eth): ?>
                                                    <span class="text-warning"><?php echo e($txn->gst_amount_eth); ?> ETH</span>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($txn->type == 'MetaMask Purchase'): ?>
                                                    <span class="badge badge-info">
                                                        <i class="fab fa-ethereum"></i> <?php echo e($txn->type); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary"><?php echo e($txn->type); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <small><?php echo e(\Carbon\Carbon::parse($txn->created_at)->format('M d, Y g:i A')); ?></small>
                                            </td>
                                            <td> 
                                                <?php if($txn->status == "pending"): ?>
                                                    <span class="badge badge-warning">
                                                        <i class="fas fa-clock"></i> <?php echo e($txn->status); ?>

                                                    </span>
                                                <?php elseif($txn->status == "completed"): ?>
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check"></i> <?php echo e($txn->status); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">
                                                        <i class="fas fa-times"></i> <?php echo e($txn->status); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="<?php echo e(route('viewtransaction', $txn->id)); ?>" class="btn btn-info btn-sm" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                    <?php if($txn->type == 'MetaMask Purchase' && $txn->txn_id): ?>
                                                        <?php if($txn->to == 'ETH'): ?>
                                                            <a href="https://etherscan.io/tx/<?php echo e($txn->txn_id); ?>" target="_blank" 
                                                               class="btn btn-outline-primary btn-sm" title="View on Etherscan">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        <?php elseif($txn->to == 'Sepolia ETH'): ?>
                                                            <a href="https://sepolia.etherscan.io/tx/<?php echo e($txn->txn_id); ?>" target="_blank" 
                                                               class="btn btn-outline-info btn-sm" title="View on Sepolia Etherscan">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if($txn->status == "pending"): ?>
                                                        <a href="<?php echo e(route('confirmtran', $txn->id)); ?>" class="btn btn-success btn-sm" title="Confirm Transaction">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                        <a href="<?php echo e(route('canceltran', $txn->id)); ?>" class="btn btn-danger btn-sm" title="Cancel Transaction">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="11" class="text-center py-4">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <p class="text-muted">No transactions found</p>
                                            </td>
                                        </tr>  
                                        <?php endif; ?>
                                    </tbody> 
                                </table>
                            </div>

                            <?php if(method_exists($trxns, 'links')): ?>
                                <div class="d-flex justify-content-center">
                                    <?php echo e($trxns->links()); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Mahamaya\mahamaya\resources\views/admin/transactions.blade.php ENDPATH**/ ?>