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
// Fetch faction data

// Fetch the faction's id
$admin_faction_id = (int)form_fetch_element('faction', request_type: 'GET');

// Fetch the faction data
$admin_faction_data = factions_get($admin_faction_id);

// Stop here if the faction does not exist
if(!$admin_faction_data)
  exit(header("Location: ".$path."pages/admin/factions"));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__link('pages/admin/factions', __('admin_faction_edit_title'), 'text_light')?>
  </h2>

  <form action="factions" method="POST">
    <fieldset>

      <input type="hidden" name="faction_id" value="<?=$admin_faction_id?>">

      <div class="smallpadding_bot">
        <label for="faction_sorting_order"><?=__('admin_faction_add_sorting_order')?></label>
        <input class="indiv" type="text" name="faction_sorting_order" value="<?=$admin_faction_data['order']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="faction_name_en"><?=__('admin_faction_add_name_en')?></label>
        <input class="indiv" type="text" name="faction_name_en" value="<?=$admin_faction_data['name_en']?>">
      </div>

      <div class="padding_bot">
        <label for="faction_name_fr"><?=__('admin_faction_add_name_fr')?></label>
        <input class="indiv" type="text" name="faction_name_fr" value="<?=$admin_faction_data['name_fr']?>">
      </div>

      <input type="submit" name="faction_edit" value="<?=__('admin_faction_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;