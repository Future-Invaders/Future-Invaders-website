<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/card_rarities";
$page_title_en  = "Admin: Card rarities";
$page_title_fr  = "Admin : Raretés de cartes";

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
// Add a card rarity

if(isset($_POST['card_rarity_add']))
{
  // Gather the postdata
  $card_rarity_add_name_en = form_fetch_element('card_rarity_name_en');
  $card_rarity_add_name_fr = form_fetch_element('card_rarity_name_fr');
  $card_rarity_add_max     = form_fetch_element('card_rarity_max_count');

  // Assemble an array with the postdata
  $card_rarity_add_data = array(  'name_en' => $card_rarity_add_name_en ,
                                  'name_fr' => $card_rarity_add_name_fr ,
                                  'max'     => $card_rarity_add_max     );

  // Add the card rarity to the database
  card_rarities_add($card_rarity_add_data);
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit a card rarity

if(isset($_POST['card_rarity_edit']))
{
  // Gather the postdata
  $card_rarity_edit_id      = form_fetch_element('card_rarity_id');
  $card_rarity_edit_name_en = form_fetch_element('card_rarity_name_en');
  $card_rarity_edit_name_fr = form_fetch_element('card_rarity_name_fr');
  $card_rarity_edit_max     = form_fetch_element('card_rarity_max_count');

  // Assemble an array with the postdata
  $card_rarity_edit_data = array(  'name_en' => $card_rarity_edit_name_en ,
                                   'name_fr' => $card_rarity_edit_name_fr ,
                                   'max'     => $card_rarity_edit_max     );

  // Edit the card rarity
  card_rarities_edit(  $card_rarity_edit_id    ,
                       $card_rarity_edit_data  );
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete a card rarity

if(isset($_POST['admin_card_rarities_delete']))
  card_rarities_delete(form_fetch_element('admin_card_rarities_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all card rarities

$card_rarities_list = card_rarities_list();




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
          <?=__('admin_card_rarity_list_name')?>
        </th>
        <th class="align_center">
          <?=__('admin_card_rarity_list_max')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_card_rarities_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="2" class="uppercase text_light dark bold align_center">
          <?=__('admin_card_rarity_list_count', preset_values: array($card_rarities_list['rows']), amount: $card_rarities_list['rows'])?>
        </td>
        <td class="dark bold align_center">
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/card_rarities_add')?>
        </td>
      </tr>

      <?php for($i = 0; $i < $card_rarities_list['rows']; $i++): ?>

      <tr id="admin_card_rarities_row_<?=$card_rarities_list[$i]['id']?>">

        <td class="align_center nowrap">
          <?=$card_rarities_list[$i]['name']?>
        </td>

        <td class="align_center nowrap">
          <?=$card_rarities_list[$i]['max_count']?>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/card_rarities_edit?card_rarity='.$card_rarities_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_card_rarities_delete('".__('admin_card_rarity_delete_confirm')."','".$card_rarities_list[$i]['id']."')")?>
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