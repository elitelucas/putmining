@extends('layouts.master-layouts')

@section('title')
Blog List
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title') {{$paid==0?'Public':'Paid'}} Blog Management @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success" href="/blog/create?paid={{$paid}}">Add Blog</a>
                <div class="table-responsive mt-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key=>$blog)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('blog.edit', $blog->id)}}">Edit</a>
                                </td>
                                <td>
                                    <form action="/blog/{{$blog->id}}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


@endsection

@section('script')
<!-- Plugin Js-->

@endsection