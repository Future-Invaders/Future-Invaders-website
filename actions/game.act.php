<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  releases_get                    Returns data related to a release                                                */
/*  releases_list                   Lists releases in the database                                                   */
/*  releases_add                    Adds a release to the database                                                   */
/*  releases_edit                   Edits a release in the database                                                  */
/*  releases_delete                 Deletes a release from the database                                              */
/*                                                                                                                   */
/*  factions_get                    Returns data related to a faction                                                */
/*  factions_list                   Lists factions in the database                                                   */
/*  factions_abbreviate             Transforms a list of factions into a list of faction initials                    */
/*  factions_add                    Adds a faction to the database                                                   */
/*  factions_edit                   Edits a faction in the database                                                  */
/*  factions_delete                 Deletes a faction from the database                                              */
/*                                                                                                                   */
/*  formats_get                     Returns data related to a game format                                            */
/*  formats_list                    Lists game formats in the database                                               */
/*  formats_add                     Adds a game format to the database                                               */
/*  formats_edit                    Edits a game format in the database                                              */
/*  formats_delete                  Deletes a game format from the database                                          */
/*                                                                                                                   */
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
                                  releases.release_date AS 'r_date'     ,
                                  releases.styling      AS 'r_styling'
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
    $data['styling']  = sanitize_output($release_data['r_styling']);
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
                                releases.release_date AS 'r_date'     ,
                                releases.styling      AS 'r_styling'
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
      $data[$i]['styling']  = sanitize_output($row['r_styling']);
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
  $release_styling  = sanitize_array_element($data, 'styling', 'string');

  // Add the release to the database
  query(" INSERT INTO releases
          SET         releases.uuid         = UUID()              ,
                      releases.name_en      = '$release_name_en'  ,
                      releases.name_fr      = '$release_name_fr'  ,
                      releases.release_date = '$release_date'     ,
                      releases.styling      = '$release_styling'  ");
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
  $release_styling  = sanitize_array_element($data, 'styling', 'string');

  // Stop here if the release does not exist
  if(!database_row_exists('releases', $release_id))
    return;

  // Edit the release
  query(" UPDATE  releases
          SET     releases.name_en      = '$release_name_en'  ,
                  releases.name_fr      = '$release_name_fr'  ,
                  releases.release_date = '$release_date'     ,
                  releases.styling      = '$release_styling'
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
 * Transforms a list of factions into a list of faction initials.
 *
 * @param   string  $factions   A string containing a list of factions separated by commas.
 * @param   bool    $style      If set, add styling to the factions.
 *
 * @return  string              A string containing the faction's initials.
 */

function factions_abbreviate( string  $factions         ,
                              bool    $style    = false ) : string
{
  // Transform the comma separated list into an array
  $factions = explode(',', $factions);

  // Loop through the factions
  for($i = 0; $i < count($factions); $i++)
  {
    // Keep the faction name for styling
    $faction_name = string_change_case($factions[$i], 'lowercase');

    // Rename neutrals to X
    if($factions[$i] === 'Neutrals' || $factions[$i] === 'Neutres')
      $factions[$i] = 'X';

    // Reduce every entry to its initials
    $factions[$i] = mb_substr($factions[$i], 0, 1);

    // Style the entries if requested
    if($style)
    {
      $factions[$i] = '<span class="spaced bold flex '.$faction_name.'">'.$factions[$i].'</span>';
    }
  }

  // Transform the array back into a comma separated list
  $factions = implode('', $factions);

  // Return the abbreviated faction list
  return $factions;
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
/*                                                   GAME FORMATS                                                    */
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