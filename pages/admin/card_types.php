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
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a card type

if(isset($_POST['card_type_add']))
{
  // Gather the postdata
  $card_type_add_order    = form_fetch_element('card_type_order');
  $card_type_add_name_en  = form_fetch_element('card_type_name_en');
  $card_type_add_name_fr  = form_fetch_element('card_type_name_fr');
  $card_type_add_styling  = form_fetch_element('card_type_styling');

  // Assemble an array with the postdata
  $card_type_add_data = array(  'order'   => $card_type_add_order   ,
                                'name_en' => $card_type_add_name_en ,
                                'name_fr' => $card_type_add_name_fr ,
                                'styling' => $card_type_add_styling );

  // Add the card type to the database
  card_types_add($card_type_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit a card type

if(isset($_POST['card_type_edit']))
{
  // Gather the postdata
  $card_type_edit_id      = form_fetch_element('card_type_id');
  $card_type_edit_order   = form_fetch_element('card_type_order');
  $card_type_edit_name_en = form_fetch_element('card_type_name_en');
  $card_type_edit_name_fr = form_fetch_element('card_type_name_fr');
  $card_type_edit_styling = form_fetch_element('card_type_styling');

  // Assemble an array with the postdata
  $card_type_edit_data = array( 'order'   => $card_type_edit_order   ,
                                'name_en' => $card_type_edit_name_en ,
                                'name_fr' => $card_type_edit_name_fr ,
                                'styling' => $card_type_edit_styling );

  // Edit the card type
  card_types_edit(  $card_type_edit_id    ,
                    $card_type_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete a card type

if(isset($_POST['admin_card_types_delete']))
  card_types_delete(form_fetch_element('admin_card_types_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all card types

$card_types_list = card_types_list();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_30 padding_top">

  <h2 class="align_center padding_bot">
    <?=__link('pages/admin/cards', __('admin_card_type_list_title'), style: 'text_light')?>
  </h2>

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_card_type_list_name')?>
        </th>
        <th class="align_center">
          <?=__('admin_card_type_list_order')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_card_types_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="2" class="uppercase text_light dark bold align_center">
          <?=__('admin_card_type_list_count', preset_values: array($card_types_list['rows']), amount: $card_types_list['rows'])?>
        </td>
        <td class="dark bold align_center">
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/card_types_add')?>
        </td>
      </tr>

      <?php for($i = 0; $i < $card_types_list['rows']; $i++): ?>

      <tr id="admin_card_types_row_<?=$card_types_list[$i]['id']?>">

        <td class="align_center bold uppercase nowrap <?=$card_types_list[$i]['styling']?>">
          <?=$card_types_list[$i]['name']?>
        </td>

        <td class="align_center nowrap">
          <?=$card_types_list[$i]['order']?>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/card_types_edit?card_type='.$card_types_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_card_types_delete('".__('admin_card_type_delete_confirm')."','".$card_types_list[$i]['id']."')")?>
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