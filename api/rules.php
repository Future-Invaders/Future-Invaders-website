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

// Assemble the search parameters
$cards_search =  array( 'type'    => 'Rules'  ,
                        'public'  => true     );

// Fetch the cards
$cards_list = cards_list( sort_by:  'name'        ,
                          search:   $cards_search ,
                          format:   'api'         );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the card list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the cards
echo sanitize_api_output($cards_list);