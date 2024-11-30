<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/cards.act.php'; # Card management
include_once './../../lang/game.lang.php';    # Translations
include_once './../../lang/main.lang.php';    # More translations

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

<div class="width_50">

  <h2>
    <?=__('howto_title')?>
  </h2>

  <p>
    <?=__('howto_body_1')?>
  </p>

  <p>
    <?=__('howto_body_2')?>
  </p>

  <p>
    <?=__('howto_body_3')?>
  </p>

  <p>
    <?=__('howto_body_4')?>
  </p>

  <p>
    <?=__('howto_body_5')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_2.png" alt="Gameplay">
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_summary_title')?>
  </h4>

  <p>
    <?=__('home_summary_body_1')?>
  </p>

  <p>
    <?=__('home_summary_body_2')?>
  </p>

  <p>
    <?=__('home_summary_body_3')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('home_summary_body_4')?>
  </p>

  <div class="align_center hugepadding_top">
    <img src="<?=$path?>img/gameplay/gameplay_1.png" alt="Gameplay">
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';