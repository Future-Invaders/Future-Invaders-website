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
/*  cards_format_body               Formats a card's body                                                            */
/*  cards_format_cost               Formats a card's cost                                                            */
/*                                                                                                                   */
/*  images_get                      Returns data related to an image                                                 */
/*  images_get_full_path            Returns the full path of an image waititng to be added to the database           */
/*  images_list                     Lists images in the database                                                     */
/*  images_list_directories         Lists directories which should be scanned for images                             */
/*  images_list_uncategorized       Lists images waiting to be added to the database                                 */
/*  images_list_languages           Lists languages with which images are tagged                                     */
/*  images_add                      Adds an image to the database                                                    */
/*  images_edit                     Edits an image in the database                                                   */
/*  images_delete                   Deletes an image from the database                                               */
/*                                                                                                                   */
/*  tags_get                        Returns data related to a tag                                                    */
/*  tags_list                       Lists tags in the database                                                       */
/*  tags_list_types                 Lists tag types in the database                                                  */
/*  tags_add                        Adds a tag to the database                                                       */
/*  tags_edit                       Edits a tag in the database                                                      */
/*  tags_delete                     Deletes a tag from the database                                                  */
/*                                                                                                                   */
/*  releases_get                    Returns data related to a release                                                */
/*  releases_list                   Lists releases in the database                                                   */
/*  releases_add                    Adds a release to the database                                                   */
/*  releases_edit                   Edits a release in the database                                                  */
/*  releases_delete                 Deletes a release from the database                                              */
/*                                                                                                                   */
/*  factions_get                    Returns data related to a faction                                                */
/*  factions_list                   Lists factions in the database                                                   */
/*  factions_add                    Adds a faction to the database                                                   */
/*  factions_edit                   Edits a faction in the database                                                  */
/*  factions_delete                 Deletes a faction from the database                                              */
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
 * @param   string      $format     (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth   (OPTIONAL)  Whether to include elements linked to the card in the API.
 *
 * @return  array|null            An array containing the card's data, or null if the card does not exist.
 */

function cards_get( int     $card_id    = null    ,
                    string  $card_uuid  = null    ,
                    string  $format     = 'html'  ,
                    bool    $no_depth   = false   ) : array|null
{
  // Return null if there are neither an id nor an uuid
  if(!$card_id && !$card_uuid)
    return null;

  // Sanitize the card's id and uuid
  $card_id   = sanitize($card_id, 'int');
  $card_uuid = sanitize($card_uuid, 'string');

  // Return null if the card does not have a valid ID
  if($card_id && !database_row_exists('cards', $card_id))
    return null;

  // Return null if the card does not have a valid UUID
  if($card_uuid && !database_entry_exists('cards', 'uuid', $card_uuid))
    return null;

  // Prepare the condition for retrieving the card
  $query_where = ($card_id) ? " WHERE cards.id = '$card_id' " : " WHERE cards.uuid = '$card_uuid' ";

  // Fetch the card's data
  $card_data = query("  SELECT  cards.id                AS 'c_id'         ,
                                cards.uuid              AS 'c_uuid'       ,
                                cards.fk_releases       AS 'c_release_id' ,
                                cards.fk_images_en      AS 'c_img_en_id'  ,
                                cards.fk_images_fr      AS 'c_img_fr_id'  ,
                                cards.fk_card_types     AS 'c_type_id'    ,
                                cards.fk_factions       AS 'c_faction_id' ,
                                cards.fk_card_rarities  AS 'c_rarity_id'  ,
                                cards.is_extra_card     AS 'c_extra'      ,
                                cards.is_hidden         AS 'c_hidden'     ,
                                cards.name_en           AS 'c_name_en'    ,
                                cards.name_fr           AS 'c_name_fr'    ,
                                cards.cost              AS 'c_cost'       ,
                                cards.income            AS 'c_income'     ,
                                cards.weapons           AS 'c_weapons'    ,
                                cards.durability        AS 'c_durability' ,
                                cards.body_en           AS 'c_body_en'    ,
                                cards.body_fr           AS 'c_body_fr'
                        FROM    cards
                        $query_where ",
                        fetch_row: true);

  // Don't retrieve hidden or extra cards through the API
  if($format === 'api' && $card_data['c_hidden'] || $card_data['c_extra'])
    return null;

  // Prepare the data for display
  if($format === 'html')
  {
    $data['name_en']      = sanitize_output($card_data['c_name_en']);
    $data['name_fr']      = sanitize_output($card_data['c_name_fr']);
    $data['image_id_en']  = sanitize_output($card_data['c_img_en_id']);
    $data['image_id_fr']  = sanitize_output($card_data['c_img_fr_id']);
    $data['type_id']      = sanitize_output($card_data['c_type_id']);
    $data['faction_id']   = sanitize_output($card_data['c_faction_id']);
    $data['rarity_id']    = sanitize_output($card_data['c_rarity_id']);
    $data['release_id']   = sanitize_output($card_data['c_release_id']);
    $data['hidden']       = sanitize_output($card_data['c_hidden']);
    $data['extra']        = sanitize_output($card_data['c_extra']);
    $data['weapons']      = sanitize_output($card_data['c_weapons']);
    $data['durability']   = sanitize_output($card_data['c_durability']);
    $data['cost']         = sanitize_output($card_data['c_cost']);
    $data['income']       = sanitize_output($card_data['c_income']);
    $data['body_en']      = sanitize_output($card_data['c_body_en']);
    $data['body_fr']      = sanitize_output($card_data['c_body_fr']);
  }

  // Prepare for the API
  if($format === 'api')
  {
    // Sanitize the data
    $data['uuid']         = sanitize_json($card_data['c_uuid']);
    $data['name']['en']   = sanitize_json($card_data['c_name_en']);
    $data['name']['fr']   = sanitize_json($card_data['c_name_fr']);
    $data['cost']         = sanitize_json($card_data['c_cost']);
    $data['income']       = sanitize_json($card_data['c_income']);
    $data['weapons']      = (int)sanitize_json($card_data['c_weapons']);
    $data['durability']   = (int)sanitize_json($card_data['c_durability']);
    $data['body']['en']   = sanitize_json($card_data['c_body_en']);
    $data['body']['fr']   = sanitize_json($card_data['c_body_fr']);
    $data['release']      = ($card_data['c_release_id'])
                          ? releases_get($card_data['c_release_id'], format: 'api', no_parent_array: true)
                          : array();
    $data['faction']      = ($card_data['c_faction_id'])
                          ? factions_get($card_data['c_faction_id'], format: 'api', no_parent_array: true)
                          : array();
    $data['type']         = ($card_data['c_type_id'])
                          ? card_types_get($card_data['c_type_id'], format: 'api', no_parent_array: true)
                          : array();
    $data['rarity']       = ($card_data['c_rarity_id'])
                          ? card_rarities_get($card_data['c_rarity_id'], format: 'api', no_parent_array: true)
                          : array();
    $data['images']['en'] = ($card_data['c_img_en_id'])
                          ? images_get($card_data['c_img_en_id'], format: 'api', no_depth: true, no_parent_array: true)
                          : array();
    $data['images']['fr'] = ($card_data['c_img_fr_id'])
                          ? images_get($card_data['c_img_fr_id'], format: 'api', no_depth: true,no_parent_array: true)
                          : array();

    // Add linked tags
    if(!$no_depth)
    {
      // Fetch linked tags
      $card_id = sanitize($card_data['c_id'], 'int');
      $qtags = query("  SELECT  tags_cards.fk_tags AS 'ct_id'
                        FROM    tags_cards
                        WHERE   tags_cards.fk_cards = '$card_id' ");

      // Prepare linked tags for display
      for($i = 0; $dtags = query_row($qtags); $i++)
        $data['tags'][$i] = tags_get( tag_id:   $dtags['ct_id'] ,
                                      format:   $format         ,
                                      no_depth:  true           );

      // If there are no linked tags, show an empty array
      if($i === 0)
        $data['tags'] = array();
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
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the cards.
 */

function cards_list( string  $sort_by  = 'name'  ,
                     array   $search   = array() ,
                     string  $format   = 'html'  ) : array
{
  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanitize the search data
  $search_name          = sanitize_array_element($search, 'name', 'string');
  $search_release_id    = sanitize_array_element($search, 'release_id', 'int');
  $search_release_uuid  = sanitize_array_element($search, 'release_uuid', 'string');
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
  $search_tag_id        = sanitize_array_element($search, 'tag_id', 'int');
  $search_tag           = sanitize_array_element($search, 'tag', 'string');

  // Search through the data
  $query_search  = ($search_name)           ? " WHERE ( cards.name_en     LIKE '%$search_name%'
                                                OR    cards.name_fr       LIKE '%$search_name%' ) "  : " WHERE 1 = 1 ";
  $query_search .= ($search_release_id && $search_release_id !== -1)
                                            ? " AND   releases.id         = '$search_release_id' "    : "";
  $query_search .= ($search_release_id === -1)
                                            ? " AND   releases.id         IS NULL "                   : "";
  $query_search .= ($search_release_uuid)   ? " AND   releases.uuid       = '$search_release_uuid' "  : "";
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

  // Filter out hidden cards and extra cards in the API
  $query_search .= ($format === 'api')      ? " AND   cards.is_hidden       = '0'
                                                AND   cards.is_extra_card   = '0' "                   : "";

  // Use a different search technique for tags
  $query_having = ($search_tag_id && $search_tag_id !== -1)
                ? " HAVING FIND_IN_SET('$search_tag_id', GROUP_CONCAT(tags.id)) > 0 "
                : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'tags'        => " ORDER BY COUNT(tags.id)              DESC    ,
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
                              releases.name_$lang           AS 'r_name'       ,
                              releases.name_en              AS 'r_name_en'    ,
                              releases.name_fr              AS 'r_name_fr'    ,
                              card_types.id                 AS 'ct_id'        ,
                              card_types.name_en            AS 'ct_name_en'   ,
                              card_types.name_fr            AS 'ct_name_fr'   ,
                              card_types.name_$lang         AS 'ct_name'      ,
                              card_types.styling            AS 'ct_styling'   ,
                              factions.id                   AS 'f_id'         ,
                              factions.name_en              AS 'f_name_en'    ,
                              factions.name_fr              AS 'f_name_fr'    ,
                              factions.name_$lang           AS 'f_name'       ,
                              factions.styling              AS 'f_styling'    ,
                              card_rarities.id              AS 'cr_id'        ,
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
                              COUNT(tags.id)                AS 'ct_count'     ,
                              GROUP_CONCAT(tags.name ORDER BY tags.name ASC SEPARATOR ', ')
                                                            AS 'ct_names'
                    FROM      cards
                    LEFT JOIN releases            ON releases.id          = cards.fk_releases
                    LEFT JOIN factions            ON factions.id          = cards.fk_factions
                    LEFT JOIN card_types          ON card_types.id        = cards.fk_card_types
                    LEFT JOIN card_rarities       ON card_rarities.id     = cards.fk_card_rarities
                    LEFT JOIN images AS images_en ON images_en.id         = cards.fk_images_en
                    LEFT JOIN images AS images_fr ON images_fr.id         = cards.fk_images_fr
                    LEFT JOIN tags_cards          ON tags_cards.fk_cards  = cards.id
                    LEFT JOIN tags                ON tags.id              = tags_cards.fk_tags
                    $query_search
                    GROUP BY  cards.id
                    $query_having
                    $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($cards); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']           = sanitize_output($row['c_id']);
      $data[$i]['name']         = sanitize_output(string_truncate($row['c_name'], 25, '...'));
      $data[$i]['name_en']      = sanitize_output($row['c_name_en']);
      $data[$i]['name_fr']      = sanitize_output($row['c_name_fr']);
      $data[$i]['release']      = sanitize_output(string_truncate($row['r_name'], 12, '...'));
      $data[$i]['release_en']   = sanitize_output($row['r_name_en']);
      $data[$i]['release_fr']   = sanitize_output($row['r_name_fr']);
      $data[$i]['type']         = sanitize_output($row['ct_name']);
      $data[$i]['type_css']     = sanitize_output($row['ct_styling']);
      $data[$i]['faction']      = sanitize_output($row['f_name']);
      $data[$i]['faction_css']  = sanitize_output($row['f_styling']);
      $data[$i]['rarity']       = sanitize_output($row['cr_name']);
      $data[$i]['rarity_css']   = sanitize_output($row['cr_styling']);
      $data[$i]['cost']         = cards_format_cost($row['c_cost']);
      $data[$i]['income']       = cards_format_cost($row['c_income']);
      $data[$i]['weapons']      = $row['c_weapons'] ? sanitize_output($row['c_weapons']) : '&nbsp;';
      $data[$i]['durability']   = $row['c_durability'] ? sanitize_output($row['c_durability']) : '&nbsp;';
      $data[$i]['length_en']    = sanitize_output($row['c_length_en']);
      $data[$i]['length_fr']    = sanitize_output($row['c_length_fr']);
      $data[$i]['body_en_raw']  = cards_format_body($row['c_body_en']);
      $data[$i]['body_fr_raw']  = cards_format_body($row['c_body_fr']);
      $data[$i]['image_en']     = sanitize_output($row['i_path_en']);
      $data[$i]['image_fr']     = sanitize_output($row['i_path_fr']);
      $data[$i]['extra']        = sanitize_output($row['c_extra']);
      $data[$i]['hidden']       = sanitize_output($row['c_hidden']);
      $data[$i]['ntags']        = sanitize_output($row['ct_count']);
      $data[$i]['tags']         = sanitize_output($row['ct_names']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']                       = sanitize_json($row['c_uuid']);
      $data[$i]['name']['en']                 = sanitize_json($row['c_name_en']);
      $data[$i]['name']['fr']                 = sanitize_json($row['c_name_fr']);
      $data[$i]['cost']                       = sanitize_json($row['c_cost']);
      $data[$i]['income']                     = sanitize_json($row['c_income']);
      $data[$i]['weapons']                    = (int)sanitize_json($row['c_weapons']);
      $data[$i]['durability']                 = (int)sanitize_json($row['c_durability']);
      $data[$i]['body']['en']                 = sanitize_json($row['c_body_en']);
      $data[$i]['body']['fr']                 = sanitize_json($row['c_body_fr']);
      if($row['r_id'])
      {
        $data[$i]['release']['en']            = sanitize_json($row['r_name_en']);
        $data[$i]['release']['fr']            = sanitize_json($row['r_name_fr']);
      }
      else
        $data[$i]['release']                  = array();
      if($row['f_id'])
      {
        $data[$i]['faction']['en']            = sanitize_json($row['f_name_en']);
        $data[$i]['faction']['fr']            = sanitize_json($row['f_name_fr']);
      }
      else
        $data[$i]['faction']                  = array();
      if($row['ct_id'])
      {
        $data[$i]['type']['en']               = sanitize_json($row['ct_name_en']);
        $data[$i]['type']['fr']               = sanitize_json($row['ct_name_fr']);
      }
      else
        $data[$i]['type']                     = array();
      if($row['cr_id'])
      {
        $data[$i]['rarity']['en']             = sanitize_json($row['cr_name_en']);
        $data[$i]['rarity']['fr']             = sanitize_json($row['cr_name_fr']);
        $data[$i]['rarity']['max_card_count'] = (int)sanitize_json($row['cr_max_count']);
      }
      else
        $data[$i]['rarity']                   = array();
      if(!$row['i_id_en'] && !$row['i_id_fr'])
        $data[$i]['images']                   = array();
      if($row['i_id_en'])
      {
        $data[$i]['images']['en']['uuid']     = sanitize_json($row['i_uuid_en']);
        $data[$i]['images']['en']['path']     = sanitize_json($GLOBALS['website_url'].$row['i_path_en']);
        $data[$i]['images']['en']['endpoint'] = sanitize_json($GLOBALS['website_url'].'api/image/'.$row['i_uuid_en']);
      }
      if($row['i_id_fr'])
      {
        $data[$i]['images']['fr']['uuid']     = sanitize_json($row['i_uuid_fr']);
        $data[$i]['images']['fr']['path']     = sanitize_json($GLOBALS['website_url'].$row['i_path_fr']);
        $data[$i]['images']['fr']['endpoint'] = sanitize_json($GLOBALS['website_url'].'api/image/'.$row['i_uuid_fr']);
      }
      $data[$i]['tags']     = ($row['ct_names']) ? explode(', ', $row['ct_names']) : array();
      $data[$i]['endpoint'] = sanitize_json($GLOBALS['website_url'].'api/card/'.$row['c_uuid']);
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

  // Edit the card
  query(" UPDATE  cards
          SET     cards.name_en           = '$card_name_en'  ,
                  cards.name_fr           = '$card_name_fr'  ,
                  cards.fk_images_en      = '$card_image_en' ,
                  cards.fk_images_fr      = '$card_image_fr' ,
                  cards.fk_card_types     = '$card_type'     ,
                  cards.fk_factions       = '$card_faction'  ,
                  cards.fk_card_rarities  = '$card_rarity' ,
                  cards.fk_releases       = '$card_release',
                  cards.is_hidden         = '$card_hidden'   ,
                  cards.is_extra_card     = '$card_extra'    ,
                  cards.weapons           = '$card_weapons'  ,
                  cards.cost              = '$card_cost'     ,
                  cards.durability        = '$card_durability',
                  cards.income            = '$card_income'   ,
                  cards.body_en           = '$card_body_en'  ,
                  cards.body_fr           = '$card_body_fr'
          WHERE   cards.id                = '$card_id' ");

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
  $body = preg_replace('/\[T\]/is', "<img src=\"".$path."/img/gameicons/oil.png\" alt=\"[T]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[I\]/is', "<img src=\"".$path."/img/gameicons/tech.png\" alt=\"[I]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[O\]/is', "<img src=\"".$path."/img/gameicons/life.png\" alt=\"[O]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[P\]/is', "<img src=\"".$path."/img/gameicons/scrap.png\" alt=\"[P]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[X\]/is', "<img src=\"".$path."/img/gameicons/credits.png\" alt=\"[X]\" class=\"valign_middle gameicon\">", $body);

  // Add card type icons
  $body = preg_replace('/\[S\]/is', "<img src=\"".$path."/img/gameicons/ship.png\" alt=\"[S]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[A\]/is', "<img src=\"".$path."/img/gameicons/action.png\" alt=\"[A]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[R\]/is', "<img src=\"".$path."/img/gameicons/reaction.png\" alt=\"[R]\" class=\"valign_middle gameicon\">", $body);
  $body = preg_replace('/\[B\]/is', "<img src=\"".$path."/img/gameicons/structure.png\" alt=\"[B]\" class=\"valign_middle gameicon\">", $body);

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



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    IMAGES                                                         */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to an image.
 *
 * @param   int         $image_id         (OPTIONAL)  The id of the image.
 * @param   string      $image_uuid       (OPTIONAL)  The uuid of the image.
 * @param   string      $format           (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth         (OPTIONAL)  Whether to include elements linked to the image in the API.
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null                    An array containing the image's data, or null if the image does not exist.
 */

function images_get(  ?int    $image_id         = null    ,
                      ?string $image_uuid       = null    ,
                      string  $format           = 'html'  ,
                      bool    $no_depth         = false   ,
                      bool    $no_parent_array  = false   ) : array|null
{
  // Return null if there are neither an id nor an uuid
  if(!$image_id && !$image_uuid)
    return null;

  // Sanitize the image's id and uuid
  $image_id   = sanitize($image_id, 'int');
  $image_uuid = sanitize($image_uuid, 'string');

  // Return null if the tag does not have a valid ID
  if($image_id && !database_row_exists('images', $image_id))
    return null;

  // Return null if the tag does not have a valid UUID
  if($image_uuid && !database_entry_exists('images', 'uuid', $image_uuid))
    return null;

  // Prepare the condition for retrieving the image
  $query_where = ($image_id) ? " WHERE images.id = '$image_id' " : " WHERE images.uuid = '$image_uuid' ";

  // Fetch the image's data
  $image_data = query(" SELECT  images.id       AS 'i_id'   ,
                                images.uuid     AS 'i_uuid' ,
                                images.path     AS 'i_path' ,
                                images.name     AS 'i_name' ,
                                images.language AS 'i_lang' ,
                                images.artist   AS 'i_artist'
                        FROM    images
                        $query_where ",
                        fetch_row: true);

  // Prepare the data for display
  if($format === 'html')
  {
    $data['path']   = sanitize_output($image_data['i_path']);
    $data['name']   = sanitize_output($image_data['i_name']);
    $data['lang']   = sanitize_output($image_data['i_lang']);
    $data['artist'] = sanitize_output($image_data['i_artist']);
  }

  // Prepare the data for the API
  if($format === 'api')
  {
    $data['uuid']     = sanitize_json($image_data['i_uuid']);
    $data['name']     = sanitize_json($image_data['i_name']);
    $data['language'] = sanitize_json($image_data['i_lang']);
    $data['artist']   = sanitize_json($image_data['i_artist']);
    $data['path']     = sanitize_json($GLOBALS['website_url'].$image_data['i_path']);
  }

  // Add linked tags
  if(!$no_depth)
  {
    // Fetch linked tags
    $image_id = sanitize($image_data['i_id'], 'int');
    $qtags = query("  SELECT  tags_images.fk_tags AS 'it_id'
                      FROM    tags_images
                      WHERE   tags_images.fk_images = '$image_id' ");

    // Prepare linked tags for display
    for($i = 0; $dtags = query_row($qtags); $i++)
      $data['tags'][$i] = tags_get( tag_id:   $dtags['it_id'] ,
                                    format:   $format         ,
                                    no_depth:  true           );

    // If there are no linked tags, show an empty array
    if($i === 0)
      $data['tags'] = array();
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('image' => $data);
  }

  // Return the image's data
  return $data;
}




/**
 * Lists images in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array   An array containing the images.
 */

function images_list( string  $sort_by  = 'path'  ,
                      array   $search   = array() ,
                      string  $format   = 'html'  ) : array
{
  // Sanatize the search data
  $search_path    = sanitize_array_element($search, 'path', 'string');
  $search_name    = sanitize_array_element($search, 'name', 'string');
  $search_lang    = sanitize_array_element($search, 'lang', 'string');
  $search_artist  = sanitize_array_element($search, 'artist', 'string');
  $search_tag_id  = sanitize_array_element($search, 'tag_id', 'int');
  $search_tag     = sanitize_array_element($search, 'tag', 'string');

  // Search through the data
  $query_search =  ($search_path)             ? " WHERE images.path     LIKE '%$search_path%' "   : " WHERE 1 = 1 ";
  $query_search .= ($search_name)             ? " AND   images.name     LIKE '%$search_name%' "   : "";
  $query_search .= ($search_lang && $search_lang !== "none")
                                              ? " AND   images.language = '$search_lang' "        : "";
  $query_search .= ($search_lang === "none")  ? " AND   images.language = '' "                    : "";
  $query_search .= ($search_artist)           ? " AND   images.artist   LIKE '%$search_artist%' " : "";
  $query_search .= ($search_tag_id === -1)    ? " AND   tags.id         IS NULL "                 : "";
  $query_search .= ($search_tag)              ? " AND   tags.name       LIKE '$search_tag' "      : "";

  // Use a different search technique for tags
  $query_having = ($search_tag_id && $search_tag_id !== -1)
                ? " HAVING FIND_IN_SET('$search_tag_id', GROUP_CONCAT(tags.id)) > 0 "
                : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'    => " ORDER BY images.name     ASC   ,
                            images.path     ASC   ",
    'lang'    => " ORDER BY images.language = ''  ,
                            images.language ASC   ,
                            images.path     ASC   ",
    'artist'  => " ORDER BY images.artist   ASC   ,
                            images.path     ASC   ",
    'tags'    => " ORDER BY COUNT(tags.id)  DESC  ,
                            images.path     ASC   ",
    default   => " ORDER BY images.path     ASC   ",
  };

  // Get a list of all images in the database
  $qimages = query("  SELECT    images.id       AS 'i_id'     ,
                                images.uuid     AS 'i_uuid'   ,
                                images.path     AS 'i_path'   ,
                                images.name     AS 'i_name'   ,
                                images.language AS 'i_lang'   ,
                                images.artist   AS 'i_artist' ,
                                COUNT(tags.id)  AS 'it_count' ,
                                GROUP_CONCAT(tags.name ORDER BY tags.name ASC SEPARATOR ', ')
                                                AS 'it_names'
                      FROM      images
                      LEFT JOIN tags_images ON tags_images.fk_images  = images.id
                      LEFT JOIN tags        ON tags.id                = tags_images.fk_tags
                      $query_search
                      GROUP BY  images.id
                      $query_having
                      $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($qimages); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']     = sanitize_output($row['i_id']);
      $data[$i]['path']   = './../../'.sanitize_output($row['i_path']);
      $data[$i]['dpath']  = sanitize_output($row['i_path']);
      $data[$i]['spath']  = sanitize_output(mb_substr($row['i_path'], 4));
      $data[$i]['ppath']  = sanitize_output(string_truncate($row['i_path'], 25, '...'));
      $data[$i]['bpath']  = sanitize_output(basename($row['i_path']));
      $data[$i]['name']   = sanitize_output(string_truncate($row['i_name'], 20, '...'));
      $data[$i]['fname']  = sanitize_output($row['i_name']);
      $data[$i]['lang']   = sanitize_output($row['i_lang']);
      $data[$i]['blang']  = sanitize_output(string_change_case($row['i_lang'], 'uppercase'));
      $data[$i]['artist'] = sanitize_output($row['i_artist']);
      $data[$i]['ntags']  = sanitize_output($row['it_count']);
      $data[$i]['tags']   = sanitize_output($row['it_names']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']     = sanitize_json($row['i_uuid']);
      $data[$i]['name']     = sanitize_json($row['i_name']);
      $data[$i]['language'] = sanitize_json($row['i_lang']);
      $data[$i]['artist']   = sanitize_json($row['i_artist']);
      $data[$i]['path']     = sanitize_json($GLOBALS['website_url'].$row['i_path']);
      $data[$i]['tags']     = ($row['it_names']) ? explode(', ', $row['it_names']) : array();
      $data[$i]['endpoint'] = sanitize_json($GLOBALS['website_url'].'api/image/'.$row['i_uuid']);
    }
  }

  // Add the number of rows to the data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('images' => $data);
  }

  // Return the prepared data
  return $data;
}



/**
 * Lists directories which should be scanned for images.
 *
 * @return  array   An array containing the directories.
 */

function images_list_directories() : array
{
  $directories = array( 'rules'     ,
                        'lore'      ,
                        'cards/en'  ,
                        'cards/fr'  ,
                        'extras/en' ,
                        'extras/fr' );

  // Return the directories
  return $directories;
}




/**
 * Lists images waiting to be added to the database.
 *
 * @return  array   An array containing the images.
 */

function images_list_uncategorized() : array
{
  // Decide in which directories to look for images
  $directories = images_list_directories();

  // Decide which files should be removed from the list
  $files_to_remove = array('.', '..', 'index.php');

  // Get a list of all images in the database
  $qimages = query("  SELECT    images.path AS 'i_path'
                      FROM      images ");

  // Store these images in an array
  $images_list = array();
  while($dimages = query_row($qimages, 'both'))
    $images_list[] = './../../'.$dimages['i_path'];

  // Look for images that aren't in the database
  foreach($directories as $directory)
  {
    // Fetch the images in the directory
    if(is_dir('./../../img/'.$directory))
      // Get the full path of the images
      $images_in_directory = scandir('./../../img/'.$directory);
    else
      $images_in_directory = array();

    // Remove some files from the list
    foreach($files_to_remove as $file)
      if(in_array($file, $images_in_directory))
        unset($images_in_directory[array_search($file, $images_in_directory)]);

    // Add the images to the array if they aren't in the database
    foreach($images_in_directory as $image)
      if(!in_array('./../../img/'.$directory.'/'.$image, $images_list))
        $missing_images[] = 'img/'.$directory.'/'.$image;

    // Use an empty array if the directory has no images
    if(!isset($missing_images))
      $missing_images = array();

    // Replace slashes in the image path with double pipes
    foreach($missing_images as $i => $image)
      $missing_images[$i] = str_replace('/', '||', $image);

    // Sort the list alphabetically
    sort($missing_images);
  }

  // Add the number of rows to the returned data
  $missing_images['rows'] = isset($missing_images) ? count($missing_images) : 0;

  // Return the images
  return $missing_images;
}




/**
 * Lists languages with which images are tagged.
 *
 * @return  array   An array containing the languages.
 */

function images_list_languages() : array
{
  // Fetch image languages
  $image_languages = query("  SELECT    images.language AS 'i_lang'
                              FROM      images
                              WHERE     images.language != ''
                              GROUP BY  images.language
                              ORDER BY  images.language ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($image_languages); $i++)
  {
    $data[$i]['lang']   = sanitize_output($row['i_lang']);
    $data[$i]['blang']  = sanitize_output(string_change_case($row['i_lang'], 'uppercase'));
  }

  // Add the number of rows to the returned data
  $data['rows'] = $i;

  // Return the prepared data
  return $data;
}




/**
 * Adds an image to the database.
 *
 * @param   array   $data  An array containing the image's data.
 *
 * @return  void
 */

function images_add( array $data ) : void
{
  // Stop here if there is no image path
  if(!isset($data['image_path']))
    return;

  // Sanatize image data
  $image_add_path   = sanitize($data['image_path'], 'string');
  $image_add_name   = sanitize_array_element($data, 'image_name', 'string');
  $image_add_lang   = sanitize_array_element($data, 'image_lang', 'string');
  $image_add_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Look for the image in the database
  $qimage = query(" SELECT  images.id AS 'i_id'
                    FROM    images
                    WHERE   images.path = '$image_add_path' ",
                    fetch_row: true);

  // Stop here if the image is already in the database
  if($qimage['i_id'])
    return;

  // Add the image to the database
  query(" INSERT INTO images
          SET         images.uuid     = UUID()              ,
                      images.path     = '$image_add_path'   ,
                      images.name     = '$image_add_name'   ,
                      images.language = '$image_add_lang' ,
                      images.artist   = '$image_add_artist' ");

  // Get the newly created image's id
  $image_id = sanitize(query_id(), "int");

  // Fetch a list of image tags
  $image_tags = tags_list(search: array('ftype' => 'Image'));

  // Add the image's tags to the database
  for($i = 0; $i < $image_tags['rows']; $i++)
  {
    $tag_id = $image_tags[$i]['id'];
    if($data['image_tags'][$image_tags[$i]['id']])
      query(" INSERT INTO tags_images
              SET         tags_images.fk_images = '$image_id' ,
                          tags_images.fk_tags   = '$tag_id'   ");
  }
}




/**
 * Edits an image in the database.
 *
 * @param   int         $image_id   The id of the image to edit.
 * @param   array       $data       An array containing the image's data.
 *
 * @return  void
 */

function images_edit( int   $image_id ,
                      array $data     ) : void
{
  // Sanitize the data
  $image_id     = sanitize($image_id, 'int');
  $image_name   = sanitize_array_element($data, 'image_name', 'string');
  $image_lang   = sanitize_array_element($data, 'image_lang', 'string');
  $image_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Stop here if the image does not exist
  if(!database_row_exists('images', $image_id))
    return;

  // Edit the image
  query(" UPDATE  images
          SET     images.name     = '$image_name'   ,
                  images.language = '$image_lang' ,
                  images.artist   = '$image_artist'
          WHERE   images.id       = '$image_id' ");

  // Fetch a list of image tags
  $image_tags = tags_list(search: array('ftype' => 'Image'));

  // Update the image's tags in the database
  for($i = 0; $i < $image_tags['rows']; $i++)
  {
    // Check the current status of each tag
    $tag_id = $image_tags[$i]['id'];
    $tag_check = query("  SELECT  tags_images.id AS 'ti_id'
                          FROM    tags_images
                          WHERE   tags_images.fk_images = '$image_id'
                          AND     tags_images.fk_tags   = '$tag_id' ",
                          fetch_row: true);

    // Create missing tags
    if($data['image_tags'][$image_tags[$i]['id']] && is_null($tag_check))
      query(" INSERT INTO tags_images
              SET         tags_images.fk_images = '$image_id' ,
                          tags_images.fk_tags   = '$tag_id'   ");

    // Delete extraneous tags
    if(!$data['image_tags'][$image_tags[$i]['id']] && !is_null($tag_check))
      query(" DELETE FROM tags_images
              WHERE       tags_images.fk_images = '$image_id'
              AND         tags_images.fk_tags   = '$tag_id'   ");
  }
}




/**
 * Deletes an image from the database.
 *
 * @param   int     $image_id  The id of the image to delete.
 *
 * @return  void
 */

function images_delete( int $image_id ) : void
{
  // Sanitize the data
  $image_id = sanitize($image_id, 'int');

  // Delete the image from the database
  query(" DELETE FROM images
          WHERE   images.id = '$image_id' ");

  // Delete the image's tags from the database
  query(" DELETE FROM tags_images
          WHERE       tags_images.fk_images = '$image_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    TAGS                                                           */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a tag.
 *
 * @param   int         $tag_id   (OPTIONAL)  The id of the tag.
 * @param   string      $tag_uuid (OPTIONAL)  The uuid of the tag.
 * @param   string      $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth (OPTIONAL)  Whether to include elements linked to the tag.
 *
 * @return  array|null            An array containing the tag's data, or null if the tag does not exist.
 */

function tags_get(  ?int    $tag_id   = NULL    ,
                    ?string $tag_uuid = NULL    ,
                    string  $format   = 'html'  ,
                    bool    $no_depth = false   ) : array|null
{
  // Return null if there are neither an id nor an uuid
  if(!$tag_id && !$tag_uuid)
    return null;

  // Sanitize the tag's id and uuid
  $tag_id   = sanitize($tag_id, 'int');
  $tag_uuid = sanitize($tag_uuid, 'string');

  // Return null if the tag does not have a valid ID
  if($tag_id && !database_row_exists('tags', $tag_id))
    return null;

  // Return null if the tag does not have a valid UUID
  if($tag_uuid && !database_entry_exists('tags', 'uuid', $tag_uuid))
    return null;

  // Prepare the condition for retrieving the tag
  $query_where = ($tag_id) ? " WHERE tags.id = '$tag_id' " : " WHERE tags.uuid = '$tag_uuid' ";

  // Fetch the tag's data
  $tag_data = query(" SELECT    tags.id             AS 't_id'       ,
                                tags.uuid           AS 't_uuid'     ,
                                tags.name           AS 't_name'     ,
                                tags.description_en AS 't_desc_en'  ,
                                tags.description_fr AS 't_desc_fr'  ,
                                tag_types.name      AS 'tt_name'
                      FROM      tags
                      LEFT JOIN tag_types ON tags.fk_tag_types = tag_types.id
                      $query_where ",
                      fetch_row: true);

  // Prepare the data for display
  if($format === 'html')
  {
    $data['id']       = sanitize_output($tag_data['t_id']);
    $data['name']     = sanitize_output($tag_data['t_name']);
    $data['desc_en']  = sanitize_output($tag_data['t_desc_en']);
    $data['desc_fr']  = sanitize_output($tag_data['t_desc_fr']);
  }

  // Prepare the data for the API
  if($format === 'api')
  {
    // Sanitize the data
    $data['uuid']               = sanitize_json($tag_data['t_uuid']);
    $data['type']               = sanitize_json($tag_data['tt_name']);
    $data['name']               = sanitize_json($tag_data['t_name']);
    $data['description']['en']  = sanitize_json($tag_data['t_desc_en']);
    $data['description']['fr']  = sanitize_json($tag_data['t_desc_fr']);

    // Sanitize the tag's id
    $tag_id = sanitize($tag_data['t_id'], 'int');

    // Add linked images
    if(!$no_depth)
    {
      // Fetch linked images
      $qimages = query("  SELECT  tags_images.fk_images AS 'ti_id'
                          FROM    tags_images
                          WHERE   tags_images.fk_tags = '$tag_id' ");

      // Prepare linked images for display
      for($i = 0; $dimages = query_row($qimages); $i++)
        $data['linked_images'][$i] = images_get(  image_id: $dimages['ti_id'] ,
                                                  format:   'api'         ,
                                                  no_depth: true          );

      // If there are no linked images, show an empty array
      if($i === 0)
        $data['linked_images'] = array();

      // Fetch linked cards
      $qcards = query(" SELECT    tags_cards.fk_cards AS 'tc_id'
                        FROM      tags_cards
                        LEFT JOIN cards ON tags_cards.fk_cards = cards.id
                        WHERE     tags_cards.fk_tags  = '$tag_id'
                        AND       cards.is_hidden     = '0'
                        AND       cards.is_extra_card = '0' ");

      // Prepare linked cards for display
      for($i = 0; $dcards = query_row($qcards); $i++)
        $data['linked_cards'][$i] = cards_get(  card_id: $dcards['tc_id'] ,
                                                format:   'api'         ,
                                                no_depth: true          );

      // If there are no linked cards, show an empty array
      if($i === 0)
        $data['linked_cards'] = array();
    }

    // Prepare for the API
    $data = (isset($data)) ? $data : NULL;
    $data = array('tag' => $data);
  }

  // Return the tag's data
  return $data;
}




/**
 * Lists tags in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the tags.
 */

function tags_list( string  $sort_by  = 'name'  ,
                    array   $search   = array() ,
                    string  $format   = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanatize the search data
  $search_type  = sanitize_array_element($search, 'type', 'int');
  $search_ftype = sanitize_array_element($search, 'ftype', 'string');
  $search_name  = sanitize_array_element($search, 'name', 'string');
  $search_desc  = sanitize_array_element($search, 'desc', 'string');
  $search_image = sanitize_array_element($search, 'image_id', 'int');
  $search_card  = sanitize_array_element($search, 'card_id', 'int');

  // Search through the data
  $query_search  =  ($search_type)  ? " WHERE tags.fk_tag_types   =    '$search_type' "     : " WHERE 1 = 1 ";
  $query_search .=  ($search_ftype) ? " AND   tag_types.name      LIKE '$search_ftype' "    : "";
  $query_search .=  ($search_name)  ? " AND   tags.name           LIKE '%$search_name%' "   : "";
  $query_search .=  ($search_desc)  ? " AND ( tags.description_en LIKE '%$search_desc%'
                                        OR    tags.description_fr LIKE '%$search_desc%' ) " : "";

  // Search for tagged images
  $query_images  = ($search_image)  ? " LEFT JOIN tags_images ON tags_images.fk_tags = tags.id "  : "";
  $query_search .= ($search_image)  ? " AND tags_images.fk_images = '$search_image' "             : "";

  // Search for tagged cards
  $query_cards    = ($search_card)  ? " LEFT JOIN tags_cards ON tags_cards.fk_tags = tags.id "  : "";
  $query_search  .= ($search_card)  ? " AND tags_cards.fk_cards = '$search_card' "              : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'  => " ORDER BY tags.name               ASC ,
                          tag_types.name          ASC ",
    'desc'  => " ORDER BY tags.description_$lang  ASC ,
                          tag_types.name          ASC ,
                          tags.name               ASC ",
    'api'   => " ORDER BY tag_types.name          ASC ,
                          tags.name               ASC ",
    default => " ORDER BY tag_types.name          ASC ,
                          tags.name               ASC ",
  };

  // Fetch the tags
  $tags = query("  SELECT     tags.id             AS 't_id'       ,
                              tags.uuid           AS 't_uuid'     ,
                              tags.name           AS 't_name'     ,
                              tags.description_en AS 't_desc_en'  ,
                              tags.description_fr AS 't_desc_fr'  ,
                              tag_types.id        AS 'tt_id'      ,
                              tag_types.name      AS 'tt_type'
                    FROM      tags
                    LEFT JOIN tag_types ON tags.fk_tag_types = tag_types.id
                    $query_images
                    $query_cards
                    $query_search
                    $query_sort ");

  // Reset the number of tag types
  $tag_types = tags_list_types();
  if($format === 'html')
  {
    for($i = 0; $i < $tag_types['rows']; $i++)
    {
      $data['type_name'][$tag_types[$i]['id']]  = $tag_types[$i]['name'];
      $data['type_count'][$tag_types[$i]['id']] = 0;
    }
  }

  // Prepare the data for display
  for($i = 0; $row = query_row($tags); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      // Sanatize the data
      $data[$i]['id']     = sanitize_output($row['t_id']);
      $data[$i]['name']   = sanitize_output(string_truncate($row['t_name'], 25, '...'));
      $data[$i]['fname']  = sanitize_output($row['t_name']);
      $data[$i]['type']   = sanitize_output($row['tt_type']);
      $data[$i]['desc']   = sanitize_output(string_truncate($row['t_desc_'.$lang], 50, '...'));
      $data[$i]['fdesc']  = sanitize_output($row['t_desc_'.$lang], preserve_line_breaks: true);

      // Count tag types
      $data['type_count'][$row['tt_id']]++;
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']               = sanitize_json($row['t_uuid']);
      $data[$i]['type']               = sanitize_json($row['tt_type']);
      $data[$i]['name']               = sanitize_json($row['t_name']);
      $data[$i]['description']['en']  = sanitize_json($row['t_desc_en']);
      $data[$i]['description']['fr']  = sanitize_json($row['t_desc_fr']);
      $data[$i]['endpoint']           = sanitize_json($GLOBALS['website_url'].'api/tag/'.$row['t_uuid']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('tags' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Lists tag types in the database.
 *
 * @return  array   An array containing the tag types.
 */

function tags_list_types() : array
{
  // Fetch the tag types
  $tag_types = query("  SELECT    tag_types.id    AS 'tt_id' ,
                                  tag_types.name  AS 'tt_name'
                        FROM      tag_types
                        ORDER BY  tag_types.name ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($tag_types); $i++)
  {
    $data[$i]['id']   = sanitize_output($row['tt_id']);
    $data[$i]['name'] = sanitize_output($row['tt_name']);
  }

  // Add the number of rows to the returned data
  $data['rows'] = $i;

  // Return the prepared data
  return $data;
}




/**
 * Adds a tag to the database.
 *
 * @param   array   $data  An array containing the tag's data.
 *
 * @return  void
 */

function tags_add( array $data ) : void
{
  // Sanitize the data
  $tag_type     = sanitize_array_element($data, 'type', 'int');
  $tag_name     = sanitize_array_element($data, 'name', 'string');
  $tag_desc_en  = sanitize_array_element($data, 'desc_en', 'string');
  $tag_desc_fr  = sanitize_array_element($data, 'desc_fr', 'string');

  // Add the tag to the database
  query(" INSERT INTO tags
          SET         tags.uuid           = UUID()          ,
                      tags.fk_tag_types   = '$tag_type'     ,
                      tags.name           = '$tag_name'     ,
                      tags.description_en = '$tag_desc_en'  ,
                      tags.description_fr = '$tag_desc_fr'  ");
}




/**
 * Edits a tag in the database.
 *
 * @param   int         $tag_id   The id of the tag to edit.
 * @param   array       $data     An array containing the tag's data.
 *
 * @return  void
 */

function tags_edit( int   $tag_id ,
                    array $data     ) : void
{
  // Sanitize the data
  $tag_id       = sanitize($tag_id, 'int');
  $tag_name     = sanitize_array_element($data, 'name', 'string');
  $tag_desc_en  = sanitize_array_element($data, 'desc_en', 'string');
  $tag_desc_fr  = sanitize_array_element($data, 'desc_fr', 'string');

  // Stop here if the tag does not exist
  if(!database_row_exists('tags', $tag_id))
    return;

  // Edit the tag
  query(" UPDATE  tags
          SET     tags.name           = '$tag_name'     ,
                  tags.description_en = '$tag_desc_en'  ,
                  tags.description_fr = '$tag_desc_fr'
          WHERE   tags.id             = '$tag_id' ");
}




/**
 * Deletes a tag from the database.
 *
 * @param   int     $tag_id  The id of the tag to delete.
 *
 * @return  void
 */

function tags_delete( int $tag_id ) : void
{
  // Sanitize the data
  $tag_id = sanitize($tag_id, 'int');

  // Delete the tag from the database
  query(" DELETE FROM tags
          WHERE       tags.id = '$tag_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     RELEASES                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a release.
 *
 * @param   int         $release_id                   The id of the release.
 * @param   string      $format                       Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null              An array containing the release's data, or null if the release does not exist.
 */

function releases_get(  int    $release_id                ,
                        string $format          = 'html'  ,
                        bool   $no_parent_array = false   ) : array|null
{
  // Sanitize the release's id
  $release_id = sanitize($release_id, 'int');

  // Return null if the release does not exist
  if(!database_row_exists('releases', $release_id))
    return null;

  // Fetch the release's data
  $release_data = query(" SELECT  releases.id           AS 'r_id'       ,
                                  releases.uuid         AS 'r_uuid'     ,
                                  releases.name_en      AS 'r_name_en'  ,
                                  releases.name_fr      AS 'r_name_fr'  ,
                                  releases.release_date AS 'r_date'
                          FROM    releases
                          WHERE   releases.id = '$release_id' ",
                          fetch_row: true);

  // Assemble an array with the release's data
  if($format === 'html')
  {
    $data['id']       = sanitize_output($release_data['r_id']);
    $data['name_en']  = sanitize_output($release_data['r_name_en']);
    $data['name_fr']  = sanitize_output($release_data['r_name_fr']);
    $data['date']     = sanitize_output(date_to_ddmmyy($release_data['r_date']));
    $data['datesql']  = sanitize_output($release_data['r_date']);
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data['uuid']       = sanitize_json($release_data['r_uuid']);
    $data['date']       = sanitize_json($release_data['r_date']);
    $data['name']['en'] = sanitize_json($release_data['r_name_en']);
    $data['name']['fr'] = sanitize_json($release_data['r_name_fr']);

    // Prepare the data structure
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('release' => $data);
  }



  // Return the release's data
  return $data;
}




/**
 * Lists releases in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array   An array containing the releases.
 */

function releases_list( string  $sort_by  = 'path'  ,
                        array   $search   = array() ,
                        string  $format   = 'html'  ) : array
{
  // Sanatize the search data
  $search_date  = sanitize_array_element($search, 'date', 'string');
  $search_name  = sanitize_array_element($search, 'name', 'string');
  $lang         = string_change_case(user_get_language(), 'lowercase');

  // Search through the data
  $query_search  =  ($search_date)  ? " WHERE releases.release_date LIKE '%$search_date%' " : " WHERE 1 = 1 ";
  $query_search .=  ($search_name)  ? " AND   releases.name_$lang   LIKE '%$search_name%' " : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'          => " ORDER BY releases.name_$lang ASC     ,
                                  releases.release_date DESC  ",
    'date_reverse'  => " ORDER BY releases.release_date ASC   ",
    default         => " ORDER BY releases.release_date DESC  ",
  };

  // Get a list of all releases in the database
  $qreleases = query("  SELECT  releases.id           AS 'r_id'       ,
                                releases.uuid         AS 'r_uuid'     ,
                                releases.name_en      AS 'r_name_en'  ,
                                releases.name_fr      AS 'r_name_fr'  ,
                                releases.release_date AS 'r_date'
                        FROM    releases
                        $query_search
                        $query_sort ");

  // Prepare the data
  for($i = 0; $row = query_row($qreleases); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']       = sanitize_output($row['r_id']);
      $data[$i]['name_en']  = sanitize_output($row['r_name_en']);
      $data[$i]['name_fr']  = sanitize_output($row['r_name_fr']);
      $data[$i]['name']     = sanitize_output($row['r_name_'.$lang]);
      $data[$i]['date']     = sanitize_output(date_to_ddmmyy($row['r_date']));
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']       = sanitize_json($row['r_uuid']);
      $data[$i]['date']       = sanitize_json($row['r_date']);
      $data[$i]['name']['en'] = sanitize_json($row['r_name_en']);
      $data[$i]['name']['fr'] = sanitize_json($row['r_name_fr']);
    }
  }

  // Add the number of rows to the data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('releases' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a release to the database.
 *
 * @param   array   $data  An array containing the release's data.
 *
 * @return  void
 */

function releases_add( array $data ) : void
{
  // Sanatize the data
  $release_date     = sanitize_array_element($data, 'date', 'string');
  $release_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $release_name_fr  = sanitize_array_element($data, 'name_fr', 'string');

  // Add the release to the database
  query(" INSERT INTO releases
          SET         releases.uuid         = UUID()              ,
                      releases.name_en      = '$release_name_en'  ,
                      releases.name_fr      = '$release_name_fr'  ,
                      releases.release_date = '$release_date'     ");
}




/**
 * Edits a release in the database.
 *
 * @param   int         $release_id   The id of the release to edit.
 * @param   array       $data         An array containing the release's data.
 *
 * @return  void
 */

function releases_edit( int   $release_id ,
                        array $data       ) : void
{
  // Sanitize the data
  $release_id       = sanitize($release_id, 'int');
  $release_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $release_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $release_date     = sanitize_array_element($data, 'date', 'string');

  // Stop here if the release does not exist
  if(!database_row_exists('releases', $release_id))
    return;

  // Edit the release
  query(" UPDATE  releases
          SET     releases.name_en      = '$release_name_en'  ,
                  releases.name_fr      = '$release_name_fr'  ,
                  releases.release_date = '$release_date'
          WHERE   releases.id           = '$release_id' ");
}




/**
 * Deletes a release from the database.
 *
 * @param   int     $release_id  The id of the release to delete.
 *
 * @return  void
 */

function releases_delete( int $release_id ) : void
{
  // Sanitize the data
  $release_id = sanitize($release_id, 'int');

  // Delete the release from the database
  query(" DELETE FROM releases
          WHERE       releases.id = '$release_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FACTIONS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a faction.
 *
 * @param   int         $faction_id                   The id of the faction.
 * @param   string      $format                       Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null                An array containing the faction's data, or null if the faction does not exist.
 */

function factions_get( int    $faction_id                 ,
                       string $format           = 'html'  ,
                       bool   $no_parent_array  = false   ) : array|null
{
  // Sanitize the faction's id
  $faction_id = sanitize($faction_id, 'int');

  // Return null if the faction does not exist
  if(!database_row_exists('factions', $faction_id))
    return null;

  // Fetch the faction's data
  $faction_data = query(" SELECT  factions.id             AS 'f_id'       ,
                                  factions.uuid           AS 'f_uuid'     ,
                                  factions.sorting_order  AS 'f_order'    ,
                                  factions.name_en        AS 'f_name_en'  ,
                                  factions.name_fr        AS 'f_name_fr'  ,
                                  factions.styling        AS 'f_styling'
                          FROM    factions
                          WHERE   factions.id = '$faction_id' ",
                          fetch_row: true);

  // Assemble an array with the faction's data
  if($format === 'html')
  {
    $data['id']       = sanitize_output($faction_data['f_id']);
    $data['order']    = sanitize_output($faction_data['f_order']);
    $data['name_en']  = sanitize_output($faction_data['f_name_en']);
    $data['name_fr']  = sanitize_output($faction_data['f_name_fr']);
    $data['styling']  = sanitize_output($faction_data['f_styling']);
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data['uuid']       = sanitize_json($faction_data['f_uuid']);
    $data['name']['en'] = sanitize_json($faction_data['f_name_en']);
    $data['name']['fr'] = sanitize_json($faction_data['f_name_fr']);

    // Prepare the data structure
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('faction' => $data);
  }

  // Return the faction's data
  return $data;
}




/**
 * Lists factions in the database.
 *
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the factions.
 */

function factions_list( string $format = 'html' ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');
  // Fetch the factions
  $factions = query(" SELECT    factions.id             AS 'f_id'       ,
                                factions.uuid           AS 'f_uuid'     ,
                                factions.sorting_order  AS 'f_order'    ,
                                factions.name_en        AS 'f_name_en'  ,
                                factions.name_fr        AS 'f_name_fr'  ,
                                factions.name_$lang     AS 'f_name'     ,
                                factions.styling        AS 'f_styling'
                      FROM      factions
                      ORDER BY  factions.sorting_order ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($factions); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']       = sanitize_output($row['f_id']);
      $data[$i]['order']    = sanitize_output($row['f_order']);
      $data[$i]['name']     = sanitize_output($row['f_name']);
      $data[$i]['styling']  = sanitize_output($row['f_styling']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']       = sanitize_json($row['f_uuid']);
      $data[$i]['name']['en'] = sanitize_json($row['f_name_en']);
      $data[$i]['name']['fr'] = sanitize_json($row['f_name_fr']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('factions' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a faction to the database.
 *
 * @param   array   $data  An array containing the faction's data.
 *
 * @return  void
 */

function factions_add( array $data ) : void
{
  // Sanitize the data
  $faction_order    = sanitize_array_element($data, 'order', 'int');
  $faction_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $faction_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $faction_styling  = sanitize_array_element($data, 'styling', 'string');

  // Add the faction to the database
  query(" INSERT INTO factions
          SET         factions.uuid           = UUID()              ,
                      factions.sorting_order  = '$faction_order'    ,
                      factions.name_en        = '$faction_name_en'  ,
                      factions.name_fr        = '$faction_name_fr'  ,
                      factions.styling        = '$faction_styling'  ");
}




/**
 * Edits a faction in the database.
 *
 * @param   int         $faction_id   The id of the faction to edit.
 * @param   array       $data         An array containing the faction's data.
 *
 * @return  void
 */

function factions_edit( int   $faction_id ,
                        array $data       ) : void
{
  // Sanitize the data
  $faction_id       = sanitize($faction_id, 'int');
  $faction_order    = sanitize_array_element($data, 'order', 'int');
  $faction_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $faction_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $faction_styling  = sanitize_array_element($data, 'styling', 'string');

  // Stop here if the faction does not exist
  if(!database_row_exists('factions', $faction_id))
    return;

  // Edit the faction
  query(" UPDATE  factions
          SET     factions.sorting_order  = '$faction_order'    ,
                  factions.name_en        = '$faction_name_en'  ,
                  factions.name_fr        = '$faction_name_fr'  ,
                  factions.styling        = '$faction_styling'
          WHERE   factions.id             = '$faction_id' ");
}




/**
 * Deletes a faction from the database.
 *
 * @param   int     $faction_id  The id of the faction to delete.
 *
 * @return  void
 */

function factions_delete( int $faction_id ) : void
{
  // Sanitize the data
  $faction_id = sanitize($faction_id, 'int');

  // Delete the faction from the database
  query(" DELETE FROM factions
          WHERE       factions.id = '$faction_id' ");
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