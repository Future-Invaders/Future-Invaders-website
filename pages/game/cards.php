<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';      # Core
include_once './../../actions/cards.act.php';     # Card management
include_once './../../actions/factions.act.php';  # Faction management
include_once './../../actions/tags.act.php';      # Tag management
include_once './../../lang/game.lang.php';        # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/cards";
$page_title_en    = "Card list";
$page_title_fr    = "Liste des cartes";
$page_description = "List of all cards in the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of cards

// Fetch the search data
$cards_search_name_lang         = 'name_'.string_change_case($lang, 'lowercase');
$cards_search_name              = form_fetch_element('cards_search_name');
$cards_search_body_lang         = 'body_'.string_change_case($lang, 'lowercase');
$cards_search_body              = form_fetch_element('cards_search_body');
$cards_search_languages         = form_fetch_element('cards_search_languages');
$cards_search_languages_checked = (form_fetch_element('cards_search_languages')) ? ' checked' : '';
$cards_search_type              = form_fetch_element('cards_search_type');
$cards_search_faction           = form_fetch_element('cards_search_faction');
$cards_search_rarity            = form_fetch_element('cards_search_rarity');
$cards_search_tags              = form_fetch_element('cards_search_tags');
$cards_search_tag               = form_fetch_element('tag', request_type: 'GET');

// Assemble the search data
$cards_sort   = form_fetch_element('cards_sort', default_value: 'default');
$cards_search = array(  $cards_search_name_lang => $cards_search_name       ,
                        $cards_search_body_lang => $cards_search_body       ,
                        'search_langs'          => $cards_search_languages  ,
                        'type_id'               => $cards_search_type       ,
                        'faction_id'            => $cards_search_faction    ,
                        'rarity_id'             => $cards_search_rarity     ,
                        'tag_id'                => $cards_search_tags       ,
                        'tag'                   => $cards_search_tag        ,
                        'public'                => true                     ,
                        'is_not_extra'          => true                     );

// Look up the cards
$card_list = cards_list(  sort_by:  $cards_sort   ,
                          search:   $cards_search );

// Fetch the tag description if necessary
if($cards_search_tag)
  $tag_details = tags_get( tag_name: $cards_search_tag );



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Prepare dropdown menus

// Card types
$card_types = card_types_list();
for($i = 0; $i < $card_types['rows']; $i++)
{
  $card_type_selected[$i] = '';
  if($card_types[$i]['id'] === $cards_search_type)
    $card_type_selected[$i] = ' selected';
}

// Factions
$factions = factions_list();
for($i = 0; $i < $factions['rows']; $i++)
{
  $faction_selected[$i] = '';
  if($factions[$i]['id'] === $cards_search_faction)
    $faction_selected[$i] = ' selected';
}

// Card rarity
$card_rarities = card_rarities_list();
for($i = 0; $i < $card_rarities['rows']; $i++)
{
  $card_rarity_selected[$i] = '';
  if($card_rarities[$i]['id'] === $cards_search_rarity)
    $card_rarity_selected[$i] = ' selected';
}

// Card tags
$card_tags = tags_list(search: array('ftype' => 'Card'));
for($i = 0; $i < $card_tags['rows']; $i++)
{
  $card_tag_selected[$i] = '';
  if($card_tags[$i]['id'] === $cards_search_tags)
    $card_tag_selected[$i] = ' selected';
}

