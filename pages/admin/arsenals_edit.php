<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/arsenals";
$page_title_en  = "Admin: Arsenals";
$page_title_fr  = "Admin : Arsenaux";

// Admin menu selection
$admin_menu['arsenals'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal data

// Fetch the arsenal's id
$admin_arsenal_id = (int)form_fetch_element('arsenal', request_type: 'GET');

// Fetch the arsenal data
$admin_arsenal_data = arsenals_get($admin_arsenal_id);

// Stop here if the arsenal does not exist
if(!$admin_arsenal_data)
  exit(header("Location: ".$path."pages/admin/arsenals"));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch releases

// Fetch a list of all releases
$list_releases = releases_list();

// Select the arsenal's release
for($i = 0; $i < $list_releases['rows']; $i++)
{
  $arsenal_release_selected[$i] = '';
  if($list_releases[$i]['id'] === $admin_arsenal_data['release'])
    $arsenal_release_selected[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch game formats

// Fetch a list of all game formats
$list_formats = formats_list();

// Select the arsenal's format
for($i = 0; $i < $list_formats['rows']; $i++)
{
  $arsenal_format_selected[$i] = '';
  if($list_formats[$i]['id'] === $admin_arsenal_data['format'])
    $arsenal_format_selected[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal difficulty levels

// Fetch a list of all arsenal difficulty levels
$list_arsenal_difficulties = arsenal_difficulties_list();

// Select the arsenal's difficulty level
for($i = 0; $i < $list_arsenal_difficulties['rows']; $i++)
{
  $arsenal_difficulty_selected[$i] = '';
  if($list_arsenal_difficulties[$i]['id'] === $admin_arsenal_data['difficulty'])
    $arsenal_difficulty_selected[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch images

// Fetch a list of all images
$images_list = images_list();

// Select the english image
for($i = 0; $i < $images_list['rows']; $i++)
{
  $arsenal_image_selected_en[$i] = '';
  if($images_list[$i]['id'] === $admin_arsenal_data['image_id_en'])
    $arsenal_image_selected_en[$i] = ' selected';
}

// Select the french image
for($i = 0; $i < $images_list['rows']; $i++)
{
  $arsenal_image_selected_fr[$i] = '';
  if($images_list[$i]['id'] === $admin_arsenal_data['image_id_fr'])
    $arsenal_image_selected_fr[$i] = ' selected';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal factions

// Fetch a list of all factions
$factions_list = factions_list();

// Select the arsenal's factions
for($i = 0; $i < $admin_arsenal_data['factions']['rows']; $i++)
{
  for($j = 0; $j < $factions_list['rows']; $j++)
  {
    if($factions_list[$j]['id'] === $admin_arsenal_data['factions']['id'][$i])
      $arsenal_faction_selected[$i][$j] = ' selected';
    else
      $arsenal_faction_selected[$i][$j] = '';
  }
}






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal tags

// Fetch a list of all tags and of the tags assigned to the arsenal
$arsenal_all_tags = tags_list(search: array('ftype' => 'Arsenal'));
$arsenal_tags     = tags_list(search: array('ftype' => 'Arsenal', 'arsenal_id' => $admin_arsenal_id));

// Check the checkboxes of the tags that are already assigned to the arsenal
for($i = 0; $i < $arsenal_all_tags['rows']; $i++)
{
  $admin_arsenal_tag_checked[$arsenal_all_tags[$i]['id']] = '';
  for($j = 0; $j < $arsenal_tags['rows']; $j++)
    if($arsenal_all_tags[$i]['id'] === $arsenal_tags[$j]['id'])
      $admin_arsenal_tag_checked[$arsenal_all_tags[$i]['id']] = ' checked';
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal card compositions

// Fetch a list of all cards
$card_list = cards_list();

// Select the arsenal's cards
for($i = 0; $i < $admin_arsenal_data['cards']['rows']; $i++)
{
  for($j = 0; $j < $card_list['rows']; $j++)
  {
    if($card_list[$j]['id'] === $admin_arsenal_data['cards']['id'][$i])
      $arsenal_card_selected[$i][$j] = ' selected';
    else
      $arsenal_card_selected[$i][$j] = '';
  }
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Prepare checkboxes

// Hidden arsenal
$admin_arsenal_hidden_checked = ($admin_arsenal_data['hidden']) ? ' checked' : '';




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/arsenals', __('admin_arsenal_edit_title'), 'text_light')?>
  </h2>

  <form action="arsenals" method="POST">
    <fieldset>

      <input type="hidden" name="arsenal_id" value="<?=$admin_arsenal_id?>">

      <div class="smallpadding_bot">
        <label for="arsenal_release"><?=__('admin_arsenal_add_release')?></label>
        <select class="indiv align_left" name="arsenal_release">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_releases['rows']; $i++): ?>
          <option value="<?=$list_releases[$i]['id']?>" class="uppercase bold <?=$list_releases[$i]['styling']?>"<?=$arsenal_release_selected[$i]?>><?=$list_releases[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="arsenal_format"><?=__('admin_arsenal_add_format')?></label>
        <select class="indiv align_left" name="arsenal_format">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_formats['rows']; $i++): ?>
          <option value="<?=$list_formats[$i]['id']?>" class="uppercase bold <?=$list_formats[$i]['styling']?>"<?=$arsenal_format_selected[$i]?>><?=$list_formats[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="arsenal_difficulty"><?=__('admin_arsenal_add_difficulty')?></label>
        <select class="indiv align_left" name="arsenal_difficulty">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_arsenal_difficulties['rows']; $i++): ?>
          <option value="<?=$list_arsenal_difficulties[$i]['id']?>" class="uppercase bold <?=$list_arsenal_difficulties[$i]['styling']?>"<?=$arsenal_difficulty_selected[$i]?>><?=$list_arsenal_difficulties[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="flexcontainer smallpadding_bot">
        <div style="flex: 8">

          <div>
            <label for="arsenal_image_en"><?=__('admin_arsenal_add_image_en')?></label>
            <select class="indiv align_left" name="arsenal_image_en">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $images_list['rows']; $i++): ?>
              <option value="<?=$images_list[$i]['id']?>"<?=$arsenal_image_selected_en[$i]?>><?=$images_list[$i]['spath']?> (<?=$images_list[$i]['name']?>)</option>
              <?php endfor; ?>
            </select>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="arsenal_image_fr"><?=__('admin_arsenal_add_image_fr')?></label>
            <select class="indiv align_left" name="arsenal_image_fr">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $images_list['rows']; $i++): ?>
              <option value="<?=$images_list[$i]['id']?>"<?=$arsenal_image_selected_fr[$i]?>><?=$images_list[$i]['spath']?> (<?=$images_list[$i]['name']?>)</option>
              <?php endfor; ?>
            </select>
          </div>

        </div>
      </div>

      <div class="flexcontainer smallpadding_bot">
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="arsenal_name_en"><?=__('admin_arsenal_add_name_en')?></label>
            <input class="indiv" type="text" name="arsenal_name_en" value="<?=$admin_arsenal_data['name_en']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_playstyle_en"><?=__('admin_arsenal_add_playstyle_en')?></label>
            <input class="indiv" type="text" name="arsenal_playstyle_en" value="<?=$admin_arsenal_data['playstyle_en']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_summary_en"><?=__('admin_arsenal_add_summary_en')?></label>
            <input class="indiv" type="text" name="arsenal_summary_en" value="<?=$admin_arsenal_data['summary_en']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_gameplan_en"><?=__('admin_arsenal_add_gameplan_en')?></label>
            <textarea class="indiv shorter" name="arsenal_gameplan_en"><?=$admin_arsenal_data['gameplan_en']?></textarea>
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_reserves_en"><?=__('admin_arsenal_add_reserves_en')?></label>
            <textarea class="indiv shorter" name="arsenal_reserves_en"><?=$admin_arsenal_data['reserves_en']?></textarea>
          </div>

          <div>
            <label for="arsenal_extra_en"><?=__('admin_arsenal_add_extra_en')?></label>
            <textarea class="indiv shorter" name="arsenal_extra_en"><?=$admin_arsenal_data['extra_en']?></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="arsenal_name_fr"><?=__('admin_arsenal_add_name_fr')?></label>
            <input class="indiv" type="text" name="arsenal_name_fr" value="<?=$admin_arsenal_data['name_fr']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_playstyle_fr"><?=__('admin_arsenal_add_playstyle_fr')?></label>
            <input class="indiv" type="text" name="arsenal_playstyle_fr" value="<?=$admin_arsenal_data['playstyle_fr']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_summary_fr"><?=__('admin_arsenal_add_summary_fr')?></label>
            <input class="indiv" type="text" name="arsenal_summary_fr" value="<?=$admin_arsenal_data['summary_fr']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_gameplan_fr"><?=__('admin_arsenal_add_gameplan_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_gameplan_fr"><?=$admin_arsenal_data['gameplan_fr']?></textarea>
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_reserves_fr"><?=__('admin_arsenal_add_reserves_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_reserves_fr"><?=$admin_arsenal_data['reserves_fr']?></textarea>
          </div>

          <div>
            <label for="arsenal_extra_fr"><?=__('admin_arsenal_add_extra_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_extra_fr"><?=$admin_arsenal_data['extra_fr']?></textarea>
          </div>

        </div>
      </div>

      <div class="smallpadding_bot" id="arsenal_factions_container">

        <label><?=__('admin_arsenal_add_factions')?></label>
        <div class="smallpadding_bot">
          <?=__icon('duplicate', alt: 'D', title: __('duplicate'), title_case: 'initials', class: 'valign_middle pointer spaced_right', onclick: 'admin_arsenals_duplicate_factions();')?>
          <?=__icon('delete', alt: 'X', title: __('delete'), title_case: 'initials', class: 'valign_middle pointer', onclick: 'admin_arsenals_unduplicate_factions();')?>
        </div>

        <?php if($admin_arsenal_data['factions']['rows']): ?>
        <?php for($i = 0; $i < $admin_arsenal_data['factions']['rows']; $i++): ?>
        <div id="arsenal_factions" class="smallpadding_bot flexcontainer">
          <div style="flex: 6">
            <select class="indiv align_left" name="arsenal_faction[]">
              <option value="">&nbsp;</option>
              <?php for($j = 0; $j < $factions_list['rows']; $j++): ?>
              <option value="<?=$factions_list[$j]['id']?>" class="bold uppercase <?=$factions_list[$j]['styling']?>"<?=$arsenal_faction_selected[$i][$j]?>><?=$factions_list[$j]['name']?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <?php endfor; ?>

        <?php else: ?>
        <div id="arsenal_factions" class="smallpadding_bot flexcontainer">
          <div style="flex: 6">
            <select class="indiv align_left" name="arsenal_faction[]">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $factions_list['rows']; $i++): ?>
              <option value="<?=$factions_list[$i]['id']?>" class="bold uppercase <?=$factions_list[$i]['styling']?>"><?=$factions_list[$i]['name']?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <?php endif; ?>

      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_arsenal_add_properties')?></label>
        <input type="checkbox" name="arsenal_hidden"<?=$admin_arsenal_hidden_checked?>>
        <label class="label_inline" for="arsenal_hidden"><?=__('admin_arsenal_add_hidden')?></label><br>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_arsenal_add_tags')?></label>
        <?php for($i = 0; $i < $arsenal_all_tags['rows']; $i++): ?>
        <div class="tooltip_container">
          <input type="checkbox" name="arsenal_tag_<?=$arsenal_all_tags[$i]['id']?>"<?=$admin_arsenal_tag_checked[$arsenal_all_tags[$i]['id']]?>>
          <label class="label_inline" for="arsenal_tag_<?=$arsenal_all_tags[$i]['id']?>"><?=$arsenal_all_tags[$i]['name']?></label>
          <div class="tooltip">
            <?=$arsenal_all_tags[$i]['fdesc']?>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <div id="arsenal_cards_container">

        <?php if($admin_arsenal_data['cards']['rows']): ?>
        <?php for($i = 0; $i < $admin_arsenal_data['cards']['rows']; $i++): ?>
        <div id="arsenal_cards">
          <div class="tinypadding_bot">
            <label for="arsenal_card[]"><?=__('admin_arsenal_add_cardname')?></label>
            <select class="indiv align_left" name="arsenal_card[]">
              <option value="">&nbsp;</option>
              <?php for($j = 0; $j < $card_list['rows']; $j++): ?>
              <option value="<?=$card_list[$j]['id']?>"<?=$arsenal_card_selected[$i][$j]?>><?=$card_list[$j]['name']?> [<?=$card_list[$j]['release']?>] [<?=$card_list[$j]['type']?>]</option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="smallpadding_bot flexcontainer">
            <div style="flex: 2">
              <label for="arsenal_amount_main[]"><?=__('admin_arsenal_add_amount_main')?></label>
              <input class="indiv" type="text" name="arsenal_amount_main[]" value="<?=$admin_arsenal_data['cards']['main'][$i]?>">
            </div>
            <div style="flex: 1">
              &nbsp;
            </div>
            <div style="flex: 2">
              <label for="arsenal_amount_reserves[]"><?=__('admin_arsenal_add_amount_reserves')?></label>
              <input class="indiv" type="text" name="arsenal_amount_reserves[]" value="<?=$admin_arsenal_data['cards']['reserves'][$i]?>">
            </div>
            <div style="flex: 1">
              &nbsp;
            </div>
            <div style="flex: 12">
              <label for="arsenal_amount_extra[]"><?=__('admin_arsenal_add_order_extra')?></label>
              <input class="indiv" type="text" name="arsenal_amount_extra[]" value="<?=$admin_arsenal_data['cards']['order'][$i]?>">
            </div>
          </div>
        </div>
        <?php endfor; ?>

        <?php else: ?>
        <div id="arsenal_cards">
          <div class="tinypadding_bot">
            <label for="arsenal_card[]"><?=__('admin_arsenal_add_cardname')?></label>
            <select class="indiv align_left" name="arsenal_card[]">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $card_list['rows']; $i++): ?>
              <option value="<?=$card_list[$i]['id']?>"><?=$card_list[$i]['name']?> [<?=$card_list[$i]['release']?>] [<?=$card_list[$i]['type']?>]</option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="smallpadding_bot flexcontainer">
            <div style="flex: 2">
              <label for="arsenal_amount_main[]"><?=__('admin_arsenal_add_amount_main')?></label>
              <input class="indiv" type="text" name="arsenal_amount_main[]">
            </div>
            <div style="flex: 1">
              &nbsp;
            </div>
            <div style="flex: 2">
              <label for="arsenal_amount_reserves[]"><?=__('admin_arsenal_add_amount_reserves')?></label>
              <input class="indiv" type="text" name="arsenal_amount_reserves[]">
            </div>
            <div style="flex: 1">
              &nbsp;
            </div>
            <div style="flex: 12">
              <label for="arsenal_amount_extra[]"><?=__('admin_arsenal_add_order_extra')?></label>
              <input class="indiv" type="text" name="arsenal_amount_extra[]">
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>

      <div class="padding_bot">
        <?=__icon('duplicate', alt: 'D', title: __('duplicate'), title_case: 'initials', class: 'valign_middle pointer spaced_right', onclick: 'admin_arsenals_duplicate_cards();')?>
        <?=__icon('delete', alt: 'X', title: __('delete'), title_case: 'initials', class: 'valign_middle pointer', onclick: 'admin_arsenals_unduplicate_cards();')?>
      </div>

      <input type="submit" name="arsenal_edit" value="<?=__('admin_arsenal_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;