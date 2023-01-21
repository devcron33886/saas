@extends('layouts.customers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('customer_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('customers.customers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.customer.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.customer.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Customer">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customer.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.website') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.country') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.state') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.address') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $key => $customer)
                                    <tr data-entry-id="{{ $customer->id }}">
                                        <td>
                                            {{ $customer->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->company ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->website ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->country ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->state ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->address ?? '' }}
                                        </td>
                                        <td>

                                            @can('customer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('customers.customers.edit', $customer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('customer_delete')
                                                <form action="{{ route('customers.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('customer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('customers.customers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Customer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
