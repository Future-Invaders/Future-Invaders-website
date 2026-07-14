<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';    # Core
include_once './../actions/formats.act.php'; # Game formats management
include_once './../lang/admin.lang.php';     # Admin translations

// Page summary
$page_url       = "admin/formats";
$page_title_en  = "Admin: Game formats";
$page_title_fr  = "Admin : Formats de jeu";

// Admin menu selection
$admin_menu['formats'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a game format

if(isset($_POST['format_add']))
{
  // Assemble an array with the postdata
  $format_add_data = array( 'order'   => form_fetch_element('format_sort')   ,
                            'name_en' => form_fetch_element('format_name_en') ,
                            'name_fr' => form_fetch_element('format_name_fr') ,
                            'body_en' => form_fetch_element('format_body_en') ,
                            'body_fr' => form_fetch_element('format_body_fr') ,
                            'styling' => form_fetch_element('format_styling') );

  // Add the faction to the database
  formats_add($format_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit a game format

if(isset($_POST['format_edit']))
{
  // Gather the format's id
  $format_edit_id = form_fetch_element('format_id');

  // Assemble an array with the postdata
  $format_edit_data = array(  'order'   => form_fetch_element('format_sort')    ,
                              'name_en' => form_fetch_element('format_name_en') ,
                              'name_fr' => form_fetch_element('format_name_fr') ,
                              'desc_en' => form_fetch_element('format_body_en') ,
                              'desc_fr' => form_fetch_element('format_body_fr') ,
                              'styling' => form_fetch_element('format_styling') );

  // Edit the format
  formats_edit(  $format_edit_id    ,
                 $format_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete a game format

if(isset($_POST['admin_formats_delete']))
  formats_delete(form_fetch_element('admin_formats_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of game formats

$formats_list = formats_list();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /*******/ include './../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_40 padding_top">

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_format_list_order')?>
        </th>
        <th class="align_center">
          <?=__('admin_format_list_name')?>
        </th>
        <th class="align_center">
          <?=__('admin_format_list_description')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_formats_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="3" class="uppercase text_light dark bold align_center">
          <?=__('admin_format_list_count', preset_values: array($formats_list['rows']), amount: $formats_list['rows'])?>
        </td>
        <td class="dark bold align_center">
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'admin/formats_add')?>
        </td>
      </tr>

      <?php for($i = 0; $i < $formats_list['rows']; $i++): ?>

      <tr id="admin_formats_row_<?=$formats_list[$i]['id']?>">

        <td class="align_center nowrap bold">
          <?=$formats_list[$i]['order']?>
        </td>

        <td class="align_center tooltip_container uppercase bold <?=$formats_list[$i]['styling']?>">
          <?=$formats_list[$i]['name']?>
          <div class="tooltip">
            <?=$formats_list[$i]['name_en']?><br>
            <?=$formats_list[$i]['name_fr']?>
          </div>
        </td>

        <td class="align_center tooltip_container">
          <?=$formats_list[$i]['desc']?>
          <div class="tooltip dowrap">
            <div class="smallpadding_top smallpadding_bot spaced">
              <?=$formats_list[$i]['desc_en_raw']?>
            </div>
            <hr>
            <div class="smallpadding_top smallpadding_bot spaced">
              <?=$formats_list[$i]['desc_fr_raw']?>
            </div>
          </div>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'admin/formats_edit?format='.$formats_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_formats_delete('".__('admin_format_delete_confirm')."','".$formats_list[$i]['id']."')")?>
        </td>

      </tr>

      <?php endfor; ?>

      <?php if(!page_is_fetched_dynamically()): ?>

    </tbody>
  </table>

</div>


<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/***************************************************************************/ include './../inc/footer.inc.php'; endif;