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
$page_title_en    = "Media";
$page_title_fr    = "Média";
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
    <?php if($lang === 'EN'): ?>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/light_cruiser.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/light_cruiser.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/rustwing.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/rustwing.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/planet_destroyer.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/planet_destroyer.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/plasmasteel_cannon.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/plasmasteel_cannon.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/black_hole.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/black_hole.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/hatch.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/hatch.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell desktop">
      <a href="./../img/thumbnails/cards/en/misdirection.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/misdirection.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/swap_places.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/swap_places.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/en/mutually_assured_destruction.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/en/mutually_assured_destruction.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <?php else: ?>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/croiseur_leger.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/croiseur_leger.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/rafiot_rouille.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/rafiot_rouille.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/destructeur_de_planetes.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/destructeur_de_planetes.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/canon_en_plasmacier.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/canon_en_plasmacier.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/trou_noir.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/trou_noir.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/eclosion.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/eclosion.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell desktop">
      <a href="./../img/thumbnails/cards/fr/desorientation.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/desorientation.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/echange.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/echange.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../img/thumbnails/cards/fr/destruction_mutuelle_assuree.png" class="noglow">
        <img class="tinypadding_top" src="./../img/cards/fr/destruction_mutuelle_assuree.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <?php endif; ?>
  </div>

  <h2 class="align_center padding_bot padding_top" id="videos">
    <?=__('gameplay_videos_title')?>
  </h2>

  <p>
    <?=__('gameplay_videos_game_body_1')?>
  </p>

  <p class="padding_bot">
    <?=__('gameplay_videos_game_body_2')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';