<?php
?>       
<script src="../web/js/user.js" type="text/javascript"></script>
<h1>Estamos listando los usuarios. Aguarde un momento</h1>
    

<div class="container">
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

<div class="users"></div>

<script> 
$(document).ready(function(){
   
   getUsers(); 
});

function getUsersSuccess(response){
    var HTML = "";
   $.each(response, function (i, item) {
        
    HTML += '<tr><tdt>'+item.username+'</td></tr>';
    HTML += '<tr><tdt>'+item.email+'</td></tr>';
    
    
                

            });
    $('.tbody').html(HTML);        
}
</script>
