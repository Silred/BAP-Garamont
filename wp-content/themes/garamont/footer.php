<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 03/03/2016
 * Time: 00:43
 */
?>

<div class="row  footer">
    Copyright Lycée Claude Garamont @ 2016 All rights reserved
</div>

<script>
    jQuery(function($) {

        $('.navbar-toggle').click(function() {

            if($('.dropdown').hasClass('open')){
                $('.dropdown').removeClass('open'); // Close
            }
            else{

                $('.dropdown').addClass('open'); // Opens the dropdown

            }
            });



    });
</script>

</body>

</html>
