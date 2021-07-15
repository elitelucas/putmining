@extends('layouts.master-layouts')

@section('title')
{{$pagetitle}}
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 mb-3">
        <div style="text-align: right;"> <a href="{{url('/home')}}">Go To Home Page</a></div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-primary mb-5 text-center">{{$pagetitle}}</h1>
                {!!$content!!}
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