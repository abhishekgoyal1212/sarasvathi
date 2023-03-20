@extends('admin/index')
@section('title','PAGES')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PAGES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Home</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-image"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Logo</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{route('logo.edit')}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-image"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Banner</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{route('banner.edit')}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-image"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Login Page</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{route('loginpage.edit')}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@stop