<?php
/*
Template Name: Eurega Teilnehmerliste
*/

$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';

if (preg_match('(.*\.eurega\.test)', $_SERVER['HTTP_HOST'])) {
    $apiHost = $protocol . "api.eurega.test:${_ENV['API_PORT']}/app_dev.php";
} else {
    $apiHost = $protocol . 'api.eurega.org';
}

// Set the right CORS header, so that AJAX calls
// from api.eurega.(test|org) could be made.
header("Access-Control-Allow-Origin: " . $protocol . $apiHost);

function printTeilnehmerliste($apiHost) {
    $eurega = json_decode(file_get_contents($apiHost . '/eurega/current'));
    $mannschaften = json_decode(file_get_contents($apiHost . '/anmeldung/get/eurega-' . $eurega->jahr));

    if ($mannschaften) {
        print('<div class="js-tv-teilnehmerliste overflow-fix">');
        print('<table>');
        $lastStrecke = null;
        $lastKlasse = null;
        $first = true;
        foreach ($mannschaften as $mannschaft) {
            if ($mannschaft->strecke !== $lastStrecke || $mannschaft->klasse !== $lastKlasse) {
                if (!$first) {
                    print('</table>');
                    print('<table>');
                }
                print('<tr><th colspan="7">' . $mannschaft->strecke . ' - ' . $mannschaft->klasse . '</th>');
                print('<tr>
                            <th>Startnr</th>
                            <th>Mann&shy;schafts&shy;name</th>
                            <th>Ruderer 1</th>
                            <th>Ruderer 2</th>
                            <th>Ruderer 3</th>
                            <th>Ruderer 4</th>
                            <th>Ruderer 5</th>
                        </tr>');
            }
            print('<tr>');
            print('<td>' . $mannschaft->startnummer . '</td>');
            print('<td>' . $mannschaft->mannschaftsName . '</td>');
            foreach($mannschaft->ruderer as $ruderer) {
                print('<td>' . $ruderer->vorname . ' ' . $ruderer->nachname);
                $ruderer->verein ? print(' (' . $ruderer->verein . ')') : print('');
                print('</td>');
            }
            print('</tr>');

            $lastStrecke = $mannschaft->strecke;
            $lastKlasse = $mannschaft->klasse;
            $first = false;
        }
        print('</table>');
        print('</div>');
    } else {
        print('<div class="callout alert">Bisher keine freigegebenen Mannschaften gefunden</div>');
    }

}

?>

<?php get_header(); ?>

    <div id="content">

        <div id="inner-content" class="row">

            <div id="main" class="large-12 medium-12 small-12 columns" role="main">

                <?php
                the_post();
                get_template_part( 'parts/loop', 'page' );
                ?>
                <?php printTeilnehmerliste($apiHost); ?>

            </div> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

<?php get_footer(); ?>
