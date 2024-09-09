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
                    <div class="card card border-0 shadow mb-4 p-3 h-100">
                        <div class="card-body d-flex align-items-center justify-content-center h-100">
                            <h2>Welcome Admin!</h2>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection


@section('customJs')
    <script></script>
@endsection
