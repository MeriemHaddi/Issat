$(document).ready(function(){
    $("#role").click(function () {
        if($("#role").val()!="student")
            $('#classe').hide();
        else
            $('#classe').show();
    });
});
