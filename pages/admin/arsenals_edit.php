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
          <option value="<?=$list_releases[$i]['id']?>"<?=$arsenal_release_selected[$i]?>><?=$list_releases[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="arsenal_format"><?=__('admin_arsenal_add_format')?></label>
        <select class="indiv align_left" name="arsenal_format">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_formats['rows']; $i++): ?>
          <option value="<?=$list_formats[$i]['id']?>"<?=$arsenal_format_selected[$i]?>><?=$list_formats[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="arsenal_difficulty"><?=__('admin_arsenal_add_difficulty')?></label>
        <select class="indiv align_left" name="arsenal_difficulty">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_arsenal_difficulties['rows']; $i++): ?>
          <option value="<?=$list_arsenal_difficulties[$i]['id']?>"<?=$arsenal_difficulty_selected[$i]?>><?=$list_arsenal_difficulties[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="flexcontainer padding_bot">
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

          <div>
            <label for="arsenal_reserves_en"><?=__('admin_arsenal_add_reserves_en')?></label>
            <textarea class="indiv shorter" name="arsenal_reserves_en"><?=$admin_arsenal_data['reserves_en']?></textarea>
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

          <div>
            <label for="arsenal_reserves_fr"><?=__('admin_arsenal_add_reserves_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_reserves_fr"><?=$admin_arsenal_data['reserves_fr']?></textarea>
          </div>

        </div>
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