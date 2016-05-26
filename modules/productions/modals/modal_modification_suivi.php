<?php require_once('../../../lib/config.php');
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM view_suivis WHERE suivis_id = ?", array($id)) ?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Modification d'un suivi</h4>
</div>

<!-- Début du formulaire -->
<form action="modules/productions/ajax/iModification_suivi.php" id="ajoutSuivi" class="smart-form" novalidate="novalidate"
      method="post" name="ajoutSociete">

    <div class="modal-body col-12">
        <input class="hidden" name="id_suivi" value="<?php echo $id; ?>"/>
        <fieldset>

            <!-- Societe -->
            <div class="row">
                <label class="label col col-2">Utilisateurs</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="select_utilisateurs" id="select_utilisateurs" required>
                            <option value="" disabled selected>Choisir un utilisateur</option>
                            <?php
                            $select = $pdo->sql("select iwit_utilisateur_id, iwit_utilisateur_nomComplet from iwit_utilisateurs group by iwit_utilisateur_nomComplet");
                            while ($row = $select->fetch()) {
                                $select_utilisateurs_selected = $pdo->sqlValue("SELECT iwit_utilisateur_id FROM view_suivis WHERE suivis_id = ?", array($id));
                                $selected = ($row['iwit_utilisateur_id'] == $select_utilisateurs_selected) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['iwit_utilisateur_id'] . ">" . $row['iwit_utilisateur_nomComplet'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Type projet -->
            <div class="row">
                <label class="label col col-2">Projet</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="projet_selection" id="projet_selection" required>
                            <option value="" selected="" disabled="">Choisir un projet</option>
                            <?php

                            $select = $pdo->sql("select projets_id, projets_nom from projets GROUP BY projets_nom");
                            while ($row = $select->fetch()) {
                                $projet_selection_selected = $pdo->sqlValue("SELECT projets_id FROM view_suivis WHERE suivis_id = ?", array($id));
                                $selected = ($row['projets_id'] == $projet_selection_selected) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['projets_id'] . ">" . $row['projets_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Type projet -->
            <div class="row">
                <label class="label col col-2">Module</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="module_selection" id="module_selection" required>
                            <option value="" selected="" disabled="">Choisir un module</option>
                            <?php

                            $select = $pdo->sql("select projets_modules_id, projets_modules_nom from projets_modules GROUP BY projets_modules_nom");
                            while ($row = $select->fetch()) {
                                $module_selection_selected = $pdo->sqlValue("SELECT projets_modules_id FROM view_suivis WHERE suivis_id = ?", array($id));
                                $selected = ($row['projets_modules_id'] == $module_selection_selected) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['projets_modules_id'] . ">" . $row['projets_modules_nom'] . "</option>";
                            }

                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Type projet -->
            <div class="row">
                <label class="label col col-2">Catégorie du suivi</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="categorie_selection" id="categorie_selection" required>
                            <option value="" selected="" disabled="">choisir une catégorie</option>
                            <?php

                            $select = $pdo->sql("select suivis_categories_id, suivis_categories_nom from suivis_categories GROUP BY suivis_categories_nom");
                            while ($row = $select->fetch()) {
                                $categorie_selection_selected = $pdo->sqlValue("SELECT suivis_categories_id FROM view_suivis WHERE suivis_id = ?", array($id));
                                $selected = ($row['suivis_categories_id'] == $categorie_selection_selected) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['suivis_categories_id'] . ">" . $row['suivis_categories_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Nom projet -->
            <div class="row">
                <label class="label col col-2">Date</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="suivi_date"
                               id="utilisateur_embauche"
                               placeholder="Date de début du projet" value="<?php echo $rang['suivis_date']; ?>">
                    </label>
                </section>


                <!-- Description projet -->

                <label class="label col col-2">Durée</label>
                <section class="col col-4">
                    <label class="input fe"><i class="icon-prepend fa fa-cogs"></i>
                        <input type="text" name="suivi_duree" placeholder="en heures" required
                               value="<?php echo $rang['suivis_duree']; ?>">
                    </label>
                </section>
            </div>

        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <div class="row">
                <label class="label col col-2">Commentaire</label>
                <section class="col col-10">
                    <label class="textarea">
                                <textarea rows="5" name="suivi_commentaire" placeholder="Commentaire"
                                          required><?php echo $rang['suivis_description']; ?></textarea>
                    </label>
                </section>
            </div>
        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary">Modifier !</button>
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

            tinymce.init({
                selector: 'textarea',
                height: 140,
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


            var $checkoutForm = $('#ajoutSuivi').validate({
                // Rules for form validation
                rules: {
                    nom_entreprise: {
                        required: true
                    },
                    id_local: {
                        required: true
                    },
                    utilisateur_service: {
                        required: true
                    },
                    utilisateur_nom: {
                        required: true
                    },
                    utilisateur_prenom: {
                        required: true
                    },
                    utilisateur_telephoneFixe: {
                        required: true,
                        digits: true
                    },
                    utilisateur_telephoneMobile: {
                        required: true,
                        digits: true
                    },
                    utilisateur_email: {
                        required: true,
                        email: true
                    },
                    utilisateur_fonction: {
                        required: true
                    },
                    utilisateur_statut: {
                        required: true
                    },
                    utilisateur_commentaire: {
                        required: true
                    }
                },

                // Messages for form validation
                messages: {
                    nom_entreprise: {
                        required: "Veuillez sélectionner une entreprise."
                    },
                    id_local: {
                        required: "Veuillez sélectionner un local."
                    },
                    utilisateur_service: {
                        required: "Veuillez renseigner un service."
                    },
                    utilisateur_nom: {
                        required: "Veuillez renseigner un nom."
                    },
                    utilisateur_prenom: {
                        required: "Veuillez renseigner un prénom."
                    },
                    utilisateur_telephoneFixe: {
                        required: "Veuillez renseigner un téléphone fixe."
                    },
                    utilisateur_telephoneMobile: {
                        required: "Veuillez renseigner un téléphone mobile."
                    },
                    utilisateur_email: {
                        required: "Veuillez renseigner un email.",
                        email: "Veuillez renseigner un email correct"
                    },
                    utilisateur_fonction: {
                        required: "Veuillez renseigner une fonction."
                    },
                    utilisateur_statut: {
                        required: "Veuillez renseigner un statut."
                    },
                    utilisateur_commentaire: {
                        required: "Veuillez renseigner un commentaire."
                    }

                },

                submitHandler: function (ev) {
                    $(ev).ajaxSubmit({
                        type: $('#ajoutSuivi').attr('method'),
                        url: $('#ajoutSuivi').attr('action'),
                        data: $('#ajoutSuivi').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            
                            smallBox('Modification réussi !', 'Le suivis à correctement été modifié.', 'success');
                            setTimeout(function () {
                                $('#suivis_listing').DataTable().ajax.reload(null, false);
                            }, 500);

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

            $('#projet_selection').change(function () {
                $.ajax({
                    type: $('#ajoutSuivi').attr('method'),
                    url: 'modules/productions/ajax/iSelect_projets_modules.php',
                    data: {'projet_selection': $('#projet_selection').val()},
                    dataType: 'json',
                    success: function (data) {

                        $('#module_selection').html(data.html);

                        console.log('gg');
                        console.log(data);
                    }
                });
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

        loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

    });

    function module_refresh() {
        $.ajax({
            type: $('#ajoutSuivi').attr('method'),
            url: 'modules/productions/ajax/iSelect_projets_modules.php',
            data: {'projet_selection': $('#projet_selection').val()},
            dataType: 'json',
            success: function (data) {

                $('#module_selection').html(data.html);

                console.log('gg');
                console.log(data);
            }
        });
    }
</script>