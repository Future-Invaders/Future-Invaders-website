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
// Fetch the list of cards

// Retrieve the search parameters
$cards_search_name    = form_fetch_element('name', request_type: 'GET');
$cards_search_body    = form_fetch_element('body', request_type: 'GET');
$cards_search_release = form_fetch_element('release', request_type: 'GET');
$cards_search_faction = form_fetch_element('faction', request_type: 'GET');
$cards_search_type    = form_fetch_element('type', request_type: 'GET');
$cards_search_rarity  = form_fetch_element('rarity', request_type: 'GET');
$cards_search_tag     = form_fetch_element('tag', request_type: 'GET');

// Assemble the search parameters
$cards_search = array(  'name'          => $cards_search_name     ,
                        'body'          => $cards_search_body     ,
                        'release_uuid'  => $cards_search_release  ,
                        'faction_uuid'  => $cards_search_faction  ,
                        'type_uuid'     => $cards_search_type     ,
                        'rarity_uuid'   => $cards_search_rarity   ,
                        'tag'           => $cards_search_tag      ,
                        'game_card'     => true                   ,
                        'public'        => true                   );

// Fetch the cards
$cards_list = cards_list( search:   $cards_search  ,
                          format:   'api'          );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the card list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the cards
echo sanitize_api_output($cards_list);