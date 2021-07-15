@extends('layouts.master-layouts')

@section('title')
Payment History
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-primary mb-5 text-center">Payment History</h1>
                <div class="table-responsive mt-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>PaymentID</th>
                                <th>Payment Date</th>
                                <th>Start Date</th>
                                <th>Expiry Date</th>
                                <th>Paid Amount($)</th>
                                <th>Payment Method</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key=>$payment)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$payment->payment_id}}</td>                               
                                <td>{{$payment->payment_date}}</td>                               
                                <td>{{$payment->start_date}}</td>                               
                                <td>{{$payment->expiry_date}}</td>                               
                                <td>{{$payment->amount}}</td>                               
                                <td>{{$payment->payment_method}}</td>                                 
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