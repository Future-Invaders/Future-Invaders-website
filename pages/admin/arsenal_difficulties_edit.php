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




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenal difficulty level data

// Fetch the difficulty's id
$admin_difficulty_id = (int)form_fetch_element('difficulty', request_type: 'GET');

// Fetch the difficulty data
$admin_difficluty_data = arsenal_difficulties_get($admin_difficulty_id);

// Stop here if the difficulty does not exist
if(!$admin_difficluty_data)
  exit(header("Location: ".$path."pages/admin/formats"));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/arsenal_difficulties', __('admin_arsenal_difficulty_edit_title'), 'text_light')?>
  </h2>

  <form action="arsenal_difficulties" method="POST">
    <fieldset>

      <input type="hidden" name="difficulty_id" value="<?=$admin_difficulty_id?>">

      <div class="smallpadding_bot">
        <label for="difficulty_sort"><?=__('admin_arsenal_difficulty_add_order')?></label>
        <input class="indiv" type="text" name="difficulty_sort" value="<?=$admin_difficluty_data['order']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="difficulty_name_en"><?=__('admin_arsenal_difficulty_add_name_en')?></label>
        <input class="indiv" type="text" name="difficulty_name_en" value="<?=$admin_difficluty_data['name_en']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="difficulty_name_fr"><?=__('admin_arsenal_difficulty_add_name_fr')?></label>
        <input class="indiv" type="text" name="difficulty_name_fr" value="<?=$admin_difficluty_data['name_fr']?>">
      </div>

      <div class="padding_bot">
        <label for="difficulty_styling"><?=__('admin_arsenal_difficulty_add_styling')?></label>
        <input class="indiv" type="text" name="difficulty_styling" value="<?=$admin_difficluty_data['styling']?>">
      </div>

      <input type="submit" name="difficulty_edit" value="<?=__('admin_arsenal_difficulty_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;