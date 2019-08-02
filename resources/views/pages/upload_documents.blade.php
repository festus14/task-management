@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Documents')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-0">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label for="client-list">Select Client</label>
                    <select id="client-list" class="selectDesign form-control"></select>
                </div>

            <div class="form-group">
                <label for="project-list">Select Project Name</label>
                <select id="project-list" class="selectDesign form-control"></select>
            </div>

            <div class="form-group">
                <label for="task-list">Select Task</label>
                <select id="task-list" class="selectDesign form-control"></select>
                </div>

            <div class="form-group mt-3">
                    <input style="background: #f1f1f1" type="file" name="files[]" multiple />
            </div>

            
            <input type="submit" class="btn btn-primary mt-3" value="Save">

        </form>
    </div>
</div>
@endsection

@section('javascript')
    
@endsection