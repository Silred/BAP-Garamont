<?php /* Template Name: Métiers et Formations */ ?>

<?php get_header(); ?>

<div class="metier-contenu  container">
    <div class="row">
        <div class="col-md-6">

            <ul>

            <?php $my_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '20')); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>


                <li>
                    <?php the_title(); ?>
                </li>

            <?php endwhile; ?>


            </ul>

        </div>

        <div class="col-md-6">

            <?php $my_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '20')); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                <div class="col-md-12">

                    <ul>

                <?php $query = new WP_Query(array('post_type' => 'metiers', 'posts_per_page' => '20')); ?>
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