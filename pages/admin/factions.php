<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/factions";
$page_title_en  = "Admin: Factions";
$page_title_fr  = "Admin : Factions";

// Admin menu selection
$admin_menu['factions'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a faction

if(isset($_POST['faction_add']))
{
  // Gather the postdata
  $faction_add_order    = form_fetch_element('faction_sorting_order');
  $faction_add_name_en  = form_fetch_element('faction_name_en');
  $faction_add_name_fr  = form_fetch_element('faction_name_fr');

  // Assemble an array with the postdata
  $faction_add_data = array(  'order'   => $faction_add_order ,
                              'name_en' => $faction_add_name_en ,
                              'name_fr' => $faction_add_name_fr );

  // Add the faction to the database
  factions_add($faction_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit a faction

if(isset($_POST['faction_edit']))
{
  // Grab the faction's ID
  $faction_edit_id = form_fetch_element('faction_id');

  // Assemble an array with the postdata
  $faction_edit_data = array( 'order'   => form_fetch_element('faction_sorting_order') ,
                              'name_en' => form_fetch_element('faction_name_en') ,
                              'name_fr' => form_fetch_element('faction_name_fr') );

  // Edit the faction
  factions_edit(  $faction_edit_id    ,
                  $faction_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete a faction

if(isset($_POST['admin_factions_delete']))
  factions_delete(form_fetch_element('admin_factions_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all factions

$factions_list = factions_list();



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_30 padding_top">

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_faction_list_order')?>
        </th>
        <th>
          <?=__('admin_faction_list_name')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_factions_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="2" class="uppercase text_light dark bold align_center">
          <?=__('admin_faction_list_count', preset_values: array($factions_list['rows']), amount: $factions_list['rows'])?>
        </td>
        <td class="dark bold align_center">
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/factions_add')?>
        </td>
      </tr>

      <?php for($i = 0; $i < $factions_list['rows']; $i++): ?>

      <tr id="admin_factions_row_<?=$factions_list[$i]['id']?>">

        <td class="align_center nowrap">
          <?=$factions_list[$i]['order']?>
        </td>

        <td class="align_center">
          <?=$factions_list[$i]['name']?>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/factions_edit?faction='.$factions_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_factions_delete('".__('admin_faction_delete_confirm')."','".$factions_list[$i]['id']."')")?>
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