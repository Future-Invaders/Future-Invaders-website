<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';      # Core
include_once './../../actions/arsenals.act.php';  # Arsenal management
include_once './../../lang/admin.lang.php';       # Admin translations

// Page summary
$page_url       = "pages/admin/arsenal_difficulties";
$page_title_en  = "Admin: Arsenal difficulty levels";
$page_title_fr  = "Admin : Niveaux de difficulté des arsenaux";

// Admin menu selection
$admin_menu['arsenals'] = 1;

// Extra CSS & JS
$css  = array('admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/arsenal_difficulties', __('admin_arsenal_difficulty_add_title'), 'text_light')?>
  </h2>

  <form action="arsenal_difficulties" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="difficulty_sort"><?=__('admin_arsenal_difficulty_add_order')?></label>
        <input class="indiv" type="text" name="difficulty_sort">
      </div>

      <div class="smallpadding_bot">
        <label for="difficulty_name_en"><?=__('admin_arsenal_difficulty_add_name_en')?></label>
        <input class="indiv" type="text" name="difficulty_name_en">
      </div>

      <div class="smallpadding_bot">
        <label for="difficulty_name_fr"><?=__('admin_arsenal_difficulty_add_name_fr')?></label>
        <input class="indiv" type="text" name="difficulty_name_fr">
      </div>

      <div class="padding_bot">
        <label for="difficulty_styling"><?=__('admin_arsenal_difficulty_add_styling')?></label>
        <input class="indiv" type="text" name="difficulty_styling">
      </div>

      <input type="submit" name="difficulty_add" value="<?=__('admin_arsenal_difficulty_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;