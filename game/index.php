<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "game/index";
$page_title_en    = "Future Invaders";
$page_title_fr    = "Future Invaders";
$page_description = "Future Invaders, a sci-fi card battling game overflowing with strategic depth";

// Select the menu entry
$menu_game_selected = true;




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_40">

  <div>
    <a href="<?=$path?>">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_main')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_main.png" alt="<?=__('menu_main')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>game/updates">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_updates')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_updates.png" alt="<?=__('menu_updates')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>game/showcase">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_pictures')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_pictures.png" alt="<?=__('menu_pictures')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>game/features">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_features')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_features.png" alt="<?=__('menu_features')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>game/gdd">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_designdoc')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_designdoc.png" alt="<?=__('menu_designdoc')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>game/publish">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_publish')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_publish.png" alt="<?=__('menu_publish')?>">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';