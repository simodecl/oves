<?php
get_header();
?>
<h1 class="pageTitle">
NIEUWSBERICHT
</h1>
<div id="main" class="singleContainer">
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post();
    ?>        
            <div class="singleDateContainer">
                <div class="day"><?php echo get_the_date('d') ?></div>
                <div class="month"><?php echo get_the_date('F') ?></div>
                <div class="year"><?php echo get_the_date('Y') ?></div>
            </div>
            <div class="singlePost">
    <?php            
            the_title('<h2 class="singleTitle">','</h2>');
            the_content();
    ?>
    <?php
        };
    }
    else{
        echo 'No content available';
    }
    ?>
            </div>
</div>
<?php get_footer(); ?>
