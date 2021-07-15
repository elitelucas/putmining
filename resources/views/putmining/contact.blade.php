@extends('layouts.master-layouts')

@section('title')
Contact
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-primary mb-5 text-center">Contact Us</h1>
                <div class="row">
                    <!-- <div class="col-sm-5">
                        <div class="faq-box media mb-4">
                            <div class="faq-icon mr-3">
                                <i class="bx bx-help-circle font-size-20 text-success"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="font-size-15">What is Put Mining?</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="faq-box media mb-4">
                            <div class="faq-icon mr-3">
                                <i class="bx bx-help-circle font-size-20 text-success"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="font-size-15">What is Put Mining?</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="faq-box media mb-4">
                            <div class="faq-icon mr-3">
                                <i class="bx bx-help-circle font-size-20 text-success"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="font-size-15">What is Put Mining?</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="faq-box media mb-4">
                            <div class="faq-icon mr-3">
                                <i class="bx bx-help-circle font-size-20 text-success"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="font-size-15">What is Put Mining?</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>

                    </div> -->
                    <div class="col-sm-12">
                        <form action="{{url('/contact')}}" method="post">
                            @csrf
                            <input type="hidden" name="email" value="<?= Auth::user()->email ?>">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Plese fill the content and submit</label>
                                <textarea class="form-control" cols="30" rows="10" name="content"></textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- Plugin Js-->
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/pages/dashboard.init.js') }}"></script>
@endsection