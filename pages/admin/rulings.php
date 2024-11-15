<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';        # Core
include_once './../../inc/functions_time.inc.php';  # Time management
include_once './../../actions/rulings.act.php';     # Rulings management
include_once './../../lang/admin.lang.php';         # Admin translations

// Page summary
$page_url       = "pages/admin/rulings";
$page_title_en  = "Admin: Rulings";
$page_title_fr  = "Admin : Jugements";

// Admin menu selection
$admin_menu['rulings'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add a ruling

if(isset($_POST['ruling_add']))
{
  // Gather the postdata
  $ruling_add_date          = form_fetch_element('ruling_date');
  $ruling_add_name          = form_fetch_element('ruling_name');
  $ruling_add_title_en      = form_fetch_element('ruling_title_en');
  $ruling_add_title_fr      = form_fetch_element('ruling_title_fr');
  $ruling_add_situation_en  = form_fetch_element('ruling_situation_en');
  $ruling_add_situation_fr  = form_fetch_element('ruling_situation_fr');
  $ruling_add_ruling_en     = form_fetch_element('ruling_ruling_en');
  $ruling_add_ruling_fr     = form_fetch_element('ruling_ruling_fr');

  // Assemble an array with the postdata
  $ruling_add_data = array( 'ruling_date'         => $ruling_add_date         ,
                            'ruling_name'         => $ruling_add_name         ,
                            'ruling_title_en'     => $ruling_add_title_en     ,
                            'ruling_title_fr'     => $ruling_add_title_fr     ,
                            'ruling_situation_en' => $ruling_add_situation_en ,
                            'ruling_situation_fr' => $ruling_add_situation_fr ,
                            'ruling_ruling_en'    => $ruling_add_ruling_en    ,
                            'ruling_ruling_fr'    => $ruling_add_ruling_fr    );

  // Add the ruling to the database
  rulings_add($ruling_add_data);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch rulings

// Fetch the search data
$admin_rulings_sort        = form_fetch_element('admin_rulings_sort', 'default');
$admin_rulings_search_data = array( 'title'  =>  form_fetch_element('admin_rulings_search_title') ,
                                    'body'   =>  form_fetch_element('admin_rulings_search_body')  );

// Fetch the rulings
$rulings_list = rulings_list( $admin_rulings_sort        ,
                              $admin_rulings_search_data );




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
          <?=__('admin_ruling_list_date')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_rulings_search('date');")?>
        </th>
        <th class="align_center">
          <?=__('admin_ruling_list_update')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_rulings_search('update');")?>
        </th>
        <th class="align_center">
          <?=__('admin_ruling_list_title')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_rulings_search('title');")?>
        </th>
        <th class="align_center">
          <?=__('admin_ruling_list_body')?>
          <?=__icon('sort_down', is_small: true, alt: 'v', title: __('sort'), title_case: 'initials', onclick: "admin_rulings_search('body');")?>
        </th>
        <th>
          <?=__('act')?>
        </th>
      </tr>

      <tr>
        <th>
          <input type="hidden" name="admin_rulings_sort" id="admin_rulings_sort" value="default">
          &nbsp;
        </th>
        <th>
          &nbsp;
        </th>
        <th>
          <input type="text" class="table_search" name="admin_rulings_search_title" id="admin_rulings_search_title" value="" onkeyup="admin_rulings_search();">
        </th>
        <th>
          <input type="text" class="table_search" name="admin_rulings_search_body" id="admin_rulings_search_body" value="" onkeyup="admin_rulings_search();">
        </th>
        <th>
          <?=__icon('add', is_small: true, alt: '+', title: __('add'), title_case: 'initials', href: 'pages/admin/rulings_add')?>
        </th>
      </tr>

    </thead>
    <tbody class="altc2 nowrap" id="admin_rulings_tbody">

      <?php endif; ?>

      <tr>
        <td colspan="5" class="uppercase text_light dark bold align_center">
          <?=__('admin_ruling_list_count', preset_values: array($rulings_list['rows']), amount: $rulings_list['rows'])?>
        </td>
      </tr>

      <?php for($i = 0; $i < $rulings_list['rows']; $i++): ?>
      <tr id="admin_rulings_row_<?=$rulings_list[$i]['id']?>">

        <?php if($rulings_list[$i]['date']): ?>
        <td class="align_center nowrap tooltip_container">
          <?=$rulings_list[$i]['date']?>
          <div class="tooltip">
            <?=$rulings_list[$i]['date_since']?>
          </div>
        </td>
        <?php else: ?>
        <td class="align_center">
          &nbsp;
        </td>
        <?php endif; ?>

        <?php if($rulings_list[$i]['update']): ?>
        <td class="align_center nowrap tooltip_container">
          <?=$rulings_list[$i]['update']?>
          <div class="tooltip">
            <?=$rulings_list[$i]['update_since']?>
          </div>
        </td>
        <?php else: ?>
        <td class="align_center">
          &nbsp;
        </td>
        <?php endif; ?>

        <td class="align_center nowrap tooltip_container">
          <?=$rulings_list[$i]['title']?>
          <div class="tooltip">
            <?=$rulings_list[$i]['title_en']?><br>
            <?=$rulings_list[$i]['title_fr']?>
          </div>
        </td>

        <td class="align_center nowrap tooltip_container">
          <?=$rulings_list[$i]['nsituation']?> - <?=$rulings_list[$i]['nruling']?>
          <div class="tooltip dowrap">
            <div class="spaced smallpadding_top smallpadding_bot">
              <span class="bold"><?=__('admin_ruling_list_situation_en').__(':')?></span> <?=$rulings_list[$i]['situation_en']?><br>
              <br>
              <span class="bold"><?=__('admin_ruling_list_ruling_en').__(':')?></span> <?=$rulings_list[$i]['ruling_en']?>
            </div>
            <hr>
            <div class="spaced smallpadding_top smallpadding_bot">
              <span class="bold"><?=__('admin_ruling_list_situation_fr').__(':')?></span> <?=$rulings_list[$i]['situation_fr']?><br>
              <br>
              <span class="bold"><?=__('admin_ruling_list_ruling_fr').__(':')?></span> <?=$rulings_list[$i]['ruling_fr']?>
            </div>
          </div>
        </td>

        <td class="align_center nowrap">
          <?=__icon('edit', is_small: true, class: 'valign_middle pointer spaced_right', alt: 'M', title: __('edit'), title_case: 'initials', href: 'pages/admin/rulings_edit?ruling='.$rulings_list[$i]['id'])?>
          <?=__icon('delete', is_small: true, class: 'valign_middle pointer', alt: 'X', title: __('delete'), title_case: 'initials', onclick: "admin_rulings_delete('".__('admin_ruling_delete_confirm')."','".$rulings_list[$i]['id']."')")?>
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