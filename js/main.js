$(document).ready(function(){
    $.ajax({
       
        url: "php/getAll.php?",
        type: "GET",
        async: true,
        dataType: "text", // should be returning json but instead returns plain text
        success: function(result){
           let obj = JSON.parse(result);
           console.log(obj);
            return result;
        },
        error: function(result) {
            // console.log('error');
           let obj = JSON.stringify(result.responseText);
           $('#database').html(obj);
           console.log(obj);
            // console.log(result.responseText);
            // console.log(typeof result);
        }
    });
});



