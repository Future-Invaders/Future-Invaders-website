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
// Fetch the card's data

// Retrieve the search parameters
$card_uuid = form_fetch_element('uuid', request_type: 'GET');

// Fetch the card
$card_data = cards_get( card_uuid:  $card_uuid ,
                        format:     'api'       );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the card as JSON

// Throw a 404 if necessary
if(!$card_data || !$card_uuid)
  exit(header("HTTP/1.0 404 Not Found"));

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the card
echo sanitize_api_output($card_data);