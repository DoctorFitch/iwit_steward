<?php

require_once("../../../lib/config.php");
$id = $_POST['id'];

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter d'un module</h4>
</div>

<!-- Début du formulaire -->
<form action="modules/projets/ajax/iAjout_module.php" id="ajoutModule" class="smart-form" novalidate="novalidate"
      method="post"
      name="ajoutSociete">

    <input type="hidden" name="projet_id" value="<?php echo $id; ?>>
    <div class=" modal-body col-12">


    <fieldset>
        <!-- Societe id -->
        <div class="row hidden">
            <label class="label col col-2">Société</label>
            <section class="col col-3">
                <div class="icon-addon" style="width: 122%;">
                    <select class="form-control" name="id_societe" required>
                        <option value="" selected="" disabled="">Choisir une société</option>
                        <?php
                        $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_id");
                        while ($row = $select->fetch()) {
                            $projet_societe = $pdo->sqlValue("SELECT societes_id FROM projets WHERE projets_id = ?", array($id));
                            $selected = ($row['societes_id'] == $projet_societe) ? 'selected' : '';
                            echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="email" class="glyphicon glyphicon-briefcase"></label>
                </div>
            </section>
        </div>

        <!-- Nom local -->
        <div class="row">
            <label class="label col col-2">Nom du module</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-modx"></i>
                    <input type="text" name="module_nom" placeholder="Nom du module" required">
                </label>
            </section>


            <label class="label col col-2">Description</label>
            <section class="col col-4">
                <label class="input fe"> <i class="icon-prepend fa fa-pencil"></i>
                    <input type="text" name="module_description" id="module_description"
                           placeholder="Description du module" required"
                    class='adresse_identique'>
                </label>
            </section>
        </div>
    </fieldset>
    <fieldset>

        <!-- Adresse local -->
        <div class="row">
            <!-- Ville local -->
            <label class="label col col-2">Référence devis</label>
            <section class="col col-4">
                <label class="input fe"> <i class="icon-prepend fa fa-sort-numeric-asc"></i>
                    <input type="text" name="module_refDevis" id="module_refDevis" placeholder="Référence du devis"
                           required"
                    class='adresse_identique'>
                </label>
            </section>

            <!-- Code postal local -->
            <label class="label col col-2">Montant devis</label>
            <section class="col col-4">
                <label class="input fe"> <i class="icon-prepend fa fa-eur"></i>
                    <input type="text" name="module_montantDevis" id="module_montantDevis"
                           placeholder="Montant du devis"
                           required"
                    class='adresse_identique'>
                </label>
            </section>
        </div>

        <!-- Email local -->
        <div class="row">
            <!-- Telephone local -->
            <label class="label col col-2">Date début</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-calendar-check-o"></i>
                    <input type="text" class="form-control datepicker"
                           name="module_debut"
                           id="module_debut"
                           placeholder="Date de début du projet">
                </label>
            </section>

            <!-- Telephone local -->
            <label class="label col col-2">Date fin</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-calendar-check-o"></i>
                    <input type="text" class="form-control datepicker"
                           name="module_fin"
                           id="module_fin"
                           placeholder="Date de début du projet">
                </label>
            </section>
        </div>

        <div class="row">
            <!-- Pays local -->
            <label class="label col col-2">Délais réalisation</label>
            <section class="col col-4">
                <label class="input fe"> <i class="icon-prepend fa fa-hourglass"></i>
                    <input type="text" name="module_delaisRealisation" id="module_delaisRealisation"
                           placeholder="En heures" required">
                </label>
            </section>
        </div>

        <div class="row">
            <!-- Utilisateurs -->
            <div class="form-group">
                <label class="label col col-2">Utilisateurs</label>
                <section class="col col-10">
                    <select multiple style="width:100%" class="select2" id="id_utilisateurs" name="id_utilisateurs[]">
                        <option value="" disabled>Veuillez renseigner tous les champs</option>
                    </select>
                </section>
            </div>
        </div>

    </fieldset>

    <fieldset>
        <!-- Description local -->
        <div class="row">
            <label class="label col col-2">Commentaire</label>
            <section class="col col-10">
                <label class="textarea">
                    <textarea rows="5" name="commentaire_local" placeholder="Description" required"></textarea>
                </label>
            </section>
        </div>
    </fieldset>

    <footer>
        <button type="submit" name="submit" class="btn btn-primary">Ajouter !</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    </footer>

    </div>
</form>

<!-- Fin formulaire -->


<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/assets/js/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {


        pageSetUp();

        // PAGE RELATED SCRIPTS

        // pagefunction

        var pagefunction = function () {

            users();

            tinymce.init({
                selector: "textarea",
                height: 140,
                width: '99.9%',
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

            var $checkoutForm = $('#ajoutModule').validate({
                // Rules for form validation
                rules: {
                    module_nom: {
                        required: true
                    },
                    module_montantDevis: {
                        number: true
                    },
                    module_description: {
                        required: true
                    },
                    module_delaisRealisation: {
                        digits: true
                    },
                    id_utilisateurs: {
                        required: true
                    },
                    'id_utilisateurs[]':{
                        required: true
                    }
                },

                // Messages for form validation
                messages: {
                    module_nom: {
                        required: "Veuillez choisir un nom pour le module."
                    },
                    module_montantDevis: {
                        number: "Veuillez indiquer un montant correct."
                    },
                    module_description: {
                        required: "Veuillez indiquer une description."
                    },
                    module_delaisRealisation: {
                        digits: "Veuillez indiquer un délai de réalisation correct."
                    },
                    'id_utilisateurs[]': {
                        required: "Veuillez choisir au moins un utilisateur"
                    }
                },

                submitHandler: function (ev) {
                    $(ev).ajaxSubmit({
                        type: $('#ajoutModule').attr('method'),
                        url: $('#ajoutModule').attr('action'),
//                    data: $('#ajoutModule').serialize() + "&utilisateur_id=" + $('#id_utilisateurs').val(),
                        data: $('#ajoutModule').serializeArray(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.alert == '1') {
                                smallBox('Ajout impossible', 'Un local portant ce nom existe déjà.', 'warning');
                            }
                            else {
                                smallBox('Ajout effectué', 'Le local a correctement été ajouté.', 'success');
                                $('#listing_modules').DataTable().ajax.reload(null, false);
                            }
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


            // START AND FINISH DATE
            $('#startdate').datepicker({
                dateFormat: 'dd.mm.yy',
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                onSelect: function (selectedDate) {
                    $('#finishdate').datepicker('option', 'minDate', selectedDate);
                }
            });

            $('#finishdate').datepicker({
                dateFormat: 'dd.mm.yy',
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                onSelect: function (selectedDate) {
                    $('#startdate').datepicker('option', 'maxDate', selectedDate);
                }
            });

        };

        function users() {
            $.ajax({
                type: $('#ajoutSocietes').attr('method'),
                url: 'modules/projets/ajax/iSelect_utilisateur.php',
                dataType: 'json',
                success: function (data) {

                    $('#id_utilisateurs').html(data.html);

                    console.log('gg');
                    console.log(data);
                }
            });
        }

        // end pagefunction

        // Load form valisation dependency
        loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

    });
</script>