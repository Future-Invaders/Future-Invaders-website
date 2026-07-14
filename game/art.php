<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "game/art";
$page_title_en    = "Illustrations";
$page_title_fr    = "Illustrations";
$page_description = "The art of the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/banners/banner_art.png" alt="<?=__('menu_art')?>">
    </a>
  </div>

  <h2 class="align_left smallpadding_bot smallpadding_top" id="videos">
    <?=__('art_showcase_title')?>
  </h2>

  <p>
    <?=__('art_showcase_body_1')?>
  </p>

  <p>
    <?=__('art_showcase_body_2')?>
  </p>

  <p>
    <?=__('art_showcase_body_3')?>
  </p>

  <p class="bigpadding_bot">
    <?=__('art_showcase_body_4')?>
  </p>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/consortiumheadquarters.png">
      <img src="<?=$path?>img/showcase/consortiumheadquarters.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/malfunction.png">
      <img src="<?=$path?>img/showcase/malfunction.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/retaliationmodule.png">
      <img src="<?=$path?>img/showcase/retaliationmodule.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/mind.png">
      <img src="<?=$path?>img/showcase/mind.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/energybomb.png">
      <img src="<?=$path?>img/showcase/energybomb.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/digest.png">
      <img src="<?=$path?>img/showcase/digest.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/negativefield.png">
      <img src="<?=$path?>img/showcase/negativefield.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/jumperbehemoth.png">
      <img src="<?=$path?>img/showcase/jumperbehemoth.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

  <div class="smallpadding_top">
    <a href="<?=$path?>img/showcase/empoweredstrike.png">
      <img src="<?=$path?>img/showcase/empoweredstrike.png" alt="<?=__('gameplay_art_title')?>">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';