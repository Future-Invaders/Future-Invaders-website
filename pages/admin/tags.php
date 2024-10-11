<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/tags";
$page_title_en  = "Admin: Tags";
$page_title_fr  = "Admin : Tags";

// Admin menu selection
$admin_menu['tags'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a tag

if(isset($_POST['tag_add']))
{
  // Gather the postdata
  $tag_add_type     = form_fetch_element('tag_type');
  $tag_add_name     = form_fetch_element('tag_name');
  $tag_add_desc_en  = form_fetch_element('tag_desc_en');
  $tag_add_desc_fr  = form_fetch_element('tag_desc_fr');

  // Assemble an array with the postdata
  $tag_add_data = array(  'type'    => $tag_add_type    ,
                          'name'    => $tag_add_name    ,
                          'desc_en' => $tag_add_desc_en ,
                          'desc_fr' => $tag_add_desc_fr );

  // Add the tag to the database
  tags_add($tag_add_data);
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