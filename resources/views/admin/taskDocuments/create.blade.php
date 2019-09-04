@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.taskDocument.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.task-documents.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.taskDocument.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2" required>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($taskDocument) && $taskDocument->project ? $taskDocument->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('task_id') ? 'has-error' : '' }}">
                <label for="task">{{ trans('cruds.taskDocument.fields.task') }}*</label>
                <select name="task_id" id="task" class="form-control select2" required>
                    @foreach($tasks as $id => $task)
                        <option value="{{ $id }}" {{ (isset($taskDocument) && $taskDocument->task ? $taskDocument->task->id : old('task_id')) == $id ? 'selected' : '' }}>{{ $task }}</option>
                    @endforeach
                </select>
                @if($errors->has('task_id'))
                    <p class="help-block">
                        {{ $errors->first('task_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.taskDocument.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($taskDocument) && $taskDocument->client ? $taskDocument->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.taskDocument.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($taskDocument) ? $taskDocument->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.taskDocument.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('document_type') ? 'has-error' : '' }}">
                <label for="document_type">{{ trans('cruds.taskDocument.fields.document_type') }}*</label>
                <select id="document_type" name="document_type" class="form-control" required>
                    <option value="" disabled {{ old('document_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\TaskDocument::DOCUMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('document_type', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('document_type'))
                    <p class="help-block">
                        {{ $errors->first('document_type') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
                <label for="document">{{ trans('cruds.taskDocument.fields.document') }}*</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
                @if($errors->has('document'))
                    <p class="help-block">
                        {{ $errors->first('document') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.taskDocument.fields.document_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                <label for="comment">{{ trans('cruds.taskDocument.fields.comment') }}</label>
                <textarea id="comment" name="comment" class="form-control ckeditor">{{ old('comment', isset($taskDocument) ? $taskDocument->comment : '') }}</textarea>
                @if($errors->has('comment'))
                    <p class="help-block">
                        {{ $errors->first('comment') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.taskDocument.fields.comment_helper') }}
                </p>
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
    Dropzone.options.documentDropzone = {
    url: '{{ route('admin.task-documents.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="document"]').remove()
      $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="document"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
        @if(isset($taskDocument) && $taskDocument->document)
          var file = {!! json_encode($taskDocument->document) !!}
              this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
          this.options.maxFiles = this.options.maxFiles - 1

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
