@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Error_500')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">                           
                            <h4 class="text-uppercase">Some Error</h4>
                            <h5 class="text-uppercase">Internal Server Error</h5>
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary waves-effect waves-light" href="/home">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-6">
                        <div>
                            <img src="/assets/images/error-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
