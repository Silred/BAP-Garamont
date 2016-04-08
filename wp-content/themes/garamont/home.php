<?php /* Template Name: Home  */ ?>

<?php get_header(); ?>
<div class="home-page">

<?php $query = new WP_Query(array('page_id' => 2, 'posts_per_page' => '1')); ?>
<?php while ($query->have_posts()) : $query->the_post(); ?>

    <div class="home-top"><?php the_post_thumbnail('full', array( 'class' => 'home-img-top' ))?></div>

    <div class="row  home-section-titre">
        <h2><?php the_field('titre_section_1') ?></h2>
    </div>

<?php endwhile; ?>

    <div class="my-slider">
        <ul>

            <?php $query_3 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '5', 'orderby' => 'date')); ?>
            <?php while ($query_3->have_posts()) : $query_3->the_post(); ?>

                <li>

                    <h3><?php the_title() ?></h3>

                    <div class="home-article-content">

                        <?php the_content() ?>

                    </div>

                </li>

            <?php endwhile; ?>


        </ul>
    </div>


    <?php $query = new WP_Query(array('page_id' => 2, 'posts_per_page' => '1')); ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>

        <div class="row  home-section-titre">
            <h2><?php the_field('titre_section_2') ?></h2>
        </div>

    <?php endwhile; ?>


    <div class="row">

        <?php $query_2 = new WP_Query(array('post_type' => 'galerie', 'posts_per_page' => '4', 'orderby' => 'rand')); ?>
        <?php while ($query_2->have_posts()) : $query_2->the_post(); ?>



                <a href="<?php the_permalink()?>">
                    <div class="col-md-3  no-padding">

                        <?php the_post_thumbnail('full', array( 'class' => 'home-img-crea' )) ?>

                    </div>
                </a>



        <?php endwhile; ?>

    </div>


    <?php $query = new WP_Query(array('page_id' => 2, 'posts_per_page' => '1')); ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>

        <div class="row  home-section-titre">
            <h2><?php the_field('titre_section_3') ?></h2>
        </div>

        <div class="container">

            <div class="home-content"><?php echo the_content(); ?></div>

        </div>


        <div class="row home-break">



        </div>


        <div class="row">

            <?php for($i=1; $i<5; $i++){?>

                <?php $title = 'titre_'.$i; ?>
                <?php $content = 'descritpion_'.$i; ?>

                <div class="col-md-3">

                    <h3><?php the_field($title) ?></h3>

                    <?php the_field($content) ?>

                </div>

            <?php } ?>

        </div>

    <?php endwhile; ?>


</div>


    <script src="<?php bloginfo('template_directory'); ?>/js/unslider.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.my-slider').unslider();
        });
    </script>

<?php get_footer(); ?>