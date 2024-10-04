<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    ADMIN PANEL                                                    */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Admin menu
___('admin_menu_index',           'EN', "Notes");
___('admin_menu_index',           'FR', "Notes");
___('admin_menu_images',          'EN', "Images");
___('admin_menu_images',          'FR', "Images");
___('admin_menu_cards',           'EN', "Cards");
___('admin_menu_cards',           'FR', "Cartes");
___('admin_menu_arsenals',        'EN', "Arsenals");
___('admin_menu_arsenals',        'FR', "Arsenaux");
___('admin_menu_factions',        'EN', "Factions");
___('admin_menu_factions',        'FR', "Factions");
___('admin_menu_releases',        'EN', "Releases");
___('admin_menu_releases',        'FR', "Versions");
___('admin_menu_formats',         'EN', "Formats");
___('admin_menu_formats',         'FR', "Formats");
___('admin_menu_rulings',         'EN', "Rulings");
___('admin_menu_rulings',         'FR', "Jugements");
___('admin_menu_bans',            'EN', "Bans");
___('admin_menu_bans',            'FR', "Bans");
___('admin_menu_tags',            'EN', "Tags");
___('admin_menu_tags',            'FR', "Tags");
___('admin_menu_keywords',        'EN', "Keywords");
___('admin_menu_keywords',        'FR', "Mots clés");
___('admin_menu_identities',      'EN', "Identities");
___('admin_menu_identities',      'FR', "Identités");
___('admin_menu_hybridizations',  'EN', "Hybridizations");
___('admin_menu_hybridizations',  'FR', "Hybridations");
___('admin_menu_updates',         'EN', "Updates");
___('admin_menu_updates',         'FR', "Mises à jour");
___('admin_menu_blogs',           'EN', "Blogs");
___('admin_menu_blogs',           'FR', "Blogs");
___('admin_menu_exports',         'EN', "Exports");
___('admin_menu_exports',         'FR', "Exports");
___('admin_menu_queries',         'EN', "SQL Queries");
___('admin_menu_queries',         'FR', "Requêtes SQL");


// Admin notes
___('admin_notes_main',   'EN', "Notes");
___('admin_notes_main',   'FR', "Notes");
___('admin_notes_tasks',  'EN', "Tasks");
___('admin_notes_tasks',  'FR', "Tâches");
___('admin_notes_ideas',  'EN', "Ideas");
___('admin_notes_ideas',  'FR', "Idées");
___('admin_notes_lore',   'EN', "Lore");
___('admin_notes_lore',   'FR', "Lore");
___('admin_notes_update', 'EN', "Update notes");
___('admin_notes_update', 'FR', "Mettre à jour les notes");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                   QUERIES                                                         */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Query results
___('admin_query_ok', 'EN', "Queries ran successfully");
___('admin_query_ok', 'FR', "Requêtes exécutées avec succès");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                      IMAGES                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Uncategorized images
___('admin_uncategorized_images_title', 'EN', "Uncategorized images");
___('admin_uncategorized_images_title', 'FR', "Images non catégorisées");



// Image list
___('admin_image_list_path',    'EN', "Path");
___('admin_image_list_path',    'FR', "Chemin");
___('admin_image_list_name',    'EN', "Name");
___('admin_image_list_name',    'FR', "Nom");
___('admin_image_list_artist',  'EN', "Artist");
___('admin_image_list_artist',  'FR', "Artiste");
___('admin_image_list_tags',    'EN', "Tags");
___('admin_image_list_tags',    'FR', "Tags");
___('admin_image_list_count',   'EN', "{{1}} image found");
___('admin_image_list_count',   'FR', "{{1}} image trouvée");
___('admin_image_list_count+',  'EN', "{{1}} images found");
___('admin_image_list_count+',  'FR', "{{1}} images trouvées");


// Add an image
___('admin_image_name_title', 'EN', "Add image");
___('admin_image_name_title', 'FR', "Ajouter l'image");
___('admin_image_name_en',    'EN', "Image name (English)");
___('admin_image_name_en',    'FR', "Nom de l'image (Anglais)");
___('admin_image_name_fr',    'EN', "Image name (French)");
___('admin_image_name_fr',    'FR', "Nom de l'image (Français)");
___('admin_image_artist',     'EN', "Artist");
___('admin_image_artist',     'FR', "Artiste");
___('admin_image_add_submit', 'EN', "Add image");
___('admin_image_add_submit', 'FR', "Ajouter l'image");