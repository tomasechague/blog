<?php ?>       
<script src="../web/js/user.js" type="text/javascript"></script>

<div class="users">

    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
    </table>


</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Datos de la persona</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <span class="other-buttons">
                </span>   
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        getUsers();
    });

    function getUsersSuccess(response) {
        var HTML = "";
        $.each(response, function (i, item) {


            HTML += '<tr><td>' + item.username + '</td>';
            HTML += '<td>' + item.email + '</td>';
            HTML += '<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="getPerson(' + item.id + ', \'view\')">Ver</button>';
            HTML += '<td><input type="button" name="modificar" value="Modificar" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="getPerson(' + item.id + ', \'edit\')">';
            HTML += '<td><input type="button" name="eliminar" value="Eliminar" class="btn btn-danger" onclick="eliminarPersona(' + item.id + ')"></tr>';
        });
        $('.tbody').html(HTML);
    }

    function viewUser(data) {
        var HTML = '';
        HTML += '<img src="' + data.user.avatar_link + '" height="100" width="100""><br/><br/>';
        HTML += '<label>Username: </label>' + data.user.username + '<br/>';
        HTML += '<label>Email: </label>' + data.user.email + '<br/>';
        //aca podrian ir los ultimos 5 post


        $('.modal-body').html(HTML);

    }

    function preEditUser(data) {

        $.ajax({
            type: "POST",
            url: "../View/User/edit.php",
            data: {action: 'test'},
            success: function (response) {
                $('.modal-body').html(response);
                $("#avatar-image").attr("src",data.user.avatar_link);
                $('#id').val(data.user.id);
                $('#username').val(data.user.username);
                $('#email').val(data.user.email);
                $('.other-buttons').html('');
                $('.other-buttons').prepend('<button type="button" class="btn btn-primary" onClick="editUser()">Guardar</button>')
                console.log(data);
            }
        });

        //aca podrian ir los ultimos 5 post

    }
    
    function editUser(){
        
            var id = $("#id").val();
            var username = $("#username").val();
            var email = $("#email").val();
            var file = $("#avatar-link").prop('files')[0];
            var data = new FormData();
            data.append('id', id);
            data.append('archivo', file);
            data.append('email',email);
            data.append('username', username);
            
            modifyUser(data);
     
    }
</script>
