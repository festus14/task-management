
@extends('layouts.metro')
@section('title')
    <title>Task Management | Dashboard</title>
@endsection
@section('subheader')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Dashboard
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Projects
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Tasks
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title"></span>
                    <span class="m-subheader__daterange-date m--font-brand"></span>
                </span>
                <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                    <i class="la la-angle-down"></i>
                </a>
            </span>
        </div>
    </div>
@endsection
@section('content')
    <!--begin:: Widgets/Stats-->
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title"><a href="" class="m-menu__link-text">Project</a></h4>
                            <br>
                            <span class="m-widget24__desc">Total Number</span>
                            <span class="m-widget24__stats m--font-brand"> {{ count($projects) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-brand" role="progressbar"
                                     style="width: {{ ($projects->where('status_id', 4)->count() * 100)/ count($projects) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <span class="m-widget24__change">Completed</span>
                            <span class="m-widget24__number">{{ ($projects->where('status_id', 4)->count() * 100)/ count($projects) }}%</span>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">Task</h4>
                            <br>
                            <span class="m-widget24__desc">Total Task</span>
                            <span class="m-widget24__stats m--font-info">{{ count($tasks) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-info" role="progressbar" style="width: {{ ($tasks->where('status_id', 4)->count() * 100)/ count($projects) }}%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">Completed</span>
                            <span class="m-widget24__number">{{ ($tasks->where('status_id', 4)->count() * 100)/ count($projects) }}%</span>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Clients
                            </h4>
                            <br>
                            <span class="m-widget24__desc">Total Number</span>
                            <span class="m-widget24__stats m--font-danger">{{ count($clients) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar"
                                     style="width: {{ ($clients->whereYear('date_of_engagement', date('Y'))->count() * 100)/ count($clients) }}%;" aria-valuenow="50" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">New Addition</span>
                            <span class="m-widget24__number">69%</span>
                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                               Staff Members
                            </h4>
                            <br>
                            <span class="m-widget24__desc">Total User</span>
                            <span class="m-widget24__stats m--font-success">{{ count($users) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar"
                                     style="width: 0%;" aria-valuenow="50" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
    <!--end:: Widgets/Stats-->

    <!--Begin::Section Calendar-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet " id="m_portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-map-location"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Calendar
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#"
                                   class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>
																Add Event
															</span>
														</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_calendar"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <!--End::Section Calendar-->
@endsection
@section('javascript')
{{--    <script src="metro/assets/app/js/dashboard.js" type="text/javascript"></script>--}}
    @parent

@endsection
