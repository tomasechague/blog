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


function modifyUser(data) {

  

    $.ajax({
        url: "../Controller/Ajax/User/edit.php",
        dataType: 'text', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        data: data,
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

function getPerson(id,action) {

    $.ajax({
        url: "../Controller/Ajax/User/get.php",
        type: 'GET',
        data: {
            id: id
        },
        success: function (data) {
            
            if (data.code == 200) {
                if(action == 'view'){
                    //implementar segun vista
                    viewUser(data);
                }else{
                    //implementar segun vista
                    preEditUser(data);
                }
            }

            


        }


    });

}
;
