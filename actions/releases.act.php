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