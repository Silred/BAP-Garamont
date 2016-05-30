<?php /* Template Name: Galerie et création  */ ?>

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


<div id="myDiv"></div>

<div class="gc-content">

	<div style="margin:auto; margin-bottom:75px; margin-top: 50px; width:80%; height:500px; position: relative;">

		<div style="position: absolute; top: 7%; width:100%">


			<h1>Galerie des créations</h1>

			<div class="gc-sous-titre">	</div>

		</div>
	</div>


<div class="content"></div>
	<div class="container">
		<div class="col-md-5">
			<div id="gc-domaine">
				<?php

				function replace_id_for_slug($option){
					$categories = get_categories("hide_empty=0");

					preg_match('/value="(\d*)"/', $option[0], $matches);

					$id = $matches[1];

					$slug = "";

					foreach($categories as $category){
						if($category->cat_ID == $id){
							$slug = $category->slug;
						}
					}
					
					return preg_replace("/value=\"(\d*)\"/", "value=\"$slug\"", $option[0]);
				}

				$select = wp_dropdown_categories("show_option_none=Domaine&child_of=2&hierarchical=1&hide_empty=0&echo=0");

				$select = preg_replace_callback("#<option[^>]*>[^<]*</option>#", "replace_id_for_slug", $select);

				echo $select;

				?>
			</div>
			<div id="gc-theme">
				<?php

				$select = wp_dropdown_categories("show_option_none=Thème&child_of=5&hierarchical=1&hide_empty=0&echo=0");

				$select = preg_replace_callback("#<option[^>]*>[^<]*</option>#", "replace_id_for_slug", $select);

				echo $select;
				
				?>
			</div>
			<select class="form-control gc-form-control">
				<?php
					for($i=date('Y');$i>1999; $i--) {
						echo "<option>".$i."</option>";
					}
				?>
			</select>	
		</div>
		
		<div class="col-md-2 col-md-offset-3">
		</div>
	</div>
	
	<div class="gc-box col-md-2">
		<h3><?php the_field(titre_date); ?></h3>
		<p><?php the_field(contenu_texte); ?></p>
	</div>
	
	<?php $query2 = new WP_Query(array('post_type' => 'creation', 'orderby' => 'date')); ?>
			
	<?php if( have_posts() ): 
		$id_img = 1;
		while($query2->have_posts()) { 
			$query2->the_post();
			$categories = get_the_category();
	?>
			<?php if ($id_img == 3) {?>
				<div class="row"></div>
			<?php } ?>
			<div class="col-md-<?php if ($id_img == 1 || $id_img == 2) { ?>5<?php } else { ?>4<?php } ?> gc-img
						<?php foreach ( $categories as $category ) { echo $category->slug." "; } ?> ">
				<?php $id_crea = get_the_ID ();
					  $thumb_id = get_post_thumbnail_id();
					  $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
					?>
				
				<a href="<?php echo $thumb_url[0]; ?>" data-toggle="lightbox">
					<?php the_post_thumbnail('full'); ?>
				</a>
			</div>
		<?php 
		$id_img ++;
		} 
	endif;  
	
	$query2->reset_postdata();
	
	?>	
	<div class="row"></div>
	
</div>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/navpage-galerie.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.js"></script>
<script type="text/javascript">
	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	}); 
</script>
<?php get_footer(); ?>