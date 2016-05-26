<?php

require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter société</h4>
</div>

<!-- Début du formulaire -->
<form action="modules/locaux/ajax/iAjout_societe.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate"
      method="post"
      name="ajoutSociete">
    <input type="hidden" name="logiciel_id"/>
    <div class="modal-body col-12">

        <fieldset>

            <!-- Nom societe -->
            <div class="row">
                <label class="label col col-2">Societe</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-suitcase"></i>
                        <input type="text" name="nom_societe" placeholder="Nom de la société" required">
                    </label>
                </section>

                <!-- Statut juridique -->
                <label class="label col col-2">Statut juridique</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-balance-scale"></i>
                        <input type="text" name="statut_juridique" placeholder="Statut juridique" required">
                    </label>
                </section>
            </div>

            <!-- Type contrat -->
            <div class="row">
                <label class="label col col-2">Type de contrat</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-money"></i>
                        <input type="text" name="type_contrat" placeholder="Type de contrat" required">
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
                        <input type="text" name="adresse_societe" id="adresse_societe" placeholder="Adresse" required"
                        class='adresse_identique'>
                    </label>
                </section>


                <!-- Ville societe -->
                <label class="label col col-2">Ville</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="ville_societe" id="ville_societe" placeholder="Ville" required"
                        class='adresse_identique'>
                    </label>
                </section>
            </div>

            <!-- Code postal societe -->
            <div class="row">
                <label class="label col col-2">Code postal</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="code_postal_societe" id="code_postal_societe" placeholder="Code postal"
                               required"
                        class='adresse_identique'>
                    </label>
                </section>

                <!-- Pays societe -->
                <label class="label col col-2">Pays</label>
                <section class="col col-4">
                    <label class="input fe">
                        <input type="text" name="pays_societe" id="pays_societe" placeholder="Pays" required"
                        class='adresse_identique'>
                    </label>
                </section>
            </div>

            <div class="row">
                <!-- Telephone local -->
                <label class="label col col-2">Téléphone</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="telephone_societe" placeholder="Télépone" required">
                    </label>
                </section>

                <!-- Telephone local -->
                <label class="label col col-2">Fax</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="fax_societe" placeholder="Fax">
                    </label>
                </section>
            </div>

            <div class="row">
                <label class="label col col-2">Email</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                        <input type="text" name="email_societe" placeholder="Email" required">
                    </label>
                </section>
            </div>
        </fieldset>
        <fieldset>
            <div class="row">
                <label class="label col col-2">RCS</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-sort-numeric-asc"></i>
                        <input type="text" name="rcs" placeholder="RCS" required">
                    </label>
                </section>

                <label class="label col col-2">TVA</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-percent"></i>
                        <input type="text" name="tva" placeholder="TVA" required">
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
                        <input type="text" name="nom_contact" placeholder="Nom" required">
                    </label>
                </section>
                <!--Prénom-->
                <label class="label col col-2">Prénom</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                        <input type="text" name="prenom_contact" placeholder="Prénom" required">
                    </label>
                </section>
            </div>
            <!--Date de naissance-->
            <div class="row">
                <label class="label col col-2">Date de naissance</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" data-mask="**/**/****" data-mask-placeholder="-" name="date_naissance"
                               placeholder="Date de naissance" required">
                    </label>
                </section>
                <!--Lieu de naissance-->
                <label class="label col col-2">Lieu de naissance</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-map-marker"></i>
                        <input type="text" name="lieu_naissance" placeholder="Lieu de naissance" required">
                    </label>
                </section>
            </div>
            <!--Email-->
            <div class="row">
                <label class="label col col-2">Email</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                        <input type="text" name="email_contact" placeholder="Email" required">
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
                        <textarea rows="5" name="commentaire_societe" placeholder="Description"></textarea>
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
                        required: true,
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
                        required: "Veuillez indiquer un code postal pour cette société",
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
                        type: $('#ajoutSocietes').attr('method'),
                        url: $('#ajoutSocietes').attr('action'),
                        data: $('#ajoutSocietes').serialize(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.alert == '1') {
                                smallBox('Ajout impossible', 'Une société portant ce nom existe déjà.', 'warning');
                            }
                            else {
                                smallBox('Ajout effectué', 'La société à correctemetn été ajoutée.', 'success');
                                setTimeout(function () {
                                    $('#listing_locaux').DataTable().ajax.reload(null, false);
                                }, 500);
                            }
                        }
                    });
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                },

                invalidHandler: function () {
                    smallBox('Ajout impossible', "Veuillez vérifier les champs.", 'error', '3000')
                }
            });
        };

        loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

    });


</script>