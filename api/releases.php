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
// Fetch the list of releases

// Retrieve the search parameters
$releases_search_lang = form_fetch_element('language', request_type: 'GET', default_value: 'en');

// Assemble the search parameters
$releases_search = array( 'lang' => $releases_search_lang );

// Fetch the releases
$releases_list = releases_list( search: $releases_search ,
                                format: 'api'            );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the card list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the cards
echo sanitize_api_output($releases_list);