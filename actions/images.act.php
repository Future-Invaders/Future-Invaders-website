<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  images_get                      Returns data related to an image                                                 */
/*  images_get_full_path            Returns the full path of an image waititng to be added to the database           */
/*  images_list                     Lists images in the database                                                     */
/*  images_list_directories         Lists directories which should be scanned for images                             */
/*  images_list_uncategorized       Lists images waiting to be added to the database                                 */
/*  images_list_languages           Lists languages with which images are tagged                                     */
/*  images_add                      Adds an image to the database                                                    */
/*  images_edit                     Edits an image in the database                                                   */
/*  images_delete                   Deletes an image from the database                                               */
/*                                                                                                                   */
/*  images_generate_thumbnail       Generates a thumbnail for an image                                               */
/*  images_regenerate_thumbnail     Regenerates thumbnails for all images                                            */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to an image.
 *
 * @param   int         $image_id         (OPTIONAL)  The id of the image.
 * @param   string      $image_uuid       (OPTIONAL)  The uuid of the image.
 * @param   string      $format           (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth         (OPTIONAL)  Whether to include elements linked to the image in the API.
 * @param   bool        $no_parent_array  (OPTIONAL)  Whether to return the data inside a parent array in the API.
 *
 * @return  array|null                    An array containing the image's data, or null if the image does not exist.
 */

function images_get(  ?int    $image_id         = null    ,
                      ?string $image_uuid       = null    ,
                      string  $format           = 'html'  ,
                      bool    $no_depth         = false   ,
                      bool    $no_parent_array  = false   ) : array|null
{
  // Return null if there are neither an id nor an uuid
  if(!$image_id && !$image_uuid)
    return null;

  // Sanitize the image's id and uuid
  $image_id   = sanitize($image_id, 'int');
  $image_uuid = sanitize($image_uuid, 'string');

  // Return null if the tag does not have a valid ID
  if($image_id && !database_row_exists('images', $image_id))
    return null;

  // Return null if the tag does not have a valid UUID
  if($image_uuid && !database_entry_exists('images', 'uuid', $image_uuid))
    return null;

  // Prepare the condition for retrieving the image
  $query_where = ($image_id) ? " WHERE images.id = '$image_id' " : " WHERE images.uuid = '$image_uuid' ";

  // Fetch the image's data
  $image_data = query(" SELECT    images.id             AS 'i_id'         ,
                                  images.uuid           AS 'i_uuid'       ,
                                  images.path           AS 'i_path'       ,
                                  images.name           AS 'i_name'       ,
                                  images.language       AS 'i_lang'       ,
                                  images.artist         AS 'i_artist'     ,
                                  cards_en.id           AS 'c_id_en'      ,
                                  cards_en.is_hidden    AS 'c_hidden_en'  ,
                                  cards_fr.id           AS 'c_id_fr'      ,
                                  cards_fr.is_hidden    AS 'c_hidden_fr'  ,
                                  arsenals_en.id        AS 'a_id_en'      ,
                                  arsenals_en.is_hidden AS 'a_hidden_en'  ,
                                  arsenals_fr.id        AS 'a_id_fr'      ,
                                  arsenals_fr.is_hidden AS 'a_hidden_fr'
                        FROM      images
                        LEFT JOIN cards     AS cards_en     ON cards_en.fk_images_en    = images.id
                        LEFT JOIN cards     AS cards_fr     ON cards_fr.fk_images_fr    = images.id
                        LEFT JOIN arsenals  AS arsenals_en  ON arsenals_en.fk_images_en = images.id
                        LEFT JOIN arsenals  AS arsenals_fr  ON arsenals_fr.fk_images_fr = images.id
                        $query_where ",
                        fetch_row: true);

  // Don't show images linked to hidden cards in the API
  if($format === 'api' && ($image_data['c_hidden_en'] || $image_data['c_hidden_fr']))
    return null;

  // Don't show images linked to hidden arsenals in the API
  if($format === 'api' && ($image_data['a_hidden_en'] || $image_data['a_hidden_fr']))
    return null;

  // Don't show images linked to nothing in the API
  if($format === 'api' && !$image_data['c_id_en'] && !$image_data['c_id_fr'] && !$image_data['a_id_en'] && !$image_data['a_id_fr'])
    return null;

  // Sanitize the image's id
  $image_id = sanitize($image_data['i_id'], 'int');

  // Fetch linked cards
  $qcards = query(" SELECT    cards.uuid    AS 'c_uuid'     ,
                              cards.name_en AS 'c_name_en'  ,
                              cards.name_fr AS 'c_name_fr'
                    FROM      cards
                    WHERE   ( cards.fk_images_en = '$image_id'
                    OR        cards.fk_images_fr = '$image_id' )
                    ORDER BY  cards.name_en ASC ");


  // Fetch linked tags
  $qtags = query("  SELECT    tags.uuid           AS 't_uuid' ,
                              tags.name           AS 't_name' ,
                              tags_images.fk_tags AS 'it_id'
                    FROM      tags_images
                    LEFT JOIN tags ON tags_images.fk_tags = tags.id
                    WHERE     tags_images.fk_images = '$image_id'
                    ORDER BY  tags.name ASC ");

  // Prepare the data for display
  if($format === 'html')
  {
    $data['path']   = sanitize_output($image_data['i_path']);
    $data['name']   = sanitize_output($image_data['i_name']);
    $data['lang']   = sanitize_output($image_data['i_lang']);
    $data['artist'] = sanitize_output($image_data['i_artist']);
  }

  // Prepare the data for the API
  if($format === 'api')
  {
    // Sanitize card data
    $data['uuid']     = sanitize_json($image_data['i_uuid']);
    $data['path']     = sanitize_json($GLOBALS['website_url'].$image_data['i_path']);
    $data['name']     = sanitize_json($image_data['i_name']);
    $data['language'] = sanitize_json($image_data['i_lang']);
    $data['artist']   = sanitize_json($image_data['i_artist']);

    // Cards
    if(!$no_depth)
    {
      for($i = 0; $dcards = query_row($qcards); $i++)
      {
        $data['cards'][$i]['uuid']        = sanitize_json($dcards['c_uuid']);
        $data['cards'][$i]['endpoint']    = sanitize_json($GLOBALS['website_url']
                                                          .'api/card/'.$dcards['c_uuid']);
        $data['cards'][$i]['name']['en']  = sanitize_json($dcards['c_name_en']);
        $data['cards'][$i]['name']['fr']  = sanitize_json($dcards['c_name_fr']);
      }
      if($i === 0)
        $data['cards']                    = array();
    }

    // Tags
    if(!$no_depth)
    {
      for($i = 0; $dtags = query_row($qtags); $i++)
      {
        $data['tags'][$i]['uuid']     = sanitize_json($dtags['t_uuid']);
        $data['tags'][$i]['endpoint'] = sanitize_json($GLOBALS['website_url']
                                                      .'api/tag/'.$dtags['t_uuid']);
        $data['tags'][$i]['name']     = sanitize_json($dtags['t_name']);
      }
      if($i === 0)
        $data['tags']                 = array();
    }
  }

  // Prepare for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = ($no_parent_array) ? $data : array('image' => $data);
  }

  // Return the image's data
  return $data;
}




/**
 * Lists images in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 * @param   string  $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 *
 * @return  array   An array containing the images.
 */

function images_list( string  $sort_by  = 'path'  ,
                      array   $search   = array() ,
                      string  $format   = 'html'  ) : array
{
  // Sanatize the search data
  $search_path    = sanitize_array_element($search, 'path', 'string');
  $search_name    = sanitize_array_element($search, 'name', 'string');
  $search_lang    = sanitize_array_element($search, 'lang', 'string');
  $search_artist  = sanitize_array_element($search, 'artist', 'string');
  $search_tag_id  = sanitize_array_element($search, 'tag_id', 'int');
  $search_cards   = sanitize_array_element($search, 'cards', 'int');
  $search_tag     = sanitize_array_element($search, 'tag', 'string');
  $search_unused  = sanitize_array_element($search, 'unused', 'bool', default: false);

  // Search through the data
  $query_search =  ($search_path)             ? " WHERE images.path     LIKE '%$search_path%' "   : " WHERE 1 = 1 ";
  $query_search .= ($search_name)             ? " AND   images.name     LIKE '%$search_name%' "   : "";
  $query_search .= ($search_lang && $search_lang !== "none")
                                              ? " AND   images.language = '$search_lang' "        : "";
  $query_search .= ($search_lang === "none")  ? " AND   images.language = '' "                    : "";
  $query_search .= ($search_artist)           ? " AND   images.artist   LIKE '%$search_artist%' " : "";
  $query_search .= ($search_tag_id === -1)    ? " AND   tags.id         IS NULL "                 : "";
  $query_search .= ($search_tag)              ? " AND   tags.name       LIKE '$search_tag' "      : "";
  $query_search .= ($search_unused)           ? " AND   cards_en.id     IS NULL
                                                  AND   cards_fr.id     IS NULL "                 : "";

  // Only show images linked to non-extra non-hidden cards in the API
  $query_search .= ($format === 'api')        ? " AND ( cards_en.id     IS NOT NULL
                                                  OR    cards_fr.id     IS NOT NULL )
                                                  AND ( cards_en.is_extra_card = 0
                                                  OR    cards_fr.is_extra_card = 0 )
                                                  AND ( cards_en.is_hidden     = 0
                                                  OR    cards_fr.is_hidden     = 0 ) "            : "";

  // Use a different search technique for tags and cards
  $query_having   = ($search_cards === 1)
                  ? " HAVING  ( COUNT(DISTINCT cards_en.id) = 0
                      AND       COUNT(DISTINCT cards_fr.id) = 0 ) "
                  : " HAVING 1 = 1 ";
  $query_having  .= ($search_cards === 2)
                  ? " AND     ( COUNT(DISTINCT cards_en.id)
                      +         COUNT(DISTINCT cards_fr.id) ) = 1 "
                  : "";
  $query_having  .= ($search_cards === 3)
                  ? " AND     ( COUNT(DISTINCT cards_en.id)
                      +         COUNT(DISTINCT cards_fr.id) ) > 1 "
                  : "";
  $query_having  .= ($search_tag_id && $search_tag_id !== -1)
                  ? " AND FIND_IN_SET('$search_tag_id', GROUP_CONCAT(tags.id)) > 0 "
                  : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'    => " ORDER BY images.name     ASC   ,
                            images.path     ASC   ",
    'lang'    => " ORDER BY images.language = ''  ,
                            images.language ASC   ,
                            images.path     ASC   ",
    'artist'  => " ORDER BY images.artist   ASC   ,
                            images.path     ASC   ",
    'tags'    => " ORDER BY COUNT(DISTINCT tags.id)
                                            DESC  ,
                            images.path     ASC   ",
    'cards'   => " ORDER BY ( COUNT(DISTINCT cards_en.id)
                            + COUNT(DISTINCT cards_fr.id) )
                                            DESC  ,
                            images.path     ASC   ",
    default   => " ORDER BY images.path     ASC   ",
  };

  // Get a list of all images in the database
  $qimages = query("  SELECT    images.id                   AS 'i_id'         ,
                                images.uuid                 AS 'i_uuid'       ,
                                images.path                 AS 'i_path'       ,
                                images.name                 AS 'i_name'       ,
                                images.language             AS 'i_lang'       ,
                                images.artist               AS 'i_artist'     ,
                                COUNT(DISTINCT cards_en.id) AS 'c_count_en'   ,
                                COUNT(DISTINCT cards_fr.id) AS 'c_count_fr'   ,
                                COUNT(DISTINCT tags.id)     AS 'it_count'     ,
                                GROUP_CONCAT(DISTINCT tags.uuid ORDER BY tags.name ASC SEPARATOR ', ')
                                                            AS 'it_uuids'     ,
                                GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name ASC SEPARATOR ', ')
                                                            AS 'it_names'     ,
                                GROUP_CONCAT(DISTINCT cards_en.uuid ORDER BY cards_en.name_en ASC SEPARATOR ', ')
                                                            AS 'c_uuids'      ,
                                GROUP_CONCAT(DISTINCT cards_en.name_en ORDER BY cards_en.name_en ASC SEPARATOR ', ')
                                                            AS 'c_names_en'   ,
                                GROUP_CONCAT(DISTINCT cards_en.name_fr ORDER BY cards_en.name_en ASC SEPARATOR ', ')
                                                            AS 'c_names_fren' ,
                                GROUP_CONCAT(DISTINCT cards_fr.name_en ORDER BY cards_fr.name_en ASC SEPARATOR ', ')
                                                            AS 'c_names_fr'
                      FROM      images
                      LEFT JOIN tags_images       ON tags_images.fk_images  = images.id
                      LEFT JOIN tags              ON tags.id                = tags_images.fk_tags
                      LEFT JOIN cards AS cards_en ON cards_en.fk_images_en  = images.id
                      LEFT JOIN cards AS cards_fr ON cards_fr.fk_images_fr  = images.id
                      $query_search
                      GROUP BY  images.id       ,
                                images.uuid     ,
                                images.path     ,
                                images.name     ,
                                images.language ,
                                images.artist
                      $query_having
                      $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($qimages); $i++)
  {
    // Prepare for display
    if($format === 'html')
    {
      $data[$i]['id']       = sanitize_output($row['i_id']);
      $data[$i]['path']     = './../'.sanitize_output($row['i_path']);
      $data[$i]['dpath']    = sanitize_output($row['i_path']);
      $data[$i]['spath']    = sanitize_output(mb_substr($row['i_path'], 4));
      $data[$i]['ppath']    = sanitize_output(string_truncate($row['i_path'], 25, '...'));
      $data[$i]['bpath']    = sanitize_output(basename($row['i_path']));
      $temp_thumb_path      = './../img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $row['i_path']);
      $data[$i]['thumb']    = sanitize_output($temp_thumb_path);
      $data[$i]['name']     = sanitize_output(string_truncate($row['i_name'], 20, '...'));
      $data[$i]['fname']    = sanitize_output($row['i_name']);
      $data[$i]['lang']     = sanitize_output($row['i_lang']);
      $data[$i]['blang']    = sanitize_output(string_change_case($row['i_lang'], 'uppercase'));
      $data[$i]['artist']   = sanitize_output(string_truncate($row['i_artist'], 20, '...'));
      $data[$i]['fartist']  = sanitize_output($row['i_artist']);
      $data[$i]['ncards']   = sanitize_output($row['c_count_en'] + $row['c_count_fr']);
      $data[$i]['cards']    = sanitize_output($row['c_names_en']);
      $data[$i]['cards']   .= ($row['c_names_en']) ? ", ".$row['c_names_fr'] : "".$row['c_names_fr'];
      $data[$i]['ntags']    = sanitize_output($row['it_count']);
      $data[$i]['tags']     = sanitize_output($row['it_names']);
    }

    // Prepare for the API
    if($format === 'api')
    {
      // Sanitize image data
      $data[$i]['uuid']     = sanitize_json($row['i_uuid']);
      $data[$i]['path']     = sanitize_json($GLOBALS['website_url'].$row['i_path']);
      $data[$i]['endpoint'] = sanitize_json($GLOBALS['website_url'].'api/image/'.$row['i_uuid']);
      $data[$i]['name']     = sanitize_json($row['i_name']);
      $data[$i]['language'] = sanitize_json($row['i_lang']);
      $data[$i]['artist']   = sanitize_json($row['i_artist']);

      // Cards
      $data[$i]['cards']['uuids']       = ($row['c_uuids']) ? explode(', ', $row['c_uuids']) : array();
      $data[$i]['cards']['names']['en'] = ($row['c_names_en']) ? explode(', ', $row['c_names_en']) : array();
      $data[$i]['cards']['names']['fr'] = ($row['c_names_fren']) ? explode(', ', $row['c_names_fren']) : array();

      // Tags
      $data[$i]['tags']['uuids']  = ($row['it_uuids']) ? explode(', ', $row['it_uuids']) : array();
      $data[$i]['tags']['names']  = ($row['it_names']) ? explode(', ', $row['it_names']) : array();
    }
  }

  // Add the number of rows to the data
  if($format === 'html')
    $data['rows'] = $i;

  // Prepare the data structure for the API
  if($format === 'api')
  {
    $data = (isset($data)) ? $data : NULL;
    $data = array('images' => $data);
  }

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
  $directories = array( 'arsenals/en' ,
                        'arsenals/fr' ,
                        'cards/en'    ,
                        'cards/fr'    ,
                        'extras/en'   ,
                        'extras/fr'   );

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
    $images_list[] = './../'.$dimages['i_path'];

  // Look for images that aren't in the database
  foreach($directories as $directory)
  {
    // Fetch the images in the directory
    if(is_dir('./../img/'.$directory))
      // Get the full path of the images
      $images_in_directory = scandir('./../img/'.$directory);
    else
      $images_in_directory = array();

    // Remove some files from the list
    foreach($files_to_remove as $file)
      if(in_array($file, $images_in_directory))
        unset($images_in_directory[array_search($file, $images_in_directory)]);

    // Add the images to the array if they aren't in the database
    foreach($images_in_directory as $image)
      if(!in_array('./../img/'.$directory.'/'.$image, $images_list))
        $missing_images[] = 'img/'.$directory.'/'.$image;

    // Use an empty array if the directory has no images
    if(!isset($missing_images))
      $missing_images = array();

    // Replace slashes in the image path with double pipes
    foreach($missing_images as $i => $image)
      $missing_images[$i] = str_replace('/', '||', $image);

    // Sort the list alphabetically
    sort($missing_images);
  }

  // Add the number of rows to the returned data
  $missing_images['rows'] = isset($missing_images) ? count($missing_images) : 0;

  // Return the images
  return $missing_images;
}




