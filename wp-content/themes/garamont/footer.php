<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 03/03/2016
 * Time: 00:43
 */
?>

<div class="row  footer">

    <div class="col-md-1"></div>
    <div class="col-md-3">

        <h3>Liens utiles</h3>

        <a href="http://www.ac-versailles.fr/public/jcms/c_5012/accueil">Académie de Versailles</a>
        <a href="http://www.admission-postbac.fr/">APB (Admission Post Bac)</a>
        <a href="https://0922427n.index-education.net/pronote/">Pronote</a>
        <a href="http://www.7etapespourtrouverunstage.com/entrainement.html">Trouver un stage</a>

    </div>


    <div class="col-md-8"></div>

    <div class="col-md-12">
        <p>Copyright Lycée Claude Garamont @ 2016 All rights reserved</p>
    </div>




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
