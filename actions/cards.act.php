<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  cards_get                       Returns data related to a card                                                   */
/*  cards_list                      Lists cards in the database                                                      */
/*  cards_add                       Adds a card to the database                                                      */
/*  cards_edit                      Edits a card in the database                                                     */
/*  cards_delete                    Deletes a card from the database                                                 */
/*                                                                                                                   */
/*  cards_generate_slug             Generates a unique slug identifier for a card                                    */
/*  cards_regenerate_all_slugs      Regenerates all card slugs                                                       */
/*  cards_format_body               Formats a card's body                                                            */
/*  cards_format_cost               Formats a card's cost                                                            */
/*  cards_format_rulings            Formats a ruling linked to a card                                                */
/*                                                                                                                   */
/*  card_types_get                  Returns data related to a card type                                              */
/*  card_types_list                 Lists card types in the database                                                 */
/*  card_types_add                  Adds a card type to the database                                                 */
/*  card_types_edit                 Edits a card type in the database                                                */
/*  card_types_delete               Deletes a card type from the database                                            */
/*                                                                                                                   */
/*  card_rarities_get               Returns data related to a card rarity                                            */
/*  card_rarities_list              Lists card rarities in the database                                              */
/*  card_rarities_add               Adds a card rarity to the database                                               */
/*  card_rarities_edit              Edits a card rarity in the database                                              */
/*  card_rarities_delete            Deletes a card rarity from the database                                          */
/*                                                                                                                   */
/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       CARDS                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a card.
 *
 * @param   int         $card_id    (OPTIONAL)  The id of the card.
 * @param   string      $card_uuid  (OPTIONAL)  The uuid of the card.
 * @param   string      $card_slug  (OPTIONAL)  The card's slug.
 * @param   string      $format     (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth   (OPTIONAL)  Whether to include elements linked to the card in the API.
 *
 * @return  array|null            An array containing the card's data, or null if the card does not exist.
 */

function cards_get( int     $card_id    = null    ,
                    string  $card_uuid  = null    ,
                    string  $card_slug  = null    ,
                    string  $format     = 'html'  ,
                    bool    $no_depth   = false   ) : array|null
{
  // Return null if there are neither an id nor an uuid
  if(!$card_id && !$card_uuid && !$card_slug)
    return null;

  // Sanitize the card's id and uuid
  $card_id   = sanitize($card_id, 'int');
  $card_uuid = sanitize($card_uuid, 'string');
  $card_slug = sanitize($card_slug, 'string');

  // Return null if the card does not have a valid ID
  if($card_id && !database_row_exists('cards', $card_id))
    return null;

  // Return null if the card does not have a valid UUID
  if($card_uuid && !database_entry_exists('cards', 'uuid', $card_uuid))
    return null;

  // Return null if the card does not have a valid slug
  if($card_slug && !database_entry_exists('cards', 'slug', $card_slug))
    return null;

  // Prepare the condition for retrieving the card
  if($card_id)
    $query_where = " WHERE cards.id = '$card_id' ";
  elseif($card_uuid)
    $query_where = " WHERE cards.uuid = '$card_uuid' ";
  elseif($card_slug)
    $query_where = " WHERE cards.slug = '$card_slug' ";

  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the card's data
  $card_data = query("  SELECT    cards.id                      AS 'c_id'         ,
                                  cards.uuid                    AS 'c_uuid'       ,
                                  cards.fk_releases             AS 'c_release_id' ,
                                  cards.fk_images_en            AS 'c_img_en_id'  ,
                                  cards.fk_images_fr            AS 'c_img_fr_id'  ,
                                  cards.fk_card_types           AS 'c_type_id'    ,
                                  cards.fk_factions             AS 'c_faction_id' ,
                                  cards.fk_card_rarities        AS 'c_rarity_id'  ,
                                  cards.is_extra_card           AS 'c_extra'      ,
                                  cards.is_hidden               AS 'c_hidden'     ,
                                  cards.name_en                 AS 'c_name_en'    ,
                                  cards.name_fr                 AS 'c_name_fr'    ,
                                  cards.name_$lang              AS 'c_name'       ,
                                  cards.slug                    AS 'c_slug'       ,
                                  cards.cost                    AS 'c_cost'       ,
                                  cards.income                  AS 'c_income'     ,
                                  cards.weapons                 AS 'c_weapons'    ,
                                  cards.durability              AS 'c_durability' ,
                                  cards.body_en                 AS 'c_body_en'    ,
                                  cards.body_fr                 AS 'c_body_fr'    ,
                                  cards.body_$lang              AS 'c_body'       ,
                                  releases.uuid                 AS 'r_uuid'       ,
                                  releases.name_en              AS 'r_name_en'    ,
                                  releases.name_fr              AS 'r_name_fr'    ,
                                  releases.name_$lang           AS 'r_name'       ,
                                  releases.release_date         AS 'r_date'       ,
                                  factions.uuid                 AS 'f_uuid'       ,
                                  factions.name_en              AS 'f_name_en'    ,
                                  factions.name_fr              AS 'f_name_fr'    ,
                                  factions.name_$lang           AS 'f_name'       ,
                                  card_types.uuid               AS 'ct_uuid'      ,
                                  card_types.name_en            AS 'ct_name_en'   ,
                                  card_types.name_fr            AS 'ct_name_fr'   ,
                                  card_types.name_$lang         AS 'ct_name'      ,
                                  card_rarities.uuid            AS 'cr_uuid'      ,
                                  card_rarities.name_en         AS 'cr_name_en'   ,
                                  card_rarities.name_fr         AS 'cr_name_fr'   ,
                                  card_rarities.name_$lang      AS 'cr_name'      ,
                                  card_rarities.max_card_count  AS 'cr_max_count' ,
                                  images_en.uuid                AS 'i_uuid_en'    ,
                                  images_en.path                AS 'i_path_en'    ,
                                  images_fr.uuid                AS 'i_uuid_fr'    ,
                                  images_fr.path                AS 'i_path_fr'    ,
                                  images_$lang.path             AS 'i_path'       ,
                                  images_$lang.name             AS 'i_name'
                        FROM      cards
                        LEFT JOIN releases            ON releases.id      = cards.fk_releases
                        LEFT JOIN factions            ON factions.id      = cards.fk_factions
                        LEFT JOIN card_types          ON card_types.id    = cards.fk_card_types
                        LEFT JOIN card_rarities       ON card_rarities.id = cards.fk_card_rarities
                        LEFT JOIN images AS images_en ON images_en.id     = cards.fk_images_en
                        LEFT JOIN images AS images_fr ON images_fr.id     = cards.fk_images_fr
                        $query_where ",
                        fetch_row: true);

  // Don't retrieve hidden or extra cards through the API
  if($format === 'api' && ($card_data['c_hidden'] || $card_data['c_extra']))
    return null;

  // Sanitize the card's id
  $card_id = sanitize($card_data['c_id'], 'int');

  // Fetch linked arsenals
  $qarsenals = query("  SELECT    arsenals.uuid                     AS 'a_uuid'     ,
                                  arsenals.name_en                  AS 'a_name_en'  ,
                                  arsenals.name_fr                  AS 'a_name_fr'  ,
                                  arsenals.name_$lang               AS 'a_name'     ,
                                  arsenals.slug                     AS 'a_slug'     ,
                                  arsenals.summary_$lang            AS 'a_summary'  ,
                                  arsenals_compositions.fk_arsenals AS 'ac_id'
                        FROM      arsenals_compositions
                        LEFT JOIN arsenals ON arsenals_compositions.fk_arsenals = arsenals.id
                        WHERE     arsenals_compositions.fk_cards = '$card_id' ");

  // Fetch linked rulings
  $qrulings = query(" SELECT    rulings.uuid              AS 'r_uuid'         ,
                                rulings.slug              AS 'r_slug'         ,
                                rulings.title_en          AS 'r_title_en'     ,
                                rulings.title_fr          AS 'r_title_fr'     ,
                                rulings.date_ruling       AS 'r_date'         ,
                                rulings.date_last_update  AS 'r_update'       ,
                                GREATEST(rulings.date_last_update, rulings.date_ruling)
                                                          AS 'r_dates'        ,
                                rulings.situation_en      AS 'r_situation_en' ,
                                rulings.situation_fr      AS 'r_situation_fr' ,
                                rulings.ruling_en         AS 'r_ruling_en'    ,
                                rulings.ruling_fr         AS 'r_ruling_fr'
                      FROM      rulings_cards
                      LEFT JOIN rulings ON rulings_cards.fk_rulings = rulings.id
                      WHERE     rulings_cards.fk_cards = '$card_id'

                      UNION

                      SELECT    rulings.uuid              AS 'r_uuid'         ,
                                rulings.slug              AS 'r_slug'         ,
                                rulings.title_en          AS 'r_title_en'     ,
                                rulings.title_fr          AS 'r_title_fr'     ,
                                rulings.date_ruling       AS 'r_date'         ,
                                rulings.date_last_update  AS 'r_update'       ,
                                GREATEST(rulings.date_last_update, rulings.date_ruling)
                                                          AS 'r_dates'        ,
                                rulings.situation_en      AS 'r_situation_en' ,
                                rulings.situation_fr      AS 'r_situation_fr' ,
                                rulings.ruling_en         AS 'r_ruling_en'    ,
                                rulings.ruling_fr         AS 'r_ruling_fr'
                      FROM      rulings_tags
                      LEFT JOIN rulings     ON rulings_tags.fk_rulings = rulings.id
                      LEFT JOIN tags        ON rulings_tags.fk_tags = tags.id
                      LEFT JOIN tags_cards  ON tags_cards.fk_tags = tags.id
                      WHERE     tags_cards.fk_cards = '$card_id'

                      ORDER BY  r_dates     DESC  ,
                                r_date      DESC  ,
                                r_title_en  ASC   ");

  // Fetch linked tags
  $qtags = query("  SELECT    tags.uuid               AS 't_uuid'         ,
                              tags.name               AS 't_name'         ,
                              tags.description_$lang  AS 't_description'  ,
                              tags_cards.fk_tags      AS 'ct_id'
                    FROM      tags_cards
                    LEFT JOIN tags ON tags.id = tags_cards.fk_tags
                    WHERE     tags_cards.fk_cards = '$card_id' ");

  // Prepare the data for display
  if($format === 'html')
  {
    // Sanitize card data
    $data['name_en']      = sanitize_output($card_data['c_name_en']);
    $data['name_fr']      = sanitize_output($card_data['c_name_fr']);
    $data['name']         = sanitize_output($card_data['c_name']);
    $data['image_id_en']  = sanitize_output($card_data['c_img_en_id']);
    $data['image_en']     = sanitize_output($card_data['i_path_en']);
    $data['image_id_fr']  = sanitize_output($card_data['c_img_fr_id']);
    $data['image_fr']     = sanitize_output($card_data['i_path_fr']);
    $data['image_path']   = sanitize_output($card_data['i_path']);
    $data['image_name']   = sanitize_output($card_data['i_name']);
    $data['type_id']      = sanitize_output($card_data['c_type_id']);
    $data['type']         = sanitize_output($card_data['ct_name']);
    $data['type_en']      = sanitize_output($card_data['ct_name_en']);
    $data['faction_id']   = sanitize_output($card_data['c_faction_id']);
    $data['faction']      = sanitize_output($card_data['f_name']);
    $data['rarity_id']    = sanitize_output($card_data['c_rarity_id']);
    $data['rarity']       = sanitize_output($card_data['cr_name']);
    $data['release_id']   = sanitize_output($card_data['c_release_id']);
    $data['release']      = sanitize_output($card_data['r_name']);
    $data['hidden']       = sanitize_output($card_data['c_hidden']);
    $data['extra']        = sanitize_output($card_data['c_extra']);
    $data['weapons']      = sanitize_output($card_data['c_weapons']);
    $data['durability']   = sanitize_output($card_data['c_durability']);
    $data['cost']         = sanitize_output($card_data['c_cost']);
    $data['icost']        = cards_format_cost($card_data['c_cost']);
    $data['income']       = sanitize_output($card_data['c_income']);
    $data['iincome']      = cards_format_cost($card_data['c_income']);
    $data['body_en']      = sanitize_output($card_data['c_body_en']);
    $data['body_fr']      = sanitize_output($card_data['c_body_fr']);
    $data['body']         = cards_format_body($card_data['c_body']);

    // Page data
    $data['page_title_en']  = sanitize_meta_tags($card_data['c_name_en']);
    $data['page_title_fr']  = sanitize_meta_tags($card_data['c_name_fr']);

    // Arsenals
    for($i = 0; $darsenals = query_row($qarsenals); $i++)
    {
      $data['arsenals'][$i]['name']     = sanitize_json($darsenals['a_name']);
      $data['arsenals'][$i]['summary']  = sanitize_json($darsenals['a_summary']);
      $data['arsenals'][$i]['slug']     = sanitize_json($darsenals['a_slug']);
    }
    $data['arsenals']['count'] = $i;

    // Rulings
    for($i = 0; $drulings = query_row($qrulings); $i++)
    {
      $data['rulings'][$i]['slug']      = sanitize_json($drulings['r_slug']);
      $data['rulings'][$i]['title']     = sanitize_json($drulings['r_title_'.$lang]);
      $data['rulings'][$i]['date']      = $drulings['r_date'] != '0000-00-00'
                                        ? sanitize_json(date_to_text($drulings['r_date'], strip_day: 1))
                                        : '';
      $data['rulings'][$i]['update']    = $drulings['r_update'] != '0000-00-00'
                                        ? sanitize_json(date_to_text($drulings['r_update'], strip_day: 1))
                                        : '';
      $data['rulings'][$i]['situation'] = cards_format_rulings(nl2br($drulings['r_situation_'.$lang]));
      $data['rulings'][$i]['ruling']    = cards_format_rulings(nl2br($drulings['r_ruling_'.$lang]));
    }
    $data['rulings']['count'] = $i;

    // Tags
    for($i = 0; $dtags = query_row($qtags); $i++)
    {
      $data['tags'][$i]['name']         = sanitize_json($dtags['t_name']);
      $data['tags'][$i]['description']  = sanitize_json($dtags['t_description']);
    }
    $data['tags']['count'] = $i;
  }

  // Prepare for the API
  if($format === 'api')
  {
    // Sanitize card data
    $data['uuid']         = sanitize_json($card_data['c_uuid']);
    $data['url']          = sanitize_json($GLOBALS['website_url'].'pages/card/'.$card_data['c_slug']);
    $data['name']['en']   = sanitize_json($card_data['c_name_en']);
    $data['name']['fr']   = sanitize_json($card_data['c_name_fr']);
    $data['cost']         = sanitize_json($card_data['c_cost']);
    $data['income']       = sanitize_json($card_data['c_income']);
    $data['weapons']      = (int)sanitize_json($card_data['c_weapons']);
    $data['durability']   = (int)sanitize_json($card_data['c_durability']);
    $data['body']['en']   = sanitize_json($card_data['c_body_en']);
    $data['body']['fr']   = sanitize_json($card_data['c_body_fr']);

    // Release
    if($card_data['c_release_id'])
    {
      $data['release']['uuid']        = sanitize_json($card_data['r_uuid']);
      $data['release']['name']['en']  = sanitize_json($card_data['r_name_en']);
      $data['release']['name']['fr']  = sanitize_json($card_data['r_name_fr']);
      $data['release']['date']        = sanitize_json($card_data['r_date']);
    }
    else
      $data['release']                = array();

    // Faction
    if($card_data['c_faction_id'])
    {
      $data['faction']['uuid']        = sanitize_json($card_data['f_uuid']);
      $data['faction']['name']['en']  = sanitize_json($card_data['f_name_en']);
      $data['faction']['name']['fr']  = sanitize_json($card_data['f_name_fr']);
    }
    else
      $data['faction']                = array();

    // Type
    if($card_data['c_type_id'])
    {
      $data['type']['uuid']       = sanitize_json($card_data['ct_uuid']);
      $data['type']['name']['en'] = sanitize_json($card_data['ct_name_en']);
      $data['type']['name']['fr'] = sanitize_json($card_data['ct_name_fr']);
    }
    else
      $data['type']               = array();

    // Rarity
    if($card_data['c_rarity_id'])
    {
      $data['rarity']['uuid']           = sanitize_json($card_data['cr_uuid']);
      $data['rarity']['name']['en']     = sanitize_json($card_data['cr_name_en']);
      $data['rarity']['name']['fr']     = sanitize_json($card_data['cr_name_fr']);
      $data['rarity']['max_card_count'] = (int)sanitize_json($card_data['cr_max_count']);
    }
    else
      $data['rarity']                   = array();

    // Images
    if($card_data['c_img_en_id'])
    {
      $data['images']['en']['uuid']     = sanitize_json($card_data['i_uuid_en']);
      $data['images']['en']['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                        .'api/image/'.$card_data['i_uuid_en']);
      $data['images']['en']['path']     = sanitize_json($GLOBALS['website_url'].$card_data['i_path_en']);
    }
    if($card_data['c_img_fr_id'])
    {
      $data['images']['fr']['uuid']     = sanitize_json($card_data['i_uuid_fr']);
      $data['images']['fr']['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                        .'api/image/'.$card_data['i_uuid_fr']);
      $data['images']['fr']['path']     = sanitize_json($GLOBALS['website_url'].$card_data['i_path_fr']);
    }
    if(!$card_data['c_img_en_id'] && !$card_data['c_img_fr_id'])
      $data['images']                   = array();

    // Arsenals
    if(!$no_depth)
    {
      for($i = 0; $darsenals = query_row($qarsenals); $i++)
      {
        $data['arsenals'][$i]['uuid']       = sanitize_json($darsenals['a_uuid']);
        $data['arsenals'][$i]['endpoint']   = sanitize_json($GLOBALS['website_url']
                                                            .'api/arsenal/'.$darsenals['a_uuid']);
        $data['arsenals'][$i]['url']        = sanitize_json($GLOBALS['website_url']
                                                            .'pages/arsenal/'.$darsenals['a_slug']);
        $data['arsenals'][$i]['name']['en'] = sanitize_json($darsenals['a_name_en']);
        $data['arsenals'][$i]['name']['fr'] = sanitize_json($darsenals['a_name_fr']);
      }
      if($i === 0)
        $data['arsenals']                   = array();
    }

    // Rulings
    if(!$no_depth)
    {
      for($i = 0; $drulings = query_row($qrulings); $i++)
      {
        $data['rulings'][$i]['uuid']        = sanitize_json($drulings['r_uuid']);
        $data['rulings'][$i]['endpoint']    = sanitize_json($GLOBALS['website_url']
                                                            .'api/ruling/'.$drulings['r_uuid']);
        $data['rulings'][$i]['url']         = sanitize_json($GLOBALS['website_url']
                                                            .'pages/ruling/'.$drulings['r_slug']);
        $data['rulings'][$i]['title']['en'] = sanitize_json($drulings['r_title_en']);
        $data['rulings'][$i]['title']['fr'] = sanitize_json($drulings['r_title_fr']);
      }
      if($i === 0)
        $data['rulings']                    = array();
    }

    // Tags
    if(!$no_depth)
    {
      for($i = 0; $dtags = query_row($qtags); $i++)
      {
        $data['tags'][$i]['uuid']     = sanitize_json($dtags['t_uuid']);
        $data['tags'][$i]['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                      .'api/tag/'.$dtags['t_uuid']);
        $data['tags'][$i]['name']     = sanitize_json($dtags['t_name']);
      }
      if($i === 0)
        $data['tags']                 = array();
    }

    // Prepare for the API
    $data = (isset($data)) ? $data : NULL;
    $data = array('card' => $data);
  }

  // Return the data
  return $data;
}




/**
 * Lists cards in the database.
 *
 * @param   string  $sort_by      (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search       (OPTIONAL)  An array containing the search data.
 * @param   string  $format       (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the cards.
 */

function cards_list( string   $sort_by    = 'name'  ,
                     array    $search     = array() ,
                     string   $format     = 'html'  ) : array
{
  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanitize the search data
  $search_name          = sanitize_array_element($search, 'name', 'string');
  $search_name_en       = sanitize_array_element($search, 'name_en', 'string');
  $search_name_fr       = sanitize_array_element($search, 'name_fr', 'string');
  $search_release_id    = sanitize_array_element($search, 'release_id', 'int');
  $search_release_uuid  = sanitize_array_element($search, 'release_uuid', 'string');
  $search_type          = sanitize_array_element($search, 'type', 'string');
  $search_type_id       = sanitize_array_element($search, 'type_id', 'int');
  $search_type_uuid     = sanitize_array_element($search, 'type_uuid', 'string');
  $search_faction_id    = sanitize_array_element($search, 'faction_id', 'int');
  $search_faction_uuid  = sanitize_array_element($search, 'faction_uuid', 'string');
  $search_rarity_id     = sanitize_array_element($search, 'rarity_id', 'int');
  $search_rarity_uuid   = sanitize_array_element($search, 'rarity_uuid', 'string');
  $search_cost          = sanitize_array_element($search, 'cost', 'string');
  $search_income        = sanitize_array_element($search, 'income', 'string');
  $search_weapons       = sanitize_array_element($search, 'weapons', 'int');
  $search_durability    = sanitize_array_element($search, 'durability', 'int');
  $search_body          = sanitize_array_element($search, 'body', 'string');
  $search_extra         = sanitize_array_element($search, 'extra', 'int');
  $search_arsenal_id    = sanitize_array_element($search, 'arsenal_id', 'int');
  $search_tag_id        = sanitize_array_element($search, 'tag_id', 'int');
  $search_tag           = sanitize_array_element($search, 'tag', 'string');
  $search_public        = sanitize_array_element($search, 'public', 'bool');
  $search_is_extra      = sanitize_array_element($search, 'is_extra', 'bool');
  $search_is_not_extra  = sanitize_array_element($search, 'is_not_extra', 'bool');
  $search_game_cards    = sanitize_array_element($search, 'game_card', 'bool');

  // Search through the data
  $query_search  = ($search_name)           ? " WHERE ( cards.name_en     LIKE '%$search_name%'
                                                OR    cards.name_fr       LIKE '%$search_name%' ) "  : " WHERE 1 = 1 ";
  $query_search .= ($search_name_en)        ? " AND   cards.name_en       LIKE '%$search_name_en%' "  : "";
  $query_search .= ($search_name_fr)        ? " AND   cards.name_fr       LIKE '%$search_name_fr%' "  : "";
  $query_search .= ($search_release_id && $search_release_id !== -1)
                                            ? " AND   releases.id         = '$search_release_id' "    : "";
  $query_search .= ($search_release_id === -1)
                                            ? " AND   releases.id         IS NULL "                   : "";
  $query_search .= ($search_release_uuid)   ? " AND   releases.uuid       = '$search_release_uuid' "  : "";
  $query_search .= ($search_type)           ? " AND ( card_types.name_en  = '$search_type'
                                                OR    card_types.name_fr  = '$search_type' ) "        : "";
  $query_search .= ($search_type_id && $search_type_id !== -1)
                                            ? " AND   card_types.id       = '$search_type_id' "       : "";
  $query_search .= ($search_type_id === -1)
                                            ? " AND   card_types.id       IS NULL "                   : "";
  $query_search .= ($search_type_uuid)      ? " AND   card_types.uuid     = '$search_type_uuid' "     : "";
  $query_search .= ($search_faction_id && $search_faction_id !== -1)
                                            ? " AND   factions.id         = '$search_faction_id' "    : "";
  $query_search .= ($search_faction_id === -1)
                                            ? " AND   factions.id         IS NULL "                   : "";
  $query_search .= ($search_faction_uuid)   ? " AND   factions.uuid       = '$search_faction_uuid' "  : "";
  $query_search .= ($search_rarity_id && $search_rarity_id !== -1)
                                            ? " AND   card_rarities.id    = '$search_rarity_id' "     : "";
  $query_search .= ($search_rarity_id === -1)
                                            ? " AND   card_rarities.id    IS NULL "                   : "";
  $query_search .= ($search_rarity_uuid)    ? " AND   card_rarities.uuid  = '$search_rarity_uuid' "   : "";
  $query_search .= ($search_cost)           ? " AND   cards.cost          LIKE '$search_cost' "       : "";
  $query_search .= ($search_income)         ? " AND   cards.income        LIKE '$search_income' "     : "";
  $query_search .= ($search_weapons)        ? " AND   cards.weapons       = '$search_weapons' "       : "";
  $query_search .= ($search_durability)     ? " AND   cards.durability    = '$search_durability' "    : "";
  $query_search .= ($search_body)           ? " AND ( cards.body_en       LIKE '%$search_body%'
                                                OR    cards.body_fr       LIKE '%$search_body%' ) "  : "";
  $query_search .= ($search_extra === 1 )   ? " AND   cards.is_hidden     = '1' "                     : "";
  $query_search .= ($search_extra === 10 )  ? " AND   cards.is_extra_card = '1' "                     : "";
  $query_search .= ($search_extra === 100 ) ? " AND   cards.fk_images_en != ''
                                                AND   cards.fk_images_fr != '' "                      : "";
  $query_search .= ($search_extra === 101 ) ? " AND ( cards.fk_images_en != ''
                                                AND   cards.fk_images_fr  = '' )
                                                OR  ( cards.fk_images_en  = ''
                                                AND   cards.fk_images_fr != '' ) "                    : "";
  $query_search .= ($search_extra === 102 ) ? " AND   cards.fk_images_en  = ''
                                                AND   cards.fk_images_fr  = '' "                      : "";
  $query_search .= ($search_tag_id === -1)  ? " AND   tags.id             IS NULL "                   : "";
  $query_search .= ($search_tag)            ? " AND   tags.name           LIKE '$search_tag' "        : "";
  $query_search .= ($search_arsenal_id === -1)
                                            ? " AND   arsenals.id         IS NULL "                   : "";
  $query_search .= ($search_public)         ? " AND   cards.is_hidden     = '0' "                     : "";
  $query_search .= ($search_is_extra)       ? " AND   cards.is_extra_card = '1' "                     : "";
  $query_search .= ($search_is_not_extra)   ? " AND   cards.is_extra_card = '0' "                     : "";
  $query_search .= ($search_game_cards)     ? " AND   cards.is_extra_card = '0' "                     : "";

  // Use a different search technique for tags
  $query_having = ($search_tag_id && $search_tag_id !== -1)
                ? " HAVING FIND_IN_SET('$search_tag_id', GROUP_CONCAT(tags.id)) > 0 "
                : " HAVING 1 = 1 ";

  // Use a different search technique for arsenals
  $query_having .= ($search_arsenal_id && $search_arsenal_id !== -1)
                ? " AND FIND_IN_SET('$search_arsenal_id', GROUP_CONCAT(arsenals.id)) > 0 "
                : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'tags'        => " ORDER BY COUNT(DISTINCT tags.id)     DESC    ,
                                cards.name_$lang            ASC     ",
    'arsenals'    => " ORDER BY COUNT(DISTINCT arsenals.id) DESC    ,
                                cards.name_$lang            ASC     ",
    'api'         => " ORDER BY cards.name_en               ASC     ",
    'name'        => " ORDER BY cards.name_$lang            ASC     ",
    'release'     => " ORDER BY releases.release_date       IS NULL ,
                                releases.release_date       DESC    ,
                                cards.name_$lang            ASC     ",
    'type'        => " ORDER BY card_types.sorting_order    IS NULL ,
                                card_types.sorting_order    ASC     ,
                                cards.name_$lang            ASC     ",
    'faction'     => " ORDER BY factions.sorting_order      IS NULL ,
                                factions.sorting_order      ASC     ,
                                cards.name_$lang            ASC     ",
    'rarity'      => " ORDER BY card_rarities.sorting_order IS NULL ,
                                card_rarities.sorting_order ASC     ,
                                cards.name_$lang            ASC     ",
    'cost'        => " ORDER BY LENGTH(cards.cost)          DESC    ,
                                cards.cost                  DESC    ,
                                cards.name_$lang            ASC     ",
    'income'      => " ORDER BY LENGTH(cards.income)        DESC    ,
                                cards.income                DESC    ,
                                cards.name_$lang            ASC     ",
    'weapons'     => " ORDER BY cards.weapons               DESC    ,
                                cards.name_$lang            ASC     ",
    'durability'  => " ORDER BY cards.durability            DESC    ,
                                cards.name_$lang            ASC     ",
    'body'        => " ORDER BY LENGTH(cards.body_en)
                              + LENGTH(cards.body_fr)       DESC    ,
                                cards.name_$lang            ASC     ",
    'list'        => " ORDER BY LENGTH(cards.cost)          ASC     ,
                                card_types.sorting_order    ASC     ,
                                cards.name_en               ASC     ",
    'extra'       => " ORDER BY arsenals_compositions.sorting_order
                                                            ASC     ",
    default       => " ORDER BY releases.release_date       IS NULL ,
                                releases.release_date       DESC    ,
                                factions.sorting_order      IS NULL ,
                                factions.sorting_order      ASC     ,
                                card_types.sorting_order    IS NULL ,
                                card_types.sorting_order    ASC     ,
                                LENGTH(cards.cost)          ASC     ,
                                card_rarities.sorting_order IS NULL ,
                                card_rarities.sorting_order ASC     ,
                                cards.cost                  ASC     ,
                                cards.name_$lang            ASC     ",
  };

  // Fetch the cards
  $cards = query("  SELECT    cards.id                      AS 'c_id'         ,
                              cards.uuid                    AS 'c_uuid'       ,
                              cards.name_$lang              AS 'c_name'       ,
                              cards.name_en                 AS 'c_name_en'    ,
                              cards.name_fr                 AS 'c_name_fr'    ,
                              cards.slug                    AS 'c_slug'       ,
                              cards.cost                    AS 'c_cost'       ,
                              cards.income                  AS 'c_income'     ,
                              cards.weapons                 AS 'c_weapons'    ,
                              cards.durability              AS 'c_durability' ,
                              cards.is_extra_card           AS 'c_extra'      ,
                              cards.is_hidden               AS 'c_hidden'     ,
                              LENGTH(cards.body_en)         AS 'c_length_en'  ,
                              LENGTH(cards.body_fr)         AS 'c_length_fr'  ,
                              cards.body_en                 AS 'c_body_en'    ,
                              cards.body_fr                 AS 'c_body_fr'    ,
                              releases.id                   AS 'r_id'         ,
                              releases.uuid                 AS 'r_uuid'       ,
                              releases.name_$lang           AS 'r_name'       ,
                              releases.name_en              AS 'r_name_en'    ,
                              releases.name_fr              AS 'r_name_fr'    ,
                              releases.styling              AS 'r_styling'    ,
                              releases.release_date         AS 'r_date'       ,
                              card_types.id                 AS 'ct_id'        ,
                              card_types.uuid               AS 'ct_uuid'      ,
                              card_types.name_en            AS 'ct_name_en'   ,
                              card_types.name_fr            AS 'ct_name_fr'   ,
                              card_types.name_$lang         AS 'ct_name'      ,
                              card_types.styling            AS 'ct_styling'   ,
                              factions.id                   AS 'f_id'         ,
                              factions.uuid                 AS 'f_uuid'       ,
                              factions.name_en              AS 'f_name_en'    ,
                              factions.name_fr              AS 'f_name_fr'    ,
                              factions.name_$lang           AS 'f_name'       ,
                              factions.styling              AS 'f_styling'    ,
                              card_rarities.id              AS 'cr_id'        ,
                              card_rarities.uuid            AS 'cr_uuid'      ,
                              card_rarities.name_en         AS 'cr_name_en'   ,
                              card_rarities.name_fr         AS 'cr_name_fr'   ,
                              card_rarities.name_$lang      AS 'cr_name'      ,
                              card_rarities.max_card_count  AS 'cr_max_count' ,
                              card_rarities.styling         AS 'cr_styling'   ,
                              images_en.id                  AS 'i_id_en'      ,
                              images_en.uuid                AS 'i_uuid_en'    ,
                              images_en.path                AS 'i_path_en'    ,
                              images_fr.id                  AS 'i_id_fr'      ,
                              images_fr.uuid                AS 'i_uuid_fr'    ,
                              images_fr.path                AS 'i_path_fr'    ,
                              images_$lang.path             AS 'i_path'       ,
                              images_$lang.name             AS 'i_name'       ,
                              arsenals_compositions.amount_main
                                                            AS 'ac_main'      ,
                              arsenals_compositions.amount_reserves
                                                            AS 'ac_reserves'  ,
                              COUNT(DISTINCT tags.id)       AS 'ct_count'     ,
                              COUNT(DISTINCT arsenals.id)   AS 'ar_count'     ,
                              GROUP_CONCAT(DISTINCT tags.uuid ORDER BY tags.name ASC SEPARATOR ', ')
                                                            AS 'ct_uuids'     ,
                              GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name ASC SEPARATOR ', ')
                                                            AS 'ct_names'     ,
                              GROUP_CONCAT(DISTINCT arsenals.uuid ORDER BY arsenals.name_en ASC SEPARATOR ', ')
                                                            AS 'ar_uuids'     ,
                              GROUP_CONCAT(DISTINCT arsenals.name_en ORDER BY arsenals.name_en ASC SEPARATOR ', ')
                                                            AS 'ar_names_en'  ,
                              GROUP_CONCAT(DISTINCT arsenals.name_fr ORDER BY arsenals.name_en ASC SEPARATOR ', ')
                                                            AS 'ar_names_fr'
                    FROM      cards
                    LEFT JOIN releases              ON releases.id                    = cards.fk_releases
                    LEFT JOIN factions              ON factions.id                    = cards.fk_factions
                    LEFT JOIN card_types            ON card_types.id                  = cards.fk_card_types
                    LEFT JOIN card_rarities         ON card_rarities.id               = cards.fk_card_rarities
                    LEFT JOIN images AS images_en   ON images_en.id                   = cards.fk_images_en
                    LEFT JOIN images AS images_fr   ON images_fr.id                   = cards.fk_images_fr
                    LEFT JOIN tags_cards            ON tags_cards.fk_cards            = cards.id
                    LEFT JOIN tags                  ON tags.id                        = tags_cards.fk_tags
                    LEFT JOIN arsenals_compositions ON arsenals_compositions.fk_cards = cards.id
                    LEFT JOIN arsenals              ON arsenals.id
                                                    = arsenals_compositions.fk_arsenals
                    $query_search
                    GROUP BY cards.id
                    $query_having
                    $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($cards); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']           = sanitize_output($row['c_id']);
      $data[$i]['name']         = sanitize_output(string_truncate($row['c_name'], 20, '...'));
      $data[$i]['name_en']      = sanitize_output($row['c_name_en']);
      $data[$i]['name_fr']      = sanitize_output($row['c_name_fr']);
      $data[$i]['slug']         = sanitize_output($row['c_slug']);
      $data[$i]['release']      = sanitize_output(string_truncate($row['r_name'], 12, '...'));
      $data[$i]['release_en']   = sanitize_output($row['r_name_en']);
      $data[$i]['release_fr']   = sanitize_output($row['r_name_fr']);
      $data[$i]['release_css']  = sanitize_output($row['r_styling']);
      $data[$i]['type']         = sanitize_output($row['ct_name']);
      $data[$i]['type_css']     = sanitize_output($row['ct_styling']);
      $data[$i]['faction']      = sanitize_output($row['f_name']);
      $data[$i]['faction_css']  = sanitize_output($row['f_styling']);
      $data[$i]['rarity']       = sanitize_output($row['cr_name']);
      $data[$i]['rarity_css']   = sanitize_output($row['cr_styling']);
      $data[$i]['cost']         = cards_format_cost($row['c_cost']);
      $data[$i]['income']       = cards_format_cost($row['c_income']);
      $data[$i]['weapons']      = $row['c_weapons'] || $row['ct_name_en'] == 'Ship'
                                ? sanitize_output($row['c_weapons'])
                                : '&nbsp;';
      $data[$i]['durability']   = $row['c_durability'] ? sanitize_output($row['c_durability']) : '&nbsp;';
      $data[$i]['length_en']    = sanitize_output($row['c_length_en']);
      $data[$i]['length_fr']    = sanitize_output($row['c_length_fr']);
      $data[$i]['body_en_raw']  = cards_format_body($row['c_body_en']);
      $data[$i]['body_fr_raw']  = cards_format_body($row['c_body_fr']);
      $data[$i]['image_en']     = sanitize_output($row['i_path_en']);
      $data[$i]['image_fr']     = sanitize_output($row['i_path_fr']);
      $data[$i]['image_path']   = sanitize_output($row['i_path']);
      $data[$i]['image_name']   = sanitize_output($row['i_name']);
      $temp_thumb_path_en       = (isset($row['i_path_en']))
                                ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path_en'])
                                : '';
      $temp_thumb_path_fr       = (isset($row['i_path_fr']))
                                ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path_fr'])
                                : '';
      $temp_thumb_path          = (isset($row['i_path']))
                                ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path'])
                                : '';
      $data[$i]['thumb_en']     = sanitize_output($temp_thumb_path_en);
      $data[$i]['thumb_fr']     = sanitize_output($temp_thumb_path_fr);
      $data[$i]['thumb']        = sanitize_output($temp_thumb_path);
      $data[$i]['extra']        = sanitize_output($row['c_extra']);
      $data[$i]['hidden']       = sanitize_output($row['c_hidden']);
      $data[$i]['count_main']   = sanitize_output($row['ac_main']);
      $data[$i]['count_res']    = sanitize_output($row['ac_reserves']);
      $data[$i]['narsenals']    = sanitize_output($row['ar_count']);
      $data[$i]['arsenals']     = sanitize_output($row['ar_names_en']);
      $data[$i]['ntags']        = sanitize_output($row['ct_count']);
      $data[$i]['tags']         = sanitize_output($row['ct_names']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      // Sanitize card data
      $data[$i]['uuid']         = sanitize_json($row['c_uuid']);
      if($search_type === null)
      {
        $data[$i]['url']        = sanitize_json($GLOBALS['website_url'].'pages/card/'.$row['c_slug']);
        $data[$i]['endpoint']   = sanitize_json($GLOBALS['website_url'].'api/card/'.$row['c_uuid']);
      }
      $data[$i]['name']['en']   = sanitize_json($row['c_name_en']);
      $data[$i]['name']['fr']   = sanitize_json($row['c_name_fr']);
      if($search_type === null)
      {
        $data[$i]['cost']       = sanitize_json($row['c_cost']);
        $data[$i]['income']     = sanitize_json($row['c_income']);
        $data[$i]['weapons']    = (int)sanitize_json($row['c_weapons']);
        $data[$i]['durability'] = (int)sanitize_json($row['c_durability']);
      }
      $data[$i]['body']['en']   = sanitize_json($row['c_body_en']);
      $data[$i]['body']['fr']   = sanitize_json($row['c_body_fr']);

      // Release
      if($row['r_id'])
      {
        $data[$i]['release']['uuid']        = sanitize_json($row['r_uuid']);
        $data[$i]['release']['name']['en']  = sanitize_json($row['r_name_en']);
        $data[$i]['release']['name']['fr']  = sanitize_json($row['r_name_fr']);
        $data[$i]['release']['date']        = sanitize_json($row['r_date']);
      }
      else
        $data[$i]['release']                = array();

      // Faction
      if($search_type === null)
      {
        if($row['f_id'])
        {
          $data[$i]['faction']['uuid']        = sanitize_json($row['f_uuid']);
          $data[$i]['faction']['name']['en']  = sanitize_json($row['f_name_en']);
          $data[$i]['faction']['name']['fr']  = sanitize_json($row['f_name_fr']);
        }
        else
          $data[$i]['faction']                = array();
      }

      // Type
      if($search_type === null)
      {
        if($row['ct_id'])
        {
          $data[$i]['type']['uuid']       = sanitize_json($row['ct_uuid']);
          $data[$i]['type']['name']['en'] = sanitize_json($row['ct_name_en']);
          $data[$i]['type']['name']['fr'] = sanitize_json($row['ct_name_fr']);
        }
        else
          $data[$i]['type']               = array();
      }

      // Rarity
      if($search_type === null)
      {
        if($row['cr_id'])
        {
          $data[$i]['rarity']['uuid']           = sanitize_json($row['cr_uuid']);
          $data[$i]['rarity']['name']['en']     = sanitize_json($row['cr_name_en']);
          $data[$i]['rarity']['name']['fr']     = sanitize_json($row['cr_name_fr']);
          $data[$i]['rarity']['max_card_count'] = (int)sanitize_json($row['cr_max_count']);
        }
        else
          $data[$i]['rarity']                   = array();
      }

      // Images
      if($row['i_id_en'])
      {
        $data[$i]['images']['en']['uuid']     = sanitize_json($row['i_uuid_en']);
        $data[$i]['images']['en']['path']     = sanitize_json($GLOBALS['website_url'].$row['i_path_en']);
      }
      if($row['i_id_fr'])
      {
        $data[$i]['images']['fr']['uuid']     = sanitize_json($row['i_uuid_fr']);
        $data[$i]['images']['fr']['path']     = sanitize_json($GLOBALS['website_url'].$row['i_path_fr']);
      }
      if(!$row['i_id_en'] && !$row['i_id_fr'])
        $data[$i]['images']                   = array();

      // Arsenals
      if($search_type === null)
      {
        $data[$i]['arsenals']['uuids']        = ($row['ar_uuids']) ? explode(', ', $row['ar_uuids']) : array();
        $data[$i]['arsenals']['names']['en']  = ($row['ar_names_en']) ? explode(', ', $row['ar_names_en']) : array();
        $data[$i]['arsenals']['names']['fr']  = ($row['ar_names_fr']) ? explode(', ', $row['ar_names_fr']) : array();
      }

      // Tags
      if($search_type === null)
      {
        $data[$i]['tags']['uuids']  = ($row['ct_uuids']) ? explode(', ', $row['ct_uuids']) : array();
        $data[$i]['tags']['names']  = ($row['ct_names']) ? explode(', ', $row['ct_names']) : array();
      }
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('cards' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a card to the database.
 *
 * @param   array   $data  An array containing the card's data.
 *
 * @return  void
 */

function cards_add( array $data ) : void
{
  // Sanitize the data
  $card_name_en     = sanitize_array_element($data, 'name_en', 'string');
  $card_name_fr     = sanitize_array_element($data, 'name_fr', 'string');
  $card_type        = sanitize_array_element($data, 'type', 'int');
  $card_faction     = sanitize_array_element($data, 'faction', 'int');
  $card_rarity      = sanitize_array_element($data, 'rarity', 'int');
  $card_release     = sanitize_array_element($data, 'release', 'int');
  $card_image_en    = sanitize_array_element($data, 'image_en', 'int', default: 0);
  $card_image_fr    = sanitize_array_element($data, 'image_fr', 'int', default: 0);
  $card_hidden      = sanitize_array_element($data, 'hidden', 'bool', default: false);
  $card_extra       = sanitize_array_element($data, 'extra', 'bool', default: false);
  $card_weapons     = sanitize_array_element($data, 'weapons', 'int');
  $card_durability  = sanitize_array_element($data, 'durability', 'int');
  $card_cost        = sanitize_array_element($data, 'cost', 'string');
  $card_income      = sanitize_array_element($data, 'income', 'string');
  $card_body_en     = sanitize_array_element($data, 'body_en', 'string');
  $card_body_fr     = sanitize_array_element($data, 'body_fr', 'string');

  // Add the card to the database
  query(" INSERT INTO cards
          SET         cards.uuid              = UUID()              ,
                      cards.fk_releases       = '$card_release'     ,
                      cards.fk_images_en      = '$card_image_en'    ,
                      cards.fk_images_fr      = '$card_image_fr'    ,
                      cards.fk_factions       = '$card_faction'     ,
                      cards.fk_card_types     = '$card_type'        ,
                      cards.fk_card_rarities  = '$card_rarity'      ,
                      cards.is_extra_card     = '$card_extra'       ,
                      cards.is_hidden         = '$card_hidden'      ,
                      cards.name_en           = '$card_name_en'     ,
                      cards.name_fr           = '$card_name_fr'     ,
                      cards.cost              = '$card_cost'        ,
                      cards.income            = '$card_income'      ,
                      cards.weapons           = '$card_weapons'     ,
                      cards.durability        = '$card_durability'  ,
                      cards.body_en           = '$card_body_en'     ,
                      cards.body_fr           = '$card_body_fr'     ");

  // Get the newly created card's id
  $card_id = sanitize(query_id(), "int");

  // Give the card a slug
  cards_generate_slug($card_id);

  // Fetch a list of card tags
  $card_tags = tags_list(search: array('ftype' => 'Card'));

  // Add the card's tags to the database
  for($i = 0; $i < $card_tags['rows']; $i++)
  {
    $tag_id = $card_tags[$i]['id'];
    if($data['card_tags'][$card_tags[$i]['id']])
      query(" INSERT INTO tags_cards
              SET         tags_cards.fk_cards = '$card_id' ,
                          tags_cards.fk_tags   = '$tag_id'   ");
  }
}




/**
 * Edits a card in the database.
 *
 * @param   int         $card_id   The id of the card to edit.
 * @param   array       $data      An array containing the card's data.
 *
 * @return  void
 */

function cards_edit( int   $card_id ,
                     array $data     ) : void
{
  // Sanitize the data
  $card_id          = sanitize($card_id, 'int');
  $card_name_en     = sanitize_array_element($data, 'name_en', 'string');
  $card_name_fr     = sanitize_array_element($data, 'name_fr', 'string');
  $card_image_en    = sanitize_array_element($data, 'image_en', 'int');
  $card_image_fr    = sanitize_array_element($data, 'image_fr', 'int');
  $card_type        = sanitize_array_element($data, 'type_id', 'int');
  $card_faction     = sanitize_array_element($data, 'faction_id', 'int');
  $card_rarity      = sanitize_array_element($data, 'rarity_id', 'int');
  $card_release     = sanitize_array_element($data, 'release_id', 'int');
  $card_hidden      = sanitize_array_element($data, 'hidden', 'bool');
  $card_extra       = sanitize_array_element($data, 'extra', 'bool');
  $card_weapons     = sanitize_array_element($data, 'weapons', 'int');
  $card_cost        = sanitize_array_element($data, 'cost', 'string');
  $card_durability  = sanitize_array_element($data, 'durability', 'string');
  $card_income      = sanitize_array_element($data, 'income', 'string');
  $card_body_en     = sanitize_array_element($data, 'body_en', 'string');
  $card_body_fr     = sanitize_array_element($data, 'body_fr', 'string');

  // Stop here if the card does not exist
  if(!database_row_exists('cards', $card_id))
    return;

  // Edit the card and reset its slug
  query(" UPDATE  cards
          SET     cards.slug              = ''                  ,
                  cards.name_en           = '$card_name_en'     ,
                  cards.name_fr           = '$card_name_fr'     ,
                  cards.fk_images_en      = '$card_image_en'    ,
                  cards.fk_images_fr      = '$card_image_fr'    ,
                  cards.fk_card_types     = '$card_type'        ,
                  cards.fk_factions       = '$card_faction'     ,
                  cards.fk_card_rarities  = '$card_rarity'      ,
                  cards.fk_releases       = '$card_release'     ,
                  cards.is_hidden         = '$card_hidden'      ,
                  cards.is_extra_card     = '$card_extra'       ,
                  cards.weapons           = '$card_weapons'     ,
                  cards.cost              = '$card_cost'        ,
                  cards.durability        = '$card_durability'  ,
                  cards.income            = '$card_income'      ,
                  cards.body_en           = '$card_body_en'     ,
                  cards.body_fr           = '$card_body_fr'
          WHERE   cards.id                = '$card_id' ");

  // Regenerate the card's slug
  cards_generate_slug($card_id);

  // Fetch a list of card tags
  $card_tags = tags_list(search: array('ftype' => 'Card'));

  // Update the card's tags in the database
  for($i = 0; $i < $card_tags['rows']; $i++)
  {
    // Check the current status of each tag
    $tag_id = $card_tags[$i]['id'];
    $tag_check = query("  SELECT  tags_cards.id AS 'ti_id'
                          FROM    tags_cards
                          WHERE   tags_cards.fk_cards = '$card_id'
                          AND     tags_cards.fk_tags  = '$tag_id' ",
                          fetch_row: true);

    // Create missing tags
    if($data['card_tags'][$card_tags[$i]['id']] && is_null($tag_check))
      query(" INSERT INTO tags_cards
              SET         tags_cards.fk_cards = '$card_id' ,
                          tags_cards.fk_tags  = '$tag_id'   ");

    // Delete extraneous tags
    if(!$data['card_tags'][$card_tags[$i]['id']] && !is_null($tag_check))
      query(" DELETE FROM tags_cards
              WHERE       tags_cards.fk_cards = '$card_id'
              AND         tags_cards.fk_tags  = '$tag_id'   ");
  }
}




/**
 * Deletes a card from the database.
 *
 * @param   int     $card_id  The id of the card to delete.
 *
 * @return  void
 */

function cards_delete( int $card_id ) : void
{
  // Sanitize the data
  $card_id = sanitize($card_id, 'int');

  // Delete the card from the database
  query(" DELETE FROM cards
          WHERE       cards.id = '$card_id' ");

  // Delete the card's tags from the database
  query(" DELETE FROM tags_cards
          WHERE       tags_cards.fk_cards = '$card_id' ");
}




/**
 * Generates a unique slug identifier for a card.
 *
 * @param   string  $card_id  The id of the card.
 *
 * @return  void
 */

function cards_generate_slug( string $card_id ) : void
{
  // Sanitize the card's id
  $card_id = sanitize($card_id, 'int');

  // Make sure the card exists
  if(!database_row_exists('cards', $card_id))
    return;

  // Grab the card's name and release
  $card_data = query("  SELECT    cards.id          AS 'c_id'       ,
                                  cards.name_en     AS 'c_name_en'  ,
                                  releases.name_en  AS 'r_name_en'
                        FROM      cards
                        LEFT JOIN releases ON cards.fk_releases = releases.id
                        WHERE     cards.id = '$card_id' ",
                        fetch_row: true);

  // Assemble a tentative slug
  $release      = ($card_data['r_name_en'])
                ? preg_replace("/[^a-zA-Z0-9]/", "", $card_data['r_name_en'])
                : 'card';
  $name         = ($card_data['c_name_en'])
                ? preg_replace("/[^a-zA-Z0-9]/", "", $card_data['c_name_en'])
                : $card_data['c_id'];
  $slug_release = string_truncate(string_change_case($release, 'lowercase'), 10);
  $slug_name    = string_truncate(string_change_case($name, 'lowercase'), 29);
  $slug         = $slug_release.'-'.$slug_name;

  // Increment the slug until it's unique
  while(database_entry_exists('cards', 'slug', $slug))
    $slug = string_increment($slug);

  // Sanitize the slug
  $slug = sanitize($slug, 'string');

  // Update the slug in the database
  query(" UPDATE  cards
          SET     cards.slug = '$slug'
          WHERE   cards.id   = '$card_id' ");
}




/**
 * Regenerates all card slugs.
 *
 * @return void
 */

function cards_regenerate_all_slugs() : void
{
  // Delete all existing card slugs
  query(" UPDATE  cards
          SET     cards.slug = '' ");

  // Fetch every card's id
  $cards = query("  SELECT  cards.id AS 'c_id'
                    FROM    cards ");

  // Loop through all cards
  for($i = 0; $row = query_row($cards); $i++)
  {
    // Regenerate the card's slug
    cards_generate_slug($row['c_id']);
  }
}




/**
 * Formats a card's body.
 *
 * @param   string  $body  The card's body.
 *
 * @return  string        The formatted body.
 */

function cards_format_body( string $body ) : string
{
  // Get the path to the website's root
  $path = root_path();

  // Transform line breaks
  $body = nl2br($body);

  // Replace formatting tags
  $body = preg_replace('/<b>(.*?)<\/b>/is', "<span class=\"bold\">$1</span>", $body);
  $body = preg_replace('/<i>(.*?)<\/i>/is', "<span class=\"italics\">$1</span>", $body);

  // Add resource icons
  $body = preg_replace('/\[T\]/is', "<img src=\"".$path
                      ."/img/gameicons/oil.png\" alt=\"[T]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[I\]/is', "<img src=\"".$path
                      ."/img/gameicons/tech.png\" alt=\"[I]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[O\]/is', "<img src=\"".$path
                      ."/img/gameicons/life.png\" alt=\"[O]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[P\]/is', "<img src=\"".$path
                      ."/img/gameicons/scrap.png\" alt=\"[P]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[X\]/is', "<img src=\"".$path
                      ."/img/gameicons/credits.png\" alt=\"[X]\" class=\"valign_middle gameicon\">", $body);

  // Add card type icons
  $body = preg_replace('/\[S\]/is', "<img src=\"".$path
                      ."/img/gameicons/ship.png\" alt=\"[S]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[A\]/is', "<img src=\"".$path
                      ."/img/gameicons/action.png\" alt=\"[A]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[R\]/is', "<img src=\"".$path
                      ."/img/gameicons/reaction.png\" alt=\"[R]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[B\]/is', "<img src=\"".$path
                      ."/img/gameicons/structure.png\" alt=\"[B]\" class=\"valign_middle gameicon\">", $body);

  // Return the formatted card body
  return $body;
}




/**
 * Format a card's cost.
 *
 * @param   string  $cost  The card's cost.
 *
 * @return  string        The formatted cost.
 */

function cards_format_cost( string $cost ) : string
{
  // Get the path to the website's root
  $path = root_path();

  // Map replacement of letters with icons
  $icons = array(
    'T' => "<img src=\"".$path."/img/gameicons/oil.png\" alt=\"T\" class=\"valign_middle gameicon\">"     ,
    'I' => "<img src=\"".$path."/img/gameicons/tech.png\" alt=\"I\" class=\"valign_middle gameicon\">"    ,
    'O' => "<img src=\"".$path."/img/gameicons/life.png\" alt=\"O\" class=\"valign_middle gameicon\">"    ,
    'P' => "<img src=\"".$path."/img/gameicons/scrap.png\" alt=\"P\" class=\"valign_middle gameicon\">"   ,
    'X' => "<img src=\"".$path."/img/gameicons/credits.png\" alt=\"X\" class=\"valign_middle gameicon\">"
  );

  // Replace the letters with icons
  $cost = strtr($cost, $icons);

  // Return the formatted card cost
  return $cost;
}




/**
 * Formats a ruling linked to a card.
 *
 * @param   string  $ruling_text  The ruling text.
 *
 * @return  string                The formatted ruling text.
 */

function cards_format_rulings(  string $ruling_body     ,
                                string $format = 'html' ) : string
{
  // Find all matches of card links
  $pattern = '/\{\{card\|([^|]+)\|([^}]+)\}\}/';
  preg_match_all($pattern, $ruling_body, $matches, PREG_SET_ORDER);

  // Replace them with the proper content
  foreach ($matches as $match)
  {
    $card_name    = $match[2];
    $card_slug    = $match[1];

    // Use a link when displaying on the website
    if($format === 'html')
    {
      $card_link    = __link('pages/card/'.$card_slug, $card_name, popup: true);
      $ruling_body  = str_replace($match[0], $card_link, $ruling_body);
    }

    // Use the plain name when displaying in the API
    if($format === 'api')
      $ruling_body  = str_replace($match[0], $card_name, $ruling_body);
  }

  // Return the formatted body
  return $ruling_body;
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    CARD TYPES                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a card type.
 *
 * @param   int         $card_type_id                 The id of the card type.
 * @param   string      $format                       Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null               An array containing the card type's data, or null if the card type does not exist.
 */

function card_types_get( int    $card_type_id              ,
                         string $format           = 'html' ,
                         bool   $no_parent_array  = false  ) : array|null
{
  // Sanitize the card type's id
  $card_type_id = sanitize($card_type_id, 'int');

  // Return null if the card type does not exist
  if(!database_row_exists('card_types', $card_type_id))
    return null;

  // Fetch the card type's data
  $card_type_data = query(" SELECT  card_types.id             AS 'c_id'       ,
                                    card_types.uuid           AS 'c_uuid'     ,
                                    card_types.sorting_order  AS 'c_order'    ,
                                    card_types.name_en        AS 'c_name_en'  ,
                                    card_types.name_fr        AS 'c_name_fr'  ,
                                    card_types.styling        AS 'c_styling'
                            FROM    card_types
                            WHERE   card_types.id = '$card_type_id' ",
                            fetch_row: true);

  // Assemble an array with the card type's data
  if($format === 'html')
  {
    $data['id']       = sanitize_output($card_type_data['c_id']);
    $data['order']    = sanitize_output($card_type_data['c_order']);
    $data['name_en']  = sanitize_output($card_type_data['c_name_en']);
    $data['name_fr']  = sanitize_output($card_type_data['c_name_fr']);
    $data['styling']  = sanitize_output($card_type_data['c_styling']);
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data['uuid']       = sanitize_json($card_type_data['c_uuid']);
    $data['name']['en'] = sanitize_json($card_type_data['c_name_en']);
    $data['name']['fr'] = sanitize_json($card_type_data['c_name_fr']);

    // Prepare the data structure
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('card_type' => $data);
  }

  // Return the card type's data
  return $data;
}




/**
 * Lists card types in the database.
 *
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the card types.
 */

function card_types_list( string $format = 'html' ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the card types
  $card_types = query(" SELECT    card_types.id             AS 'c_id'       ,
                                  card_types.uuid           AS 'c_uuid'     ,
                                  card_types.sorting_order  AS 'c_order'    ,
                                  card_types.name_en        AS 'c_name_en'  ,
                                  card_types.name_fr        AS 'c_name_fr'  ,
                                  card_types.name_$lang     AS 'c_name'     ,
                                  card_types.styling        AS 'c_styling'
                        FROM      card_types
                        ORDER BY  card_types.sorting_order ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($card_types); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']       = sanitize_output($row['c_id']);
      $data[$i]['order']    = sanitize_output($row['c_order']);
      $data[$i]['name']     = sanitize_output($row['c_name']);
      $data[$i]['styling']  = sanitize_output($row['c_styling']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']       = sanitize_json($row['c_uuid']);
      $data[$i]['type']['en'] = sanitize_json($row['c_name_en']);
      $data[$i]['type']['fr'] = sanitize_json($row['c_name_fr']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('card_types' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a card type to the database.
 *
 * @param   array   $data  An array containing the card type's data.
 *
 * @return  void
 */

function card_types_add( array $data ) : void
{
  // Sanitize the data
  $card_type_order    = sanitize_array_element($data, 'order', 'int');
  $card_type_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $card_type_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $card_type_styling  = sanitize_array_element($data, 'styling', 'string');

  // Add the card type to the database
  query(" INSERT INTO card_types
          SET         card_types.uuid           = UUID()                ,
                      card_types.sorting_order  = '$card_type_order'    ,
                      card_types.name_en        = '$card_type_name_en'  ,
                      card_types.name_fr        = '$card_type_name_fr'  ,
                      card_types.styling        = '$card_type_styling'  ");
}




/**
 * Edits a card type in the database.
 *
 * @param   int         $card_type_id   The id of the card type to edit.
 * @param   array       $data           An array containing the card type's data.
 *
 * @return  void
 */

function card_types_edit( int   $card_type_id ,
                          array $data         ) : void
{
  // Sanitize the data
  $card_type_id       = sanitize($card_type_id, 'int');
  $card_type_order    = sanitize_array_element($data, 'order', 'int');
  $card_type_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $card_type_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $card_type_styling  = sanitize_array_element($data, 'styling', 'string');

  // Stop here if the card type does not exist
  if(!database_row_exists('card_types', $card_type_id))
    return;

  // Edit the card type
  query(" UPDATE  card_types
          SET     card_types.sorting_order  = '$card_type_order'    ,
                  card_types.name_en        = '$card_type_name_en'  ,
                  card_types.name_fr        = '$card_type_name_fr'  ,
                  card_types.styling        = '$card_type_styling'
          WHERE   card_types.id             = '$card_type_id' ");
}




/**
 * Deletes a card type from the database.
 *
 * @param   int     $card_type_id  The id of the card type to delete.
 *
 * @return  void
 */

function card_types_delete( int $card_type_id ) : void
{
  // Sanitize the data
  $card_type_id = sanitize($card_type_id, 'int');

  // Delete the card type from the database
  query(" DELETE FROM card_types
          WHERE       card_types.id = '$card_type_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                   CARD RARITIES                                                   */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a card rarity.
 *
 * @param   int         $card_rarity_id               The id of the card rarity.
 * @param   string      $format                       Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null                    An array containing the card rarity's data, or null if it does not exist.
 */

function card_rarities_get( int    $card_rarity_id            ,
                            string $format           = 'html' ,
                            bool   $no_parent_array  = false  ) : array|null
{
  // Sanitize the card rarity's id
  $card_rarity_id = sanitize($card_rarity_id, 'int');

  // Return null if the card rarity does not exist
  if(!database_row_exists('card_rarities', $card_rarity_id))
    return null;

  // Fetch the card rarity's data
  $card_rarity_data = query(" SELECT  card_rarities.id              AS 'r_id'         ,
                                      card_rarities.uuid            AS 'r_uuid'       ,
                                      card_rarities.sorting_order   AS 'r_order'      ,
                                      card_rarities.name_en         AS 'r_name_en'    ,
                                      card_rarities.name_fr         AS 'r_name_fr'    ,
                                      card_rarities.max_card_count  AS 'r_max_count'  ,
                                      card_rarities.styling         AS 'r_styling'
                            FROM      card_rarities
                            WHERE     card_rarities.id = '$card_rarity_id' ",
                            fetch_row: true);

  // Assemble an array with the card rarity's data
  if($format === 'html')
  {
    $data['id']         = sanitize_output($card_rarity_data['r_id']);
    $data['order']      = sanitize_output($card_rarity_data['r_order']);
    $data['name_en']    = sanitize_output($card_rarity_data['r_name_en']);
    $data['name_fr']    = sanitize_output($card_rarity_data['r_name_fr']);
    $data['max_count']  = sanitize_output($card_rarity_data['r_max_count']);
    $data['styling']    = sanitize_output($card_rarity_data['r_styling']);
  }
  else if($format === 'api')
  {
    $data['uuid']           = sanitize_json($card_rarity_data['r_uuid']);
    $data['max_card_count'] = (int)sanitize_json($card_rarity_data['r_max_count']);
    $data['name']['en']     = sanitize_json($card_rarity_data['r_name_en']);
    $data['name']['fr']     = sanitize_json($card_rarity_data['r_name_fr']);
  }

  // Return the card rarity's data
  return $data;
}




/**
 * Lists card rarities in the database.
 *
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the card rarities.
 */

function card_rarities_list( string  $format = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the card rarities
  $card_rarities = query("  SELECT    card_rarities.id              AS 'r_id'         ,
                                      card_rarities.uuid            AS 'r_uuid'       ,
                                      card_rarities.sorting_order   AS 'r_order'      ,
                                      card_rarities.name_en         AS 'r_name_en'    ,
                                      card_rarities.name_fr         AS 'r_name_fr'    ,
                                      card_rarities.name_$lang      AS 'r_name'       ,
                                      card_rarities.max_card_count  AS 'r_max_count'  ,
                                      card_rarities.styling         AS 'r_styling'
                            FROM      card_rarities
                            ORDER BY  card_rarities.sorting_order ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($card_rarities); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']         = sanitize_output($row['r_id']);
      $data[$i]['name']       = sanitize_output($row['r_name']);
      $data[$i]['order']      = sanitize_output($row['r_order']);
      $data[$i]['max_count']  = sanitize_output($row['r_max_count']);
      $data[$i]['styling']    = sanitize_output($row['r_styling']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']           = sanitize_json($row['r_uuid']);
      $data[$i]['max_card_count'] = (int)sanitize_json($row['r_max_count']);
      $data[$i]['name']['en']     = sanitize_json($row['r_name_fr']);
      $data[$i]['name']['fr']     = sanitize_json($row['r_name_en']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('card_rarities' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a card rarity to the database.
 *
 * @param   array   $data  An array containing the card rarity's data.
 *
 * @return  void
 */

function card_rarities_add( array $data ) : void
{
  // Sanitize the data
  $card_rarity_order    = sanitize_array_element($data, 'order', 'int');
  $card_rarity_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $card_rarity_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $card_rarity_max      = sanitize_array_element($data, 'max', 'int', min: 0, default: 0);
  $card_rarity_styling  = sanitize_array_element($data, 'styling', 'string');

  // Add the card rarity to the database
  query(" INSERT INTO card_rarities
          SET         card_rarities.uuid            = UUID()                  ,
                      card_rarities.sorting_order   = '$card_rarity_order'    ,
                      card_rarities.name_en         = '$card_rarity_name_en'  ,
                      card_rarities.name_fr         = '$card_rarity_name_fr'  ,
                      card_rarities.max_card_count  = '$card_rarity_max'      ,
                      card_rarities.styling         = '$card_rarity_styling'  ");
}




/**
 * Edits a card rarity in the database.
 *
 * @param   int         $card_rarity_id   The id of the card rarity to edit.
 * @param   array       $data             An array containing the card rarity's data.
 *
 * @return  void
 */

function card_rarities_edit( int   $card_rarity_id ,
                             array $data         ) : void
{
  // Sanitize the data
  $card_rarity_id       = sanitize($card_rarity_id, 'int');
  $card_rarity_order    = sanitize_array_element($data, 'order', 'int');
  $card_rarity_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $card_rarity_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $card_rarity_max      = sanitize_array_element($data, 'max', 'int', min: 0, default: 0);
  $card_rarity_styling  = sanitize_array_element($data, 'styling', 'string');

  // Stop here if the card rarity does not exist
  if(!database_row_exists('card_rarities', $card_rarity_id))
    return;

  // Edit the card rarity
  query(" UPDATE  card_rarities
          SET     card_rarities.sorting_order   = '$card_rarity_order'    ,
                  card_rarities.name_en         = '$card_rarity_name_en'  ,
                  card_rarities.name_fr         = '$card_rarity_name_fr'  ,
                  card_rarities.max_card_count  = '$card_rarity_max'      ,
                  card_rarities.styling         = '$card_rarity_styling'
          WHERE   card_rarities.id              = '$card_rarity_id' ");
}




/**
 * Deletes a card rarity from the database.
 *
 * @param   int     $card_rarity_id  The id of the card rarity to delete.
 *
 * @return  void
 */

function card_rarities_delete( int $card_rarity_id ) : void
{
  // Sanitize the data
  $card_rarity_id = sanitize($card_rarity_id, 'int');

  // Delete the card rarity from the database
  query(" DELETE FROM card_rarities
          WHERE       card_rarities.id = '$card_rarity_id' ");
}