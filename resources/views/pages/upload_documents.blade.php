@extends('layouts.inner')

@section('title', 'Project')

@section('header', 'Project Management')

@section('sub_header', 'Documents')

@section('content')
    <iframe
        src="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true"
        style="width:600px; height:500px;" frameborder="0">
    </iframe>

    {{-- http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name} --}}
    {{-- 5da73d2465e0d_Sample-Engagement-Letter-for-Payroll-Mgt-Services.pdf --}}
@endsection

@section('javascript')
    <script>
        function add(parent, el) {
        return parent.add(el);
    }

    let dropdown = document.getElementById('project-list');
    dropdown.length = 0;

    let defaultOption = document.createElement('option');
    // defaultOption.text = '--Select Project--';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;


    // Dropdown for Project Subtype

    let dropdownTwo = document.getElementById('project-subtype-list');
    dropdownTwo.length = 0;

    defaultOption = document.createElement('option');
    // defaultOption.text = '--Select Project Subtype--';

    dropdownTwo.add(defaultOption);
    dropdownTwo.selectedIndex = 0;
    </script>
@endsection

@section('css')
    <style type="text/css">

    </style>
@endsection
