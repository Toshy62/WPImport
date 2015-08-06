<?php
$lang['constraint.wp-path'] = 'Le chemin que vous avez indiqué n\'est pas une installation Wordpress valide.';

$lang['wpimport.set_execution_time'] = 'Modification du max_execution_time';
$lang['wpimport.set_execution_time.description'] = 'En fonction de la quantité de contenue à importer, l\'importation d\'un site peut être plus ou moins longue. Pouvoir modifier le max_execution_time permet d\'avoir la certitude que le script d\'import pourra se dérouler sans encombre jusque la fin.';
$lang['wpimport.set_execution_time.default'] = 'Valeur par défaut du max_execution_time: ';
$lang['wpimport.set_execution_time.success'] = 'Le script peut modifier le max_execution_time.';
$lang['wpimport.set_execution_time.warning'] = 'Le script ne peut pas modifier le max_execution_time.';

$lang['wpimport.module_title'] = 'Importation de données depuis Wordpress';
$lang['menu.title'] = 'Importer des données';

$lang['wpimport.fieldset-path'] = 'Configuration des chemins d\'installation';
$lang['wpimport.phpboostpath'] = 'Chemin d\'installation de PHPBoost';
$lang['wpimport.wppath'] = 'Chemin d\'installation de WordPress';

$lang['wpimport.fieldset-importer'] = 'Configuration des éléments à importer';
$lang['wpimport.description'] = 'Description';
$lang['wpimport.version'] = 'Version';

$lang['wpimport.fieldset-options'] = 'Options diverses';
$lang['wpimport.default_author'] = 'Auteur par défaut';
$lang['wpimport.default_author.decription'] = 'Cet utilisateur sera défini comme auteur dans le cas où un utilisateur ayant le même login que l\'auteur d\'origine ne serait pas trouvé sur le site.';
$lang['wpimport.default_author.error_user_exist'] = 'L\'utilisateur choisie comme auteur par défaut n\'existe pas.';
$lang['wpimport.default_cat_image'] = 'Image par défaut des catégories de news';
$lang['wpimport.default_cat_image.description'] = 'Wordpress contrairement à PHPBoost ne permet pas de définir une image par catégorie d\'article, ce champ permet de séléctionner l\'image qui sera utilisé comme image de catégorie.';
$lang['wpimport.import_location'] = 'Emplacement d\'importation des médias';
$lang['wpimport.import_location.description'] = 'Le chemin du dossier sous l\'arborescence de PHPBoost où les fichiers médias (photo...) de Wordpress seront copié. Exemple avec un fichier 2015/08/elephant.png importé dans le dossier /uploads/wordpress/ alors le fichier sera importé à l\'emplacement /uploads/wordpress/2015/08/elephant.png';

$lang['wpimport.reset'] = 'Réinitialiser';
$lang['wpimport.submit_configuration'] = 'Lancer l\'importation';

$lang['wpimport.import.start'] = 'Importation en cours...';
$lang['wpimport.import.end'] = 'Importation terminée';
$lang['wpimport.import.success'] = 'Importation effectué avec succès.';
$lang['wpimport.import.error'] = 'Erreur durant l\'importation.';
$lang['wpimport.logs'] = 'Journal d\'erreur';