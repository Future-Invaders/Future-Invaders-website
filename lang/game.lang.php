<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    UPDATES                                                        */
/*                                                                                                                   */
/*********************************************************************************************************************/

// List updates
___('updates_title',  'EN', "Updates");
___('updates_title',  'FR', "Mises à jour");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                  UNIQUE FEATURES                                                  */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Intro
___('features_intro_title',   'EN', "Unique features");
___('features_intro_title',   'FR', "Originalités");
___('features_intro_body_1',  'EN', <<<EOD
Future Invaders has several innovative mechanics that set it apart from any existing card game.
EOD
);
___('features_intro_body_1',  'FR', <<<EOD
Future Invaders propose plusieurs mécaniques innovantes qui le distinguent des autres jeux de cartes.
EOD
);
___('features_intro_body_2',  'EN', <<<EOD
While it draws inspiration from the successes and lessons of other games in the genre, Future Invaders is built on fresh concepts that make it unique and engaging.
EOD
);
___('features_intro_body_2',  'FR', <<<EOD
Bien qu'il s'inspire d'autres jeux du genre, Future Invaders repose sur des concepts originaux, qui le rendent intéressant à découvrir.
EOD
);


// Grid
___('features_grid_title',  'EN', "Tactical grid: Strategy in positioning");
___('features_grid_title',  'FR', "Grille tactique : Positionnement stratégique");
___('features_grid_body_1', 'EN', <<<EOD
Each player deploys cards on a 4x2 grid, adding a layer of spatial strategy to the game that challenges them to think about the positioning of their Ships and Structures.
EOD
);
___('features_grid_body_1', 'FR', <<<EOD
Chaque joueur déploie ses cartes sur une grille 4x2, ajoutant une dimension stratégique spatiale au jeu qui les pousse à réfléchir au placement de leurs Vaisseaux et Structures.
EOD
);
___('features_grid_body_2', 'EN', <<<EOD
Placing cards on the grid shapes offensive and defensive strategies, rewarding clever tactics and anticipation of opponents' moves.
EOD
);
___('features_grid_body_2', 'FR', <<<EOD
Le positionnement des cartes sur la grille crée des opportunités offensives et défensives, récompensant les tactiques ingénieuses et l'anticipation des choix de positionnement des adversaires.
EOD
);


// Multiplayer
___('features_multi_title',   'EN', "Adaptive grid: Ever shifting battles");
___('features_multi_title',   'FR', "Grilles adaptives : Batailles en évolution");
___('features_multi_body_1',  'EN', <<<EOD
In multiplayer games, each player's grid splits into halves, facing their nearest neighbors.
EOD
);
___('features_multi_body_1',  'FR', <<<EOD
Dans les parties multijoueurs, la grille de chaque joueur se divise en deux moitiés, chacune faisant face à son voisin le plus proche.
EOD
);
___('features_multi_body_2',  'EN', <<<EOD
As players are eliminated from a game, grids dynamically reconfigure to face new opponents. This predictable yet evolving battlefield encourages strategic alliances, sudden betrayals, and ever-evolving social tactics around the table.
EOD
);
___('features_multi_body_2',  'FR', <<<EOD
Au fur et à mesure que des joueurs sont éliminés, les grilles se réorganisent dynamiquement pour faire face à de nouveaux adversaires. Ce champ de bataille, à la fois évolutif et prévisible, favorise les alliances stratégiques, les trahisons soudaines, et autres tactiques sociales autour d'une table de jeu en constante évolution.
EOD
);


