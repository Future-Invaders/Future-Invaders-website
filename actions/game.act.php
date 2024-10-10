<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  images_get                      Returns data related to an image                                                 */
/*  images_list                     Lists images in the database                                                     */
/*  images_list_directories         Lists directories which should be scanned for images                             */
/*  images_list_uncategorized       Lists images waiting to be added to the database                                 */
/*  images_add                      Adds an image to the database                                                    */
/*  images_edit                     Edits an image in the database                                                   */
/*  images_delete                   Deletes an image from the database                                               */
/*                                                                                                                   */
/*  releases_get                    Returns data related to a release                                                */
/*  releases_list                   Lists releases in the database                                                   */
/*  releases_add                    Adds a release to the database                                                   */
/*  releases_edit                   Edits a release in the database                                                  */
/*  releases_delete                 Deletes a release from the database                                              */
/*                                                                                                                   */
/*  factions_get                    Returns data related to a faction                                                */
/*  factions_list                   Lists factions in the database                                                   */
/*  factions_add                    Adds a faction to the database                                                   */
/*  factions_edit                   Edits a faction in the database                                                  */
/*  factions_delete                 Deletes a faction from the database                                              */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to an image.
 *
 * @param   int         $image_id   The id of the image.
 *
 * @return  array|null              An array containing the image's data, or null if the image does not exist.
 */

function images_get( int $image_id ) : array|null
{
  // Sanitize the image's id
  $image_id = sanitize($image_id, 'int');

  // Return null if the image does not exist
  if(!database_row_exists('images', $image_id))
    return null;

  // Fetch the image's data
  $image_data = query(" SELECT  images.path   AS 'i_path' ,
                                images.name   AS 'i_name' ,
                                images.artist AS 'i_artist'
                        FROM    images
                        WHERE   images.id = '$image_id' ",
                        fetch_row: true);

  // Assemble an array with the image's data
  $data['path']   = sanitize_output($image_data['i_path']);
  $data['name']   = sanitize_output($image_data['i_name']);
  $data['artist'] = sanitize_output($image_data['i_artist']);

  // Return the image's data
  return $data;
}




/**
 * Lists images in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 *
 * @return  array   An array containing the images.
 */

function images_list( string  $sort_by  = 'path'  ,
                      array   $search   = array() ) : array
{
  // Sanatize the search data
  $search_path    = sanitize_array_element($search, 'path', 'string');
  $search_name    = sanitize_array_element($search, 'name', 'string');
  $search_artist  = sanitize_array_element($search, 'artist', 'string');

  // Search through the data
  $query_search =   ($search_path)    ? " WHERE images.path   LIKE '%$search_path%' "    : " WHERE 1 = 1 ";
  $query_search .=  ($search_name)    ? " AND   images.name   LIKE '%$search_name%' "    : "";
  $query_search .=  ($search_artist)  ? " AND   images.artist LIKE '%$search_artist%' "  : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'    => " ORDER BY images.name   ASC ,
                            images.path   ASC ",
    'artist'  => " ORDER BY images.artist ASC ,
                            images.path   ASC ",
    default   => " ORDER BY images.path   ASC ",
  };

  // Get a list of all images in the database
  $qimages = query("  SELECT    images.id     AS 'i_id'   ,
                                images.path   AS 'i_path' ,
                                images.name   AS 'i_name' ,
                                images.artist AS 'i_artist'
                      FROM      images
                      $query_search
                      $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($qimages); $i++)
  {
    $data[$i]['id']     = sanitize_output($row['i_id']);
    $data[$i]['path']   = './../../'.sanitize_output($row['i_path']);
    $data[$i]['dpath']  = sanitize_output($row['i_path']);
    $data[$i]['spath']  = sanitize_output(mb_substr($row['i_path'], 4));
    $data[$i]['name']   = sanitize_output($row['i_name']);
    $data[$i]['artist'] = sanitize_output($row['i_artist']);
  }

  // Add the number of rows to the data
  $data['rows'] = $i;

  // Return the prepared data
  return $data;
}



/**
 * Lists directories which should be scanned for images.
 *
 * @return  array   An array containing the directories.
 */

function images_list_directories() : array
{
  // Decide in which directories to look for images
  $directories = array('rules');

  // Return the directories
  return $directories;
}




/**
 * Lists images waiting to be added to the database.
 *
 * @return  array   An array containing the images.
 */

