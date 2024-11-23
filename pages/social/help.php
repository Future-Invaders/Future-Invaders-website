<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/help";
$page_title_en    = "Help the game";
$page_title_fr    = "Contribuer au jeu";
$page_description = "Help the tactical sci-fi card game Future Invaders grow into a bigger, better game!";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('social_help_title')?>
  </h2>

  <p>
    <?=__('social_help_body_1')?>
  </p>

  <p>
    <?=__('social_help_body_2')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_play_title')?>
  </h5>

  <p>
    <?=__('social_help_play_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_spread_title')?>
  </h5>

  <p>
    <?=__('social_help_spread_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_community_title')?>
  </h5>

  <p>
    <?=__('social_help_community_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_feedback_title')?>
  </h5>

  <p>
    <?=__('social_help_feedback_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_art_title')?>
  </h5>

  <p>
    <?=__('social_help_art_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_code_title')?>
  </h5>

  <p>
    <?=__('social_help_code_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('social_help_editor_title')?>
  </h5>

  <p>
    <?=__('social_help_editor_body')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';