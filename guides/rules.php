<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../actions/cards.act.php'; # Card management
include_once './../lang/guides.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "guides/rules";
$page_title_en    = "Rules";
$page_title_fr    = "Règles";
$page_description = "Rules of the strategy sci-fi card battling game Future Invaders";

// Extra css
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/********************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50 bigpadding_bot">

  <div class="bigpadding_bot">
    <a href="<?=$path?>guides">
      <img src="<?=$path?>img/banners/banner_rules.png" alt="<?=__('menu_rules')?>">
    </a>
  </div>

  <h2>
    <?=__('rules_title')?>
  </h2>

  <p>
    <?=__('rules_body_1')?>
  </p>

  <p>
    <?=__('rules_body_2')?>
  </p>

  <p>
    <?=__('rules_body_3')?>
  </p>

</div>

<div class="width_70 padding_top">

  <iframe
    src="./../img/rules/rules_<?=string_change_case($lang, 'lowercase')?>.pdf"
    width="100%"
    height="1050px"
    style="border:0;">
  </iframe>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';