<?php
/*
Template Name: Eurega Sponsoren
*/
?>
<?php get_header(); ?>
<style>
    .sponsoren > * {
        border-bottom: 1px solid #000;
    }
</style>
<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-8 medium-8 columns" role="main">
	    <div class="sponsoren">
            <?php
            the_post();
            get_template_part( 'parts/loop', 'archive' );
            ?>
	    </div>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
