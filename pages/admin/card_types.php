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
  $card_type_add_name_en = form_fetch_element('card_type_name_en');
  $card_type_add_name_fr = form_fetch_element('card_type_name_fr');

  // Assemble an array with the postdata
  $card_type_add_data = array(  'name_en' => $card_type_add_name_en ,
                                'name_fr' => $card_type_add_name_fr );

  // Add the card type to the database
  card_types_add($card_type_add_data);
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>



<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;