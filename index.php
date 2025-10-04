<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './inc/includes.inc.php';  # Core
include_once './lang/main.lang.php'; # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "index";
$page_description = "Future Invaders, a sci-fi card battling game overflowing with strategic depth";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/**********************************************************************************/ include './inc/header.inc.php'; ?>

<div class="width_50">

  <div class="align_center padding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/website/title_banner.png" alt="Future Invaders">
    </a>
  </div>

  <h1 class="padding_top">
    <?=__('home_intro_title')?>
  </h1>

  <h5>
    <?=__('home_intro_subtitle')?>
  </h5>

  <div class="floater float_right float_noborder">
    <img src="<?=$path?>img/website/consortium.png" alt="Consortium headquarters">
  </div>

  <p>
    <?=__('home_intro_1')?>
  </p>

  <p>
    <?=__('home_intro_2')?>
  </p>

  <p>
    <?=__('home_intro_3')?>
  </p>

  <p>
    <?=__('home_intro_4')?>
  </p>

  <div class="align_center hugepadding_top">
    <a href="<?=$path?>img/gameplay/gameplay_1.png">
      <img src="<?=$path?>img/gameplay/gameplay_1.png" alt="Gameplay">
    </a>
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_summary_title')?>
  </h4>

  <div class="floater float_right float_noborder float_above float_small">
    <a href="card/malfunction">
      <?php if($lang == 'EN'): ?>
        <img src="<?=$path?>img/cards/en/malfunction.png" alt="Card">
      <?php else: ?>
        <img src="<?=$path?>img/cards/fr/defaillance.png" alt="Carte">
      <?php endif; ?>
    </a>
  </div>

  <p>
    <?=__('home_summary_body_1')?>
  </p>

  <p>
    <?=__('home_summary_body_2')?>
  </p>

  <p>
    <?=__('home_summary_body_3')?>
  </p>

  <p>
    <?=__('home_summary_body_4')?>
  </p>

  <p>
    <?=__('home_summary_body_5')?>
  </p>

  <div class="align_center hugepadding_top">
    <a href="<?=$path?>img/gameplay/gameplay_6.png">
      <img src="<?=$path?>img/gameplay/gameplay_6.png" alt="Gameplay">
    </a>
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_special_title')?>
  </h4>

  <div class="floater float_right float_noborder float_above float_small">
    <a href="card/jumperbehemoth">
      <?php if($lang == 'EN'): ?>
        <img src="<?=$path?>img/cards/en/jumper_behemoth.png" alt="Card">
      <?php else: ?>
        <img src="<?=$path?>img/cards/fr/behemoth_phaseur.png" alt="Carte">
      <?php endif; ?>
    </a>
  </div>

  <p>
    <?=__('home_special_body_1')?>
  </p>

  <p>
    <?=__('home_special_body_2')?>
  </p>

  <p>
    <?=__('home_special_body_3')?>
  </p>

  <p>
    <?=__('home_special_body_4')?>
  </p>

  <p>
    <?=__('home_special_body_5')?>
  </p>

  <div class="align_center hugepadding_top">
    <a href="<?=$path?>img/gameplay/gameplay_3.png">
      <img src="<?=$path?>img/gameplay/gameplay_3.png" alt="Gameplay">
    </a>
  </div>

  <div class="floater float_right float_noborder float_above float_small desktop">
    <a href="card/bluff">
      <?php if($lang == 'EN'): ?>
        <img src="<?=$path?>img/cards/en/bluff.png" alt="Card">
      <?php else: ?>
        <img src="<?=$path?>img/cards/fr/bluff.png" alt="Carte">
      <?php endif; ?>
    </a>
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_play_title')?>
  </h4>

  <p>
    <?=__('home_play_body_1')?>
  </p>

  <p>
    <?=__('home_play_body_2')?>
  </p>

  <p>
    <?=__('home_play_body_3')?>
  </p>

  <p>
    <?=__('home_play_body_4')?>
  </p>

  <p>
    <?=__('home_play_body_5')?>
  </p>

  <div class="align_center hugepadding_top">
    <a href="<?=$path?>img/gameplay/gameplay_5.png">
      <img src="<?=$path?>img/gameplay/gameplay_5.png" alt="Gameplay">
    </a>
  </div>

  <div class="floater float_right float_noborder float_above float_small desktop">
    <a href="card/neuronalnexus">
      <?php if($lang == 'EN'): ?>
        <img src="<?=$path?>img/cards/en/neuronal_nexus.png" alt="Card">
      <?php else: ?>
        <img src="<?=$path?>img/cards/fr/nexus_neuronal.png" alt="Carte">
      <?php endif; ?>
    </a>
  </div>

  <h4 class="hugepadding_top">
    <?=__('home_community_title')?>
  </h4>

  <p>
    <?=__('home_community_body_1')?>
  </p>

  <p>
    <?=__('home_community_body_2')?>
  </p>

  <p>
    <?=__('home_community_body_3')?>
  </p>

  <div class="align_center hugepadding_top">
    <a href="<?=$path?>img/gameplay/gameplay_9.png">
      <img src="<?=$path?>img/gameplay/gameplay_9.png" alt="Gameplay">
    </a>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*************************************************************************************/ include './inc/footer.inc.php';