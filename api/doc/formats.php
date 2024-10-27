<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/api.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "api/doc/formats";
$page_title_en    = "API: Game formats";
$page_title_fr    = "API : Formats de jeu";
$page_description = "Future Invaders' API allows you to interact with the website without using a browser.";

// API doc menu selection
$api_menu['formats'] = true;

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
    <?=__('api_menu_formats')?>
  </h4>

  <p>
    <?=__('api_formats_intro')?>
  </p>

  <ul class="tinypadding_top">
    <li><?=__link('#list_formats', 'GET /api/formats', is_internal: false)?></li>
  </ul>

</div>

<hr id="list_formats">

<div class="width_50 padding_top">

  <h4>
    GET /api/formats
  </h4>

  <p>
    <?=__('api_formats_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "formats": [
    {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      }
      "description": {
        "en": string,
        "fr": string
      }
    },
  ]
}</pre>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*****************************************************************************/ include './../../inc/footer.inc.php'; }