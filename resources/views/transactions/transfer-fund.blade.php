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
                    <form class="default-form2" id="transferForm"  method="post">
                        @csrf
                        <div id="response">
                            @if (session('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                            @endif
                        </div>

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
                                <input type="number" onchange="resolveAccount" minlength="10" required value="{{ old('account_number') }}" name="account_number" id="accountNumber" placeholder="2000" >
                                {!!  requestError($errors,'account_number')  !!}
                            </div>
                            <small class="text-bold" id="accountName"></small>
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
                                    Transfer Fund
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

    $('#accountNumber').change(function(){
        resolveAccount();
    })

    const resolveAccount = () => {
        $('#accountName').text('')
        $('#accountName').hide()
        $.ajax({
            url:'{{ route('resolveAccount') }}',
            type: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
            data : {
                account_number : $('#accountNumber').val(),
                bank_code : $('#bankCode').val()
            },
            success: function(data){
                if (data.status) {
                    $('#accountName').text(data.data)
                    $('#accountName').addClass('text-success')
                }
                else{
                    $('#accountName').text(data.message)
                    $('#accountName').addClass('text-danger')
                }

                $('#accountName').show()
            },
            error: function(err){
                $('#accountName').text(`${err.responseJSON.message}`)
                $('#accountName').show()
            }
        })
    }

</script>
@endsection
