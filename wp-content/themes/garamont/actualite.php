<?php /* Template Name: Actualité */ ?>

<?php get_header(); ?>

<div class="actualite-contenu">
    <div class="image-actualite row" style="background-image: url('<?php the_field('image');?>')">
        <h1 id="title-actualite"><?php the_title();?></h1>
    </div>    
    <?php the_post_thumbnail ( $size = 'post-thumbnail', $attr = '' ) ?>

<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
$args = array (
'nopaging'               => false,
'paged'                  => $paged,
'posts_per_page'         => '3',
'post_type'              => 'post',
);

// The Query
$query = new WP_Query( $args ); ?>


        <?php if ( $query->have_posts() ) {
            echo "<div style=\"margin: 2%; \">";
        previous_posts_link( '<- Nouvelle Actualité' );
            echo "</div>";
        // The Loop
        ?>

    <div class="post-content-actualite">
        <?php
            while ( $query->have_posts() ) {
            $query->the_post();
                // post stuff here
                echo '<h2>' . get_the_title() . '</h2>';
                echo '<h2>' . get_the_post_thumbnail() . '</h2>';
                echo '<p>'  . get_the_content() . '</p>';
            }
        ?>
    </div>

        <?php echo "<div style=\"margin: 2%; \">";
        next_posts_link( 'Older Entries ->', $query->max_num_pages );
            echo "</div>";
        ?>

    <?php
    } else {
    // no posts found
    echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
    }

    // Restore original Post Data
    wp_reset_postdata(); ?>

</div>
<?php get_footer(); ?>
