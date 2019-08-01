@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Documents')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-0">
        <form>

            <div class="form-group">
                    <label>Client Name</label>
                    <select id="client-list" class="selectDesign form-control"></select>
                </div>

            <div class="form-group">
                <label>Project Name</label>
                <select id="project-list" class="selectDesign form-control"></select>
            </div>

            <div class="form-group">
                <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                    <span>Choose file</span>
                    <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your file">
                    </div>
                </div>
                </div>

            
            <input type="submit" class="btn btn-primary" value="Save">

        </form>
    </div>
</div>
@endsection