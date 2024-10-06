<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/legal";
$page_title_en    = "Privacy policy";
$page_title_fr    = "Mentions légales";
$page_description = "Privacy policy of Future Invader's website";

// Get the current year
$year = date('Y');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

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
    <?=__('privacy_copyright_body_3')?>
  </p>

  <p>
    <?=__('privacy_copyright_body_4')?>
  </p>

  <p>
    <?=__('privacy_copyright_body_5', preset_values: array($year))?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';