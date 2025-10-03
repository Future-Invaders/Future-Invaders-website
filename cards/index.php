<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php'; # Core

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "cards/index";
$page_title_en    = "Future Invaders";
$page_title_fr    = "Future Invaders";
$page_description = "Future Invaders, a sci-fi card battling game overflowing with strategic depth";

// Select the menu entry
$menu_cards_selected = true;




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_40">

  <div>
    <a href="<?=$path?>cards/list">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_cards')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_cards.png" alt="<?=__('menu_cards')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>cards/arsenals">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_arsenals')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_arsenals.png" alt="<?=__('menu_arsenals')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>cards/rulings">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_rulings')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_rulings.png" alt="<?=__('menu_rulings')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>cards/print_cards">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_printcards')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_printcards.png" alt="<?=__('menu_printcards')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>cards/print_arsenals">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_printarsenals')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_printarsenals.png" alt="<?=__('menu_printarsenals')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>cards/print_extra">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_printextra')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_printextra.png" alt="<?=__('menu_printextra')?>">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';