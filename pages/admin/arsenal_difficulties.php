<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/arsenal_difficulties";
$page_title_en  = "Admin: Arsenal difficulty levels";
$page_title_fr  = "Admin : Niveaux de difficulté des arsenaux";

// Admin menu selection
$admin_menu['arsenals'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add an arsenal difficulty level

if(isset($_POST['difficulty_add']))
{
  // Assemble an array with the postdata
  $difficulty_add_data = array( 'order'   => form_fetch_element('difficulty_sort')    ,
                                'name_en' => form_fetch_element('difficulty_name_en') ,
                                'name_fr' => form_fetch_element('difficulty_name_fr') ,
                                'styling' => form_fetch_element('difficulty_styling')  );

  // Add the faction to the database
  arsenal_difficulties_add($difficulty_add_data);
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_40 padding_top">

</div>


<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;