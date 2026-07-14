<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/game.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "game/publish";
$page_title_en    = "Publish this game!";
$page_title_fr    = "Publiez ce jeu !";
$page_description = "For publishers wondering why they should publish the card game Future Invaders... just do it!";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/banners/banner_publish.png" alt="<?=__('menu_publish')?>">
    </a>
  </div>

  <h2>
    <?=__('publish_title')?>
  </h2>

  <p>
    <?=__('publish_body_1')?>
  </p>

  <p>
    <?=__('publish_body_2')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('publish_body_3')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_pitch')?>
  </h5>

  <ul class="smallpadding_top tinypadding_bot">
    <li>
      <?=__('publish_answer_pitch_1')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_2')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_3')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_4')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_5')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_6')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_7')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_8')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_9')?>
    </li>
    <li>
      <?=__('publish_answer_pitch_10')?>
    </li>
  </ul>

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
    <?=__('publish_question_status')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_status')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_plans')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_plans')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('publish_question_graphics')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_graphics')?>
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
    <?=__('publish_question_try')?>
  </h5>

  <p class="tinypadding_bot">
    <?=__('publish_answer_try')?>
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
/**********************************************************************************/ include './../inc/footer.inc.php';