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
<style>
    .anmeldung__container {
        position: relative;
        overflow: hidden;
        height: calc(100vh - 86px);
        width: 100vw;
    }
    .anmeldung__container iframe {
        position: absolute;
        top: 120px;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
    }
</style>
<div id="content">

    <div id="inner-content" class="row">

        <div id="main" class="large-8 medium-8 columns first anmeldung__container" role="main">

            <?php
            the_post();
            get_template_part( 'parts/loop', 'archive' );
            ?>

            <?php

                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $queryParams = array();
                if (isset($_GET['previewToken'])) {
                    $queryParams['previewToken'] = $_GET['previewToken'];
                }

                if (preg_match('(.*\.eurega\.test)', $_SERVER['HTTP_HOST'])) {
                    $queryParams['dev'] = 'true';

                    $tld = 'test';
                } else {
                    $tld = 'org';
                }
                $apiUrl = $protocol . sprintf('api.eurega.%s/anmeldung/form', $tld);
                $apiUrl .= ($queryParams) ? '?' . http_build_query($queryParams) : '';

                if ($_GET['debug']) {
                    print("API-URL: " . $apiUrl);
                }

            echo '<iframe class="anmeldung-iframe" src="'.$apiUrl.'" scrolling="no" noresize frameborder="0"></iframe>';
//                echo file_get_contents($apiUrl);
            ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
