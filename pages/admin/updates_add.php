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
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__('admin_update_add_title')?>
  </h2>

  <form action="updates" method="POST">
    <fieldset>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="update_title_en"><?=__('admin_update_add_title_en')?></label>
            <input class="indiv" type="text" name="update_title_en">
          </div>

          <label for="update_body_en"><?=__('admin_update_add_body_en')?></label>
          <textarea class="indiv" name="update_body_en"></textarea>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="update_title_fr"><?=__('admin_update_add_title_fr')?></label>
            <input class="indiv" type="text" name="update_title_fr">
          </div>

          <label for="update_body_fr"><?=__('admin_update_add_body_fr')?></label>
          <textarea class="indiv" name="update_body_fr"></textarea>

        </div>
      </div>

      <input type="submit" name="update_add" value="<?=__('admin_update_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;