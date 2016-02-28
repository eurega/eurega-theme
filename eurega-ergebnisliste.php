<?php
/*
Template Name: Eurega Ergebnisliste
*/
?>

<?php get_header(); ?>

    <div id="content">

        <div id="inner-content" class="row">

            <div id="main" class="large-12 medium-12 small-12 columns overflow-fix" role="main">

                <?php get_template_part( 'partials/loop', 'page' ); ?>

            </div> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

<?php get_footer(); ?>