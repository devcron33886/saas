@extends('layouts.customers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("customers.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="customer_id">{{ trans('cruds.invoice.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" required>
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $invoice->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="invoice_number">{{ trans('cruds.invoice.fields.invoice_number') }}</label>
                            <input class="form-control" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $invoice->invoice_number) }}">
                            @if($errors->has('invoice_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('invoice_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.invoice_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                            <input class="form-control date" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
                            @if($errors->has('invoice_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('invoice_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="due_date">{{ trans('cruds.invoice.fields.due_date') }}</label>
                            <input class="form-control date" type="text" name="due_date" id="due_date" value="{{ old('due_date', $invoice->due_date) }}">
                            @if($errors->has('due_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.due_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="subtotal">{{ trans('cruds.invoice.fields.subtotal') }}</label>
                            <input class="form-control" type="number" name="subtotal" id="subtotal" value="{{ old('subtotal', $invoice->subtotal) }}" step="1" required>
                            @if($errors->has('subtotal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subtotal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.subtotal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tax">{{ trans('cruds.invoice.fields.tax') }}</label>
                            <input class="form-control" type="number" name="tax" id="tax" value="{{ old('tax', $invoice->tax) }}" step="1">
                            @if($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.tax_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="total">{{ trans('cruds.invoice.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', $invoice->total) }}" step="1" required>
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.invoice.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes', $invoice->notes) }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.invoice.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Invoice::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $invoice->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.status_helper') }}</span>
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
