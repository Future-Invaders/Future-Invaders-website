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

<div class="width_60">

  <div class="align_center padding_bot">
    <img src="<?=$path?>img/homepage.jpg" alt="Future Invaders">
  </div>

</div>

<div class="width_50">

  <h1 class="padding_top">
    <?=__('home_intro_title')?>
  </h1>

  <h5>
    <?=__('home_intro_subtitle')?>
  </h5>

  <div class="floater float_right float_noborder">
    <img src="<?=$path?>img/404/404_right.jpg" alt="404">
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

  <h3 class="hugepadding_top">
    <?=__('home_wip_title')?>
  </h3>

  <p>
    <?=__('home_wip_body_1')?>
  </p>

  <p>
    <?=__('home_wip_body_2')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_1.png" alt="404">
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*************************************************************************************/ include './inc/footer.inc.php';