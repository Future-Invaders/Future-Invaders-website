<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';        # Core
include_once './../../inc/functions_time.inc.php';  # Time management
include_once './../../actions/admin.act.php';       # Admin actions
include_once './../../lang/admin.lang.php';         # Admin translations

// Page summary
$page_url       = "pages/admin/page_stats";
$page_title_en  = "Admin: Page stats";
$page_title_fr  = "Admin : Stats des pages";

// Admin menu selection
$admin_menu['page_stats'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch page stats

$page_stats_list = admin_page_stats_list();



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <table>
    <thead>

      <tr class="uppercase">
        <th class="align_center">
          <?=__('admin_page_stats_list_path')?>
        </th>
        <th class="align_center">
          <?=__('admin_page_stats_list_name')?>
        </th>
        <th class="align_center">
          <?=__('admin_page_stats_list_views')?>
        </th>
        <th class="align_center">
          <?=__('admin_page_stats_list_last')?>
        </th>
        <th class="align_center">
          <?=__('admin_page_stats_list_queries')?>
        </th>
        <th class="align_center">
          <?=__('admin_page_stats_list_load')?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

    </thead>

    <tbody class="altc2 nowrap" id="admin_page_stats_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="7" class="uppercase text_light dark bold align_center">
          <?=__('admin_page_stats_list_count', preset_values: array($page_stats_list['rows']), amount: $page_stats_list['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $page_stats_list['rows']; $i++): ?>

      <tr>

        <?php if($page_stats_list[$i]['path'] === $page_stats_list[$i]['fpath']): ?>
        <td class="align_left nowrap bold">
          <?=__link($page_stats_list[$i]['fpath'], $page_stats_list[$i]['path'])?>
        </td>
        <?php else: ?>
        <td class="align_left nowrap bold tooltip_container">
          <?=$page_stats_list[$i]['path']?>
          <div class="tooltip">
            <?=$page_stats_list[$i]['fpath']?>
          </div>
        </td>
        <?php endif; ?>

        <?php if($page_stats_list[$i]['name_en'] || $page_stats_list[$i]['name_fr']): ?>
        <td class="align_left nowrap tooltip_container">
          <?=$page_stats_list[$i]['name']?>
          <div class="tooltip">
            <?=$page_stats_list[$i]['name_en']?><br>
            <?=$page_stats_list[$i]['name_fr']?>
          </div>
        </td>
        <?php else: ?>
        <td class="align_left nowrap">
          <?=$page_stats_list[$i]['name']?>
        </td>
        <?php endif; ?>

        <td class="align_center bold nowrap">
          <?=$page_stats_list[$i]['views']?>
        </td>

        <td class="align_center nowrap">
          <?=$page_stats_list[$i]['last']?>
        </td>

        <td class="align_center nowrap">
          <?=$page_stats_list[$i]['queries']?>
        </td>

        <td class="align_center nowrap">
          <?=$page_stats_list[$i]['load']?>
        </td>

        <td class="align_center nowrap">
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_page_stats_delete('".__('admin_page_stats_delete_confirm')."','".$page_stats_list[$i]['id']."')")?>
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