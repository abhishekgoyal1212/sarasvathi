@extends('admin.auth.index')
@section('title','Admin Login')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{route('admin.login')}}"><b>SARASVATI</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Enter new password to recover account.</p>

            <form action="{{route('admin.reset-password-verify',$token)}}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email',$info->email)}}" disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <div class="form-valid-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{old('password')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('password')
                    <div class="form-valid-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" value="{{old('password_confirmation')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <div class="form-valid-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{route('admin.login')}}">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@stop