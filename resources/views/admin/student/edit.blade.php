@extends('admin/index')
@section('title','STUDENT-EDIT')
@section('content')
<?php
// pre($boards_info);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">EDIT STUDENT</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit School</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('student.update',[$single_info->id])}}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Board</label>
                                    <select class="form-control select2" style="width: 100%;" name="board">
                                        <option value="">Select board</option>
                                        @foreach($boards_info as $board_info)
                                        <option value="{{$board_info->id}}" {{old('board')==$board_info->id ||$board_info->id==$single_info->board_id ? 'selected' : '' }}>{{$board_info->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('board')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Class</label>
                                    <select class="form-control select2" style="width: 100%;" name="class">
                                        <option value="">Select class</option>
                                        @foreach($classes_info as $class_info)
                                        <option value="{{$class_info->id}}" {{old('class')==$class_info->id || $class_info->id==$single_info->class_id? 'selected' : '' }}>{{$class_info->name.' '.$class_info->stream_select }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{old('name',$single_info->fullname)}}">
                                    @error('name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="{{old('username',$single_info->username)}}">
                                    @error('username')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{old('email',$single_info->email)}}">
                                    @error('email')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Country Code</label>
                                    <select class="form-control select2" style="width: 100%;" name="country_code">
                                        <option value="">Select code</option>
                                        @foreach($codes_info as $code_info)
                                        <option value="{{$code_info->mobile_code}}" {{old('country_code')== $code_info->mobile_code || $code_info->mobile_code == $single_info->country_code ? 'selected' : '' }}>{{$code_info->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_code')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" name="mobile" class="form-control" id="mobile" value="{{old('mobile',$single_info->mobile)}}">
                                    @error('mobile')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
                                    @error('password')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob" value="{{old('dob',$single_info->dob)}}">
                                    @error('dob')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon">Avatar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="icon" class="custom-file-input" id="icon">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                    <br>
                                    <img src="{{asset('admin-assets/img/student/'.$single_info->avatar)}}" class="sm-img">
                                    @error('icon')
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
    </section>
</div>
@stop