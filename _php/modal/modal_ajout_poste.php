<?php require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter poste</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iAjout_poste.php" id="ajoutPoste" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="logiciel_id"/>
    <div class="modal-body col-12">
        <fieldset>

            <!-- Nom du poste -->
            <div class="row">
                <label class="label col col-2">Nom du poste</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-desktop"></i>
                        <input type="text" name="poste_nom" placeholder="Nom du poste" id="poste_nom" required">
                    </label>
                </section>


                <!-- Type materiel -->
                <label class="label col col-2">Local</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="societes_locaux" id="societes_locaux" required>
                            <option value="" selected="" disabled="">Choisir une entreprise</option>
                            <?php
                            $select = $pdo->sql("select societes_locaux_id, societes_locaux_nom from societes_locaux group by societes_locaux_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['societes_locaux_id'] . ">" . $row['societes_locaux_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <div class="row">
                <!-- Date d'achat -->
                <label class="label col col-2">Date d'achat</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="poste_dateAchat" id="poste_dateAchat"
                               placeholder="Date d'achat" required">
                    </label>
                </section>

                <!-- Date mise en service -->
                <label class="label col col-2">Date en service</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="poste_dateMiseEnService" id="poste_dateMiseEnService"
                               placeholder="Date de mise en service" required">
                    </label>
                </section>
            </div>

            <!-- Statut du poste -->
            <div class="row">
                <label class="label col col-2">Statut du poste</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-lightbulb-o"></i>
                        <input type="text" name="poste_statut" id="poste_statut" placeholder="Statut du poste" required">
                    </label>
                </section>

                <!-- Utilisateurs -->
                <label class="label col col-2">Utilisateur(s)</label>
                <section class="col col-4">
                    <div class="form-group">
                        <select multiple style="width:100%" class="select2" id="id_utilisateurs" required>
                            <option value="" disabled>Veuillez sélectionner un utilisateur</option>
                        </select>
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
                        <textarea rows="5" name="poste_description" id="poste_description" placeholder="Description" required></textarea>
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

        var $checkoutForm = $('#ajoutPoste').validate({
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
                    required: true,
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
                    type: $('#ajoutPoste').attr('method'),
                    url: $('#ajoutPoste').attr('action'),
                    data: {
                        'poste_nom': $('#poste_nom').val(),
                        'societes_locaux': $('#societes_locaux').val(),
                        'poste_statut': $('#poste_statut').val(),
                        'poste_description': $('#poste_description').val(),
                        'poste_dateAchat': $('#poste_dateAchat').val(),
                        'poste_dateMiseEnService': $('#poste_dateMiseEnService').val(),
                        'utilisateur_id': $('#id_utilisateurs').val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.alert == '1') {
                            smallBox('Ajout impossible', 'Un poste porte déjà ce nom.', 'warning');
                        }
                        else {
                            smallBox('Ajout effectué', 'Le poste a correctement été ajouté.', 'success');
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

    $('#societes_locaux').change(function () {
        $.ajax({
            type: $('#ajoutPoste').attr('method'),
            url: './php/iSelect_utilisateur.php',
            data: {'poste_id_locaux': $('#societes_locaux').val()},
            dataType: 'json',
            success: function (data) {

                $('#id_utilisateurs').html(data.html);

                console.log('gg');
                console.log(data);
            }
        });
    });

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
                type: $('#ajoutPoste').attr('method'),
                url: './php/iAjout_local.php',
                data: $('#ajoutPoste').serialize(),
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