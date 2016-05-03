<?php /* Template Name: Home  */ ?>

<?php get_header(); ?>
<div class="home-page">

    <?php $query = new WP_Query(array('page_id' => 2, 'posts_per_page' => '1')); ?>
	
    <?php while ($query->have_posts()) : $query->the_post(); ?>

		<h1><?php the_title() ?></h1>
	
        <div class="container">

            <div class="home-content"><?php echo the_content(); ?></div>

        </div>
        

        <div class="row">

            <?php for($i=1; $i<6; $i++){?>
				
				<?php if ($i == 4 || $i == 5 ) {?>
					<div class="row"></div>
				<?php } ?>
			
                <?php $title = 'titre_'.$i; ?>
				<?php $img = 'image_'.$i; ?>
                <?php $content = 'descritpion_'.$i; ?>

                <div class="<?php if($i == 1 || $i == 2 || $i == 3) { ?>col-md-offset-1 home-box <?php if ($i == 1) { ?>col-md-4<?php }else if ($i == 2 || $i == 3) { ?>col-md-2<?php }}else if ($i == 4) { ?>col-md-2<?php }else if ($i == 5) { ?>col-md-5 col-md-offset-1<?php } ?> home-box-<?php echo $i; ?>">

                    <h3><?php the_field($title) ?></h3>
					<img src="<?php the_field($img)?>" alt="<?php echo $titre?>"/>
					<p><?php the_field($content) ?></p>
					
			
					<?php if ($i == 5) {?>
						<?php $args = array( 'numberposts' => '1' , 'post_type' => 'post', );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){
								the_post();
								the_title();
								$id_post = get_the_ID ();
								$content_art = get_the_content();
								echo '<p>'.substr($content_art, 0, 200).'</p>';
								?>
								<a href="<?php echo esc_url( get_permalink($id_post) ); ?>">Voir la suite</a>
							<?php }		
						?>
						<?php $query->reset_postdata();?>
					<?php }?>	
					
                </div>

			
				<?php if ($i == 4) {?>
					<?php $query2 = new WP_Query('post_type=creation'); ?>
			
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
					<div class="col-md-5 col-md-offset-1 home-box-6">
					<h3 class="home-citation"><?php the_field(titre_6) ?></h3>
					 <?php query_posts('orderby=rand&showposts=1&post_type=citation'); ?>
					  <?php while (have_posts()): the_post(); ?>
						<div class="home-citation-fond" style="background-image: url('<?php the_field(image_citation); ?>')">
						
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


<?php get_footer(); ?>