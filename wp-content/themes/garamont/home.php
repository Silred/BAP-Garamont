<?php /* Template Name: Home  */ ?>

<?php get_header(); ?>
<div class="home-page">

    <?php $query = new WP_Query(array('page_id' => 2, 'posts_per_page' => '1')); ?>
	
    <?php while ($query->have_posts()) : $query->the_post(); ?>


		<div style="margin:auto; margin-bottom:75px; margin-top: 50px; width:80%; height:500px; position: relative;">

			<svg fill="white" style="position: absolute" height="100%" width="100%" viewBox="0 0 250 100" preserveAspectRatio="none">
				<path class="path-grand" d="M0 0 L0 100 L100 100 L100 96 L4 96 L4 4 L100 4 L100 0 L0 0 Z" />
				<path class="path-grand" d="M150 0 L250 0 L250 100 L150 100 L150 96 L246 96 L246 4 L150 4 L150 0 Z" />

				<path class="path-moyen" d="M0 0 L0 100 L100 100 L100 96 L4 96 L4 4 L100 4 L100 0 L0 0 Z" />
				<path class="path-moyen" d="M150 0 L250 0 L250 100 L150 100 L150 96 L246 96 L246 4 L150 4 L150 0 Z" />

				<path class="path-petit" d="M0 0 L0 100 L100 100 L100 96 L4 96 L4 4 L100 4 L100 0 L0 0 Z" />
				<path class="path-petit" d="M150 0 L250 0 L250 100 L150 100 L150 96 L246 96 L246 4 L150 4 L150 0 Z" />
				Sorry, your browser does not support inline SVG.
			</svg>

			<div style="position: absolute; top: 7%; width:100%">
				<h1><?php the_title() ?></h1>



					<div class="home-content"><?php echo the_content(); ?></div>

			</div>
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
					<?php $argss = array( 'numberposts' => 1 );
						$recent_posts = wp_get_recent_posts( $argss );
						foreach( $recent_posts as $recent ){

							echo '<h4>'.$recent["post_title"].'</h4>';

							echo '<p>'.substr($recent["post_content"], 0, 350). ' ...</p>';
							?>
							<a href="<?php echo esc_url( get_permalink($recent["ID"]) ); ?>">Voir le reste de l'actualité.</a>
						<?php }
					?>
				<?php }?>
					
                </div>

			
				<?php if ($i == 4) {?>

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
					<div class="col-md-5 home-box-6">
					<h3 class="home-citation"><?php the_field(titre_6) ?></h3>
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


<?php get_footer(); ?>