<?php require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter local</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iAjout_local.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="logiciel_id"/>
    <div class="modal-body col-12">

        <fieldset>

            <!-- Societe id -->
            <div class="row">
                <label class="label col col-2">Entreprise</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="id_entreprise" required>
                            <option value="" selected="" disabled="">Choisir une entreprise</option>
                            <?php
                            $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_id");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Nom local -->
            <div class="row">
                <label class="label col col-2">Local</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                        <input type="text" name="nom_local" placeholder="Nom du local" required">
                    </label>
                </section>
            </div>
        </fieldset>
        <fieldset>

            <!-- Adresse local -->
            <div class="row">
                <label class="label col col-2">Adresse</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="adresse_local" id="adresse_local" placeholder="Adresse" required"
                        class='adresse_identique'>
                    </label>
                </section>


                <!-- Ville local -->
                <label class="label col col-2">Ville</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="ville_local" id="ville_local" placeholder="Ville" required"
                        class='adresse_identique'>
                    </label>
                </section>
            </div>

            <!-- Code postal local -->
            <div class="row">
                <label class="label col col-2">Code postal</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="code_postal_local" id="code_postal_local" placeholder="Code postal"
                               required"
                        class='adresse_identique'>
                    </label>
                </section>

                <!-- Pays local -->
                <label class="label col col-2">Pays</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="pays_local" id="pays_local" placeholder="Pays" required"
                        class='adresse_identique'>
                    </label>
                </section>
            </div>

            <!-- Email local -->
            <div class="row">
                <!-- Telephone local -->
                <label class="label col col-2">Téléphone</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="telephone_local" placeholder="Télépone" required">
                    </label>
                </section>

                <!-- Telephone local -->
                <label class="label col col-2">Fax</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="fax_local" placeholder="Fax" required">
                    </label>
                </section>
            </div>

            <div class="row">
                <label class="label col col-2">Email</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                        <input type="text" name="email_local" placeholder="Email" required">
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
                        <textarea rows="5" name="commentaire_local" placeholder="Description" required></textarea>
                    </label>
                </section>
            </div>
        </fieldset>

        <footer>
            <button type="submit" name="submit" class="btn btn-primary">Ajouter !</button>
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
                nom_entreprise: {
                    required: true
                },
                nom_local: {
                    required: true
                },
                email_local: {
                    required: true,
                    email: true
                },
                telephone_local: {
                    required: true,
                    number: true
                },
                adresse_local: {
                    required: true
                },
                ville_local: {
                    required: true
                },
                code_postal_local: {
                    required: true,
                    number: true
                },
                pays_local: {
                    required: true
                },
                statut_local: {
                    required: true
                },
                description_local: {
                    required: true
                }
            },

            // Messages for form validation
            messages: {
                nom_entreprise: {
                    required: "Veuillez sélectionner une entreprise."
                },
                nom_local: {
                    required: "Veuillez renseigner un nom pour le local."
                },
                email_local: {
                    required: "Veuillez renseigner une adresse email.",
                    email: "Veuillez entrer un email valide."
                },
                telephone_local: {
                    required: "Veuillez renseigner un numéro de télephone.",
                    number: "Veuillez entrer un numéro valide."
                },
                adresse_local: {
                    required: "Veuillez renseigner l'adresse du local."
                },
                ville_local: {
                    required: "Veuillez renseigner la ville du local."
                },
                code_postal_local: {
                    required: "Veuillez renseigner le code postal du local.",
                    number: "Veuillez entrer un code postal valide."
                },
                pays_local: {
                    required: "Veuillez renseigner le pays du local."
                },
                statut_local: {
                    required: "Veuillez renseigner un statut pour le local."
                },
                description_local: {
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
                            smallBox('Ajout impossible', 'Un local portant ce nom existe déjà.', 'warning');
                        }
                        else {
                            smallBox('Ajout effectué', 'Le local a correctement été ajouté.', 'success');
                            setTimeout(function() {
                                $('#datatable_locaux').DataTable().ajax.reload(null, false);
                            }, 500);
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