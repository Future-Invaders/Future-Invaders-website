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


// What makes it special
___('home_special_title',   'EN', "What makes Future Invaders special");
___('home_special_title',   'FR', "Qu'est-ce qui rend Future Invaders spécial");
___('home_special_body_1',  'EN', <<<EOT
As a brand-new game, Future Invaders had the opportunity to learn from the mistakes of similar card games. Its rules are simple and streamlined, yet provide ample room for tactical depth. Every card is thoughtfully designed to present unique strategic decisions, while strict design principles ensure that frustrating "anti-fun" mechanics are excluded from the game.
EOT
);
___('home_special_body_1',  'FR', <<<EOT
En tant que nouveau jeu, Future Invaders a eu l'opportunité de tirer des leçons des erreurs de conception des autres jeux de cartes similaires. Ses règles sont simples et claires, tout en permettant des interactions complexes. Chaque carte est conçue pour offrir des décisions stratégiques uniques. Des règles de conception strictes garantissent que les mécaniques "anti-fun" n'auront jamais leur place dans le jeu.
EOT
);
___('home_special_body_2',  'EN', <<<EOT
Future Invaders does not treat its players as customers. Created by a card game enthusiast for other enthusiasts, the game actively incorporates player feedback, meaning your suggestions could influence its design and balance. Unlike many other card games, Future Invaders does not use randomized booster packs. Instead, all cards are currently available for free as printable files, and will later be sold as complete collections.
EOT
);
___('home_special_body_2',  'FR', <<<EOT
Ce jeu ne traite pas ses joueurs comme de simples clients. Créé par un passionné de jeux de cartes, à destination d'autres passionnés, il valorise vos retours d'expérience. Les cartes ne sont pas vendues sous forme de boosters aléatoires : elles sont actuellement disponibles gratuitement à l'impression, et seront vendues dans le futur sous forme de collections complètes.
EOT
);


// Play the game
___('home_play_title',   'EN', "How to play Future Invaders");
___('home_play_title',   'FR', "Comment jouer à Future Invaders");
___('home_play_body_1',  'EN', <<<EOT
Start by reading {{external|./pages/game/rules|the rules}} to get a basic understanding of the game.
EOT
);
___('home_play_body_1',  'FR', <<<EOT
Tout d'abord, lisez {{external|./pages/game/rules|les règles}} pour comprendre les bases du jeu.
EOT
);
___('home_play_body_2',  'EN', <<<EOT
Then, {{external|./pages/tools/print|print out some cards}}, and invite your friends over.
EOT
);
___('home_play_body_2',  'FR', <<<EOT
Ensuite, {{external|./pages/tools/print|imprimez vos cartes}}, et invitez vos amis à jouer.
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
Join the conversation {{external|./pages/social/discord|on Discord}}, and follow us {{external|./pages/social/links|on social media}}.
EOT
);
___('home_community_body_2',  'FR', <<<EOT
Participez à la conversation {{external|./pages/social/discord|sur Discord}}, et suivez-nous {{external|./pages/social/links|sur les réseaux sociaux}}.
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