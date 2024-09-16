@extends('front.layout.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-3">
                    @includeIf('admin.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')

                    <form action="" id="editJobForm" name="editJobForm">
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                <h3 class="fs-4 mb-1">Edit Job Details</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="" class="mb-2">Title<span class="req">*</span></label>
                                        <input type="text" value="{{ $job->title }}" placeholder="Job Title"
                                            id="title" name="title" class="form-control">
                                        <p class="m-0 d-block"></p>
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="" class="mb-2">Category<span class="req">*</span></label>
                                        <select name="category" id="category" class="form-control">
                                            <option selected disabled>Select a Category</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option {{ $job->category_id == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                    <option {{ $job->job_type_id == $jobType->id ? 'selected' : '' }}
                                                        value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="m-0 d-block"></p>

                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                        <input type="number" value="{{ $job->vacancy }}" min="1"
                                            placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                        <p class="m-0 d-block"></p>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Salary</label>
                                        <input type="text" value="{{ $job->salary }}" placeholder="Salary"
                                            id="salary" name="salary" class="form-control">
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Location<span class="req">*</span></label>
                                        <input type="text" value="{{ $job->location }}" placeholder="location"
                                            id="location" name="location" class="form-control">
                                        <p class="m-0 d-block"></p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" {{ ($job->isFeatured == "1")?"checked": "" }} class="form-check-input" name="isFeatured" value="1" id="feature">
                                            <label for="feature" class="form-check-label">Featured</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                         <div class="form-check-inline">
                                            <input type="radio" {{ ($job->status == "1")?"checked": "" }} class="form-check-input" name="status" value="1" id="active">
                                            <label for="active" class="form-check-label">Active</label>
                                        </div>
                                         <div class="form-check-inline">
                                            <input type="radio" {{ ($job->status == "0")?"checked": "" }} class="form-check-input" name="status" value="0" id="block">
                                            <label for="block" class="form-check-label">Block</label>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Description<span class="req">*</span></label>
                                    <textarea class="textarea" name="description" id="description" cols="5" rows="5" placeholder="Description">{{ $job->description }}</textarea>
                                    <p class="m-0 d-block"></p>

                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Benefits</label>
                                    <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ $job->benefits }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Responsibility</label>
                                    <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5"
                                        placeholder="Responsibility">{{ $job->responsibility }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Qualifications</label>
                                    <textarea class="form-control" name="qualification" id="qualification" cols="5" rows="5"
                                        placeholder="Qualifications">{{ $job->qualification }}</textarea>
                                </div>



                                <div class="mb-4">
                                    <label for="" class="mb-2">Keywords</label>
                                    <input type="text" value="{{ $job->keywords }}" placeholder="keywords"
                                        id="keywords" name="keywords" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Experience <span class="req">*</span></label>
                                    <select class="form-select" name="experience" id="experience">
                                        <option value="1" {{ $job->experience == 1 ? 'selected' : '' }}>1
                                            Year</option>
                                        <option value="2" {{ $job->experience == 2 ? 'selected' : '' }}>2
                                            Year</option>
                                        <option value="3" {{ $job->experience == 3 ? 'selected' : '' }}>3
                                            Year</option>
                                        <option value="4" {{ $job->experience == 4 ? 'selected' : '' }}>4
                                            Year</option>
                                        <option value="5" {{ $job->experience == 5 ? 'selected' : '' }}>5
                                            Year</option>
                                        <option value="6" {{ $job->experience == 6 ? 'selected' : '' }}>6
                                            Year</option>
                                        <option value="7" {{ $job->experience == 7 ? 'selected' : '' }}>7
                                            Year</option>
                                        <option value="8" {{ $job->experience == 8 ? 'selected' : '' }}>8
                                            Year</option>
                                        <option value="9" {{ $job->experience == 9 ? 'selected' : '' }}>9
                                            Year</option>
                                        <option value="10" {{ $job->experience == 10 ? 'selected' : '' }}>10
                                            Year</option>
                                        <option value="10+" {{ $job->experience == '10+' ? 'selected' : '' }}>
                                            10+ Year</option>
                                    </select>
                                    <p class="m-0 d-block"></p>

                                </div>

                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Name<span class="req">*</span></label>
                                        <input type="text" value="{{ $job->company_name }}"
                                            placeholder="Company Name" id="company_name" name="company_name"
                                            class="form-control">
                                        <p class="m-0 d-block"></p>

                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">Location</label>
                                        <input type="text" value="{{ $job->company_location }}"
                                            placeholder="Location" id="company_location" name="company_location"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Website</label>
                                    <input type="text" value="{{ $job->company_website }}" placeholder="Website"
                                        id="company_website" name="company_website" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button class="btn btn-primary">Update Job</button>
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


        $("#editJobForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('admin.updateJob', $job->id) }}',
                type: "put",
                dataType: "json",
                data: $("#editJobForm").serializeArray(),
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
                    } else {
                        emptyError("title");
                        emptyError("category");
                        emptyError("job_type");
                        emptyError("vacancy");
                        emptyError("location");
                        emptyError("description");
                        emptyError("experience");
                        emptyError("company_name");
                        window.location.href = "{{ route('admin.jobs') }}";
                    }
                }
            })
        })
    </script>
@endsection
