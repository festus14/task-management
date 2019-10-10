var clientData;
function editClient(client_id){

    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/clients') }}" + "/" + client_id,
        success: function(data){
            clientData = data.data;
        },

        error: function (data) {
            console.log('Error:', data);
        }

    })

    $.ajax({
            type: "GET",
            url: "{{ url('/api/v1/clients') }}",
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
