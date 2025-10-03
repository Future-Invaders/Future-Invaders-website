<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';     # Core
include_once './../actions/arsenals.act.php'; # Arsenal management
include_once './../actions/cards.act.php';    # Card management
include_once './../lang/cards.lang.php';      # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "arsenal/";
$page_title_en    = "";
$page_title_fr    = "";
$page_description = ", a collection of cards from the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the arsenal's data

// Get the user's language
$lowerlang = string_change_case($lang ,'lowercase');

// Fetch the slug
$arsenal_slug = form_fetch_element('slug', request_type: 'GET');

// Stop here if the slug is empty
if(!$arsenal_slug)
  exit(header("Location: .."));

// Find the corresponding card
$arsenal_data = arsenals_get( arsenal_slug: $arsenal_slug  ,
                              card_list:    true           );

// Stop here if the arsenal wasn't found or is hidden
if(is_null($arsenal_data) || !$arsenal_data || $arsenal_data['hidden'])
  exit(header("Location: .."));

// Update the page summary
$page_url         .= $arsenal_slug;
$page_title_en    .= $arsenal_data['page_title_en'];
$page_title_fr    .= $arsenal_data['page_title_fr'];
$page_description  = $arsenal_data['page_title_en'].$page_description;

// Fetch the extra cards
$arsenal_cards_extra = cards_list(  sort_by:  'extra'                                     ,
                                    search:   array(  'arsenal_id' => $arsenal_data['id'] ,
                                                      'public'     => true                ,
                                                      'is_extra'   => true                ) );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_60 smallpadding_top">

  <div class="flexcontainer card_container padding_bot">

    <div class="align_center" style="flex: 4">
      <img class="card_image" src="./../<?=$arsenal_data['image_path']?>" alt="<?=$arsenal_data['image_name']?>" loading="lazy">
    </div>

    <div style="flex: 1">
      &nbsp;
    </div>

    <div style="flex: 8">
      <div class="black bigspaced tinypadding_top tinypadding_bot">

        <h4 class="uppercase">
          <?=__link('cards/arsenals', $arsenal_data['name'])?>
        </h4>
        <?php if($arsenal_data['release_name']): ?>
        <p class="nopadding_top italics">
          <?=__('arsenal_release', preset_values: array($arsenal_data['release_name']))?>
        </p>
        <?php endif; ?>

        <?php if($arsenal_data['format_name']): ?>
        <div class="flexcontainer padding_top micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('arsenal_format').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=__link('guides/formats#'.$arsenal_data['format_name'], $arsenal_data['format_name'])?>
          </div>
        </div>
        <?php endif; if($arsenal_data['faction_list']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('arsenal_factions', amount: $arsenal_data['nfactions']).__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$arsenal_data['faction_list']?>
          </div>
        </div>
        <? endif; if($arsenal_data['difficulty']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('arsenal_difficulty').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$arsenal_data['diff_name']?>
          </div>
        </div>
        <?php endif; if($arsenal_data['playstyle']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('arsenal_playstyle').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow" style="flex: 3">
            <?=$arsenal_data['playstyle']?>
          </div>
        </div>
        <?php endif; if($arsenal_data['ncards']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('arsenal_card_count').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow bold" style="flex: 3">
            <?=$arsenal_data['ncards']?>
          </div>
        </div>
        <?php endif; if($arsenal_data['nreserves']): ?>
        <div class="flexcontainer micropadding_bot">
          <div class="align_right noflow bold" style="flex: 1">
            <?=__('arsenal_reserves_count').__(':')?>
          </div>
          <div class="align_left smallspaced_left noflow bold" style="flex: 3">
            <?=$arsenal_data['nreserves']?>
          </div>
        </div>
        <?php endif; if($arsenal_data['summary']): ?>
        <p class="padding_top tinypadding_bot">
          <?=$arsenal_data['summary']?>
        </p>
        <?php endif; ?>

      </div>
    </div>

  </div>

  <?php if($arsenal_data['gameplan'] || $arsenal_data['ncards']): ?>
  <div class="padding_top padding_bot">
    <div class="black bigspaced tinypadding_top tinypadding_bot">
      <h5>
        <?=__('arsenal_cards')?>
      </h5>
      <?php if($arsenal_data['gameplan']): ?>
      <p>
        <span class="bold"><?=__('arsenal_gameplan').__(':')?></span><br>
        <?=$arsenal_data['gameplan']?>
      </p>
      <?php endif; if($arsenal_data['cards']['rows']): ?>
      <div class="padding_top padding_bot card_gallery">
        <?php for($i = 0; $i < $arsenal_data['cards']['rows']; $i++): ?>
        <?php for($j = 0; $j < $arsenal_data['cards']['main'][$i]; $j++): ?>
        <div class="card_gallery_cell">
          <a href="./../card/<?=$arsenal_data['cards']['slug'][$i]?>" class="noglow">
            <img class="tinypadding_top" src="<?=$arsenal_data['cards']['thumb'][$i]?>" alt="<?=$arsenal_data['cards']['name'][$i]?>" loading="lazy">
          </a>
        </div>
        <?php endfor; ?>
        <?php endfor; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if($arsenal_data['reserves'] || $arsenal_data['nreserves']): ?>
  <div class="padding_top padding_bot">
    <div class="black bigspaced tinypadding_top tinypadding_bot">
      <h5>
        <?=__('arsenal_reserves')?>
      </h5>
      <?php if($arsenal_data['reserves']): ?>
      <p>
        <span class="bold"><?=__('arsenal_reserves_strat').__(':')?></span><br>
        <?=$arsenal_data['reserves']?>
      </p>
      <?php endif; if($arsenal_data['cards']['rows']): ?>
      <div class="padding_top padding_bot card_gallery">
        <?php for($i = 0; $i < $arsenal_data['cards']['rows']; $i++): ?>
        <?php for($j = 0; $j < $arsenal_data['cards']['reserves'][$i]; $j++): ?>
        <div class="card_gallery_cell">
          <a href="./../card/<?=$arsenal_data['cards']['slug'][$i]?>" class="noglow">
            <img class="tinypadding_top" src="<?=$arsenal_data['cards']['thumb'][$i]?>" alt="<?=$arsenal_data['cards']['name'][$i]?>" loading="lazy">
          </a>
        </div>
        <?php endfor; ?>
        <?php endfor; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if($arsenal_cards_extra['rows']): ?>
  <div class="padding_top padding_bot">
    <div class="black bigspaced tinypadding_top smallpadding_bot">
      <h5>
        <?=__('arsenal_extra')?>
      </h5>
      <div class="card_gallery">
        <?php for($i = 0; $i < $arsenal_cards_extra['rows']; $i++): ?>
        <div class="card_gallery_cell">
          <a href="./../<?=$arsenal_cards_extra[$i]['image_path']?>" class="noglow">
            <img class="tinypadding_top" src="<?=$arsenal_cards_extra[$i]['thumb']?>" alt="<?=$arsenal_cards_extra[$i]['image_name']?>" loading="lazy">
          </a>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if($arsenal_data['tags']['count']): ?>
  <div class="padding_top padding_bot">
    <div class="black bigspaced tinypadding_top smallpadding_bot">
      <h5>
        <?=__('arsenal_tags_title')?>
      </h5>
      <p class="italics tinypadding_top">
        <?=__('arsenal_tags_body')?>
      </span>
      <?php for($i = 0; $i < $arsenal_data['tags']['count']; $i++): ?>
      <p>
        &bullet; <?=__link('cards/arsenals?tag='.$arsenal_data['tags'][$i]['name'], $arsenal_data['tags'][$i]['name'])?><br>
        <?=$arsenal_data['tags'][$i]['description']?>
      </p>
      <?php endfor; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if($arsenal_data['print_'.$lowerlang]): ?>
  <div class="padding_top padding_bot">
    <div class="black bigspaced tinypadding_top smallpadding_bot">
      <h5>
        <?=__('arsenal_print_title')?>
      </h5>
      <p>
        <?=__('arsenal_print_body_1')?>
      </p>
      <ul class="tinypadding_top">
        <li>
          <?=__link('img/print/arsenals/'.$lowerlang.'/'.$arsenal_data['print_'.$lowerlang], __('arsenal_print_cards'), popup: true)?>
        </li>
        <?php if($arsenal_data['printex_'.$lowerlang]): ?>
        <li>
          <?=__link('img/print/arsenals/'.$lowerlang.'/'.$arsenal_data['printex_'.$lowerlang], __('arsenal_print_extra'), popup: true)?>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';