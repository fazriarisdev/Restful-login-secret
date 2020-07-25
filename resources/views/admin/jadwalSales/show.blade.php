@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jadwalSale.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jadwal-sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.id') }}
                        </th>
                        <td>
                            {{ $jadwalSale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.name_partner') }}
                        </th>
                        <td>
                            {{ $jadwalSale->name_partner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.name_end_user') }}
                        </th>
                        <td>
                            {{ $jadwalSale->name_end_user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.date') }}
                        </th>
                        <td>
                            {{ $jadwalSale->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.time') }}
                        </th>
                        <td>
                            {{ $jadwalSale->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.agenda') }}
                        </th>
                        <td>
                            {{ $jadwalSale->agenda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.province') }}
                        </th>
                        <td>
                            {{ App\Models\JadwalSale::PROVINCE_SELECT[$jadwalSale->province] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.address') }}
                        </th>
                        <td>
                            {{ $jadwalSale->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.meeting_result') }}
                        </th>
                        <td>
                            {!! $jadwalSale->meeting_result !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwalSale.fields.presales_requirement') }}
                        </th>
                        <td>
                            {{ App\Models\JadwalSale::PRESALES_REQUIREMENT_SELECT[$jadwalSale->presales_requirement] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jadwal-sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection