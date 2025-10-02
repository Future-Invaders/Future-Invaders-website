<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/strategies";
$page_title_en    = "Strategies";
$page_title_fr    = "Stratégies";
$page_description = "Strategies which might help you when playing the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50 bigpadding_bot">

  <div class="bigpadding_bot">
    <a href="<?=$path?>pages/guides">
      <img src="<?=$path?>img/banners/banner_strategies.png" alt="<?=__('menu_strategies')?>">
    </a>
  </div>

  <h2>
    <?=__('strategy_title')?>
  </h2>

  <p>
    <?=__('strategy_body_1')?>
  </p>

  <p>
    <?=__('strategy_body_2')?>
  </p>

  <p>
    <?=__('strategy_body_3')?>
  </p>

</div>

<hr>

<div class="width_50 bigpadding_top bigpadding_bot">

  <h5 class="smallpadding_bot">
    <?=__('toc')?>
  </h5>

  <ul style="column-count: 2;">
    <li>
      <?=__link('pages/game/strategies#speed', __('strategy_speed_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#pacing', __('strategy_pacing_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#curve', __('strategy_curve_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#tempo', __('strategy_tempo_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#advantage', __('strategy_advantage_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#overextending', __('strategy_overextending_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#synergy', __('strategy_synergy_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#archetypes', __('strategy_archetypes_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#wincon', __('strategy_wincon_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#reach', __('strategy_reach_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#resiliency', __('strategy_resiliency_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#thinning', __('strategy_thinning_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#mindgames', __('strategy_mindgames_title'))?>
    </li>
    <li>
      <?=__link('pages/game/strategies#riskassess', __('strategy_riskassess_title'))?>
    </li>
  </ul>

</div>

<hr>

<div class="width_50 bigpadding_top">

  <h5 class="underlined" id="speed">
    <?=__('strategy_speed_title')?>
  </h5>

  <p>
    <?=__('strategy_speed_body_1')?>
  </p>

  <p>
    <?=__('strategy_speed_body_2')?>
  </p>

  <p>
    <?=__('strategy_speed_body_3')?>
  </p>

  <p>
    <?=__('strategy_speed_body_4')?>
  </p>

  <p>
    <?=__('strategy_speed_body_5')?>
  </p>

  <h5 class="underlined hugepadding_top" id="pacing">
    <?=__('strategy_pacing_title')?>
  </h5>

  <p>
    <?=__('strategy_pacing_body_1')?>
  </p>

  <p>
    <?=__('strategy_pacing_body_2')?>
  </p>

  <p>
    <?=__('strategy_pacing_body_3')?>
  </p>

  <p>
    <?=__('strategy_pacing_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="curve">
    <?=__('strategy_curve_title')?>
  </h5>

  <p>
    <?=__('strategy_curve_body_1')?>
  </p>

  <p>
    <?=__('strategy_curve_body_2')?>
  </p>

  <p>
    <?=__('strategy_curve_body_3')?>
  </p>

  <p>
    <?=__('strategy_curve_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="tempo">
    <?=__('strategy_tempo_title')?>
  </h5>

  <p>
    <?=__('strategy_tempo_body_1')?>
  </p>

  <p>
    <?=__('strategy_tempo_body_2')?>
  </p>

  <p>
    <?=__('strategy_tempo_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="advantage">
    <?=__('strategy_advantage_title')?>
  </h5>

  <p>
    <?=__('strategy_advantage_body_1')?>
  </p>

  <p>
    <?=__('strategy_advantage_body_2')?>
  </p>

  <p>
    <?=__('strategy_advantage_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="overextending">
    <?=__('strategy_overextending_title')?>
  </h5>

  <p>
    <?=__('strategy_overextending_body_1')?>
  </p>

  <p>
    <?=__('strategy_overextending_body_2')?>
  </p>

  <p>
    <?=__('strategy_overextending_body_3')?>
  </p>

  <p>
    <?=__('strategy_overextending_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="synergy">
    <?=__('strategy_synergy_title')?>
  </h5>

  <p>
    <?=__('strategy_synergy_body_1')?>
  </p>

  <p>
    <?=__('strategy_synergy_body_2')?>
  </p>

  <p>
    <?=__('strategy_synergy_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="archetypes">
    <?=__('strategy_archetypes_title')?>
  </h5>

  <p>
    <?=__('strategy_archetypes_body_1')?>
  </p>

  <p>
    <?=__('strategy_archetypes_body_2')?>
  </p>

  <p>
    <?=__('strategy_archetypes_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="wincon">
    <?=__('strategy_wincon_title')?>
  </h5>

  <p>
    <?=__('strategy_wincon_body_1')?>
  </p>

  <p>
    <?=__('strategy_wincon_body_2')?>
  </p>

  <p>
    <?=__('strategy_wincon_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="reach">
    <?=__('strategy_reach_title')?>
  </h5>

  <p>
    <?=__('strategy_reach_body_1')?>
  </p>

  <p>
    <?=__('strategy_reach_body_2')?>
  </p>

  <p>
    <?=__('strategy_reach_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="resiliency">
    <?=__('strategy_resiliency_title')?>
  </h5>

  <p>
    <?=__('strategy_resiliency_body_1')?>
  </p>

  <p>
    <?=__('strategy_resiliency_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="thinning">
    <?=__('strategy_thinning_title')?>
  </h5>

  <p>
    <?=__('strategy_thinning_body_1')?>
  </p>

  <p>
    <?=__('strategy_thinning_body_2')?>
  </p>

  <p>
    <?=__('strategy_thinning_body_3')?>
  </p>

  <p>
    <?=__('strategy_thinning_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="mindgames">
    <?=__('strategy_mindgames_title')?>
  </h5>

  <p>
    <?=__('strategy_mindgames_body_1')?>
  </p>

  <p>
    <?=__('strategy_mindgames_body_2')?>
  </p>

  <p>
    <?=__('strategy_mindgames_body_3')?>
  </p>

  <p>
    <?=__('strategy_mindgames_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="riskassess">
    <?=__('strategy_riskassess_title')?>
  </h5>

  <p>
    <?=__('strategy_riskassess_body_1')?>
  </p>

  <p>
    <?=__('strategy_riskassess_body_2')?>
  </p>

  <p>
    <?=__('strategy_riskassess_body_3')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';