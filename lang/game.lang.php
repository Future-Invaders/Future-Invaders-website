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
At the bottom of the page, you'll find {{link|pages/game/rules#reminders|reminder cards}} that summarize the rules, including a step-by-step guide to a turn's structure.
EOD
);
___('rules_body_3', 'FR', <<<EOD
En bas de la page, après les règles, des {{link|pages/game/rules#reminders|cartes de rappel}} résument les règles de manière plus concise, incluant un guide étape par étape de la structure d'un tour.
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