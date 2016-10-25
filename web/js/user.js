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


function saveUser(data) {

    $.ajax({
        dataType: 'text', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        url: "../Controller/Ajax/User/new.php", //controlador del user

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
                $('strong#errors').text(data['mensaje']);
            }
        }
    });

} 

function cambiarPersona(id) {

    var username = $('#' + id).val();

    $.ajax({
        url: "../Controller/Ajax/User/edit.php",
        type: 'POST',
        data: {
            username: username,
            id: id
        },
        success: function (data) {

            alert(data.message);
            
        }


    });
}

function eliminarPersona(id) {
    $.ajax({
        url: "../Controller/Ajax/User/delete.php",
        type: 'POST',
        data: {
            id: id
        },
        success: function (data) {

            alert(data.message);
            if (data.code == 200) {
                getUsers();
            }
        }


    });
}

function verPersona(id) {

    $.ajax({
        url: "../Controller/Ajax/User/view.php",
        type: 'GET',
        data: {
            id: id
        },
        success: function (data) {
            var info = data.results;
            console.log(data.results);
            if (data.code == 200) {
                var HTML = '';
                //aca faltaria la foto
                HTML += '<label>Username: </label>' + info.username + '<br/>';
                HTML += '<label>Email: </label>' + info.email + '<br/>';
                //aca podrian ir los ultimos 5 post
            }

            $('.modal-body').html(HTML);


        }


    });

}
;
