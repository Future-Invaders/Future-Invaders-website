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
Future Invaders is a physical card game set in a war-torn future Solar System, where four factions are caught in a needless war: Humans, Invaders, Organics, and Pirates.
EOT
);
// Introduction
___('home_intro_1', 'FR', <<<EOT
Future Invaders est un jeu de cartes physique qui explore le futur de notre Système Solaire, où quatre factions s'affrontent : les Humains, les Envahisseurs, les Organiques et les Pirates.
EOT
);
___('home_intro_2', 'EN', <<<EOT
Designed to be beginner-friendly, the game features simple rules and straightforward gameplay. For seasoned card game enthusiasts, it offers rich tactical depth, challenging your strategy, deck building, and drafting skills.
EOT
);
___('home_intro_2', 'FR', <<<EOT
Accessible aux débutants grâce à des règles simples et des mécaniques faciles à comprendre, le jeu offre aussi une grande profondeur tactique pour les joueurs expérimentés, mettant à l'épreuve vos talents de stratégie et de construction de decks.
EOT
);
___('home_intro_3', 'EN', <<<EOT
The game is entirely free to play. All cards are available for print-and-play, so you can enjoy it at home. In the future, we aim to either secure a publisher or self-publish the game.
EOT
);
___('home_intro_3', 'FR', <<<EOT
Future Invaders est gratuit. Toutes les cartes sont disponibles à l'impression pour jouer chez vous. À terme, le jeu sera publié, soit via un éditeur, soit en auto-édition.
EOT
);


// Summary of the game
___('home_summary_title',   'EN', "Summary of the game");
___('home_summary_title',   'FR', "Résumé du jeu");
___('home_summary_body_1',  'EN', <<<EOT
Your goal in Future Invaders is to destroy your opponents' bases, while protecting your own. You do this by drawing cards, some of which are ships and structures, with which you populate a small grid in front of you.
EOT
);
___('home_summary_body_1',  'FR', <<<EOT
Votre objectif dans Future Invaders est de détruire les bases de vos adversaires, tout en protégeant la vôtre. Pour ce faire, vous piochez des cartes, dont certaines sont des vaisseaux et des structures, que vous placez sur une grille de jeu devant vous.
EOT
);
___('home_summary_body_2',  'EN', <<<EOT
Ships attack your opponents every turn, and both ships and structures protect you from enemy attacks. You can also play action cards, which change the state of the game, and reaction cards, which alter actions or prevent them from happening.
EOT
);
___('home_summary_body_2',  'FR', <<<EOT
Les vaisseaux attaquent vos adversaires chaque tour, et les vaisseaux comme les structures vous protègent des attaques de vos adversaires. Vous pouvez également jouer des cartes d'action, qui changent l'état du jeu, et des cartes de réaction, qui modifient les effets des actions ou les empêchent de se produire.
EOT
);
___('home_summary_body_3',  'EN', <<<EOT
Most cards cost resources, which you earn by having ships and structures on the grid. There are five different factions, each with their own unique resource and gameplay style. Mixing factions is allowed, and encouraged.
EOT
);
___('home_summary_body_3',  'FR', <<<EOT
La plupart des cartes coûtent des ressources, que vous accumulez grâce aux vaisseaux et structures sur la grille de jeu. Il existe cinq factions différentes, chacune disposant de sa propre ressource et de son propre style de jeu. Mélanger les factions est autorisé, et même encouragé.
EOT
);
___('home_summary_body_4',  'EN', <<<EOT
The game can be played as a regular 1v1 battle, as a multiplayer battle, or in draft mode. Pre-assembled decks of cards are suggested on the website, to get you started.
EOT
);
___('home_summary_body_4',  'FR', <<<EOT
Le jeu peut se jouer sous forme de duels, de combats multijoueurs, ou en mode draft. Des paquets de cartes pré-assemblés sont proposés sur le site pour vous aider à commencer.
EOT
);
___('home_summary_body_5',  'EN', <<<EOT
{{external|./guides/rules|Click here to read the complete rules of the game}}
EOT
);
___('home_summary_body_5',  'FR', <<<EOT
{{external|./guides/rules|Cliquez ici pour lire les règles complètes du jeu}}
EOT
);


