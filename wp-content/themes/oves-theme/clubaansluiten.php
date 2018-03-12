<?php /* Template Name: Clubaansluiten */ ?>
<?php
get_header();
?>
<h1 class="pageTitle blue"><?php the_field('pagina_hoofding') ?></h1>

<?php if( get_field('beschrijving') ) :?>
<div class="descriptionContainer">
    <div class="descriptionMain"><?php the_field('beschrijving') ?></div>
</div>    
<?php endif; ?>
<div id="main" class="joinContainer">
    <?php $info1= get_field('joinInfo1'); if($info1) : ?>
        <div class="joinInfo joinInfo-1">
            <?php if($info1['sub_titel']) : ?>
                <h1 class="subtitle blue"><?php echo $info1['sub_titel'] ?></h1>
            <?php endif; ?>
            <?php if($info1['infoveld']) : ?>
                <div class="joinInfoveld"><?php echo $info1['infoveld'] ?></div>
            <?php endif; ?>
            <?php $pdf1 = $info1['pdf_single']; if($pdf1) : ?>
                <div class="pdf">
                    <a style="background-image:url(<?php bloginfo('template_url'); ?>/assets/img/pdf_wit_donkergrijs-01.png);" target="__blank" href="<?php echo $pdf1['url']; ?>"><?php echo $pdf1['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $info2= get_field('joinInfo2'); if($info2) : ?>
        <div class="joinInfo joinInfo-2">
            <?php if($info2['sub_titel']) : ?>
                <h1 class="subtitle"><?php echo $info2['sub_titel'] ?></h1>
            <?php endif; ?>
            <?php if($info2['infoveld']) : ?>
                <div class="joinInfoveld"><?php echo $info2['infoveld'] ?></div>
            <?php endif; ?>
            <?php $pdf2 = $info2['pdf_single']; if($pdf2) : ?>
                <div class="pdf">
                    <a style="background-image:url(<?php bloginfo('template_url'); ?>/assets/img/pdf_wit_donkergrijs-01.png);" target="__blank" href="<?php echo $pdf2['url']; ?>"><?php echo $pdf2['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $pdflijst = get_field('pdflijst'); if($pdflijst) : ?>
        <div class="pdfLijstContainer">
            <?php if($pdflijst['lijst_titel']) : ?>
                <h1 class="subtitle darkgrey"><?php echo $pdflijst['lijst_titel'] ?></h1>
            <?php endif; ?>
            <?php $pdfs = $pdflijst['pdfs']?>
            <?php if( $pdfs ): ?>
                <ul class="pdfLijst" >
                <?php foreach($pdfs as $pdf): ?>
                        <li class="pdf">
                            <a style="background-image:url(<?php bloginfo('template_url'); ?>/assets/img/pdf_wit_donkergrijs-01.png);" target="__blank" href="<?php echo $pdf['pdf']['url']; ?>"><?php echo $pdf['pdf']['title']; ?></a>
                        </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; //if( have_rows('pdfs') ): ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>