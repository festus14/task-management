@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Create Project')

@section('content')
<div class="row">
    
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-sm-6 col-md-6 offset-sm-0">
                    <div class="form-group mt-3">
                        <label>Select Client</label>
                        <select id="client-list" class="selectDesign form-control"></select>
                    </div>
        
                    <div class="form-group mt-3">
                        <label for="create-project">Project Name</label>
                        <input type="text" class="form-control" id="create-project" placeholder="">
                    </div>
        
                    <div class="form-group mt-3">
                        <label for="create-project-type">Project Type</label>
                        <input type="text" class="form-control" id="create-project-type" placeholder="">
                        </div>

                        <div class="mt-3" >
                            <!-- Button trigger modal -->
                            <button  type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                Create Subtype
                            </button>
                                <div style="border: 1px solid #f1f1f1; margin-top: 10px; border-radius: 5px;">
                                    <ul style="list-style:none; padding: 5px;">
                                        <li>Created Subtype Goes here</li>
                                    </ul>
                                </div>
                                 <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Subtype</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="create-project-subtype">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Add Subtype</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
        
                    <div class="form-group mt-3"></div>
        
                    <div class="form-group mt-3">
                        <label for="starting-date">Start Date</label>
                        <input type="date" class="form-control" id="starting-date">
                    </div>
        
                    <div class="form-group mt-3">
                        <label for="Deadline">Deadline</label>
                        <input type="date" class="form-control" id="Deadline">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
        
            </form>
    </div>
        
        

    </div>
@endsection
