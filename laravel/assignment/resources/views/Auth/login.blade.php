@extends('layouts.app')
@section('content')
<div class="card col-6 mx-auto">
  <div class="card-header">Login</div>
  <div class="card-body">
    @if (Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ Session::get('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('login.post') }}" method="POST">
      @csrf
      <div class="form-group row mb-3">
        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        <div class="col-md-6">
          <input type="text" id="email_address" class="form-control" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
          <small class="text-danger">*{{ $errors->first('email') }}</small>
          @endif
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        <div class="col-md-6">
          <input type="password" id="password" class="form-control" name="password">
          @if ($errors->has('password'))
          <small class="text-danger">*{{ $errors->first('password') }}</small>
          @endif
        </div>
      </div>
      <div class="col-md-6 offset-md-4 mb-2">
        <a href="{{ route('forget.get') }}">Forgot password?</a>
      </div>
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          Login
        </button>
      </div>
    </form>

  </div>
</div>
@endsection