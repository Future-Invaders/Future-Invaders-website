<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/api.lang.php';     # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "api/doc/arsenals";
$page_title_en    = "API: Arsenals";
$page_title_fr    = "API : Arsenaux";
$page_description = "Future Invaders' API allows you to interact with the website without using a browser.";

// API doc menu selection
$api_menu['arsenals'] = true;

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
    <?=__('api_menu_arsenals')?>
  </h4>

  <p>
    <?=__('api_arsenals_intro')?>
  </p>

  <ul class="tinypadding_top">
    <li><?=__link('#list_arsenals', 'GET /api/arsenals', is_internal: false)?></li>
    <li><?=__link('#get_arsenal', 'GET /api/arsenal/{uuid}', is_internal: false)?></li>
    <li><?=__link('#list_arsenal_difficulties', 'GET /api/arsenal_difficulties', is_internal: false)?></li>
  </ul>

</div>

<hr id="list_arsenals">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/arsenals
  </h4>

  <p>
    <?=__('api_arsenals_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">name</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_arsenals_list_name')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">release</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_arsenals_list_release')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">format</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_arsenals_list_format')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">difficulty</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_arsenals_list_difficulty')?>
  </p>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">tag</span> - string - <span class="italics"><?=__('api_optional')?></span><br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_arsenals_list_tag')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "arsenals": [
    {
      "uuid": string,
      "endpoint": string,
      "name": {
        "en": string,
        "fr": string
      },
      "playstyle": {
        "en": string,
        "fr": string
      },
      "strategy_summary": {
        "en": string,
        "fr": string
      },
      "game_plan": {
        "en": string,
        "fr": string
      },
      "reserves_game_plan": {
        "en": string,
        "fr": string
      }
      "extra_text": {
        "en": string,
        "fr": string
      },
      "release": {
        "uuid": string,
        "name": {
          "en": string,
          "fr": string
        },
        "date": string
      },
      "format": {
        "uuid": string,
        "name": {
          "en": string,
          "fr": string
        }
      },
      "factions": {
        "uuids": [
          "uuid1",
          "uuid2",
          ...
        ],
        "names": {
          "en": [
            "faction1",
            "faction2",
            ...
          ],
          "fr": [
            "faction1",
            "faction2",
            ...
          ]
        }
      }
      "difficulty": {
        "uuid": string,
        "name": {
          "en": string,
          "fr": string
        }
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
      card_count: {
        main: int,
        reserves: int,
        extras: int
      },
      cards: {
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
      }
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
        ]
      }
    },
  ]
}</pre>

</div>

<hr id="get_arsenal">

<div class="width_50 padding_top bigpadding_bot">

  <h4>
    GET /api/arsenal/{uuid}
  </h4>

  <p>
    <?=__('api_arsenals_get_summary')?>
  </p>

  <h6 class="bigpadding_top">
    <?=__('api_parameters')?>
  </h6>

  <hr class="api_doc_parameters">

  <p class="tinypadding_top tinypadding_bot">
    <span class="bold underlined">uuid</span> - string<br>
  </p>

  <p class="nopadding_top tinypadding_bot">
    <?=__('api_arsenals_get_uuid')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "arsenal": {
    "uuid": string,
    "name": {
      "en": string,
      "fr": string
    },
    "playstyle": {
      "en": string,
      "fr": string
    },
    "strategy_summary": {
      "en": string,
      "fr": string
    },
    "game_plan": {
      "en": string,
      "fr": string
    },
    "reserves_game_plan": {
      "en": string,
      "fr": string
    }
    "extra_text": {
      "en": string,
      "fr": string
    },
    "release": {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string,
      }
      "date": string
    }
    "format": {
      "uuid": string
      "name": {
        "en": string
        "fr": string
      }
    }
    "factions": [
      {
        "uuid": string,
        "name": {
          "en": string,
          "fr": string
        }
      },
      ...
    ],
    "difficulty": {
      "uuid": string,
      "name": {
        "en": string,
        "fr": string
      }
    },
    "images" {
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
    "card_count": {
      "main": int,
      "reserves": int,
      "extras": int
    },
    "cards": [
      {
        "uuid": string,
        "endpoint": string,
        "name": {
          "en": string,
          "fr": string
        },
        "amount": {
          "main": int,
          "reserves": int
        }
      },
      ...
    ],
    "tags": [
      {
        "uuid": string,
        "endpoint": string,
        "name": string
      },
      ...
    ]
  }
}</pre>

</div>

<hr id="list_arsenal_difficulties">

<div class="width_50 padding_top">

  <h4>
    GET /api/arsenal_difficulties
  </h4>

  <p>
    <?=__('api_arsenal_difficulties_list_summary')?>
  </p>

  <h6 class="bigpadding_top smallpadding_bot">
    <?=__('api_response_schema')?>
  </h6>

  <pre>{
  "arsenal_difficulties": [
    {
      "uuid": string,
      "name": {
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