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