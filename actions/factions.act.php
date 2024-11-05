<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  factions_get                    Returns data related to a faction                                                */
/*  factions_list                   Lists factions in the database                                                   */
/*  factions_abbreviate             Transforms a list of factions into a list of faction initials                    */
/*  factions_add                    Adds a faction to the database                                                   */
/*  factions_edit                   Edits a faction in the database                                                  */
/*  factions_delete                 Deletes a faction from the database                                              */
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