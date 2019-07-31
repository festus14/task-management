@extends('layouts.inner')

@section('title', 'Project')
    

@section('header', 'Project Management')

@section('sub_header', 'Create Project')

@section('content')
<div class=""  >
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Project</button>

    <div class="modal fade bd-example-modal-lg"   style="margin-top:80px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Prject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="postData">

                <div class="form-group">
                    <label>Select Project</label>
                    <select id="project-list" class="form-control"></select>
                </div>
        
                <div class="form-group">
                    <label for="create-project-subtype">Create Project Subtype</label>
                    <input type="text" class="form-control" id="create-project-subtype" placeholder="Enter Project Subtype">
                </div>
        
                
                <input type="submit" class="btn btn-primary  float-right" value="Submit">
        
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
    
@endsection  

