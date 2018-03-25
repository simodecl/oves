
<?php
get_header();
?>
<?php
if(have_posts()):
    while(have_posts()):
        the_post();
        global $post;
?>      <div class="sportkampHead">  
            <div class="sportkamp">
                <div class="sportkampPicture">
                    <?php if(has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    <?php endif; ?>
                </div>    
                <div style="font-size:1.5em;font-weight: bold;" class="sportkampTitle">
                    <?php  echo get_the_title(); ?>
                </div>   
            </div>
        </div>
        <div style="max-width:100vw;overflow:hidden;"><img style="margin:-9% 0 0 -10px;width:103%;" src="<?php bloginfo('template_url'); ?>/assets/waves/OVES_3_180.svg" /></div>
        <h1 class="pageTitle darkgreen"><?php the_field('pagina_hoofding') ?></h1>
        <?php if( get_field('beschrijving') ) :?>
            <div class="descriptionContainer">
                <div style="text-align: center;" class="descriptionMain"><?php the_field('beschrijving') ?></div>
            </div>    
        <?php endif; ?>

        <?php 

				// check for rows (parent repeater, category types)
				if( have_rows('categorie') ): ?>
					<div class="kampButtons">
                    <?php 
                    // Loop only category titles, to place them in buttons
                    $n = 1;
                    while( have_rows('categorie') ): the_row(); ?>
                    
                        <?php if( get_sub_field('categorie_naam')) : ?>
                            <button onClick="showSport(<?php echo $n; ?>)" id="toggle-<?php echo $n; ?>" class="toggle button kampButton kampButton<?php echo $n; ?>">
                                <?php the_sub_field('categorie_naam'); ?>
                            </button>
                            <?php endif; ?>
                    <?php $n++; //increment every loop ?>        
                    <?php endwhile; ?>
                    </div> <!-- .kampbuttons -->
                    <?php
                    // loop through rows (parent repeater, category types)
                    $i = 1;
					while( have_rows('categorie') ): the_row(); ?>
						<div class="kampLijstCategorie" id="kampLijstCategorie-<?php echo $i; ?>">
                            <?php if( get_sub_field('categorie_beschrijving')) : ?>
                                <div class="descriptionContainer">
                                    <div style="text-align: center;" class="descriptionMain"><?php the_sub_field('categorie_beschrijving') ?></div>
                                </div>  
                            <?php endif; ?>    
							<?php 
                        
							// check for rows (sub repeater)
                            if( have_rows('sportkamp_info') ): ?>
                            
								<ul class="kampLijst" >
								<?php 

								// loop through rows (sub repeater, category specific )
								while( have_rows('sportkamp_info') ): the_row();

									// display each item as a list - with a class of completed ( if completed )
									?>
									<li class="kampLijstItem">
                                        <img class="kampLogo" src="<?php bloginfo('template_url'); ?>/assets/img/kamp-01.png" />
                                        <div class="kampTitle"><?php the_sub_field('sportkamp_titel'); ?></div>
                                        <?php if( get_sub_field('sportkamp_leeftijd')) : ?>
                                            <div class="kampIconContainer">
                                                <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/persona_wit-01.png" />
                                                <div><?php the_sub_field('sportkamp_leeftijd'); ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('sportkamp_tijd')) : ?>
                                            <div class="kampIconContainer">
                                                <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/wanneer_wit-01.png" />
                                                <div><?php the_sub_field('sportkamp_tijd'); ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('sportkamp_locatie')) : ?>
                                            <div class="kampIconContainer">
                                                <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/locatie_wit-01.png" />
                                                <div><?php the_sub_field('sportkamp_locatie'); ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('sportkamp_prijs')) : ?>
                                            <div class="kampIconContainer">
                                                <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/deelnamebijdrage_wit-01.png" />
                                                <div><?php the_sub_field('sportkamp_prijs'); ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('sportkamp_waarschuwing')) : ?>
                                            <div class="kampIconContainer">
                                                <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/waarschuwing_wit-01.png" />
                                                <div><?php the_sub_field('sportkamp_waarschuwing'); ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('kamp_beschrijving')) : ?>
                                            <div class="kampBeschrijving"><?php the_sub_field('kamp_beschrijving'); ?></div>
                                        <?php endif; ?>
                                        <?php $link = get_field('link_1');
                                            if( $link ): ?>
                                                <button style="margin: 10 auto" class="center"><a class="button reversegreenlink" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a></button>
                                        <?php endif; ?>
                                        <?php $link2 = get_field('link_2');
                                            if( $link2 ): ?>
                                                <button style="margin: 10 auto; font-weight: bold; text-transform: uppercase;" class="center"><a style="border-color: #FFF" class="button greenlink" href="<?php echo $link2['url']; ?>" target="<?php echo $link2['target']; ?>"><?php echo $link2['title']; ?></a></button>
                                        <?php endif; ?>  

                                    </li>
								<?php endwhile; ?>
								</ul>
							<?php endif; //if( get_sub_field('sportkamp_info') ): ?>
						</div>	
                        <?php $i++; //increment every loop ?>
					<?php endwhile; // while( has_sub_field('categorie') ): ?>
					
				<?php endif; // if( get_field('categorie') ): ?>
<?php
    endwhile;
endif;
?>
<?php get_footer(); ?>