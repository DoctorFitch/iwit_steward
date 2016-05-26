<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_blank",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
	/*
    "Societes_old" => array(
        "title" => "Societes",
        "icon" => "fa-desktop",
        "sub" => array(
            "logiciel" => array(
                "title" => "Ajout d'un logiciel",
                "url" => "ajax/ajout_logiciel.php"
            ),
            "materiel" => array(
                "title" => "Modification logiciel",
                "url" => "ajax/modif_logiciel.php"
            )
        )
    ),
    "Produits_old" => array(
        "title" => "Produits",
        "icon" => "fa-building",
        "sub" => array(
            "societes" => array(
                "title" => "Ajout d'une societe",
                "url" => "ajax/ajout_societe.php"
            ),
            "locaux" => array(
                "title" => "Ajout locaux",
                "url" => "ajax/ajout_locaux.php"
            )
        )
    ),
    "clients_old" => array(
        "title" => "Clients",
        "icon" => "fa-users",
        "sub" => array(
            "liste_societes" => array(
                "title" => "Appli sociétés",
                "icon" => "fa-user",
                "url" => "ajax/liste_societes.php"
            ),
            "liste_locaux" => array(
                "title" => "Liste locaux",
                "icon" => "fa-building",
                "url" => "ajax/liste_locaux.php"
            ),
            "liste_utilisateurs" => array(
                "title" => "Liste utilisateurs",
                "icon" => "fa-users",
                "url" => "ajax/liste_utilisateurs.php"
            )
        )
    ),

    "technique_old" => array(
        "title" => "Technique",
        "icon" => "fa-gear",
        "sub" => array(
            "liste_postes" => array(
                "title" => "Postes",
                "icon" => "fa-desktop",
                "url" => "ajax/liste_postes.php"
            ),
            "liste_materiels" => array(
                "title" => "Matériel",
                "icon" => "fa-gears",
                "url" => "ajax/liste_materiels.php"
            ),
            "liste_logiciels" => array(
                "title" => "Logiciel",
                "icon" => "fa-windows",
                "url" => "ajax/liste_logiciels.php"
            )
        ),
    ),
    */


	"Societes" => array(
		"title" => "Societes",
		"icon" => "fa-balance-scale",
		"sub" => array(
			"societes" => array(
				"title" => "Societes",
				"url" => "index.php?p=modules/locaux"
			),
			"utilisateurs" => array(
				"title" => "Utilisateurs",
				"url" => "index.php?p=modules/utilisateurs"
			)
		)
	),

	"Produits" => array(
		"title" => "Produits",
		"icon" => "fa-cube",
		"sub" => array(
			"materiels" => array(
				"title" => "Matériels",
				"url" => "index.php?p=modules/materiel"
			)
		)
	),

	"Applications_web" => array(
		"title" => "Applications / Web",
		"icon" => "fa-desktop",
		"sub" => array(
			"projets" => array(
				"title" => "Liste des projets",
				"url" => "index.php?p=modules/projets"
			),
			"production" => array(
				"title" => "Suivi production",
				"url" => "index.php?p=modules/productions"
			)
		)
	),

	"Maintenance" => array(
		"title" => "Maintenance",
		"icon" => "fa-wrench",
		"url" => "index.php?p=modules/maintenance"
	),

	"Historique" => array(
		"title" => "Historique",
		"icon" => "fa-history",
		"url" => "index.php?p=modules/timeline"
	)

);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>