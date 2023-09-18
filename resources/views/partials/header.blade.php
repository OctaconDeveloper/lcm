@php
    $logs = \App\Models\ActivityLog::whereUserId(auth()->user()->id)->orderBy('created_at','DESC')->take(10)->get();
    $count = \App\Models\ActivityLog::whereUserId(auth()->user()->id)->count();
@endphp
<div id="kt_header" class="header " data-kt-sticky="true" data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">

    <div class=" container-fluid  d-flex align-items-stretch justify-content-between" id="kt_header_container">

        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0"
            data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

            <h1 class="text-dark fw-bolder my-1 fs-2">
                {{ strtoupper(env("APP_NAME"))}}
                <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <ul class="breadcrumb fw-bold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="/dashboard" class="text-muted">
                        Dashboard </a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-stretch flex-shrink-0">

            <div class="d-flex align-items-center ms-2 ms-lg-3">
                <div class="btn btn-icon btn-active-light-primary position-relative w-35px h-35px w-md-40px h-md-40px"
                    data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                fill="currentColor" />
                            <path
                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                fill="currentColor" />
                            <path opacity="0.3"
                                d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                fill="currentColor" />
                            <path opacity="0.3"
                                d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                fill="currentColor" />
                        </svg></span>
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                    <div class="d-flex flex-column bgi-no-repeat rounded-top"
                        style="background-image:url('../assets/media/misc/pattern-2.jpg')">
                        <h3 class="text-white fw-bold px-9 mt-10 mb-6">
                            Logs <span class="fs-8 opacity-75 ps-3">{{$count}} logs</span>
                        </h3>
                    </div>

                    <!--begin::Tab content-->
                    <div class="tab-content">

                        <!--begin::Tab panel-->
                        <div class="tab-pane active" id="kt_topbar_notifications_3" role="tabpanel">
                            <div class="scroll-y mh-325px my-5 px-8">
                                @forelse ($logs as $log )
                                    
                                <div class="d-flex flex-stack py-4">
                                    <div class="d-flex align-items-center me-2">
                                        {{-- <span class="w-70px badge badge-light-success me-4">{{$log->email}}</span> --}}
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">{{$log->activity}}</a>
                                    </div>
                                    <span class="badge badge-light fs-8">{{$log->created_at}}</span>
                                </div>
                                @empty
                                    
                                @endforelse

                            </div>

                            <!--begin::View more-->
                            <div class="py-3 text-center border-top">
                                <a href="/logs"
                                    class="btn btn-color-gray-600 btn-active-color-primary">
                                    View All
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                height="2" rx="1" transform="rotate(-180 18 13)"
                                                fill="currentColor" />
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="currentColor" />
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                            <!--end::View more-->
                        </div>
                        <!--end::Tab panel-->
                    </div>
                    <!--end::Tab content-->
                </div>
            </div>

            <!--begin::User-->
            <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
                <!--begin::Menu wrapper-->
                <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="click"
                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                    <img src="https://lcm-62f517d95952.herokuapp.com/assets/media/logos/logo.png" alt="user" />
                </div>

                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="symbol symbol-50px me-5">
                                <img alt="Logo" src="https://lcm-62f517d95952.herokuapp.com/assets/media/logos/logo.png" />
                            </div>

                            <div class="d-flex flex-column">
                                <div class="fw-bolder d-flex align-items-center fs-5">
                                    {{ auth()->user()->firstname }}  {{ auth()->user()->lastname }}
                                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ auth()->user()->role }}</span>
                                </div>
                                <a href="#" class="fw-bold text-muted text-hover-primary fs-7"> {{auth()->user()->email}} </a>
                            </div>
                        </div>
                    </div>

                    <div class="separator my-2"></div>
                    <div class="menu-item px-5 my-1">
                        <a href="/settings" class="menu-link px-5">
                            Account Settings
                        </a>
                    </div>
                    <div class="menu-item px-5">
                        <a href="/api/signout" class="menu-link px-5">
                            Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
