<?php /* Template Name: Métiers et Formations */ ?>

<?php get_header(); ?>

<div class="work-contenu  row">

       <div class="col-md-2"></div>
       <div class="col-md-6">

            <?php $nb = 0 ?>

            <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
            <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>

                <?php $nb = $nb + 1 ?>

                <div class="work-info  hide" id="mf<?php echo $nb ?>">
                    <?php the_title(); ?>
                </div>

            <?php endwhile; ?>

            <?php $nb = 0 ?>

            <?php $query = new WP_Query(array('post_type' => 'metiers', 'category_name' => $cat , 'posts_per_page' => '-1')); ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>

                <?php $nb = $nb +1 ?>

                <div class="work-info  hide" id="infom<?php echo $nb ?>">
                    <?php the_title(); ?>
                </div>

            <?php endwhile; ?>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6  work-left  work-liste">

                    <ul>

                        <?php $nb = 0 ?>

                        <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
                        <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>

                            <?php $nb = $nb + 1 ?>

                            <li class="" id="<?php echo $nb ?>">
                                <?php the_title(); ?>
                            </li>

                        <?php endwhile; ?>


                    </ul>

                </div>

                <div class="col-md-6  work-liste">

                    <?php $nb = 0 ?>

                    <?php $my_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <?php $nb = $nb + 1 ?>

                        <?php $cat = get_field('category'); ?>

                        <div class="row">

                            <div class="col-md-12  work-menu-right  hide" id="menu-<?php echo $nb ?>">

                                <ul>

                                    <li id="f<?php echo $nb ?>">
                                        La formation
                                    </li>

                                    <?php $int = 0 ?>

                                    <?php $query = new WP_Query(array('post_type' => 'metiers', 'category_name' => $cat , 'posts_per_page' => '-1')); ?>
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                                        <?php $int = $int + 1 ?>

                                        <li id="m<?php echo $int ?>">
                                            <?php the_title(); ?>
                                        </li>

                                    <?php endwhile; ?>

                                </ul>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/navpage.js"></script>

<?php get_footer(); ?>