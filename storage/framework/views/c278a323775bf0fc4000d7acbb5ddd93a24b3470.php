<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front-view.about', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <h1>THIS IS A HELP PAGE</h1>
    <hr />
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>