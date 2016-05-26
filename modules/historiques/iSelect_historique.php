<?php

require_once('../../lib/config.php');

$historique_valeurs = $pdo->sql("SELECT * FROM historiques ORDER BY historiques_heure DESC");

$historique_affichage = '';
if (!empty($historique_valeurs)) {

    foreach ($historique_valeurs as $historique_element) {

        $time = strtotime($historique_element['historiques_heure']);

        switch ($historique_element['historiques_type']) {
            case 1: // Ajout utilisateur
                $historique_affichage .= '

                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa ' . $historique_element['historiques_fa'] .'" aria-hidden="true"></i><br/>
                                <small>"Il y a ' . humanTiming($time) . '"</small>
                            </div>
                            <div class="smart-timeline-content">
                                <p>
                                    <a><strong>' . $historique_element['historiques_titre'] . '</strong></a>
                                </p>
                                <p>
                                    ' . $historique_element['historiques_detail'] . '
                                </p>
                                <p>
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default">Y accéder</a>
                                </p>
                            </div>
                        </li>';

                break;
            case 2:
                $historique_affichage .= '

                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa ' . $historique_element['historiques_fa'] .'" aria-hidden="true"></i><br/>
                                <small>"Il y a ' . humanTiming($time) . '"</small>
                            </div>
                            <div class="smart-timeline-content">
                                <p>
                                    <a><strong style="color: #a87300">' . $historique_element['historiques_titre'] . '</strong></a>
                                </p>
                                <p>
                                    ' . $historique_element['historiques_detail'] . '
                                </p>
                                <p>
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default">Y accéder</a>
                                </p>
                            </div>
                        </li>';
                break;
            case 3:
                $historique_affichage .= '

                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa ' . $historique_element['historiques_fa'] .'" aria-hidden="true"></i><br/>
                                <small>"Il y a ' . humanTiming($time) . '"</small>
                            </div>
                            <div class="smart-timeline-content">
                                <p>
                                    <a><strong style="color: #C71A1A">' . $historique_element['historiques_titre'] . '</strong></a>
                                </p>
                                <p>
                                    ' . $historique_element['historiques_detail'] . '
                                </p>
                                <p>
                                    <a href=' . $historique_element['historiques_href'] . ' class="btn btn-xs btn-default">Y accéder</a>
                                </p>
                            </div>
                        </li>';
                break;
        }
    }
}


function humanTiming($time)
{
    $time = time() - $time; // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;

    $tokens = array(
        31536000 => 'année',
        2592000 => 'mois',
        604800 => 'semaine',
        86400 => 'jour',
        3600 => 'heure',
        60 => 'minute',
        1 => 'seconde'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
}

echo json_encode(array('html' => $historique_affichage));

?>