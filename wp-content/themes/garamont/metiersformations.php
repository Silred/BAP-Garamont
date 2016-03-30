<?php /* Template Name: Métiers et Formations */ ?>

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

<div class="work-contenu  row">

       <div class="col-md-2"></div>
       <div class="col-md-6">


            <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
            <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>

                <div class="work-info  hide" id="laformation-<?php echo slugify(get_the_title()) ?>">
                    <?php the_title(); ?>
                </div>

            <?php endwhile; ?>

            <?php $query = new WP_Query(array('post_type' => 'metiers', 'posts_per_page' => '-1')); ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>

                <div class="work-info  hide" id="lemetier-<?php echo slugify(get_the_title()) ?>">
                    <?php the_title(); ?>
                </div>

            <?php endwhile; ?>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6  work-left  work-liste">

                    <ul>

                        <?php $f_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
                        <?php while ($f_query->have_posts()) : $f_query->the_post(); ?>

                            <li class="" id="<?php echo slugify(get_the_title()) ?>">
                                <?php the_title(); ?>
                            </li>

                        <?php endwhile; ?>


                    </ul>

                </div>

                <div class="col-md-6  work-liste">

                    <?php $my_query = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '-1')); ?>
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <?php $cat = get_field('category'); ?>

                        <div class="row">

                            <div class="col-md-12  work-menu-right  hide" id="menu-<?php echo slugify(get_the_title()) ?>">

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