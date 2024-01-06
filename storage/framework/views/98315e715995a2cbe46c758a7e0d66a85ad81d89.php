<?php $__env->startSection('page-title'); ?>
  Manage Books
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
                    <a href="/admin/book/create" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
              </h3>
              <div class="box-tools">
                <form method="GET" action="/admin/book">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="s" value="<?php echo e((request('s')) ? request('s') : null); ?>" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <?php if($books): ?>
            <div class="box-body">
              <table class="table table-bordered">
                <thead style="background-color: #F8F8F8;">
                  <tr>
                    <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                    <th width="25%">Title</th>
                    <th width="15%">Author</th>
                    <th width="15%">Category</th>
                    <th width="20%">Book Image</th>
                    <th width="10%">Status</th>
                    <th width="10%">Manage</th>
                  </tr>
                </thead>
                <tr>
                  <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td><input type="checkbox" name="" id="" class="checkSingle"></td>
                  <td><?php echo e($book->title); ?></td>
                  <td><?php echo e($book->author_id); ?></td>
                  <td><?php echo e($book->category_id); ?></td>
                  <td>
                    <?php if($book->book_img == "No image found"): ?>
                    <img src="/uploads/No_Image_Available.jpg" width="80" height="80" class="img-thumbnail" alt="No Image Fount">
                    <?php else: ?>
                    <img src="/uploads/<?php echo e($book->book_img); ?>" width="80" height="80" class="img-thumbnail" alt="<?php echo e($book->book_img); ?>">
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if($book->status == "DEACTIVE"): ?>
                    <a href="/admin/book/status/<?php echo e($book->id); ?>" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
                    <?php else: ?>
                    <a href="/admin/book/status/<?php echo e($book->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></a>
                    <?php endif; ?>
                  </td>
                  <td>
                      <a href="/admin/book/<?php echo e($book->id); ?>/edit" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                      <a href="/admin/book/delete/<?php echo e($book->id); ?>" onclick="return confirm('Are you sure, you want to delete it?')" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
            <!-- /.box-body -->
              <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                Showing <?php echo e($books->firstItem()); ?> to <?php echo e($books->lastItem()); ?>

of total <?php echo e($books->total()); ?> entries</span>
                            </div>
                          <div class="col-sm-6 text-right">
                              <ul class="pagination">
                              <div class="d-flex justify-content-center">
    <?php echo $books->links(); ?>

</div>
                  </ul>
                          </div>
                        </div>
                    </div>
          </div>
          <?php else: ?>
          <div class="alert alert-danger">No record found!</div>
          <?php endif; ?>
            <!-- /.box-body -->
          </div>


    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\smartbooks\resources\views/admin/book/index.blade.php ENDPATH**/ ?>