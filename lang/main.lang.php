<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     HOMEPAGE                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Header
___('home_intro_title',     'EN', "Future Invaders");
___('home_intro_title',     'FR', "Future Invaders");
___('home_intro_subtitle',  'EN', "Tactical card game for all audiences");
___('home_intro_subtitle',  'FR', "Jeu de cartes tactique tout public");

// Introduction
___('home_intro_1', 'EN', <<<EOT
Future Invaders is a physical card game exploring the future of the Solar System, in which four factions battle for supremacy: Humans, Invaders, Organics, and Pirates.
EOT
);
// Introduction
___('home_intro_1', 'FR', <<<EOT
Future Invaders est un jeu de cartes physique explorant le futur du Système Solaire, dans lequel quatre factions s'affrontent : les Humains, les Envahisseurs, les Organiques, et les Pirates.
EOT
);
___('home_intro_2', 'EN', <<<EOT
Future Invaders is a beginner-friendly game, with simple rules and easy to understand gameplay. For more experienced card game players, the game offers a lot of tactical depth, and will test your strategy, deck building, and drafting skills.
EOT
);
___('home_intro_2', 'FR', <<<EOT
Future Invaders est accessible aux débutants, les règles sont simples et les mécaniques faciles à comprendre. Pour les joueurs de jeux de cartes plus expérimentés, le jeu dispose d'une grande profondeur tactique, et testera vos talents de stratégie et de construction de decks.
EOT
);
___('home_intro_3', 'EN', <<<EOT
Future Invaders is free, all cards can be printed, allowing you to play at home. Eventually, we are looking to either find a publisher or self-publish the game.
EOT
);
___('home_intro_3', 'FR', <<<EOT
Future Invaders est gratuit, toutes les cartes sont imprimables afin de pouvoir y jouer chez vous. À terme, le jeu sera publié, soit via un éditeur, soit en auto-publication.
EOT
);

// Under construction
___('home_wip_title',   'EN', "Under construction");
___('home_wip_title',   'FR', "En construction");
___('home_wip_body_1',  'EN', <<<EOT
This website is currently under development. You have found it at an early stage. Come back in a few weeks or months, then it should be complete.
EOT
);
___('home_wip_body_1',  'FR', <<<EOT
Ce site est en cours de développement. Vous l'avez trouvé un peu trop tôt. Revenez dans quelques semaines ou mois, d'ici-là il devrait être finalisé.
EOT
);
___('home_wip_body_2',  'EN', <<<EOT
See you soon!
EOT
);
___('home_wip_body_2',  'FR', <<<EOT
À bientôt !
EOT
);