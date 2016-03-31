$(document).ready(function(){

    $('.fm-left li').click(function() {

        $(".fm-menu-right").addClass("hide");
        var $cible = "#menu-"+ $(this).attr('id');
        $($cible).removeClass("hide");

        $(".fm-left li").removeClass("fm-menu-left");
        $(this).addClass('fm-menu-left');

        var $cibleb = "#laformation-" + $(this).attr('id');
        $(".fm-info").addClass('hide');
        $($cibleb).removeClass('hide');

    });


    $('.fm-menu-right li').click(function() {


        $(".fm-menu-right").removeClass("active-right");
        $(this).addClass('active-right');

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