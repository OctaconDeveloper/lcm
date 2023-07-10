@extends('layouts.app2')
@section('content')
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
        @csrf
        <div class="mb-10 text-center">
            <h1 class="text-dark mb-3">
                Create an Account
            </h1>
            <div class="text-gray-400 fw-semibold fs-4">
                Already have an account?

                <a href="/" class="link-primary fw-bold">
                    Sign in here
                </a>
            </div>
        </div>

        <div class="row fv-row mb-7">
            <div class="col-xl-6">
                <label class="form-label fw-bold text-dark fs-6">First Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                    name="first-name" autocomplete="off" />
            </div>
            <div class="col-xl-6">
                <label class="form-label fw-bold text-dark fs-6">Last Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                    name="last-name" autocomplete="off" />
            </div>
        </div>
        <div class="fv-row mb-7">
            <label class="form-label fw-bold text-dark fs-6">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email"
                autocomplete="off" />
        </div>
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <div class="mb-1">
                <label class="form-label fw-bold text-dark fs-6">
                    Password
                </label>
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                        name="password" autocomplete="off" />

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="fv-row mb-5">
            <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                name="confirm-password" autocomplete="off" />
        </div>
        <div class="text-center">
            <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">
                    Submit
                </span>
            </button>
        </div>
    </form>
@endsection
