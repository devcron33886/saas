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
                <div class="alert alert-warning alert-dismissible">You are on free plan please upgrade</div>
                <div class="row">
                    @forelse($plans as $plan)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">{{ $plan->name }}</h4>
                                    {{ $plan->price }}
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-info">Subscribe</a>
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
