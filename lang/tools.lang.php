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
Until Future Invaders is published and available for sale, you can print the cards needed to play the game yourself, at home. This page explains the process. Once you're familiar with it, you can visit the pages listing the {{link|pages/tools/print_cards|cards}}, {{link|pages/tools/print_arsenals|arsenals}}, and {{link|pages/tools/print_extra|extra contents}} to print them.
EOD
);
___('print_body',   'FR', <<<EOD
En attendant que Future Invaders soit publié et disponible à la vente, vous pouvez imprimer chez vous les cartes nécessaires pour jouer. Cette page vous explique la procédure. Une fois que vous aurez compris comment faire, vous pourrez consulter les pages des {{link|pages/tools/print_cards|cartes}}, {{link|pages/tools/print_arsenals|arsenaux}}, et {{link|pages/tools/print_extra|contenus supplémentaires}} disponibles à l'impression.
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
Les soutiens de cartes ne sont pas indispensables, mais fortement recommandés, car sans eux, vos cartes risquent de se détériorer rapidement. Tout morceau de plastique ou de carton rigide de la taille d'une carte à jouer standard (63x88mm) fera l'affaire. Si vous ne trouvez pas ou ne souhaitez pas utiliser des soutiens de cartes de qualité, vous pouvez utiliser à des cartes à jouer classiques à la place.
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
Start by choosing the cards you want to print. You can print {{link|pages/tools/print_cards|all of the game's cards}}, or begin by printing the {{link|pages/tools/print_extra|rules and extra cards}}, or just enough cards {{link|pages/tools/print_arsenals|for one arsenal}}.
EOD
);
___('print_cards_body_1', 'FR', <<<EOD
Commencez par choisir les cartes que vous souhaitez imprimer. Vous pouvez imprimer {{link|pages/tools/print_cards|toutes les cartes du jeu}} d'un coup, ou bien commencer par {{link|pages/tools/print_extra|les règles et cartes utilitaires}}, ou encore imprimer uniquement {{link|pages/tools/print_arsenals|les cartes d'un arsenal}}.
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


// Print cards
___('print_allcards_title',   'EN', "Print cards");
___('print_allcards_title',   'FR', "Imprimer les cartes");
___('print_allcards_body_1',  'EN', <<<EOD
From this page, you can print every legal card in a game of Future Invaders. You have two options: print one copy of each card, or print the maximum legal copies of each card allowed in an arsenal. You can then use these to assemble your own arsenals.
EOD
);
___('print_allcards_body_1',  'FR', <<<EOD
Depuis cette page, vous pouvez imprimer toutes les cartes jouables dans une partie de Future Invaders. Deux options sont disponibles : imprimer un exemplaire de chaque carte, ou imprimer le nombre maximum autorisé de copies de chaque carte dans un arsenal. Vous pourrez ensuite utiliser ces cartes pour composer vos propres arsenaux.
EOD
);
___('print_allcards_body_2',  'EN', <<<EOD
Before printing, ensure you understand {{link|pages/tools/print|how to print cards at home}}. You might also prefer to print {{link|pages/tools/print_arsenals|prebuilt arsenals}} instead of all cards.
EOD
);
___('print_allcards_body_2',  'FR', <<<EOD
Avant d'imprimer, assurez-vous de comprendre {{link|pages/tools/print|le processus d'impression maison}}, et demandez-vous si vous préférez imprimer {{link|pages/tools/print_arsenals|des arsenaux pré-assemblés}} plutôt que toutes les cartes.
EOD
);
___('print_allcards_body_3',  'EN', <<<EOD
Cards are available for printing in both English and French. To change the language, click on the flag icon in the top right corner.
EOD
);
___('print_allcards_body_3',  'FR', <<<EOD
Les cartes sont également imprimables en anglais. Pour changer la langue du site, cliquez sur le drapeau en haut à droite de la page.
EOD
);
___('print_allcards_choice',  'EN', "Choose the cards you want to print");
___('print_allcards_choice',  'FR', "Choisissez les cartes à imprimer");
___('print_allcards_single',  'EN', "One copy of each card in the game");
___('print_allcards_single',  'FR', "Un exemplaire de chaque carte");
___('print_allcards_max',     'EN', "Maximum legal copies of each card");
___('print_allcards_max',     'FR', "Nombre maximum de copies autorisé de chaque carte");


