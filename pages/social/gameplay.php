<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/gameplay";
$page_title_en    = "Media";
$page_title_fr    = "Média";
$page_description = "Pictures and videos of the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2 class="align_center">
    <?=__('gameplay_pictures_title')?>
  </h2>

  <div class="gallery bigpadding_top padding_bot">
    <?php for($i = 1; $i <= 6; $i++): ?>
    <div class="gallery_cell">
      <a href="./../../img/gameplay/gameplay_<?=$i?>.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/gameplay/gameplay_<?=$i?>.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <?php endfor; ?>
  </div>

  <h2 class="align_center padding_top">
    <?=__('gameplay_cards_title')?>
  </h2>

  <div class="gallery bigpadding_top bigpadding_bot">
    <?php if($lang === 'EN'): ?>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/light_cruiser.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/light_cruiser.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/rustwing.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/rustwing.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/planet_destroyer.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/planet_destroyer.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/plasmasteel_cannon.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/plasmasteel_cannon.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/black_hole.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/black_hole.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/hatch.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/hatch.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell desktop">
      <a href="./../../img/thumbnails/cards/en/scrap_shot.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/scrap_shot.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/fake_intel.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/fake_intel.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/en/mutually_assured_destruction.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/en/mutually_assured_destruction.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <?php else: ?>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/croiseur_leger.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/croiseur_leger.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/ecraseur.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/ecraseur.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/destructeur_de_planetes.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/destructeur_de_planetes.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/canon_en_plasmacier.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/canon_en_plasmacier.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/trou_noir.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/trou_noir.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/eclosion.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/eclosion.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell desktop">
      <a href="./../../img/thumbnails/cards/fr/tir_de_ferraille.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/tir_de_ferraille.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/infox.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/infox.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <div class="gallery_cell">
      <a href="./../../img/thumbnails/cards/fr/destruction_mutuellement_assuree.png" class="noglow">
        <img class="tinypadding_top" src="./../../img/cards/fr/destruction_mutuellement_assuree.png" alt="<?=__('futureinvaders')?>" loading="lazy">
      </a>
    </div>
    <?php endif; ?>
  </div>

  <h2 class="align_center padding_bot padding_top">
    <?=__('gameplay_videos_title')?>
  </h2>

  <p>
    <?=__('gameplay_videos_body_1')?>
  </p>

  <p class="padding_bot">
    <?=__('gameplay_videos_body_2')?>
  </p>

  <div class="align_center padding_top padding_bot">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/O-YbEDV-n7M?si=LuBjGolSSSJMKkfX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>

  <div class="align_center padding_top padding_bot">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/aNww-8WESXA?si=mnnLTZkoOo4z7Uej" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>

  <div class="align_center padding_top">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/lX7wSCas6yU?si=G4bpgCpJ3BuVKr_7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';