<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/api.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "api/doc/tags";
$page_title_en    = "API: Tags";
$page_title_fr    = "API : Tags";
$page_description = "Future Invaders' API allows you to interact with the website without using a browser.";

// API doc menu selection
$api_menu['tags'] = true;

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
    <?=__('api_menu_tags')?>
  </h4>

  <p>
    <?=__('api_tags_intro')?>
  </p>

  <ul class="tinypadding_top">
    <li><?=__link('#list_tags', 'GET /api/tags', is_internal: false)?></li>
    <li><?=__link('#get_tag', 'GET /api/tag/{uuid}', is_internal: false)?></li>
  </ul>

</div>

<hr id="list_tags">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/tags
  </h4>

  <p>
    <?=__('api_tags_list_summary')?>
  </p>

  <h6 class="bigpadding_top">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">type</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_tags_list_type')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">name</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_tags_list_name')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">description</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_tags_list_desc')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "tags": [
    {
      "uuid": string,
      "type": string,
      "name": string,
      "description": {
        "en": string,
        "fr": string
      }
      "endpoint": string
    },
  ]
}</pre>

</div>

<hr id="get_tag">

<div class="width_50 padding_top">

  <h4>
    GET /api/tag/{uuid}
  </h4>

  <p>
    <?=__('api_tags_get_summary')?>
  </p>

  <h6 class="bigpadding_top">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">uuid</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_tags_get_uuid')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "tag": {
    "uuid": string,
    "type": string,
    "name": string,
    "description": {
      "en": string,
      "fr": string
    },
    "linked_images": [
      {
        "image": {
          "uuid": string,
          "name": string,
          "language": string,
          "artist": string,
          "path": string
        }
      }
  }
}</pre>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*****************************************************************************/ include './../../inc/footer.inc.php'; }