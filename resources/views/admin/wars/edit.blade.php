@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.war.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.wars.update", [$war->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.war.fields.sales') }}</label>
                <select class="form-control {{ $errors->has('sales') ? 'is-invalid' : '' }}" name="sales" id="sales">
                    <option value disabled {{ old('sales', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\War::SALES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sales', $war->sales) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sales'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sales') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.sales_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_name">{{ trans('cruds.war.fields.project_name') }}</label>
                <input class="form-control {{ $errors->has('project_name') ? 'is-invalid' : '' }}" type="text" name="project_name" id="project_name" value="{{ old('project_name', $war->project_name) }}">
                @if($errors->has('project_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.war.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $war->city) }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.war.fields.project_segment') }}</label>
                <select class="form-control {{ $errors->has('project_segment') ? 'is-invalid' : '' }}" name="project_segment" id="project_segment">
                    <option value disabled {{ old('project_segment', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\War::PROJECT_SEGMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('project_segment', $war->project_segment) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_segment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_segment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.project_segment_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.war.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\War::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $war->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.war.fields.model') }}</label>
                <textarea class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" name="model" id="model">{{ old('model', $war->model) }}</textarea>
                @if($errors->has('model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value_project">{{ trans('cruds.war.fields.value_project') }}</label>
                <input class="form-control {{ $errors->has('value_project') ? 'is-invalid' : '' }}" type="number" name="value_project" id="value_project" value="{{ old('value_project', $war->value_project) }}" step="1">
                @if($errors->has('value_project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value_project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.value_project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="timeline">{{ trans('cruds.war.fields.timeline') }}</label>
                <input class="form-control date {{ $errors->has('timeline') ? 'is-invalid' : '' }}" type="text" name="timeline" id="timeline" value="{{ old('timeline', $war->timeline) }}" required>
                @if($errors->has('timeline'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timeline') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.timeline_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.war.fields.account_type') }}</label>
                <select class="form-control {{ $errors->has('account_type') ? 'is-invalid' : '' }}" name="account_type" id="account_type">
                    <option value disabled {{ old('account_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\War::ACCOUNT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_type', $war->account_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.account_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company_name_partner">{{ trans('cruds.war.fields.company_name_partner') }}</label>
                <input class="form-control {{ $errors->has('company_name_partner') ? 'is-invalid' : '' }}" type="text" name="company_name_partner" id="company_name_partner" value="{{ old('company_name_partner', $war->company_name_partner) }}">
                @if($errors->has('company_name_partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name_partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.company_name_partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pic_name">{{ trans('cruds.war.fields.pic_name') }}</label>
                <input class="form-control {{ $errors->has('pic_name') ? 'is-invalid' : '' }}" type="text" name="pic_name" id="pic_name" value="{{ old('pic_name', $war->pic_name) }}">
                @if($errors->has('pic_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pic_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.pic_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="update">{{ trans('cruds.war.fields.update') }}</label>
                <input class="form-control {{ $errors->has('update') ? 'is-invalid' : '' }}" type="text" name="update" id="update" value="{{ old('update', $war->update) }}">
                @if($errors->has('update'))
                    <div class="invalid-feedback">
                        {{ $errors->first('update') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.war.fields.update_helper') }}</span>
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