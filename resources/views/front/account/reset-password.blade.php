@extends('front.layout.app')


@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>

            @if (Session::has('success'))
                <div class="alert alert-success col-md-5 mx-auto alert-dismissible">
                    <button class="btn-close" data-bs-dismiss='alert'></button>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger col-md-5 mx-auto alert-dismissible">
                    <button class="btn-close" data-bs-dismiss='alert'></button>
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-5">
                        <h1 class="h3">Reset Password</h1>
                        <form action="{{ route("processResetPassword") }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="mb-2">Password*</label>
                                <input type="hidden" name="token" value="{{ $tokenStr }}">
                                <input type="text" value="{{ old('password') }}" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password">
                                @error('password')
                                    <p class="invalid-feedback d-block">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Confirm Password*</label>
                                <input type="text" value="{{ old('confirm_password') }}" name="confirm_password" id="confirm_password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    placeholder="Confirm Password">
                                @error('confirm_password')
                                    <p class="invalid-feedback d-block">{{ $message }}</p>
                                @enderror
                            </div>
                          
                            <div class="justify-content-between d-flex">
                                <button class="btn btn-primary mt-2">Reset Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Click here to <a href="{{ route('account.registration') }}">Login</a></p>
                    </div>
                </div>
            </div>
            <div class="py-lg-5">&nbsp;</div>
        </div>
    </section>
@endsection
