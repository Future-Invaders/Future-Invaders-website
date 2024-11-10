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

<div class="width_60 smallpadding_top">

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

        <?php if($card_data['type']): ?>
        <div class="flexcontainer padding_top micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_type').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$card_data['type']?>
          </div>
        </div>
        <?php endif; if($card_data['faction']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_faction').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$card_data['faction']?>
          </div>
        </div>
        <?php endif; if($card_data['rarity']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_rarity').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$card_data['rarity']?>
          </div>
        </div>
        <?php endif; if($card_data['cost']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_cost').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$card_data['icost']?>
          </div>
        </div>
        <?php endif; if($card_data['income']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_income').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$card_data['iincome']?>
          </div>
        </div>
        <?php endif; if($card_data['type_en'] === 'Ship'): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_weapons').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow bold" style="flex: 3">
            <?=$card_data['weapons']?>
          </div>
        </div>
        <?php endif; if($card_data['type_en'] === 'Ship' || $card_data['type_en'] === 'Structure'): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('card_durability').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow bold" style="flex: 3">
            <?=$card_data['durability']?>
          </div>
        </div>
        <?php endif; ?>

        <?php if($card_data['body']): ?>
        <p class="padding_top smallpadding_bot">
          <?=$card_data['body']?>
        </p>
        <?php endif; ?>

      </div>
    </div>

  </div>

  <div class="bigpadding_top">
    <?php if($card_data['arsenals']['count']): ?>
    <div class="black bigspaced tinypadding_top tinypadding_bot">
      <h5>
        <?=__('card_arsenals_title')?>
      </h5>
      <?php for($i = 0; $i < $card_data['arsenals']['count']; $i++): ?>
      <p>
        &bullet; <?=__link('pages/arsenal/'.$card_data['arsenals'][$i]['slug'], $card_data['arsenals'][$i]['name'])?><br>
        <?=$card_data['arsenals'][$i]['summary']?>
      </p>
      <?php endfor; ?>
    </div>
    <?php endif; ?>
  </div>

  <div class="bigpadding_top">
    <?php if($card_data['tags']['count']): ?>
    <div class="black bigspaced tinypadding_top tinypadding_bot">
      <h5>
        <?=__('card_tags_title')?>
      </h5>
      <p class="italics tinypadding_top">
        <?=__('card_tags_body')?>
      </span>
      <?php for($i = 0; $i < $card_data['tags']['count']; $i++): ?>
      <p>
        &bullet; <?=__link('pages/game/cards?tag='.$card_data['tags'][$i]['name'], $card_data['tags'][$i]['name'])?><br>
        <?=$card_data['tags'][$i]['description']?>
      </p>
      <?php endfor; ?>
    </div>
    <?php endif; ?>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';