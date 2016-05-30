 <?php /* Template Name: Standard  */ ?>

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

            <div class="container  std-page-content  wow  bounceInRight">

                <div class="std-content">

                    <?php the_content(); ?>

                </div>

            </div>


        <?php endwhile; ?>

    <?php endif; ?>




<?php get_footer(); ?>