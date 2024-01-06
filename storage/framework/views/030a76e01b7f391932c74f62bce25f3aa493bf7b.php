
<?php $__env->startSection('page-title'); ?>
  Edit Book
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formEdit" id="formEdit" method="POST" action="<?php echo e(route('book.update', $book->id)); ?>" enctype="multipart/form-data">
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
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo e($book->title); ?>">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="<?php echo e($book->slug); ?>">
                    </div>
                    <div class="form-group">
                    <label for="rating">rating <span class="text text-red">*</span></label>
                      <input type="text" name="rating" class="form-control" id="rating" placeholder="rating" value="<?php echo e($book->rating); ?>">
                    </div>
                    <div class="form-group">
                      <label>Category <span class="text text-red">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                        <option value="none">-- Select Category --</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(($category->id == $book->category_id) ? 'selected' : null); ?>> <?php echo e($category->title); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Author <span class="text text-red">*</span></label>
                      <select class="form-control" name="author_id" id="author_id" style="width: 100%;">
                      <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <option value="<?php echo e($author->id); ?>" <?php echo e(($author->id == $book->author_id) ? 'selected' : null); ?>><?php echo e($author->title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="availability">Availability <span class="text text-red">*</span></label>
                      <input type="text" class="form-control" name="availability" id="availability" placeholder="Availability" value="<?php echo e($book->availability); ?>">
                    </div>
                    <div class="form-group">
                  <label for="price">Price: <span class="text text-red">*</span></label> 
                  <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo e($book->price); ?>">
                 </div>
                  <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher" value="<?php echo e($book->publisher); ?>">
                  </div>
                  <div class="form-group">
                    <label>Country of Publisher <span class="text text-red">*</span></label>
                    <select class="form-control select2" name="country_of_publisher" id="country_of_publisher" style="width: 100%;">
                      <option value="none"> -- Select Country -- </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="<?php echo e($book->isbn); ?>">
                  </div>

                  <div class="form-group">
                      <label for="isbn_10">ISBN-10</label>
                      <input type="text" class="form-control" name="isbn-10" id="isbn-10" placeholder="ISBN-10">
                    </div>
                    <div class="form-group">
                      <label for="downloaded">downloaded</label>
                      <input type="text" class="form-control" name="downloaded" id="downloaded" placeholder="downloaded" value="<?php echo e($book->downloaded); ?>">
                    </div>
                </div>
                 
                <div class="col-xs-6">
                    <div class="form-group">
                      <label for="book_img">Book Image</label>
                      <input type="file" class="form-control" name="book_img" id="book_img" value="<?php echo e($book->book_img); ?>">
                      
                      <small class="label label-warning">Cover Photo will be uploaded</small>
                    </div>
                    <div class="form-group">
                  <img src="/uploads/<?php echo e($book->book_img); ?>" id="showImage" width="60" height="60" class="rounded avatar-lg" alt="No image found">
                </div>
                    <div class="form-group">
                      <label for="book_upload">Book Upload</label>
                      <input type="file" class="form-control" name="book_upload" id="book_upload" value="<?php echo e($book->book_upload); ?>">
                      <small class="label label-warning">Book (PDF) will be uploaded </small>
                    </div>
                  <img src="/uploads/<?php echo e($book->book_upload); ?>" id="showImage" width="60" height="60" class="rounded avatar-lg" alt="No image found">

                  <div class="form-group">
                      <label for="audience">Audience</label>
                      <input type="text" class="form-control" name="audience" id="audience" placeholder="Audience" value="<?php echo e($book->audience); ?>">
                    </div>

                    <div class="form-group">
                      <label for="format">Format</label>
                      <input type="text" class="form-control" name="format" id="format" placeholder="Format" value="<?php echo e($book->format); ?>">
                    </div>

                    <div class="form-group">
                      <label for="language">Language</label>
                      <input type="text" class="form-control" name="language" id="language" placeholder="Language" value="<?php echo e($book->language); ?>">
                    </div>
                    <div class="form-group">
                      <label for="total_pages">Total Pages</label>
                      <input type="text" class="form-control" name="total_pages" id="total_pages" placeholder="Total Pages" value="<?php echo e($book->total_pages); ?>">
                    </div>
                    <div class="form-group">
                      <label for="edition_number">Edition Number</label>
                      <input type="text" class="form-control" name="edition_number" id="edition_number" placeholder="Edition Number" value="<?php echo e($book->edition_number); ?>">
                    </div>

                    <div class="form-group">
                      <label>Recomended</label>
                      <select class="form-control" name="recommended" id="recommended" style="width: 100%;">
                        <option value="none">-- Select Recommended --</option>
                        <option value="1" <?php echo e(($book->recommended == '1') ? 'selected' : null); ?>>Yes</option>
                        <option value="0" <?php echo e(($book->recommended == '0') ? 'selected' : null); ?>>No</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Description">Description <span class="text text-red">*</span></label>
                      <textarea class="form-control" name="Description" rows="5" id="Description" placeholder="Description"> <?php echo e($book->Description); ?> </textarea>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\smartbooks\resources\views/admin/book/edit.blade.php ENDPATH**/ ?>