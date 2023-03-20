@extends('admin/index')
@section('title','Login Page')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Login Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Login Page</li>
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
                            <h3 class="card-title">Login Page</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('loginpage.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input class="form-control" name="heading" placeholder="Heading" value="{{old('heading',$single_info->heading)}}">
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input class="form-control" name="content" placeholder="Content" value="{{old('content',$single_info->content)}}">
                                    @error('content')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="category-img-section">
                                    <label for="icon">Login Page Image</label>
                                    <div class="row category-img-block0">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="icon" class="custom-file-input" id="icon">
                                                        <label class="custom-file-label" for="icon">Choose file</label>
                                                    </div>
                                                </div><br>
                                                <img src="{{asset('admin-assets/img/dynamic/'.$single_info->image)}}" class="sm-img">
                                            </div>
                                        </div>
                                    </div>
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