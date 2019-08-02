@extends('layouts.inner')

@section('title', 'Project')
@section('css')
<style>
#filedrag {
        display: none;
        font-weight: bold;
        text-align: center;
        padding: 1em 0;
        margin: 1em 0;
        color: #555;
        border: 2px dashed #555;
        border-radius: 7px;
        cursor: default;
    }
    
    #filedrag.hover {
        color: #f00;
        border-color: #f00;
        border-style: solid;
        box-shadow: inset 0 3px 4px #888;
    }
    </style>
@endsection
@section('header', 'Project Management')

@section('sub_header', 'Project Report')

@section('content')

<div class="container">
        <div class="col-md-12 ">
            <form>
                <div class="row col-md-12">
                        <div class="col-md-6 form-group mt-3">
                            <label>Client</label>
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
                                <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
                                <fieldset class="col-md-12 form-group mt-3">
                                                <legend>Upload File</legend>
                                    
                                                <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
                                    
                                                <div>
                                                    <label for="fileselect">Files to upload:</label>
                                                    <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                                    <div id="filedrag">or drop files here</div>
                                                </div>
                                    
                                                <div id="submitbutton">
                                                    <button type="submit">Upload Files</button>
                                                </div>
                                     <div id="messages">
                                                
                                            </div>
                                            </fieldset>
                                           
                                </form>
                                
                </div>
                <div class="row col-md-12">
                                <div class="col-md-2 form-group mt-3">
                        <button class="btn btn-block" style="background-color:#8a2a2b; color:white;">Submit</button>
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

@section('javascript')
<script>
// getElementById
function $id(id) {
    return document.getElementById(id);
}

//
// output information
function Output(msg) {
    var m = $id("messages");
    m.innerHTML = msg + m.innerHTML;
}

// call initialization file
if (window.File && window.FileList && window.FileReader) {
    Init();
}

//
// initialize
function Init() {

    var fileselect = $id("fileselect"),
        filedrag = $id("filedrag"),
        submitbutton = $id("submitbutton");

    // file select
    fileselect.addEventListener("change", FileSelectHandler, false);

    // is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {

        // file drop
        filedrag.addEventListener("dragover", FileDragHover, false);
        filedrag.addEventListener("dragleave", FileDragHover, false);
        filedrag.addEventListener("drop", FileSelectHandler, false);
        filedrag.style.display = "block";

        // remove submit button
        submitbutton.style.display = "none";
    }

}


// file drag hover
function FileDragHover(e) {
    e.stopPropagation();
    e.preventDefault();
    e.target.className = (e.type == "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler(e) {

    // cancel event and hover styling
    FileDragHover(e);

    // fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // process all File objects
    for (var i = 0, f; f = files[i]; i++) {
        ParseFile(f);
    }

}

function ParseFile(file) {

    Output(
        "<p>File information: <strong>" + file.name +
        "</strong> type: <strong>" + file.type +
        "</strong> size: <strong>" + file.size +
        "</strong> bytes</p>"
    );

}
</script>
@endsection