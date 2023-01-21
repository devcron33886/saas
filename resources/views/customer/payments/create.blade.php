@extends('layouts.customers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("customers.payments.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="stripe">{{ trans('cruds.payment.fields.stripe') }}</label>
                            <input class="form-control" type="text" name="stripe" id="stripe" value="{{ old('stripe', '') }}" required>
                            @if($errors->has('stripe'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stripe') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.stripe_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="subtotal">{{ trans('cruds.payment.fields.subtotal') }}</label>
                            <input class="form-control" type="number" name="subtotal" id="subtotal" value="{{ old('subtotal', '') }}" step="1" required>
                            @if($errors->has('subtotal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subtotal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.subtotal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tax">{{ trans('cruds.payment.fields.tax') }}</label>
                            <input class="form-control" type="number" name="tax" id="tax" value="{{ old('tax', '0') }}" step="1" required>
                            @if($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.tax_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="total">{{ trans('cruds.payment.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', '') }}" step="1" required>
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.total_helper') }}</span>
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
