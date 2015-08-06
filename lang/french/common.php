<?php
$lang['constraint.wp-path'] = 'Le chemin que vous avez indiqu� n\'est pas une installation Wordpress valide.';

$lang['wpimport.set_execution_time'] = 'Modification du max_execution_time';
$lang['wpimport.set_execution_time.description'] = 'En fonction de la quantit� de contenue � importer, l\'importation d\'un site peut �tre plus ou moins longue. Pouvoir modifier le max_execution_time permet d\'avoir la certitude que le script d\'import pourra se d�rouler sans encombre jusque la fin.';
$lang['wpimport.set_execution_time.default'] = 'Valeur par d�faut du max_execution_time: ';
$lang['wpimport.set_execution_time.success'] = 'Le script peut modifier le max_execution_time.';
$lang['wpimport.set_execution_time.warning'] = 'Le script ne peut pas modifier le max_execution_time.';

$lang['wpimport.module_title'] = 'Importation de donn�es depuis Wordpress';
$lang['menu.title'] = 'Importer des donn�es';

$lang['wpimport.fieldset-path'] = 'Configuration des chemins d\'installation';
$lang['wpimport.phpboostpath'] = 'Chemin d\'installation de PHPBoost';
$lang['wpimport.wppath'] = 'Chemin d\'installation de WordPress';

$lang['wpimport.fieldset-importer'] = 'Configuration des �l�ments � importer';
$lang['wpimport.description'] = 'Description';
$lang['wpimport.version'] = 'Version';

$lang['wpimport.fieldset-options'] = 'Options diverses';
$lang['wpimport.default_author'] = 'Auteur par d�faut';
$lang['wpimport.default_author.decription'] = 'Cet utilisateur sera d�fini comme auteur dans le cas o� un utilisateur ayant le m�me login que l\'auteur d\'origine ne serait pas trouv� sur le site.';
$lang['wpimport.default_author.error_user_exist'] = 'L\'utilisateur choisie comme auteur par d�faut n\'existe pas.';
$lang['wpimport.default_cat_image'] = 'Image par d�faut des cat�gories de news';
$lang['wpimport.default_cat_image.description'] = 'Wordpress contrairement � PHPBoost ne permet pas de d�finir une image par cat�gorie d\'article, ce champ permet de s�l�ctionner l\'image qui sera utilis� comme image de cat�gorie.';
$lang['wpimport.import_location'] = 'Emplacement d\'importation des m�dias';
$lang['wpimport.import_location.description'] = 'Le chemin du dossier sous l\'arborescence de PHPBoost o� les fichiers m�dias (photo...) de Wordpress seront copi�. Exemple avec un fichier 2015/08/elephant.png import� dans le dossier /uploads/wordpress/ alors le fichier sera import� � l\'emplacement /uploads/wordpress/2015/08/elephant.png';

$lang['wpimport.reset'] = 'R�initialiser';
$lang['wpimport.submit_configuration'] = 'Lancer l\'importation';

$lang['wpimport.import.start'] = 'Importation en cours...';
$lang['wpimport.import.end'] = 'Importation termin�e';
$lang['wpimport.import.success'] = 'Importation effectu� avec succ�s.';
$lang['wpimport.import.error'] = 'Erreur durant l\'importation.';
$lang['wpimport.logs'] = 'Journal d\'erreur';