<?php

require_once('../../../lib/config.php');
// DB table to use
$table = 'view_projets_modules';
$projet_id = $_POST['projet_id'];
$where = 'projets_id = ' . $projet_id;
// Table's primary key
$primaryKey = 'projets_modules_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db'        => 'projets_modules_id',
        'dt'        => -1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['projets_modules_id'].'" table_id="projets_modules_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'projets_modules_nom',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['projets_modules_id'].'" table_id="projets_modules_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'projets_modules_description',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['projets_modules_id'].'" table_id="projets_modules_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'iwit_utilisateur_nomComplet',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['projets_modules_id'].'" table_id="projets_modules_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),

    array(
        'db'        => 'projets_modules_description',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return '<button type=\'button\' onclick=\'ouvertureModification_module('.$row['projets_modules_id'].');\' class=\'btn btn-primary btn-circle\'><i class="fa fa-pencil"></i></button>
            <button type=\'button\' onclick=\'suppressionLigne('.$row['projets_modules_id'].');\' class=\'btn btn-danger btn-circle\'><i class="fa fa-trash-o"></i></button>';
        }
    )
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'iwit_steward',
    'host' => 'localhost'
);

require('../../ssp.class.php');

echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $whereResult=$where, $whereAll=null )
);

?>