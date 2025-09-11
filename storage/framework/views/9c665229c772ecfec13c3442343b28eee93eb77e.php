<?php $__env->startComponent('mail::message'); ?>
# <?php echo e($demo->greeting); ?>


<?php echo e($demo->message); ?>


**Date:** <?php echo e($demo->date->format('F j, Y, g:i a')); ?>


<?php $__env->startComponent('mail::button', ['url' => config('app.url')]); ?>
Access Your Account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e($demo->sender); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\Mahamaya\mahamaya\resources\views/emails/newmail.blade.php ENDPATH**/ ?>