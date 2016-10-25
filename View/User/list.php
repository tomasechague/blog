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

<script>
    $(document).ready(function () {

        getUsers();
    });

    function getUsersSuccess(response) {
        var HTML = "";
        $.each(response, function (i, item) {


            HTML += '<tr><td><div class="input-group"><input type="text" class="form-control" id="' + item.id + '" name="persona" value="' + item.username + '" disabled><span class="input-group-btn" id="editbutton-' + item.id + '" style="display:none"> <button class="btn btn-success" type="button" onclick="cambiarPersona(' + item.id + ')">Aceptar</button><button class="btn btn-warning" type="button" onclick="cancelarEdicion(' + item.id + ',\'' + item.username + '\')">Cancelar</button> </span> </div></td>';
            HTML += '<td>' + item.email + '</td>';
            HTML += '<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick=verPersona(' + item.id + ')>Ver</button>';
            HTML += '<td><input type="submit" name="modificar" value="Modificar" class="btn btn-primary" onclick="activarModiPersona(' + item.id + ')">';
            HTML += '<td><input type="submit" name="eliminar" value="Eliminar" class="btn btn-danger" onclick="eliminarPersona(' + item.id + ')"></tr>';
        });
        $('.tbody').html(HTML);
    }
</script>
