<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  tags_get                        Returns data related to a tag                                                    */
/*  tags_list                       Lists tags in the database                                                       */
/*  tags_list_types                 Lists tag types in the database                                                  */
/*  tags_add                        Adds a tag to the database                                                       */
/*  tags_edit                       Edits a tag in the database                                                      */
/*  tags_delete                     Deletes a tag from the database                                                  */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns data related to a tag.
 *
 * @param   int         $tag_id   (OPTIONAL)  The id of the tag.
 * @param   string      $tag_uuid (OPTIONAL)  The uuid of the tag.
 * @param   string      $tag_name (OPTIONAL)  The name of the tag.
 * @param   string      $format   (OPTIONAL)  Formatting to use for the returned data ('html', 'api').
 * @param   bool        $no_depth (OPTIONAL)  Whether to include elements linked to the tag.
 *
 * @return  array|null            An array containing the tag's data, or null if the tag does not exist.
 */

function tags_get(  ?int    $tag_id   = NULL    ,
                    ?string $tag_uuid = NULL    ,
                    ?string $tag_name = NULL    ,
                    string  $format   = 'html'  ,
                    bool    $no_depth = false   ) : array|null
{
  // Return null if there are neither an id, an uuid, nor a name
  if(!$tag_id && !$tag_uuid && !$tag_name)
    return null;

  // Sanitize the tag's id, uuid, and name
  $tag_id   = sanitize($tag_id, 'int');
  $tag_uuid = sanitize($tag_uuid, 'string');
  $tag_name = sanitize($tag_name, 'string');

  // Return null if the tag does not have a valid ID
  if($tag_id && !database_row_exists('tags', $tag_id))
    return null;

  // Return null if the tag does not have a valid UUID
  if($tag_uuid && !database_entry_exists('tags', 'uuid', $tag_uuid))
    return null;

  // Return null if the tag does not have a valid name
  if($tag_name && !database_entry_exists('tags', 'name', $tag_name))
    return null;

  // Prepare the condition for retrieving the tag
  if($tag_id)
    $query_where = " WHERE tags.id = '$tag_id' ";
  else if($tag_uuid)
    $query_where = " WHERE tags.uuid = '$tag_uuid' ";
  else if($tag_name)
    $query_where = " WHERE tags.name = '$tag_name' ";

  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the tag's data
  $tag_data = query(" SELECT    tags.id                 AS 't_id'       ,
                                tags.uuid               AS 't_uuid'     ,
                                tags.name               AS 't_name'     ,
                                tags.description_en     AS 't_desc_en'  ,
                                tags.description_fr     AS 't_desc_fr'  ,
                                tags.description_$lang  AS 't_desc'     ,
                                tag_types.name          AS 'tt_name'
                      FROM      tags
                      LEFT JOIN tag_types ON tags.fk_tag_types = tag_types.id
                      $query_where ",
                      fetch_row: true);

  // Sanitize the tag's id
  $tag_id = sanitize($tag_data['t_id'], 'int');

  // Fetch linked images
  $qimages = query("  SELECT    images.uuid           AS 'i_uuid' ,
                                images.path           AS 'i_path' ,
                                tags_images.fk_images AS 'ti_id'
                      FROM      tags_images
                      LEFT JOIN images ON images.id = tags_images.fk_images
                      WHERE     tags_images.fk_tags = '$tag_id' ");

  // Fetch linked cards
  $qcards = query(" SELECT    cards.uuid          AS 'c_uuid'     ,
                              cards.name_en       AS 'c_name_en'  ,
                              cards.name_fr       AS 'c_name_fr'  ,
                              cards.slug          AS 'c_slug'     ,
                              tags_cards.fk_cards AS 'tc_id'
                    FROM      tags_cards
                    LEFT JOIN cards ON tags_cards.fk_cards = cards.id
                    WHERE     tags_cards.fk_tags  = '$tag_id'
                    AND       cards.is_hidden     = '0'
                    AND       cards.is_extra_card = '0' ");

  // Fetch linked arsenals
  $qarsenals = query("  SELECT    arsenals.uuid             AS 'a_uuid'     ,
                                  arsenals.name_en          AS 'a_name_en'  ,
                                  arsenals.name_fr          AS 'a_name_fr'  ,
                                  arsenals.slug             AS 'a_slug'     ,
                                  tags_arsenals.fk_arsenals AS 'ta_id'
                        FROM      tags_arsenals
                        LEFT JOIN arsenals ON tags_arsenals.fk_arsenals = arsenals.id
                        WHERE     tags_arsenals.fk_tags  = '$tag_id'
                        AND       arsenals.is_hidden     = '0' ");

  // Prepare the data for display
  if($format === 'html')
  {
    $data['id']       = sanitize_output($tag_data['t_id']);
    $data['name']     = sanitize_output($tag_data['t_name']);
    $data['desc_en']  = sanitize_output($tag_data['t_desc_en']);
    $data['desc_fr']  = sanitize_output($tag_data['t_desc_fr']);
    $data['desc']     = sanitize_output($tag_data['t_desc']);
  }

  // Prepare the data for the API
  if($format === 'api')
  {
    // Sanitize tag data
    $data['uuid']               = sanitize_json($tag_data['t_uuid']);
    $data['type']               = sanitize_json($tag_data['tt_name']);
    $data['name']               = sanitize_json($tag_data['t_name']);
    $data['description']['en']  = sanitize_json($tag_data['t_desc_en']);
    $data['description']['fr']  = sanitize_json($tag_data['t_desc_fr']);

    // Cards
    if(!$no_depth)
    {
      for($i = 0; $dcards = query_row($qcards); $i++)
      {
        $data['tagged_cards'][$i]['uuid']       = sanitize_json($dcards['c_uuid']);
        $data['tagged_cards'][$i]['name']['en'] = sanitize_json($dcards['c_name_en']);
        $data['tagged_cards'][$i]['name']['fr'] = sanitize_json($dcards['c_name_fr']);
        $data['tagged_cards'][$i]['endpoint']   = sanitize_json($GLOBALS['website_url']
                                                  .'api/card/'.$dcards['c_uuid']);
        $data['tagged_cards'][$i]['url']        = sanitize_json($GLOBALS['website_url']
                                                  .'card/'.$dcards['c_slug']);
      }
      if($i === 0)
        $data['tagged_cards']                   = array();
    }

    // Arsenals
    if(!$no_depth)
    {
      for($i = 0; $darsenals = query_row($qarsenals); $i++)
      {
        $data['tagged_arsenals'][$i]['uuid']        = sanitize_json($darsenals['a_uuid']);
        $data['tagged_arsenals'][$i]['name']['en']  = sanitize_json($darsenals['a_name_en']);
        $data['tagged_arsenals'][$i]['name']['fr']  = sanitize_json($darsenals['a_name_fr']);
        $data['tagged_arsenals'][$i]['endpoint']    = sanitize_json($GLOBALS['website_url']
                                                    .'api/arsenal/'.$darsenals['a_uuid']);
        $data['tagged_arsenals'][$i]['url']         = sanitize_json($GLOBALS['website_url']
                                                    .'arsenal/'.$darsenals['a_slug']);
      }
      if($i === 0)
        $data['tagged_arsenals']                    = array();
    }

    // Images
    if(!$no_depth)
    {
      for($i = 0; $dimages = query_row($qimages); $i++)
      {
        $data['tagged_images'][$i]['uuid']      = sanitize_json($dimages['i_uuid']);
        $data['tagged_images'][$i]['endpoint']  = sanitize_json($GLOBALS['website_url']
                                                .'api/image/'.$dimages['i_uuid']);
        $data['tagged_images'][$i]['path']      = sanitize_json($GLOBALS['website_url'].$dimages['i_path']);
      }
      if($i === 0)
        $data['tagged_images']                  = array();
    }

    // Prepare for the API
    $data = (isset($data)) ? $data : NULL;
    $data = array('tag' => $data);
  }

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
  $search_type    = sanitize_array_element($search, 'type', 'int');
  $search_ftype   = sanitize_array_element($search, 'ftype', 'string');
  $search_name    = sanitize_array_element($search, 'name', 'string');
  $search_desc    = sanitize_array_element($search, 'desc', 'string');
  $search_image   = sanitize_array_element($search, 'image_id', 'int');
  $search_card    = sanitize_array_element($search, 'card_id', 'int');
  $search_arsenal = sanitize_array_element($search, 'arsenal_id', 'int');

  // Search through the data
  $query_search  =  ($search_type)    ? " WHERE tags.fk_tag_types   =    '$search_type' "     : " WHERE 1 = 1 ";
  $query_search .=  ($search_ftype)   ? " AND   tag_types.name      LIKE '$search_ftype' "    : "";
  $query_search .=  ($search_name)    ? " AND   tags.name           LIKE '%$search_name%' "   : "";
  $query_search .=  ($search_desc)    ? " AND ( tags.description_en LIKE '%$search_desc%'
                                          OR    tags.description_fr LIKE '%$search_desc%' ) " : "";

  // Search for tagged images
  $query_images  = ($search_image)    ? " LEFT JOIN tags_images ON tags_images.fk_tags = tags.id "      : "";
  $query_search .= ($search_image)    ? " AND tags_images.fk_images     = '$search_image' "             : "";

  // Search for tagged cards
  $query_cards    = ($search_card)    ? " LEFT JOIN tags_cards ON tags_cards.fk_tags = tags.id "        : "";
  $query_search  .= ($search_card)    ? " AND tags_cards.fk_cards       = '$search_card' "              : "";

  // Search for tagged arsenals
  $query_arsenals = ($search_arsenal) ? " LEFT JOIN tags_arsenals ON tags_arsenals.fk_tags = tags.id "  : "";
  $query_search  .= ($search_arsenal) ? " AND tags_arsenals.fk_arsenals = '$search_arsenal' "           : "";

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
                    $query_images
                    $query_cards
                    $query_arsenals
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
      $data[$i]['id']       = sanitize_output($row['t_id']);
      $data[$i]['name']     = sanitize_output(string_truncate($row['t_name'], 25, '...'));
      $data[$i]['fname']    = sanitize_output($row['t_name']);
      $data[$i]['type']     = sanitize_output($row['tt_type']);
      $data[$i]['desc']     = sanitize_output(string_truncate($row['t_desc_'.$lang], 50, '...'));
      $data[$i]['desc_en']  = sanitize_output($row['t_desc_en']);
      $data[$i]['desc_fr']  = sanitize_output($row['t_desc_fr']);
      $data[$i]['fdesc']    = sanitize_output($row['t_desc_'.$lang], preserve_line_breaks: true);

      // Count tag types
      $data['type_count'][$row['tt_id']]++;
    }

    // Prepare for the API
    if($format === 'api')
    {
      $data[$i]['uuid']               = sanitize_json($row['t_uuid']);
      $data[$i]['type']               = sanitize_json($row['tt_type']);
      $data[$i]['name']               = sanitize_json($row['t_name']);
      $data[$i]['description']['en']  = sanitize_json($row['t_desc_en']);
      $data[$i]['description']['fr']  = sanitize_json($row['t_desc_fr']);
      $data[$i]['endpoint']           = sanitize_json($GLOBALS['website_url'].'api/tag/'.$row['t_uuid']);
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