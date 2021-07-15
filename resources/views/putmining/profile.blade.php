@extends('layouts.master-layouts')

@section('title')
    Profile
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-primary mb-5 text-center">Profile</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ url('setting_notify') }}" method="POST" class="mb-5">
                                @csrf
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="notify_on_home"
                                        name="notify_on_home" @if (Auth::user()->notify_on_home) checked @endif>
                                    <label class="custom-control-label" for="notify_on_home">Receive Email on Main Page
                                        Updates</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="notify_on_paid"
                                        name="notify_on_paid" @if (Auth::user()->notify_on_paid) checked @endif>
                                    <label class="custom-control-label" for="notify_on_paid">Receive Email when Mined Puts
                                        are
                                        posted</label>
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    Change Notify Setting
                                </button>
                            </form>

                            @if (Auth::user()->expiry_date)
                                <h5>Your subscription Expires: {{ Auth::user()->expiry_date }}</h5>
                            @else
                                <h5>You have no current subscription. For access, please select from the options below.</h5>
                            @endif
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <h6>Choose Your pricing plan</h6>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('/pricing') }}" class="btn btn-primary">Pay/Renew</a>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h6>Select here if you are a BIO member to enter your BIO username and gain FREE access
                                        to PutMining.com</h6>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#bioModal">BIO
                                        Member</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h6>Check Payment History</h6>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ url('/payment_history') }}" class="btn btn-success">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ url('setting_password') }}" method="POST" onsubmit="checkPassword()">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Password</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="password" name="newpassword"
                                            placeholder="Enter New Passowrd" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <input class="form-control" type="password" name="newpassword_confirm"
                                            placeholder="Confirm New Passowrd" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button class="btn btn-primary" type="submit">
                                            Change Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ url('setting_email') }}" method="POST" onsubmit="checkEmail()">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Email</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="email" name="newemail"
                                            placeholder="Enter New Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <input class="form-control" type="email" name="newemail_confirm"
                                            placeholder="Confirm New Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button class="btn btn-primary" type="submit">
                                            Change Email
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="bioModalLabel">Request access with BIO username</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/request_bio') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <h5>Please enter your BIO username.</h5>
                        <input type="text" class="form-control" name="bio" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Request</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

@endsection

@section('script')
    <!-- Plugin Js-->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/dashboard.init.js') }}"></script>

    <script>
        function checkEmail() {
            if ($("input[name=newemail]").val() != $("input[name=newemail_confirm]").val()) {               
                Swal.fire({
                    title: "Need Match",
                    text: "The email addresses you entered do NOT match!",
                    type: "warning",
                    confirmButtonColor: "#556ee6"
                });
                event.preventDefault();
            }
        }

        function checkPassword() {
            if ($("input[name=newpassword]").val() != $("input[name=newpassword_confirm]").val()) {               
                Swal.fire({
                    title: "Need Match",
                    text: "The passwords you entered do NOT match!",
                    type: "warning",
                    confirmButtonColor: "#556ee6"
                });
                event.preventDefault();
            }
        }

    </script>
@endsection
