<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/vocabulary";
$page_title_en    = "Glossary";
$page_title_fr    = "Glossaire";
$page_description = "Glossary for the strategy sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50 bigpadding_bot">

  <h2>
    <?=__('vocabulary_title')?>
  </h2>

  <p>
    <?=__('vocabulary_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_body_2')?>
  </p>

</div>

<hr>

<div class="width_50 bigpadding_top bigpadding_bot">

  <h5 class="smallpadding_bot">
    <?=__('toc')?>
  </h5>

  <ul>
  <li>
      <?=__link('pages/game/vocabulary#action', __('vocabulary_action_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#arsenal', __('vocabulary_arsenal_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#attack', __('vocabulary_attack_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#base', __('vocabulary_base_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#combat', __('vocabulary_combat_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#cost', __('vocabulary_cost_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#deploy', __('vocabulary_deploy_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#destroy', __('vocabulary_destroy_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#draw', __('vocabulary_draw_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#durability', __('vocabulary_durability_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#effect', __('vocabulary_effect_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#faction', __('vocabulary_faction_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#failure', __('vocabulary_failure_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#format', __('vocabulary_format_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#grid', __('vocabulary_grid_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#hand', __('vocabulary_hand_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#income', __('vocabulary_income_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#pinnacle', __('vocabulary_pinnacle_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#player', __('vocabulary_player_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#priority', __('vocabulary_priority_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#rarity', __('vocabulary_rarity_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#reaction', __('vocabulary_reaction_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#recycle', __('vocabulary_recycle_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#renowned', __('vocabulary_renowned_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#replace', __('vocabulary_replace_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#resource', __('vocabulary_resource_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#remove', __('vocabulary_remove_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#reveal', __('vocabulary_reveal_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#scrap_pile', __('vocabulary_scrap_pile_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#ship', __('vocabulary_ship_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#structure', __('vocabulary_structure_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#target', __('vocabulary_target_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#turn', __('vocabulary_turn_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#type', __('vocabulary_type_title'))?>
    </li>
    <li>
      <?=__link('pages/game/vocabulary#weapons', __('vocabulary_weapons_title'))?>
    </li>
  </ul>

</div>

<hr>

<div class="width_50 bigpadding_top">

  <h5 class="underlined" id="action">
    <?=__('vocabulary_action_title')?>
  </h5>

  <p>
    <?=__('vocabulary_action_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_action_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_action_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_action_body_4')?>
  </p>

  <p>
    <?=__('vocabulary_action_body_5')?>
  </p>

  <p>
    <?=__('vocabulary_action_body_6')?>
  </p>

  <h5 class="underlined hugepadding_top" id="arsenal">
    <?=__('vocabulary_arsenal_title')?>
  </h5>

  <p>
    <?=__('vocabulary_arsenal_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_arsenal_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_arsenal_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_arsenal_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="attack">
    <?=__('vocabulary_attack_title')?>
  </h5>

  <p>
    <?=__('vocabulary_attack_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_attack_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_attack_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="base">
    <?=__('vocabulary_base_title')?>
  </h5>

  <p>
    <?=__('vocabulary_base_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_base_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_base_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="combat">
    <?=__('vocabulary_combat_title')?>
  </h5>

  <p>
    <?=__('vocabulary_combat_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_combat_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="cost">
    <?=__('vocabulary_cost_title')?>
  </h5>

  <p>
    <?=__('vocabulary_cost_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_cost_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_cost_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="deploy">
    <?=__('vocabulary_deploy_title')?>
  </h5>

  <p>
    <?=__('vocabulary_deploy_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_deploy_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="destroy">
    <?=__('vocabulary_destroy_title')?>
  </h5>

  <p>
    <?=__('vocabulary_destroy_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_destroy_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="draw">
    <?=__('vocabulary_draw_title')?>
  </h5>

  <p>
    <?=__('vocabulary_draw_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_draw_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="durability">
    <?=__('vocabulary_durability_title')?>
  </h5>

  <p>
    <?=__('vocabulary_durability_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_durability_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_durability_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_durability_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="effect">
    <?=__('vocabulary_effect_title')?>
  </h5>

  <p>
    <?=__('vocabulary_effect_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_effect_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="faction">
    <?=__('vocabulary_faction_title')?>
  </h5>

  <p>
    <?=__('vocabulary_faction_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_faction_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="failure">
    <?=__('vocabulary_failure_title')?>
  </h5>

  <p>
    <?=__('vocabulary_failure_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_failure_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_failure_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="format">
    <?=__('vocabulary_format_title')?>
  </h5>

  <p>
    <?=__('vocabulary_format_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_format_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_format_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="grid">
    <?=__('vocabulary_grid_title')?>
  </h5>

  <p>
    <?=__('vocabulary_grid_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_grid_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_grid_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_grid_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="hand">
    <?=__('vocabulary_hand_title')?>
  </h5>

  <p>
    <?=__('vocabulary_hand_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_hand_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_hand_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_hand_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="income">
    <?=__('vocabulary_income_title')?>
  </h5>

  <p>
    <?=__('vocabulary_income_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_income_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_income_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="pinnacle">
    <?=__('vocabulary_pinnacle_title')?>
  </h5>

  <p>
    <?=__('vocabulary_pinnacle_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_pinnacle_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_pinnacle_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="player">
    <?=__('vocabulary_player_title')?>
  </h5>

  <p>
    <?=__('vocabulary_player_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_player_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="priority">
    <?=__('vocabulary_priority_title')?>
  </h5>

  <p>
    <?=__('vocabulary_priority_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_priority_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="rarity">
    <?=__('vocabulary_rarity_title')?>
  </h5>

  <p>
    <?=__('vocabulary_rarity_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_rarity_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="reaction">
    <?=__('vocabulary_reaction_title')?>
  </h5>

  <p>
    <?=__('vocabulary_reaction_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_reaction_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_reaction_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_reaction_body_4')?>
  </p>

  <p>
    <?=__('vocabulary_reaction_body_5')?>
  </p>

  <p>
    <?=__('vocabulary_reaction_body_6')?>
  </p>

  <p>
    <?=__('vocabulary_reaction_body_7')?>
  </p>

  <h5 class="underlined hugepadding_top" id="recycle">
    <?=__('vocabulary_recycle_title')?>
  </h5>

  <p>
    <?=__('vocabulary_recycle_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_recycle_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_recycle_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="renowned">
    <?=__('vocabulary_renowned_title')?>
  </h5>

  <p>
    <?=__('vocabulary_renowned_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_renowned_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="replace">
    <?=__('vocabulary_replace_title')?>
  </h5>

  <p>
    <?=__('vocabulary_replace_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_replace_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="resource">
    <?=__('vocabulary_resource_title')?>
  </h5>

  <p>
    <?=__('vocabulary_resource_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_resource_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_resource_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_resource_body_4')?>
  </p>

  <h5 class="underlined hugepadding_top" id="remove">
    <?=__('vocabulary_remove_title')?>
  </h5>

  <p>
    <?=__('vocabulary_remove_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_remove_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_remove_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="reveal">
    <?=__('vocabulary_reveal_title')?>
  </h5>

  <p>
    <?=__('vocabulary_reveal_body_1')?>
  </p>

  <h5 class="underlined hugepadding_top" id="scrap_pile">
    <?=__('vocabulary_scrap_pile_title')?>
  </h5>

  <p>
    <?=__('vocabulary_scrap_pile_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_scrap_pile_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_scrap_pile_body_3')?>
  </p>

  <h5 class="underlined hugepadding_top" id="ship">
    <?=__('vocabulary_ship_title')?>
  </h5>

  <p>
    <?=__('vocabulary_ship_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_ship_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_ship_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_ship_body_4')?>
  </p>

  <p>
    <?=__('vocabulary_ship_body_5')?>
  </p>

  <h5 class="underlined hugepadding_top" id="structure">
    <?=__('vocabulary_structure_title')?>
  </h5>

  <p>
    <?=__('vocabulary_structure_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_structure_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_structure_body_3')?>
  </p>

  <p>
    <?=__('vocabulary_structure_body_4')?>
  </p>

  <p>
    <?=__('vocabulary_structure_body_5')?>
  </p>

  <h5 class="underlined hugepadding_top" id="target">
    <?=__('vocabulary_target_title')?>
  </h5>

  <p>
    <?=__('vocabulary_target_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_target_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="turn">
    <?=__('vocabulary_turn_title')?>
  </h5>

  <p>
    <?=__('vocabulary_turn_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_turn_body_2')?>
  </p>

  <h5 class="underlined hugepadding_top" id="type">
    <?=__('vocabulary_type_title')?>
  </h5>

  <p>
    <?=__('vocabulary_type_body_1')?>
  </p>

  <h5 class="underlined hugepadding_top" id="weapons">
    <?=__('vocabulary_weapons_title')?>
  </h5>

  <p>
    <?=__('vocabulary_weapons_body_1')?>
  </p>

  <p>
    <?=__('vocabulary_weapons_body_2')?>
  </p>

  <p>
    <?=__('vocabulary_weapons_body_3')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';