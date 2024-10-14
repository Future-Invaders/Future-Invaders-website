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
/*                                                    BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a card

if(isset($_POST['card_add']))
{
  // Gather the postdata
  $card_add_name_en     = form_fetch_element('card_name_en');
  $card_add_name_fr     = form_fetch_element('card_name_fr');
  $card_add_type        = form_fetch_element('card_type');
  $card_add_faction     = form_fetch_element('card_faction');
  $card_add_rarity      = form_fetch_element('card_rarity');
  $card_add_release     = form_fetch_element('card_release');
  $card_add_image_en    = form_fetch_element('card_image_en');
  $card_add_image_fr    = form_fetch_element('card_image_fr');
  $card_add_hidden      = form_fetch_element('card_hidden');
  $card_add_extra       = form_fetch_element('card_extra');
  $card_add_weapons     = form_fetch_element('card_weapons', default_value: 0);
  $card_add_cost        = form_fetch_element('card_cost', default_value: 0);
  $card_add_durability  = form_fetch_element('card_durability', default_value: "");
  $card_add_income      = form_fetch_element('card_income', default_value: "");
  $card_add_body_en     = form_fetch_element('card_body_en');
  $card_add_body_fr     = form_fetch_element('card_body_fr');

  // Fetch card tags
  $card_tags = tags_list(search: array('ftype' => 'Card'));

  // Gather card postdata
  for($i = 0; $i < $card_tags['rows']; $i++)
    $card_add_tags[$card_tags[$i]['id']] = form_fetch_element("card_tag_".$card_tags[$i]['id'], element_exists: true);

  // Assemble an array with the postdata
  $card_add_data = array(  'name_en'       => $card_add_name_en     ,
                           'name_fr'       => $card_add_name_fr     ,
                           'type'          => $card_add_type        ,
                           'faction'       => $card_add_faction     ,
                           'rarity'        => $card_add_rarity      ,
                           'release'       => $card_add_release     ,
                           'image_en'      => $card_add_image_en    ,
                           'image_fr'      => $card_add_image_fr    ,
                           'hidden'        => $card_add_hidden      ,
                           'extra'         => $card_add_extra       ,
                           'weapons'       => $card_add_weapons     ,
                           'cost'          => $card_add_cost        ,
                           'durability'    => $card_add_durability  ,
                           'income'        => $card_add_income      ,
                           'body_en'       => $card_add_body_en     ,
                           'body_fr'       => $card_add_body_fr     ,
                           'card_tags'     => $card_add_tags        );

  // Add the card to the database
  cards_add($card_add_data);
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h5>
    <?=__('admin_card_management').__(':')?>
  </h5>

  <ul class="tinypadding_top bigpadding_bot">
    <li>
      <?=__link('pages/admin/card_types', __('admin_card_management_types'))?>
    </li>
    <li>
      <?=__link('pages/admin/card_rarities', __('admin_card_management_rarities'))?>
    </li>
  </ul>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;