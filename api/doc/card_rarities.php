<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/api.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "api/doc/card_rarities";
$page_title_en    = "API: Card rarities";
$page_title_fr    = "API : Raretés de cartes";
$page_description = "Future Invaders' API allows you to interact with the website without using a browser.";

// API doc menu selection
$api_menu['card_rarities'] = true;

// Extra CSS & JS
$css  = array('api');
$js   = array('api/doc');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()) { /*******/ include './../../inc/header.inc.php'; /*******/ include './menu.php'; ?>

<div class="width_50 padding_top bigpadding_bot">

  <h1>
    <?=__('api')?>
  </h1>

  <h4>
    <?=__('api_menu_card_rarities')?>
  </h4>

  <p>
    <?=__('api_card_rarities_intro')?>
  </p>

  <ul class="tinypadding_top">
    <li><?=__link('#list_card_rarities', 'GET /api/card_rarities', is_internal: false)?></li>
  </ul>

</div>

<hr id="list_card_rarities">

<div class="width_50 padding_top">

  <h4>
    GET /api/card_rarities
  </h4>

  <p>
    <?=__('api_card_rarities_list_summary')?>
  </p>

  <h6 class="bigpadding_top">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">language</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_releases_list_language')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "card_rarities": [
    {
      "uuid": string,
      "name": string,
      "max_count": int
    },
  ]
}</pre>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*****************************************************************************/ include './../../inc/footer.inc.php'; }