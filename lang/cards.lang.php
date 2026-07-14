<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       CARDS                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Individual card
___('card_release',         'EN', "{{1}} release");
___('card_release',         'FR', "Version {{1}}");
___('card_type',            'EN', "Type");
___('card_type',            'FR', "Type");
___('card_faction',         'EN', "Faction");
___('card_faction',         'FR', "Faction");
___('card_rarity',          'EN', "Rarity");
___('card_rarity',          'FR', "Rareté");
___('card_cost',            'EN', "Cost");
___('card_cost',            'FR', "Coût");
___('card_income',          'EN', "Income");
___('card_income',          'FR', "Revenus");
___('card_weapons',         'EN', "Weapons");
___('card_weapons',         'FR', "Armes");
___('card_durability',      'EN', "Durability");
___('card_durability',      'FR', "Durabilité");
___('card_arsenals_title',  'EN', "Arsenals containing this card");
___('card_arsenals_title',  'FR', "Arsenaux contenant cette carte");
___('card_rulings_title',   'EN', "Rulings applying to this card");
___('card_rulings_title',   'FR', "Jugements s'appliquant à cette carte");
___('card_rulings_body',    'EN', <<<EOD
Rulings are official clarifications on the way ambiguous rules or card texts should be interpreted.
EOD
);
___('card_rulings_body',    'FR', <<<EOD
Les jugements sont des clarifications officielles sur la façon dont une règle ou un texte ambigu doit être interprété.
EOD
);
___('card_rulings_date',    'EN', "Ruling issued on {{1}}");
___('card_rulings_date',    'FR', "Jugement rendu le {{1}}");
___('card_rulings_update',  'EN', "Ruling issued on {{1}}, updated on {{2}}");
___('card_rulings_update',  'FR', "Jugement rendu le {{1}}, mis à jour le {{2}}");
___('card_rulings_situ',    'EN', "Situation");
___('card_rulings_situ',    'FR', "Situation");
___('card_rulings_ruling',  'EN', "Ruling");
___('card_rulings_ruling',  'FR', "Jugement");
___('card_tags_title',      'EN', "Card tags");
___('card_tags_title',      'FR', "Tags de la carte");
___('card_tags_body',       'EN', <<<EOD
Card tags are used to categorize cards with similar characteristics.<br>
Their only role is to make it easier to find specific cards.<br>
Tags have no impact on gameplay.
EOD
);
___('card_tags_body',       'FR', <<<EOD
Les tags sont utilisés pour regrouper les cartes aux caractéristiques similaires.<br>
Ils servent uniquement à faciliter la recherche de cartes.<br>
Les tags n'ont aucun impact sur le déroulement du jeu.
EOD
);


