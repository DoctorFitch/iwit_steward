<?php require_once('./lib/config.php');

$id = $_GET['id'];

$rang2 = $pdo->sqlRow("SELECT * FROM societes WHERE societes_id = ?", array($id));
$rang = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ?", array($id));

?>


<h4 class="modal-title" id="myModalLabel">Modification de la société <?php echo $rang2['societes_nom'] ?></h4><br/>

<section>

    <article class="col-lg-6">

        <div class="jarviswidget jarviswidget-color-blueDark">

            <header role="heading">
                <div class="jarviswidget-ctrls" role="menu"></div>
                <span class="widget-icon"> <i class="fa fa-building"></i> </span>
                <h2>Fiche société</h2>
            </header>

            <!-- widget div-->
            <div role="content">

                <!-- widget content -->
                <div class="widget-body no-padding">

                    <div class="smart-form">

                        <!-- Début du formulaire -->
                        <form action="modules/locaux/ajax/iModification_societe.php" id="modificationSociete"
                              class="smart-form"
                              novalidate="novalidate"
                              method="post" name="ajoutSociete">

                            <fieldset>

                                <!-- ID utilisateur -->
                                <input type="hidden" name="societes_id" id="societes_id"
                                       value="<?php echo $id; ?>"/>

                                <fieldset>

                                    <!-- Nom societe -->
                                    <div class="row">
                                        <label class="label col col-2">Societe</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-suitcase"></i>
                                                <input type="text" name="nom_societe" placeholder="Nom de la société"
                                                       required"
                                                value="<?php echo $rang2['societes_nom']; ?>">
                                            </label>
                                        </section>

                                        <!-- Statut juridique -->
                                        <label class="label col col-2">Statut juridique</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-balance-scale"></i>
                                                <input type="text" name="statut_juridique"
                                                       placeholder="Statut juridique" required"
                                                value="<?php echo $rang2['societes_statutJuridique']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <!-- Type contrat -->
                                    <div class="row">
                                        <label class="label col col-2">Type de contrat</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-money"></i>
                                                <input type="text" name="type_contrat" placeholder="Type de contrat"
                                                       required"
                                                value="<?php echo $rang2['societes_typeC']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <!-- Adresse societe -->
                                    <div class="row">
                                        <label class="label col col-2">Adresse</label>
                                        <section class="col col-4">
                                            <label class="input fe">
                                                <input type="text" name="adresse_societe" id="adresse_societe"
                                                       placeholder="Adresse" required"
                                                class='adresse_identique'
                                                value="<?php echo $rang2['societes_adresse']; ?>">
                                            </label>
                                        </section>


                                        <!-- Ville societe -->
                                        <label class="label col col-2">Ville</label>
                                        <section class="col col-4">
                                            <label class="input fe">
                                                <input type="text" name="ville_societe" id="ville_societe"
                                                       placeholder="Ville" required"
                                                value="<?php echo $rang2['societes_ville']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <!-- Code postal societe -->
                                    <div class="row">
                                        <label class="label col col-2">Code postal</label>
                                        <section class="col col-4">
                                            <label class="input fe">
                                                <input type="text" name="code_postal_societe" id="code_postal_societe"
                                                       placeholder="Code postal"
                                                       required"
                                                value="<?php echo $rang2['societes_CP']; ?>">
                                            </label>
                                        </section>

                                        <!-- Pays societe -->
                                        <label class="label col col-2">Pays</label>
                                        <section class="col col-4">
                                            <label class="input fe">
                                                <input type="text" name="pays_societe" id="pays_societe"
                                                       placeholder="Pays" required"
                                                value="<?php echo $rang2['societes_pays']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <!-- Telephone local -->
                                        <label class="label col col-2">Téléphone</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                <input type="text" name="telephone_societe" placeholder="Télépone"
                                                       required"
                                                value="<?php echo $rang2['societes_telephone']; ?>">
                                            </label>
                                        </section>

                                        <!-- Telephone local -->
                                        <label class="label col col-2">Fax</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                <input type="text" name="fax_societe" placeholder="Fax" required"
                                                value="<?php echo $rang2['societes_fax']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <label class="label col col-2">Email</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                                <input type="text" name="email_societe" placeholder="Email" required"
                                                value="<?php echo $rang2['societes_email']; ?>">
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <label class="label col col-2">RCS</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-sort-numeric-asc"></i>
                                                <input type="text" name="rcs" placeholder="RCS" required"
                                                value="<?php echo $rang2['societes_rcs']; ?>">
                                            </label>
                                        </section>

                                        <label class="label col col-2">TVA</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-percent"></i>
                                                <input type="text" name="tva" placeholder="TVA" required"
                                                value="<?php echo $rang2['societes_tva']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <br/><h4><i class="fa fa-black-tie"></i> Patron</h4><br/>
                                </fieldset>

                                <!--CONTACT-->
                                <fieldset>

                                    <!--Nom-->
                                    <div class="row">
                                        <label class="label col col-2">Nom</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                <input type="text" name="nom_contact" placeholder="Nom" required"
                                                value="<?php echo $rang2['societes_contact_nom']; ?>">
                                            </label>
                                        </section>
                                        <!--Prénom-->
                                        <label class="label col col-2">Prénom</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                <input type="text" name="prenom_contact" placeholder="Prénom" required"
                                                value="<?php echo $rang2['societes_contact_prenom']; ?>">
                                            </label>
                                        </section>
                                    </div>
                                    <!--Date de naissance-->
                                    <div class="row">
                                        <label class="label col col-2">Date de naissance</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                                <input type="text" data-mask="**/**/****" data-mask-placeholder="-"
                                                       name="date_naissance" placeholder="Date de naissance" required"
                                                value="<?php echo $func->dateFR($rang2['societes_contact_dateNaissance']); ?>
                                                ">
                                            </label>
                                        </section>
                                        <!--Lieu de naissance-->
                                        <label class="label col col-2">Lieu de naissance</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-map-marker"></i>
                                                <input type="text" name="lieu_naissance" placeholder="Lieu de naissance"
                                                       required"
                                                value="<?php echo $rang2['societes_contact_lieuNaissance']; ?>">
                                            </label>
                                        </section>
                                    </div>
                                    <!--Email-->
                                    <div class="row">
                                        <label class="label col col-2">Email</label>
                                        <section class="col col-4">
                                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                                <input type="text" name="email_contact" placeholder="Email" required"
                                                value="<?php echo $rang2['societes_contact_email']; ?>">
                                            </label>
                                        </section>
                                    </div>

                                </fieldset>

                                <fieldset>
                                    <!-- Description local -->
                                    <div class="row">
                                        <label class="label col col-2">Commentaire</label>
                                        <section class="col col-10">
                                            <label class="textarea">
                                                <textarea rows="5" name="commentaire_societe" placeholder="Description" ><?php echo $rang2['societes_commentaire']; ?></textarea>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary">Modifier !</button>
                                </footer>
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

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-editbutton="false">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->
            <header>
                <span class="widget-icon"> <i class="fa fa-cloud"></i> </span>
                <h2>Uploadez vos documents ici ! </h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">

                    <form action="" class="dropzone" id="upload_societe"></form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->
    </article>

    <article class="col-lg-6">

        <div class="jarviswidget jarviswidget-color-redLight">

            <header>
                <span class="widget-icon"> <i class="fa fa-file-word-o"></i> </span>
                <h2>Liste des documents</h2>

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

                    <table id="listing_documents" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date upload</th>
                            <th>Commentaire</th>
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

<!-- Permer l'invocation de la forme modal-->
<div class="modal fade" id="modal_ajoute_commentaire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

            /* DATATABLE */


            var responsiveHelper_listing_documents = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };


            var dt = $('#listing_documents').dataTable({
                    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                    "autoWidth": true,
                    "preDrawCallback": function () {
                        // Initialize the responsive datatables helper once.
                        if (!responsiveHelper_listing_documents) {
                            responsiveHelper_listing_documents = new ResponsiveDatatablesHelper($('#listing_documents'), breakpointDefinition);
                        }
                    },
                    "aoColumns": [
                        {sWidth: ""},
                        {sWidth: "20%"},
                        {sWidth: "10px"}
                    ],
                    "rowCallback": function (nRow) {
                        responsiveHelper_listing_documents.createExpandIcon(nRow);
                    },
                    "drawCallback": function (oSettings) {
                        responsiveHelper_listing_documents.respond();
                    },
                    "ajax": {
                        "url": "modules/locaux/ajax/iListe_documents.php",
                        "type": 'POST',
                        "data": {
                            "societes_id": $('#societes_id').val()
                        }
                    },
                    "createdRow": function (row, data, index) {
                        if (data[-3] == "1") {
                            $('a', row).eq(0).prepend('<i class="fa fa-commenting"></i> &nbsp;');
                        }
                    },
                    "language": {
                        "url": "./data/French.json"
                    }
                }
            );

            setTimeout(function () {
                $('[data-toggle="popover-hover"]').popover({trigger: "hover"});
            }, 500);


            /* FIN DATATABLE */

            var $checkoutForm = $('#modificationSociete').validate({
                // Rules for form validation
                rules: {
                    nom_societe: {
                        required: true
                    },
                    statut_juridique: {
                        required: true
                    },
                    type_contrat: {
                        required: true
                    },
                    adresse_societe: {
                        required: true
                    },
                    ville_societe: {
                        required: true
                    },
                    code_postal_societe: {
                        required: true,
                        number: true
                    },
                    pays_societe: {
                        required: true
                    },
                    telephone_societe: {
                        required: false,
                        number: true
                    },
                    fax_societe: {
                        number: true
                    },
                    email_societe: {
                        required: true,
                        email: true
                    },
                    rcs: {
                        required: true
                    },
                    tva: {
                        required: true,
                        number: true
                    }
                },

                // Messages for form validation
                messages: {
                    nom_societe: {
                        required: "Veuillez saisir un nom pour cette société."
                    },
                    statut_juridique: {
                        required: "Veuillez indiquer un statut juridique."
                    },
                    type_contrat: {
                        required: "Veuillez indiquer un type de contrat."
                    },
                    adresse_societe: {
                        required: "Veuillez fournir une adresse pour cette société."
                    },
                    ville_societe: {
                        required: "Veuillez fournir une ville pour cette société."
                    },
                    code_postal_societe: {
                        number: "Veuillez saisir un code postal correct"
                    },
                    pays_societe: {
                        required: "Veuillez indiquer un pays pour cette société"
                    },
                    telephone_societe: {
                        required: "Veuillez renseigner un numéro de téléphone pour cette société.",
                        number: "Veuillez renseigner un numéro de téléphone correct."
                    },
                    fax_societe: {
                        number: "Veuillez renseigner un numéro de fax correct."
                    },
                    email_societe: {
                        required: "Veuillez renseigner un email pour cette société.",
                        email: "Veuillez renseigner un email correct pour cette société."
                    },
                    rcs: {
                        required: "Veuillez indiquer un rcs pour cette société."
                    },
                    tva: {
                        required: "Veuillez indiquer le taux de TVA pour cette société.",
                        number: "Veuillez renseigner un taux de TVA correct."
                    }
                },

                submitHandler: function (ev) {
                    $(ev).ajaxSubmit({
                        type: $('#modificationSociete').attr('method'),
                        url: $('#modificationSociete').attr('action'),
                        data: $('#modificationSociete').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.retour == '1') {
                                smallBox('Modification impossible', 'Une société existe déjà.', 'warning');
                            }
                            else {
                                smallBox('Modification effectuée', 'La société a correctement été mofifiée.', 'success');
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

            Dropzone.autoDiscover = false;


            $("#upload_societe").dropzone({
                url: "modules/upload.php",
                init: function () {
                    this.on("sending", function (file, xhr, formData) {
                        formData.append("id_societes", $('#societes_id').val());

                    });
                    this.on("complete", function (ab) {
                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                            smallBox('Modification effectuée', 'La société a correctement été mofifiée.', 'success');
                            setTimeout(function () {
                                $('#listing_documents').DataTable().ajax.reload(null, false);
                            }, 500);
                        }

                    })
                },
                addRemoveLinks: true,
                maxFilesize: 5,
                dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Glissez les documents</span><span>&nbsp&nbsp<h4 class="display-inline"> (Ou cliquez)</h4></span>',
                dictResponseError: 'Erreur de l\'upload de votre document !'
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

        loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function () {
            loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function () {
                loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function () {
                    loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function () {
                        loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", function () {
                            loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", function () {
                                loadScript("assets/js/plugin/dropzone/dropzone.min.js", pagefunction);
                            });
                        });
                    });
                });
            });
        });

    });

    function retour_listing() {
        window.location = 'index.php?p=modules/locaux';
    }

    function ouvertureAjout_commentaire(paramId) {
        $.ajax({
            url: 'modules/locaux/modals/modal_ajout_commentaire.php',
            type: 'POST',
            data: {'id': paramId},
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_commentaire .modal-content').html(contenu);
                $('#modal_ajoute_commentaire').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    function suppressionDocument(paramId) {
        $.ajax({
            url: 'modules/locaux/modals/modal_suppression_document.php',
            type: 'POST',
            data: {'document_id': paramId},
            dataType: 'html',
            success: function (contenu) {
                smallBox('Document', 'Le document correctement été supprimé.', 'warning');
                $('#listing_documents').DataTable().ajax.reload(null, false);
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

</script>