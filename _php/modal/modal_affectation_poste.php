<?php require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Affecter utilisateurs</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iAffectation_poste_utilisateur.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate"
      method="post" name="ajoutSociete">
    <input type="hidden" name="logiciel_id"/>
    <div class="modal-body col-12">
        <fieldset>

            <!-- Societe -->
            <div class="row">
                <label class="label col col-4">Nom de l'entreprise</label>
                <section class="col col-8">
                    <label class="select">
                        <select name="nom_entreprise" id="select_entreprise" required>
                            <option value="" disabled selected>Choisir une entreprise</option>
                            <?php
                            $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select> <i></i> </label>
                </section>
            </div>

            <!-- Societe local -->
            <div class="row">
                <label class="label col col-4">Sélectionner un local</label>
                <section class="col col-8">
                    <label class="select">
                        <select name="poste_id" id="select_local" required>
                            <option value="" selected="" disabled="">Choisir un local</option>
                        </select> <i></i> </label>
                </section>
            </div>

            <!-- Postes -->
            <div class="row">
                <label class="label col col-4">Sélectionner un poste</label>
                <section class="col col-8">
                    <label class="select">
                        <select name="utilisateur_id" id="select_poste" required>
                            <option value="" selected="" disabled="">Choisir un poste</option>
                        </select> <i></i> </label>
                </section>
            </div>

            <!-- Utilisateurs -->
            <div class="form-group">
                <label>Utilisateurs</label>
                <select multiple style="width:100%" class="select2" id="id_utilisateurs" required>
                    <option value="" disabled>Veuillez renseigner tous les champs</option>
                </select>
            </div>

            <footer>
                <button type="submit" class="btn btn-primary">Affecter !</button>
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
                }
            },

            // Messages for form validation
            messages: {
                nom_societe: {
                    required: "Veuillez saisir un nom pour l'entreprise."
                },
                type_contrat: {
                    required: 'Veuillez selectionner un contrat.'
                },
                site_web: {
                    required: 'Veuillez saisir le site web.'
                },
                messagerie: {
                    required: 'Veuillez indiquer un service de messagerie'
                }
            },

            submitHandler: function (ev) {
                $(ev).ajaxSubmit({
                    type: $('#ajoutSocietes').attr('method'),
                    url: $('#ajoutSocietes').attr('action'),
                    data: {
                        'poste_id': $('#select_poste').val(),
                        'utilisateur_id': $('#id_utilisateurs').val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.retour == '1') {
                            smallBox('Ajout impossible', 'Le ou les utilisateurs ont déjà été affecté a ce poste.', 'warning');
                        }
                        else {
                            smallBox('Ajout effectué', 'Les utilisateurs ont correctement été affecté à ce poste.', 'success');
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

    $('#select_local').change(function () {
        $.ajax({
            type: $('#ajoutSocietes').attr('method'),
            url: './php/iSelect_utilisateur.php',
            data: {'poste_id_locaux': $('#select_local').val()},
            dataType: 'json',
            success: function (data) {

                $('#id_utilisateurs').html(data.html);

                console.log('gg');
                console.log(data);
            }
        });
    });

    $('#select_local').change(function () {
        $.ajax({
            type: $('#ajoutSocietes').attr('method'),
            url: './php/iSelect_poste.php',
            data: {'poste_id_locaux': $('#select_local').val()},
            dataType: 'json',
            success: function (data) {

                $('#select_poste').html(data.html);

                console.log('gg');
                console.log(data);
            }
        });
    });

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>