var d = new Date();
// d.toISOString().slice(0, 5);
document.getElementById("datee").innerHTML = getFormattedDate(d);
document.getElementsByClassName("datee").innerHTML = d;

function getFormattedDate(date) {
    var year = date.getFullYear();
    var month = (1 + date.getMonth()).toString();
    month = month.length > 1 ? month : '0' + month;
    var day = date.getDate().toString();
    day = day.length > 1 ? day : '0' + day;
    return year + '/' + month + '/' + day;
}

var data = [{
        "id": 2,
        name: "Yeha",
        "comment": "laudantium enim"
    },
    // {
    //     "id": 1,
    //     name: "Ya",
    //     "comment": "est natus enim nihil "
    // },
]
mapComment();
var comArray = [];


function mapComment() {
    data.map((elem, i) => {
        console.log(elem.comment)
        var html = elem.id === 1 ? `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
        <div class="m-messenger__message m-messenger__message--out">
        <div class="m-messenger__message-pic">
        <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
    </div>
            <div class="m-messenger__message-body">
                <div class="m-messenger__message-arrow"></div>
                <div class="m-messenger__message-content">
                <div class="m-messenger__message-username">
                    <div class="m-messenger__message-text" style="  max-width: 440px; max-height: 4000px;>
                        <span id="datee" style="float: right;"></span>
                         ${elem.comment}
                         </br>
                         <i class="fa fa-reply" aria-hidden="true" style="float:right; margin-top:1px; margin-bottom: 2px; height:1px;"></i>
                    </div>
                    <div class="m-messenger__message-text">
                    <span id="datee" style="float: right;"></span> ${elem.comment}
                </div>
                </div>
            </div>
        </div>
    </div>` : `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
    <div class="m-messenger__message m-messenger__message--out">
    
        <div class="m-messenger__message-body">
            <div class="m-messenger__message-arrow"></div>
            <div class="m-messenger__message-content">
            <div class="m-messenger__message-username">
            <span id="datee" style="float: right;"></span>
                ${elem.name}
                </div>
                <div class="m-messenger__message-text" style="  max-width: 440px; max-height: 4000px;">
                    <span id="datee" style="float: right;"></span> ${elem.comment}
                </div>
                </br>
                <i class="fa fa-reply" aria-hidden="true" style="float:right; margin-top:1px; margin-bottom: 2px; height:1px;"></i>
           
            </div>
        </div>
        <div class="m-messenger__message-pic">
        <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
    </div>
    </div>
</div>`
        document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + html

        //         htmldata = `
        //     <div class="m-messenger__wrapper commguy">
        //     <div class="m-messenger__message m-messenger__message--in">
        //         <div class="m-messenger__message-pic">
        //             <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
        //         </div>
        //         <div class="m-messenger__message-body">
        //             <div class="m-messenger__message-arrow"></div>
        //             <div class="m-messenger__message-content">
        //                 <div class="m-messenger__message-username">
        //                     ${elem.name} wrote
        //                     <span id="datee" style="float: right;"></span>
        //                 </div>
        //                 <div class="m-messenger__message-text">
        //                     ${elem.comment}
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        // </div>
        //     `;
        //         firstChild = getElementById("filler");

        //         var e = document.createElement('div');
        //         e.innerHTML = htmldata;

        //         while (firstChild) {
        //             firstChild.appendChild(htmldata);
        //         }

        //     document.getElementById("filler").innerHTML = document.getElementById("mCSB_3_container").innerHTML + `
        //     <div class="m-messenger__wrapper commguy">
        //     <div class="m-messenger__message m-messenger__message--in">
        //         <div class="m-messenger__message-pic">
        //             <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
        //         </div>
        //         <div class="m-messenger__message-body">
        //             <div class="m-messenger__message-arrow"></div>
        //             <div class="m-messenger__message-content">
        //                 <div class="m-messenger__message-username">
        //                     ${elem.name} wrote
        //                     <span id="datee" style="float: right;"></span>
        //                 </div>
        //                 <div class="m-messenger__message-text">
        //                     ${elem.comment}
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        // </div>
        //     `;
    })
}

function addComment() {
    var newObj = {
        name: "Chiamaka",
        comment: document.getElementById("Textarea1").value,
        id: 5
    }
    console.log(newObj)
    data.push(newObj);
    mapComment()
}