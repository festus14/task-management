@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')

@endsection
{{-- @php ($num = 1) --}}
@if ($num = 0) @endif
@if ($num2 = 0) @endif
@section('content')
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

    <div class="card">
        <div class="card-header">
            Client Projects
        </div>
        <div class="row card-body">
            <table class="table table-bordered table-striped table-hover">
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

    <div class="card">
        <div class="card-header">
            Client Task
        </div>

        <div class="row card-body">
            <table class="table table-bordered table-striped table-hover">
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

@endsection
@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
