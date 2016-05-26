<?php require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter société</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iAjout_client.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="logiciel_id"/>
    <div class="modal-body col-12">
        <fieldset>
            <!-- Nom -->
            <div class="row">
                <label class="label col col-2">Nom de la société</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                        <input type="text" name="nom_societe" placeholder="Nom" required>
                    </label>
                </section>

                <!-- Contrat -->
                <label class="label col col-2">Type de contrat</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="type_contrat" required>
                            <option value="" selected="" disabled="">Type contrat</option>
                            <?php
                            $select = $pdo->sql("select type_contrats_nom, type_contrats_id from type_contrats group by type_contrats_id");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['type_contrats_id'] . ">" . $row['type_contrats_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-book" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>
            <!-- Site web -->
            <div class="row">
                <label class="label col col-2">Site web</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-desktop"></i>
                        <input type="text" name="site_web" placeholder="Site web" required">
                    </label>
                </section>

                <!-- Messagerie -->
                <label class="label col col-2">Messagerie</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="messagerie" required>
                            <option value="" selected="" disabled="">Messagerie</option>
                            <?php
                            $select = $pdo->sql("select messageries_id, messageries_nom from messageries group by messageries_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['messageries_id'] . ">" . $row['messageries_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-envelope" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>
            <!-- Adresse -->
            <div class="row">
                <label class="label col col-2">Adresse</label>
                <section class="col col-4">
                    <label class="input">
                        <input type="text" name="adresse" placeholder="Adresse" required">
                    </label>
                </section>

                <!-- Ville -->
                <label class="label col col-2">Ville</label>
                <section class="col col-4">
                    <label class="input">
                        <input type="text" name="ville" placeholder="Ville" required">
                    </label>
                </section>
            </div
                <!-- Code postal -->
            <div class="row">
                <label class="label col col-2">Code postal</label>
                <section class="col col-4">
                    <label class="input">
                        <input type="text" name="code_postal" placeholder="Code postal" required">
                    </label>
                </section>

                <!-- Pays -->
                <label class="label col col-2">Pays</label>
                <section class="col col-4">
                    <label class="input">
                        <input type="text" name="pays" placeholder="Pays" required">
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
                },
                adresse: {
                    required: true
                },
                ville: {
                    required: true
                },
                code_postal: {
                    required: true,
                    digits: true
                },
                pays: {
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
                },
                adresse: {
                    required: "Veuillez renseigner une adresse."
                },
                ville: {
                    required: "Veuille renseigner une ville."
                },
                code_postal: {
                    required: "Veuillez renseigner un code postal.",
                    digits: "Veuillez indiquer une code postal correct."
                },
                pays: {
                    required: "Veuillez renseigner un pays."
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
                            smallBox('Ajout impossible', 'Une société portant ce nom existe déjà.', 'warning');
                        }
                        else {
                            smallBox('Ajout effectué', 'La société a correctement été ajoutée.', 'success');
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

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>