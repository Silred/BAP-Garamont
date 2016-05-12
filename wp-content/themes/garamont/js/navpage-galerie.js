$(document).ready(function(){

    $('.fm-left li').click(function() {

        $(".fm-menu-right").addClass("hide");
        var $cible = "#menu-"+ $(this).attr('id');
        $($cible).removeClass("hide");

        $(".fm-left li").removeClass("fm-menu-left");
        $(this).addClass('fm-menu-left');

        var $cibleb = "#galerie-" + $(this).attr('id');
        $(".fm-info").addClass('hide');
        $($cibleb).removeClass('hide');

    });


    $('.fm-menu-right li').click(function() {


        $(".fm-menu-right").removeClass("active-right");
        $(this).addClass('active-right');

        if( $(this).attr('id').indexOf('creation') ){

            var $cibleb = "#lacreation" + $(this).attr('id');
            $(".fm-info").addClass('hide');
            $($cibleb).removeClass('hide');
        }
    });

});