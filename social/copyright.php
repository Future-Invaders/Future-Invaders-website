<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "social/copyright";
$page_title_en    = "Intellectual property";
$page_title_fr    = "Propriété intellectuelle";
$page_description = "Intellectual property of the card game Future Invaders";

// Get the current year
$year = date('Y');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>social">
      <img src="<?=$path?>img/banners/banner_copyright.png" alt="<?=__('menu_copyright')?>">
    </a>
  </div>

  <h2>
    <?=__('privacy_copyright_title')?>
  </h2>

  <p>
    <?=__('privacy_copyright_body_1')?>
  </p>

  <p>
    <?=__('privacy_copyright_body_2')?>
  </p>

  <p>
    <?=__('privacy_copyright_body_3', preset_values: array($year))?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';