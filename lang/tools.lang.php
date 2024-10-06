<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


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