<?php $__env->startSection('content'); ?>
<link href="../css/agri-styles.css" rel="stylesheet">
<section id="feature" class="section-padding wow fadeInUp delay-05s">
  <div class="col-md-12 text-center">
    <h2 class="service-title pad-bt15"><?php echo e($college->collegeName); ?></h2>
    <hr class="bottom-line">
  </div>
  <div class="container-fluid cards-row">
    <div class="container">
      <div id="collegeInfo" class="row">
        <div id="college-info"class="col-md-6">
          <div class="card">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#about" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
              <li role="presentation"><a href="#degrees" aria-controls="profile" role="tab" data-toggle="tab">Degrees</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Contact Us</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="about">
                <?php echo nl2br($college->collegeAboutInfo); ?>

              </div>
            <div role="tabpanel" class="tab-pane" id="degrees">
            <div class="panel-group panel-group-joined" id="accordion-test">
              <?php $__currentLoopData = $college->degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion-test-2" href="#<?php echo e($key->id); ?>" aria-expanded="false" class="collapsed">
                                  <?php echo e($key->degreeDesc); ?>

                              </a>
                          </h4>
                      </div>
                      <div id="<?php echo e($key->id); ?>" class="panel-collapse collapse">
                          <div class="panel-body">
                              <p>
                                Jobs: <td><?php echo nl2br(e($key->degreeJobs)); ?></td>
                              </p>
                          </div>
                      </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="messages">
                <i class="glyphicon glyphicon-user"><?php echo e($college->collegeDean); ?></i><br /><br />
                <i class="glyphicon glyphicon-earphone"><?php echo e($college->collegePhoneNumber); ?></i><br /><br />
                <i class="glyphicon glyphicon-envelope"><?php echo e($college->collegeEmail); ?></i><br /><br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>