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
// Fetch the list of factions

// Retrieve the search parameters
$factions_search_lang = form_fetch_element('language', request_type: 'GET', default_value: 'en');

// Assemble the search parameters
$factions_search = array( 'lang' => $factions_search_lang );

// Fetch the factions
$factions_list = factions_list( search: $factions_search  ,
                                format: 'api'             );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the quote list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the quotes
echo sanitize_api_output($factions_list);