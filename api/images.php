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
// Fetch the list of images

// Retrieve the search parameters
$images_search_name   = form_fetch_element('name', request_type: 'GET');
$images_search_lang   = form_fetch_element('language', request_type: 'GET');
$images_search_artist = form_fetch_element('artist', request_type: 'GET');

// Assemble the search parameters
$images_search = array( 'name'    => $images_search_name   ,
                        'lang'    => $images_search_lang   ,
                        'artist'  => $images_search_artist );

// Fetch the images
$images_list = images_list( search:   $images_search  ,
                            format:   'api'          );




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Output the image list as JSON

// Send headers announcing a json output
header("Content-Type: application/json; charset=UTF-8");

// Output the images
echo sanitize_api_output($images_list);