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
// Fetch the list of tags

// Retrieve the search parameters
$tags_search_type = form_fetch_element('type', request_type: 'GET');
$tags_search_name = form_fetch_element('name', request_type: 'GET');

// Assemble the search parameters
$tags_search = array( 'ftype' => $tags_search_type  ,
                      'name'  => $tags_search_name  );

// Fetch the tags
$tags_list = tags_list( sort_by:  'api'         ,
                        search:   $tags_search  ,
                        format:   'api'        );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the tag list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the tags
echo sanitize_api_output($tags_list);