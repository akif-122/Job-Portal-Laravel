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

                    <form action="" id="userForm" name="userForm">
                        <div class="card border-0 shadow mb-4">
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">My Profile</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Name*</label>
                                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                                        placeholder="Enter Name" class="form-control" value="">
                                    <p class="d-block"></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" name="email" id="email" value="{{ $user->email }}"
                                        placeholder="Enter Email" class="form-control">
                                    <p class="d-block"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">Designation*</label>
                                    <input type="text" name="designation" id="designation"
                                        value="{{ $user->designation }}" placeholder="Designation" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Mobile*</label>
                                    <input type="text" name="mobile" id="mobile" value="{{ $user->mobile }}"
                                        placeholder="Mobile" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>


                    {{-- CHANGE PASSWORD --}}
                    <form action="" id="changePassword" name="changePassword">
                        <div class="card border-0 shadow mb-4">
                            <div class="card-body p-4">
                                <h3 class="fs-4 mb-1">Change Password</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Old Password*</label>
                                    <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control">
                                    <p class="d-block invalid-feedback"></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">New Password*</label>
                                    <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                                    <p class="d-block invalid-feedback"></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Confirm Password*</label>
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                                    <p class="d-block invalid-feedback"></p>
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
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

        // CHANGE PASSWORD
        $("#changePassword").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route("changePassword") }}",
                type: "post",
                data: $("#changePassword").serializeArray(),
                dataType: "json",
                success: function(res){
                    if(!res.status){
                        let errors = res.errors;

                        if(errors.old_password){
                            $("#old_password")
                            .addClass("is-invalid")
                            .siblings("p").html(errors.old_password)
                        }else{
                            $("#old_password")
                            .removeClass("is-invalid")
                            .siblings("p").html("")
                        }

                        if(errors.new_password){
                            $("#new_password")
                            .addClass("is-invalid")
                            .siblings("p").html(errors.new_password)
                        }else{
                            $("#new_password")
                            .removeClass("is-invalid")
                            .siblings("p").html("")
                        }
                        if(errors.confirm_password){
                            $("#confirm_password")
                            .addClass("is-invalid")
                            .siblings("p").html(errors.confirm_password)
                        }else{
                            $("#confirm_password")
                            .removeClass("is-invalid")
                            .siblings("p").html("")
                        }
                        
                    }else{
                        $("#old_password")
                            .removeClass("is-invalid")
                            .siblings("p").html("");
                        $("#new_password")
                            .removeClass("is-invalid")
                            .siblings("p").html("");
                        $("#confirm_password")
                            .removeClass("is-invalid")
                            .siblings("p").html("");

                        window.location.reload();
                        // console.log(res)
                    }
                }
            })
        })


        $("#userForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('account.updateProfile') }}",
                type: "put",
                dataType: "json",
                data: $("#userForm").serializeArray(),
                success: function(res) {
                    console.log(res);
                    if (!res.status) {
                        let errors = res.errors;

                        if (errors.name) {
                            $("#name")
                                .addClass("is-invalid")
                                .siblings("p")
                                .addClass("invalid-feedback")
                                .html(errors.name);
                        } else {
                            $("#name")
                                .removeClass("is-invalid")
                                .siblings("p")
                                .removeClass("invalid-feedback")
                                .html("");
                        }

                        if (errors.email) {
                            $("#email")
                                .addClass("is-invalid")
                                .siblings("p")
                                .addClass("invalid-feedback")
                                .html(errors.email);
                        } else {
                            $("#email")
                                .removeClass("is-invalid")
                                .siblings("p")
                                .removeClass("invalid-feedback")
                                .html("");
                        }

                    } else {
                        $("#name")
                            .removeClass("is-invalid")
                            .siblings("p")
                            .removeClass("invalid-feedback")
                            .html("");
                        $("#email")
                            .removeClass("is-invalid")
                            .siblings("p")
                            .removeClass("invalid-feedback")
                            .html("");

                        window.location.reload()
                        // window.location.href = "{{ route('account.profile') }}"


                    }
                }
            })

        })
    </script>
@endsection
