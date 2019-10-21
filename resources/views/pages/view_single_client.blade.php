@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')

@endsection

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
                            {{ $projects[0]->client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.address') }}
                        </th>
                        <td>
                            {{ $projects[0]->client->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.date_of_engagement') }}
                        </th>
                        <td>
                            {{ $projects[0]->client->date_of_engagement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.status') }}
                        </th>
                        <td>
                            {{ $projects[0]->client->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.expiry_date') }}
                        </th>
                        <td>
                            {{ $projects[0]->client->expiry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <td>
                            {{ $projects[0]->client->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.phone') }}
                        </th>
                        <td>
                            {{ $projects[0]->client->phone }}
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
                    {{-- <th>Members</th> --}}
                    <th>Ending Date</th>
                </tr>
            </thead>

            <tbody>
                @if(count($projects) > 0)
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->manager->email }}</td>
                            {{-- <td>
                                @if(!$project->team_members == null)
                                   @foreach ($project->team_members as $member)
                                        {{ $member->name .' ('. $member->email. ')' }}
                                   @endforeach
                                   @else
                                   No member
                                @endif
                            </td> --}}
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
                    {{-- <th>Members</th> --}}
                    <th>Ending Date</th>
                </tr>
            </thead>

            <tbody>
                @if(count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->manager->email }}</td>
                            {{-- <td>
                                @if(!$task->team_members == null)
                                    @foreach ($task->team_members as $member)
                                        {{ $member->name .' ('. $member->email. ')' }}
                                    @endforeach
                                    @else
                                    No member
                                @endif
                            </td> --}}
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
