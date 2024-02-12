@extends('layouts.auth')

@section('title')
    Register
@endsection

@section('content')
<div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>

    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        Sign up to your Maper Account
      </div>
      <form name="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="md-form-group">
          <input type="text" class="md-input" name="name" required>
          <label>Name</label>
        </div>
        <div class="md-form-group">
          <input type="email" class="md-input" name="email" required>
          <label>Email</label>
        </div>
        <div class="md-form-group">
          <input type="password" class="md-input" name="password" required>
          <label>Password</label>
        </div>
        <div class="md-form-group">
            <input type="password" class="md-input" id="password-confirm" name="password_confirmation" required autocomplete="new-password" required>
            <label>Password Confirm</label>
        </div>
        <div class="m-b-md">
          <label class="md-check">
            <input type="checkbox" required><i class="primary"></i> Agree the <a href>terms and policy</a>
          </label>
        </div>
        <button type="submit" class="btn primary btn-block p-x-md">Sign up</button>
      </form>
    </div>

    <div class="p-v-lg text-center">
      <div>Already have an account? <a ui-sref="access.signin" href="{{ route('login') }}" class="text-primary _600">Sign in</a></div>
    </div>
  </div>
@endsection