// Card list
___('card_list_title',          'EN', "Card list");
___('card_list_title',          'FR', "Liste des cartes");
___('card_list_body',           'EN', <<<EOD
Below is the full list of cards playable in a game of Future Invaders.<br>
Click on any card to see details, including full descriptions and rulings.
EOD
);
___('card_list_body',           'FR', <<<EOD
Ci-dessous se trouvent toutes les cartes jouables dans une partie de Future Invaders.<br>
Cliquez sur une carte pour voir plus de détails à son sujet, incluant sa description complète et les jugements la concernant.
EOD
);
___('cards_list_search_open',   'EN', "Click here to search for specific cards");
___('cards_list_search_open',   'FR', "Cliquez ici si vous êtes à la recherche de cartes spécifiques");
___('cards_list_search_close',  'EN', "Click here to close the search form");
___('cards_list_search_close',  'FR', "Cliquez ici pour fermer le formulaire de recherche");
___('cards_search_name',        'EN', "Card name");
___('cards_search_name',        'FR', "Nom de la carte");
___('cards_search_body',        'EN', "Card text");
___('cards_search_body',        'FR', "Texte de la carte");
___('cards_search_languages',   'EN', "Search text and title in both languages");
___('cards_search_languages',   'FR', "Rechercher le titre et le texte dans les deux langues");
___('cards_search_submit',      'EN', "Search the cards");
___('cards_search_submit',      'FR', "Chercher parmi les cartes");
___('cards_search_type',        'EN', "Card type");
___('cards_search_type',        'FR', "Type de carte");
___('cards_search_faction',     'EN', "Faction");
___('cards_search_faction',     'FR', "Faction");
___('cards_search_rarity',      'EN', "Card rarity");
___('cards_search_rarity',      'FR', "Rareté de la carte");
___('cards_search_tags',        'EN', "Card tags");
___('cards_search_tags',        'FR', "Tags de la carte");
___('cards_sort',               'EN', "Sort the cards by");
___('cards_sort',               'FR', "Trier les cartes par");
___('cards_sort_name',          'EN', "Name");
___('cards_sort_name',          'FR', "Nom");
___('cards_sort_cost',          'EN', "Cost");
___('cards_sort_cost',          'FR', "Coût");
___('cards_sort_income',        'EN', "Income");
___('cards_sort_income',        'FR', "Revenus");
___('cards_sort_weapons',       'EN', "Weapons");
___('cards_sort_weapons',       'FR', "Armes");
___('cards_sort_durability',    'EN', "Durability");
___('cards_sort_durability',    'FR', "Durabilité");
___('card_list_count',          'EN', "{{1}} card");
___('card_list_count',          'FR', "{{1}} carte");
___('card_list_count+',         'EN', "{{1}} cards");
___('card_list_count+',         'FR', "{{1}} cartes");
___('card_list_count_tags',     'EN', " tagged as <span class=\"italics\">{{1}}</span>");
___('card_list_count_tags',     'FR', " ayant le tag <span class=\"italics\">{{1}}</span>");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     ARSENALS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Individual arsenals
___('arsenal_release',        'EN', "{{1}} release");
___('arsenal_release',        'FR', "Version {{1}}");
___('arsenal_format',         'EN', "Format");
___('arsenal_format',         'FR', "Format");
___('arsenal_factions',       'EN', "Faction");
___('arsenal_factions',       'FR', "Faction");
___('arsenal_factions+',      'EN', "Factions");
___('arsenal_factions+',      'FR', "Factions");
___('arsenal_difficulty',     'EN', "Difficulty");
___('arsenal_difficulty',     'FR', "Difficulté");
___('arsenal_playstyle',      'EN', "Playstyle");
___('arsenal_playstyle',      'FR', "Résumé");
___('arsenal_card_count',     'EN', "Cards");
___('arsenal_card_count',     'FR', "Cartes");
___('arsenal_reserves_count', 'EN', "Reserves");
___('arsenal_reserves_count', 'FR', "Réserves");
___('arsenal_extra',          'EN', "Bonus cards");
___('arsenal_extra',          'FR', "Cartes supplémentaires");
___('arsenal_cards',          'EN', "Arsenal composition");
___('arsenal_cards',          'FR', "Composition de l'arsenal");
___('arsenal_gameplan',       'EN', "Gameplan");
___('arsenal_gameplan',       'FR', "Plan de jeu");
___('arsenal_reserves',       'EN', "Reserves cards");
___('arsenal_reserves',       'FR', "Cartes en réserve");
___('arsenal_reserves_strat', 'EN', "Reserves strategy");
___('arsenal_reserves_strat', 'FR', "Stratégie des réserves");
___('arsenal_tags_title',     'EN', "Arsenal tags");
___('arsenal_tags_title',     'FR', "Tags de l'arsenal");
___('arsenal_tags_body',      'EN', <<<EOD
Arsenal tags are used to categorize arsenals with similar characteristics.<br>
Their only role is to make it easier to find specific arsenals.<br>
Tags have no impact on gameplay.
EOD
);
___('arsenal_tags_body',      'FR', <<<EOD
Les tags sont utilisés pour regrouper les arsenaux aux caractéristiques similaires.<br>
Ils servent uniquement à faciliter la recherche d'arsenaux.<br>
Les tags n'ont aucun impact sur le déroulement du jeu.
EOD
);
___('arsenal_print_title',    'EN', "Print this arsenal");
___('arsenal_print_title',    'FR', "Imprimer cet arsenal");
___('arsenal_print_body_1',   'EN', <<<EOD
Once you have read {{link|tools/print|how to print cards at home}}, you may download and print this arsenal at home:
EOD
);
___('arsenal_print_body_1',   'FR', <<<EOD
Une fois que vous avez pris connaissance du {{link|tools/print|processus d'impression maison}}, vous pouvez télécharger puis imprimer cet arsenal chez vous :
EOD
);
___('arsenal_print_cards',    'EN', "Print all cards in this arsenal");
___('arsenal_print_cards',    'FR', "Imprimer les cartes de cet arsenal");
___('arsenal_print_extra',    'EN', "Extra cards (all arsenals)");
___('arsenal_print_extra',    'FR', "Cartes additionnelles (tous les arsenaux)");


// Arsenal list
___('arsenal_list_title',       'EN', "Arsenal list");
___('arsenal_list_title',       'FR', "Liste des arsenaux");
___('arsenal_list_body',        'EN', <<<EOD
Arsenals are the collections of cards which you use to play a game of Future Invaders. The game comes with some suggested prebuilt arsenals, to give you ideas on how to build your own. Below is a list of these arsenals. Click on an arsenal's cover image to see details, including full descriptions and card lists.
EOD
);
___('arsenal_list_body',        'FR', <<<EOD
Les arsenaux sont les collections de cartes que vous utilisez pour jouer à Future Invaders. Le jeu vient avec des suggestions d'arsenaux déjà assemblés, pour vous donner des idées sur la façon de construire vos propres arsenaux. Vous trouverez ci-dessous une liste de tous ces arsenaux. Cliquez sur l'image de couverture d'un arsenal pour voir ses détails, incluant sa description complète et une liste de ses cartes.
EOD
);
___('arsenal_list_count',       'EN', "{{1}} arsenal");
___('arsenal_list_count',       'FR', "{{1}} arsenal");
___('arsenal_list_count+',      'EN', "{{1}} arsenals");
___('arsenal_list_count+',      'FR', "{{1}} arsenaux");
___('arsenal_list_count_tags',  'EN', " are tagged as <span class=\"italics\">{{1}}</span>");
___('arsenal_list_count_tags',  'FR', " ont le tag <span class=\"italics\">{{1}}</span>");
___('arsenal_list_count_form',  'EN', " are designed for the <span class=\"bold\">{{1}}</span> format");
___('arsenal_list_count_form',  'FR', " sont conçus pour le format <span class=\"bold\">{{1}}</span>");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                      RULINGS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Individual ruling
___('ruling_title',         'EN', "Ruling");
___('ruling_title',         'FR', "Jugement");
___('ruling_body',          'EN', <<<EOD
A ruling is an official clarification on the way an ambiguous rule or card text should be interpreted.
EOD
);
___('ruling_body',          'FR', <<<EOD
Un jugement est une clarification officielle sur la façon dont une règle ou un texte ambigu doit être interprété.
EOD
);
___('ruling_date',          'EN', "Ruling issued on {{1}}");
___('ruling_date',          'FR', "Jugement rendu le {{1}}");
___('ruling_update',        'EN', "Ruling issued on {{1}}, updated on {{2}}");
___('ruling_update',        'FR', "Jugement rendu le {{1}}, mis à jour le {{2}}");
___('ruling_situ',          'EN', "Situation");
___('ruling_situ',          'FR', "Situation");
___('ruling_ruling',        'EN', "Ruling");
___('ruling_ruling',        'FR', "Jugement");
___('ruling_tags',          'EN', "Linked tags");
___('ruling_tags',          'FR', "Tags liés");
___('ruling_tags_body',     'EN', <<<EOD
This ruling applies to all cards with the following tags.<br>
Tags are used to categorize cards with similar characteristics.
EOD
);
___('ruling_tags_body',     'FR', <<<EOD
Ce jugement s'applique à toutes les cartes ayant les tags suivants.<br>
Les tags sont utilisés pour regrouper les cartes aux caractéristiques similaires.
EOD
);
___('ruling_cards',         'EN', "Linked cards");
___('ruling_cards',         'FR', "Cartes liées");
___('ruling_cards_body',    'EN', <<<EOD
This ruling applies to the following cards.
EOD
);
___('ruling_cards_body',    'FR', <<<EOD
Ce jugement s'applique aux cartes suivantes.
EOD
);
___('ruling_cards_summary', 'EN', "{{2}} - {{1}} release");
___('ruling_cards_summary', 'FR', "{{2}} - Version {{1}}");


// Rulings list
___('rulings_list_title',     'EN', "Rulings");
___('rulings_list_title',     'FR', "Jugements");
___('rulings_list_body_1',    'EN', <<<EOD
Rulings are official clarifications on how ambiguous rules or card texts should be interpreted.
EOD
);
___('rulings_list_body_1',    'FR', <<<EOD
Les jugements sont des clarifications officielles sur la manière d'interpréter une règle ou un texte ambigu.
EOD
);
___('rulings_list_body_2',    'EN', <<<EOD
Below is a list of all rulings. Global rulings that apply to the game as a whole appear first, followed by rulings specific to certain cards or card interactions.
EOD
);
___('rulings_list_body_2',    'FR', <<<EOD
Vous trouverez ci-dessous une liste de tous les jugements. Les jugements globaux, qui s'appliquent à l'ensemble du jeu, sont listés en premier, suivis de ceux spécifiques à certaines cartes ou interactions.
EOD
);
___('rulings_list_body_3',    'EN', <<<EOD
You can search the rulings by typing in the search form below then pressing the search button.
EOD
);
___('rulings_list_body_3',    'FR', <<<EOD
Vous pouvez effectuer une recherche parmi les jugements en écrivant dans le formulaire de recherche ci-dessous puis en appuyant sur le bouton de recherche.
EOD
);
___('rulings_list_body_4',    'EN', <<<EOD
If you're looking for a rules clarification but can't find a ruling that answers your question, ask the community on {{link|social/discord|Discord}} or {{link|social/irc|IRC}} for advice. It might even lead to a new ruling!
EOD
);
___('rulings_list_body_4',    'FR', <<<EOD
Si vous recherchez une clarification de règle et ne trouvez pas de jugement correspondant, demandez l'avis de la communauté sur {{link|social/discord|Discord}} ou {{link|social/irc|IRC}}. Un nouveau jugement pourrait être nécessaire !
EOD
);
___('rulings_search_submit',  'EN', "Search rulings");
___('rulings_search_submit',  'FR', "Chercher un jugement");
___('rulings_list_global',    'EN', "Global rulings");
___('rulings_list_global',    'FR', "Jugements globaux");
___('rulings_list_none',      'EN', "No rulings found matching your search");
___('rulings_list_none',      'FR', "Aucun jugement ne correspond à votre recherche");
___('rulings_list_specific',  'EN', "Specific rulings");
___('rulings_list_specific',  'FR', "Jugements spécifiques");
___('ruling_list_applies',    'EN', "This ruling applies to");
___('ruling_list_applies',    'FR', "Ce jugement s'applique à");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       PRINT                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Print cards
___('print_allcards_title',   'EN', "Print cards");
___('print_allcards_title',   'FR', "Imprimer les cartes");
___('print_allcards_body_1',  'EN', <<<EOD
From this page, you can print every legal card in a game of Future Invaders. You have two options: print one copy of each card, or print the maximum legal copies of each card allowed in an arsenal. You can then use these to assemble your own arsenals.
EOD
);
___('print_allcards_body_1',  'FR', <<<EOD
Depuis cette page, vous pouvez imprimer toutes les cartes jouables dans une partie de Future Invaders. Deux options sont disponibles : imprimer un exemplaire de chaque carte, ou imprimer le nombre maximum autorisé de copies de chaque carte dans un arsenal. Vous pourrez ensuite utiliser ces cartes pour composer vos propres arsenaux.
EOD
);
___('print_allcards_body_2',  'EN', <<<EOD
Before printing, ensure you understand {{link|tools/print|how to print cards at home}}. You might also prefer to print {{link|cards/print_arsenals|prebuilt arsenals}} instead of all cards.
EOD
);
___('print_allcards_body_2',  'FR', <<<EOD
Avant d'imprimer, assurez-vous de comprendre {{link|tools/print|le processus d'impression maison}}, et demandez-vous si vous préférez imprimer {{link|cards/print_arsenals|des arsenaux pré-assemblés}} plutôt que toutes les cartes.
EOD
);
___('print_allcards_body_3',  'EN', <<<EOD
Cards are available for printing in both English and French. To change the language, click on the flag icon in the top right corner.
EOD
);
___('print_allcards_body_3',  'FR', <<<EOD
Les cartes sont également imprimables en anglais. Pour changer la langue du site, cliquez sur le drapeau en haut à droite de la page.
EOD
);
___('print_allcards_choice',  'EN', "Choose the cards you want to print");
___('print_allcards_choice',  'FR', "Choisissez les cartes à imprimer");
___('print_allcards_single',  'EN', "One copy of each card in the game");
___('print_allcards_single',  'FR', "Un exemplaire de chaque carte");
___('print_allcards_max',     'EN', "Maximum legal copies of each card");
___('print_allcards_max',     'FR', "Nombre maximum de copies autorisé de chaque carte");


