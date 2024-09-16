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

                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">Jobs</h3>
                                </div>
                                {{-- <div style="margin-top: -10px;">
                                    <a href="{{ route('account.createJob') }}" class="btn btn-primary">Users</a>
                                </div> --}}

                            </div>




                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Creaed By</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">

                                        @if ($jobs->isNotEmpty())
                                            @foreach ($jobs as $job)
                                                <tr>
                                                    <td>{{ $job->id }}</td>
                                                    <td>
                                                        <p class="m-0">{{ $job->title }}</p>
                                                        <small class="m-0">Applicants:
                                                            {{ $job->applications->count() }}</small>
                                                    </td>
                                                    <td>{{ $job->user->name }}</td>
                                                    <td>

                                                        @if ($job->status == '1')
                                                            <p class="text-success">Active</p>
                                                        @else
                                                            <p class="text-danger">Block</p>
                                                        @endif

                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                                    <td>
                                                        <div class="action-dots float-end">
                                                            <a href="#" class="" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('admin.edit', $job->id) }}"><i
                                                                            class="fa fa-edit" aria-hidden="true"></i>
                                                                        Edit</a></li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="deleteJob({{ $job->id }})"><i
                                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>

                                </table>
                            </div>

                            <div class="">
                                {{ $jobs->links() }}
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
        function deleteJob(id) {
            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: "{{ route('admin.job.delete') }}",
                    type: "post",
                    data: {
                        "id": id
                    },
                    dataType: "json",
                    success: function(res) {
                        console.log(res);
                        window.location.reload();
                    }
                })
            }
        }
    </script>
@endsection
