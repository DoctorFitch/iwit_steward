<?php require_once("../../../lib/config.php");
$id = $_POST['id'];
$rang = $pdo->sqlRow("SELECT * FROM logiciels WHERE logiciels_id = ?", array($id));

?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Modifier logiciel</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iModification_logiciel.php" id="ajoutSocietes" class="smart-form" novalidate="novalidate" method="post"
      name="ajoutSociete">
    <input type="hidden" name="logiciel_id" value="<?php echo $rang['logiciels_id'] ?>"/>
    <div class="modal-body col-12">
        <fieldset>

            <!-- Nom local -->
            <div class="row">
                <label class="label col col-2">Licence</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                        <input type="text" name="logiciel_nom" placeholder="Nom" required" value="<?php echo $rang['logiciels_nom'] ?>">
                    </label>
                </section>


                <!-- Societe id -->
                <label class="label col col-2">Licence</label>
                <section class="col col-4">
                    <label class="select">
                        <select name="logiciel_licence" required>
                            <option value="" selected="" disabled="">Licence</option>
                            <?php
                            $select = $pdo->sql("select type_licences_id, type_licences_nom from type_licences group by type_licences_nom");
                            while ($row = $select->fetch()) {
                                $typeLicecence = $pdo->sqlValue("SELECT logiciels.logiciels_typeLicence FROM logiciels WHERE logiciels_id = ?", array($id));
                                $selected = ($row['type_licences_id'] == $typeLicecence) ? 'selected' : '' ;
                                echo "<option " . $selected . " value=" . $row['type_licences_id'] . ">" . $row['type_licences_nom'] . "</option>";
                            }
                            ?>
                        </select>
                </section>
            </div>

            <!-- Telephone local -->
            <div class="row">
                <label class="label col col-2">Durée</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="logiciel_dureegarantie" placeholder="Durée (mois)" required" value="<?php echo $func->dateFR($rang['logiciels_garantie']) ?>">
                    </label>
                </section>

                <!-- Adresse local -->
                <label class="label col col-2">Prix</label>
                <section class="col col-4">
                    <label class="input fe">
                        <label class="input"> <i class="icon-prepend fa fa-euro"></i>
                            <input type="text" name="logiciel_prix" id="logiciel_prix" placeholder="" required" value="<?php echo $rang['logiciels_prix'] ?>">
                        </label>
                </section>
            </div>

            <!-- Code postal local -->
            <div class="row">
                <label class="label col col-2">Durée licence</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="logiciel_dureelicence" id="logiciel_dureelicence" value="<?php echo $rang['logiciels_licence'] ?>">
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
                        <textarea rows="5" name="logiciel_description" placeholder="Description" required><?php echo $rang['logiciels_description']?></textarea>
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

    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     *
     * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
     *
     * // activate tooltips
     * $("[rel=tooltip]").tooltip();
     *
     * // activate popovers
     * $("[rel=popover]").popover();
     *
     * // activate popovers with hover states
     * $("[rel=popover-hover]").popover({ trigger: "hover" });
     *
     * // activate inline charts
     * runAllCharts();
     *
     * // setup widgets
     * setup_widgets_desktop();
     *
     * // run form elements
     * runAllForms();
     *
     ********************************
     *
     * pageSetUp() is needed whenever you load a page.
     * It initializes and checks for all basic elements of the page
     * and makes rendering easier.
     *
     */

    pageSetUp();

    /*
     // Ajax envoie du formulaire sur /php/ajoutLogiciel
     var frm = $('#ajoutLogiciel');
     frm.submit(function (ev) {
     $.ajax({
     type: frm.attr('method'),
     url: frm.attr('action'),
     data: frm.serialize(),
     success: function (data) {
     smallBox('Information', data, 'success');
     }
     });

     ev.preventDefault();
     });
     */
    // PAGE RELATED SCRIPTS

    // pagefunction

    var pagefunction = function() {

        var $checkoutForm = $('#ajoutSocietes').validate({
            // Rules for form validation
            rules : {
                nom_societe : {
                    required : true
                },
                type_contrat : {
                    required : true
                },
                site_web : {
                    required : true,
                },
                messagerie : {
                    required : true
                },
                adresse : {
                    required : true
                },
                ville : {
                    required : true
                },
                code_postal : {
                    required : false
                },
                pays : {
                    required : false
                }
            },

            // Messages for form validation
            messages : {
                nom_societe : {
                    required : 'Veuillez saisir le nom de la société'
                },
                type_contrat : {
                    required : 'Veuillez indiquer un contrat'
                },
                site_web : {
                    required : 'Veuillez saisir un site web'
                },
                messagerie : {
                    required : 'Veuillez saisir un service de messagerie'
                },
                adresse : {
                    required : 'Veuillez saisir une adresse'
                },
                ville : {
                    required : "Veuillez saisir une ville"
                },
                code_postal : {
                    required : 'Veuillez saisir un code postal'
                },
                pays : {
                    required : 'Veuillez saisir un pays'
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
                        if (data.retour == '1')
                        {
                            smallBox('Modification impossible', 'Un logiciel portant ce nom existe déjà.', 'warning');
                        }
                        else
                        {
                            smallBox('Modification effectuée', 'Le logiciel a correctement été modifié.', 'success');
                        }
                        console.log(data.retour);
                    }
                });
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                console.log('erreur');
                error.insertAfter(element.parent());
            },

            invalidHandler: function(){
                smallBox('Ajout impossible', "Veuillez vérifier les champs.", 'error', '5000')
            }

        });

        // START AND FINISH DATE
        $('#startdate').datepicker({
            dateFormat : 'dd.mm.yy',
            prevText : '<i class="fa fa-chevron-left"></i>',
            nextText : '<i class="fa fa-chevron-right"></i>',
            onSelect : function(selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });

        $('#finishdate').datepicker({
            dateFormat : 'dd.mm.yy',
            prevText : '<i class="fa fa-chevron-left"></i>',
            nextText : '<i class="fa fa-chevron-right"></i>',
            onSelect : function(selectedDate) {
                $('#startdate').datepicker('option', 'maxDate', selectedDate);
            }
        });

    };

    // end pagefunction

    // Load form valisation dependency
    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>