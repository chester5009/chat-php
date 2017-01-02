/**
 * Created by chester on 31.12.16.
 */
$(document).ready(function () {
    console.log("ready");
    getchatdata();
    $.ajax({
            type:"POST",
            url:"getname.php",
            data:{},
            success:function (data) {
                console.log(data);
                $("#username").html(" "+data);

            }
        });

    $("#send").click(function () {
        var message=$("#text").val();
        console.log(message);
        $.ajax({
            type:"POST",
            url:"connectdb.php",
            data:{"message":message},
            success:function (data) {
                console.log(data);
                $("#text").val("");
            }
        });

    });

});

function getchatdata() {

    $.ajax({
        type:"POST",
        url:"getchatdata.php",
        data:{},
        success:function (data) {
            console.log(data);
            parseAndShow(data);
        }
    });
    requestAnimationFrame(getchatdata);

}
function parseAndShow(get_json) {
    $("#content").html("");
    var data=JSON.parse(get_json);
    for(var i=0;i<data.length;i++){
        var s=data[i]['nameuser']+" "+data[i]['message'];
        var nameuser=data[i]['nameuser'];
        var message=data[i]['message'];
        console.log(s);
        $("#content").append("<p><span id='name_span'>"+nameuser+"</span>:<span id='message_span'>"+message+"</span></p>");

    }

}