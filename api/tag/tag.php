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
// Fetch the tag's data

// Retrieve the search parameters
$tag_uuid = form_fetch_element('uuid', request_type: 'GET');

// Fetch the tag
$tag_data = tags_get( tag_uuid: $tag_uuid ,
                      format:   'api'     );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the tag as JSON

// Throw a 404 if necessary
if(!$tag_data || !$tag_uuid)
  exit(header("HTTP/1.0 404 Not Found"));

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the tag
echo sanitize_api_output($tag_data);