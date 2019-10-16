@extends('layouts.inner')

@section('title', 'Project')
@section('css')
<style>
#filedrag {
        display: none;
        font-weight: bold;
        text-align: center;
        padding: 1em 0;
        margin: 1em 0;
        color: #555;
        border: 2px dashed #555;
        border-radius: 7px;
        cursor: default;
    }

    #filedrag.hover {
        color: #f00;
        border-color: #f00;
        border-style: solid;
        box-shadow: inset 0 3px 4px #888;
    }
    </style>
@endsection
@section('header', 'Project Management')

@section('sub_header', 'Project Report')

@section('content')

    {{-- <div class="container">
            <div class="col-md-12 ">
                <form>
                    <div class="row">
                            <div class="col-md-6 form-group mt-3">
                                <label>Client</label>
                                <select id="client-list" class="selectDesign form-control"></select>
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                    <label>Project</label>
                                    <select id="client-list" class="selectDesign form-control"></select>
                            </div>
                    </div>
                    <div class=" row col-md-12">
                            <div class="col-md-12 form-group mt-3">
                                    <label for="exampleFormControlTextarea1">Project Report</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                    </div>
                    <div class=" row col-md-12">
                                    <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
                                    <fieldset class="col-md-12 form-group mt-3">
                                                    <legend>Upload File</legend>

                                                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                                                    <div>
                                                        <label for="fileselect">Files to upload:</label>
                                                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                                        <div id="filedrag">or drop files here</div>
                                                    </div>

                                                    <div id="submitbutton">
                                                        <button type="submit">Upload Files</button>
                                                    </div>
                                        <div id="messages">

                                                </div>
                                                </fieldset>

                                    </form>

                    </div>
                    <div class="row col-md-12">
                                    <div class="col-md-2 form-group mt-3">
                            <button class="btn btn-block" style="background-color:#8a2a2b; color:white;">Submit</button>
                                    </div>
                    </div>
                    </div>
                </form>
            </div>
    </div> --}}

    {{-- Project Document Form --}}
    {{-- <form action="{{ url('admin/documents/store') }}" id="createDocForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="form-group col-sm-6 col-md-6">
                <label for="document-name">Document Name</label>
                <input type="text" class="form-control" id="document-name" name="name">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.document.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group col-sm-6 col-md-6">
                <label for="version">Version</label>
                <input type="text" class="form-control" id="version" placeholder="Enter Version" name="version">
                @if($errors->has('version'))
                    <p class="help-block">
                        {{ $errors->first('version') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.document.fields.version_helper') }}
                </p>
            </div>

        </div>

        <div class="row">

            <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }} col-sm-12 col-md-12">
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

        </div>

        <div class="row">
            <div class="col-md-3 form-group">
                <input class="btn btn-block center-block" type="submit" id="pro_doc_submit" value="{{ trans('global.save') }}" style="background-color:#8a2a2b; color:white;">
            </div>
            <div class="form-group col-md-3">
                <input id="project-list" name="project_id" value="2" type="hidden">
            </div>
            <div class="form-group col-sm-3 col-md-3">
                <input id="client-list" name="client_id" value="4" type="hidden">
            </div>
        </div>
    </form> --}}

    <form id="addProjectReportForm" action="{{ url('admin/project-reports') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group {{ $errors->has('project_report') ? 'has-error' : '' }} col-md-12">
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
        </div>
        <div class="row">
            <div class="form-group {{ $errors->has('uploads') ? 'has-error' : '' }} col-md-12">
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
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="hidden" value="4" name="client_id" id="client" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <input type="hidden" value="2" name="project_id" id="project" class="form-control">
            </div>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>


@endsection

@section('javascript')

    <script>
        // Function for implementing dropezone for project report
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
            $('#addProjectReportForm').find('input[name="uploads"]').remove()
            $('#addProjectReportForm').append('<input type="hidden" name="uploads" value="' + response.name + '">')
            },
            removedfile: function (file) {
            file.previewElement.remove()
            $('#addProjectReportForm').find('input[name="uploads"]').remove()
            this.options.maxFiles = this.options.maxFiles + 1
            },
            init: function () {
        @if(isset($projectReport) && $projectReport->uploads)
            var file = {!! json_encode($projectReport->uploads) !!}
                this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('#addProjectReportForm').append('<input type="hidden" name="uploads" value="' + file.file_name + '">')
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

    {{-- Script for project document form --}}
    {{-- <script>
        // Function for implementing dropezone for create document
        var uploadedFileMap = {}
        Dropzone.options.fileDropzone = {
            url: "{{ url('admin/documents/storeMedia') }}",
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
            size: 10
            },
            success: function (file, response) {
            $('#createDocForm').append('<input type="hidden" name="file[]" value="' + response.name + '">')
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
            $('#createDocForm').find('input[name="file[]"][value="' + name + '"]').remove()
            },
            init: function () {
        @if(isset($document) && $document->file)
                var files =
                    {!! json_encode($document->file) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('#createDocForm').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
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

    </script> --}}
    {{-- <script>
    // getElementById
        function $id(id) {
            return document.getElementById(id);
        }

        //
        // output information
        function Output(msg) {
            var m = $id("messages");
            m.innerHTML = msg + m.innerHTML;
        }

        // call initialization file
        if (window.File && window.FileList && window.FileReader) {
            Init();
        }

        //
        // initialize
        function Init() {

            var fileselect = $id("fileselect"),
                filedrag = $id("filedrag"),
                submitbutton = $id("submitbutton");

            // file select
            fileselect.addEventListener("change", FileSelectHandler, false);

            // is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {

                // file drop
                filedrag.addEventListener("dragover", FileDragHover, false);
                filedrag.addEventListener("dragleave", FileDragHover, false);
                filedrag.addEventListener("drop", FileSelectHandler, false);
                filedrag.style.display = "block";

                // remove submit button
                submitbutton.style.display = "none";
            }

        }


        // file drag hover
        function FileDragHover(e) {
            e.stopPropagation();
            e.preventDefault();
            e.target.className = (e.type == "dragover" ? "hover" : "");
        }

        // file selection
        function FileSelectHandler(e) {

            // cancel event and hover styling
            FileDragHover(e);

            // fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                ParseFile(f);
            }

        }

        function ParseFile(file) {

            Output(
                "<p>File information: <strong>" + file.name +
                "</strong> type: <strong>" + file.type +
                "</strong> size: <strong>" + file.size +
                "</strong> bytes</p>"
            );

        }
    </script> --}}
@endsection
