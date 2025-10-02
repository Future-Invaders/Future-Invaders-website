<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php'; # Core

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/guides/index";
$page_title_en    = "Future Invaders";
$page_title_fr    = "Future Invaders";
$page_description = "Future Invaders, a sci-fi card battling game overflowing with strategic depth";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_40">

  <div>
    <a href="<?=$path?>pages/game/intro">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_howtoplay')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_howtoplay.png" alt="<?=__('menu_howtoplay')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/game/rules">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_rules')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_rules.png" alt="<?=__('menu_rules')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/game/lore">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_lore')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_lore.png" alt="<?=__('menu_lore')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/game/formats">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_formats')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_formats.png" alt="<?=__('menu_formats')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/game/vocabulary">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_definitions')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_definitions.png" alt="<?=__('menu_definitions')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/game/strategies">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_strategies')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_strategies.png" alt="<?=__('menu_strategies')?>">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';