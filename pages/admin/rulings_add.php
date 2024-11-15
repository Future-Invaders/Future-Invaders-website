<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';    # Core
include_once './../../actions/rulings.act.php'; # Rulings management
include_once './../../actions/cards.act.php';   # Card management
include_once './../../actions/tags.act.php';    # Tag management
include_once './../../lang/admin.lang.php';     # Admin translations

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
// Card list

$card_list = cards_list(  sort_by:  'name'                            ,
                          search:   array(  'is_not_extra' => true  ) );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Tag list

$tag_list = tags_list(search: array('ftype' => 'Card'));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Ruling date

$current_date = date('Y-m-d');



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/rulings', __('admin_ruling_add_title'), 'text_light')?>
  </h2>

  <form action="rulings" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <label for="ruling_date"><?=__('admin_ruling_add_date')?></label>
        <input class="indiv" type="text" name="ruling_date" value="<?=$current_date?>">
      </div>

      <div class="smallpadding_bot">
        <label for="ruling_name"><?=__('admin_ruling_add_name')?></label>
        <input class="indiv" type="text" name="ruling_name">
      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="ruling_title_en"><?=__('admin_ruling_add_title_en')?></label>
            <input class="indiv" type="text" name="ruling_title_en">
          </div>

          <div class="smallpadding_bot">
            <label for="ruling_situation_en"><?=__('admin_ruling_add_situation_en')?></label>
            <textarea class="indiv shorter" name="ruling_situation_en"></textarea>
          </div>

          <div>
            <label for="ruling_ruling_en"><?=__('admin_ruling_add_ruling_en')?></label>
            <textarea class="indiv shorter" name="ruling_ruling_en"></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="ruling_title_fr"><?=__('admin_ruling_add_title_fr')?></label>
            <input class="indiv" type="text" name="ruling_title_fr">
          </div>

          <div class="smallpadding_bot">
            <label for="ruling_situation_fr"><?=__('admin_ruling_add_situation_fr')?></label>
            <textarea class="indiv shorter" name="ruling_situation_fr"></textarea>
          </div>

          <div>
            <label for="ruling_ruling_fr"><?=__('admin_ruling_add_ruling_fr')?></label>
            <textarea class="indiv shorter" name="ruling_ruling_fr"></textarea>
          </div>

        </div>
      </div>

      <div id="rulings_cards_container">
        <label><?=__('admin_ruling_add_cards')?></label>
        <div id="rulings_cards" class="smallpadding_bot flexcontainer">
          <div style="flex: 6">
            <select class="indiv align_left" name="rulings_cards[]">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $card_list['rows']; $i++): ?>
              <option value="<?=$card_list[$i]['id']?>"><?=$card_list[$i]['name']?> [<?=$card_list[$i]['release']?>] [<?=$card_list[$i]['type']?>]</option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="padding_bot">
        <?=__icon('duplicate', alt: 'D', title: __('duplicate'), title_case: 'initials', class: 'valign_middle pointer spaced_right', onclick: 'admin_rulings_duplicate_cards();')?>
        <?=__icon('delete', alt: 'X', title: __('delete'), title_case: 'initials', class: 'valign_middle pointer', onclick: 'admin_rulings_unduplicate_cards();')?>
      </div>

      <div id="rulings_tags_container">
        <label><?=__('admin_ruling_add_tags')?></label>
        <div id="rulings_tags" class="smallpadding_bot flexcontainer">
          <div style="flex: 6">
            <select class="indiv align_left" name="rulings_tags[]">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $tag_list['rows']; $i++): ?>
              <option value="<?=$tag_list[$i]['id']?>"><?=$tag_list[$i]['name']?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="padding_bot">
        <?=__icon('duplicate', alt: 'D', title: __('duplicate'), title_case: 'initials', class: 'valign_middle pointer spaced_right', onclick: 'admin_rulings_duplicate_tags();')?>
        <?=__icon('delete', alt: 'X', title: __('delete'), title_case: 'initials', class: 'valign_middle pointer', onclick: 'admin_rulings_unduplicate_tags();')?>
      </div>

      <input type="submit" name="ruling_add" value="<?=__('admin_ruling_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;