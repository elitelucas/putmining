@extends('layouts.master-layouts')

@section('title') @lang('translation.Pricing') @endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-center mb-5">
                <h4>Select here to choose plan and choose payment options.</h4>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($plans as $plan)
            <div class="col-xl-4 col-md-4">
                <div class="card plan-box">
                    <div class="card-body p-4 text-center">
                        <div class="media">
                            <div class="media-body">
                                <h3>{{ $plan->title }}</h3>
                                <p class="text-muted" style="min-height: 60px">{{ $plan->subtitle }}</p>
                            </div>
                        </div>
                        <div class="py-4">
                            <h2><sup><small>$</small></sup> {{ $plan->price }}/ <span
                                    class="font-size-13">{{ $plan->duration }}</span></h2>
                        </div>
                        <div class="text-center plan-btn">
                            <button href="#" class="btn btn-primary btn waves-effect waves-light" data-toggle="modal"
                                data-target="#payModal"
                                onclick="openpaymodal({{ $plan->id }}, '{{ $plan->title }}',{{ $plan->price }})">Pay
                                Now</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- end row -->

    <div id="payModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="payModalLabel">Pay/Renew Subscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>You will pay for "<span id="plantitle"></span>" plan. Price is $<span id="planprice"></span> .</h5>
                    {{-- Paypal --}}
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <form action="{{ url('/pay') }}" method="POST" id="payform">
        @csrf
        <input type="hidden" id="payment_id" name="payment_id" value="">
        <input type="hidden" id="plan_id" name="plan_id" value="">
    </form>

@endsection


@section('script')
    <script>
        var selected_plan_id = 0;
        var selected_plan_price = 100;

        function openpaymodal(id, title, price) {
            $("#plantitle").text(title);
            $("#planprice").text(price);
            selected_plan_id = id;
            selected_plan_price = price;           
        }

        function pay(payment_id, plan_id) {
            $("#payform #payment_id").val(payment_id);
            $("#payform #plan_id").val(plan_id);
            $("#payform").submit();
        }

    </script>

    {{-- paypal --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{$paypal_clientID}}&currency=USD" data-sdk-integration-source="button-factory">
    </script>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'blue',
                    layout: 'horizontal',
                    label: 'paypal',
                    tagline: false
                },

                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            "description": "Pay/Renew Subscription",
                            "amount": {
                                "currency_code": "USD",
                                "value": selected_plan_price
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        console.log(details.id, details);
                        alert('Transaction completed by ' + details.payer.name
                            .given_name + '!');
                        pay(details.id, selected_plan_id);
                    });
                },

                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();

    </script>
@endsection
