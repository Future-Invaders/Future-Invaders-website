<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php';     # Core
include_once './../actions/rulings.act.php';  # Rulings management



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    API OUTPUT                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch the list of rulings

// Retrieve the search parameters
$rulings_search_title     = form_fetch_element('title', request_type: 'GET');
$rulings_search_body      = form_fetch_element('body', request_type: 'GET');
$rulings_search_card_uuid = form_fetch_element('card', request_type: 'GET');
$rulings_search_tag_uuid  = form_fetch_element('tag', request_type: 'GET');

// Assemble the search parameters
$rulings_search = array(  'title'  => $rulings_search_title       ,
                          'body'   => $rulings_search_body        ,
                          'card_uuid'=> $rulings_search_card_uuid ,
                          'tag_uuid' => $rulings_search_tag_uuid  );

// Fetch the rulings
$rulings_list = rulings_list( sort_by:  'api'             ,
                              search:   $rulings_search  ,
                              format:   'api'             );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the rulings list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the rulings
echo sanitize_api_output($rulings_list);