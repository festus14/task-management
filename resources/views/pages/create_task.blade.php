@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Task Management')

@section('sub_header', 'Create Task')

@section('content')
    
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn" style="background-color:#8a2a2b; color:white;" data-toggle="modal" data-target="#createTaskModal">
        Create Task
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="container-fluid">
                      <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6 ml-auto">
                                    <div class="form-group">
                                            <label>Select Project</label>
                                            <select id="project-list" class="selectDesign form-control"></select>
                                        </div>
                                
                                        <div class="form-group">
                                            <label>Select Project Subtype</label>
                                            <select id="project-subtype-list" class="selectDesign form-control"></select>
                                            </div>
                                
                                        <div class="form-group">
                                            <label for="create-task">Create Task</label>
                                            <input type="text" class="form-control" id="create-task" placeholder="Enter Task Name">
                                        </div>
                                
                            </div>
                            <div class="col-md-6 col-sm-6 ml-auto">
                                    <div class="form-group">
                                            <label for="assign-task">Assign task to</label>
                                            <input type="text" class="form-control" id="assign-task" placeholder="Enter Name">
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="starting-date">Start Date</label>
                                            <input type="date" class="form-control" id="starting-date">
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" class="form-control" id="deadline">
                                        </div>
                            </div>
                        </div>
                      </form>
                      
                      
                    </div>
                  </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add Task</button>
              
            </div>
          </div>
        </div>
      </div> --}}

     {{-- The real page content --}}
      <div class="container-fluid">
            <form action="">
              <div class="row">
                  <div class="col-md-6 col-sm-6 ml-auto">
                          <div class="form-group">
                                  <label>Select Project</label>
                                  <select id="project-list" class="selectDesign form-control"></select>
                              </div>
                      
                              <div class="form-group">
                                  <label>Select Project Subtype</label>
                                  <select id="project-subtype-list" class="selectDesign form-control"></select>
                                  </div>
                      
                              <div class="form-group">
                                  <label for="create-task">Create Task</label>
                                  <input type="text" class="form-control" id="create-task" placeholder="Enter Task Name">
                              </div>
                      
                  </div>
                  <div class="col-md-6 col-sm-6 ml-auto">
                          <div class="form-group">
                                  <label for="assign-task">Assign task to</label>
                                  <input type="text" class="form-control" id="assign-task" placeholder="Enter Name">
                              </div>
                      
                              <div class="form-group">
                                  <label for="starting-date">Start Date</label>
                                  <input type="date" class="form-control" id="starting-date">
                              </div>
                      
                              <div class="form-group">
                                  <label for="deadline">Deadline</label>
                                  <input type="date" class="form-control" id="deadline">
                              </div>
                  </div>
                  <div class="row col-md-12">
                        <div class="col-md-2 form-group mt-3">
                <button class="btn btn-block" style="background-color:#8a2a2b; color:white;">Submit</button>
                        </div>
        </div>
              </div>
            </form>
            
            
          </div>
@endsection


@section('javascript')
<script>
    function add(parent, el) {
        return parent.add(el);
    }

    let dropdown = document.getElementById('project-list');
    dropdown.length = 0;

    let defaultOption = document.createElement('option');
    defaultOption.text = '--Select Project--';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;

    // Dropdown for Project Subtype

    let dropdownTwo = document.getElementById('project-subtype-list');
    dropdownTwo.length = 0;

    defaultOption = document.createElement('option');
    defaultOption.text = '--Select Project Subtype--';

    dropdownTwo.add(defaultOption);
    dropdownTwo.selectedIndex = 0;

        // Trying xmlhttp request

        var request = new XMLHttpRequest()

        request.open('GET', 'http://127.0.0.1:8000/admin/get_comment_by_task_id/1', true)
        request.onload = function() {
          // Begin accessing JSON data here
          var data = JSON.parse(this.response)

          if (request.status >= 200 && request.status < 400) {
            data.map(elem => {
              let option = document.createElement('option');
              option.text = elem.client.name;
              add(dropdown, option)
            })
          } else {
            console.log('error')
          }
        }

        request.send()

      </script>
@endsection
