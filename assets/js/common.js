$(document).ready(function(){


   $('.main-menu').click(function(){
    var re_size = function(){$('.section').toggleClass('resize')};

        $('#main-menu-link').animate({
            width: "toggle"
        })

        $('.section').setTimeout(re_size(), 3000);
    })
})
