<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';      # Core
include_once './../../actions/formats.act.php';   # Formats management
include_once './../../lang/game.lang.php';        # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/formats";
$page_title_en    = "Game formats";
$page_title_fr    = "Formats de jeu";
$page_description = "Game formats and variations of the rules in the strategy sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of game formats

$formats_list = formats_list();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_40 bigpadding_bot">

  <h2>
    <?=__('formats_title')?>
  </h2>

  <p class="padding_bot">
    <?=__('formats_body')?>
  </p>

  <?php for($i = 0; $i < $formats_list['rows']; $i++): ?>
  <div class="bigpadding_top padding_bot">
    <h4 class="uppercase underlined">
      <?=$formats_list[$i]['name']?>
    </h4>
    <p>
      <?=$formats_list[$i]['desc_raw']?>
    </p>
  </div>
  <?php endfor; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';