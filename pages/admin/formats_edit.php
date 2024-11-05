<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';    # Core
include_once './../../actions/formats.act.php'; # Game formats management
include_once './../../lang/admin.lang.php';     # Admin translations

// Page summary
$page_url       = "pages/admin/formats";
$page_title_en  = "Admin: Game formats";
$page_title_fr  = "Admin : Formats de jeu";

// Admin menu selection
$admin_menu['formats'] = 1;

// Extra CSS & JS
$css  = array('admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch game format data

// Fetch the format's id
$admin_format_id = (int)form_fetch_element('format', request_type: 'GET');

// Fetch the format data
$admin_format_data = formats_get($admin_format_id);

// Stop here if the format does not exist
if(!$admin_format_data)
  exit(header("Location: ".$path."pages/admin/formats"));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/formats', __('admin_format_edit_title'), 'text_light')?>
  </h2>

  <form action="formats" method="POST">
    <fieldset>

      <input type="hidden" name="format_id" value="<?=$admin_format_id?>">

      <div class="smallpadding_bot">
        <label for="format_sort"><?=__('admin_format_add_sort')?></label>
        <input class="indiv" type="text" name="format_sort" value="<?=$admin_format_data['order']?>">
      </div>

      <div class="flexcontainer smallpadding_bot">
        <div style="flex: 8">

          <div>
            <label for="format_name_en"><?=__('admin_format_add_name_en')?></label>
            <input class="indiv" type="text" name="format_name_en" value="<?=$admin_format_data['name_en']?>">
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="format_name_fr"><?=__('admin_format_add_name_fr')?></label>
            <input class="indiv" type="text" name="format_name_fr" value="<?=$admin_format_data['name_fr']?>">
          </div>

        </div>
      </div>

      <div class="flexcontainer smallpadding_bot">
        <div style="flex: 8">

          <div>
            <label for="format_body_en"><?=__('admin_format_add_body_en')?></label>
            <textarea class="indiv shorter" name="format_body_en"><?=$admin_format_data['desc_en']?></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="format_body_fr"><?=__('admin_format_add_body_fr')?></label>
            <textarea class="indiv shorter" name="format_body_fr"><?=$admin_format_data['desc_fr']?></textarea>
          </div>

        </div>
      </div>

      <div class="padding_bot">
        <label for="format_styling"><?=__('admin_format_add_styling')?></label>
        <input class="indiv" type="text" name="format_styling" value="<?=$admin_format_data['styling']?>">
      </div>

      <input type="submit" name="format_edit" value="<?=__('admin_format_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;