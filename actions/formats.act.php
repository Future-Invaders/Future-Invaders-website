<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  formats_get                     Returns data related to a game format                                            */
/*  formats_list                    Lists game formats in the database                                               */
/*  formats_add                     Adds a game format to the database                                               */
/*  formats_edit                    Edits a game format in the database                                              */
/*  formats_delete                  Deletes a game format from the database                                          */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a game format.
 *
 * @param   int         $format_id                    The game format's id.
 * @param   string      $format           (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null                        An array containing the game format's data, or null if it doesn't exist.
 */

function formats_get( int     $format_id                  ,
                      string  $format           = 'html'  ,
                      bool    $no_parent_array  = false   ) : array|null
{
  // Sanitize the format's id
  $format_id = sanitize($format_id, 'int');

  // Return null if the format does not exist
  if(!database_row_exists('formats', $format_id))
    return null;

  // Fetch the format's data
  $format_data = query(" SELECT formats.uuid            AS 'f_uuid'     ,
                                formats.sorting_order   AS 'f_order'    ,
                                formats.name_en         AS 'f_name_en'  ,
                                formats.name_fr         AS 'f_name_fr'  ,
                                formats.description_en  AS 'f_desc_en'  ,
                                formats.description_fr  AS 'f_desc_fr'  ,
                                formats.styling         AS 'f_styling'
                        FROM    formats
                        WHERE   formats.id = '$format_id' ",
                        fetch_row: true);

  // Sanitize the data for display
  if($format === 'html')
  {
    $data['order']        = sanitize_output($format_data['f_order']);
    $data['name_en']      = sanitize_output($format_data['f_name_en']);
    $data['name_fr']      = sanitize_output($format_data['f_name_fr']);
    $data['desc_en']      = sanitize_output($format_data['f_desc_en']);
    $data['desc_fr']      = sanitize_output($format_data['f_desc_fr']);
    $data['styling']      = sanitize_output($format_data['f_styling']);
  }

  // Sanitize the data for the API
  if($format === 'api')
  {
    $data['uuid']               = sanitize_json($format_data['f_uuid']);
    $data['name']['en']         = sanitize_json($format_data['f_name_en']);
    $data['name']['fr']         = sanitize_json($format_data['f_name_fr']);
    $data['description']['en']  = sanitize_json($format_data['f_desc_en']);
    $data['description']['fr']  = sanitize_json($format_data['f_desc_fr']);
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('format' => $data);
  }

  // Return the format's data
  return $data;
}




/**
 * Lists all game formats.
 *
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the game formats.
 */

function formats_list( string $format = 'html' ) : array
{
  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the formats
  $formats = query("  SELECT    formats.id                AS 'f_id'       ,
                                formats.uuid              AS 'f_uuid'     ,
                                formats.sorting_order     AS 'f_order'    ,
                                formats.name_$lang        AS 'f_name'     ,
                                formats.name_en           AS 'f_name_en'  ,
                                formats.name_fr           AS 'f_name_fr'  ,
                                formats.description_$lang AS 'f_desc'     ,
                                formats.description_en    AS 'f_desc_en'  ,
                                formats.description_fr    AS 'f_desc_fr'  ,
                                formats.styling           AS 'f_styling'
                      FROM      formats
                      ORDER BY  formats.sorting_order ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($formats); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']           = sanitize_output($row['f_id']);
      $data[$i]['order']        = sanitize_output($row['f_order']);
      $data[$i]['name']         = sanitize_output(string_truncate($row['f_name'], 20, '...'));
      $data[$i]['name_en']      = sanitize_output($row['f_name_en']);
      $data[$i]['name_fr']      = sanitize_output($row['f_name_fr']);
      $data[$i]['desc']         = sanitize_output(string_truncate($row['f_desc'], 35, '...'));
      $data[$i]['desc_en_raw']  = nl2br($row['f_desc_en']);
      $data[$i]['desc_fr_raw']  = nl2br($row['f_desc_fr']);
      $data[$i]['desc_raw']     = nl2br($row['f_desc']);
      $data[$i]['styling']      = sanitize_output($row['f_styling']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']               = sanitize_json($row['f_uuid']);
      $data[$i]['name']['en']         = sanitize_json($row['f_name_en']);
      $data[$i]['name']['fr']         = sanitize_json($row['f_name_fr']);
      $data[$i]['description']['en']  = sanitize_json($row['f_desc_en']);
      $data[$i]['description']['fr']  = sanitize_json($row['f_desc_fr']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('formats' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a game format to the database.
 *
 * @param   array   $data  An array containing the game format's data.
 *
 * @return  void
 */

function formats_add( array $data ) : void
{
  // Sanitize the data
  $format_order   = sanitize_array_element($data, 'order', 'int');
  $format_name_en = sanitize_array_element($data, 'name_en', 'string');
  $format_name_fr = sanitize_array_element($data, 'name_fr', 'string');
  $format_body_en = sanitize_array_element($data, 'body_en', 'string');
  $format_body_fr = sanitize_array_element($data, 'body_fr', 'string');
  $format_styling = sanitize_array_element($data, 'styling', 'string');

  // Add the format to the database
  query(" INSERT INTO formats
          SET         formats.uuid            = UUID()            ,
                      formats.sorting_order   = '$format_order'   ,
                      formats.name_en         = '$format_name_en' ,
                      formats.name_fr         = '$format_name_fr' ,
                      formats.description_en  = '$format_body_en' ,
                      formats.description_fr  = '$format_body_fr' ,
                      formats.styling         = '$format_styling' ");
}




/**
 * Edits a game format in the database.
 *
 * @param   int         $format_id   The id of the format to edit.
 * @param   array       $data        An array containing the format's data.
 *
 * @return  void
 */

function formats_edit(  int   $format_id  ,
                        array $data       ) : void
{
  // Sanitize the data
  $format_id       = sanitize($format_id, 'int');
  $format_order    = sanitize_array_element($data, 'order', 'int');
  $format_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $format_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $format_body_en  = sanitize_array_element($data, 'desc_en', 'string');
  $format_body_fr  = sanitize_array_element($data, 'desc_fr', 'string');
  $format_styling  = sanitize_array_element($data, 'styling', 'string');

  // Stop here if the format does not exist
  if(!database_row_exists('formats', $format_id))
    return;

  // Edit the format
  query(" UPDATE  formats
          SET     formats.sorting_order   = '$format_order'   ,
                  formats.name_en         = '$format_name_en' ,
                  formats.name_fr         = '$format_name_fr' ,
                  formats.description_en  = '$format_body_en' ,
                  formats.description_fr  = '$format_body_fr' ,
                  formats.styling         = '$format_styling'
          WHERE   formats.id              = '$format_id'      ");
}




/**
 * Deletes a game format from the database.
 *
 * @param   int     $format_id  The id of the format to delete.
 *
 * @return  void
 */

function formats_delete( int $format_id ) : void
{
  // Sanitize the data
  $format_id = sanitize($format_id, 'int');

  // Delete the format from the database
  query(" DELETE FROM formats
          WHERE       formats.id = '$format_id' ");
}