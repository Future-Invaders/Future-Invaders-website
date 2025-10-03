<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "social/irc";
$page_title_en    = "IRC chat";
$page_title_fr    = "Chat IRC";
$page_description = "Official IRC chat room of the tactical sci-fi card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>social">
      <img src="<?=$path?>img/banners/banner_irc.png" alt="<?=__('menu_irc')?>">
    </a>
  </div>

  <h2>
    <?=__('irc_title')?>
  </h2>

  <p>
    <?=__('irc_body_1')?>
  </p>

  <p>
    <?=__('irc_body_2')?>
  </p>

  <p>
    <?=__('irc_body_3')?>
  </p>

  <p>
    <?=__('irc_body_4')?>
  </p>

  <ul class="tinypadding_top">
    <li>
      <span class="bold"><?=__('irc_server')?></span><?=__(':').' '.__('irc_server_name')?>
    </li>
    <li>
      <span class="bold"><?=__('irc_port')?></span><?=__(':').' '.__('irc_port_name')?>
    </li>
    <li>
      <span class="bold"><?=__('irc_channel')?></span><?=__(':').' '.__('irc_channel_name')?>
    </li>
  </ul>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';