// Print arsenals
___('print_arsenals_title',   'EN', "Print arsenals");
___('print_arsenals_title',   'FR', "Imprimer des arsenaux");
___('print_arsenals_body_1',  'EN', <<<EOD
Arsenals are the collections of cards which you use to play a game of Future Invaders. The game comes with some suggested prebuilt arsenals, to give you ideas on how to build your own. From this page, you can print these arsenals at home. You can have a better look at individual arsenals in the {{link|pages/game/arsenals|arsenal list}}.
EOD
);
___('print_arsenals_body_1',  'FR', <<<EOD
Les arsenaux sont les collections de cartes que vous utilisez pour jouer à Future Invaders. Le jeu vient avec des suggestions d'arsenaux déjà assemblés, pour vous donner des idées sur la façon de construire vos propres arsenaux. Depuis cette page, vous pouvez imprimer ces arsenaux chez vous. Pour en savoir plus sur les arsenaux, utilisez la {{link|pages/game/arsenals|liste des arsenaux}}.
EOD
);
___('print_arsenals_body_2',  'EN', <<<EOD
Before printing, ensure you understand {{link|pages/tools/print|how to print cards at home}}.
EOD
);
___('print_arsenals_body_2',  'FR', <<<EOD
Avant d'imprimer, assurez-vous de comprendre {{link|pages/tools/print|le processus d'impression maison}}.
EOD
);
___('print_arsenals_choose',  'EN', "Choose the arsenals you want to print");
___('print_arsenals_choose',  'FR', "Choisissez les arsenaux à imprimer");
___('print_arsenals_desc',    'EN', "Arsenal description");
___('print_arsenals_desc',    'FR', "Description de l'arsenal");
___('print_aresnals_cards',   'EN', "Main & reserves cards");
___('print_aresnals_cards',   'FR', "Cartes et réserves de l'arsenal");
___('print_arsenals_extra',   'EN', "Extra arsenal cards");
___('print_arsenals_extra',   'FR', "Cartes additionnelles de l'arsenal");


// Print extra cards
___('print_extra_title',      'EN', "Print extra cards");
___('print_extra_title',      'FR', "Imprimer les accessoires");
___('print_extra_body_1',     'EN', <<<EOD
From this page, you can print additional cards for Future Invaders. These cards are optional, but they can enhance your gameplay experience.
EOD
);
___('print_extra_body_1',     'FR', <<<EOD
Depuis cette page, vous pouvez imprimer des cartes accessoires pour Future Invaders. Bien qu'elles ne soient pas nécessaires, elles peuvent enrichir votre expérience de jeu.
EOD
);
___('print_extra_body_2',     'EN', <<<EOD
Before printing, ensure you understand {{link|pages/tools/print|how to print cards at home}}. If you're looking to print the main game cards, separate pages are available for {{link|pages/tools/print|printing all cards}} and {{link|pages/tools/print_arsenals|printing prebuilt arsenals}}.
EOD
);
___('print_extra_body_2',     'FR', <<<EOD
Avant d'imprimer, assurez-vous de comprendre {{link|pages/tools/print|le processus d'impression maison}}. Si vous souhaitez imprimer les cartes de jeu, rendez-vous sur les pages dédiées à {{link|pages/tools/print|imprimer toutes les cartes}} et à {{link|pages/tools/print_arsenals|imprimer des arsenaux pré-assemblés}}.
EOD
);
___('print_extra_trackers',   'EN', "Resource and base durability trackers");
___('print_extra_trackers',   'FR', "Compteurs de ressources et de durabilité");
___('print_extra_rules',      'EN', "Rules of the game");
___('print_extra_rules',      'FR', "Règles du jeu");
___('print_extra_reminders',  'EN', "Abridged rule summaries");
___('print_extra_reminders',  'FR', "Rappels des règles");
___('print_extra_lore',       'EN', "Game backstory");
___('print_extra_lore',       'FR', "Histoire du jeu");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                  DESIGN DOCUMENT                                                  */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Design doc dev page
___('design_doc_dev_title',   'EN', "Design document");
___('design_doc_dev_title',   'FR', "Document de design");
___('design_doc_dev_body_1',  'EN', <<<EOD
Are you curious to see how a game is born? Or how it evolves over time? In the spirit of {{link|pages/tools/source|transparency}}, Future Invaders' design document is available to the public.
EOD
);
___('design_doc_dev_body_1',  'FR', <<<EOD
Êtes-vous curieux de voir comment un jeu naît ? Ou comment il évolue au fil du temps ? Dans un esprit de {{link|pages/tools/source|transparence}}, le document de design de Future Invaders est partagé publiquement sur le site.
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