<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/formats";
$page_title_en  = "Admin: Game formats";
$page_title_fr  = "Admin : Formats de jeu";

// Admin menu selection
$admin_menu['formats'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a game format

if(isset($_POST['format_add']))
{
  // Assemble an array with the postdata
  $format_add_data = array( 'order'   => form_fetch_element('format_sort')   ,
                            'name_en' => form_fetch_element('format_name_en') ,
                            'name_fr' => form_fetch_element('format_name_fr') ,
                            'body_en' => form_fetch_element('format_body_en') ,
                            'body_fr' => form_fetch_element('format_body_fr') );

  // Add the faction to the database
  formats_add($format_add_data);
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_30 padding_top">

</div>


<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;