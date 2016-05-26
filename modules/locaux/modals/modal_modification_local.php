<?php require_once("../../../lib/config.php");

$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM societes_locaux WHERE societes_locaux_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Modification du local <?php echo $rang['societes_locaux_nom'] ?> </h4>
</div>

<!-- Début du formulaire -->
<form action="modules/locaux/ajax/iModification_local.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="societes_locaux_id" value="<?php echo $id; ?>"/>
    <div class="modal-body">

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
                                $societe_selected = $pdo->sqlValue("SELECT societes_id FROM societes_locaux WHERE societes_locaux_id = ?", array($id));
                                $selected = ($row['societes_id'] == $societe_selected) ? 'selected' : '';
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Nom local -->
            <div class="row">
                <label class="label col col-2">Local</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                        <input type="text" name="nom_local" placeholder="Nom du local" required"
                        value="<?php echo $rang['societes_locaux_nom'] ?>">
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
                        class='adresse_identique' value="<?php echo $rang['societes_locaux_adresse'] ?>">
                    </label>
                </section>


                <!-- Ville local -->
                <label class="label col col-2">Ville</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="ville_local" id="ville_local" placeholder="Ville" required"
                        class='adresse_identique' value="<?php echo $rang['societes_locaux_ville'] ?>">
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
                        class='adresse_identique' value="<?php echo $rang['societes_locaux_CP'] ?>">
                    </label>
                </section>

                <!-- Pays local -->
                <label class="label col col-2">Pays</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="pays_local" id="pays_local" placeholder="Pays" required"
                        class='adresse_identique' value="<?php echo $rang['societes_locaux_pays'] ?>">
                    </label>
                </section>
            </div>

            <!-- Email local -->
            <div class="row">
                <!-- Telephone local -->
                <label class="label col col-2">Téléphone</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="telephone_local" placeholder="Télépone" required"
                        value="<?php echo $rang['societes_locaux_telephone'] ?>">
                    </label>
                </section>

                <!-- Telephone local -->
                <label class="label col col-2">Fax</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="fax_local" placeholder="Fax" required"
                        value="<?php echo $rang['societes_locaux_fax'] ?>">
                    </label>
                </section>
            </div>

            <div class="row">
                <label class="label col col-2">Email</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                        <input type="text" name="email_local" placeholder="Email" required"
                        value="<?php echo $rang['societes_locaux_email'] ?>">
                    </label>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <!-- Description local -->
            <div class="row">
                <label class="label col col-2">Commentaire</label>
                <section class="col col-10">
                    <textarea rows="5" placeholder=""
                              name="commentaire_local"><?php echo $rang['societes_locaux_commentaire'] ?></textarea>
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
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/assets/js/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        pageSetUp();

        var pagefunction = function () {

            tinymce.init({
                selector: 'textarea',
                height: 200,
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
                    console.log('test');
                    $(ev).ajaxSubmit({
                        type: $('#ajoutSocietes').attr('method'),
                        url: $('#ajoutSocietes').attr('action'),
                        data: $('#ajoutSocietes').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            console.log('succès');
                            if (data.retour == '1') {
                                smallBox('Modification impossible', 'Un local pour cette société porte déjà ce nom.', 'warning');
                            }
                            else {
                                smallBox('Modification effectuée', 'Le local <?php echo $rang['societes_locaux_nom'] ?> à correctement été modifié.', 'success');
                                setTimeout(function () {
                                    $('#listing_locaux').DataTable().ajax.reload(null, false);
                                }, 500);
                            }
                            console.log(data.retour);
                        }
                    });
                },

                errorPlacement: function (error, element) {
                    console.log('erreur');
                    error.insertAfter(element.parent());
                },

                invalidHandler: function () {
                    smallBox('Ajout impossible', "Veuillez vérifier les champs.", 'error', '5000')
                }
            });
        };

        loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

    }); // fin document.ready




</script>