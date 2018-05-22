<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Results Table</h4>
                </div>
            </div>


            <div class="panel">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                    </div>

                    <table class="table table-bordered table-striped" id="datatable-editable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Question</th>
                            <th>Answer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="gradeX">
                                <td><?php echo e($key->name); ?></td>
                                <td><?php echo e($key->username); ?></td>
                                <td><?php echo e($key->questionText); ?></td>
                                <td><?php echo e($key->answer); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- end: page -->

            </div> <!-- end Panel -->

        </div> <!-- container -->

    </div> <!-- content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>