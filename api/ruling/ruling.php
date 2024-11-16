<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';     # Core
include_once './../../actions/rulings.act.php';  # Rulings management



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    API OUTPUT                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the ruling's data

// Retrieve the search parameters
$ruling_uuid = form_fetch_element('uuid', request_type: 'GET');

// Fetch the ruling
$ruling_data = rulings_get( ruling_uuid:  $ruling_uuid  ,
                            format:       'api'         );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the ruling as JSON

// Throw a 404 if necessary
if(!$ruling_data || !$ruling_uuid)
  exit(header("HTTP/1.0 404 Not Found"));

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the ruling
echo sanitize_api_output($ruling_data);