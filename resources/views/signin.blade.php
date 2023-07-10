@extends('layouts.app2')
@section('content')
 
<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="/api/signin">
    @csrf
<div class="text-center mb-10">
    <h1 class="text-dark mb-3">
        Sign In </h1>
    <div class="text-gray-400 fw-bold fs-4">
        {{-- New Here?

        <a href="/register" class="link-primary fw-bolder">
            Create an Account
        </a> --}}
        @include('errors.errors')
    </div>
</div>
<div class="fv-row mb-10">
    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
    <input class="form-control form-control-lg form-control-solid" type="text" name="email"
        autocomplete="off" />
</div>

<div class="fv-row mb-10">
    <div class="d-flex flex-stack mb-2">
        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
        <a href="/password-reset" class="link-primary fs-6 fw-bolder">
            Forgot Password ?
        </a>
    </div>
    <input class="form-control form-control-lg form-control-solid" type="password"
        name="password" autocomplete="off" />
</div>
<div class="text-center">
    <button type="submit" id="kt_sign_in_submit2" class="btn btn-lg btn-primary w-100 mb-5">
        <span class="indicator-label">
            Continue
        </span>
    </button>
</div>
</form>
@endsection