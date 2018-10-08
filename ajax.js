($('#do_get').on('click', function () {

    $.ajax({
        type: 	"POST",
        url: 	"s1.php",
        data: { do_get: true,
        },
        success: function(data){
            $('#resp').append(data);
        }
    });
}));
