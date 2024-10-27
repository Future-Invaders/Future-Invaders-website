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
// Fetch the list of arsenal difficulty levels

$arsenal_difficulties_list = arsenal_difficulties_list( format: 'api' );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the difficulty level list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the difficulty levels
echo sanitize_api_output($arsenal_difficulties_list);