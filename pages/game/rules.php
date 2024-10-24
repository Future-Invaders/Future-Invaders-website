<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/rules";
$page_title_en    = "Rules";
$page_title_fr    = "Règles";
$page_description = "Rules of the strategy sci-fi card battling game Future Invaders";

// Extra css
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch rules and reminder cards

// Prepare the correct language string
$card_lang = string_change_case($lang, 'lowercase');

// Fetch rules cards
$rules_cards = cards_list(  sort_by:  'name'                        ,
                            search:   array(  'type'    => 'Rules'  ,
                                              'public'  => true   ) );

// Fetch reminder cards
$reminder_cards = cards_list( sort_by:  'name'                            ,
                              search:   array(  'type'    => 'Reminders'  ,
                                                'public'  => true       ) );





/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50 bigpadding_bot">

  <h2>
    <?=__('rules_title')?>
  </h2>

  <p>
    <?=__('rules_body_1')?>
  </p>

  <p>
    <?=__('rules_body_2')?>
  </p>

  <p>
    <?=__('rules_body_3')?>
  </p>

  <p>
    <?=__('rules_body_4')?>
  </p>

</div>

<hr>

<div class="width_50 bigpadding_top bigpadding_bot" id="rules">

  <h2 class="bigpadding_bot">
    <?=__('rules_cards_title')?>
  </h2>

  <?php for($i = 0; $i < $rules_cards['rows']; $i++): ?>

  <div class="flexcontainer rules_container padding_bot">

    <div class="align_center" style="flex: 4">
      <a href="<?=$path.$rules_cards[$i]['image_'.$card_lang]?>">
        <img class="rules_image" src="<?=$path.$rules_cards[$i]['image_'.$card_lang]?>" alt="<?=$rules_cards[$i]['name_'.$card_lang]?>">
      </a>
    </div>

    <div style="flex: 1">
      &nbsp;
    </div>

    <div style="flex: 8">
      <div class="black bigspaced tinypadding_top tinypadding_bot">
        <h4>
          <?=$rules_cards[$i]['name_'.$card_lang]?>
        </h4>
        <p>
          <?=$rules_cards[$i]['body_'.$card_lang.'_raw']?>
        </p>
      </div>
    </div>

  </div>

  <?php endfor; ?>

</div>

<hr>

<div class="width_50 bigpadding_top" id="reminders">

  <h2 class="bigpadding_bot">
    <?=__('reminder_cards_title')?>
  </h2>

  <?php for($i = 0; $i < $reminder_cards['rows']; $i++): ?>

  <div class="flexcontainer rules_container padding_bot">

    <div class="align_center" style="flex: 4">
      <a href="<?=$path.$reminder_cards[$i]['image_'.$card_lang]?>">
        <img class="rules_image" src="<?=$path.$reminder_cards[$i]['image_'.$card_lang]?>" alt="<?=$reminder_cards[$i]['name_'.$card_lang]?>">
      </a>
    </div>

    <div style="flex: 1">
      &nbsp;
    </div>

    <div style="flex: 8">
      <div class="black bigspaced tinypadding_top tinypadding_bot">
        <h4>
          <?=$reminder_cards[$i]['name_'.$card_lang]?>
        </h4>
        <p>
          <?=$reminder_cards[$i]['body_'.$card_lang.'_raw']?>
        </p>
      </div>
    </div>

  </div>

  <?php endfor; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';