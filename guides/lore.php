<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../actions/cards.act.php'; # Card management
include_once './../lang/guides.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "guides/lore";
$page_title_en    = "Lore";
$page_title_fr    = "Univers";
$page_description = "Worldbuilding of the strategy sci-fi card battling game Future Invaders";

// Extra css
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch lore cards

// Prepare the correct language string
$card_lang = string_change_case($lang, 'lowercase');

// Fetch lore cards
$lore_cards = cards_list( sort_by:  'name'                        ,
                          search:   array(  'type'    => 'Lore'   ,
                                            'public'  => true   ) );





/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50 bigpadding_bot">

  <div class="bigpadding_bot">
    <a href="<?=$path?>guides">
      <img src="<?=$path?>img/banners/banner_lore.png" alt="<?=__('menu_lore')?>">
    </a>
  </div>

  <h2>
    <?=__('lore_title')?>
  </h2>

  <p>
    <?=__('lore_body_1')?>
  </p>

  <p>
    <?=__('lore_body_2')?>
  </p>

</div>

<div class="width_50">

  <?php for($i = 0; $i < $lore_cards['rows']; $i++): ?>

  <div class="flexcontainer rules_container padding_bot" id="rule_<?=($i+1)?>">

    <div style="flex: 8">
      <div class="black bigspaced tinypadding_top smallpadding_bot">
        <h4>
          <?=$lore_cards[$i]['name_'.$card_lang]?>
        </h4>
        <p>
          <?=$lore_cards[$i]['body_'.$card_lang.'_raw']?>
        </p>
      </div>
    </div>

  </div>

  <?php endfor; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';