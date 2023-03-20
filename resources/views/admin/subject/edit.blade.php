@extends('admin/index')
@section('title','EDIT SUBJECT')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Subject Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Subject</li>
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
            <div class="card-header">
              <h3 class="card-title">Edit Subject</h3>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane {{$type == 'subject' ? 'active' :''}}" id="subject-details">
                  <form role="form" method="post" action="{{route('subjects.update',[$subject_info->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Board</label>
                        <select class="form-control select2" style="width: 100%;" name="board_id">
                          <option value="">Select Board</option>
                          @foreach($boards_info as $board_info)
                          <option value="{{$board_info->id}}" {{ $subject_info->board_id == $board_info->id || old('board_id') == $board_info->id  ? 'selected' : '' }}>{{$board_info->name}}</option>
                          @endforeach
                        </select>

                        @error('board_id')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Class</label>
                        <select class="form-control select2" id="classSubject" style="width: 100%;" name="class_id">
                          <option value="">Select class</option>
                          @foreach($classes_info as $class_info)
                          <option value="{{$class_info->id}}" data-type="{{$class_info->above_10}}" {{ $subject_info->class_id == $class_info->id || old('class_id') == $class_info->id  ? 'selected' : '' }}>{{$class_info->name}}</option>
                          @endforeach
                        </select>
                        @error('class_id')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>
                      <input type="hidden" name="aboveTen" class="aboveTen" id="aboveTen">
                      <div class="form-group stream_class" style="display:none;">
                        <label for="stream_select">Stream</label>
                        <select class="form-control" id="streamSubject" name="stream_select">
                          <option value="" {{$subject_info->stream_select == '0' || old('stream_select')=='' ? 'selected' : '' }}>Select Stream</option>
                          <option value="1" {{$subject_info->stream_select == '1' || old('stream_select')==1 ? 'selected' : '' }}>Science</option>
                          <option value="2" {{$subject_info->stream_select == '2' || old('stream_select')==2 ? 'selected' : '' }}>Commerce</option>
                          <option value="3" {{$subject_info->stream_select == '3' || old('stream_select')==3 ? 'selected' : '' }}>Arts/Humanities</option>
                        </select>
                        @error('stream_select')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Exam</label>
                        <select class="form-control select2" style="width: 100%;" name="exam_id">
                          <option value="">Select exam</option>
                          @foreach($exams_info as $exam_info)
                          <option value="{{$exam_info->id}}" {{ $subject_info->exam_id == $exam_info->id || old('exam_id') == $exam_info->id  ? 'selected' : '' }}>{{$exam_info->name}}</option>
                          @endforeach
                        </select>
                        @error('exam_id')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Subject Name" value="{{old('name',$subject_info->name)}}">
                        @error('name')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="row">

                        <div class="form-group col-md-6">
                          <label for="hexcolor_1">HEX Color 1</label>
                          <input type="color" name="hexcolor_1" class="form-control" id="hexcolor_1" value="{{old('hexcolor_1' ,$subject_info->hexcolor_1)}}">
                          @error('hexcolor_1')
                          <div class="form-valid-error">{{ $message }}</div>
                          @enderror


                        </div>

                        <div class="form-group col-md-6">
                          <label for="hexcolor_2">HEX Color 2</label>
                          <input type="color" name="hexcolor_2" class="form-control" id="hexcolor_2" value="{{old('hexcolor_2',$subject_info->hexcolor_2)}}">
                          @error('hexcolor_2')
                          <div class="form-valid-error">{{ $message }}</div>
                          @enderror


                        </div>
                      </div>
                      <div class="form-group">
                        <label for="icon">Icon</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="icon" class="custom-file-input" id="icon">
                            <label class="custom-file-label" for="icon">Choose file</label>
                          </div>
                          <br>
                        </div>
                        <img src="{{asset('admin-assets/img/subject/'.$subject_info->icon)}}" class="sm-img">
                        @error('icon')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" placeholder="Description" class="form-control">{{old('description',$subject_info->description)}}</textarea>
                        @error('description')
                        <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@stop