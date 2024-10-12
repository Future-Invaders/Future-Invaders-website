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
/*  tags_get                        Returns data related to a tag                                                    */
/*  tags_list                       Lists tags in the database                                                       */
/*  tags_list_types                 Lists tag types in the database                                                  */
/*  tags_add                        Adds a tag to the database                                                       */
/*  tags_edit                       Edits a tag in the database                                                      */
/*  tags_delete                     Deletes a tag from the database                                                  */
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
/*  card_types_get                  Returns data related to a card type                                              */
/*  card_types_list                 Lists card types in the database                                                 */
/*  card_types_add                  Adds a card type to the database                                                 */
/*  card_types_edit                 Edits a card type in the database                                                */
/*  card_types_delete               Deletes a card type from the database                                            */
/*                                                                                                                   */
/*  card_rarities_get               Returns data related to a card rarity                                            */
/*  card_rarities_list              Lists card rarities in the database                                              */
/*  card_rarities_add               Adds a card rarity to the database                                               */
/*  card_rarities_edit              Edits a card rarity in the database                                              */
/*  card_rarities_delete            Deletes a card rarity from the database                                          */
/*                                                                                                                   */
/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    IMAGES                                                         */
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

  // Fetch the image's tags
  $image_tags = query(" SELECT  tags_images.fk_tags AS 'ti_tag'
                        FROM    tags_images
                        WHERE   tags_images.fk_images = '$image_id' ");

  // Assemble an array with the image's tags
  $data['tags'] = array();
  while($dtags = query_row($image_tags))
    $data['tags'][] = sanitize_output($dtags['ti_tag']);

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

  // Sanatize image data
  $image_add_path   = sanitize(mb_substr($image_path, 8), 'string');
  $image_add_name   = sanitize_array_element($data, 'image_name', 'string');
  $image_add_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Add the image to the database
  query(" INSERT INTO images
          SET         images.uuid   = UUID()              ,
                      images.path   = '$image_add_path'   ,
                      images.name   = '$image_add_name'   ,
                      images.artist = '$image_add_artist' ");

  // Get the newly created image's id
  $image_id = sanitize(query_id(), "int");

  // Fetch a list of image tags
  $image_tags = tags_list(search: array('ftype' => 'Image'));

  // Add the image's tags to the database
  for($i = 0; $i < $image_tags['rows']; $i++)
  {
    $tag_id = $image_tags[$i]['id'];
    if($data['image_tags'][$image_tags[$i]['id']])
      query(" INSERT INTO tags_images
              SET         tags_images.fk_images = '$image_id' ,
                          tags_images.fk_tags   = '$tag_id'   ");
  }
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

  // Fetch a list of image tags
  $image_tags = tags_list(search: array('ftype' => 'Image'));

  // Update the image's tags in the database
  for($i = 0; $i < $image_tags['rows']; $i++)
  {
    // Check the current status of each tag
    $tag_id = $image_tags[$i]['id'];
    $tag_check = query("  SELECT  tags_images.id AS 'ti_id'
                          FROM    tags_images
                          WHERE   tags_images.fk_images = '$image_id'
                          AND     tags_images.fk_tags   = '$tag_id' ",
                          fetch_row: true);

    // Create missing tags
    if($data['image_tags'][$image_tags[$i]['id']] && is_null($tag_check))
      query(" INSERT INTO tags_images
              SET         tags_images.fk_images = '$image_id' ,
                          tags_images.fk_tags   = '$tag_id'   ");

    // Delete extraneous tags
    if(!$data['image_tags'][$image_tags[$i]['id']] && !is_null($tag_check))
      query(" DELETE FROM tags_images
              WHERE       tags_images.fk_images = '$image_id'
              AND         tags_images.fk_tags   = '$tag_id'   ");
  }
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

  // Delete the image's tags from the database
  query(" DELETE FROM tags_images
          WHERE       tags_images.fk_images = '$image_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    TAGS                                                           */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a tag.
 *
 * @param   int         $tag_id   The id of the tag.
 *
 * @return  array|null            An array containing the tag's data, or null if the tag does not exist.
 */

function tags_get( int $tag_id ) : array|null
{
  // Sanitize the tag's id
  $tag_id = sanitize($tag_id, 'int');

  // Return null if the tag does not exist
  if(!database_row_exists('tags', $tag_id))
    return null;

  // Fetch the tag's data
  $tag_data = query(" SELECT    tags.name           AS 't_name'     ,
                                tags.description_en AS 't_desc_en'  ,
                                tags.description_fr AS 't_desc_fr'
                      FROM      tags
                      WHERE     tags.id = '$tag_id' ",
                      fetch_row: true);

  // Assemble an array with the tag's data
  $data['name']     = sanitize_output($tag_data['t_name']);
  $data['desc_en']  = sanitize_output($tag_data['t_desc_en']);
  $data['desc_fr']  = sanitize_output($tag_data['t_desc_fr']);

  // Return the tag's data
  return $data;
}




/**
 * Lists tags in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the tags.
 */

function tags_list( string  $sort_by  = 'name'  ,
                    array   $search   = array() ,
                    string  $format   = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanatize the search data
  $search_type  = sanitize_array_element($search, 'type', 'int');
  $search_ftype = sanitize_array_element($search, 'ftype', 'string');
  $search_name  = sanitize_array_element($search, 'name', 'string');
  $search_desc  = sanitize_array_element($search, 'desc', 'string');

  // Search through the data
  $query_search  =  ($search_type)  ? " WHERE tags.fk_tag_types       = '$search_type' "      : " WHERE 1 = 1 ";
  $query_search .=  ($search_ftype) ? " AND   tag_types.name          LIKE '$search_ftype' "  : "";
  $query_search .=  ($search_name)  ? " AND   tags.name               LIKE '%$search_name%' " : "";
  $query_search .=  ($search_desc)  ? " AND   tags.description_$lang  LIKE '%$search_desc%' " : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'  => " ORDER BY tags.name               ASC ,
                          tag_types.name          ASC ",
    'desc'  => " ORDER BY tags.description_$lang  ASC ,
                          tag_types.name          ASC ,
                          tags.name               ASC ",
    'api'   => " ORDER BY tag_types.name          ASC ,
                          tags.name               ASC ",
    default => " ORDER BY tag_types.name          ASC ,
                          tags.name               ASC ",
  };

  // Fetch the tags
  $tags = query("  SELECT     tags.id             AS 't_id'       ,
                              tags.uuid           AS 't_uuid'     ,
                              tags.name           AS 't_name'     ,
                              tags.description_en AS 't_desc_en'  ,
                              tags.description_fr AS 't_desc_fr'  ,
                              tag_types.id        AS 'tt_id'      ,
                              tag_types.name      AS 'tt_type'
                    FROM      tags
                    LEFT JOIN tag_types ON tags.fk_tag_types = tag_types.id
                    $query_search
                    $query_sort ");

  // Reset the number of tag types
  $tag_types = tags_list_types();
  if($format === 'html')
  {
    for($i = 0; $i < $tag_types['rows']; $i++)
    {
      $data['type_name'][$tag_types[$i]['id']]  = $tag_types[$i]['name'];
      $data['type_count'][$tag_types[$i]['id']] = 0;
    }
  }

  // Prepare the data for display
  for($i = 0; $row = query_row($tags); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      // Sanatize the data
      $data[$i]['id']     = sanitize_output($row['t_id']);
      $data[$i]['name']   = sanitize_output(string_truncate($row['t_name'], 25, '...'));
      $data[$i]['fname']  = sanitize_output($row['t_name']);
      $data[$i]['type']   = sanitize_output($row['tt_type']);
      $data[$i]['desc']   = sanitize_output(string_truncate($row['t_desc_'.$lang], 50, '...'));
      $data[$i]['fdesc']  = sanitize_output($row['t_desc_'.$lang], preserve_line_breaks: true);

      // Count tag types
      $data['type_count'][$row['tt_id']]++;
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']         = sanitize_json($row['t_uuid']);
      $data[$i]['type']         = sanitize_json($row['tt_type']);
      $data[$i]['name']         = sanitize_json($row['t_name']);
      $data[$i]['description']  = sanitize_json($row['t_desc_'.$lang]);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('tags' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Lists tag types in the database.
 *
 * @return  array   An array containing the tag types.
 */

function tags_list_types() : array
{
  // Fetch the tag types
  $tag_types = query("  SELECT    tag_types.id    AS 'tt_id' ,
                                  tag_types.name  AS 'tt_name'
                        FROM      tag_types
                        ORDER BY  tag_types.name ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($tag_types); $i++)
  {
    $data[$i]['id']   = sanitize_output($row['tt_id']);
    $data[$i]['name'] = sanitize_output($row['tt_name']);
  }

  // Add the number of rows to the returned data
  $data['rows'] = $i;

  // Return the prepared data
  return $data;
}




/**
 * Adds a tag to the database.
 *
 * @param   array   $data  An array containing the tag's data.
 *
 * @return  void
 */

function tags_add( array $data ) : void
{
  // Sanitize the data
  $tag_type     = sanitize_array_element($data, 'type', 'int');
  $tag_name     = sanitize_array_element($data, 'name', 'string');
  $tag_desc_en  = sanitize_array_element($data, 'desc_en', 'string');
  $tag_desc_fr  = sanitize_array_element($data, 'desc_fr', 'string');

  // Add the tag to the database
  query(" INSERT INTO tags
          SET         tags.uuid           = UUID()          ,
                      tags.fk_tag_types   = '$tag_type'     ,
                      tags.name           = '$tag_name'     ,
                      tags.description_en = '$tag_desc_en'  ,
                      tags.description_fr = '$tag_desc_fr'  ");
}




/**
 * Edits a tag in the database.
 *
 * @param   int         $tag_id   The id of the tag to edit.
 * @param   array       $data     An array containing the tag's data.
 *
 * @return  void
 */

function tags_edit( int   $tag_id ,
                    array $data     ) : void
{
  // Sanitize the data
  $tag_id       = sanitize($tag_id, 'int');
  $tag_name     = sanitize_array_element($data, 'name', 'string');
  $tag_desc_en  = sanitize_array_element($data, 'desc_en', 'string');
  $tag_desc_fr  = sanitize_array_element($data, 'desc_fr', 'string');

  // Stop here if the tag does not exist
  if(!database_row_exists('tags', $tag_id))
    return;

  // Edit the tag
  query(" UPDATE  tags
          SET     tags.name           = '$tag_name'     ,
                  tags.description_en = '$tag_desc_en'  ,
                  tags.description_fr = '$tag_desc_fr'
          WHERE   tags.id             = '$tag_id' ");
}




/**
 * Deletes a tag from the database.
 *
 * @param   int     $tag_id  The id of the tag to delete.
 *
 * @return  void
 */

function tags_delete( int $tag_id ) : void
{
  // Sanitize the data
  $tag_id = sanitize($tag_id, 'int');

  // Delete the tag from the database
  query(" DELETE FROM tags
          WHERE       tags.id = '$tag_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     RELEASES                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

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




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FACTIONS                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

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




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                    CARD TYPES                                                     */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a card type.
 *
 * @param   int         $card_type_id   The id of the card type.
 *
 * @return  array|null                  An array containing the card type's data, or null if the card type does not exist.
 */

function card_types_get( int $card_type_id ) : array|null
{
  // Sanitize the card type's id
  $card_type_id = sanitize($card_type_id, 'int');

  // Return null if the card type does not exist
  if(!database_row_exists('card_types', $card_type_id))
    return null;

  // Fetch the card type's data
  $card_type_data = query(" SELECT  card_types.id           AS 'c_id'       ,
                                    card_types.uuid         AS 'c_uuid'     ,
                                    card_types.name_en      AS 'c_name_en'  ,
                                    card_types.name_fr      AS 'c_name_fr'
                            FROM    card_types
                            WHERE   card_types.id = '$card_type_id' ",
                            fetch_row: true);

  // Assemble an array with the card type's data
  $data['id']       = sanitize_output($card_type_data['c_id']);
  $data['name_en']  = sanitize_output($card_type_data['c_name_en']);
  $data['name_fr']  = sanitize_output($card_type_data['c_name_fr']);

  // Return the card type's data
  return $data;
}




/**
 * Lists card types in the database.
 *
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the card types.
 */

function card_types_list( array   $search = array() ,
                          string  $format = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanatize the search data
  $search_lang = sanitize_array_element($search, 'lang', 'string');

  // Sort the data
  $sort_lang = ($search_lang !== null) ? $search_lang : $lang;
  $query_sort = match($sort_lang)
  {
    'fr'    => " ORDER BY card_types.name_fr ASC ",
    default => " ORDER BY card_types.name_en ASC ",
  };

  // Fetch the card types
  $card_types = query(" SELECT    card_types.id         AS 'c_id'       ,
                                  card_types.uuid       AS 'c_uuid'     ,
                                  card_types.name_en    AS 'c_name_en'  ,
                                  card_types.name_fr    AS 'c_name_fr'  ,
                                  card_types.name_$lang AS 'c_name'
                        FROM      card_types
                        $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($card_types); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']     = sanitize_output($row['c_id']);
      $data[$i]['name']   = sanitize_output($row['c_name']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid'] = sanitize_json($row['c_uuid']);
      $temp_name        = ($search_lang === 'fr') ? $row['c_name_fr'] : $row['c_name_en'];
      $data[$i]['type'] = sanitize_json($temp_name);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('card_types' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a card type to the database.
 *
 * @param   array   $data  An array containing the card type's data.
 *
 * @return  void
 */

function card_types_add( array $data ) : void
{
  // Sanitize the data
  $card_type_name_en = sanitize_array_element($data, 'name_en', 'string');
  $card_type_name_fr = sanitize_array_element($data, 'name_fr', 'string');

  // Add the card type to the database
  query(" INSERT INTO card_types
          SET         card_types.uuid     = UUID()                ,
                      card_types.name_en  = '$card_type_name_en'  ,
                      card_types.name_fr  = '$card_type_name_fr'  ");
}




/**
 * Edits a card type in the database.
 *
 * @param   int         $card_type_id   The id of the card type to edit.
 * @param   array       $data           An array containing the card type's data.
 *
 * @return  void
 */

function card_types_edit( int   $card_type_id ,
                          array $data         ) : void
{
  // Sanitize the data
  $card_type_id       = sanitize($card_type_id, 'int');
  $card_type_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $card_type_name_fr  = sanitize_array_element($data, 'name_fr', 'string');

  // Stop here if the card type does not exist
  if(!database_row_exists('card_types', $card_type_id))
    return;

  // Edit the card type
  query(" UPDATE  card_types
          SET     card_types.name_en  = '$card_type_name_en'  ,
                  card_types.name_fr  = '$card_type_name_fr'
          WHERE   card_types.id       = '$card_type_id' ");
}




/**
 * Deletes a card type from the database.
 *
 * @param   int     $card_type_id  The id of the card type to delete.
 *
 * @return  void
 */

function card_types_delete( int $card_type_id ) : void
{
  // Sanitize the data
  $card_type_id = sanitize($card_type_id, 'int');

  // Delete the card type from the database
  query(" DELETE FROM card_types
          WHERE       card_types.id = '$card_type_id' ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                   CARD RARITIES                                                   */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a card rarity.
 *
 * @param   int         $card_rarity_id   The id of the card rarity.
 *
 * @return  array|null                    An array containing the card rarity's data, or null if it does not exist.
 */

function card_rarities_get( int $card_rarity_id ) : array|null
{
  // Sanitize the card rarity's id
  $card_rarity_id = sanitize($card_rarity_id, 'int');

  // Return null if the card rarity does not exist
  if(!database_row_exists('card_rarities', $card_rarity_id))
    return null;

  // Fetch the card rarity's data
  $card_rarity_data = query(" SELECT  card_rarities.id              AS 'r_id'       ,
                                      card_rarities.uuid            AS 'r_uuid'     ,
                                      card_rarities.name_en         AS 'r_name_en'  ,
                                      card_rarities.name_fr         AS 'r_name_fr'  ,
                                      card_rarities.max_card_count  AS 'r_max_count'
                            FROM    card_rarities
                            WHERE   card_rarities.id = '$card_rarity_id' ",
                            fetch_row: true);

  // Assemble an array with the card rarity's data
  $data['id']         = sanitize_output($card_rarity_data['r_id']);
  $data['name_en']    = sanitize_output($card_rarity_data['r_name_en']);
  $data['name_fr']    = sanitize_output($card_rarity_data['r_name_fr']);
  $data['max_count']  = sanitize_output($card_rarity_data['r_max_count']);

  // Return the card rarity's data
  return $data;
}




/**
 * Lists card rarities in the database.
 *
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array                         An array containing the card rarities.
 */

function card_rarities_list( array   $search = array() ,
                             string  $format = 'html'  ) : array
{
  // Fetch the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Sanatize the search data
  $search_lang = sanitize_array_element($search, 'lang', 'string');

  // Sort the data
  $sort_lang = ($search_lang !== null) ? $search_lang : $lang;
  $query_sort = match($sort_lang)
  {
    'fr'    => " ORDER BY card_rarities.max_card_count  DESC  ,
                          card_rarities.name_fr         ASC   ",
    default => " ORDER BY card_rarities.max_card_count  DESC  ,
                          card_rarities.name_en         ASC   ",
  };

  // Fetch the card rarities
  $card_rarities = query("  SELECT  card_rarities.id              AS 'r_id'       ,
                                    card_rarities.uuid            AS 'r_uuid'     ,
                                    card_rarities.name_en         AS 'r_name_en'  ,
                                    card_rarities.name_fr         AS 'r_name_fr'  ,
                                    card_rarities.name_$lang      AS 'r_name'     ,
                                    card_rarities.max_card_count  AS 'r_max_count'
                            FROM    card_rarities
                            $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($card_rarities); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']         = sanitize_output($row['r_id']);
      $data[$i]['name']       = sanitize_output($row['r_name']);
      $data[$i]['max_count']  = sanitize_output($row['r_max_count']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']           = sanitize_json($row['r_uuid']);
      $temp_name                  = ($search_lang === 'fr') ? $row['r_name_fr'] : $row['r_name_en'];
      $data[$i]['name']           = sanitize_json($temp_name);
      $data[$i]['max_card_count'] = sanitize_json($row['r_max_count']);
    }
  }

  // Add the number of rows to the returned data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('card_rarities' => $data);
  }

  // Return the prepared data
  return $data;
}




/**
 * Adds a card rarity to the database.
 *
 * @param   array   $data  An array containing the card rarity's data.
 *
 * @return  void
 */

function card_rarities_add( array $data ) : void
{
  // Sanitize the data
  $card_rarity_name_en = sanitize_array_element($data, 'name_en', 'string');
  $card_rarity_name_fr = sanitize_array_element($data, 'name_fr', 'string');
  $card_rarity_max     = sanitize_array_element($data, 'max', 'int', min: 0, default: 0);

  // Add the card rarity to the database
  query(" INSERT INTO card_rarities
          SET         card_rarities.uuid            = UUID()                  ,
                      card_rarities.name_en         = '$card_rarity_name_en'  ,
                      card_rarities.name_fr         = '$card_rarity_name_fr'  ,
                      card_rarities.max_card_count  = '$card_rarity_max'      ");
}




/**
 * Edits a card rarity in the database.
 *
 * @param   int         $card_rarity_id   The id of the card rarity to edit.
 * @param   array       $data             An array containing the card rarity's data.
 *
 * @return  void
 */

function card_rarities_edit( int   $card_rarity_id ,
                             array $data         ) : void
{
  // Sanitize the data
  $card_rarity_id       = sanitize($card_rarity_id, 'int');
  $card_rarity_name_en  = sanitize_array_element($data, 'name_en', 'string');
  $card_rarity_name_fr  = sanitize_array_element($data, 'name_fr', 'string');
  $card_rarity_max      = sanitize_array_element($data, 'max', 'int', min: 0, default: 0);

  // Stop here if the card rarity does not exist
  if(!database_row_exists('card_rarities', $card_rarity_id))
    return;

  // Edit the card rarity
  query(" UPDATE  card_rarities
          SET     card_rarities.name_en         = '$card_rarity_name_en'  ,
                  card_rarities.name_fr         = '$card_rarity_name_fr'  ,
                  card_rarities.max_card_count  = '$card_rarity_max'
          WHERE   card_rarities.id             = '$card_rarity_id' ");
}




/**
 * Deletes a card rarity from the database.
 *
 * @param   int     $card_rarity_id  The id of the card rarity to delete.
 *
 * @return  void
 */

function card_rarities_delete( int $card_rarity_id ) : void
{
  // Sanitize the data
  $card_rarity_id = sanitize($card_rarity_id, 'int');

  // Delete the card rarity from the database
  query(" DELETE FROM card_rarities
          WHERE       card_rarities.id = '$card_rarity_id' ");
}