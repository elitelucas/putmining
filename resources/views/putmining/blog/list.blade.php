@extends('layouts.master-layouts')

@section('title')
Blog
@endsection

@section('content')


<h1 class="text-primary mb-5 text-center">{{$paid==0?'Public':'Paid'}} Blog List</h1>
<div class="col-sm-12 mb-3">
    <div style="text-align: right;"> <a href="{{url('/home')}}">Go To Home Page</a></div>
</div>
@foreach($blogs as $blog)
<div class="row">    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7">
                                <h4 class="card-title"><i>{{$blog->title}}</i></h4>
                            </div>
                        </div>
                        {!!$blog->content!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection

@section('script')
<!-- Plugin Js-->
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/pages/dashboard.init.js') }}"></script>
@endsection