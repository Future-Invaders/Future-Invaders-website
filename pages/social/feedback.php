<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/feedback";
$page_title_en    = "Feedback";
$page_title_fr    = "Donner votre avis";
$page_description = "Give feedback on the card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('feedback_title')?>
  </h2>

  <p>
    <?=__('feedback_body_1')?>
  </p>

  <p>
    <?=__('feedback_body_2')?>
  </p>

  <p>
    <?=__('feedback_body_3')?>
  </p>

  <p>
    <?=__('feedback_body_4')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';