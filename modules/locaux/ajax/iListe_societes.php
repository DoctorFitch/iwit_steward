<?php

require_once('../../../lib/config.php');

// DB table to use
$table = 'view_messageries_typecontrat_societes';

// Table's primary key
$primaryKey = 'societes_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db'        => 'societes_id',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_nom',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'type_contrats_nom',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_siteWeb',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return '<span class="id" href="'.$d.'" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'messageries_nom',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_adresse',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_ville',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_codePostal',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_pays',
        'dt'        => 8,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['societes_id'].'" table_id="societes_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),

    array(
        'db'        => 'societes_dateC',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return '<span class="garantie" data-type="date" data-placement="right" data-viewformat="d/mm/yy" data-pk="'.$row['societes_id'].
            '" table_id="societes_id" data-original-title="Saisir une nouvelle date">'.date( 'd/m/y', strtotime($d)).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_dateM',
        'dt'        => 10,
        'formatter' => function( $d, $row ) {
            return '<span class="garantie" data-type="date" data-placement="right" data-viewformat="d/mm/yy" data-pk="'.$row['societes_id'].
            '" table_id="societes_id" data-original-title="Saisir une nouvelle date">'.date( 'd/m/y', strtotime($d)).'</span> ';
        }
    ),
    array(
        'db'        => 'societes_dateM',
        'dt'        => 11,
        'formatter' => function( $d, $row ) {
            return '<button type=\'button\' onclick=\'ouvertureModification_client('.$row['societes_id'].');\' class=\'btn btn-primary btn-circle\'><i class="fa fa-pencil"></i></button>
            <button type=\'button\' onclick=\'suppressionLigne('.$row['societes_id'].');\' class=\'btn btn-danger btn-circle\'><i class="fa fa-trash-o"></i></button>';
        }
    )
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'iwit',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../../ssp.class.php');

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

?>