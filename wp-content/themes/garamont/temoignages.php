<?php /* Template Name: Témoignages */ ?>

<?php get_header(); ?>






<div class="row">

    <div class="fm-header" style="background-image: url('<?php the_field('image')?>');">

        <div style="margin:auto; padding-top: 25px; width:95%; height:400px; position: relative;">

            <svg fill="white" style="position: absolute" height="100%" width="100%" viewBox="0 0 250 100" preserveAspectRatio="none">
                <path class="path-grand" d="M0 0 L0 100 L100 100 L100 96 L4 96 L4 4 L100 4 L100 0 L0 0 Z" />
                <path class="path-grand" d="M150 0 L250 0 L250 100 L150 100 L150 96 L246 96 L246 4 L150 4 L150 0 Z" />


                Sorry, your browser does not support inline SVG.
            </svg>

            <div style="position: absolute; top: 40%; left: 5%; width:40%">
                <h2><?php the_field('titre');?></h2>

                <h1><?php the_title(); ?></h1>

            </div>
        </div>
    </div>


    <div class="temoignage-contenu">





        <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
        $args = array (
            'nopaging'               => false,
            'paged'                  => $paged,
            'posts_per_page'         => '6',
            'post_type'              => 'temoignage',
        );

        // The Query
        $query = new WP_Query( $args ); ?>
    <div class="container">
        <div class="row">

        <?php
        if ( $query->have_posts() ) {
            echo "<div style=\"margin: 2%; \">";
            previous_posts_link( '<- Nouveaux Témoingnages' );
            echo "</div>";
            ?>


            <?php
            $temoingnage=0;
            while ( $query->have_posts() ) {
                $query->the_post();
                // post stuff here
                $temoingnage=$temoingnage+1;
                ?>

             <div class="col-md-6">
                 <button type="button" class="button-temoingnage" data-toggle="modal" data-target="#myModal<?php echo $temoingnage;?>">
                <div class="post-content-temoignage" style="background-image: url('<?php the_field('image_button'); ?>'); ">


                        <h2><?php echo get_the_title(); ?></h2>
                        <h2><?php echo get_the_post_thumbnail(); ?></h2>
                        <p><?php echo substr( get_the_content(), 0, 100); ?></p>


                    </div>
                 </button>
             </div>


                <!-- Modal -->
              <div class="pop-up">
                <div class="modal fade" id="myModal<?php echo $temoingnage;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo get_the_title(); ?></h4>
                            </div>
                            <div class="modal-body">
                                <p><?php echo get_the_content(); ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                  </div>
            <?php } ?>


        </div>
      </div>



            <?php
            echo "<div style=\"margin: 2%; \">";
            next_posts_link( 'Ancien Témoingnages ->', $query->max_num_pages );
            echo "</div>";

        } else {
// no posts found
            echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
        }

        // Restore original Post Data
        wp_reset_postdata(); ?>

    </div>
    <?php get_footer(); ?>
