@extends('admin.auth.index')
@section('title','Admin Login')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('admin.login')}}"><b>SARASVATI</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In</p>
      <form action="{{route('admin.login-verify')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
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
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="form-valid-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <div class="col-8">
            <p class="text-right mt-1">
              <a href="{{route('admin.forgot-password')}}">Forgot Password ?</a>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@stop