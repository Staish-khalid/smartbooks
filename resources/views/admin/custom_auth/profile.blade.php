@extends('admin.layout.master')
@section('page-title')
  Profile
@endsection
@section('main-content')

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Auth()->user()->user_img }}" alt="User profile picture">
              <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
              <p class="text-muted text-center">{{auth()->user()->designation}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Edit your Profile</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="{{$errors->has('update_password') || $errors->has('currnet_password') || $errors->has('new_passwor') || $errors->has('new_confirm_password') ? '' : 'active'}}"><a href="#activity" data-toggle="tab">Bio</a></li>
              <li class="{{$errors->has('update_password') || $errors->has('Current_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? 'active' : ''}}"><a href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="{{$errors->has('update_password') || $errors->has('custom_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? 'active tab-pane' : '' }}" id="activity">
                <!-- Post -->
                <div class="post">
                  <p>
                  {{ Auth()->user()->bio }}
                  </p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="{{ $errors->has('update_password') || $errors->has('current_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? 'active' : '' }} tab-pane" id="settings">
                <form method="POST" action="{{route('update_password')}}" class="form-horizontal">
                    @csrf
                    @method('post')
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="Old Password">
                      @error('current_password')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="New Password">
                      @error('new_password')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Retype Please</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="Retype Please">
                      @error('new_confirm_password')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Change Password</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

    <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{Auth()->user()->name}}</h4>
            </div>
            <div class="modal-body">
                <form name="profileForm" id="profileForm" action="{{ route('profile_update') }}" method="post" action="" class="form-horizontal">
                  @csrf
                  @method('put')
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="designation" class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bio" class="col-sm-2 control-label">Bio</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="bio" id="bio" rows="6" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_img" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" id="user_img" name="user_img">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    
@endsection