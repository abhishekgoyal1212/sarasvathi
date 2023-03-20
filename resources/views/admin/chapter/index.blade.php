@extends('admin/index')
@section('title','CHAPTER')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chapter </h1>
                    <h4>(Subject <span>{{$subject_info->name}}) </span></h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Chapter <span>({{$subject_info->name}})</span></li>
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
                        <h3 class="card-title">{{!empty($concept_edit->id) ? 'Edit Chapter' : 'Add Chapter'}}</h3>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        <form id="chapter-form" class="form-horizontal" method="post" action="{{!empty($chapter_info->id) ? route('chapters.update',[$chapter_info->id]) : route('chapters.insert')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="inputName" name="class_id" value="{{$subject_info->class_id}}">
                            <input type="hidden" class="form-control" id="inputName" name="board_id" value="{{$subject_info->board_id}}">
                            <input type="hidden" class="form-control" id="inputName" name="exam_id" value="{{$subject_info->exam_id}}">
                            <input type="hidden" class="form-control" id="inputName" name="subject_id" value="{{$subject_info->id}}">

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Chapter Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" name="name" value="{{!empty($chapter_info->id) ? $chapter_info->name : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Chapter Details</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description">{{!empty($chapter_info->id) ? $chapter_info->description : '' }}</textarea>
                                </div>
                            </div>
                            @if(empty($chapter_info->id))
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
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h3 class="card-title">All Chapter</h3>
                    </div> -->
                    @if(!empty($concept_edit->id))
                    <div class="card-header">
                        <a href="{{route('concepts.index',[$chapter_id,$subject_id])}}"><button type="button" class="btn btn-primary">Add Chapter</button></a>
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Chapter Name</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($subject_info->chapters as $chapter_info)
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{$chapter_info->name}}</td>
                                    <td>
                                        @if($chapter_info->status == 1)
                                        <a href="{{route('chapters.status',[$chapter_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                        @else
                                        <a href="{{route('chapters.status',[$chapter_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary">Manage</button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu" role="menu">

                                                <a class="dropdown-item" href="{{route('sections.index', [$chapter_info->id ,$subject_info->id])}}" target="_blank">Sections</a>
                                                <a class="dropdown-item" href="{{route('concepts.index', [$chapter_info->id ,$subject_info->id])}}" target="_blank">Concepts</a>
                                                <!-- <a class="dropdown-item" href="" target="_blank">Solutions</a>
                                                <a class="dropdown-item" href="" target="_blank">Papers</a>
                                                <a class="dropdown-item" href="" target="_blank">Papers</a> -->
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <a href="{{route('chapters.edit',[$chapter_info->id])}}">
                                            <button type="button" class="btn-block bg-gradient-primary btn-xs my-1">
                                                Edit
                                            </button>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                                </tr>
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
</div>
@stop