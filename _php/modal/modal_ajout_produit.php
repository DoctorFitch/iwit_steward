<?php require_once("../../../lib/config.php");

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter produit</h4>
</div>

<!-- Début du formulaire -->
<!-- Début du formulaire -->
<form action="./php/iAjout_produit.php" id="ajoutProduit" class="smart-form"
      novalidate="novalidate"
      method="post" name="ajoutProduit">

    <fieldset>
        <!-- ID utilisateur -->
        <input type="hidden" name="utilisateurs_produits_id" value="<?php echo $id; ?>"/>

        <!-- Produit -->
        <div class="row">
            <!--NOM-->
            <label class="label col col-2">Nom</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-barcode"></i>
                    <input type="text" name="nom_produit" id="licence"
                           placeholder="Nom"
                           required">
                </label>
            </section>

            <!-- Type produit -->
            <label class="label col col-2">Type du produit</label>
            <section class="col col-3">
                <div class="icon-addon" style="width: 122%;">
                    <select class="form-control" name="type_produit" id="type_produit" required>
                        <option value="" disabled selected>Choisir un type de produit</option>
                        <?php
                        $select = $pdo->sql("select produits_type_id, produits_type_nom from produits_type group by produits_type_nom");
                        while ($row = $select->fetch()) {
                            echo "<option " . " value=" . $row['produits_type_id'] . ">" . $row['produits_type_nom'] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="email" class="fa fa-shopping-basket" rel="tooltip" title=""
                           data-original-title="email"></label>
                </div>
            </section>
        </div>

    </fieldset>

    <fieldset>

        <div class="row">
            <!--Référence-->
            <label class="label col col-2">Référence</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-barcode"></i>
                    <input type="text" name="reference_produit" id="reference_produit"
                           placeholder="Référence"
                           required">
                </label>
            </section>

            <label class="label col col-2">Numéro de serie</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-barcode"></i>
                    <input type="text" name="serie_produit" id="serie_produit"
                           placeholder="Numéro de série"
                           required">
                </label>
            </section>
        </div>


        <div class="row">
            <!--EAN-->
            <label class="label col col-2">EAN</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="ean_produit" id="login"
                           placeholder="EAN"
                           required">
                </label>
            </section>

            <!--Poids-->
            <label class="label col col-2">Poids</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-archive"></i>
                    <input type="text" name="poids_produit" id="password"
                           placeholder="Poids"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--Prix achat HT-->
            <label class="label col col-2">Prix achat HT</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-eur"></i>
                    <input type="text" name="prix_achat_produit" id="url"
                           placeholder="Prix achat"
                           required">
                </label>
            </section>

            <!--Prix public HT-->
            <label class="label col col-2">Prix public HT</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-eur"></i>
                    <input type="text" name="prix_public_produit" id="url"
                           placeholder="Prix public"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--TVA-->
            <label class="label col col-2">TVA</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-percent"></i>
                    <input type="text" name="tva_produit" id="url"
                           placeholder="TVA"
                           required">
                </label>
            </section>

            <!--Taxe-->
            <label class="label col col-2">Taxe</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-percent"></i>
                    <input type="text" name="taxe_produit" id="url"
                           placeholder="Taxe"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--Garantie-->
            <label class="label col col-2">Garantie</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="garantie_produit" id="url"
                           placeholder="Garantie"
                           required">
                </label>
            </section>


            <label class="label col col-2">Image</label>
            <section class="col col-4">
                <label for="file" class="input input-file"><div class="button"><input type="file" name="photo_produit" id="photo_produit" onchange="this.parentNode.nextSibling.value = this.value">Chercher</div><input type="text" readonly=""></label>
                <div class="note note-error">Le fichier ne doit pas être supérieur à 3Mo.</div>
            </section>
        </div>


        <div class="row">
            <!--Commentaire-->
            <label class="label col col-2">Commentaire</label>
            <section class="col col-10">
                <label class="textarea">
                    <textarea rows="5" name="commentaire_produit" id="commentaire" placeholder="Commentaire"></textarea>
                </label>
            </section>
        </div>
    </fieldset>

    <footer>
        <button type="submit" class="btn btn-primary">Ajouter !</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    </footer>
</form>

<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/js/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

    pageSetUp();

    // PAGE RELATED SCRIPTS

    // pagefunction

    var pagefunction = function () {

        tinymce.init({
            selector: 'textarea',
            height: 140,
            menu: {

            },
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

        var $checkoutForm = $('#ajoutProduit').validate({
            // Rules for form validation
            rules: {
                nom_entreprise: {
                    required: true
                },
                id_local: {
                    required: true
                },
                utilisateur_service: {
                    required: true
                },
                utilisateur_nom: {
                    required: true
                },
                utilisateur_prenom: {
                    required: true
                },
                utilisateur_telephoneFixe: {
                    required: true,
                    digits: true
                },
                utilisateur_telephoneMobile: {
                    required: true,
                    digits: true
                },
                utilisateur_email: {
                    required: true,
                    email: true
                },
                utilisateur_fonction: {
                    required: true
                },
                utilisateur_statut: {
                    required: true
                }
            },

            // Messages for form validation
            messages: {
                nom_entreprise: {
                    required: "Veuillez sélectionner une entreprise."
                },
                id_local: {
                    required: "Veuillez sélectionner un local."
                },
                utilisateur_service: {
                    required: "Veuillez renseigner un service."
                },
                utilisateur_nom: {
                    required: "Veuillez renseigner un nom."
                },
                utilisateur_prenom: {
                    required: "Veuillez renseigner un prénom."
                },
                utilisateur_telephoneFixe: {
                    required: "Veuillez renseigner un téléphone fixe.",
                    digits: "Veuillez renseigner un numéro de téléphone correct."
                },
                utilisateur_telephoneMobile: {
                    required: "Veuillez renseigner un téléphone mobile.",
                    digits: "Veuillez renseigner un numéro de téléphone correct."
                },
                utilisateur_email: {
                    required: "Veuillez renseigner un email.",
                    email: "Veuillez renseigner un email correct"
                },
                utilisateur_fonction: {
                    required: "Veuillez renseigner une fonction."
                },
                utilisateur_statut: {
                    required: "Veuillez renseigner un statut."
                }
            },

            submitHandler: function (ev) {
                $(ev).ajaxSubmit({
                    type: $('#ajoutProduit').attr('method'),
                    url: $('#ajoutProduit').attr('action'),
                    data: $('#ajoutProduit').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.retour == '1') {
                            smallBox('Impossible', "L'utilsateur dispose déjà de ce produit.", 'warning');
                        }
                        else {
                            smallBox('Produit ajouté', 'Produit correctement attribué', 'success');
                            setTimeout(function () {
                                $('#datatable_materiel').DataTable().ajax.reload(null, false);
                            }, 500);
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

    $('#type_produit').change(function () {
        $.ajax({
            type: $('#ajoutProduit').attr('method'),
            url: './php/iSelect_produits.php',
            data: {'type_produit': $('#type_produit').val()},
            dataType: 'json',
            success: function (data) {

                $('#produit').html(data.html);

                console.log('gg');
                console.log(data);
            }
        });
    });

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>