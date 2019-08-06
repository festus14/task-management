@extends('layouts.inner')

@section('title', 'Task')
    
@section('header', 'Task Management')

@section('sub_header', 'Create Task Category')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form>
            <div class="row col-md-12">
                    <div class="col-md-6 form-group mt-3">
                        <label>Name*</label>
                        <input type="text" class="form-control" id="categoryName" placeholder="">
                    </div>
            
                    <div class="col-md-6 form-group mt-3">
                        <label for="create-project">Project Type*</label>
                        <select id="projType" class="selectDesign form-control"></select>
                    </div>
            </div>
            <div class="row col-md-12">
                    <div class="col-md-6 form-group mt-3">
                        <label for="create-project-type">Sub-category</label>
                        <select id="subCategory" class="sub_category form-control"></select>
                    </div>

                            
                    <div class="col-md-6 form-group mt-3">
                                <label for="FormControlSelect1">Weight*</label>
                                <input type="text" class="form-control" id="weight" placeholder="">
                                  <p style="margin-top: 3px;">Used for ordering and hierarchy</p>
                     </div>
                    
            </div>
             <div class="row col-md-12 " >
                        
                            <div class="col-md-6 form-group " style="margin-top: -20px;">
                                <label for="starting-date">Description</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
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
 