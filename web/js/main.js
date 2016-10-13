

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
    console.log(binder,file);
        $.ajax({
            type: "POST",
            url: "../View/"+binder+ "/" +file+".php",
            data: {action: 'test'},
            dataType:'JSON',
        success: function(response){
        console.log(response.frase);
        $('.container').html('<h1>'+response.frase+'</h1>');
        
    }
    });
    };




