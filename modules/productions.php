<?php require_once("inc/init.php"); ?>

<button type="button" class="well" onclick="ouvertureAjout_suivi();"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Nouveau suivi
</button>

<!-- modal-->
<div class="modal fade" id="modal_ajoute_utilisateur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        </div>
    </div>
</div> <!-- fin modal-->



<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false"
             data-widget-fullscreenbutton="false">

            <header>
                <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                <h2>Liste des projets</h2>
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
                    <form id="tableau">
                        <table id="suivis_listing" class="table table-striped table-bordered table-hover"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Projet</th>
                                <th>Module</th>
                                <th>Catégorie</th>
                                <th>Utilisateur</th>
                                <th>Date</th>
                                <th>Durée</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </form>

                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->
        </div>
        <!-- end widget -->
    </article>
    <!-- WIDGET END -->
</div>
<!-- end row -->



<script type="text/javascript">
$(document).ready(function(){

    pageSetUp();

    var pagefunction = function () {

        localStorage.clear();

        var responsiveHelper_suivis_listing = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };


        $('#suivis_listing').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "oTableTools": {
                "aButtons": [
                    "xls",
                    {
                        "sExtends": "pdf",
                        "sTitle": "Liste_clients_PDF",
                        "sPdfMessage": "Iwit Systems PDF Export",
                        "sPdfSize": "letter"
                    },
                    {
                        "sExtends": "print",
                        "sMessage": "Generated by Iwit Systems <i>(press Esc to close)</i>"
                    }
                ],
                "sSwfPath": "assets/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
            },
            "autoWidth": true,
            "preDrawCallback": function () {
                if (!responsiveHelper_suivis_listing) {
                    responsiveHelper_suivis_listing = new ResponsiveDatatablesHelper($('#suivis_listing'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_suivis_listing.createExpandIcon(nRow);
            },
            "ajax": "modules/productions/ajax/iListe_suivis.php",
            "drawCallback": function (oSettings) {
                responsiveHelper_suivis_listing.respond();
            },
            "language": {
                "url": "./data/French.json"
            }
        });
    };

    loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function () {
        loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function () {
            loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function () {
                loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function () {
                    loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });
});

    function ouvertureAjout_suivi() {
        $.ajax({
            url: 'modules/productions/modals/modal_ajout_suivi.php',
            type: 'POST',
            data: '',
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_utilisateur .modal-content').html(contenu);
                $('#modal_ajoute_utilisateur').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    function ouvertureModification_suivi(paramId) {
        $.ajax({
            url: 'modules/productions/modals/modal_modification_suivi.php',
            type: 'POST',
            data: {"id" : paramId},
            dataType: 'html',
            success: function (contenu) {
                $('#modal_ajoute_utilisateur .modal-content').html(contenu);
                $('#modal_ajoute_utilisateur').modal('show');
            },
            error: function () {
                alert('erreur lors du retour JSON !');
            }
        });
    }

    function ouvertureModification_projet(paramId) {
        window.location = './#ajax/modification_projet.php?id=' + paramId ;
    }

    function suppressionLigne(paramId) {
        $.SmartMessageBox({
            title: "Attention !",
            content: "Vous êtes sur le point de supprimer ce suivi, confirmer ?",
            buttons: '[Non][Oui]'
        }, function (ButtonPressed) {
            console.log(paramId);
            if (ButtonPressed === "Oui") {
                $.ajax({
                    url: 'modules/productions/modals/modal_suppression_suivi.php',
                    type: 'POST',
                    data: {'id': paramId},
                    dataType: 'html',
                    success: function (contenu) {
                        smallBox('Suppression', "Le suivi à correctement été supprimé.", 'success');
                        setTimeout(function() {
                            $('#suivis_listing').DataTable().ajax.reload(null, false);
                        }, 500);
                    },
                    error: function () {
                        smallBox('Erreur', 'Une erreur est survenu dans la fonction suppressionLigne(paramId).', 'warning');
                    }
                });
            }
            if (ButtonPressed === "Non") {
                smallBox('Suppression', "Le suivi n'à pas été supprimé.", 'warning');
            }
        });
    }


</script>