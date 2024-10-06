<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/rules";
$page_title_en    = "Rules";
$page_title_fr    = "Règles";
$page_description = "Rules of the strategy sci-fi card battling game Future Invaders";

// Prepare the correct language string
$card_lang = string_change_case($lang, 'lowercase');



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('rules_title')?>
  </h2>

  <p>
    <?=__('rules_body_1')?>
  </p>

  <p>
    <?=__('rules_body_2')?>
  </p>

</div>

<div class="width_70 hugepadding_top">

  <div class="gallery padding_top padding_bot">

    <?php for($i = 1; file_exists("./../../img/rules/rules_".$card_lang."_".$i.".png"); $i++): ?>

    <div class="gallery_cell">
      <a href="./../../img/rules/rules_<?=$card_lang?>_<?=$i?>.png">
        <img src="./../../img/rules/rules_<?=$card_lang?>_<?=$i?>.png" alt="<?=__('rules_cards_alt', spaces_after: 1).$i?>">
      </a>
    </div>

    <?php endfor; ?>

  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';