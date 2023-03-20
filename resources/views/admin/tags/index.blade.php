@extends('admin/index')

@section('title', 'TAGS')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tags</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tags</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{!empty($slug) ? 'Edit Tags' : 'Add Tags'}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="{{!empty($slug) ? route('tags.update',[$single_info->slug]) : route('tags.insert')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{!empty($slug) ? old('name',$single_info->name) : old('name') }}">
                                @error('name')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            @if(empty($slug))
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="status" checked id="active_status" value="1">
                                    <label for="active_status" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="status" id="inactive_status" value="0">
                                    <label for="inactive_status" class="custom-control-label">Inactive</label>
                                </div>
                                @error('status')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Tags</h3>
                    </div>
                    <div class="card-body">
                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_info as $tag_info)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{$tag_info->name}}</td>
                                    <td>
                                        @if($tag_info->status == 1)
                                        <a href="{{route('tags.status',[$tag_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                        @else
                                        <a href="{{route('tags.status',[$tag_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('tags.edit',[$tag_info->slug])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a>
                                        <a href="{{route('tags.delete',[$tag_info->id])}}" onclick="return confirm('Are you sure to delete tag?')"><button type="button" class="btn btn-block bg-gradient-danger btn-xs my-1">Delete</button></a>
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