// Print arsenals
___('print_arsenals_title',   'EN', "Print arsenals");
___('print_arsenals_title',   'FR', "Imprimer des arsenaux");
___('print_arsenals_body_1',  'EN', <<<EOD
Arsenals are the collections of cards which you use to play a game of Future Invaders. The game comes with some suggested prebuilt arsenals, to give you ideas on how to build your own. From this page, you can print these arsenals at home. You can have a better look at individual arsenals in the {{link|cards/arsenals|arsenal list}}.
EOD
);
___('print_arsenals_body_1',  'FR', <<<EOD
Les arsenaux sont les collections de cartes que vous utilisez pour jouer à Future Invaders. Le jeu vient avec des suggestions d'arsenaux déjà assemblés, pour vous donner des idées sur la façon de construire vos propres arsenaux. Depuis cette page, vous pouvez imprimer ces arsenaux chez vous. Pour en savoir plus sur les arsenaux, utilisez la {{link|cards/arsenals|liste des arsenaux}}.
EOD
);
___('print_arsenals_body_2',  'EN', <<<EOD
Before printing, ensure you understand {{link|tools/print|how to print cards at home}}.
EOD
);
___('print_arsenals_body_2',  'FR', <<<EOD
Avant d'imprimer, assurez-vous de comprendre {{link|tools/print|le processus d'impression maison}}.
EOD
);
___('print_arsenals_choose',  'EN', "Choose the arsenals you want to print.");
___('print_arsenals_choose',  'FR', "Choisissez les arsenaux à imprimer.");
___('print_arsenals_res',     'EN', "After printing an arsenal, refer to its composition to separate its main cards from its reserve cards.");
___('print_arsenals_res',     'FR', "Après avoir imprimé un arsenal, référez-vous à sa composition pour séparer ses cartes principales de ses réserves.");
___('print_arsenals_all',     'EN', "All arsenals");
___('print_arsenals_all',     'FR', "Tous les arsenaux");
___('print_arsenals_desc',    'EN', "Arsenal description");
___('print_arsenals_desc',    'FR', "Description de l'arsenal");
___('print_aresnals_cards',   'EN', "Main & reserves cards");
___('print_aresnals_cards',   'FR', "Cartes et réserves de l'arsenal");
___('print_arsenals_extra',   'EN', "Extra arsenal cards");
___('print_arsenals_extra',   'FR', "Cartes additionnelles de l'arsenal");


