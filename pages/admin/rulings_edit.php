<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';    # Core
include_once './../../actions/rulings.act.php'; # Rulings management
include_once './../../actions/cards.act.php';   # Card management
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
// Fetch the ruling

// Fetch the ruling's id
$admin_ruling_id = (int)form_fetch_element('ruling', request_type: 'GET');

// Fetch the ruling data
$admin_ruling_data = rulings_get($admin_ruling_id);

// Stop here if the ruling does not exist
if(!$admin_ruling_data)
  exit(header("Location: ".$path."pages/admin/rulings"));




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch cards linked to the ruling

// Fetch a list of non-extra cards
$card_list = cards_list(  sort_by:  'name'                            ,
                          search:   array(  'is_not_extra' => true  ) );

// Select the ruling's linked cards
for($i = 0; $i < $admin_ruling_data['cards']['rows']; $i++)
{
  for($j = 0; $j < $card_list['rows']; $j++)
  {
    if($card_list[$j]['id'] === $admin_ruling_data['cards']['id'][$i])
      $ruling_card_selected[$i][$j] = ' selected';
    else
      $ruling_card_selected[$i][$j] = '';
  }
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top">

  <h2 class="padding_bot">
    <?=__link('pages/admin/rulings', __('admin_ruling_edit_title'), 'text_light')?>
  </h2>

  <form action="rulings" method="POST">
    <fieldset>

      <div class="smallpadding_bot">
        <input type="hidden" name="ruling_id" value="<?=$admin_ruling_id?>">
        <label for="ruling_name"><?=__('admin_ruling_edit_name')?></label>
        <input class="indiv" type="text" name="ruling_name" value="<?=$admin_ruling_data['name']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="ruling_date"><?=__('admin_ruling_add_date')?></label>
        <input class="indiv" type="text" name="ruling_date" value="<?=$admin_ruling_data['date']?>">
      </div>

      <div class="smallpadding_bot">
        <label for="ruling_update"><?=__('admin_ruling_edit_update')?></label>
        <input class="indiv" type="text" name="ruling_update" value="<?=$admin_ruling_data['update']?>">
      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="ruling_title_en"><?=__('admin_ruling_add_title_en')?></label>
            <input class="indiv" type="text" name="ruling_title_en" value="<?=$admin_ruling_data['title_en']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="ruling_situation_en"><?=__('admin_ruling_add_situation_en')?></label>
            <textarea class="indiv shorter" name="ruling_situation_en"><?=$admin_ruling_data['situation_en']?></textarea>
          </div>

          <div>
            <label for="ruling_ruling_en"><?=__('admin_ruling_add_ruling_en')?></label>
            <textarea class="indiv shorter" name="ruling_ruling_en"><?=$admin_ruling_data['ruling_en']?></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div class="smallpadding_bot">
            <label for="ruling_title_fr"><?=__('admin_ruling_add_title_fr')?></label>
            <input class="indiv" type="text" name="ruling_title_fr" value="<?=$admin_ruling_data['title_fr']?>">
          </div>

          <div class="smallpadding_bot">
            <label for="ruling_situation_fr"><?=__('admin_ruling_add_situation_fr')?></label>
            <textarea class="indiv shorter" name="ruling_situation_fr"><?=$admin_ruling_data['situation_fr']?></textarea>
          </div>

          <div>
            <label for="ruling_ruling_fr"><?=__('admin_ruling_add_ruling_fr')?></label>
            <textarea class="indiv shorter" name="ruling_ruling_fr"><?=$admin_ruling_data['ruling_fr']?></textarea>
          </div>

        </div>
      </div>

      <div id="rulings_cards_container">

        <label><?=__('admin_ruling_add_cards')?></label>

        <?php if($admin_ruling_data['cards']['rows']): ?>
        <?php for($i = 0; $i < $admin_ruling_data['cards']['rows']; $i++): ?>
        <div id="rulings_cards" class="smallpadding_bot flexcontainer">
          <div style="flex: 6">
            <select class="indiv align_left" name="rulings_cards[]">
              <option value="">&nbsp;</option>
              <?php for($j = 0; $j < $card_list['rows']; $j++): ?>
              <option value="<?=$card_list[$j]['id']?>"<?=$ruling_card_selected[$i][$j]?>><?=$card_list[$j]['name']?> [<?=$card_list[$j]['release']?>] [<?=$card_list[$j]['type']?>]</option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <?php endfor; ?>

        <?php else: ?>
        <div id="rulings_cards" class="smallpadding_bot flexcontainer">
          <div style="flex: 6">
            <select class="indiv align_left" name="rulings_cards[]">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $card_list['rows']; $i++): ?>
              <option value="<?=$card_list[$i]['id']?>""><?=$card_list[$i]['name']?> [<?=$card_list[$i]['release']?>] [<?=$card_list[$i]['type']?>]</option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <?php endif; ?>

      </div>
      <div class="padding_bot">
        <?=__icon('duplicate', alt: 'D', title: __('duplicate'), title_case: 'initials', class: 'valign_middle pointer spaced_right', onclick: 'admin_rulings_duplicate_cards();')?>
        <?=__icon('delete', alt: 'X', title: __('delete'), title_case: 'initials', class: 'valign_middle pointer', onclick: 'admin_rulings_unduplicate_cards();')?>
      </div>

      <input type="submit" name="ruling_edit" value="<?=__('admin_ruling_edit_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;