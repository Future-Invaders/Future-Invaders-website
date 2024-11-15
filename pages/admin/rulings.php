<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';    # Core
include_once './../../actions/rulings.act.php'; # Rulings management
include_once './../../lang/admin.lang.php';     # Admin translations

// Page summary
$page_url       = "pages/admin/rulings";
$page_title_en  = "Admin: Rulings";
$page_title_fr  = "Admin : Jugements";

// Admin menu selection
$admin_menu['rulings'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a ruling

if(isset($_POST['ruling_add']))
{
  // Gather the postdata
  $ruling_add_date          = form_fetch_element('ruling_date');
  $ruling_add_name          = form_fetch_element('ruling_name');
  $ruling_add_title_en      = form_fetch_element('ruling_title_en');
  $ruling_add_title_fr      = form_fetch_element('ruling_title_fr');
  $ruling_add_situation_en  = form_fetch_element('ruling_situation_en');
  $ruling_add_situation_fr  = form_fetch_element('ruling_situation_fr');
  $ruling_add_ruling_en     = form_fetch_element('ruling_ruling_en');
  $ruling_add_ruling_fr     = form_fetch_element('ruling_ruling_fr');

  // Assemble an array with the postdata
  $ruling_add_data = array( 'ruling_date'         => $ruling_add_date         ,
                            'ruling_name'         => $ruling_add_name         ,
                            'ruling_title_en'     => $ruling_add_title_en     ,
                            'ruling_title_fr'     => $ruling_add_title_fr     ,
                            'ruling_situation_en' => $ruling_add_situation_en ,
                            'ruling_situation_fr' => $ruling_add_situation_fr ,
                            'ruling_ruling_en'    => $ruling_add_ruling_en    ,
                            'ruling_ruling_fr'    => $ruling_add_ruling_fr    );

  // Add the ruling to the database
  rulings_add($ruling_add_data);
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