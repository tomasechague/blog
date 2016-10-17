<?php
?>       
<script src="../web/js/user.js" type="text/javascript"></script>
<h1>Estamos listando los usuarios. Aguarde un momento</h1>
    
<button>Listar Usuarios</button>

<div class="users"></div>

<script> 
$(document).ready(function(){
   
   getUsers(); 
});

function getUsersSuccess(response){
   alert("Ya estoy listo");  
}
</script>
