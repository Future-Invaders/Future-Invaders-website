<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  rulings_get                      Returns data related to a ruling                                                */
/*  rulings_list                     Lists rulings in the database                                                   */
/*  rulings_add                      Adds a ruling to the database                                                   */
/*  rulings_edit                     Edits a ruling in the database                                                  */
/*  rulings_delete                   Deletes a ruling from the database                                              */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a ruling.
 *
 * @param   int         $ruling_id   The id of the ruling.
 * @param   string      $format      Formatting to use for the returned data ('html', 'api').
 *
 * @return  array|null              An array containing the ruling's data, or null if the ruling does not exist.
 */

function rulings_get( int    $ruling_id       ,
                      string $format = 'html' ) : array|null
{
  // Sanitize the ruling's id
  $ruling_id = sanitize($ruling_id, 'int');

  // Return null if the ruling does not exist
  if(!database_row_exists('rulings', $ruling_id))
    return null;

  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the ruling's data
  $ruling_data = query("  SELECT  rulings.id                AS 'r_id'           ,
                                  rulings.uuid              AS 'r_uuid'         ,
                                  rulings.date_ruling       AS 'r_date'         ,
                                  rulings.date_last_update  AS 'r_update'       ,
                                  rulings.name              AS 'r_name'         ,
                                  rulings.title_en          AS 'r_title_en'     ,
                                  rulings.title_fr          AS 'r_title_fr'     ,
                                  rulings.situation_en      AS 'r_situation_en' ,
                                  rulings.situation_fr      AS 'r_situation_fr' ,
                                  rulings.ruling_en         AS 'r_ruling_en'    ,
                                  rulings.ruling_fr         AS 'r_ruling_fr'
                          FROM    rulings
                          WHERE   rulings.id = '$ruling_id' ",
                          fetch_row: true);

  // Sanitize the ruling's id
  $ruling_id = sanitize($ruling_data['r_id'], 'int');

  // Fetch linked cards
  $qcards = query(" SELECT    rulings_cards.fk_cards AS 'c_id'
                    FROM      rulings_cards
                    LEFT JOIN cards ON rulings_cards.fk_cards = cards.id
                    WHERE     rulings_cards.fk_rulings = '$ruling_id'
                    ORDER BY  cards.name_$lang ASC ");

  // Fetch linked tags
  $qtags = query("  SELECT    rulings_tags.fk_tags AS 't_id'
                    FROM      rulings_tags
                    LEFT JOIN tags ON rulings_tags.fk_tags = tags.id
                    WHERE     rulings_tags.fk_rulings = '$ruling_id'
                    ORDER BY  tags.name ASC ");

  // Assemble an array with the ruling's data
  if($format === 'html')
  {
    // Ruling data
    $data['id']           = sanitize_output($ruling_data['r_id']);
    $data['date']         = ($ruling_data['r_date'] !== '0000-00-00')
                          ? sanitize_output($ruling_data['r_date'])
                          : '';
    $data['update']       = ($ruling_data['r_update'] !== '0000-00-00')
                          ? sanitize_output($ruling_data['r_update'])
                          : '';
    $data['name']         = sanitize_output($ruling_data['r_name']);
    $data['title_en']     = sanitize_output($ruling_data['r_title_en']);
    $data['title_fr']     = sanitize_output($ruling_data['r_title_fr']);
    $data['situation_en'] = sanitize_output($ruling_data['r_situation_en']);
    $data['situation_fr'] = sanitize_output($ruling_data['r_situation_fr']);
    $data['ruling_en']    = sanitize_output($ruling_data['r_ruling_en']);
    $data['ruling_fr']    = sanitize_output($ruling_data['r_ruling_fr']);

    // Card data
    for($i = 0; $dcards = query_row($qcards); $i++)
      $data['cards']['id'][$i] = $dcards['c_id'];
    $data['cards']['rows'] = $i;

    // Tags data
    for($i = 0; $dtags = query_row($qtags); $i++)
      $data['tags']['id'][$i] = $dtags['t_id'];
    $data['tags']['rows'] = $i;
  }

  // Prepare for the API
  if($format === 'api')
  {
    // Sanitize ruling data
    $data['uuid'] = sanitize_json($ruling_data['r_uuid']);

    // Prepare for the API
    $data = (isset($data)) ? $data : NULL;
    $data = array('ruling' => $data);
  }

  // Return the ruling's data
  return $data;
}




/**
 * Lists rulings in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array   An array containing the rulings.
 */

function rulings_list(  string  $sort_by  = 'date'  ,
                        array   $search   = array() ,
                        string  $format   = 'html'  ) : array
{
  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanitize the search data
  $search_title   = sanitize_array_element($search, 'title', 'string');
  $search_body    = sanitize_array_element($search, 'body', 'string');
  $search_card_id = sanitize_array_element($search, 'card_id', 'int');
  $search_tag_id  = sanitize_array_element($search, 'tag_id', 'int');

  // Search through the data
  $query_search  = ($search_title)  ? " WHERE ( rulings.title_en        LIKE '%$search_title%'
                                        OR      rulings.title_fr        LIKE '%$search_title%' ) "  : " WHERE 1 = 1 ";
  $query_search .= ($search_body)   ? " AND   ( rulings.ruling_en       LIKE '%$search_body%'
                                        OR      rulings.ruling_fr       LIKE '%$search_body%'
                                        OR      rulings.situation_en    LIKE '%$search_body%'
                                        OR      rulings.situation_fr    LIKE '%$search_body%' ) "   : "";
  $query_search .= ($search_card_id === -1)
                                    ? " AND     rulings_cards.fk_cards  IS NULL "                   : "";
  $query_search .= ($search_tag_id === -1)
                                    ? " AND     rulings_tags.fk_tags    IS NULL "                   : "";

  // Use a different search technique for linked cards
  $query_having = ($search_card_id && $search_card_id !== -1)
                ? " HAVING FIND_IN_SET('$search_card_id', GROUP_CONCAT(cards.id)) > 0 "
                : " HAVING 1 = 1 ";

  // Use a different search technique for linked tags
  $query_having .= ($search_tag_id && $search_tag_id !== -1)
                ? " AND FIND_IN_SET('$search_tag_id', GROUP_CONCAT(tags.id)) > 0 "
                : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'date'    => " ORDER BY rulings.date_ruling       DESC  ",
    'update'  => " ORDER BY rulings.date_last_update  DESC  ",
    'title'   => " ORDER BY rulings.title_$lang       = ''  ,
                            rulings.title_$lang       ASC   ",
    'body'    => " ORDER BY LENGTH(rulings.ruling_$lang)
                            + LENGTH(rulings.situation_$lang)
                                                      DESC  ,
                            rulings.name              = ''  ,
                            rulings.name              ASC   ",
    'cards'   => " ORDER BY COUNT(DISTINCT cards.id)  DESC  ,
                            rulings.name              = ''  ,
                            rulings.name              ASC   ",
    'tags'    => " ORDER BY COUNT(DISTINCT tags.id)   DESC  ,
                            rulings.name              = ''  ,
                            rulings.name              ASC   ",
    default   => " ORDER BY GREATEST(rulings.date_last_update, rulings.date_ruling)
                                                      DESC  ,
                            rulings.date_ruling       DESC  ,
                            rulings.name              ASC   ",
  };

  // Fetch the rulings
  $rulings = query("  SELECT    rulings.id                    AS 'r_id'           ,
                                rulings.uuid                  AS 'r_uuid'         ,
                                rulings.date_ruling           AS 'r_date'         ,
                                rulings.date_last_update      AS 'r_update'       ,
                                rulings.name                  AS 'r_name'         ,
                                rulings.title_en              AS 'r_title_en'     ,
                                rulings.title_fr              AS 'r_title_fr'     ,
                                rulings.title_$lang           AS 'r_title'        ,
                                rulings.situation_en          AS 'r_situation_en' ,
                                rulings.situation_fr          AS 'r_situation_fr' ,
                                rulings.situation_$lang       AS 'r_situation'    ,
                                rulings.ruling_en             AS 'r_ruling_en'    ,
                                rulings.ruling_fr             AS 'r_ruling_fr'    ,
                                rulings.ruling_$lang          AS 'r_ruling'       ,
                                COUNT(DISTINCT cards.id)      AS 'rc_count'       ,
                                COUNT(DISTINCT tags.id)       AS 'rt_count'       ,
                                GROUP_CONCAT( DISTINCT  cards.name_$lang
                                              ORDER BY  cards.name_$lang ASC
                                              SEPARATOR ', ') AS 'rc_names'       ,
                                GROUP_CONCAT( DISTINCT  tags.name
                                              ORDER BY  tags.name ASC
                                              SEPARATOR ', ')   AS 'rt_names'
                      FROM      rulings
                      LEFT JOIN rulings_cards ON rulings.id             = rulings_cards.fk_rulings
                      LEFT JOIN cards         ON rulings_cards.fk_cards = cards.id
                      LEFT JOIN rulings_tags  ON rulings.id             = rulings_tags.fk_rulings
                      LEFT JOIN tags          ON rulings_tags.fk_tags   = tags.id
                      $query_search
                      GROUP BY  rulings.id
                      $query_having
                      $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($rulings); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      // Sanitize ruling data
      $data[$i]['id']           = sanitize_output($row['r_id']);
      $data[$i]['date']         = ($row['r_date'] !== '0000-00-00') ? sanitize_output($row['r_date']) : '';
      $data[$i]['date_since']   = ($row['r_date'] !== '0000-00-00')
                                ? sanitize_output(time_since(strtotime($row['r_date']))).'<br>'
                                  .sanitize_output(date_to_text($row['r_date'], strip_day: 1))
                                : '';
      $data[$i]['update']       = ($row['r_update'] !== '0000-00-00') ? sanitize_output($row['r_update']) : '';
      $data[$i]['update_since'] = ($row['r_update'] !== '0000-00-00')
                                ? sanitize_output(time_since(strtotime($row['r_update']))).'<br>'
                                .sanitize_output(date_to_text($row['r_update'], strip_day: 1))
                                : '';
      $data[$i]['name']         = sanitize_output($row['r_name']);
      $data[$i]['title_en']     = sanitize_output($row['r_title_en']);
      $data[$i]['title_fr']     = sanitize_output($row['r_title_fr']);
      $data[$i]['title']        = sanitize_output(string_truncate($row['r_title'], 60, '...'));
      $data[$i]['situation_en'] = nl2br($row['r_situation_en']);
      $data[$i]['situation_fr'] = nl2br($row['r_situation_fr']);
      $data[$i]['nsituation']   = mb_strlen($row['r_situation']);
      $data[$i]['ruling_en']    = nl2br($row['r_ruling_en']);
      $data[$i]['ruling_fr']    = nl2br($row['r_ruling_fr']);
      $data[$i]['nruling']      = mb_strlen($row['r_ruling']);
      $data[$i]['ncards']       = sanitize_output($row['rc_count']);
      $data[$i]['cards']        = sanitize_output($row['rc_names']);
      $data[$i]['ntags']        = sanitize_output($row['rt_count']);
      $data[$i]['tags']         = sanitize_output($row['rt_names']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid'] = sanitize_json($row['r_uuid']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('rulings' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a ruling to the database.
 *
 * @param   array   $data  An array containing the ruling's data.
 *
 * @return  void
 */

function rulings_add( array $data ) : void
{
  // Sanitize the data
  $ruling_date          = sanitize($data['ruling_date'], 'string');
  $ruling_name          = sanitize($data['ruling_name'], 'string');
  $ruling_title_en      = sanitize_array_element($data, 'ruling_title_en', 'string');
  $ruling_title_fr      = sanitize_array_element($data, 'ruling_title_fr', 'string');
  $ruling_situation_en  = sanitize_array_element($data, 'ruling_situation_en', 'string');
  $ruling_situation_fr  = sanitize_array_element($data, 'ruling_situation_fr', 'string');
  $ruling_ruling_en     = sanitize_array_element($data, 'ruling_ruling_en', 'string');
  $ruling_ruling_fr     = sanitize_array_element($data, 'ruling_ruling_fr', 'string');

  // Format the name
  $ruling_name = preg_replace('/[^a-zA-Z0-9\-]/', '-', $ruling_name);
  $ruling_name = str_replace(' ', '-', $ruling_name);

  // Add the ruling to the database
  query(" INSERT INTO rulings
          SET         rulings.uuid           = UUID()                 ,
                      rulings.date_ruling    = '$ruling_date'         ,
                      rulings.name           = '$ruling_name'         ,
                      rulings.title_en       = '$ruling_title_en'     ,
                      rulings.title_fr       = '$ruling_title_fr'     ,
                      rulings.situation_en   = '$ruling_situation_en' ,
                      rulings.situation_fr   = '$ruling_situation_fr' ,
                      rulings.ruling_en      = '$ruling_ruling_en'    ,
                      rulings.ruling_fr      = '$ruling_ruling_fr'    ");

  // Get the newly created ruling's id
  $ruling_id = sanitize(query_id(), "int");

  // Get rid of double card links
  $data['ruling_cards'] = array_unique($data['ruling_cards']);

  // Add the arsenal's factions to the database
  foreach($data['ruling_cards'] as $card_id)
  {
    $card_id = sanitize($card_id, 'int');
    if($card_id !== 0)
      query(" INSERT INTO rulings_cards
              SET         rulings_cards.fk_rulings  = '$ruling_id'  ,
                          rulings_cards.fk_cards    = '$card_id'    ");
  }

  // Get rid of double tag links
  $data['ruling_tags'] = array_unique($data['ruling_tags']);

  // Add the arsenal's factions to the database
  foreach($data['ruling_tags'] as $tag_id)
  {
    $tag_id = sanitize($tag_id, 'int');
    if($tag_id !== 0)
      query(" INSERT INTO rulings_tags
              SET         rulings_tags.fk_rulings  = '$ruling_id'  ,
                          rulings_tags.fk_tags     = '$tag_id'     ");
  }
}




/**
 * Edits a ruling in the database.
 *
 * @param   int         $ruling_id   The id of the ruling to edit.
 * @param   array       $data        An array containing the ruling's data.
 *
 * @return  void
 */

function rulings_edit(  int   $ruling_id  ,
                        array $data       ) : void
{
  // Sanitize the data
  $ruling_id            = sanitize($ruling_id, 'int');
  $ruling_name          = sanitize_array_element($data, 'name', 'string');
  $ruling_date          = sanitize_array_element($data, 'date', 'string');
  $ruling_update        = sanitize_array_element($data, 'update', 'string');
  $ruling_title_en      = sanitize_array_element($data, 'title_en', 'string');
  $ruling_title_fr      = sanitize_array_element($data, 'title_fr', 'string');
  $ruling_situation_en  = sanitize_array_element($data, 'situation_en', 'string');
  $ruling_situation_fr  = sanitize_array_element($data, 'situation_fr', 'string');
  $ruling_ruling_en     = sanitize_array_element($data, 'ruling_en', 'string');
  $ruling_ruling_fr     = sanitize_array_element($data, 'ruling_fr', 'string');

  // Stop here if the ruling does not exist
  if(!database_row_exists('rulings', $ruling_id))
    return;

  // Edit the ruling
  query(" UPDATE  rulings
          SET     rulings.name              = '$ruling_name'          ,
                  rulings.date_ruling       = '$ruling_date'          ,
                  rulings.date_last_update  = '$ruling_update'        ,
                  rulings.title_en          = '$ruling_title_en'      ,
                  rulings.title_fr          = '$ruling_title_fr'      ,
                  rulings.situation_en      = '$ruling_situation_en'  ,
                  rulings.situation_fr      = '$ruling_situation_fr'  ,
                  rulings.ruling_en         = '$ruling_ruling_en'     ,
                  rulings.ruling_fr         = '$ruling_ruling_fr'
          WHERE   rulings.id                = '$ruling_id' ");

  // Fetch a list of linked cards
  $qcards = query(" SELECT  rulings_cards.fk_cards AS 'c_id'
                    FROM    rulings_cards
                    WHERE   rulings_cards.fk_rulings = '$ruling_id' ");

  // Place these cards in an array
  $ruling_cards = array();
  while($dcards = query_row($qcards))
    $ruling_cards[] = $dcards['c_id'];

  // Get rid of double entries in the linked cards
  $data['cards'] = array_unique($data['cards']);

  // Look for cards missing from the edited data and add them to the database
  $missing_cards = array_diff($data['cards'], $ruling_cards);
  foreach($missing_cards as $missing_card)
  {
    $missing_card = sanitize($missing_card, 'int');
    if($missing_card !== 0)
      query(" INSERT INTO rulings_cards
              SET         rulings_cards.fk_rulings  = '$ruling_id' ,
                          rulings_cards.fk_cards    = '$missing_card' ");
  }

  // Look for extra cards in the edited data and remove them from the database
  $extra_cards = array_diff($ruling_cards, $data['cards']);
  foreach($extra_cards as $extra_card)
  {
    $extra_card = sanitize($extra_card, 'int');
    query(" DELETE FROM rulings_cards
            WHERE       rulings_cards.fk_rulings  = '$ruling_id'
            AND         rulings_cards.fk_cards    = '$extra_card' ");
  }

  // Fetch a list of linked tags
  $qtags = query("  SELECT  rulings_tags.fk_tags AS 't_id'
                    FROM    rulings_tags
                    WHERE   rulings_tags.fk_rulings = '$ruling_id' ");

  // Place these tags in an array
  $ruling_tags = array();
  while($dtags = query_row($qtags))
    $ruling_tags[] = $dtags['t_id'];

  // Get rid of double entries in the linked tags
  $data['tags'] = array_unique($data['tags']);

  // Look for tags missing from the edited data and add them to the database
  $missing_tags = array_diff($data['tags'], $ruling_tags);
  foreach($missing_tags as $missing_tag)
  {
    $missing_tag = sanitize($missing_tag, 'int');
    if($missing_tag !== 0)
      query(" INSERT INTO rulings_tags
              SET         rulings_tags.fk_rulings = '$ruling_id' ,
                          rulings_tags.fk_tags    = '$missing_tag' ");
  }

  // Look for extra tags in the edited data and remove them from the database
  $extra_tags = array_diff($ruling_tags, $data['tags']);
  foreach($extra_tags as $extra_tag)
  {
    $extra_tag = sanitize($extra_tag, 'int');
    query(" DELETE FROM rulings_tags
            WHERE       rulings_tags.fk_rulings = '$ruling_id'
            AND         rulings_tags.fk_tags    = '$extra_tag' ");
  }
}




/**
 * Deletes a ruling from the database.
 *
 * @param   int     $ruling_id  The id of the ruling to delete.
 *
 * @return  void
 */

function rulings_delete( int $ruling_id ) : void
{
  // Sanitize the data
  $ruling_id = sanitize($ruling_id, 'int');

  // Delete the ruling from the database
  query(" DELETE FROM rulings
          WHERE       rulings.id = '$ruling_id' ");

  // Delete linked cards from the database
  query(" DELETE FROM rulings_cards
          WHERE       rulings_cards.fk_rulings = '$ruling_id' ");

  // Delete linked tags from the database
  query(" DELETE FROM rulings_tags
          WHERE       rulings_tags.fk_rulings = '$ruling_id' ");
}