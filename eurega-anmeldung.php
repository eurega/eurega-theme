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

                echo file_get_contents($apiUrl);
            ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
