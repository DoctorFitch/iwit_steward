<?php require_once('../lib/config.php');

$societes = $pdo->sqlRow("SELECT * FROM societes WHERE societes_id = ?", $_POST['id_societes']);

$ds          = DIRECTORY_SEPARATOR;  //1


if (!file_exists('../documents/' . $societes['societes_nom'])) {
    mkdir('../documents/' . $societes['societes_nom'], 0777, true);
}

$storeFolder = 'documents/' . $societes['societes_nom'];   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3
      
    $targetPath = dirname( __FILE__ ) . $ds.'..'.$ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath . $func->normalize($_FILES['file']['name']);  //5
 
    move_uploaded_file($tempFile,$targetFile); //6

    $pdo->sql("INSERT INTO `documents`
                (`documents_id`, 
                `societes_id`, 
                `documents_nom`, 
                `documents_url`, 
                `documents_dateC`, 
                `documents_dateM`, 
                `documents_commentaire`) 
                VALUES (
                NULL,
                ?,
                ?,
                ?,
                NOW(),
                NULL,
                '')", array($societes['societes_id'], $func->normalize($_FILES['file']['name']), './' . $storeFolder. '/' . $func->normalize($_FILES['file']['name'])));
     
}
?>

<!--- See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.APTCQ8nP.dpuf-->