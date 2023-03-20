@extends('admin/index')
@section('title','TUTOR-ADD')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tutors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Add Tutor</li>
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Tutor</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('tutor.insert')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{--<div class="form-group">
                                    <label>Boards</label>
                                    <select class="form-control select2bs4" name="boards[]" multiple="multiple" style="width: 100%;" >
                                        @foreach($boards_info as $board_info)

                                        @if (old('boards'))
                                        <option value="{{$board_info->id}}" {{ in_array($board_info->id , old('boards')) ? "selected":"" }}>
                                {{$board_info->name}}
                                </option>
                                @else
                                <option value="{{$board_info->id}}">
                                    {{$board_info->name}}
                                </option>
                                @endif
                                @endforeach
                                </select>
                                @error('boards')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>--}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                                @error('name')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}">
                                @error('username')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                                @error('email')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number" name="mobile" class="form-control" id="mobile" value="{{old('mobile')}}">
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
                            <!-- <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div> -->
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input" id="icon">
                                        <label class="custom-file-label" for="icon">Choose file</label>
                                    </div>
                                </div>
                                @error('icon')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>

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