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
// Fetch tag data

// Fetch the tag's id
$admin_tag_id = (int)form_fetch_element('tag', request_type: 'GET');

// Fetch the tag data
$admin_tag_data = tags_get($admin_tag_id);

// Stop here if the tag does not exist
if(!$admin_tag_data)
  exit(header("Location: ".$path."pages/admin/tags"));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__link('pages/admin/tags', __('admin_tag_edit_title'), 'text_light')?>
  </h2>

  <form action="tags" method="POST">
    <fieldset>

      <input type="hidden" name="tag_id" value="<?=$admin_tag_id?>">

      <div class="smallpadding_bot">
        <label for="tag_name"><?=__('admin_tag_add_name')?></label>
        <input class="indiv" type="text" name="tag_name" value="<?=$admin_tag_data['name']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="tag_desc_en"><?=__('admin_tag_add_desc_en')?></label>
        <textarea class="indiv shorter" name="tag_desc_en" rows="2"><?=$admin_tag_data['desc_en']?></textarea>
      </div>

      <div class="padding_bot">
        <label for="tag_desc_fr"><?=__('admin_tag_add_desc_fr')?></label>
        <textarea class="indiv shorter" name="tag_desc_fr" rows="2"><?=$admin_tag_data['desc_fr']?></textarea>
      </div>

      <input type="submit" name="tag_edit" value="<?=__('admin_tag_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;