<?php require_once('../../../lib/config.php'); ?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajout d'une maintenance</h4>
</div>

<!-- Début du formulaire -->
<form action="modules/maintenances/ajax/iAjout_maintenance.php" id="ajoutMaintenance" class="smart-form"
      novalidate="novalidate"
      method="post" name="ajoutSociete">

    <div class="modal-body col-12">

        <fieldset>

            <!-- Maintenance -->
            <div class="row">
                <label class="label col col-2">Maintenance</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="maintenance_type" id="select_entreprise" required>
                            <option value="" disabled selected>Type maintenance</option>
                            <?php
                            $select = $pdo->sql("select maintenances_type_id, maintenances_type_nom from maintenances_type group by maintenances_type_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['maintenances_type_id'] . ">" . $row['maintenances_type_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Association maintenance -->
            <div class="row">
                <label class="label col col-2">Catégorie</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="maintenance_categorie" id="select_categorie" required>
                            <option value="" selected="" disabled="">Choisir une catégorie</option>
                            <?php
                            $select = $pdo->sql("select maintenances_categories_id, maintenances_categories_nom from maintenances_categories group by maintenances_categories_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['maintenances_categories_id'] . ">" . $row['maintenances_categories_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- SOCIETE -->
            <div class="row" id="div_societe">
                <label class="label col col-2">Société</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="select_societe" id="select_societe" required>
                            <option value="" disabled selected>Nom société</option>
                            <?php
                            $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- APPLICATION -->
            <div class="row" id="div_application">
                <label class="label col col-2">Application</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="select_application" id="select_application" required>
                            <option value="" disabled selected>Nom du projet</option>
                            <?php
                            $select = $pdo->sql("select projets_id, projets_nom from projets group by projets_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['projets_id'] . ">" . $row['projets_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- UTILISATEUR -->
            <div class="row" id="div_utilisateur">
                <label class="label col col-2">Utilisateur</label>
                <section class="col col-3">
                    <select class="select2" name="select_utilisateur" id="select_utilisateur">
                        <option value="" selected="" disabled="">Associer à</option>
                        <?php

                        $select_utilisateur = $pdo->sql("SELECT societes_id, societes_nom, utilisateurs_id, utilisateurs_nom FROM utilisateurs_locaux ORDER BY societes_nom");
                        $id_generique = 0;
                        foreach ($select_utilisateur as $utilisateurs) {
                            if ($utilisateurs['societes_id'] != $id_generique) {
                                if (!empty($id_generique)) {
                                    echo "</optgroup>";
                                }
                                $id_generique = $utilisateurs['societes_id'];
                                echo "<optgroup label='" . $utilisateurs['societes_nom'] . "'>";
                            }
                            echo "<option value=" . $utilisateurs['utilisateurs_id'] . " alt='Finance'>" . $utilisateurs['utilisateurs_nom'] . "</option>";

                        }

                        ?>
                    </select>
                </section>
            </div>


            <!-- Date maintenance -->
            <div class="row">

                <label class="label col col-2">Date</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="maintenance_date"
                               placeholder="Date maintenance" required">
                    </label>
                </section>

                <label class="label col col-2">Heure</label>
                <section class="col col-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        <input class="form-control" name="maintenance_heure" id="clockpicker" type="text"
                               placeholder="&nbsp;Heure de la maintenance" data-autoclose="true">
                    </div>
                </section>

            </div>

            <!-- Durée maintenance -->
            <div class="row">
                <label class="label col col-2">Durée</label>
                <section class="col col-4">
                    <label class="input fe"><i class="icon-prepend fa fa-cogs"></i>
                        <input type="text" name="maintenance_duree" placeholder="Durée de la maintenance" required">
                    </label>
                </section>
            </div>

        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <div class="row">
                <label class="label col col-2">Statut</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-cogs"></i>
                        <input type="text" name="maintenance_statut" placeholder="Statut de la maintenance"
                               required">
                    </label>
                </section>
            </div>
            <div class="row">
                <label class="label col col-2">Commentaire</label>
                <section class="col col-10">
                    <label class="textarea">
                                <textarea rows="5" name="maintenance_commentaire" placeholder="Commentaire"
                                          required></textarea>
                    </label>
                </section>
            </div>
        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary">Ajouter !</button>
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


            var $checkoutForm = $('#ajoutMaintenance').validate({
                // Rules for form validation
                rules: {
                    maintenance_type: {
                        required: true
                    },
                    select_societe: {
                        required: true
                    },
                    select_application: {
                        required: true
                    },
                    select_utilisateur: {
                        required: true
                    },
                    maintenance_date: {
                        required: true
                    },
                    maintenance_heure: {
                        required: true
                    },
                    maintenance_duree: {
                        required: true,
                        digits: true
                    },
                    maintenance_statut: {
                        required: true
                    },
                },

                // Messages for form validation
                messages: {
                    maintenance_type: {
                        required: "Veuillez saisir un type."
                    },
                    select_societe: {
                        required: "Veuillez sélectionner une société."
                    },
                    select_application: {
                        required: "Veuillez sélectionner une application."
                    },
                    select_utilisateur: {
                        required: "Veuillez sélectionner un utilisateur."
                    },
                    maintenance_date: {
                        required: "Veuillez choisir une date pour la maintenance"
                    },
                    maintenance_heure: {
                        required: "Veuillez saisir une heure pour la maintenance."
                    },
                    maintenance_duree: {
                        required: "Veuillez saisir la durée de la maintenance.",
                        digits: "Veuillez entrer une durée de maintenance correct."
                    },
                    maintenance_statut: {
                        required: "Veuillez saisir un statut pour la maintenance."
                    },
                },

                submitHandler: function (ev) {
                    $(ev).ajaxSubmit({
                        type: $('#ajoutMaintenance').attr('method'),
                        url: $('#ajoutMaintenance').attr('action'),
                        data: $('#ajoutMaintenance').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            
                            if (data.retour != '0') {
                                smallBox('Ajout impossible', 'Impossible d\'ajouter cette maintenance.', 'warning');
                            }
                            else {
                                smallBox('Maintenance ajoutée', 'La maintenance à correctement été ajoutée.', 'success');
                                setTimeout(function () {
                                    $('#listing_maintenance').DataTable().ajax.reload(null, false);
                                }, 500);
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

            cacher_div(); // permet de cacher les div a l'utilisateur permettant la saisi de du type d'association a sa maintenance (util, etc)




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

            $('#select_categorie').change(function () {
                $('#select_societe').val('');
                $('#select_application').val('');
                $('#select_utilisateur').val('');

                $('#div_societe').addClass('hide');
                $('#div_application').addClass('hide');
                $('#div_utilisateur').addClass('hide');
                switch ($('#select_categorie').val()) {
                    case '1':
                        $('#div_societe').removeClass('hide');
                        break;
                    case '2':
                        $('#div_application').removeClass('hide');
                        break;
                    case '3':
                        $('#div_utilisateur').removeClass('hide');
                        break;
                }
            });

        };

        function runClockPicker() {
            $('#clockpicker').clockpicker({
                placement: 'bottom',
            });
        }

        loadScript("assets/js/plugin/clockpicker/clockpicker.min.js", runClockPicker);

        loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
    });

    function cacher_div() {
        $('#div_societe').addClass('hide');
        $('#div_application').addClass('hide');
        $('#div_utilisateur').addClass('hide');
    }



</script>