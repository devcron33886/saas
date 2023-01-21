@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Account Settings
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">

                <div class="row">
                    <a href="{{ route('account.add-payment-method') }}" class="btn btn-indigo align-right">Add Payment
                        Method</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">My Payment</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Expires At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paymentMethods as $payment)
                                <tr>
                                    <td>{{ $payment->card->brand }}</td>
                                    <td>{{ $payment->card->exp_month }}/{{ $payment->card->exp_year }}</td>
                                    <td>
                                        @if($defaultPaymentMethod->id ==$payment->id)
                                            <span class="badge badge-primary">Default</span>
                                        @else
                                            <a href="{{ route('account.mark-default',$payment->id) }}" >make default</a>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
@endsection
