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