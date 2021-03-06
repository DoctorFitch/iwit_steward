<?php require_once("../../../lib/config.php");
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajouter produit</h4>
</div>

<!-- Début du formulaire -->
<!-- Début du formulaire -->
<form action="modules/utilisateurs/ajax/iAjout_utilisateurs_produits.php" id="ajoutProduit" class="smart-form"
      novalidate="novalidate"
      method="post" name="ajoutProduit">

    <fieldset>
        <!-- ID utilisateur -->
        <input type="hidden" name="utilisateurs_produits_id" value="<?php echo $id; ?>"/>

        <!-- Type produit -->
        <div class="row">
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

        <!-- Produit -->
        <div class="row">
            <label class="label col col-2">Produit</label>
            <section class="col col-3">
                <div class="icon-addon" style="width: 122%;">
                    <select class="form-control" name="produit" id="produit" required>
                        <option value="" selected="" disabled="">Selectionnez un produit
                        </option>
                    </select>
                    <label for="email" class="glyphicon glyphicon-search" rel="tooltip"
                           title=""
                           data-original-title="email"></label>
                </div>
            </section>
        </div>

    </fieldset>

    <fieldset>


        <div class="row">
            <!--Numéro licence-->
            <label class="label col col-2 hide" id="label_licence">Numéro licence</label>
            <section class="col col-4 hide" id="licence">
                <label class="input"> <i class="icon-prepend fa fa-barcode"></i>
                    <input type="text" name="licence" id="in-licence"
                           placeholder="Licence"
                           required">
                </label>
            </section>

            <!--Date installation-->
            <label class="label col col-2 hide" id="label_date_installation">Date installation</label>
            <section class="col col-4 hide" id="date_installation">
                <label class="input"> <i class="icon-prepend fa fa-calendar-check-o"></i>
                    <input type="text" class="form-control datepicker"
                           name="date_installation" id="in-date_installation"
                           placeholder="Date installation">
                </label>
            </section>
        </div>

        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_adresse_messagerie">Adresse messagerie</label>
            <section class="col col-4 hide" id="adresse_messagerie">
                <label class="input"> <i class="icon-prepend fa fa-code"></i>
                    <input type="text" name="adresse_messagerie" id="in-adresse_messagerie"
                           placeholder="example@societe.com"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--Login-->
            <label class="label col col-2 hide" id="label_login">Login</label>
            <section class="col col-4 hide" id="login">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="login" id="in-login"
                           placeholder="Login"
                           required">
                </label>
            </section>

            <!--Password-->
            <label class="label col col-2 hide" id="label_password">Mot de passe</label>
            <section class="col col-4 hide" id="password">
                <label class="input"> <i class="icon-prepend fa fa-unlock-alt"></i>
                    <input type="text" name="password" id="in-password"
                           placeholder="Mot de passe"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_url">URL</label>
            <section class="col col-4 hide" id="url">
                <label class="input"> <i class="icon-prepend fa fa-code"></i>
                    <input type="text" name="url" id="in-url"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>
        </div>


        <h4 id="label_ftp">FTP</h4><br/>
        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_adresse_ftp">Adresse</label>
            <section class="col col-4 hide" id="adresse_ftp">
                <label class="input"> <i class="icon-prepend fa fa-download"></i>
                    <input type="text" name="adresse_ftp" id="in-adresse_ftp"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>
        </div>

        <div class="row">

            <!--URL-->
            <label class="label col col-2 hide" id="label_login_ftp">Login</label>
            <section class="col col-4 hide" id="login_ftp">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="login_ftp" id="in-login_ftp"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>

            <!--URL-->
            <label class="label col col-2 hide" id="label_pass_ftp">Mot de passe</label>
            <section class="col col-4 hide" id="pass_ftp">
                <label class="input"> <i class="icon-prepend fa fa-unlock-alt"></i>
                    <input type="text" name="pass_ftp" id="in-pass_ftp"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>
        </div>

        <h4 id="label_bd">Base de données</h4><br/>
        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_adresse_bd">Adresse</label>
            <section class="col col-4 hide" id="adresse_bd">
                <label class="input"> <i class="icon-prepend fa fa-database"></i>
                    <input type="text" name="adresse_bd" id="in-adresse_bd"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_login_bd">Login</label>
            <section class="col col-4 hide" id="login_bd">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="login_bd" id="in-login_bd"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>

            <!--URL-->
            <label class="label col col-2 hide" id="label_pass_bd">Mot de passe</label>
            <section class="col col-4 hide" id="pass_bd">
                <label class="input"> <i class="icon-prepend fa fa-unlock-alt"></i>
                    <input type="text" name="pass_bd" id="in-pass_bd"
                           placeholder="http://www.example.com"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_motif_maintenance">Motif maintenance</label>
            <section class="col col-4 hide" id="motif_maintenance">
                <label class="input"> <i class="icon-prepend fa fa-font"></i>
                    <input type="text" name="motif_maintenance" id="in-motif_maintenance"
                           placeholder="Motif de la maintenance"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_date_maintenance">Date</label>
            <section class="col col-4 hide" id="date_maintenance">
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" class="form-control datepicker" name="date_maintenance" id="in-date_maintenance"
                           placeholder="Date maintenance"
                           required">
                </label>
            </section>
        </div>

        <div class="row">
            <!--URL-->
            <label class="label col col-2 hide" id="label_maintenance_debut">Maintenance début</label>
            <section class="col col-4 hide" id="maintenance_debut">
                <div class="input-group">
                    <input class="form-control" id="clockpicker_heureDebut" type="text" name="maintenance_debut" id="in-maintenance_debut"
                           placeholder="&nbsp;&nbsp;Sélectionner l'heure de début" data-autoclose="true">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                </div>
            </section>

            <!--URL-->
            <label class="label col col-2 hide" id="label_maintenance_fin">Maintenance fin</label>
            <section class="col col-4 hide" id="maintenance_fin">
                <div class="input-group">
                    <input class="form-control" id="clockpicker_heureFin" type="text" name="maintenance_fin" id=in-maintenance_fin"
                           placeholder="&nbsp;&nbsp;Sélectionner l'heure de fin" data-autoclose="true">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                </div>
            </section>

        </div>


        <div class="row">
            <!--Commentaire-->
            <label class="label col col-2 hide" id="label_commentaire">Commentaire</label>
            <section class="col col-10 hide" id="commentaire">
                <label class="textarea">
                    <textarea rows="5" name="commentaire" id="in-commentaire" placeholder="Commentaire"></textarea>
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
<script type="text/javascript">
    $(document).ready(function () {

        pageSetUp();

        var pagefunction = function () {

            var $checkoutForm = $('#ajoutProduit').validate({
                // Rules for form validation
                rules: {
                    type_produit: {
                        required: true
                    },
                    produit: {
                        required: true
                    },
                },

                // Messages for form validation
                messages: {
                    type_produit: {
                        required: "Veuillez sélectionner un type."
                    },
                    produit: {
                        required: "Veuillez sélectionner un produit."
                    },
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
                                $('#listing_materiel').DataTable().ajax.reload(null, false);
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

        $('#produit').change(function(){
            changeOpenModal();
        });

        $('#type_produit').change(function () {
            $.ajax({
                type: $('#ajoutProduit').attr('method'),
                url: 'modules/materiels/ajax/iSelect_produits.php',
                data: {'type_produit': $('#type_produit').val()},
                dataType: 'json',
                success: function (data) {

                    $('#produit').html(data.html);
                    changeOpenModal();
                    console.log('gg');
                    console.log(data);
                }
            });
        });

        function changeOpenModal() {

            //region Initialisation du hide sur les champs
            $('#licence').addClass('hide');
            $('#date_installation').addClass('hide');
            $('#login').addClass('hide');
            $('#password').addClass('hide');
            $('#url').addClass('hide');
            $('#adresse_messagerie').addClass('hide');
            $('#adresse_ftp').addClass('hide');
            $('#login_ftp').addClass('hide');
            $('#pass_ftp').addClass('hide');
            $('#adresse_bd').addClass('hide');
            $('#login_bd').addClass('hide');
            $('#pass_bd').addClass('hide');
            $('#date_maintenance').addClass('hide');
            $('#motif_maintenance').addClass('hide');
            $('#maintenance_debut').addClass('hide');
            $('#maintenance_fin').addClass('hide');
            $('#commentaire').addClass('hide');

            //region Initialisation du hide sur les champs
            $('#in-licence').val('');
            $('#in-date_installation').val('');
            $('#in-login').val('');
            $('#in-password').val('');
            $('#in-url').val('');
            $('#in-adresse_messagerie').val('');
            $('#in-adresse_ftp').val('');
            $('#in-login_ftp').val('');
            $('#in-pass_ftp').val('');
            $('#in-adresse_bd').val('');
            $('#in-login_bd').val('');
            $('#in-pass_bd').val('');
            $('#in-date_maintenance').val('');
            $('#in-motif_maintenance').val('');
            $('#in-maintenance_debut').val('');
            $('#in-maintenance_fin').val('');
            $('#in-commentaire').val('');

            //endregion

            //region réinitialisation des labels
            $('#label_licence').addClass('hide');
            $('#label_date_installation').addClass('hide');
            $('#label_login').addClass('hide');
            $('#label_password').addClass('hide');
            $('#label_url').addClass('hide');
            $('#label_adresse_messagerie').addClass('hide');
            $('#label_adresse_ftp').addClass('hide');
            $('#label_login_ftp').addClass('hide');
            $('#label_pass_ftp').addClass('hide');
            $('#label_adresse_bd').addClass('hide');
            $('#label_login_bd').addClass('hide');
            $('#label_pass_bd').addClass('hide');
            $('#label_date_maintenance').addClass('hide');
            $('#label_motif_maintenance').addClass('hide');
            $('#label_maintenance_debut').addClass('hide');
            $('#label_maintenance_fin').addClass('hide');
            $('#label_commentaire').addClass('hide');
            $('#label_ftp').addClass('hide');
            $('#label_bd').addClass('hide');


            //endregion

            if ($('#type_produit').val() == '1') { // Logiciel


                $('#licence').removeClass('hide');
                $('#date_installation').removeClass('hide');
                $('#login').removeClass('hide');
                $('#password').removeClass('hide');
                $('#commentaire').removeClass('hide');


                $('#label_licence').removeClass('hide');
                $('#label_date_installation').removeClass('hide');
                $('#label_login').removeClass('hide');
                $('#label_password').removeClass('hide');
                $('#label_commentaire').removeClass('hide');


            } else if ($('#type_produit').val() == '2') { // Matériel


                $('#date_installation').removeClass('hide');
                $('#commentaire').removeClass('hide');

                $('#label_date_installation').removeClass('hide');
                $('#label_commentaire').removeClass('hide');


            } else if ($('#type_produit').val() == '3') { // Application


                $('#login').removeClass('hide');
                $('#password').removeClass('hide');
                $('#date_installation').removeClass('hide');
                $('#commentaire').removeClass('hide');

                $('#label_login').removeClass('hide');
                $('#label_password').removeClass('hide');
                $('#label_date_installation').removeClass('hide');
                $('#label_commentaire').removeClass('hide');


            } else if ($('#type_produit').val() == '4' || $('#type_produit').val() == '7') { // Site web & hébérgement


                $('#date_installation').removeClass('hide');
                $('#url').removeClass('hide');
                $('#adresse_ftp').removeClass('hide');
                $('#login_ftp').removeClass('hide');
                $('#pass_ftp').removeClass('hide');
                $('#adresse_bd').removeClass('hide');
                $('#login_bd').removeClass('hide');
                $('#pass_bd').removeClass('hide');
                $('#commentaire').removeClass('hide');

                $('#label_date_installation').removeClass('hide');
                $('#label_url').removeClass('hide');
                $('#label_adresse_ftp').removeClass('hide');
                $('#label_login_ftp').removeClass('hide');
                $('#label_pass_ftp').removeClass('hide');
                $('#label_adresse_bd').removeClass('hide');
                $('#label_login_bd').removeClass('hide');
                $('#label_pass_bd').removeClass('hide');
                $('#label_commentaire').removeClass('hide');
                $('#label_ftp').removeClass('hide');
                $('#label_bd').removeClass('hide');

            } else if ($('#type_produit').val() == '5' || $('#type_produit').val() == '6') { // Maintenance web & application


                $('#motif_maintenance').removeClass('hide');
                $('#maintenance_debut').removeClass('hide');
                $('#maintenance_fin').removeClass('hide');
                $('#commentaire').removeClass('hide');
                $('#date_maintenance').removeClass('hide');

                $('#label_motif_maintenance').removeClass('hide');
                $('#label_maintenance_debut').removeClass('hide');
                $('#label_maintenance_fin').removeClass('hide');
                $('#label_commentaire').removeClass('hide');
                $('#label_date_maintenance').removeClass('hide');


            } else if ($('#type_produit').val() == '8') { // Messagerie

                $('#date_installation').removeClass('hide');
                $('#adresse_messagerie').removeClass('hide');
                $('#login').removeClass('hide');
                $('#password').removeClass('hide');
                $('#commentaire').removeClass('hide');

                $('#label_date_installation').removeClass('hide');
                $('#label_adresse_messagerie').removeClass('hide');
                $('#label_login').removeClass('hide');
                $('#label_password').removeClass('hide');
                $('#label_commentaire').removeClass('hide')


            }
        }

        $('#modal_ajoute_clients').on('show.bs.modal', function (e) {
            // Et ici, la fonction en question
            changeOpenModal();
        });

        // end pagefunction

        function runClockPicker() {
            $('#clockpicker_heureDebut').clockpicker({
                placement: 'top',
                donetext: 'Ok'
            });
            $('#clockpicker_heureFin').clockpicker({
                placement: 'top',
                donetext: 'Ok'
            });
        }

        // Load form valisation dependency
        loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

        loadScript("assets/js/plugin/clockpicker/clockpicker.min.js", runClockPicker);
    });



</script>