<?php /* Template Name: ContactTemplate */ ?>
<?php
get_header();
?>
<h1 class="pageTitle blue"><?php the_field('pagina_hoofding') ?></h1>

<?php if( get_field('beschrijving') ) :?>
<div class="descriptionContainer">
    <div class="descriptionMain"><?php the_field('beschrijving') ?></div>
</div>    
<?php endif; ?>
<div id="main" class="contactContainer">
    <?php $info1= get_field('contactInfo1'); if($info1) : ?>
        <div class="contactInfo contactInfo-1">
            <?php if($info1['sub_titel']) : ?>
                <h1 class="sub_title"><?php echo $info1['sub_titel'] ?></h1>
            <?php endif; ?>
            <?php if($info1['infoveld']) : ?>
                <div class="contactInfoveld"><?php echo $info1['infoveld'] ?></div>
            <?php endif; ?>
            <?php if( $info1['mail']) : ?>
                <div style="margin: 10 0;" class="kampIconContainer">
                    <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/email.png" />
                    <div><?php echo $info1['mail']; ?></div>
                </div>
            <?php endif; ?>
            <?php if( $info1['telefoonnummer']) : ?>
                <div style="margin: 10 0;" class="kampIconContainer">
                    <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/telefoon.png" />
                    <div><?php echo $info1['telefoonnummer']; ?></div>
                </div>
            <?php endif; ?>
            <?php if( $info1['adres']) : ?>
                <div style="margin: 10 0;" class="kampIconContainer">
                    <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/locatie.png" />
                    <div><?php echo $info1['adres']; ?></div>
                </div>
            <?php endif; ?>
            <?php $location = $info1['map'];
            if( !empty($location) ):
            ?>
            <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $info2= get_field('contactInfo2'); if($info2) : ?>
        <div class="contactInfo contactInfo-2">
            <?php if($info2['sub_titel']) : ?>
                <h1 class="sub_title"><?php echo $info2['sub_titel'] ?></h1>
            <?php endif; ?>
            <?php if($info2['infoveld']) : ?>
                <div class="contactInfoveld"><?php echo $info2['infoveld'] ?></div>
            <?php endif; ?>
            <?php if( $info2['mail']) : ?>
                <div style="margin: 10 0;" class="kampIconContainer">
                    <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/email.png" />
                    <div><?php echo $info2['mail']; ?></div>
                </div>
            <?php endif; ?>
            <?php if( $info2['telefoonnummer']) : ?>
                <div style="margin: 10 0;" class="kampIconContainer">
                    <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/telefoon.png" />
                    <div><?php echo $info2['telefoonnummer']; ?></div>
                </div>
            <?php endif; ?>
            <?php if( $info2['adres']) : ?>
                <div style="margin: 10 0;" class="kampIconContainer">
                    <img class="kampIcon" src="<?php bloginfo('template_url'); ?>/assets/img/locatie.png" />
                    <div><?php echo $info2['adres']; ?></div>
                </div>
            <?php endif; ?>
            <?php $location2 = $info2['map'];
            if( !empty($location2) ):
            ?>
            <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location2['lat']; ?>" data-lng="<?php echo $location2['lng']; ?>"></div>
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="contactformContainer">
        <?php echo do_shortcode('[contact-form-7 id="429" title="Contacteer ons"]') ?>
    </div>
</div>
<?php get_footer(); ?>