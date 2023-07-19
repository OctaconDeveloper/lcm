@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex flex-center flex-column py-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="https://lcm.up.railway.app/assets/media/logos/logo.png" alt="image" />
                                </div>
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">
                                    {{ ucfirst($user->rank) }} {{ ucfirst($user->firstname) }} {{ ucfirst($user->lastname) }}
                                </a>
                                <div class="mb-9">
                                    <div class="badge badge-lg badge-light-primary d-inline">
                                        {{ ucfirst($user->role) }} 
                                    </div>
                                </div>
                                <div class="fw-bolder mb-3">
                                    Logistics Statistics
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                        data-bs-trigger="hover" data-bs-html="true"
                                        data-bs-content="Number of logistic tickets assigned, rejected and pending."></i>
                                </div>

                                <div class="d-flex flex-wrap flex-center">
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700">
                                            <span class="w-75px">{{ $completed }}</span>
                                            <span class="svg-icon svg-icon-3 svg-icon-success"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13"
                                                        height="2" rx="1" transform="rotate(90 13 6)"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="currentColor" />
                                                </svg></span>
                                        </div>
                                        <div class="fw-bold text-muted">Total</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700">
                                            <span class="w-50px">{{ $rejected }}</span>
                                            <span class="svg-icon svg-icon-3 svg-icon-danger"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11" y="18" width="13"
                                                        height="2" rx="1" transform="rotate(-90 11 18)"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                        fill="currentColor" />
                                                </svg></span>
                                        </div>
                                        <div class="fw-bold text-muted">Rejected</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700">
                                            <span class="w-50px"> {{ $pending }} </span>
                                            <span class="svg-icon svg-icon-3 svg-icon-success"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13"
                                                        height="2" rx="1" transform="rotate(90 13 6)"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="currentColor" />
                                                </svg></span>
                                        </div>
                                        <div class="fw-bold text-muted">Pending</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_user_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_user_view_details">
                                    Details
                                </div>
                            </div>

                            <div class="separator"></div>

                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <div class="fw-bolder mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                                    </div>
                                    <div class="fw-bolder mt-5">Rank</div>
                                    <div class="text-gray-600">
                                        {{ ucfirst($user->rank) }}
                                    </div>
                                    <div class="fw-bolder mt-5">First Name</div>
                                    <div class="text-gray-600">
                                        {{ ucfirst($user->firstname) }}
                                    </div>
                                    <div class="fw-bolder mt-5">Last Name</div>
                                    <div class="text-gray-600">{{ ucfirst($user->lastname) }}</div>

                                    <div class="fw-bolder mt-5">Status</div>
                                    <div class="text-gray-600">{{ ucfirst($user->status) }}</div>

                                    <div class="fw-bolder mt-5">Unit</div>
                                    <div class="text-gray-600">
                                        @if ($user->unit)
                                            {{ ucfirst($user->unit->name) }}
                                        @else
                                            Not Assigned
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <!--end::Sidebar-->

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#kt_user_view_overview_security">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_user_view_overview_events_and_logs_tab">Logs</a>
                        </li>
                        <li class="nav-item ms-auto">
                            <a href="#" class="btn btn-primary ps-7" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_update_details">
                                Unit Information
                            </a>
                            <a href="/api/change-admin-status/{{ encrypt_data($user->id) }}"
                                class="btn btn-{{ $user->status == 'active' ? 'danger' : 'success' }} ps-7"
                                data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">
                                @if ($user->status == 'active')
                                    Deactivate
                                @else
                                    Activate
                                @endif
                            </a>
                            <a href="/api/delete-admin/{{ encrypt_data($user->id) }}" class="btn btn-danger ps-7"
                                data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">
                                Delete Account
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        @if (\Session::has('msg'))
                            <div class="alert alert-success">
                                {!! \Session::get('msg') !!}
                            </div>
                        @endif
                        @include('errors.errors')
                        <div class="tab-pane active" id="kt_user_view_overview_security" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Profile</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <form id="kt_modal_add_schedule_form" class="form" method="POST"
                                            action="/api/update-user">
                                            @csrf
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Rank</label>
                                                <input type="text" class="form-control form-control-solid" value="{{ ucfirst($user->rank) }}" readonly />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">First Name</label>
                                                <input type="text" class="form-control form-control-solid"
                                                    name="firstname" value="{{ ucfirst($user->firstname) }}" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Last Name</label>
                                                <input type="text" class="form-control form-control-solid"
                                                    name="lastname" value="{{ ucfirst($user->lastname) }}" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-bold form-label mb-2">Email</label>
                                                <input type="text" class="form-control form-control-solid"
                                                    name="email" value="{{ $user->email }}" readonly />
                                            </div>

                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-army"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label"> Submit </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Activity Logs</h2>
                                    </div>
                                    <div class="card-toolbar">
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed gy-5"
                                            id="kt_table_users_login_session">
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-70px">Name</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Activity</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-bold text-gray-600">
                                                @forelse ($user->logs as $log)
                                                    <tr>
                                                        <td>{{ ucfirst($log->user->firstname) }}
                                                            {{ ucfirst($log->user->lastname) }}</td>
                                                        <td>{{ ucfirst($log->user->role) }}</td>
                                                        <td> {{ $log->email }}</td>
                                                        <td> {{ ucfirst($log->activity) }}</td>
                                                        <td> {{ $log->created_at }}</td>
                                                    @empty
                                                        <td colspan="5" style="text-align: center"> No record available
                                                        </td>
                                                @endforelse
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal active" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <form class="form" action="/api/assign-user" id="kt_modal_update_user_form" method="POST">
                            <div class="modal-header" id="kt_modal_update_user_header">
                                @csrf
                                <h2 class="fw-bolder">{{ ucfirst($user->firstname) }} {{ ucfirst($user->lastname) }} Unit
                                    Management</h2>
                            </div>
                            <div class="modal-body py-10 px-lg-17">
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_update_user_header"
                                    data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                    <div id="kt_modal_update_user_user_info" class="collapse show">
                                        <div class="fv-row mb-15">
                                            <label class="fs-6 fw-bold mb-2">Units</label>
                                            <input name="user" value="{{$user->id}}" style="display:none" />
                                            <select name="unit" aria-label="Update admin unit" data-control="select2"
                                                data-placeholder="Update admin unit..."
                                                class="form-select form-select-solid"
                                                data-dropdown-parent="#kt_modal_update_details">
                                                @if ($user->unit)
                                                    <option value="{{ $user->unit->id }}"> {{ $user->unit->name }}
                                                    </option>
                                                @endif
                                                @forelse ($units as $unit)
                                                    <option value="{{ $unit->id }}"> {{ $unit->name }} </option>
                                                @empty
                                                    <option> -No unit available </option>
                                                @endforelse

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer flex-center">
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label"> Submit </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
