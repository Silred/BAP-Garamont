<?php /* Template Name: Actualité */ ?>

<?php get_header(); ?>


<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<div class="row">

    <div class="fm-header" style="background-image: url('<?php the_field('image')?>');">

        <div style="margin:auto; padding-top: 25px; width:95%; height:400px; position: relative;">



            <div style="position: absolute; top: 40%; left: 5%; width:40%">
                <h2><?php the_field('titre');?></h2>

                <h1><?php the_title(); ?></h1>

            </div>
        </div>
    </div>
</div>

    <?php endwhile; ?>

<?php endif; ?>


<div class="actualite-contenu">


<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
$args = array (
'nopaging'               => false,
'paged'                  => $paged,
'posts_per_page'         => '3',
);

// The Query
$query = new WP_Query( $args ); ?>




        <?php if ( $query->have_posts() ) { ?>

            <div class='container  actu-link'>

                <?php
                    previous_posts_link( 'Plus récents' );
                ?>

            </div>

    <div class="post-content-actualite">
        <?php
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>

                <div class="std-page-content  wow  bounceInRight container">

                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large', array('class' => 'img-responsive') );
                    }
                    ?>

                    <h3 class="titre-article"> <?php the_title(); ?> </h3>

                    <div class="content-article">

                        <?php the_content(); ?>

                    </div>

                </div>
                </div>

                <?php } ?>

                <div class='container actu-link'>

                    <?php
                        next_posts_link('Précèdents ', $query->max_num_pages);
                    ?>

                </div>

                <?php
            } else {
    // no posts found
    echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
    }

    // Restore original Post Data
    wp_reset_postdata(); ?>

</div>
<?php get_footer(); ?>
