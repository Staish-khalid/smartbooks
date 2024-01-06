@extends('admin.layout.master')
@section('page-title')
  Create Author
@endsection
@section('main-content')
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <!-- form start -->
  <form name="formCreate" id="formCreate" method="POST" action="/admin/author/store" enctype="multipart/form-data">
  @csrf
  <div class="box box-primary">
    <!-- /.box-header -->
    <div class="box-body">
      <!-- row start -->
      <div class="row"> 
            <div class="col-xs-6">
              <div class="form-group">
                <label for="title">Title <span class="text text-red">*</span></label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                </div>

                <div class="form-group">
                <label for="slug">Slug <span class="text text-red">*</span></label>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                </div>
                <div class="form-group">
                  <label for="designation">Designation <span class="text text-red">*</span></label>
                  <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                </div>
                <div class="form-group">
              <label for="dob">Date of birth: <span class="text text-red">*</span></label> 
              <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
              </div>

                <div class="form-group">
                  <label for="email">Email <span class="text text-red">*</span></label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Country <span class="text text-red">*</span></label>
                  <select name="country" id="country" class="form-control select2" style="width: 100%;">
                        <option value="none">-- Select Country --</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="india">India</option>
                        <option value="sri lanka">Sri Lanka</option>
                      </select>
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                </div>

                <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
              </div>
            </div>
              
            <div class="col-xs-6">
            <div class="form-group">
                  <label for="author_img">Author Image <span class="text text-red">*</span></label>
                  <input type="file" name="author_img" class="form-control" id="author_img">
                </div>

                <div class="form-group">
                  <img src="{{ url('uploads/No_Image_Available.jpg') }}" id="showImage" width="60" height="60" class="rounded avatar-lg" alt="No image found">
                </div>
              <div class="form-group">
                  <label for="facebook_id">Facebook ID</label>
                  <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID">
                </div>

                <div class="form-group">
                  <label for="twitter_id">Twitter ID</label>
                  <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID">
                </div>

                <div class="form-group">
                  <label for="youtube_id">YouTube ID</label>
                  <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="YouTube ID">
                </div>
                <div class="form-group">
                  <label for="pinterest_id">Pinterest ID</label>
                  <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID">
                </div>
                <div class="form-group">
                <label>Author Feature</label>
                <select name="author_feature" id="author_feature" class="form-control select2" style="width: 100%;">
                  <option value="no">NO</option>
                  <option value="yes">Yes</option>
                </select>
            </div>
            </div>
        </div>

          <!-- row end -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
      </div>
  </div>
  </form>
  <!-- /.box -->

  <!-- form end -->

</section>
@endsection