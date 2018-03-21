
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
                        <?php the_post_thumbnail('thumbnail'); ?>
                    <?php endif; ?>
                </div>    
                <div style="font-size:1.5em;font-weight: bold;" class="sportkampTitle">
                    <?php  echo get_the_title(); ?>
                </div>      
            </div>
        </div>
        <img width="100%" src="<?php bloginfo('template_url'); ?>/assets/waves/wave_groen-01.png" />
        <h1 class="pageTitle"><?php the_field('pagina_hoofding') ?></h1>
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
                        <?php 
                        if( have_rows('algemeen') ):
                            while( have_rows('algemeen') ): the_row(); ?>
                                <?php if( get_sub_field('titel')) : ?>
                                    <button style="text-transform: uppercase;" onClick="showSport(<?php echo $n; ?>)" id="toggle-<?php echo $n; ?>" class="toggle button kampButton kampButton<?php echo $n; ?>">
                                        <?php the_sub_field('titel'); ?>
                                    </button>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php $n++; //increment every loop ?>        
                    <?php endwhile; ?>
                    </div> <!-- .kampbuttons -->
                    <?php
                    // loop through rows (parent repeater, category types)
                    $i = 1;
					while( have_rows('categorie') ): the_row(); ?>
                        <div class="kampLijstCategorie" id="kampLijstCategorie-<?php echo $i; ?>">
                            <?php 
                            if( have_rows('algemeen') ):
                                while( have_rows('algemeen') ): the_row(); ?>
                                    <?php if( get_sub_field('subtitel')) : ?>
                                        <h1 class="pageTitle red"><?php the_sub_field('subtitel') ?></h1>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('beschrijving') ) :?>
                                        <div class="descriptionContainer">
                                            <div class="descriptionMain"><?php the_sub_field('beschrijving') ?></div>
                                        </div>    
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>

							<?php 
							// check for rows
                            if( have_rows('inhoud') ):
								// loop through rows (sub repeater, category specific )
                                while( have_rows('inhoud') ): the_row();
                                    if( get_row_layout() === 'bestuurslid' ): ?>
                                        <div class="bestuurMember bestuurMemberCard">
                                            <div class="bestuurPicture">
                                                <?php if(get_sub_field('foto')) : ?>
                                                        <?php the_sub_field('foto'); ?>
                                                <?php 
                                                /* no post image so show a default img */
                                                else : ?>
                                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/Persona-01.png" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" width="100" height="100" />
                                                <?php endif; ?>
                                            </div>    
                                            <div class="bestuurMemberInfo">
                                                <div style="color:#3C3C3B;margin-bottom: 10px;" class="bestuurMemberTitle">
                                                    <?php if(get_sub_field('naam')) : ?>
                                                            <?php the_sub_field('naam'); ?>
                                                    <?php endif; ?>
                                                </div>    
                                                <div class="bestuurMemberContent">
                                                    <?php if(get_sub_field('beschrijving')) : ?>
                                                            <?php the_sub_field('beschrijving'); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <a href="mailto:<?php the_sub_field('email') ?>">
                                                <img class="mailto" src="<?php bloginfo('template_url'); ?>/assets/img/email.png" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" />
                                            </a>    
                                        </div>
                                    <?php elseif( get_row_layout() === 'pdflijst' ): ?>
                                        <div class="pdfLijstContainer">
                                            <?php if(get_sub_field('lijst_titel')) : ?>
                                                <h1 class="pageTitle"><?php the_sub_field('lijst_titel') ?></h1>
                                            <?php endif; ?>
                                            <?php if( have_rows('pdfs') ): ?>
                                                <ul class="pdfLijst" >
                                                <?php while( have_rows('pdfs') ): the_row(); ?>
                                                <?php $pdf = get_sub_field('pdf');
                                                    if( $pdf ): ?>
                                                        <li class="pdf">
                                                        <a style="background-image:url(<?php bloginfo('template_url'); ?>/assets/img/pdf_wit_donkergrijs-01.png);" target="__blank" href="<?php echo $pdf['url']; ?>"><?php echo $pdf['title']; ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                                </ul>
							                <?php endif; //if( have_rows('pdfs') ): ?>
                                        </div>
                                    <?php elseif( get_row_layout() === 'fotogalerij' ): ?>
                                        <?php if(get_sub_field('metaslider_shortcode')): ?>
                                            <div style="margin-bottom:20px"><?php echo do_shortcode(get_sub_field('metaslider_shortcode')) ?></div>
                                        <?php endif; ?>
                                    <?php elseif( get_row_layout() === 'tekstblok' ): ?>
                                        <div class="textBlock">
                                            <?php if(get_sub_field('titel')): ?>
                                                <div class="sub_title"><?php the_sub_field('titel') ?></div>
                                            <?php endif; ?>  
                                            <?php if(get_sub_field('tekst')): ?>
                                                <div class="textBlockText"><?php the_sub_field('tekst') ?></div>
                                            <?php endif; ?>
                                        </div>        
                                    <?php else: endif; ?>    
								<?php endwhile; ?>
							<?php endif; //if( have_rows('inhoud') ): ?>
						</div>	
                        <?php $i++; //increment every loop ?>
					<?php endwhile; ?>
					
				<?php endif;?>
<?php
    endwhile;
endif;
?>
<?php get_footer(); ?>