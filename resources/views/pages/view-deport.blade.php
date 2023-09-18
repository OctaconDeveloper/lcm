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
                                    <img src="https://lcm-62f517d95952.herokuapp.com/assets/media/logos/logo.png" alt="image" />
                                </div>
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">
                                    {{ ucfirst($deport->name) }}
                                    {{-- {{ ucfirst($deport->firstname) }}
                                    {{ ucfirst($deport->lastname) }} --}}
                                </a>
                                <div class="mb-9">
                                    <div class="badge badge-lg badge-light-primary d-inline">
                                        {{ ucfirst($deport->unit->name) }}
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap flex-center">
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
                                    <div class="fw-bolder mt-5">Deport Name</div>
                                    <div class="text-gray-600">
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary">{{ ucfirst($deport->name) }}</a>
                                    </div>
                                    <div class="fw-bolder mt-5">Unit</div>
                                    <div class="text-gray-600">
                                        {{ ucfirst($deport->unit->name) }} ({{ ucfirst($deport->unit->div) }})
                                    </div>
                                    <div class="fw-bolder mt-5">Location</div>
                                    <div class="text-gray-600">
                                        {{ ucfirst($deport->unit->location) }}
                                    </div>
                                    <div class="fw-bolder mt-5">Officer In Charge</div>
                                    <div class="text-gray-600">
                                        {{ ucfirst($deport->officer->rank) }} {{ ucfirst($deport->officer->lastname) }}
                                        {{ ucfirst($deport->officer->lastname) }}
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
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_user_view_overview_events_and_logs_tab">Inventory</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        @if (\Session::has('msg'))
                            <div class="alert alert-success">
                                {!! \Session::get('msg') !!}
                            </div>
                        @endif
                        @include('errors.errors')

                        <div class="tab-pane active" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>{{ ucfirst($deport->name) }} Inventory</h2>
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
                                                    <th class="min-w-70px">SN</th>
                                                    <th>Material</th>
                                                    <th>Code</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-bold text-gray-600">
                                                @forelse ($deport->inventory as $key=> $inventory)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                            <td> {{ ucfirst($inventory->category->name) }}</td>
                                                        <td>{{ ucfirst($inventory->category->code) }}</td>
                                                        <td> {{ $inventory->quantity }}</td>
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
        </div>
    </div>
@endsection
