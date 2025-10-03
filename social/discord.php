<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "social/discord";
$page_title_en    = "Discord server";
$page_title_fr    = "Serveur Discord";
$page_description = "Official Discord server of the tactical sci-fi card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>social">
      <img src="<?=$path?>img/banners/banner_discord.png" alt="<?=__('menu_discord')?>">
    </a>
  </div>

  <h2>
    <?=__('discord_title')?>
  </h2>

  <p>
    <?=__('discord_body_1')?>
  </p>

  <p>
    <?=__('discord_body_2')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('discord_body_3')?>
  </p>

  <div class="bigpadding_top">
    <iframe src="https://discord.com/widget?id=1309587053310251125&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';