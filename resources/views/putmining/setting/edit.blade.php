@extends('layouts.master-layouts')

@section('title')
Edit Setting
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
                <h4 class="card-title mb-4">Edit Setting</h4>

                <form action="/setting/{{$setting->id}}" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="key" value="{{$setting->key}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formrow-firstname-input">Setting Content</label>
                        <input type="text" class="form-control" name="value" value="{{$setting->value}}">
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