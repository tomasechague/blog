function getUsers() {
    $.ajax({
        type: "POST",
        url: "../Controller/Ajax/User/list.php",
        datatype: "JSON",
        success: function (response) {
            getUsersSuccess(response);

        }
    });
}


function saveUser(username, email) {

    $.ajax({
        type: "GET",
        url: "../Controller/Ajax/User/new.php", //controlador del user
        data: {
            username: username,
            email: email
        },
        success: function (data) {
            console.log(data);
            if (data['code'] == 200) {
                $('#alerts').show();
                $('#alerts').removeClass('alert-danger');
                $('#alerts').addClass('alert-success');
                $('strong').text(data['mensaje']);
                $('#email').val('');
                $('#username').val('');
            } else {
                $('#alerts').show();
                $('#alerts').removeClass('alert-success');
                $('#alerts').addClass('alert-danger');
                $('strong').text(data['mensaje']);
            }
        }
    });

}        