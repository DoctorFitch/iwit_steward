<?php

require_once('../../../lib/config.php');
// DB table to use
$table = 'utilisateurs_produits_nom';
$societes_id = $_POST['societes_id'];
$where = 'utilisateurs_id = ' . $societes_id;
// Table's primary key
$primaryKey = 'utilisateurs_produits_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db'        => 'utilisateurs_produits_id',
        'dt'        => -1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['utilisateurs_produits_id'].'" table_id="utilisateurs_produits_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'type_materiel',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['utilisateurs_produits_id'].'" table_id="utilisateurs_produits_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'produits_nom',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['utilisateurs_produits_id'].'" table_id="utilisateurs_produits_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'utilisateurs_produits_dateInstallation',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return '<span class="id" href="'.$d.'" id="id" data-type="text" data-pk="'.$row['utilisateurs_produits_id'].'" table_id="utilisateurs_produits_id" data-original-title="">'.utf8_encode($d).'</span> ';
        }
    ),
    array(
        'db'        => 'utilisateurs_produits_dateInstallation',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return '<button type=\'button\' onclick=\'ouvertureModification_materiel('.$row['utilisateurs_produits_id'].');\' class=\'btn btn-primary btn-circle\'><i class="fa fa-pencil"></i></button>
            <button type=\'button\' onclick=\'suppressionLigne('.$row['utilisateurs_produits_id'].');\' class=\'btn btn-danger btn-circle\'><i class="fa fa-trash-o"></i></button>';
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