// Card types
___('features_types_title',   'EN', "Card types: Depth in deck-building");
___('features_types_title',   'FR', "Types de cartes : Profondeur de construction de deck");
___('features_types_body_1',  'EN', <<<EOD
With four distinct card types: Ships, Structures, Actions, and Reactions, players have to take an extra layer of strategy into account when building their decks, carefully balancing card types for optimal synergies.
EOD
);
___('features_types_body_1',  'FR', <<<EOD
Avec quatre types de cartes distincts : Vaisseaux, Structures, Actions, et Réactions, les joueurs doivent intégrer une dimension supplémentaire dans la construction de leurs decks, en équilibrant soigneusement leurs cartes pour créer des synergies optimales.
EOD
);
___('features_types_body_2',  'EN', <<<EOD
Card types interact dynamically: Structures defend against Ships while offering utility, and Reactions can counter or modify Actions, flipping the tide of battle in unexpected ways.
EOD
);
___('features_types_body_2',  'FR', <<<EOD
Les types de cartes interagissent entre eux de manière dynamique : les Structures défendent contre les Vaisseaux tout en offrant des bénéfices, tandis que les Réactions modifient ou contrent les Actions, permettant de surprendre les adversaires avec des retournements de situations.
EOD
);


// Chain reactions
___('features_chain_title',   'EN', "Chain reactions: Thrilling escalations");
___('features_chain_title',   'FR', "Réactions en chaîne : Escalades excitantes");
___('features_chain_body_1',  'EN', <<<EOD
Players can stack Reactions in response to each other, creating cascades of effects until one Reaction takes precedence and the entire chain is resolved.
EOD
);
___('features_chain_body_1',  'FR', <<<EOD
Les joueurs peuvent enchaîner des Réactions en réponse les unes aux autres, créant des cascades d'effets jusqu'à ce qu'une Réaction prenne le dessus sur les autres et que toute la chaîne soit résolue.
EOD
);
___('features_chain_body_2',  'EN', <<<EOD
These unpredictable moments reward players who come prepared with the right cards and resources, turning small skirmishes into thrilling tests of strategy from which only one player can emerge victorious.
EOD
);
___('features_chain_body_2',  'FR', <<<EOD
Ces moments imprévisibles récompensent les joueurs les mieux préparés, transformant de simples escarmouches en affrontements stratégiques palpitants dont seul le meilleur stratège sortira vainqueur.
EOD
);


// Scrap pile
___('features_scrap_title',   'EN', "Scrap pile: Built-in comeback mechanic");
___('features_scrap_title',   'FR', "Casse : Une mécanique de rebond intégrée");
___('features_scrap_body_1',  'EN', <<<EOD
Destroyed Ships and Structures are not removed from the game, but rather sent to their owner's scrap pile, ready to be recycled into resources at any time.
EOD
);
___('features_scrap_body_1',  'FR', <<<EOD
Les Vaisseaux et Structures détruits ne sont pas retirés du jeu, mais envoyés dans la casse de leur propriétaire, prêts à être recyclés en ressources à tout moment.
EOD
);
___('features_scrap_body_2',  'EN', <<<EOD
This mechanic keeps players in the game even after losing entire armadas, creating opportunities for dynamic games with exciting comebacks.
EOD
);
___('features_scrap_body_2',  'FR', <<<EOD
Cette mécanique permet aux joueurs de se maintenir dans la partie même après avoir perdu des armadas entières, ouvrant la voie à des parties dynamiques pleines de retournements de situations.
EOD
);


// Draw or deploy
___('features_draw_title',  'EN', "Draw or deploy: Tactical options every turn");
___('features_draw_title',  'FR', "Piocher ou déployer : Option tactique à chaque tour");
___('features_draw_body_1', 'EN', <<<EOD
Every turn presents a strategic dilemma: deploy Ships and Structures to strengthen your presence on the grid, or draw an extra card to expand your future options.
EOD
);
___('features_draw_body_1', 'FR', <<<EOD
Chaque tour offre un dilemme stratégique : déployer des Vaisseaux et Structures pour renforcer sa présence sur la grille, ou piocher une carte supplémentaire pour augmenter ses options futures.
EOD
);
___('features_draw_body_2', 'EN', <<<EOD
This seemingly simple choice adds an impactful layer of strategic depth to the game, forcing players to balance immediate needs with long-term planning.
EOD
);
___('features_draw_body_2', 'FR', <<<EOD
Ce choix en apparence simple ajoute une grande profondeur stratégique au jeu, forçant les joueurs à équilibrer leurs besoins immédiats avec leurs plans à long terme.
EOD
);


