<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php'; # Core
include_once './../actions/game.act.php'; # Game actions




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    API OUTPUT                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of card types

// Retrieve the search parameters
$card_types_search_lang = form_fetch_element('language', request_type: 'GET', default_value: 'en');

// Assemble the search parameters
$card_types_search = array( 'lang' => $card_types_search_lang );

// Fetch the card types
$card_types_list = card_types_list( search: $card_types_search  ,
                                    format: 'api'               );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the card list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the cards
echo sanitize_api_output($card_types_list);