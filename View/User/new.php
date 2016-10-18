<script src="../web/js/user.js" type="text/javascript"></script>

<div class="alert alert-success" id="alerts" style="display: none">
  <strong></strong>
</div>
<form class="form-horizontal" id="myform">
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Username:</label>
        <div class="col-sm-10"> 
            <input type="text" class="form-control" id="username" placeholder="Enter Username">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Agregar</button>
        </div>
    </div>
</form>


<script>
    $(document).ready(function () {
        $("form#myform").submit(function (event) {
            event.preventDefault();
            var username = $("#username").val();
            var email = $("#email").val();
            saveUser(username, email);

        });
    });

</script>