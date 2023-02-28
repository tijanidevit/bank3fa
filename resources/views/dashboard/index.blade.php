@extends('layout.app')

@section('title')
    Verify OTP
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
                        <h2>{!! formatAmount($data['wallet']->balance) !!}</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="Dashboard">Home</a></li>
                            {{-- <li class="active">Salary Account</li> --}}
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
            <h2>Previous Transactions</h2>
            <div class="sub-title">
                <p>Previous credit and debit transactions.</p>
            </div>
        </div>
        <div class="row container">
            <div class="col-xl-6">
                <div class="overview-content-box-two">
                    <div class="inner-title my-2">
                        <h5>Credit Transactions</h5>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>Sender</th>
                            <th>Amount</th>
                            <th>Balance Before</th>
                            <th>Balance After</th>
                            <th>Date</th>
                        </tr>
                    </table>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection
