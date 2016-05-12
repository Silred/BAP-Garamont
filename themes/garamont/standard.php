<?php /* Template Name: Standard  */ ?>

<?php get_header(); ?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

        <div class="intro-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-message">
                              <div class="std-title">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="container">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive std-thumbnail')); ?>

                <div class="std-content">

                    <?php the_content(); ?>

                </div>

            </div>

            <div class="row">

                <img src="<?php the_field('fond') ?>" class="img-responsive">

            </div>

            <div class="container">

                <div class="std-content">

                    <?php the_field('contenu'); ?>

                </div>

            </div>


        <?php endwhile; ?>

    <?php endif; ?>




<?php get_footer(); ?>