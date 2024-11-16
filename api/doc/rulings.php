<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/api.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "api/doc/rulings";
$page_title_en    = "API: Rulings";
$page_title_fr    = "API : Jugements";
$page_description = "Future Invaders' API allows you to interact with the website without using a browser.";

// API doc menu selection
$api_menu['rulings'] = true;

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
    <?=__('api_menu_rulings')?>
  </h4>

  <p>
    <?=__('api_rulings_intro')?>
  </p>

  <ul class="tinypadding_top">
    <li><?=__link('#list_rulings', 'GET /api/rulings', is_internal: false)?></li>
  </ul>

</div>

<hr id="list_rulings">

<div class="width_50 padding_top">

  <h4>
    GET /api/rulings
  </h4>

  <p>
    <?=__('api_rulings_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">title</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_rulings_list_title')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">body</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_rulings_list_body')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">card</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_rulings_list_card')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">tag</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_rulings_list_tag')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "rulings": [
    {
      "uuid": string,
      "endpoint": string,
      "url": string,
      "date": {
        "ruling_made": string,
        "last_updated": string
      },
      "title": {
        "en": string,
        "fr": string,
      },
      "situation": {
        "en": string,
        "fr": string,
      },
      "ruling": {
        "en": string,
        "fr": string,
      },
      "cards": {
        "uuids": [
          "uuid1",
          "uuid2",
          ...
        ],
        "names": {
          "en": [
            "card1",
            "card2",
            ...
          ],
          "fr": [
            "card1",
            "card2",
            ...
          ]
        }
      },
      "tags": {
        "uuids": [
          "uuid1",
          "uuid2",
          ...
        ],
        "names": [
          "tag1",
          "tag2",
          ...
        ],
      }
    },
    ...
  ],
}</pre>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*****************************************************************************/ include './../../inc/footer.inc.php'; }