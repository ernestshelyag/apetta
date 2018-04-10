$( document ).ready(function() {
    $(document).on('submit','form#reviews',function (e) {
        e.preventDefault();
        var send = $(this).serialize();
        $.ajax({
            url: '/ajax/add_review.php',
            data:send
        }).done(function(data){
            if(data == 'Y'){
                $('#reviews .success-message').css('display','block');
                $('#reviews .error-message').css('display','none');
            }else{
                $('#reviews .success-message').css('display','none');
                $('#reviews .error-message').css('display','block');
            }
        });
    });
});

