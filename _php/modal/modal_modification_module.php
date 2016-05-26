<?php require_once("../../../lib/config.php");
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM projets_modules WHERE projets_modules_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Modification d'un module</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iModification_module.php" id="modificationModule" class="smart-form" novalidate="novalidate"
      method="post"
      name="ajoutSociete">

    <input type="hidden" name="projet_id" id="projet_id" value="<?php echo $id?>">
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
                        <input type="text" name="module_nom" placeholder="Nom du module" required"
                        value="<?php echo $rang['projets_modules_nom']; ?>">
                    </label>
                </section>


                <label class="label col col-2">Description</label>
                <section class="col col-4">
                    <label class="input fe"> <i class="icon-prepend fa fa-pencil"></i>
                        <input type="text" name="module_description" id="module_description"
                               placeholder="Description du module" required"
                        class='adresse_identique' value="<?php echo $rang['projets_modules_description']; ?>">
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
                        class='adresse_identique' value="<?php echo $rang['projets_modules_refDevis']; ?>">
                    </label>
                </section>

                <!-- Code postal local -->
                <label class="label col col-2">Montant devis</label>
                <section class="col col-4">
                    <label class="input fe"> <i class="icon-prepend fa fa-eur"></i>
                        <input type="text" name="module_montantDevis" id="module_montantDevis"
                               placeholder="Montant du devis"
                               required"
                        class='adresse_identique' value="<?php echo $rang['projets_modules_montantDevis']; ?>">
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
                               placeholder="Date de début du projet"
                               value="<?php echo $rang['projets_modules_dateDebut']; ?>">
                    </label>
                </section>

                <!-- Telephone local -->
                <label class="label col col-2">Date fin</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar-check-o"></i>
                        <input type="text" class="form-control datepicker"
                               name="module_fin"
                               id="module_fin"
                               placeholder="Date de début du projet"
                               value="<?php echo $rang['projets_modules_dateFin']; ?>">
                    </label>
                </section>
            </div>

            <div class="row">
                <!-- Pays local -->
                <label class="label col col-2">Délais réalisation</label>
                <section class="col col-4">
                    <label class="input fe"> <i class="icon-prepend fa fa-hourglass"></i>
                        <input type="text" name="module_delaisRealisation" id="module_delaisRealisation"
                               placeholder="En heures" required"
                        value="<?php echo $rang['projets_modules_delaisRealisation']; ?>">
                    </label>
                </section>
            </div>

            <div class="row">
                <!-- Utilisateurs -->
                <div class="form-group">
                    <label class="label col col-2">Utilisateurs</label>
                    <section class="col col-10">
                        <select multiple style="width:100%" class="select2" id="id_utilisateurs"
                                name="id_utilisateurs[]" required>
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
                        <textarea rows="5" name="commentaire_local" placeholder="Description"
                                  required"><?php echo $rang['projets_modules_commentaires']; ?></textarea>
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
<!--<script type="text/javascript" src="js/plugin/select2/select2.min.js"></script>-->
<script type="text/javascript">

    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     *
     * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
     *
     * // activate tooltips
     * $("[rel=tooltip]").tooltip();
     *
     * // activate popovers
     * $("[rel=popover]").popover();
     *
     * // activate popovers with hover states
     * $("[rel=popover-hover]").popover({ trigger: "hover" });
     *
     * // activate inline charts
     * runAllCharts();
     *
     * // setup widgets
     * setup_widgets_desktop();
     *
     * // run form elements
     * runAllForms();
     *
     ********************************
     *
     * pageSetUp() is needed whenever you load a page.
     * It initializes and checks for all basic elements of the page
     * and makes rendering easier.
     *
     */

    pageSetUp();

    /*
     // Ajax envoie du formulaire sur /php/ajoutLogiciel
     var frm = $('#ajoutLogiciel');
     frm.submit(function (ev) {
     $.ajax({
     type: frm.attr('method'),
     url: frm.attr('action'),
     data: frm.serialize(),
     success: function (data) {
     smallBox('Information', data, 'success');
     }
     });

     ev.preventDefault();
     });
     */
    // PAGE RELATED SCRIPTS

    // pagefunction

    var pagefunction = function () {

        users();

        var $checkoutForm = $('#modificationModule').validate({
            // Rules for form validation
            rules: {
                nom_societe: {
                    required: true
                },
                type_contrat: {
                    required: true
                },
                site_web: {
                    required: true
                },
                messagerie: {
                    required: true
                },
                adresse: {
                    required: true
                },
                ville: {
                    required: true
                },
                code_postal: {
                    required: true,
                    digits: true
                },
                pays: {
                    required: true
                }
            },

            // Messages for form validation
            messages: {
                nom_societe: {
                    required: "Veuillez saisir un nom pour l'entreprise."
                },
                type_contrat: {
                    required: 'Veuillez selectionner un contrat.'
                },
                site_web: {
                    required: 'Veuillez saisir le site web.'
                },
                messagerie: {
                    required: 'Veuillez indiquer un service de messagerie'
                },
                adresse: {
                    required: "Veuillez renseigner une adresse."
                },
                ville: {
                    required: "Veuille renseigner une ville."
                },
                code_postal: {
                    required: "Veuillez renseigner un code postal.",
                    digits: "Veuillez indiquer une code postal correct."
                },
                pays: {
                    required: "Veuillez renseigner un pays."
                }
            },

            submitHandler: function (ev) {
                console.log('test');
                $(ev).ajaxSubmit({
                    type: $('#modificationModule').attr('method'),
                    url: $('#modificationModule').attr('action'),
                    data: $('#modificationModule').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log('succès');
                        if (data.retour == '1') {
                            smallBox('Modification impossible', 'Une société portant ce nom existe déjà.', 'warning');
                        }
                        else {
                            smallBox('Modification effectuée', 'La société a correctement été modifié.', 'success');
                        }
                        console.log(data.retour);
                    }
                });
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                console.log('erreur');
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

        function users() {


            $.ajax({
                type: $('#modificationModule').attr('method'),
                url: './php/iSelect_utilisateurs_modification_module.php',
                data: $('#modificationModule').serialize(),
                dataType: 'json',
                success: function (data) {

                    $('#id_utilisateurs').html(data.html);
                    $('#id_utilisateurs').select2();
                    console.log('gg');
                    console.log(data);
                }
            });
        }

    };



    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>