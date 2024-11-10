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
___('card_list_title', 'EN', "Card list");
___('card_list_title', 'FR', "Liste des cartes");
___('card_list_body',  'EN', <<<EOD
Below is the full list of cards playable in a game of Future Invaders. Click on any card to see details, including full descriptions and rulings. Use the search form above the list to find specific cards.
EOD
);
___('card_list_body',  'FR', <<<EOD
Ci-dessous se trouvent toutes les cartes jouables dans une partie de Future Invaders. Cliquez sur une carte pour voir plus de détails à son sujet, incluant sa description complète et les jugements la concernant. Si vous êtes à la recherche de cartes spécifiques, utilisez le formulaire de recherche au-dessus de la liste.
EOD
);
___('card_list_count',  'EN', "{{1}} card");
___('card_list_count',  'FR', "{{1}} carte");
___('card_list_count+', 'EN', "{{1}} cards");
___('card_list_count+', 'FR', "{{1}} cartes");




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
First, you'll need to get a copy of the game. Since Future Invaders isn't published yet, the only way to get it is by {{link|404|downloading the cards}} from this website and {{link|404|printing them yourself}}.
EOD
);
___('rules_body_1', 'FR', <<<EOD
Tout d'abord, vous devez obtenir une copie du jeu. Pour l'instant, Future Invaders n'a pas encore d'éditeur, la seule façon d'en avoir une copie est de {{link|404|télécharger les cartes}} depuis ce site et de les {{link|404|imprimer vous-même}}.
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
Rules and reminders are on cards, allowing you to {{link|404|print them at home}}.
EOD
);
___('rules_body_4', 'FR', <<<EOD
Les règles et rappels sont présentés sous forme de cartes, ce qui vous permet de les {{link|404|imprimer chez vous}}.
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
Il n’y a pas de taille maximale pour la main.
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
The game's background story is presented through lore cards. These cards can be {{link|404|printed at home}}.
EOD
);
___('lore_body_3', 'FR', <<<EOD
L'histoire du jeu est introduite par des cartes de lore. Vous pouvez les {{link|404|imprimer chez vous}}.
EOD
);