/**
 * Lists languages with which images are tagged.
 *
 * @return  array   An array containing the languages.
 */

function images_list_languages() : array
{
  // Fetch image languages
  $image_languages = query("  SELECT    images.language AS 'i_lang'
                              FROM      images
                              WHERE     images.language != ''
                              GROUP BY  images.language
                              ORDER BY  images.language ASC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($image_languages); $i++)
  {
    $data[$i]['lang']   = sanitize_output($row['i_lang']);
    $data[$i]['blang']  = sanitize_output(string_change_case($row['i_lang'], 'uppercase'));
  }

  // Add the number of rows to the returned data
  $data['rows'] = $i;

  // Return the prepared data
  return $data;
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

  // Sanatize image data
  $image_add_path   = sanitize($data['image_path'], 'string');
  $image_add_name   = sanitize_array_element($data, 'image_name', 'string');
  $image_add_lang   = sanitize_array_element($data, 'image_lang', 'string');
  $image_add_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Look for the image in the database
  $qimage = query(" SELECT  images.id AS 'i_id'
                    FROM    images
                    WHERE   images.path = '$image_add_path' ",
                    fetch_row: true);

  // Stop here if the image is already in the database
  if($qimage['i_id'])
    return;

  // Add the image to the database
  query(" INSERT INTO images
          SET         images.uuid     = UUID()              ,
                      images.path     = '$image_add_path'   ,
                      images.name     = '$image_add_name'   ,
                      images.language = '$image_add_lang' ,
                      images.artist   = '$image_add_artist' ");

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

  // Create the image's thumbnail
  images_generate_thumbnail($image_id);
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
  $image_lang   = sanitize_array_element($data, 'image_lang', 'string');
  $image_artist = sanitize_array_element($data, 'image_artist', 'string');

  // Stop here if the image does not exist
  if(!database_row_exists('images', $image_id))
    return;

  // Edit the image
  query(" UPDATE  images
          SET     images.name     = '$image_name'   ,
                  images.language = '$image_lang' ,
                  images.artist   = '$image_artist'
          WHERE   images.id       = '$image_id' ");

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




/**
 * Generates a thumbnail for an image
 *
 * @param   int   $image_id                 The id of the image which needs a thumbnail.
 * @param   int   $thumb_width  (OPTIONAL)  The thumbnail's desired width, in px (defaults to 250px).
 * @param   bool  $overwrite    (OPTIONAL)  Whether to overwrite any previously created thumbnail for this image.
 *
 * @return  void
 */

function images_generate_thumbnail( int   $image_id             ,
                                    int   $thumb_width  = 300   ,
                                    bool  $overwrite    = false ) : void
{
  // Sanitize the image's id
  $image_id = sanitize($image_id, 'int');

  // Stop here if the image doesn't exist
  if(!database_row_exists('images', $image_id))
    return;

  // Get the image's path
  $image_data = images_get($image_id);

  // Stop here if the image wasn't retrieved or if it has an empty path
  if(!isset($image_data['path']) || !$image_data['path'])
    return;

  // Determine the image's path and the thumbnail's path
  $root_path      = root_path();
  $image_path     = $root_path.$image_data['path'];
  $thumbnail_path = $root_path.'img/thumbnails'.preg_replace('/^[^\/]*\//', '/', $image_data['path']);

  // Stop here if the image does not exist
  if(!file_exists($image_path))
    return;

  // Stop here if the thumbnail has already been generated and overwrite is set to false
  if(file_exists($thumbnail_path) && !$overwrite)
    return;

  // Grab data on the image
  list($image_width, $image_height, $image_type) = getimagesize($image_path);

  // Calculate the thumbnail's height
  $thumb_height = floor($image_height * ($thumb_width / $image_width));

  // Create the thumbnail
  $thumbnail = imagecreatetruecolor($thumb_width, $thumb_height);

  // Create the source image, stop here if the image type isn't supported
  switch ($image_type)
  {
    case IMAGETYPE_JPEG:
        $source_image = imagecreatefromjpeg($image_path);
        break;
    case IMAGETYPE_PNG:
        $source_image = imagecreatefrompng($image_path);
        break;
    case IMAGETYPE_GIF:
        $source_image = imagecreatefromgif($image_path);
        break;
    default:
        return;
  }

  // Resize the image into its thumbnail
  imagecopyresampled($thumbnail, $source_image, 0, 0, 0, 0, $thumb_width, $thumb_height, $image_width, $image_height);

  // Save the thumbnail
  switch ($image_type)
  {
    case IMAGETYPE_JPEG:
        imagejpeg($thumbnail, $thumbnail_path, 100);
        break;
    case IMAGETYPE_PNG:
        imagepng($thumbnail, $thumbnail_path);
        break;
    case IMAGETYPE_GIF:
        imagegif($thumbnail, $thumbnail_path);
        break;
  }
}




/**
 * Regenerates thumbnails for all images
 *
 * @return void
 */

function images_regenerate_thumbnails() : void
{
  // Get a list of all images in the database
  $images = images_list();

  // Loop through the images and regenerate their thumbnails
  for($i = 0; $i < $images['rows']; $i++)
    images_generate_thumbnail(  image_id:   $images[$i]['id'] ,
                                overwrite:  true              );
}