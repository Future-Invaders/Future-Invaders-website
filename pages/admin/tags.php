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
// Add a tag

if(isset($_POST['tag_add']))
{
  // Gather the postdata
  $tag_add_type     = form_fetch_element('tag_type');
  $tag_add_name     = form_fetch_element('tag_name');
  $tag_add_desc_en  = form_fetch_element('tag_desc_en');
  $tag_add_desc_fr  = form_fetch_element('tag_desc_fr');

  // Assemble an array with the postdata
  $tag_add_data = array(  'type'    => $tag_add_type    ,
                          'name'    => $tag_add_name    ,
                          'desc_en' => $tag_add_desc_en ,
                          'desc_fr' => $tag_add_desc_fr );

  // Add the tag to the database
  tags_add($tag_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit a tag

if(isset($_POST['tag_edit']))
{
  // Gather the postdata
  $tag_edit_id      = form_fetch_element('tag_id');
  $tag_edit_name    = form_fetch_element('tag_name');
  $tag_edit_desc_en = form_fetch_element('tag_desc_en');
  $tag_edit_desc_fr = form_fetch_element('tag_desc_fr');

  // Assemble an array with the postdata
  $tag_edit_data = array(  'name'    => $tag_edit_name    ,
                           'desc_en' => $tag_edit_desc_en ,
                           'desc_fr' => $tag_edit_desc_fr );

  // Edit the tag
  tags_edit(  $tag_edit_id    ,
              $tag_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all tags

// Fetch the search data
$admin_tags_sort        = form_fetch_element('admin_tags_sort', 'type');
$admin_tags_search_data = array(  'type'    =>  form_fetch_element('admin_tags_search_type')    ,
                                  'name'    =>  form_fetch_element('admin_tags_search_name')    ,
                                  'desc'    =>  form_fetch_element('admin_tags_search_desc')    );

// Fetch the tags
$tags_list = tags_list( $admin_tags_sort        ,
                        $admin_tags_search_data );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all tag types

$tag_types_list = tags_list_types();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <table>
    <thead>

      <tr class="uppercase">
        <th>
          <?=__('admin_tag_list_type')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_tags_search('type');")?>
        </th>
        <th>
          <?=__('admin_tag_list_name')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_tags_search('name');")?>
        </th>
        <th>
          <?=__('admin_tag_list_desc')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_tags_search('desc');")?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

      <tr>
        <th>
          <input type="hidden" name="admin_tags_sort" id="admin_tags_sort" value="type">
          <select class="table_search" name="admin_tags_search_type" id="admin_tags_search_type" onchange="admin_tags_search();">
            <option value="0">&nbsp;</option>
            <?php for($i = 0; $i < $tag_types_list['rows']; $i++): ?>
            <option value="<?=$tag_types_list[$i]['id']?>"><?=$tag_types_list[$i]['name']?></option>
            <?php endfor; ?>
          </select>
        </th>
        <th>
          <input type="text" class="table_search" name="admin_tags_search_name" id="admin_tags_search_name" value="" onkeyup="admin_tags_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_tags_search_desc" id="admin_tags_search_desc" value="" onkeyup="admin_tags_search();">
        </th>
        <th>
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/tags_add')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_tags_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="4" class="uppercase text_light dark bold align_center">
          <?=__('admin_tag_list_count', preset_values: array($tags_list['rows']), amount: $tags_list['rows'])?>
          (
          <?php for($i = 0; $i < $tag_types_list['rows']; $i++): ?>
            <?=$tags_list['type_count'][$tag_types_list[$i]['id']]?>
            <?=$tags_list['type_name'][$tag_types_list[$i]['id']]?>
            <?php if($i < $tag_types_list['rows'] - 1): ?>
              -
            <?php endif; ?>
          <?php endfor; ?>
          )
        </td>
      </tr>

      <?php for($i = 0; $i < $tags_list['rows']; $i++): ?>

      <tr id="admin_tags_row_<?=$tags_list[$i]['id']?>">

        <td class="align_center nowrap">
          <?=$tags_list[$i]['type']?>
        </td>

        <?php if($tags_list[$i]['name'] !== $tags_list[$i]['fname']): ?>
        <td class="align_center tooltip_container">
          <?=$tags_list[$i]['name']?>
          <div class="tooltip dowrap">
            <?=$tags_list[$i]['fname']?>
          </div>
        </td>
        <?php else: ?>
        <td class="align_center">
          <?=$tags_list[$i]['name']?>
        </td>
        <?php endif; ?>

        <?php if($tags_list[$i]['desc'] !== $tags_list[$i]['fdesc']): ?>
        <td class="align_center tooltip_container">
          <?=$tags_list[$i]['desc']?>
          <div class="tooltip dowrap">
            <?=$tags_list[$i]['fdesc']?>
          </div>
        </td>
        <?php else: ?>
        <td class="align_center">
          <?=$tags_list[$i]['desc']?>
        </td>
        <?php endif; ?>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/tags_edit?tag='.$tags_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_tags_delete('".__('admin_tag_delete_confirm')."','".$tags_list[$i]['id']."')")?>
        </td>

      </tr>

      <?php endfor; ?>

    </tbody>

    <?php if(!page_is_fetched_dynamically()): ?>

  </table>

</div>


<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;