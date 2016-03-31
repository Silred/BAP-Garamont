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

       <div class="col-md-2"></div>
       <div class="col-md-6">


            <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
            <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>

                <div class="fm-info  hide" id="laformation-<?php echo slugify(get_the_title()) ?>">
                    <h2><?php the_title(); ?></h2>
                </div>

            <?php endwhile; ?>

            <?php $query = new WP_Query(array('post_type' => 'metiers', 'posts_per_page' => '-1')); ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>

                <div class="fm-info  hide" id="lemetier-<?php echo slugify(get_the_title()) ?>">
                    <h2><?php the_title(); ?></h2>
                </div>

            <?php endwhile; ?>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6  fm-left  fm-liste">

                    <ul>

                        <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
                        <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>

                            <div class="fm-menu-left">

                                <li id="<?php echo slugify(get_the_title()) ?>">
                                    <?php the_title(); ?>
                                </li>

                            </div>

                        <?php endwhile; ?>


                    </ul>

                </div>

                <div class="col-md-6  fm-liste">

                    <?php $my_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <?php $cat =  slugify(get_the_title()); ?>

                        <div class="row">

                            <div class="col-md-12  fm-menu-right  hide" id="menu-<?php echo slugify(get_the_title()) ?>">

                                <ul>

                                    <li id="formation-<?php echo slugify(get_the_title()) ?>">
                                        La formation
                                    </li>

                                    <?php $query = new WP_Query(array('post_type' => 'metiers', 'category_name' => $cat , 'posts_per_page' => '-1')); ?>
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                                        <li id="metier-<?php echo slugify(get_the_title()) ?>">
                                            <?php the_title(); ?>
                                        </li>

                                    <?php endwhile; ?>

                                </ul>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/navpage.js"></script>

<?php get_footer(); ?>