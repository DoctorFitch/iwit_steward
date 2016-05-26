<?php require_once("./inc/init.php");
$func = new Functions();
$id = $_GET['id'];
$rang = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ?", array($id));
?>

<h4 class="modal-title" id="myModalLabel">Modification de
    l'utilisateur <?php echo $rang['utilisateurs_prenom'] . ' ' . $rang['utilisateurs_nom']; ?></h4><br/>

<section>
    <article class="col-lg-6">

        <div class="jarviswidget jarviswidget-color-blueDark">

            <header role="heading">
                <div class="jarviswidget-ctrls" role="menu"></div>
                <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                <h2>Fiche utilisateur</h2>
            </header>

            <div role="content">

                <div class="widget-body no-padding">

                    <div class="smart-form">

                        <form action="modules/utilisateurs/ajax/iModification_utilisateur.php" id="modificationUtilisateur"
                              class="smart-form"
                              novalidate="novalidate"
                              method="post" name="ajoutSociete">

                            <fieldset>

                                <!-- ID utilisateur -->
                                <input type="hidden" name="utilisateurs_id" id="utilisateurs_id"
                                       value="<?php echo $id; ?>"/>

                                <!-- Societe nom-->
                                <div class="row">
                                    <label class="label col col-2 state-disabled">Entreprise</label>
                                    <section class="col col-3">
                                        <div class="icon-addon" style="width: 122%;">
                                            <select class="form-control" name="nom_entreprise"
                                                    id="select_entreprise"
                                                    required disabled="disabled">
                                                <option value="" disabled selected>Choisir une entreprise</option>
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
                                            <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip"
                                                   title=""
                                                   data-original-title="email"></label>
                                        </div>
                                    </section>
                                </div>

                                <!-- Societe local -->
                                <div class="row">
                                    <label class="label col col-2">Local</label>
                                    <section class="col col-3">
                                        <div class="icon-addon" style="width: 122%;">
                                            <select class="form-control" name="id_local" id="select_local" required>
                                                <option value="" selected="" disabled="">Choisir un local
                                                    d'entreprise
                                                </option>
                                                <?php

                                                $select = $pdo->sql("select societes_locaux_id, societes_locaux_nom from societes_locaux group by societes_locaux_nom");
                                                while ($row = $select->fetch()) {
                                                    $utilisateurs_local = $pdo->sqlValue("SELECT societes_locaux_id FROM utilisateurs WHERE utilisateurs_id = ?", array($id));
                                                    $selected = ($row['societes_locaux_id'] == $utilisateurs_local) ? 'selected' : '';
                                                    echo "<option " . $selected . " value=" . $row['societes_locaux_id'] . ">" . $row['societes_locaux_nom'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="email" class="glyphicon glyphicon-search" rel="tooltip"
                                                   title=""
                                                   data-original-title="email"></label>
                                        </div>
                                    </section>
                                </div>

                                <!-- Service utilisateur -->
                                <div class="row">
                                    <label class="label col col-2">Service</label>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend fa fa-cogs"></i>
                                            <input type="text" name="utilisateur_service"
                                                   placeholder="Service de l'utilisateur"
                                                   required" value="<?php echo $rang['utilisateurs_service']; ?>">
                                        </label>
                                    </section>


                                    <!-- Fonction -->

                                    <label class="label col col-2">Fonction</label>
                                    <section class="col col-4">
                                        <label class="input fe">
                                            <input type="text" name="utilisateur_fonction" placeholder="Fonction"
                                                   required"
                                            value="<?php echo $rang['utilisateurs_fonction']; ?>">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <fieldset>
                                <!-- Nom utilisateur -->
                                <div class="row">
                                    <label class="label col col-2">Nom</label>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            <input type="text" name="utilisateur_nom"
                                                   placeholder="Nom de l'utilisateur"
                                                   required"
                                            value="<?php echo $rang['utilisateurs_nom']; ?>">
                                        </label>
                                    </section>

                                    <!-- Prénom de l'utilisateur -->
                                    <label class="label col col-2">Prénom</label>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            <input type="text" name="utilisateur_prenom"
                                                   placeholder="Prénom de l'utilisateur"
                                                   required" value="<?php echo $rang['utilisateurs_prenom']; ?>">
                                        </label>
                                    </section>

                                    <!-- Téléphone fixe utilisateur -->
                                    <label class="label col col-2">Tél. fixe</label>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                            <input type="text" name="utilisateur_telephoneFixe"
                                                   placeholder="Téléphone fixe"
                                                   required" value="<?php echo $rang['utilisateurs_telephoneF']; ?>">
                                        </label>
                                    </section>

                                    <!-- Téléphone mobile utilisateur -->
                                    <label class="label col col-2">Tél. mobile</label>
                                    <section class="col col-4">
                                        <label class="input fe"> <i class="icon-prepend fa fa-phone"></i>
                                            <input type="text" name="utilisateur_telephoneMobile"
                                                   placeholder="Téléphone mobile"
                                                   required" value="<?php echo $rang['utilisateurs_telephoneM']; ?>">
                                        </label>
                                    </section>

                                    <!-- Ville local -->
                                    <label class="label col col-2">Email</label>
                                    <section class="col col-4">
                                        <label class="input fe"> <i class="icon-prepend fa fa-envelope-o"></i>
                                            <input type="text" name="utilisateur_email" placeholder="Email" required"
                                            value="<?php echo $rang['utilisateurs_email']; ?>">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <fieldset>

                                <!-- Date embauche -->
                                <div class="row">
                                    <label class="label col col-2">Date embauche</label>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                            <input type="text" class="form-control datepicker"
                                                   name="utilisateur_embauche"
                                                   id="utilisateur_embauche"
                                                   placeholder="Date d'embauche"
                                                   value="<?php echo $rang['utilisateurs_dateEntree']; ?>">
                                        </label>
                                    </section>


                                    <!-- Date départ -->
                                    <label class="label col col-2">Date départ</label>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                            <input type="text" class="form-control datepicker"
                                                   name="utilisateur_depart"
                                                   id="utilisateur_depart"
                                                   placeholder="Date de départ"
                                                   value="<?php echo $rang['utilisateurs_dateSortie']; ?>">
                                        </label>
                                    </section>
                                </div>

                            </fieldset>
                            <!-- NOUVEAU FIELDSET -->
                            <fieldset>
                                <!-- Statut local -->
                                <div class="row">
                                    <!-- Pays local -->
                                    <label class="label col col-2">État</label>
                                    <section class="col col-4">
                                        <label class="input fe">
                                            <input type="text" name="utilisateur_statut" placeholder="Statut"
                                                   required"
                                            value="<?php echo $rang['utilisateurs_etat']; ?>">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <label class="label col col-2">Commentaire</label>
                                    <section class="col col-10">
                                        <label class="textarea">
                                            <textarea rows="5" name="utilisateur_commentaire"
                                                      placeholder="Commentaire"><?php echo $rang['utilisateurs_commentaire']; ?></textarea>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <footer>
                                <button type="submit" class="btn btn-primary">Modifier !</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </footer>
                        </form>
                        <!-- Fin formulaire -->
                    </div>

                </div>

            </div>

        </div>
        <button type="button" class="well" onclick="retour_listing();"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Retour
            vers listing utilisateur
        </button>
    </article>

    <article class="col-lg-6">

        <div class="jarviswidget jarviswidget-color-redLight">

            <header>
                <span class="widget-icon"> <i class="fa fa-product-hunt"></i> </span>
                <h2>Liste des produits</h2>

            </header>

            <div>

                <div class="jarviswidget-editbox">

                </div>

                <div class="widget-body no-padding">

                    <table id="listing_materiels" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Nom</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->
        <button type="button" class="well" onclick="ajouter_produit(<?php echo $id; ?>);"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter
            un produit
        </button>
    </article>

</section> <!-- Fin de la section d'article -->

<!-- Permer l'invocation de la forme modal-->
<div class="modal fade" id="modal_ajoute_clients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- end modal -->

<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/assets/js/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        pageSetUp();

        var pagefunction = function () {

            tinymce.init({
                selector: 'textarea',
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

            var responsiveHelper_listing_materiels = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };

            $('#listing_materiels').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth": true,
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_listing_materiels) {
                        responsiveHelper_listing_materiels = new ResponsiveDatatablesHelper($('#listing_materiels'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_listing_materiels.createExpandIcon(nRow);
                },
                "drawCallback": function (oSettings) {
                    responsiveHelper_listing_materiels.respond();
                },
                "ajax": {
                    "url": "modules/utilisateurs/ajax/iListe_utilisateurs_produits.php",
                    "type": 'POST',
                    "data": {
                        "user_id": $('#utilisateurs_id').val()
                    }
                },
                "language": {
                    "url": "./data/French.json"
                }
            });
            /* FIN DATATABLE */

            var $checkoutForm = $('#modificationUtilisateur').validate({
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
                        required: "Veuillez renseigner un téléphone fixe.",
                        digits: "Veuillez renseigner un numéro de téléphone correct."
                    },
                    utilisateur_telephoneMobile: {
                        required: "Veuillez renseigner un téléphone mobile.",
                        digits: "Veuillez renseigner un numéro de téléphone correct."
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
                    }
                },

                submitHandler: function (ev) {
                    $(ev).ajaxSubmit({
                        type: $('#modificationUtilisateur').attr('method'),
                        url: $('#modificationUtilisateur').attr('action'),
                        data: $('#modificationUtilisateur').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.retour == '1') {
                                smallBox('Modification impossible', 'Un utilisateur utilise déjà cet email.', 'warning');
                            }
                            else {
                                smallBox('Modification effectuée', 'Utilisateur correctement mofifié.', 'success');
                                setTimeout(function () {
                                    $('#listing_materiels').DataTable().ajax.reload(null, false);
                                }, 1000);
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


            var $checkoutForm = $('#ajoutProduit').validate({
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
                        required: "Veuillez renseigner un téléphone fixe.",
                        digits: "Veuillez renseigner un numéro de téléphone correct."
                    },
                    utilisateur_telephoneMobile: {
                        required: "Veuillez renseigner un téléphone mobile.",
                        digits: "Veuillez renseigner un numéro de téléphone correct."
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
                    }
                },

                submitHandler: function (ev) {
                    $(ev).ajaxSubmit({
                        type: $('#ajoutProduit').attr('method'),
                        url: $('#ajoutProduit').attr('action'),
                        data: $('#ajoutProduit').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.retour == '1') {
                                smallBox('Impossible', '<?php echo $rang['utilisateurs_prenom'] ?> dispose déjà de ce produit.', 'warning');
                            }
                            else {
                                smallBox('Produit ajouté', 'Produit correctement attribué à <?php echo $rang['utilisateurs_prenom'] ?>.', 'success');
                                setTimeout(function () {
                                    $('#datatable_tabletools').DataTable().ajax.reload(null, false);
                                }, 1000);
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
                type: $('#modificationUtilisateur').attr('method'),
                url: './php/iSelect_entreprise.php',
                data: {'select_entreprise': $('#select_entreprise').val()},
                dataType: 'json',
                success: function (data) {

                    $('#select_local').html(data.html);

                    console.log('gg');
                    console.log(data);
                }
            });
        });

        $('#type_produit').change(function () {
            $.ajax({
                type: $('#ajoutProduit').attr('method'),
                url: './php/iSelect_produits.php',
                data: {'type_produit': $('#type_produit').val()},
                dataType: 'json',
                success: function (data) {

                    $('#produit').html(data.html);

                    console.log('gg');
                    console.log(data);
                }
            });
        });

        loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function () {
            loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function () {
                loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function () {
                    loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function () {
                        loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", function () {
                            loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction)
                        });
                    });
                });
            });
        });

    });

    function ouvertureModification_local(paramId) {

        $.ajax({
            url: 'modules/utilisateurs/modals/modal_modification_local.php',
            type: 'POST',
            data: {'id': paramId},
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_clients .modal-content').html(contenu);
                $('#modal_ajoute_clients').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    function ouvertureModification_materiel(paramId) {
        $.ajax({
            url: 'modules/utilisateurs/modals/modal_modification_materiel.php',
            type: 'POST',
            data: {'id': paramId},
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_clients .modal-content').html(contenu);
                $('#modal_ajoute_clients').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    function ajouter_produit(paramId) {
        $.ajax({
            url: 'modules/materiels/modals/modal_ajout_materiel.php',
            type: 'POST',
            data: {'id': paramId},
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_clients .modal-content').html(contenu);
                $('#modal_ajoute_clients').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    function suppressionLigne(paramId) {
        $.SmartMessageBox({
            title: "Attention !",
            content: "Vous êtes sur le point de supprimer ce produit, confirmer ?",
            buttons: '[Non][Oui]'
        }, function (ButtonPressed) {
            console.log(paramId);
            if (ButtonPressed === "Oui") {
                $.ajax({
                    url: 'modules/utilisateurs/modals/modal_suppression_materiel.php',
                    type: 'POST',
                    data: {'id': paramId},
                    dataType: 'html',
                    success: function (contenu) {
                        smallBox('Suppression', "Le produit à correctement été supprimé.", 'success');
                        setTimeout(function () {
                            $('#listing_materiels').DataTable().ajax.reload(null, false);
                        }, 500);
                    },
                    error: function () {
                        smallBox('Erreur', 'Une erreur est survenu dans la fonction suppressionLigne(paramId).', 'warning');
                    }
                });
            }
            if (ButtonPressed === "Non") {
                smallBox('Suppression', "L'équipement n'a pas été supprimé.", 'warning');
            }
        });
    }

    function retour_listing() {
        window.location = './#ajax/utilisateurs.php';
    }


</script>