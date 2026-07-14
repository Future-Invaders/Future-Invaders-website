<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php'; # Core

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "tools/index";
$page_title_en    = "Future Invaders";
$page_title_fr    = "Future Invaders";
$page_description = "Future Invaders, a sci-fi card battling game overflowing with strategic depth";

// Select the menu entry
$menu_tools_selected = true;




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_40">

  <div>
    <a href="<?=$path?>tools/print">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_print')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_print.png" alt="<?=__('menu_print')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>tools/tts">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_tts')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_tts.png" alt="<?=__('menu_tts')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>tools/gdd">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_designdoc')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_designdoc.png" alt="<?=__('menu_designdoc')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>tools/source">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_source')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_source.png" alt="<?=__('menu_source')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>api/doc/intro">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_api')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_api.png" alt="<?=__('menu_api')?>">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';