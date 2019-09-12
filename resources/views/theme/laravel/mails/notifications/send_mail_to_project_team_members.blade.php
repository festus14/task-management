
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Management</title>
    <link href="{{ url('metro/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('metro/assets/demo/demo2/base/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 24px;
        }

        .links > a, p {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 18px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">Hello!</div>

        <p>You have been added to work on a project.   </p>
        <p>See below for the project details:</p>
        <br>
        <div class="row title">
            <table>
                <tr>
                    <td>Project Name: </td>
                    <td>{{ $project->name }}</td>
                </tr>
                <tr>
                    <td>Project Manager: </td>
                    <td>{{ $project->manager->name. ' ('.$project->manager->email . ')'  }}</td>
                </tr>
            </table>
        </div>

        <div class="row">
            <table class="table table-bordered" border="1">
                <thead>
                   <tr>
                       <th>Name</th>
                       <th>email</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($team_members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div class="links">
            <a href="https://portal.ipaysuite.com">iPaySuite</a>
            <a href="https://stransact.com">Stransact</a>
            <a href="https://task.ipaysuite.com">Task Manager</a>
        </div>
    </div>
</div>
</body>
</html>
