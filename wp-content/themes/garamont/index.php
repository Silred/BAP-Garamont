<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 03/03/2016
 * Time: 00:38
 */
?>

<?php get_header(); ?>

<?php $my_query = new WP_Query(array('post_type' => 'membre', 'posts_per_page' => '4')); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <div class="col-md-3 <?php the_field('genre'); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
        <?php endif; ?>
        <h3>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                <?php if(get_field('age') <= 40) : ?>
                    - <?php the_field('age'); ?> ans
                <?php endif; ?>
            </a>
        </h3>
        <?php the_content(); ?>
        <?php if(get_field('adresse_mail')) : ?>
            <a href="mailto:<?php the_field('adresse_mail'); ?>" class="btn btn-warning">Envoyer un mail</a>
        <?php endif; ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
