@extends('layouts.master-layouts')

@section('title')
    Home
@endsection

@section('content')
    @if (Auth::guest())
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input type="email" class="form-control" placeholder="Input Email" id="emailInput" @if (\Session::has('needverify')) value="{!! \Session::get('email') !!}" @endif>
                            </div>
                            <div class="col-sm-6">
                                <button action="profile" class="btn btn-info homebutton mr-1">Subscribe</button>
                                <button action="contact" class="btn btn-info homebutton mr-1">Contact</button>
                                <button action="login" class="btn btn-info homebutton mr-1" id="loginhomebtn">Log
                                    In</button>
                            </div>
                            <form action="headerform" class="app-search d-none d-lg-block" id="headerform" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="" id="actionInput">
                                <input type="hidden" name="email" value="" id="emailInput2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <h3>Introduction</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {!! $introduction !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Public blog -->
    <h3>Lastest Public Update</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    @if ($public_blog)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h4 class="card-title"><i>{{ $public_blog->title }}</i></h4>
                                    </div>
                                    <div class="col-sm-5" style="text-align: right;"> <a
                                            href="{{ url('/public_blog') }}">See More</a></div>
                                </div>
                                {!! $public_blog->content !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <h3>About Putmining</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    {!! $about !!}
                </div>
            </div>
        </div>
    </div>
    <h3><a class="text-danger" href="{{ url('/disclaimer') }}">Disclaimer</a></h3>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#emailInput").focus();
          
            $('#emailInput').keypress(function(e) {
                var key = e.which;
                if (key == 13) // the enter key code
                {
                    $('#loginhomebtn').click();
                    return false;
                }
            });
        });

    </script>

    @if (\Session::has('needverify'))
        <script>
            Swal.fire({
                title: "Need Email Verification",
                text: "We need to verify your email address. An email has been sent. Please check your email and click the supplied link.",
                type: "warning",
                confirmButtonColor: "#556ee6"
            });

        </script>
    @endif
@endsection
