@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Project Comment(s)')

@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-4">

            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Comments
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                                <img alt="" src="{{ asset('metro/assets/app/media/img/users/user4.jpg') }}" class="mCS_img_loaded"/>
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">
                                    Project Name
                                </span>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">

                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                        Comments
                                    </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- <div class="tab-content"> -->
                <!-- <div class="tab-pane active" id="m_user_profile_tab_1"> -->
                <div class=" m-scrollable">
                    <div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                        <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                            <div class="m-messenger__messages mCS-autoHide" style="height: 356px; max-height: auto; position: relative; overflow: hidden;">
                                <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: auto; scrollbar-width: thin;">
                                    <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                        <br>
                                        <span id="filler"> </span>

                                        <div class="m-messenger__wrapper commguy" style="padding-right: 10px; display:flex; flex-wrap: flex; padding-left: 10px;">
                                            <div class="m-messenger__message m-messenger__message--in">
                                                <div class="m-messenger__message-pic">
                                                    <img alt="" src="{{ asset('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
                                                </div>
                                                <div class="m-messenger__message-body">
                                                    <div class="m-messenger__message-arrow"></div>
                                                    <div class="m-messenger__message-content">
                                                        <div class="m-messenger__message-username">
                                                            <span class="secondary"><strong>Tomiwa wrote</strong></span>
                                                            <span id="datee" style="float: right;"></span>
                                                        </div>
                                                        <div class="m-messenger__message-text" id="comContent" style="  max-width: 440px; max-height: 4000px; display: flex; flex-direction: column;
                                                            ">
                                                            Hi Ayo. What time will be the meeting ? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel a ratione unde veritatis hic quidem totam quas, minima officiis ab sapiente necessitatibus doloribus vitae nesciunt atque deserunt.
                                                            <br/>
                                                            <div id="replydiv" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                            </div>
                                                            <br>
                                                            <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                            <div class="collapse" id="collapseReply">
                                                                <br>
                                                                <textarea class="form-control" name="replytext" id="replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                <button type="submit" class="btn btn-primary" onclick="addReply()" style="margin-top: 5px; float: right;">Reply</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id=" mCSB_3_scrollbar_vertical " class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical " style="display: block;">
                                    <div class=" mCSB_draggerContainer ">
                                        <div id="mCSB_3_dragger_vertical " class="mCSB_dragger " style="position: absolute; min-height: 50px; display: block; height: 114px; max-height: 319px; top: 0px; ">
                                            <div class="mCSB_dragger_bar " style="line-height: 50px; "></div>
                                        </div>
                                        <div class="mCSB_draggerRail "></div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__seperator "></div>
                            <div class="m-messenger__form " style="width: 100%; ">
                                <div class="m-messenger__form-controls ">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 72%; margin-bottom: 25px;">
                                            Make Comment
                                          </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Make Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control " id="Textarea2" rows="4 " required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="addComment(), $('#exampleModal').modal('toggle');">Comment</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" tab-pane " id="m_user_profile_tab_2 "></div>
                <div class="tab-pane " id="m_user_profile_tab_3 "></div>
            </div>
        </div>
    </div>
</div>
@endsection
 @section('javascript')
 <script>
 var date = new Date();
var formattedDate = (date.toString().slice(0, 25));
document.getElementById("datee").innerHTML = formattedDate;


var data = [{
        "id": 2,
        name: "Yeha",
        date: "12/2/2000",
        "comment": "laudantium enim ladugbo mi ncicna jnsjkd cfjaka"
    },
    {
        "id": 1,
        name: "Ya",
        date: "2/3/2019",
        "comment": "est natus enim nihil"
    },
]
mapComment();


function mapComment() {
    data.map((elem, i) => {
        console.log(elem.comment)
        var html = elem.id === 1 ?
            `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
    <div class="m-messenger__message m-messenger__message--out">
    
        <div class="m-messenger__message-body">
            <div class="m-messenger__message-arrow"></div>
            <div class="m-messenger__message-content">
            <div class="m-messenger__message-username">
            <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
            <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>
               
                </div>
                <div class="m-messenger__message-text" style="  min-width: 250px; max-width: 440px; max-height: 4000px;">
                    ${elem.comment}
                </div>
            </div>
        </div>
        <div class="m-messenger__message-pic">
        <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
    </div>
    </div>
</div>` :
            `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
    <div class="m-messenger__message m-messenger__message--out">
    
        <div class="m-messenger__message-body">
            <div class="m-messenger__message-arrow"></div>
            <div class="m-messenger__message-content">
            <div class="m-messenger__message-username">
            <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
            <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>
               
                </div>
                <div class="m-messenger__message-text" style=" min-width: 250px; max-width: 440px; max-height: 4000px;">
                    ${elem.comment}
                </div>
            </div>
        </div>
        <div class="m-messenger__message-pic">
            <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
    </div>
    </div>
</div>`
        document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + html

    })
}

function addComment() {
    var newObj = {
        name: "Chiamaka",
        comment: document.getElementById("Textarea2").value,
        id: 5,
        date: "12/3/1990"
    }
    console.log(newObj);
    data.push(newObj);
    mapComment();
    document.getElementById("Textarea2").value = "";
}

function addReply() {
    parentComment = document.getElementById("replydiv");
    childComment = `<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
    <div class="m-messenger__message m-messenger__message--out">
    
        <div class="m-messenger__message-body">
            <div class="m-messenger__message-arrow"></div>
            <div class="m-messenger__message-content">
            <div class="m-messenger__message-username">
            <span style="float: left; color: #24262b;"><strong>Dammy</strong></span>
            <span class="datee" style="float: right; color: #0c2a7a">${formattedDate}</span>
               
                </div>

                <div class="m-messenger__message-text" style="min-width: 250px; max-width: 300px; max-height: 4000px;">  <p> </br> 
              <span style="width: 250px"> ${document.getElementById("replyTextId").value} </span>
    </p>  
                </div>
                </br>
            </div>
        </div>
        <div class="m-messenger__message-pic">
        <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
    </div>
    </div>
</div>`;
    parentComment.innerHTML = parentComment.innerHTML + childComment;
    document.getElementById("replyTextId").value = "";
}</script>
 @endsection