// Choices
___('features_choices_title',   'EN', "Choices: Every card is a decision");
___('features_choices_title',   'FR', "Choix : Chaque carte est une décision");
___('features_choices_body_1',  'EN', <<<EOD
Other than the basic building blocks of each faction, every card in the game offers a choice to the players, ensuring games don't feel linear and every turn comes with impactful decisions.
EOD
);
___('features_choices_body_1',  'FR', <<<EOD
À l'exception des cartes de base de chaque faction, toutes les cartes du jeu offrent des choix aux joueurs, garantissant que les parties ne soient jamais linéaires.
EOD
);
___('features_choices_body_2',  'EN', <<<EOD
Players must adapt to an ever-evolving game state, but the versatility of each card means they remain useful in most scenarios, making games unpredictable and infinitely replayable.
EOD
);
___('features_choices_body_2',  'FR', <<<EOD
Les joueurs doivent s'adapter à des états de jeu en changement constant, la polyvalence des cartes garantit qu'elles sont utiles dans la majorité des scénarios, rendant les parties imprévisibles et rejouables à l'infini.
EOD
);


// Rarity
___('features_rarity_title',  'EN', "Meaningful rarity: Cards that feel truly special");
___('features_rarity_title',  'FR', "Rareté littérale : Des cartes vraiment spéciales");
___('features_rarity_body_1', 'EN', <<<EOD
Rarity is tied to a card's power level, not its monetary value. Some cards are stronger than others, but their numbers are limited by deck building restrictions to keep them in check.
EOD
);
___('features_rarity_body_1', 'FR', <<<EOD
La rareté est liée à la puissance d'une carte, et non à sa valeur monétaire. Certaines cartes sont plus puissantes, mais leur nombre est limité par des restrictions lors de la construction des decks.
EOD
);
___('features_rarity_body_2', 'EN', <<<EOD
Deploying a Pinnacle level Ship, powerful enough to take on an entire armada on its own, is a truly special feeling. These rare cards enhance gameplay, but each of them has a drawback that keeps them from breaking the game's balance.
EOD
);
___('features_rarity_body_2', 'FR', <<<EOD
Déployer un Vaisseau Suprême, capable de faire face à une armada entière à lui seul, est une expérience mémorable. Ces cartes rares enrichissent l'expérience de jeu, mais chacune d'entre elle vient avec des inconvénients intégrés afin de préserver l'équilibre du jeu.
EOD
);


