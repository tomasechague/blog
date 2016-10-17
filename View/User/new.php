<form class="form-horizontal">
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
  $(document).ready(function(){
    $("form#myform").submit(function(event) {
        event.preventDefault();
        var toid = $("#toid").val();
        var newmsg = $("#newmsg").val();
        //llamar funcion saveUser();
        $.ajax({
            type: "POST",
            url: "insert.php", //controlador del user
            data: "toid=" + content + "&newmsg=" + newmsg,
            success: function(){alert('success');}
        });
    });
});  
    
</script>