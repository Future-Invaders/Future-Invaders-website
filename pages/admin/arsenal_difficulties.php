<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/arsenal_difficulties";
$page_title_en  = "Admin: Arsenal difficulty levels";
$page_title_fr  = "Admin : Niveaux de difficulté des arsenaux";

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
// Add an arsenal difficulty level

if(isset($_POST['difficulty_add']))
{
  // Assemble an array with the postdata
  $difficulty_add_data = array( 'order'   => form_fetch_element('difficulty_sort')    ,
                                'name_en' => form_fetch_element('difficulty_name_en') ,
                                'name_fr' => form_fetch_element('difficulty_name_fr') ,
                                'styling' => form_fetch_element('difficulty_styling')  );

  // Add the faction to the database
  arsenal_difficulties_add($difficulty_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit an arsenal difficulty level

if(isset($_POST['difficulty_edit']))
{
  // Gather the difficulty's id
  $difficulty_edit_id = form_fetch_element('difficulty_id');

  // Assemble an array with the postdata
  $difficulty_edit_data = array( 'order'   => form_fetch_element('difficulty_sort')   ,
                                 'name_en' => form_fetch_element('difficulty_name_en') ,
                                 'name_fr' => form_fetch_element('difficulty_name_fr') ,
                                 'styling' => form_fetch_element('difficulty_styling')  );

  // Edit the arsenal difficulty level
  arsenal_difficulties_edit(  $difficulty_edit_id    ,
                              $difficulty_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete an arsenal difficulty level

if(isset($_POST['admin_arsenal_difficulties_delete']))
  arsenal_difficulties_delete(form_fetch_element('admin_arsenal_difficulties_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all arsenal difficulty levels

$arsenal_difficulties_list = arsenal_difficulties_list();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_30 padding_top">

  <h2 class="align_center padding_bot">
    <?=__link('pages/admin/arsenals', __('admin_arsenal_difficulty_list_title'), style: 'text_light')?>
  </h2>

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_arsenal_difficulty_list_name')?>
        </th>
        <th class="align_center">
          <?=__('admin_arsenal_difficulty_list_order')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_arsenal_difficulties_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="2" class="uppercase text_light dark bold align_center">
          <?=__('admin_arsenal_difficulty_list_count', preset_values: array($arsenal_difficulties_list['rows']), amount: $arsenal_difficulties_list['rows'])?>
        </td>
        <td class="dark bold align_center">
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/arsenal_difficulties_add')?>
        </td>
      </tr>

      <?php for($i = 0; $i < $arsenal_difficulties_list['rows']; $i++): ?>

      <tr id="admin_arsenal_difficulties_row_<?=$arsenal_difficulties_list[$i]['id']?>">

        <td class="align_center nowrap bold tooltip_container <?=$arsenal_difficulties_list[$i]['styling']?>">
          <span class="uppercase"><?=$arsenal_difficulties_list[$i]['name']?></span>
          <div class="tooltip">
            <?=$arsenal_difficulties_list[$i]['name_en']?><br>
            <?=$arsenal_difficulties_list[$i]['name_fr']?>
          </div>
        </td>

        <td class="align_center nowrap bold">
          <?=$arsenal_difficulties_list[$i]['order']?>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/arsenal_difficulties_edit?difficulty='.$arsenal_difficulties_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_arsenal_difficulties_delete('".__('admin_arsenal_difficulty_delete_confirm')."','".$arsenal_difficulties_list[$i]['id']."')")?>
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