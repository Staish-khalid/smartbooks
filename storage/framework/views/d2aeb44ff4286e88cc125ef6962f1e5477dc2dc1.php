<?php $__env->startSection('page-title'); ?>
    Manage Team
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">
                <!-- /.row -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <a class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                            <a class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                            <a href="<?php echo e(route('team.create')); ?>" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
                        </h3>
                        <div class="box-tools">
                            <form method="GET" action="/admin/team">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="s" class="form-control pull-right" value="<?php echo e((request('s')) ? request('s') : null); ?>" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if($teams): ?>
                        <table class="table table-bordered">
                            <thead style="background-color: #F8F8F8;">
                                <tr>
                                    <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                                    <th width="20%">Fullname</th>
                                    <th width="20%">Designation</th>
                                    <th width="20%">Team Image</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Manage</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="" id="" class="checkSingle"></td>
                                <td><?php echo e($team->fullname); ?></td>
                                <td><?php echo e($team->designation); ?></td>
                                <td>
                                    <?php if($team->team_img == "No image found"): ?>
                            		<img src="/uploads/No_Image_Available.jpg" width="80" height="80" class="img-thumbnails" alt="No image found">
                                    <?php else: ?>
                        		<img src="/uploads/<?php echo e($team->team_img); ?>" width="80" height="80" class="img-thumbnails" alt="<?php echo e($team->fullname); ?>">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($team->status == "DEACTIVE"): ?>
                                    <a href="/admin/team/status/<?php echo e($team->id); ?>" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
                                    <?php else: ?>
                                    <a href="/admin/team/status/<?php echo e($team->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/admin/team/<?php echo e($team->id); ?>/edit" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/team/delete/<?php echo e($team->id); ?>" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php else: ?>
            	<div class="alert alert-danger">No record found!</div>
            <?php endif; ?>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                Showing <?php echo e($teams->firstItem()); ?> to <?php echo e($teams->lastItem()); ?>

of total <?php echo e($teams->total()); ?> entries</span>
                            </div>
                        	<div class="col-sm-6 text-right">
                            	<ul class="pagination">
                                <?php echo $teams->links(); ?>  
                                </ul>
                        	</div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
        </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\smartbooks\resources\views/admin/team/index.blade.php ENDPATH**/ ?>