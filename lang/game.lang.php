<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


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
___('vocabulary_title', 'EN', "Glossary");
___('vocabulary_title', 'FR', "Glossaire");
___('vocabulary_body_1', 'EN', <<<EOD
This page lists terms commonly used in the game.
EOD
);
___('vocabulary_body_1', 'FR', <<<EOD
Cette page liste les termes les plus utilisés dans le jeu.
EOD
);
___('vocabulary_body_2', 'EN', <<<EOD
This glossary is not part of the {{link|pages/rules/rules|official rules of the game}}, and should therefore not be considered a substitute for them. If anything written in a {{link|pages/rules/rules|rule}} or {{link|404|ruling}} directly contradicts this glossary, then you should refer to the rule or ruling instead as the source of truth.
EOD
);
___('vocabulary_body_2', 'FR', <<<EOD
Ce glossaire ne fait pas partie des {{link|pages/rules/rules|règles officielles du jeu}}. Si une information issue de ce glossaire contredit une {{link|pages/rules/rules|règle}} ou un {{link|404|jugement}} officiel, c'est la règle ou le jugement qui fait office de source de vérité.
EOD
);


// Action
___('vocabulary_action_title', 'EN', "Action");
___('vocabulary_action_title', 'FR', "Action");
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


// Arsenal
___('vocabulary_arsenal_title', 'EN', "Arsenal");
___('vocabulary_arsenal_title', 'FR', "Arsenal");
___('vocabulary_arsenal_body_1', 'EN', <<<EOD
A player's deck of cards.
EOD
);
___('vocabulary_arsenal_body_2', 'EN', <<<EOD
Players shuffle their arsenals at the start of each game and keep them next to them, facing down.
EOD
);
___('vocabulary_arsenal_body_3', 'EN', <<<EOD
Each arsenal must contain at least 30 cards, with no more than two copies of any card, and only one copy of any rare card (Pinnacle or Supreme).
EOD
);
___('vocabulary_arsenal_body_4', 'EN', <<<EOD
If you need to draw a card but your arsenal is empty, you lose the game.
EOD
);


// Attack
___('vocabulary_attack_title', 'EN', "Attack");
___('vocabulary_attack_title', 'FR', "Attaque");
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


// Base
___('vocabulary_base_title', 'EN', "Base");
___('vocabulary_base_title', 'FR', "Base");
___('vocabulary_base_body_1', 'EN', <<<EOD
A player's health pool.
EOD
);
___('vocabulary_base_body_2', 'EN', <<<EOD
Each player's base starts with 30 durability points and cannot be repaired above 30 durability.
EOD
);
___('vocabulary_base_body_3', 'EN', <<<EOD
When a base's durability reaches zero, it is destroyed, eliminating its owner from the game. The last remaining base's owner wins the game.
EOD
);


// Combat
___('vocabulary_combat_title', 'EN', "Combat");
___('vocabulary_combat_title', 'FR', "Combat");
___('vocabulary_combat_body_1', 'EN', <<<EOD
Combat occurs once per turn. During combat, all your deployed ships must attack in front of them one by one. You choose the order in which your ships attack.
EOD
);
___('vocabulary_combat_body_2', 'EN', <<<EOD
In the first turn of a new game, no combat occurs, except for the last player who takes their first turn.
EOD
);


// Cost
___('vocabulary_cost_title', 'EN', "Cost");
___('vocabulary_cost_title', 'FR', "Coût");
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


// Deploy
___('vocabulary_deploy_title', 'EN', "Deploy");
___('vocabulary_deploy_title', 'FR', "Déployer");
___('vocabulary_deploy_body_1', 'EN', <<<EOD
Pay the cost of a ship or structure, then place it on your side of the game grid.
EOD
);
___('vocabulary_deploy_body_2', 'EN', <<<EOD
The effects listed in the descriptions of ships and structures only only after deployment and last until they are destroyed.
EOD
);


// Destroy
___('vocabulary_destroy_title', 'EN', "Destroy");
___('vocabulary_destroy_title', 'FR', "Détruire");
___('vocabulary_destroy_body_1', 'EN', <<<EOD
A ship or structure is destroyed when its durability reaches zero or below.
EOD
);
___('vocabulary_destroy_body_2', 'EN', <<<EOD
Destroyed ships and structures go to the top of their owner's scrap pile, unless they provide no income, in which case they go to the bottom of their arsenal.
EOD
);


// Draw
___('vocabulary_draw_title', 'EN', "Draw");
___('vocabulary_draw_title', 'FR', "Piocher");
___('vocabulary_draw_body_1', 'EN', <<<EOD
Draw a card by placing the top card of your arsenal into your hand.
EOD
);
___('vocabulary_draw_body_2', 'EN', <<<EOD
If you must draw a card but have no cards left in your arsenal, you lose the game.
EOD
);


