@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
        <style>
            .myButton {
            -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
            -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
            box-shadow:inset 0px 1px 0px 0px #ffffff;
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
            background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
            background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
            background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
            background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
            background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
            background-color:#ededed;
            -moz-border-radius:6px;
            -webkit-border-radius:6px;
            border-radius:6px;
            border:1px solid #dcdcdc;
            display:inline-block;
            cursor:pointer;
            color:#777777;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:6px 11px;
            text-decoration:none;
            text-shadow:0px 1px 0px #ffffff;
            }
            .myButton:hover {
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed));
                background:-moz-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:-webkit-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:-o-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:-ms-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed',GradientType=0);
                background-color:#dfdfdf;
            }
            .myButton:active {
                position:relative;
                top:1px;
            }
        </style>

        <style>
            #myInput {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTable {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTable th, #myTable td {
                text-align: left;
                padding: 12px;
                }

                #myTable tr {
                border-bottom: 1px solid #ddd;
                }

                #myTable tr.header, #myTable tr:hover {
                background-color: #f1f1f1;
                }

            #myInputOne {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableOne {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableOne th, #myTableOne td {
                text-align: left;
                padding: 12px;
                }

                #myTableOne tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableOne tr.header, #myTableOne tr:hover {
                background-color: #f1f1f1;
                }

        </style>

        <style>
            #myInputTen {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableTen {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableTen th, #myTableTen td {
                text-align: left;
                padding: 12px;
                }

                #myTableTen tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableTen tr.header, #myTableTen tr:hover {
                background-color: #f1f1f1;
                }


            #myInputNine {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableNine {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableNine th, #myTableNine td {
                text-align: left;
                padding: 12px;
                }

                #myTableNine tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableNine tr.header, #myTableNine tr:hover {
                background-color: #f1f1f1;
                }
            /* loader */
            #loading {
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                position: fixed;
                display: block;
                opacity: 0.7;
                background-color: #ffff;
                z-index: 99;
                text-align: center;
                }

                #loading-image {
                position: absolute;
                top: 40%;
                left: 45%;
                z-index: 100;
                }
        </style>

        <style>
            /* Style for project members table */
            #myInputThree {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableThree {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableThree th, #myTableThree td {
                text-align: left;
                padding: 12px;
                }

                #myTableThree tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableThree tr.header, #myTableThree tr:hover {
                background-color: #f1f1f1;
                }

            #myInputThree {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableThree {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableThree th, #myTableThree td {
                text-align: left;
                padding: 12px;
                }

                #myTableThree tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableThree tr.header, #myTableThree tr:hover {
                background-color: #f1f1f1;
                }
        </style>

<style>
    /* Style for project members table */
    #myInputSix {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 14px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        }

        #myTableSix {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 14px;
        }

        #myTableSix th, #myTableSix td {
        text-align: left;
        padding: 12px;
        }

        #myTableSix tr {
        border-bottom: 1px solid #ddd;
        }

        #myTableSix tr.header, #myTableSix tr:hover {
        background-color: #f1f1f1;
        }

    #myInputSix {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 14px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        }

        #myTableSix {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 14px;
        }

        #myTableSix th, #myTableSix td {
        text-align: left;
        padding: 12px;
        }

        #myTableSix tr {
        border-bottom: 1px solid #ddd;
        }

        #myTableSix tr.header, #myTableSix tr:hover {
        background-color: #f1f1f1;
        }
</style>

@endsection

