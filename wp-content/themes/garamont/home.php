<?php /* Template Name: Home  */ ?>

<?php get_header(); ?>

<div class="video">
	<button id="video-button">Passer l'introduction</button>
	<video id="videoplay" autoplay>
		<source src="<?php bloginfo('template_directory'); ?>/img/video.mp4" type="video/mp4">
	</video>
</div>

<div class="home-page">


    <?php $query = new WP_Query(array('page_id' => 8, 'posts_per_page' => '1')); ?>
	
    <?php while ($query->have_posts()) : $query->the_post(); ?>
		<div class="home-titre" style="background-image: url('<?php the_field(image); ?>');">
				<h1><?php the_field(titre); ?></h1>
				<div class="home-content"><?php echo the_content(); ?></div>
		</div>

        <div class="row">

            <?php for($i=1; $i<7; $i++){?>
				
				<?php if ($i == 5 || $i == 6 ) {?>
					<div class="row"></div>
				<?php } ?>
			
                <?php $title = 'titre_'.$i; ?>
				<?php $img = 'image_'.$i; ?>
                <?php $content = 'descritpion_'.$i; ?>

                <div class="<?php if($i == 1 || $i == 2 || $i == 3 || $i == 4) { ?> home-box col-md-6 <?php if ($i == 1 || $i == 2) { ?>bounceInLeft  wow<?php }else if ($i == 3 || $i == 4) { ?> bounceInRight  wow <?php }}else if ($i == 5) { ?>col-md-2<?php }else if ($i == 6) { ?>col-md-5 col-md-offset-1  bounceInLeft  wow<?php } ?> home-box-<?php echo $i; ?>">


					<?php if($i == 1 || $i == 2 || $i == 3 || $i == 4) { ?>
						<div class="col-md-8">
							<h3><?php the_field($title) ?></h3>
							<p><?php the_field($content) ?></p>
						</div>
						<div class="col-md-2">
							<img src="<?php the_field($img)?>" alt="<?php echo $titre?>"/>
						</div>
						
					<?php } else { ?>
						<h3><?php the_field($title) ?></h3>
						<img src="<?php the_field($img)?>" alt="<?php echo $titre?>"/>
						<p><?php the_field($content) ?></p>
					<?php } ?>
					
				<?php if ($i == 6) {?>
					<?php $argss = array( 'numberposts' => 1 );
						$recent_posts = wp_get_recent_posts( $argss );
						foreach( $recent_posts as $recent ){

							echo '<h4>'.$recent["post_title"].'</h4>';

							echo '<p>'.substr($recent["post_content"], 0, 350). ' ...</p>';
							?>
							<a href="<?php echo esc_url( get_permalink(159)); ?>">Voir le reste de l'actualité.</a>
						<?php }
					?>
				<?php }?>
					
                </div>

			
				<?php if ($i == 5) {?>

					<?php $query2 = new WP_Query(array('post_type' => 'creation', 'orderby' => 'rand')); ?>
			
					<?php if( have_posts() ): 
						for($id_img=1; $id_img<6; $id_img++) { 
							 $query2->the_post();
						?>
						<?php if ($id_img == 3) {?>
							<div class="row"></div>
						<?php } ?>
						<div class="col-md-<?php if ($id_img == 1 || $id_img == 2) { ?>5<?php } else { ?>4<?php } ?> home-img">
							<?php $id_crea = get_the_ID (); ?>
							<a href="<?php echo esc_url( get_permalink($id_crea) ); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
					<?php } 
					endif;  $query->reset_postdata();?>
				<?php }?>
			
			
            <?php } ?>
					<div class="col-md-5 home-box-7 bounceInRight  wow">
					<h3 class="home-citation"><?php the_field(titre_7) ?></h3>
					 <?php query_posts('orderby=rand&showposts=1&post_type=temoignage'); ?>
					  <?php while (have_posts()): the_post(); ?>
						<div class="home-citation-fond" style="background-image: url('<?php the_field(image_citation); ?>'); background-position: center center; background-repeat: no-repeat;">
						
						<h4><?php the_field(citation); ?></h4>
						<h5><?php the_field(nom_et_prenom); ?></h5>
					  <?php endwhile; ?>
					 <?php $query->reset_postdata();?>
					</div>	
			</div>
		</div>

    <?php endwhile; ?>


</div>


    <script src="<?php bloginfo('template_directory'); ?>/js/unslider.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/js/video.js"></script>


<?php get_footer(); ?>