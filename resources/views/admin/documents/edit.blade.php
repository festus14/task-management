@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.document.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.documents.update", [$document->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.document.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($document) ? $document->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.document.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('version') ? 'has-error' : '' }}">
                <label for="version">{{ trans('cruds.document.fields.version') }}</label>
                <input type="text" id="version" name="version" class="form-control" value="{{ old('version', isset($document) ? $document->version : '') }}">
                @if($errors->has('version'))
                    <p class="help-block">
                        {{ $errors->first('version') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.document.fields.version_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                <label for="file">{{ trans('cruds.document.fields.file') }}</label>
                <div class="needsclick dropzone" id="file-dropzone">

                </div>
                @if($errors->has('file'))
                    <p class="help-block">
                        {{ $errors->first('file') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.document.fields.file_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.document.fields.client') }}</label>
                <select name="client_id" id="client" class="form-control select2">
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($document) && $document->client ? $document->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.document.fields.project') }}</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($document) && $document->project ? $document->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedFileMap = {}
Dropzone.options.fileDropzone = {
    url: '{{ route('admin.documents.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
      uploadedFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileMap[file.name]
      }
      $('form').find('input[name="file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($document) && $document->file)
          var files =
            {!! json_encode($document->file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop