<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  arsenals_get                    Returns data related to an arsenal                                               */
/*  arsenals_list                   Lists arsenals in the database                                                   */
/*  arsenals_add                    Adds an arsenal to the database                                                  */
/*  arsenals_edit                   Edits an arsenal in the database                                                 */
/*  arsenals_delete                 Deletes an arsenal from the database                                             */
/*                                                                                                                   */
/*  arsenals_generate_slug          Generates a unique slug identifier for an arsenal                                */
/*  arsenals_regenerate_all_slugs   Regenerates all arsenal slugs                                                    */
/*  arsenals_update_card_data       Recalculates the data related to cards linked to an arsenal                      */
/*                                                                                                                   */
/*  arsenal_difficulties_get        Returns data related to an arsenal difficulty level                              */
/*  arsenal_difficulties_list       Lists arsenal difficulty levels in the database                                  */
/*  arsenal_difficulties_add        Adds an arsenal difficulty level to the database                                 */
/*  arsenal_difficulties_edit       Edits an arsenal difficulty level in the database                                */
/*  arsenal_difficulties_delete     Deletes an arsenal difficulty level from the database                            */
/*                                                                                                                   */
/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    ARSENALS                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to an arsenal.
 *
 * @param   int         $arsenal_id   (OPTIONAL)  The arsenal's id.
 * @param   string      $arsenal_uuid (OPTIONAL)  The arsenal's uuid.
 * @param   string      $arsenal_slug (OPTIONAL)  The arsenal's slug.
 * @param   string      $format       (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth     (OPTIONAL)  Whether to include elements linked to the arsenal in the API.
 * @param   bool        $card_list    (OPTIONAL)  Sort the cards in the arsenal for public card list display.
 *
 * @return  array|null                            An array containing the arsenal's data, or null if it doesn't exist.
 */

function arsenals_get(  int     $arsenal_id   = null    ,
                        string  $arsenal_uuid = null    ,
                        string  $arsenal_slug = null    ,
                        string  $format       = 'html'  ,
                        bool    $no_depth     = false   ,
                        bool    $card_list    = false   ) : array|null
{
  // Return null if there are neither an id, an uuid, or a slug
  if(!$arsenal_id && !$arsenal_uuid && !$arsenal_slug)
    return null;

  // Sanitize the arsenal's id, uuid, and slug
  $arsenal_id   = sanitize($arsenal_id, 'int');
  $arsenal_uuid = sanitize($arsenal_uuid, 'string');
  $arsenal_slug = sanitize($arsenal_slug, 'string');

  // Return null if the arsenal does not have a valid ID
  if($arsenal_id && !database_row_exists('arsenals', $arsenal_id))
    return null;

  // Return null if the arsenal does not have a valid UUID
  if($arsenal_uuid && !database_entry_exists('arsenals', 'uuid', $arsenal_uuid))
    return null;

  // Return null if the arsenal does not have a valid slug
  if($arsenal_slug && !database_entry_exists('arsenals', 'slug', $arsenal_slug))
    return null;

  // Prepare the condition for retrieving the arsenal
  if($arsenal_id)
    $query_where = " WHERE arsenals.id = '$arsenal_id' ";
  else if($arsenal_uuid)
    $query_where = " WHERE arsenals.uuid = '$arsenal_uuid' ";
  else if($arsenal_slug)
    $query_where = " WHERE arsenals.slug = '$arsenal_slug' ";

  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the arsenal's data
  $arsenal_data = query(" SELECT      arsenals.id                       AS 'a_id'           ,
                                      arsenals.uuid                     AS 'a_uuid'         ,
                                      arsenals.fk_releases              AS 'a_release_id'   ,
                                      arsenals.fk_formats               AS 'a_format_id'    ,
                                      arsenals.fk_arsenal_difficulties  AS 'a_level_id'     ,
                                      arsenals.fk_images_en             AS 'a_image_id_en'  ,
                                      arsenals.fk_images_fr             AS 'a_image_id_fr'  ,
                                      arsenals.card_count               AS 'a_count'        ,
                                      arsenals.reserves_count           AS 'a_rcount'       ,
                                      arsenals.extra_count              AS 'a_ecount'       ,
                                      arsenals.is_hidden                AS 'a_hidden'       ,
                                      arsenals.name_en                  AS 'a_name_en'      ,
                                      arsenals.name_fr                  AS 'a_name_fr'      ,
                                      arsenals.name_$lang               AS 'a_name'         ,
                                      arsenals.slug                     AS 'a_slug'         ,
                                      arsenals.playstyle_en             AS 'a_playstyle_en' ,
                                      arsenals.playstyle_fr             AS 'a_playstyle_fr' ,
                                      arsenals.playstyle_$lang          AS 'a_playstyle'    ,
                                      arsenals.summary_en               AS 'a_summary_en'   ,
                                      arsenals.summary_fr               AS 'a_summary_fr'   ,
                                      arsenals.summary_$lang            AS 'a_summary'      ,
                                      arsenals.gameplan_en              AS 'a_gameplan_en'  ,
                                      arsenals.gameplan_fr              AS 'a_gameplan_fr'  ,
                                      arsenals.gameplan_$lang           AS 'a_gameplan'     ,
                                      arsenals.reserves_en              AS 'a_reserves_en'  ,
                                      arsenals.reserves_fr              AS 'a_reserves_fr'  ,
                                      arsenals.reserves_$lang           AS 'a_reserves'     ,
                                      arsenals.extra_en                 AS 'a_extra_en'     ,
                                      arsenals.extra_fr                 AS 'a_extra_fr'     ,
                                      arsenals.extra_$lang              AS 'a_extra'        ,
                                      releases.uuid                     AS 'r_uuid'         ,
                                      releases.name_en                  AS 'r_name_en'      ,
                                      releases.name_fr                  AS 'r_name_fr'      ,
                                      releases.name_$lang               AS 'r_name'         ,
                                      releases.release_date             AS 'r_date'         ,
                                      formats.uuid                      AS 'f_uuid'         ,
                                      formats.name_en                   AS 'f_name_en'      ,
                                      formats.name_fr                   AS 'f_name_fr'      ,
                                      formats.name_$lang                AS 'f_name'         ,
                                      arsenal_difficulties.uuid         AS 'ad_uuid'        ,
                                      arsenal_difficulties.name_en      AS 'ad_name_en'     ,
                                      arsenal_difficulties.name_fr      AS 'ad_name_fr'     ,
                                      arsenal_difficulties.name_$lang   AS 'ad_name'        ,
                                      images_en.uuid                    AS 'ai_en_uuid'     ,
                                      images_en.path                    AS 'ai_en_path'     ,
                                      images_fr.uuid                    AS 'ai_fr_uuid'     ,
                                      images_fr.path                    AS 'ai_fr_path'     ,
                                      images_$lang.path                 AS 'ai_path'        ,
                                      images_$lang.name                 AS 'ai_name'        ,
                                      COUNT(DISTINCT factions.id)       AS 'af_count'       ,
                                      GROUP_CONCAT( DISTINCT factions.name_$lang
                                                    ORDER BY factions.sorting_order ASC
                                                    SEPARATOR ', ')     AS 'af_names'
                            FROM      arsenals
                            LEFT JOIN releases  ON arsenals.fk_releases = releases.id
                            LEFT JOIN formats   ON arsenals.fk_formats  = formats.id
                            LEFT JOIN arsenal_difficulties
                                   ON arsenals.fk_arsenal_difficulties  = arsenal_difficulties.id
                            LEFT JOIN images AS images_en
                                   ON arsenals.fk_images_en = images_en.id
                            LEFT JOIN images AS images_fr
                                   ON arsenals.fk_images_fr = images_fr.id
                            LEFT JOIN arsenals_factions ON arsenals.id = arsenals_factions.fk_arsenals
                            LEFT JOIN factions          ON arsenals_factions.fk_factions = factions.id
                            $query_where
                            GROUP BY  arsenals.id ",
                            fetch_row: true);

  // Don't retrieve hidden cards through the API
  if($format === 'api' && $arsenal_data['a_hidden'])
    return null;

  // Sanitize the arsenal's id
  $arsenal_id = sanitize($arsenal_data['a_id'], 'int');

  // Fetch linked factions
  $qfactions = query("  SELECT    arsenals_factions.fk_factions AS 'f_id'
                        FROM      arsenals_factions
                        WHERE     arsenals_factions.fk_arsenals = '$arsenal_id' ");

  // Fetch linked factions
  $qfactions = query("  SELECT    factions.id       AS 'f_id'       ,
                                  factions.uuid     AS 'f_uuid'     ,
                                  factions.name_en  AS 'f_name_en'  ,
                                  factions.name_fr  AS 'f_name_fr'
                        FROM      arsenals_factions
                        LEFT JOIN factions ON arsenals_factions.fk_factions = factions.id
                        WHERE     arsenals_factions.fk_arsenals = '$arsenal_id' ");

  // Don't show hidden or extra cards in the API or in the public card list
  $query_where = ($format === 'api' || $card_list) ? '  AND cards.is_hidden     = 0
                                                        AND cards.is_extra_card = 0 ' : "";

  // Prepare the sorting order for linked cards
  if($card_list)
    $query_sort_cards = " ORDER BY  LENGTH(cards.cost)        ASC ,
                                    card_types.sorting_order  ASC ,
                                    cards.name_$lang          ASC ";
  else
    $query_sort_cards = " ORDER BY  arsenals_compositions.amount_main   = 0   ,
                                    arsenals_compositions.sorting_order ASC   ,
                                    cards.name_en                       ASC   ";

  // Fetch linked cards
  $qcards = query(" SELECT    cards.uuid                            AS 'c_uuid'     ,
                              cards.name_en                         AS 'c_name_en'  ,
                              cards.name_fr                         AS 'c_name_fr'  ,
                              cards.name_$lang                      AS 'c_name'     ,
                              cards.slug                            AS 'c_slug'     ,
                              images_$lang.path                     AS 'i_path'     ,
                              arsenals_compositions.fk_cards        AS 'c_id'       ,
                              arsenals_compositions.amount_main     AS 'c_main'     ,
                              arsenals_compositions.amount_reserves AS 'c_reserves' ,
                              arsenals_compositions.is_extra        AS 'c_extra'    ,
                              arsenals_compositions.sorting_order   AS 'c_order'
                    FROM      arsenals_compositions
                    LEFT JOIN cards               ON arsenals_compositions.fk_cards = cards.id
                    LEFT JOIN card_types          ON cards.fk_card_types            = card_types.id
                    LEFT JOIN images AS images_en ON images_en.id                   = cards.fk_images_en
                    LEFT JOIN images AS images_fr ON images_fr.id                   = cards.fk_images_fr
                    WHERE     arsenals_compositions.fk_arsenals = '$arsenal_id'
                    $query_where
                    $query_sort_cards ");

  // Fetch linked tags
  $qtags = query("  SELECT    tags.uuid               AS 't_uuid' ,
                              tags.name               AS 't_name' ,
                              tags.description_$lang  AS 't_desc' ,
                              tags_arsenals.fk_tags   AS 'ct_id'
                    FROM      tags_arsenals
                    LEFT JOIN tags ON tags_arsenals.fk_tags = tags.id
                    WHERE     tags_arsenals.fk_arsenals = '$arsenal_id' ");

  // Prepare the data for display
  if($format === 'html')
  {
    // Arsenal data
    $data['id']           = sanitize_output($arsenal_data['a_id']);
    $data['release']      = sanitize_output($arsenal_data['a_release_id']);
    $data['release_name'] = sanitize_output($arsenal_data['r_name']);
    $data['format']       = sanitize_output($arsenal_data['a_format_id']);
    $data['format_name']  = sanitize_output($arsenal_data['f_name']);
    $data['difficulty']   = sanitize_output($arsenal_data['a_level_id']);
    $data['diff_name']    = sanitize_output($arsenal_data['ad_name']);
    $data['faction_list'] = sanitize_output($arsenal_data['af_names']);
    $data['nfactions']    = sanitize_output($arsenal_data['af_count']);
    $data['image_id_en']  = sanitize_output($arsenal_data['a_image_id_en']);
    $data['image_id_fr']  = sanitize_output($arsenal_data['a_image_id_fr']);
    $data['image_path']   = sanitize_output($arsenal_data['ai_path']);
    $data['image_name']   = sanitize_output($arsenal_data['ai_name']);
    $data['hidden']       = sanitize_output($arsenal_data['a_hidden']);
    $data['name_en']      = sanitize_output($arsenal_data['a_name_en']);
    $data['name_fr']      = sanitize_output($arsenal_data['a_name_fr']);
    $data['name']         = sanitize_output($arsenal_data['a_name']);
    $data['playstyle_en'] = sanitize_output($arsenal_data['a_playstyle_en']);
    $data['playstyle_fr'] = sanitize_output($arsenal_data['a_playstyle_fr']);
    $data['playstyle']    = sanitize_output($arsenal_data['a_playstyle']);
    $data['summary_en']   = sanitize_output($arsenal_data['a_summary_en']);
    $data['summary_fr']   = sanitize_output($arsenal_data['a_summary_fr']);
    $data['summary']      = sanitize_output($arsenal_data['a_summary']);
    $data['gameplan_en']  = sanitize_output($arsenal_data['a_gameplan_en']);
    $data['gameplan_fr']  = sanitize_output($arsenal_data['a_gameplan_fr']);
    $data['gameplan']     = nl2br($arsenal_data['a_gameplan']);
    $data['reserves_en']  = sanitize_output($arsenal_data['a_reserves_en']);
    $data['reserves_fr']  = sanitize_output($arsenal_data['a_reserves_fr']);
    $data['reserves']     = nl2br($arsenal_data['a_reserves']);
    $data['extra_en']     = sanitize_output($arsenal_data['a_extra_en']);
    $data['extra_fr']     = sanitize_output($arsenal_data['a_extra_fr']);
    $data['extra']        = nl2br($arsenal_data['a_extra']);
    $data['ncards']       = sanitize_output($arsenal_data['a_count']);
    $data['nreserves']    = sanitize_output($arsenal_data['a_rcount']);

    // Page data
    $data['page_title_en']  = sanitize_meta_tags($arsenal_data['a_name_en']);
    $data['page_title_fr']  = sanitize_meta_tags($arsenal_data['a_name_fr']);

    // Faction data
    for($i = 0; $dfactions = query_row($qfactions); $i++)
      $data['factions']['id'][$i] = $dfactions['f_id'];
    $data['factions']['rows'] = $i;

    // Linked card data
    for($i = 0; $dcards = query_row($qcards); $i++)
    {
      $data['cards']['id'][$i]        = $dcards['c_id'];
      $data['cards']['main'][$i]      = $dcards['c_main'];
      $data['cards']['reserves'][$i]  = $dcards['c_reserves'];
      $data['cards']['order'][$i]     = $dcards['c_order'];
      $data['cards']['name'][$i]      = $dcards['c_name'];
      $data['cards']['slug'][$i]      = $dcards['c_slug'];
      $temp_thumb_path                = (isset($dcards['i_path']))
                                      ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $dcards['i_path'])
                                      : '';
      $data['cards']['thumb'][$i]     = sanitize_output($temp_thumb_path);
    }
    $data['cards']['rows'] = $i;

    // Tags
    for($i = 0; $dtags = query_row($qtags); $i++)
    {
      $data['tags'][$i]['name']         = sanitize_json($dtags['t_name']);
      $data['tags'][$i]['description']  = sanitize_json($dtags['t_desc']);
    }
    $data['tags']['count'] = $i;
  }

  // Prepare the data for the API
  if($format === 'api')
  {
    // Sanitize the data
    $data['uuid']                     = sanitize_json($arsenal_data['a_uuid']);
    $data['url']                      = sanitize_json($GLOBALS['website_url']
                                                      .'pages/arsenal/'.$arsenal_data['a_slug']);
    $data['name']['en']               = sanitize_json($arsenal_data['a_name_en']);
    $data['name']['fr']               = sanitize_json($arsenal_data['a_name_fr']);
    $data['playstyle']['en']          = sanitize_json($arsenal_data['a_playstyle_en']);
    $data['playstyle']['fr']          = sanitize_json($arsenal_data['a_playstyle_fr']);
    $data['strategy_summary']['en']   = sanitize_json($arsenal_data['a_summary_en']);
    $data['strategy_summary']['fr']   = sanitize_json($arsenal_data['a_summary_fr']);
    $data['game_plan']['en']          = sanitize_json($arsenal_data['a_gameplan_en']);
    $data['game_plan']['fr']          = sanitize_json($arsenal_data['a_gameplan_fr']);
    $data['reserves_game_plan']['en'] = sanitize_json($arsenal_data['a_reserves_en']);
    $data['reserves_game_plan']['fr'] = sanitize_json($arsenal_data['a_reserves_fr']);
    $data['extra_text']['en']         = sanitize_json($arsenal_data['a_extra_en']);
    $data['extra_text']['fr']         = sanitize_json($arsenal_data['a_extra_fr']);

    // Release
    if($arsenal_data['a_release_id'])
    {
      $data['release']['uuid']        = sanitize_json($arsenal_data['r_uuid']);
      $data['release']['name']['en']  = sanitize_json($arsenal_data['r_name_en']);
      $data['release']['name']['fr']  = sanitize_json($arsenal_data['r_name_fr']);
      $data['release']['date']        = sanitize_json($arsenal_data['r_date']);
    }
    else
      $data['release']                = array();

    // Format
    if($arsenal_data['a_format_id'])
    {
      $data['format']['uuid']       = sanitize_json($arsenal_data['f_uuid']);
      $data['format']['name']['en'] = sanitize_json($arsenal_data['f_name_en']);
      $data['format']['name']['fr'] = sanitize_json($arsenal_data['f_name_fr']);
    }
    else
      $data['format']               = array();

    // Factions
    for($i = 0; $dfactions = query_row($qfactions); $i++)
    {
      $data['factions'][$i]['uuid']       = sanitize_json($dfactions['f_uuid']);
      $data['factions'][$i]['name']['en'] = sanitize_json($dfactions['f_name_en']);
      $data['factions'][$i]['name']['fr'] = sanitize_json($dfactions['f_name_fr']);
    }
    if($i === 0)
      $data['factions']      = array();

    // Difficulty
    if($arsenal_data['a_level_id'])
    {
      $data['difficulty']['uuid']       = sanitize_json($arsenal_data['ad_uuid']);
      $data['difficulty']['name']['en'] = sanitize_json($arsenal_data['ad_name_en']);
      $data['difficulty']['name']['fr'] = sanitize_json($arsenal_data['ad_name_fr']);
    }
    else
      $data['difficulty']               = array();

    // Images
    if($arsenal_data['a_image_id_en'])
    {
      $data['images']['en']['uuid']     = sanitize_json($arsenal_data['ai_en_uuid']);
      $data['images']['en']['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                        .'api/image/'.$arsenal_data['ai_en_uuid']);
      $data['images']['en']['path']     = sanitize_json($GLOBALS['website_url'].$arsenal_data['ai_en_path']);
    }
    if($arsenal_data['a_image_id_fr'])
    {
      $data['images']['fr']['uuid']     = sanitize_json($arsenal_data['ai_fr_uuid']);
      $data['images']['fr']['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                        .'api/image/'.$arsenal_data['ai_fr_uuid']);
      $data['images']['fr']['path']     = sanitize_json($GLOBALS['website_url'].$arsenal_data['ai_fr_path']);
    }
    if(!$arsenal_data['a_image_id_en'] && !$arsenal_data['a_image_id_fr'])
      $data['images']                   = array();

    // Card count
    $data['card_count']['main']     = (int)sanitize_json($arsenal_data['a_count']);
    $data['card_count']['reserves'] = (int)sanitize_json($arsenal_data['a_rcount']);
    $data['card_count']['extras']   = (int)sanitize_json($arsenal_data['a_ecount']);

    // Cards
    if(!$no_depth)
    {
      for($i = 0; $dcards = query_row($qcards); $i++)
      {
        $data['cards'][$i]['uuid']                = sanitize_json($dcards['c_uuid']);
        $data['cards'][$i]['endpoint']            = sanitize_json($GLOBALS['website_url']
                                                                  .'api/card/'.$dcards['c_uuid']);
        $data['cards'][$i]['url']                 = sanitize_json($GLOBALS['website_url']
                                                                  .'pages/card/'.$dcards['c_slug']);
        $data['cards'][$i]['name']['en']          = sanitize_json($dcards['c_name_en']);
        $data['cards'][$i]['name']['fr']          = sanitize_json($dcards['c_name_fr']);
        $data['cards'][$i]['amount']['main']      = (int)sanitize_json($dcards['c_main']);
        $data['cards'][$i]['amount']['reserves']  = (int)sanitize_json($dcards['c_reserves']);
      }
      if($i === 0)
        $data['cards'] = array();
    }

    // Tags
    if(!$no_depth)
    {
      for($i = 0; $dtags = query_row($qtags); $i++)
      {
        $data['tags'][$i]['uuid']     = sanitize_json($dtags['t_uuid']);
        $data['tags'][$i]['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                      .'api/card/'.$dtags['t_uuid']);
        $data['tags'][$i]['name']     = $dtags['t_name'];
      }
      if($i === 0)
        $data['tags'] = array();
    }
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('arsenal' => $data);
  }

  // Return the data
  return $data;
}





/**
 * Lists arsenals in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the arsenals.
 */

function arsenals_list( string  $sort_by  = ''      ,
                        array   $search   = array() ,
                        string  $format   = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanitize the search data
  $search_release         = sanitize_array_element($search, 'release', 'int');
  $search_release_uuid    = sanitize_array_element($search, 'release_uuid', 'string');
  $search_format          = sanitize_array_element($search, 'format', 'int');
  $search_format_en       = sanitize_array_element($search, 'format_en', 'string');
  $search_format_uuid     = sanitize_array_element($search, 'format_uuid', 'string');
  $search_name            = sanitize_array_element($search, 'name', 'string');
  $search_faction_id      = sanitize_array_element($search, 'faction', 'int');
  $search_card_id         = sanitize_array_element($search, 'card_id', 'int');
  $search_difficulty      = sanitize_array_element($search, 'difficulty', 'int');
  $search_difficulty_uuid = sanitize_array_element($search, 'difficulty_uuid', 'string');
  $search_playstyle       = sanitize_array_element($search, 'playstyle', 'string');
  $search_text            = sanitize_array_element($search, 'text', 'string');
  $search_data            = sanitize_array_element($search, 'data', 'int');
  $search_tag_id          = sanitize_array_element($search, 'tag_id', 'int');
  $search_tag             = sanitize_array_element($search, 'tag', 'string');
  $search_public          = sanitize_array_element($search, 'public', 'bool');

  // Search through the data
  $query_search  = ($search_release && $search_release !== -1)
                                      ? " WHERE arsenals.fk_releases      = '$search_release' "      : " WHERE 1 = 1 ";
  $query_search .= ($search_release === -1)
                                      ? " AND   releases.id               IS NULL "                       : "";
  $query_search .= ($search_release_uuid)
                                      ? " AND   releases.uuid             = '$search_release_uuid' "      : "";
  $query_search .= ($search_format && $search_format !== -1)
                                      ? " AND   arsenals.fk_formats       = '$search_format' "            : "";
  $query_search .= ($search_format === -1)
                                      ? " AND   formats.id                IS NULL "                       : "";
  $query_search .= ($search_format_uuid)
                                      ? " AND   formats.uuid              = '$search_format_uuid' "       : "";
  $query_search .= ($search_format_en)
                                      ? " AND   formats.name_en           LIKE '$search_format_en' "      : "";
  $query_search .= ($search_name)     ? " AND ( arsenals.name_en          LIKE '%$search_name%'
                                          OR    arsenals.name_fr          LIKE '%$search_name%' ) "       : "";
  $query_search .= ($search_difficulty && $search_difficulty !== -1)
                                      ? " AND   arsenal_difficulties.id   = '$search_difficulty' "        : "";
  $query_search .= ($search_difficulty === -1)
                                      ? " AND   arsenal_difficulties.id   IS NULL "                       : "";
  $query_search .= ($search_difficulty_uuid)
                                      ? " AND   arsenal_difficulties.uuid = '$search_difficulty_uuid' "   : "";
  $query_search .= ($search_playstyle)
                                      ? " AND ( arsenals.playstyle_en     LIKE '%$search_playstyle%'
                                          OR    arsenals.playstyle_fr     LIKE '%$search_playstyle%' ) "  : "";
  $query_search .= ($search_text)     ? " AND ( arsenals.summary_en       LIKE '%$search_text%'
                                          OR    arsenals.summary_fr       LIKE '%$search_text%'
                                          OR    arsenals.gameplan_en      LIKE '%$search_text%'
                                          OR    arsenals.gameplan_fr      LIKE '%$search_text%'
                                          OR    arsenals.reserves_en      LIKE '%$search_text%'
                                          OR    arsenals.reserves_fr      LIKE '%$search_text%' ) "       : "";
  $query_search .= ($search_data === 1)
                                      ? " AND   arsenals.is_hidden        = '1' "                         : "";
  $query_search .= ($search_data === 10 )
                                      ? " AND   arsenals.fk_images_en     != ''
                                          AND   arsenals.fk_images_fr     != '' "                         : "";
  $query_search .= ($search_data === 11 )
                                      ? " AND ( arsenals.fk_images_en     != ''
                                          AND   arsenals.fk_images_fr     = '' )
                                          OR  ( arsenals.fk_images_en     = ''
                                          AND   arsenals.fk_images_fr     != '' ) "                       : "";
  $query_search .= ($search_data === 12 )
                                      ? " AND   arsenals.fk_images_en     = ''
                                          AND   arsenals.fk_images_fr     = '' "                          : "";
  $query_search .= ($search_tag_id === -1)
                                      ? " AND   tags.id                   IS NULL "                       : "";
  $query_search .= ($search_tag)      ? " AND   tags.name                 LIKE '$search_tag' "            : "";
  $query_search .= ($search_public)   ? " AND   arsenals.is_hidden        = '0' "                         : "";
  $query_search .= ($search_faction_id === -1)
                                      ? " AND   arsenals_factions.fk_factions   IS NULL "                 : "";
  $query_search .= ($search_card_id === -1)
                                      ? " AND   arsenals_compositions.fk_cards  IS NULL "                 : "";

  // Don't show hidden arsenals or hidden cards in the API
  $query_search .= ($format === 'api')
                                      ? " AND   arsenals.is_hidden        = '0'
                                          AND   cards.is_hidden           = '0'
                                          AND   cards.is_extra_card       = '0'  "                        : "";

  // Use a different search technique for tags
  $query_having = ($search_tag_id && $search_tag_id !== -1)
                ? " HAVING FIND_IN_SET('$search_tag_id', GROUP_CONCAT(tags.id)) > 0 "
                : " HAVING 1 = 1 ";

  // Use a different search technique for factions
  $query_having .= ($search_faction_id && $search_faction_id !== -1)
                ? " AND FIND_IN_SET('$search_faction_id', GROUP_CONCAT(factions.id)) > 0 "
                : "";

  // Use a different search technique for cards
  $query_having .= ($search_card_id && $search_card_id !== -1)
                ? " AND FIND_IN_SET('$search_card_id', GROUP_CONCAT(cards.id)) > 0 "
                : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'release'     => "  ORDER BY  releases.release_date               IS NULL ,
                                  releases.release_date               DESC    ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    'format'      => "  ORDER BY  formats.sorting_order               IS NULL ,
                                  formats.sorting_order               ASC     ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    'name'        => "  ORDER BY  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    'difficulty'  => "  ORDER BY  arsenal_difficulties.sorting_order  IS NULL ,
                                  arsenal_difficulties.sorting_order  ASC     ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    'playstyle'   => "  ORDER BY  arsenals.playstyle_$lang            = ''    ,
                                  arsenals.playstyle_$lang            ASC     ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    'text'        => "  ORDER BY  LENGTH(arsenals.summary_en)
                                  + LENGTH(arsenals.summary_fr)
                                  + LENGTH(arsenals.gameplan_en)
                                  + LENGTH(arsenals.gameplan_fr)
                                  + LENGTH(arsenals.reserves_en)
                                  + LENGTH(arsenals.reserves_fr)      DESC    ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    'api'         => "  ORDER BY  releases.release_date               IS NULL ,
                                  releases.release_date               DESC    ,
                                  formats.sorting_order               IS NULL ,
                                  formats.sorting_order               ASC     ,
                                  arsenal_difficulties.sorting_order  IS NULL ,
                                  arsenal_difficulties.sorting_order  ASC     ,
                                  arsenals.name_en                    = ''    ,
                                  arsenals.name_en                    ASC     ",
    'cards'       => "  ORDER BY  arsenals.card_count                 DESC    ,
                                  arsenals.card_count
                                + arsenals.reserves_count             DESC    ,
                                  releases.release_date               IS NULL ,
                                  releases.release_date               DESC    ,
                                  formats.sorting_order               IS NULL ,
                                  formats.sorting_order               ASC     ,
                                  arsenal_difficulties.sorting_order  IS NULL ,
                                  arsenal_difficulties.sorting_order  ASC     ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
    default       => "  ORDER BY  releases.release_date               IS NULL ,
                                  releases.release_date               DESC    ,
                                  formats.sorting_order               IS NULL ,
                                  formats.sorting_order               ASC     ,
                                  arsenal_difficulties.sorting_order  IS NULL ,
                                  arsenal_difficulties.sorting_order  ASC     ,
                                  arsenals.name_$lang                 = ''    ,
                                  arsenals.name_$lang                 ASC     ",
  };

  // Fetch the arsenals
  $arsenals = query(" SELECT    arsenals.id                     AS 'a_id'           ,
                                arsenals.uuid                   AS 'a_uuid'         ,
                                arsenals.is_hidden              AS 'a_hidden'       ,
                                arsenals.name_en                AS 'a_name_en'      ,
                                arsenals.name_fr                AS 'a_name_fr'      ,
                                arsenals.name_$lang             AS 'a_name'         ,
                                arsenals.slug                   AS 'a_slug'         ,
                                arsenals.playstyle_en           AS 'a_playstyle_en' ,
                                arsenals.playstyle_fr           AS 'a_playstyle_fr' ,
                                arsenals.playstyle_$lang        AS 'a_playstyle'    ,
                                  LENGTH(arsenals.summary_en)
                                + LENGTH(arsenals.gameplan_en)
                                + LENGTH(arsenals.reserves_en)
                                + LENGTH(arsenals.extra_en)     AS 'a_length_en'    ,
                                  LENGTH(arsenals.summary_fr)
                                + LENGTH(arsenals.gameplan_fr)
                                + LENGTH(arsenals.reserves_fr)
                                + LENGTH(arsenals.extra_fr)     AS 'a_length_fr'    ,
                                arsenals.summary_en             AS 'a_summary_en'   ,
                                arsenals.summary_fr             AS 'a_summary_fr'   ,
                                arsenals.summary_$lang          AS 'a_summary'      ,
                                arsenals.gameplan_en            AS 'a_gameplan_en'  ,
                                arsenals.gameplan_fr            AS 'a_gameplan_fr'  ,
                                arsenals.reserves_en            AS 'a_reserves_en'  ,
                                arsenals.reserves_fr            AS 'a_reserves_fr'  ,
                                arsenals.extra_en               AS 'a_extra_en'     ,
                                arsenals.extra_fr               AS 'a_extra_fr'     ,
                                arsenals.card_count             AS 'a_count'        ,
                                arsenals.reserves_count         AS 'a_rcount'       ,
                                arsenals.extra_count            AS 'a_ecount'       ,
                                arsenals.cards_list_en          AS 'a_clist_en'     ,
                                arsenals.cards_list_fr          AS 'a_clist_fr'     ,
                                arsenals.reserves_list_en       AS 'a_rlist_en'     ,
                                arsenals.reserves_list_fr       AS 'a_rlist_fr'     ,
                                releases.uuid                   AS 'r_uuid'         ,
                                releases.name_en                AS 'r_name_en'      ,
                                releases.name_fr                AS 'r_name_fr'      ,
                                releases.name_$lang             AS 'r_name'         ,
                                releases.release_date           AS 'r_date'         ,
                                releases.styling                AS 'r_styling'      ,
                                formats.uuid                    AS 'f_uuid'         ,
                                formats.name_en                 AS 'f_name_en'      ,
                                formats.name_fr                 AS 'f_name_fr'      ,
                                formats.name_$lang              AS 'f_name'         ,
                                formats.styling                 AS 'f_styling'      ,
                                arsenal_difficulties.uuid       AS 'ad_uuid'        ,
                                arsenal_difficulties.name_en    AS 'ad_name_en'     ,
                                arsenal_difficulties.name_fr    AS 'ad_name_fr'     ,
                                arsenal_difficulties.name_$lang AS 'ad_name'        ,
                                arsenal_difficulties.styling    AS 'ad_style'       ,
                                images_en.id                    AS 'i_id_en'        ,
                                images_en.uuid                  AS 'i_uuid_en'      ,
                                images_en.path                  AS 'i_path_en'      ,
                                images_fr.id                    AS 'i_id_fr'        ,
                                images_fr.uuid                  AS 'i_uuid_fr'      ,
                                images_fr.path                  AS 'i_path_fr'      ,
                                images_$lang.path               AS 'i_path'         ,
                                images_$lang.name               AS 'i_name'         ,
                                COUNT(DISTINCT factions.id)     AS 'af_count'       ,
                                COUNT(DISTINCT tags.id)         AS 'at_count'       ,
                                COUNT(DISTINCT cards.id)        AS 'ac_count'       ,
                                GROUP_CONCAT( DISTINCT  tags.name
                                              ORDER BY  tags.name ASC
                                              SEPARATOR ', ')   AS 'at_names'       ,
                                GROUP_CONCAT( DISTINCT  tags.uuid
                                              ORDER BY  tags.name ASC
                                              SEPARATOR ', ')   AS 'at_uuids'       ,
                                GROUP_CONCAT( DISTINCT  factions.name_en
                                              ORDER BY  factions.sorting_order ASC
                                              SEPARATOR ',')    AS 'af_names_en'    ,
                                GROUP_CONCAT( DISTINCT  factions.name_fr
                                              ORDER BY  factions.sorting_order ASC
                                              SEPARATOR ',')    AS 'af_names_fr'    ,
                                GROUP_CONCAT( DISTINCT  factions.name_$lang
                                              ORDER BY  factions.sorting_order ASC
                                              SEPARATOR ', ')   AS 'af_names'      ,
                                GROUP_CONCAT( DISTINCT  factions.uuid
                                              ORDER BY  factions.sorting_order ASC
                                              SEPARATOR ',')    AS 'af_uuids'       ,
                                GROUP_CONCAT( DISTINCT  cards.name_en
                                              ORDER BY  cards.name_en ASC
                                              SEPARATOR ',')    AS 'ac_names_en'    ,
                                GROUP_CONCAT( DISTINCT  cards.name_fr
                                              ORDER BY  cards.name_en ASC
                                              SEPARATOR ',')    AS 'ac_names_fr'    ,
                                GROUP_CONCAT( DISTINCT  cards.uuid
                                              ORDER BY  cards.name_en ASC
                                              SEPARATOR ',')    AS 'ac_uuids'
                      FROM      arsenals
                      LEFT JOIN releases              ON arsenals.fk_releases               = releases.id
                      LEFT JOIN formats               ON arsenals.fk_formats                = formats.id
                      LEFT JOIN arsenal_difficulties  ON arsenals.fk_arsenal_difficulties   = arsenal_difficulties.id
                      LEFT JOIN images AS images_en   ON arsenals.fk_images_en              = images_en.id
                      LEFT JOIN images AS images_fr   ON arsenals.fk_images_fr              = images_fr.id
                      LEFT JOIN tags_arsenals         ON tags_arsenals.fk_arsenals          = arsenals.id
                      LEFT JOIN tags                  ON tags.id                            = tags_arsenals.fk_tags
                      LEFT JOIN arsenals_factions     ON arsenals_factions.fk_arsenals      = arsenals.id
                      LEFT JOIN factions              ON factions.id
                                                      =  arsenals_factions.fk_factions
                      LEFT JOIN arsenals_compositions ON arsenals_compositions.fk_arsenals = arsenals.id
                      LEFT JOIN cards                 ON arsenals_compositions.fk_cards     = cards.id
                      $query_search
                      GROUP BY  arsenals.id
                      $query_having
                      $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($arsenals); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']               = sanitize_output($row['a_id']);
      $data[$i]['name']             = sanitize_output(string_truncate($row['a_name'], 20, '...'));
      $data[$i]['fname']            = sanitize_output($row['a_name']);
      $data[$i]['name_en']          = sanitize_output($row['a_name_en']);
      $data[$i]['name_fr']          = sanitize_output($row['a_name_fr']);
      $data[$i]['slug']             = sanitize_output($row['a_slug']);
      $data[$i]['release']          = sanitize_output($row['r_name']);
      $data[$i]['release_css']      = sanitize_output($row['r_styling']);
      $data[$i]['format']           = sanitize_output($row['f_name']);
      $data[$i]['format_css']       = sanitize_output($row['f_styling']);
      $data[$i]['difficulty']       = sanitize_output($row['ad_name']);
      $data[$i]['difficulty_css']   = sanitize_output($row['ad_style']);
      $data[$i]['playstyle']        = sanitize_output(string_truncate($row['a_playstyle'], 20, '...'));
      $data[$i]['fplaystyle']       = sanitize_output($row['a_playstyle']);
      $data[$i]['playstyle_en']     = sanitize_output($row['a_playstyle_en']);
      $data[$i]['playstyle_fr']     = sanitize_output($row['a_playstyle_fr']);
      $data[$i]['length_en']        = sanitize_output($row['a_length_en']);
      $data[$i]['length_fr']        = sanitize_output($row['a_length_fr']);
      $data[$i]['summary_en']       = sanitize_output($row['a_summary_en']);
      $data[$i]['summary_fr']       = sanitize_output($row['a_summary_fr']);
      $data[$i]['fsummary']         = sanitize_output($row['a_summary']);
      $data[$i]['gameplan_en']      = nl2br($row['a_gameplan_en']);
      $data[$i]['gameplan_fr']      = nl2br($row['a_gameplan_fr']);
      $data[$i]['reserves_en']      = nl2br($row['a_reserves_en']);
      $data[$i]['reserves_fr']      = nl2br($row['a_reserves_fr']);
      $data[$i]['extra_en']         = nl2br($row['a_extra_en']);
      $data[$i]['extra_fr']         = nl2br($row['a_extra_fr']);
      $data[$i]['hidden']           = sanitize_output($row['a_hidden']);
      $data[$i]['image_en']         = sanitize_output($row['i_path_en']);
      $data[$i]['image_fr']         = sanitize_output($row['i_path_fr']);
      $data[$i]['image_name']       = sanitize_output($row['i_name']);
      $temp_thumb_path_en           = (isset($row['i_path_en']))
                                    ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path_en'])
                                    : '';
      $temp_thumb_path_fr           = (isset($row['i_path_fr']))
                                    ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path_fr'])
                                    : '';
      $temp_thumb_path              = (isset($row['i_path']))
                                    ? './../../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path'])
                                    : '';
      $data[$i]['thumb_en']         = sanitize_output($temp_thumb_path_en);
      $data[$i]['thumb_fr']         = sanitize_output($temp_thumb_path_fr);
      $data[$i]['thumb']            = sanitize_output($temp_thumb_path);
      $data[$i]['ntags']            = sanitize_output($row['at_count']);
      $data[$i]['tags']             = sanitize_output($row['at_names']);
      $data[$i]['nfactions']        = sanitize_output($row['af_count']);
      $data[$i]['factions']         = $row['af_names_en']
                                    ? factions_abbreviate(sanitize_output($row['af_names_en']), style: true)
                                    : '';
      $data[$i]['faction_names']    = sanitize_output($row['af_names']);
      $data[$i]['cards_main']       = sanitize_output($row['a_count']);
      $data[$i]['cards_reserves']   = sanitize_output($row['a_rcount']);
      $data[$i]['cards_extra']      = sanitize_output($row['a_ecount']);
      $data[$i]['card_list_en']     = ($row['a_clist_en']) ? cards_format_body($row['a_clist_en']) : '';
      $data[$i]['card_list_fr']     = ($row['a_clist_fr']) ? cards_format_body($row['a_clist_fr']) : '';
      $data[$i]['reserves_list_en'] = ($row['a_rlist_en']) ? cards_format_body($row['a_rlist_en']) : '';
      $data[$i]['reserves_list_fr'] = ($row['a_rlist_fr']) ? cards_format_body($row['a_rlist_fr']) : '';
    }

    // Prepare for the API
    if($format === 'api')
    {
      // Sanitize the data
      $data[$i]['uuid']                     = sanitize_json($row['a_uuid']);
      $data[$i]['endpoint']                 = sanitize_json($GLOBALS['website_url'].'api/arsenal/'.$row['a_uuid']);
      $data[$i]['url']                      = sanitize_json($GLOBALS['website_url'].'pages/arsenal/'.$row['a_slug']);
      $data[$i]['name']['en']               = sanitize_json($row['a_name_en']);
      $data[$i]['name']['fr']               = sanitize_json($row['a_name_fr']);
      $data[$i]['playstyle']['en']          = sanitize_json($row['a_playstyle_en']);
      $data[$i]['playstyle']['fr']          = sanitize_json($row['a_playstyle_fr']);
      $data[$i]['strategy_summary']['en']   = sanitize_json($row['a_summary_en']);
      $data[$i]['strategy_summary']['fr']   = sanitize_json($row['a_summary_fr']);
      $data[$i]['game_plan']['en']          = sanitize_json($row['a_gameplan_en']);
      $data[$i]['game_plan']['fr']          = sanitize_json($row['a_gameplan_fr']);
      $data[$i]['reserves_game_plan']['en'] = sanitize_json($row['a_reserves_en']);
      $data[$i]['reserves_game_plan']['fr'] = sanitize_json($row['a_reserves_fr']);
      $data[$i]['extra_text']['en']         = sanitize_json($row['a_extra_en']);
      $data[$i]['extra_text']['fr']         = sanitize_json($row['a_extra_fr']);

      // Release
      if(isset($row['r_uuid']))
      {
        $data[$i]['release']['uuid']        = sanitize_json($row['r_uuid']);
        $data[$i]['release']['name']['en']  = sanitize_json($row['r_name_en']);
        $data[$i]['release']['name']['fr']  = sanitize_json($row['r_name_fr']);
        $data[$i]['release']['date']        = sanitize_json($row['r_date']);
      }
      else
        $data[$i]['release']                = array();

      // Format
      if(isset($row['f_uuid']))
      {
        $data[$i]['format']['uuid']         = sanitize_json($row['f_uuid']);
        $data[$i]['format']['name']['en']   = sanitize_json($row['f_name_en']);
        $data[$i]['format']['name']['fr']   = sanitize_json($row['f_name_fr']);
      }
      else
        $data[$i]['format']                 = array();

      // Factions
      $data[$i]['factions']['uuids']        = ($row['af_uuids']) ? explode(',', $row['af_uuids']) : array();
      $data[$i]['factions']['names']['en']  = ($row['af_names_en']) ? explode(',', $row['af_names_en']) : array();
      $data[$i]['factions']['names']['fr']  = ($row['af_names_fr']) ? explode(',', $row['af_names_fr']) : array();

      // Difficulty
      if(isset($row['ad_uuid']))
      {
        $data[$i]['difficulty']['uuid']       = sanitize_json($row['ad_uuid']);
        $data[$i]['difficulty']['name']['en'] = sanitize_json($row['ad_name_en']);
        $data[$i]['difficulty']['name']['fr'] = sanitize_json($row['ad_name_fr']);
      }
      else
        $data[$i]['difficulty']             = array();

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

      // Card count
      $data[$i]['card_count']['main']       = (int)sanitize_json($row['a_count']);
      $data[$i]['card_count']['reserves']   = (int)sanitize_json($row['a_rcount']);
      $data[$i]['card_count']['extras']     = (int)sanitize_json($row['a_ecount']);

      // Cards
      $data[$i]['cards']['uuids']           = ($row['ac_uuids']) ? explode(',', $row['ac_uuids']) : array();
      $data[$i]['cards']['names']['en']     = ($row['ac_names_en']) ? explode(',', $row['ac_names_en']) : array();
      $data[$i]['cards']['names']['fr']     = ($row['ac_names_fr']) ? explode(',', $row['ac_names_fr']) : array();

      // Tags
      $data[$i]['tags']['uuids']            = ($row['at_uuids']) ? explode(', ', $row['at_uuids']) : array();
      $data[$i]['tags']['names']            = ($row['at_names']) ? explode(', ', $row['at_names']) : array();
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('arsenals' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds an arsenal to the database.
 *
 * @param   array   $data  An array containing the arsenal's data.
 *
 * @return  void
 */

function arsenals_add( array $data ) : void
{
  // Sanitize the data
  $arsenal_release      = sanitize_array_element($data, 'release', 'int');
  $arsenal_format       = sanitize_array_element($data, 'format', 'int');
  $arsenal_difficulty   = sanitize_array_element($data, 'difficulty', 'int');
  $arsenal_image_en     = sanitize_array_element($data, 'image_en', 'int');
  $arsenal_image_fr     = sanitize_array_element($data, 'image_fr', 'int');
  $arsenal_hidden       = sanitize_array_element($data, 'hidden', 'bool');
  $arsenal_name_en      = sanitize_array_element($data, 'name_en', 'string');
  $arsenal_name_fr      = sanitize_array_element($data, 'name_fr', 'string');
  $arsenal_playstyle_en = sanitize_array_element($data, 'playstyle_en', 'string');
  $arsenal_playstyle_fr = sanitize_array_element($data, 'playstyle_fr', 'string');
  $arsenal_summary_en   = sanitize_array_element($data, 'summary_en', 'string');
  $arsenal_summary_fr   = sanitize_array_element($data, 'summary_fr', 'string');
  $arsenal_gameplan_en  = sanitize_array_element($data, 'gameplan_en', 'string');
  $arsenal_gameplan_fr  = sanitize_array_element($data, 'gameplan_fr', 'string');
  $arsenal_reserves_en  = sanitize_array_element($data, 'reserves_en', 'string');
  $arsenal_reserves_fr  = sanitize_array_element($data, 'reserves_fr', 'string');
  $arsenal_extra_en     = sanitize_array_element($data, 'extra_en', 'string');
  $arsenal_extra_fr     = sanitize_array_element($data, 'extra_fr', 'string');

  // Add the arsenal to the database
  query(" INSERT INTO arsenals
          SET         arsenals.uuid                     = UUID()                  ,
                      arsenals.fk_releases              = '$arsenal_release'      ,
                      arsenals.fk_formats               = '$arsenal_format'       ,
                      arsenals.fk_arsenal_difficulties  = '$arsenal_difficulty'   ,
                      arsenals.fk_images_en             = '$arsenal_image_en'     ,
                      arsenals.fk_images_fr             = '$arsenal_image_fr'     ,
                      arsenals.is_hidden                = '$arsenal_hidden'       ,
                      arsenals.name_en                  = '$arsenal_name_en'      ,
                      arsenals.name_fr                  = '$arsenal_name_fr'      ,
                      arsenals.playstyle_en             = '$arsenal_playstyle_en' ,
                      arsenals.playstyle_fr             = '$arsenal_playstyle_fr' ,
                      arsenals.summary_en               = '$arsenal_summary_en'   ,
                      arsenals.summary_fr               = '$arsenal_summary_fr'   ,
                      arsenals.gameplan_en              = '$arsenal_gameplan_en'  ,
                      arsenals.gameplan_fr              = '$arsenal_gameplan_fr'  ,
                      arsenals.reserves_en              = '$arsenal_reserves_en'  ,
                      arsenals.reserves_fr              = '$arsenal_reserves_fr'  ,
                      arsenals.extra_en                 = '$arsenal_extra_en'     ,
                      arsenals.extra_fr                 = '$arsenal_extra_fr'     ");

  // Get the newly created arsenal's id
  $arsenal_id = sanitize(query_id(), "int");

  // Give the arsenal a slug
  arsenals_generate_slug($arsenal_id);

  // Fetch a list of arsenal tags
  $arsenal_tags = tags_list(search: array('ftype' => 'Arsenal'));

  // Add the arsenal's tags to the database
  for($i = 0; $i < $arsenal_tags['rows']; $i++)
  {
    $tag_id = $arsenal_tags[$i]['id'];
    if($data['arsenal_tags'][$arsenal_tags[$i]['id']])
      query(" INSERT INTO tags_arsenals
              SET         tags_arsenals.fk_arsenals = '$arsenal_id' ,
                          tags_arsenals.fk_tags     = '$tag_id'     ");
  }

  // Get rid of double faction entries
  $data['factions'] = array_unique($data['factions']);

  // Add the arsenal's factions to the database
  foreach($data['factions'] as $faction_id)
  {
    $faction_id = sanitize($faction_id, 'int');
    if($faction_id !== 0)
      query(" INSERT INTO arsenals_factions
              SET         arsenals_factions.fk_arsenals = '$arsenal_id' ,
                          arsenals_factions.fk_factions = '$faction_id'  ");
  }

  // Add the arsenal's cards to the database
  for($i = 0; $i < $data['arsenal_cards']['count']; $i++)
  {
    // Sanitize the data
    $card_id        = sanitize($data['arsenal_cards'][$i]['id'], 'int');
    $card_main      = sanitize($data['arsenal_cards'][$i]['main'], 'int');
    $card_reverves  = sanitize($data['arsenal_cards'][$i]['reserves'], 'int');
    $card_extra     = ($data['arsenal_cards'][$i]['extra']) ? true : false;
    $card_order     = sanitize($data['arsenal_cards'][$i]['extra'], 'int');

    // Add the card to the database
    query(" INSERT INTO arsenals_compositions
            SET         arsenals_compositions.fk_arsenals     = '$arsenal_id'     ,
                        arsenals_compositions.fk_cards        = '$card_id'        ,
                        arsenals_compositions.amount_main     = '$card_main'      ,
                        arsenals_compositions.amount_reserves = '$card_reverves'  ,
                        arsenals_compositions.is_extra        = '$card_extra'     ,
                        arsenals_compositions.sorting_order   = '$card_order'     ");
  }

  // Recalculate arsenal card data
  arsenals_update_card_data($arsenal_id);
}




/**
 * Edits an arsenal in the database.
 *
 * @param   int         $arsenal_id   The id of the arsenal to edit.
 * @param   array       $data         An array containing the arsenal's data.
 *
 * @return  void
 */

function arsenals_edit( int   $arsenal_id  ,
                        array $data       ) : void
{
  // Sanitize the data
  $arsenal_id           = sanitize($arsenal_id, 'int');
  $arsenal_release      = sanitize_array_element($data, 'release', 'int');
  $arsenal_format       = sanitize_array_element($data, 'format', 'int');
  $arsenal_difficulty   = sanitize_array_element($data, 'difficulty', 'int');
  $arsenal_image_en     = sanitize_array_element($data, 'image_en', 'int');
  $arsenal_image_fr     = sanitize_array_element($data, 'image_fr', 'int');
  $arsenal_hidden       = sanitize_array_element($data, 'hidden', 'bool');
  $arsenal_name_en      = sanitize_array_element($data, 'name_en', 'string');
  $arsenal_name_fr      = sanitize_array_element($data, 'name_fr', 'string');
  $arsenal_playstyle_en = sanitize_array_element($data, 'playstyle_en', 'string');
  $arsenal_playstyle_fr = sanitize_array_element($data, 'playstyle_fr', 'string');
  $arsenal_summary_en   = sanitize_array_element($data, 'summary_en', 'string');
  $arsenal_summary_fr   = sanitize_array_element($data, 'summary_fr', 'string');
  $arsenal_gameplan_en  = sanitize_array_element($data, 'gameplan_en', 'string');
  $arsenal_gameplan_fr  = sanitize_array_element($data, 'gameplan_fr', 'string');
  $arsenal_reserves_en  = sanitize_array_element($data, 'reserves_en', 'string');
  $arsenal_reserves_fr  = sanitize_array_element($data, 'reserves_fr', 'string');
  $arsenal_extra_en     = sanitize_array_element($data, 'extra_en', 'string');
  $arsenal_extra_fr     = sanitize_array_element($data, 'extra_fr', 'string');

  // Stop here if the arsenal does not exist
  if(!database_row_exists('arsenals', $arsenal_id))
    return;

  // Edit the arsenal and reset its slug
  query(" UPDATE  arsenals
          SET     arsenals.fk_releases              = '$arsenal_release'      ,
                  arsenals.fk_formats               = '$arsenal_format'       ,
                  arsenals.fk_arsenal_difficulties  = '$arsenal_difficulty'   ,
                  arsenals.fk_images_en             = '$arsenal_image_en'     ,
                  arsenals.fk_images_fr             = '$arsenal_image_fr'     ,
                  arsenals.is_hidden                = '$arsenal_hidden'       ,
                  arsenals.name_en                  = '$arsenal_name_en'      ,
                  arsenals.name_fr                  = '$arsenal_name_fr'      ,
                  arsenals.playstyle_en             = '$arsenal_playstyle_en' ,
                  arsenals.playstyle_fr             = '$arsenal_playstyle_fr' ,
                  arsenals.summary_en               = '$arsenal_summary_en'   ,
                  arsenals.summary_fr               = '$arsenal_summary_fr'   ,
                  arsenals.gameplan_en              = '$arsenal_gameplan_en'  ,
                  arsenals.gameplan_fr              = '$arsenal_gameplan_fr'  ,
                  arsenals.reserves_en              = '$arsenal_reserves_en'  ,
                  arsenals.reserves_fr              = '$arsenal_reserves_fr'  ,
                  arsenals.extra_en                 = '$arsenal_extra_en'     ,
                  arsenals.extra_fr                 = '$arsenal_extra_fr'     ,
                  arsenals.slug                     = ''
          WHERE   arsenals.id                       = '$arsenal_id' ");

  // Regenerate the arsenal's slug
  arsenals_generate_slug($arsenal_id);

  // Fetch a list of arsenal tags
  $arsenal_tags = tags_list(search: array('ftype' => 'Arsenal'));

  // Update the arsenal's tags in the database
  for($i = 0; $i < $arsenal_tags['rows']; $i++)
  {
    // Check the current status of each tag
    $tag_id = $arsenal_tags[$i]['id'];
    $tag_check = query("  SELECT  tags_arsenals.id AS 'ti_id'
                          FROM    tags_arsenals
                          WHERE   tags_arsenals.fk_arsenals = '$arsenal_id'
                          AND     tags_arsenals.fk_tags     = '$tag_id' ",
                          fetch_row: true);

    // Create missing tags
    if($data['arsenal_tags'][$arsenal_tags[$i]['id']] && is_null($tag_check))
      query(" INSERT INTO tags_arsenals
              SET         tags_arsenals.fk_arsenals = '$arsenal_id' ,
                          tags_arsenals.fk_tags     = '$tag_id'   ");

    // Delete extraneous tags
    if(!$data['arsenal_tags'][$arsenal_tags[$i]['id']] && !is_null($tag_check))
      query(" DELETE FROM tags_arsenals
              WHERE       tags_arsenals.fk_arsenals = '$arsenal_id'
              AND         tags_arsenals.fk_tags     = '$tag_id'   ");
  }

  // Fetch a list of arsenal factions
  $qfactions = query("  SELECT  arsenals_factions.fk_factions AS 'af_id'
                        FROM    arsenals_factions
                        WHERE   arsenals_factions.fk_arsenals = '$arsenal_id' ");

  // Place those factions in an array
  $arsenal_factions = array();
  while($dfactions = query_row($qfactions))
    $arsenal_factions[] = $dfactions['af_id'];

  // Get rid of double entries in the edited data
  $data['factions'] = array_unique($data['factions']);

  // Look for factions missing from the edited data and add them to the database
  $missing_factions = array_diff($data['factions'], $arsenal_factions);
  foreach($missing_factions as $missing_faction)
  {
    $missing_faction = sanitize($missing_faction, 'int');
    if($missing_faction !== 0)
      query(" INSERT INTO arsenals_factions
              SET         arsenals_factions.fk_arsenals = '$arsenal_id' ,
                          arsenals_factions.fk_factions = '$missing_faction' ");
  }

  // Look for extra factions in the edited data and remove them from the database
  $extra_factions = array_diff($arsenal_factions, $data['factions']);
  foreach($extra_factions as $extra_faction)
  {
    $extra_faction = sanitize($extra_faction, 'int');
    query(" DELETE FROM arsenals_factions
            WHERE       arsenals_factions.fk_arsenals = '$arsenal_id'
            AND         arsenals_factions.fk_factions = '$extra_faction'");
  }

  // Fetch a list of arsenal linked cards
  $qcards = query(" SELECT  arsenals_compositions.fk_cards AS 'af_id'
                    FROM    arsenals_compositions
                    WHERE   arsenals_compositions.fk_arsenals = '$arsenal_id' ");

  // Place those cards in an array
  $arsenal_cards = array();
  while($dcards = query_row($qcards))
    $arsenal_cards[] = $dcards['af_id'];

  // Look for cards missing from the edited data and add them to the database
  $missing_cards = array_diff($data['cards']['id'], $arsenal_cards);
  foreach($missing_cards as $missing_card)
  {
    // Find the card in the postdata
    for($i = 0; $i < $data['cards']['count']; $i++)
    {
      if($data['cards']['id'][$i] === $missing_card)
        $card_array_id = $i;
    }

    // Continue only if the card has been found
    if($missing_card !== 0 && isset($card_array_id) && $data['cards'][$card_array_id]['id'] !== 0)
    {
      // Sanitize the postdata
      $card_id        = sanitize($data['cards'][$card_array_id]['id'], 'int');
      $card_main      = sanitize($data['cards'][$card_array_id]['main'], 'int');
      $card_reserves  = sanitize($data['cards'][$card_array_id]['reserves'], 'int');
      $card_extra     = ($data['cards'][$card_array_id]['extra']) ? true : false;
      $card_order     = sanitize($data['cards'][$card_array_id]['extra'], 'int');

      // Add the card to the database
      query(" INSERT INTO arsenals_compositions
              SET         arsenals_compositions.fk_arsenals     = '$arsenal_id'     ,
                          arsenals_compositions.fk_cards        = '$card_id'        ,
                          arsenals_compositions.amount_main     = '$card_main'      ,
                          arsenals_compositions.amount_reserves = '$card_reserves'  ,
                          arsenals_compositions.is_extra        = '$card_extra'     ,
                          arsenals_compositions.sorting_order   = '$card_order'     ");
    }
  }

  // Look for unchanged cards and update them in case they changed
  $same_cards = array_intersect($arsenal_cards, $data['cards']['id']);
  foreach($same_cards as $same_card)
  {
    // Find the card in the postdata
    for($i = 0; $i < $data['cards']['count']; $i++)
    {
      if($data['cards']['id'][$i] === $same_card)
        $card_array_id = $i;
    }

    // Continue only if the card has been found
    if($same_card !== 0 && isset($card_array_id) && $data['cards'][$card_array_id]['id'] !== 0)
    {
      // Sanitize the postdata
      $card_id        = sanitize($data['cards'][$card_array_id]['id'], 'int');
      $card_main      = sanitize($data['cards'][$card_array_id]['main'], 'int');
      $card_reserves  = sanitize($data['cards'][$card_array_id]['reserves'], 'int');
      $card_extra     = ($data['cards'][$card_array_id]['extra']) ? true : false;
      $card_order     = sanitize($data['cards'][$card_array_id]['extra'], 'int');

      // Add the card to the database
      query(" UPDATE  arsenals_compositions
              SET     arsenals_compositions.amount_main     = '$card_main'      ,
                      arsenals_compositions.amount_reserves = '$card_reserves'  ,
                      arsenals_compositions.is_extra        = '$card_extra'     ,
                      arsenals_compositions.sorting_order   = '$card_order'
              WHERE   arsenals_compositions.fk_arsenals     = '$arsenal_id'
              AND     arsenals_compositions.fk_cards        = '$card_id'        ");
    }
  }

  // Look for extra cards in the edited data and remove them from the database
  $extra_cards = array_diff($arsenal_cards, $data['cards']['id']);
  foreach($extra_cards as $extra_card)
  {
    $extra_card = sanitize($extra_card, 'int');
    query(" DELETE FROM arsenals_compositions
            WHERE       arsenals_compositions.fk_arsenals = '$arsenal_id'
            AND         arsenals_compositions.fk_cards    = '$extra_card' ");
  }

  // Wipe any leftover cards from the arsenal after these operations
  query(" DELETE FROM arsenals_compositions
          WHERE       arsenals_compositions.fk_arsenals = '$arsenal_id'
          AND         arsenals_compositions.fk_cards    = 0 ");

  // Recalculate arsenal card data
  arsenals_update_card_data($arsenal_id);
}




/**
 * Deletes an arsenal from the database.
 *
 * @param   int     $arsenal_id  The id of the arsenal to delete.
 *
 * @return  void
 */

function arsenals_delete( int $arsenal_id ) : void
{
  // Sanitize the data
  $arsenal_id = sanitize($arsenal_id, 'int');

  // Delete the arsenal from the database
  query(" DELETE FROM arsenals
          WHERE       arsenals.id = '$arsenal_id' ");

  // Delete tags linked to the arsenal
  query(" DELETE FROM tags_arsenals
          WHERE       tags_arsenals.fk_arsenals = '$arsenal_id' ");

  // Delete arsenal factions
  query(" DELETE FROM arsenals_factions
          WHERE       arsenals_factions.fk_arsenals = '$arsenal_id' ");

  // Delete linked cards
  query(" DELETE FROM arsenals_compositions
          WHERE       arsenals_compositions.fk_arsenals = '$arsenal_id' ");
}




/**
 * Generates a unique slug identifier for an arsenal.
 *
 * @param   string  $arsenal_id   The id of the arsenal.
 *
 * @return  void
 */

function arsenals_generate_slug( string $arsenal_id ) : void
{
  // Sanitize the arsenal's id
  $arsenal_id = sanitize($arsenal_id, 'int');

  // Make sure the arsenal exists
  if(!database_row_exists('arsenals', $arsenal_id))
    return;

  // Grab the arsenal's name and release
  $arsenal_data = query(" SELECT    arsenals.id       AS 'a_id'       ,
                                    arsenals.name_en  AS 'a_name_en'  ,
                                    releases.name_en  AS 'r_name_en'
                          FROM      arsenals
                          LEFT JOIN releases ON arsenals.fk_releases = releases.id
                          WHERE     arsenals.id = '$arsenal_id' ",
                          fetch_row: true);

  // Assemble a tentative slug
  $release      = ($arsenal_data['r_name_en'])
                ? preg_replace("/[^a-zA-Z0-9]/", "", $arsenal_data['r_name_en'])
                : 'arsenal';
  $name         = ($arsenal_data['a_name_en'])
                ? preg_replace("/[^a-zA-Z0-9]/", "", $arsenal_data['a_name_en'])
                : $arsenal_data['a_id'];
  $slug_release = string_truncate(string_change_case($release, 'lowercase'), 10);
  $slug_name    = string_truncate(string_change_case($name, 'lowercase'), 29);
  $slug         = $slug_release.'-'.$slug_name;

  // Increment the slug until it's unique
  while(database_entry_exists('arsenals', 'slug', $slug))
    $slug = string_increment($slug);

  // Sanitize the slug
  $slug = sanitize($slug, 'string');

  // Update the slug in the database
  query(" UPDATE  arsenals
          SET     arsenals.slug = '$slug'
          WHERE   arsenals.id   = '$arsenal_id' ");
}




/**
 * Regenerates all arsenal slugs.
 *
 * @return void
 */

function arsenals_regenerate_all_slugs() : void
{
  // Delete all existing arsenal slugs
  query(" UPDATE  arsenals
          SET     arsenals.slug = '' ");

  // Fetch every arsenal's id
  $arsenals = query(" SELECT  arsenals.id AS 'a_id'
                      FROM    arsenals ");

  // Loop through all arsenals
  for($i = 0; $row = query_row($arsenals); $i++)
  {
    // Regenerate the arsenal's slug
    arsenals_generate_slug($row['a_id']);
  }
}




/**
 * Recalculates the data on cards linked to an arsenal.
 *
 * @param   int     $arsenal_id  The id of the arsenal to update.
 *
 * @return  void
 */

function arsenals_update_card_data( int $arsenal_id ) : void
{
  // Sanitize the arsenal's id
  $arsenal_id = sanitize($arsenal_id, 'int');

  // Stop here if the arsenal doesn't exist
  if(!database_row_exists('arsenals', $arsenal_id))
    return;

  // Get the arsenal's cards in english
  $qcards = query(" SELECT    arsenals_compositions.amount_main     AS 'ac_count'   ,
                              arsenals_compositions.amount_reserves AS 'ac_reserves',
                              arsenals_compositions.is_extra        AS 'ac_extra'   ,
                              card_types.name_en                    AS 'ct_name_en' ,
                              cards.name_en                         AS 'c_name_en'  ,
                              cards.cost                            AS 'c_cost'
                    FROM      arsenals_compositions
                    LEFT JOIN cards       ON arsenals_compositions.fk_cards = cards.id
                    LEFT JOIN card_types  ON cards.fk_card_types            = card_types.id
                    WHERE     arsenals_compositions.fk_arsenals             = '$arsenal_id'
                    ORDER BY  LENGTH(cards.cost)        ASC ,
                              card_types.sorting_order  ASC ,
                              cards.name_en             ASC ");

  // Initialize the variables used to store arsenal data
  $count_main     = 0;
  $count_reserves = 0;
  $count_extra    = 0;
  $count_types    = array();
  $arsenal_types  = "";
  $arsenal_en     = "";
  $arsenal_fr     = "";
  $reserves_en    = "";
  $reserves_fr    = "";

  // Loop through the cards
  for($i = 0; $row =query_row($qcards); $i++)
  {
    // Increment the counters
    $count_main     += $row['ac_count'];
    $count_reserves += $row['ac_reserves'];
    $count_extra    += $row['ac_extra'];

    // Count the types
    if($row['ac_count'])
      $count_types[$row['ct_name_en']] =  (isset($count_types[$row['ct_name_en']]))
                                          ? $count_types[$row['ct_name_en']] + $row['ac_count']
                                          : $row['ac_count'];

    // Format the card types
    if(isset($row['ct_name_en']))
      $formatted_type = ($row['ct_name_en'] === "Structure") ? 'B' : mb_substr($row['ct_name_en'], 0, 1);

    // Format the costs
    $formatted_cost = "";
    if(isset($row['c_cost']))
    {
      for($i = 0; $i < strlen($row['c_cost']); $i++)
        $formatted_cost .= "[".$row['c_cost'][$i]."] ";
    }

    // Assemble the main card list
    if($row['ac_count'] > 0)
    {
      $arsenal_en .= ($arsenal_en !== "") ? "<br>" : "";
      $arsenal_en .= "[".$formatted_type."] ";
      $arsenal_en .= '<span class="bold">'.$row['ac_count']."</span> ";
      $arsenal_en .= ($formatted_cost) ? $formatted_cost." " : "";
      $arsenal_en .= $row['c_name_en'];
    }

    // Assemble the reserves card list
    if($row['ac_reserves'] > 0)
    {
      $reserves_en .= ($reserves_en !== "") ? "<br>" : "";
      $reserves_en .= "[".$formatted_type."] ";
      $reserves_en .= '<span class="bold">'.$row['ac_reserves']."</span> ";
      $reserves_en .= ($formatted_cost) ? $formatted_cost." " : "";
      $reserves_en .= $row['c_name_en'];
    }
  }

  // Get the arsenal's cards in french
  $qcards = query(" SELECT    arsenals_compositions.amount_main     AS 'ac_count'   ,
                              arsenals_compositions.amount_reserves AS 'ac_reserves',
                              arsenals_compositions.is_extra        AS 'ac_extra'   ,
                              card_types.name_en                    AS 'ct_name_en' ,
                              cards.name_fr                         AS 'c_name_fr'  ,
                              cards.cost                            AS 'c_cost'
                    FROM      arsenals_compositions
                    LEFT JOIN cards       ON arsenals_compositions.fk_cards = cards.id
                    LEFT JOIN card_types  ON cards.fk_card_types            = card_types.id
                    WHERE     arsenals_compositions.fk_arsenals             = '$arsenal_id'
                    ORDER BY  LENGTH(cards.cost)        ASC ,
                              card_types.sorting_order  ASC ,
                              cards.name_fr             ASC ");

  // Loop through the cards
  for($i = 0; $row =query_row($qcards); $i++)
  {
    // Format the card types
    if(isset($row['ct_name_en']))
      $formatted_type = ($row['ct_name_en'] === "Structure") ? 'B' : mb_substr($row['ct_name_en'], 0, 1);

    // Format the costs
    $formatted_cost = "";
    if(isset($row['c_cost']))
    {
      for($i = 0; $i < strlen($row['c_cost']); $i++)
        $formatted_cost .= "[".$row['c_cost'][$i]."] ";
    }

    // Assemble the main card list
    if($row['ac_count'] > 0)
    {
      $arsenal_fr .= ($arsenal_fr !== "") ? "<br>" : "";
      $arsenal_fr .= "[".$formatted_type."] ";
      $arsenal_fr .= '<span class="bold">'.$row['ac_count']."</span> ";
      $arsenal_fr .= ($formatted_cost) ? $formatted_cost." " : "";
      $arsenal_fr .= $row['c_name_fr'];
    }

    // Assemble the reserves card list
    if($row['ac_reserves'] > 0)
    {
      $reserves_fr .= ($reserves_fr !== "") ? "<br>" : "";
      $reserves_fr .= "[".$formatted_type."] ";
      $reserves_fr .= '<span class="bold">'.$row['ac_reserves']."</span> ";
      $reserves_fr .= ($formatted_cost) ? $formatted_cost." " : "";
      $reserves_fr .= $row['c_name_fr'];
    }
  }

  // Fetch card types
  $qtypes = query(" SELECT    card_types.name_en AS 'ct_name_en'
                    FROM      card_types
                    ORDER BY  card_types.sorting_order ASC ");

  // Loop through the card types
  while($dtypes = query_row($qtypes))
  {
    // Check if there is a card count for this card type
    if(isset($count_types[$dtypes['ct_name_en']]))
    {
      // Prepare a string for this count
      $temp_type = ($dtypes['ct_name_en'] === "Structure") ? 'B' : mb_substr($dtypes['ct_name_en'], 0, 1);

      // Update the arsenal types string)
      $arsenal_types .= ($arsenal_types !== "") ? " &nbsp; " : "";
      $arsenal_types .= "[".$temp_type.'] <span class="bold">'.$count_types[$dtypes['ct_name_en']].'</span>';
    }
  }

  // Prepend card types to arsenals
  $arsenal_en = ($arsenal_en) ? $arsenal_types."<br><br>".$arsenal_en : "";
  $arsenal_fr = ($arsenal_fr) ? $arsenal_types."<br><br>".$arsenal_fr : "";

  // Sanitize the results
  $count_main     = sanitize($count_main, 'int');
  $count_reserves = sanitize($count_reserves, 'int');
  $count_extra    = sanitize($count_extra, 'int');
  $arsenal_en     = sanitize($arsenal_en, 'string');
  $arsenal_fr     = sanitize($arsenal_fr, 'string');
  $reserves_en    = sanitize($reserves_en, 'string');
  $reserves_fr    = sanitize($reserves_fr, 'string');

  // Update the arsenal data
  query(" UPDATE  arsenals
          SET     arsenals.card_count       = '$count_main'     ,
                  arsenals.reserves_count   = '$count_reserves' ,
                  arsenals.extra_count      = '$count_extra'    ,
                  arsenals.cards_list_en    = '$arsenal_en'     ,
                  arsenals.cards_list_fr    = '$arsenal_fr'     ,
                  arsenals.reserves_list_en = '$reserves_en'    ,
                  arsenals.reserves_list_fr = '$reserves_fr'
          WHERE   arsenals.id               = '$arsenal_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                             ARSENAL DIFFICULTY LEVELS                                             */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to an arsenal difficulty level.
 *
 * @param   int         $arsenal_difficulty_id            The arsenal difficulty level's id.
 * @param   string      $format               (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_parent_array      (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null            An array containing the arsenal difficulty level's data, or null if it doesn't exist.
 */

function arsenal_difficulties_get(  int     $arsenal_difficulty_id            ,
                                    string  $format                 = 'html'  ,
                                    bool    $no_parent_array        = false   ) : array|null
{
  // Sanitize the arsenal difficulty level's id
  $arsenal_difficulty_id = sanitize($arsenal_difficulty_id, 'int');

  // Return null if the arsenal difficulty level does not exist
  if(!database_row_exists('arsenal_difficulties', $arsenal_difficulty_id))
    return null;

  // Fetch the arsenal difficulty level's data
  $arsenal_difficulty_data = query("  SELECT  arsenal_difficulties.uuid           AS 'ad_uuid'    ,
                                              arsenal_difficulties.sorting_order  AS 'ad_order'   ,
                                              arsenal_difficulties.name_en        AS 'ad_name_en' ,
                                              arsenal_difficulties.name_fr        AS 'ad_name_fr' ,
                                              arsenal_difficulties.styling        AS 'ad_styling'
                                      FROM    arsenal_difficulties
                                      WHERE   arsenal_difficulties.id = '$arsenal_difficulty_id' ",
                                      fetch_row: true);

  // Sanitize the data for display
  if($format === 'html')
  {
    $data['order']    = sanitize_output($arsenal_difficulty_data['ad_order']);
    $data['name_en']  = sanitize_output($arsenal_difficulty_data['ad_name_en']);
    $data['name_fr']  = sanitize_output($arsenal_difficulty_data['ad_name_fr']);
    $data['styling']  = sanitize_output($arsenal_difficulty_data['ad_styling']);
  }

  // Sanitize the data for the API
  if($format === 'api')
  {
    $data['uuid']         = sanitize_json($arsenal_difficulty_data['ad_uuid']);
    $data['name']['en']   = sanitize_json($arsenal_difficulty_data['ad_name_en']);
    $data['name']['fr']   = sanitize_json($arsenal_difficulty_data['ad_name_fr']);
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('arsenal_difficulty' => $data);
  }

  // Return the arsenal difficulty level's data
  return $data;
}




/**
 * Lists arsenal difficulty levels in the database.
 *
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array   An array containing the arsenal difficulty levels.
 */

function arsenal_difficulties_list( string $format = 'html' ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the arsenal difficulty levels
  $arsenal_difficulties = query(" SELECT    arsenal_difficulties.id             AS 'ad_id'      ,
                                            arsenal_difficulties.uuid           AS 'ad_uuid'    ,
                                            arsenal_difficulties.sorting_order  AS 'ad_order'   ,
                                            arsenal_difficulties.name_$lang     AS 'ad_name'    ,
                                            arsenal_difficulties.name_en        AS 'ad_name_en' ,
                                            arsenal_difficulties.name_fr        AS 'ad_name_fr' ,
                                            arsenal_difficulties.styling        AS 'ad_styling'
                                  FROM      arsenal_difficulties
                                  ORDER BY  arsenal_difficulties.sorting_order ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($arsenal_difficulties); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']       = sanitize_output($row['ad_id']);
      $data[$i]['order']    = sanitize_output($row['ad_order']);
      $data[$i]['name']     = sanitize_output(string_truncate($row['ad_name'], 20, '...'));
      $data[$i]['name_en']  = sanitize_output($row['ad_name_en']);
      $data[$i]['name_fr']  = sanitize_output($row['ad_name_fr']);
      $data[$i]['styling']  = sanitize_output($row['ad_styling']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']     = sanitize_json($row['ad_uuid']);
      $data[$i]['name']['en']  = sanitize_json($row['ad_name_en']);
      $data[$i]['name']['fr']  = sanitize_json($row['ad_name_fr']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('arsenal_difficulties' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds an arsenal difficulty level to the database.
 *
 * @param   array   $data   An array containing the difficulty level's data
 *
 * @return  void
 */

function arsenal_difficulties_add( array $data ) : void
{
  // Sanitize the data
  $difficulty_order   = sanitize_array_element($data, 'order', 'int');
  $difficulty_name_en = sanitize_array_element($data, 'name_en', 'string');
  $difficulty_name_fr = sanitize_array_element($data, 'name_fr', 'string');
  $difficulty_styling = sanitize_array_element($data, 'styling', 'string');

  // Add the difficulty level to the database
  query(" INSERT INTO arsenal_difficulties
          SET         arsenal_difficulties.uuid           = UUID()                ,
                      arsenal_difficulties.sorting_order  = '$difficulty_order'   ,
                      arsenal_difficulties.name_en        = '$difficulty_name_en' ,
                      arsenal_difficulties.name_fr        = '$difficulty_name_fr' ,
                      arsenal_difficulties.styling        = '$difficulty_styling' ");
}




/**
 * Edits an arsenal difficulty level in the database.
 *
 * @param   int         $difficulty_id  The id of the arsenal difficulty level to edit.
 * @param   array       $data           An array containing the arsenal difficulty level's data.
 *
 * @return  void
 */

function arsenal_difficulties_edit( int   $difficulty_id  ,
                                    array $data           ) : void
{
  // Sanitize the data
  $difficulty_id      = sanitize($difficulty_id, 'int');
  $difficulty_order   = sanitize_array_element($data, 'order', 'int');
  $difficulty_name_en = sanitize_array_element($data, 'name_en', 'string');
  $difficulty_name_fr = sanitize_array_element($data, 'name_fr', 'string');
  $difficulty_styling = sanitize_array_element($data, 'styling', 'string');

  // Stop here if the arsenal difficulty level does not exist
  if(!database_row_exists('arsenal_difficulties', $difficulty_id))
    return;

  // Edit the arsenal difficulty level
  query(" UPDATE  arsenal_difficulties
          SET     arsenal_difficulties.sorting_order  = '$difficulty_order'   ,
                  arsenal_difficulties.name_en        = '$difficulty_name_en' ,
                  arsenal_difficulties.name_fr        = '$difficulty_name_fr' ,
                  arsenal_difficulties.styling        = '$difficulty_styling'
          WHERE   arsenal_difficulties.id             = '$difficulty_id' ");
}




/**
 * Deletes an arsenal difficulty level from the database.
 *
 * @param   int     $difficulty_id  The id of the arsenal difficulty level to delete.
 *
 * @return  void
 */

function arsenal_difficulties_delete( int $difficulty_id ) : void
{
  // Sanitize the data
  $difficulty_id = sanitize($difficulty_id, 'int');

  // Delete the arsenal difficulty level from the database
  query(" DELETE FROM arsenal_difficulties
          WHERE       arsenal_difficulties.id = '$difficulty_id' ");
}