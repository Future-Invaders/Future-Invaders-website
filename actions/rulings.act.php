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

  // Assemble an array with the ruling's data
  if($format === 'html')
  {
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
  $search_title = sanitize_array_element($search, 'title', 'string');
  $search_body  = sanitize_array_element($search, 'body', 'string');

  // Search through the data
  $query_search  = ($search_title)  ? " WHERE ( rulings.title_en      LIKE '%$search_title%'
                                        OR      rulings.title_fr      LIKE '%$search_title%' ) "  : " WHERE 1 = 1 ";
  $query_search .= ($search_body)   ? " AND   ( rulings.ruling_en     LIKE '%$search_body%'
                                        OR      rulings.ruling_fr     LIKE '%$search_body%'
                                        OR      rulings.situation_en  LIKE '%$search_body%'
                                        OR      rulings.situation_fr  LIKE '%$search_body%' ) "   : "";

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
    default   => " ORDER BY GREATEST(rulings.date_last_update, rulings.date_ruling)
                                                      DESC  ,
                            rulings.date_ruling       DESC  ,
                            rulings.name              ASC   ",
  };

  // Fetch the rulings
  $rulings = query("  SELECT    rulings.id                AS 'r_id'           ,
                                rulings.uuid              AS 'r_uuid'         ,
                                rulings.date_ruling       AS 'r_date'         ,
                                rulings.date_last_update  AS 'r_update'       ,
                                rulings.name              AS 'r_name'         ,
                                rulings.title_en          AS 'r_title_en'     ,
                                rulings.title_fr          AS 'r_title_fr'     ,
                                rulings.title_$lang       AS 'r_title'        ,
                                rulings.situation_en      AS 'r_situation_en' ,
                                rulings.situation_fr      AS 'r_situation_fr' ,
                                rulings.situation_$lang   AS 'r_situation'    ,
                                rulings.ruling_en         AS 'r_ruling_en'    ,
                                rulings.ruling_fr         AS 'r_ruling_fr'    ,
                                rulings.ruling_$lang      AS 'r_ruling'
                      FROM      rulings
                      $query_search
                      $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($rulings); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      // Sanitize ruling data
      $data[$i]['id']           = sanitize_output($row['r_id']);
      $data[$i]['date']         = ($row['r_date'] !== '0000-00-00')
                                ? sanitize_output(date_to_text($row['r_date'], strip_day: 1))
                                : '';
      $data[$i]['date_since']   = ($row['r_date'] !== '0000-00-00')
                                ? sanitize_output(time_since(strtotime($row['r_date'])))
                                : '';
      $data[$i]['update']       = ($row['r_update'] !== '0000-00-00')
                                ? sanitize_output(date_to_text($row['r_update'], strip_day: 1))
                                : '';
      $data[$i]['update_since'] = ($row['r_update'] !== '0000-00-00')
                                ? sanitize_output(time_since(strtotime($row['r_update'])))
                                : '';
      $data[$i]['name']         = sanitize_output($row['r_name']);
      $data[$i]['title_en']     = sanitize_output($row['r_title_en']);
      $data[$i]['title_fr']     = sanitize_output($row['r_title_fr']);
      $data[$i]['title']        = sanitize_output($row['r_title']);
      $data[$i]['situation_en'] = nl2br($row['r_situation_en']);
      $data[$i]['situation_fr'] = nl2br($row['r_situation_fr']);
      $data[$i]['nsituation']   = mb_strlen($row['r_situation']);
      $data[$i]['ruling_en']    = nl2br($row['r_ruling_en']);
      $data[$i]['ruling_fr']    = nl2br($row['r_ruling_fr']);
      $data[$i]['nruling']      = mb_strlen($row['r_ruling']);
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
}