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
                <h1 class="fs-2hx fw-bold text-gray-800 me-2 lh-1 pl-2" style="padding: 10px"> Shippments </h1>
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
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
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Shippment" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->


                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end" style="display:none">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                Filter
                            </button>

                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                                style="display:none">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bolder">
                                        Filter Options
                                    </div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->

                                <!--begin::Content-->
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-bold">Role:</label>
                                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-user-table-filter="role" data-hide-search="true">
                                            <option></option>
                                            <option value="Administrator">
                                                Administrator
                                            </option>
                                            <option value="Analyst">Analyst</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Support">Support</option>
                                            <option value="Trial">Trial</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-user-table-filter="two-step" data-hide-search="true">
                                            <option></option>
                                            <option value="Enabled">Enabled</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">
                                            Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary fw-bold px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @if (auth()->user()->role != 'admin')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2"
                                                rx="1" fill="currentColor" />
                                        </svg></span>
                                    Add Shippment
                                </button>
                            @endif
                        </div>


                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-950px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">Add Shippments</h2>

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
                                    <form id="kt_modal_add_user_form" class="form" method="POST"
                                        action="/api/add-shippment">
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            @csrf

                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                <!--end::Input group-->

                                                <div class="row col-12">
                                                    <div class="fv-row mb-7 col-6">
                                                        <label class="required fw-bold fs-6 mb-2">Category</label>
                                                        <select name="category" data-control="select2"
                                                            class="form-select form-select-solid"
                                                            data-dropdown-parent="#kt_modal_add_user">
                                                            @forelse ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @empty
                                                                <option>No record</option>
                                                            @endforelse
                                                        </select>
                                                        <option></option>
                                                    </div>
                                                    <div class="fv-row mb-7 col-6">
                                                        <label class="required fw-bold fs-6 mb-2">Shippment Name</label>
                                                        <input type="text" name="shippment_name"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Shippment Name" />
                                                    </div>
                                                </div>
                                                <div class="row col-12">
                                                    <div class="fv-row mb-7 col-6">
                                                        <label class="required fw-bold fs-6 mb-2">Destination Unit</label>
                                                        <select name="destination_unit"
                                                            class="form-select form-select-solid"
                                                            data-dropdown-parent="#kt_modal_add_user">
                                                            <option></option>
                                                            @forelse ($units as $unit)
                                                                <option value="{{ $unit->id }}"> {{ $unit->name }}
                                                                </option>
                                                            @empty
                                                                <option> -No unit available </option>
                                                            @endforelse

                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-7 col-6">
                                                        <label class="required fw-bold fs-6 mb-2">Quantity</label>
                                                        <input type="text" name="quantity"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Quantity" />
                                                    </div>
                                                </div>
                                                <div class="row col-12">
                                                    <div class="fv-row mb-7 col-6">
                                                        <label class="required fw-bold fs-6 mb-2">Send Date</label>
                                                        <input type="date" name="send_date"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Shippment Scheduled Date" />
                                                    </div>
                                                    <div class="fv-row mb-7 col-6">
                                                        <label class="required fw-bold fs-6 mb-2">Delivery Date</label>
                                                        <input type="date" name="delivery_date"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Delivery Date" />
                                                    </div>
                                                </div>
                                                <div class="row col-12">
                                                    <div class="fv-row mb-7">
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">Description/Instruction</label>
                                                        <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="description" placeholder="Additional Note"
                                                            rows="8" style="resize:none"></textarea>
                                                    </div>
                                                </div>
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
                                            <!--end::Form-->
                                        </div>
                                    </form>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Add task-->
                    </div>
                </div>

                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-5px pe-2"> SN </th>
                                <th class="min-w-125px">Shipping Tag</th>
                                <th class="min-w-125px">Origin Unit</th>
                                <th class="min-w-125px">Destination Unit</th>
                                <th class="min-w-125px">Item Name</th>
                                <th class="min-w-125px">Send Date</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($shipments as $key => $shipment)
                                <tr>
                                    <td> {{ $key + 1 }}</td>
                                    <td class="">
                                        <span>{{ $shipment->code }}</span>
                                    </td>
                                    <td class="">
                                        <span>{{ $shipment->startunit->name }}</span>
                                    </td>
                                    <td class="">
                                        <span>{{ $shipment->endunit->name }} </span>
                                    </td>
                                    <td class="">
                                        <span>{{ ucfirst($shipment->name) }}</span>
                                    </td>
                                    <td> {{ $shipment->send_date }} </td>
                                    <td>
                                        @if ($shipment->status == 'delivered')
                                            <div class="badge badge-light-success fw-bolder">
                                                {{ ucfirst($shipment->status) }}
                                            </div>
                                        @elseif($shipment->status == 'rejected')
                                            <div class="badge badge-light-warning fw-bolder">
                                                {{ ucfirst($shipment->status) }}
                                            </div>
                                        @else
                                            <div class="badge badge-light-primary fw-bolder">
                                                {{ ucfirst($shipment->status) }}
                                            </div>
                                        @endif
                                    </td>

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
                                                <a href="/view-logistic/{{ encrypt_data($shipment->id) }}"
                                                    class="menu-link px-3">
                                                    View
                                                </a>
                                            </div>
                                            @if (auth()->user()->role != 'admin')
                                                @if (auth()->user()->unit->id == $shipment->end_unit)
                                                    @if ($shipment->status == 'pending' || $shipment->status == 'processing')
                                                        <div class="menu-item px-3">
                                                            <a href="/api/approve-shippment/{{ encrypt_data($shipment->id) }}"
                                                                class="menu-link px-3">
                                                                Approve
                                                            </a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="/api/reject-shippment/{{ encrypt_data($shipment->id) }}"
                                                                class="menu-link px-3">
                                                                Reject
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
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
