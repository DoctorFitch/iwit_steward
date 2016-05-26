<?php

require_once('../../../lib/config.php');
// DB table to use
$table = 'view_logiciels_type_licence';

// Table's primary key
$primaryKey = 'logiciels_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db'        => 'logiciels_id',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return '<input type="checkbox" name="check_delete[]" class="check_delete" value="'.$row['logiciels_id'].'">';
        }
    ),
    array(
        'db'        => 'logiciels_id',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_nom',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'type_licences_nom',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return '<span class="id" href="'.$d.'" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_garantie',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_prix',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_description',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_licence',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_dateC',
        'dt'        => 8,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_dateM',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['logiciels_id'].'" table_id="logiciels_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'logiciels_dateM',
        'dt'        => 10,
        'formatter' => function( $d, $row ) {
            return '<button type=\'button\' onclick=\'ouvertureModification_logiciel('.$row['logiciels_id'].');\' class=\'btn btn-primary btn-circle\'><i class="fa fa-pencil"></i></button>
            <button type=\'button\' onclick=\'suppressionLigne('.$row['logiciels_id'].');\' class=\'btn btn-danger btn-circle\'><i class="fa fa-trash-o"></i></button>';
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