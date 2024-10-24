<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/api.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "api/doc/cards";
$page_title_en    = "API: Cards";
$page_title_fr    = "API : Cartes";
$page_description = "Future Invaders' API allows you to interact with the website without using a browser.";

// API doc menu selection
$api_menu['cards'] = true;

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
    <?=__('api_menu_cards')?>
  </h4>

  <p>
    <?=__('api_cards_intro')?>
  </p>

  <ul class="tinypadding_top">
    <li><?=__link('#list_cards', 'GET /api/cards', is_internal: false)?></li>
    <li><?=__link('#get_card', 'GET /api/card/{uuid}', is_internal: false)?></li>
    <li><?=__link('#list_card_types', 'GET /api/card_types', is_internal: false)?></li>
    <li><?=__link('#list_card_rarities', 'GET /api/card_rarities', is_internal: false)?></li>
    <li><?=__link('#list_reminders', 'GET /api/reminders', is_internal: false)?></li>
    <li><?=__link('#list_rules', 'GET /api/rules', is_internal: false)?></li>
  </ul>

</div>

<hr id="list_cards">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/cards
  </h4>

  <p>
    <?=__('api_cards_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">name</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_name')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">body</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_body')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">release</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_release')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">faction</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_faction')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">type</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_type')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">rarity</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_rarity')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">tag</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_list_tag')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "cards": [
    {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      },
      "cost": string,
      "income": string,
      "weapons": int,
      "durability": int,
      "body": {
        "en": string,
        "fr": string
      },
      "release": {
        "en": string,
        "fr": string
      },
      "faction": {
        "en": string,
        "fr": string
      },
      "type": {
        "en": string,
        "fr": string
      },
      "rarity": {
        "name": {
          "en": string,
          "fr": string
        }
        "max_card_count": int,
      },
      "images": {
        "en": {
          "uuid": string,
          "path": string,
          "endpoint": string
        },
        "fr": {
          "uuid": string,
          "path": string,
          "endpoint": string
        }
      },
      "tags": [
        "tag1",
        "tag2",
        ...
      ],
      "endpoint": string
    },
  ]
}</pre>

</div>

<hr id="get_card">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/card/{uuid}
  </h4>

  <p>
    <?=__('api_cards_get_summary')?>
  </p>

  <h6 class="bigpadding_top">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">uuid</span> - string<br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_cards_get_uuid')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "card": {
    "uuid": string,
    "name": {
      "en": string,
      "fr": string
    },
    "cost": string,
    "income": string,
    "weapons": int,
    "durability": int,
    "body": {
      "en": string,
      "fr": string
    },
    "release": {
      "uuid": string,
      "date": string,
      "name": {
        "en": string,
        "fr": string
      }
    },
    "faction": {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      }
    },
    "type": {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      }
    },
    "rarity": {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      },
      "max_card_count": int
    },
    "images": {
      "en": {
        "uuid": string,
        "name": string,
        "language": string,
        "artist": string,
        "path": string,
      },
      "fr": {
        "uuid": string,
        "name": string,
        "language": string,
        "artist": string,
        "path": string,
      }
    },
    "tags": [
      {
        "tag": {
          "uuid": string,
          "name": string,
          "description": {
            "en": string,
            "fr": string
          },
        },
      }
    ],
  }
}</pre>
</div>

<hr id="list_card_types">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/card_types
  </h4>

  <p>
    <?=__('api_card_types_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "card_types": [
    {
      "uuid": string,
      "type": {
        "en": string,
        "fr": string
      }
    },
  ]
}</pre>

</div>

<hr id="list_card_rarities">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/card_rarities
  </h4>

  <p>
    <?=__('api_card_rarities_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "card_rarities": [
    {
      "uuid": string,
      "max_card_count": int,
      "name": {
        "en": string,
        "fr": string
      }
    },
  ]
}</pre>

</div>

<hr id="list_reminders">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/reminders
  </h4>

  <p>
    <?=__('api_reminders_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "cards": [
    {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      },
      "body": {
        "en": string,
        "fr": string
      }
      "release": {
        "en": string,
        "fr": string
      },
      "images": {
        "en": {
          "uuid": string,
          "path": string,
          "endpoint": string
        },
        "fr": {
          "uuid": string,
          "path": string,
          "endpoint": string
        }
      }
    }
  ]
}</pre>

</div>

<hr id="list_rules">

<div class="width_50 padding_top">

  <h4>
    GET /api/rules
  </h4>

  <p>
    <?=__('api_rules_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "cards": [
    {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      },
      "body": {
        "en": string,
        "fr": string
      }
      "release": {
        "en": string,
        "fr": string
      },
      "images": {
        "en": {
          "uuid": string,
          "path": string,
          "endpoint": string
        },
        "fr": {
          "uuid": string,
          "path": string,
          "endpoint": string
        }
      }
    }
  ]
}</pre>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*****************************************************************************/ include './../../inc/footer.inc.php'; }