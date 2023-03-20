@extends('admin/index')
@section('title','CLASSES-ADD')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Classes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Add Class</li>
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
                            <h3 class="card-title">Add Class</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('classes.insert')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Class Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" placeholder="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="above_10">Class Above 10 ?</label>
                                    <select class="form-control" name="above_10" value="{{old('above_10')}}">
                                        <!-- <option value="">Select Faculty</option> -->
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('above_10')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{--
                                
                            --}}

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