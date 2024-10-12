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
// Fetch the tag types

// Get the list of tag types
$tag_types = tags_list_types();

// Default to selecting card tags
for($i = 0; $i < $tag_types['rows']; $i++)
  $tag_type_selected[$i] = ($tag_types[$i]['name'] === 'Card') ? ' selected ' : '';




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__('admin_tag_add_title')?>
  </h2>

  <form action="tags" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="tag_type"><?=__('admin_tag_add_type')?></label>
        <select class="indiv align_left" name="tag_type">
          <?php for($i = 0; $i < $tag_types['rows']; $i++): ?>
          <option value="<?=$tag_types[$i]['id']?>"<?=$tag_type_selected[$i]?>><?=$tag_types[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label for="tag_name"><?=__('admin_tag_add_name')?></label>
        <input class="indiv" type="text" name="tag_name">
      </div>

      <div class="smallpadding_bot">
        <label for="tag_desc_en"><?=__('admin_tag_add_desc_en')?></label>
        <textarea class="indiv shorter" name="tag_desc_en"></textarea>
      </div>

      <div class="padding_bot">
        <label for="tag_desc_fr"><?=__('admin_tag_add_desc_fr')?></label>
        <textarea class="indiv shorter" name="tag_desc_fr"></textarea>
      </div>

      <input type="submit" name="tag_add" value="<?=__('admin_tag_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;