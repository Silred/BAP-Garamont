<?php /* Template Name: Témoignages */ ?>


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
        'posts_per_page'         => '6',
        'post_type'              => 'temoignage'
    );

    // The Query
    $query = new WP_Query( $args );
    $i = 0;
    ?>




    <?php if ( $query->have_posts() ) { ?>

        <div class='container  actu-link'>

            <?php
            previous_posts_link( 'Plus récents' );
            ?>

        </div>

        <div class="post-content-actualite">
        <?php while ( $query->have_posts() ) { $query->the_post(); ?>

            <a data-toggle="modal" data-target="#<?php echo $i ?>">
            <div class="col-md-4 col-md-offset-2  tem-box  wow <?php if ($i%2 == 0){?>bounceInLeft<?php } else{?>bounceInRight<?php } ?>"  style="background-image: url('<?php the_field(image_citation); ?>'); background-position: center center; background-repeat: no-repeat;">

                <h4><?php the_field(citation); ?></h4>

            </div>
            </a>

            <div class="modal fade" id="<?php echo $i ?>" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><?php the_title(); ?></h4>
                        </div>
                        <div class="modal-body">

                            <img class="img-responsive" src="<?php the_field(image_citation); ?>" alt="<?php the_title();?>">

                            <?php the_content(); ?>

                        </div>
                    </div>

                </div>
            </div>


        <?php
        $i = $i + 1 ;
        }
        ?>

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
