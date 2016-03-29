<?php /* Template Name: Métiers et Formations */ ?>

<?php get_header(); ?>

<div class="work-contenu  container-fluid">
    <div class="row">
        <div class="col-md-6">

            <ul>

            <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
            <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>


                <li>
                    <?php the_title(); ?>
                </li>

            <?php endwhile; ?>


            </ul>

        </div>

        <div class="col-md-6">

            <?php $my_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                <?php $cat = get_field('category'); ?>
                <div class="col-md-12">

                    <?php the_title(); ?>

                    <ul>

                <?php $query = new WP_Query(array('post_type' => 'metiers', 'category_name' => $cat , 'posts_per_page' => '-1')); ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <li>
                        <?php the_title(); ?>
                    </li>

                <?php endwhile; ?>

                    </ul>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>