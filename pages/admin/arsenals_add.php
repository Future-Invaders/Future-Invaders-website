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
// Fetch releases

$list_releases = releases_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch game formats

$list_formats = formats_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal difficulty levels

$list_arsenal_difficulties = arsenal_difficulties_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch factions

$factions_list = factions_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal tags

$arsenal_tags = tags_list(search: array('ftype' => 'Arsenal'));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/arsenals', __('admin_arsenal_add_title'), 'text_light')?>
  </h2>

  <form action="arsenals" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="arsenal_release"><?=__('admin_arsenal_add_release')?></label>
        <select class="indiv align_left" name="arsenal_release">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_releases['rows']; $i++): ?>
          <option value="<?=$list_releases[$i]['id']?>"><?=$list_releases[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="arsenal_format"><?=__('admin_arsenal_add_format')?></label>
        <select class="indiv align_left" name="arsenal_format">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_formats['rows']; $i++): ?>
          <option value="<?=$list_formats[$i]['id']?>"><?=$list_formats[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="arsenal_difficulty"><?=__('admin_arsenal_add_difficulty')?></label>
        <select class="indiv align_left" name="arsenal_difficulty">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $list_arsenal_difficulties['rows']; $i++): ?>
          <option value="<?=$list_arsenal_difficulties[$i]['id']?>"><?=$list_arsenal_difficulties[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="arsenal_name_en"><?=__('admin_arsenal_add_name_en')?></label>
            <input class="indiv" type="text" name="arsenal_name_en">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_playstyle_en"><?=__('admin_arsenal_add_playstyle_en')?></label>
            <input class="indiv" type="text" name="arsenal_playstyle_en">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_summary_en"><?=__('admin_arsenal_add_summary_en')?></label>
            <input class="indiv" type="text" name="arsenal_summary_en">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_gameplan_en"><?=__('admin_arsenal_add_gameplan_en')?></label>
            <textarea class="indiv shorter" name="arsenal_gameplan_en"></textarea>
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_reserves_en"><?=__('admin_arsenal_add_reserves_en')?></label>
            <textarea class="indiv shorter" name="arsenal_reserves_en"></textarea>
          </div>

          <div>
            <label for="arsenal_extra_en"><?=__('admin_arsenal_add_extra_en')?></label>
            <textarea class="indiv shorter" name="arsenal_extra_en"></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="arsenal_name_fr"><?=__('admin_arsenal_add_name_fr')?></label>
            <input class="indiv" type="text" name="arsenal_name_fr">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_playstyle_fr"><?=__('admin_arsenal_add_playstyle_fr')?></label>
            <input class="indiv" type="text" name="arsenal_playstyle_fr">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_summary_fr"><?=__('admin_arsenal_add_summary_fr')?></label>
            <input class="indiv" type="text" name="arsenal_summary_fr">
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_gameplan_fr"><?=__('admin_arsenal_add_gameplan_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_gameplan_fr"></textarea>
          </div>

          <div class="smallpadding_bot">
            <label for="arsenal_reserves_fr"><?=__('admin_arsenal_add_reserves_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_reserves_fr"></textarea>
          </div>

          <div>
            <label for="arsenal_extra_fr"><?=__('admin_arsenal_add_extra_fr')?></label>
            <textarea class="indiv shorter" name="arsenal_extra_fr"></textarea>
          </div>

        </div>
      </div>

      <div class="smallpadding_bot" id="arsenal_factions_container">
        <label><?=__('admin_arsenal_add_factions')?></label>
        <div class="smallpadding_bot">
          <?=__icon('duplicate', alt: 'D', title: __('duplicate'), title_case: 'initials', class: 'valign_middle pointer spaced_right', onclick: 'admin_arsenals_duplicate_factions();')?>
          <?=__icon('delete', alt: 'X', title: __('delete'), title_case: 'initials', class: 'valign_middle pointer', onclick: 'admin_arsenals_unduplicate_factions();')?>
        </div>
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
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_arsenal_add_properties')?></label>
        <input type="checkbox" name="arsenal_hidden">
        <label class="label_inline" for="arsenal_hidden"><?=__('admin_arsenal_add_hidden')?></label><br>
      </div>

      <div class="padding_bot">
        <label><?=__('admin_arsenal_add_tags')?></label>
        <?php for($i = 0; $i < $arsenal_tags['rows']; $i++): ?>
        <div class="tooltip_container">
          <input type="checkbox" name="arsenal_tag_<?=$arsenal_tags[$i]['id']?>">
          <label class="label_inline" for="arsenal_tag_<?=$arsenal_tags[$i]['id']?>"><?=$arsenal_tags[$i]['name']?></label>
          <div class="tooltip">
            <?=$arsenal_tags[$i]['fdesc']?>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <input type="submit" name="arsenal_add" value="<?=__('admin_arsenal_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;