<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/admin.act.php'; # Admin actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/releases";
$page_title_en  = "Admin: Releases";
$page_title_fr  = "Admin : Versions";

// Admin menu selection
$admin_menu['releases'] = 1;

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
    <?=__('admin_release_add_title')?>
  </h2>

  <form action="releases" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="release_name_en"><?=__('admin_release_add_name_en')?></label>
        <input class="indiv" type="text" name="release_name_en">
      </div>

      <div class="smallpadding_bot">
        <label for="release_name_fr"><?=__('admin_release_add_name_fr')?></label>
        <input class="indiv" type="text" name="release_name_fr">
      </div>

      <div class="padding_bot">
        <label for="release_date"><?=__('admin_release_add_date')?></label>
        <input class="indiv" type="text" name="release_date">
      </div>

      <input type="submit" name="release_add" value="<?=__('admin_release_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;