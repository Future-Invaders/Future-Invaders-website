<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/cards";
$page_title_en  = "Admin: Cards";
$page_title_fr  = "Admin : Cartes";

// Admin menu selection
$admin_menu['cards'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card data

// Fetch the card's id
$admin_card_id = (int)form_fetch_element('card', request_type: 'GET');

// Fetch the card data
$admin_card_data = cards_get($admin_card_id);

// Stop here if the card does not exist
if(!$admin_card_data)
  exit(header("Location: ".$path."pages/admin/cards"));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch releases

// Fetch a list of all releases
$releases_list = releases_list();

// Select the card's release
for($i = 0; $i < $releases_list['rows']; $i++)
{
  $card_release_selected[$i] = '';
  if($releases_list[$i]['id'] === $admin_card_data['release_id'])
    $card_release_selected[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch images

// Fetch a list of all images
$images_list = images_list();

// Select the english image
for($i = 0; $i < $images_list['rows']; $i++)
{
  $card_image_selected_en[$i] = '';
  if($images_list[$i]['id'] === $admin_card_data['image_id_en'])
    $card_image_selected_en[$i] = ' selected';
}

// Select the french image
for($i = 0; $i < $images_list['rows']; $i++)
{
  $card_image_selected_fr[$i] = '';
  if($images_list[$i]['id'] === $admin_card_data['image_id_fr'])
    $card_image_selected_fr[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card types

// Fetch a list of all types
$card_types = card_types_list();

// Select the card's type
for($i = 0; $i < $card_types['rows']; $i++)
{
  $card_type_selected[$i] = '';
  if($card_types[$i]['id'] === $admin_card_data['type_id'])
    $card_type_selected[$i] = ' selected';
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card factions

// Fetch a list of all factions
$card_factions = factions_list();

// Select the card's faction
for($i = 0; $i < $card_factions['rows']; $i++)
{
  $card_faction_selected[$i] = '';
  if($card_factions[$i]['id'] === $admin_card_data['faction_id'])
    $card_faction_selected[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card rarities

// Fetch a list of all rarities
$card_rarities = card_rarities_list();

// Select the card's rarity
for($i = 0; $i < $card_rarities['rows']; $i++)
{
  $card_rarity_selected[$i] = '';
  if($card_rarities[$i]['id'] === $admin_card_data['rarity_id'])
    $card_rarity_selected[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card tags

// Fetch a list of all tags and of the tags assigned to the card
$card_all_tags = tags_list(search: array('ftype' => 'Card'));
$card_tags     = tags_list(search: array('ftype' => 'Card', 'card_id' => $admin_card_id));

// Check the checkboxes of the tags that are already assigned to the card
for($i = 0; $i < $card_all_tags['rows']; $i++)
{
  $admin_card_tag_checked[$card_all_tags[$i]['id']] = '';
  for($j = 0; $j < $card_tags['rows']; $j++)
    if($card_all_tags[$i]['id'] === $card_tags[$j]['id'])
      $admin_card_tag_checked[$card_all_tags[$i]['id']] = ' checked';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Prepare checkboxes and fields

// Hidden card
$admin_card_hidden_checked = ($admin_card_data['hidden']) ? ' checked' : '';

// Extra card
$admin_card_extra_checked = ($admin_card_data['extra']) ? ' checked' : '';

// Hide stats for extra cards
$admin_card_extra_hidden = ($admin_card_data['extra']) ? ' class="hidden"' : '';




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__('admin_card_edit_title')?>
  </h2>

  <form action="cards" method="POST">
    <fieldset>

      <div class="flexcontainer smallpadding_bot">
        <div style="flex: 8">

          <div>
            <input type="hidden" name="card_id" value="<?=$admin_card_id?>">
            <label for="card_name_en"><?=__('admin_card_add_name_en')?></label>
            <input class="indiv" type="text" name="card_name_en" value="<?=$admin_card_data['name_en']?>">
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="card_name_fr"><?=__('admin_card_add_name_fr')?></label>
            <input class="indiv" type="text" name="card_name_fr" value="<?=$admin_card_data['name_fr']?>">
          </div>

        </div>
      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div>
            <label for="card_image_en"><?=__('admin_card_add_image_en')?></label>
            <select class="indiv align_left" name="card_image_en">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $images_list['rows']; $i++): ?>
              <option value="<?=$images_list[$i]['id']?>"<?=$card_image_selected_en[$i]?>><?=$images_list[$i]['spath']?> (<?=$images_list[$i]['name']?>)</option>
              <?php endfor; ?>
            </select>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="card_image_fr"><?=__('admin_card_add_image_fr')?></label>
            <select class="indiv align_left" name="card_image_fr">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $images_list['rows']; $i++): ?>
              <option value="<?=$images_list[$i]['id']?>"<?=$card_image_selected_fr[$i]?>><?=$images_list[$i]['spath']?> (<?=$images_list[$i]['name']?>)</option>
              <?php endfor; ?>
            </select>
          </div>

        </div>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_type')?></label>
        <select class="indiv align_left" name="card_type">
          <?php for($i = 0; $i < $card_types['rows']; $i++): ?>
          <option value="<?=$card_types[$i]['id']?>"<?=$card_type_selected[$i]?>><?=$card_types[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_faction')?></label>
        <select class="indiv align_left" name="card_faction">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $card_factions['rows']; $i++): ?>
          <option value="<?=$card_factions[$i]['id']?>"<?=$card_faction_selected[$i]?>><?=$card_factions[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_rarity')?></label>
        <select class="indiv align_left" name="card_rarity">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $card_rarities['rows']; $i++): ?>
          <option value="<?=$card_rarities[$i]['id']?>"<?=$card_rarity_selected[$i]?>><?=$card_rarities[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="padding_bot">
        <label for="card_release"><?=__('admin_card_add_release')?></label>
        <select class="indiv align_left" name="card_release">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $releases_list['rows']; $i++): ?>
          <option value="<?=$releases_list[$i]['id']?>"<?=$card_release_selected[$i]?>><?=$releases_list[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_properties')?></label>
        <input type="checkbox" name="card_hidden"<?=$admin_card_hidden_checked?>>
        <label class="label_inline" for="card_hidden"><?=__('admin_card_add_hidden')?></label><br>
        <input type="checkbox" name="card_extra" id="card_extra" onchange="admin_card_hide_stats();"<?=$admin_card_extra_checked?>>
        <label class="label_inline" for="card_extra"><?=__('admin_card_add_extra')?></label>
      </div>

      <div id="card_stats"<?=$admin_card_extra_hidden?>>

        <div class="flexcontainer smallpadding_bot tinypadding_top">
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_weapons')?></label>
              <input class="indiv" type="text" name="card_weapons" value="<?=$admin_card_data['weapons']?>">
            </div>

          </div>
          <div style="flex: 1">
            &nbsp;
          </div>
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_durability')?></label>
              <input class="indiv" type="text" name="card_durability" value="<?=$admin_card_data['durability']?>">
            </div>

          </div>
          <div style="flex: 10">
            &nbsp;
          </div>

        </div>

        <div class="flexcontainer padding_bot">
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_cost')?></label>
              <input class="indiv" type="text" name="card_cost" value="<?=$admin_card_data['cost']?>">
            </div>

          </div>
          <div style="flex: 1">
            &nbsp;
          </div>
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_income')?></label>
              <input class="indiv" type="text" name="card_income" value="<?=$admin_card_data['income']?>">
            </div>

          </div>
          <div style="flex: 10">
            &nbsp;
          </div>

        </div>

      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div>
            <label><?=__('admin_card_add_body_en')?></label>
            <textarea class="indiv" name="card_body_en"><?=$admin_card_data['body_en']?></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label><?=__('admin_card_add_body_fr')?></label>
            <textarea class="indiv" name="card_body_fr"><?=$admin_card_data['body_fr']?></textarea>
          </div>

        </div>
      </div>

      <div class="padding_bot">
        <label><?=__('admin_card_add_tags')?></label>
        <?php for($i = 0; $i < $card_all_tags['rows']; $i++): ?>
        <div class="tooltip_container">
          <input type="checkbox" name="card_tag_<?=$card_all_tags[$i]['id']?>"<?=$admin_card_tag_checked[$card_all_tags[$i]['id']]?>>
          <label class="label_inline" for="card_tag_<?=$card_all_tags[$i]['id']?>"><?=$card_all_tags[$i]['name']?></label>
          <div class="tooltip">
            <?=$card_all_tags[$i]['fdesc']?>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <input type="submit" name="card_edit" value="<?=__('admin_card_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;