@extends('layout.app')

@section('title')
    Fund Wallet
@endsection

@section('body')
<!--Start breadcrumb area-->
<section class="breadcrumb-area">
    <div class="breadcrumb-area-bg"
        style="background-image: url(assets/images/backgrounds/breadcrumb-area-bg-3.jpg);"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title" style="border-top: 2px solid" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <h2>Fund Wallet</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="active">Fund Wallet</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->


<section class="overview-area">
    <div class="container">
        <div class="sec-title text-center">
            <h2>Fund your wallet</h2>
            <div class="sub-title">
                <p>Please enter the amount you want to fund your wallet with and follow the proceedure.</p>
            </div>
        </div>
        <div class="row container">
            <div class="col-md-3">
            </div>

            <div class="col-md-6">
                <div class="contact-form" style="background-color: #f5f8f7;">
                    <form id="fundWallet" action="" class="default-form2"  method="post">
                        @csrf
                        <div id="response">
                            @if (session('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <div class="input-box">
                                <input type="number" required value="{{ old('amount') }}" name="amount" id="amount" placeholder="2000" >
                                {!!  requestError($errors,'amount')  !!}
                            </div>
                        </div>

                        <div class="button-box">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                value="">

                                <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                            <button class="btn-one" id="payment-bt" type="submit" data-loading-text="Please wait...">
                                <span class="txt">
                                    Fund Wallet
                                </span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection


@section('extra-scripts')
<script type="text/javascript">
    $(function(){
        var amount = 0;

        const API_FLUTTERWAVE_PK = 'FLWPUBK_TEST-5da56828cb5048d85e4216fe4d46ffa6-X',
            customerEmail = "{{ auth()->user()->email }}",
            customerPhone = '09090809809',
            customerFName = 'Wasiu Alade',
            customerLName = 'a';

        $('#fundWallet').submit(function(e){
            e.preventDefault();
            processPayment();
        })

        const processPayment = () =>{
            const n = new Date();
            var t =
                "FIN-C" +
                n.getFullYear().toString() +
                n.getMonth().toString() +
                n.getMilliseconds().toString() +
                Math.floor(1).toString(),
                o = getpaidSetup({
                    PBFPubKey: API_FLUTTERWAVE_PK,
                    customer_email: customerEmail,
                    amount: Number($('#amount').val()),
                    customer_phone: customerPhone,
                    customer_firstname: customerFName,
                    customer_lastname: customerLName,
                    currency: "NGN",
                    country: "NG",
                    txref: t,
                    onclose: function() {},
                    callback: function(e) {
                        handlePaymentResponse(e.data.tx), o.close();
                    }
                });
        }

        const handlePaymentResponse = () => {
            // $('#payment-btn').attr('disabled', 'disabled').text("Processing...");
            $.ajax({
                url:'{{ route('fundWalletAction') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
                data : {
                    amount : $('#amount').val()
                },
                success: function(data){
                    $('#response').append(`<p class="text-success">${data.message}</p>`)
                    $('#amount').val("");
                },
                error: function(data){
                    $('#response').append(`<p class="text-warning">${data.message}</p>`)
                }
            })
        }
    });
</script>
@endsection
