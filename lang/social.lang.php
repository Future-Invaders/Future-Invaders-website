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



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    CREDITS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Game credits
___('credits_game_title',  'EN', "Game credits");
___('credits_game_title',  'FR', "Crédits du jeu");
___('credits_game_body_1', 'EN', <<<EOD
Future Invaders was created by {{external|https://e-bis.fr/games/|Éric Bisceglia}}.
EOD
);
___('credits_game_body_1', 'FR', <<<EOD
Future Invaders a été créé par {{external|https://e-bis.fr/games/fr.html|Éric Bisceglia}}.
EOD
);
___('credits_game_body_2', 'EN', <<<EOD
All the game's mechanics, rules, backstory, and some card designs were initially outlined in a game design document, which {{link|404|can be accessed here}}.
EOD
);
___('credits_game_body_2', 'FR', <<<EOD
Toutes les mécaniques, règles, l'univers du jeu et certaines cartes ont été initialement détaillés dans un "game design document", qui {{link|404|peut être consulté ici}}.
EOD
);
___('credits_game_body_3', 'EN', <<<EOD
Thanks to Florian for figuring out how to make multiplayer games work smoothly, and to Quentin for his patience when listening to my game design rants. I also want to thank those who helped improve the game in its early stages with their insightful suggestions: Samira, Ash, Kaci, Prince, Jen, Simon, and all other playtesters for their valuable feedback.
EOD
);
___('credits_game_body_3', 'FR', <<<EOD
Merci à Florian pour avoir trouvé comment faire fonctionner le multijoueur, et à Quentin pour sa patience face à mes tirades incessantes sur la conception de jeu. Je tiens également à remercier les personnes qui ont contribué à améliorer le jeu lors des phases initiales du développement par leurs suggestions précieuses : Samira, Ash, Kaci, Prince, Jen, Simon, et tous les autres testeurs du jeu pour leurs retours d'expérience constructifs.
EOD
);


// Art credits
___('credits_art_title',  'EN', "Art credits");
___('credits_art_title',  'FR', "Crédits artistiques");
___('credits_art_body_1', 'EN', <<<EOD
All of the game's current artworks were generated using Microsoft Image Creator.
EOD
);
___('credits_art_body_1', 'FR', <<<EOD
Toutes les illustrations du jeu ont été générées par Microsoft Image Creator.
EOD
);
___('credits_art_body_2', 'EN', <<<EOD
These artworks are temporary and will be replaced by hand-drawn illustrations in the future once the game is funded or published.
EOD
);
___('credits_art_body_2', 'FR', <<<EOD
Ces illustrations sont temporaires et seront remplacées par des illustrations professionnelles à l'avenir, une fois que le jeu sera financé ou publié.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                      CONTACT                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Contact info
___('contact_title',  'EN', "Contact info");
___('contact_title',  'FR', "Infos de contact");
___('contact_body_1', 'EN', <<<EOD
If you have any questions about the game or its players, ask on the game's {{link|404|Discord server}} or its {{link|404|IRC chat}}.
EOD
);
___('contact_body_1', 'FR', <<<EOD
Si vous avez des questions sur le jeu, posez-les sur le {{link|404|serveur Discord}} ou le {{link|404|chat IRC du jeu}}.
EOD
);
___('contact_body_2', 'EN', <<<EOD
To provide feedback or share your ideas, visit the {{link|pages/social/feedback|give feedback page}}.
EOD
);
___('contact_body_2', 'FR', <<<EOD
Pour donner votre avis ou partager vos idées, visitez la {{link|pages/social/feedback|page « Donnez votre avis »}}.
EOD
);
___('contact_body_3', 'EN', <<<EOD
If you want to help or contribute in any way, visit the {{link|404|help the game page}}.
EOD
);
___('contact_body_3', 'FR', <<<EOD
Si vous désirez aider ou contribuer au développement du jeu, visitez la {{link|404|page « Contribuer au jeu »}}.
EOD
);
___('contact_body_4', 'EN', <<<EOD
For discussions about publishing the game, visit the {{link|pages/social/publish|publish this game page}}.
EOD
);
___('contact_body_4', 'FR', <<<EOD
Si vous souhaitez éditer le jeu ou discuter de sa publication, visitez la page {{link|pages/social/publish|page « Éditez ce jeu ! »}}.
EOD
);
___('contact_body_5', 'EN', <<<EOD
For professional inquiries about the game, please email me at {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);
___('contact_body_5', 'FR', <<<EOD
Pour toute question professionnelle, contactez-moi par e-mail : {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FEEDBACK                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Feedback
___('feedback_title',  'EN', "Give feedback");
___('feedback_title',  'FR', "Donnez votre avis");
___('feedback_body_1', 'EN', <<<EOD
Feedback on the game is very welcome, whether it's positive or negative. We love hearing your Future Invaders stories and listening to your ideas for improvement. Please keep your feedback to one of two specific places: the game's {{link|404|Discord server}} or its {{link|404|IRC chat}}. Other lines of communication are for professional inquiries only.
EOD
);
___('feedback_body_1', 'FR', <<<EOD
Les retours d'expérience sont appréciés, qu'ils soient positifs ou négatifs. Nous adorons lire vos histoires de Future Invaders et écouter vos idées pour améliorer le jeu. Merci de partager vos retours d'expérience sur l'un de ces deux endroits : {{link|404|le serveur Discord}} ou le {{link|404|chat IRC du jeu}}. Les autres lignes de communication sont réservées à un usage professionnel.
EOD
);
___('feedback_body_2', 'EN', <<<EOD
The game's balance is fine-tuned by incorporating feedback from playtesting. While we may not implement changes based on every suggestion, we will listen and strive to incorporate your ideas into the game's design. Our goal is to make the game as fun as possible for everyone.
EOD
);
___('feedback_body_2', 'FR', <<<EOD
L'équilibrage du jeu est influencé par vos retours d'expérience. Bien que nous ne puissions pas mettre en œuvre chaque suggestion, elles sont toutes prises en compte, et nous essaierons de les intégrer dans les évolutions futures du jeu. Notre but est de rendre le jeu aussi agréable et équilibré que possible pour tout le monde.
EOD
);
___('feedback_body_3', 'EN', <<<EOD
Please note that if you design specific cards or fan content, we appreciate your creativity, will love discussing them with the community, but for legal reasons, we will not use them in the game.
EOD
);
___('feedback_body_3', 'FR', <<<EOD
Veuillez noter que si vous créez vos propres cartes ou contenus pour le jeu, nous apprécions votre créativité et serons ravis d'en discuter avec la communauté. Cependant, pour des raisons juridiques, nous ne pourrons pas les utiliser dans le jeu.
EOD
);
___('feedback_body_4', 'EN', <<<EOD
Feedback related to professional inquiries can be sent via e-mail at {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);
___('feedback_body_4', 'FR', <<<EOD
Pour des retours d'expérience professionnels, envoyez un e-mail à {{external|mailto:bisceglia.eric@gmail.com|bisceglia.eric@gmail.com}}.
EOD
);