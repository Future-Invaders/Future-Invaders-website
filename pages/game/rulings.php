<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';        # Core
include_once './../../inc/functions_time.inc.php';  # Time management
include_once './../../actions/rulings.act.php';     # Rulings management
include_once './../../actions/cards.act.php';       # Card management
include_once './../../lang/game.lang.php';          # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/rulings";
$page_title_en    = "Rulings";
$page_title_fr    = "Jugements";
$page_description = "Rulings clarifying the rules of the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of rulings

// Fetch the search data
$rulings_search = form_fetch_element('rulings_search', default_value: '');

// Fetch the rulings
$rulings_list = rulings_list( sort_by:  'default'                             ,
                              search:   array( 'search' => $rulings_search  ) );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50 bigpadding_bot">

  <h2>
    <?=__('rulings_list_title')?>
  </h2>

  <p>
    <?=__('rulings_list_body_1')?>
  </p>

  <p>
    <?=__('rulings_list_body_2')?>
  </p>

  <p>
    <?=__('rulings_list_body_3')?>
  </p>

  <p>
    <?=__('rulings_list_body_4')?>
  </p>

  <form method="POST" action="rulings?search">
    <fieldset>
      <div class="padding_top smallpadding_bot">
        <input class="indiv" type="text" id="rulings_search" name="rulings_search" value="<?=$rulings_search?>">
      </div>
      <input type="submit" name="rulings_search_submit" value="<?=__('rulings_search_submit')?>">
    </fieldset>
  </form>

</div>

<hr>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__('rulings_list_global')?>
  </h2>

  <?php for($i = 0; $i < $rulings_list['rows']; $i++): ?>
  <?php if(!$rulings_list[$i]['ncards'] && !$rulings_list[$i]['ntags']): ?>
  <div class="padding_bot">

    <div class="black bigspaced smallpadding_bot">
      <p>
        <span class="bold"><?=__link('pages/ruling/'.$rulings_list[$i]['slug'], $rulings_list[$i]['ftitle'])?></span><br>
        <?php if($rulings_list[$i]['date'] && $rulings_list[$i]['update']): ?>
        <span class="italics"><?=__('ruling_update', preset_values: array($rulings_list[$i]['fdate'], $rulings_list[$i]['fupdate']))?></span>
        <?php elseif($rulings_list[$i]['date']): ?>
        <span class="italics"><?=__('ruling_date', preset_values: array($rulings_list[$i]['fdate']))?></span>
        <?php endif; ?>
      </p>

      <?php if($rulings_list[$i]['situation']): ?>
      <p>
        <span class="bold"><?=__('ruling_situ').__(':')?></span><br>
        <?=$rulings_list[$i]['situation']?><br>
      </p>
      <?php endif; ?>
      <p>
        <span class="bold"><?=__('ruling_ruling').__(':')?></span><br>
        <?=$rulings_list[$i]['ruling']?><br>
      </p>
    </div>

  </div>
  <?php endif; ?>
  <?php endfor; ?>

  <?php if($i === 0): ?>
  <p class="nopadding_top">
    <?=__('rulings_list_none')?>
  </p>
  <?php endif; ?>

</div>

<hr>

<div class="width_50 padding_top">

  <h2>
    <?=__('rulings_list_specific')?>
  </h2>

  <?php for($i = 0; $i < $rulings_list['rows']; $i++): ?>
  <?php if($rulings_list[$i]['ncards'] || $rulings_list[$i]['ntags']): ?>
  <div class="padding_top">

    <div class="black bigspaced smallpadding_bot">
      <p>
        <span class="bold"><?=__link('pages/ruling/'.$rulings_list[$i]['slug'], $rulings_list[$i]['ftitle'])?></span><br>
        <?php if($rulings_list[$i]['date'] && $rulings_list[$i]['update']): ?>
        <span class="italics"><?=__('ruling_update', preset_values: array($rulings_list[$i]['fdate'], $rulings_list[$i]['fupdate']))?></span>
        <?php elseif($rulings_list[$i]['date']): ?>
        <span class="italics"><?=__('ruling_date', preset_values: array($rulings_list[$i]['fdate']))?></span>
        <?php endif; ?>
      </p>

      <?php if($rulings_list[$i]['situation']): ?>
      <p>
        <span class="bold"><?=__('ruling_situ').__(':')?></span><br>
        <?=$rulings_list[$i]['situation']?><br>
      </p>
      <?php endif; ?>
      <p>
        <span class="bold"><?=__('ruling_ruling').__(':')?></span><br>
        <?=$rulings_list[$i]['ruling']?><br>
      </p>

      <p class="bold padding_top tinypadding_bot">
        <?=__('ruling_list_applies').__(':')?>
      </p>
      <ul>
        <?php if($rulings_list[$i]['tags']): ?>
        <?=$rulings_list[$i]['ltags']?>
        <?php endif; if($rulings_list[$i]['cards']): ?>
        <?=$rulings_list[$i]['lcards']?>
        <?php endif; ?>
      </ul>

      </div>
  </div>
  <?php endif; ?>
  <?php endfor; ?>

  <?php if($i === 0): ?>
  <p class="padding_top">
    <?=__('rulings_list_none')?>
  </p>
  <?php endif; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';