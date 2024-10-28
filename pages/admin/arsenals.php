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
/*                                                    BACK END                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// List of elements needed for search menus

// List of releases
$releases_list = releases_list();

// List of game formats
$formats_list = formats_list();

// List of arsenal difficulties
$arsenal_difficulties_list = arsenal_difficulties_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add an arsenal

if(isset($_POST['arsenal_add']))
{
  // Gather the postdata
  $arsenal_add_release      = form_fetch_element('arsenal_release');
  $arsenal_add_format       = form_fetch_element('arsenal_format');
  $arsenal_add_difficulty   = form_fetch_element('arsenal_difficulty');
  $arsenal_add_name_en      = form_fetch_element('arsenal_name_en');
  $arsenal_add_name_fr      = form_fetch_element('arsenal_name_fr');
  $arsenal_add_playstyle_en = form_fetch_element('arsenal_playstyle_en');
  $arsenal_add_playstyle_fr = form_fetch_element('arsenal_playstyle_fr');
  $arsenal_add_summary_en   = form_fetch_element('arsenal_summary_en');
  $arsenal_add_summary_fr   = form_fetch_element('arsenal_summary_fr');
  $arsenal_add_gameplan_en  = form_fetch_element('arsenal_gameplan_en');
  $arsenal_add_gameplan_fr  = form_fetch_element('arsenal_gameplan_fr');
  $arsenal_add_reserves_en  = form_fetch_element('arsenal_reserves_en');
  $arsenal_add_reserves_fr  = form_fetch_element('arsenal_reserves_fr');
  $arsenal_add_hidden       = form_fetch_element('arsenal_hidden');

  // Assemble an array with the postdata
  $arsenal_add_data = array(  'release'       => $arsenal_add_release       ,
                              'format'        => $arsenal_add_format        ,
                              'difficulty'    => $arsenal_add_difficulty    ,
                              'name_en'       => $arsenal_add_name_en       ,
                              'name_fr'       => $arsenal_add_name_fr       ,
                              'playstyle_en'  => $arsenal_add_playstyle_en  ,
                              'playstyle_fr'  => $arsenal_add_playstyle_fr  ,
                              'summary_en'    => $arsenal_add_summary_en    ,
                              'summary_fr'    => $arsenal_add_summary_fr    ,
                              'gameplan_en'   => $arsenal_add_gameplan_en   ,
                              'gameplan_fr'   => $arsenal_add_gameplan_fr   ,
                              'reserves_en'   => $arsenal_add_reserves_en   ,
                              'reserves_fr'   => $arsenal_add_reserves_fr   ,
                              'hidden'        => $arsenal_add_hidden        );

  // Add the arsenal to the database
  arsenals_add($arsenal_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit an arsenal

if(isset($_POST['arsenal_edit']))
{
  // Gather the arsenal's id
  $arsenal_edit_id = form_fetch_element('arsenal_id');

  // Gather the postdata
  $arsenal_edit_release      = form_fetch_element('arsenal_release');
  $arsenal_edit_format       = form_fetch_element('arsenal_format');
  $arsenal_edit_difficulty   = form_fetch_element('arsenal_difficulty');
  $arsenal_edit_name_en      = form_fetch_element('arsenal_name_en');
  $arsenal_edit_name_fr      = form_fetch_element('arsenal_name_fr');
  $arsenal_edit_playstyle_en = form_fetch_element('arsenal_playstyle_en');
  $arsenal_edit_playstyle_fr = form_fetch_element('arsenal_playstyle_fr');
  $arsenal_edit_summary_en   = form_fetch_element('arsenal_summary_en');
  $arsenal_edit_summary_fr   = form_fetch_element('arsenal_summary_fr');
  $arsenal_edit_gameplan_en  = form_fetch_element('arsenal_gameplan_en');
  $arsenal_edit_gameplan_fr  = form_fetch_element('arsenal_gameplan_fr');
  $arsenal_edit_reserves_en  = form_fetch_element('arsenal_reserves_en');
  $arsenal_edit_reserves_fr  = form_fetch_element('arsenal_reserves_fr');
  $arsenal_edit_hidden       = form_fetch_element('arsenal_hidden');

  // Assemble an array with the postdata
  $arsenal_edit_data = array( 'release'       => $arsenal_edit_release      ,
                              'format'        => $arsenal_edit_format       ,
                              'difficulty'    => $arsenal_edit_difficulty   ,
                              'name_en'       => $arsenal_edit_name_en      ,
                              'name_fr'       => $arsenal_edit_name_fr      ,
                              'playstyle_en'  => $arsenal_edit_playstyle_en ,
                              'playstyle_fr'  => $arsenal_edit_playstyle_fr ,
                              'summary_en'    => $arsenal_edit_summary_en   ,
                              'summary_fr'    => $arsenal_edit_summary_fr   ,
                              'gameplan_en'   => $arsenal_edit_gameplan_en  ,
                              'gameplan_fr'   => $arsenal_edit_gameplan_fr  ,
                              'reserves_en'   => $arsenal_edit_reserves_en  ,
                              'reserves_fr'   => $arsenal_edit_reserves_fr  ,
                              'hidden'        => $arsenal_edit_hidden       );

  // Edit the arsenal
  arsenals_edit(  $arsenal_edit_id    ,
                  $arsenal_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete an arsenal

if(isset($_POST['admin_arsenals_delete']))
  arsenals_delete(form_fetch_element('admin_arsenals_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of arsenals

// Fetch the search data
$admin_arsenals_sort    = form_fetch_element('admin_arsenals_sort', '');
$admin_arsenals_search  = array(  'release'     => form_fetch_element('admin_arsenals_search_release')    ,
                                  'format'      => form_fetch_element('admin_arsenals_search_format')     ,
                                  'name'        => form_fetch_element('admin_arsenals_search_name')       ,
                                  'difficulty'  => form_fetch_element('admin_arsenals_search_difficulty') ,
                                  'playstyle'   => form_fetch_element('admin_arsenals_search_playstyle')  ,
                                  'text'        => form_fetch_element('admin_arsenals_search_text')       ,
                                  'data'        => form_fetch_element('admin_arsenals_search_data')       );

// Fetch the arsenals
$arsenals_list = arsenals_list( sort_by:  $admin_arsenals_sort    ,
                                search:   $admin_arsenals_search  );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_60 padding_top">

  <h5>
    <?=__('admin_arsenal_management').__(':')?>
  </h5>

  <ul class="tinypadding_top bigpadding_bot">
    <li>
      <?=__link('pages/admin/arsenals_add', __('admin_arsenal_management_add'))?>
    </li>
    <li>
      <?=__link('pages/admin/arsenal_difficulties', __('admin_arsenal_management_difficulties'))?>
    </li>
    <?php if(!isset($_GET['fullbody'])): ?>
    <li>
      <?=__link('pages/admin/arsenals?fullbody', __('admin_arsenal_management_show_body'))?>
    </li>
    <?php else: ?>
    <li>
      <?=__link('pages/admin/arsenals', __('admin_arsenal_management_hide_body'))?>
    </li>
    <?php endif; ?>
  </ul>

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_arsenal_list_release')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_arsenals_search('release');")?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_list_format')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_arsenals_search('format');")?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_list_name')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_arsenals_search('name');")?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_list_difficulty')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_arsenals_search('difficulty');")?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_list_playstyle')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_arsenals_search('playstyle');")?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_list_body')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_arsenals_search('text');")?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_list_data')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

      <tr>
        <th>
          <input type="hidden" name="admin_arsenals_sort" id="admin_arsenals_sort" value="">
          <select class="table_search" name="admin_arsenals_search_release" id="admin_arsenals_search_release" onchange="admin_arsenals_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $releases_list['rows']; $i++): ?>
            <option value="<?=$releases_list[$i]['id']?>" class="bold uppercase <?=$releases_list[$i]['styling']?>"><?=$releases_list[$i]['name']?></option>
            <?php endfor; ?>
            <option value="-1" class="bold uppercase"><?=string_change_case(__('none'), 'initials')?></option>
          </select>
        </th>
        <th>
          <select class="table_search" name="admin_arsenals_search_format" id="admin_arsenals_search_format" onchange="admin_arsenals_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $formats_list['rows']; $i++): ?>
            <option value="<?=$formats_list[$i]['id']?>" class="bold uppercase <?=$formats_list[$i]['styling']?>"><?=$formats_list[$i]['name']?></option>
            <?php endfor; ?>
            <option value="-1" class="bold uppercase"><?=string_change_case(__('none'), 'initials')?></option>
          </select>
        </th>
        <th>
          <input type="text" class="table_search" name="admin_arsenals_search_name" id="admin_arsenals_search_name" value="" onkeyup="admin_arsenals_search();">
        </th>
        <th>
          <select class="table_search" name="admin_arsenals_search_difficulty" id="admin_arsenals_search_difficulty" onchange="admin_arsenals_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $arsenal_difficulties_list['rows']; $i++): ?>
            <option value="<?=$arsenal_difficulties_list[$i]['id']?>" class="bold uppercase <?=$arsenal_difficulties_list[$i]['styling']?>"><?=$arsenal_difficulties_list[$i]['name']?></option>
            <?php endfor; ?>
            <option value="-1" class="bold"><?=string_change_case(__('none'), 'initials')?></option>
          </select>
        </th>
        <th>
          <input type="text" class="table_search" name="admin_arsenals_search_playstyle" id="admin_arsenals_search_playstyle" value="" onkeyup="admin_arsenals_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_arsenals_search_text" id="admin_arsenals_search_text" value="" onkeyup="admin_arsenals_search();">
        </th>
        <th class="align_center">
          <select class="table_search" name="admin_arsenals_search_data" id="admin_arsenals_search_data" onchange="admin_arsenals_search();">
            <option value="0">&nbsp;</option>
            <option value="1"><?=__('admin_arsenal_list_data_hidden')?></option>
          </select>
        </th>
        <th>
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/arsenals_add')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_arsenals_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="8" class="uppercase text_light dark bold align_center">
          <?=__('admin_arsenal_list_count', preset_values: array($arsenals_list['rows']), amount: $arsenals_list['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $arsenals_list['rows']; $i++): ?>

      <tr id="admin_arsenals_row_<?=$arsenals_list[$i]['id']?>">

        <td class="align_center nowrap uppercase bold <?=$arsenals_list[$i]['release_css']?>">
          <?=$arsenals_list[$i]['release']?>
        </td>

        <td class="align_center nowrap uppercase bold <?=$arsenals_list[$i]['format_css']?>">
          <?=$arsenals_list[$i]['format']?>
        </td>

        <td class="align_left nowrap bold tooltip_container">
          <?=$arsenals_list[$i]['name']?>
          <div class="tooltip">
            <?=$arsenals_list[$i]['name_en']?><br>
            <?=$arsenals_list[$i]['name_fr']?>
          </div>
        </td>

        <td class="align_center nowrap uppercase bold <?=$arsenals_list[$i]['difficulty_css']?>">
          <?=$arsenals_list[$i]['difficulty']?>
        </td>

        <td class="align_center nowrap tooltip_container">
          <?=$arsenals_list[$i]['playstyle']?>
          <div class="tooltip">
            <?=$arsenals_list[$i]['playstyle_en']?><br>
            <?=$arsenals_list[$i]['playstyle_fr']?>
          </div>
        </td>

        <td class="align_center tooltip_container">
          <?=$arsenals_list[$i]['length_en']?> - <?=$arsenals_list[$i]['length_fr']?>
          <div class="tooltip dowrap">
            <div class="smallpadding_top smallpadding_bot spaced">
              <span class="bold"><?=__('admin_arsenal_list_summary').__(':')?></span> <?=$arsenals_list[$i]['summary_en']?><br>
              <br>
              <span class="bold"><?=__('admin_arsenal_list_gameplan').__(':')?></span><br>
              <?=$arsenals_list[$i]['gameplan_en']?><br>
              <br>
              <span class="bold"><?=__('admin_arsenal_list_reserves').__(':')?></span><br>
              <?=$arsenals_list[$i]['reserves_en']?>
            </div>
            <hr>
            <div class="smallpadding_top smallpadding_bot spaced">
              <span class="bold"><?=__('admin_arsenal_list_summary').__(':')?></span> <?=$arsenals_list[$i]['summary_fr']?><br>
              <br>
              <span class="bold"><?=__('admin_arsenal_list_gameplan').__(':')?></span><br>
              <?=$arsenals_list[$i]['gameplan_fr']?><br>
              <br>
              <span class="bold"><?=__('admin_arsenal_list_reserves').__(':')?></span><br>
              <?=$arsenals_list[$i]['reserves_fr']?>
            </div>
          </div>
        </td>

        <td class="align_center nowrap">

          <?php if($arsenals_list[$i]['hidden']): ?>
          <?=__icon('user_delete', is_small: true, alt: __('admin_arsenal_list_hidden'), title: __('admin_arsenal_list_hidden'), class: 'valign_middle')?>
          <?php endif; ?>

        </td>

        <td class="align_center nowrap card_action_icons">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer smallspaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/arsenals_edit?arsenal='.$arsenals_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_arsenals_delete('".__('admin_arsenal_delete_confirm')."','".$arsenals_list[$i]['id']."')")?>
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