@section('content')
        <div id="loading">
            <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..." />
        </div>
        {{-- Create Client Modal --}}
        <div style="margin-right: 15%; margin-bottom: 5%;">
            <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-success pull-right" id="createClient" style="background-color:; color:white;" data-toggle="modal" onclick="changeFormat()" data-target="#createClientModal">
                    <span>
                        <i class="la la-plus"></i>
                        <span>
                            Add Client
                        </span>
                    </span>
                </a>
        </div>

        <div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Client</h5>
                            <button type="button" class="close" onclick="$('#createClientModal').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="createClientModalBody" class="modal-body col-md-12">
                            <div class="col-md-12 ">
                                <form class="form" onsubmit="createCliento()" id="clientForm" action="{{ route("admin.clients.store") }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row col-md-12">
                                        <div class="col-md-6 form-group mt-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name">{{ trans('cruds.client.fields.name') }}*</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($client) ? $client->name : '') }}" required>

                                            @if($errors->has('name'))
                                                <p class="help-block">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.client.fields.name_helper') }}
                                            </p>
                                        </div>

                                        <div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }} mt-3">
                                                <label for="status">{{ trans('cruds.client.fields.status') }}</label>
                                                <select id="status" name="status" class="form-control" required>
                                                    <option value="" disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                    @foreach(App\Client::STATUS_SELECT as $key => $label)
                                                        <option value="{{ $key }}" {{ old('status', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('status'))
                                                    <p class="help-block">
                                                        {{ $errors->first('status') }}
                                                    </p>
                                                @endif
                                        </div>


                                    </div>
                                    <div class="row col-md-12">

                                            <div class="col-md-4 form-group {{ $errors->has('date_of_engagement') ? 'has-error' : '' }} mt-3">
                                                <label for="date_of_engagement">{{ trans('cruds.client.fields.date_of_engagement') }}</label>
                                                <input required type="text" id="date_of_engagement" name="date_of_engagement" class="form-control date" value="{{ old('date_of_engagement', isset($client) ? $client->date_of_engagement : '') }}">
                                                @if($errors->has('date_of_engagement'))
                                                    <p class="help-block">
                                                        {{ $errors->first('date_of_engagement') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.date_of_engagement_helper') }}
                                                </p>
                                            </div>


                                            <div class="col-md-4 form-group {{ $errors->has('expiry_date') ? 'has-error' : '' }} mt-3">
                                                <label for="expiry_date">{{ trans('cruds.client.fields.expiry_date') }}</label>
                                                <input required type="text" id="expiry_date" name="expiry_date" class="form-control date" value="{{ old('expiry_date', isset($client) ? $client->expiry_date : '') }}">
                                                @if($errors->has('expiry_date'))
                                                    <p class="help-block">
                                                        {{ $errors->first('expiry_date') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.expiry_date_helper') }}
                                                </p>
                                            </div>

                                            <div class="col-md-4 form-group {{ $errors->has('phone') ? 'has-error' : '' }} mt-3">
                                                    <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                                                    <input required type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($client) ? $client->phone : '') }}">

                                                @if($errors->has('phone'))
                                                    <p class="help-block">
                                                        {{ $errors->first('phone') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.phone_helper') }}
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row col-md-12 ">

                                            <div class="col-md-6 form-group {{ $errors->has('address') ? 'has-error' : '' }} mt-3">
                                                    <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                                                    <input required type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($client) ? $client->address : '') }}">

                                                @if($errors->has('address'))
                                                    <p class="help-block">
                                                        {{ $errors->first('address') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.address_helper') }}
                                                </p>
                                            </div>

                                            <div class="col-md-6 form-group {{ $errors->has('email') ? 'has-error' : '' }} mt-3">
                                                    <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                                                    <input required type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($client) ? $client->email : '') }}">

                                                @if($errors->has('email'))
                                                    <p class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.email_helper') }}
                                                </p>
                                            </div>


                                        </div>
                                        <div class="row col-md-12 ">
                                            <div class="col-md-3 form-group mt-3">
                                            <input class="btn btn-danger" type="submit" style="background-color:#8a2a2b; color:white;"  value="{{ trans('global.create') }}">
                                            </div>
                                        </div>
                                    </form>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
          {{-- End Create Client Modal --}}


          <!-- Edit Client Modal -->
<div class="modal fade" id="editClientModalBody" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                <button type="button" class="close" onclick="$('#editClientModalBody').modal('hide');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="editClientBody" class="modal-body col-md-12">

            </div>

        </div>
    </div>
</div>


    <!-- Begin: List Client -->
    <div class="m-content" >
        <div class="m-portlet__body  m-portlet__body--no-padding" >
            <div class="row m-row--no-padding m-row--col-separator-xl"  id="client-cards">

            </div>
        </div>
    </div>
    <!-- end: List Client -->

    <!-- View Project Modal Begin-->
    <div id="client-project-modal">

    </div>
    <!-- End: View Project Modal-->

    <!-- View Task Modal Begin-->
    <div id="client-task-modal">

    </div>

    <!-- End: View Task Modal-->

    <!-- More Info Modal -->
    <div id="moreProjectInfo">

    </div>

    <div id="moreTaskInfo">

    </div>

    <!-- End More Info Modal -->



@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/validator/clientValidtor.js') }}"></script>
{{--Body Scripts--}}
    <script>
         $(document).ajaxStop(function () {
            $('#loading').hide();
        });

        $(document).ajaxStart(function () {
            $('#loading').show();
        });

        let languages = {
                    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
                };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        var clientData;
        function editClient(client_id){

            $.ajax({
                type: "GET",
                url: "/api/v1/clients/" + client_id,
                success: function(data){
                    clientData = data.data;
                },

                error: function (data) {
                    console.log('Error:', data);
                }

            })

            $.ajax({
                    type: "GET",
                    url: "/api/v1/clients",
                    success: function(data){
                        console.log(data)
                    let editClientBody = document.getElementById('editClientBody');
                    editClientBody.innerHTML = `
                            <div class="col-md-12 ">
                                    <form onsubmit="submitEditClient()" class="form" id="clientForm" action="{{ url('/admin/clients/${clientData.id}') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row col-md-12">
                                        <div class="col-md-6 form-group mt-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name">{{ trans('cruds.client.fields.name') }}*</label>
                                            <input type="text" id="edit_name" name="name" class="form-control" value="${clientData.name}" required>
                                             @if($errors->has('name'))
                                                <p class="help-block">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.client.fields.name_helper') }}
                                            </p>
                                        </div>

                                        <div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }} mt-3">
                                                <label for="status">{{ trans('cruds.client.fields.status') }}</label>
                                                <select value="" id="edit_status" name="status" class="form-control" required>
                                                    <option value="" disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                    @foreach(App\Client::STATUS_SELECT as $key => $label)
                                                        <option value="{{ $key }}" {{ old('status', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('status'))
                                                    <p class="help-block">
                                                        {{ $errors->first('status') }}
                                                    </p>
                                                @endif

                                        </div>


                                    </div>
                                    <div class="row col-md-12">

                                            <div class="col-md-4 form-group {{ $errors->has('date_of_engagement') ? 'has-error' : '' }} mt-3">
                                                <label for="date_of_engagement">{{ trans('cruds.client.fields.date_of_engagement') }}</label>
                                                <input required type="text" id="edit_date_of_engagement" name="date_of_engagement" class="form-control date" value="${clientData.date_of_engagement}">

                                                @if($errors->has('date_of_engagement'))
                                                    <p class="help-block">
                                                        {{ $errors->first('date_of_engagement') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.date_of_engagement_helper') }}
                                                </p>
                                            </div>


                                            <div class="col-md-4 form-group {{ $errors->has('expiry_date') ? 'has-error' : '' }} mt-3">
                                                <label for="expiry_date">{{ trans('cruds.client.fields.expiry_date') }}</label>
                                                <input required type="text" id="edit_expiry_date" name="expiry_date" class="form-control date" value="${clientData.expiry_date}">
                                                @if($errors->has('expiry_date'))
                                                    <p class="help-block">
                                                        {{ $errors->first('expiry_date') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.expiry_date_helper') }}
                                                </p>
                                            </div>

                                            <div class="col-md-4 form-group {{ $errors->has('phone') ? 'has-error' : '' }} mt-3">
                                                    <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                                                    <input required type="text" id="edit_phone" name="phone" class="form-control" value="${clientData.phone}">

                                                @if($errors->has('phone'))
                                                    <p class="help-block">
                                                        {{ $errors->first('phone') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.phone_helper') }}
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row col-md-12 ">

                                            <div class="col-md-6 form-group {{ $errors->has('address') ? 'has-error' : '' }} mt-3">
                                                    <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                                                    <input required type="text" id="edit_address" name="address" class="form-control" value="${clientData.address}">

                                                @if($errors->has('address'))
                                                    <p class="help-block">
                                                        {{ $errors->first('address') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.address_helper') }}
                                                </p>
                                            </div>

                                            <div class="col-md-6 form-group {{ $errors->has('email') ? 'has-error' : '' }} mt-3">
                                                    <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                                                    <input required type="email" id="edit_email" name="email" class="form-control" value="${clientData.email}">

                                                @if($errors->has('email'))
                                                    <p class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </p>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('cruds.client.fields.email_helper') }}
                                                </p>
                                            </div>


                                        </div>
                                        <div class="row col-md-12 ">
                                            <div class="col-md-3 form-group mt-3">
                                            <input class="btn btn-danger" type="submit" style="background-color:#8a2a2b; color:white;"  value="{{ trans('global.update') }}">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                    `
                    var allEditors = document.querySelectorAll('.ckeditor');
                        for (var i = 0; i < allEditors.length; ++i) {
                            ClassicEditor.create(allEditors[i]);
                        }

                        moment.updateLocale('en', {
                            week: {dow: 1} // Monday is the first day of the week
                        });

                        $('.date').datetimepicker({
                            format: 'DD-MM-YYYY',
                            locale: 'en'
                        });

                        $('.datetime').datetimepicker({
                            format: 'DD-MM-YYYY HH:mm:ss',
                            locale: 'en',
                            sideBySide: true
                        });

                        $('.timepicker').datetimepicker({
                            format: 'HH:mm:ss'
                        });

                        $('.select-all').click(function () {
                            let $select2 = $(this).parent().siblings('.select2')
                            $select2.find('option').prop('selected', 'selected')
                            $select2.trigger('change')
                        });
                        $('.deselect-all').click(function () {
                            let $select2 = $(this).parent().siblings('.select2');
                            $select2.find('option').prop('selected', '');
                            $select2.trigger('change')
                        });

                        $('.select2').select2();
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }

                })

            }


            function submitEditClient(client_id){
                swal({
                    title: "Success!",
                    text: "Client Edited!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                window.setTimeout(function(){
                    location.reload();
                }, 3000)
            }

            function deleteClient(client_id){
            swal({
                title: "Are you sure?",
                text: "This Client will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/clients')}}" + '/' + client_id,
                        success: function (data) {
                            swal("Deleted!", "Client successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
            }



        //   Function for calling Client Projects on the DT
        function getClientProjects(client_id) {
            path_url = "/api/v1/clients_projects/" + client_id;
            if ( $.fn.dataTable.isDataTable( '#kt_table_client_projects' + client_id ) ) {
                var kt_table_client_projects = $('#kt_table_client_projects' + client_id).DataTable();
            }else {
                var kt_table_client_projects = $('#kt_table_client_projects' + client_id).DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,

                columns: [
                    {"defaultContent": ""},
                    {"data": "name"},
                    {"data": "manager.name"},
                    {"data": "project_type.name"},
                    {"data": "project_subtype.name"},
                    {"data": "status.name"},
                    {"data": "starting_date"},
                    {"data": "deadline"},
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                },
                {
                targets: 8,
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return '\<button onclick=displayProjectInfo('+full.id+') class="btn btn-secondary dropdown-toggle" type="button" id="projectToolsBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                <div class="dropdown-menu" aria-labelledby="projectToolsBtn" style="padding-left:8px; min-width: 75px; max-width: 15px;">\
                                <a class="link" href="#"><i class="fa fa-eye" style="color:black;" data-toggle="modal"  data-target="#moreInfoModal"> <span style="font-weight:100;"> View </span></i>\
                                </a>\
                            <button onclick="deleteSingleProject('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"><i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                            </div>\
                                    ';
                }
            }],

                buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-primary',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-warning',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            text: 'Reload',
                            className: 'btn-info',
                            action: function ( e, dt, node, config ) {
                                dt.ajax.reload();
                            }
                        },
                        {
                            text: 'Delete Selected',
                            className: 'btn-danger',
                            action: function (e, dt, node, config) {
                                //getting the full row data
                                let rData = [];
                                var ids = $.map(dt.rows('.selected').data(), function (item) {
                                    rData.push(item);
                                    return item.id
                                });

                                if (ids.length === 0) {
                                    swal({
                                        title: "No Item selected",
                                        text: "Please select at leaset one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "This project type will be deleted!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willDelete) =>
                                {
                                    if (willDelete) {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                        $.ajax({
                                            method: 'POST',
                                            data: {
                                                ids: ids,
                                                _method: 'DELETE'
                                            },
                                            url: "{{ route('admin.projects.massDestroy') }}",
                                            success: function (data) {
                                                swal("Deleted!", "Project successfully deleted.", "success");
                                                window.setTimeout(function () {
                                                    dt.ajax.reload();
                                                }, 2500);
                                            },

                                            error: function (data) {
                                                swal("Delete failed", "Please try again", "error");
                                            }

                                        });
                                    } else {
                                        swal("Cancelled", "Delete cancelled", "error");
                                    }

                                });
                            }
                        }
                    ]
            });

            }

        }


