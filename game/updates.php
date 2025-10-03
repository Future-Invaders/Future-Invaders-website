<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';       # Core
include_once './../inc/functions_time.inc.php'; # Time management
include_once './../actions/updates.act.php';    # Updates management
include_once './../lang/game.lang.php';         # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "game/updates";
$page_title_en    = "Game updates";
$page_title_fr    = "Mises à jour du jeu";
$page_description = "Updates on the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch a list of all updates

$updates_list = updates_list();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>game">
      <img src="<?=$path?>img/banners/banner_updates.png" alt="<?=__('menu_updates')?>">
    </a>
  </div>

  <h2 class="padding_bot">
    <?=__('updates_title')?>
  </h2>

  <?php for($i = 0; $i < $updates_list['rows']; $i++): ?>
    <div class="padding_top smallpadding_bot">
      <div class="black bigspaced smallpadding_top smallpadding_bot">

        <h5>
          <?=$updates_list[$i]['ftitle']?>
        </h5>
        <p class="italics tinypadding_top">
          <?=$updates_list[$i]['date']?> (<?=$updates_list[$i]['date_since']?>)
        </p>

        <p>
          <?=$updates_list[$i]['body']?>
        </p>

      </div>
    </div>
  <?php endfor; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';