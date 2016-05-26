<?php

include ('../ajax/inc/init.php');

// DB table to use
$table = 'documents';
$societes_id = $_POST['societes_id'];
$where = 'societes_id = ' . $societes_id;
// Table's primary key
$primaryKey = 'documents_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db'        => 'documents_commentaire',
        'dt'        => -3,
        'formatter' => function( $d, $row ) {
            if($d == ''){
                return '0'; // si le document ne comporte pas de commentaire
            } else {
                return '1';
            }

        }
    ),
    array(
        'db'        => 'documents_url',
        'dt'        => -2,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['documents_id'].'" table_id="documents_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'documents_id',
        'dt'        => -1,
        'formatter' => function( $d, $row ) {
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['documents_id'].'" table_id="documents_id" data-original-title="">'.utf8_encode($d).'</span>';
        }
    ),
    array(
        'db'        => 'documents_nom',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            if($row['documents_commentaire'] != ""){
                return '<a href="' . $row['documents_url'] .'" download="'.$row['documents_nom'].'" class="id" id="id" data-type="text" data-pk="'.$row['documents_id'].'" table_id="documents_id" data-toggle="popover-hover" data-placement="top" data-original-title="Commentaire" data-content="'. $row['documents_commentaire'] .'" aria-describedby="popover284463">'.utf8_encode($d).'</a>';
            } else {
                return '<a href="' . $row['documents_url'] .'" download="'.$row['documents_nom'].'" class="id" id="id" data-type="text" data-pk="'.$row['documents_id'].'" table_id="documents_id">'.utf8_encode($d).'</a>';
            }
        }
    ),
    array(
        'db'        => 'documents_dateC',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            $func = new Functions();
            return '<span class="id" id="id" data-type="text" data-pk="'.$row['documents_id'].'" table_id="documents_id" data-original-title="">'.$func->dateFR($d, 1).'</span> ';
        }
    ),
    array(
        'db'        => 'documents_dateC',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return '<button type=\'button\' onclick=\'ouvertureAjout_commentaire('.$row['documents_id'].');\' class=\'btn btn-primary btn-circle\'><i class="fa fa-pencil"></i></button>';
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