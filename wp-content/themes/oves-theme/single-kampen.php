
<?php
get_header();
?>
<?php
if(have_posts()):
    while(have_posts()):
        the_post();
?>      <div class="sportkampHead">  
            <div class="sportkamp">
                <div class="sportkampPicture">
                    <?php if(has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    <?php endif; ?>
                </div>    
                <div class="sportkampTitle">
                    <?php  echo get_the_title(); ?>
                </div>      
            </div>
        </div>
        <h1 class="pageTitle"><?php the_field('pagina_hoofding') ?></h1>
        <?php if( get_field('beschrijving') ) :?>
            <div class="descriptionContainer">
                <div class="descriptionMain"><?php the_field('beschrijving') ?></div>
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
                            <button onClick="showKamp(<?php echo $n; ?>)" id="toggle-<?php echo $n; ?>" class="toggle button kampButton kampButton<?php echo $n; ?>">
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
                                    <div class="descriptionMain"><?php the_sub_field('categorie_beschrijving') ?></div>
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