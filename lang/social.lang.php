<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       LEGAL                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Privacy policy
___('privacy_policy_title',  'EN', "Privacy policy");
___('privacy_policy_title',  'FR', "Mentions légales");
___('privacy_policy_body_1', 'EN', <<<EOD
This website does not collect any personal data.
EOD
);
___('privacy_policy_body_1', 'FR', <<<EOD
Ce site Internet ne collecte aucune donnée personnelle.
EOD
);
___('privacy_policy_body_2', 'EN', <<<EOD
Everything on this website is custom made and handcrafted. No third party scripts or services are used. Your personal data is not shared with anyone. This can be verified by looking at this website's {{link|pages/tools/source|source code}}, which is open source and publicly available.
EOD
);
___('privacy_policy_body_2', 'FR', <<<EOD
Tout ce qui se trouve sur ce site est fait main, sur mesure. Aucun script ou service tiers n'est utilisé. Vos données personnelles ne sont pas partagées. Vous pouvez le vérifier en regardant le {{link|pages/tools/source|code source}} du site, qui est public.
EOD
);
___('privacy_policy_body_3', 'EN', <<<EOD
This is why you were not asked to accept a cookie policy, or to accept a user agreement, like on most other websites. Simply enjoy the game!
EOD
);
___('privacy_policy_body_3', 'FR', <<<EOD
C'est pourquoi vous n'avez pas eu à accepter de politique de cookie ou de contrat utilisateur, comme c'est le cas sur la plupart des autres sites Internet. Profitez simplement du jeu!
EOD
);


// Intellectual property
___('privacy_copyright_title',  'EN', "Intellectual property");
___('privacy_copyright_title',  'FR', "Propriété intellectuelle");
___('privacy_copyright_body_1', 'EN', <<<EOD
The Future Invaders game concepts, card designs, card texts, rules, rulings, lore, and all of its game design elements are copyrighted © Future Invaders, an original creation and intellectual property of {{external|https://e-bis.fr/games/|Éric Bisceglia}}.
EOD
);
___('privacy_copyright_body_1', 'FR', <<<EOD
Les concepts de jeu, designs des cartes, textes des cartes, règles, jugements, l'univers du jeu, et tous les autres éléments du jeu Future Invaders sont une propriété intellectuelle © Future Invaders, une création originale et propriété intellectuelle de {{external|https://e-bis.fr/games/fr.html|Éric Bisceglia}}.
EOD
);
___('privacy_copyright_body_2', 'EN', <<<EOD
The current Future Invaders art has been generated using Microsoft Image Creator. It is not subject to copyright by Microsoft, nor is it subject to copyright by the author of the Future Invaders game. It is placeholder art until the Future Invaders game is released, and will be replaced by hand-drawn art in the future.
EOD
);
___('privacy_copyright_body_2', 'FR', <<<EOD
L'art actuellement utilisé par Future Invaders a été généré en utilisant Microsoft Image Creator. Il n'est pas soumis à la propriété intellectuelle par Microsoft, ni par l'auteur du jeu Future Invaders. Il s'agit d'illustrations temporaires, ayant vocation à être remplacées par des illustrations professionnelles lorsque le jeu sera publié.
EOD
);
___('privacy_copyright_body_3', 'EN', <<<EOD
Future Invaders is not affiliated with Microsoft, and does not endorse or sponsor the use of Microsoft's products or services.
EOD
);
___('privacy_copyright_body_3', 'FR', <<<EOD
Future Invaders n'est pas affilié à Microsoft, et ne soutient ni n'est sponsorisé par Microsoft.
EOD
);
___('privacy_copyright_body_4', 'EN', <<<EOD
The Future Invaders website is {{link|pages/tools/source|open sourced}}, and its source code is subject to the MIT license: anyone can use part or all of the Future Invaders website's source code to create their own websites, as long as they credit the original author.
EOD
);
___('privacy_copyright_body_4', 'FR', <<<EOD
Le site Internet de Future Invaders est {{link|pages/tools/source|open source}}. Son code source est soumis à la licence MIT : n'importe qui est libre d'utiliser une partie ou l'intégralité du code source de ce site Internet pour créer son propre site Internet, à condition de créditer l'auteur originel du code.
EOD
);
___('privacy_copyright_body_5', 'EN', <<<EOD
© Future Invaders / Éric Bisceglia 2024 - {{1}}
EOD
);
___('privacy_copyright_body_5', 'FR', <<<EOD
© Future Invaders / Éric Bisceglia 2024 - {{1}}
EOD
);