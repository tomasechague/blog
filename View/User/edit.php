<script src="../web/js/user.js" type="text/javascript"></script>
<div class="col-sm-12">
    <div class="col-sm-2"></div>    
<div class="alert alert-success col-sm-10" id="alerts" style="display: none">
    <strong id="errors"></strong>
</div>
</div>
<form class="form-horizontal" id="myform" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-2" for="avatar-link">Avatar:</label>
        <div class="col-sm-10"> 
            <input type="file" class="form-control" id="avatar-link" placeholder="Enter Username">
            <input type="hidden" class="form-control" id="id">

        </div>
    </div>
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
            var file = $("#avatar-link").prop('files')[0];
            var data = new FormData();
            data.append('archivo', file);
            data.append('email',email);
            data.append('username', username);
            saveUser(data);
     });
     
     
    });

</script>