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

$releases_list = releases_list( format: 'api' );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the quote list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the quotes
echo sanitize_api_output($releases_list);