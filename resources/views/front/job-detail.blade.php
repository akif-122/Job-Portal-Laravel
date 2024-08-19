@extends('front.layout.app')

@section('main')

    <section class="section-4 bg-2">
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    &nbsp;Back to Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container job_details_area">
            <div class="row pb-5">
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">

                                    <div class="jobs_conetent">
                                        <a href="#">
                                            <h4>{{ $jobDetail->title }}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i> {{ $jobDetail->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i> {{ $jobDetail->jobType->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a class="heart_mark" href=""> <i class="fa fa-heart-o"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="descript_wrap white-bg">
                            <div class="single_wrap">
                                <h4>Job description</h4>
                                <p>{{ $jobDetail->location }}</p>

                            </div>

                            @if (!is_null($jobDetail->responsibility))
                                <div class="single_wrap">
                                    <h4>Responsibility</h4>
                                    <p>{{ $jobDetail->responsibility }}</p>
                                    {{-- <ul>
                                        <li>The applicants should have experience in the following areas.</li>
                                        <li>Have sound knowledge of commercial activities.</li>
                                        <li>Leadership, analytical, and problem-solving abilities.</li>
                                        <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                                    </ul> --}}
                                </div>
                            @endif

                            @if (!is_null($jobDetail->qualification))
                                <div class="single_wrap">
                                    <h4>Qualifications</h4>
                                    <p>{{ $jobDetail->qualification }}</p>
                                    {{-- <ul>
                                    <li>The applicants should have experience in the following areas.</li>
                                    <li>Have sound knowledge of commercial activities.</li>
                                    <li>Leadership, analytical, and problem-solving abilities.</li>
                                    <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                                </ul> --}}
                                </div>
                            @endif

                            @if (!is_null($jobDetail->Benefits))
                                <div class="single_wrap">
                                    <h4>Benefits</h4>
                                    <p>{{ $jobDetail->benefits }}</p>
                                </div>
                            @endif
                            <div class="border-bottom"></div>
                            <div class="pt-3 text-end">
                                <a href="#" class="btn btn-secondary">Save</a>
                                <a href="#" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Job Summery</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Published on:
                                        <span>{{ Carbon\Carbon::parse($jobDetail->created_at)->format('d M, Y') }}</span>
                                    </li>
                                    <li>Vacancy: <span>{{ $jobDetail->vacancy }} Position</span></li>
                                    @if (!is_null($jobDetail->salary))
                                        <li>Salary: <span>{{ $jobDetail->salary }}</span></li>
                                    @endif
                                    <li>Location: <span>{{ $jobDetail->location }}</span></li>
                                    <li>Job Nature: <span> {{ $jobDetail->jobType->name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 my-4">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Company Details</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Name: <span>{{ $jobDetail->company_name }}</span></li>
                                    @if (!is_null($jobDetail->company_location))
                                        <li>Locaion: <span>{{ $jobDetail->company_location }}</span></li>
                                    @endif
                                    @if (!is_null($jobDetail->company_website))
                                        <li>Webite: <span>{{ $jobDetail->company_website }}</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('customJs')
    <script>
      function goBack(){
        window.history.back();
      }
    </script>
@endsection
