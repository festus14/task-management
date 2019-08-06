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
        <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
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
        <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
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
        <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
    </div>
    </div>
</div>`;
    parentComment.innerHTML = parentComment.innerHTML + childComment;
    document.getElementById("replyTextId").value = "";
}