<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/credits";
$page_title_en    = "Credits";
$page_title_fr    = "Crédits";
$page_description = "Credits for the card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('credits_game_title')?>
  </h2>

  <p>
    <?=__('credits_game_body_1')?>
  </p>

  <p>
    <?=__('credits_game_body_2')?>
  </p>

  <p>
    <?=__('credits_game_body_3')?>
  </p>

  <h2 class="bigpadding_top">
    <?=__('credits_art_title')?>
  </h2>

  <p>
    <?=__('credits_art_body_1')?>
  </p>

  <p>
    <?=__('credits_art_body_2')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';