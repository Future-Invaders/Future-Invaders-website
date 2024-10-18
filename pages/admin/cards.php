<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/card_types";
$page_title_en  = "Admin: Card types";
$page_title_fr  = "Admin : Types de cartes";

// Admin menu selection
$admin_menu['cards'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a card

if(isset($_POST['card_add']))
{
  // Gather the postdata
  $card_add_name_en     = form_fetch_element('card_name_en');
  $card_add_name_fr     = form_fetch_element('card_name_fr');
  $card_add_type        = form_fetch_element('card_type');
  $card_add_faction     = form_fetch_element('card_faction');
  $card_add_rarity      = form_fetch_element('card_rarity');
  $card_add_release     = form_fetch_element('card_release');
  $card_add_image_en    = form_fetch_element('card_image_en');
  $card_add_image_fr    = form_fetch_element('card_image_fr');
  $card_add_hidden      = form_fetch_element('card_hidden');
  $card_add_extra       = form_fetch_element('card_extra');
  $card_add_weapons     = form_fetch_element('card_weapons', default_value: 0);
  $card_add_cost        = form_fetch_element('card_cost', default_value: 0);
  $card_add_durability  = form_fetch_element('card_durability', default_value: "");
  $card_add_income      = form_fetch_element('card_income', default_value: "");
  $card_add_body_en     = form_fetch_element('card_body_en');
  $card_add_body_fr     = form_fetch_element('card_body_fr');

  // Fetch card tags
  $card_tags = tags_list(search: array('ftype' => 'Card'));

  // Gather card postdata
  for($i = 0; $i < $card_tags['rows']; $i++)
    $card_add_tags[$card_tags[$i]['id']] = form_fetch_element("card_tag_".$card_tags[$i]['id'], element_exists: true);

  // Assemble an array with the postdata
  $card_add_data = array(  'name_en'       => $card_add_name_en     ,
                           'name_fr'       => $card_add_name_fr     ,
                           'type'          => $card_add_type        ,
                           'faction'       => $card_add_faction     ,
                           'rarity'        => $card_add_rarity      ,
                           'release'       => $card_add_release     ,
                           'image_en'      => $card_add_image_en    ,
                           'image_fr'      => $card_add_image_fr    ,
                           'hidden'        => $card_add_hidden      ,
                           'extra'         => $card_add_extra       ,
                           'weapons'       => $card_add_weapons     ,
                           'cost'          => $card_add_cost        ,
                           'durability'    => $card_add_durability  ,
                           'income'        => $card_add_income      ,
                           'body_en'       => $card_add_body_en     ,
                           'body_fr'       => $card_add_body_fr     ,
                           'card_tags'     => $card_add_tags        );

  // Add the card to the database
  cards_add($card_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// List of elements needed for search menus

// List of releases
$releases_list = releases_list();

// List of card types
$card_types_list = card_types_list();

// List of factions
$factions_list = factions_list();

// List of card rarities
$card_rarities_list = card_rarities_list();

// List of card tags
$card_tags_list = tags_list(search: array('ftype' => 'Card'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// List of cards

// Fetch the sorting order
$admin_cards_sort = form_fetch_element('admin_cards_sort', 'default');

// Assemble the search data
$admin_cards_search = array(  'name'        => form_fetch_element('admin_cards_search_name')        ,
                              'release_id'  => form_fetch_element('admin_cards_search_release')     ,
                              'type_id'     => form_fetch_element('admin_cards_search_type')        ,
                              'faction_id'  => form_fetch_element('admin_cards_search_faction')     ,
                              'rarity_id'   => form_fetch_element('admin_cards_search_rarity')      ,
                              'cost'        => form_fetch_element('admin_cards_search_cost')        ,
                              'income'      => form_fetch_element('admin_cards_search_income')      ,
                              'weapons'     => form_fetch_element('admin_cards_search_weapons')     ,
                              'durability'  => form_fetch_element('admin_cards_search_durability')  ,
                              'body'        => form_fetch_element('admin_cards_search_body')        ,
                              'extra'       => form_fetch_element('admin_cards_search_extra')       ,
                              'tag_id'      => form_fetch_element('admin_cards_search_tags')        );

// Fetch the cards
$cards_list = cards_list( $admin_cards_sort   ,
                          $admin_cards_search );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_80 padding_top">

  <h5>
    <?=__('admin_card_management').__(':')?>
  </h5>

  <ul class="tinypadding_top bigpadding_bot">
    <li>
      <?=__link('pages/admin/card_types', __('admin_card_management_types'))?>
    </li>
    <li>
      <?=__link('pages/admin/card_rarities', __('admin_card_management_rarities'))?>
    </li>
  </ul>

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_card_list_name')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('name');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_release')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('release');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_type')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('type');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_faction')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('faction');")?>
        </th>
        <th class="align_center tooltip_container">
          <?=__('admin_card_list_rarity')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('rarity');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_cost')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('cost');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_income')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('income');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_weapons')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('weapons');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_durability')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('durability');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_body')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('body');")?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_data')?>
        </th>
        <th class="align_center">
          <?=__('admin_card_list_tags')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_cards_search('tags');")?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

      <tr>
        <th>
          <input type="hidden" name="admin_cards_sort" id="admin_cards_sort" value="default">
          <input type="text" class="table_search" name="admin_cards_search_name" id="admin_cards_search_name" value="" onkeyup="admin_cards_search();">
        </th>
        <th>
          <select class="table_search" name="admin_cards_search_release" id="admin_cards_search_release" onchange="admin_cards_search();">
            <option value="0">&nbsp;</option>
            <option value="-1"><?=string_change_case(__('none'), 'initials')?></option>
            <?php for($i = 0; $i < $releases_list['rows']; $i++): ?>
            <option value="<?=$releases_list[$i]['id']?>"><?=$releases_list[$i]['name']?></option>
            <?php endfor; ?>
          </select>
        </th>
        <th>
          <select class="table_search" name="admin_cards_search_type" id="admin_cards_search_type" onchange="admin_cards_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $card_types_list['rows']; $i++): ?>
            <option value="<?=$card_types_list[$i]['id']?>"><?=$card_types_list[$i]['name']?></option>
            <?php endfor; ?>
            <option value="-1"><?=string_change_case(__('none'), 'initials')?></option>
          </select>
        </th>
        <th>
          <select class="table_search" name="admin_cards_search_faction" id="admin_cards_search_faction" onchange="admin_cards_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $factions_list['rows']; $i++): ?>
            <option value="<?=$factions_list[$i]['id']?>"><?=$factions_list[$i]['name']?></option>
            <?php endfor; ?>
            <option value="-1"><?=string_change_case(__('none'), 'initials')?></option>
          </select>
        </th>
        <th>
          <select class="table_search" name="admin_cards_search_rarity" id="admin_cards_search_rarity" onchange="admin_cards_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $card_rarities_list['rows']; $i++): ?>
            <option value="<?=$card_rarities_list[$i]['id']?>"><?=$card_rarities_list[$i]['name']?></option>
            <?php endfor; ?>
            <option value="-1"><?=string_change_case(__('none'), 'initials')?></option>
          </select>
        </th>
        <th>
          <input type="text" class="table_search" name="admin_cards_search_cost" id="admin_cards_search_cost" value="" onkeyup="admin_cards_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_cards_search_income" id="admin_cards_search_income" value="" onkeyup="admin_cards_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_cards_search_weapons" id="admin_cards_search_weapons" value="" onkeyup="admin_cards_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_cards_search_durability" id="admin_cards_search_durability" value="" onkeyup="admin_cards_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_cards_search_body" id="admin_cards_search_body" value="" onkeyup="admin_cards_search();">
        </th>
        <th>
          <select class="table_search" name="admin_cards_search_extra" id="admin_cards_search_extra" onchange="admin_cards_search();">
            <option value="0">&nbsp;</option>
            <option value="1"><?=__('admin_card_list_hidden')?></option>
            <option value="10"><?=__('admin_card_list_extra')?></option>
            <option value="100"><?=__('admin_card_list_image_yes')?></option>
            <option value="101"><?=__('admin_card_list_image_one')?></option>
            <option value="102"><?=__('admin_card_list_image_no')?></option>
          </select>
        </th>
        <th>
          <select class="table_search" name="admin_cards_search_tags" id="admin_cards_search_tags" onchange="admin_cards_search();">
            <option value="">&nbsp;</option>
            <option value="-1"><?=string_change_case(__('none'), 'initials')?></option>
            <?php for($i = 0; $i < $card_tags_list['rows']; $i++): ?>
            <option value="<?=$card_tags_list[$i]['id']?>"><?=$card_tags_list[$i]['name']?></option>
            <?php endfor; ?>
          </select>
        </th>
        <th>
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/cards_add')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_cards_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="13" class="uppercase text_light dark bold align_center">
          <?=__('admin_card_list_count', preset_values: array($cards_list['rows']), amount: $cards_list['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $cards_list['rows']; $i++): ?>

      <tr id="admin_cards_row_<?=$cards_list[$i]['id']?>">

        <td class="align_left nowrap tooltip_container">
          <?=$cards_list[$i]['name']?>
          <div class="tooltip bold">
            <?=$cards_list[$i]['name_en']?><br>
            <?=$cards_list[$i]['name_fr']?>
          </div>
        </td>

        <?php if($cards_list[$i]['release']) : ?>
        <td class="align_center nowrap tooltip_container">
          <?=$cards_list[$i]['release']?>
          <div class="tooltip">
            <?=$cards_list[$i]['release_en']?><br>
            <?=$cards_list[$i]['release_fr']?>
          </div>
        </td>
        <?php else: ?>
        <td class="align_center">
          &nbsp;
        </td>
        <?php endif; ?>

        <td class="align_center nowrap">
          <?=$cards_list[$i]['type']?>
        </td>

        <td class="align_center nowrap">
          <?=$cards_list[$i]['faction']?>
        </td>

        <td class="align_center nowrap">
          <?=$cards_list[$i]['rarity']?>
        </td>

        <td class="align_center bold nowrap">
          <?=$cards_list[$i]['cost']?>
        </td>

        <td class="align_center bold nowrap">
          <?=$cards_list[$i]['income']?>
        </td>

        <td class="align_center bold nowrap">
          <?=$cards_list[$i]['weapons']?>
        </td>

        <td class="align_center bold nowrap">
          <?=$cards_list[$i]['durability']?>
        </td>

        <?php if($cards_list[$i]['body_en'] || $cards_list[$i]['body_fr']): ?>
        <td class="align_center nowrap tooltip_container">
          <?=$cards_list[$i]['length_en']?> - <?=$cards_list[$i]['length_fr']?>
          <div class="tooltip dowrap body_preview">
            <?=$cards_list[$i]['body_en']?>
            <hr>
            <?=$cards_list[$i]['body_fr']?>
          </div>
        </td>
        <?php else: ?>
        <td>
          &nbsp;
        </td>
        <?php endif; ?>

        <td class="align_center nowrap">

          <?php if($cards_list[$i]['hidden']): ?>
          <?=__icon('user_delete', is_small: true, alt: __('admin_card_list_hidden'), title: __('admin_card_list_hidden'), class: 'valign_middle')?>
          <?php endif; ?>

          <?php if($cards_list[$i]['extra']): ?>
          <?=__icon('duplicate', is_small: true, alt: __('admin_card_list_extra'), title: __('admin_card_list_extra'), class: 'valign_middle')?>
          <?php endif; ?>

          <?php if($cards_list[$i]['image_en']): ?>
          <?=__icon('image', is_small: true, alt: 'I', title: __('image'), title_case: 'initials', href: $cards_list[$i]['image_en'], popup: true)?>
          <?php endif;

          if($cards_list[$i]['image_fr']): ?>
          <?=__icon('image', is_small: true, alt: 'I', title: __('image'), title_case: 'initials', href: $cards_list[$i]['image_fr'], popup: true)?>
          <?php endif; ?>

        </td>

        <?php if($cards_list[$i]['tags']): ?>
        <td class="align_center tooltip_container">
          <span class="bold"><?=$cards_list[$i]['ntags']?></span>
          <div class="tooltip">
            <?=$cards_list[$i]['tags']?>
          </div>
        </td>
        <?php else: ?>
        <td>
          &nbsp;
        </td>
        <?php endif; ?>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer tinyspaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/cards_edit?card='.$cards_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_cards_delete('".__('admin_card_delete_confirm')."','".$cards_list[$i]['id']."')")?>
        </td>

      </tr>

      <?php endfor; ?>

    </tbody>

    <?php if(!page_is_fetched_dynamically()): ?>

  </table>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;