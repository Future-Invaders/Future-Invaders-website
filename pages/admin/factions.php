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
// Add a faction

if(isset($_POST['faction_add']))
{
  // Gather the postdata
  $faction_add_name_en  = form_fetch_element('faction_name_en');
  $faction_add_name_fr  = form_fetch_element('faction_name_fr');

  // Assemble an array with the postdata
  $faction_add_data = array(  'name_en' => $faction_add_name_en ,
                              'name_fr' => $faction_add_name_fr );

  // Add the faction to the database
  factions_add($faction_add_data);
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