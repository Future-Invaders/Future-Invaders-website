<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/tools.lang.php';   # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/tabletop_simulator";
$page_title_en    = "Tabletop Simulator";
$page_title_fr    = "Tabletop Simulator";
$page_description = "Play the sci-fi card battling game Future Invaders in Tabletop Simulator";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('tabletop_simulator_title')?>
  </h2>

  <p>
    <?=__('tabletop_simulator_body_1')?>
  </p>

  <p>
    <?=__('tabletop_simulator_body_2')?>
  </p>

  <div class="bigpadding_top">
    <img src="<?=$path?>img/gameplay/tabletop_simulator_1.png" alt="Tabletop Simulator">
  </div>

  <h3 class="bigpadding_top">
    <?=__('tabletop_simulator_limits_title')?>
  </h3>

  <p>
    <?=__('tabletop_simulator_limits_body')?>
  </p>
  <ul>
    <li>
      <?=__('tabletop_simulator_limits_1')?>
    </li>
    <li>
      <?=__('tabletop_simulator_limits_2')?>
    </li>
    <li>
      <?=__('tabletop_simulator_limits_3')?>
    </li>
    <li>
      <?=__('tabletop_simulator_limits_4')?>
    </li>
  </ul>

  <div class="bigpadding_top">
    <img src="<?=$path?>img/gameplay/tabletop_simulator_2.png" alt="Tabletop Simulator">
  </div>

  <h3 class="bigpadding_top">
    <?=__('tabletop_simulator_tips_title')?>
  </h3>

  <p>
    <?=__('tabletop_simulator_tips_body_1')?>
  </p>

  <p>
    <?=__('tabletop_simulator_tips_body_2')?>
  </p>

  <p>
    <?=__('tabletop_simulator_tips_body_3')?>
  </p>

  <p>
    <?=__('tabletop_simulator_tips_body_4')?>
  </p>

  <p>
    <?=__('tabletop_simulator_tips_body_5')?>
  </p>

  <div class="bigpadding_top">
    <img src="<?=$path?>img/gameplay/tabletop_simulator_3.png" alt="Tabletop Simulator">
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';