// Durability
___('vocabulary_durability_title', 'EN', "Durability");
___('vocabulary_durability_title', 'FR', "Durabilité");
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


// Effect
___('vocabulary_effect_title', 'EN', "Effect");
___('vocabulary_effect_title', 'FR', "Effet");
___('vocabulary_effect_body_1', 'EN', <<<EOD
An effect refers to anything triggered by a card.
EOD
);
___('vocabulary_effect_body_2', 'EN', <<<EOD
It can include actions, reactions, or any other elements specified in the card's body text.
EOD
);


// Faction
___('vocabulary_faction_title', 'EN', "Faction");
___('vocabulary_faction_title', 'FR', "Faction");
___('vocabulary_faction_body_1', 'EN', <<<EOD
Card families sharing a common resource type, design identity, and visual style.
EOD
);
___('vocabulary_faction_body_2', 'EN', <<<EOD
There are four main factions: Terran, Invader, Organic, and Pirate, along with a fifth Neutral faction.
EOD
);


// Failure
___('vocabulary_failure_title', 'EN', "Failure");
___('vocabulary_failure_title', 'FR', "Échec");
___('vocabulary_failure_body_1', 'EN', <<<EOD
When an effect or deployment fails, it is denied and does not happen.
EOD
);
___('vocabulary_failure_body_2', 'EN', <<<EOD
Resources spent on the failed effect or deployment are permanently lost.
EOD
);
___('vocabulary_failure_body_3', 'EN', <<<EOD
If a ship or structure fails to deploy, it is neither destroyed nor sent to your scrap pile. Instead, it goes straight to the bottom of your arsenal.
EOD
);


// Format
___('vocabulary_format_title', 'EN', "Format");
___('vocabulary_format_title', 'FR', "Format");
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


// Grid
___('vocabulary_grid_title', 'EN', "Grid");
___('vocabulary_grid_title', 'FR', "Grille");
___('vocabulary_grid_body_1', 'EN', <<<EOD
The game area where ships and structures are deployed.
EOD
);
___('vocabulary_grid_body_2', 'EN', <<<EOD
Each player has a 4x2 grid in front of them. The back row accommodates four structures, while the front row holds four ships.
EOD
);
___('vocabulary_grid_body_3', 'EN', <<<EOD
In 1v1 matches, both players' grids face each other.
EOD
);
___('vocabulary_grid_body_4', 'EN', <<<EOD
In matches with more than two players, each player's grid is split in the middle into two 2x2 halves, with the left half facing the nearest player's half-grid on the left and the right half facing the nearest player's half-grid on the right. These half-grids adjust as players are eliminated from the game, until only two players remain, at which point their grids fuse back into 4x2 grids facing each other.
EOD
);


// Hand
___('vocabulary_hand_title', 'EN', "Hand");
___('vocabulary_hand_title', 'FR', "Main");
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


// Income
___('vocabulary_income_title', 'EN', "Income");
___('vocabulary_income_title', 'FR', "Revenus");
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


// Pinnacle
___('vocabulary_pinnacle_title', 'EN', "Pinnacle");
___('vocabulary_pinnacle_title', 'FR', "Suprême");
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


// Player
___('vocabulary_player_title', 'EN', "Player");
___('vocabulary_player_title', 'FR', "Joueur");
___('vocabulary_player_body_1', 'EN', <<<EOD
Anyone participating in a game of Future Invaders whose base has not been destroyed.
EOD
);
___('vocabulary_player_body_2', 'EN', <<<EOD
There is no upper limit to the number of players in a game.
EOD
);


// Priority
___('vocabulary_priority_title', 'EN', "Priority");
___('vocabulary_priority_title', 'FR', "Priorité");
___('vocabulary_priority_body_1', 'EN', <<<EOD
When multiple players wish to play actions or reactions simultaneously, priority determines the order in which these actions or reactions are played.
EOD
);
___('vocabulary_priority_body_2', 'EN', <<<EOD
Priority is first given to the next player in turn order, then continues around the table until it reaches the player who last played their turn, with the ongoing player going last.
EOD
);


// Rarity
___('vocabulary_rarity_title', 'EN', "Rarity");
___('vocabulary_rarity_title', 'FR', "Rareté");
___('vocabulary_rarity_body_1', 'EN', <<<EOD
Some cards are labeled as rare, indicated by the presence of the word RENOWNED or PINNACLE at the bottom of the card.
EOD
);
___('vocabulary_rarity_body_2', 'EN', <<<EOD
Rare cards have a higher power level for their cost. To balance this, you may only have one copy of any unique rare card in your arsenal.
EOD
);


// Reaction
___('vocabulary_reaction_title', 'EN', "Reaction");
___('vocabulary_reaction_title', 'FR', "Réaction");
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