// What makes it special
___('home_special_title',   'EN', "What makes Future Invaders special");
___('home_special_title',   'FR', "Qu'est-ce qui rend Future Invaders spécial");
___('home_special_body_1',  'EN', <<<EOT
As a brand-new game, Future Invaders had the opportunity to learn from the successes and failures of other similar card games. Its rules are simple and streamlined, yet provide ample room for tactical depth. Every card is designed to present unique strategic decisions, while strict overall design principles ensure that frustrating "anti-fun" mechanics are excluded from the game.
EOT
);
___('home_special_body_1',  'FR', <<<EOT
En tant que tout nouveau jeu, Future Invaders a eu l'opportunité de tirer des leçons des succès et échecs des autres jeux de cartes similaires. Ses règles sont simples et claires, tout en permettant des interactions complexes. Chaque carte est conçue pour offrir des décisions stratégiques uniques. Des règles de conception strictes garantissent que les mécaniques "anti-fun" n'auront jamais leur place dans le jeu.
EOT
);
___('home_special_body_2',  'EN', <<<EOT
It stands apart from other games in the genre thanks to its innovative mechanics. The scrap pile serves as a comeback mechanism, avoiding one-sided matches. The multiplayer mode features a dynamic grid that shifts as players are eliminated. The reaction system allows for exciting chain reactions. Each turn, players must decide between drawing an extra card or filling their game grid, a decision that opens up a world of tactical possibilities.
EOT
);
___('home_special_body_2',  'FR', <<<EOT
Il se distingue des autres jeux similaires par ses mécaniques innovantes. La casse sert de mécanisme de rattrapage, donnant une chance aux joueurs en difficulté de revenir dans la partie. Le mode multijoueur inclut une grille dynamique, qui se repositionne au fur et à mesure que les bases sont détruites. Le système de réaction permet de créer des chaînes de réactions excitantes. Chaque tour, les joueurs doivent choisir entre piocher une carte supplémentaire ou remplir leur grille de jeu, une décision qui ouvre de nombreuses possibilités tactiques.
EOT
);
___('home_special_body_3',  'EN', <<<EOT
Future Invaders does not treat its players as customers. Created by a card game enthusiast for other enthusiasts, the game actively incorporates player feedback, meaning your suggestions could influence its design and balance. Future Invaders does not use randomized booster packs. Instead, it will be a living card game: all cards are currently available for free as printable files and will later be sold as complete collections.
EOT
);
___('home_special_body_3',  'FR', <<<EOT
Ce jeu ne traite pas ses joueurs comme de simples clients. Créé par un passionné de jeux de cartes, à destination d'autres passionnés, il valorise vos retours d'expérience. Les cartes ne sont pas vendues sous forme de boosters aléatoires. Future Invaders est un jeu de cartes vivant : il est actuellement disponible gratuitement à l'impression, et sera vendu dans le futur sous forme de collections complètes.
EOT
);
___('home_special_body_4',  'EN', <<<EOT
{{external|./game/features|Click here for a list of the game's unique features}}.
EOT
);
___('home_special_body_4',  'FR', <<<EOT
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
Tout d'abord, {{external|./guides/rules|lisez les règles}} pour comprendre les bases du jeu.
EOT
);
___('home_play_body_2',  'EN', <<<EOT
Then, {{external|./tools/print|print out some cards}}, and invite your friends over.
EOT
);
___('home_play_body_2',  'FR', <<<EOT
Ensuite, {{external|./tools/print|imprimez vos cartes}}, et invitez vos amis à jouer.
EOT
);
___('home_play_body_3',  'EN', <<<EOT
Now you can start playing. It's that simple. Have fun!
EOT
);
___('home_play_body_3',  'FR', <<<EOT
Maintenant, vous pouvez jouer. C'est aussi simple que ça ! Amusez-vous bien !
EOT
);


// Join the community
___('home_community_title',   'EN', "Join the community");
___('home_community_title',   'FR', "Rejoignez la communauté");
___('home_community_body_1',  'EN', <<<EOT
Future Invaders is still in its early stages of growth, making this the perfect time to become part of something new and exciting before it grows too big.
EOT
);
___('home_community_body_1',  'FR', <<<EOT
Future Invaders est un jeune jeu en pleine croissance. C'est le moment idéal pour rejoindre sa communauté et avoir l'opportunité unique d'en faire partie avant qu'il ne devienne populaire.
EOT
);
___('home_community_body_2',  'EN', <<<EOT
Join the conversation {{external|./social/discord|on Discord}}, and follow us {{external|./social/links|on social media}}.
EOT
);
___('home_community_body_2',  'FR', <<<EOT
Participez à la conversation {{external|./social/discord|sur Discord}}, et suivez-nous {{external|./social/links|sur les réseaux sociaux}}.
EOT
);
___('home_community_body_3',  'EN', <<<EOT
We’d love to have you with us !
EOT
);
___('home_community_body_3',  'FR', <<<EOT
Nous avons hâte de vous accueillir parmi nous !
EOT
);