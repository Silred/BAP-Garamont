$(document).ready(function(){

    $('.navbar-fixed-top').addClass('navbar-static-top');

    $('.navbar-static-top').removeClass('navbar-fixed-top');


    $('.fm-left li').click(function() {

        $(".fm-menu-right").addClass("hide");
        var $cible = "#menu-"+ $(this).attr('id');
        $($cible).removeClass("hide");

        $(".fm-left li").removeClass("fm-active-left");
        $(this).addClass('fm-active-left');

        var $cibleb = "#laformation-" + $(this).attr('id');
        $(".fm-info").addClass('hide');
        $($cibleb).removeClass('hide');

        var $ciblec = "#formation-" + $(this).attr('id');
        $(".fm-menu-right li").removeClass("fm-active-right");

        $($ciblec).addClass('fm-active-right');

    });


    $('.fm-menu-right li').click(function() {


        $(".fm-menu-right li").removeClass("fm-active-right");
        $(this).addClass('fm-active-right');

        if( $(this).attr('id').indexOf('metier') ){

            var $cibleb = "#la" + $(this).attr('id');
            $(".fm-info").addClass('hide');
            $($cibleb).removeClass('hide');
        }

        else {
            var $ciblec = "#le" + $(this).attr('id');
            $(".fm-info").addClass('hide');
            $($ciblec).removeClass('hide');
        }
    });

});