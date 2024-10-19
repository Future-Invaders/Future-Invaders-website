<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                      COMMON                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Menu
___('api',                'EN', "API");
___('api',                'FR', "API");
___('api_menu_title',     'EN', "Future Invaders API");
___('api_menu_title',     'FR', "API Future Invaders");
___('api_menu_intro',     'EN', "Introduction");
___('api_menu_intro',     'FR', "Introduction");
___('api_menu_cards',     'EN', "Cards");
___('api_menu_cards',     'FR', "Cartes");
___('api_menu_releases',  'EN', "Releases");
___('api_menu_releases',  'FR', "Versions");
___('api_menu_factions',  'EN', "Factions");
___('api_menu_factions',  'FR', "Factions");
___('api_menu_images',    'EN', "Images");
___('api_menu_images',    'FR', "Images");
___('api_menu_tags',      'EN', "Tags");
___('api_menu_tags',      'FR', "Tags");


// Technical terms
___('api_parameters',       'EN', "Parameters");
___('api_parameters',       'FR', "Paramètres");
___('api_optional',         'EN', "optional");
___('api_optional',         'FR', "optionnel");
___('api_response_schema',  'EN', "Response schema");
___('api_response_schema',  'FR', "Schéma de la réponse");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       INTRO                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Introduction
___('api_intro_body_1', 'EN', <<<EOD
An API ({{external_popup|https://en.wikipedia.org/wiki/API|Application Programming Interface}}) is a service allowing developers to create their own custom applications which interact with Future Invaders' website.
EOD
);
___('api_intro_body_1', 'FR', <<<EOD
Une API ({{external_popup|https://fr.wikipedia.org/wiki/Interface_de_programmation|Application Programming Interface}}) est un service permettant à des personnes de créer leurs propres logiciels capables d'interagir avec le site Internet de Future Invaders.
EOD
);
___('api_intro_body_2', 'EN', <<<EOD
If you did not already know what an API is, then this part of the website is most likely not for you. It will only be of interest for people who have technical skills.
EOD
);
___('api_intro_body_2', 'FR', <<<EOD
Si vous ne saviez pas déjà ce qu'est une API, cette section du site n'est probablement pas faite pour vous. Elle ne sera pertinente que pour les personnes ayant des compétences techniques.
EOD
);


// Usage and limitations
___('api_intro_usage_title',  'EN', "Usage and limitations");
___('api_intro_usage_title',  'FR', "Utilisation et limites");
___('api_intro_usage_body_1', 'EN', <<<EOD
Every route's URL begins with {{external|{{1}}api/|{{1}}api/}}
EOD
);
___('api_intro_usage_body_1', 'FR', <<<EOD
Les URL de toutes les routes commencent par {{external|{{1}}api/|{{1}}api/}}
EOD
);
___('api_intro_usage_body_2', 'EN', <<<EOD
Documentation for all routes can be found through the dropdown menu at the top of the page.
EOD
);
___('api_intro_usage_body_2', 'FR', <<<EOD
La documentation des routes est accessible via le menu déroulant en haut de la page.
EOD
);
___('api_intro_usage_body_3', 'EN', <<<EOD
The API is read-only: you can use it to fetch data, but not to interact with the website.
EOD
);
___('api_intro_usage_body_3', 'FR', <<<EOD
L'API est en lecture seule : elle permet de récupérer des données, mais pas d'interagir avec le site.
EOD
);
___('api_intro_usage_body_4', 'EN', <<<EOD
Using the API does not require authentication. There are no access restrictions and no rate limiting.
EOD
);
___('api_intro_usage_body_4', 'FR', <<<EOD
Utiliser l'API ne requiert pas d'authentification. Il n'y a aucune restriction d'accès ou de débit.
EOD
);
___('api_intro_usage_body_5', 'EN', <<<EOD
The API is not versioned. This means if a breaking change happens, the previous way of interacting with the API will disappear, and you will need to update your applications accordingly. Although the API is designed so that breaking changes should ideally never need to happen, advance warnings will be given before any future API breaking changes on {{link|pages/social/discord|IRC}} and {{link|pages/social/discord|Discord}}.
EOD
);
___('api_intro_usage_body_5', 'FR', <<<EOD
L'API n'est pas versionnée. Cela signifie que si un changement majeur altère la structure de l'API dans le futur, la manière actuelle d'interagir avec l'API disparaîtra, et vous devrez mettre à jour vos applications en conséquence. Bien que l'API soit conçue de manière à ce que des changements majeurs ne soient pas nécessaires, s'il doit y en avoir, un avertissement sera fait à l'avance sur {{link|pages/social/irc|IRC}} et {{link|pages/social/discord|Discord}}.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       CARDS                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Header
___('api_cards_intro', 'EN', <<<EOD
Only cards used during a game of Future Invaders are accessible through the API. Extra cards, rules cards, lore cards, and so on are not accessible trough the API.
EOD
);
___('api_cards_intro', 'FR', <<<EOD
Seules les cartes jouées lors d'une partie de Future Invaders sont accessibles via l'API. Les cartes supplémentaires, les cartes de règles, les cartes de lore et ainsi de suite ne sont pas accessibles via l'API.
EOD
);


// List cards
___('api_cards_list_summary',  'EN', "Retrieves a list of all cards playable during a game of Future Invaders.");
___('api_cards_list_summary',  'FR', "Récupère la liste de toutes les cartes jouables lors d'une partie de Future Invaders.");
___('api_cards_list_name',     'EN', "Search for cards by name. Searches in all languages at once.");
___('api_cards_list_name',     'FR', "Recherche des cartes par nom. Cherche dans toutes les langues à la fois.");
___('api_cards_list_body',     'EN', "Search in the body text of cards. Searches in all languages at once.");
___('api_cards_list_body',     'FR', "Recherche dans le texte du corps des cartes. Cherche dans toutes les langues à la fois.");
___('api_cards_list_release',  'EN', "Search for cards by release UUID. Find release UUIDs using {{link|api/doc/releases#list_releases|GET /api/releases}}.");
___('api_cards_list_release',  'FR', "Recherche des cartes par UUID de version. Trouvez les UUIDs des versions en utilisant {{link|api/doc/releases#list_releases|GET /api/releases}}.");
___('api_cards_list_faction',  'EN', "Search for cards by faction UUID. Find faction UUIDs using {{link|api/doc/factions#list_factions|GET /api/factions}}.");
___('api_cards_list_faction',  'FR', "Recherche des cartes par UUID de faction. Trouvez les UUIDs des factions en utilisant {{link|api/doc/factions#list_factions|GET /api/factions}}.");
___('api_cards_list_type',     'EN', "Search for cards by card type UUID. Find card type UUIDs using {{link|api/doc/cards#list_card_types|GET /api/card_types}}.");
___('api_cards_list_type',     'FR', "Recherche des cartes par UUID de type de carte. Trouvez les UUIDs des types de cartes en utilisant {{link|api/doc/cards#list_card_types|GET /api/card_types}}.");
___('api_cards_list_rarity',   'EN', "Search for cards by card rarity UUID. Find card rarity UUIDs using {{link|api/doc/cards#list_card_rarities|GET /api/card_rarities}}.");
___('api_cards_list_rarity',   'FR', "Recherche des cartes par UUID de rareté de carte. Trouvez les UUIDs des raretés de cartes en utilisant {{link|api/doc/cards#list_card_rarities|GET /api/card_rarities}}.");
___('api_cards_list_tag',      'EN', "Search for cards with a specific tag.");
___('api_cards_list_tag',      'FR', "Recherche des cartes avec un tag spécifique.");


// Get card
___('api_cards_get_summary',   'EN', "Retrieves a card by its UUID.");
___('api_cards_get_summary',   'FR', "Récupère une carte par son UUID.");
___('api_cards_get_uuid',      'EN', "The UUID of the card to retrieve.");
___('api_cards_get_uuid',      'FR', "L'UUID de la carte à récupérer.");


// List card types
___('api_card_types_list_summary',  'EN', "Retrieves a list of all card types.");
___('api_card_types_list_summary',  'FR', "Récupère la liste de tous les types de cartes.");


// List card rarities
___('api_card_rarities_list_summary',  'EN', "Retrieves a list of all card rarities. They determine the maximum number of copies of a single card which you can include in an arsenal.");
___('api_card_rarities_list_summary',  'FR', "Récupère la liste de toutes les raretés de cartes. Elles déterminent le nombre maximum de copies d'une même carte que vous pouvez inclure dans un arsenal.");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     RELEASES                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Header
___('api_releases_intro', 'EN', <<<EOD
Releases are completed versions of Future Invaders. There might be multiple versions of some content (such as cards), each tied to a separate release.
EOD
);
___('api_releases_intro', 'FR', <<<EOD
Les versions de Future Invaders portent le nom "releases". Il peut y avoir plusieurs versions de certains contenus (comme les cartes), chacune liée à une "release" distincte.
EOD
);


// List releases
___('api_releases_list_summary',  'EN', "Retrieves a list of all releases, in reverse chronological order.");
___('api_releases_list_summary',  'FR', "Récupère la liste de toutes les versions, dans l'ordre antéchronologique.");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FACTIONS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Header
___('api_factions_intro', 'EN', <<<EOD
Future Invaders has a limited number of factions. Each card belongs to a specific faction.
EOD
);
___('api_factions_intro', 'FR', <<<EOD
Future Invaders a un nombre limité de factions. Chaque carte appartient à une faction spécifique.
EOD
);


// List factions
___('api_factions_list_summary',  'EN', "Retrieves a list of all factions.");
___('api_factions_list_summary',  'FR', "Récupère la liste de toutes les factions.");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                      IMAGES                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Header
___('api_images_intro', 'EN', <<<EOD
The images retrieved by the API are full cards, not individual art pieces.
EOD
);
___('api_images_intro', 'FR', <<<EOD
Les images accessibles via l'API sont pas des illustrations, ce sont des cartes complètes.
EOD
);


// List images
___('api_images_list_summary',  'EN', "Retrieves a list of all images.");
___('api_images_list_summary',  'FR', "Récupère la liste de toutes les images.");
___('api_images_list_name',     'EN', "Search for images by name.");
___('api_images_list_name',     'FR', "Recherche des images par nom.");
___('api_images_list_language', 'EN', "Search for images by ISO-639-1 language code (eg. 'en', 'fr').");
___('api_images_list_language', 'FR', "Recherche des images par code de langue ISO-639-1 (par ex. 'en', 'fr').");
___('api_images_list_artist',   'EN', "Search for images by artist name.");
___('api_images_list_artist',   'FR', "Recherche des images par nom d'artiste.");
___('api_images_list_tag',      'EN', "Search for images with a specific tag.");
___('api_images_list_tag',      'FR', "Recherche des images avec un tag spécifique.");


// Get image
___('api_images_get_summary', 'EN', "Retrieves an image by its UUID.");
___('api_images_get_summary', 'FR', "Récupère une image par son UUID.");
___('api_images_get_uuid',    'EN', "The UUID of the image to retrieve.");
___('api_images_get_uuid',    'FR', "L'UUID de l'image à récupérer.");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       TAGS                                                        */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Header
___('api_tags_intro', 'EN', <<<EOD
Some of the contents of the game are tagged. These tags have various uses depending on the element being tagged. They enable specific searches, for example to find all the cards that are tagged with a specific keyword or game action.
EOD
);
___('api_tags_intro', 'FR', <<<EOD
Certains des contenus du jeu sont taggués. Ces tags ont diverses utilisations en fonction de l'élément taggué. Ils permettent des recherches spécifiques, par exemple pour trouver toutes les cartes tagguées avec une certaine mot-clé ou action de jeu.
EOD
);


// List tags
___('api_tags_list_summary',  'EN', "Retrieves a list of all tags.");
___('api_tags_list_summary',  'FR', "Récupère la liste de tous les tags.");
___('api_tags_list_type',     'EN', "Search for tags of a specific type ('Card', 'Image', etc.)");
___('api_tags_list_type',     'FR', "Recherche les tags d'un type spécifique ('Carte', 'Image', etc.)");
___('api_tags_list_name',     'EN', "Search for tags by name.");
___('api_tags_list_name',     'FR', "Recherche des tags par nom.");
___('api_tags_list_desc',     'EN', "Search the description of tags, in all languages.");
___('api_tags_list_desc',     'FR', "Recherche dans la description des tags, dans toutes les langues.");


// Get tag
___('api_tags_get_summary',   'EN', "Retrieves a tag by its UUID.");
___('api_tags_get_summary',   'FR', "Récupère un tag par son UUID.");
___('api_tags_get_uuid',      'EN', "The UUID of the tag to retrieve.");
___('api_tags_get_uuid',      'FR', "L'UUID du tag à récupérer.");