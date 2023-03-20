@extends('admin/index')
@section('title','CONCEPT')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Concept</h1>
                    <?php if(!empty($concept_info[0])){ ?>
                    <h4>(Chapter <span>{{$concept_info[0]->chapter->name}}) </span> , (Subject <span>{{$concept_info[0]->subject->name}}) </span></h4>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Concept</li>
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
                        <h3 class="card-title">{{!empty($concept_edit->id) ? 'Edit Concept' : 'Add Concept'}}</h3>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        <form id="concept-form" class="form-horizontal" action="{{!empty($concept_edit->id) ? route('concept.update',[$concept_edit->id]) : route('concept.insert')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="inputName" name="subject_id" value="{{!empty($concept_edit->id) ? $concept_edit->subject_id : $subject_id }}">
                            <input type="hidden" class="form-control" id="inputName" name="chapter_id" value="{{!empty($concept_edit->id) ? $concept_edit->chapter_id : $chapter_id }}">
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Concept Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="concept_type" placeholder="course provider source">

                                        <option value="0" {{!empty($concept_edit->id) && $concept_edit->concept_type == 0 || old('concept_type')==0 ? 'selected' : '' }}> Example</option>
                                        <option value="1" {{!empty($concept_edit->id) && $concept_edit->concept_type == 1 || old('concept_type')==1 ? 'selected' : '' }}> Definition</option>
                                        <option value="2" {{!empty($concept_edit->id) && $concept_edit->concept_type == 2 || old('concept_type')==2? 'selected' : '' }}> Formula</option>
                                        <option value="3" {{!empty($concept_edit->id) && $concept_edit->concept_type == 3 || old('concept_type')==3? 'selected' : '' }}> Result</option>


                                    </select>
                                    @error('concept_type')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Concept Heading</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="heading" id="inputName" placeholder="Concept Heading" value="{{!empty($concept_edit->id) ?  old('heading',$concept_edit->heading) : old('heading')}}">
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Concept</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control textarea" name="content" id="inputExperience" placeholder="Concept">{{!empty($concept_edit->id) ?  old('content',$concept_edit->content) : old('content') }}</textarea>
                                    @error('content')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="concept-attechment">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" id="attachment-file" name="file">
                                    @if(!empty($concept_edit->id) && $concept_edit->file !='')
                                    <br>
                                    <a href="{{asset('admin-assets/img/concept/'.$concept_edit->file)}}" download>
                                        <img class="sm-img" src="{{asset('admin-assets/img/concept/'.$concept_edit->file)}}">
                                    </a>
                                    @endif
                                </div>
                            </div>




                            @if(empty($concept_edit->id))
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
                        <h3 class="card-title">All Concept</h3>
                    </div> -->
                    @if(!empty($concept_edit->id))
                    <div class="card-header">
                        <a href="{{route('concepts.index',[$chapter_id,$subject_id])}}"><button type="button" class="btn btn-primary">Add Concept</button></a>
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Chapter</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($concept_info as $con_info)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$con_info->heading}}</td>
                                    <td>{{$con_info->chapter->name}}</td>
                                    <td>{{$con_info->subject->name}}</td>
                                    <td>
                                        @if($con_info->status == 1)
                                        <a href="{{route('concept.status',[$con_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                        @else
                                        <a href="{{route('concept.status',[$con_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('concept.edit',[$con_info->id])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a>
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
</div>
@stop