// Sorting order
$cards_sort_options = array('default', 'name', 'cost', 'income', 'weapons', 'durability');
foreach($cards_sort_options as $cards_sort_option)
  $cards_sort_selected[$cards_sort_option] = ($cards_sort === $cards_sort_option) ? ' selected' : '';




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_60 smallpadding_top">

  <h2>
    <?=__('card_list_title')?>
  </h2>

  <p>
    <?=__('card_list_body')?>
  </p>

  <?php if(!isset($_GET['search'])): ?>
  <p class="padding_top">
    <?=__icon('maximize', is_small: true, alt: 'M', title: __('cards_list_search_open'), title_case: 'initials', href: 'pages/game/cards?search')?>
    &nbsp;<?=__link('pages/game/cards?search', __('cards_list_search_open'))?>
  </p>
  <?php else: ?>
  <p class="padding_top">
    <?=__icon('minimize', is_small: true, alt: 'M', title: __('cards_list_search_close'), title_case: 'initials', href: 'pages/game/cards')?>
    &nbsp;<?=__link('pages/game/cards', __('cards_list_search_close'))?>
  </p>

  <form method="POST" action="cards?search#cards">
    <fieldset>
      <div class="padding_top smallpadding_bot">
        <label for="cards_search_name"><?=__('cards_search_name')?></label>
        <input class="indiv" type="text" id="cards_search_name" name="cards_search_name" value="<?=$cards_search_name?>">
      </div>
      <div class="smallpadding_bot">
        <label for="cards_search_body"><?=__('cards_search_body')?></label>
        <input class="indiv" type="text" id="cards_search_body" name="cards_search_body" value="<?=$cards_search_body?>">
      </div>
      <div class="tinypadding_bot">
        <input type="checkbox" name="cards_search_languages" id="cards_search_languages" onchange="admin_cards_search();"<?=$cards_search_languages_checked?>>
        <label class="label_inline" for="cards_search_languages"><?=__('cards_search_languages')?></label>
      </div>
      <div class="smallpadding_bot">
        <label for="cards_search_type"><?=__('cards_search_type')?></label>
        <select id="cards_search_type" name="cards_search_type" class="indiv align_left">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < 4; $i++): ?>
          <option value="<?=$card_types[$i]['id']?>"<?=$card_type_selected[$i]?>><?=$card_types[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="smallpadding_bot">
        <label for="cards_search_faction"><?=__('cards_search_faction')?></label>
        <select id="cards_search_faction" name="cards_search_faction" class="indiv align_left">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $factions['rows']; $i++): ?>
          <option value="<?=$factions[$i]['id']?>"<?=$faction_selected[$i]?>><?=$factions[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="smallpadding_bot">
        <label for="cards_search_rarity"><?=__('cards_search_rarity')?></label>
        <select id="cards_search_rarity" name="cards_search_rarity" class="indiv align_left">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $card_rarities['rows']; $i++): ?>
          <option value="<?=$card_rarities[$i]['id']?>"<?=$card_rarity_selected[$i]?>><?=$card_rarities[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="smallpadding_bot">
        <label for="cards_search_tags"><?=__('cards_search_tags')?></label>
        <select id="cards_search_tags" name="cards_search_tags" class="indiv align_left">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $card_tags['rows']; $i++): ?>
          <option value="<?=$card_tags[$i]['id']?>"<?=$card_tag_selected[$i]?>><?=$card_tags[$i]['fdesc']?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="padding_bot">
        <label for="cards_sort"><?=__('cards_sort')?></label>
        <select id="cards_sort" name="cards_sort" class="indiv align_left">
          <option value="default"<?=$cards_sort_selected['default']?>>&nbsp;</option>
          <option value="name"<?=$cards_sort_selected['name']?>><?=__('cards_sort_name')?></option>
          <option value="cost"<?=$cards_sort_selected['cost']?>><?=__('cards_sort_cost')?></option>
          <option value="income"<?=$cards_sort_selected['income']?>><?=__('cards_sort_income')?></option>
          <option value="weapons"<?=$cards_sort_selected['weapons']?>><?=__('cards_sort_weapons')?></option>
          <option value="durability"<?=$cards_sort_selected['durability']?>><?=__('cards_sort_durability')?></option>
        </select>
      </div>
      <input type="submit" name="cards_search_submit" value="<?=__('cards_search_submit')?>">
    </fieldset>
  </form>

  <?php endif; ?>

  <div class="padding_top padding_bot" id="cards">
    <div class="black bigspaced tinypadding_top smallpadding_bot">
      <?php if(!isset($_GET['tag'])): ?>
      <h5>
        <?=__('card_list_count', preset_values: array($card_list['rows']), amount: $card_list['rows'])?>
      </h5>
      <?php else: ?>
      <h5>
        <?=__('card_list_count', preset_values: array($card_list['rows']), amount: $card_list['rows']).__('card_list_count_tags', preset_values: array($cards_search_tag))?>
      </h5>
      <?php if($tag_details): ?>
      <p class="nopadding_top italics">
        <?=$tag_details['desc']?>
      </p>
      <?php endif; ?>
      <?php endif; ?>
      <div class="card_gallery">
        <?php for($i = 0; $i < $card_list['rows']; $i++): ?>
        <div class="card_gallery_cell">
          <a href="./../../pages/card/<?=$card_list[$i]['slug']?>" class="noglow">
            <img class="tinypadding_top" src="<?=$card_list[$i]['thumb']?>" alt="<?=$card_list[$i]['image_name']?>" loading="lazy">
          </a>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';