 <?php /* Template Name: Standard  */ ?>

<?php get_header(); ?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

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