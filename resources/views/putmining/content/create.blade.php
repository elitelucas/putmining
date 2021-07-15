@extends('layouts.master-layouts')

@section('title')
Create Blog
@endsection

@section('css')
<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css') }}">
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Create {{$paid==0?'Public':'Paid'}} Blog</h4>

                <form action="/blog" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="paid" value="{{$paid}}">
                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="formrow-firstname-input">Blog Content</label>
                        <textarea class="form-control summernote" name="content" cols="30" rows="10"></textarea>
                    </div>                    
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


@endsection

@section('script')
<!-- Summernote js -->
<script src="{{ URL::asset('assets/libs/summernote/summernote.min.js') }}"></script>

<script>
    $(".summernote").summernote({
        height: 300,
        minHeight: null,
        maxHeight: null,
        focus: !0
    });
</script>
@endsection