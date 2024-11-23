<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';        # Core
include_once './../../inc/functions_time.inc.php';  # Time management
include_once './../../actions/updates.act.php';     # Updates management
include_once './../../lang/admin.lang.php';         # Admin translations

// Page summary
$page_url       = "pages/admin/updates";
$page_title_en  = "Admin: Updates";
$page_title_fr  = "Admin : Mises à jour";

// Admin menu selection
$admin_menu['updates'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');





/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add an update

if(isset($_POST['update_add']))
{
  // Gather the postdata
  $update_add_title_en = form_fetch_element('update_title_en');
  $update_add_title_fr = form_fetch_element('update_title_fr');
  $update_add_body_en  = form_fetch_element('update_body_en');
  $update_add_body_fr  = form_fetch_element('update_body_fr');

  // Assemble an array with the postdata
  $update_add_data = array( 'title_en'  => $update_add_title_en ,
                            'title_fr'  => $update_add_title_fr ,
                            'body_en'   => $update_add_body_en  ,
                            'body_fr'   => $update_add_body_fr  );

  // Add the update to the database
  updates_add($update_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all updates

$updates_list = updates_list();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_40 padding_top">

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_update_list_date')?>
        </th>
        <th class="align_center">
          <?=__('admin_update_list_title')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_updates_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="2" class="uppercase text_light dark bold align_center">
          <?=__('admin_update_list_count', preset_values: array($updates_list['rows']), amount: $updates_list['rows'])?>
        </td>
        <td class="dark bold align_center">
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/updates_add')?>
        </td>
      </tr>

      <?php for($i = 0; $i < $updates_list['rows']; $i++): ?>
      <tr id="admin_updates_row_<?=$updates_list[$i]['id']?>">

        <td class="align_center nowrap tooltip_container">
          <?=$updates_list[$i]['date']?>
          <div class="tooltip">
            <?=$updates_list[$i]['date_since']?>
          </div>
        </td>

        <td class="align_center nowrap tooltip_container">
          <?=$updates_list[$i]['title']?>
          <div class="tooltip">
            <?=$updates_list[$i]['title_en']?><br>
            <?=$updates_list[$i]['title_fr']?>
          </div>
        </td>

        <td class="align_center nowrap card_action_icons">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/updates_edit?update='.$updates_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_updates_delete('".__('admin_update_delete_confirm')."','".$updates_list[$i]['id']."')")?>
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