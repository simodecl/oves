<?php /* Template Name: ContactTemplate */ ?>
<?php
get_header();
?>

    <div id="main">
        <container class="single_post content-sidebar_container">
            <div class="single_post-content">

                <h2 class="single_title"><?php the_title(); ?></h2> <!-- Page Title -->
                <?php
                // TO SHOW THE PAGE CONTENTS
                while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                    <div class="single_content">
                        <?php the_content(); ?> <!-- Page Content -->
                    </div>

                    <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>


            </div>
            <aside class="single_post-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </container>


    </div>
<?php get_footer(); ?>