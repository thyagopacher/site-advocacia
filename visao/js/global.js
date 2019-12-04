$(document).ready(function(){
    $('.bt-sub .submenu').css('display','none');
  
    // Nav
    $('.bt-sub').hover(
        function(){
            $(this).children('.submenu').fadeIn(300);
        },
        function(){
            $(this).children('.submenu').css('display','none');
        }
        );
    //Ativo
    $('.submenu').hover(
        function(){
            $(this).parent('.bt-sub').addClass('ativo');
        },
        function(){
            $(this).parent('.bt-sub').removeClass('ativo');
        }
        );
});

