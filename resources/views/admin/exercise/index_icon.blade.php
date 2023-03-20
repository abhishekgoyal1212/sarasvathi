@extends('admin/index')

@section('title', 'Quick')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quick Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Quick Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{!empty($single_info->id) ? 'Edit Quick Icons' : 'Add Quick Icons'}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="{{!empty($single_info->id) ? route('exercise-icon.update',[$single_info->id]) : route('exercise-icon.insert')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Quick Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="type" placeholder="course provider source">

                                        <option value="1" {{!empty($single_info->id) && $single_info->type == 1  ? 'selected' : '' }}> Practice</option>
                                        <option value="0" {{!empty($single_info->id) && $single_info->type == 0  ? 'selected' : '' }}> Revision</option>

                                    </select>
                                    @error('type')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Heading</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Heading" value="{{!empty($single_info->id) ? old('name',$single_info->name) : old('name') }}">
                                </div>
                                @error('name')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="description" id="inputExperience" placeholder="Content">{{!empty($single_info->id) ?  old('description',$single_info->description) : old('description') }}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="concept-attechment">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <input type="file" id="attachment-icon" name="icon">
                                    @if(!empty($single_info->id) && $single_info->icon !='')
                                    <br>
                                    <a href="{{asset('admin-assets/img/concept/'.$single_info->icon)}}" download>
                                        <img class="sm-img" src="{{asset('admin-assets/img/exercise/'.$single_info->icon)}}">
                                    </a>
                                    @endif
                                </div>
                            </div>
                            @if(empty($single_info->id))
                            <div class="form-group col-md-6">
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">All Quick Icons</h3> -->
                        <!-- <br> -->
                        @if(!empty($single_info->id))
                        <a href="{{route('exercise-icon.list')}}">
                            <button class="btn btn-primary">Add Quick Icon</button>
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_info as $tag_info)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{$tag_info->name}}</td>
                                    <td> @if($tag_info->type == 1)
                                        <strong>Practice</strong>
                                        @else
                                        <strong>Revision</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if($tag_info->status == 1)
                                        <a href="{{route('exercise-icon.status',[$tag_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                        @else
                                        <a href="{{route('exercise-icon.status',[$tag_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('exercise-icon.edit',[$tag_info->id])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a>

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