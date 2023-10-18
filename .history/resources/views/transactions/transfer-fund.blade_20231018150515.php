@extends('layout.app')

@section('title')
    Transfer Fund
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
                        <h2>Transfer Fund</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="active">Transfer Fund</li>
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
            <h2>Transfer funds</h2>
            <div class="sub-title">
                <p>Please select the bank details and enter the amount you want to transfer.</p>
            </div>
        </div>
        <div class="row container">
            <div class="col-md-3">
            </div>

            <div class="col-md-6">
                <div class="contact-form" style="background-color: #f5f8f7;">
                    <form class="default-form2" id="transferForm" method="post">
                        @csrf

                        <div id="response">
                        </div>
                        <div id="accountArea">
                            <div class="form-group">
                                <label>Bank</label>
                                <div class="input-box">
                                    <select required name="bank_code" id="bankCode">
                                        @forelse ($banks as $bank)
                                            <option value="{{ $bank->code }}">{{ $bank->name }}</option>
                                        @empty
                                            <option disabled>No banks available at the moment</option>
                                        @endforelse
                                    </select>
                                    {!!  requestError($errors,'amount')  !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Account number</label>
                                <div class="input-box">
                                    <input type="number" required value="{{ old('account_number') }}" name="account_number" id="accountNumber" placeholder="2000" >
                                    {!!  requestError($errors,'account_number')  !!}
                                </div>
                                <small class="text-bold" id="accountName"></small>
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label>Amount</label>
                                    <small>Balance: <strong>{!! formatAmount(auth()->user()->wallet?->balance) !!}</strong></small>
                                </div>
                                <div class="input-box">
                                    <input type="number" min="100" required value="{{ old('amount') }}" name="amount" id="amount" placeholder="2000" >
                                    {!!  requestError($errors,'amount')  !!}

                                    <small class="text-bold" id="balanceVerify"></small>
                                </div>

                                <input type="hidden" id="email" value="{{ auth()->user()->email }}">
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button type="button" class="btn-one" id="btnNext">
                                    <span class="txt">
                                        Next
                                    </span>
                                </button>
                            </div>
                        </div>

                        {{-- style="display: none" --}}
                        <div id="securityArea" >
                            <div class="form-group">
                                <label>Enter OTP sent to your email address</label>
                                <div class="input-box">
                                    <input type="text" required value="{{ old('otp') }}" name="otp" id="otp" placeholder="2000" >
                                    {!!  requestError($errors,'otp')  !!}
                                </div>
                                <small class="text-bold" id="otpResponse"></small>
                            </div>



                            <div class="form-group">
                                <label>{{ auth()->user()->question->question }}?</label>
                                <div class="input-box">
                                    <input type="text" id='answer' required value="{{ old('answer') }}" name="answer" placeholder="2000" >
                                    {!!  requestError($errors,'answer')  !!}
                                </div>
                                <small class="text-bold" id="answerResponse"></small>
                            </div>


                            <div class="button-box">

                                <button type="button" class="btn-one" id="btnBack">
                                    <span class="txt">
                                        Back
                                    </span>
                                </button>
                                <button class="btn-one" id="payment-btn" data-loading-text="Please wait...">
                                    <span class="txt">
                                        Transfer Fund
                                    </span>
                                </button>
                            </div>
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
    // $('#securityArea').hide()
    $('#accountNumber').change(() =>{
        resolveAccount()
    })

    $('#bankCode').change(() =>{
        if ($('#accountNumber').val() != "") {
            resolveAccount()
        }
    })

    var isAccountValid = false
    var isBalanceEnough = false
    var transferOtp = 0;

    const resolveAccount = () => {
        isAccountValid = false
        $('#accountName').text('Verifying account...')
        $.ajax({
            'async': false,
            url:'{{ route('resolveAccount') }}',
            type: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                account_number : $('#accountNumber').val(),
                bank_code : $('#bankCode').val()
            },
            success: function(data){
                if (data.status) {
                    $('#accountName').text(data.data)
                    $('#accountName').removeClass('text-danger')
                    $('#accountName').addClass('text-success')
                    isAccountValid = true
                }
                else{
                    $('#accountName').text(data.message)
                    $('#accountName').removeClass('text-success')
                    $('#accountName').addClass('text-danger')
                    isAccountValid = false
                }
            },
            error: function(err){
                $('#accountName').text(`${err.responseJSON.message}`)
                isAccountValid = false
            }
        })
    }

    const verifyAccountBalance = () => {
        isBalanceEnough = false
        $.ajax({
            'async': false,
            url:'{{ route('verifyAccountBalance') }}',
            type: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                amount : $('#amount').val()
            },
            success: function(data){
                console.log('data', data)
                if (data.status) {
                    isBalanceEnough = true
                }
                else{
                    $('#balanceVerify').text(data.message)
                    // $('#balanceVerify').removeClass('text-success')
                    $('#balanceVerify').addClass('text-danger')
                    isBalanceEnough = false
                }
            },
            error: function(err){
                isBalanceEnough = false
            }
        })
    }

    $('#transferForm').submit((e) =>{
        e.preventDefault();

        if (transferOtp != $('#otp').val()) {
            // otpResponse
            console.log('first', $('#otp').val())
            $('#otpResponse').html(`<p class="text-success">Invalid transfer OTP</p>`)
            return
        }

        if (!(isAccountValid && isBalanceEnough)) {
            return false
        }

        $('#payment-btn').attr('disabled', 'disabled').text("Processing...");

        $.ajax({
            url:'{{ route('transferAction') }}',
            type: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                account_number : $('#accountNumber').val(),
                bank_code : $('#bankCode').val(),
                amount: $('#amount').val(),
                account_name: $('#accountName').text(),
            },
            success: function(data){
                console.log('data', data)
                $('#response').html(`<p class="text-success">${data.message}</p>`)
                $('#amount').val("");
                $('#accountNumber').val("")
                $('#otp').val("")
                $('#answer').val("")
            },
            error: function(err){
                $('#response').html(`<p class="text-success">${err.responseJSON.message}</p>`)
            },
            complete: function(data) {
                $('#payment-btn').attr('disabled', 'false').text("Transfer Fund");
            }
        })

    })

    $('#btnBack').click(function(){
        $('#securityArea').hide()
        $('#accountArea').fadeIn()
    })


    $('#btnNext').click(function(){

        verifyAccountBalance();
        if (isAccountValid && isBalanceEnough) {
            sendTransferOtp()
            $('#accountArea').hide()
            $('#securityArea').fadeIn()
        }
    })

    const sendTransferOtp = () => {
        $.ajax({
            'async': false,
            url:'{{ route('sendTransferOtp') }}',
            type: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {},
            success: function(data){
                console.log('data', data)
                if (data.status) {
                    transferOtp = data.data
                }
                else{
                    console.log('"first"', "first")
                }
            },
            error: function(err){
                isBalanceEnough = false
            }
        })
    }
</script>
@endsection
