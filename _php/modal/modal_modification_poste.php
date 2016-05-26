<?php require_once("../../../lib/config.php");
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM postes WHERE postes_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Modifier poste</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iModification_poste.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="poste_id" value="<?php echo $rang['postes_id']; ?>"/>
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
                                $idSociete = $pdo->sqlValue("SELECT societes_id FROM societes_locaux, postes WHERE postes_id_locaux = societes_locaux_id AND postes_id = ?", array($id));
                                $selected = ($row['societes_id'] == $idSociete) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Societe local id -->
            <div class="row">
                <label class="label col col-2">Local</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="poste_id_locaux" id="select_local" required>
                            <option value="" selected="" disabled="">Choisir un local d'entreprise</option>
                            <?php
                            $select = $pdo->sql("select societes_locaux_id, societes_locaux_nom from societes_locaux group by societes_locaux_nom");
                            while ($row = $select->fetch()) {
                                $idLocal = $pdo->sqlValue("SELECT postes_id_locaux FROM postes WHERE postes_id = ?", array($id));
                                $selected = ($row['societes_locaux_id'] == $idLocal) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['societes_locaux_id'] . ">" . $row['societes_locaux_nom'] . "</option>";
                            }
                            ?>

                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <!-- Nom du poste -->
            <div class="row">
                <label class="label col col-2">Nom poste</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-desktop"></i>
                        <input type="text" name="poste_nom" placeholder="Nom du poste" required"
                        value="<?php echo $rang['postes_nom']; ?>">
                    </label>
                </section>


                <!-- Type materiel -->
                <label class="label col col-2">Type poste</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="poste_type" required>
                            <option value="" selected="" disabled="">Choisir type de poste</option>
                            <?php
                            $select = $pdo->sql("select type_materiels_id, type_materiels_nom from type_materiels group by type_materiels_nom");
                            while ($row = $select->fetch()) {
                                $poste_type_selected = $pdo->sqlValue("SELECT postes_type FROM postes WHERE postes_id = ?", array($id));
                                $selected = ($row['type_materiels_id'] == $poste_type_selected) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['type_materiels_id'] . ">" . $row['type_materiels_nom'] . "</option>";
                            }

                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Statut du poste -->
            <div class="row">
                <label class="label col col-2">Statut</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="poste_statut" placeholder="Statut du poste" required"
                        value="<?php echo $rang['postes_statut']; ?>">
                    </label>
                </section>

                <!-- Date d'achat -->
                <label class="label col col-2">Date d'achat</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="poste_dateAchat"
                               placeholder="Date d'achat" required" value="<?php echo $rang['postes_dateAchat']; ?>">
                    </label>
                </section>
            </div>

            <!-- Date mise en service -->
            <div class="row">
                <label class="label col col-2">Date mise en service</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="poste_dateMiseEnService"
                               placeholder="Date de mise en service" required"value="<?php echo $rang['postes_dateMiseEnService']; ?>">
                    </label>
                </section>
            </div>

        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <!-- Description local -->
            <div class="row">
                <label class="label col col-2">Description</label>
                <section class="col col-10">
                    <label class="textarea">
                        <textarea rows="5" name="poste_description" placeholder="Description"
                                  required><?php echo $rang['postes_description']; ?></textarea>
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

    pageSetUp();

    // PAGE RELATED SCRIPTS

    // pagefunction

    var pagefunction = function () {

        var $checkoutForm = $('#ajoutSocietes').validate({
            // Rules for form validation
            rules: {
                poste_nom: {
                    required: true
                },
                poste_type: {
                    required: true
                },
                poste_statut: {
                    required: true
                },
                poste_dateAchat: {
                    required: true
                },
                poste_dateMiseEnService: {
                    required: true
                },
                poste_description: {
                    required: false
                }
            },

            // Messages for form validation
            messages: {
                poste_nom: {
                    required: "Veuillez renseigner un nom."
                },
                poste_type: {
                    required: "Veuillez sélectionner un type."
                },
                poste_statut: {
                    required: "Veuillez renseigner statut."
                },
                poste_dateAchat: {
                    required: "Veuillez renseigner une date d'achat."
                },
                poste_dateMiseEnService: {
                    required: "Veuillez renseigner une date de mise en service."
                },
                poste_description: {
                    required: false
                }
            },

            submitHandler: function (ev) {
                $(ev).ajaxSubmit({
                    type: $('#ajoutSocietes').attr('method'),
                    url: $('#ajoutSocietes').attr('action'),
                    data: $('#ajoutSocietes').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.retour == "1") {
                            smallBox('Modification impossible', 'Un poste porte déjà ce nom.', 'warning');
                        }
                        else {
                            smallBox('Modification effectuée', 'Le poste a correctement été modifié.', 'success');
                        }
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

    $("#adresse_identique input").click(function (event) {
        console.log('On est dedans : ');

        if ($('.adresse_identique').is(':disabled')) {
            console.log('lel');
            $('.adresse_identique').prop('disabled', false);
        }
        else {
            console.log('fuck');
            $('.adresse_identique').prop('disabled', true)
        }

        if ($('.fe').hasClass("state-disabled")) {
            $('.fe').removeClass("state-disabled");
        }
        else {
            $('.fe').addClass("input state-disabled");
//            $('#state-disabled').addClass("input");
        }
    });

    $('#checkbox_adresse').change(function () {
        if ($('#checkbox_adresse').prop('checked')) {
            console.log('hey');
            $.ajax({
                type: $('#ajoutSocietes').attr('method'),
                url: './php/iAjout_local.php',
                data: $('#ajoutSocietes').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.checkboxverif == '1') {
                        $("#adresse_local").val(data.adresse);
                        $("#ville_local").val(data.ville);
                        $("#code_postal_local").val(data.code_postal);
                        $("#pays_local").val(data.pays);
                    }
                }
            });
        } else {
            console.log("bad");
        }
    });

    $('#select_entreprise').change(function () {
        $.ajax({
            type: $('#ajoutSocietes').attr('method'),
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

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>