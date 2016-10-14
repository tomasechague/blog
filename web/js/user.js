function getUsers(){
$.ajax({
            type: "POST",
            url: "../Controller/Ajax/User/list.php",
            datatype: "JSON",
        success: function(response){
           console.log(response);
           $('.users').html(response);
    }
    });
    }