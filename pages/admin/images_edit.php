<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/images";
$page_title_en  = "Admin: Images";
$page_title_fr  = "Admin : Images";

// Admin menu selection
$admin_menu['images'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch image data

// Fetch the image's id
$admin_image_id = (int)form_fetch_element('image', request_type: 'GET');

// Fetch the image data
$admin_image_data = images_get($admin_image_id);

// Stop here if the image does not exist
if(!$admin_image_data)
  exit(header("Location: ".$path."pages/admin/images"));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch image tags

// Fetch a list of all tags
$image_tags = tags_list(search: array('ftype' => 'Image'));

// Check the checkboxes of the tags that are already assigned to the image
for($i = 0; $i < $image_tags['rows']; $i++)
  $admin_image_tag_checked[$image_tags[$i]['id']] = (in_array($image_tags[$i]['id'], $admin_image_data['tags'])) ? ' checked': '';




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h1 class="align_center">
    <?=__link('pages/admin/images', __('admin_image_edit_title'), 'text_light')?>
  </h1>

  <h4 class="align_center smallpadding_top padding_bot">
    <?=__link($admin_image_data['path'], $admin_image_data['path'], 'text_light')?>
  </h4>

  <form action="images" method="POST">
    <fieldset>

      <input type="hidden" name="image_id" value="<?=$admin_image_id?>">

      <div class="smallpadding_bot">
        <label for="image_name"><?=__('admin_image_name')?></label>
        <input class="indiv" type="text" name="image_name" value="<?=$admin_image_data['name']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="image_language"><?=__('admin_image_language')?></label>
        <input class="indiv" type="text" name="image_language" value="<?=$admin_image_data['lang']?>">
      </div>

      <div class="padding_bot">
        <label for="image_artist"><?=__('admin_image_artist')?></label>
        <input class="indiv" type="text" name="image_artist" value="<?=$admin_image_data['artist']?>">
      </div>

      <div class="padding_bot">
        <label><?=__('admin_image_tags')?></label>
        <?php for($i = 0; $i < $image_tags['rows']; $i++): ?>
        <div class="tooltip_container">
          <input type="checkbox" name="image_tag_<?=$image_tags[$i]['id']?>"<?=$admin_image_tag_checked[$image_tags[$i]['id']]?>>
          <label class="label_inline" for="image_tag_<?=$image_tags[$i]['id']?>"><?=$image_tags[$i]['name']?></label>
          <div class="tooltip">
            <?=$image_tags[$i]['fdesc']?>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <input type="submit" name="image_edit" value="<?=__('admin_image_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;