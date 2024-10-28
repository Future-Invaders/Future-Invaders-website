<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php'; # Core
include_once './../../actions/game.act.php'; # Game actions




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    API OUTPUT                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the arsenal's data

// Retrieve the search parameters
$arsenal_uuid = form_fetch_element('uuid', request_type: 'GET');

// Fetch the arsenal
$arsenal_data = arsenals_get( arsenal_uuid: $arsenal_uuid ,
                              format:       'api'         );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the arsenal as JSON

// Throw a 404 if necessary
if(!$arsenal_data || !$arsenal_uuid)
  exit(header("HTTP/1.0 404 Not Found"));

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the arsenal
echo sanitize_api_output($arsenal_data);