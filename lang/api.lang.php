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
___('api_menu_releases',  'EN', "Releases");
___('api_menu_releases',  'FR', "Versions");


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
___('api_releases_list_summary',  'EN', <<<EOD
Retrieves a list of all past releases, in reverse chronological order.
EOD
);
___('api_releases_list_summary',  'FR', <<<EOD
Récupère une liste de toutes les versions passées, dans l'ordre antéchronologique.
EOD
);