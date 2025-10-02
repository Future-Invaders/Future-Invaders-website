<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php'; # Core

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/index";
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
    <a href="<?=$path?>pages/social/links">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_socialmedia')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_socialmedia.png" alt="<?=__('menu_socialmedia')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/discord">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_discord')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_discord.png" alt="<?=__('menu_discord')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/irc">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_irc')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_irc.png" alt="<?=__('menu_irc')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/coc">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_coc')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_coc.png" alt="<?=__('menu_coc')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/contact">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_contactinfo')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_contactinfo.png" alt="<?=__('menu_contactinfo')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/feedback">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_feedback')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_feedback.png" alt="<?=__('menu_feedback')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/help">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_helpus')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_helpus.png" alt="<?=__('menu_helpus')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/credits">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_credits')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_credits.png" alt="<?=__('menu_credits')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/copyright">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_copyright')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_copyright.png" alt="<?=__('menu_copyright')?>">
    </a>
  </div>

  <div class="bigpadding_top">
    <a href="<?=$path?>pages/social/legal">
      <h2 class="tinypadding_bot tinypadding_top spaced black align_center uppercase">
        <?=__('menu_legal')?>
      </h2>
      <img src="<?=$path?>img/banners/banner_legal.png" alt="<?=__('menu_legal')?>">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';