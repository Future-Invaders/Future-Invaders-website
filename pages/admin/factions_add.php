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
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__('admin_faction_add_title')?>
  </h2>

  <form action="factions" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="faction_sorting_order"><?=__('admin_faction_add_sorting_order')?></label>
        <input class="indiv" type="text" name="faction_sorting_order">
      </div>

      <div class="smallpadding_bot">
        <label for="faction_name_en"><?=__('admin_faction_add_name_en')?></label>
        <input class="indiv" type="text" name="faction_name_en">
      </div>

      <div class="smallpadding_bot">
        <label for="faction_name_fr"><?=__('admin_faction_add_name_fr')?></label>
        <input class="indiv" type="text" name="faction_name_fr">
      </div>

      <div class="padding_bot">
        <label for="faction_styling"><?=__('admin_faction_add_styling')?></label>
        <input class="indiv" type="text" name="faction_styling">
      </div>

      <input type="submit" name="faction_add" value="<?=__('admin_faction_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;