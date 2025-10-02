<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';      # Core
include_once './../../actions/arsenals.act.php';  # Arsenal management
include_once './../../actions/cards.act.php';     # Card management
include_once './../../actions/factions.act.php';  # Faction management
include_once './../../actions/tags.act.php';      # Tag management
include_once './../../lang/game.lang.php';        # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/game/arsenals";
$page_title_en    = "Arsenal list";
$page_title_fr    = "Liste des arsenaux";
$page_description = "List of all arsenals (decks of cards) in the strategy sci-fi card battling game Future Invaders";

// Extra CSS
$css = array('game');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of arsenals

// Fetch the search data
$cards_search_tag    = form_fetch_element('tag', request_type: 'GET');
$cards_search_format = form_fetch_element('format', request_type: 'GET');

// Fetch the arsenals
$arsenals_list = arsenals_list( sort_by: 'default'                                      ,
                                search:   array(  'public'    => true                   ,
                                                  'tag'       => $cards_search_tag      ,
                                                  'format_en' => $cards_search_format ) );

// Fetch the tag description if necessary
if($cards_search_tag)
  $tag_details = tags_get( tag_name: $cards_search_tag );




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_60">

  <div class="bigpadding_bot">
    <a href="<?=$path?>pages/cards">
      <img src="<?=$path?>img/banners/banner_arsenals.png" alt="<?=__('menu_arsenals')?>">
    </a>
  </div>

  <h2>
    <?=__('arsenal_list_title')?>
  </h2>

  <p class="padding_bot">
    <?=__('arsenal_list_body')?>
  </p>

  <?php if($cards_search_tag): ?>
  <div class="smallpadding_top">
    <h5>
      <?=__('arsenal_list_count', preset_values: array($arsenals_list['rows']), amount: $arsenals_list['rows']).__('arsenal_list_count_tags', preset_values: array($cards_search_tag))?>
    </h5>
    <?php if($tag_details): ?>
    <p class="tinypadding_top italics">
      <?=$tag_details['desc']?>
    </p>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <?php if($cards_search_format && !$cards_search_tag): ?>
  <div class="smallpadding_top">
    <h5>
      <?=__('arsenal_list_count', preset_values: array($arsenals_list['rows']), amount: $arsenals_list['rows']).__('arsenal_list_count_form', preset_values: array($cards_search_format))?>
    </h5>
  </div>
  <?php endif; ?>

  <div class="padding_top">
    <?php for($i = 0; $i < $arsenals_list['rows']; $i++): ?>
    <div class="flexcontainer card_container padding_bot padding_top">

      <div class="align_center" style="flex: 4">
        <a href="./../../pages/arsenal/<?=$arsenals_list[$i]['slug']?>" class="noglow">
          <img class="card_image" src="<?=$arsenals_list[$i]['thumb']?>" alt="<?=$arsenals_list[$i]['image_name']?>" loading="lazy">
        </a>
      </div>

      <div style="flex: 1">
        &nbsp;
      </div>

      <div style="flex: 8">
        <div class="black bigspaced tinypadding_top tinypadding_bot">

          <h4 class="uppercase">
            <?=__link('pages/arsenal/'.$arsenals_list[$i]['slug'], $arsenals_list[$i]['fname'])?>
          </h4>
          <?php if($arsenals_list[$i]['release']): ?>
          <p class="nopadding_top italics">
            <?=__('arsenal_release', preset_values: array($arsenals_list[$i]['release']))?>
          </p>
          <?php endif; ?>

          <?php if($arsenals_list[$i]['format']): ?>
          <div class="flexcontainer padding_top micropadding_bot">
            <div class="align_right noflow bold" style="flex: 1">
              <?=__('arsenal_format').__(':')?>
            </div>
            <div class="align_left smallspaced_left noflow" style="flex: 3">
              <?=__link('pages/game/formats#'.$arsenals_list[$i]['format'], $arsenals_list[$i]['format'])?>
            </div>
          </div>
          <?php endif; if($arsenals_list[$i]['faction_names']): ?>
          <div class="flexcontainer micropadding_bot">
            <div class="align_right noflow bold" style="flex: 1">
              <?=__('arsenal_factions', amount: $arsenals_list[$i]['nfactions']).__(':')?>
            </div>
            <div class="align_left smallspaced_left noflow" style="flex: 3">
              <?=$arsenals_list[$i]['faction_names']?>
            </div>
          </div>
          <? endif; if($arsenals_list[$i]['difficulty']): ?>
          <div class="flexcontainer micropadding_bot">
            <div class="align_right noflow bold" style="flex: 1">
              <?=__('arsenal_difficulty').__(':')?>
            </div>
            <div class="align_left smallspaced_left noflow" style="flex: 3">
              <?=$arsenals_list[$i]['difficulty']?>
            </div>
          </div>
          <?php endif; if($arsenals_list[$i]['fplaystyle']): ?>
          <div class="flexcontainer micropadding_bot">
            <div class="align_right noflow bold" style="flex: 1">
              <?=__('arsenal_playstyle').__(':')?>
            </div>
            <div class="align_left smallspaced_left noflow" style="flex: 3">
              <?=$arsenals_list[$i]['fplaystyle']?>
            </div>
          </div>
          <?php endif; if($arsenals_list[$i]['cards_main']): ?>
          <div class="flexcontainer micropadding_bot">
            <div class="align_right noflow bold" style="flex: 1">
              <?=__('arsenal_card_count').__(':')?>
            </div>
            <div class="align_left smallspaced_left noflow bold" style="flex: 3">
              <?=$arsenals_list[$i]['cards_main']?>
            </div>
          </div>
          <?php endif; if($arsenals_list[$i]['cards_reserves']): ?>
          <div class="flexcontainer micropadding_bot">
            <div class="align_right noflow bold" style="flex: 1">
              <?=__('arsenal_reserves_count').__(':')?>
            </div>
            <div class="align_left smallspaced_left noflow bold" style="flex: 3">
              <?=$arsenals_list[$i]['cards_reserves']?>
            </div>
          </div>
          <?php endif; if($arsenals_list[$i]['fsummary']): ?>
          <p class="padding_top tinypadding_bot">
            <?=$arsenals_list[$i]['fsummary']?>
          </p>
          <?php endif; ?>

        </div>
      </div>

    </div>
    <?php endfor; ?>
  </div>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';