<?php

require_once('../../../lib/config.php');

$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM documents WHERE documents_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter commentaire</h4>
</div>

<!-- Début du formulaire -->
<form action="modules/locaux/ajax/iAjout_commentaire.php" id="ajoutCommentaire" class="smart-form"
      novalidate="novalidate"
      method="post" name="ajoutCommentaire">

    <input type="hidden" name="documents_id" value="<?php echo $id; ?>"/>

    <fieldset>
        <div class="row">
            <!--Commentaire-->
            <label class="label col col-2">Commentaire</label>
            <section class="col col-10">
                <label class="textarea">
                    <textarea rows="5" name="documents_commentaire"
                              placeholder="Commentaire"><?php echo $rang['documents_commentaire']; ?></textarea>
                </label>
            </section>
        </div>
    </fieldset>

    <footer>
        <button type="submit" class="btn btn-primary">Ajouter !</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    </footer>

</form>

<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/assets/js/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

    pageSetUp();

    tinymce.init({
        selector: 'textarea',
        height: 200,
        menu: {},
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code',
            'textcolor',
            'table'
        ],
        toolbar: 'insertfile undo redo | styleselect | forecolor backcolor bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | table',
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });

    var pagefunction = function () {

        var $checkoutForm = $('#ajoutCommentaire').validate({
            // Rules for form validation

            submitHandler: function (ev) {
                $(ev).ajaxSubmit({
                    type: $('#ajoutCommentaire').attr('method'),
                    url: $('#ajoutCommentaire').attr('action'),
                    data: $('#ajoutCommentaire').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.retour == '1') {
                            smallBox('Impossible', "Impossible de commenter ce document.", 'warning');
                        }
                        else {
                            smallBox('Commentaire ajouté !', 'Le commentaire à bien été enregistré.', 'success');
                            $('#listing_documents').DataTable().ajax.reload(null, false);
                        }
                        console.log(data.retour);
                    }
                });
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

            invalidHandler: function () {
                smallBox('Ajout impossible', "Veuillez vérifier les champs.", 'error', '5000')
            }
        });
    };

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);


    pagefunction();

</script>