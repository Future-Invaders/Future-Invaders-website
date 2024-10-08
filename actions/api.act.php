<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  api_releases_list     Lists releases in the database, for public usage.                                          */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Lists releases in the database.
 *
 * @return  array   An array containing the releases.
 */

function api_releases_list( ) : array
{
  // Get a list of all releases in the database
  $qreleases = query("  SELECT    releases.id           AS 'r_id'       ,
                                  releases.name_en      AS 'r_name_en'  ,
                                  releases.name_fr      AS 'r_name_fr'  ,
                                  releases.release_date AS 'r_date'
                        FROM      releases
                        ORDER BY  releases.release_date DESC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($qreleases); $i++)
  {
    $data[$i]['id']   = sanitize_json($row['r_id']);
    $data[$i]['name'] = sanitize_json($row['r_name_en']);
    $data[$i]['date'] = sanitize_json($row['r_date']);
  }

  // Return the prepared data
  return array('releases' => $data);
}