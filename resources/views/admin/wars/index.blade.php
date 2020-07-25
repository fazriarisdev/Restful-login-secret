@extends('layouts.admin')
@section('content')
@can('war_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.wars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.war.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.war.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-War">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.war.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.sales') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.project_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.project_segment') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.model') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.value_project') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.timeline') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.account_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.company_name_partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.pic_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.war.fields.update') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\War::SALES_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\War::PROJECT_SEGMENT_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\War::STATUS_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\War::ACCOUNT_TYPE_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($wars as $key => $war)
                        <tr data-entry-id="{{ $war->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $war->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\War::SALES_SELECT[$war->sales] ?? '' }}
                            </td>
                            <td>
                                {{ $war->project_name ?? '' }}
                            </td>
                            <td>
                                {{ $war->city ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\War::PROJECT_SEGMENT_SELECT[$war->project_segment] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\War::STATUS_SELECT[$war->status] ?? '' }}
                            </td>
                            <td>
                                {{ $war->model ?? '' }}
                            </td>
                            <td>
                                {{ $war->value_project ?? '' }}
                            </td>
                            <td>
                                {{ $war->timeline ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\War::ACCOUNT_TYPE_SELECT[$war->account_type] ?? '' }}
                            </td>
                            <td>
                                {{ $war->company_name_partner ?? '' }}
                            </td>
                            <td>
                                {{ $war->pic_name ?? '' }}
                            </td>
                            <td>
                                {{ $war->update ?? '' }}
                            </td>
                            <td>
                                @can('war_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.wars.show', $war->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('war_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.wars.edit', $war->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('war_delete')
                                    <form action="{{ route('admin.wars.destroy', $war->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('war_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.wars.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-War:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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