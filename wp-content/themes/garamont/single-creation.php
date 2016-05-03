<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 08/04/2016
 * Time: 00:54
 */
?>

<?php get_header(); ?>

    <section>
        <div class="container-fluid">
            <div class="icon-comp"><i class="fa fa-cogs"></i></div>
            <?php if( have_posts() ): while( have_posts() ) : the_post(); ?>
                <div class="crea-contenu">
                    
					<div id="crea-carousel" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner" role="listbox">
	
							<?php		
								$args = array( 
									'post_type'   => 'attachment', 
									'numberposts' => -1, 
									'post_status' => null, 
									'post_parent' => get_queried_object_id()
								); 

								$attachments = get_posts( $args ); 

								if ( $attachments ) { 

									foreach ( $attachments as $key=>$attachment ) { 
						  				?>
										<div class="item <?php if($key == 0) echo 'active'; ?>">
											<?php 
												echo wp_get_attachment_image( $attachment->ID, 'full' );
											?>
						  				</div>
						  			<?php
									} 
								}
						  ?>
							
						</div>
						  <a class="left carousel-control" href="#crea-carousel" role="button" data-slide="prev">
							  <
						  </a>
						  <a class="right carousel-control" href="#crea-carousel" role="button" data-slide="next">
							  >
						  </a>		
					</div>
								

					<h1 id="crea-titre_page"><?php the_title();?></h1>
					<div class="col-md-8">
                    	<?php the_field('description');?>
					</div>
					<div class="col-md-3">
						<div class="container">
							<h2><a href="<?php echo get_permalink(creation); ?>">Toutes les autres créations</a></h2>
							<div class="row">
							<?php $id_creation = get_the_id(); ?>
							<?php $my_query2 = new WP_Query(array('orderby' => 'rand','post_type' => 'creation','posts_per_page' => '3', 'post__not_in' => array( $id_creation ))); ?>
							<?php while ($my_query2->have_posts()) : $my_query2->the_post(); ?>
									<div class="projet">
										<a href="<?php the_permalink(); ?>">
												   <?php the_post_thumbnail('medium', array('class' => 'img-responsive img-portfolio')); ?>
										</a>
									</div>
							<?php endwhile;?>
							</div>
						</div>
					</div>
					
                </div>
            <?php endwhile; endif; ?>
        </div>
    </section>
<script type="text/javascript">

	$('.carousel').carousel()
	
</script>
<?php get_footer(); ?>