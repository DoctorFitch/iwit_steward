<?php require_once("./inc/init.php");
$func = new Functions();
$id = $_GET['id'];
$rang = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ?", array($id));
$rang2 = $pdo->sqlRow("SELECT * FROM projets WHERE projets_id = ?", array($id));

?>

<h4 class="modal-title" id="myModalLabel">Modification du projet <?php echo $rang2['projets_nom'] ?></h4><br/>

<section>
    <article class="col-lg-6">

        <div class="jarviswidget jarviswidget-color-blueDark">

            <header role="heading">
                <div class="jarviswidget-ctrls" role="menu"></div>
                <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                <h2>Fiche projet</h2>
            </header>

            <!-- widget div-->
            <div role="content">

                <!-- widget content -->
                <div class="widget-body no-padding">

                    <div class="smart-form">

                        <!-- Début du formulaire -->
                        <form action="modules/projets/ajax/iModification_projet.php" id="modification_Projet" class="smart-form"
                              novalidate="novalidate"
                              method="post" name="ajoutSociete">

                            <!-- ID utilisateur -->
                            <input type="hidden" name="projet_id" id="projet_id"
                                   value="<?php echo $id; ?>"/>

                            <div class="modal-body col-12">

                                <fieldset>

                                    <!-- Societe -->
                                    <div class="row">
                                        <label class="label col col-2">Société</label>
                                        <section class="col col-3">
                                            <div class="icon-addon" style="width: 122%;">
                                                <select class="form-control" name="projet_societe"
                                                        id="select_entreprise" required>
                                                    <option value="" disabled selected>Choisir une société</option>
                                                    <?php
                                                    $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_nom");
                                                    while ($row = $select->fetch()) {
                                                        $societes = $pdo->sqlValue("SELECT societes_id FROM projets WHERE projets_id = ?", array($id));
                                                        $selected = ($row['societes_id'] == $societes) ? 'selected' : '';
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

                                    <!-- Type projet -->
                                    <div class="row">
                                        <label class="label col col-2">Type de projet</label>
                                        <section class="col col-3">
                                            <div class="icon-addon" style="width: 122%;">
                                                <select class="form-control" name="projet_type" id="select_local"
                                                        required>
                                                    <option value="" selected="" disabled="">Choisir un type de projet
                                                    </option>
                                                    <?php

                                                    $select = $pdo->sql("select projets_types_id, projets_types_nom from projets_types GROUP BY projets_types_nom");
                                                    while ($row = $select->fetch()) {
                                                        $type = $pdo->sqlValue("SELECT projets_types FROM projets WHERE projets_id = ?", array($id));
                                                        $selected = ($row['projets_types_id'] == $type) ? 'selected' : '';
                                                        echo "<option " . $selected . " value=" . $row['projets_types_id'] . ">" . $row['projets_types_nom'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="email" class="glyphicon glyphicon-search" rel="tooltip"
                                                       title=""
                                                       data-original-title="email"></label>
                                            </div>
                                        </section>
                                    </div>

                                    <!-- Nom projet -->
                                    <div class="row">
                                        <label class="label col col-2">Nom projet</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-cogs"></i>
                                                <input type="text" name="projet_nom" placeholder="Nom du projet"
                                                       required" value="<?php echo $rang2['projets_nom']; ?>">
                                            </label>
                                        </section>


                                        <!-- Description projet -->

                                        <label class="label col col-2">Description</label>
                                        <section class="col col-4">
                                            <label class="input fe"><i class="icon-prepend fa fa-cogs"></i>
                                                <input type="text" name="projet_description"
                                                       placeholder="Description du projet" required"
                                                value="<?php echo $rang2['projets_description']; ?>">
                                            </label>
                                        </section>
                                    </div>


                                    <div class="row">
                                        <label class="label col col-2">URL du projet</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                <input type="text" name="projet_url" placeholder="Liens vers le projet"
                                                       required" value="<?php echo $rang2['projets_url']; ?>">
                                            </label>
                                        </section>

                                        <label class="label col col-2">Date de début</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                                <input type="text" class="form-control datepicker"
                                                       name="projet_dateDebut"
                                                       id="utilisateur_embauche"
                                                       placeholder="Date de début du projet"
                                                       value="<?php echo $rang2['projets_dateDebut']; ?>">
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
                                <textarea rows="5" name="projet_commentaire" id="projet_commentaire"
                                          placeholder="Commentaire"
                                          required><?php echo $rang2['projets_commentaire']; ?></textarea>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary">Modifier !</button>
                                </footer>

                            </div>
                        </form>
                        <!-- Fin formulaire -->
                    </div>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->
        </div>
        <button type="button" class="well" onclick="retour_listing();"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Retour
            vers listing utilisateur
        </button>
    </article>

    <article class="col-lg-6">

        <div class="jarviswidget jarviswidget-color-redLight">

            <header>
                <span class="widget-icon"> <i class="fa fa-modx"></i> </span>
                <h2>Liste des modules</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

                    <table id="listing_modules" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Utilisateur(s)</th>
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
        <button type="button" class="well" onclick="ajouter_module(<?php echo $id; ?>);"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter
            un module
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

        // PAGE RELATED SCRIPTS


        // pagefunction

        var pagefunction = function () {

            users();

            /* DATATABLE */

            tinymce.init({
                selector: '#projet_commentaire',
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

            var responsiveHelper_listing_modules = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };

            $('#listing_modules').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth": true,
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_listing_modules) {
                        responsiveHelper_listing_modules = new ResponsiveDatatablesHelper($('#listing_modules'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_listing_modules.createExpandIcon(nRow);
                },
                "drawCallback": function (oSettings) {
                    responsiveHelper_listing_modules.respond();
                },
                "ajax": {
                    "url": "modules/projets/ajax/iListe_projets_modules.php",
                    "type": 'POST',
                    "data": {
                        "projet_id": $('#projet_id').val()
                    }
                },
                "language": {
                    "url": "./data/French.json"
                }
            });
            /* FIN DATATABLE */

            var $checkoutForm = $('#modification_Projet').validate({
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
                        type: $('#modification_Projet').attr('method'),
                        url: $('#modification_Projet').attr('action'),
                        data: $('#modification_Projet').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.retour == '1') {
                                smallBox('Modification impossible', 'Un projet portant ce nom existe déjà.', 'warning');
                            }
                            else {
                                smallBox('Modification effectuée', 'Projet correctement modifié.', 'success');
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
            url: './php/modal/modal_modification_local.php',
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

    function ouvertureModification_module(paramId) {
        $.ajax({
            url: 'modules/projets/modals/modal_modification_module.php',
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

    function ajouter_module(paramId) {
        $.ajax({
            url: 'modules/projets/modals/modal_ajout_module.php',
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
                    url: 'modules/projets/modals/modal_suppression_module.php',
                    type: 'POST',
                    data: {'id': paramId},
                    dataType: 'html',
                    success: function (contenu) {
                        smallBox('Suppression', "Le module à correctement été supprimé.", 'success');
                        setTimeout(function () {
                            $('#listing_modules').DataTable().ajax.reload(null, false);
                        }, 500);
                    },
                    error: function () {
                        smallBox('Erreur', 'Une erreur est survenu dans la fonction suppressionLigne(paramId).', 'warning');
                    }
                });
            }
            if (ButtonPressed === "Non") {
                smallBox('Suppression', "Le module n'a pas été supprimé.", 'warning');
            }
        });
    }

    function retour_listing() {
        window.location = './#ajax/utilisateurs.php';
    }

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

</script>