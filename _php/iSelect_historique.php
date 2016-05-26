<?php

include('../ajax/inc/init.php');
$func = new Functions();


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
                            <div class="smart-timeline-time"><i class="fa fa-user-plus"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-user"></i> Page utilisateurs</a>
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
                            <div class="smart-timeline-time"><i class="fa fa-user-times"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-user"></i> Page utilisateurs</a>
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
                            <div class="smart-timeline-time"><i class="fa fa-suitcase"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-suitcase"></i> Page societe</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 4:
                break;

            case 5:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-building"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page local</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 6:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-building"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page local</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 7:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-desktop"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 10:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-windows"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 12:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-wikipedia-w"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 14:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-wrench"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 16:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-wrench"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 19:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-database"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 19:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-database"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 21:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-envelope"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 22:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-windows"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page logiciel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 23:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-desktop"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page materiel</a>
                                </p>
                            </div>
                        </li>';
                break;

            case 24:
                $historique_affichage .= '
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="' . $historique_element['historiques_imgUtilisateur'] . '" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time"><i class="fa fa-product-hunt"></i><br/>
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
                                    <a href="' . $historique_element['historiques_href'] . '" class="btn btn-xs btn-default"><i
                                            class="fa fa-building"></i> Page utilisateur</a>
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