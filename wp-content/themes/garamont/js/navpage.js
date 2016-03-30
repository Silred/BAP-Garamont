$(document).ready(function(){

    $('.work-left li').click(function() {

        $(".work-menu-right").addClass("hide");
        var $cible = "#menu-"+ $(this).attr('id');
        $($cible).removeClass("hide");

        $(".work-left li").removeClass("work-menu-left");
        $(this).addClass('work-menu-left');

        var $cibleb = "#mf" + $(this).attr('id');
        $(".work-info").addClass('hide');
        $($cibleb).removeClass('hide');

    });


    $('.work-menu-right li').click(function() {


        $(".work-menu-right").removeClass("active-right");
        $(this).addClass('active-right');

        if( $(this).attr('id').indexOf('m') ){

            var $cibleb = "#m" + $(this).attr('id');
            console.log($cibleb);
            $(".work-info").addClass('hide');
            $($cibleb).removeClass('hide');
        }

        else {
            var $cibleb = "#info" + $(this).attr('id');
            $(".work-info").addClass('hide');
            $($cibleb).removeClass('hide');
        }
    });

});