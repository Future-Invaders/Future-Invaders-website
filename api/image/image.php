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
// Fetch the image's data

// Retrieve the search parameters
$image_uuid = form_fetch_element('uuid', request_type: 'GET');

// Fetch the image
$image_data = images_get( image_uuid: $image_uuid ,
                          format:     'api'       );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the image as JSON

// Throw a 404 if necessary
if(!$image_data || !$image_uuid)
  exit(header("HTTP/1.0 404 Not Found"));

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the image
echo sanitize_api_output($image_data);