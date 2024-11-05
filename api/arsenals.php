<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';     # Core
include_once './../actions/arsenals.act.php'; # Arsenal management



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    API OUTPUT                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of arsenals

// Retrieve the search parameters
$arsenals_search_release    = form_fetch_element('release', request_type: 'GET');
$arsenals_search_format     = form_fetch_element('format', request_type: 'GET');
$arsenals_search_name       = form_fetch_element('name', request_type: 'GET');
$arsenals_search_difficulty = form_fetch_element('difficulty', request_type: 'GET');
$arsenals_search_tag        = form_fetch_element('tag', request_type: 'GET');

// Assemble the search parameters
$arsenals_search = array( 'release_uuid'    => $arsenals_search_release     ,
                          'format_uuid'     => $arsenals_search_format      ,
                          'name'            => $arsenals_search_name        ,
                          'difficulty_uuid' => $arsenals_search_difficulty  ,
                          'tag'             => $arsenals_search_tag         );

// Fetch the arsenals
$arsenals_list = arsenals_list( sort_by:  'api'             ,
                                search:   $arsenals_search  ,
                                format:   'api'             );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the arsenal list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the arsenals
echo sanitize_api_output($arsenals_list);