<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "social/links";
$page_title_en    = "Social media";
$page_title_fr    = "Médias sociaux";
$page_description = "Official social media links for the tactical sci-fi card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>social">
      <img src="<?=$path?>img/banners/banner_socialmedia.png" alt="<?=__('menu_socialmedia')?>">
    </a>
  </div>

  <h2>
    <?=__('social_media_title')?>
  </h2>

  <p>
    <?=__('social_media_body_1')?>
  </p>

  <p class="smallpadding_bot">
    <?=__('social_media_body_2')?>
  </p>

  <div class="bigpadding_top smallpadding_bot">
    <a href="https://bsky.app/profile/futureinvaders.com" target="_blank">
      <img src="./../img/social/bluesky.png" alt="Bluesky" title="Bluesky">
    </a>
  </div>

  <h2 class="bigpadding_top">
    <?=__('social_youtube_title')?>
  </h2>

  <p>
    <?=__('social_youtube_body')?>
  </p>

  <div class="bigpadding_top smallpadding_bot">
    <a href="https://www.youtube.com/@FutureInvaders" target="_blank">
      <img src="./../img/social/youtube.png" alt="YouTube" title="YouTube">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';