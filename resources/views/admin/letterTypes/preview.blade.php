<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        html, body, iframe {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
@if($document->file)
    @foreach($document->file as $key => $media)
        <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ $media->getUrl() }}' width='100%' height='100%' frameborder='0'>
            This is an embedded
            <a href='https://task.ipaysuite.com'>Home</a> Task Management, powered by Stransact and

            <a target='_blank' href='http://office.com/webapps'>Office Online</a>.
        </iframe>
    @endforeach
@endif
</body>
</html>
