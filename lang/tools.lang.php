<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    PRINT CARDS                                                    */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Print at home: Intro
___('print_title',  'EN', "Print cards at home");
___('print_title',  'FR', "Impression à domicile");
___('print_image',  'EN', "Cards being printed");
___('print_image',  'FR', "Cartes en cours d'impression");
___('print_body',   'EN', <<<EOD
Until Future Invaders is published and available for sale, you can print the cards needed to play the game yourself, at home. This page explains the process. Once you're familiar with it, you can visit the pages listing the {{link|cards/print_cards|cards}}, {{link|cards/print_arsenals|arsenals}}, and {{link|cards/print_extra|extra contents}} to print them.
EOD
);
___('print_body',   'FR', <<<EOD
En attendant que Future Invaders soit publié et disponible à la vente, vous pouvez imprimer chez vous les cartes nécessaires pour jouer. Cette page vous explique la procédure. Une fois que vous aurez compris comment faire, vous pourrez consulter les pages des {{link|cards/print_cards|cartes}}, {{link|cards/print_arsenals|arsenaux}}, et {{link|cards/print_extra|contenus supplémentaires}} disponibles à l'impression.
EOD
);


// Print at home: Requirements
___('print_requirements',         'EN', "Required tools");
___('print_requirements',         'FR', "Outils requis");
___('print_requirements_image',   'EN', "A paper cutter in action");
___('print_requirements_image',   'FR', "Un coupe-papier en action");
___('print_requirements_body_1',  'EN', <<<EOD
Unless you have access to a professional printer that can print directly on cardboard stock, four items are required to print cards at home: a printer, a paper cutter, card backs, and card sleeves.
EOD
);
___('print_requirements_body_1',  'FR', <<<EOD
À moins d'avoir accès à une imprimante professionnelle capable d'imprimer directement sur du carton, quatre éléments sont nécessaires pour imprimer des cartes à la maison : une imprimante, un coupe-papier, des soutiens de cartes, et des pochettes plastiques.
EOD
);
___('print_requirements_body_2',  'EN', <<<EOD
Any printer will do, even a low-quality color printer can produce decent-looking cards.
EOD
);
___('print_requirements_body_2',  'FR', <<<EOD
N'importe quelle imprimante peut faire l'affaire. Même une imprimante de basse qualité peut produire des cartes acceptables.
EOD
);
___('print_requirements_body_3',  'EN', <<<EOD
A proper paper cutter is highly recommended. A full-blade guillotine-style cutter is ideal, as opposed to ones with small blades that progressively cut the paper. Cutting the paper is the only tricky step, and a good paper cutter will make the process faster and easier, saving on paper and ink costs (since you'll be less likely to make mistakes).
EOD
);
___('print_requirements_body_3',  'FR', <<<EOD
Un coupe-papier de bonne qualité est fortement recommandé. Un massicot avec une lame complète servant de guillotine est préférable à ceux utilisant une petite lame de rasoir pour découper progressivement le papier. La découpe est l'étape la plus délicate de l'impression maison, et un bon coupe-papier la rendra beaucoup plus rapide et simple, tout en réduisant le gâchis de papier et d'encre (car vous serez moins susceptible de rater vos découpes).
EOD
);
___('print_requirements_body_4',  'EN', <<<EOD
Card backs are not strictly necessary, but they are highly recommended, as your printed cards will easily wear down without them. Any sturdy plastic or cardboard piece the size of a standard playing card (63x88mm) will work. If you cannot find or don't want to use proper card backs, regular playing cards can be used as substitutes.
EOD
);
___('print_requirements_body_4',  'FR', <<<EOD
Les soutiens de cartes ne sont pas indispensables, mais fortement recommandés, car sans eux, vos cartes risquent de se détériorer rapidement. Tout morceau de plastique ou de carton rigide de la taille d'une carte à jouer standard (63x88mm) fera l'affaire. Si vous ne trouvez pas ou ne souhaitez pas utiliser des soutiens de cartes de qualité, vous pouvez utiliser des cartes à jouer classiques à la place.
EOD
);
___('print_requirements_body_5',  'EN', <<<EOD
Finally, card sleeves are essential to protect your cards, as paper is fragile. Any standard-sized sleeves (63x88mm) will work, even the cheapest ones, as long as they are not transparent on both sides (the back must be solid). Ensure all cards in your arsenals are sleeved with the same design and color to avoid accidentally cheating by making cards distinguishable from the back.
EOD
);
___('print_requirements_body_5',  'FR', <<<EOD
Enfin, des pochettes plastiques sont nécessaires pour protéger vos cartes, car le papier est fragile. N'importe quelle pochette de taille standard (63x88) conviendra, même les moins chères, tant qu'elles ne sont pas transparentes des deux côtés (l'arrière doit être opaque). Assurez-vous que toutes les cartes de votre arsenal soient protégées par des pochettes de la même couleur et du même design, afin d'éviter qu'elles ne soient reconnaissables par leur dos, ce qui constituerait une forme de triche accidentelle.
EOD
);


// Print at home: Printing the cards
___('print_cards_title',  'EN', "Printing the cards");
___('print_cards_title',  'FR', "Impression des cartes");
___('print_cards_image',  'EN', "Cards being sleeved");
___('print_cards_image',  'FR', "Cartes en train d'être mises sous plastique");
___('print_cards_body_1', 'EN', <<<EOD
Start by choosing the cards you want to print. You can print {{link|cards/print_cards|all of the game's cards}}, or begin by printing the {{link|cards/print_extra|rules and extra cards}}, or just enough cards {{link|cards/print_arsenals|for one arsenal}}.
EOD
);
___('print_cards_body_1', 'FR', <<<EOD
Commencez par choisir les cartes que vous souhaitez imprimer. Vous pouvez imprimer {{link|cards/print_cards|toutes les cartes du jeu}} d'un coup, ou bien commencer par {{link|cards/print_extra|les règles et cartes utilitaires}}, ou encore imprimer uniquement {{link|cards/print_arsenals|les cartes d'un arsenal}}.
EOD
);
___('print_cards_body_2', 'EN', <<<EOD
You'll be given the cards as a .PDF file. Print it.
EOD
);
___('print_cards_body_2', 'FR', <<<EOD
Une fois vos cartes choisies, elles vous seront données sous la forme d'un fichier .PDF. Imprimez ce fichier.
EOD
);
___('print_cards_body_3', 'EN', <<<EOD
Next, cut out the printed cards. Each sheet contains up to nine cards, separated by a white border. Use your paper cutter to remove the white edges, then cut the sheet into strips of three cards, and finally separate the strips into individual cards. If you make a mistake, you can always reprint and try again. Don't worry if you mess up, this process is easy to learn and master.
EOD
);
___('print_cards_body_3', 'FR', <<<EOD
Ensuite, découpez les cartes que vous avez imprimées. Chaque feuille contient jusqu'à neuf cartes, entourées d'une bordure blanche. Avec votre coupe-papier, retirez d'abord les bordures blanches, puis découpez les trois rangées de cartes en trois bandes de trois cartes. Séparez ensuite chaque bande en cartes individuelles. Si la découpe n'est pas parfaite, réimprimez et recommencez. Pas d'inquiétude si vous faites des erreurs, ce processus est rapide à maîtriser.
EOD
);
___('print_cards_body_4', 'EN', <<<EOD
Once cutting is done, sleeve the cards. Place a card back behind a printed card and slide both at the same time into a plastic sleeve. Repeat this until all your cards are sleeved.
EOD
);
___('print_cards_body_4', 'FR', <<<EOD
Une fois la découpe finie, passez à la mise sous plastique. Placez un soutien de carte derrière chaque carte imprimée, puis insérez les deux simultanément dans une pochette plastique. Répétez jusqu'à ce que toutes vos cartes soient sous plastique.
EOD
);
___('print_cards_body_5', 'EN', <<<EOD
You're done. Now you can start playing Future Invaders. Have fun!
EOD
);
___('print_cards_body_5', 'FR', <<<EOD
Félicitations, vous pouvez maintenant jouer à Future Invaders. Amusez-vous bien !
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    SOURCE CODE                                                    */
/*                                                                                                                   */
/*********************************************************************************************************************/

// How to play
___('source_code_title',    'EN', "Source code");
___('source_code_title',    'FR', "Code source");
___('source_code_body_1',   'EN', <<<EOD
Future Invaders' website is open source.
EOD
);
___('source_code_body_1',   'FR', <<<EOD
Le site Internet de Future Invaders est open source.
EOD
);
___('source_code_body_2',   'EN', <<<EOD
You can find its source code {{external|https://github.com/Future-Invaders/Future-Invaders-website/|on GitHub, by clicking here}}.
EOD
);
___('source_code_body_2',   'FR', <<<EOD
Vous pouvez trouver son code source {{external|https://github.com/Future-Invaders/Future-Invaders-website/|sur GitHub, en cliquant ici}}.
EOD
);
___('source_code_body_3',   'EN', <<<EOD
The source code is licensed under the {{external|https://github.com/Future-Invaders/Future-Invaders-website/blob/trunk/LICENSE.md|MIT license}}, which allows you to reuse parts or all of the source code in your own projects without needing to ask for permission, as long as you credit the original author.
EOD
);
___('source_code_body_3',   'FR', <<<EOD
Le code source est sous {{external|https://github.com/Future-Invaders/Future-Invaders-website/blob/trunk/LICENSE.md|licence MIT}}, ce qui vous permet de réutiliser des parties ou l'intégralité du code source dans vos propres projets sans avoir à demander l'autorisation, tant que vous créditez l'auteur originel.
EOD
);
___('source_code_body_4',   'EN', <<<EOD
Only the inner workings of the website are open source. The game itself is protected by copyright. The public repository contains no cards and no artworks. Only the website itself is open sourced, for transparency, and to satisfy the curiosity of people trying to learn how websites are made.
EOD
);
___('source_code_body_4',   'FR', <<<EOD
Seul le fonctionnement interne du site est open source. Le jeu lui-même est protégé par le droit d'auteur. Le dépôt public ne contient aucune carte ni aucun dessin. Il contient uniquement le code source du site Internet, pour des raisons de transparence, ainsi que pour satisfaire la curiosité des gens qui désirent apprendre comment les sites Internet fonctionnent de l'intérieur.
EOD
);


// Technological stack
___('source_code_stack_title',  'EN', "Tech stack");
___('source_code_stack_title',  'FR', "Stack technique");
___('source_code_stack_body_1', 'EN', <<<EOD
Future Invaders' website is built around a handmade custom framework initially designed for {{external|http://nobleme.com/|NoBleme.com}}. If you are looking for a better understanding of its inner workings, read {{external|https://nobleme.com/pages/doc/dev|NoBleme - Behind the scenes}}.
EOD
);
___('source_code_stack_body_1', 'FR', <<<EOD
Le site Internet de Future Invaders est construit autour d'un framework personnalisé fait main, initialement conçu pour {{external|http://nobleme.com/|NoBleme.com}}. Pour comprendre son fonctionnement interne, lisez {{external|https://nobleme.com/pages/doc/dev|NoBleme - Coulisses}}.
EOD
);
___('source_code_stack_body_2', 'EN', <<<EOD
Future Invaders' website uses the following technologies, as is (no third party libraries or frameworks):
EOD
);
___('source_code_stack_list_1', 'EN', "Back-end: {{external|https://en.wikipedia.org/wiki/PHP|PHP}}");
___('source_code_stack_list_1', 'FR', "Back-end : {{external|https://fr.wikipedia.org/wiki/PHP|PHP}}");
___('source_code_stack_list_2', 'EN', "Front-end: {{external|https://en.wikipedia.org/wiki/HTML|HTML}} + {{external|https://en.wikipedia.org/wiki/CSS|CSS}} + {{external|https://en.wikipedia.org/wiki/JavaScript|JavaScript}}");
___('source_code_stack_list_2', 'FR', "Front-end : {{external|https://fr.wikipedia.org/wiki/HTML|HTML}} + {{external|https://fr.wikipedia.org/wiki/CSS|CSS}} + {{external|https://fr.wikipedia.org/wiki/JavaScript|JavaScript}}");
___('source_code_stack_list_3', 'EN', "Server: {{external|https://en.wikipedia.org/wiki/Apache_HTTP_Server|Apache}}");
___('source_code_stack_list_3', 'FR', "Serveur : {{external|https://fr.wikipedia.org/wiki/Apache_HTTP_Server|Apache}}");
___('source_code_stack_list_4', 'EN', "Database: {{external|https://en.wikipedia.org/wiki/MySQL|MySQL}}");
___('source_code_stack_list_4', 'FR', "Base de données : {{external|https://fr.wikipedia.org/wiki/MySQL|MySQL}}");
___('source_code_stack_list_5', 'EN', "Versioning: {{external|https://en.wikipedia.org/wiki/Git|Git}}");
___('source_code_stack_list_5', 'FR', "Versionnage : {{external|https://fr.wikipedia.org/wiki/Git|Git}}");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                TABLETOP SIMULATOR                                                 */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Intro
___('tabletop_simulator_title',  'EN', "Tabletop Simulator");
___('tabletop_simulator_title',  'FR', "Tabletop Simulator");
___('tabletop_simulator_body_1', 'EN', <<<EOD
Want to test Future Invaders before printing it? Or prefer playing the game online instead of in person? Good news! A prototype of Future Invaders is available in Tabletop Simulator.
EOD
);
___('tabletop_simulator_body_1', 'FR', <<<EOD
Vous souhaitez tester Future Invaders avant de l'imprimer ? Ou préférez jouer en ligne plutôt qu'en personne ? Bonne nouvelle ! Un prototype de Future Invaders est disponible dans Tabletop Simulator.
EOD
);
___('tabletop_simulator_body_2', 'EN', <<<EOD
To play, you'll need to own (or purchase) {{external_popup|https://store.steampowered.com/app/286160/Tabletop_Simulator/|Tabletop Simulator on Steam}}. Simply subscribe to the {{external_popup|https://steamcommunity.com/sharedfiles/filedetails/?id=3373495982|Future Invaders mod on the Steam Workshop}}, and you'll be able to host your own games of Future Invaders in Tabletop Simulator.
EOD
);
___('tabletop_simulator_body_2', 'FR', <<<EOD
Pour y jouer, vous devez posséder (ou acheter) {{external_popup|https://store.steampowered.com/app/286160/Tabletop_Simulator/|Tabletop Simulator sur Steam}}. Abonnez-vous au mod {{external_popup|https://steamcommunity.com/sharedfiles/filedetails/?id=3373495982|Future Invaders dans le Workshop}}, et vous pourrez héberger des parties de Future Invaders dans Tabletop Simulator.
EOD
);


// Limitations
___('tabletop_simulator_limits_title',  'EN', "Limitations");
___('tabletop_simulator_limits_title',  'FR', "Limites");
___('tabletop_simulator_limits_body',   'EN', <<<EOD
The Tabletop Simulator version of Future Invaders comes with a few limitations:
EOD
);
___('tabletop_simulator_limits_body', 'FR', <<<EOD
La version Tabletop Simulator de Future Invaders présente les limitations suivantes :
EOD
);
___('tabletop_simulator_limits_1',    'EN', "The cards are only available in English, no French version is included.");
___('tabletop_simulator_limits_1',    'FR', "Les cartes sont uniquement en anglais, la version française n'est pas disponible.");
___('tabletop_simulator_limits_2',    'EN', "You can only play with a sample of 8 preconstructed arsenals.");
___('tabletop_simulator_limits_2',    'FR', "Seule une sélection de 8 arsenaux pré-assemblés est disponible.");
___('tabletop_simulator_limits_3',    'EN', "The table setup is configured for 1v1 matches, you'll need to clone some items to play multiplayer games.");
___('tabletop_simulator_limits_3',    'FR', "La table est configurée pour des parties 1v1, vous devrez cloner certains éléments pour jouer à plusieurs.");
___('tabletop_simulator_limits_4',    'EN', "There are no scripts included, so everything must be resolved manually.");
___('tabletop_simulator_limits_4',    'FR', "Aucun script n'est inclus, tout doit être résolu manuellement.");


// Tips
___('tabletop_simulator_tips_title',  'EN', "Tips & suggestions");
___('tabletop_simulator_tips_title',  'FR', "Conseils & suggestions");
___('tabletop_simulator_tips_body_1', 'EN', <<<EOD
Hold the ALT key while hovering your mouse over a card or game object to view it in full screen and read its text more clearly.
EOD
);
___('tabletop_simulator_tips_body_1', 'FR', <<<EOD
Maintenez la touche ALT enfoncée lorsque vous survolez une carte ou un objet, cela vous permet de la voir en plein écran afin de pouvoir lire son texte clairement.
EOD
);
___('tabletop_simulator_tips_body_2', 'EN', <<<EOD
Rules reminders are displayed on the side of the table, refer to them when needed.
EOD
);
___('tabletop_simulator_tips_body_2', 'FR', <<<EOD
Des rappels des règles sont affichés sur le côté de la table, pensez à les consulter au besoin.
EOD
);
___('tabletop_simulator_tips_body_3', 'EN', <<<EOD
To place a card under your arsenal, right-click it, select Flip, then move your arsenal above it.
EOD
);
___('tabletop_simulator_tips_body_3', 'FR', <<<EOD
Pour placer une carte sous votre arsenal, faites un clic droit dessus, sélectionnez "Flip", puis déplacez votre arsenal par-dessus.
EOD
);
___('tabletop_simulator_tips_body_4', 'EN', <<<EOD
In multiplayer games, use the line tool to draw lines between players, making it easier to know where to place your cards.
EOD
);
___('tabletop_simulator_tips_body_4', 'FR', <<<EOD
Dans les parties multijoueurs, utilisez l'outil de dessin de lignes pour tracer des limites entre les joueurs. Cela facilitera le placement des cartes.
EOD
);
___('tabletop_simulator_tips_body_5', 'EN', <<<EOD
To resolve the "Deny" keyword, the easiest method is for the targeted player to right-click their arsenal, select Deal, then choose the player targeting them. This will place the card into the targeting player's hand. Once they have viewed the card, they can press Flip before placing it either on top or at the bottom of the targeted player's arsenal.
EOD
);
___('tabletop_simulator_tips_body_5', 'FR', <<<EOD
Pour résoudre le mot-clé "Priver", la solution la plus simple consiste à ce que le joueur ciblé fasse un clic droit sur son arsenal, sélectionne "Deal", puis choisisse le joueur qui le cible, afin que ce joueur récupère la carte dans sa main. Une fois qu'il a regardé la carte, il peut appuyer sur "Flip" avant de la placer sur le dessus ou en dessous de l'arsenal du joueur ciblé.
EOD
);
___('tabletop_simulator_tips_body_6', 'EN', <<<EOD
If you need a visual example, a showcase of Future Invaders being played in Tabletop Simulator is available {{external_popup|https://www.youtube.com/watch?v=0ZrrbsrncRk|on Future Invader's official YouTube channel}}.
EOD
);
___('tabletop_simulator_tips_body_6', 'FR', <<<EOD
Si vous préférez un exemple visuel, une vidéo montrant une partie de Future Invaders dans Tabletop Simulator est disponible {{external_popup|https://www.youtube.com/watch?v=0ZrrbsrncRk|sur la chaîne YouTube officielle de Future Invaders}}.
EOD
);