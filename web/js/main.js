function cambiarVentana(binder, file) {
    $('.container').html("");
    $('.modal').show();
    $('.loader').show();
    setTimeout(function () {
        $.ajax({
            type: "POST",
            url: "../View/" + binder + "/" + file + ".php",
            data: {action: 'test'},
            success: function (response) {
                $('.modal').hide();
                $('.loader').hide();
                $('.container').html(response);

            }
        });
    }, 500);

}



