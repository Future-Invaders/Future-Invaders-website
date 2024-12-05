<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                 PICTURES & VIDEOS                                                 */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Gameplay showcase
___('gameplay_pictures_title',  'EN', "Gameplay pictures");
___('gameplay_pictures_title',  'FR', "Images du jeu");
___('gameplay_cards_title',     'EN', "Sample cards");
___('gameplay_cards_title',     'FR', "Exemples de cartes");
___('gameplay_videos_title',    'EN', "Gameplay videos");
___('gameplay_videos_title',    'FR', "Vidéos du jeu");
___('gameplay_videos_body_1',   'EN', <<<EOD
These videos were filmed during the early stages of the game's development, showcasing "alpha" gameplay with English commentary. They are not representative of the current game's balance.
EOD
);
___('gameplay_videos_body_1',   'FR', <<<EOD
Ces vidéos ont été filmées pendant les premières phases de développement du jeu, lorsqu'il était encore un prototype. Elles montrent la version "alpha" du jeu, avec des commentaires en anglais expliquant le gameplay. Elles ne reflètent pas l'état actuel de l'équilibrage actuel du jeu.
EOD
);
___('gameplay_videos_body_2',   'EN', <<<EOD
New, improved videos will be recorded in the future to replace them.
EOD
);
___('gameplay_videos_body_2',   'FR', <<<EOD
De nouvelles vidéos seront filmées dans le futur pour les remplacer.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                   SOCIAL MEDIA                                                    */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Social media
___('social_media_title',  'EN', "Social media");
___('social_media_title',  'FR', "Médias sociaux");
___('social_media_body_1', 'EN', <<<EOD
Outside of this website, Future Invaders only has an official account on one social media platform, which you can follow to get updates about the game: {{external_popup|https://bsky.app/profile/futureinvaders.com|Future Invaders on Bluesky}}.
EOD
);
___('social_media_body_1', 'FR', <<<EOD
Hors de ce site Internet, Future Invaders n'a de présence officielle que sur une seule plateforme de médias sociaux, que vous pouvez suivre pour obtenir des mises à jour sur le jeu : {{external|https://bsky.app/profile/futureinvaders.com|Future Invaders sur Bluesky}}.
EOD
);
___('social_media_body_2', 'EN', <<<EOD
You can also receive official updates about the game through its {{link|pages/social/discord|Discord server}}.
EOD
);
___('social_media_body_2', 'FR', <<<EOD
Vous pouvez également recevoir des nouvelles officielles du jeu via son {{link|pages/social/discord|serveur Discord}}.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                  DISCORD SERVER                                                   */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Discord server
___('discord_title',  'EN', "Discord server");
___('discord_title',  'FR', "Serveur Discord");
___('discord_body_1', 'EN', <<<EOD
Future Invaders' official Discord server is a public chatroom where you can discuss the game, ask questions, and interact with the community.
EOD
);
___('discord_body_1', 'FR', <<<EOD
Le serveur Discord officiel de Future Invaders est un salon de discussion public où vous pouvez discuter du jeu, poser des questions et interagir avec la communauté.
EOD
);
___('discord_body_2', 'EN', <<<EOD
While using this Discord server, you must abide by the {{link|pages/social/coc|code of conduct}}.
EOD
);
___('discord_body_2', 'FR', <<<EOD
Lorsque vous utilisez ce serveur Discord, vous devez respecter le {{link|pages/social/coc|code de conduite}}.
EOD
);
___('discord_body_3', 'EN', <<<EOD
{{external_popup|https://discord.gg/ankRwsqASX|Join the Future Invaders Discord server by clicking here}}.
EOD
);
___('discord_body_3', 'FR', <<<EOD
{{external|https://discord.gg/ankRwsqASX|Rejoignez le serveur Discord de Future Invaders en cliquant ici}}.
EOD
);




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     IRC CHAT                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// IRC chat
___('irc_title',        'EN', "IRC chat");
___('irc_title',        'FR', "Chat IRC");
___('irc_body_1',       'EN', <<<EOD
If you would like to interact with the community in real time but prefer not to use our main community hub on {{link|pages/social/discord|on Discord}}, Future Invaders also has an official IRC chat room.
EOD
);
___('irc_body_1',       'FR', <<<EOD
Si vous souhaitez interagir avec la communauté en temps réel mais préférez ne pas utiliser notre plateforme principale de communication sur {{link|pages/social/discord|sur Discord}}, Future Invaders dispose également d'un salon de discussion IRC officiel.
EOD
);
___('irc_body_2',       'EN', <<<EOD
Using IRC is a bit complex, so if you're not very tech-savvy, it's recommended to use {{link|pages/social/discord|Discord}} instead. For guidance on how IRC works, we suggest reading {{external_popup|https://nobleme.com/pages/social/irc|this guide to using IRC}} on Nobleme, the website that hosts our IRC chat room.
EOD
);
___('irc_body_2',       'FR', <<<EOD
Le fonctionnement d'IRC peut être complexe à comprendre. Si vous n'êtes pas très technique, il est préférable d'utiliser {{link|pages/social/discord|Discord}} à la place. Pour mieux comprendre IRC, nous vous recommandons de consulter {{external_popup|https://nobleme.com/pages/social/irc|ce guide d'utilisation d'IRC}} sur NoBleme, le site qui héberge notre salon de discussion IRC.
EOD
);
___('irc_body_3',       'EN', <<<EOD
While using this IRC server, you must abide by the {{link|pages/social/coc|code of conduct}}.
EOD
);
___('irc_body_3',       'FR', <<<EOD
Lorsque vous utilisez ce serveur IRC, vous devez respecter le {{link|pages/social/coc|code de conduite}}.
EOD
);
___('irc_body_4',       'EN', <<<EOD
Connection details for Future Invaders' IRC chat room:
EOD
);
___('irc_body_4',       'FR', <<<EOD
Informations pour se connecter au salon de discussion IRC de Future Invaders :
EOD
);
___('irc_server',       'EN', "Server");
___('irc_server',       'FR', "Serveur");
___('irc_server_name',  'EN', "irc.nobleme.com");
___('irc_server_name',  'FR', "irc.nobleme.com");
___('irc_port',         'EN', "Port");
___('irc_port',         'FR', "Port");
___('irc_port_name',    'EN', "6697 (SSL) / 6667 (standard)");
___('irc_port_name',    'FR', "6697 (SSL) / 6667 (standard)");
___('irc_channel',      'EN', "Channel");
___('irc_channel',      'FR', "Channel");
___('irc_channel_name', 'EN', "#futureinvaders");
___('irc_channel_name', 'FR', "#futureinvaders");




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                  CODE OF CONDUCT                                                  */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Code of conduct
___('coc_title',  'EN', "Code of conduct");
___('coc_title',  'FR', "Code de conduite");
___('coc_body_1', 'EN', <<<EOD
When interacting with the Future Invaders community, you must follow the following rules:
EOD
);
___('coc_body_1', 'FR', <<<EOD
Lorsque vous interagissez avec la communauté de Future Invaders, vous devez respecter les règles suivantes :
EOD
);
___('coc_list_1', 'EN', "Pornography and explicit sexual content are strictly prohibited.");
___('coc_list_1', 'FR', "La pornographie et les contenus sexuels explicites sont interdits.");
___('coc_list_2', 'EN', "Hate speech and discrimination will result in a ban.");
___('coc_list_2', 'FR', "L'incitation à la haine et la discrimination entraîneront une exclusion.");
___('coc_list_3', 'EN', "Illegal content will be reported to the relevant authorities.");
___('coc_list_3', 'FR', "Tout contenu illégal sera signalé aux autorités compétentes.");
___('coc_list_4', 'EN', "Resolve tense situations privately, don't harrass people you dislike.");
___('coc_list_4', 'FR', "Essayez de résoudre les situations tendues en privé, ne harcelez pas les autres.");
___('coc_list_5', 'EN', "Trolls and purposeful agitators will be banned if they try to test boundaries.");
___('coc_list_5', 'FR', "Les trolls et provocateurs seront bannis s'ils cherchent à tester les limites.");
___('coc_body_2', 'EN', <<<EOD
Our aim is to ban as little as possible, while ensuring the community is inclusive. If your behavior prevents other people from having a good time, then we will have to exclude you. Let's all be respectful of others, we collectively benefit from it.
EOD
);
___('coc_body_2', 'FR', <<<EOD
Nous visons à bannir le moins possible tout en maintenant une communauté inclusive. Si votre comportement empêche d'autres personnes de passer un bon moment, nous devrons vous exclure. La bonne ambiance de la communauté dépend de la bienveillance collective de ses membres.
EOD
);




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
All the game's mechanics, rules, backstory, and some card designs were initially outlined in a game design document, which {{link|pages/tools/design_doc|can be accessed here}}.
EOD
);
___('credits_game_body_2', 'FR', <<<EOD
Toutes les mécaniques, règles, l'univers du jeu et certaines cartes ont été initialement détaillés dans un "game design document", qui {{link|pages/tools/design_doc|peut être consulté ici}}.
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


// Icon credits
___('credits_icons_title',  'EN', "Icon credits");
___('credits_icons_title',  'FR', "Crédits des icônes");
___('credits_icons_body_1', 'EN', <<<EOD
All of the symbols and icons used on the cards are from {{external_popup|https://game-icons.net/|game-icons.net}}.
EOD
);
___('credits_icons_body_1', 'FR', <<<EOD
Tous les symboles et icônes utilisés sur les cartes sont issus de {{external_popup|https://game-icons.net/|game-icons.net}}.
EOD
);
___('credits_icons_body_2', 'EN', <<<EOD
They are made by Lorc, Delapouite, and {{external_popup|https://game-icons.net/about.html#authors|other contributors}}, and are licenced under a CCBY licence.
EOD
);
___('credits_icons_body_2', 'FR', <<<EOD
Elles sont faites par Lorc, Delapouite, et {{external_popup|https://game-icons.net/about.html#authors|d'autres contributeurs}}, et sont sous licence CCBY.
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
If you have any questions about the game or its players, ask on the game's {{link|pages/social/discord|Discord server}} or its {{link|pages/social/irc|IRC chat}}.
EOD
);
___('contact_body_1', 'FR', <<<EOD
Si vous avez des questions sur le jeu, posez-les sur le {{link|pages/social/discord|serveur Discord}} ou le {{link|pages/social/irc|chat IRC du jeu}}.
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
If you want to help or contribute in any way, visit the {{link|pages/social/help|help the game page}}.
EOD
);
___('contact_body_3', 'FR', <<<EOD
Si vous désirez aider ou contribuer au développement du jeu, visitez la {{link|pages/social/help|page « Contribuer au jeu »}}.
EOD
);
___('contact_body_4', 'EN', <<<EOD
For discussions about publishing the game, visit the {{link|pages/social/publish|publish this game page}}.
EOD
);
___('contact_body_4', 'FR', <<<EOD
Si vous souhaitez éditer le jeu ou discuter de sa publication, visitez la {{link|pages/social/publish|page « Éditez ce jeu ! »}}.
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
Feedback on the game is very welcome, whether it's positive or negative. We love hearing your Future Invaders stories and listening to your ideas for improvement. Please keep your feedback to one of two specific places: the game's {{link|pages/social/discord|Discord server}} or its {{link|pages/social/irc|IRC chat}}. Other lines of communication are for professional inquiries only.
EOD
);
___('feedback_body_1', 'FR', <<<EOD
Les retours d'expérience sont appréciés, qu'ils soient positifs ou négatifs. Nous adorons lire vos histoires de Future Invaders et écouter vos idées pour améliorer le jeu. Merci de partager vos retours d'expérience sur l'un de ces deux endroits : {{link|pages/social/discord|le serveur Discord}} ou le {{link|pages/social/irc|chat IRC du jeu}}. Les autres lignes de communication sont réservées à un usage professionnel.
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




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                   HELP THE GAME                                                   */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Help the game
___('social_help_title',  'EN', "Help the game");
___('social_help_title',  'FR', "Contribuer au jeu");
___('social_help_body_1', 'EN', <<<EOD
Future Invaders is currently a small, unpublished project, looking to bloom into a fully-fledged game. To make this transformation possible, any and all support is greatly appreciated.
EOD
);
___('social_help_body_1', 'FR', <<<EOD
Future Invaders est actuellement un petit projet non publié, cherchant à se transformer en un jeu à grande échelle. Afin de réussir cette transformation, toute aide est précieuse.
EOD
);
___('social_help_body_2', 'EN', <<<EOD
Here's how you can help:
EOD
);
___('social_help_body_2', 'FR', <<<EOD
Voici quelques façons de nous aider :
EOD
);


// Play the game
___('social_help_play_title',  'EN', "Play the game");
___('social_help_play_title',  'FR', "Jouez au jeu");
___('social_help_play_body',   'EN', <<<EOD
The best way to help is by playing. Knowing that you're enjoying Future Invaders truly means a lot to us. {{link|pages/tools/print|Print your own copy of the game}}, invite some friends over, {{link|pages/game/rules|read the rules}}, and have fun!
EOD
);
___('social_help_play_body',   'FR', <<<EOD
Jouer au jeu est la meilleure façon de nous aider. Le simple fait de savoir que vous vous amusez en jouant à Future Invaders nous rend heureux. {{link|pages/tools/print|Imprimez votre propre copie du jeu}}, puis invitez des amis à jouer, {{link|pages/game/rules|lisez les règles}}, et amusez-vous !
EOD
);


// Spread the word
___('social_help_spread_title',  'EN', "Spread the word");
___('social_help_spread_title',  'FR', "Parlez du jeu");
___('social_help_spread_body',   'EN', <<<EOD
Talk about Future Invaders with your friends, {{link|pages/social/links|follow us on social media}}, and introduce the game to your local gaming communities. The more people know about it, the more players it will attract, and the more likely it is to be published and grow into something bigger!
EOD
);
___('social_help_spread_body',   'FR', <<<EOD
Parlez de Future Invaders à vos amis, {{link|pages/social/links|suivez nous sur les réseaux sociaux}}, et partagez le jeu avec vos communautés de joueurs locales. Plus les gens entendent parler du jeu, plus il y aura de joueurs, et plus les chances sont élevées que le jeu soit publié et puisse ainsi continuer à grandir !
EOD
);


// Participate in the community
___('social_help_community_title',  'EN', "Participate in the community");
___('social_help_community_title',  'FR', "Participez à la communauté");
___('social_help_community_body',   'EN', <<<EOD
A game is nothing without its community. Join our {{link|pages/social/discord|Discord server}} and/or {{link|pages/social/irc|IRC chat}} to interact with other players, and help build the community. Engage with our posts on {{link|pages/social/links|social media}} to extend our reach and get more people involved.
EOD
);
___('social_help_community_body',   'FR', <<<EOD
Un jeu n'est rien sans sa communauté. Rejoignez notre {{link|pages/social/discord|serveur Discord}} et/ou notre {{link|pages/social/irc|chat IRC}} pour interagir avec d'autres joueurs et faire grandir la communauté. Partagez et interagissez avec nos messages sur {{link|pages/social/links|les réseaux sociaux}}, afin qu'ils atteignent un public plus large.
EOD
);


// Give feedback
___('social_help_feedback_title',  'EN', "Give feedback");
___('social_help_feedback_title',  'FR', "Donnez votre avis");
___('social_help_feedback_body',   'EN', <<<EOD
We love hearing your stories and feedback. A game cannot improve without listening to its players. Use {{link|pages/social/discord|Discord}} or {{link|pages/social/irc|IRC}} to tell us stories about the games of Future Invaders you play.
EOD
);
___('social_help_feedback_body',   'FR', <<<EOD
Nous adorons entendre parler de vos expériences avec le jeu, et prenons vos retours d'expérience en compte. Un jeu ne peut pas s'améliorer sans écouter ses joueurs. Utilisez {{link|pages/social/discord|Discord}} ou {{link|pages/social/irc|IRC}} pour nous raconter des histoires issues des parties de Future Invaders auxquelles vous jouez.
EOD
);


// Provide art
___('social_help_art_title',  'EN', "Provide art");
___('social_help_art_title',  'FR', "Proposer de l'art");
___('social_help_art_body',   'EN', <<<EOD
As you likely noticed, most of the website and game's art is currently AI generated. This is not something we are happy with or proud of. Currently, the game has zero budget, therefore we will not be asking artists for anything until the game has secured funding. If you're interested in providing art regardless, we appreciate it, but be aware that we will not be able to pay for your work, and it will therefore not be included in the final commercial relase of the game.
EOD
);
___('social_help_art_body',   'FR', <<<EOD
Comme vous pouvez le voir, la majorité des illustrations du site et du jeu sont générées par IA. Ce n'est pas quelque chose dont nous sommes satisfaits ou fiers. Actuellement, le budget du jeu est de zéro, par conséquent nous ne commissionnerons pas d'artistes tant que nous n'aurons pas trouvé de source de financement. Si vous tenez malgré tout à proposer de l'art pour le jeu, nous l'apprécions, mais sachez que nous ne pourrons pas vous payer, et que votre art ne sera par conséquent pas inclus dans la version commerciale finale du jeu.
EOD
);


// Contribute code
___('social_help_code_title',  'EN', "Create third party projects");
___('social_help_code_title',  'FR', "Créer des projets tiers");
___('social_help_code_body',   'EN', <<<EOD
Interested in developing something related to Future Invaders? If it's a technical project, get in touch with the team to add it to the {{external_popup|https://github.com/orgs/Future-Invaders/repositories|Future Invaders organization on GitHub}}, and share your awesome projects with the community!
EOD
);
___('social_help_code_body',   'FR', <<<EOD
Vous développez un projet lié au jeu ? S'il s'agit d'un projet technique, contactez l'équipe de développement de Future Invaders pour qu'il soit ajouté à {{external_popup|https://github.com/orgs/Future-Invaders/repositories|l'organisation Future Invaders sur GitHub}}, et partagez vos super projets avec la communauté !
EOD
);


// Help find a publisher
___('social_help_editor_title',  'EN', "Help us find a publisher");
___('social_help_editor_title',  'FR', "Aidez-nous à trouver un éditeur");
___('social_help_editor_body',   'EN', <<<EOD
The ultimate goal for Future Invaders is publication, whether through a publisher or self-publishing. If you know someone who could help make that happen, share the {{link|pages/social/publish|publish this game page}} and encourage them to reach out via the {{link|pages/social/contact|contact info page}}.
EOD
);
___('social_help_editor_body',   'FR', <<<EOD
L'objectif de Future Invaders est d'être publié, soit par un éditeur, soit en auto-édition. Trouver un éditeur est une question de chance et d'opportunités. Si vous avez la possibilité d'aider le jeu à accomplir cet objectif, partagez la page {{link|pages/social/publish|publier ce jeu}} avec des gens que vous connaissez, et dites aux éditeurs de nous contacter via la page {{link|pages/social/contact|infos de contact}}.
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


// What's left to be done
___('publish_question_left',  'EN', "What remains to be done before the game is finished?");
___('publish_question_left',  'FR', "Que reste-t-il à faire avant que le jeu soit prêt ?");
___('publish_answer_left',    'EN', <<<EOD
Regarding game design, the core set is complete, heavily playtested, and well-balanced. The current illustrations are AI-generated and need to be replaced by professional art. The rules also need to be formatted for a booklet, and additional accessories such as durability counters, resource trackers, and playmats need to be designed. Lastly, the game must be printed, distributed, and marketed.
EOD
);
___('publish_answer_left',    'FR', <<<EOD
Le game design du jeu est finalisé, fortement testé, et équilibré. Les illustrations actuelles, faites par IA, doivent être remplacées par des illustrations professionnelles, et les règles formatées en livret. La création d'accessoires, tels que des compteurs de durabilité et un tapis de jeu, sont également une possibilité. Finalement, le jeu doit être imprimé, distribué et commercialisé.
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
