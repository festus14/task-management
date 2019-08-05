@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Documents')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="form-group">
                    <label for="client-list">Select Client</label>
                    <select id="client-list" class="selectDesign form-control"></select>
                </div>

                <div class="form-group mt-3">
                    <label for="document-name">Document Name</label>
                    <input type="text" class="form-control" id="document-name" placeholder="Enter Document Name">
                </div>

            <div class="form-group mt-4">
                    <input style="background: #f1f1f1" type="file" name="files[]" multiple />
            </div>

        </div>
        <div class="col-sm-6">
                <div class="form-group">
                    <label for="project-list">Project Name</label>
                    <select id="project-list" class="selectDesign form-control"></select>
                </div>
    
                <div class="form-group">
                    <label for="task-list">Version</label>
                    <input type="text" class="form-control" id="version" placeholder="Enter Version">
                    </div>
    
            </div>

            <div class="col-md-2 form-group mt-2">
                    <button type="submit" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;">Submit</button>   
                </div>
    </div>
</form>

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