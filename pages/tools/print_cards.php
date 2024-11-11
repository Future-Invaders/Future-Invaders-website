<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/tools.lang.php';   # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/print_cards";
$page_title_en    = "Print cards";
$page_title_fr    = "Imprimer des cartes";
$page_description = "Print your own cards from the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get the user's language

$imglang = string_change_case($lang, 'lowercase');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('print_allcards_title')?>
  </h2>

  <p>
    <?=__('print_allcards_body_1')?>
  </p>

  <p>
    <?=__('print_allcards_body_2')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('print_allcards_body_3')?>
  </p>

  <p>
    <?=__('print_allcards_choice').__(':')?>
  </p>
  <ul class="tinypadding_top">
    <li>
      <?=__link('img/print/cards/'.$imglang.'/all_cards.pdf', __('print_allcards_single'))?>
    </li>
    <li>
      <?=__link('img/print/cards/'.$imglang.'/max_cards.pdf', __('print_allcards_max'))?>
    </li>
  </ul>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';