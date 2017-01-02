$(document).ready(function () {


    $("#btnEnter").click(function () {
        var name=$("#name").val();
        $.ajax({
         type:"POST",
         url:"user.php",
         data:{"username":name},
         success:function (data) {
             window.location.replace("chat.html");
         }
         });

    });


});
