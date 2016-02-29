<?php
/*
Template Name: Eurega Anmeldung
*/
?>
<?php

// Set No-Cache Header
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');


?>

<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="row">

        <div id="main" class="large-8 medium-8 columns first" role="main">

            <?php
            the_post();
            get_template_part( 'parts/loop', 'archive' );
            ?>

            <?php

                if (preg_match('(.*\.eurega\.dev)', $_SERVER['HTTP_HOST'])) {
//                    echo '<iframe class="anmeldung-iframe" src="http://api.eurega.dev/index.php" height="100%" width="100%" frameborder="0" />';
                    echo file_get_contents('http://api.eurega.dev/index.php');
                } else {
                    echo file_get_contents('http://api.eurega.org/index.php');
//                    echo '<iframe class="anmeldung-iframe" src="http://api.eurega.org/index.php" height="100%" width="100%" frameborder="0" />';
                }
            ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
