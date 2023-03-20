@extends('admin.index')
@section('title','TEACHER')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Teacher</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('teacher.add')}}"><button type="button" class="btn btn-primary">Add Teacher</button></a>
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
                                    <td>{{$single_info->fullname}}</td>
                                    <td><img src="{{asset('admin-assets/img/teacher/'.$single_info->avatar)}}" class="sm-img"></td>
                                    <td>
                                        @if($single_info->user_status == 1)
                                        <a href="{{route('teacher.status',[$single_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                        @else
                                        <a href="{{route('teacher.status',[$single_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td><a href="{{route('teacher.edit',[$single_info->id])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a>
                                        <!-- <a href="{{route('teacher.delete',[$single_info->id])}}" onclick="return confirm('Are you sure to delete teacher?')"><button type="button" class="btn btn-block bg-gradient-danger btn-xs my-1">Delete</button></a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop