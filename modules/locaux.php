<?php require_once("inc/init.php"); ?>

<button type="button" class="well" onclick="ouvertureAjout_societe('');"><i class="fa fa-plus-square"></i> Ajouter
   une société
</button>
<button type="button" class="well" onclick="ouvertureAjout_local('');"><i class="fa fa-plus-square"></i>
    Ajouter un local
</button>


<div class="row">

    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false"
             data-widget-fullscreenbutton="false">

            <header>
                <span class="widget-icon">
                    <i class="fa fa-users"></i>
                </span>

                <h2>Liste des locaux</h2>
            </header>

            <div>
                <div class="jarviswidget-editbox">
                </div>

                <div class="widget-body no-padding">
                    <form id="tableau">
                        <table id="listing_locaux" class="table table-striped table-bordered table-hover"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Société</th>
                                <th>Local</th>
                                <th>Téléphone</th>
                                <th>Fax</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </form>
                </div>

            </div>

        </div>

    </article>

</div>


<!-- Permer l'invocation de la forme modal ajoute clients-->
<div class="modal fade" id="modal_ajoute_clients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- end modal -->

<!-- Permer l'invocation de la forme modal ajoute societe-->
<div class="modal fade" id="modal_ajoute_societe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- end modal -->

<script type="text/javascript">

    $(document).ready(function () {

        var pagefunction = function () {

            localStorage.clear();

            var responsiveHelper_listing_locaux = undefined;

            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };

            $('#listing_locaux').dataTable({

                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oTableTools": {
                    "aButtons": [
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sTitle": "Liste_locaux_PDF",
                            "sPdfMessage": "Iwit Systems PDF exportation",
                            "sPdfSize": "letter"
                        },
                        {
                            "sExtends": "print",
                            "sMessage": "Généré by Iwit Systems <i>(appuyer sur Esc pour fermer)</i>"
                        }
                    ],
                    "sSwfPath": "assets/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
                },
                "bAutoWidth": true,
                "aoColumns": [
                    {sWidth: ""},
                    {sWidth: ""},
                    {sWidth: ""},
                    {sWidth: ""},
                    {sWidth: "100px"}
                ],
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_listing_locaux) {
                        responsiveHelper_listing_locaux = new ResponsiveDatatablesHelper($('#listing_locaux'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_listing_locaux.createExpandIcon(nRow);
                },
                "ajax": "modules/locaux/ajax/iListe_locaux.php",
                "drawCallback": function (oSettings) {
                    responsiveHelper_listing_locaux.respond();
                },
                "language": {
                 "url": "./data/French.json"
                 }
            });
        };

        // load related plugins

        loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function () {
            loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function () {
                loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function () {
                    loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function () {
                        loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                    });
                });
            });
        });
    }); // fin document.ready

    /* FONCTION OUVERTURE DES MODAUX POUR AJOUTS */

    function ouvertureAjout_local(paramId) {

        $.ajax({
            url: 'modules/locaux/modals/modal_ajout_local.php',
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

    function ouvertureAjout_societe(paramId) {
        $.ajax({
            url: 'modules/locaux/modals/modal_ajout_societe.php',
            type: 'POST',
            data: {'id': paramId},
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_societe .modal-content').html(contenu);
                $('#modal_ajoute_societe').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    /* FONCTION POUR OUVERTURE DES MODAUX POUR MODIFICATIONS */
    function ouvertureModification_local(paramId) {

        $.ajax({
            url: 'modules/locaux/modals/modal_modification_local.php',
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

    function ouvertureModification_societe(paramId) {
        window.location = 'index.php?p=modules/modification_societe&id=' + paramId;
    }
    
    /**
     * Fonction permettant la suppression d'une ligne d'une dataTable par clé primaire
     * @param paramId
     */
    function suppressionLigne(paramId) {
        $.SmartMessageBox({
            title: "Attention !",
            content: "Vous êtes sur le point de supprimer cette ligne (si il s'agit du dernier local l'entité société sera supprimé), confirmez ?",
            buttons: '[Non][Oui]'
        }, function (ButtonPressed) {
            console.log(paramId);
            if (ButtonPressed === "Oui") {
                $.ajax({
                    url: 'modules/locaux/modals/modal_suppression_local.php',
                    type: 'POST',
                    data: {'id': paramId},
                    dataType: 'html',
                    success: function (contenu) {
                        smallBox('Suppression', "Le local a correctement été supprimé.", 'success');
                        setTimeout(function () {
                            $('#listing_locaux').DataTable().ajax.reload(null, false);
                        }, 500);
                    },
                    error: function () {
                        smallBox('Erreur', 'Une erreur est survenu dans la fonction suppressionLigne(paramId).', 'warning');
                    }
                });
            }
            if (ButtonPressed === "Non") {
                smallBox('Suppression', "Le logiciel n'a pas été supprimé.", 'warning');
            }
        });
    }

</script>
