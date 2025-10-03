<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';    # Core
include_once './../actions/rulings.act.php'; # Ruling management
include_once './../lang/cards.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "ruling/";
$page_title_en    = "";
$page_title_fr    = "";
$page_description = "Future Invaders ruling: ";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the runling's data

// Fetch the slug
$ruling_slug = form_fetch_element('slug', request_type: 'GET');

// Stop here if the slug is empty
if(!$ruling_slug)
  exit(header("Location: .."));

// Find the corresponding ruling
$ruling_data = rulings_get( ruling_slug: $ruling_slug );

// Stop here if the ruling wasn't found
if(is_null($ruling_data) || !$ruling_data)
  exit(header("Location: .."));

// Update the page summary
$page_url         .= $ruling_slug;
$page_title_en    .= $ruling_data['pagetitle_en'];
$page_title_fr    .= $ruling_data['pagetitle_fr'];
$page_description .= $ruling_data['pagetitle_en'];




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50 smallpadding_top">

  <h2>
    <?=__link('cards/rulings', __('ruling_title'))?>
  </h2>
  <p class="italics tinypadding_top bigpadding_bot">
    <?=__('ruling_body')?>
  </p>

  <div class="black bigspaced smallpadding_bot">
    <p>
      <span class="bold"><?=$ruling_data['title']?></span><br>
      <?php if($ruling_data['date'] && $ruling_data['update']): ?>
      <span class="italics"><?=__('ruling_update', preset_values: array($ruling_data['fdate'], $ruling_data['fupdate']))?></span>
      <?php elseif($ruling_data['date']): ?>
      <span class="italics"><?=__('ruling_date', preset_values: array($ruling_data['fdate']))?></span>
      <?php endif; ?>
    </p>
    <?php if($ruling_data['situation']): ?>
    <p>
      <span class="bold"><?=__('ruling_situ').__(':')?></span><br>
      <?=$ruling_data['situation']?><br>
    </p>
    <?php endif; ?>
    <p>
      <span class="bold"><?=__('ruling_ruling').__(':')?></span><br>
      <?=$ruling_data['ruling']?><br>
    </p>
  </div>

  <?php if($ruling_data['tags']['rows']): ?>
  <div class="bigpadding_top">
    <div class="black bigspaced smallpadding_top smallpadding_bot">
      <h5>
        <?=__('ruling_tags')?>
      </h5>
      <p class="italics tinypadding_top">
        <?=__('ruling_tags_body')?>
      </p>
      <?php for($i = 0; $i < $ruling_data['tags']['rows']; $i++): ?>
      <p>
        &bullet; <?=__link('cards/list?tag='.$ruling_data['tags']['name'][$i], $ruling_data['tags']['name'][$i])?><br>
        <?=$ruling_data['tags']['description'][$i]?>
      </p>
      <?php endfor; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if($ruling_data['cards']['rows']): ?>
  <div class="bigpadding_top">
    <div class="black bigspaced smallpadding_top smallpadding_bot">
      <h5>
        <?=__('ruling_cards')?>
      </h5>
      <p class="italics tinypadding_top tinypadding_bot">
        <?=__('ruling_cards_body')?>
      </p>
      <?php for($i = 0; $i < $ruling_data['cards']['rows']; $i++): ?>
      <p class="tinypadding_top">
        &bullet; <?=__link('card/'.$ruling_data['cards']['slug'][$i], $ruling_data['cards']['name'][$i])?><br>
      </p>
      <?php endfor; ?>
    </div>
  </div>
  <?php endif; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';