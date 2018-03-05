<?php /* Template Name: HomeTemplate */ ?>
<?php

get_header();
?>

        <container class="content-sidebar_container">
            <container class="modelbox_container">
                <div class="home_content"><h2 class="single_title">Front page content</h2></div>
            <?php //NEWEST MODELS
            $new_loop = new WP_Query( array(
                'post_type' => 'model',
                'posts_per_page' => 2 // put number of posts that you'd like to display
            ) );
            ?>

            <?php if ( $new_loop->have_posts() ) : ?>
                <?php while ( $new_loop->have_posts() ) : $new_loop->the_post();
                     echo '<a title="';
                     the_title_attribute();
                     echo '" href="';
                     the_permalink();
                     echo '">';

                     echo '<div class="modelbox" style="background:';
                     if ( has_post_thumbnail() ) {
                         echo 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(\'';
                         the_post_thumbnail_url();
                         echo '\')';
                     } else {
                         echo '#8E8E8E' ;
                     }
                     echo';min-width:300px; width:20vw; min-height: 300px; height:20vw; background-repeat: no-repeat;background-size: cover;background-position-x: center;">';
                     the_title();
                     echo '</div>';

                     echo '</a>';

            endwhile;?>
            <?php else: ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
                <?php if( get_field('Wedstrijd') ): ?>
                    <div class="home_content contest"><?php the_field('Wedstrijd'); ?></div>
                <?php endif; ?>
            </container>
            <aside class="single_post-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </container>

    </div>
<?php get_footer(); ?>