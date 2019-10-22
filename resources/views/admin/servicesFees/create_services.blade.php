@extends('layouts.metro')
@section('title')
    <title>Task Management | Create Services</title>
@endsection
@section('active_arrow_one')
    <span class="m-menu__item-here"></span>
@endsection
@section('css')
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>

    </style>
@endsection
@section('subheader')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Create Service
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{ url('/') }}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/letter-types') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                           Letter Type
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/payroll-letters') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Letters
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/services') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Services
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/create-services') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Create Service
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <!--begin:: form-->
    <div class="card card-primary">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.servicesFee.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.services-fees.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.servicesFee.fields.name') }}*</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($servicesFee) ? $servicesFee->name : '') }}" required>
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.servicesFee.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group col-3 {{ $errors->has('amount') ? 'has-error' : '' }}">
                        <label for="amount">{{ trans('cruds.servicesFee.fields.amount') }}*</label>
                        <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($servicesFee) ? $servicesFee->amount : '') }}" step="0.01" required>
                        @if($errors->has('amount'))
                            <p class="help-block">
                                {{ $errors->first('amount') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.servicesFee.fields.amount_helper') }}
                        </p>
                    </div>
                    <div class="form-group col-3 {{ $errors->has('currency') ? 'has-error' : '' }}">
                        <label for="currency">{{ trans('cruds.servicesFee.fields.currency') }}</label>
                        <input type="text" id="currency" name="currency" class="form-control" value="{{ old('currency', isset($servicesFee) ? $servicesFee->currency : '') }}">
                        @if($errors->has('currency'))
                            <p class="help-block">
                                {{ $errors->first('currency') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.servicesFee.fields.currency_helper') }}
                        </p>
                    </div>
                    <div class="form-group col-3 {{ $errors->has('currency_rate') ? 'has-error' : '' }}">
                        <label for="currency_rate">{{ trans('cruds.servicesFee.fields.currency_rate') }}</label>
                        <input type="number" id="currency_rate" name="currency_rate" class="form-control" value="{{ old('currency_rate', isset($servicesFee) ? $servicesFee->currency_rate : '') }}" step="0.01">
                        @if($errors->has('currency_rate'))
                            <p class="help-block">
                                {{ $errors->first('currency_rate') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.servicesFee.fields.currency_rate_helper') }}
                        </p>
                    </div>
                </div>
                <div class="form-group col-xl-10 col-md-12 {{ $errors->has('details') ? 'has-error' : '' }}">
                    <label for="details">{{ trans('cruds.servicesFee.fields.details') }}</label>
                    <textarea id="details" name="details" class="form-control">
                        <page size="A4">
                            {{ old('details', isset($servicesFee) ? $servicesFee->details : '') }}
                        </page>
                    </textarea>
                    @if($errors->has('details'))
                        <p class="help-block">
                            {{ $errors->first('details') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.servicesFee.fields.details_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" name="submitbtn" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

    <!--end:: Form-->

@endsection
@section('javascript')
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
        $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
    <!-- TinyMCE init -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
{{--    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>--}}
    <script>
        var editor_config = {
            path_absolute : "",
            height: 500,
            theme: 'modern',
            selector: "#details",
            body_id: 'page',
            content_css: ['//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css', '{{url('//localhost/task-management/public/metro/letters/create_letter.css')}}'
            ],
            plugins: ['autosave advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools fullscreen'
            ],
            table_toolbar: ["tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore " +
                "tableinsertcolafter tabledeletecol"],
            table_default_attributes: {
                border: '1'
            },
            contextmenu: "link image inserttable | cell row column deletetable print list",
            toolbar: "save undo redo | bold italic underline styleselect fontselect fontsizeselect numlist bullist forecolor backcolor " +
                "| alignleft aligncenter alignright alignfull | outdent indent insertdatetime table | print " +
                "forecolor backcolor restoredraft link image media spellchecker searchreplace fullpage preview fullscreen",
            textcolor_cols: "8",
            media_live_embeds: true,
            advlist_bullet_styles: "default,circle,disc,square",
            advlist_number_styles: "default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman",
            textcolor_map: [
                "000000", "Black",
                "993300", "Burnt orange",
                "333300", "Dark olive",
                "003300", "Dark green",
                "003366", "Dark azure",
                "000080", "Navy Blue",
                "333399", "Indigo",
                "333333", "Very dark gray",
                "800000", "Maroon",
                "FF6600", "Orange",
                "808000", "Olive",
                "008000", "Green",
                "008080", "Teal",
                "0000FF", "Blue",
                "666699", "Grayish blue",
                "808080", "Gray",
                "FF0000", "Red",
                "FF9900", "Amber",
                "99CC00", "Yellow green",
                "339966", "Sea green",
                "33CCCC", "Turquoise",
                "3366FF", "Royal blue",
                "800080", "Purple",
                "999999", "Medium gray",
                "FF00FF", "Magenta",
                "FFCC00", "Gold",
                "FFFF00", "Yellow",
                "00FF00", "Lime",
                "00FFFF", "Aqua",
                "00CCFF", "Sky blue",
                "993366", "Red violet",
                "FFFFFF", "White",
                "FF99CC", "Pink",
                "FFCC99", "Peach",
                "FFFF99", "Light yellow",
                "CCFFCC", "Pale green",
                "CCFFFF", "Pale cyan",
                "99CCFF", "Light sky blue",
                "CC99FF", "Plum"
            ],
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>

    <script>
        $(document).ready(function(){

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({type: 'image', prefix: '/laravel-filemanager'}, function(url, path) {
                            context.invoke('insertImage', url);
                        });

                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('#summernote-editor').summernote({
                toolbar: [
                    ['popovers', ['lfm']],
                ],
                buttons: {
                    lfm: LFMButton
                }
            })
        });
    </script>
@endsection
