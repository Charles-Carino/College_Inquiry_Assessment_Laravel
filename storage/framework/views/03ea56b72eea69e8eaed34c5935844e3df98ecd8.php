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
                                <h4 class="pull-left page-title">Users Table</h4>
                            </div>
                        </div>


                        <div class="panel">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <!--<th>Cnt</th>-->
                                            <th>User Avatar</th>
                                            <th>User Type</th>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Result College</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr class="gradeX">
                                        <td><img class="avatar" src="../img/uploads/<?php echo e($key->avatar); ?>"></td>
                                        <td><?php echo e($key->userType); ?></td>
                                        <td><?php echo e($key->name); ?></td>
                                        <td><?php echo e($key->username); ?></td>
                                        <td><?php echo e($key->password); ?></td>
                                        <td><?php echo e($key->email); ?></td>
                                        <td><?php echo e($key->resultCollege); ?></td>
                                        <td class="actions">
                                                  <a href="#" data-rel="<?php echo e($key->id); ?>" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                  <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                  <a href="#" data-rel="<?php echo e($key->id); ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                  <a href="#" data-rel="<?php echo e($key->id); ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                        </td>
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