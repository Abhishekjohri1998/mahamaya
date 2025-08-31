<span class="card-title">Payment Method Information</span>
<a href="#" data-toggle="modal" data-target="#addmethod" class="float-right btn btn-primary btn-sm"> 
    <i class='fas fa-plus-circle'></i> Add Info
</a>

<!-- Modal -->
<div class="modal fade" id="addmethod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Payment Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('savemethod')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Payment Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Payment Type</label>
                            <select class="form-control" name="p_type" required>
                                <option selected disabled>Select</option>
                                <option>Crypto</option>
                                <option>Currency</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Payment Symbol</label>
                            <select class="form-control" name="symbol" required>
                                <option selected disabled>Select</option>
                                <option>BTC</option>
                                <option>ETH</option>
                                <option>LTC</option>
                                <option>EUR</option>
                                <option>GBP</option>
                                <option>USD</option>
                                <option>USDT</option>
                                <option>BNB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Crypto Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Crypto Network Mode</label>
                            <input type="text" class="form-control" placeholder="ERC" name="network">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Bank Account Number</label>
                            <input type="number" class="form-control" name="acntnum">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Bank Account Name</label>
                            <input type="text" class="form-control" name="acntname">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" name="bankname">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Swift Code</label>
                            <input type="text" class="form-control" name="swcode">
                        </div>
                    </div>
                    <button type="submit" class="px-3 btn btn-primary">Add Method</button>
                </form>  
            </div>
        </div>
    </div>
</div>

<div class="mt-5 row">
    <?php $__empty_1 = true; $__currentLoopData = $payset ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="p-1 p-md-2 col-md-4">
            <div class="p-2 border shadow-sm">
                <h3 class="d-inline">Method Name:</h3>
                <p class="d-inline"><?php echo e($pay->method_name ?? 'N/A'); ?></p>
                <hr>
                <h3 class="d-inline">Symbol:</h3>
                <p class="d-inline"><?php echo e($pay->symbol ?? 'N/A'); ?></p>
                <hr>
                <h3 class="d-inline">Type:</h3>
                <p class="d-inline"><?php echo e($pay->type ?? 'N/A'); ?></p>
                <hr>
                <?php if(($pay->type ?? '') == "Crypto"): ?>
                    <h3 class="d-inline">Crypto Address:</h3>
                    <p class="d-inline"><?php echo e($pay->address ?? 'N/A'); ?></p>
                    <hr> 
                    <h3 class="d-inline">Network Mode:</h3>
                    <p class="d-inline"><?php echo e($pay->networkmode ?? 'N/A'); ?></p>
                    <hr>
                <?php endif; ?>
                <?php if(($pay->type ?? '') != "Crypto"): ?>
                    <h3 class="d-inline">Account Name:</h3>
                    <p class="d-inline"><?php echo e($pay->acntname ?? 'N/A'); ?></p>
                    <hr>
                    <h3 class="d-inline">Account Number:</h3>
                    <p class="d-inline"><?php echo e($pay->acntnum ?? 'N/A'); ?></p>
                    <hr>
                    <h3 class="d-inline">Bank Name:</h3>
                    <p class="d-inline"><?php echo e($pay->bankname ?? 'N/A'); ?></p>
                    <hr>
                    <h3 class="d-inline">Swift Code:</h3>
                    <p class="d-inline"><?php echo e($pay->swcode ?? 'N/A'); ?></p> 
                    <hr>
                <?php endif; ?>
                <a href="#" data-toggle="modal" data-target="#editmethd<?php echo e($pay->id); ?>" class="btn btn-sm btn-info"> 
                    <i class='fas fa-pencil-alt'></i> Edit
                </a>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editmethd<?php echo e($pay->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Payment Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(route('updatemethod')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Payment Name</label>
                                    <input type="text" class="form-control" value="<?php echo e($pay->method_name ?? ''); ?>" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Payment Type</label>
                                    <select class="form-control" name="p_type" required>
                                        <option value="<?php echo e($pay->type ?? ''); ?>"><?php echo e($pay->type ?? 'Select Type'); ?></option>
                                        <option>Crypto</option>
                                        <option>Currency</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Payment Symbol</label>
                                    <select class="form-control" name="symbol" required>
                                        <option value="<?php echo e($pay->symbol ?? ''); ?>"><?php echo e($pay->symbol ?? 'Select Symbol'); ?></option>
                                        <option>BTC</option>
                                        <option>ETH</option>
                                        <option>LTC</option>
                                        <option>EUR</option>
                                        <option>GBP</option>
                                        <option>USD</option>
                                        <option>USDT</option>
                                        <option>BNB</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Crypto Address</label>
                                    <input type="text" class="form-control" value="<?php echo e($pay->address ?? ''); ?>" name="address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Crypto Network Mode</label>
                                    <input type="text" class="form-control" value="<?php echo e($pay->networkmode ?? ''); ?>" placeholder="ERC" name="network">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Bank Account Number</label>
                                    <input type="number" class="form-control" value="<?php echo e($pay->acntnum ?? ''); ?>" name="acntnum">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Bank Account Name</label>
                                    <input type="text" class="form-control" value="<?php echo e($pay->acntname ?? ''); ?>" name="acntname">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control" value="<?php echo e($pay->bankname ?? ''); ?>" name="bankname">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Swift Code</label>
                                    <input type="text" class="form-control" value="<?php echo e($pay->swcode ?? ''); ?>" name="swcode">
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo e($pay->id); ?>" name="payid">
                            <button type="submit" class="px-3 btn btn-primary">Update Info</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> No payment methods added yet. Click "Add Info" to add your first payment method.
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\Mahamaya\mahamaya\resources\views/admin/settings/payment.blade.php ENDPATH**/ ?>