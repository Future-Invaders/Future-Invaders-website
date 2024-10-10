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
// Fetch card rarity data

// Fetch the card rarity's id
$admin_card_rarity_id = (int)form_fetch_element('card_rarity', request_type: 'GET');

// Fetch the card rarity data
$admin_card_rarity_data = card_rarities_get($admin_card_rarity_id);

// Stop here if the card rarity does not exist
if(!$admin_card_rarity_data)
  exit(header("Location: ".$path."pages/admin/card_rarities"));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__link('pages/admin/card_rarities', __('admin_card_rarity_edit_title'), 'text_light')?>
  </h2>

  <form action="card_rarities" method="POST">
    <fieldset>

      <input type="hidden" name="card_rarity_id" value="<?=$admin_card_rarity_id?>">

      <div class="smallpadding_bot">
        <label for="card_rarity_name_en"><?=__('admin_card_rarity_add_name_en')?></label>
        <input class="indiv" type="text" name="card_rarity_name_en" value="<?=$admin_card_rarity_data['name_en']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="card_rarity_name_fr"><?=__('admin_card_rarity_add_name_fr')?></label>
        <input class="indiv" type="text" name="card_rarity_name_fr" value="<?=$admin_card_rarity_data['name_fr']?>">
      </div>

      <div class="padding_bot">
        <label for="card_rarity_max_count"><?=__('admin_card_rarity_add_max_count')?></label>
        <input class="indiv" type="text" name="card_rarity_max_count" value="<?=$admin_card_rarity_data['max_count']?>">
      </div>

      <input type="submit" name="card_rarity_edit" value="<?=__('admin_card_rarity_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;