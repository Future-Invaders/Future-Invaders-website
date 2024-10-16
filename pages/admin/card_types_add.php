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
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__link('pages/admin/card_types', __('admin_card_type_add_title'), 'text_light')?>
  </h2>

  <form action="card_types" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="card_type_order"><?=__('admin_card_type_add_order')?></label>
        <input class="indiv" type="text" name="card_type_order">
      </div>

      <div class="smallpadding_bot">
        <label for="card_type_name_en"><?=__('admin_card_type_add_name_en')?></label>
        <input class="indiv" type="text" name="card_type_name_en">
      </div>

      <div class="padding_bot">
        <label for="card_type_name_fr"><?=__('admin_card_type_add_name_fr')?></label>
        <input class="indiv" type="text" name="card_type_name_fr">
      </div>

      <input type="submit" name="card_type_add" value="<?=__('admin_card_type_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;