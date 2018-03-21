<?php /* Template Name: Archief */ ?>
<?php
get_header();
?>
<h1 class="pageTitle">ARCHIEF</h1>


<div id="main" class="singleContainer postsContainer">
<?php
        $args = array(
                'post_type'      => 'attachment',
                'post_mime_type' => 'application/pdf',
                
            );
        $files = get_posts($args);
        if( $files ): ?> 
        <?php
            function modify_attachment_link($markup) {
                return preg_replace('/^<a([^>]+)>(.*)$/', '<a\\1 target="_blank">\\2', $markup);
            }
            add_filter( 'wp_get_attachment_link', 'modify_attachment_link', 10, 6 );
            ?>
            <ul style="margin: 0 auto;" class="pdflijst">
            <style>
            .pdf a {
                background-image:url(<?php bloginfo('template_url'); ?>/assets/img/pdf_wit_donkergrijs-01.png);
            }
            </style>
            <?php foreach($files as $file): ?>
                <li class="pdf">
                   <?php  echo wp_get_attachment_link($file->ID); ?>
                </li>                       
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>      
</div>
<?php get_footer(); ?>