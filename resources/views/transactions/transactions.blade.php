@extends('layout.app')

@section('title')
    Transactions
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
                        <h2>Transactions</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="#">Transactions</a></li>
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
        </div>
        <div class="row container">
            <div class="col-xl-12">
                <div class="overview-content-box-two">
                    <table class="table table-striped" id="myTable">
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
                            @forelse ($transactions as $transaction)
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
            </div>
        </div>
    </div>
</section>
@endsection


@section('extra-scripts')
<script>
    let table = new DataTable('#myTable');
</script>
@endsection
