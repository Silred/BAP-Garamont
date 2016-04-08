<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 08/04/2016
 * Time: 00:54
 */
?>

<?php get_header(); ?>

    <section>
        <div class="container-fluid">
            <div class="icon-comp"><i class="fa fa-cogs"></i></div>
            <?php if( have_posts() ): while( have_posts() ) : the_post(); ?>
                <div class="contenu">
                    <h1 id="titre_page"><?php the_title();?></h1>
                    <?php the_content();?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </section>

<?php get_footer(); ?>