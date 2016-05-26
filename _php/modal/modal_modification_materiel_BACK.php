<?php require_once("../../../lib/config.php");
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM utilisateurs_produits WHERE utilisateurs_produits_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Modification matériel</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iModification_materiel.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate"
      method="post"
      name="ajoutSociete">
    <input type="hidden" name="materiel_id" value="<?php echo $rang['materiels_id'] ?>"/>
    <div class="modal-body">

        <fieldset>
            <!-- Type materiel -->
            <div class="row">
                <label class="label col col-2" id="label_type_materiel">Type de matériel</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="materiel_type" id="materiel_type" required>
                            <option value="" selected="" disabled="">Choisir un type de matériel</option>
                            <?php
                            $select = $pdo->sql("select type_materiels_id, type_materiels_nom from type_materiels group by type_materiels_nom");
                            while ($row = $select->fetch()) {
                                $societes_typeMateriel = $pdo->sqlValue("SELECT type_materiels FROM materiels WHERE materiels_id = ?", array($id));
                                $selected = ($row['type_materiels_id'] == $societes_typeMateriel) ? 'selected' : '';

                                echo "<option " . $selected . " value=" . $row['type_materiels_id'] . ">" . $row['type_materiels_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>
        </fieldset>

        <fieldset id="fieldset_ordinateur">
            <!-- Ordinateur ram -->
            <div class="row">
                <label class="label col col-2 hide" id="label_ordinateur_ram">RAM</label>
                <section class="col col-4 hide" id="ordinateur_ram">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="ordinateur_ram" placeholder="RAM" required"
                        value="<?php echo $rang['materiels_ordinateur_ram']; ?>">
                    </label>
                </section>

                <!-- Ordinateur CG -->
                <label class="label col col-2 hide" id="label_ordinateur_cg">Carte graphique</label>
                <section class="col col-4 hide" id="ordinateur_cg">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="ordinateur_cg" placeholder="Carte graphique" required"
                        value="<?php echo $rang['materiels_ordinateur_carteGraphique']; ?>">
                    </label>
                </section>
            </div>

            <!-- Ordinateur Processeur -->
            <div class="row">
                <label class="label col col-2 hide" id="label_processeur">Processeur</label>
                <section class="col col-4 hide" id="ordinateur_processeur">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="ordinateur_processeur" placeholder="Processeur" required"
                        value="<?php echo $rang['materiels_ordinateur_processeur']; ?>">
                    </label>
                </section>

                <!-- Ordinateur Stockage -->
                <label class="label col col-2 hide" id="label_stockage">Stockage</label>
                <section class="col col-4 hide" id="ordinateur_stockage">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="ordinateur_stockage" placeholder="Stockage" required"
                        value="<?php echo $rang['materiels_ordinateur_stockage']; ?>">
                    </label>
                </section>
            </div>

            <!-- Ordinateur Carte mere -->
            <div class="row">
                <label class="label col col-2 hide" id="label_ordinateur_cm">Carte mère</label>
                <section class="col col-4 hide" id="ordinateur_cm">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="ordinateur_cm" placeholder="Carte mère" required"
                        value="<?php echo $rang['materiels_ordinateur_carteMere']; ?>">
                    </label>
                </section>

                <!-- Ordinateur taille ecran -->
                <label class="label col col-2 hide" id="label_taille_ecran">Taille écran</label>
                <section class="col col-4 hide" id="ordinateur_tailleecran">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="ordinateur_tailleecran" placeholder="Taille écran" required"
                        value="<?php echo $rang['materiels_ordinateur_tailleEcran']; ?>">
                    </label>
                </section>
            </div>
        </fieldset>

        <fieldset id="fieldset_serveur">
            <!-- Serveur ram -->
            <div class="row">
                <label class="label col col-2 hide" id="label_serveur_ram">RAM</label>
                <section class="col col-4 hide" id="serveur_ram">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="serveur_ram" placeholder="Ram" required"
                        value="<?php echo $rang['materiels_serveur_ram']; ?>">
                    </label>
                </section>

                <!-- Serveur processeur -->
                <label class="label col col-2 hide" id="label_serveur_processeur">Processeur</label>
                <section class="col col-4 hide" id="serveur_processeur">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="serveur_processeur" placeholder="Processeur" required"
                        value="<?php echo $rang['materiels_serveur_processeur']; ?>">
                    </label>
                </section>
            </div>

            <!-- Serveur stockage -->
            <div class="row">
                <label class="label col col-2 hide" id="label_serveur_stockage">Stockage</label>
                <section class="col col-4 hide" id="serveur_stockage">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="serveur_stockage" placeholder="Stockage" required"
                        value="<?php echo $rang['materiels_serveur_stockage']; ?>">
                    </label>
                </section>

                <!-- Serveur carte mere -->
                <label class="label col col-2 hide" id="label_serveur_cm">Carte mère</label>
                <section class="col col-4 hide" id="serveur_cm">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="serveur_cm" placeholder="Carte mère" required"
                        value="<?php echo $rang['materiels_serveur_carteMere']; ?>">
                    </label>
                </section>
            </div>

            <!-- Serveur baies -->
            <div class="row">
                <label class="label col col-2 hide" id="label_serveur_baies">Baies</label>
                <section class="col col-4 hide" id="serveur_baies">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="serveur_baies" placeholder="Nombre de baies" required"
                        value="<?php echo $rang['materiels_serveur_baies']; ?>">
                    </label>
                </section>
            </div>
        </fieldset>

        <fieldset id="fieldset_switch">
            <!-- Switch ports -->
            <div class="row">
                <label class="label col col-2 hide" id="label_switch_ports">Ports</label>
                <section class="col col-4 hide" id="switch_ports">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_ports" placeholder="Ports" required"
                        value="<?php echo $rang['materiels_switch_ports']; ?>">
                    </label>
                </section>

                <!-- Switch interface web -->
                <label class="label col col-2 hide" id="label_switch_interface">Interface web</label>
                <section class="col col-4 hide" id="switch_interfaceweb">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_interfaceweb" placeholder="Interface web" required"
                        value="<?php echo $rang['materiels_switch_interfaceWeb']; ?>">
                    </label>
                </section>
            </div>

            <!-- Switch administrable -->
            <div class="row">
                <label class="label col col-2 hide" id="label_switch_administrable">Administrable</label>
                <section class="col col-4 hide" id="switch_administrable">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_administrable" placeholder="Administrable" required"
                        value="<?php echo $rang['materiels_switch_administrable']; ?>">
                    </label>
                </section>

                <!-- Switch poe -->
                <label class="label col col-2 hide" id="label_switch_poe">POE</label>
                <section class="col col-4 hide" id="switch_poe">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_poe" placeholder="POE" required"
                        value="<?php echo $rang['materiels_switch_poe']; ?>">
                    </label>
                </section>
            </div>

            <!-- Switch ipacces -->
            <div class="row">
                <label class="label col col-2 hide" id="label_switch_ipacces">Accès ip</label>
                <section class="col col-4 hide" id="switch_ipacces">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_ipacces" placeholder="Accès ip" required"
                        value="<?php echo $rang['materiels_switch_ipAcces']; ?>">
                    </label>
                </section>

                <!-- Switch vitesse -->
                <label class="label col col-2 hide" id="label_switch_vitesse">Vitesse</label>
                <section class="col col-4 hide" id="switch_vitesse">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_vitesse" placeholder="Vitesse" required"
                        value="<?php echo $rang['materiels_switch_vitesse']; ?>"s>
                    </label>
                </section>
            </div>

            <!-- Switch wifi -->
            <div class="row">
                <label class="label col col-2 hide" id="label_switch_wifi">Wifi</label>
                <section class="col col-4 hide" id="switch_wifi">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="switch_wifi" placeholder="Wifi" required"
                        value="<?php echo $rang['materiels_switch_wifi']; ?>">
                    </label>
                </section>
            </div>
        </fieldset>
        <fieldset id="fieldset_peripherique">
            <!-- Periphérique description -->
            <div class="row">
                <label class="label col col-2 hide" id="label_peripherique_description">Nom periphérique</label>
                <section class="col col-4 hide" id="peripherique_nom">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="peripherique_nom" placeholder="Nom" required"
                        value="<?php echo $rang['materiels_peripherique_nom']; ?>">
                    </label>
                </section>
            </div>
        </fieldset>
        <fieldset id="fieldset_materiel">
            <!-- Materiel reference -->
            <div class="row">
                <label class="label col col-2 hide" id="label_materiel_reference">Référence</label>
                <section class="col col-4 hide" id="materiel_reference">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="materiel_reference" placeholder="Référence" required"
                        value="<?php echo $rang['materiels_reference']; ?>">
                    </label>
                </section>

            <!-- Modele -->
                <label class="label col col-2 hide" id="label_materiel_modele">Modèle</label>
                <section class="col col-4 hide" id="materiel_modele">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="materiel_modele" placeholder="Modèle" required"
                        value="<?php echo $rang['materiels_modele']; ?>">
                    </label>
                </section>
            </div>

            <!-- EAN -->
            <div class="row">
                <label class="label col col-2 hide" id="label_materiel_ean">EAN</label>
                <section class="col col-4 hide" id="materiel_ean">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="materiel_ean" placeholder="EAN" required"
                        value="<?php echo $rang['materiels_ean']; ?>">
                    </label>
                </section>

            <!-- Prix -->
                <label class="label col col-2 hide" id="label_materiel_prix">Prix</label>
                <section class="col col-4 hide" id="materiel_prix">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="materiel_prix" placeholder="Prix" required"
                        value="<?php echo $rang['materiels_prix']; ?>">
                    </label>
                </section>
            </div>

            <!-- Materiel durée garantie -->
            <div class="row">
                <label class="label col col-2 hide" id="label_materiel_garantie">Garantie</label>
                <section class="col col-4 hide" id="materiel_garantie">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="materiel_garantie" placeholder="Durée de garantie" required"
                        value="<?php echo $rang['materiels_dureeGarantie']; ?>">
                    </label>
                </section>


            <!-- OS -->
                <label class="label col col-2 hide" id="label_materiel_os">OS</label>
                <section class="col col-3 hide" id="materiel_os">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="materiel_os" required>
                            <option value="" selected="" disabled="">Choisir un OS</option>
                            <?php
                            $select = $pdo->sql("select os_id, os_nom from os group by os_type");
                            while ($row = $select->fetch()) {
                                $societes_typeOS = $pdo->sqlValue("SELECT materiels_os FROM materiels WHERE materiels_id = ?", array($id));
                                $selected = ($row['os_id'] == $societes_typeOS) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['os_id'] . ">" . $row['os_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>



        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <!-- Description local -->
            <div class="row">
                <label class="label col col-2 hide" id="label_materiel_description">Description</label>
                <section class="col col-10 hide" id="materiel_description">
                    <label class="textarea">
                            <textarea rows="5" name="materiel_description" placeholder="Description"
                                      required><?php echo $rang['materiels_description']; ?></textarea>
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
                    required: true,
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
                $(ev).ajaxSubmit({
                    type: $('#ajoutSocietes').attr('method'),
                    url: $('#ajoutSocietes').attr('action'),
                    data: $('#ajoutSocietes').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.retour == '1') {
                            smallBox('Modification impossible', 'Un materiel porte déjà ce numero de serie.', 'warning');
                        }
                        else {
                            smallBox('Modification effectuée', 'Le materiel a correctement été modifié.', 'success');
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

    function changeOpenModal(){

            //region Initialisation du hide sur les champs
            $('#fieldset_ordinateur').addClass('hide');
            $('#ordinateur_ram').addClass('hide');
            $('#ordinateur_cg').addClass('hide');
            $('#ordinateur_processeur').addClass('hide');
            $('#ordinateur_stockage').addClass('hide');
            $('#ordinateur_cm').addClass('hide');
            $('#ordinateur_tailleecran').addClass('hide');
            $('#fieldset_serveur').addClass('hide');
            $('#serveur_ram').addClass('hide');
            $('#serveur_processeur').addClass('hide');
            $('#serveur_stockage').addClass('hide');
            $('#serveur_cm').addClass('hide');
            $('#serveur_baies').addClass('hide');
            $('#fieldset_switch').addClass('hide');
            $('#switch_ports').addClass('hide');
            $('#switch_interfaceweb').addClass('hide');
            $('#switch_administrable').addClass('hide');
            $('#switch_poe').addClass('hide');
            $('#switch_ipacces').addClass('hide');
            $('#switch_vitesse').addClass('hide');
            $('#switch_wifi').addClass('hide');
            $('#fieldset_peripherique').addClass('hide');
            $('#peripherique_nom').addClass('hide');
            $('#fieldset_materiel').addClass('hide');
            $('#materiel_os').addClass('hide');

            //endregion

            //region réinitialisation des labels
            $('#label_ordinateur_ram').addClass('hide');
            $('#label_ordinateur_cg').addClass('hide');
            $('#label_processeur').addClass('hide');
            $('#label_stockage').addClass('hide');
            $('#label_ordinateur_cm').addClass('hide');
            $('#label_taille_ecran').addClass('hide');
            $('#label_serveur_ram').addClass('hide');
            $('#label_serveur_processeur').addClass('hide');
            $('#label_serveur_stockage').addClass('hide');
            $('#label_serveur_cm').addClass('hide');
            $('#label_serveur_baies').addClass('hide');
            $('#label_switch_ports').addClass('hide');
            $('#label_switch_interface').addClass('hide');
            $('#label_switch_administrable').addClass('hide');
            $('#label_switch_poe').addClass('hide');
            $('#label_switch_ipacces').addClass('hide');
            $('#label_switch_vitesse').addClass('hide');
            $('#label_switch_wifi').addClass('hide');
            $('#label_peripherique_description').addClass('hide');
            $('#label_materiel_reference').addClass('hide');
            $('#label_materiel_modele').addClass('hide');
            $('#label_materiel_ean').addClass('hide');
            $('#label_materiel_prix').addClass('hide');
            $('#label_materiel_os').addClass('hide');
            $('#label_materiel_garantie').addClass('hide');
            $('#label_materiel_description').addClass('hide');
            //endregion

            //region Faire apparaitre les champs annexes sur chaque séléctions
            $('#materiel_reference').removeClass('hide');
            $('#materiel_modele').removeClass('hide');
            $('#materiel_ean').removeClass('hide');
            $('#materiel_prix').removeClass('hide');
            $('#materiel_garantie').removeClass('hide');
            $('#materiel_description').removeClass('hide');

            $('#label_materiel_reference').removeClass('hide');
            $('#label_materiel_modele').removeClass('hide');
            $('#label_materiel_ean').removeClass('hide');
            $('#label_materiel_prix').removeClass('hide');
            $('#label_materiel_garantie').removeClass('hide');
            $('#label_materiel_description').removeClass('hide');
            //endregion

            if ($('#materiel_type').val() == '1' || $('#materiel_type').val() == '2') {

                //region faire apparaitre les champs pour ordinateurs portable ou classique
                $('#fieldset_ordinateur').removeClass('hide');
                $('#fieldset_materiel').removeClass('hide');
                $('#materiel_type').attr('disabled', true);

                $('#ordinateur_ram').removeClass('hide');
                $('#ordinateur_cg').removeClass('hide');
                $('#ordinateur_processeur').removeClass('hide');
                $('#ordinateur_stockage').removeClass('hide');
                $('#ordinateur_cm').removeClass('hide');
                $('#ordinateur_tailleecran').removeClass('hide');
                $('#materiel_os').removeClass('hide');

                $('#label_ordinateur_ram').removeClass('hide');
                $('#label_ordinateur_cg').removeClass('hide');
                $('#label_processeur').removeClass('hide');
                $('#label_stockage').removeClass('hide');
                $('#label_ordinateur_cm').removeClass('hide');
                $('#label_taille_ecran').removeClass('hide');
                $('#label_materiel_os').removeClass('hide');
                //endregion

            } else if ($('#materiel_type').val() == '3') {

                //region faire apparaitre les champs pour switch
                $('#fieldset_switch').removeClass('hide');
                $('#fieldset_materiel').removeClass('hide');
                $('#materiel_type').attr('disabled', true);

                $('#switch_ports').removeClass('hide');
                $('#switch_interfaceweb').removeClass('hide');
                $('#switch_administrable').removeClass('hide');
                $('#switch_poe').removeClass('hide');
                $('#switch_ipacces').removeClass('hide');
                $('#switch_vitesse').removeClass('hide');
                $('#switch_wifi').removeClass('hide');

                $('#label_switch_ports').removeClass('hide');
                $('#label_switch_interface').removeClass('hide');
                $('#label_switch_administrable').removeClass('hide');
                $('#label_switch_poe').removeClass('hide');
                $('#label_switch_ipacces').removeClass('hide');
                $('#label_switch_vitesse').removeClass('hide');
                $('#label_switch_wifi').removeClass('hide');
                //endregion

            } else if ($('#materiel_type').val() == '4') {

                //region faire apparaitre les champs pour serveur
                $('#fieldset_serveur').removeClass('hide');
                $('#fieldset_materiel').removeClass('hide');
                $('#materiel_type').attr('disabled', true);

                $('#serveur_ram').removeClass('hide');
                $('#serveur_processeur').removeClass('hide');
                $('#serveur_stockage').removeClass('hide');
                $('#serveur_cm').removeClass('hide');
                $('#serveur_baies').removeClass('hide');
                $('#materiel_os').removeClass('hide');

                $('#label_serveur_ram').removeClass('hide');
                $('#label_serveur_processeur').removeClass('hide');
                $('#label_serveur_stockage').removeClass('hide');
                $('#label_serveur_cm').removeClass('hide');
                $('#label_serveur_baies').removeClass('hide');
                $('#label_materiel_os').removeClass('hide');
                //endregion


            } else if ($('#materiel_type').val() == '5') {

                //region faire apparaitre les champs pour les périphériques
                $('#fieldset_peripherique').removeClass('hide');
                $('#fieldset_materiel').removeClass('hide');
                $('#materiel_type').attr('disabled', true);

                $('#peripherique_nom').removeClass('hide');
                $('#label_peripherique_description').removeClass('hide');
                //endregion

            }

    }

    $('#modal_ajoute_clients').on('show.bs.modal', function (e) {
        // Et ici, la fonction en question
        changeOpenModal();
    });

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>