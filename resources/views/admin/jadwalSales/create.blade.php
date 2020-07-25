@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jadwalSale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jadwal-sales.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name_partner">{{ trans('cruds.jadwalSale.fields.name_partner') }}</label>
                <input class="form-control {{ $errors->has('name_partner') ? 'is-invalid' : '' }}" type="text" name="name_partner" id="name_partner" value="{{ old('name_partner', '') }}" required>
                @if($errors->has('name_partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.name_partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_end_user">{{ trans('cruds.jadwalSale.fields.name_end_user') }}</label>
                <input class="form-control {{ $errors->has('name_end_user') ? 'is-invalid' : '' }}" type="text" name="name_end_user" id="name_end_user" value="{{ old('name_end_user', '') }}" required>
                @if($errors->has('name_end_user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_end_user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.name_end_user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.jadwalSale.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.jadwalSale.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agenda">{{ trans('cruds.jadwalSale.fields.agenda') }}</label>
                <input class="form-control {{ $errors->has('agenda') ? 'is-invalid' : '' }}" type="text" name="agenda" id="agenda" value="{{ old('agenda', '') }}" required>
                @if($errors->has('agenda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agenda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.agenda_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.jadwalSale.fields.province') }}</label>
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province" required>
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\JadwalSale::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <div class="invalid-feedback">
                        {{ $errors->first('province') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.jadwalSale.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meeting_result">{{ trans('cruds.jadwalSale.fields.meeting_result') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('meeting_result') ? 'is-invalid' : '' }}" name="meeting_result" id="meeting_result">{!! old('meeting_result') !!}</textarea>
                @if($errors->has('meeting_result'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meeting_result') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.meeting_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.jadwalSale.fields.presales_requirement') }}</label>
                <select class="form-control {{ $errors->has('presales_requirement') ? 'is-invalid' : '' }}" name="presales_requirement" id="presales_requirement">
                    <option value disabled {{ old('presales_requirement', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\JadwalSale::PRESALES_REQUIREMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('presales_requirement', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('presales_requirement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('presales_requirement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwalSale.fields.presales_requirement_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/jadwal-sales/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $jadwalSale->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection