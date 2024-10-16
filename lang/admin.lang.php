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
/*                                                       CARDS                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Card list
___('admin_card_list_name',       'EN', "Name");
___('admin_card_list_name',       'FR', "Nom");
___('admin_card_list_count',      'EN', "{{1}} card");
___('admin_card_list_count',      'FR', "{{1}} carte");
___('admin_card_list_count+',     'EN', "{{1}} cards");
___('admin_card_list_count+',     'FR', "{{1}} cartes");


// Add a card
___('admin_card_add_title',       'EN', "Add a card");
___('admin_card_add_title',       'FR', "Ajouter une carte");
___('admin_card_add_release',     'EN', "Release");
___('admin_card_add_release',     'FR', "Version");
___('admin_card_add_image_en',    'EN', "Image (English)");
___('admin_card_add_image_en',    'FR', "Image (Anglais)");
___('admin_card_add_image_fr',    'EN', "Image (French)");
___('admin_card_add_image_fr',    'FR', "Image (Français)");
___('admin_card_add_name_en',     'EN', "Name (English)");
___('admin_card_add_name_en',     'FR', "Nom (Anglais)");
___('admin_card_add_name_fr',     'EN', "Name (French)");
___('admin_card_add_name_fr',     'FR', "Nom (Français)");
___('admin_card_add_type',        'EN', "Type");
___('admin_card_add_type',        'FR', "Type");
___('admin_card_add_faction',     'EN', "Faction");
___('admin_card_add_faction',     'FR', "Faction");
___('admin_card_add_rarity',      'EN', "Rarity");
___('admin_card_add_rarity',      'FR', "Rareté");
___('admin_card_add_properties',  'EN', "Properties");
___('admin_card_add_properties',  'FR', "Propriétés");
___('admin_card_add_extra',       'EN', "Extra card (rules, tools, etc.)");
___('admin_card_add_extra',       'FR', "Carte supplémentaire (règles, outils, etc.)");
___('admin_card_add_hidden',      'EN', "Hidden from the public");
___('admin_card_add_hidden',      'FR', "Cachée du public");
___('admin_card_add_cost',        'EN', "Cost");
___('admin_card_add_cost',        'FR', "Coût");
___('admin_card_add_income',      'EN', "Income");
___('admin_card_add_income',      'FR', "Revenu");
___('admin_card_add_weapons',     'EN', "Weapons");
___('admin_card_add_weapons',     'FR', "Armes");
___('admin_card_add_durability',  'EN', "Durability");
___('admin_card_add_durability',  'FR', "Durabilité");
___('admin_card_add_body_en',     'EN', "Card text (English)");
___('admin_card_add_body_en',     'FR', "Texte de la carte (Anglais)");
___('admin_card_add_body_fr',     'EN', "Card text (French)");
___('admin_card_add_body_fr',     'FR', "Texte de la carte (Français)");
___('admin_card_add_tags',        'EN', "Tags");
___('admin_card_add_tags',        'FR', "Tags");
___('admin_card_add_submit',      'EN', "Add card");
___('admin_card_add_submit',      'FR', "Ajouter la carte");


// Card management
___('admin_card_management',          'EN', "Card management");
___('admin_card_management',          'FR', "Gestion des cartes");
___('admin_card_management_types',    'EN', "Card types");
___('admin_card_management_types',    'FR', "Types de cartes");
___('admin_card_management_rarities', 'EN', "Card rarities");
___('admin_card_management_rarities', 'FR', "Raretés de cartes");


// Card types list
___('admin_card_type_list_name',    'EN', "Name");
___('admin_card_type_list_name',    'FR', "Nom");
___('admin_card_type_list_count',   'EN', "{{1}} card type");
___('admin_card_type_list_count',   'FR', "{{1}} type de carte");
___('admin_card_type_list_count+',  'EN', "{{1}} card types");
___('admin_card_type_list_count+',  'FR', "{{1}} types de cartes");


// Add a card type
___('admin_card_type_add_title',    'EN', "Add a card type");
___('admin_card_type_add_title',    'FR', "Ajouter un type de carte");
___('admin_card_type_add_name_en',  'EN', "Name (English)");
___('admin_card_type_add_name_en',  'FR', "Nom (Anglais)");
___('admin_card_type_add_name_fr',  'EN', "Name (French)");
___('admin_card_type_add_name_fr',  'FR', "Nom (Français)");
___('admin_card_type_add_submit',   'EN', "Add card type");
___('admin_card_type_add_submit',   'FR', "Ajouter le type de carte");


// Edit a card type
___('admin_card_type_edit_title',   'EN', "Edit card type");
___('admin_card_type_edit_title',   'FR', "Modifier un type de carte");
___('admin_card_type_edit_submit',  'EN', "Edit card type");
___('admin_card_type_edit_submit',  'FR', "Modifier le type de carte");


// Delete a card type
___('admin_card_type_delete_confirm', 'EN', "Confirm the deletion of this card type");
___('admin_card_type_delete_confirm', 'FR', "Confirmez la suppression de ce type de carte");


// Card rarities list
___('admin_card_rarity_list_name',    'EN', "Name");
___('admin_card_rarity_list_name',    'FR', "Nom");
___('admin_card_rarity_list_max',     'EN', "Max count");
___('admin_card_rarity_list_max',     'FR', "Nombre max");
___('admin_card_rarity_list_count',   'EN', "{{1}} rarity");
___('admin_card_rarity_list_count',   'FR', "{{1}} rareté");
___('admin_card_rarity_list_count+',  'EN', "{{1}} rarities");
___('admin_card_rarity_list_count+',  'FR', "{{1}} raretés");


// Add a card rarity
___('admin_card_rarity_add_title',      'EN', "Add a rarity");
___('admin_card_rarity_add_title',      'FR', "Ajouter une rareté");
___('admin_card_rarity_add_name_en',    'EN', "Name (English)");
___('admin_card_rarity_add_name_en',    'FR', "Nom (Anglais)");
___('admin_card_rarity_add_name_fr',    'EN', "Name (French)");
___('admin_card_rarity_add_name_fr',    'FR', "Nom (Français)");
___('admin_card_rarity_add_max_count',  'EN', "Max count per arsenal");
___('admin_card_rarity_add_max_count',  'FR', "Maximum par arsenal");
___('admin_card_rarity_add_submit',     'EN', "Add rarity");
___('admin_card_rarity_add_submit',     'FR', "Ajouter la rareté");


// Edit a card rarity
___('admin_card_rarity_edit_title',     'EN', "Edit rarity");
___('admin_card_rarity_edit_title',     'FR', "Modifier une rareté");
___('admin_card_rarity_edit_submit',    'EN', "Edit rarity");
___('admin_card_rarity_edit_submit',    'FR', "Modifier la rareté");


// Delete a card rarity
___('admin_card_rarity_delete_confirm', 'EN', "Confirm the deletion of this rarity");
___('admin_card_rarity_delete_confirm', 'FR', "Confirmez la suppression de cette rareté");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                      IMAGES                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Uncategorized images
___('admin_uncategorized_images_title', 'EN', "Uncategorized images");
___('admin_uncategorized_images_title', 'FR', "Images non catégorisées");


// Image list
___('admin_image_list_path',      'EN', "Path");
___('admin_image_list_path',      'FR', "Chemin");
___('admin_image_list_name',      'EN', "Name");
___('admin_image_list_name',      'FR', "Nom");
___('admin_image_list_language',  'EN', "Lang");
___('admin_image_list_language',  'FR', "Lang");
___('admin_image_list_artist',    'EN', "Artist");
___('admin_image_list_artist',    'FR', "Artiste");
___('admin_image_list_tags',      'EN', "Tags");
___('admin_image_list_tags',      'FR', "Tags");
___('admin_image_list_count',     'EN', "{{1}} image");
___('admin_image_list_count',     'FR', "{{1}} image");
___('admin_image_list_count+',    'EN', "{{1}} images");
___('admin_image_list_count+',    'FR', "{{1}} images");
___('admin_images_nolang',        'EN', "None");
___('admin_images_nolang',        'FR', "Aucune");


// Add an image
___('admin_image_name_title', 'EN', "Add image");
___('admin_image_name_title', 'FR', "Ajouter l'image");
___('admin_image_name',       'EN', "Image name");
___('admin_image_name',       'FR', "Nom de l'image");
___('admin_image_language',   'EN', "Language (ISO 639-1: 'en', 'fr', etc.)");
___('admin_image_language',   'FR', "Langue (ISO 639-1 : 'en', 'fr', etc.)");
___('admin_image_artist',     'EN', "Artist");
___('admin_image_artist',     'FR', "Artiste");
___('admin_image_tags',       'EN', "Tags");
___('admin_image_tags',       'FR', "Tags");
___('admin_image_add_submit', 'EN', "Add image");
___('admin_image_add_submit', 'FR', "Ajouter l'image");


// Edit an image
___('admin_image_edit_title',   'EN', "Edit image {{1}}");
___('admin_image_edit_title',   'FR', "Modifier l'image {{1}}");
___('admin_image_edit_submit',  'EN', "Edit image");
___('admin_image_edit_submit',  'FR', "Modifier l'image");


// Delete an image
___('admin_image_delete_confirm', 'EN', "Confirm the deletion of this image");
___('admin_image_delete_confirm', 'FR', "Confirmez la suppression de cette image");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       TAGS                                                        */
/*                                                                                                                   */
/*********************************************************************************************************************/

// List tags
___('admin_tag_list_type',    'EN', "Type");
___('admin_tag_list_type',    'FR', "Type");
___('admin_tag_list_name',    'EN', "Name");
___('admin_tag_list_name',    'FR', "Nom");
___('admin_tag_list_desc',    'EN', "Description");
___('admin_tag_list_desc',    'FR', "Description");
___('admin_tag_list_count',   'EN', "{{1}} tag");
___('admin_tag_list_count',   'FR', "{{1}} tag");
___('admin_tag_list_count+',  'EN', "{{1}} tags");
___('admin_tag_list_count+',  'FR', "{{1}} tags");


// Add a tag
___('admin_tag_add_title',    'EN', "Add a tag");
___('admin_tag_add_title',    'FR', "Ajouter un tag");
___('admin_tag_add_type',     'EN', "Tag type");
___('admin_tag_add_type',     'FR', "Type de tag");
___('admin_tag_add_name',     'EN', "Tag name");
___('admin_tag_add_name',     'FR', "Nom du tag");
___('admin_tag_add_desc_en',  'EN', "Description (English)");
___('admin_tag_add_desc_en',  'FR', "Description (Anglais)");
___('admin_tag_add_desc_fr',  'EN', "Description (French)");
___('admin_tag_add_desc_fr',  'FR', "Description (Français)");
___('admin_tag_add_submit',   'EN', "Add tag");
___('admin_tag_add_submit',   'FR', "Ajouter le tag");


// Edit a tag
___('admin_tag_edit_title',   'EN', "Edit tag");
___('admin_tag_edit_title',   'FR', "Modifier un tag");
___('admin_tag_edit_submit',  'EN', "Edit tag");
___('admin_tag_edit_submit',  'FR', "Modifier le tag");


// Delete a tag
___('admin_tag_delete_confirm', 'EN', "Confirm the deletion of this tag");
___('admin_tag_delete_confirm', 'FR', "Confirmez la suppression de ce tag");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     RELEASES                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Release list
___('admin_release_list_date',    'EN', "Date");
___('admin_release_list_date',    'FR', "Date");
___('admin_release_list_name',    'EN', "Release");
___('admin_release_list_name',    'FR', "Version");
___('admin_release_list_count',   'EN', "{{1}} release");
___('admin_release_list_count',   'FR', "{{1}} version");
___('admin_release_list_count+',  'EN', "{{1}} releases");
___('admin_release_list_count+',  'FR', "{{1}} versions");


// Add a release
___('admin_release_add_title',    'EN', "New release");
___('admin_release_add_title',    'FR', "Nouvelle version");
___('admin_release_add_name_en',  'EN', "Name (English)");
___('admin_release_add_name_en',  'FR', "Nom (Anglais)");
___('admin_release_add_name_fr',  'EN', "Name (French)");
___('admin_release_add_name_fr',  'FR', "Nom (Français)");
___('admin_release_add_date',     'EN', "Date (YYYY-MM-DD)");
___('admin_release_add_date',     'FR', "Date (AAAA-MM-JJ)");
___('admin_release_add_submit',   'EN', "Add release");
___('admin_release_add_submit',   'FR', "Ajouter la version");


// Edit a release
___('admin_release_edit_title',   'EN', "Edit release");
___('admin_release_edit_title',   'FR', "Modifier la version");
___('admin_release_edit_submit',  'EN', "Edit release");
___('admin_release_edit_submit',  'FR', "Modifier la version");


// Delete a release
___('admin_release_delete_confirm', 'EN', "Confirm the deletion of this release");
___('admin_release_delete_confirm', 'FR', "Confirmez la suppression de cette version");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FACTIONS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Factions list
___('admin_faction_list_order',   'EN', "Order");
___('admin_faction_list_order',   'FR', "Ordre");
___('admin_faction_list_name',    'EN', "Name");
___('admin_faction_list_name',    'FR', "Nom");
___('admin_faction_list_count',   'EN', "{{1}} faction");
___('admin_faction_list_count',   'FR', "{{1}} faction");
___('admin_faction_list_count+',  'EN', "{{1}} factions");
___('admin_faction_list_count+',  'FR', "{{1}} factions");


// Add a faction
___('admin_faction_add_title',          'EN', "Add faction");
___('admin_faction_add_title',          'FR', "Ajouter une faction");
___('admin_faction_add_sorting_order',  'EN', "Sorting order");
___('admin_faction_add_sorting_order',  'FR', "Ordre de tri");
___('admin_faction_add_name_en',        'EN', "Name (English)");
___('admin_faction_add_name_en',        'FR', "Nom (Anglais)");
___('admin_faction_add_name_fr',        'EN', "Name (French)");
___('admin_faction_add_name_fr',        'FR', "Nom (Français)");
___('admin_faction_add_submit',         'EN', "Add faction");
___('admin_faction_add_submit',         'FR', "Ajouter une faction");


// Edit a faction
___('admin_faction_edit_title',   'EN', "Edit faction");
___('admin_faction_edit_title',   'FR', "Modifier une faction");
___('admin_faction_edit_submit',  'EN', "Edit faction");
___('admin_faction_edit_submit',  'FR', "Modifier une faction");


// Delete a faction
___('admin_faction_delete_confirm', 'EN', "Confirm the deletion of this faction");
___('admin_faction_delete_confirm', 'FR', "Confirmez la suppression de cette faction");