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
Once you have read {{link|pages/tools/print|how to print cards at home}}, you may download and print this arsenal at home:
EOD
);
___('arsenal_print_body_1',   'FR', <<<EOD
Une fois que vous avez pris connaissance du {{link|pages/tools/print|processus d'impression maison}}, vous pouvez télécharger puis imprimer cet arsenal chez vous :
EOD
);
___('arsenal_print_cards',    'EN', "Main & reserves cards");
___('arsenal_print_cards',    'FR', "Cartes et réserves de l'arsenal");
___('arsenal_print_extra',    'EN', "Extra arsenal cards");
___('arsenal_print_extra',    'FR', "Cartes additionnelles");


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
If you're looking for a rules clarification but can't find a ruling that answers your question, ask the community on {{link|404|Discord}} or {{link|404|IRC}} for advice. It might even lead to a new ruling!
EOD
);
___('rulings_list_body_4',    'FR', <<<EOD
Si vous recherchez une clarification de règle et ne trouvez pas de jugement correspondant, demandez l'avis de la communauté sur {{link|404|Discord}} ou {{link|404|IRC}}. Un nouveau jugement pourrait être nécessaire !
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
/*                                                      FORMATS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Game formats list
___('formats_title',    'EN', "Game formats");
___('formats_title',    'FR', "Formats de jeu");
___('formats_body',     'EN', <<<EOD
Future Invaders can be played in a variety of ways, each of which is known as a format. Below is a list of "official" formats. They are just suggestions, feel free to create your own unique formats and share them with the community!
EOD
);
___('formats_body',     'FR', <<<EOD
Future Invaders peut se jouer de différentes manières. Chaque façon de jouer au jeu est appelée un format. Vous trouverez ci-dessous une liste de formats « officiels ». Ce ne sont que des suggestions : n'hésitez pas à inventer vos propres formats de jeux originaux et à les partager avec la communauté !
EOD
);
___('formats_arsenals', 'EN', "{{link|pages/game/arsenals?format={{2}}|Click here}} for a list of prebuilt arsenals for {{1}} games.");
___('formats_arsenals', 'FR', "{{link|pages/game/arsenals?format={{2}}|Cliquez ici}} pour accéder à une liste d'arsenaux pour le format {{1}}.");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       RULES                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// How to play
___('rules_title',  'EN', "How to play Future Invaders");
___('rules_title',  'FR', "Comment jouer à Future Invaders");
___('rules_toc',    'EN', "Table of contents");
___('rules_toc',    'FR', "Sommaire");
___('rules_body_1', 'EN', <<<EOD
First, you'll need to get a copy of the game. Since Future Invaders isn't published yet, the only way to get it is by {{link|pages/tools/print_cards|downloading the cards}} from this website and {{link|pages/tools/print|printing them yourself}}.
EOD
);
___('rules_body_1', 'FR', <<<EOD
Tout d'abord, vous devez obtenir une copie du jeu. Pour l'instant, Future Invaders n'a pas encore d'éditeur, la seule façon d'en avoir une copie est de {{link|pages/tools/print_cards|télécharger les cartes}} depuis ce site et de les {{link|pages/tools/print|imprimer vous-même}}.
EOD
);
___('rules_body_2', 'EN', <<<EOD
To learn how to play, you can read the rules below. While Future Invaders might seem complex at first, its rules are actually simpler than many other card-battling games. Don't be intimidated, jump into it!
EOD
);
___('rules_body_2', 'FR', <<<EOD
Ensuite, vous pouvez apprendre à jouer à Future Invaders en lisant les règles ci-dessous. Comparé à la plupart des autres jeux de cartes stratégiques, les règles de Future Invaders sont simples. Ne vous laissez pas intimider par la complexité apparente, essayez-le !
EOD
);
___('rules_body_3', 'EN', <<<EOD
At the bottom of the page, you'll find {{link|pages/game/rules#reminders|reminder cards}} that summarize the rules, including a step-by-step guide to a turn's structure. The website also includes a {{link|pages/game/vocabulary|glossary}} of terms used in the game.
EOD
);
___('rules_body_3', 'FR', <<<EOD
En bas de la page, après les règles, des {{link|pages/game/rules#reminders|cartes de rappel}} résument les règles de manière plus concise, incluant un guide étape par étape de la structure d'un tour. Le site contient également un {{link|pages/game/vocabulary|glossaire}} des termes utilisés dans le jeu.
EOD
);
___('rules_body_4', 'EN', <<<EOD
Rules and reminders are on cards, allowing you to {{link|pages/tools/print_extra|print them at home}}.
EOD
);
___('rules_body_4', 'FR', <<<EOD
Les règles et rappels sont présentés sous forme de cartes, ce qui vous permet de les {{link|pages/tools/print_extra|imprimer chez vous}}.
EOD
);


// Rules cards
___('rules_cards_title', 'EN', "Game rules");
___('rules_cards_title', 'FR', "Règles du jeu");


// Reminder cards
___('reminder_cards_title', 'EN', "Rule reminders");
___('reminder_cards_title', 'FR', "Rappels des règles");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    VOCABULARY                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Intro
___('vocabulary_title',   'EN', "Glossary");
___('vocabulary_title',   'FR', "Glossaire");
___('vocabulary_body_1',  'EN', <<<EOD
This page lists terms commonly used in the game.
EOD
);
___('vocabulary_body_1',  'FR', <<<EOD
Cette page liste les termes les plus utilisés dans le jeu.
EOD
);
___('vocabulary_body_2',  'EN', <<<EOD
This glossary is not part of the {{link|pages/rules/rules|official rules of the game}}, and should therefore not be considered a substitute for them. If anything written in a {{link|pages/rules/rules|rule}} or {{link|404|ruling}} directly contradicts this glossary, then you should refer to the rule or ruling instead as the source of truth.
EOD
);
___('vocabulary_body_2',  'FR', <<<EOD
Ce glossaire ne fait pas partie des {{link|pages/rules/rules|règles officielles du jeu}}. Si une information issue de ce glossaire contredit une {{link|pages/rules/rules|règle}} ou un {{link|404|jugement}} officiel, c'est la règle ou le jugement qui fait office de source de vérité.
EOD
);


// Action
___('vocabulary_action_title',  'EN', "Action");
___('vocabulary_action_title',  'FR', "Action");
___('vocabulary_action_body_1', 'EN', <<<EOD
One of the four possible card types.
EOD
);
___('vocabulary_action_body_2', 'EN', <<<EOD
Has a one-time use effect and is then placed at the bottom of its owner's arsenal.
EOD
);
___('vocabulary_action_body_3', 'EN', <<<EOD
Can be used at any time, even during other players' turns.
EOD
);
___('vocabulary_action_body_4', 'EN', <<<EOD
You can recycle cards from your scrap pile to help pay the cost of an action.
EOD
);
___('vocabulary_action_body_5', 'EN', <<<EOD
Actions take over priority: they pause the game and must be resolved before play can resume. If multiple actions are initiated simultaneously, the player with priority resolves their action first.
EOD
);
___('vocabulary_action_body_6', 'EN', <<<EOD
You cannot play actions in response to other actions or reactions. You must wait for them to resolve before playing your own action.
EOD
);
___('vocabulary_action_body_1', 'FR', <<<EOD
Un des quatre types de cartes.
EOD
);
___('vocabulary_action_body_2', 'FR', <<<EOD
Une carte Action a un effet unique, puis est placée en dessous de l'arsenal de son propriétaire.
EOD
);
___('vocabulary_action_body_3', 'FR', <<<EOD
Une action peut être utilisée à tout moment, même pendant le tour des autres joueurs.
EOD
);
___('vocabulary_action_body_4', 'FR', <<<EOD
Vous pouvez recycler des cartes depuis votre casse pour aider à payer le coût d'une action.
EOD
);
___('vocabulary_action_body_5', 'FR', <<<EOD
Les actions sont prioritaires : elles mettent le jeu en pause, et leur effet doit être résolu avant que le jeu puisse reprendre. Lorsque plusieurs joueurs utilisent des actions en même temps, le joueur ayant la priorité résout son action en premier.
EOD
);
___('vocabulary_action_body_6', 'FR', <<<EOD
Vous ne pouvez pas jouer une action en réponse à d'autres actions ou réactions. Vous devez attendre leur résolution avant de jouer la vôtre.
EOD
);


// Arsenal
___('vocabulary_arsenal_title',   'EN', "Arsenal");
___('vocabulary_arsenal_title',   'FR', "Arsenal");
___('vocabulary_arsenal_body_1',  'EN', <<<EOD
A player's deck of cards.
EOD
);
___('vocabulary_arsenal_body_2',  'EN', <<<EOD
Players shuffle their arsenals at the start of each game and keep them next to them, facing down.
EOD
);
___('vocabulary_arsenal_body_3',  'EN', <<<EOD
Each arsenal must contain at least 30 cards, with no more than two copies of any card, and only one copy of any rare card (Pinnacle or Supreme).
EOD
);
___('vocabulary_arsenal_body_4',  'EN', <<<EOD
If you need to draw a card but your arsenal is empty, you lose the game.
EOD
);
___('vocabulary_arsenal_body_1',  'FR', <<<EOD
Le paquet de cartes d'un joueur pendant une partie.
EOD
);
___('vocabulary_arsenal_body_2',  'FR', <<<EOD
Chaque joueur mélange son arsenal au début de la partie et le conserve à ses côtés, face cachée.
EOD
);
___('vocabulary_arsenal_body_3',  'FR', <<<EOD
Chaque arsenal doit contenir au minimum 30 cartes, avec un maximum de deux copies de chaque carte unique, sauf pour les cartes rares (Prestigieuses ou Suprêmes), dont une seule copie est autorisée.
EOD
);
___('vocabulary_arsenal_body_4',  'FR', <<<EOD
Si vous devez piocher une carte mais que votre arsenal est vide, vous perdez la partie.
EOD
);


// Attack
___('vocabulary_attack_title',  'EN', "Attack");
___('vocabulary_attack_title',  'FR', "Attaque");
___('vocabulary_attack_body_1', 'EN', <<<EOD
Each deployed ship must attack once during its owner's turn.
EOD
);
___('vocabulary_attack_body_2', 'EN', <<<EOD
When a ship attacks, it causes a durability loss equal to its weapons to whatever it faces on the grid (an enemy ship, structure, or base).
EOD
);
___('vocabulary_attack_body_3', 'EN', <<<EOD
Attacked ships, structures, and bases do not retaliate. They simply take the damage.
EOD
);
___('vocabulary_attack_body_1', 'FR', <<<EOD
Chaque vaisseau déployé doit attaquer une fois pendant le tour de son propriétaire.
EOD
);
___('vocabulary_attack_body_2', 'FR', <<<EOD
Lorsqu'un vaisseau attaque, il inflige une perte de durabilité égale à sa valeur d'armes à ce qui lui fait face sur la grille de jeu (un vaisseau, une structure ou une base ennemie).
EOD
);
___('vocabulary_attack_body_3', 'FR', <<<EOD
Les vaisseaux, structures, et bases attaqués ne ripostent pas. Ils subissent simplement la perte de durabilité.
EOD
);


// Base
___('vocabulary_base_title',  'EN', "Base");
___('vocabulary_base_title',  'FR', "Base");
___('vocabulary_base_body_1', 'EN', <<<EOD
A player's health pool.
EOD
);
___('vocabulary_base_body_2', 'EN', <<<EOD
Each player's base starts with 30 durability points and cannot be repaired above 30 durability.
EOD
);
___('vocabulary_base_body_3', 'EN', <<<EOD
When a base's durability reaches zero or below, it is destroyed, eliminating its owner from the game. The last remaining base's owner wins the game.
EOD
);
___('vocabulary_base_body_1', 'FR', <<<EOD
Les points de vie d'un joueur.
EOD
);
___('vocabulary_base_body_2', 'FR', <<<EOD
La base de chaque joueur commence avec 30 points de durabilité, et ne peut pas être réparée au-delà de 30 durabilité.
EOD
);
___('vocabulary_base_body_3', 'FR', <<<EOD
Lorsque la durabilité d'une base tombe à zéro ou moins, elle est détruite, éliminant son propriétaire de la partie. Le dernier joueur dont la base survit remporte la partie.
EOD
);


// Combat
___('vocabulary_combat_title',  'EN', "Combat");
___('vocabulary_combat_title',  'FR', "Combat");
___('vocabulary_combat_body_1', 'EN', <<<EOD
Combat occurs once per turn. During combat, all your deployed ships must attack in front of them one by one. You choose the order in which your ships attack.
EOD
);
___('vocabulary_combat_body_2', 'EN', <<<EOD
In the first turn of a new game, no combat occurs, except for the last player who takes their first turn.
EOD
);
___('vocabulary_combat_body_1', 'FR', <<<EOD
La phase de combat a lieu une fois par tour. Pendant cette phase, chacun de vos vaisseaux déployés doit attaquer devant lui. Vous choisissez l'ordre dans lequel vos vaisseaux attaquent.
EOD
);
___('vocabulary_combat_body_2', 'FR', <<<EOD
Lors du premier tour d'une nouvelle partie, il n'y a pas de combat, sauf pour le dernier joueur à jouer son tour..
EOD
);


// Cost
___('vocabulary_cost_title',  'EN', "Cost");
___('vocabulary_cost_title',  'FR', "Coût");
___('vocabulary_cost_body_1', 'EN', <<<EOD
Most cards have a resource cost specified in the top left corner, indicating how many resources must be spent to use or deploy that card.
EOD
);
___('vocabulary_cost_body_2', 'EN', <<<EOD
Each faction only accepts its own resources, except for Neutral costs, which can be paid using resources from any faction.
EOD
);
___('vocabulary_cost_body_3', 'EN', <<<EOD
Some cards have no resource cost and can be used or deployed for free.
EOD
);
___('vocabulary_cost_body_1', 'FR', <<<EOD
La plupart des cartes ont un coût en ressources, indiqué dans le coin supérieur gauche. Ce coût indique combien de ressources doivent être dépensées pour utiliser ou déployer la carte.
EOD
);
___('vocabulary_cost_body_2', 'FR', <<<EOD
Chaque faction n'accepte que ses propres ressources, sauf pour les coûts Neutres, qui peuvent être payés avec les ressources de n'importe quelle faction.
EOD
);
___('vocabulary_cost_body_3', 'FR', <<<EOD
Certaines cartes n'ont pas de coût en ressources. Elles peuvent être utilisées ou déployées gratuitement.
EOD
);


// Deploy
___('vocabulary_deploy_title',  'EN', "Deploy");
___('vocabulary_deploy_title',  'FR', "Déployer");
___('vocabulary_deploy_body_1', 'EN', <<<EOD
Pay the cost of a ship or structure, then place it on your side of the game grid.
EOD
);
___('vocabulary_deploy_body_2', 'EN', <<<EOD
The effects listed in the descriptions of ships and structures only only after deployment and last until they are destroyed.
EOD
);
___('vocabulary_deploy_body_1', 'FR', <<<EOD
Payer le coût d'un vaisseau ou d'une structure, puis le placer sur votre grille de jeu.
EOD
);
___('vocabulary_deploy_body_2', 'FR', <<<EOD
Les effets indiqués sur les cartes de vaisseaux et de structures n'agissent qu'à partir du moment où la carte est déployée, et durent jusqu'à leur destruction.
EOD
);


// Destroy
___('vocabulary_destroy_title',   'EN', "Destroy");
___('vocabulary_destroy_title',   'FR', "Détruire");
___('vocabulary_destroy_body_1',  'EN', <<<EOD
A ship or structure is destroyed when its durability reaches zero or below.
EOD
);
___('vocabulary_destroy_body_2',  'EN', <<<EOD
Destroyed ships and structures go to the top of their owner's scrap pile, unless they provide no income, in which case they go to the bottom of their arsenal.
EOD
);
___('vocabulary_destroy_body_1',  'FR', <<<EOD
Un vaisseau ou une structure est détruit lorsque sa durabilité tombe à zéro ou moins.
EOD
);
___('vocabulary_destroy_body_2',  'FR', <<<EOD
Les vaisseaux et structures détruits sont placés au-dessus de la casse de leur propriétaire, sauf s'ils ne rapportent pas de revenus, auquel cas ils sont placés en dessous de leur arsenal.
EOD
);


// Draw
___('vocabulary_draw_title',  'EN', "Draw");
___('vocabulary_draw_title',  'FR', "Piocher");
___('vocabulary_draw_body_1', 'EN', <<<EOD
Draw a card by placing the top card of your arsenal into your hand.
EOD
);
___('vocabulary_draw_body_2', 'EN', <<<EOD
If you must draw a card but have no cards left in your arsenal, you lose the game.
EOD
);
___('vocabulary_draw_body_1', 'FR', <<<EOD
Prendre la carte du dessus de votre arsenal et la placer dans votre main.
EOD
);
___('vocabulary_draw_body_2', 'FR', <<<EOD
Si vous devez piocher alors que votre arsenal est vide, vous perdez la partie.
EOD
);


// Durability
___('vocabulary_durability_title',  'EN', "Durability");
___('vocabulary_durability_title',  'FR', "Durabilité");
___('vocabulary_durability_body_1', 'EN', <<<EOD
The health pool of a ship, structure, or base.
EOD
);
___('vocabulary_durability_body_2', 'EN', <<<EOD
Ships and structures are deployed with the durability amount specified in the bottom right corner of their cards.
EOD
);
___('vocabulary_durability_body_3', 'EN', <<<EOD
Track durability losses using dice or counters. Once a ship, structure, or base's durability drops to zero or below, it is destroyed.
EOD
);
___('vocabulary_durability_body_4', 'EN', <<<EOD
Ship and structure durability cannot be repaired above the amount specified on the card. Base durability cannot be repaired above its initial value of 30.
EOD
);
___('vocabulary_durability_body_1', 'FR', <<<EOD
Les points de vie d'un vaisseau, d'une structure, ou d'une base.
EOD
);
___('vocabulary_durability_body_2', 'FR', <<<EOD
Les vaisseaux et structures sont déployés avec la durabilité indiquée dans le coin inférieur droit de leur carte.
EOD
);
___('vocabulary_durability_body_3', 'FR', <<<EOD
Les pertes de durabilité sont suivies en utilisant des dés ou des compteurs. Une fois sa durabilité réduite à zéro ou moins, le vaisseau, la structure ou la base est détruit.
EOD
);
___('vocabulary_durability_body_4', 'FR', <<<EOD
La durabilité des vaisseaux et structures ne peut pas être réparée au-delà de la valeur indiquée sur la carte. La durabilité d'une base ne peut pas excéder sa valeur initiale de 30.
EOD
);


// Effect
___('vocabulary_effect_title',  'EN', "Effect");
___('vocabulary_effect_title',  'FR', "Effet");
___('vocabulary_effect_body_1', 'EN', <<<EOD
An effect refers to anything triggered by a card.
EOD
);
___('vocabulary_effect_body_2', 'EN', <<<EOD
It can include actions, reactions, or any other elements specified in the card's body text.
EOD
);
___('vocabulary_effect_body_1', 'FR', <<<EOD
Un effet désigne tout ce qui est déclenché par une carte.
EOD
);
___('vocabulary_effect_body_2', 'FR', <<<EOD
Il peut s'agir d'une action, d'une réaction, ou de toute autre interaction décrite dans le texte de la carte.
EOD
);


// Faction
___('vocabulary_faction_title',   'EN', "Faction");
___('vocabulary_faction_title',   'FR', "Faction");
___('vocabulary_faction_body_1',  'EN', <<<EOD
Card families sharing a common resource type, design identity, and visual style.
EOD
);
___('vocabulary_faction_body_2',  'EN', <<<EOD
There are four main factions: Terran, Invader, Organic, and Pirate, along with a fifth Neutral faction.
EOD
);
___('vocabulary_faction_body_1',  'FR', <<<EOD
Famille de cartes partageant un type de ressource, une identité visuelle et un design en commun.
EOD
);
___('vocabulary_faction_body_2',  'FR', <<<EOD
Il existe quatre factions principales : Terriens, Envahisseurs, Organiques, et Pirates, ainsi qu'une cinquième faction, les Neutres.
EOD
);


// Failure
___('vocabulary_failure_title',   'EN', "Failure");
___('vocabulary_failure_title',   'FR', "Échec");
___('vocabulary_failure_body_1',  'EN', <<<EOD
When an effect or deployment fails, it is denied and does not happen.
EOD
);
___('vocabulary_failure_body_2',  'EN', <<<EOD
Resources spent on the failed effect or deployment are permanently lost.
EOD
);
___('vocabulary_failure_body_3',  'EN', <<<EOD
If a ship or structure fails to deploy, it is neither destroyed nor sent to your scrap pile. Instead, it goes straight to the bottom of your arsenal.
EOD
);
___('vocabulary_failure_body_1',  'FR', <<<EOD
Lorsqu'un effet ou un déploiement échoue, il n'a pas lieu.
EOD
);
___('vocabulary_failure_body_2',  'FR', <<<EOD
Les ressources dépensées sur cet effet ou ce déploiement sont définitivement perdues.
EOD
);
___('vocabulary_failure_body_3',  'FR', <<<EOD
Si le déploiement d'un vaisseau ou d'une structure échoue, il n'est ni détruit ni envoyé à la casse. Il est placé en dessous de votre arsenal.
EOD
);


// Format
___('vocabulary_format_title',  'EN', "Format");
___('vocabulary_format_title',  'FR', "Format");
___('vocabulary_format_body_1', 'EN', <<<EOD
A specific way to play the game.
EOD
);
___('vocabulary_format_body_2', 'EN', <<<EOD
The default format is prepared games, in which arsenals are assembled in advance.
EOD
);
___('vocabulary_format_body_3', 'EN', <<<EOD
A common alternate format is architect, where all players draft cards from the same common pool of cards, build their own arsenals, then play a game with their selection of cards.
EOD
);
___('vocabulary_format_body_1', 'FR', <<<EOD
Une façon spécifique de jouer au jeu.
EOD
);
___('vocabulary_format_body_2', 'FR', <<<EOD
Le format par défaut est la partie préparée, où les arsenaux sont assemblés à l'avance.
EOD
);
___('vocabulary_format_body_3', 'FR', <<<EOD
Un format alternatif courant est le format architecte, dans lequel les joueurs choisissent leurs cartes dans une réserve commune, puis les utilisent pour construire leurs arsenaux et jouer.
EOD
);


// Grid
___('vocabulary_grid_title',  'EN', "Grid");
___('vocabulary_grid_title',  'FR', "Grille");
___('vocabulary_grid_body_1', 'EN', <<<EOD
The game area where ships and structures are deployed.
EOD
);
___('vocabulary_grid_body_2', 'EN', <<<EOD
Each player has a 4x2 grid in front of them. The back row accommodates four structures, while the front row holds four ships.
EOD
);
___('vocabulary_grid_body_3', 'EN', <<<EOD
In a duel, both players' grids face each other.
EOD
);
___('vocabulary_grid_body_4', 'EN', <<<EOD
In matches with more than two players, each player's grid is split in the middle into two 2x2 halves, with the left half facing the nearest player's half-grid on the left and the right half facing the nearest player's half-grid on the right. These half-grids adjust as players are eliminated from the game, until only two players remain, at which point their grids fuse back into 4x2 grids facing each other.
EOD
);
___('vocabulary_grid_body_1', 'FR', <<<EOD
La zone de jeu où sont déployés les vaisseaux et structures.
EOD
);
___('vocabulary_grid_body_2', 'FR', <<<EOD
Chaque joueur dispose d'une grille 4x2. La rangée arrière contient quatre structures, et la rangée avant quatre vaisseaux.
EOD
);
___('vocabulary_grid_body_3', 'FR', <<<EOD
En duel, les grilles des deux joueurs se font face.
EOD
);
___('vocabulary_grid_body_4', 'FR', <<<EOD
Dans les parties à plus de deux joueurs, chaque grille est divisée en deux moitiés de 2x2. La moitié gauche fait face au joueur à gauche, et la moitié droite au joueur à droite. Ces demi-grilles s'ajustent à mesure que les joueurs sont éliminés, jusqu'à ce qu'il ne reste plus que deux joueurs, auquel cas vos moitiés de grilles fusionnent pour redevenir une grille 4x2 face à celle de l'adversaire restant.
EOD
);


// Hand
___('vocabulary_hand_title',  'EN', "Hand");
___('vocabulary_hand_title',  'FR', "Main");
___('vocabulary_hand_body_1', 'EN', <<<EOD
Cards you draw throughout the game are placed in your hand.
EOD
);
___('vocabulary_hand_body_2', 'EN', <<<EOD
The cards in your hand are the only ones you may use or deploy during the game.
EOD
);
___('vocabulary_hand_body_3', 'EN', <<<EOD
Keep the cards in your hand hidden from your opponents.
EOD
);
___('vocabulary_hand_body_4', 'EN', <<<EOD
There is no maximum hand size.
EOD
);
___('vocabulary_hand_body_1', 'FR', <<<EOD
Les cartes que vous piochez au cours de la partie sont placées dans votre main.
EOD
);
___('vocabulary_hand_body_2', 'FR', <<<EOD
Seules les cartes dans votre main peuvent être utilisées ou déployées.
EOD
);
___('vocabulary_hand_body_3', 'FR', <<<EOD
Cachez votre main autant que possible des adversaires.
EOD
);
___('vocabulary_hand_body_4', 'FR', <<<EOD
Il n'y a pas de taille maximale pour la main.
EOD
);


// Income
___('vocabulary_income_title',  'EN', "Income");
___('vocabulary_income_title',  'FR', "Revenus");
___('vocabulary_income_body_1', 'EN', <<<EOD
Some ships and structures have an income, specified in the top right corner of their cards.
EOD
);
___('vocabulary_income_body_2', 'EN', <<<EOD
Once deployed, these ships and structures generate income at the beginning of each of your turns.
EOD
);
___('vocabulary_income_body_3', 'EN', <<<EOD
Ships and structures without an income value do not generate resources.
EOD
);
___('vocabulary_income_body_1', 'FR', <<<EOD
Certains vaisseaux et structures produisent un revenu, indiqué en haut à droite de leur carte.
EOD
);
___('vocabulary_income_body_2', 'FR', <<<EOD
Une fois déployés, ces vaisseaux et structures génèrent leurs revenus en ressources au début de chacun de vos tours.
EOD
);
___('vocabulary_income_body_3', 'FR', <<<EOD
Les vaisseaux et structures sans revenu indiqué sur leur carte ne génèrent pas de ressources.
EOD
);


// Pinnacle
___('vocabulary_pinnacle_title',  'EN', "Pinnacle");
___('vocabulary_pinnacle_title',  'FR', "Suprême");
___('vocabulary_pinnacle_body_1', 'EN', <<<EOD
One of two card rarities.
EOD
);
___('vocabulary_pinnacle_body_2', 'EN', <<<EOD
Pinnacle cards are the most powerful in the game, but come with a high cost and always have a drawback.
EOD
);
___('vocabulary_pinnacle_body_3', 'EN', <<<EOD
You may only have one copy of any unique pinnacle card in your arsenal.
EOD
);
___('vocabulary_pinnacle_body_1', 'FR', <<<EOD
Un de deux types de cartes rares.
EOD
);
___('vocabulary_pinnacle_body_2', 'FR', <<<EOD
Les cartes Suprêmes sont les plus puissantes du jeu, mais leur coût est élevé et elles présentent toujours un désavantage.
EOD
);
___('vocabulary_pinnacle_body_3', 'FR', <<<EOD
Vous ne pouvez avoir au maximum qu'un seul exemplaire de chaque carte Suprême dans votre arsenal.
EOD
);


// Player
___('vocabulary_player_title',  'EN', "Player");
___('vocabulary_player_title',  'FR', "Joueur");
___('vocabulary_player_body_1', 'EN', <<<EOD
Anyone participating in a game of Future Invaders whose base has not been destroyed.
EOD
);
___('vocabulary_player_body_2', 'EN', <<<EOD
There is no upper limit to the number of players in a game.
EOD
);
___('vocabulary_player_body_1', 'FR', <<<EOD
Toute personne participant à une partie de Future Invaders dont la base n'a pas encore été détruite.
EOD
);
___('vocabulary_player_body_2', 'FR', <<<EOD
Il n'y a pas de limite supérieure au nombre de joueurs pouvant participer à une partie.
EOD
);


// Priority
___('vocabulary_priority_title',  'EN', "Priority");
___('vocabulary_priority_title',  'FR', "Priorité");
___('vocabulary_priority_body_1', 'EN', <<<EOD
When multiple players wish to play actions or reactions simultaneously, priority determines the order in which these actions or reactions are played.
EOD
);
___('vocabulary_priority_body_2', 'EN', <<<EOD
Priority is first given to the next player in turn order, then continues around the table until it reaches the player who last played their turn, with the ongoing player going last.
EOD
);
___('vocabulary_priority_body_1', 'FR', <<<EOD
Lorsque plusieurs joueurs souhaitent utiliser une action ou une réaction en même temps, la priorité détermine l'ordre d'exécution.
EOD
);
___('vocabulary_priority_body_2', 'FR', <<<EOD
La priorité va d'abord au prochain joueur dans l'ordre du tour, continue autour de la table jusqu'au dernier joueur à avoir joué son tour, et enfin le joueur dont le tour est en cours passe en dernier.
EOD
);


// Rarity
___('vocabulary_rarity_title',  'EN', "Rarity");
___('vocabulary_rarity_title',  'FR', "Rareté");
___('vocabulary_rarity_body_1', 'EN', <<<EOD
Some cards are labeled as rare, indicated by the presence of the word Renowned or Pinnacle at the bottom of the card.
EOD
);
___('vocabulary_rarity_body_2', 'EN', <<<EOD
Rare cards have a higher power level for their cost. To balance this, you may only have one copy of any unique rare card in your arsenal.
EOD
);
___('vocabulary_rarity_body_1', 'FR', <<<EOD
Certaines cartes sont rares, reconnaissables au mot Renommé ou Suprême en bas de la carte.
EOD
);
___('vocabulary_rarity_body_2', 'FR', <<<EOD
Les cartes rares offrent plus de puissance pour leur coût. Pour équilibrer cet avantage, un maximum d'un seul exemplaire de chaque carte rare est autorisé dans un arsenal.
EOD
);


// Reaction
___('vocabulary_reaction_title',  'EN', "Reaction");
___('vocabulary_reaction_title',  'FR', "Réaction");
___('vocabulary_reaction_body_1', 'EN', <<<EOD
One of four possible card types.
EOD
);
___('vocabulary_reaction_body_2', 'EN', <<<EOD
Has a one-time use effect and is then placed at the bottom of its owner's arsenal.
EOD
);
___('vocabulary_reaction_body_3', 'EN', <<<EOD
Can only be used in response to specific events, which are specified in the reaction's description.
EOD
);
___('vocabulary_reaction_body_4', 'EN', <<<EOD
You may recycle cards from your scrap pile to help pay the cost of a reaction.
EOD
);
___('vocabulary_reaction_body_5', 'EN', <<<EOD
Reactions take over priority: they pause the game and must be resolved before play can resume.
EOD
);
___('vocabulary_reaction_body_6', 'EN', <<<EOD
Chains of reactions can occur, resolving one by one in reverse order, starting with the last reaction played until reaching the initiating event.
EOD
);
___('vocabulary_reaction_body_7', 'EN', <<<EOD
If multiple reactions are played at the same time, the player with priority plays their reaction. Other players may react to that reaction, but not to the event the player with priority was responding to.
EOD
);
___('vocabulary_reaction_body_1', 'FR', <<<EOD
Un des quatre types de cartes.
EOD
);
___('vocabulary_reaction_body_2', 'FR', <<<EOD
Une carte Réaction produit un effet unique, puis est placée en dessous de l'arsenal de son propriétaire.
EOD
);
___('vocabulary_reaction_body_3', 'FR', <<<EOD
Les réactions ne peuvent être utilisées qu'en réponse à des événements précis, indiqués dans leur description.
EOD
);
___('vocabulary_reaction_body_4', 'FR', <<<EOD
Vous pouvez recycler des cartes depuis votre casse pour aider à payer le coût d'une réaction.
EOD
);
___('vocabulary_reaction_body_5', 'FR', <<<EOD
Les réactions prennent la priorité et interrompent le jeu jusqu'à ce que leur effet soit résolu.
EOD
);
___('vocabulary_reaction_body_6', 'FR', <<<EOD
Des chaînes de réactions peuvent se produire, qui sont résolues de la dernière réaction jouée jusqu'à l'événement déclencheur de la chaîne.
EOD
);
___('vocabulary_reaction_body_7', 'FR', <<<EOD
Si plusieurs joueurs jouent des réactions simultanément, le joueur prioritaire résout sa réaction en premier. Les autres joueurs peuvent ensuite réagir à cette réaction, mais pas à l'événement initial.
EOD
);


// Recycle
___('vocabulary_recycle_title',   'EN', "Recycle");
___('vocabulary_recycle_title',   'FR', "Recycler");
___('vocabulary_recycle_body_1',  'EN', <<<EOD
Take a card from your scrap pile and place it at the bottom of your arsenal.
EOD
);
___('vocabulary_recycle_body_2',  'EN', <<<EOD
When you recycle a card, you earn resources equal to the card's income value, located at the top right of the card.
EOD
);
___('vocabulary_recycle_body_3',  'EN', <<<EOD
You may recycle a card at any time, even during other players' turns. Cards can be recycled as part of an action or a reaction to help pay its cost.
EOD
);
___('vocabulary_recycle_body_1',  'FR', <<<EOD
Prendre une carte de votre casse et la placer en dessous de votre arsenal.
EOD
);
___('vocabulary_recycle_body_2',  'FR', <<<EOD
Recycler une carte vous rapporte autant de ressources que ses revenus, indiqués en haut à droite de la carte.
EOD
);
___('vocabulary_recycle_body_3',  'FR', <<<EOD
Vous pouvez recycler des cartes à tout moment, même pendant le tour d'un autre joueur. Les cartes recyclées peuvent être utilisées pour couvrir le coût d'une action ou d'une réaction.
EOD
);


// Renowned
___('vocabulary_renowned_title',  'EN', "Renowned");
___('vocabulary_renowned_title',  'FR', "Renommé");
___('vocabulary_renowned_body_1', 'EN', <<<EOD
One of two card rarities.
EOD
);
___('vocabulary_renowned_body_2', 'EN', <<<EOD
Renowned cards are more powerful than regular cards, but you may only have one copy of any unique renowned card in your arsenal.
EOD
);
___('vocabulary_renowned_body_1', 'FR', <<<EOD
Un de deux types de cartes rares.
EOD
);
___('vocabulary_renowned_body_2', 'FR', <<<EOD
Les cartes renommées sont plus puissantes pour leur coût que les cartes normales, mais pour compenser vous ne pouvez avoir au maximum qu'un seul exemplaire de chaque carte renommée dans votre arsenal.
EOD
);


// Replace
___('vocabulary_replace_title',   'EN', "Replace");
___('vocabulary_replace_title',   'FR', "Remplacer");
___('vocabulary_replace_body_1',  'EN', <<<EOD
Deploy a ship or a structure in a grid slot already occupied by another deployed ship or structure.
EOD
);
___('vocabulary_replace_body_2',  'EN', <<<EOD
The replaced ship or structure is not destroyed and does not go to your scrap pile. Instead, it is sent to the bottom of your arsenal.
EOD
);
___('vocabulary_replace_body_1',  'FR', <<<EOD
Déployer un vaisseau ou une structure dans un emplacement de votre grille déjà occupé par un autre vaisseau ou structure.
EOD
);
___('vocabulary_replace_body_2',  'FR', <<<EOD
La carte remplacée n'est ni détruite ni placée dans la casse. Elle va directement en dessous de votre arsenal.
EOD
);


// Resource
___('vocabulary_resource_title',  'EN', "Resource");
___('vocabulary_resource_title',  'FR', "Ressource");
___('vocabulary_resource_body_1', 'EN', <<<EOD
Currency required to use or deploy cards.
EOD
);
___('vocabulary_resource_body_2', 'EN', <<<EOD
Each of the four main factions produces and uses its own unique resource. Neutrals also produce their own resource, but their card costs can be paid using any resource.
EOD
);
___('vocabulary_resource_body_3', 'EN', <<<EOD
At the start of each of your turns, your resources reset to zero, then each of your deployed ships and structures adds their income value to your resource pool, indicated at the top right of each card.
EOD
);
___('vocabulary_resource_body_4', 'EN', <<<EOD
You retain resources until the start of your next turn, allowing you to spend them on actions and reactions during your opponents' turns.
EOD
);
___('vocabulary_resource_body_1', 'FR', <<<EOD
Monnaie requise pour utiliser ou déployer des cartes.
EOD
);
___('vocabulary_resource_body_2', 'FR', <<<EOD
Chacune des quatre factions principales produit et utilise sa propre ressource. Les Neutres produisent également leur propre ressource, mais le coût de leurs cartes peut être payé avec n'importe quelle ressource.
EOD
);
___('vocabulary_resource_body_3', 'FR', <<<EOD
Au début de chacun de vos tours, vos ressources sont remises à zéro, puis chaque vaisseau et structure déployé ajoute ses revenus à votre réserve de ressources (indiqué en haut à droite de chaque carte).
EOD
);
___('vocabulary_resource_body_4', 'FR', <<<EOD
Vous conservez vos ressources jusqu'au début de votre prochain tour, ce qui permet de les utiliser pour des actions et réactions pendant le tour de vos adversaires.
EOD
);


// Remove
___('vocabulary_remove_title',  'EN', "Remove");
___('vocabulary_remove_title',  'FR', "Retirer");
___('vocabulary_remove_body_1', 'EN', <<<EOD
Permanently exclude a card from the game.
EOD
);
___('vocabulary_remove_body_2', 'EN', <<<EOD
Once removed, a card is set aside and cannot be used or interacted with until the game ends.
EOD
);
___('vocabulary_remove_body_3', 'EN', <<<EOD
Such irreversible removal is rare and expensive.
EOD
);
___('vocabulary_remove_body_1', 'FR', <<<EOD
Exclure définitivement du jeu une carte.
EOD
);
___('vocabulary_remove_body_2', 'FR', <<<EOD
Une carte retirée est mise de côté et ne peut plus être utilisée ou déployée pour le reste de la partie.
EOD
);
___('vocabulary_remove_body_3', 'FR', <<<EOD
Ce type d'exclusion du jeu est rare et coûteux.
EOD
);


// Reveal
___('vocabulary_reveal_title',  'EN', "Reveal");
___('vocabulary_reveal_title',  'FR', "Révéler");
___('vocabulary_reveal_body_1', 'EN', <<<EOD
Show a card to all your opponents.
EOD
);
___('vocabulary_reveal_body_1', 'FR', <<<EOD
Montrer une carte à tous vos adversaires.
EOD
);


// Scrap pile
___('vocabulary_scrap_pile_title',  'EN', "Scrap pile");
___('vocabulary_scrap_pile_title',  'FR', "Casse");
___('vocabulary_scrap_pile_body_1', 'EN', <<<EOD
A pile of face-up cards, which is empty at the start of a new game.
EOD
);
___('vocabulary_scrap_pile_body_2', 'EN', <<<EOD
When one of your ships or structures is destroyed, if it has an income value, it goes into your scrap pile. Otherwise, it is sent to the bottom of your arsenal.
EOD
);
___('vocabulary_scrap_pile_body_3', 'EN', <<<EOD
Cards in your scrap pile can be recycled at any time of your choosing, earning you resources equal to the card's income value, as indicated at the top right of the card. Once recycled, the card is sent to the bottom of your arsenal.
EOD
);
___('vocabulary_scrap_pile_body_1', 'FR', <<<EOD
Une pile de cartes face visible, qui est vide au début d'une nouvelle partie.
EOD
);
___('vocabulary_scrap_pile_body_2', 'FR', <<<EOD
Lorsqu'un de vos vaisseaux ou structures est détruit, s'il génère un revenu, il est mis dans votre casse. Sinon, il va directement en dessous de votre arsenal.
EOD
);
___('vocabulary_scrap_pile_body_3', 'FR', <<<EOD
Les cartes dans votre casse peuvent être recyclées à tout moment, vous rapportant autant de ressources que le revenu de la carte recyclée, indiqué en haut à droite de la carte. Une fois recyclée, la carte est placée en dessous de votre arsenal.
EOD
);


// Ship
___('vocabulary_ship_title',  'EN', "Ship");
___('vocabulary_ship_title',  'FR', "Vaisseau");
___('vocabulary_ship_body_1', 'EN', <<<EOD
One of four possible card types.
EOD
);
___('vocabulary_ship_body_2', 'EN', <<<EOD
Once you pay their cost, ships are deployed on your side of the grid in the row closest to your opponents and in a slot of your choosing.
EOD
);
___('vocabulary_ship_body_3', 'EN', <<<EOD
Ships can only be deployed during your turn, after drawing cards and before combat.
EOD
);
___('vocabulary_ship_body_4', 'EN', <<<EOD
During combat on your turns, each of your ships must attack once in front of them. You choose in which order your ships attack.
EOD
);
___('vocabulary_ship_body_5', 'EN', <<<EOD
When a ship's durability drops to zero or below, it is destroyed. Destroyed ships are sent to your scrap pile, unless they provide no income, in which case they cannot be recycled and go to the bottom of your arsenal.
EOD
);
___('vocabulary_ship_body_1', 'FR', <<<EOD
Un des quatre types de cartes.
EOD
);
___('vocabulary_ship_body_2', 'FR', <<<EOD
Une fois son coût payé, un vaisseau est déployé de votre côté de la grille, dans la rangée la plus proche de vos adversaires, dans un emplacement de votre choix.
EOD
);
___('vocabulary_ship_body_3', 'FR', <<<EOD
Les vaisseaux ne peuvent être déployés que pendant votre tour, après la phase de pioche et avant le combat.
EOD
);
___('vocabulary_ship_body_4', 'FR', <<<EOD
À chaque tour, pendant la phase de combat, chaque vaisseau déployé doit attaquer une fois en face de lui. Vous choisissez l'ordre dans lequel vos vaisseaux attaquent.
EOD
);
___('vocabulary_ship_body_5', 'FR', <<<EOD
Lorsque la durabilité d'un vaisseau tombe à zéro ou moins, il est détruit. Les vaisseaux détruits sont envoyés à la casse, sauf s'ils ne génèrent pas de revenus, auquel cas ils vont directement en dessous de votre arsenal.
EOD
);


// Structure
___('vocabulary_structure_title',   'EN', "Structure");
___('vocabulary_structure_title',   'FR', "Structure");
___('vocabulary_structure_body_1',  'EN', <<<EOD
One of four possible card types.
EOD
);
___('vocabulary_structure_body_2',  'EN', <<<EOD
Once you pay their cost, structures are deployed on your side of the grid in the row closest to you and in a slot of your choosing.
EOD
);
___('vocabulary_structure_body_3',  'EN', <<<EOD
Structures can only be deployed during your turn, after drawing cards and before combat.
EOD
);
___('vocabulary_structure_body_4',  'EN', <<<EOD
Structures do not attack during combat.
EOD
);
___('vocabulary_structure_body_5',  'EN', <<<EOD
When a structure's durability drops to zero or below, it is destroyed. Destroyed structure are sent to your scrap pile, unless they provide no income, in which case they cannot be recycled and go to the bottom of your arsenal.
EOD
);
___('vocabulary_structure_body_1',  'FR', <<<EOD
Un des quatre types de cartes.
EOD
);
___('vocabulary_structure_body_2',  'FR', <<<EOD
Une fois son coût payé, une structure est déployée de votre côté de la grille, dans la rangée la plus proche de vous, dans un emplacement de votre choix.
EOD
);
___('vocabulary_structure_body_3',  'FR', <<<EOD
Les structures ne peuvent être déployées que pendant votre tour, après la phase de pioche et avant le combat.
EOD
);
___('vocabulary_structure_body_4',  'FR', <<<EOD
Les structures n'attaquent pas pendant le combat.
EOD
);
___('vocabulary_structure_body_5',  'FR', <<<EOD
Lorsque la durabilité d'une structure tombe à zéro ou moins, elle est détruite. Les structures détruites sont envoyées à la casse, sauf si elles ne génèrent pas de revenus, auquel cas elles vont directement en dessous de votre arsenal.
EOD
);


// Target
___('vocabulary_target_title',  'EN', "Target");
___('vocabulary_target_title',  'FR', "Cible");
___('vocabulary_target_body_1', 'EN', <<<EOD
Some effects ask you to select which card or player they affect.
EOD
);
___('vocabulary_target_body_2', 'EN', <<<EOD
The selected card or player is that effect's target.
EOD
);
___('vocabulary_target_body_1', 'FR', <<<EOD
Certains effets vous demandent de choisir quelle carte ou quel joueur ils affectent.
EOD
);
___('vocabulary_target_body_2', 'FR', <<<EOD
La carte ou le joueur choisi est la cible de cet effet.
EOD
);


// Turn
___('vocabulary_turn_title',  'EN', "Turn");
___('vocabulary_turn_title',  'FR', "Tour");
___('vocabulary_turn_body_1', 'EN', <<<EOD
Players take turns playing the game, one at a time.
EOD
);
___('vocabulary_turn_body_2', 'EN', <<<EOD
During your opponents' turns, you may only play actions and reactions.
EOD
);
___('vocabulary_turn_body_1', 'FR', <<<EOD
Les joueurs jouent chacun leur tour, de manière séquentielle.
EOD
);
___('vocabulary_turn_body_2', 'FR', <<<EOD
Pendant les tours de vos adversaires, vous ne pouvez jouer que des actions et des réactions.
EOD
);


// Type
___('vocabulary_type_title',  'EN', "Type");
___('vocabulary_type_title',  'FR', "Type");
___('vocabulary_type_body_1', 'EN', <<<EOD
There are four card types: Ship, Structure, Action, and Reaction.
EOD
);
___('vocabulary_type_body_1', 'FR', <<<EOD
Il existe quatre types de cartes : Vaisseau, Structure, Action et Réaction.
EOD
);


// Weapons
___('vocabulary_weapons_title',   'EN', "Weapons");
___('vocabulary_weapons_title',   'FR', "Armes");
___('vocabulary_weapons_body_1',  'EN', <<<EOD
A ship's damage value, located at the bottom left of its card.
EOD
);
___('vocabulary_weapons_body_2',  'EN', <<<EOD
When a ship attacks, it inflicts durability losses equal to its weapons value on the ship, structure, or base directly in front of it.
EOD
);
___('vocabulary_weapons_body_3',  'EN', <<<EOD
Some ships have no weapons. They do attack, but cause no durability losses.
EOD
);
___('vocabulary_weapons_body_1',  'FR', <<<EOD
Les dégâts qu'un vaisseau inflige, indiqués dans le coin inférieur gauche de sa carte.
EOD
);
___('vocabulary_weapons_body_2',  'FR', <<<EOD
Lorsqu'un vaisseau attaque, il inflige des pertes de durabilité égales au montant de ses armes au vaisseau, à la structure, ou à la base en face de lui.
EOD
);
___('vocabulary_weapons_body_3',  'FR', <<<EOD
Certains vaisseaux n'ont pas d'armes. Ils attaquent, mais ne causent pas de pertes de durabilité.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       LORE                                                        */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Lore
___('lore_title', 'EN', "The world of Future Invaders");
___('lore_title', 'FR', "L'univers de Future Invaders");
___('lore_body_1', 'EN', <<<EOD
Future Invaders takes place in a future Solar System at war, where four factions battle for supremacy: Humans, Invaders, Organics, and Pirates.
EOD
);
___('lore_body_1', 'FR', <<<EOD
Future Invaders se déroule dans un futur où quatre factions s'affrontent dans le système solaire : les Humains, les Envahisseurs, les Organiques et les Pirates.
EOD
);
___('lore_body_2', 'EN', <<<EOD
The worldbuilding is explored through the various cards played during a game, which offer glimpses of the ships, structures, technologies, and cultures of each faction.
EOD
);
___('lore_body_2', 'FR', <<<EOD
L'univers du jeu s'explore en jouant des cartes, qui offrent un aperçu des vaisseaux, des structures, des technologies et des cultures de chaque faction.
EOD
);
___('lore_body_3', 'EN', <<<EOD
The game's background story is presented through lore cards. These cards can be {{link|pages/tools/print_extra|printed at home}}.
EOD
);
___('lore_body_3', 'FR', <<<EOD
L'histoire du jeu est introduite par des cartes de lore. Vous pouvez les {{link|pages/tools/print_extra|imprimer chez vous}}.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    STRATEGIES                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Intro
___('strategy_title',  'EN', "Strategies");
___('strategy_title',  'FR', "Stratégies");
___('strategy_body_1', 'EN', <<<EOD
When playing a game of Future Invaders, the winner is decided by a combination of three factors: arsenal building, arsenal piloting, and luck.
EOD
);
___('strategy_body_1', 'FR', <<<EOD
Lorsque vous jouez à Future Invaders, le gagnant d'une partie est déterminé par une combinaison de trois facteurs : la construction des arsenaux, le pilotage des arsenaux, et la chance.
EOD
);
___('strategy_body_2', 'EN', <<<EOD
While luck can't be improved, your skills in building and piloting your arsenal can be developed through practice, strategic thinking, and learning from your mistakes.
EOD
);
___('strategy_body_2', 'FR', <<<EOD
La chance ne peut être améliorée, mais vos compétences en construction et en pilotage d'arsenaux peuvent l'être. Pour cela, il faut jouer au jeu, réfléchir aux stratégies, et apprendre de vos erreurs.
EOD
);
___('strategy_body_3', 'EN', <<<EOD
This page outlines a few concepts which should help you think about the game in a more strategic way. For deeper strategic discussions, you will have to interact with the community on {{link|404|Discord}} or {{link|404|IRC}}.
EOD
);
___('strategy_body_3', 'FR', <<<EOD
Cette page présente des concepts de base qui devraient vous aider à développer une approche plus stratégique du jeu. Si vous souhaitez approfondir votre compréhension stratégique, vous devrez le faire en intéragissant avec la communauté du jeu sur {{link|404|Discord}} ou {{link|404|IRC}}.
EOD
);


// Speed (aggro, midrange, control)
___('strategy_speed_title',  'EN', "Speed");
___('strategy_speed_title',  'FR', "Vitesse");
___('strategy_speed_body_1', 'EN', <<<EOD
Speed is a defining element of an arsenal. There are three different speeds. You might consider building your entire arsenal around one for optimal results. Each speed comes with unique strategies, strengths, and weaknesses.
EOD
);
___('strategy_speed_body_1', 'FR', <<<EOD
La vitesse d'un arsenal est un élément clé de son efficacité. Il existe trois vitesses distinctes, et il est conseillé de construire votre arsenal autour de l'une d'elles pour obtenir des résultats optimaux. Chaque vitesse a ses propres stratégies, avantages et inconvénients.
EOD
);
___('strategy_speed_body_2', 'EN', <<<EOD
<span class="bold">Aggro</span> arsenals are the fastest. Their goal is to win quickly, often by opening with strong threats to pressure the opponent. Even if they don't achieve an outright win, they aim to disrupt opponents by forcing them into a defensive playstyle.
EOD
);
___('strategy_speed_body_2', 'FR', <<<EOD
<span class="bold">Aggro</span> est le type d'arsenal le plus rapide. Son but est de gagner dès que possible, en ouvrant les parties avec des menaces capables de les finir rapidement. L'objectif n'est pas forcément une victoire immédiate, mais au minimum de perturber les plans des adversaires en les obligeant à jouer défensivement.
EOD
);
___('strategy_speed_body_3', 'EN', <<<EOD
<span class="bold">Control</span> arsenals are the slowest, preferring slow, deliberate games where every move is carefully planned. Rather than being aggressive, control arsenals focus on neutralizing threats and patiently developing their own win conditions over time.
EOD
);
___('strategy_speed_body_3', 'FR', <<<EOD
<span class="bold">Contrôle</span> est le type d'arsenal le plus lent. Ce type de jeu repose sur une progression lente et réfléchie, où chaque carte a son importance. Il manque d'agressivité, mais compense par sa capacité à neutraliser les attaques ennemies, avant de développer progressivement sa propre condition de victoire.
EOD
);
___('strategy_speed_body_4', 'EN', <<<EOD
<span class="bold">Midrange</span> arsenals bridge the gap between aggro and control, blending steady aggression with flexibility. They aim to deploy big threats gradually while maintaining enough control to defend against early aggression.
EOD
);
___('strategy_speed_body_4', 'FR', <<<EOD
<span class="bold">Midrange</span> est un type d'arsenal qui combine des éléments d'agression et de défense. Il construit sa puissance de manière progressive, en déployant des menaces puissantes tout en disposant de moyens de se défendre contre les attaques ennemies.
EOD
);
___('strategy_speed_body_5', 'EN', <<<EOD
These speeds create a strategic triangle: aggro usually outpaces control, control typically outlasts midrange, and midrange often holds its ground against aggro. When building your arsenal, consider which speed it are optimized for, but also whether your reserves cards allows you to switch from one speed to another between games.
EOD
);
___('strategy_speed_body_5', 'FR', <<<EOD
Ces vitesses interagissent selon un triangle stratégique : aggro prend contrôle de court, contrôle est plus durable que midrange, et midrange se défend contre aggro. Lors de la construction de votre arsenal, veillez à l'optimiser pour une vitesse spécifique, tout en vous assurant que vos cartes de réserve permettent un passage fluide d'une vitesse à l'autre entre les parties.
EOD
);


// Pacing (base durability as a resource)
___('strategy_pacing_title',  'EN', "Early game pacing");
___('strategy_pacing_title',  'FR', "Rythme de début de jeu");
___('strategy_pacing_body_1', 'EN', <<<EOD
A key concept in Future Invaders is that your base's durability is a resource.
EOD
);
___('strategy_pacing_body_1', 'FR', <<<EOD
Un concept crucial dont vous devez prendre conscience est que la durabilité de votre base est une ressource.
EOD
);
___('strategy_pacing_body_2', 'EN', <<<EOD
You only lose when your base's durability hits zero or below. Letting it drop to 20, 10, or even just 1 is not a loss, as long as you can still protect it. Sometimes, it might be worth sacrificing a bit of durability early on to gain a greater advantage later in the game.
EOD
);
___('strategy_pacing_body_2', 'FR', <<<EOD
Vous ne perdez que lorsque la durabilité de votre base atteint zéro ou moins. Si vous la laissez volontairement tomber à 20, à 10, ou même à 1, tant que vous pouvez la protéger, vous n'avez pas perdu. En début de partie, il peut être avantageux de sacrifier une partie de la durabilité de votre base pour gagner du temps et obtenir un avantage plus tard.
EOD
);
___('strategy_pacing_body_3', 'EN', <<<EOD
For example, imagine an opponent deploys two weak ships facing you on their first turn. You could block them to protect your base's durability, or you could skip deployments, draw an extra card, and prepare for a stronger response on your next turn. In some situations, learning to accept small durability losses rather than seeing them as setbacks can be a valuable strategy.
EOD
);
___('strategy_pacing_body_3', 'FR', <<<EOD
Par exemple, si un adversaire déploie deux vaisseaux faibles au premier tour, vous pouvez choisir de protéger votre base en les bloquant, ou préférer sauter la phase de déploiement, piocher une carte supplémentaire, et disposer ainsi d'une option supplémentaire au tour suivant. En fonction de la situation, vous devrez apprendre à accepter que perdre un peu de durabilité n'est pas forcément une mauvaise chose, et qu'encaisser des dégâts peut parfois être une stratégie viable.
EOD
);
___('strategy_pacing_body_4', 'EN', <<<EOD
In the early game, your goal is to balance drawing cards and protecting your base. Try to draw as many cards as you can early, but only if it doesn't allow your opponent's threats to spiral out of control.
EOD
);
___('strategy_pacing_body_4', 'FR', <<<EOD
Ainsi, au début de chaque partie, le but est de trouver l'équilibre entre piocher des cartes et protéger votre base. L'idéal est de piocher autant de cartes que possible, mais seulement si cela ne compromet pas votre capacité à vous protéger des menaces adverses.
EOD
);


// Curve
___('strategy_curve_title',  'EN', "Resource curve");
___('strategy_curve_title',  'FR', "Courbe de ressources");
___('strategy_curve_body_1', 'EN', <<<EOD
When building your arsenals, be mindful of their resource curve.
EOD
);
___('strategy_curve_body_1', 'FR', <<<EOD
Lorsque vous construisez vos arsenaux, vous devez être conscient de leur courbe de ressources.
EOD
);
___('strategy_curve_body_2', 'EN', <<<EOD
A well-balanced resource curve ensures you have impactful options at every stage of the game. If you have too few cheap cards, you will have issues getting enough resources to play your more expensive cards. Don't underestimate the value of including cheaper cards in your arsenal.
EOD
);
___('strategy_curve_body_2', 'FR', <<<EOD
Vous devez avoir des options pertinentes à tous les coûts de ressources. Si vous avez trop peu de cartes au coût faible, vous aurez du mal à accumuler assez de ressources pour pouvoir jouer vos cartes plus chères. Ne sous-estimez pas l'importance des cartes moins chères dans votre arsenal.
EOD
);
___('strategy_curve_body_3', 'EN', <<<EOD
Each arsenal type has a unique resource curve, depending on their {{link|pages/game/strategies#speed|speed}}. Aggro arsenals favor a low-cost curve, packed with free or cheap cards to ensure they can play every card they draw. Control arsenals have a higher curve, with the minimum amount of free and low-cost cards to reliably reach the late game. Midrange arsenals balance their curve to achieve a smooth progression, with a mix of low, mid, and high-cost cards.
EOD
);
___('strategy_curve_body_3', 'FR', <<<EOD
Selon la {{link|pages/game/strategies#speed|vitesse}} de votre arsenal, sa courbe de ressources sera différente. Les arsenaux aggro ont une courbe faible, avec beaucoup de cartes gratuites ou peu chères, garantissant qu'ils peuvent jouer chaque carte qu'ils piochent. Les arsenaux contrôle ont une courbe élevée, utilisant le minimum nécessaire de cartes à bas coût pour atteindre les phases avancées du jeu. Les arsenaux midrange ont une courbe équilibrée, visant à avoir une progression fluide, avec un nombre équivalent de cartes gratuites, peu chères et coûteuses.
EOD
);
___('strategy_curve_body_4', 'EN', <<<EOD
To refine your arsenal's resource curve, shuffle and draw the top 8 cards. Ask yourself: do these cards support your game plan? If you often find yourself without resources or impactful plays, consider adjusting your arsenal's composition to better match its speed and respect its resource curve.
EOD
);
___('strategy_curve_body_4', 'FR', <<<EOD
La meilleure façon d'équilibrer la courbe de ressources de votre arsenal est de le mélanger et de piocher les 8 premières cartes. Demandez-vous si ces cartes vous permettent d'accomplir votre stratégie, et recommencez. Si vous vous trouvez souvent en manque de ressources ou sans options efficaces, vous devrez ajuster la composition de votre arsenal pour mieux correspondre à sa vitesse et à la courbe de ressource qui va avec.
EOD
);


// Tempo (vs value tradeoffs)
___('strategy_tempo_title',  'EN', "Tempo");
___('strategy_tempo_title',  'FR', "Tempo");
___('strategy_tempo_body_1', 'EN', <<<EOD
Games of Future Invaders often develop a tempo: one player may start advancing their game plan faster, creating a strong threat that others must respond to. This player controls the game's tempo, forcing opponents into a reactive, defensive position.
EOD
);
___('strategy_tempo_body_1', 'FR', <<<EOD
Les parties de Future Invaders suivent un tempo : un joueur va généralement déployer son plan de jeu plus rapidement que les autres, créant une menace qui doit être gérée. Ce joueur contrôle le tempo, obligeant les autres à jouer de manière réactive et défensive.
EOD
);
___('strategy_tempo_body_2', 'EN', <<<EOD
Your approach should shift depending on whether you control the tempo. When you're in control, focus on deploying ships and playing actions to keep opponents on the backfoot. Forcing them to play reactively limits their ability to execute their own strategies, which increases your chances of winning.
EOD
);
___('strategy_tempo_body_2', 'FR', <<<EOD
Vous devez adapter votre jeu en fonction du tempo. Si vous contrôlez le tempo, continuez à déployer des vaisseaux et à jouer des actions pour maintenir vos adversaires sur la défensive. Lorsqu'ils jouent de manière réactive, il leur est plus difficile d'assembler leur propre plan de jeu, ce qui augmente vos chances de gagner.
EOD
);
___('strategy_tempo_body_3', 'EN', <<<EOD
Learn to recognize when you're losing tempo. If your opponents' defenses become too strong to break through, it may be wise to shift tactics. Use your tempo advantage to buy time, draw more cards, and prepare a defensive strategy of your own. Strengthening your position can allow you to regain control of the tempo later in the game.
EOD
);
___('strategy_tempo_body_3', 'FR', <<<EOD
Vous devez aussi apprendre à anticiper les pertes de tempo. Si les défenses de vos adversaires deviennent trop solides pour que vous puissiez les briser, il peut être judicieux de sacrifier votre tempo en échange d'un avantage. Profitez du temps gagné grâce à votre forte présence sur la grille, piochez des cartes supplémentaires, préparez-vous à jouer défensivement à votre tour, et assemblez une main qui vous permettra de regagner le tempo plus tard dans la partie.
EOD
);


// Card avantage (and snowballing)
___('strategy_advantage_title',  'EN', "Card advantage");
___('strategy_advantage_title',  'FR', "Avantage en cartes");
___('strategy_advantage_body_1', 'EN', <<<EOD
The more cards you have in your hand and on the game grid, the more options you have. Aim to keep your hand and grid as full as possible by drawing and deploying cards whenever you can.
EOD
);
___('strategy_advantage_body_1', 'FR', <<<EOD
Plus vous avez de cartes en main et sur la grille, plus vous avez d'options. Par conséquent, vous devez chercher à garder votre main et votre grille aussi remplies que possible en piochant et en déployant autant de cartes que vous le pouvez.
EOD
);
___('strategy_advantage_body_2', 'EN', <<<EOD
Having more options than your opponent creates more pathways to victory. For this reason, the player with more cards in hand and on the grid holds a "card advantage". Always pay attention to how many cards your opponents keep in hand, they are as much a part of the game as their deployed ships and structures.
EOD
);
___('strategy_advantage_body_2', 'FR', <<<EOD
Lorsqu'un joueur a plus d'options que ses adversaires, il dispose potentiellement de plus de chemins vers la victoire. Par conséquent, celui qui a le plus de cartes en main et sur la grille est considéré comme ayant un avantage en cartes. Faites attention au nombre de cartes que vos adversaires conservent en main, elles font autant partie du jeu que leurs structures et vaisseaux déployés.
EOD
);
___('strategy_advantage_body_3', 'EN', <<<EOD
When you play an action or reaction card, consider that it has two costs: the resource cost, and the cost of having one fewer card in your hand. This means that even "free" actions and reactions carry a subtle hidden cost.
EOD
);
___('strategy_advantage_body_3', 'FR', <<<EOD
Lorsque vous jouez une action ou une réaction, vous devez être conscient que chaque carte a deux coûts : le coût en ressources de la carte, et le coût d'avoir une carte en moins dans votre main. Selon cette logique, les actions et réactions gratuites ne sont pas réellement gratuites, elles ont un coût caché subtil.
EOD
);


// Overextending
___('strategy_overextending_title',  'EN', "Overextending");
___('strategy_overextending_title',  'FR', "Surengagement");
___('strategy_overextending_body_1', 'EN', <<<EOD
When playing on the offensive, a common pitfall is losing due to overextending.
EOD
);
___('strategy_overextending_body_1', 'FR', <<<EOD
Lorsque vous jouez de manière agressive, un piège courant est de perdre à cause d'un surengagement.
EOD
);
___('strategy_overextending_body_2', 'EN', <<<EOD
If you immediately commit all your cards and resources to a play without considering how it could backfire, you risk being left with nothing if your opponents have a way to counter it. Only use all your resources when you have a clear plan in mind.
EOD
);
___('strategy_overextending_body_2', 'FR', <<<EOD
Si vous engagez immédiatement toutes vos cartes et ressources sans considérer comment votre plan pourrait échouer, vous risquez de vous retrouver sans rien si vos adversaires ont un moyen de le contrer. N'engagez toutes vos cartes et ressources que lorsque vous avez un plan d'action clair.
EOD
);
___('strategy_overextending_body_3', 'EN', <<<EOD
For instance, if you hold a direct-damage action against an opponent's base, you have three main choices. One, play it immediately to apply pressure and perhaps force a reaction. Two, wait until your opponent's turn, when their resources are spent, so they can't counter it. Three, hold it in your hand to surprise your opponent and finish the game.
EOD
);
___('strategy_overextending_body_3', 'FR', <<<EOD
Par exemple, si vous avez une action en main qui inflige des dégâts directs à la base d'un adversaire, vous pouvez l'utiliser de trois façons différentes. Vous pouvez la jouer immédiatement, ce qui mettra votre adversaire sous pression et pourrait le forcer à utiliser une réaction pour la contrer. Vous pouvez attendre le tour de votre adversaire, une fois qu'il a dépensé ses ressources, pour la jouer lorsqu'il n'aura pas de ressources disponibles pour la contrer. Ou vous pouvez la garder en main, prête à être jouée au moment opportun pour surprendre votre adversaire et gagner la partie.
EOD
);
___('strategy_overextending_body_4', 'EN', <<<EOD
Each approach is valid depending on the situation. If you act too quickly, you might overextend and lose momentum. If you wait too long, you might miss your chance to win. Weigh the consequences of each move, and adapt your strategy to the situation.
EOD
);
___('strategy_overextending_body_4', 'FR', <<<EOD
Ces trois stratégies sont valides, et vous devez savoir choisir celle qui convient le mieux à chaque situation. Si vous êtes trop pressé, vous risquez de vous retrouver coincé dans un surengagement, sans moyen de revenir dans la partie. Si vous attendez trop longtemps, vous pourriez perdre la partie. Réfléchissez aux conséquences de chaque action et choisissez la stratégie appropriée.
EOD
);


// Synergy
___('strategy_synergy_title',  'EN', "Synergy");
___('strategy_synergy_title',  'FR', "Synergie");
___('strategy_synergy_body_1', 'EN', <<<EOD
Two cards have synergy if they're more powerful together than they are separately.
EOD
);
___('strategy_synergy_body_1', 'FR', <<<EOD
Deux cartes ont une synergie si elles sont plus fortes que la somme de leurs puissances individuelles.
EOD
);
___('strategy_synergy_body_2', 'EN', <<<EOD
When building an arsenal, consider how well your cards work together. Strong synergies across your arsenal will raise its overall power level. Conversely, some cards have anti-synergies: they weaken each other's effectiveness. Be mindful to avoid pairing these together.
EOD
);
___('strategy_synergy_body_2', 'FR', <<<EOD
Lorsque vous construisez un arsenal, vous devez prendre en compte la synergie entre vos cartes. Si toutes vos cartes présentent une forte synergie, votre arsenal sera plus puissant. À l'inverse, certaines cartes peuvent avoir une anti-synergie, et il est préférable d'éviter de les inclure ensemble dans un même arsenal.
EOD
);
___('strategy_synergy_body_3', 'EN', <<<EOD
Not all synergies are obvious. For instance, a {{link|pages/card/beta-ringstation|Ring Station}} and a {{link|pages/card/beta-tradingstation|Trading Station}} might seem underwhelming on their own, but together they guarantee you two cards per turn. Detecting these synergies and leveraging them is key to mastering arsenal building.
EOD
);
___('strategy_synergy_body_3', 'FR', <<<EOD
Certaines synergies ne sont pas évidentes à voir. Par exemple, une {{link|pages/card/beta-ringstation|Station en anneau}} et un {{link|pages/card/beta-tradingstation|Comptoir commercial}} ne sont pas particulièrement puissants individuellement, mais leur combinaison vous garantit la possibilité de piocher deux cartes par tour. Identifier et comprendre ces synergies est votre responsabilité en tant que constructeur d'arsenaux.
EOD
);


// Archetypes
___('strategy_archetypes_title',  'EN', "Archetypes");
___('strategy_archetypes_title',  'FR', "Archétypes");
___('strategy_archetypes_body_1', 'EN', <<<EOD
Beyond the {{link|pages/game/strategies#speed|speeds}} of aggro, midrange, and control, arsenals are also classified by archetype.
EOD
);
___('strategy_archetypes_body_1', 'FR', <<<EOD
Les arsenaux ne sont pas seulement divisés en trois catégories selon leurs {{link|pages/game/strategies#speed|vitesses}} (aggro, midrange, contrôle). Ils sont également catégorisés par archétypes.
EOD
);
___('strategy_archetypes_body_2', 'EN', <<<EOD
An arsenal's archetype represents its general gameplan or goal. Unlike a specific strategy or speed, an archetype is a guiding approach for how the arsenal plays. For instance, a Combo arsenal relies on powerful card synergies to achieve victory, while a Ping arsenal uses small sources of direct damage to gradually weaken opponents' bases.
EOD
);
___('strategy_archetypes_body_2', 'FR', <<<EOD
L'archétype d'un arsenal représente le plan de jeu qu'il cherche à mettre en place. Ce n'est ni une stratégie spécifique ni une vitesse de jeu, mais plutôt un objectif général pour la partie. Par exemple, un arsenal Combo cherchera à jouer des cartes avec des synergies particulièrement fortes, tandis qu'un arsenal Ping se concentrera sur des sources individuelles de dégâts directs pour endommager progressivement les bases des adversaires.
EOD
);
___('strategy_archetypes_body_3', 'EN', <<<EOD
When building an arsenal, define its archetype and make sure each card supports your approach. There's no fixed list of archetypes, and new ones will continue to emerge as the game evolves.
EOD
);
___('strategy_archetypes_body_3', 'FR', <<<EOD
Lorsque vous construisez un arsenal, vous devez définir son archétype et vous assurer que chaque carte que vous y ajoutez soutient ce plan de jeu. Il n'existe pas de liste officielle d'archétypes, et de nouveaux archétypes seront constamment inventés au fil de l'existence du jeu.
EOD
);


// Win condition
___('strategy_wincon_title',  'EN', "Win condition");
___('strategy_wincon_title',  'FR', "Condition de victoire");
___('strategy_wincon_body_1', 'EN', <<<EOD
Every arsenal needs a win condition: a clear goal or method for securing victory.
EOD
);
___('strategy_wincon_body_1', 'FR', <<<EOD
Chaque arsenal doit avoir une condition de victoire : un objectif ou une méthode spécifique qui vous permet de gagner la partie.
EOD
);
___('strategy_wincon_body_2', 'EN', <<<EOD
When building your arsenal, ask yourself: How do I plan to win the game? Make sure your deck includes enough cards to support this goal. Your win condition doesn't always align with your {{link|pages/game/strategies#archetypes|archetype}} or {{link|pages/game/strategies#speed|speed}}. For example, even a slow control arsenal can rely on one big, aggressive action to win in a single turn.
EOD
);
___('strategy_wincon_body_2', 'FR', <<<EOD
Lorsque vous construisez un arsenal, demandez-vous comment il parviendra à gagner la partie et si vous avez suffisamment de cartes pour soutenir ce plan. Votre condition de victoire n'a pas besoin d'être alignée avec votre {{link|pages/game/strategies#archetypes|archétype}} ou votre {{link|pages/game/strategies#speed|vitesse}}. Par exemple, un arsenal de contrôle lent peut compter sur une action agressive infligeant des dégâts massifs pour gagner la partie d'un coup.
EOD
);
___('strategy_wincon_body_3', 'EN', <<<EOD
Understanding your win condition is crucial. You must know how to protect it, as your opponents will try to counter it. Without a clear win condition, it can be difficult to close out games.
EOD
);
___('strategy_wincon_body_3', 'FR', <<<EOD
Lorsque vous jouez un arsenal, il est important de comprendre votre condition de victoire et comment la protéger, car vos adversaires tenteront de la contrer. Si vous n'avez pas de condition de victoire précise, vous pourriez avoir du mal à conclure les parties.
EOD
);


// Reach
___('strategy_reach_title',  'EN', "Reach");
___('strategy_reach_title',  'FR', "Portée");
___('strategy_reach_body_1', 'EN', <<<EOD
An arsenal's reach is its ability to break through opponents' defenses and secure a victory.
EOD
);
___('strategy_reach_body_1', 'FR', <<<EOD
La portée d'un arsenal est sa capacité à passer à travers les défenses de ses adversaires pour gagner la partie.
EOD
);
___('strategy_reach_body_2', 'EN', <<<EOD
In some games, the situation may stagnate, with both players stuck in a defensive position. When this happens, the arsenal with the greatest reach will typically win. Keep this in mind when building your arsenal, and ensure you include threats that can deal direct damage to your opponents' bases.
EOD
);
___('strategy_reach_body_2', 'FR', <<<EOD
Certaines parties peuvent devenir lentes et verrouillées. Dans ce cas, l'arsenal avec la plus grande portée sera celui qui l'emportera. Gardez cela à l'esprit lors de la construction de votre arsenal, assurez-vous d'avoir suffisamment de sources de dégâts directs.
EOD
);
___('strategy_reach_body_3', 'EN', <<<EOD
On the other hand, you also need ways to defend yourself against your opponent's reach. Make sure your arsenal has enough options to remove ships, structures, and counter actions that can directly damage your base.
EOD
);
___('strategy_reach_body_3', 'FR', <<<EOD
D'un autre côté, vous devez aussi disposer de moyens pour vous défendre contre la portée de vos adversaires. Veillez à avoir des outils peremettant de détruire les vaisseaux et structures et de contrer les actions pouvant directement atteindre votre base.
EOD
);


// Resiliency
___('strategy_resiliency_title',  'EN', "Resiliency");
___('strategy_resiliency_title',  'FR', "Résilience");
___('strategy_resiliency_body_1', 'EN', <<<EOD
Some games will go poorly. You may lose {{link|pages/game/strategies#tempo|tempo}}, find yourself on the backfoot, and struggle to avoid crumbling under pressure. These situations are inevitable, so your arsenals should be resilient: able to handle pressure and recover.
EOD
);
___('strategy_resiliency_body_1', 'FR', <<<EOD
Certaines parties se dérouleront mal. Vous perdrez {{link|pages/game/strategies#tempo|le tempo}}, serez sur la défensive, et tenterez d'éviter de vous effondrer complètement sous la pression. Ces situations sont inévitables, c'est pourquoi vos arsenaux doivent être résilients : prêts à gérer ces moments et capables de s'en sortir.
EOD
);
___('strategy_resiliency_body_2', 'EN', <<<EOD
Pressure can come in many forms: being overwhelmed on the grid, being resource-starved, or facing direct damage threats. Your arsenal should account for all of these scenarios, with reserve cards that can be swapped in between games to counter your opponents' methods of putting you under pressure.
EOD
);
___('strategy_resiliency_body_2', 'FR', <<<EOD
La pression peut se manifester de plusieurs façons. Vous pouvez être submergé sur la grille, privé de ressources, ou menacé par des dégâts directs. Vos arsenaux doivent anticiper ces scénarios et inclure des cartes de réserve que vous pouvez ajouter entre les parties pour contrer les méthodes de pression de vos adversaires.
EOD
);


// Thinning
___('strategy_thinning_title',  'EN', "Arsenal thinning");
___('strategy_thinning_title',  'FR', "Affinage d'arsenal");
___('strategy_thinning_body_1', 'EN', <<<EOD
The fewer cards in your arsenal, the higher your chances of drawing the necessary cards to assemble your win condition. This is why it is heavily recommended to build arsenals of 30 cards, the minimum allowed.
EOD
);
___('strategy_thinning_body_1', 'FR', <<<EOD
Moins vous avez de cartes dans votre arsenal, plus vos chances de piocher votre condition de victoire augmentent. C'est pourquoi il est fortement recommandé de construire des arsenaux de 30 cartes, le nombre minimum autorisé.
EOD
);
___('strategy_thinning_body_2', 'EN', <<<EOD
You can further improve your chances of drawing your key cards by thinning your arsenal. Include cards with low utility that allow you to draw more cards, increasing your odds of finding the right ones.
EOD
);
___('strategy_thinning_body_2', 'FR', <<<EOD
Vous pouvez aller encore plus loin en affinant votre arsenal : inclure des cartes de faible utilité, mais qui vous permettent de piocher davantage, augmentant ainsi vos chances de trouver les cartes nécessaires à votre victoire.
EOD
);
___('strategy_thinning_body_3', 'EN', <<<EOD
For example, cards like {{link|pages/card/beta-accelerate|Accelerate}} or {{link|pages/card/beta-spacescanner|Space Scanner}} may not win you the game directly, but they replace themselves by drawing a card, thinning your deck and improving your chances of drawing a win condition.
EOD
);
___('strategy_thinning_body_3', 'FR', <<<EOD
Par exemple, une {{link|pages/card/beta-accelerate|Accélération}} ou un {{link|pages/card/beta-spacescanner|Scrutateur spatial}} n'auront probablement pas d'impact direct sur la partie, mais les deux se remplacent en vous permettant de piocher une carte lorsqu'ils sont joués, affinant ainsi votre arsenal.
EOD
);
___('strategy_thinning_body_4', 'EN', <<<EOD
Arsenals focused on a single win condition should aim to be as thin as possible, even if it weakens their overall power. On the other hand, versatile arsenals with multiple paths to victory should focus on strong cards to ensure flexibility, and do not need to be thinned down.
EOD
);
___('strategy_thinning_body_4', 'FR', <<<EOD
Les arsenaux construits autour d'une unique carte comme condition de victoire devraient chercher à devenir plus affinés, au détriment de leur puissance, tandis que les arsenaux plus équilibrés, avec plusieurs chemins vers la victoire, préféreront ne contenir que des cartes puissantes.
EOD
);


// Mind games
___('strategy_mindgames_title',  'EN', "Mind games");
___('strategy_mindgames_title',  'FR', "Tactiques psychologiques");
___('strategy_mindgames_body_1', 'EN', <<<EOD
A card's power goes beyond its text. With the right mind games, you can make a card seem much more powerful than it really is, using bluffing, misdirection, and other tactics to influence your opponents' choices.
EOD
);
___('strategy_mindgames_body_1', 'FR', <<<EOD
La puissance d'une carte dépasse le texte qui est écrit dessus. En utilisant des tactiques psychologiques, vous pouvez rendre une carte plus forte qu'elle ne l'est réellement en bluffant, détournant l'attention, trompant vos adversaires, ce qui peut influencer leurs choix stratégiques.
EOD
);
___('strategy_mindgames_body_2', 'EN', <<<EOD
Any card in your hand is unknown to your opponents, giving it potentially infinite power in their minds. As long as you keep an air of mystery around your cards, they might think you have stronger options than you do. At the same time, you must anticipate the cards your opponents hold and keep counters ready for any of their potential win condition.
EOD
);
___('strategy_mindgames_body_2', 'FR', <<<EOD
Chaque carte dans votre main possède un potentiel de puissance infini dans l'esprit de vos adversaires, car ils ne peuvent pas la voir. Tant que vous maintenez une aura de mystère autour des cartes que vous tenez, ils peuvent croire que vous avez des options plus puissantes que celles dont vous disposez réellement. À l'inverse, vous devez anticiper les cartes que vos adversaires ont en main et garder des moyens de les contrer s'il s'agit de leurs conditions de victoire.
EOD
);
___('strategy_mindgames_body_3', 'EN', <<<EOD
The only time there is no mind game is when your hand is empty. When it happens, your opponents can see everything you own and know they won't be countered. That's why it's wise to always keep at least one card in hand, to keep them guessing.
EOD
);
___('strategy_mindgames_body_3', 'FR', <<<EOD
La seule situation où il n'y a pas de tactique psychologique possible est lorsque votre main est vide : vos adversaires voient tout ce que vous possédez et savent qu'ils ne seront pas contrecarrés. Il est donc recommandé de toujours garder au moins une carte en main à tout moment, pour que vos adversaires restent dans l'incertitude.
EOD
);
___('strategy_mindgames_body_4', 'EN', <<<EOD
Becoming a better player involves more than just understanding the game mechanics, it's also about learning how to anticipate your opponents' moves while making them doubt yours.
EOD
);
___('strategy_mindgames_body_4', 'FR', <<<EOD
Dans votre quête pour devenir un meilleur joueur, réussir à deviner les actions de vos adversaires tout en les faisant douter des vôtres est aussi important que de maîtriser les mécaniques du jeu.
EOD
);


// Risk assessment
___('strategy_riskassess_title',  'EN', "Risk assessment");
___('strategy_riskassess_title',  'FR', "Évaluation des risques");
___('strategy_riskassess_body_1', 'EN', <<<EOD
Before making a decision, always assess the risks involved. For example, when playing a key card, how likely is it to be countered or removed? When an opponent plays a key card, is it worth countering or removing, and are they likely to play a stronger card right afterward? When leaving a lane empty to draw an extra card, what are the chances an opponent will deploy a strong ship in that lane and cause your base a significant durability loss?
EOD
);
___('strategy_riskassess_body_1', 'FR', <<<EOD
Avant de prendre une décision, vous devez toujours analyser les risques. Par exemple, lorsque vous jouez une carte clé, quelles sont les chances qu'elle soit contrée ou détruite ? Lorsque votre adversaire joue une carte clé, devez-vous la contrecarrer ou la détruire, ou risque-t-il de jouer une carte encore plus puissante juste après ? Lorsque vous laissez délibérément une ligne vide sur la grille pour piocher une carte supplémentaire, quelles sont les chances qu'un adversaire y déploie un vaisseau puissant et vous inflige une perte de durabilité massive ?
EOD
);
___('strategy_riskassess_body_2', 'EN', <<<EOD
Risk assessment is only possible if you know all the cards in the game and understand the composition of your opponents' arsenals. This knowledge is gained through experience, by building arsenals, playing games, and paying attention to the key cards that influenced your victories or defeats.
EOD
);
___('strategy_riskassess_body_2', 'FR', <<<EOD
L'évaluation des risques n'est possible que si vous connaissez toutes les cartes du jeu et comprenez la composition des arsenaux de vos adversaires. Cela ne peut s'apprendre qu'à l'expérience, en jouant beaucoup de parties et en prenant note des cartes clés qui vous font gagner ou perdre.
EOD
);
___('strategy_riskassess_body_3', 'EN', <<<EOD
This ability can make a huge difference between two equally strong arsenals. The player with a better understanding of their opponent's arsenal will play more confidently, make better decisions, and be able to act more aggressively when the time is right.
EOD
);
___('strategy_riskassess_body_3', 'FR', <<<EOD
Cette compétence peut faire une grande différence entre deux arsenaux de même puissance, car le joueur ayant une meilleure compréhension de l'arsenal adverse pourra jouer plus agressivement, avec plus de confiance, en prenant des décisions plus informées.
EOD
);