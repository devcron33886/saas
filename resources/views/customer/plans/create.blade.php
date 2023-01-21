@extends('layouts.customers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.plan.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("customers.plans.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.plan.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.plan.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.plan.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="1" required>
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.plan.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="stripe_identifier">{{ trans('cruds.plan.fields.stripe_identifier') }}</label>
                            <input class="form-control" type="text" name="stripe_identifier" id="stripe_identifier" value="{{ old('stripe_identifier', '') }}" required>
                            @if($errors->has('stripe_identifier'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stripe_identifier') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.plan.fields.stripe_identifier_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="billing_period">{{ trans('cruds.plan.fields.billing_period') }}</label>
                            <input class="form-control" type="text" name="billing_period" id="billing_period" value="{{ old('billing_period', '') }}" required>
                            @if($errors->has('billing_period'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('billing_period') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.plan.fields.billing_period_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="checkbox" name="status" id="status" value="1" required {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                                <label class="required" for="status">{{ trans('cruds.plan.fields.status') }}</label>
                            </div>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.plan.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
