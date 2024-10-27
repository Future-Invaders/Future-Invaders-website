<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/arsenals";
$page_title_en  = "Admin: Arsenals";
$page_title_fr  = "Admin : Arsenaux";

// Admin menu selection
$admin_menu['arsenals'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    BACK END                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add an arsenal

if(isset($_POST['arsenal_add']))
{
  // Gather the postdata
  $arsenal_add_release      = form_fetch_element('arsenal_release');
  $arsenal_add_format       = form_fetch_element('arsenal_format');
  $arsenal_add_difficulty   = form_fetch_element('arsenal_difficulty');
  $arsenal_add_name_en      = form_fetch_element('arsenal_name_en');
  $arsenal_add_name_fr      = form_fetch_element('arsenal_name_fr');
  $arsenal_add_playstyle_en = form_fetch_element('arsenal_playstyle_en');
  $arsenal_add_playstyle_fr = form_fetch_element('arsenal_playstyle_fr');
  $arsenal_add_summary_en   = form_fetch_element('arsenal_summary_en');
  $arsenal_add_summary_fr   = form_fetch_element('arsenal_summary_fr');
  $arsenal_add_gameplan_en  = form_fetch_element('arsenal_gameplan_en');
  $arsenal_add_gameplan_fr  = form_fetch_element('arsenal_gameplan_fr');
  $arsenal_add_reserves_en  = form_fetch_element('arsenal_reserves_en');
  $arsenal_add_reserves_fr  = form_fetch_element('arsenal_reserves_fr');

  // Assemble an array with the postdata
  $arsenal_add_data = array(  'release'       => $arsenal_add_release       ,
                              'format'        => $arsenal_add_format        ,
                              'difficulty'    => $arsenal_add_difficulty    ,
                              'name_en'       => $arsenal_add_name_en       ,
                              'name_fr'       => $arsenal_add_name_fr       ,
                              'playstyle_en'  => $arsenal_add_playstyle_en  ,
                              'playstyle_fr'  => $arsenal_add_playstyle_fr  ,
                              'summary_en'    => $arsenal_add_summary_en    ,
                              'summary_fr'    => $arsenal_add_summary_fr    ,
                              'gameplan_en'   => $arsenal_add_gameplan_en   ,
                              'gameplan_fr'   => $arsenal_add_gameplan_fr   ,
                              'reserves_en'   => $arsenal_add_reserves_en   ,
                              'reserves_fr'   => $arsenal_add_reserves_fr   );

  // Add the arsenal to the database
  arsenals_add($arsenal_add_data);
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h5>
    <?=__('admin_arsenal_management').__(':')?>
  </h5>

  <ul class="tinypadding_top bigpadding_bot">
    <li>
      <?=__link('pages/admin/arsenals_add', __('admin_arsenal_management_add'))?>
    </li>
    <li>
      <?=__link('pages/admin/arsenal_difficulties', __('admin_arsenal_management_difficulties'))?>
    </li>
    <?php if(!isset($_GET['fullbody'])): ?>
    <li>
      <?=__link('pages/admin/arsenals?fullbody', __('admin_arsenal_management_show_body'))?>
    </li>
    <?php else: ?>
    <li>
      <?=__link('pages/admin/arsenals', __('admin_arsenal_management_hide_body'))?>
    </li>
    <?php endif; ?>
  </ul>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;