<?php /* Template Name: BestuurTemplate */ ?>
<?php
get_header();
?>
<h1 class="pageTitle">ONTMOET ONS BESTUUR</h1>


<div id="main" class="bestuurContainer">
<?php
/*
 * Loop through Categories and Display Posts within
 */
$post_type = 'bestuur';
 
// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

foreach( $taxonomies as $taxonomy ) :
 
    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( $taxonomy );
    array_multisort($terms, SORT_ASC);
    foreach( $terms as $term ) : ?>
        <div class="bestuurCategory bestuur-<?php echo $term->slug ?>">
       
        <?php
        $args = array(
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $term->slug,
                    )
                )
 
            );
        $posts = new WP_Query($args);
        if( $posts->have_posts() ): ?> 
            <div class="bestuurCategoryTitle">
            <?php echo $term->name; ?>
            </div>

            <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
                <div class="bestuurMember">
                    <div class="bestuurPicture">
                    <?php if(has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                    <?php }
                    /* no post image so show a default img */
                    else { ?>
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/Persona-01.png" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" width="100" height="100" />
                    <?php } ?>
                    </div>    
                    <div class="bestuurMemberInfo">
                        <div class="bestuurMemberTitle">
                            <?php  echo get_the_title(); ?>
                        </div>    
                        <div class="bestuurMemberContent">
                            <?php the_content(); ?>
                            <p><?php echo get_field('emailadres', $post->ID) ?></p>
                        </div>
                    </div>
                    <a href="mailto:<?php echo get_field('emailadres', $post->ID) ?>"><img class="mailto" src="<?php bloginfo('template_url'); ?>/assets/img/email.png" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" /></a>
                </div>                         
 
        <?php endwhile; endif; ?>
        </div>                    
    <?php endforeach;
 
endforeach; ?>
</div>
<?php get_footer(); ?>