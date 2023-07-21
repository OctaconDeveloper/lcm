@php
    // dd();
@endphp
@extends('layouts.app')
@section('content')
    <div class=" container-xxl " id="kt_content_container">

        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-4 mb-xl-10">

                <!--begin::List widget 10-->
                <div class="card card-flush h-lg-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-gray-800">Movement History</span>
                            <span class="text-gray-400 mt-1 fw-bold fs-6">{{ $shipments->count() }} Movements</span>
                        </h3>
                        <!--end::Title-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <a href="/view-logistics" class="btn btn-sm btn-light" data-bs-toggle='tooltip'
                                data-bs-dismiss='click' data-bs-custom-class="tooltip-dark">View All</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body">

                        <!--begin::Tab Content-->
                        <div class="tab-content">

                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_list_widget_10_tab_1">

                                @foreach ($shipments as $shipment)
                                    <div class="m-0">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-sm-center mb-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-45px me-4">
                                                <span class="symbol-label bg-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-2x svg-icon-white"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                fill="currentColor" />
                                                        </svg></span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#" class="text-gray-400 fs-6 fw-bold"> LCM </a>

                                                    <span
                                                        class="text-gray-800 fw-bolder d-block fs-4">#{{ strtolower($shipment->code) }}</span>
                                                </div>

                                                <span
                                                    class="badge badge-lg badge-light-{{ $shipment->status == 'delivered' ? 'success' : ($shipment->status == 'rejected' ? 'danger' : 'primary') }} fw-bolder my-2">{{ ucfirst($shipment->status) }}</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Timeline-->
                                        <div class="timeline">
                                            <!--begin::Timeline item-->
                                            <div class="timeline-item align-items-center mb-7">
                                                <!--begin::Timeline line-->
                                                <div class="timeline-line w-40px mt-6 mb-n12"></div>
                                                <!--end::Timeline line-->

                                                <!--begin::Timeline icon-->
                                                <div class="timeline-icon" style="margin-left: 11px">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M16 12C16 14.2 14.2 16 12 16C9.8 16 8 14.2 8 12C8 9.8 9.8 8 12 8C14.2 8 16 9.8 16 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                                fill="currentColor" />
                                                        </svg></span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Timeline icon-->

                                                <!--begin::Timeline content-->
                                                <div class="timeline-content m-0">
                                                    <!--begin::Title-->
                                                    <span
                                                        class="fs-6 text-gray-400 fw-bold d-block">{{ $shipment->startunit->name }}</span>
                                                    <!--end::Title-->

                                                    <!--begin::Title-->
                                                    <span
                                                        class="fs-6 fw-bolder text-gray-800">{{ $shipment->startunit->div }}</span>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Timeline content-->
                                            </div>
                                            <!--end::Timeline item-->

                                            <!--begin::Timeline item-->
                                            <div class="timeline-item align-items-center">
                                                <!--begin::Timeline line-->
                                                <div class="timeline-line w-40px"></div>
                                                <!--end::Timeline line-->

                                                <!--begin::Timeline icon-->
                                                <div class="timeline-icon" style="margin-left: 11px">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-info"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                                fill="currentColor" />
                                                        </svg></span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Timeline icon-->

                                                <!--begin::Timeline content-->
                                                <div class="timeline-content m-0">
                                                    <!--begin::Title-->
                                                    <span
                                                        class="fs-6 text-gray-400 fw-bold d-block">{{ $shipment->endunit->name }}</span>
                                                    <!--end::Title-->

                                                    <!--begin::Title-->
                                                    <span
                                                        class="fs-6 fw-bolder text-gray-800">{{ $shipment->endunit->div }}</span>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Timeline content-->
                                            </div>
                                            <!--end::Timeline item-->
                                        </div>
                                        <!--end::Timeline-->
                                    </div>
                                    <div class="separator separator-dashed my-6"></div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Col-->
            <div class="col-xl-8 mb-5 mb-xl-10">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 h-xxl-50 mb-0 mb-xl-10">

                    <!--begin::Col-->
                    <div class="col-xxl-6 mb-5 mb-xl-0">

                        <!--begin::List widget 8-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7 mb-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-gray-800">Movements by Materiel </span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-0">

                                @foreach ($categories as $category)
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Flag-->
                                        <img src="https://lcm.up.railway.app/assets/media/logos/logo.png" class="me-4 w-25px"
                                            style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->

                                        <!--begin::Section-->
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                                    {{ $category->name }}</a>
                                                <!--end::Title-->

                                                <!--begin::Desc-->
                                                <span
                                                    class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">{{ $category->description }}</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->

                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-800 fw-bolder fs-6 me-3 d-block">{{ Number_format($category->shipments->count()) }}</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->

                                    <div class="separator separator-dashed my-3"></div>
                                @endforeach


                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::LIst widget 8-->


                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
@endsection
