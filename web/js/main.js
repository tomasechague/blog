

//    function cambiarVentana(binder, file) {
//        $.ajax({
//            url: "../View/"+binder+ "/" +file+".php",
//            data: {action: 'test'},
//            dataType:'JSON',
//        }).done(function (data) {
//            console.log(data);
//            
//            $('.container').html(data);
//        });
//    };

function cambiarVentana(binder, file) {
     $.ajax({
            type: "POST",
            url: "../View/"+binder+ "/" +file+".php",
            data: {action: 'test'},
        success: function(response){
            console.log(response);
        $('.container').html(response);
        
    }
    });
    };




