@extends('admin/index')
@section('title', 'PROFILE EDIT')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Profile</li>
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
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Full Name</th>
                                        <td>{{ $user_info->fullname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Birth Date</th>
                                        <td>{{ date('d M, Y',strtotime($user_info->dob)) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $user_info->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile Number</th>
                                        <td>{{ $user_info->mobile }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <form method="post" action="{{ route('admin.setProfile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                            <input type="text" class="form-control" placeholder="Full Name" name="fullname" value="{{ $user_info->fullname }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                                            <input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="{{ $user_info->dob }}">
                                                        </div>
                                                        @error('dob')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                            <input type="file" class="form-control" name="image" value="">
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                    <div class="col-lg-6">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user_info->email }}">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                                            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" value="{{ $user_info->mobile }}">
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>

                                <!-- end of row -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary m-b-0">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection