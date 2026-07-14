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
Future Invaders is a turn-based physical card game where players face off in a conflict taking place in our future Solar System.
EOT
);
// Introduction
___('home_intro_1', 'FR', <<<EOT
Future Invaders est un jeu de cartes physique au tour par tour où les joueurs s'affrontent dans un conflit spatial au cœur du Système solaire
EOT
);
___('home_intro_2', 'EN', <<<EOT
Designed to be beginner-friendly, the game is built around simple rules and straightforward gameplay. This apparent simplicity hides a trove of tactical depth, challenging your strategy, deck-building, and drafting skills.
EOT
);
___('home_intro_2', 'FR', <<<EOT
Le jeu est conçu pour être accessible aux débutants, grâce à des règles simples et des mécaniques intuitives. Derrière cette simplicité apparente se cache une grande profondeur tactique, qui mettra à l'épreuve vos talents de stratège.
EOT
);
___('home_intro_3', 'EN', <<<EOT
The game is currently free to play. All cards are available as print-and-play, allowing you to try it at home. Future Invaders is actively seeking a publisher and aims to become a retail card game.
EOT
);
___('home_intro_3', 'FR', <<<EOT
Le jeu est actuellement gratuit. Toutes les cartes sont disponibles en version imprimable, pour l'essayer chez vous. Future Invaders est activement à la recherche d'un éditeur, afin d'être commercialisé.
EOT
);
___('home_intro_4', 'EN', <<<EOT
{{external|./game/showcase|Click here to see the game being played}}
EOT
);
___('home_intro_4', 'FR', <<<EOT
{{external|./game/showcase|Cliquez ici pour voir le jeu en images}}
EOT
);


// Summary of the game
___('home_summary_title',   'EN', "Summary of the game");
___('home_summary_title',   'FR', "Résumé du jeu");
___('home_summary_body_1',  'EN', <<<EOT
Your goal in Future Invaders is to destroy your opponents' bases, while protecting your own base. You do this by drawing cards, some of which are ships and structures that populate a grid in front of you.
EOT
);
___('home_summary_body_1',  'FR', <<<EOT
Votre objectif dans Future Invaders est de détruire les bases de vos adversaires, tout en protégeant la vôtre. Pour ce faire, vous piochez des cartes, dont des vaisseaux et des structures que vous placez sur une grille de jeu devant vous.
EOT
);
___('home_summary_body_2',  'EN', <<<EOT
Ships attack your opponents each turn, and both ships and structures protect you from enemy assaults. You can also play action cards that change the state of the game, and reaction cards that alter actions or prevent them from happening.
EOT
);
___('home_summary_body_2',  'FR', <<<EOT
Les vaisseaux attaquent vos adversaires chaque tour, tandis que vos vaisseaux et structures vous protègent des attaques de vos adversaires. Vous pouvez également utiliser des actions, qui modifient le cours du jeu, et des réactions, qui altèrent les effets des actions ou les empêchent de se produire.
EOT
);
___('home_summary_body_3',  'EN', <<<EOT
Most cards cost resources, which you earn through your ships and structures on the grid. There are five different factions, each with their own unique resource and gameplay style. Mixing factions is allowed, and encouraged.
EOT
);
___('home_summary_body_3',  'FR', <<<EOT
La plupart des cartes coûtent des ressources, que vous accumulez grâce à vos vaisseaux et structures sur la grille de jeu. L'univers du jeu est composé de cinq factions, chacune disposant de sa propre ressource et de son propre style de jeu. Combiner les factions est autorisé, et même encouragé.
EOT
);
___('home_summary_body_4',  'EN', <<<EOT
The game can be played as a standard 1v1 duel, a multiplayer free-for-all, or in draft mode. Pre-assembled decks are available on the website to help you get started.
EOT
);
___('home_summary_body_4',  'FR', <<<EOT
Le jeu peut se jouer sous forme de duels, en multijoueur, ou en mode draft. Des paquets de cartes pré-assemblés sont proposés sur le site pour vous aider à bien débuter.
EOT
);
___('home_summary_body_5',  'EN', <<<EOT
{{external|./guides/rules|Click here to read the rules of the game}}
EOT
);
___('home_summary_body_5',  'FR', <<<EOT
{{external|./guides/rules|Cliquez ici pour lire les règles du jeu}}
EOT
);


