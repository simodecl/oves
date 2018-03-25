<?php
?>

<div id="footer" class="footerContainer">
    <div class="footerLogo"><?php if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    } ?>
    </div>

    <!-- Hier kan je de gegevens uit de footer bewerken. de <br> tussen de contact tekst staat voor het beginnen van een nieuwe regel-->
    <div class="footerItem footerContact">
        <h1>CONTACT</h1>
        <div class="footerContactText">
            <p>Afdeling West<br>Lieven Bauwensstraat 20<br>8200 Brugge<br><br>050 35.13.05</p>
            <p>Afdeling Oost<br>Boomgaardstraat 22, bus 16<br>2600 Berchem<br><br>032 86.07.44</p>
        </div>
    </div>        
    <div class="footerItem">
        <h1>NUTTIGE INFORMATIE</h1>

        <?php
        wp_nav_menu( array(
                'theme_location' => 'tertiary',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'nav navbar-nav nav-footer',
                'fallback_cb' => 'wp_page_menu',
                //Process nav menu using our custom nav walker
                'walker' => new wp_bootstrap_navwalker())
        );
        ?>
    </div>
    <div class="footerItem">
        <h1>PARTNERS</h1>

        <p>
            <img class="alignnone size-full wp-image-48" src="/wp-content/uploads/2018/03/Ethias.png" alt="" width="270" height="200">
            <img class="alignnone size-medium wp-image-50" src="/wp-content/uploads/2018/03/SportVlaanderen-300x135.png" alt="" width="300" height="135">
            <img class="alignnone size-medium wp-image-49" src="/wp-content/uploads/2018/03/ProvincieAntwerpen-300x91.png" alt="" width="300" height="91">
        </p>

    </div>
</div>
<div class="disclaimer">In samenwerking met <a href="https://www.arteveldehogeschool.be/opleidingen/bachelor/grafische-en-digitale-media">Arteveldehogeschool</a>.</div>
    <?php wp_footer(); ?>
    </body>
</html>