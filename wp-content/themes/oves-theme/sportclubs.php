<?php /* Template Name: Sportclubs */ ?>
<?php
get_header();
?>
<h1 class="pageTitle red"><?php the_field('pagina_hoofding') ?></h1>

<?php if( get_field('beschrijving') ) :?>
<div class="descriptionContainer">
    <div class="descriptionMain"><?php the_field('beschrijving') ?></div>
</div>    
<?php endif; ?>

<?php $link = get_field('link');
        if( $link ): ?>
            <button class="center"><a class="button greylink" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a></button>
    <?php endif; ?>   

<img width="100%" src="<?php bloginfo('template_url'); ?>/assets/waves/wave_rood-02.png" />
<div class="sportclubsMain">
    <h1 class="subTitle"><?php the_field('subtitel') ?></h1>
    <container class="sportkampContainer">
        <?php
        $args = array( 'post_type' => 'clubs', 'posts_per_page' => -1,'orderby'=> 'title', 'order' => 'ASC');
        $clubs = new WP_Query( $args );
        while ( $clubs->have_posts() ) : $clubs->the_post(); ?>
            <div class="sportkamp">
                <div class="sportkampPicture">
                    <?php if(has_post_thumbnail()) : ?>
                        <?php if( get_field('page_link', $post->ID) ): ?>
                            <a href="<?php the_field('page_link', $post->ID); ?>" target="_blank" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>    
                <div style="color:#000;" class="sportkampTitle">
                    <?php  echo get_the_title(); ?>
                </div>      
            </div> 
        <?php endwhile; ?>
        </container>
    
</div>
<?php get_footer(); ?>