function images_list_uncategorized() : array
{
  // Decide in which directories to look for images
  $directories = images_list_directories();

  // Decide which files should be removed from the list
  $files_to_remove = array('.', '..', 'index.php');

  // Get a list of all images in the database
  $qimages = query("  SELECT    images.path AS 'i_path'
                      FROM      images ");

  // Store these images in an array
  $images_list = array();
  while($dimages = query_row($qimages, 'both'))
    $images_list[] = './../../'.$dimages['i_path'];

  // Look for images that aren't in the database

  foreach($directories as $directory)
  {
    // Fetch the images in the directory
    $images_in_directory = scandir('./../../img/'.$directory);

    // Remove some files from the list
    foreach($files_to_remove as $file)
      if(in_array($file, $images_in_directory))
        unset($images_in_directory[array_search($file, $images_in_directory)]);

    // Add the images to the array if they aren't in the database
    foreach($images_in_directory as $image)
      if(!in_array('./../../img/'.$directory.'/'.$image, $images_list))
        $missing_images[] = $image;

    // Sort the list alphabetically
    if(isset($missing_images))
      sort($missing_images);
    else
      $missing_images = array();
  }

  // Add the number of rows to the returned data
  $missing_images['rows'] = count($missing_images);

  // Return the images
  return $missing_images;
}




/**
 * Adds an image to the database.
 *
 * @param   array   $data  An array containing the image's data.
 *
 * @return  void
 */

function images_add( array $data ) : void
{
  // Stop here if there is no image path
  if(!isset($data['image_path']))
    return;

  // Get a list of all images in the database
  $qimages = query("  SELECT    images.path AS 'i_path'
                      FROM      images ");

  // Store these images in an array
  $images_list = array();
  while($dimages = query_row($qimages, 'both'))
    $images_list[] = $dimages['i_path'];

  // Ensure the image exists and isn't already in the database
  $directories = images_list_directories();
  foreach($directories as $directory)
  {
    // Define the image's full path
    $temp_path = './../../img/'.$directory.'/'.$data['image_path'];

    // Check if the image exists
    if(file_exists($temp_path))
    {
      // If it does, check if it's already in the database
      if(!in_array($temp_path, $images_list))
      {
        // If not, grab the image's path
        $image_path = $temp_path;
      }
    }
  }

  // Stop here if the image is already in the database or doesn't exist
  if(!isset($image_path))
    return;

  // Sanatize the data
  $image_add_path   = sanitize(mb_substr($image_path, 8), 'string');
  $image_add_name   = sanitize_array_element($data, 'image_name', 'string');
  $image_add_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Add the image to the database
  query(" INSERT INTO images
          SET         images.uuid   = UUID()              ,
                      images.path   = '$image_add_path'   ,
                      images.name   = '$image_add_name'   ,
                      images.artist = '$image_add_artist' ");
}




/**
 * Edits an image in the database.
 *
 * @param   int         $image_id   The id of the image to edit.
 * @param   array       $data       An array containing the image's data.
 *
 * @return  void
 */

function images_edit( int   $image_id ,
                      array $data     ) : void
{
  // Sanitize the data
  $image_id     = sanitize($image_id, 'int');
  $image_name   = sanitize_array_element($data, 'image_name', 'string');
  $image_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Stop here if the image does not exist
  if(!database_row_exists('images', $image_id))
    return;

  // Edit the image
  query(" UPDATE  images
          SET     images.name   = '$image_name'   ,
                  images.artist = '$image_artist'
          WHERE   images.id     = '$image_id' ");
}




/**
 * Deletes an image from the database.
 *
 * @param   int     $image_id  The id of the image to delete.
 *
 * @return  void
 */

function images_delete( int $image_id ) : void
{
  // Sanitize the data
  $image_id = sanitize($image_id, 'int');

  // Delete the image from the database
  query(" DELETE FROM images
          WHERE   images.id = '$image_id' ");
}




/**
 * Returns data related to a release.
 *
 * @param   int         $release_id   The id of the release.
 *
 * @return  array|null              An array containing the release's data, or null if the release does not exist.
 */

function releases_get( int $release_id ) : array|null
{
  // Sanitize the release's id
  $release_id = sanitize($release_id, 'int');

  // Return null if the release does not exist
  if(!database_row_exists('releases', $release_id))
    return null;

  // Fetch the release's data
  $release_data = query(" SELECT  releases.id           AS 'r_id'       ,
                                  releases.name_en      AS 'r_name_en'  ,
                                  releases.name_fr      AS 'r_name_fr'  ,
                                  releases.release_date AS 'r_date'
                          FROM    releases
                          WHERE   releases.id = '$release_id' ",
                          fetch_row: true);

  // Assemble an array with the release's data
  $data['id']       = sanitize_output($release_data['r_id']);
  $data['name_en']  = sanitize_output($release_data['r_name_en']);
  $data['name_fr']  = sanitize_output($release_data['r_name_fr']);
  $data['date']     = sanitize_output(date_to_ddmmyy($release_data['r_date']));
  $data['datesql']  = sanitize_output($release_data['r_date']);

  // Return the release's data
  return $data;
}




/**
 * Lists releases in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array   An array containing the releases.
 */

function releases_list( string  $sort_by  = 'path'  ,
                        array   $search   = array() ,
                        string  $format   = 'html'  ) : array
{
  // Sanatize the search data
  $search_lang  = sanitize_array_element($search, 'lang', 'string');
  $search_date  = sanitize_array_element($search, 'date', 'string');
  $search_name  = sanitize_array_element($search, 'name', 'string');
  $lang         = string_change_case(user_get_language(), 'lowercase');

  // Search through the data
  $query_search  =  ($search_date)  ? " WHERE releases.release_date LIKE '%$search_date%' " : " WHERE 1 = 1 ";
  $query_search .=  ($search_name)  ? " AND   releases.name_$lang   LIKE '%$search_name%' " : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'          => " ORDER BY releases.name_$lang ASC     ,
                                  releases.release_date DESC  ",
    'date_reverse'  => " ORDER BY releases.release_date ASC   ",
    default         => " ORDER BY releases.release_date DESC  ",
  };

  // Get a list of all releases in the database
  $qreleases = query("  SELECT  releases.id           AS 'r_id'       ,
                                releases.uuid         AS 'r_uuid'     ,
                                releases.name_en      AS 'r_name_en'  ,
                                releases.name_fr      AS 'r_name_fr'  ,
                                releases.release_date AS 'r_date'
                        FROM    releases
                        $query_search
                        $query_sort ");

  // Prepare the data
  for($i = 0; $row = query_row($qreleases); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']       = sanitize_output($row['r_id']);
      $data[$i]['name_en']  = sanitize_output($row['r_name_en']);
      $data[$i]['name_fr']  = sanitize_output($row['r_name_fr']);
      $data[$i]['name']     = sanitize_output($row['r_name_'.$lang]);
      $data[$i]['date']     = sanitize_output(date_to_ddmmyy($row['r_date']));
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid'] = sanitize_json($row['r_uuid']);
      $temp_name        = ($search_lang === 'fr') ? $row['r_name_fr'] : $row['r_name_en'];
      $data[$i]['name'] = sanitize_json($temp_name);
      $data[$i]['date'] = sanitize_json($row['r_date']);
    }
  }

  // Add the number of rows to the data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('releases' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a release to the database.
 *
 * @param   array   $data  An array containing the release's data.
 *
 * @return  void
 */

function releases_add( array $data ) : void
{
  // Sanatize the data
  $release_date     = sanitize_array_element($data, 'date', 'string');
  $release_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $release_name_fr  = sanitize_array_element($data, 'name_fr', 'string');

  // Add the release to the database
  query(" INSERT INTO releases
          SET         releases.uuid         = UUID()              ,
                      releases.name_en      = '$release_name_en'  ,
                      releases.name_fr      = '$release_name_fr'  ,
                      releases.release_date = '$release_date'     ");
}




/**
 * Edits a release in the database.
 *
 * @param   int         $release_id   The id of the release to edit.
 * @param   array       $data         An array containing the release's data.
 *
 * @return  void
 */

function releases_edit( int   $release_id ,
                        array $data       ) : void
{
  // Sanitize the data
  $release_id       = sanitize($release_id, 'int');
  $release_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $release_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $release_date     = sanitize_array_element($data, 'date', 'string');

  // Stop here if the release does not exist
  if(!database_row_exists('releases', $release_id))
    return;

  // Edit the release
  query(" UPDATE  releases
          SET     releases.name_en      = '$release_name_en'  ,
                  releases.name_fr      = '$release_name_fr'  ,
                  releases.release_date = '$release_date'
          WHERE   releases.id           = '$release_id' ");
}




/**
 * Deletes a release from the database.
 *
 * @param   int     $release_id  The id of the release to delete.
 *
 * @return  void
 */

function releases_delete( int $release_id ) : void
{
  // Sanitize the data
  $release_id = sanitize($release_id, 'int');

  // Delete the release from the database
  query(" DELETE FROM releases
          WHERE       releases.id = '$release_id' ");
}




/**
 * Returns data related to a faction.
 *
 * @param   int         $faction_id   The id of the faction.
 *
 * @return  array|null                An array containing the faction's data, or null if the faction does not exist.
 */

function factions_get( int $faction_id ) : array|null
{
  // Sanitize the faction's id
  $faction_id = sanitize($faction_id, 'int');

  // Return null if the faction does not exist
  if(!database_row_exists('factions', $faction_id))
    return null;

  // Fetch the faction's data
  $faction_data = query(" SELECT  factions.id             AS 'f_id' ,
                                  factions.sorting_order  AS 'f_order' ,
                                  factions.name_en        AS 'f_name_en' ,
                                  factions.name_fr        AS 'f_name_fr'
                          FROM    factions
                          WHERE   factions.id = '$faction_id' ",
                          fetch_row: true);

  // Assemble an array with the faction's data
  $data['id']       = sanitize_output($faction_data['f_id']);
  $data['order']    = sanitize_output($faction_data['f_order']);
  $data['name_en']  = sanitize_output($faction_data['f_name_en']);
  $data['name_fr']  = sanitize_output($faction_data['f_name_fr']);

  // Return the faction's data
  return $data;
}




/**
 * Lists factions in the database.
 *
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the factions.
 */

function factions_list( array   $search = array() ,
                        string  $format = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanatize the search data
  $search_lang  = sanitize_array_element($search, 'lang', 'string');

  // Fetch the factions
  $factions = query(" SELECT    factions.id             AS 'f_id'       ,
                                factions.uuid           AS 'f_uuid'     ,
                                factions.sorting_order  AS 'f_order'    ,
                                factions.name_en        AS 'f_name_en'  ,
                                factions.name_fr        AS 'f_name_fr'  ,
                                factions.name_$lang     AS 'f_name'
                      FROM      factions
                      ORDER BY  factions.sorting_order ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($factions); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']     = sanitize_output($row['f_id']);
      $data[$i]['order']  = sanitize_output($row['f_order']);
      $data[$i]['name']   = sanitize_output($row['f_name']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid'] = sanitize_json($row['f_uuid']);
      $temp_name        = ($search_lang == 'fr') ? $row['f_name_fr'] : $row['f_name_en'];
      $data[$i]['name'] = sanitize_json($temp_name);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('factions' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a faction to the database.
 *
 * @param   array   $data  An array containing the faction's data.
 *
 * @return  void
 */

function factions_add( array $data ) : void
{
  // Sanitize the data
  $faction_order    = sanitize_array_element($data, 'order', 'int');
  $faction_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $faction_name_fr  = sanitize_array_element($data, 'name_fr', 'string');

  // Add the faction to the database
  query(" INSERT INTO factions
          SET         factions.uuid           = UUID()              ,
                      factions.sorting_order  = '$faction_order'    ,
                      factions.name_en        = '$faction_name_en'  ,
                      factions.name_fr        = '$faction_name_fr'  ");
}




/**
 * Edits a faction in the database.
 *
 * @param   int         $faction_id   The id of the faction to edit.
 * @param   array       $data         An array containing the faction's data.
 *
 * @return  void
 */

function factions_edit( int   $faction_id ,
                        array $data       ) : void
{
  // Sanitize the data
  $faction_id       = sanitize($faction_id, 'int');
  $faction_order    = sanitize_array_element($data, 'order', 'int');
  $faction_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $faction_name_fr  = sanitize_array_element($data, 'name_fr', 'string');

  // Stop here if the faction does not exist
  if(!database_row_exists('factions', $faction_id))
    return;

  // Edit the faction
  query(" UPDATE  factions
          SET     factions.sorting_order  = '$faction_order'    ,
                  factions.name_en        = '$faction_name_en'  ,
                  factions.name_fr        = '$faction_name_fr'
          WHERE   factions.id             = '$faction_id' ");
}




/**
 * Deletes a faction from the database.
 *
 * @param   int     $faction_id  The id of the faction to delete.
 *
 * @return  void
 */

function factions_delete( int $faction_id ) : void
{
  // Sanitize the data
  $faction_id = sanitize($faction_id, 'int');

  // Delete the faction from the database
  query(" DELETE FROM factions
          WHERE       factions.id = '$faction_id' ");
}