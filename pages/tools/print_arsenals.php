<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';     # Core
include_once './../../actions/arsenals.act.php'; # Arsenal management
include_once './../../actions/factions.act.php'; # Faction management
include_once './../../actions/cards.act.php';    # Card management
include_once './../../lang/tools.lang.php';      # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/print_arsenals";
$page_title_en    = "Print arsenals";
$page_title_fr    = "Imprimer des arsenaux";
$page_description = "Print your own collections of cards from the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get the user's language

$imglang = string_change_case($lang, 'lowercase');




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch arsenals

$arsenals_list = arsenals_list( sort_by: 'name'                   ,
                                search:   array('public' => true) );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('print_arsenals_title')?>
  </h2>

  <p>
    <?=__('print_arsenals_body_1')?>
  </p>

  <p>
    <?=__('print_arsenals_body_2')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('print_allcards_body_3')?>
  </p>

  <p>
    <?=__('print_arsenals_choose')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('print_arsenals_res')?>
  </p>

  <p class="nopadding_top smallpadding_top tinypadding_bot bold">
    <?=__('print_arsenals_all')?>
  </p>
  <ul class="tinypadding_bot">
    <li>
      <?=__link('img/print/arsenals/'.$imglang.'/all_arsenals.pdf', __('print_arsenals_extra'), popup: true)?>
    </li>
  </ul>

  <?php for($i = 0; $i < $arsenals_list['rows']; $i++): ?>
  <?php if($arsenals_list[$i]['print_'.$imglang]): ?>
  <p class="nopadding_top smallpadding_top tinypadding_bot bold">
    <?=$arsenals_list[$i]['fname']?>
  </p>
  <ul class="tinypadding_bot">
    <li>
      <?=__link($arsenals_list[$i]['print_'.$imglang], __('print_aresnals_cards'), popup: true)?>
    </li>
    <?php if($arsenals_list[$i]['print_extra_'.$imglang]): ?>
    <li>
      <?=__link($arsenals_list[$i]['print_extra_'.$imglang], __('print_arsenals_extra'), popup: true)?>
    </li>
    <li>
      <?=__link('pages/arsenal/'.$arsenals_list[$i]['slug'], __('print_arsenals_desc'), popup: true)?>
    </li>
    <?php endif; ?>
  </ul>
  <?php endif; ?>
  <?php endfor; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';