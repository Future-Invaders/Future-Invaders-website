<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  admin_notes_get                     Returns admin notes                                                          */
/*  admin_notes_update                  Updates admin notes                                                          */
/*                                                                                                                   */
/*  admin_images_get                    Returns data related to an image                                             */
/*  admin_images_list                   Lists images in the database                                                 */
/*  admin_images_list_directories       Lists directories which should be scanned for images                         */
/*  admin_images_list_uncategorized     Lists images waiting to be added to the database                             */
/*  admin_images_add                    Adds an image to the database                                                */
/*  admin_images_edit                   Edits an image in the database                                               */
/*  admin_images_delete                 Deletes an image from the database                                           */
/*                                                                                                                   */
/*  admin_releases_list                 Lists releases in the database                                               */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns admin notes.
 *
 * @return  array   An array containing admin notes.
 */

function admin_notes_get() : array
{
  // Fetch the notes
  $notes = query("  SELECT    notes.tasks  AS 'n_tasks'  ,
                              notes.ideas  AS 'n_ideas'  ,
                              notes.lore   AS 'n_lore'
                    FROM      notes
                    ORDER BY  notes.id DESC  ", fetch_row: true);

  // Prepare the data
  $data['tasks']  = sanitize_output($notes['n_tasks']);
  $data['ideas']  = sanitize_output($notes['n_ideas']);
  $data['lore']   = sanitize_output($notes['n_lore']);

  // Return the data
  return $data;
}




/**
 * Updates admin notes.
 *
 * @param   string  $tasks   Tasks.
 * @param   string  $ideas   Future ideas.
 * @param   string  $lore    Future lore.
 *
 * @return  void
 */

function admin_notes_update(  $tasks  = ''  ,
                              $ideas  = ''  ,
                              $lore   = ''  ) : void
{
  // Sanitize the data
  $tasks  = sanitize($tasks, 'string');
  $ideas  = sanitize($ideas, 'string');
  $lore   = sanitize($lore, 'string');

  // Update the notes
  query(" UPDATE  notes
          SET     notes.tasks  = '$tasks'  ,
                  notes.ideas  = '$ideas'  ,
                  notes.lore   = '$lore'   ");
}




/**
 * Returns data related to an image.
 *
 * @param   int         $image_id   The id of the image.
 *
 * @return  array|null              An array containing the image's data, or null if the image does not exist.
 */

function admin_images_get( int $image_id ) : array|null
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

function admin_images_list( string  $sort_by  = 'path'  ,
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

  // Return the prepare data
  return $data;
}



/**
 * Lists directories which should be scanned for images.
 *
 * @return  array   An array containing the directories.
 */

function admin_images_list_directories() : array
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

function admin_images_list_uncategorized() : array
{
  // Decide in which directories to look for images
  $directories = admin_images_list_directories();

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

function admin_images_add( array $data ) : void
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
  $directories = admin_images_list_directories();
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
          SET         images.path   = '$image_add_path'   ,
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

function admin_images_edit( int   $image_id ,
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

function admin_images_delete( int $image_id ) : void
{
  // Sanitize the data
  $image_id = sanitize($image_id, 'int');

  // Delete the image from the database
  query(" DELETE FROM images
          WHERE   images.id = '$image_id' ");
}




/**
 * Lists releases in the database.
 *
 * @param   string  $sort_by  (OPTIONAL)  The column which should be used to sort the data.
 * @param   array   $search   (OPTIONAL)  An array containing the search data.
 *
 * @return  array   An array containing the releases.
 */

function admin_releases_list( string  $sort_by  = 'path'  ,
                              array   $search   = array() ) : array
{
  // Sanatize the search data
  $search_date  = sanitize_array_element($search, 'date', 'string');
  $search_name  = sanitize_array_element($search, 'name', 'string');
  $search_lang  = string_change_case(user_get_language(), 'lowercase');

  // Search through the data
  $query_search  =  ($search_date)  ? " WHERE releases.release_date       LIKE '%$search_date%' " : " WHERE 1 = 1 ";
  $query_search .=  ($search_name)  ? " AND   releases.name_$search_lang  LIKE '%$search_name%' " : "";

  // Sort the data
  $query_sort = match($sort_by)
  {
    'name'          => " ORDER BY releases.name_$search_lang ASC  ,
                                  releases.release_date DESC      ",
    'date_reverse'  => " ORDER BY releases.release_date ASC       ",
    default         => " ORDER BY releases.release_date DESC      ",
  };

  // Get a list of all releases in the database
  $qreleases = query("  SELECT  releases.id           AS 'r_id'       ,
                                releases.name_en      AS 'r_name_en'  ,
                                releases.name_fr      AS 'r_name_fr'  ,
                                releases.release_date AS 'r_date'
                        FROM    releases
                        $query_search
                        $query_sort ");

  // Prepare the data for display
  for($i = 0; $row = query_row($qreleases); $i++)
  {
    $data[$i]['id']       = sanitize_output($row['r_id']);
    $data[$i]['name_en']  = sanitize_output($row['r_name_en']);
    $data[$i]['name_fr']  = sanitize_output($row['r_name_fr']);
    $data[$i]['name']     = sanitize_output($row['r_name_'.$search_lang]);
    $data[$i]['date']     = sanitize_output($row['r_date']);
  }

  // Add the number of rows to the data
  $data['rows'] = $i;

  // Return the prepare data
  return $data;
}