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
        width: 100vw;
    }
    .anmeldung__container iframe {
        width: 100%;
    }
</style>
<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-8 medium-8 columns first anmeldung__container" role="main">

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

                    $apiUrl = "${protocol}api.eurega.test:${_ENV['API_PORT']}/anmeldung/form";
                } else {
                    $apiUrl = "${protocol}api.eurega.org/anmeldung/form";
                }
                $apiUrl .= ($queryParams) ? '?' . http_build_query($queryParams) : '';

                if ($_GET['debug']) {
                    print("API-URL: " . $apiUrl);
                }

                $frontendUrl = '';
                if ($_GET['url']) {
                    $frontendUrl = '#!' . $_GET['url'];
                }

            echo '<iframe id="anmeldung-iframe" src="' . $apiUrl . $frontendUrl . '" scrolling="no" noresize allowfullscreen frameborder="0"></iframe>';
//                echo file_get_contents($apiUrl);
            ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->
<script src="//api.eurega.<?php echo strpos($_SERVER['HTTP_HOST'], '.test') !== false ? "test:${_ENV['API_PORT']}" : 'org'; ?>/components/iframe-resizer/js/iframeResizer.min.js?v=3.6.5"></script>
<script>
    (function() {
        iFrameResize({
            checkOrigin: [
                'http://api.eurega.test',
                'https://api.eurega.test',
                'http://www.eurega.test',
                'https://www.eurega.test',
                'http://api.eurega.org',
                'https://api.eurega.org',
                'http://www.eurega.org',
                'https://www.eurega.org'
            ],
            heightCalculationMethod: 'documentElementScroll',
            moveToAnchor: '#anmeldung_container'
        });
    }())
</script>

<?php get_footer(); ?>
