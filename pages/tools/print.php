<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/tools.lang.php';   # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/print";
$page_title_en    = "Print at home";
$page_title_fr    = "Impression maison";
$page_description = "How to print the contents of the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('print_title')?>
  </h2>

  <div class="floater float_right float_noborder">
    <a href="<?=$path?>img/print/guides/print_print.jpg" target="_blank">
      <img src="<?=$path?>img/print/guides/print_print.jpg" alt="<?=__('print_image')?>" title="<?=__('print_image')?>">
    </a>
  </div>

  <p>
    <?=__('print_body')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('print_requirements')?>
  </h5>

  <p>
    <?=__('print_requirements_body_1')?>
  </p>

  <p>
    <?=__('print_requirements_body_2')?>
  </p>

  <div class="floater float_left float_noborder float_above">
    <a href="<?=$path?>img/print/guides/print_cut.jpg" target="_blank">
      <img src="<?=$path?>img/print/guides/print_cut.jpg" alt="<?=__('print_requirements_image')?>" title="<?=__('print_requirements_image')?>">
    </a>
  </div>

  <p>
    <?=__('print_requirements_body_3')?>
  </p>

  <p>
    <?=__('print_requirements_body_4')?>
  </p>

  <p>
    <?=__('print_requirements_body_5')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('print_cards_title')?>
  </h5>

  <p>
    <?=__('print_cards_body_1')?>
  </p>

  <p>
    <?=__('print_cards_body_2')?>
  </p>

  <div class="floater float_right float_noborder">
    <a href="<?=$path?>img/print/guides/print_sleeve.jpg" target="_blank">
      <img src="<?=$path?>img/print/guides/print_sleeve.jpg" alt="<?=__('print_cards_image')?>" title="<?=__('print_requirements_image')?>">
    </a>
  </div>

  <p>
    <?=__('print_cards_body_3')?>
  </p>

  <p>
    <?=__('print_cards_body_4')?>
  </p>

  <p>
    <?=__('print_cards_body_5')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';
