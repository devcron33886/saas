@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.plan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.plan.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.plan.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="1" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stripe_identifier">{{ trans('cruds.plan.fields.stripe_identifier') }}</label>
                <input class="form-control {{ $errors->has('stripe_identifier') ? 'is-invalid' : '' }}" type="text" name="stripe_identifier" id="stripe_identifier" value="{{ old('stripe_identifier', '') }}" required>
                @if($errors->has('stripe_identifier'))
                    <span class="text-danger">{{ $errors->first('stripe_identifier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.stripe_identifier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="billing_period">{{ trans('cruds.plan.fields.billing_period') }}</label>
                <input class="form-control {{ $errors->has('billing_period') ? 'is-invalid' : '' }}" type="text" name="billing_period" id="billing_period" value="{{ old('billing_period', '') }}" required>
                @if($errors->has('billing_period'))
                    <span class="text-danger">{{ $errors->first('billing_period') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.billing_period_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" required {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="status">{{ trans('cruds.plan.fields.status') }}</label>
                </div>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
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



@endsection