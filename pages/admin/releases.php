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
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a release

if(isset($_POST['release_add']))
{
  // Gather the postdata
  $release_add_date     = form_fetch_element('release_date');
  $release_add_name_en  = form_fetch_element('release_name_en');
  $release_add_name_fr  = form_fetch_element('release_name_fr');

  // Assemble an array with the postdata
  $release_add_data = array(  'date'    => $release_add_date    ,
                              'name_en' => $release_add_name_en ,
                              'name_fr' => $release_add_name_fr );

  // Add the release to the database
  admin_releases_add($release_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Edit a release

if(isset($_POST['release_edit']))
{
  // Grab the release's ID
  $release_edit_id = form_fetch_element('release_id');

  // Assemble an array with the postdata
  $release_edit_data = array( 'name_en'    => form_fetch_element('release_name_en') ,
                              'name_fr'    => form_fetch_element('release_name_fr') ,
                              'date'       => form_fetch_element('release_date')    );

  // Edit the release
  admin_releases_edit(  $release_edit_id    ,
                        $release_edit_data  );
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Delete a release

if(isset($_POST['admin_releases_delete']))
  admin_releases_delete(form_fetch_element('admin_releases_delete'));





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all releases

// Fetch the search data
$admin_releases_sort        = form_fetch_element('admin_releases_sort', 'path');
$admin_releases_search_data = array(  'date'    =>  form_fetch_element('admin_releases_search_date')  ,
                                      'name'    =>  form_fetch_element('admin_releases_search_name')  );

// Fetch the releases
$releases_list = admin_releases_list( $admin_releases_sort        ,
                                      $admin_releases_search_data );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_30 padding_top">

  <table>
    <thead>

      <tr class="uppercase">
        <th>
          <?=__('admin_release_list_date')?>
          <?=__icon('sort_up', is_small: true, alt: '^', title: __('sort'), title_case: 'initials', onclick: "admin_releases_search('date_reverse');").__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_releases_search('date');")?>
        </th>
        <th>
          <?=__('admin_release_list_name')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_releases_search('name');")?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

      <tr>
        <th>
          <input type="hidden" name="admin_releases_sort" id="admin_releases_sort" value="date">
          <input type="text" class="table_search" name="admin_releases_search_date" id="admin_releases_search_date" value="" onkeyup="admin_releases_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_releases_search_name" id="admin_releases_search_name" value="" onkeyup="admin_releases_search();">
        </th>
        <th>
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/releases_add')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_releases_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="3" class="uppercase text_light dark bold align_center">
          <?=__('admin_release_list_count', preset_values: array($releases_list['rows']), amount: $releases_list['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $releases_list['rows']; $i++): ?>

      <tr id="admin_releases_row_<?=$releases_list[$i]['id']?>">

        <td class="align_center">
          <?=$releases_list[$i]['date']?>
        </td>

        <td class="align_center">
          <?=$releases_list[$i]['name']?>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/releases_edit?release='.$releases_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_releases_delete('".__('admin_release_delete_confirm')."','".$releases_list[$i]['id']."')")?>
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