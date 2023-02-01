@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Account
                        </div>
                        <h2 class="page-title">
                            Plans
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                @if(!auth()->user()->subscription('default'))
                    <div class="alert alert-warning alert-dismissible">You are on free plan please upgrade</div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="row">
                    @forelse($plans as $plan)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">{{ $plan->name }}</h4>
                                    ${{ number_format($plan->price/100) }}
                                </div>
                                <div class="card-footer">
                                    @if(auth()->user()->subscribedToPrice($plan->stripe_identifier,'default'))
                                        @if(!auth()->user()->subscription('default')->onGracePeriod())
                                            <a href="{{ route('plan.cancel') }}" class="btn btn-danger"
                                               onclick="return confirm('Are you sure ?')">
                                                Cancel Your Current plan
                                            </a>
                                        @else
                                            <div class="row">
                                                <div class="col-12">
                                                    Your subscription will end at {{ auth()->user()->subscription('default')->ends_at }}
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <a href="{{ route('plan.resume') }}" class="btn btn-info">
                                                        Resume plan
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <a href="{{ route('account.check-out',$plan->slug) }}" class="btn btn-info">Subscribe</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning">
                            There are no available plans.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
