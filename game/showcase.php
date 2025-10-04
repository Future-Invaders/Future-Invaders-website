<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';  # Core
include_once './../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "game/showcase";
$page_title_en    = "Showcase";
$page_title_fr    = "Galerie";
$page_description = "Pictures and videos of the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/banners/banner_pictures.png" alt="<?=__('menu_pictures')?>">
    </a>
  </div>

  <h2 class="align_center">
    <?=__('gameplay_pictures_title')?>
  </h2>

  <div class="gallery bigpadding_top padding_bot">
    <div class="gallery_cell">
      <a href="./../img/gameplay/gameplay_1.png" class="noglow">
        <img class="tinypadding_top" src="./../img/gameplay/gameplay_1.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/gameplay/gameplay_3.png" class="noglow">
        <img class="tinypadding_top" src="./../img/gameplay/gameplay_3.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/gameplay/gameplay_9.png" class="noglow">
        <img class="tinypadding_top" src="./../img/gameplay/gameplay_9.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/gameplay/gameplay_8.png" class="noglow">
        <img class="tinypadding_top" src="./../img/gameplay/gameplay_8.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/gameplay/gameplay_7.png" class="noglow">
        <img class="tinypadding_top" src="./../img/gameplay/gameplay_7.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/gameplay/gameplay_4.png" class="noglow">
        <img class="tinypadding_top" src="./../img/gameplay/gameplay_4.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
  </div>

  <h2 class="align_center padding_top">
    <?=__('gameplay_cards_title')?>
  </h2>

  <div class="gallery bigpadding_top bigpadding_bot">
    <div class="gallery_cell">
      <a href="<?=$path?>card/rustwing" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/rustwing.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/rafiot_rouille.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/escapepod" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/escape_pod.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/capsule_de_sauvetage.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/planetdestroyer" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/planet_destroyer.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/destructeur_de_planetes.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/controlstation" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/control_station.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/station_de_controle.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/darkwavegenerator" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/dark_wave_generator.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/generateur_d_ondes_sombres.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/ringstation" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/ring_station.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/station_en_anneau.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/misdirection" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/misdirection.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/desorientation.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/omegaprotocol" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/omega_protocol.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/directive_omega.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/alternatetimeline" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/alternate_timeline.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/chronologie_alteree.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/friendlywinds" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/friendly_winds.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/vents_favorables.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/sabotage" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/sabotage.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/sabotage.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
    <div class="gallery_cell">
      <a href="<?=$path?>card/mutuallyassureddestruction" class="noglow">
        <?php if($lang === 'EN'): ?>
        <img class="tinypadding_top" src="./../img/cards/en/mutually_assured_destruction.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php else: ?>
        <img class="tinypadding_top" src="./../img/cards/fr/destruction_mutuelle_assuree.png" alt="<?=__('futureinvaders')?>" loading="lazy">
        <?php endif; ?>
      </a>
    </div>
  </div>

  <h2 class="align_center bigpadding_bot padding_top" id="videos">
    <?=__('gameplay_videos_title')?>
  </h2>

  <p>
    <?=__('gameplay_videos_game_body_1')?>
  </p>

  <p class="padding_bot">
    <?=__('gameplay_videos_game_body_2')?>
  </p>

  <h2 class="align_center bigpadding_bot bigpadding_top" id="videos">
    <?=__('gameplay_art_title')?>
  </h2>

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