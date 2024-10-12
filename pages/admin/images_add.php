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
// Fetch image tags

$image_tags = tags_list(search: array('ftype' => 'Image'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Define the placeholder artist

$placeholder_artist = "Microsoft Image Creator (AI)";




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get the image's path

// Fetch the path
$image_add_path = form_fetch_element('image', request_type: 'GET');

// If there is no path, go back to the image list
if(!$image_add_path)
  exit(header("Location: ./images"));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add the image

if(isset($_POST['image_add']))
{
  // Gather image postdata
  $image_add_name   = form_fetch_element('image_name');
  $image_add_artist = form_fetch_element('image_artist');

  // Gather tag postdata
  for($i = 0; $i < $image_tags['rows']; $i++)
    $image_add_tags[$image_tags[$i]['id']] = form_fetch_element("image_tag_".$image_tags[$i]['id'], element_exists: true);

  // Give the artist a default value if none is provided
  if(!$image_add_artist)
    $image_add_artist = $placeholder_artist;

  // Assemble an array with the postdata
  $image_add_data = array(  'image_path'    => $image_add_path    ,
                            'image_name'    => $image_add_name    ,
                            'image_artist'  => $image_add_artist  ,
                            'image_tags'    => $image_add_tags    );

  // Add the image to the database
  images_add($image_add_data);

  // Redirect to the image list
  exit(header("Location: ./images"));
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h5 class="padding_bot">
    <?=__('admin_image_name_title', spaces_after: 1).$image_add_path?>
  </h5>

  <form action="images_add?image=<?=$image_add_path?>" method="POST">
    <fieldset>

      <input type="hidden" name="image_path" value="<?=$image_add_path?>">

      <div class="smallpadding_bot">
        <label for="image_name"><?=__('admin_image_name')?></label>
        <input class="indiv" type="text" name="image_name">
      </div>

      <div class="padding_bot">
        <label for="image_artist"><?=__('admin_image_artist')?></label>
        <input class="indiv" type="text" name="image_artist" placeholder="<?=$placeholder_artist?>">
      </div>

      <div class="padding_bot">
        <label><?=__('admin_image_tags')?></label>
        <?php for($i = 0; $i < $image_tags['rows']; $i++): ?>
        <div class="tooltip_container">
          <input type="checkbox" name="image_tag_<?=$image_tags[$i]['id']?>">
          <label class="label_inline" for="image_tag_<?=$image_tags[$i]['id']?>"><?=$image_tags[$i]['name']?></label>
          <div class="tooltip">
            <?=$image_tags[$i]['fdesc']?>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <input type="submit" name="image_add" value="<?=__('admin_image_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;