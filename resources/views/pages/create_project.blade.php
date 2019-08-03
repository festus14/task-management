@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Create Project')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form>
            <div class="row col-md-12">
                    <div class="col-md-6 form-group mt-3">
                        <label>Select Client</label>
                        <select id="client-list" class="selectDesign form-control"></select>
                    </div>
            
                    <div class="col-md-6 form-group mt-3">
                        <label for="create-project">Project Name</label>
                        <input type="text" class="form-control" id="create-project" placeholder="">
                    </div>
            </div>
            <div class="row col-md-12">
                    <div class="col-md-6 form-group mt-3">
                        <label for="create-project-type">Project Type</label>
                        <input type="text" class="form-control" id="create-project-type" placeholder="">
                    </div>

                            
                    <div class="col-md-6 form-group mt-3">
                                <label for="exampleFormControlSelect1">Project Sub-type</label>
                                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#exampleModal"style="float:right;"></i>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                </select>
                     </div>
                    
            </div>
             <div class="row col-md-12 ">
                        
                            <div class="col-md-6 form-group mt-3">
                                <label for="starting-date">Start Date</label>
                                <input type="date" class="form-control" id="starting-date">
                            </div>
                        
                            <div class="col-md-6 form-group mt-3">
                                    <label for="Deadline">Deadline</label>
                                    <input type="date" class="form-control" id="Deadline">
                            </div>
                           
                                         <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Subtype</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                        <input type="text" class="form-control" id="create-project-subtype" placeholder="Input name">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group mt-3">
                            <button type="submit" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;">Submit</button>   
                            </div>
                 </div>
                         
                </div>
        
                
            </div>
        </form>
    </div>
    </div>
@endsection
 