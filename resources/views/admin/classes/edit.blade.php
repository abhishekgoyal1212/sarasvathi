@extends('admin/index')
@section('title','BOARD-EDIT')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Board</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">EDIT BOARD</li>
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
                            <h3 class="card-title">Edit Board</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('classes.update',[$single_info->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Class Name</label>
                                    <input class="form-control" name="name" placeholder="name" value="{{old('name',$single_info->name)}}">
                                    @error('name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" placeholder="description">{{old('description', $single_info->description)}}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="above_10">Class Above 10 ?</label>
                                    <select class="form-control" name="above_10">
                                        <!-- <option value="">Select Faculty</option> -->
                                        <option value="0" {{$single_info->above_10 == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{$single_info->above_10 == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    @error('above_10')
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