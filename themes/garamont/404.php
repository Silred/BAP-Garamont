<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 03/03/2016
 * Time: 00:40
 */
?>
<?php get_header(); ?>

    <div id="subnav">
        <div id="pages">

            <ul>
                <?php if (get_option('evid_home_link') == 'on') { ?>
                    <li><a href="<?php bloginfo('url'); ?>" title="home again woohoo"><?php _e('Home','eVid') ?></a></li>
                <?php }; ?>
                <?php if (get_option('evid_swap_navbar') == 'false') { ?>
                    <?php echo $page_menu; ?>
                <?php } else { ?>
                    <?php if ($category_menu <> '<li>No categories</li>') echo($category_menu); ?>
                <?php } ?>
                <li><a title="Lycée GARAMONT" href="https://Lycéegaramont.com/" rel="tag"></a></li>
            </ul>
            <div>
                <div id="search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper2">

    <div id="container">



          <div class="block404">

            <div class="erreur404">

                <h1 class="h404">Erreur 404</h1>
                <div style="color: #efefef;font-size: 110%;">Oups, ceci est une erreur dite 404 ! En termes simples, la page ne peut être trouvée... Je vous invite dès à présent à utiliser les outils de recherche et / ou de navigation pour parvenir au contenu souhaité.</div>

            </div>

          <div class="erreursuite">


                <h2>Aller sur nos autre page :</h2>
                <ul>
                    <?php query_posts("orderby=comment_count&showposts=10&caller_get_posts=1");
                    while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','eVid'), get_the_title()) ?>">
                             <?php the_title() ?>
                            </a></li>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>

                <h2> ou Retourner à la page d'accueil</h2>
                <p>Cliquez simplement sur le bandeau en haut de la page.</p>
             </div>
            </div>
    </div>
    </div>

    </body>
    </html>

<?php get_footer(); ?>