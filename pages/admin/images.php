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
// Delete an image

if(isset($_POST['admin_images_delete']))
  images_delete(form_fetch_element('admin_images_delete'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit an image

if(isset($_POST['image_edit']))
{
  // Grab the image's ID
  $image_edit_id = form_fetch_element('image_id');

  // Gather image postdata
  $image_edit_name    = form_fetch_element('image_name');
  $image_edit_lang    = form_fetch_element('image_language');
  $image_edit_artist  = form_fetch_element('image_artist');

  // Gather tag postdata
  for($i = 0; $i < $image_tags['rows']; $i++)
    $image_edit_tags[$image_tags[$i]['id']] = form_fetch_element("image_tag_".$image_tags[$i]['id'], element_exists: true);

  // Assemble an array with the postdata
  $image_edit_data = array( 'image_name'    => $image_edit_name   ,
                            'image_artist'  => $image_edit_artist ,
                            'image_lang'    => $image_edit_lang   ,
                            'image_tags'    => $image_edit_tags   );

  // Edit the image
  images_edit(  $image_edit_id    ,
                $image_edit_data  );
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// List uncategorized images

$uncategorized_images = images_list_uncategorized();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// List image languages

$image_languages = images_list_languages();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all images

// Fetch the search data
$admin_images_sort        = form_fetch_element('admin_images_sort', 'path');
$admin_images_search_data = array(  'path'    =>  form_fetch_element('admin_images_search_path')    ,
                                    'name'    =>  form_fetch_element('admin_images_search_name')    ,
                                    'lang'    =>  form_fetch_element('admin_images_search_lang')    ,
                                    'artist'  =>  form_fetch_element('admin_images_search_artist')  ,
                                    'tag_id'  =>  form_fetch_element('admin_images_search_tags')    );

// Fetch the images
$list_images = images_list( $admin_images_sort        ,
                            $admin_images_search_data );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_60 padding_top">

  <?php if($uncategorized_images['rows']): ?>

  <div id="admin_uncategorized_images_list">

    <h5>
      <?=__('admin_uncategorized_images_title', amount: $uncategorized_images['rows'], preset_values: array($uncategorized_images['rows']))?>
      <?=__icon('minimize', alt: 'X', title: __('admin_uncategorized_images_hide'), class: 'valign_middle pointer spaced_left', onclick: "toggle_element('admin_uncategorized_images_list')")?>
    </h5>

    <ul class="smallpadding_top bigpadding_bot">

      <?php for($i = 0; $i < $uncategorized_images['rows']; $i++): ?>

      <li>
        <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/images_add?image='.$uncategorized_images[$i])?>
        <?=str_replace('||', '/', $uncategorized_images[$i])?>
      </li>

      <?php endfor; ?>

    </ul>

  </div>

  <?php endif; ?>

  <table>
    <thead>

      <tr class="uppercase">
        <th>
          <?=__('admin_image_list_path')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_images_search('path');")?>
        </th>
        <th>
          <?=__('admin_image_list_language')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_images_search('lang');")?>
        </th>
        <th>
          <?=__('admin_image_list_name')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_images_search('name');")?>
        </th>
        <th>
          <?=__('admin_image_list_artist')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_images_search('artist');")?>
        </th>
        <th>
          <?=__('admin_image_list_tags')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_images_search('tags');")?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

      <tr>
        <th>
          <input type="hidden" name="admin_images_sort" id="admin_images_sort" value="path">
          <input type="text" class="table_search" name="admin_images_search_path" id="admin_images_search_path" value="" onkeyup="admin_images_search();">
        </th>
        <th>
          <select class="table_search" name="admin_images_search_lang" id="admin_images_search_lang" onchange="admin_images_search();">
            <option value="">&nbsp;</option>
            <?php for($i = 0; $i < $image_languages['rows']; $i++): ?>
            <option value="<?=$image_languages[$i]['lang']?>"><?=$image_languages[$i]['blang']?></option>
            <?php endfor; ?>
            <option value="none"><?=__('admin_images_nolang')?></option>
          </select>
        </th>
        <th>
          <input type="text" class="table_search" name="admin_images_search_name" id="admin_images_search_name" value="" onkeyup="admin_images_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_images_search_artist" id="admin_images_search_artist" value="" onkeyup="admin_images_search();">
        </th>
        <th>
          <select class="table_search" name="admin_images_search_tags" id="admin_images_search_tags" onchange="admin_images_search();">
            <option value="">&nbsp;</option>
            <option value="-1"><?=string_change_case(__('none'), 'initials')?></option>
            <?php for($i = 0; $i < $image_tags['rows']; $i++): ?>
            <option value="<?=$image_tags[$i]['id']?>"><?=$image_tags[$i]['name']?></option>
            <?php endfor; ?>
          </select>
        </th>
        <th>
          &nbsp;
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_images_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="6" class="uppercase text_light dark bold align_center">
          <?=__('admin_image_list_count', preset_values: array($list_images['rows']), amount: $list_images['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $list_images['rows']; $i++): ?>

      <tr id="admin_images_row_<?=$list_images[$i]['id']?>">

        <td class="tooltip_container tooltip_desktop" id="admin_image_preview_cell_<?=$list_images[$i]['id']?>" onmouseover="admin_images_preview('<?=$list_images[$i]['id']?>', '<?=$list_images[$i]['dpath']?>', '<?=$list_images[$i]['bpath']?>', '<?=$path?>');">
          <?=__link($list_images[$i]['path'], $list_images[$i]['ppath'], 'text_white bold noglow', is_internal: false)?>
          <div class="tooltip image_preview">
            <div class="padding_top padding_bot align_center" id="admin_image_container_<?=$list_images[$i]['id']?>">
              &nbsp;
            </div>
          </div>
        </td>

        <td class="align_center bold">
          <?=$list_images[$i]['blang']?>
        </td>

        <?php if($list_images[$i]['name'] === $list_images[$i]['fname']): ?>
        <td>
          <?=$list_images[$i]['name']?>
        </td>
        <?php else: ?>
        <td class="tooltip_container">
          <?=$list_images[$i]['name']?>
          <div class="tooltip">
            <?=$list_images[$i]['fname']?>
          </div>
        </td>
        <?php endif; ?>

        <td>
          <?=$list_images[$i]['artist']?>
        </td>

        <?php if($list_images[$i]['tags']): ?>
        <td class="align_center tooltip_container">
          <span class="bold"><?=$list_images[$i]['ntags']?></span>
          <div class="tooltip">
            <?=str_replace(', ', '<br>', $list_images[$i]['tags'])?>
          </div>
        </td>
        <?php else: ?>
        <td>
          &nbsp;
        </td>
        <?php endif; ?>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/images_edit?image='.$list_images[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_images_delete('".__('admin_image_delete_confirm')."','".$list_images[$i]['id']."')")?>
        </td>

      </tr>

      <?php endfor; ?>

      <?php if(!page_is_fetched_dynamically()): ?>

    </tbody>

  </table>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;