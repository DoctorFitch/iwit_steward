<?php require_once("inc/init.php"); ?>
<!-- row -->
<div class="row">

    <!-- row -->
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="well well-sm">
                <!-- Timeline Content -->
                <div class="smart-timeline">
                    <ul class="smart-timeline-list" id="test">
                        <li>
                            <div class="smart-timeline-icon">
                                <img src="assets/img/avatars/sunny.png" width="32" height="32"/>
                            </div>
                            <div class="smart-timeline-time">
                                <small>just now</small>
                            </div>
                            <div class="smart-timeline-content">
                                <p>
                                    <a><strong>Création d'un utilisateur</strong></a>
                                </p>
                                <p>
                                    Check out my tour to Adalaskar
                                </p>
                                <p>
                                    <a href="javascript:void(0);" class="btn btn-xs btn-primary"><i
                                            class="fa fa-file"></i> Utilisateurs</a>
                                </p>
                                <img src="assets/img/superbox/superbox-thumb-4.jpg" alt="img" width="150">
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- END Timeline Content -->

            </div>

        </div>

    </div>

    <!-- end row -->


    <script type="text/javascript">

        $(document).ready(function(){

        pageSetUp();

        var pagefunction = function () {

        };

        $(document).ready(function () {
            $.ajax({

                type: 'POST',
                url: 'modules/historiques/iSelect_historique.php',
                data: {'select_entreprise': $('#select_entreprise').val()},
                dataType: 'json',
                success: function (data) {

                    $('#test').html(data.html);

                    console.log('gg');
                    console.log(data);
                }
            });
        });
        // end pagefunction

        // run pagefunction on load

        pagefunction();
        });
    </script>
