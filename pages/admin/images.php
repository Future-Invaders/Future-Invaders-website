<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/admin.act.php'; # Admin actions
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
// List uncategorized images

$uncategorized_images = admin_images_list_uncategorized();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all images

// Fetch the search data
$admin_images_sort        = form_fetch_element('admin_images_sort', 'path');
$admin_images_search_data = array(  'path'    =>  form_fetch_element('admin_images_search_path')    ,
                                    'name'    =>  form_fetch_element('admin_images_search_name')    ,
                                    'artist'  =>  form_fetch_element('admin_images_search_artist')  );

// Fetch the images
$list_images = admin_images_list( $admin_images_sort        ,
                                  $admin_images_search_data );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <?php if($uncategorized_images['rows']): ?>

  <h5><?=__('admin_uncategorized_images_title').__(':')?></h5>

  <ul class="smallpadding_top bigpadding_bot">

    <?php for($i = 0; $i < $uncategorized_images['rows']; $i++): ?>

    <li>
      <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/images_add?image='.$uncategorized_images[$i])?>
      <?=$uncategorized_images[$i]?>
    </li>

    <?php endfor; ?>

  </ul>

  <?php endif; ?>

  <table>
    <thead>

      <tr class="uppercase">
        <th>
          <?=__('admin_image_list_path')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_images_search('path');")?>
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
          <input type="text" class="table_search" name="admin_images_search_name" id="admin_images_search_name" value="" onkeyup="admin_images_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_images_search_artist" id="admin_images_search_artist" value="" onkeyup="admin_images_search();">
        </th>
        <th colspan="2">
          &nbsp;
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_images_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="5" class="uppercase text_light dark bold align_center">
          <?=__('admin_image_list_count', preset_values: array($list_images['rows']), amount: $list_images['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $list_images['rows']; $i++): ?>

      <tr>

        <td>
          <?=__link($list_images[$i]['path'], $list_images[$i]['dpath'], 'bold noglow', is_internal: false)?>
        </td>

        <td>
          <?=$list_images[$i]['name']?>
        </td>

        <td>
          <?=$list_images[$i]['artist']?>
        </td>

        <td class="align_center">
          &nbsp;
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials')?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials')?>
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