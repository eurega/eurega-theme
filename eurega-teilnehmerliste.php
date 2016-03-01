<?php
/*
Template Name: Eurega Teilnehmerliste
*/

function printTeilnehmerliste() {

    if (preg_match('(.*\.eurega\.dev)', $_SERVER['HTTP_HOST'])) {
        $apiHost = 'http://api.eurega.dev/app_dev.php';
    } else {
        $apiHost = 'http://api.eurega.org';
    }

    $eurega = json_decode(file_get_contents($apiHost . '/eurega/current'));
    $mannschaften = json_decode(file_get_contents($apiHost . '/anmeldung/get/eurega-' . $eurega->jahr));

    if ($mannschaften) {
        print('<div class="overflow-fix">');
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
                            <th>Startnummer</th>
                            <th>Mannschaftsname</th>
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
                <?php printTeilnehmerliste(); ?>

            </div> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

<?php get_footer(); ?>