// Anti-fun restrictions
___('features_restrictions_title',  'EN', "Design restrictions: Keeping the game fair and fun");
___('features_restrictions_title',  'FR', "Restrictions de design : Garder le jeu juste et amusant");
___('features_restrictions_body_1', 'EN', <<<EOD
Having learned from decades of card games, Future Invaders has design restrictions which ensure no mechanic that feels unfair or "unfun" ever makes it into the game.
EOD
);
___('features_restrictions_body_1', 'FR', <<<EOD
S'appuyant sur des décennies d'expérience des autres jeux de cartes, Future Invaders inclut des restrictions de conception qui s'assurent que le jeu ne contiendra pas de mécaniques injustes ou "anti-fun".
EOD
);
___('features_restrictions_body_2', 'EN', <<<EOD
Players won't face one sided denial such as forced discards or resource starvation, which could ruin accessibility and enjoyment. This design restruction ensures the game remains engaging for everyone.
EOD
);
___('features_restrictions_body_2', 'FR', <<<EOD
Les joueurs ne seront pas confrontés à des situations énervantes telles que l'obligation de se défausser de cartes, ou à des privations totales de ressources, qui peuvent nuire au plaisir et à l'accessibilité du jeu. Ces restrictions garantissent une expérience agréable et équitable pour tous.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     SHOWCASE                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Gameplay showcase
___('gameplay_pictures_title',      'EN', "Gameplay pictures");
___('gameplay_pictures_title',      'FR', "Images du jeu");
___('gameplay_cards_title',         'EN', "Sample cards");
___('gameplay_cards_title',         'FR', "Exemples de cartes");
___('gameplay_art_title',           'EN', "Art showcase");
___('gameplay_art_title',           'FR', "Galerie d'art du jeu");
___('gameplay_videos_title',        'EN', "Gameplay videos");
___('gameplay_videos_title',        'FR', "Vidéos du jeu");
___('gameplay_videos_game_body_1',  'EN', <<<EOD
There are currently no gameplay videos available.
EOD
);
___('gameplay_videos_game_body_1',  'FR', <<<EOD
Il n'y a actuellement pas de vidéos du jeu disponibles.
EOD
);
___('gameplay_videos_game_body_2',  'EN', <<<EOD
The only existing videos at the moment portray an older version of the game. New videos reflecting the current state of the game will be made soon.
EOD
);
___('gameplay_videos_game_body_2',  'FR', <<<EOD
Les vidéos existantes représentent une ancienne version du jeu. De nouvelles vidéos reflétant l'état actuel du jeu seront bientôt disponibles.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                  DESIGN DOCUMENT                                                  */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Design doc dev page
___('design_doc_dev_title',   'EN', "Design document");
___('design_doc_dev_title',   'FR', "Document de design");
___('design_doc_dev_body_1',  'EN', <<<EOD
Are you curious to see how a game is born? Or how it evolves over time? In the spirit of {{link|tools/source|transparency}}, Future Invaders' design document is available to the public.
EOD
);
___('design_doc_dev_body_1',  'FR', <<<EOD
Êtes-vous curieux de voir comment un jeu naît ? Ou comment il évolue au fil du temps ? Dans un esprit de {{link|tools/source|transparence}}, le document de design de Future Invaders est partagé publiquement sur le site.
EOD
);
___('design_doc_dev_body_2',  'EN', <<<EOD
In the coming months, a new, improved version of this document will be added, serving as a supplement to the original version. Until then, only the original document is available. Some of its contents are outdated, compared to the current state of the game.
EOD
);
___('design_doc_dev_body_2',  'FR', <<<EOD
Une version mise à jour de ce document est prévue dans les mois à venir, en complément de la version actuelle. En attendant, seul le document original est disponible, ce qui signifie que certains contenus de ce document ne sont pas à jour.
EOD
);
___('design_doc_dev_english', 'EN', <<<EOD
The design document is only available in English, it currently has no French translation.
EOD
);
___('design_doc_dev_english', 'FR', <<<EOD
Le document de design est uniquement disponible en anglais, il n'a pas de traduction française pour le moment.
EOD
);
___('design_doc_dev_link',    'EN', <<<EOD
{{external_popup|https://e-bis.fr/games/documents/Futureinvaders/|Click here to read the design document}}.
EOD
);
___('design_doc_dev_link',    'FR', <<<EOD
{{external_popup|https://e-bis.fr/games/documents/Futureinvaders/|Cliquez ici pour lire le document de design}}.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                 PUBLISH THIS GAME                                                 */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Publish this game!
___('publish_title',  'EN', "Publish this game!");
___('publish_title',  'FR', "Éditez ce jeu !");
___('publish_body',   'EN', <<<EOD
Are you a board or card game publisher looking for a new project? Future Invaders could be your next success story! Years of design and development have already gone into the game, with only the final steps remaining. Below is a Q&A addressing common questions, followed by contact information if you're interested in further discussing the publishing process.
EOD
);
___('publish_body',   'FR', <<<EOD
Êtes-vous un éditeur de jeux de cartes ou de société à la recherche d'un nouveau projet ? Future Invaders pourrait bien être votre prochain succès ! Des années de développement ont déjà été consacrées à ce jeu, seules les étapes finales restent. Vous trouverez ci-dessous une FAQ couvrant les questions les plus courantes, ainsi qu'une adresse de contact si vous souhaitez en discuter plus en détail.
EOD
);


// Sales pitch
___('publish_question_pitch', 'EN', "What is the sales pitch for Future Invaders?");
___('publish_question_pitch', 'FR', "Quel est l'argumentaire de vente de Future Invaders ?");
___('publish_answer_pitch',   'EN', <<<EOD
Quick to learn, challenging to master. Fewer rules than the average tactical card game. Little equipment required, all you need are 30 cards and a few dice. Strict design restrictions to avoid replicating the "unfun" aspects of the genre. Near future science-fiction, an underused theme in card games. Years of future content already planned and designed. With universal acclaim from both new and experienced playtesters, this game is primed for success!
EOD
);
___('publish_answer_pitch',   'FR', <<<EOD
Rapide à apprendre, difficile à maîtriser. Moins de règles que le jeu de cartes tactique moyen. Peu d'équipement nécessaire, 30 cartes et quelques dés suffisent. Des règles de conception strictes évitent les éléments "anti-fun" des autres jeux. Science-fiction située dans le future proche, thème rare dans les jeux de cartes. Des années de contenus futurs déjà planifiés. Un succès unanime auprès de testeurs débutants comme confirmés.
EOD
);


// Target audience
___('publish_question_audience',  'EN', "What is the target audience for Future Invaders?");
___('publish_question_audience',  'FR', "Quel est le public cible de Future Invaders ?");
___('publish_answer_audience',    'EN', <<<EOD
Casual to midcore board and card game players. This game appeals to people looking for an accessible entry into tactical card games, or to those who already enjoy the genre but want a fresh, back-to-basics experience.
EOD
);
___('publish_answer_audience',    'FR', <<<EOD
Des joueurs de jeux de cartes ou de société allant de "casual" à "midcore". Ce jeu est destiné à ceux qui cherchent une porte d'entrée dans les jeux de cartes tactiques, ainsi qu'à ceux qui aiment déjà le genre et cherchent une expérience qui revient à ses fondamentaux.
EOD
);


// How is it different
___('publish_question_difference',  'EN', "How is Future Invaders different from other card games?");
___('publish_question_difference',  'FR', "En quoi Future Invaders est différent des autres jeux ?");
___('publish_answer_difference',    'EN', <<<EOD
 Playtesting shows strong interest in two main areas: the setting, which offers a near-future sci-fi world unconnected to existing media franchises, and the mechanics, which simplify gameplay compared to modern card games while still allowing for creative and complex interactions.
EOD
);
___('publish_answer_difference',    'FR', <<<EOD
Les séances de playtesting ont montré un fort intérêt pour deux aspects du jeu : son univers, de la science-fiction située dans le futur proche sans pour autant être lié à une franchise existante, et ses mécaniques, plus simples que les jeux de cartes modernes, tout en permettant des interactions complexes et créatives.
EOD
);


// Why publish a free game
___('publish_question_free',  'EN', "Why publish a game that's available for free?");
___('publish_question_free',  'FR', "Pourquoi publier un jeu disponible gratuitement ?");
___('publish_answer_free',    'EN', <<<EOD
 The current beta version is available for free as print-and-play to help generate interest and get players to try the game. Most playtesters have expressed a desire to buy a professionally printed version, showing that the free version will not reduce future sales.
EOD
);
___('publish_answer_free',    'FR', <<<EOD
La version beta actuelle est imprimable gratuitement chez soi, dans le but de susciter l'intérêt des gens et de les inciter à essayer le jeu. La majorité des testeurs ont exprimé leur souhait d'acheter une version imprimée professionnellement, ce qui montre que la gratuité actuelle n'affectera pas les ventes futures.
EOD
);


// Which business model
___('publish_question_model',  'EN', "What is this game's business model?");
___('publish_question_model',  'FR', "Quel est le modèle économique du jeu ?");
___('publish_answer_model',    'EN', <<<EOD
The tactical card game market is crowded with the "random booster" model, which many playtesters have criticized. Future Invaders will be sold as prebuilt decks of 45 cards. The core set includes 12 such decks, and each expansion will add 12 to 16 more. Special packages of 150 and 300 cards will also be available for "draft mode". This model has received positive feedback from playtesters, who have expressed a willingness to buy 2 to 10 items per expansion, but remains open to discussion.
EOD
);
___('publish_answer_model',    'FR', <<<EOD
Le marché des jeux de cartes tactiques est dominé par le modèle des "boosters aléatoires", critiqué par de nombreux testeurs. Future Invaders se vendra sous forme d'arsenaux pré-assemblés de 45 cartes, avec 12 paquets dans le set de base, et 12 à 16 par extension future. Des collections de 150 et 300 cartes seront également disponibles pour le mode "draft". Ce modèle a reçu des retours positifs des testeurs, qui se disent prêts à acheter 2 à 10 paquets par extension, bien que le modèle reste ouvert à discussion.
EOD
);


// Long term plans
___('publish_question_plans',  'EN', "What are the long-term plans for Future Invaders?");
___('publish_question_plans',  'FR', "Quels sont les plans au long terme ?");
___('publish_answer_plans',    'EN', <<<EOD
Multiple future expansions have been drafted, with new card designs already done. Each expansion will introduce a new major mechanic, refreshing gameplay along with major progress in the game's story and worldbuilding. Discussing future plans for the game would act as a spoiler to its players. If you are looking to know more, this topic will have to be discussed privately.
EOD
);
___('publish_answer_plans',    'FR', <<<EOD
Plusieurs extensions futures ont déjà été conçues, incluant de nombreuses nouvelles cartes. Chaque extension introduira une nouvelle mécanique majeure, qui rafraichira l'expérience de jeu, tout en faisant progresser son histoire et son univers. Pour plus de détails sur les projets futurs, une discussion en privé serait plus appropriée afin d'éviter les spoilers publics.
EOD
);


// Intellectual property
___('publish_question_ip',  'EN', "What is the status of the game's intellectual property?");
___('publish_question_ip',  'FR', "Quel est le statut de la propriété intellectuelle du jeu ?");
___('publish_answer_ip',    'EN', <<<EOD
The IP is currently owned by the author, Éric Bisceglia. The Future Invaders card game is meant to be the centerpiece of a larger universe, which will include free online games and novellas developed by the author. Publishing the game would entail shared IP rights, with card game rights going to the publisher, while the author retains rights to produce non-commercial works within its universe.
EOD
);
___('publish_answer_ip',    'FR', <<<EOD
L'auteur, Éric Bisceglia, détient actuellement la propriété intellectuelle. Future Invaders sera au cœur d'un univers comprenant d'autres jeux en ligne gratuits ainsi que des nouvelles, développés par l'auteur. La publication du jeu implique un partage des droits : les droits sur le jeu de cartes reviendront à l'éditeur, tandis que l'auteur conservera le droit de créer des contenus non commerciaux dans l'univers du jeu.
EOD
);


// Website status
___('publish_question_website',  'EN', "How about this website?");
___('publish_question_website',  'FR', "Qu'en est-il de ce site web ?");
___('publish_answer_website',    'EN', <<<EOD
Designing a complete website for a game is a long and complex task. Having an already completed website will save a lot of development time, and its ownership can be transferred if desired, although I am willing to continue developing it in the future.
EOD
);
___('publish_answer_website',    'FR', <<<EOD
Le développement complet d'un site pour le jeu est déjà réalisé, un atout qui économisera du temps de développement. Sa propriété peut être transférée si nécessaire, bien que je sois disposé à continuer à le gérer.
EOD
);


// Self-publishing
___('publish_question_self',  'EN', "Why not self-publish Future Invaders?");
___('publish_question_self',  'FR', "Pourquoi ne pas auto-publier Future Invaders ?");
___('publish_answer_self',    'EN', <<<EOD
Future Invaders is envisioned as a long-term project, not a one-off game. Crowdfunding could fund the initial core set but wouldn't guarantee the quality or stability that comes with an established publisher.
EOD
);
___('publish_answer_self',    'FR', <<<EOD
Future Invaders est envisagé comme un projet à long terme. Bien que le crowdfunding pourrait financer le lancement du jeu, il n'apporterait pas la stabilité ni la qualité qu'un éditeur établi peut garantir sur le long terme.
EOD
);


// Contact info
___('publish_question_contact', 'EN', "How can I contact you?");
___('publish_question_contact', 'FR', "Peut-on discuter ?");
___('publish_answer_contact',   'EN', <<<EOD
If you're interested in publishing the game, please contact me at {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);
___('publish_answer_contact',   'FR', <<<EOD
Si vous êtes intéressé par la publication du jeu, contactez-moi à l’adresse {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);
