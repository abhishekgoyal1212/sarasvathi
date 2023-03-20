@extends('admin.index')
@section('title','BOARD')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Board</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Board</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('board.add')}}"><button type="button" class="btn btn-primary">Add Board</button></a>
                    </div>
                    <div class="card-body">
                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_info as $single_info)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$single_info->name}}</td>
                                    <td><img src="{{!empty($single_info->icon) ? asset('admin-assets/img/board/'.$single_info->icon):asset('admin-assets/img/board/default-cate.png')}}" class="sm-img"></td>
                                    <td>
                                        @if($single_info->status == 1)
                                        <a href="{{route('board.status',[$single_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                        @else
                                        <a href="{{route('board.status',[$single_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td><a href="{{route('board.edit',[$single_info->id])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a>
                                        <!-- <a href="{{route('board.delete',[$single_info->id])}}" onclick="return confirm('Are you sure to delete board?')"><button type="button" class="btn btn-block bg-gradient-danger btn-xs my-1">Delete</button></a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@stop