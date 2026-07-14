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
/*                                                        ART                                                        */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Art showcase
___('art_showcase_title',   'EN', "The art of Future Invaders");
___('art_showcase_title',   'FR', "L'art de Future Invaders");
___('art_showcase_body_1',  'EN', <<<EOD
Every card in Future Invaders features its own unique artwork, all hand-drawn by {{link|social/credits|the game's designer}}. These illustrations are part of the game's worldbuilding, enhancing the flavor of cards.
EOD
);
___('art_showcase_body_1',  'FR', <<<EOD
Chaque carte de Future Invaders possède sa propre illustration sur mesure. Elles sont toutes dessinées par {{link|social/credits|le créateur du jeu}}.
EOD
);
___('art_showcase_body_2',  'EN', <<<EOD
The art style aims to feel as "human" as possible: it is purposefully flawed and imperfect, but sincere. Drawn in MS Paint with a computer mouse, the limitations of the tool and software create a naïve-art vibe that gives Future Invaders its unique (and hopefully charming) appearance.
EOD
);
___('art_showcase_body_2',  'FR', <<<EOD
Le style graphique se veut "humain" : il est volontairement imparfait, mais sincère. Réalisé sur MS Paint à la souris d'ordinateur, les limites de l'outil et du logiciel contribuent à créer une esthétique d'art naïf qui donne à Future Invaders son apparence unique (et charmante, j'espère).
EOD
);
___('art_showcase_body_3',  'EN', <<<EOD
Each faction has its own distinct visual identity: Terrans are orange and industrious, Invaders are brown and sleek, Organics are green and terrifying, Pirates are grey and scrappy, and Neutrals are purple and simple. Many cards are cross-faction, featuring illustrations that reflect their blended faction identities.
EOD
);
___('art_showcase_body_3',  'FR', <<<EOD
Chaque faction possède sa propre identité visuelle : les Terriens sont oranges et industriels, les Envahisseurs sont marrons et technologiques, les Organiques sont verts et terrifiants, les Pirates sont gris et débrouillards, et les Neutres sont violets et simples. De nombreuses cartes mélangent les factions, leurs illustrations reflètent la combinaison de leurs identités visuelles.
EOD
);
___('art_showcase_body_4',  'EN', <<<EOD
Below are a few examples of the artwork featured on Future Invaders cards.
EOD
);
___('art_showcase_body_4',  'FR', <<<EOD
Voici quelques exemples d’illustrations utilisées sur les cartes de Future Invaders.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                 PUBLISH THIS GAME                                                 */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Publish this game!
___('publish_title',  'EN', "Publish this game!");
___('publish_title',  'FR', "Publiez ce jeu !");
___('publish_body_1', 'EN', <<<EOD
Are you a board or card game publisher looking for your next project?
EOD
);
___('publish_body_1', 'FR', <<<EOD
Êtes-vous un éditeur de jeux de cartes ou de société à la recherche de votre prochain projet ?
EOD
);
___('publish_body_2', 'EN', <<<EOD
{{link|index|Future Invaders}} could be your next success story!
EOD
);
___('publish_body_2', 'FR', <<<EOD
{{link|index|Future Invaders}} pourrait bien être votre prochain succès !
EOD
);
___('publish_body_3', 'EN', <<<EOD
Below is a short Q&A answering common questions, followed by contact details if you're interested in further discussing the game.
EOD
);
___('publish_body_3', 'FR', <<<EOD
Vous trouverez ci-dessous une FAQ répondant aux questions les plus courantes, ainsi qu'une adresse de contact si vous souhaitez discuter du jeu plus en détail.
EOD
);


// Sales pitch
___('publish_question_pitch', 'EN', "What is the sales pitch for Future Invaders?");
___('publish_question_pitch', 'FR', "Quel est l'argumentaire de vente de Future Invaders ?");
___('publish_answer_pitch_1', 'EN', <<<EOD
Easy to learn, but challenging to master.
EOD
);
___('publish_answer_pitch_1', 'FR', <<<EOD
Rapide à apprendre, mais difficile à maîtriser.
EOD
);
___('publish_answer_pitch_2', 'EN', <<<EOD
Fewer rules than most tactical card games.
EOD
);
___('publish_answer_pitch_2', 'FR', <<<EOD
Moins de règles que les autres jeux de cartes tactiques.
EOD
);
___('publish_answer_pitch_3', 'EN', <<<EOD
Unified rules for both duels and multiplayer, without affecting balance.
EOD
);
___('publish_answer_pitch_3', 'FR', <<<EOD
Les mêmes règles s'appliquent aux duels et parties multijoueur, sans affecter l'équilibrage.
EOD
);
___('publish_answer_pitch_4', 'EN', <<<EOD
Low complexity makes it accessible to players unfamiliar with card games.
EOD
);
___('publish_answer_pitch_4', 'FR', <<<EOD
Une complexité faible, le rendant accessible aux joueurs qui n'ont pas l'habitude des jeux de cartes.
EOD
);
___('publish_answer_pitch_5', 'EN', <<<EOD
Minimal setup, all you need are 40 cards and a few dice.
EOD
);
___('publish_answer_pitch_5', 'FR', <<<EOD
Peu d'équipement nécessaire, 40 cartes et quelques dés suffisent.
EOD
);
___('publish_answer_pitch_6', 'EN', <<<EOD
{{link|game/features|Innovative mechanics}} never seen before in the genre.
EOD
);
___('publish_answer_pitch_6', 'FR', <<<EOD
Quelques {{link|game/features|mécaniques innovantes}} jamais vues dans un jeu de cartes.
EOD
);
___('publish_answer_pitch_7', 'EN', <<<EOD
Strict design principles that prevent and eliminate "unfun" elements.
EOD
);
___('publish_answer_pitch_7', 'FR', <<<EOD
Des restrictions de conception strictes pour éviter les éléments "anti-fun" du genre.
EOD
);
___('publish_answer_pitch_8', 'EN', <<<EOD
Near future science-fiction setting with no existing IP, well recieved by playtesters.
EOD
);
___('publish_answer_pitch_8', 'FR', <<<EOD
Un univers de science-fiction situé dans un future proche, thème qui plait aux testeurs.
EOD
);
___('publish_answer_pitch_9', 'EN', <<<EOD
Years of playtesting and refinement, earning praise from both newcomer and veteran playtesters.
EOD
);
___('publish_answer_pitch_9', 'FR', <<<EOD
Des années de playtesting, en ajustant le jeu jusqu'à plaire aux débutants comme aux confirmés.
EOD
);
___('publish_answer_pitch_10', 'EN', <<<EOD
Years of future content already planned and ready for development.
EOD
);
___('publish_answer_pitch_10', 'FR', <<<EOD
Des années de contenu futur déjà planifié et prêt à être développé.
EOD
);


// Target audience
___('publish_question_audience',  'EN', "What is the target audience for Future Invaders?");
___('publish_question_audience',  'FR', "Quel est le public cible de Future Invaders ?");
___('publish_answer_audience',    'EN', <<<EOD
Future Invaders targets casual to midcore board and card game players. It appeals to those looking for an accessible entry point into tactical card games, or to those who already enjoy the genre but want a fresh, back-to-basics experience.
EOD
);
___('publish_answer_audience',    'FR', <<<EOD
Des joueurs de jeux de cartes ou de société allant du profil "casual" au "midcore". Le jeu s'adresse à ceux qui cherchent une porte d'entrée vers les jeux de cartes tactiques, ainsi qu'à ceux qui apprécient déjà le genre et recherchent une expérience revenant aux fondamentaux du genre.
EOD
);


// How is it different
___('publish_question_difference',  'EN', "How is Future Invaders different from other card games?");
___('publish_question_difference',  'FR', "En quoi Future Invaders est-il différent des autres jeux ?");
___('publish_answer_difference',    'EN', <<<EOD
Playtesting has shown strong interest in two main areas: the setting, a near-future sci-fi world independent of any existing media franchise, and the clarity of its mechanics, which simplify gameplay compared to modern card games while still allowing for creative and complex interactions.
EOD
);
___('publish_answer_difference',    'FR', <<<EOD
Les séances de playtest ont montré un fort intérêt pour deux aspects du jeu en particulier : son univers, une science-fiction située dans un futur proche, indépendante de toute franchise existante, et la clarté de ses mécaniques, plus simples que celles des jeux de cartes modernes, tout en permettant des interactions complexes et créatives.
EOD
);


// Why publish a free game
___('publish_question_free',  'EN', "Why publish a game that's available for free?");
___('publish_question_free',  'FR', "Pourquoi publier un jeu disponible gratuitement ?");
___('publish_answer_free',    'EN', <<<EOD
The current beta version is available as a free print-and-play edition to generate interest and encourage players to try the game. Most playtesters have expressed interest in purchasing a professionally printed version, showing that the free version will not reduce future sales.
EOD
);
___('publish_answer_free',    'FR', <<<EOD
La version beta actuelle est disponible gratuitement en version imprimable, afin d'inciter des joueurs à essayer le jeu, et de créer de l'intérêt pour son futur. La majorité des testeurs ont exprimé leur souhait d'acheter une version imprimée de manière professionnelle, ce qui montre que la gratuité actuelle n'affectera pas les ventes futures.
EOD
);


// Development status
___('publish_question_status',  'EN', "What is the current development status?");
___('publish_question_status',  'FR', "Quel est l'état actuel du développement du jeu ?");
___('publish_answer_status',    'EN', <<<EOD
The game's development is fully complete. Years of playtesting and rebalancing have already been completed, and the core set is ready for release. The only remaining tasks are to fine-tune the appearance of the cards and rulebook, and to finalize the box set designs.
EOD
);
___('publish_answer_status',    'FR', <<<EOD
Le développement du jeu est terminé. Des années de playtests et d'équilibrage ont déjà eu lieu, et la version initiale est prête à être publiée. Les seules tâches restantes sont d'ajuster l'apparence des cartes et du livret de règles, et de concevoir les boîtes du jeu.
EOD
);


// Long term plans
___('publish_question_plans',  'EN', "What are the long-term plans for Future Invaders?");
___('publish_question_plans',  'FR', "Quels sont les plans à long terme ?");
___('publish_answer_plans',    'EN', <<<EOD
Several future expansions have already been drafted. Each will introduce a major new mechanic, refreshing gameplay while advancing the game's story and worldbuilding. Discussing these plans publicly would spoil future content for players. Further details can be discussed privately.
EOD
);
___('publish_answer_plans',    'FR', <<<EOD
Plusieurs extensions futures ont déjà été conçues, incluant de nombreuses nouvelles cartes. Chaque extension introduira une nouvelle mécanique majeure, qui rafraîchira l'expérience de jeu tout en faisant progresser l'histoire et l'univers du jeu. Pour davantage de détails sur le futur du jeu, une discussion privée serait préférable afin d'éviter les spoilers publics.
EOD
);


// Visuals and graphics
___('publish_question_graphics',  'EN', "Are the visuals and artworks finished?");
___('publish_question_graphics',  'FR', "Les visuels et illustrations sont-ils terminés ?");
___('publish_answer_graphics',    'EN', <<<EOD
Every card features {{link|game/art|its own artwork}}, all hand-drawn by the game's designer. These illustrations can be kept as they are, improved, or replaced. The card layouts, however, are unfinished and will require additional design work to refine and polish them.
EOD
);
___('publish_answer_graphics',    'FR', <<<EOD
Chaque carte possède {{link|game/art|sa propre illustration}}, toutes dessinées par le créateur du jeu. Ces illustrations peuvent être conservées telles quelles, améliorées ou remplacées. La mise en page des cartes est toutefois incomplète et nécessitera l'intervention d'un graphiste pour être améliorée et finalisée.
EOD
);


// Intellectual property
___('publish_question_ip',  'EN', "Who owns the rights to Future Invaders?");
___('publish_question_ip',  'FR', "Qui détient les droits de Future Invaders ?");
___('publish_answer_ip',    'EN', <<<EOD
The intellectual property, artwork, and worldbuilding of Future Invaders are original creations of Éric Bisceglia. I am open to licensing agreements for publication, while retaining creative ownership of the work.
EOD
);
___('publish_answer_ip',    'FR', <<<EOD
La propriété intellectuelle, les illustrations et l'univers de Future Invaders sont des créations originales d'Éric Bisceglia. Je suis ouvert à des accords de licence pour la publication, tout en conservant la propriété intellectuelle de l'œuvre.
EOD
);


// Website status
___('publish_question_website',  'EN', "How about this website?");
___('publish_question_website',  'FR', "Qu'en est-il de ce site web ?");
___('publish_answer_website',    'EN', <<<EOD
Designing a complete website for a game takes time and effort. Having a fully functional website already in place can save significant development time, and ownership can be transferred if desired. I'm open to continuing its development myself in the future.
EOD
);
___('publish_answer_website',    'FR', <<<EOD
Le développement complet du site du jeu est déjà achevé. Sa propriété peut être transférée si nécessaire, et je suis disposé à continuer à le gérer et le développer.
EOD
);


// Self-publishing
___('publish_question_self',  'EN', "Why not self-publish Future Invaders?");
___('publish_question_self',  'FR', "Pourquoi ne pas auto-publier Future Invaders ?");
___('publish_answer_self',    'EN', <<<EOD
Future Invaders is currently a one-man project. Working with a publisher would turn it into a team effort and further improve the game's quality.
EOD
);
___('publish_answer_self',    'FR', <<<EOD
Future Invaders est actuellement un projet individuel. Passer par un éditeur en ferait un travail d'équipe, ce qui contribuerait à en améliorer la qualité.
EOD
);


// Try
___('publish_question_try', 'EN', "Can we try playing the game?");
___('publish_question_try', 'FR', "Pouvons-nous essayer le jeu ?");
___('publish_answer_try',   'EN', <<<EOD
You can try Future Invaders right now! A complete print-and-play edition is available on the website. I can also send you a playtesting kit, or organize a demo session anywhere in France.
EOD
);
___('publish_answer_try',   'FR', <<<EOD
Une version imprimable complète du jeu est disponible sur le site. Je peux également vous envoyer un kit de playtest sur demande, ou me déplacer avec le matériel pour organiser une session de test n'importe où en France.
EOD
);


// Contact info
___('publish_question_contact', 'EN', "How can I contact you?");
___('publish_question_contact', 'FR', "Peut-on discuter ?");
___('publish_answer_contact',   'EN', <<<EOD
If you're interested in discussing the game, you can reach me at {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);
___('publish_answer_contact',   'FR', <<<EOD
Si vous souhaitez échanger à propos du jeu, vous pouvez me contacter via {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);
