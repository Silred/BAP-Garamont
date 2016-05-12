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
                    
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner" role="listbox">
									
							<?php if ( $post->post_type == 'galerie' && $post->post_status == 'publish' ) {
									$attachments = get_posts( array(
										'post_type' => 'attachment',
										'posts_per_page' => -1,
										'post_parent' => $post->ID,
										'exclude'     => get_post_thumbnail_id()
									) );

									if ( $attachments ) {
										foreach ( $attachments as $key=>$attachment ) {
											?>
											<div class="item <?php if($key == 0) echo 'active';?>">
											<?php
											$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
											$title = wp_get_attachment_link( $attachment->ID, 'crea-album-grid', true );
											echo '<li class="' . $class . ' crea-album-grid">' . $title . '</li>';
											echo '</div>';
										}

									}
								}
							?>
							
						</div>
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						>
					  </a>		
					</div>
					<h1 id="crea-titre_page"><?php the_title();?></h1>
					<div class="col-md-8">
                    	<?php the_content();?>
					</div>
					<div class="col-md-3">
						<div class="container">
							<h2>Tous les autres créations</h2>
							<div class="row">
							<?php $id_galerie = get_the_id(); ?>
							<?php $my_query2 = new WP_Query(array('post_type' => 'galerie','posts_per_page' => '4', 'post__not_in' => array( $id_art ))); ?>
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