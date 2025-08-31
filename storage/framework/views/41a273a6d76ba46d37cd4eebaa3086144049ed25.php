<h2 class="mb-2 d-inline">Add Referral Commission</h2>
<div>
    <form method="POST" action="<?php echo e(route('saverefcom')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Referral Commission(%)</label>
                <small>How many percent of <?php echo e($settings->token_symbol ?? 'TOKEN'); ?></small>
                <input type="number" step="0.01" class="form-control" value="<?php echo e($settings->ref_com ?? 0); ?>" name="ref_com" required>
            </div>
        </div>
        <button type="submit" class="px-3 btn btn-primary">Update Commission</button>
    </form>  
</div>
<?php /**PATH D:\Mahamaya\mahamaya\resources\views/admin/settings/referral.blade.php ENDPATH**/ ?>