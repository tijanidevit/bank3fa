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
                    <form class="default-form2" id="paymentForm"  method="post">
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

                            <input type="hidden" id="email" value="{{ auth()->user()->email }}">
                        </div>

                        <div class="button-box">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">

                            <button class="btn-one" id="payment-bt" data-loading-text="Please wait...">
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

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
    e.preventDefault();

    let handler = PaystackPop.setup({
        key: "{{ config('services.paystack.test_key') }}", // Replace with your public key
        email: "{{ auth()->user()->email }}",
        amount: document.getElementById("amount").value * 100,
        ref: 'FB'+Math.floor((Math.random() * 1000000000) + 1),
        // label: "Optional string that replaces customer email"
        onClose: function(){
        alert('Window closed.');
        },
        callback: function(response){
        // let message = 'Payment complete! Reference: ' + response.reference;
        // alert(message);
        handlePaymentResponse();
        }
    });

    handler.openIframe();

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
                    console.log('data', data)
                    $('#response').append(`<p class="text-success">${data.message}</p>`)
                    $('#amount').val("");
                },
                error: function(data){
                    $('#response').append(`<p class="text-warning">${data.message}</p>`)
                }
            })
        }
</script>
@endsection
