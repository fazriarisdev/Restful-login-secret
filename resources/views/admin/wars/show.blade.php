@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.war.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.wars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.id') }}
                        </th>
                        <td>
                            {{ $war->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.sales') }}
                        </th>
                        <td>
                            {{ App\Models\War::SALES_SELECT[$war->sales] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.project_name') }}
                        </th>
                        <td>
                            {{ $war->project_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.city') }}
                        </th>
                        <td>
                            {{ $war->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.project_segment') }}
                        </th>
                        <td>
                            {{ App\Models\War::PROJECT_SEGMENT_SELECT[$war->project_segment] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\War::STATUS_SELECT[$war->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.model') }}
                        </th>
                        <td>
                            {{ $war->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.value_project') }}
                        </th>
                        <td>
                            {{ $war->value_project }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.timeline') }}
                        </th>
                        <td>
                            {{ $war->timeline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.account_type') }}
                        </th>
                        <td>
                            {{ App\Models\War::ACCOUNT_TYPE_SELECT[$war->account_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.company_name_partner') }}
                        </th>
                        <td>
                            {{ $war->company_name_partner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.pic_name') }}
                        </th>
                        <td>
                            {{ $war->pic_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.war.fields.update') }}
                        </th>
                        <td>
                            {{ $war->update }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.wars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection