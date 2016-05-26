<?php require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter logiciel</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iAjout_logiciel.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="logiciel_id"/>
    <div class="modal-body col-12">
        <fieldset>

            <!-- Nom local -->
            <div class="row">
                <label class="label col col-2">Nom du logiciel</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                        <input type="text" name="logiciel_nom" placeholder="Nom" required">
                    </label>
                </section>


                <!-- Societe id -->
                <label class="label col col-2">Licence du logiciel</label>
                <section class="col col-3">
                        <div class="icon-addon" style="width: 122%;">
                            <select class="form-control" name="logiciel_licence" required>
                                <option value="" selected="" disabled="">Licence</option>
                                <?php
                                $select = $pdo->sql("select type_licences_id, type_licences_nom from type_licences group by type_licences_nom");
                                while ($row = $select->fetch()) {
                                    echo "<option " . $selected . " value=" . $row['type_licences_id'] . ">" . $row['type_licences_nom'] . "</option>";
                                }
                                ?>
                            </select>
                            <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                                   data-original-title="email"></label>
                        </div>
                </section>
            </div>

            <!-- Telephone local -->
            <div class="row">
                <label class="label col col-2">Durée de garantie</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="logiciel_dureegarantie" placeholder="Durée (mois)" required">
                    </label>
                </section>

                <!-- Adresse local -->
                <label class="label col col-2">Prix du logiciel</label>
                <section class="col col-4">
                    <label class="input fe">
                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                            <input type="text" name="logiciel_prix" id="logiciel_prix" placeholder="" required"
                            class='adresse_identique'>
                        </label>
                </section>
            </div>

            <!-- Code postal local -->
            <div class="row">
                <label class="label col col-2">Durée licence</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="logiciel_licence" id="logiciel_licence" placeholder="Durée licence" required">
                    </label>
                </section>
            </div>

        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <!-- Description local -->
            <div class="row">
                <label class="label col col-2">Commentaire</label>
                <section class="col col-10">
                    <label class="textarea">
                        <textarea rows="5" name="logiciel_description" placeholder="Description" required></textarea>
                    </label>
                </section>
            </div>
        </fieldset>



        <footer>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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
                logiciel_nom: {
                    required: true
                },
                logiciel_licence: {
                    required: true
                },
                logiciel_dureegarantie: {
                    required: true
                },
                logiciel_prix: {
                    required: false,
                    number: true
                },
                logiciel_dateMiseEnService: {
                    required: true
                },
                logiciel_dateEcheance: {
                    required: true
                },
                logiciel_description: {
                    required: false
                }
            },

            // Messages for form validation
            messages: {
                logiciel_nom: {
                    required: "Veuillez renseigner un nom pour le logiciel."
                },
                logiciel_licence: {
                    required: "Veuillez indiquer un type licence."
                },
                logiciel_dureegarantie: {
                    required: "Veuillez renseigner une durée de garantie (en mois)."
                },
                logiciel_prix: {
                    required: "Veuillez indiquer le prix du logiciel.",
                    number: "Veuillez renseigner un prix correct."
                },
                logiciel_dateMiseEnService: {
                    required: "Veuillez renseigner une date."
                },
                logiciel_dateEcheance: {
                    required: "Veuillez renseigner une date."
                },
                logiciel_description: {
                    required: "Veuillez fournir une description."
                }
            },

            submitHandler: function (ev) {
                $(ev).ajaxSubmit({
                    type: $('#ajoutSocietes').attr('method'),
                    url: $('#ajoutSocietes').attr('action'),
                    data: $('#ajoutSocietes').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.alert == '1') {
                            smallBox('Ajout impossible', 'Un logiciel portant ce nom existe déjà.', 'warning');
                        }
                        else {
                            smallBox('Ajout effectué', 'Le logiciel a correctement été ajouté.', 'success');
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

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>