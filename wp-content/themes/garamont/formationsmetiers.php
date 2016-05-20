<?php /* Template Name: Formations et Métiers  */ ?>

<?php get_header(); ?>

<?php
function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text))
  {
    return 'n-a';
  }
  return $text;
}
?>

<div class="fm-contenu  row">
 <?php if( have_posts() ): while( have_posts() ) : the_post(); ?>
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
	
	<div class="row">
				<div class=" col-md-3">
					<ul class="tabs">
						<li style="display:none;"><a href="#fm-first" data-toggle="tab"></a></li>
						<?php $query2 = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1','orderby'=> 'id')); ?>
						<?php while ($query2->have_posts()) : $query2->the_post(); ?>

						<li class="fm-toggle-button">
							<div class="fm-lien-toggle">
								<a  href="#formation-<?php the_ID(); ?>" data-toggle="tab"><?php the_title();?></a>
							</div>
							<?php $metiers = get_field('metiers');?>
							<?php if ($metiers): ?>
							<ul>
								<?php foreach ($metiers as $post) : ?>
									<?php setup_postdata($post); ?>
								<li><a href="#metier-<?php the_ID(); ?>" data-toggle="tab"><?php the_title(); ?></a></li>
								<?php endforeach; ?>
								<?php wp_reset_postdata(); ?>
							</ul>
						</li>
						<?php endif; endwhile; ?>
					</ul>
				</div>
				
				<div class="col-md-9">
                        <div class="tabs-content">

						<section id="fm-first" class="fm-content active  wow bounceInRight">
							<?php the_content();?>
						</section>

						<?php $query3 = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1','orderby'=> 'id')); ?>		
						<?php while ($query3->have_posts()) : $query3->the_post(); ?>

							<section class="fm-content wow bounceInRight" id="formation-<?php the_ID();?>">
								<div class="fm-box-content">
									<h3><?php the_title(); ?></h3>
									
									<?php the_content(); ?>
									
									<img class="fm-icone" src="<?php the_field(icone); ?>" alt="" />
								</div>
								
								<img class="fm-img" src="<?php the_field(image); ?>" alt="" />
								
								<div class="fm-content-info">
									<?php the_field(info_inscription) ?>
									
								</div>
								
								<a class="fm-button-info" href="<?php the_field(bouton_inscription) ?>">Inscription</a>
								
								<div class="container-fluid">
									<div class="fm-box-info col-md-4">
										<?php the_field(info_1) ?>
									</div>

									<div class="fm-box-info col-md-4">
										<?php the_field(info_2) ?>
									</div>

									<div class="fm-box-info col-md-4">
										<?php the_field(info_3) ?>
									</div>
								</div>
							</section>
						
						<?php endwhile; ?>

						<?php $query4 = new WP_Query(array('post_type' => 'metiers', 'posts_per_page' => '-1','orderby'=> 'id')); ?>
						<?php while ($query4->have_posts()) : $query4->the_post(); ?>

							<section class="fm-content wow bounceInRight" id="metier-<?php the_ID();?>">
								<?php the_title(); ?>
								<?php the_content(); ?>
							</section>

						<?php endwhile; ?>		
					</div>
				</div>

<?php endwhile; endif; ?>
	</div>
</div>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-tabs.min.js"></script>
	<script>
		$(function() {
			$('.tabs').tabs();
		});
	</script>
	

<?php get_footer(); ?>