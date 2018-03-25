<?php
get_header();
?>

<?php 
if(have_posts())
{
    while(have_posts())
    {
        the_post();
        
        the_title('<h1 class="pageTitle">','</h1>'); ?>

        <div id="main" class="basic">
            <?php the_content(); ?>
        </div>

<?php

    }
}
else
{
    echo 'No content available';
}
?>


<?php get_footer(); ?>