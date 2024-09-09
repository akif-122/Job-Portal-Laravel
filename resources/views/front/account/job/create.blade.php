@extends('front.layout.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @includeIf('front.account.sidebar')
                </div>
                <div class="col-lg-9">

                    @includeIf('front.message')
                    <form action="" id="createJobForm" name="createJobForm">
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                <h3 class="fs-4 mb-1">Job Details</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="" class="mb-2">Title<span class="req">*</span></label>
                                        <input type="text" placeholder="Job Title" id="title" name="title"
                                            class="form-control">
                                        <p class="m-0 d-block"></p>
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="" class="mb-2">Category<span class="req">*</span></label>
                                        <select name="category" id="category" class="form-control">
                                            <option selected disabled>Select a Category</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="m-0 d-block"></p>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                        <select class="form-select" name="job_type" id="job_type">
                                            <option selected disabled>Select Job Type</option>

                                            @if ($jobTypes->isNotEmpty())
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="m-0 d-block"></p>

                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                        <input type="number" min="1" placeholder="Vacancy" id="vacancy"
                                            name="vacancy" class="form-control">
                                        <p class="m-0 d-block"></p>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Salary</label>
                                        <input type="text" placeholder="Salary" id="salary" name="salary"
                                            class="form-control">
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Location<span class="req">*</span></label>
                                        <input type="text" placeholder="location" id="location" name="location"
                                            class="form-control">
                                        <p class="m-0 d-block"></p>

                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Description<span class="req">*</span></label>
                                    <textarea class="textarea" name="description" id="description" cols="5" 
                                        placeholder="Description"></textarea>
                                    <p class="m-0 d-block"></p>

                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Benefits</label>
                                    <textarea class="textarea" name="benefits" id="benefits" cols="5"  placeholder="Benefits"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Responsibility</label>
                                    <textarea class="textarea" name="responsibility" id="responsibility" cols="5" 
                                        placeholder="Responsibility"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Qualifications</label>
                                    <textarea class="form-control" name="qualification" id="qualification" cols="5" rows="5"
                                        placeholder="Qualifications"></textarea>
                                </div>



                                <div class="mb-4">
                                    <label for="" class="mb-2">Keywords</label>
                                    <input type="text" placeholder="keywords" id="keywords" name="keywords"
                                        class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Experience <span class="req">*</span></label>
                                    <select class="form-select" name="experience" id="experience">
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="3">3 Year</option>
                                        <option value="4">4 Year</option>
                                        <option value="5">5 Year</option>
                                        <option value="6">6 Year</option>
                                        <option value="7">7 Year</option>
                                        <option value="8">8 Year</option>
                                        <option value="9">9 Year</option>
                                        <option value="10">10 Year</option>
                                        <option value="10+">10+ Year</option>
                                    </select>
                                    <p class="m-0 d-block"></p>

                                </div>

                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Name<span class="req">*</span></label>
                                        <input type="text" placeholder="Company Name" id="company_name"
                                            name="company_name" class="form-control">
                                        <p class="m-0 d-block"></p>

                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Location</label>
                                        <input type="text" placeholder="Location" id="company_location"
                                            name="company_location" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Website</label>
                                    <input type="text" placeholder="Website" id="company_website" name="company_website"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button class="btn btn-primary">Save Job</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('customJs')
    <script>
        function handleError(error, ele) {
            if (error) {
                $("#" + ele)
                    .addClass("is-invalid")
                    .siblings("p")
                    .addClass("invalid-feedback")
                    .html(error);
            } else {
                $("#" + ele)
                    .removeClass("is-invalid")
                    .siblings("p")
                    .removeClass("invalid-feedback")
                    .html("");
            }
        }

        function emptyError(ele) {
            $("#" + ele)
                .removeClass("is-invalid")
                .siblings("p")
                .removeClass("invalid-feedback")
                .html("");
        }


        $("#createJobForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('account.createSaveJob') }}',
                type: "post",
                dataType: "json",
                data: $("#createJobForm").serializeArray(),
                success: function(res) {
                    if (!res.status) {
                        let errors = res.errors;
                        handleError(errors.title, "title")
                        handleError(errors.category, "category");
                        handleError(errors.job_type, "job_type");
                        handleError(errors.vacancy, "vacancy");
                        handleError(errors.location, "location");
                        handleError(errors.description, "description");
                        handleError(errors.experience, "experience");
                        handleError(errors.company_name, "company_name");
                    }else{
                        emptyError("title");
                        emptyError("category");
                        emptyError("job_type");
                        emptyError("vacancy");
                        emptyError("location");
                        emptyError("description");
                        emptyError("experience");
                        emptyError("company_name");
                        window.location.href = "{{ route("account.myJobs") }}";
                    }
                }
            })
        })
    </script>
@endsection
