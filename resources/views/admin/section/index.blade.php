@extends('admin/index')
@section('title','SECTION')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Section</h1>
                    <?php if(!empty($sections_info[0])){ ?>
                    <h4>(Chapter <span>{{$sections_info[0]->chapter->name}}) </span> , (Subject <span>{{$sections_info[0]->subject->name}}) </span></h4>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item "><a class="nav-link {{$type == 'section' ? 'active' :''}} " href="#subject-section" data-toggle="tab">Section</a></li>
                                <li class="nav-item"><a class="nav-link {{$type == 'lesson' ? 'active' :''}} " href="#subject-lesson" data-toggle="tab">Lesson</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <!-- section starts -->
                                <div class="tab-pane {{$type == 'section' ? 'active' :''}}" id="subject-section">



                                    <!-- The timeline -->
                                    <form id="chapter-form" class="form-horizontal" method="post" action="{{!empty($section_edit->id) ? route('section.update',[$section_edit->id]) : route('section.insert')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" id="inputName" name="subject_id" value="{{ $subject_id }}">
                                        <input type="hidden" class="form-control" id="inputName" name="chapter_id" value="{{ $chapter_id }}">

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Section</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" name="name" value="{{!empty($section_edit->id) ? $section_edit->name : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Section Details</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="description">{{!empty($section_edit->id) ? $section_edit->description : '' }}</textarea>
                                            </div>
                                        </div>


                                        @if(empty($section_edit->id))
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="status" checked id="sec_active_status" value="1">
                                                <label for="sec_active_status" class="custom-control-label">Active</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="status" id="sec_inactive_status" value="0">
                                                <label for="sec_inactive_status" class="custom-control-label">Inactive</label>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    @if(!empty($section_edit->id))
                                                    <div class="card-header">
                                                        <a href="{{route('sections.index',[$chapter_id,$subject_id])}}"><button type="button" class="btn btn-primary">Add Section</button></a>
                                                    </div>
                                                    @endif
                                                    <div class="card-body">
                                                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr. No.</th>
                                                                    <th>Section</th>
                                                                    <th>Chapter</th>
                                                                    <th>Subject</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach($sections_info as $section_info)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$section_info->name}}</td>
                                                                    <td>{{$section_info->chapter->name}}</td>
                                                                    <td>{{$section_info->subject->name}}</td>

                                                                    <td>
                                                                        @if($section_info->status == 1)
                                                                        <a href="{{route('section.status',[$section_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                                                        @else
                                                                        <a href="{{route('section.status',[$section_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('section.edit',[$section_info->id])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--  /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                                <!-- /.card -->
                                            </div>
                                            <!--  /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </section>




                                </div>
                                <!-- section ends -->

                                <!-- Lesson starts -->
                                <div class="tab-pane {{$type == 'lesson' ? 'active' :''}}" id="subject-lesson">

                                    <h3>Lesson Information</h3>

                                    <form id="lesson-form" class="form-horizontal" action="{{!empty($lesson_edit->id) ? route('lesson.update',[$lesson_edit->id]) : route('lesson.insert')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" id="inputName" name="subject_id" value="{{!empty($lesson_edit->id) ? $lesson_edit->subject_id : $subject_id }}">
                                        <input type="hidden" class="form-control" id="inputName" name="chapter_id" value="{{!empty($lesson_edit->id) ? $lesson_edit->chapter_id : $chapter_id }}">

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Lesson Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Lesson Name" value="{{!empty($lesson_edit->id) ? $lesson_edit->name : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Section Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="section_id" placeholder="course provider source">
                                                    @foreach($sections_info as $section_info)
                                                    <option value="{{$section_info->id}}" {{!empty($lesson_edit->id) && $lesson_edit->section_id == $section_info->id ? 'selected' : '' }}>{{$section_info->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="thumbnail">
                                            <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="thumbnail">
                                                @if(!empty($lesson_edit->id))
                                                <br>
                                                <img class="sm-img" src="{{asset('admin-assets/img/lesson/thumbnail/'.$lesson_edit->thumbnail)}}">
                                                @endif
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Lesson Type</label>
                                            <div class="col-sm-10"> -->

                                        <!-- <select class="form-control" name="lesson_type" id="lesson-type" placeholder="course provider source">
                                                    <option value="">Lesson Type</option>
                                                    <option value="1" {{!empty($lesson_edit->id) && $lesson_edit->lesson_type == 1 ? 'selected' : '' }}>Video</option>
                                                    <option value="2" {{!empty($lesson_edit->id) && $lesson_edit->lesson_type == 2 ? 'selected' : '' }}>Text file
                                                    </option>
                                                </select> -->
                                        <!-- @if(!empty($lesson_edit->id))
                                                <br>
                                                <video width="320" height="240" controls>
                                                    <source src="{{asset('admin-assets/video/lesson/'.$lesson_edit->vid_name)}}" type="video/mp4">
                                                </video> -->
                                        <!-- @elseif(!empty($lesson_edit->id) && $lesson_edit->lesson_type==2)
                                                <br>
                                                <a href="{{asset('admin-assets/img/lesson/'.$lesson_edit->file_name)}}" download>
                                                    <img class="sm-img" src="{{asset('admin-assets/img/lesson/file.png')}}">
                                                </a> -->
                                        <!-- @endif -->
                                        <!-- </div>
                                        </div> -->

                                        <div class="form-group row" id="lesson-url">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Video</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="vid_name" id="inputName2">
                                                @if(!empty($lesson_edit->id))
                                                <br>
                                                <video width="240" height="180" controls>
                                                    <source src="{{asset('admin-assets/video/lesson/'.$lesson_edit->vid_name)}}" type="video/mp4">
                                                </video>
                                                @endif
                                            </div>

                                        </div>
                                        <!-- <div class="form-group row" id="lesson-attechment" style="display:none;">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Text File</label>
                                            <div class="col-sm-10">
                                                <input type="file" id="attachment-file" name="file_name">
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Lesson Duration (Hours:minutes : second)</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control html-duration-picker" name="vid_duration" id="inputName" style="text-align: left;" value="{{!empty($lesson_edit->id) ? $lesson_edit->vid_duration : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="description" id="inputExperience" placeholder="Description">{{!empty($lesson_edit->id) ? $lesson_edit->description : '' }}</textarea>
                                            </div>
                                        </div>

                                        @if(empty($lesson_edit->id))
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
                                    <hr>


                                    <section class="content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    @if(!empty($lesson_edit->id))
                                                    <div class="card-header">
                                                        <a href="{{route('sections.index',[$chapter_id,$subject_id])}}"><button type="button" class="btn btn-primary">Add Lesson</button></a>
                                                    </div>
                                                    @endif
                                                    <div class="card-body">
                                                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr. No.</th>
                                                                    <th>Lesson</th>
                                                                    <th>Section</th>
                                                                    <th>Chapter</th>
                                                                    <!-- <th>Subject</th> -->
                                                                    <!-- <th>Lesson Type</th> -->
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($lessons_info as $lesson_info)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$lesson_info->name}}</td>
                                                                    <td>{{$lesson_info->section->name}}</td>
                                                                    <td>{{$lesson_info->chapter->name}}</td>
                                                                    <!-- <td>
                                                                        @if($lesson_info->lesson_type == 1)
                                                                        <strong>Video</strong>
                                                                        @else
                                                                        <strong>Text</strong>
                                                                        @endif
                                                                    </td> -->
                                                                    <td>
                                                                        @if($lesson_info->status == 1)
                                                                        <a href="{{route('lesson.status',[$lesson_info->id,0])}}" class="text-success"><strong>Active</strong></a>
                                                                        @else
                                                                        <a href="{{route('lesson.status',[$lesson_info->id,1])}}" class="text-danger"><strong>Inactive</strong></a>
                                                                        @endif
                                                                    </td>
                                                                    <td><a href="{{route('lesson.edit',[$lesson_info->id])}}"><button type="button" class="btn btn-block bg-gradient-primary btn-xs my-1">Edit</button></a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!--  /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                                <!-- /.card -->
                                            </div>
                                            <!--  /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </section>

                                </div>
                                <!-- lesson ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
@stop