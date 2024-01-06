@extends('admin.layout.master')
@section('page-title')
    Manage Team
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
                            <a href="{{route('team.create')}}" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
                        </h3>
                        <div class="box-tools">
                            <form method="GET" action="/admin/team">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="s" class="form-control pull-right" value="{{ (request('s')) ? request('s') : null }}" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($teams)
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
                            @foreach($teams as $team)
                            <tr>
                                <td><input type="checkbox" name="" id="" class="checkSingle"></td>
                                <td>{{$team->fullname}}</td>
                                <td>{{$team->designation}}</td>
                                <td>
                                    @if($team->team_img == "No image found")
                            		<img src="/uploads/No_Image_Available.jpg" width="80" height="80" class="img-thumbnails" alt="No image found">
                                    @else
                        		<img src="/uploads/{{$team->team_img}}" width="80" height="80" class="img-thumbnails" alt="{{$team->fullname}}">
                                    @endif
                                </td>
                                <td>
                                    @if($team->status == "DEACTIVE")
                                    <a href="/admin/team/status/{{$team->id}}" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
                                    @else
                                    <a href="/admin/team/status/{{$team->id}}" class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/team/{{$team->id}}/edit" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/team/delete/{{$team->id}}" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></a>
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
                                Showing {{ $teams->firstItem() }} to {{ $teams->lastItem() }}
of total {{$teams->total()}} entries</span>
                            </div>
                        	<div class="col-sm-6 text-right">
                            	<ul class="pagination">
                                {!! $teams->links() !!}  
                                </ul>
                        	</div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
        </div>
</section>

@endsection