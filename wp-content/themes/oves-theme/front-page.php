<?php /* Template Name: HomeTemplate */ ?>
<?php

get_header();
?>
<?php if( get_field('headerimages') ) :?>
<div class="headerimageContainer">
    <?php echo do_shortcode(get_field('headerimages')) ?>
</div>
<?php endif; ?>  
<div id="main" class="homeMain">
    <div class="homeNewsContainer">
        <div class="pageTitle darkgreen">
            WEES OP DE HOOGTE!
        </div>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts('posts_per_page=5&paged=' . $paged);
        if(have_posts()): while(have_posts()):
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
        <?php endwhile; else:
            echo 'No content available';
        endif;?>
         <button class="center"><a class="button moreNews" href="/nieuws" >LEES MEER NIEUWS</a></button>
    </div>
    <div class="homeSportsContainer">
        <div class="pageTitle">
            ENKELE SPORTEN
        </div>
        <?php
        $args = array( 'post_type' => 'clubs', 'posts_per_page' => 6,'orderby'=> 'rand');
        $clubs = new WP_Query( $args );
        if ( $clubs->have_posts() ): while ( $clubs->have_posts() ) : $clubs->the_post(); ?>
            <div class="sportkamp">
                <div class="sportkampPicture">
                    <?php if(has_post_thumbnail()) : ?>
                        <?php if( get_field('page_link', $clubs->ID) ): ?>
                            <a href="<?php the_field('page_link', $clubs->ID); ?>" target="_blank" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php endif; ?>
            <?php endif; ?>
                </div>    
                <div class="sportkampTitle">
                    <?php  echo get_the_title(); ?>
                </div>      
            </div> 
        <?php endwhile;endif; ?>
    </div>
    <div class="newsletterContainer">
        <h1 style="margin:25px auto;" class="pageTitle">SCHRIJF JE IN VOOR DE NIEUWSBRIEF!</h1>
        <div class="descriptionMain">
        Via de online nieuwsbrief ben je altijd op de hoogte. De nieuwsbrief zal maandelijk naar jouw e-mail adres gestuurd worden. 
        </div>
        <?php echo do_shortcode('[contact-form-7 id="488" title="Nieuwsbrief"]') ?>    
    </div>
</div>
<?php get_footer(); ?>