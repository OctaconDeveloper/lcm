@php
    $deports = \App\Models\Deport::orderBy('created_at', 'DESC')->get();
    $units = \App\Models\Unit::orderBy('created_at', 'DESC')->get();
    $officers = \App\Models\User::where('role','manager')->orderBy('created_at', 'DESC')->get();
@endphp
 
@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            @if (\Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            @include('errors.errors')

            <div class="card">
                <!--begin::Card header-->
                <h1 class="fs-2hx fw-bold text-gray-800 me-2 lh-1 pl-2" style="padding: 10px"> Deports </h1>
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/doutune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg></span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search units" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->


                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            @if(auth()->user()->role == 'admin')
                                <button type="button" class="btn btn-army" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2"
                                                rx="1" fill="currentColor" />
                                        </svg></span>
                                    Add Deport
                                </button>
                            @endif
                        </div>

                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-user-table-toolbar="selected" style="display:none">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>
                                Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                                Delete Selected
                            </button>
                        </div>
                        <!--end::Group actions-->

                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">Add Deport</h2>

                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close" style="display: none">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                        rx="1" transform="rotate(45 7.41422 6)"
                                                        fill="currentColor" />
                                                </svg></span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_add_user_form" class="form" method="POST"
                                            action="/api/add-deport">
                                            @csrf

                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-bold fs-6 mb-2">Deport Name</label>
                                                    <input type="text" name="deport_name"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Deport Name" />
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-bold fs-6 mb-2">Unit</label>
                                                    <select class="form-control form-control-solid mb-3 mb-lg-0"  name="deport_unit">
                                                        @forelse ($units as $unit )
                                                            <option value="{{ $unit->id}}"> {{ ucfirst($unit->name) }} ({{ ucfirst($unit->div) }})</option>
                                                        @empty
                                                            <option>No units found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-bold fs-6 mb-2">Officer In Charge</label>
                                                    <select class="form-control form-control-solid mb-3 mb-lg-0"  name="deport_officer">
                                                        @forelse ($officers as $officer )
                                                            <option value="{{ $officer->id}}"> {{ $officer->rank }} {{ ucfirst($officer->firstname) }} {{ ucfirst($officer->lastname) }}</option>
                                                        @empty
                                                            <option>No Officers found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                {{-- <div class="fv-row mb-7">
                                                    <label class="required fw-bold fs-6 mb-2">Deport Location</label>
                                                    <input type="text" name="Deport_location"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Deport Location" />
                                                </div> --}}
                                            </div>

                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3">
                                                    Discard
                                                </button>
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel" style="display:none">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label"> Submit </span>
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit" style="display:none">
                                                    <span class="indicator-label"> Submit </span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>

                    </div>
                </div>

                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-5px pe-2"> SN </th>
                                <th class="min-w-5px"></th>
                                <th class="min-w-125px">Deport Name</th>
                                <th class="min-w-125px">Officer In Charge</th>
                                <th class="min-w-125px">Deport Unit</th>
                                <th class="min-w-125px">Location</th>
                                <th class="min-w-125px">Code</th>
                                <th class="min-w-125px">Inventory Items</th>
                                <th class="min-w-25px">Date Added</th>
                                <th class="text-end min-w-10px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($deports as $key => $deport)
                                <tr>
                                    <td> {{ $key + 1 }}</td>
                                    <td class="">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="#">
                                                <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                    {{ strtoupper(mb_substr($deport->name, 0, 1)) }}
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="">
                                        <span>{{ ucfirst($deport->name) }}</span>
                                    </td>
                                    <td class="">
                                        <span>{{ $deport->officer->rank}} {{ ucfirst($deport->officer->firstname) }} {{ ucfirst($deport->officer->lastname) }}</span>
                                    </td>
                                    <td class="">
                                        <span>{{ ucfirst($deport->unit->name) }} ({{ ucfirst($deport->unit->div) }})</span>
                                    </td>
                                    <td class="">
                                        <span>{{ ucfirst($deport->unit->location) }}</span>
                                    </td>
                                    <td class="">
                                        <span>{{ $deport->code }} </span>
                                    </td>
                                    <td class="">
                                        <span>{{ $deport->inventory->count() }} Item(s) </span>
                                    </td>
                                    <td> {{ $deport->created_at }} </td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg></span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="/view-deport/{{ encrypt_data($deport->id) }}"
                                                    class="menu-link px-3">
                                                    View
                                                </a>
                                            </div>
                                            @if(auth()->user()->role == 'admin')
                                            <div class="menu-item px-3">
                                                <a href="/api/delete-deport/{{ encrypt_data($deport->id) }}"
                                                    class="menu-link px-3">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    </td>                                   
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
