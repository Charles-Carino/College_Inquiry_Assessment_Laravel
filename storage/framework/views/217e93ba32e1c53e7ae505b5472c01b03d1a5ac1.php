<?php $__env->startSection('content'); ?>
<section id="services" class="section-padding wow fadeInUp delay-05s">
 <div class="container">
   <div class="row">
     <div class="col-md-12 text-center">
       <h2 class="service-title pad-bt15">Colleges</h2>
       <hr class="bottom-line">
     </div>
         <?php $__currentLoopData = $college; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colleges): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
               <h3><?php echo e($colleges->collegeName); ?></h3>
               <p><?php echo nl2br(e($colleges->collegeAboutInfo)); ?></p>
               <a href="colleges/<?php echo e($colleges->id); ?>">Learn More...</a>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
 </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>