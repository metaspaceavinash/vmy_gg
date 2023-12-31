@extends('layouts.admin')

@push('custom-scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="{{ asset('custom/js/jquery.form.js') }}"></script>

    <script type="text/javascript">
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        @if (
            $plan->price > 0.0 &&
                $admin_payment_setting['is_stripe_enabled'] == 'on' &&
                !empty($admin_payment_setting['stripe_key']) &&
                !empty($admin_payment_setting['stripe_secret']))
            var stripe = Stripe('{{ $admin_payment_setting['stripe_key'] }}');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '14px',
                    color: '#32325d',
                },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $("#card-errors").html(result.error.message);
                        show_toastr('Error', result.error.message, 'error');
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        @endif


        $(document).on("click", "#pay_with_paystack", function() {
            @if (isset($admin_payment_setting['paystack_public_key']))
                $('#paystack-payment-form').ajaxForm(function(res) {
                    if (res.flag == 1) {
                        var paystack_callback = "{{ url('/plan/paystack') }}";
                        var order_id = '{{ time() }}';
                        var coupon_id = res.coupon;
                        var handler = PaystackPop.setup({
                            key: '{{ $admin_payment_setting['paystack_public_key'] }}',
                            email: res.email,
                            amount: res.total_price * 100,
                            currency: res.currency,
                            ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                                1
                            ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                            metadata: {
                                custom_fields: [{
                                    display_name: "Email",
                                    variable_name: "email",
                                    value: res.email,
                                }]
                            },

                            callback: function(response) {
                                console.log(response.reference, order_id);
                                window.location.href = paystack_callback + '/' + response
                                    .reference + '/' + '{{ encrypt($plan->id) }}' +
                                    '?coupon_id=' + coupon_id
                            },
                            onClose: function() {
                                alert('window closed');
                            }
                        });
                        handler.openIframe();
                    } else if (res.flag == 2) {
                        setTimeout(() => {
                            toastrs('{{ __('Success') }}', res.msg, 'success');
                            window.location.href = "{{ route('plans.index') }}";
                        }, 1000);
                    } else {
                        show_toastr('Error', data.message, 'msg');
                    }

                }).submit();
            @endif
        });
        @if (isset($admin_payment_setting['flutterwave_public_key']))
            //    Flaterwave Payment
            $(document).on("click", "#pay_with_flaterwave", function() {

                $('#flaterwave-payment-form').ajaxForm(function(res) {

                    if (res.flag == 1) {
                        var coupon_id = res.coupon;
                        var API_publicKey = '{{ $admin_payment_setting['flutterwave_public_key'] }}';
                        var nowTim = "{{ date('d-m-Y-h-i-a') }}";
                        var flutter_callback = "{{ url('/plan/flaterwave') }}";
                        var x = getpaidSetup({
                            PBFPubKey: API_publicKey,
                            customer_email: '{{ Auth::user()->email }}',
                            amount: res.total_price,
                            currency: '{{ env('CURRENCY') }}',
                            txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) +
                                'fluttpay_online-' + {{ date('Y-m-d') }},
                            meta: [{
                                metaname: "payment_id",
                                metavalue: "id"
                            }],
                            onclose: function() {},
                            callback: function(response) {
                                var txref = response.tx.txRef;
                                if (
                                    response.tx.chargeResponseCode == "00" ||
                                    response.tx.chargeResponseCode == "0"
                                ) {
                                    window.location.href = flutter_callback + '/' + txref +
                                        '/' +
                                        '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}?coupon_id=' +
                                        coupon_id;
                                } else {
                                    // redirect to a failure page.
                                }
                                x
                                    .close(); // use this to close the modal immediately after payment.
                            }
                        });
                    } else if (res.flag == 2) {
                        setTimeout(() => {
                            toastrs('{{ __('Success') }}', res.msg, 'success');
                            window.location.href = "{{ route('plans.index') }}";
                        }, 1000);
                    } else {
                        show_toastr('Error', data.message, 'msg');
                    }

                }).submit();
            });
        @endif
        @if (isset($admin_payment_setting['razorpay_public_key']))
            // Razorpay Payment
            $(document).on("click", "#pay_with_razorpay", function() {
                $('#razorpay-payment-form').ajaxForm(function(res) {
                    if (res.flag == 1) {
                        var razorPay_callback = '{{ url('/phy_plan/razorpay') }}';
                        var totalAmount = res.total_price * 100;
                        var coupon_id = res.coupon;
                        var options = {
                            "key": "{{ $admin_payment_setting['razorpay_public_key'] }}", // your Razorpay Key Id
                            "amount": totalAmount,
                            "name": 'Plan',
                            "currency": '{{ env('CURRENCY') }}',
                            "description": "",
                            "handler": function(response) {
                                window.location.href = razorPay_callback + '/' + response
                                    .razorpay_payment_id + '/' +
                                    '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}?coupon_id=' +
                                    coupon_id;
                            },
                            "theme": {
                                "color": "#528FF0"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    } else if (res.flag == 2) {
                        setTimeout(() => {
                            toastrs('{{ __('Success') }}', res.msg, 'success');
                            window.location.href = "{{ route('plans.index') }}";
                        }, 1000);
                    } else {
                        show_toastr('Error', data.message, 'msg');
                    }

                }).submit();
            });
        @endif
        // Payfast



        $(document).ready(function() {

            $(document).on('click', '.apply-coupon', function() {
                var ele = $(this);
                var coupon = ele.closest('.row').find('.coupon').val();

                $.ajax({
                    url: '{{ route('apply.coupon') }}',
                    type: 'GET',
                    datType: 'json',
                    data: {
                        plan_id: '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}',
                        coupon: coupon
                    },
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    success: function(data) {
                        $('.final-price').text(data.final_price);
                        $('#final_price_pay').val(data.price);
                        $('#mollie_total_price').val(data.price);
                        $('#skrill_total_price').val(data.price);
                        $('#coingate_total_price').val(data.price);
                        $('.bank_amount').text(data.final_price);
                        $('#stripe_coupon, #paypal_coupon, #skrill_coupon,#coingate_coupon,#bank_coupon')
                            .val(coupon);

                        if (ele.closest($('#payfast-form')).length == 1) {
                            get_payfast_status(data.price, coupon);
                        }

                        if (data.is_success == true) {
                            toastrs('{{ __('Success') }}', data.message, 'success');
                        } else if (data.is_success == false) {
                            toastrs('{{ __('Error') }}', data.message, 'error');
                        } else {
                            toastrs('{{ __('Error') }}', 'Coupon code is required', 'error');
                        }
                    }
                })
            });
        });
        @if (
            $admin_payment_setting['is_payfast_enabled'] == 'on' &&
                !empty($admin_payment_setting['payfast_merchant_id']) &&
                !empty($admin_payment_setting['payfast_merchant_key']))
            $(document).ready(function() {
                get_payfast_status(amount = 0, coupon = null);
            })

            function get_payfast_status(amount, coupon) {
                var plan_id = $('#plan_id').val();
                $.ajax({
                    url: '{{ route('payfast.payment') }}',
                    method: 'POST',
                    data: {
                        'plan_id': plan_id,
                        'coupon_amount': amount,
                        'coupon_code': coupon
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.success == true) {
                            $('#get-payfast-inputs').append(data.inputs);

                        } else {
                            show_toastr('Error', data.inputs, 'error')
                        }
                    }
                });
            }
        @endif
    </script>
@endpush

@push('css-page')
    <style>
        #card-element {
            border: 1px solid #a3afbb !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }

        .page-content.overflow-hidden {
            overflow: unset !important;
        }
    </style>
@endpush

@php
    $dir = asset(Storage::url('uploads/plan'));
    $dir_payment = asset(Storage::url('uploads/payments'));
@endphp
@section('page-title')
    {{ __('Plan Subscription') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}">{{ __('Plan') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Plan Subscription') }}</li>
@endsection
@section('content')

    <div class="row" style="align-items: flex-start;">
        <div class="col-xl-3" style="position: sticky; top: 30px;">
            <div class="sticky-top">
                <div class="card ">
                    <div class="list-group list-group-flush" id="useradd-sidenav">

                        @if ($admin_payment_setting['is_manually_enabled'] == 'on')
                            <a href="#manual_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Manually') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if ($admin_payment_setting['is_bank_enabled'] == 'on')
                            <a href="#bank_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Bank Transfer') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif

                        @if (
                            $admin_payment_setting['is_stripe_enabled'] == 'on' &&
                                !empty($admin_payment_setting['stripe_key']) &&
                                !empty($admin_payment_setting['stripe_secret']))
                            <a href="#stripe_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Stripe') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif

                        @if (
                            $admin_payment_setting['is_paypal_enabled'] == 'on' &&
                                !empty($admin_payment_setting['paypal_client_id']) &&
                                !empty($admin_payment_setting['paypal_secret_key']))
                            <a href="#paypal_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Paypal') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif

                        @if (
                            $admin_payment_setting['is_paystack_enabled'] == 'on' &&
                                !empty($admin_payment_setting['paystack_public_key']) &&
                                !empty($admin_payment_setting['paystack_secret_key']))
                            <a href="#paystack_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Paystack') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif


                        @if (isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on')
                            <a href="#flutterwave_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Flutterwave') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on')
                            <a href="#razorpay_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Razorpay') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on')
                            <a href="#mercado_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Mercado Pago') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on')
                            <a href="#paytm_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Paytm') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif

                        @if (isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on')
                            <a href="#mollie_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Mollie') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on')
                            <a href="#skrill_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Skrill') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on')
                            <a href="#coingate_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Coingate') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on')
                            <a href="#paymentwall_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Paymentwall') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif

                        @if (isset($admin_payment_setting['is_toyyibpay_enabled']) && $admin_payment_setting['is_toyyibpay_enabled'] == 'on')
                            <a href="#toyyibpay_payment"
                                class="list-group-item list-group-item-action  border-0">{{ __('Toyyibpay') }}<div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        @endif
                        @if (isset($admin_payment_setting['is_payfast_enabled']) && $admin_payment_setting['is_payfast_enabled'] == 'on')
                            <a href="#payfast_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Payfast') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_iyzipay_enabled']) && $admin_payment_setting['is_iyzipay_enabled'] == 'on')
                            <a href="#iyzipay_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Iyzipay') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_sspay_enabled']) && $admin_payment_setting['is_sspay_enabled'] == 'on')
                            <a href="#sspay_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('SSpay') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_paytab_enabled']) && $admin_payment_setting['is_paytab_enabled'] == 'on')
                            <a href="#paytab_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Paytab') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_benefit_enabled']) && $admin_payment_setting['is_benefit_enabled'] == 'on')
                            <a href="#benefit_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Benefit') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_cashfree_enabled']) && $admin_payment_setting['is_cashfree_enabled'] == 'on')
                            <a href="#cashfree_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Cashfree') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_aamarpay_enabled']) && $admin_payment_setting['is_aamarpay_enabled'] == 'on')
                            <a href="#aamarpay_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Aamarpay') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif
                        @if (isset($admin_payment_setting['is_paytr_enabled']) && $admin_payment_setting['is_paytr_enabled'] == 'on')
                            <a href="#paytr_payment"
                                class="list-group-item list-group-item-action border-0">{{ __('Pay TR') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        @endif

                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="card-body">
                            <span class="price-badge bg-primary">Physical Card</span>
                            @if (\Auth::user()->type == 'company' && \Auth::user()->plan == $plan->id)
                                <div class="d-flex flex-row-reverse m-0 p-0 ">
                                    <span class="d-flex align-items-center ">
                                        <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                        <span class="ms-2">{{ __('Active') }}</span>
                                    </span>
                                </div>
                            @endif
                           
                            <li class="list-group-item d-flex justify-content-between 5h-sm py-3">
                            <div class="d-flex">
                            <!-- https://dummyimage.com/70x50/000/fff -->
                            <img src="http://127.0.0.1:8000/assets/card-images/2FrontBlank.png" width="70px" height="50px" class="img-fluid ">
                          <div class="ms-2">
                            <h6 class="my-0">{{ $plan->name }}</h6>
                            <small class="text-muted">{{ $plan->designation }} </small>
                            <br/>
                            <small class="text-muted">{{ $plan->phy_card_type }}</small>

                          </div>
                        </div>
                        <span class="mb-4 f-w-600 p-price"> {{ $card_price }} </span>
                        </li>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-xl-9">
            {{-- Manually Payment --}}
            @if ($admin_payment_setting['is_manually_enabled'] == 'on')
                <div id="manual_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Manually') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-pane {{ $admin_payment_setting['is_manually_enabled'] == 'on' ? 'active' : '' }}">
                            <p class="text-muted">
                                {{ __('Requesting manual payment for the planned amount for the subscriptions plan.') }}
                            </p>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col-sm-12 my-2 px-2">
                            <div class="text-end">
                                @if (\Auth::user()->requested_plan != $plan->id)
                                    <a href="{{ route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)]) }}"
                                        class="btn btn-lg btn-primary btn-create" data-title="{{ __('Send Request') }}"
                                        data-bs-placement="top" data-bs-toggle="tooltip"
                                        data-bs-original-title="{{ __('Send Request') }}" data-toggle="tooltip">
                                        {{ __('Send Request') }}
                                    </a>
                                @else
                                    <a href="{{ route('request.cancel', \Auth::user()->id) }}"
                                        class="btn btn-icon  btn-danger btn-md" data-bs-placement="top"
                                        data-bs-toggle="tooltip" data-bs-original-title="{{ __('Cancel Request') }}">
                                        {{ __('Cancel Request') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @endif
            {{-- End Manually Payment --}}
            {{-- Bank Transfer --}}
            @if ($admin_payment_setting['is_bank_enabled'] == 'on')
                <div id="bank_payment" class="card">
                    <form action="{{ route('plan.pay.with.bank') }}" method="post" enctype="multipart/form-data"
                        class="w3-container w3-display-middle w3-card-4" id="payment-form1">
                        @csrf
                        <div class="card-header">
                            <h5>{{ __('Bank Transfer') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane {{ $admin_payment_setting['is_bank_enabled'] == 'on' ? 'active' : '' }}">
                                <div class="border p-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bank_detail"
                                                    class="form-label text-dark">{{ __('Bank Detail') }}</label><br>
                                                @if (isset($admin_payment_setting['bank_detail']) && !empty($admin_payment_setting['bank_detail']))
                                                    {!! $admin_payment_setting['bank_detail'] !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bankfile"
                                                    class="form-label text-dark">{{ __('Payment Receipt') }}</label>
                                                <input type="file" name="receipt" class="form-control"
                                                    enctype="multipart/form-data">
                                                @if ($errors->has('receipt'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('receipt') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <label for="bank_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="bank_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <a href="#"
                                                    class="apply-btn btn btn-lg btn-primary btn-create apply-coupon"
                                                    data-bs-toggle="tooltip" data-bs-title="{{ __('Apply') }}"><i
                                                        data-feather="save"></i></a>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <span><b>{{ 'Plan Price : ' }}</b>{{ '$' . $plan->price }}</span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <b>{{ 'Net Amount : ' }}</b><span
                                                class="bank_amount">{{ '$' . $plan->price }}</span><br>
                                            <small>{{ __('(After coupon apply)') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-sm-12 my-2 px-2">
                                <div class="text-end">
                                    <input type="hidden" name="plan_id"
                                        value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                    <input type="submit" value="{{ __('Pay Now') }}"
                                        class="btn btn-lg btn-primary btn-create">
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            @endif
            {{-- End Bank Transfer --}}
            {{-- stripe payment --}}
            @if (
                $admin_payment_setting['is_stripe_enabled'] == 'on' &&
                    !empty($admin_payment_setting['stripe_key']) &&
                    !empty($admin_payment_setting['stripe_secret']))
                <div id="stripe_payment" class="card">
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                        id="payment-form">
                        @csrf
                        <div class="card-header">
                            <h5>{{ __('Stripe') }}</h5>
                        </div>
                        <div class="card-body">
                            <div
                                class="tab-pane {{ ($admin_payment_setting['is_stripe_enabled'] == 'on' && !empty($admin_payment_setting['stripe_key']) && !empty($admin_payment_setting['stripe_secret'])) == 'on' ? 'active' : '' }}">

                                <div class="border p-3 mb-3 stripe-payment-div">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="custom-radio">
                                                <label
                                                    class="font-16 font-weight-bold">{{ __('Credit / Debit Card') }}</label>
                                            </div>
                                            <p class="mb-0 pt-1 text-sm">
                                                {{ __('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.') }}
                                            </p>
                                        </div>
                                        <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
                                            <img src="{{ asset('public/custom/img/payments/master.png') }}"
                                                height="24" alt="master-card-img">
                                            <img src="{{ asset('public/custom/img/payments/discover.png') }}"
                                                height="24" alt="discover-card-img">
                                            <img src="{{ asset('public/custom/img/payments/visa.png') }}" height="24"
                                                alt="visa-card-img">
                                            <img src="{{ asset('public/custom/img/payments/american express.png') }}"
                                                height="24" alt="american-express-card-img">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="card-name-on"
                                                    class="form-label text-dark">{{ __('Name on card') }}</label>
                                                <input type="text" name="name" id="card-name-on"
                                                    class="form-control required"
                                                    placeholder="{{ \Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <div class="col-md-11 mt-4">
                                            <div class="form-group">
                                                <input type="text" id="stripe_coupon" name="coupon"
                                                    class="form-control coupon"
                                                    placeholder="{{ __('Enter Coupon Code') }}">
                                            </div>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <a href="#" class="text-white btn btn-lg btn-primary apply-coupon"
                                                data-bs-toggle="tooltip" data-bs-title="{{ __('Apply') }}"><i
                                                    data-feather="save" class=""></i></a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="error" style="display: none;">
                                                <div class='alert-danger alert'>
                                                    {{ __('Please correct the errors and try again.') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Credit/Debit Card box-->


                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-sm-12 my-2 px-2">
                                <div class="text-end">
                                    <input type="hidden" name="plan_id"
                                        value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                    <input type="submit" value="{{ __('Pay Now') }}"
                                        class="btn btn-lg btn-primary btn-create">
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            @endif
            {{-- stripr payment end --}}

            {{-- paypal end --}}
            @if (
                $admin_payment_setting['is_paypal_enabled'] == 'on' &&
                    !empty($admin_payment_setting['paypal_client_id']) &&
                    !empty($admin_payment_setting['paypal_secret_key']))
                <div id="paypal_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Paypal') }}</h5>
                    </div>

                    <form class="w3-container w3-display-middle w3-card-4" method="POST" id="payment-form"
                        action="{{ route('plan.pay.with.paypal') }}">
                        @csrf
                        <div class="card-body">

                            <div class="tab-pane {{ ($admin_payment_setting['is_stripe_enabled'] != 'on' && $admin_payment_setting['is_paypal_enabled'] == 'on' && !empty($admin_payment_setting['paypal_client_id']) && !empty($admin_payment_setting['paypal_secret_key'])) == 'on' ? 'active' : '' }}"
                                id="paypal_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="paypal_coupon" name="coupon"
                                                class="form-control coupon" placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary btn-create apply-coupon"
                                            data-bs-toggle="tooltip" data-bs-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" value="{{ __('Pay Now') }}"
                                    class="btn btn-lg btn-primary btn-create">
                            </div>
                        </div>
                    </form>


                </div>
            @endif
            {{-- paypal end --}}

            {{-- Paystack --}}
            @if (
                $admin_payment_setting['is_paystack_enabled'] == 'on' &&
                    !empty($admin_payment_setting['paystack_public_key']) &&
                    !empty($admin_payment_setting['paystack_secret_key']))
                <div id="paystack_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Paystack') }}</h5>

                    </div>

                    <form class="w3-container w3-display-middle w3-card-4" method="POST" id="paystack-payment-form"
                        action="{{ route('plan.pay.with.paystack') }}">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="paystack_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="paystack_coupon" name="coupon"
                                                class="form-control coupon" data-from="paystack"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary btn-create apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="button" id="pay_with_paystack" value="{{ __('Pay Now') }}"
                                    class="btn btn-lg btn-primary btn-create">
                            </div>
                        </div>
                    </form>


                </div>
            @endif
            {{-- Paystack end --}}

            {{-- Flutterwave --}}
            @if (isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on')
                <div id="flutterwave_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Flutterwave') }}</h5>

                    </div>

                    <form role="form" action="{{ route('plan.pay.with.flaterwave') }}" method="post"
                        class="require-validation" id="flaterwave-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="flutterwave_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="flaterwave_coupon" name="coupon"
                                                class="form-control coupon" placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="button" id="pay_with_flaterwave" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary">
                            </div>
                        </div>
                    </form>



                </div>
            @endif
            {{-- Flutterwave END --}}

            {{-- Razorpay --}}
            @if (isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on')
                <div id="razorpay_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Razorpay') }} </h5>

                    </div>

                    <form role="form" action="{{ route('phy_plan.pay.with.razorpay') }}" method="post"
                        class="require-validation" id="razorpay-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="razorpay_payment">

                                <input type="hidden" name="plan_id" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="razorpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="razorpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary btn-create apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="button" id="pay_with_razorpay" value="{{ __('Pay Now') }}"
                                    class="btn btn-lg btn-primary btn-create">
                            </div>
                        </div>
                    </form>

                </div>
            @endif
            {{-- Razorpay end --}}

            {{-- Mercado Pago --}}
            @if (isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on')
                <div id="mercado_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Mercado Pago') }}</h5>

                    </div>

                    <form role="form" action="{{ route('plan.pay.with.mercado') }}" method="post"
                        class="require-validation" id="mercado-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="mercado_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="mercado_coupon" name="coupon"
                                                class="form-control coupon" data-from="mercado"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_mercado" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>

                </div>
            @endif
            {{-- Mercado Pago end --}}

            {{-- Paytm --}}
            @if (isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on')
                <div id="paytm_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Paytm') }}</h5>
                    </div>

                    <form role="form" action="{{ route('plan.pay.with.paytm') }}" method="post"
                        class="require-validation" id="paytm-payment-form">
                        @csrf
                        <div class="card-body">

                            <div class="tab-pane " id="paytm_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="paytm_coupon" name="coupon"
                                                class="form-control coupon" data-from="paytm"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary  apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="flaterwave_coupon"
                                                class="form-label text-dark">{{ __('Mobile Number') }}</label>
                                            <input type="text" id="mobile" name="mobile"
                                                class="form-control mobile" data-from="mobile"
                                                placeholder="{{ __('Enter Mobile Number') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_paytm" value="{{ __('Pay Now') }}"
                                    class=" btn btn-lg btn-primary btn-create badge-blue">
                            </div>
                        </div>
                    </form>


                </div>
            @endif
            {{-- Paytm end --}}

            {{-- Mollie --}}
            @if (isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on')
                <div id="mollie_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Mollie') }}</h5>

                    </div>

                    <form role="form" action="{{ route('plan.pay.with.mollie') }}" method="post"
                        class="require-validation" id="mollie-payment-form">
                        @csrf
                        <div class="card-body">

                            <div class="tab-pane " id="mollie_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="mollie_coupon" name="coupon"
                                                class="form-control coupon" data-from="mollie"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_mollie" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>

                    </form>

                    {{-- Mollie end --}}

                </div>
            @endif
            {{-- Skrill --}}
            @if (isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on')
                <div id="skrill_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Skrill') }}</h5>

                    </div>

                    <form role="form" action="{{ route('plan.pay.with.skrill') }}" method="post"
                        class="require-validation" id="skrill-payment-form">
                        @csrf
                        <div class="card-body">

                            <div class="tab-pane " id="skrill_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="skrill_coupon" name="coupon"
                                                class="form-control coupon" data-from="skrill"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>
                                @php
                                    $skrill_data = [
                                        'transaction_id' => md5(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'),
                                        'user_id' => 'user_id',
                                        'amount' => 'amount',
                                        'currency' => 'currency',
                                    ];
                                    session()->put('skrill_data', $skrill_data);
                                    
                                @endphp

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_skrill" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>


                </div>
            @endif
            {{-- Skrill end --}}

            {{-- Coingate --}}
            @if (isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on')
                <div id="coingate_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Coingate') }}</h5>

                    </div>

                    <form role="form" action="{{ route('plan.pay.with.coingate') }}" method="post"
                        class="require-validation" id="coingate-payment-form">
                        @csrf
                        <div class="card-body">

                            <div class="tab-pane " id="coingate_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="coingate_coupon" name="coupon"
                                                class="form-control coupon" data-from="coingate"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                data-feather="save"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_coingate" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary">
                            </div>
                        </div>
                    </form>


                </div>
            @endif
            {{-- Coingate end --}}

            {{-- Paymentwall --}}
            @if (isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on')
                <div id="paymentwall_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Paymentwall') }}</h5>
                    </div>

                    <form role="form" action="{{ route('paymentwall') }}" method="post" class="require-validation"
                        id="coingate-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="paymentwall_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="paymentwall_coupon" name="coupon"
                                                class="form-control coupon" data-from="paymentwall"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_paymentwall" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Paymentwall end --}}

            {{-- Toyyibpay --}}
            @if (isset($admin_payment_setting['is_toyyibpay_enabled']) && $admin_payment_setting['is_toyyibpay_enabled'] == 'on')
                <div id="toyyibpay_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Toyyibpay') }}</h5>
                    </div>

                    <form role="form" action="{{ route('plan.pay.with.toyyibpay') }}" method="post"
                        class="require-validation" id="coingate-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="toyyibpay_payment">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="pay_with_toyyibpay" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Toyyibpay end --}}
            {{-- Payfast --}}
            @if (isset($admin_payment_setting['is_payfast_enabled']) && $admin_payment_setting['is_payfast_enabled'] == 'on')
                <div id="payfast_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Payfast') }}</h5>
                    </div>

                    @if (
                        $admin_payment_setting['is_payfast_enabled'] == 'on' &&
                            !empty($admin_payment_setting['payfast_merchant_id']) &&
                            !empty($admin_payment_setting['payfast_merchant_key']) &&
                            !empty($admin_payment_setting['payfast_signature']) &&
                            !empty($admin_payment_setting['payfast_mode']))
                        <div
                            class="tab-pane {{ ($admin_payment_setting['is_payfast_enabled'] == 'on' && !empty($admin_payment_setting['payfast_merchant_id']) && !empty($admin_payment_setting['payfast_merchant_key'])) == 'on' ? 'active' : '' }}">
                            @php
                                $pfHost = $admin_payment_setting['payfast_mode'] == 'sandbox' ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
                            @endphp
                            <form role="form" action={{ 'https://' . $pfHost . '/eng/process' }} method="post"
                                class="require-validation" id="payfast-form">
                                <div class="card-body">
                                    <div class="tab-pane " id="toyyibpay_payment">
                                        <input type="hidden" name="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-100">
                                                        <label for="payfast_coupon"
                                                            class="form-label">{{ __('Coupon') }}</label>
                                                        <input type="text" id="payfast_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Coupon Code') }}">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                                    data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                        class="fas fa-save"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="get-payfast-inputs"></div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <input type="hidden" name="plan_id" id="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                        <input type="submit" value="{{ __('Pay Now') }}" id="payfast-get-status"
                                            class="btn btn-xs btn-primary">

                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
            {{-- Payfast end --}}

            {{-- Iyzipay --}}
            @if (isset($admin_payment_setting['is_iyzipay_enabled']) && $admin_payment_setting['is_iyzipay_enabled'] == 'on')
                <div id="iyzipay_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Iyzipay') }}</h5>
                    </div>

                    @if (
                        $admin_payment_setting['is_iyzipay_enabled'] == 'on' &&
                            !empty($admin_payment_setting['iyzipay_key']) &&
                            !empty($admin_payment_setting['iyzipay_secret']) &&
                            !empty($admin_payment_setting['iyzipay_mode']))
                        <div
                            class="tab-pane {{ ($admin_payment_setting['is_iyzipay_enabled'] == 'on' && !empty($admin_payment_setting['iyzipay_key']) && !empty($admin_payment_setting['iyzipay_secret'])) == 'on' ? 'active' : '' }}">
                            <form role="form" action="{{ route('iyzipay.payment.init') }}" method="post"
                                class="require-validation" id="iyzipay-form">
                                @csrf
                                <div class="card-body">
                                    <div class="tab-pane " id="">
                                        <input type="hidden" name="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-100">
                                                        <label for="payfast_coupon"
                                                            class="form-label">{{ __('Coupon') }}</label>
                                                        <input type="text" id="payfast_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Coupon Code') }}">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                                    data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                        class="fas fa-save"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="get-payfast-inputs"></div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <input type="hidden" name="plan_id" id="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                        <input type="submit" value="{{ __('Pay Now') }}" id=""
                                            class="btn btn-xs btn-primary">

                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
            {{-- Iyzipay end --}}
            {{-- sspay --}}
            @if (isset($admin_payment_setting['is_sspay_enabled']) && $admin_payment_setting['is_sspay_enabled'] == 'on')
                <div id="sspay_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Sspay') }}</h5>
                    </div>
                    <form role="form" action="{{ route('sspay.prepare.plan') }}" method="post"
                        class="require-validation" id="coingate-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- sspay end --}}
            {{-- Paytab --}}
            @if (isset($admin_payment_setting['is_paytab_enabled']) && $admin_payment_setting['is_paytab_enabled'] == 'on')
                <div id="paytab_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Paytab') }}</h5>
                    </div>
                    <form role="form" action="{{ route('plan.pay.with.paytab') }}" method="post"
                        class="require-validation" id="coingate-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Paytab end --}}
            {{-- Benefit --}}
            @if (isset($admin_payment_setting['is_benefit_enabled']) && $admin_payment_setting['is_benefit_enabled'] == 'on')
                <div id="benefit_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Benefit') }}</h5>
                    </div>
                    <form role="form" action="{{ route('benefit.initiate') }}" method="post"
                        class="require-validation" id="coingate-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Benefit end --}}
            {{-- Cashfree --}}
            @if (isset($admin_payment_setting['is_cashfree_enabled']) && $admin_payment_setting['is_cashfree_enabled'] == 'on')
                <div id="cashfree_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Cashfree') }}</h5>
                    </div>
                    <form role="form" action="{{ route('cashfree.payment') }}" method="post"
                        class="require-validation" id="coingate-payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Cashfree end --}}
            {{-- Aamarpay --}}
            @if (isset($admin_payment_setting['is_aamarpay_enabled']) && $admin_payment_setting['is_aamarpay_enabled'] == 'on')
                <div id="aamarpay_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Aamarpay') }}</h5>
                    </div>
                    <form role="form" action="{{ route('pay.aamarpay.payment') }}" method="post"
                        class="require-validation" id="payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Aamarpay end --}}
            {{-- Paytr --}}
            @if (isset($admin_payment_setting['is_paytr_enabled']) && $admin_payment_setting['is_paytr_enabled'] == 'on')
                <div id="paytr_payment" class="card">
                    <div class="card-header">
                        <h5>{{ __('Pay TR') }}</h5>
                    </div>
                    <form role="form" action="{{ route('pay.paytr.payment') }}" method="post"
                        class="require-validation" id="payment-form">
                        @csrf
                        <div class="card-body">
                            <div class="tab-pane " id="">
                                <input type="hidden" name="plan_id"
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="paypal_coupon" class="form-label">{{ __('Coupon') }}</label>
                                            <input type="text" id="toyyibpay_coupon" name="coupon"
                                                class="form-control coupon" data-from="toyyibpay"
                                                placeholder="{{ __('Enter Coupon Code') }}">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <a href="#" class="apply-btn btn btn-lg btn-primary apply-coupon"
                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                class="fas fa-save"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <input type="submit" id="" value="{{ __('Pay Now') }}"
                                    class="btn-create btn btn-lg btn-primary badge-blue">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Paytr end --}}
        </div>
    </div>
    </div>

@endsection
