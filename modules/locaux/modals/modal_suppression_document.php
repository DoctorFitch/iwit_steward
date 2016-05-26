<?php require_once('../../../lib/config.php');

$id = $_POST['document_id'];
$document = $pdo->sqlRow("SELECT * FROM documents WHERE documents_id = ?", array($id));

$ds = DIRECTORY_SEPARATOR;  //1

if (file_exists(dirname( __FILE__ ) . '/../../.' .$document['documents_url'])) {
    unlink(dirname( __FILE__ ) . '/../../.' .$document['documents_url']);
} 

    $pdo->sql("DELETE FROM `documents` WHERE documents_id = ?", array($id));

$pdo->sql("INSERT INTO `historiques` (
                `historiques_id`, 
                `historiques_imgUtilisateur`, 
                `historiques_titre`, 
                `historiques_detail`, 
                `historiques_href`, 
                `historiques_type`, 
                `historiques_fa`,
                `historiques_heure`) 
                VALUES (
                NULL,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Suppression d'un document par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , '' , 'index.php?p=modules/locaux', '3', 'fa-file-word-o'));

?>

<!--- See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.APTCQ8nP.dpuf-->