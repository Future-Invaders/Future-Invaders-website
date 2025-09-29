<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/publish";
$page_title_en    = "Publish this game!";
$page_title_fr    = "Éditez ce jeu !";
$page_description = "For publishers wondering why they should publish the card game Future Invaders... just do it!";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('publish_title')?>
  </h2>

  <p class="tinypadding_bot">
    <?=__('publish_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_pitch')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_pitch')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_audience')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_audience')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_difference')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_difference')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_free')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_free')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_model')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_model')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_plans')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_plans')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_ip')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_ip')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_website')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_website')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_self')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_self')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_contact')?>
  </h5>

  <p>
    <?=__('publish_answer_contact')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';