// Recycle
___('vocabulary_recycle_title', 'EN', "Recycle");
___('vocabulary_recycle_title', 'FR', "Recycler");
___('vocabulary_recycle_body_1', 'EN', <<<EOD
Take a card from your scrap pile and place it at the bottom of your arsenal.
EOD
);
___('vocabulary_recycle_body_2', 'EN', <<<EOD
When you recycle a card, you earn resources equal to the card's income value, located at the top right of the card.
EOD
);
___('vocabulary_recycle_body_3', 'EN', <<<EOD
You may recycle a card at any time, even during other players' turns. Cards can be recycled as part of an action or a reaction to help pay its cost.
EOD
);


// Renowned
___('vocabulary_renowned_title', 'EN', "Renowned");
___('vocabulary_renowned_title', 'FR', "Renommé");
___('vocabulary_renowned_body_1', 'EN', <<<EOD
One of two card rarities.
EOD
);
___('vocabulary_renowned_body_2', 'EN', <<<EOD
Renowned cards are more powerful than regular cards, but you may only have one copy of any unique renowned card in your arsenal.
EOD
);


// Replace
___('vocabulary_replace_title', 'EN', "Replace");
___('vocabulary_replace_title', 'FR', "Remplacer");
___('vocabulary_replace_body_1', 'EN', <<<EOD
Deploy a ship or a structure in a grid slot already occupied by another deployed ship or structure.
EOD
);
___('vocabulary_replace_body_2', 'EN', <<<EOD
The replaced ship or structure is not destroyed and does not go to your scrap pile. Instead, it is sent to the bottom of your arsenal.
EOD
);


// Resource
___('vocabulary_resource_title', 'EN', "Resource");
___('vocabulary_resource_title', 'FR', "Ressource");
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


// Remove
___('vocabulary_remove_title', 'EN', "Remove");
___('vocabulary_remove_title', 'FR', "Retirer");
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


// Reveal
___('vocabulary_reveal_title', 'EN', "Reveal");
___('vocabulary_reveal_title', 'FR', "Révéler");
___('vocabulary_reveal_body_1', 'EN', <<<EOD
Show a card to all your opponents.
EOD
);


// Scrap pile
___('vocabulary_scrap_pile_title', 'EN', "Scrap pile");
___('vocabulary_scrap_pile_title', 'FR', "Casse");
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


// Ship
___('vocabulary_ship_title', 'EN', "Ship");
___('vocabulary_ship_title', 'FR', "Vaisseau");
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


// Structure
___('vocabulary_structure_title', 'EN', "Structure");
___('vocabulary_structure_title', 'FR', "Structure");
___('vocabulary_structure_body_1', 'EN', <<<EOD
One of four possible card types.
EOD
);
___('vocabulary_structure_body_2', 'EN', <<<EOD
Once you pay their cost, ships are deployed on your side of the grid in the row closest to you and in a slot of your choosing.
EOD
);
___('vocabulary_structure_body_3', 'EN', <<<EOD
Structures can only be deployed during your turn, after drawing cards and before combat.
EOD
);
___('vocabulary_structure_body_4', 'EN', <<<EOD
Structures do not attack during combat.
EOD
);
___('vocabulary_structure_body_5', 'EN', <<<EOD
When a structure's durability drops to zero or below, it is destroyed. Destroyed structure are sent to your scrap pile, unless they provide no income, in which case they cannot be recycled and go to the bottom of your arsenal.
EOD
);


// Target
___('vocabulary_target_title', 'EN', "Target");
___('vocabulary_target_title', 'FR', "Cible");
___('vocabulary_target_body_1', 'EN', <<<EOD
Some effects ask you to select which card or player they affect.
EOD
);
___('vocabulary_target_body_2', 'EN', <<<EOD
The selected card or player is that effect's target.
EOD
);


// Turn
___('vocabulary_turn_title', 'EN', "Turn");
___('vocabulary_turn_title', 'FR', "Tour");
___('vocabulary_turn_body_1', 'EN', <<<EOD
Players take turns playing the game, one at a time.
EOD
);
___('vocabulary_turn_body_2', 'EN', <<<EOD
During your opponents' turns, you may only play actions and reactions.
EOD
);


// Type
___('vocabulary_type_title', 'EN', "Type");
___('vocabulary_type_title', 'FR', "Type");
___('vocabulary_type_body_1', 'EN', <<<EOD
There are four card types: Ship, Structure, Action, and Reaction.
EOD
);


// Weapons
___('vocabulary_weapons_title', 'EN', "Weapons");
___('vocabulary_weapons_title', 'FR', "Armes");
___('vocabulary_weapons_body_1', 'EN', <<<EOD
A ship's damage value, located at the bottom left of its card.
EOD
);
___('vocabulary_weapons_body_2', 'EN', <<<EOD
When a ship attacks, it inflicts durability losses equal to its weapons value on the ship, structure, or base directly in front of it.
EOD
);
___('vocabulary_weapons_body_3', 'EN', <<<EOD
Some ships have no weapons. They do attack, but cause no durability losses.
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