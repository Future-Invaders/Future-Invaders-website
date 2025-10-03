<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "game/features";
$page_title_en    = "Features";
$page_title_fr    = "Originalités";
$page_description = "Unique features of the strategy sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/banners/banner_features.png" alt="<?=__('menu_features')?>">
    </a>
  </div>

  <h1>
    <?=__('features_intro_title')?>
  </h1>

  <p>
    <?=__('features_intro_body_1')?>
  </p>

  <p>
    <?=__('features_intro_body_2')?>
  </p>

  <ul class="padding_top">
    <li class="tinypadding_bot">
      <?=__link('#grid', __('features_grid_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#multi', __('features_multi_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#types', __('features_types_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#chain', __('features_chain_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#scrap', __('features_scrap_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#draw', __('features_draw_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#choices', __('features_choices_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#rarity', __('features_rarity_title'), is_internal: false)?>
    </li>
    <li class="tinypadding_bot">
      <?=__link('#restrictions', __('features_restrictions_title'), is_internal: false)?>
    </li>
  </ul>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_5.png" alt="Gameplay">
  </div>

  <h5 class="hugepadding_top" id="grid">
    <?=__('features_grid_title')?>
  </h5>

  <p>
    <?=__('features_grid_body_1')?>
  </p>

  <p>
    <?=__('features_grid_body_2')?>
  </p>

  <h5 class="hugepadding_top" id="multi">
    <?=__('features_multi_title')?>
  </h5>

  <p>
    <?=__('features_multi_body_1')?>
  </p>

  <p>
    <?=__('features_multi_body_2')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_8.png" alt="Gameplay">
  </div>

  <h5 class="hugepadding_top" id="types">
    <?=__('features_types_title')?>
  </h5>

  <p>
    <?=__('features_types_body_1')?>
  </p>

  <p>
    <?=__('features_types_body_2')?>
  </p>

  <h5 class="hugepadding_top" id="chain">
    <?=__('features_chain_title')?>
  </h5>

  <p>
    <?=__('features_chain_body_1')?>
  </p>

  <p>
    <?=__('features_chain_body_2')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_6.png" alt="Gameplay">
  </div>

  <h5 class="hugepadding_top" id="scrap">
    <?=__('features_scrap_title')?>
  </h5>

  <p>
    <?=__('features_scrap_body_1')?>
  </p>

  <p>
    <?=__('features_scrap_body_2')?>
  </p>

  <h5 class="hugepadding_top" id="draw">
    <?=__('features_draw_title')?>
  </h5>

  <p>
    <?=__('features_draw_body_1')?>
  </p>

  <p>
    <?=__('features_draw_body_2')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_2.png" alt="Gameplay">
  </div>

  <h5 class="hugepadding_top" id="choices">
    <?=__('features_choices_title')?>
  </h5>

  <p>
    <?=__('features_choices_body_1')?>
  </p>

  <p>
    <?=__('features_choices_body_2')?>
  </p>

  <h5 class="hugepadding_top" id="rarity">
    <?=__('features_rarity_title')?>
  </h5>

  <p>
    <?=__('features_rarity_body_1')?>
  </p>

  <p>
    <?=__('features_rarity_body_2')?>
  </p>

  <h5 class="hugepadding_top" id="restrictions">
    <?=__('features_restrictions_title')?>
  </h5>

  <p>
    <?=__('features_restrictions_body_1')?>
  </p>

  <p>
    <?=__('features_restrictions_body_2')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_1.png" alt="Gameplay">
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';