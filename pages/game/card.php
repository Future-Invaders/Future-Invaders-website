<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/cards.act.php'; # Card management
include_once './../../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/card/";
$page_title_en    = "";
$page_title_fr    = "";
$page_description = ", a card from the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the card's data

// Fetch the slug
$card_slug = form_fetch_element('slug', request_type: 'GET');

// Stop here if the slug is empty
if(!$card_slug)
  exit(header("Location: .."));

// Find the corresponding card
$card_data = cards_get( card_slug: $card_slug );

// Stop here if the card wasn't found, is an extra card, or is a hidden card
if(is_null($card_data) || !$card_data || $card_data['hidden'] || $card_data['extra'])
  exit(header("Location: .."));

// Update the page summary
$page_url         .= $card_slug;
$page_title_en    .= $card_data['page_title_en'];
$page_title_fr    .= $card_data['page_title_fr'];
$page_description  = $card_data['page_title_en'].$page_description ;




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_60 smallpadding_top bigpadding_bot">

  <div class="flexcontainer card_container padding_bot">

    <div class="align_center" style="flex: 4">
      <img class="card_image" src="./../../<?=$card_data['image_path']?>" alt="<?=$card_data['image_name']?>" loading="lazy">
    </div>

    <div style="flex: 1">
      &nbsp;
    </div>

    <div style="flex: 8">
      <div class="black bigspaced tinypadding_top tinypadding_bot">

        <h4 class="uppercase">
          <?=$card_data['name']?>
        </h4>

        <?php if($card_data['release']): ?>
        <p class="nopadding_top italics">
          <?=__('card_release', preset_values: array($card_data['release']))?>
        </p>
        <?php endif; ?>

        <?php if($card_data['faction'] || $card_data['type'] || $card_data['rarity']): ?>
        <p>
          <?php if($card_data['type']): ?>
          <span class="bold"><?=__('card_type').__(':')?></span> <?=$card_data['type']?>
          <?php endif; if($card_data['type'] && ($card_data['faction'] || $card_data['rarity'])): ?>
          <br>
          <?php endif; if($card_data['faction']): ?>
          <span class="bold"><?=__('card_faction').__(':')?></span> <?=$card_data['faction']?>
          <?php endif; if($card_data['faction'] && ($card_data['type'] || $card_data['rarity'])): ?>
          <br>
          <?php endif; if($card_data['rarity']): ?>
          <span class="bold"><?=__('card_rarity').__(':')?></span> <?=$card_data['rarity']?>
          <?php endif; ?>
        </p>
        <?php endif; ?>

        <?php if($card_data['cost'] || $card_data['income']): ?>
        <p>
          <?php if($card_data['cost']): ?>
          <span class="bold"><?=__('card_cost').__(':')?></span> <?=$card_data['icost']?>
          <?php endif; if($card_data['cost'] && $card_data['income']): ?>
          <br>
          <?php endif; if($card_data['income']): ?>
          <span class="bold"><?=__('card_income').__(':')?></span> <?=$card_data['iincome']?>
          <?php endif; ?>
        </p>
        <?php endif; ?>

        <?php if($card_data['type_en'] === 'Ship' || $card_data['type_en'] === 'Structure'): ?>
        <p>
          <?php if($card_data['type_en'] === 'Ship'): ?>
          <span class="bold"><?=__('card_weapons').__(':')?></span> <?=$card_data['weapons']?>
          <br>
          <?php endif; ?>
          <span class="bold"><?=__('card_durability').__(':')?></span> <?=$card_data['durability']?>
        </p>
        <?php endif; ?>

        <?php if($card_data['body']): ?>
        <p class="padding_top smallpadding_bot">
          <?=$card_data['body']?>
        </p>
        <?php endif; ?>

      </div>
    </div>

  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';