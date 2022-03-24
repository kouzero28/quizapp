$(function(){
    $('#hamburger').on('click', function(){
        $('.icon').toggleClass('close');
        $('.sm').slideToggle();
    });
});

$(function(){
    $('.alert-success').fadeIn('slow', function() {
        $(this).delay(4000).fadeOut('slow');
    });
});

