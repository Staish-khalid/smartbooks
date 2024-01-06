
<?php $__env->startSection('page-title'); ?>
  Edit Media
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <form name="formEdit" id="formEdit" method="POST" action="<?php echo e(route('media.update', $media->id)); ?>" enctype="multipart/form-data">
      <!-- form start -->

      <?php echo csrf_field(); ?>
      <?php echo method_field('put'); ?>
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                  <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo e($media->title); ?>">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="<?php echo e($media->slug); ?>">
                    </div>
                    <div class="form-group">
                      <label>Media Type <span class="text text-red">*</span></label>
                      <select name="media_type" id="media_type" class="form-control" style="width: 100%;">
                        <option value="none">-- Select Media Type --</option>
                        <option value="slider" <?php echo e(($media->media_type == "slider") ? 'selected' : null); ?>>Slider</option>
                        <option value="gallery" <?php echo e(($media->media_type == 'gallery') ? 'selected' : null); ?>>Gallery</option>
                      </select>
                    </div>
                  </div>
                 
                <div class="col-xs-6">
                   <div class="form-group">
                      <label for="media_img">Media Image <span class="text text-red">*</span></label>
                      <input type="file" name="media_img" class="form-control" id="media_img">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."><?php echo e($media->description); ?></textarea>
                     </div>
                  </div>
            </div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
      </div>
      </form>
      <!-- /.box -->

      <!-- form end -->

    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\smartbooks\resources\views/admin/media/edit.blade.php ENDPATH**/ ?>