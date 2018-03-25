<?php /* Template Name: NewsTemplate */ ?>
<?php
get_header();
?>
<h1 class="pageTitle darkgreen">NIEUWSBERICHTEN</h1>


<div id="main" class="singleContainer postsContainer">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts('posts_per_page=5&paged=' . $paged);
    if(have_posts()){
        while(have_posts()){
            the_post();
    ?>      <div class="postsGroup">  
                <div class="singleDateContainer">
                    <div class="day"><?php echo get_the_date('d') ?></div>
                    <div class="month"><?php echo get_the_date('F') ?></div>
                    <div class="year"><?php echo get_the_date('Y') ?></div>
                </div>
                <div class="singlePost singlePostGroup">
    <?php            
                the_title('<h2 class="singleTitle">','</h2>');
                the_excerpt();
    ?>
                    <a href="<?php the_permalink(); ?>" class="readmore">Lees meer</a>
                </div>
            </div>
            
    <?php
        };
    }
    else{
        echo 'No content available';
    }
    ?>
     <div class="morePostsLinks">
          <div class="postsPrevious"><?php previous_posts_link( 'Nieuwere berichten' ); ?></div>
          <div class="postsNext"><?php next_posts_link( 'Oudere berichten' ); ?></div>
      </div>       
</div>
<?php get_footer(); ?>