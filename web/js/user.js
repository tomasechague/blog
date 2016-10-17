function getUsers() {
    $.ajax({
        type: "POST",
        url: "../Controller/Ajax/User/list.php",
        datatype: "JSON",
        success: function (response) {
            getUsersSuccess(response);
            
//            $.each(response, function (i, item) {
//                console.log(item);
//                
//
//            });
        }
    });
}