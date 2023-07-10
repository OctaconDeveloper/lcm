@php
    $user = \App\Models\User::find(auth()->user()->id);
@endphp

@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">

            @if (\Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            @include('errors.errors')

            <div class="d-flex flex-column flex-lg-row">

                <div class="flex-lg-row-fluid ms-lg-15">

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane active" id="kt_user_view_overview_security" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Password Update</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <form id="kt_modal_add_schedule_form" class="form" method="POST"
                                            action="/api/update-password">
                                            @csrf
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Old Password</label>
                                                <input type="password" class="form-control form-control-solid"
                                                    name="old_password" placeholder="Old Password" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Password</label>
                                                <input type="password" class="form-control form-control-solid"
                                                    name="password" placeholder="New Password" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control form-control-solid"
                                                    name="password_confirmation" placeholder="Confirm New Password" />
                                            </div>

                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label"> Submit </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="flex-lg-row-fluid ms-lg-15">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active" id="kt_user_view_overview_security" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Profile Update</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <form id="kt_modal_add_schedule_form" class="form" method="POST"
                                            action="/api/update-user">
                                            @csrf
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Email</label>
                                                <input type="text" class="form-control form-control-solid" name="email"
                                                    value="{{ $user->email }}" readonly />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">First Name</label>
                                                <input type="text" class="form-control form-control-solid"
                                                    name="firstname" value={{ ucfirst($user->firstname) }} />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Last Name</label>
                                                <input type="text" class="form-control form-control-solid"
                                                    name="lastname" value={{ ucfirst($user->lastname) }} />
                                            </div>

                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label"> Submit </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
