function cambiarVentana(binder, file) {
    $('.container').html("");
     $('.modal').show();
     setTimeout(function(){ 
     $.ajax({
            type: "POST",
            url: "../View/"+binder+ "/" +file+".php",
            data: {action: 'test'},
        success: function(response){
        $('.modal').hide();     
        $('.container').html(response);
        
    }
    });
    }, 500);
    
    }



