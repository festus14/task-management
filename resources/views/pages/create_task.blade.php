@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Task Management')

@section('sub_header', 'Create Task')

@section('content')


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTask">
            Create Task
        </button>
      
      <!-- Modal -->
      <div style="" class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="" class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div style="margin: auto; width: 100vw" class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-6 ml-auto">
                            <form action="{{ route("admin.tasks.store") }}" method="POST" enctype="multipart/form-data">
        
                                @csrf
        
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">{{ trans('cruds.task.fields.name') }}*</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($task) ? $task->name : '') }}" required>
                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.task.fields.name_helper') }}
                                    </p>
                                </div>
                                
                                            <div class="form-group">
                                                <label>Select Project</label>
                                                <select id="project-list" class="selectDesign form-control">
                                                    @foreach ($projects as $option=>$name)
                                                        <option value="{{ $option }}">{{ $option['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                
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
        
                    <div class="col-md-6 ml-auto">
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
                                
                                <input type="submit" class="btn btn-primary" value="Submit">
                    
                            </form>
                    </div>
                    </div>
                    
                </div>
                  </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
@endsection

{{-- @section('javascript')
<script>
    const subtypeList = [
        {
            name: 'Account'
        },
        {
            name: 'Bussiness'
        },
        {
            name: 'Econs'
        },
    ]

    const projectList = [
        {
            name: 'Audit'
        },
        {
            name: 'Tax'
        },
        {
            name: 'Payroll'
        },
    ]

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

    projectList.map(elem => {
        let option = document.createElement('option');
        option.text = elem.name;
        add(dropdown, option)
    })

    subtypeList.map(elem => {
        let option = document.createElement('option');
        option.text = elem.name;
        add(dropdownTwo, option)
    })
</script>
@endsection --}}
