<?php require_once("../../../lib/config.php");
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Modifier utilisateur</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iModification_utilisateur.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate"
      method="post"
      name="ajoutSociete">
    <input type="hidden" name="utilisateurs_id" value="<?php echo $id; ?>"/>
    <div class="modal-body col-12">

        <fieldset>
            <!-- Societe nom id -->
            <div class="row">
                <label class="label col col-2">Entreprise</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="nom_entreprise" id="select_entreprise" required>
                            <option value="" disabled selected>Choisir un local d'entreprise</option>
                            <?php
                            $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_nom");
                            while ($row = $select->fetch()) {
                                $id_local = $pdo->sqlValue("SELECT societes_locaux_id FROM utilisateurs WHERE utilisateurs_id = ?", array($id));
                                $utilisateurs_Societe = $pdo->sqlValue("SELECT societes_id FROM societes_locaux WHERE societes_locaux_id = ?", array($id_local));
                                $selected = ($row['societes_id'] == $utilisateurs_Societe) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Societe local id -->
            <div class="row">
                <label class="label col col-2">Nom local</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="id_local" id="select_local" required>
                            <option value="" selected="" disabled="">Choisir un local d'entreprise</option>
                            <?php
                            $select = $pdo->sql("select societes_locaux_id, societes_locaux_nom from societes_locaux group by societes_locaux_nom");
                            while ($row = $select->fetch()) {
                                $utilisateurs_local = $pdo->sqlValue("SELECT societes_locaux_id FROM utilisateurs WHERE utilisateurs_id = ?", array($id));
                                $selected = ($row['societes_locaux_id'] == $utilisateurs_local) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['societes_locaux_id'] . ">" . $row['societes_locaux_nom'] . "</option>";
                            }
                            ?>

                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Service utilisateur -->
            <div class="row">
                <label class="label col col-2">Service</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                        <input type="text" name="utilisateur_service" placeholder="Service de l'utilisateur" required"
                        value="<?php echo $rang['utilisateurs_service']; ?>">
                    </label>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <!-- Nom utilisateur -->
            <div class="row">
                <label class="label col col-2">Nom utilisateur</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                        <input type="text" name="utilisateur_nom" placeholder="Nom de l'utilisateur" required"
                        value="<?php echo $rang['utilisateurs_nom']; ?>">
                    </label>
                </section>


                <!-- Prénom de l'utilisateur -->
                <label class="label col col-2">Prénom utilisateur</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="utilisateur_prenom" placeholder="Prénom de l'utilisateur" required"
                        value="<?php echo $rang['utilisateurs_prenom']; ?>">
                    </label>
                </section>
            </div>

            <!-- Téléphone fixe utilisateur -->
            <div class="row">
                <label class="label col col-2">Téléphone fixe</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="utilisateur_telephoneFixe" placeholder="Téléphone fixe" required"
                        value="<?php echo $rang['utilisateurs_telephoneFixe']; ?>">
                    </label>
                </section>

                <!-- Téléphone mobile utilisateur -->
                <label class="label col col-2">Téléphone mobile</label>
                <section class="col col-4">
                    <label class="input fe"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="utilisateur_telephoneMobile" placeholder="Téléphone mobile" required"
                        value="<?php echo $rang['utilisateurs_telephoneMobile']; ?>">
                    </label>
                </section>

                <!-- Mail local -->
                <label class="label col col-2">Email</label>
                <section class="col col-4">
                    <label class="input fe"> <i class="icon-prepend fa fa-envelope-o"></i>
                        <input type="text" name="utilisateur_email" placeholder="Émail" required"
                        value="<?php echo $rang['utilisateurs_email']; ?>">
                    </label>
                </section>
            </div>
        </fieldset>
        <fieldset>
            <!-- Code postal local -->
            <div class="row">
                <label class="label col col-2">Fonction</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="utilisateur_fonction" placeholder="Fonction" required"
                        value="<?php echo $rang['utilisateurs_fonction']; ?>">
                    </label>
                </section>

                <!-- Pays local -->
                <label class="label col col-2">Statut</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="utilisateur_statut" placeholder="Statut" required"
                        value="<?php echo $rang['utilisateurs_statut']; ?>">
                    </label>
                </section>
            </div>

        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <!-- Statut local -->
            <div class="row">
                <label class="label col col-2">Commentaire</label>
                <section class="col col-10">
                    <label class="textarea"> <i class="icon-prepend fa fa-flag"></i>
                        <textarea rows="5" name="utilisateur_commentaire" placeholder="Commentaire"
                                  required><?php echo $rang['utilisateurs_commentaire']; ?></textarea>
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

        var $checkoutForm = $('#ajoutSocietes').validate({
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
                    required: false
                },
                pays: {
                    required: false
                }
            },

            // Messages for form validation
            messages: {
                nom_societe: {
                    required: 'Veuillez saisir le nom de la société'
                },
                type_contrat: {
                    required: 'Veuillez indiquer un contrat'
                },
                site_web: {
                    required: 'Veuillez saisir un site web'
                },
                messagerie: {
                    required: 'Veuillez saisir un service de messagerie'
                },
                adresse: {
                    required: 'Veuillez saisir une adresse'
                },
                ville: {
                    required: "Veuillez saisir une ville"
                },
                code_postal: {
                    required: 'Veuillez saisir un code postal'
                },
                pays: {
                    required: 'Veuillez saisir un pays'
                }
            },

            submitHandler: function (ev) {
                console.log('test');
                $(ev).ajaxSubmit({
                    type: $('#ajoutSocietes').attr('method'),
                    url: $('#ajoutSocietes').attr('action'),
                    data: $('#ajoutSocietes').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log('succès');
                        if (data.retour == '1') {
                            smallBox('Modification impossible', 'Un utilisateur ayant cet email existe déjà.', 'warning');
                        }
                        else {
                            smallBox('Modification effectuée', 'Un utilisateur a correctement été modifié.', 'success');
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

    };

    $('#select_entreprise').change(function () {
        $.ajax({
            type: $('#ajoutSocietes').attr('method'),
            url: './php/iSelect_entreprise.php',
            data: {'select_entreprise': $('#select_entreprise').val()},
            dataType: 'json',
            success: function (data) {

                $('#select_local').html(data.html);
                
                console.log(data);
            }
        });
    });

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>