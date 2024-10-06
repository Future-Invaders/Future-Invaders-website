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


// Rules cards
___('rules_cards_alt',  'EN', "Rule card");
___('rules_cards_alt',  'FR', "Carte de règles");