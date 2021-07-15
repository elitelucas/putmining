@extends('layouts.master-layouts')

@section('title')
Content Management
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title') Content Management @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Type</th>                            
                                <th>Title</th>                            
                                <th>Edit</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $key=>$content)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$content->type}}</td>                             
                                <td>{{$content->title}}</td>                             
                                <td>
                                    <a class="btn btn-primary" href="{{route('content.edit', $content->id)}}">Edit</a>
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