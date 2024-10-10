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
// Fetch card type data

// Fetch the card type's id
$admin_card_type_id = (int)form_fetch_element('card_type', request_type: 'GET');

// Fetch the card type data
$admin_card_type_data = card_types_get($admin_card_type_id);

// Stop here if the card type does not exist
if(!$admin_card_type_data)
  exit(header("Location: ".$path."pages/admin/card_types"));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__link('pages/admin/card_types', __('admin_card_type_edit_title'), 'text_light')?>
  </h2>

  <form action="card_types" method="POST">
    <fieldset>

      <input type="hidden" name="card_type_id" value="<?=$admin_card_type_id?>">

      <div class="smallpadding_bot">
        <label for="card_type_name_en"><?=__('admin_card_type_add_name_en')?></label>
        <input class="indiv" type="text" name="card_type_name_en" value="<?=$admin_card_type_data['name_en']?>">
      </div>

      <div class="padding_bot">
        <label for="card_type_name_fr"><?=__('admin_card_type_add_name_fr')?></label>
        <input class="indiv" type="text" name="card_type_name_fr" value="<?=$admin_card_type_data['name_fr']?>">
      </div>

      <input type="submit" name="card_type_edit" value="<?=__('admin_card_type_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;