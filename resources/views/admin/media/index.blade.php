@extends('admin.layout.master')
@section('page-title')
  Manage Media
@endsection
@section('main-content')

<section class="content">
      
      <!-- /.row -->
     <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
                    <a class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                    <a class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                    <a href="{{route('media.create')}}" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
              </h3>
              <div class="box-tools">
                <form method="GET" action="/admin/media">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="s" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if($medias)
              <table class="table table-bordered">
                <thead style="background-color: #F8F8F8;">
                  <tr>
                    <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                    <th width="20%">Title</th>
                    <th width="20%">Media Type</th>
                    <th width="20%">Meida Image</th>
                    <th width="10%">Status</th>
                    <th width="10%">Manage</th>
                  </tr>
                </thead>
                @foreach($medias as $media)
                <tr>
                  <td><input type="checkbox" name="" id="" class="checkSingle"></td>
                  <td>{{$media->title}}</td>
                  <td>{{$media->media_type}}</td>
                  <td>
                    @if($media->media_img == "No image found")
                    <img src="/uploads/No_Image_Available.jpg" width="80" height="80" class="img-thumbnail" alt="No Image Found">
                    @else
                    <img src="/uploads/{{$media->media_img}}" width="80" height="80" class="img-thumbnail" alt="{{$media->title}}">
                    @endif
                  </td>
                  <td>
                    @if($media->status == "DEACTIVE")
                    <a href="/admin/media/status/{{$media->id}}" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
                    @else
                    <a href="/admin/media/status/{{$media->id}}" class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></a>
                    @endif
                  </td>
                  <td>
                      <a href="/admin/media/{{$media->id}}/edit" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                      <a href="/admin/media/delete/{{$media->id}}" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="alert alert-danger">No record found!</div>
            @endif
            </div>
            <!-- /.box-body -->
              <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                Showing {{ $medias->firstItem() }} to {{ $medias->lastItem() }}
                                of total {{$medias->total()}} entries
                                </span>
                            </div>
                          <div class="col-sm-6 text-right">
                              <ul class="pagination">
                              {!! $medias->links() !!}  
                              </ul>
                          </div>
                        </div>
                    </div>
          </div>
            <!-- /.box-body -->
          </div>


    </section>
@endsection