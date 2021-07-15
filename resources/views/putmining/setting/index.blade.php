@extends('layouts.master-layouts')

@section('title')
Setting Management
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title') Setting Management @endslot
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
                                <th>Key</th>                            
                                <th>Value</th>                            
                                <th>Edit</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $key=>$setting)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$setting->key}}</td>                             
                                <td>{{$setting->value}}</td>                             
                                <td>
                                    <a class="btn btn-primary" href="{{route('setting.edit', $setting->id)}}">Edit</a>
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