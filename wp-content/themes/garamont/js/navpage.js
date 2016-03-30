$(document).ready(function(){

    $('.work-left li').click(function() {

        $(".work-menu-right").addClass("hide");
        var $cible = "#menu-"+ $(this).attr('id');
        $($cible).removeClass("hide");

        $(".work-left li").removeClass("work-menu-left");
        $(this).addClass('work-menu-left');

        var $cibleb = "#laformation-" + $(this).attr('id');
        $(".work-info").addClass('hide');
        $($cibleb).removeClass('hide');

    });


    $('.work-menu-right li').click(function() {


        $(".work-menu-right").removeClass("active-right");
        $(this).addClass('active-right');

        if( $(this).attr('id').indexOf('metier') ){

            var $cibleb = "#la" + $(this).attr('id');
            $(".work-info").addClass('hide');
            $($cibleb).removeClass('hide');
        }

        else {
            var $ciblec = "#le" + $(this).attr('id');
            $(".work-info").addClass('hide');
            $($ciblec).removeClass('hide');
        }
    });

});