// What makes it special
___('home_special_title',   'EN', "What makes Future Invaders special");
___('home_special_title',   'FR', "Qu'est-ce qui rend Future Invaders spécial");
___('home_special_body_1',  'EN', <<<EOT
Future Invaders has rules that are simple and streamlined, yet they provide ample room for tactical depth. Every card is designed to create unique strategic decisions, while strict design principles ensure that frustrating or "anti-fun" mechanics are excluded from the game.
EOT
);
___('home_special_body_1',  'FR', <<<EOT
Les règles de Future Invaders sont simples et claires, mais offrent malgré cela une grande profondeur tactique. Chaque carte est conçue pour proposer des choix stratégiques uniques, et des principes de conception stricts garantissent qu'aucune mécanique frustrante ou "anti-fun" ne sera ajoutée au jeu.
EOT
);
___('home_special_body_2',  'EN', <<<EOT
The game introduces several innovative mechanics to the genre. The scrap pile serves as a comeback mechanic, giving destroyed cards a second life, limiting frustrating one-sided matches. Multiplayer games feature a dynamic grid that shifts as players are eliminated. The reaction system allows for exciting chain reactions. Each turn, players must decide between filling their grid, drawing an extra card, or adding cards to their scrap pile, a choice that opens up a world of tactical possibilities.
EOT
);
___('home_special_body_2',  'FR', <<<EOT
Le jeu se distingue des autres par ses mécaniques innovantes. La casse sert de système de rattrapage, donnant une seconde vie aux cartes détruites et limitant les défaites unilatérales et frustrantes. Les parties multijoueur utilisent une grille dynamique, qui se repositionne au fur et à mesure que les joueurs sont éliminés. Le système de réaction permet de créer des chaînes de réactions spectaculaires. À chacun de leurs tours, les joueurs doivent choisir entre remplir leur grille, piocher une carte supplémentaire, ou ajouter des cartes à leur casse, un choix qui ouvre un vaste éventail de possibilités tactiques.
EOT
);
___('home_special_body_3',  'EN', <<<EOT
Designed by a card game enthusiast with a background in computer science, the game is balanced through statistical analysis of playtesting sessions, ensuring all factions combinations and all archetypes are equally viable to play.
EOT
);
___('home_special_body_3',  'FR', <<<EOT
Créé par un passionné de jeux de cartes issu du domaine de l'informatique, l'équilibrage du jeu s'appuie sur des analyses statistiques des sessions de jeu, afin de garantir que toutes les combinaisons de factions et tous les archétypes soient viables.
EOT
);
___('home_special_body_4',  'EN', <<<EOT
Each card features its own custom illustration, all hand drawn by the same artist, building a vibrant visual world with distinct faction identities.
EOT
);
___('home_special_body_4',  'FR', <<<EOT
Chaque carte est illustrée sur mesure, toutes dessinées par le même artiste, créant un univers visuel cohérent et vivant où chaque faction possède sa propre identité visuelle distincte.
EOT
);
___('home_special_body_5',  'EN', <<<EOT
{{external|./game/features|Click here for a list of the game's unique features}}.
EOT
);
___('home_special_body_5',  'FR', <<<EOT
{{external|./game/features|Cliquez ici pour voir la liste des originalités du jeu}}.
EOT
);


// Play the game
___('home_play_title',   'EN', "How to play Future Invaders");
___('home_play_title',   'FR', "Comment jouer à Future Invaders");
___('home_play_body_1',  'EN', <<<EOT
Start by {{external|./guides/rules|reading the rules}} to get a basic understanding of the game.
EOT
);
___('home_play_body_1',  'FR', <<<EOT
Commencez par {{external|./guides/rules|lire les règles}} pour comprendre les bases du jeu.
EOT
);
___('home_play_body_2',  'EN', <<<EOT
Then, {{external|./tools/print|print out some cards}} and invite your friends over.
EOT
);
___('home_play_body_2',  'FR', <<<EOT
Ensuite, {{external|./tools/print|imprimez des cartes}} et invitez vos amis.
EOT
);
___('home_play_body_3',  'EN', <<<EOT
Now you're ready to start playing.
EOT
);
___('home_play_body_3',  'FR', <<<EOT
Vous êtes maintenant prêts à jouer.
EOT
);
___('home_play_body_4',  'EN', <<<EOT
It's that simple.
EOT
);
___('home_play_body_4',  'FR', <<<EOT
C'est aussi simple que ça.
EOT
);
___('home_play_body_5',  'EN', <<<EOT
Have fun!
EOT
);
___('home_play_body_5',  'FR', <<<EOT
Amusez-vous bien !
EOT
);


// Join the community
___('home_community_title',   'EN', "Join the community");
___('home_community_title',   'FR', "Rejoignez la communauté");
___('home_community_body_1',  'EN', <<<EOT
Future Invaders is still in its development stages, making now the perfect time to join something new and exciting, and to help shape the game's design, balance, and future.
EOT
);
___('home_community_body_1',  'FR', <<<EOT
Future Invaders est encore en phase de développement, ce qui en fait le moment idéal pour faire partie de quelque chose de nouveau, et pour contribuer à façonner le design, l'équilibrage, et l'avenir du jeu.
EOT
);
___('home_community_body_2',  'EN', <<<EOT
Join the conversation on {{external|./social/discord|Discord}} or {{external|./social/irc|IRC}}, and follow the game's accounts on {{external|./social/links|social media}}.
EOT
);
___('home_community_body_2',  'FR', <<<EOT
Participez à la conversation sur {{external|./social/discord|Discord}} ou sur {{external|./social/irc|IRC}}, et suivez le jeu sur {{external|./social/links|les réseaux sociaux}}.
EOT
);
___('home_community_body_3',  'EN', <<<EOT
You might even find a local group to play with!
EOT
);
___('home_community_body_3',  'FR', <<<EOT
Vous y trouverez peut-être même un groupe local avec lequel jouer !
EOT
);