// Print extra cards
___('print_extra_title',      'EN', "Print extra cards");
___('print_extra_title',      'FR', "Imprimer les accessoires");
___('print_extra_body_1',     'EN', <<<EOD
From this page, you can print additional cards for Future Invaders. These cards are optional, but they can enhance your gameplay experience.
EOD
);
___('print_extra_body_1',     'FR', <<<EOD
Depuis cette page, vous pouvez imprimer des cartes accessoires pour Future Invaders. Bien qu'elles ne soient pas nécessaires, elles peuvent enrichir votre expérience de jeu.
EOD
);
___('print_extra_body_2',     'EN', <<<EOD
Before printing, ensure you understand {{link|tools/print|how to print cards at home}}. If you're looking to print the main game cards, separate pages are available for {{link|tools/print|printing all cards}} and {{link|cards/print_arsenals|printing prebuilt arsenals}}.
EOD
);
___('print_extra_body_2',     'FR', <<<EOD
Avant d'imprimer, assurez-vous de comprendre {{link|tools/print|le processus d'impression maison}}. Si vous souhaitez imprimer les cartes de jeu, rendez-vous sur les pages dédiées à {{link|tools/print|imprimer toutes les cartes}} et à {{link|cards/print_arsenals|imprimer des arsenaux pré-assemblés}}.
EOD
);
___('print_extra_trackers',   'EN', "Resource and base durability trackers");
___('print_extra_trackers',   'FR', "Compteurs de ressources et de durabilité");
___('print_extra_rules',      'EN', "Rules of the game");
___('print_extra_rules',      'FR', "Règles du jeu");
___('print_extra_reminders',  'EN', "Abridged rule summaries");
___('print_extra_reminders',  'FR', "Rappels des règles");
___('print_extra_lore',       'EN', "Game backstory");
___('print_extra_lore',       'FR', "Histoire du jeu");