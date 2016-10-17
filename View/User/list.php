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

            HTML += '<tr><td>' + item.username + '</td>';
            HTML += '<td>' + item.email + '</td></tr>';
        });
        console.log(HTML);
        $('.tbody').html(HTML);
    }
</script>
