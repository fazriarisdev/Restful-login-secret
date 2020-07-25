@extends('layouts.admin')
@section('content')
@can('jadwal_sale_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jadwal-sales.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jadwalSale.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jadwalSale.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JadwalSale">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.name_partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.name_end_user') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.time') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.agenda') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.province') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.presales_requirement') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\JadwalSale::PROVINCE_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\JadwalSale::PRESALES_REQUIREMENT_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalSales as $key => $jadwalSale)
                        <tr data-entry-id="{{ $jadwalSale->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jadwalSale->id ?? '' }}
                            </td>
                            <td>
                                {{ $jadwalSale->name_partner ?? '' }}
                            </td>
                            <td>
                                {{ $jadwalSale->name_end_user ?? '' }}
                            </td>
                            <td>
                                {{ $jadwalSale->date ?? '' }}
                            </td>
                            <td>
                                {{ $jadwalSale->time ?? '' }}
                            </td>
                            <td>
                                {{ $jadwalSale->agenda ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\JadwalSale::PROVINCE_SELECT[$jadwalSale->province] ?? '' }}
                            </td>
                            <td>
                                {{ $jadwalSale->address ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\JadwalSale::PRESALES_REQUIREMENT_SELECT[$jadwalSale->presales_requirement] ?? '' }}
                            </td>
                            <td>
                                @can('jadwal_sale_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jadwal-sales.show', $jadwalSale->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('jadwal_sale_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jadwal-sales.edit', $jadwalSale->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('jadwal_sale_delete')
                                    <form action="{{ route('admin.jadwal-sales.destroy', $jadwalSale->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('jadwal_sale_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jadwal-sales.massDestroy') }}",
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
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-JadwalSale:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection