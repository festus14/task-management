@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projectReport.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.project-reports.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('project_report') ? 'has-error' : '' }}">
                <label for="project_report">{{ trans('cruds.projectReport.fields.project_report') }}</label>
                <textarea id="project_report" name="project_report" class="form-control ckeditor">{{ old('project_report', isset($projectReport) ? $projectReport->project_report : '') }}</textarea>
                @if($errors->has('project_report'))
                    <p class="help-block">
                        {{ $errors->first('project_report') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projectReport.fields.project_report_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('uploads') ? 'has-error' : '' }}">
                <label for="uploads">{{ trans('cruds.projectReport.fields.uploads') }}</label>
                <div class="needsclick dropzone" id="uploads-dropzone">

                </div>
                @if($errors->has('uploads'))
                    <p class="help-block">
                        {{ $errors->first('uploads') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projectReport.fields.uploads_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.projectReport.fields.project') }}</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($projectReport) && $projectReport->project ? $projectReport->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.projectReport.fields.client') }}</label>
                <select name="client_id" id="client" class="form-control select2">
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($projectReport) && $projectReport->client ? $projectReport->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
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
    Dropzone.options.uploadsDropzone = {
    url: '{{ route('admin.project-reports.storeMedia') }}',
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
      $('form').find('input[name="uploads"]').remove()
      $('form').append('<input type="hidden" name="uploads" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="uploads"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($projectReport) && $projectReport->uploads)
      var file = {!! json_encode($projectReport->uploads) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="uploads" value="' + file.file_name + '">')
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