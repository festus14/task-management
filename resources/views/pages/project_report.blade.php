@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Project Report')

@section('content')

<div class="container">
        <div class="col-md-12 ">
            <form>
                <div class="row col-md-12">
                        <div class="col-md-6 form-group mt-3">
                            <label><strong>Client</label></strong>
                            <select id="client-list" class="selectDesign form-control"></select>
                        </div>
                
                        <div class="col-md-6 form-group mt-3">
                                <label>Project</label>
                                <select id="client-list" class="selectDesign form-control"></select>
                        </div>
                </div>
                <div class=" row col-md-12">
                         <div class="col-md-12 form-group mt-3">
                                <label for="exampleFormControlTextarea1">Project Report</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                </div>
                <div class=" row col-md-12">
                                <div class="col-md-12 form-group mt-3">
                                       <label for="exampleFormControlTextarea1">Upload File</label>
                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                               </div>
                </div>
                <div class="row col-md-12">
                                <div class="col-md-12 form-group mt-3">
                        <button class="btn btn-block primary">Submit</button>
                                </div>
                </div>
                {{-- <div class="file-upload-wrapper">
                                <input type="file" id="input-file-max-fs" class="file-upload" data-max-file-size="2M" />
                              </div> --}}
                </div>
            </form>
        </div>
        </div>

@endsection