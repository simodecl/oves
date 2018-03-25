<?php /* Template Name: Bewegingsschool */ ?>
<?php
get_header();
?>
<h1 class="pageTitle darkgreen"><?php the_field('hoofdtitel') ?></h1>

<?php if( get_field('beschrijving') ) :?>
<div class="descriptionContainer">
    <div class="descriptionMain"><?php the_field('beschrijving') ?></div>
</div>    
<?php endif; ?>

<?php if( get_field('beschrijving-extra') ) :?>
<div id="descriptionContainerExtra" class="descriptionContainerExtra">
    <?php if( get_field('beschrijving-extra') ) :?>
        <div class="descriptionExtra"><?php the_field('beschrijving-extra') ?></div>
    <?php endif; ?>
    <?php if( get_field('beschrijving-extra2') ) :?>
        <div class="descriptionExtra"><?php the_field('beschrijving-extra2') ?></div>
    <?php endif; ?>
    <?php if( get_field('beschrijving-extra3') ) :?>
        <div class="descriptionExtra"><?php the_field('beschrijving-extra3') ?></div>
    <?php endif; ?>
</div>

<button onClick="toggledescription()" id="toggle-description" class="darkgreen">
    Lees meer
</button>     
<?php endif; ?>

<div id="main" class="bewegingContainer">
    <div class="bewegingContainerButton">
        <?php if( get_field('hoofding_knoppen') ) :?>
            <div class="bewegingButtonTitle"><?php the_field('hoofding_knoppen') ?></div>
        <?php endif; ?>
        <?php if( get_field('knop_1') ) :?>
            <div class="bewegingButtons">
                <?php if( get_field('knop_1') ) :?>
                    <button onClick="show(1)" id="toggle-1" class="toggle button bewegingButton1">
                        <?php the_field('knop_1') ?>
                    </button>
                <?php endif; ?>    
                <?php if( get_field('knop_2') ) :?>
                    <button onClick="show(2)" id="toggle-2" class="toggle button bewegingButton2">
                        <?php the_field('knop_2') ?>
                    </button>
                <?php endif; ?>    
            </div>
        <?php endif; ?>    
    </div>

    <div id="section-1" class="section">
        <div class="pageTitle sectionTitle">
            <?php the_field('knop_1_hoofding') ?>
        </div>
        <div class ="sectionCards">
            <div class="sectionCard">
                <?php 
                $image1 = get_field('knop_1_afbeelding_1');
                if( !empty($image1) ): ?>
                    <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />
                <?php endif; ?>
                <?php if( get_field('knop_1_titel_1') ) :?>
                    <div><?php the_field('knop_1_titel_1') ?></div>
                <?php endif; ?>
                <?php if( get_field('knop_1_info_1') ) :?>
                    <div><?php the_field('knop_1_info_1') ?></div>
                <?php endif; ?>
            </div>
            <div class="sectionCard">
            <?php 
                $image2 = get_field('knop_1_afbeelding_2');
                if( !empty($image2) ): ?>
                    <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
                <?php endif; ?>
                <?php if( get_field('knop_1_titel_2') ) :?>
                    <div><?php the_field('knop_1_titel_2') ?></div>
                <?php endif; ?>
                <?php if( get_field('knop_1_info_2') ) :?>
                    <div><?php the_field('knop_1_info_2') ?></div>
                <?php endif; ?>
            </div>
            <div class="sectionCard">
            <?php 
                $image3 = get_field('knop_1_afbeelding_3');
                if( !empty($image3) ): ?>
                    <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />
                <?php endif; ?>
                <?php if( get_field('knop_1_titel_3') ) :?>
                    <div><?php the_field('knop_1_titel_3') ?></div>
                <?php endif; ?>
                <?php if( get_field('knop_1_info_3') ) :?>
                    <div><?php the_field('knop_1_info_3') ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div id="section-2" class="section">
        <div class="pageTitle sectionTitle">
            <?php the_field('knop_2_hoofding') ?>
        </div>
        <div class ="sectionCards">
            <div class="sectionCard">
                <?php 
                $image4 = get_field('knop_2_afbeelding_1');
                if( !empty($image4) ): ?>
                    <img src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />
                <?php endif; ?>
                <?php if( get_field('knop_2_titel_1') ) :?>
                    <div><?php the_field('knop_2_titel_1') ?></div>
                <?php endif; ?>
                <?php if( get_field('knop_2_info_1') ) :?>
                    <div><?php the_field('knop_2_info_1') ?></div>
                <?php endif; ?>
            </div>
            <div class="sectionCard">
            <?php 
                $image5 = get_field('knop_2_afbeelding_2');
                if( !empty($image5) ): ?>
                    <img src="<?php echo $image5['url']; ?>" alt="<?php echo $image5['alt']; ?>" />
                <?php endif; ?>
                <?php if( get_field('knop_2_titel_2') ) :?>
                    <div><?php the_field('knop_2_titel_2') ?></div>
                <?php endif; ?>
                <?php if( get_field('knop_2_info_2') ) :?>
                    <div><?php the_field('knop_2_info_2') ?></div>
                <?php endif; ?>
            </div>
            <div class="sectionCard">
            <?php 
                $image6 = get_field('knop_2_afbeelding_3');
                if( !empty($image6) ): ?>
                    <img src="<?php echo $image6['url']; ?>" alt="<?php echo $image6['alt']; ?>" />
                <?php endif; ?>
                <?php if( get_field('knop_2_titel_3') ) :?>
                    <div><?php the_field('knop_2_titel_3') ?></div>
                <?php endif; ?>
                <?php if( get_field('knop_2_info_3') ) :?>
                    <div><?php the_field('knop_2_info_3') ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="infoboxContainer">
        <?php if( get_field('infobox1') ) :?>
            <div class="infobox"><?php the_field('infobox1') ?></div>
        <?php endif; ?>
        <?php if( get_field('infobox2') ) :?>
            <div class="infobox"><?php the_field('infobox2') ?></div>
        <?php endif; ?>
    </div>
    <?php $link = get_field('inschrijflink');
        if( $link ): ?>
            <button class="center"><a class="button bewegingInschrijven" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a></button>
    <?php endif; ?>

</div>
<?php get_footer(); ?>