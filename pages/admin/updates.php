<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';    # Core
include_once './../../actions/updates.act.php'; # Updates management
include_once './../../lang/admin.lang.php';     # Admin translations

// Page summary
$page_url       = "pages/admin/updates";
$page_title_en  = "Admin: Updates";
$page_title_fr  = "Admin : Mises à jour";

// Admin menu selection
$admin_menu['updates'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');





/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add an update

if(isset($_POST['update_add']))
{
  // Gather the postdata
  $update_add_title_en = form_fetch_element('update_title_en');
  $update_add_title_fr = form_fetch_element('update_title_fr');
  $update_add_body_en  = form_fetch_element('update_body_en');
  $update_add_body_fr  = form_fetch_element('update_body_fr');

  // Assemble an array with the postdata
  $update_add_data = array( 'title_en'  => $update_add_title_en ,
                            'title_fr'  => $update_add_title_fr ,
                            'body_en'   => $update_add_body_en  ,
                            'body_fr'   => $update_add_body_fr  );

  // Add the update to the database
  updates_add($update_add_data);
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;