@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Documents')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="row">
        <div class="col-sm-6 offset-sm-0">
            <div class="form-group">
                    <label for="client-list">Select Client</label>
                    <select id="client-list" class="selectDesign form-control"></select>
                </div>

            <div class="form-group">
                <label for="task-list">Select Task</label>
                <select id="task-list" class="selectDesign form-control"></select>
                </div>

            <div class="form-group mt-4">
                    <input style="background: #f1f1f1" type="file" name="files[]" multiple />
            </div>

            
            <input type="submit" class="btn btn-primary mt-2" value="Save">

        </div>
        <div class="col-sm-6 offset-sm-0">
                <div class="form-group">
                    <label for="project-list">Project Name</label>
                    <select id="project-list" class="selectDesign form-control"></select>
                </div>
    
                <div class="form-group mt-3">
                        <label for="document-name">Document Name</label>
                        <input type="text" class="form-control" id="document-name" placeholder="Enter Document Name">
                    </div>
    
            </div>
    </div>
</form>

@endsection

@section('javascript')
    
@endsection

@section('css')
    <style type="text/css">
        
    </style>
@endsection