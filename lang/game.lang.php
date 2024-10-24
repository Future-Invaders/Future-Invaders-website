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
___('rules_body_1', 'EN', <<<EOD
First, you must acquire a copy of the game. Currently, Future Invaders does not yet have a publisher. The only way to acquire a copy of the game is to download cards from this website and to print them yourself.
EOD
);
___('rules_body_1', 'FR', <<<EOD
Tout d'abord, vous devez vous procurer une copie du jeu. Pour le moment, Future Invaders n'a pas encore d'éditeur. La seule façon d'obtenir une copie du jeu est de télécharger les cartes depuis ce site, puis de les imprimer vous-même.
EOD
);
___('rules_body_2', 'EN', <<<EOD
Then, you can learn to play Future Invaders by reading the rules below. Compared to most other card battling games, Future Invaders has simpler rules: don't be scared by the apparent complexity, give it a try, playing the game is the best way to learn.
EOD
);
___('rules_body_2', 'FR', <<<EOD
Ensuite, vous pouvez apprendre à jouer à Future Invaders en lisant les règles ci-dessous. Par rapport à la majorité des autres jeux de cartes stratégiques, Future Invaders a des règles simples : n'ayez pas peur de la complexité apparente, essayez-le, c'est en jouant que l'on apprend le mieux.
EOD
);
___('rules_body_3', 'EN', <<<EOD
At the bottom of the page, after the rules, some {{link|pages/game/rules#reminders|reminder cards}} recap the rules in a more digestible way, including a step by step summary of the structure of a turn.
EOD
);
___('rules_body_3', 'FR', <<<EOD
En bas de la page, après les règles, des {{link|pages/game/rules#reminders|cartes de rappel}} récapitulent les règles de façon plus digeste, incluant un résumé étape par étape de la structure d'un tour.
EOD
);
___('rules_body_4', 'EN', <<<EOD
The rules are presented on cards, which allows you to {{link|404|print them at home}}.
EOD
);
___('rules_body_4', 'FR', <<<EOD
Les règles sont présentées sous forme de cartes, ce qui vous permet de les {{link|404|imprimer chez vous}}.
EOD
);


// Rules cards
___('rules_cards_title', 'EN', "Game rules");
___('rules_cards_title', 'FR', "Règles du jeu");


// Reminder cards
___('reminder_cards_title', 'EN', "Rule reminders");
___('reminder_cards_title', 'FR', "Rappels des règles");