//          Function for deleting single project
        function deleteSingleProject(proID){

            swal({
                title: "Are you sure?",
                text: "This Project will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/projects')}}" + '/' + proID,
                        success: function (data) {
                            swal("Deleted!", "Project successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
        }

        // Function for calling Projects tasks
        function displayProjectInfo(proID) {
            $.ajax({
            type: "GET",
            url: "/api/v1/projects/" + proID,
            success: function (data) {
                let moreProjectInfo = document.getElementById("moreProjectInfo")
                moreProjectInfo.innerHTML = `<div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 80%; min-width: 500px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="$('#moreInfoModal').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                <!-- More-info content -->
                        <div class="col-md-12 m-portlet " id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="flaticon-info"> </i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            More info
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="accordion" id="accordionExample">
                                    <div onclick="taskDTCall(${data.data.id})" class="card">
                                        <div class="card-header" id="headingone">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="m-menu__link-icon flaticon-list"></i>
                                                    Project tasks
                                                </span>
                                            </h6>
                                        </div>
                                        <div id="collapseOne" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="m-portlet">
                                                <table class="table table-striped table-hover" style="width: 100%;" id="kt_table_single_project_task">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Starting Date</th>
                                                            <th>Deadline</th>
                                                            <th>Category</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion" id="accordionExample2">
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                    Documents
                                                </span>
                                            </h6>
                                        </div>
                                        <div id="collapseTwo" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample2">
                                            <input type="text" id="myInput" onkeyup="searchProjectDocument()" placeholder="Search for documents.." title="Type in a documents">
                                                <table id="myTable">
                                                        <tr class="header">
                                                            <th>Name</th>
                                                            <th>Version</th>
                                                            <th>Date Created</th>
                                                            <th>File</th>
                                                        </tr>
                                                        `+ data.data.documents.map(item =>
                                                            `<tr>
                                                                <td>${item.name}</td>
                                                                <td>${item.version}</td>
                                                                <td>${item.created_at}</td>
                                                                <td></td>
                                                            </tr>`
                                                        )+`
                                                </table>

                                            </div>
                                        </div>


                                    <div class="accordion" id="accordionExample3">
                                        <div class="card">
                                            <div class="card-header" id="headingthree">
                                                <h6 style="cursor: pointer" class="mb-0">
                                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="m-menu__link-icon flaticon-file"></i>
                                                        Reports
                                                    </span>
                                                </h6>
                                            </div>
                                            <div id="collapseThree" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample3">
                                                <input type="textOne" id="myInputOne" onkeyup="searchProjectReport()" placeholder="Search for report.." title="Type in a report">
                                                <table id="myTableOne">
                                                    <tr class="header">
                                                        <th>Name</th>
                                                        <th>Document Type</th>
                                                        <th>File</th>
                                                        <th>Date Uploaded</th>
                                                    </tr>
                                                    `+ data.data.reports.map(item =>
                                                    `<tr>
                                                        <td>${item.name}</td>
                                                        <td>${item.document_type}</td>
                                                        <td></td>
                                                        <td>${item.created_at}</td>
                                                    </tr>`
                                                    )+`
                                                </table>
                                            </div>
                                        </div>

                                        <div class="accordion" id="accordionExample4">
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    Project Members
                                                </span>
                                            </h6>
                                        </div>
                                    <div id="collapseFour" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample3">
                                        <input type="textOne" id="myInputThree" onkeyup="searchProjectMembers()" placeholder="Search for project member.." title="Type in a member">
                                        <table id="myTableThree">
                                            <tr class="header">
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                            <tr class="">
                                            </tr>
                                            `+ data.data.team_members.map(item =>
                                            `<tr>
                                                <td>${item.name}</td>
                                                <td>${item.email}</td>
                                            </tr>`
                                            )+`
                                        </table>
                                    </div>
                                </div>

                                    <div class="card">
                                        <div onclick="projectComments(${data.data.id})" class="card-header" id="headingFour">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="" data-toggle="modal" data-target="#commentModal">
                                                    <i class="m-menu__link-icon flaticon-comment"></i>
                                                    Comments
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Portlet-->

                     <!-- End main Content of More-info -->

                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>

                `
                },

            error: function (data) {
                console.log('Error:', data);
                }
           })
        }

            // Search Through Project Documents FUnction
        function searchProjectDocument() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

            // Search Through Project Reports FUnction
        function searchProjectReport(){
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputOne");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableOne");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }


        //   Function for calling Client Tasks on the DT
        function getClientTasks(client_id) {
            path_url = "/api/v1/clients_tasks/" + client_id;
            if ( $.fn.dataTable.isDataTable( '#kt_table_tasks' + client_id ) ) {
                var kt_table_tasks = $('#kt_table_tasks' + client_id).DataTable();
            }else {
                var kt_table_tasks = $('#kt_table_tasks' + client_id).DataTable({
                    dom: 'lBfrtip<"actions">',
                    language: {
                        url: languages. {{ app()->getLocale() }}
                    },
                    ajax: path_url,
                    columns: [
                        {"defaultContent": ""},
                        {"data": "name"},
                        {"data": "manager.name"},
                        {"data": "status.name"},
                        {"data": "category.name"},
                        {"data": "starting_date"},
                        {"data": "ending_date"},
                    ],
                    columnDefs: [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }, {
                        orderable: false,
                        searchable: false,
                        targets: -1
                    },
                    {
                        targets: 7,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, full, meta) {
                            return '\<button onclick=displayTaskInfo('+full.id+') class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskToolsBtn" style="padding-left:8px; min-width: 75px; max-width: 15px;">\
                                        <a class="link" href="#"><i class="fa fa-eye" style="color:black;" data-toggle="modal" id="innerDropdown" data-target="#moreTaskInfoModal"> <span style="font-weight:100;"> View </span></i>\
                                        </a>\
                                    <button onclick="deleteSingleTask('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"><i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                                </div>\
                                ';
                        }
                    }],
                    buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-primary',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-warning',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            text: 'Reload',
                            className: 'btn-info',
                            action: function ( e, dt, node, config ) {
                                dt.ajax.reload();
                            }
                        },
                        {
                            text: 'Delete Selected',
                            className: 'btn-danger',
                            action: function (e, dt, node, config) {
                                //getting the full row data
                                let rData = [];
                                var ids = $.map(dt.rows('.selected').data(), function (item) {
                                    rData.push(item);
                                    return item.id
                                });

                                if (ids.length === 0) {
                                    swal({
                                        title: "No Item selected",
                                        text: "Please select at leaset one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "This project type will be deleted!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willDelete) =>
                                {
                                    if (willDelete) {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                        $.ajax({
                                            method: 'POST',
                                            data: {
                                                ids: ids,
                                                _method: 'DELETE'
                                            },
                                            url: "{{ route('admin.projects.massDestroy') }}",
                                            success: function (data) {
                                                swal("Deleted!", "Project successfully deleted.", "success");
                                                window.setTimeout(function () {
                                                    dt.ajax.reload();
                                                }, 2500);
                                            },

                                            error: function (data) {
                                                swal("Delete failed", "Please try again", "error");
                                            }

                                        });
                                    } else {
                                        swal("Cancelled", "Delete cancelled", "error");
                                    }

                                });
                            }
                        }
                    ]
                });
            }


        }

        function displayTaskInfo(task_id) {
                $.ajax({
                    type: "GET",
                    url: "/api/v1/tasks/" + task_id,
                    success: function (data) {
                        let moreTaskInfo = document.getElementById("moreTaskInfo")
                        moreTaskInfo.innerHTML = `<div class="modal fade" id="moreTaskInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="$('#moreTaskInfoModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                        <div class="col-md-12 m-portlet " id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="flaticon-info"> </i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            More info
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="accordion" id="accordionExample4">
                                <div class="card">
                                    <div class="card-header" id="headingone">
                                        <h6 style="cursor: pointer" class="mb-0">
                                            <span class="collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                Documents
                                            </span>
                                        </h6>
                                    </div>
                                    <div id="collapseTen" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample4">
                                        <input type="text" id="myInputTen" onkeyup="searchDocument()" placeholder="Search for documents.." title="Type in a documents">
                                            <table id="myTableTen">
                                                    <tr class="header">
                                                        <th>Name</th>
                                                        <th>Document Type</th>
                                                        <th>File</th>
                                                        <th>Date Uploaded</th>
                                                    </tr>
                                                    `+ data.data.documents.map(item =>
                                                        `<tr>
                                                            <td>${item.name}</td>
                                                            <td>${item.document_type}</td>
                                                            <td></td>
                                                            <td>${item.created_at}</td>
                                                        </tr>`
                                                    )+`
                                            </table>

                                    </div>
                                </div>


                                <div class="accordion" id="accordionExample5">
                                    <div class="card">
                                        <div class="card-header" id="headingnine">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    Reports
                                                </span>
                                            </h6>
                                        </div>
                                    <div id="collapseNine" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample5">
                                        <input type="textOne" id="myInputNine" onkeyup="searchTaskReport()" placeholder="Search for report.." title="Type in a report">
                                        <table id="myTableNine">
                                            <tr class="header">
                                                <th>Name</th>
                                                <th>Document Type</th>
                                                <th>File</th>
                                                <th>Date Uploaded</th>
                                            </tr>
                                            <tr class="">
                                            </tr>
                                            `+ data.data.reports.map(item =>
                                            `<tr>
                                                <td>${item.name}</td>
                                                <td>${item.document_type}</td>
                                                <td></td>
                                                <td>${item.created_at}</td>
                                            </tr>`
                                            )+`
                                        </table>
                                    </div>
                                </div>

                                <div class="accordion" id="accordionExample6">
                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    Task Owners
                                                </span>
                                            </h6>
                                        </div>
                                    <div id="collapseSix" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample6">
                                        <table id="myTableSix">
                                            <tr class="header">
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                            <tr class="">
                                            </tr>
                                            `+ data.data.assinged_tos.map(item =>
                                            `<tr>
                                                <td>${item.name}</td>
                                                <td>${item.email}</td>
                                            </tr>`
                                            )+`
                                        </table>
                                    </div>
                                </div>

                                                    <div class="card">
                                                        <div onclick="taskComments(${data.data.id})" class="card-header" id="headingFour">
                                                            <h6 style="cursor: pointer" class="mb-0">
                                                                <span class="" data-toggle="modal" data-target="#commentModal">
                                                                    <i class="m-menu__link-icon flaticon-comment"></i>
                                                                    Comments
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                        <!-- Comment Modal -->
            <div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            </div>
                        `


        },
                error: function (data) {
                    console.log('Error:', data);
                }

            })
        }

            function changeFormat(){
                var allEditors = document.querySelectorAll('.ckeditor');
                    for (var i = 0; i < allEditors.length; ++i) {
                        ClassicEditor.create(allEditors[i]);
                    }

                    moment.updateLocale('en', {
                        week: {dow: 1} // Monday is the first day of the week
                    })

                    $('.date').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'en'
                    })

                    $('.datetime').datetimepicker({
                        format: 'DD-MM-YYYY HH:mm:ss',
                        locale: 'en',
                        sideBySide: true
                    })

                    $('.timepicker').datetimepicker({
                        format: 'HH:mm:ss'
                    })

                    $('.select-all').click(function () {
                        let $select2 = $(this).parent().siblings('.select2')
                        $select2.find('option').prop('selected', 'selected')
                        $select2.trigger('change')
                    })
                    $('.deselect-all').click(function () {
                        let $select2 = $(this).parent().siblings('.select2')
                        $select2.find('option').prop('selected', '')
                        $select2.trigger('change')
                    })

                    $('.select2').select2()

                    $('.treeview').each(function () {
                        var shouldExpand = false
                        $(this).find('li').each(function () {
                        if ($(this).hasClass('active')) {
                            shouldExpand = true
                        }
                        })
                        if (shouldExpand) {
                        $(this).addClass('active')
                        }
                    })
            }

            //Posting-Create client
            function createCliento(){
                swal({
                    title: "Success!",
                    text: "Client Added!",
                    icon: "success",
                    confirmButtonText: "OK",
                });
                window.setTimeout(function(){
                    location.reload();
                }, 3000);
            }

            // Search Through Task Documents FUnction
        function searchTaskDocument() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputTen");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableTen");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

            // Search Through Task Reports FUnction
        function searchTaskReport(){
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputNine");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableNine");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

            // Function for deleting single task
        function deleteSingleTask(taskID){

            swal({
                    title: "Are you sure?",
                    text: "Everything relating to this task will be lost!",
                    icon: "warning",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                     if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                            $.ajax({
                                type: "DELETE",
                                url: "{{ url('api/v1/tasks')}}" + '/' + taskID,
                                success: function (data) {
                                    swal("Deleted!", "Task has been successfully deleted.", "success");
                                    window.setTimeout(function(){
                                        location.reload();
                                    } , 2500);
                                },
                                    error: function (data) {
                                        swal("Delete failed", "Please try again", "error");
                                    }

                                });
                            }

                    else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
        }

        // Function Populating the project Document Modal
        function taskDTCall(project_id){
            path_url = "/api/v1/projects_tasks/" + project_id;

              // Simple Project Tasks DT
            if ( $.fn.dataTable.isDataTable( '#kt_table_single_project_task') ) {
                let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable();
            }else {
                let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,

                columns: [
                    {"data": "name"},
                    {"data": "starting_date"},
                    {"data": "ending_date"},
                    {"data": "category.name"},
                    {"data": "status.name"},
                ],
                columnDefs: [
                //     {
                //     orderable: false,
                //     className: 'select-checkbox',
                //     targets: 0
                // },
                 {
                    orderable: false,
                    searchable: false,
                    targets: -1
                },
                ]
            });
            }

        }

        function searchProjectMembers(){
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputThree");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableThree");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }


        // Function Populating the project Document Modal


        function projectComments(project_id){
            path_url = "/api/v1/projects" + project_id;
            // Comment Function Goes Here

        }

        function taskComments(task_id){

        }

        $.fn.dataTable.ext.classes.sPageButton = '';
        var deleteButtonTrans = 'Delete Selected';
        var deleteProjectButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.project-sub-types.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected ') }}');
                    return
                }

                if (confirm('{{ trans('global.areYouSure ') }}')) {
                    $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'POST',
                        url: config.url,
                        data: {
                            ids: ids,
                            _method: 'DELETE'
                        }
                    })
                        .done(function () {
                            location.reload()
                        })
                }
            }
        };
        var dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
        dtProjectButtons.push(deleteProjectButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })
        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }


        // Ajax call for the clients view
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/api/v1/clients',
            success: function (data) {

                let clientCard = document.getElementById('client-cards');
                let projectCard = document.getElementById('client-project-modal');
                let taskCard = document.getElementById('client-task-modal');

                    data.data.map((datum, i) => {
                    clientCard.innerHTML = clientCard.innerHTML + `
                    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12" style="padding: 2%; border: 1px solid #dfdfdf; border-radius: 6%; margin-bottom: 2%; margin-right: 2%; max-width: 44%; box-sizing: border-box;">
                        <div class="m-widget24">
                            <div style="display: inline-block;" class="pull-right">
                                <a onclick="editClient(${datum.id})" class="btn myButton" href="#" data-toggle="modal" data-target="#editClientModalBody">
                                    <i class="fa fa-pencil" style="color:black;"><span style="font-weight:100;"></span></i>
                                </a>
                                <a onclick="deleteClient(${datum.id})" class=" myButton" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"></i></a>
                            </div>
                            <div class="m-widget24__item">
                                <div class="body-header" style="">
                                    <div class="" style=" float: left">
                                        <img src="{{ asset('metro/assets/app/media/img/users/Logo2.png') }}" alt
                                            width="80px" height="80px" style="border-radius: 1000px">
                                    </div>
                                    <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                        ${datum.name}
                                    </h1>
                                    <br>
                                </div>

                                <div class="m--space-10"></div>

                                <div id="client-details" style="">
                                    <p>${datum.address}</p>
                                    <p>${datum.email}</p>
                                    <p>${datum.phone}</p>
                                </div>

                                <button onclick ="getClientProjects(${datum.id})"  class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                        data-toggle="modal" data-target="#view_client_project${datum.id}">
                                    View Projects
                                </button>
                                <button onclick ="getClientTasks(${datum.id})" class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                        data-toggle="modal" data-target="#view_client_task${datum.id}">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                    </div>
                `

        projectCard.innerHTML = projectCard.innerHTML + `<div class="modal fade" id="view_client_project${datum.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            <div class="modal-dialog" style="max-width: 100%; min-width: 400px; max-height: 100%;"
                    role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Client Projects</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="m-portlet " id="m_portlet">
                                    <div class="m-portlet__body">
                                        <table id="kt_table_client_projects${datum.id}" class="table table-striped table-hover"
                                                style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Type</th>
                                                <th>Subtypes</th>
                                                <th>Status</th>
                                                <th>Starting Date</th>
                                                <th>Deadline</th>
                                                <th>Tools</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>`;

        taskCard.innerHTML = taskCard.innerHTML + `<div class="modal fade" id="view_client_task${datum.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" style="max-width: 90%; min-width: 400px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Client Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">

                <div class="m-portlet"; id="m_portlet">
                    <div class="m-portlet__body">
                    <table id="kt_table_tasks${datum.id}" class="table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Manager</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Starting Date</th>
                                <th>Deadline</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                    </table>
                </div>
             </div>
            </div>

         </div>
            </div>
            </div>
            </div>
            </div>`


            })

        },

        error: function (data) {
            console.log('Error:', data);
        }
        });

        $(function () {
            let copyButtonTrans = '{{ trans('global.datatables.copy') }}';
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}';
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}';
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}';
            let printButtonTrans = '{{ trans('global.datatables.print') }}';
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}';
            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' });
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages.{{ app()->getLocale() }}
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style:    'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                pageLength: 10,
                dom: 'lBfrtip<"actions">',
                buttons: [
                            {
                                extend: 'excel',
                                className: 'btn-primary',
                                text: 'Excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                extend: 'pdf',
                                className: 'btn-success',
                                text: 'PDF',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'csv',
                                className: 'btn-info',
                                text: 'CSV',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                        ]
            });

        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection

