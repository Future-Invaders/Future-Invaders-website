<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


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
You can also receive official updates about the game through its {{link|social/discord|Discord server}}.
EOD
);
___('social_media_body_2', 'FR', <<<EOD
Vous pouvez également recevoir des nouvelles officielles du jeu via son {{link|social/discord|serveur Discord}}.
EOD
);


// YouTube
___('social_youtube_title', 'EN', "Vidéos");
___('social_youtube_title', 'FR', "Videos");
___('social_youtube_body',  'EN', <<<EOD
Future Invaders also has an {{external_popup|https://www.youtube.com/@FutureInvaders|official YouTube channel}}, to which you can subscribe to watch gameplay videos with commentary.
EOD
);
___('social_youtube_body',  'FR', <<<EOD
Future Invaders dispose également d'une {{external_popup|https://www.youtube.com/@FutureInvaders|chaîne YouTube officielle}}, à laquelle vous pouvez vous abonner pour regarder des vidéos commentées du jeu.
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
While using this Discord server, you must abide by the {{link|social/coc|code of conduct}}.
EOD
);
___('discord_body_2', 'FR', <<<EOD
Lorsque vous utilisez ce serveur Discord, vous devez respecter le {{link|social/coc|code de conduite}}.
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
If you would like to interact with the community in real time but prefer not to use our main community hub on {{link|social/discord|on Discord}}, Future Invaders also has an official IRC chat room.
EOD
);
___('irc_body_1',       'FR', <<<EOD
Si vous souhaitez interagir avec la communauté en temps réel mais préférez ne pas utiliser notre plateforme principale de communication sur {{link|social/discord|sur Discord}}, Future Invaders dispose également d'un salon de discussion IRC officiel.
EOD
);
___('irc_body_2',       'EN', <<<EOD
Using IRC is a bit complex, so if you're not very tech-savvy, it's recommended to use {{link|social/discord|Discord}} instead. For guidance on how IRC works, we suggest reading {{external_popup|https://nobleme.com/social/irc|this guide to using IRC}} on Nobleme, the website that hosts our IRC chat room.
EOD
);
___('irc_body_2',       'FR', <<<EOD
Le fonctionnement d'IRC peut être complexe à comprendre. Si vous n'êtes pas très technique, il est préférable d'utiliser {{link|social/discord|Discord}} à la place. Pour mieux comprendre IRC, nous vous recommandons de consulter {{external_popup|https://nobleme.com/social/irc|ce guide d'utilisation d'IRC}} sur NoBleme, le site qui héberge notre salon de discussion IRC.
EOD
);
___('irc_body_3',       'EN', <<<EOD
While using this IRC server, you must abide by the {{link|social/coc|code of conduct}}.
EOD
);
___('irc_body_3',       'FR', <<<EOD
Lorsque vous utilisez ce serveur IRC, vous devez respecter le {{link|social/coc|code de conduite}}.
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
Everything on this website is custom made and handcrafted. No third party scripts or services are used. Your personal data is not shared with anyone. This can be verified by looking at this website's {{link|tools/source|source code}}, which is open source and publicly available.
EOD
);
___('privacy_policy_body_2', 'FR', <<<EOD
Tout ce qui se trouve sur ce site est fait main, sur mesure. Aucun script ou service tiers n'est utilisé. Vos données personnelles ne sont pas partagées. Vous pouvez le vérifier en regardant le {{link|tools/source|code source}} du site, qui est public.
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
Some of the earliest prototypes have been generated using Microsoft Image Creator. These images are not subject to copyright by Microsoft, nor is it subject to copyright by the author of the Future Invaders game.
EOD
);
___('privacy_copyright_body_2', 'FR', <<<EOD
Certains des premiers prototypes du jeu ont été généré en utilisant Microsoft Image Creator. Ces images ne sont pas soumises à la propriété intellectuelle par Microsoft, ni par l'auteur du jeu Future Invaders.
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
The Future Invaders website is {{link|tools/source|open sourced}}, and its source code is subject to the MIT license: anyone can use part or all of the Future Invaders website's source code to create their own websites, as long as they credit the original author.
EOD
);
___('privacy_copyright_body_4', 'FR', <<<EOD
Le site Internet de Future Invaders est {{link|tools/source|open source}}. Son code source est soumis à la licence MIT : n'importe qui est libre d'utiliser une partie ou l'intégralité du code source de ce site Internet pour créer son propre site Internet, à condition de créditer l'auteur originel du code.
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
All the game's mechanics, rules, backstory, and some card designs were initially outlined in a game design document, which {{link|game/gdd|can be accessed here}}.
EOD
);
___('credits_game_body_2', 'FR', <<<EOD
Toutes les mécaniques, règles, l'univers du jeu et certaines cartes ont été initialement détaillés dans un "game design document", qui {{link|game/gdd|peut être consulté ici}}.
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
Some symbols and icons used early prototypes are from {{external_popup|https://game-icons.net/|game-icons.net}}.
EOD
);
___('credits_icons_body_1', 'FR', <<<EOD
Certains symboles et icônes utilisés sur les premiers prototypes sont issus de {{external_popup|https://game-icons.net/|game-icons.net}}.
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
Some of the game's early prototype artworks were generated using Microsoft Image Creator.
EOD
);
___('credits_art_body_1', 'FR', <<<EOD
Certaines des illustrations des premiers prototypes du jeu ont été générées par Microsoft Image Creator.
EOD
);
___('credits_art_body_2', 'EN', <<<EOD
Everything else has been hand drawn by Bad.
EOD
);
___('credits_art_body_2', 'FR', <<<EOD
Tout le reste a été dessiné à la main par Bad.
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
If you have any questions about the game or its players, ask on the game's {{link|social/discord|Discord server}} or its {{link|social/irc|IRC chat}}.
EOD
);
___('contact_body_1', 'FR', <<<EOD
Si vous avez des questions sur le jeu, posez-les sur le {{link|social/discord|serveur Discord}} ou le {{link|social/irc|chat IRC du jeu}}.
EOD
);
___('contact_body_2', 'EN', <<<EOD
To provide feedback or share your ideas, visit the {{link|social/feedback|give feedback page}}.
EOD
);
___('contact_body_2', 'FR', <<<EOD
Pour donner votre avis ou partager vos idées, visitez la {{link|social/feedback|page « Donnez votre avis »}}.
EOD
);
___('contact_body_3', 'EN', <<<EOD
If you want to help or contribute in any way, visit the {{link|social/help|help the game page}}.
EOD
);
___('contact_body_3', 'FR', <<<EOD
Si vous désirez aider ou contribuer au développement du jeu, visitez la {{link|social/help|page « Contribuer au jeu »}}.
EOD
);
___('contact_body_4', 'EN', <<<EOD
For discussions about publishing the game, visit the {{link|game/publish|publish this game page}}.
EOD
);
___('contact_body_4', 'FR', <<<EOD
Si vous souhaitez éditer le jeu ou discuter de sa publication, visitez la {{link|game/publish|page « Éditez ce jeu ! »}}.
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
Feedback on the game is very welcome, whether it's positive or negative. We love hearing your Future Invaders stories and listening to your ideas for improvement. Please keep your feedback to one of two specific places: the game's {{link|social/discord|Discord server}} or its {{link|social/irc|IRC chat}}. Other lines of communication are for professional inquiries only.
EOD
);
___('feedback_body_1', 'FR', <<<EOD
Les retours d'expérience sont appréciés, qu'ils soient positifs ou négatifs. Nous adorons lire vos histoires de Future Invaders et écouter vos idées pour améliorer le jeu. Merci de partager vos retours d'expérience sur l'un de ces deux endroits : {{link|social/discord|le serveur Discord}} ou le {{link|social/irc|chat IRC du jeu}}. Les autres lignes de communication sont réservées à un usage professionnel.
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
The best way to help is by playing. Knowing that you're enjoying Future Invaders truly means a lot to us. {{link|tools/print|Print your own copy of the game}}, invite some friends over, {{link|guides/rules|read the rules}}, and have fun!
EOD
);
___('social_help_play_body',   'FR', <<<EOD
Jouer au jeu est la meilleure façon de nous aider. Le simple fait de savoir que vous vous amusez en jouant à Future Invaders nous rend heureux. {{link|tools/print|Imprimez votre propre copie du jeu}}, puis invitez des amis à jouer, {{link|guides/rules|lisez les règles}}, et amusez-vous !
EOD
);


// Spread the word
___('social_help_spread_title',  'EN', "Spread the word");
___('social_help_spread_title',  'FR', "Parlez du jeu");
___('social_help_spread_body',   'EN', <<<EOD
Talk about Future Invaders with your friends, {{link|social/links|follow us on social media}}, and introduce the game to your local gaming communities. The more people know about it, the more players it will attract, and the more likely it is to be published and grow into something bigger!
EOD
);
___('social_help_spread_body',   'FR', <<<EOD
Parlez de Future Invaders à vos amis, {{link|social/links|suivez nous sur les réseaux sociaux}}, et partagez le jeu avec vos communautés de joueurs locales. Plus les gens entendent parler du jeu, plus il y aura de joueurs, et plus les chances sont élevées que le jeu soit publié et puisse ainsi continuer à grandir !
EOD
);


// Participate in the community
___('social_help_community_title',  'EN', "Participate in the community");
___('social_help_community_title',  'FR', "Participez à la communauté");
___('social_help_community_body',   'EN', <<<EOD
A game is nothing without its community. Join our {{link|social/discord|Discord server}} and/or {{link|social/irc|IRC chat}} to interact with other players, and help build the community. Engage with our posts on {{link|social/links|social media}} to extend our reach and get more people involved.
EOD
);
___('social_help_community_body',   'FR', <<<EOD
Un jeu n'est rien sans sa communauté. Rejoignez notre {{link|social/discord|serveur Discord}} et/ou notre {{link|social/irc|chat IRC}} pour interagir avec d'autres joueurs et faire grandir la communauté. Partagez et interagissez avec nos messages sur {{link|social/links|les réseaux sociaux}}, afin qu'ils atteignent un public plus large.
EOD
);


// Give feedback
___('social_help_feedback_title',  'EN', "Give feedback");
___('social_help_feedback_title',  'FR', "Donnez votre avis");
___('social_help_feedback_body',   'EN', <<<EOD
We love hearing your stories and feedback. A game cannot improve without listening to its players. Use {{link|social/discord|Discord}} or {{link|social/irc|IRC}} to tell us stories about the games of Future Invaders you play.
EOD
);
___('social_help_feedback_body',   'FR', <<<EOD
Nous adorons entendre parler de vos expériences avec le jeu, et prenons vos retours d'expérience en compte. Un jeu ne peut pas s'améliorer sans écouter ses joueurs. Utilisez {{link|social/discord|Discord}} ou {{link|social/irc|IRC}} pour nous raconter des histoires issues des parties de Future Invaders auxquelles vous jouez.
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
The ultimate goal for Future Invaders is publication, whether through a publisher or self-publishing. If you know someone who could help make that happen, share the {{link|game/publish|publish this game page}} and encourage them to reach out via the {{link|social/contact|contact info page}}.
EOD
);
___('social_help_editor_body',   'FR', <<<EOD
L'objectif de Future Invaders est d'être publié, soit par un éditeur, soit en auto-édition. Trouver un éditeur est une question de chance et d'opportunités. Si vous avez la possibilité d'aider le jeu à accomplir cet objectif, partagez la page {{link|game/publish|publier ce jeu}} avec des gens que vous connaissez, et dites aux éditeurs de nous contacter via la page {{link|social/contact|infos de contact}}.
EOD
);