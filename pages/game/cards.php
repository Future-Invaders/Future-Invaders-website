<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/cards.act.php'; # Card management
include_once './../../lang/game.lang.php';    # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/cards";
$page_title_en    = "Card list";
$page_title_fr    = "Liste des cartes";
$page_description = "List of all cards in the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of cards

// Assemble the search data
$cards_sort   = 'default';
$cards_search = array(  'public'        => true ,
                        'is_not_extra'  => true );

// Look up the cards
$card_list = cards_list(  sort_by:  $cards_sort   ,
                          search:   $cards_search );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_60 smallpadding_top">

  <h2>
    <?=__('card_list_title')?>
  </h2>

  <p>
    <?=__('card_list_body')?>
  </p>

  <div class="bigpadding_top padding_bot">
    <div class="black bigspaced tinypadding_top smallpadding_bot">
      <h5>
        <?=__('card_list_count', preset_values: array($card_list['rows']), amount: $card_list['rows'])?>
      </h5>
      <div class="card_gallery">
        <?php for($i = 0; $i < $card_list['rows']; $i++): ?>
        <div class="card_gallery_cell">
          <a href="./../../pages/card/<?=$card_list[$i]['slug']?>" class="noglow">
            <img class="tinypadding_top" src="<?=$card_list[$i]['thumb']?>" alt="<?=$card_list[$i]['image_name']?>" loading="lazy">
          </a>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';