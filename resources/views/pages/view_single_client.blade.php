@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')

    <style>
        #loading {
            width:100px;
            height: 100px;
            position: fixed;
            top: 50%;
            left: 50%;
        }

        #single-client-content {display:none;}

    </style>

@endsection
@if ($num = 0) @endif
@if ($num2 = 0) @endif
@section('content')

    <div id="loading">
       <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..." />
    </div>

    <div id="single-client-content">
        <div class="card">
            <div class="card-header">
                Client Details
            </div>

            <div class="card-body">
                <div>
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.name') }}
                                </th>
                                <td>
                                    {{ $client->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.address') }}
                                </th>
                                <td>
                                    {{ $client->address }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.date_of_engagement') }}
                                </th>
                                <td>
                                    {{ $client->date_of_engagement }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.status') }}
                                </th>
                                <td>
                                    @if($client->status == 1) {{ 'Active Client' }} @elseif($client->status == 0) {{ 'Proposed Client' }} @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.expiry_date') }}
                                </th>
                                <td>
                                    {{ $client->expiry_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.email') }}
                                </th>
                                <td>
                                    {{ $client->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.client.fields.phone') }}
                                </th>
                                <td>
                                    {{ $client->phone }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br />

        <div class="m-portlet" style="width: 100%;">
            <div class="card-header">
                Client Projects
            </div>
                <div class="m-portlet__body" style="overflow-x:auto;">
                <table id="kt_project_datable" class="table table-striped table-hover" style="max-width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Manager</th>
                            <th>Members</th>
                            <th>Ending Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($projects) > 0)
                            @foreach ($projects as $project)
                                <tr>
                                    <td> {{ ++$num }} </td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->manager->email }}</td>
                                    <td>
                                        @if(!$project->team_members == null)
                                        @foreach ($project->team_members as $member)
                                                {{ $member->email }}
                                                <br>
                                        @endforeach
                                        @else
                                        No member
                                        @endif
                                    </td>
                                    <td>{{ $project->deadline }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <br />

        <div class="m-portlet" style="width: 100%;">
            <div class="card-header">
                Client Task
            </div>

            <div class="m-portlet__body" style="overflow-x:auto;">
                    <table id="kt_task_datable" class="table table-striped table-hover" style="max-width: 100%">
                    <thead >
                        <tr>
                            <th style="text-align:center">#</th>
                            <th>Name</th>
                            <th>Manager</th>
                            <th>Members</th>
                            <th>Ending Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($tasks) > 0)
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ ++$num2 }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->manager->email }}</td>
                                    <td>
                                        @if(!$task->team_members == null)
                                            @foreach ($task->team_members as $member)
                                                {{ $member->email }}
                                                <br>
                                            @endforeach
                                            @else
                                            No member
                                        @endif
                                    </td>
                                    <td>{{ $task->ending_date }}</td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
@endsection
@section('javascript')
<script>

    $(function() {
        $("#loading").fadeOut(2000, function() {
            $("#single-client-content").fadeIn(1000);
        });
    });

    $(document).ready(function() {
    $('#kt_task_datable').DataTable();
    $('#kt_project_datable').DataTable();
} );

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
