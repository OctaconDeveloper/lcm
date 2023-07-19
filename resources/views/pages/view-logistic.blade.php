@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-lg-row-fluid ms-lg-15">

                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        @if ($shipment->status == 'pending' || $shipment->status == 'processing')
                            <li class="nav-item ms-auto">
                                <a href="/api/approve-shippment/{{ encrypt_data($shipment->id) }}"
                                    class="btn btn-success ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    Approve
                                </a>
                                <a href="/api/reject-shippment/{{ encrypt_data($shipment->id) }}"
                                    class="btn btn-danger ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    Reject
                                </a>
                            </li>
                        @else
                            <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                                style="float:right !important">
                                Movement {{ $shipment->status }}
                            </a>
                        @endif
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
                                        <h2>Details</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <form id="kt_modal_add_schedule_form" class="form" method="POST"
                                            action="/api/update-user">
                                            @csrf
                                            <div class="row col-12">
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Tag</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $shipment->code }}" readonly />
                                                </div>
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Category</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ ucfirst($shipment->category->name) }}" readonly />
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Title</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ ucfirst($shipment->name) }}" readonly />
                                                </div>
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Logging
                                                        Date</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $shipment->send_date }}" readonly />
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Quantity</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $shipment->quantity }}" readonly />
                                                </div>
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Schedule Delivery
                                                        Date</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $shipment->proposed_delivery_date }}" readonly />
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Delivered
                                                        On</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $shipment->delivered_date }}" readonly />
                                                </div>
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Date
                                                        Difference</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ dateDiff($shipment->proposed_delivery_date, $shipment->delivered_date) }}"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Vendor</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ ucfirst($shipment->startunit->name) }}"
                                                        readonly />
                                                </div>
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Sent By</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ ucfirst($shipment->sendOfficer->rank) }}  {{ ucfirst($shipment->sendOfficer->firstname) }} {{ ucfirst($shipment->sendOfficer->lastname) }} "
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Deport</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ ucfirst($shipment->endunit->name) }} ( {{ ucfirst($shipment->endunit->unit->div) }})"
                                                        readonly />
                                                </div>
                                                <div class="fv-row mb-7 col-6">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Received
                                                        By</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="@if ($shipment->receiveOfficer) {{ ucfirst($shipment->receiveOfficer->rank) }}  {{ ucfirst($shipment->receiveOfficer->firstname) }} {{ ucfirst($shipment->sendOfficer->lastname) }} @else N/A @endif"
                                                        readonly />
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="print()">
                                                <span class="indicator-label"> Print </span>
                                            </button>
                                            {{-- <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label"> Submit </span>
                                                </button>
                                            </div> --}}
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
