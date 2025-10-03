<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './inc/includes.inc.php';  # Core
include_once './lang/main.lang.php'; # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "index";
$page_description = "Future Invaders, a sci-fi card battling game overflowing with strategic depth";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/**********************************************************************************/ include './inc/header.inc.php'; ?>

<div class="width_50">

  <div class="align_center padding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/website/title_banner.png" alt="Future Invaders">
    </a>
  </div>

  <h1 class="padding_top">
    <?=__('home_intro_title')?>
  </h1>

  <h5>
    <?=__('home_intro_subtitle')?>
  </h5>

  <div class="floater float_right float_noborder">
    <img src="<?=$path?>img/website/consortium.png" alt="Consortium headquarters">
  </div>

  <p>
    <?=__('home_intro_1')?>
  </p>

  <p>
    <?=__('home_intro_2')?>
  </p>

  <p>
    <?=__('home_intro_3')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_1.png" alt="Gameplay">
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_summary_title')?>
  </h4>

  <div class="floater float_right float_noborder float_above float_small">
    <a href="card/malfunction">
      <img src="<?=$path?>img/thumbnails/cards/en/malfunction.png" alt="Card">
    </a>
  </div>

  <p>
    <?=__('home_summary_body_1')?>
  </p>

  <p>
    <?=__('home_summary_body_2')?>
  </p>

  <p>
    <?=__('home_summary_body_3')?>
  </p>

  <p>
    <?=__('home_summary_body_4')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_3.png" alt="Gameplay">
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_special_title')?>
  </h4>

  <div class="floater float_right float_noborder float_above float_small">
    <a href="card/mobilebase">
      <img src="<?=$path?>img/thumbnails/cards/en/mobile_base.png" alt="Card">
    </a>
  </div>

  <p>
    <?=__('home_special_body_1')?>
  </p>

  <p>
    <?=__('home_special_body_2')?>
  </p>

  <p>
    <?=__('home_special_body_3')?>
  </p>

  <p>
    <?=__('home_special_body_4')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_6.png" alt="Gameplay">
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_play_title')?>
  </h4>

  <p>
    <?=__('home_play_body_1')?>
  </p>

  <p>
    <?=__('home_play_body_2')?>
  </p>

  <p>
    <?=__('home_play_body_3')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_5.png" alt="Gameplay">
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_community_title')?>
  </h4>

  <p>
    <?=__('home_community_body_1')?>
  </p>

  <p>
    <?=__('home_community_body_2')?>
  </p>

  <p>
    <?=__('home_community_body_3')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_9.png" alt="Gameplay">
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*************************************************************************************/ include './inc/footer.inc.php';