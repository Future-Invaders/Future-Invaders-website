<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/game.lang.php';    # Translations
include_once './../../lang/main.lang.php';    # More translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/intro";
$page_title_en    = "Introduction";
$page_title_fr    = "Introduction";
$page_description = "Intro to the strategy sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('howto_title')?>
  </h2>

  <p>
    <?=__('howto_body_1')?>
  </p>

  <p>
    <?=__('howto_body_2')?>
  </p>

  <p>
    <?=__('howto_body_3')?>
  </p>

  <p>
    <?=__('howto_body_4')?>
  </p>

  <p>
    <?=__('howto_body_5')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_8.png" alt="Gameplay">
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_summary_title')?>
  </h4>

  <p>
    <?=__('home_summary_body_1')?>
  </p>

  <p>
    <?=__('home_summary_body_2')?>
  </p>

  <p>
    <?=__('home_summary_body_3')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('home_summary_body_4')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_2.png" alt="Gameplay">
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';