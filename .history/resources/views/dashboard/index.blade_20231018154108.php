@extends('layout.app')

@section('title')
    Dashboard
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
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
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
            <div class="col-xl-12">
                <div class="overview-content-box-two">
                    <div class="inner-title my-2">
                        <a href="{{ route('transactions') }}"><h5 class="text-success">Credit Transactions</h5></a>
                    </div>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Balance Before</th>
                                <th>Balance After</th>
                                <th>Remark</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data['creditTransactions'] as $transaction)
                                <tr>
                                    <th>{!! formatAmount($transaction->amount) !!}</th>
                                    <th>{!! formatAmount($transaction->balance_before) !!}</th>
                                    <th>{!! formatAmount($transaction->balance_after) !!}</th>
                                    <th>{!! $transaction->remark !!}</th>
                                    <th>{{ formatDate($transaction->created_at) }}</th>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">You have not made any credit transaction</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if (count($data['creditTransactions']) == 5)
                    <a href="{{ route('transactions') }}" class="d-flex justify-content-end">View more</a>
                @endif
            </div>


            <div class="col-xl-12 my-5">
                <div class="overview-content-box-two">
                    <div class="inner-title my-2">
                        <a href="{{ route('transactions') }}"><h5>Debit Transactions</h5></a>
                    </div>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Balance Before</th>
                                <th>Balance After</th>
                                <th>Remark</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data['debitTransactions'] as $transaction)
                                <tr>
                                    <th>{!! formatAmount($transaction->amount) !!}</th>
                                    <th>{!! formatAmount($transaction->balance_before) !!}</th>
                                    <th>{!! formatAmount($transaction->balance_after) !!}</th>
                                    <th>{!! $transaction->remark !!}</th>
                                    <th>{{ formatDate($transaction->created_at) }}</th>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">You have not made any debit transaction</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if (count($data['creditTransactions']) == 5)
                    <a href="{{ route('transactions') }}" class="d-flex justify-content-end">View more</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
