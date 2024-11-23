<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  updates_list                     Returns a list of all updates                                                   */
/*  updates_add                      Adds an update to the database                                                  */
/*                                                                                                                   */
/*  updates_generate_slug            Generates a unique slug identifier for an update                                */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Returns a list of all updates.
 *
 * @return  array   An array containing the updates.
 */

function updates_list() : array
{
  // Get the user's language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the updates
  $updates = query("  SELECT    updates.id          AS 'u_id'       ,
                                updates.date        AS 'u_date'     ,
                                updates.slug        AS 'u_slug'     ,
                                updates.title_en    AS 'u_title_en' ,
                                updates.title_fr    AS 'u_title_fr' ,
                                updates.title_$lang AS 'u_title'
                      FROM      updates
                      ORDER BY  updates.date DESC ");

  // Prepare the data for display
  for($i = 0; $row = query_row($updates); $i++)
  {
    $data[$i]['id']           = sanitize_output($row['u_id']);
    $data[$i]['date']         = sanitize_output(date_to_text($row['u_date'], strip_day: 1));
    $data[$i]['date_since']   = sanitize_output(time_since(strtotime($row['u_date'])));
    $data[$i]['slug']         = sanitize_output($row['u_slug']);
    $data[$i]['title_en']     = sanitize_output($row['u_title_en']);
    $data[$i]['title_fr']     = sanitize_output($row['u_title_fr']);
    $data[$i]['title']        = sanitize_output(string_truncate($row['u_title'], 40, '...'));
  }

  // Add the number of rows to the returned data
  $data['rows'] = $i;

  // Return the prepared data
  return $data;
}




/**
 * Adds an update to the database.
 *
 * @param   array   $data  An array containing the update's data.
 *
 * @return  void
 */

function updates_add( array $data ) : void
{
  // Sanitize the data
  $date     = sanitize(date('Y-m-d'), 'string');
  $title_en = sanitize_array_element($data, 'title_en', 'string');
  $title_fr = sanitize_array_element($data, 'title_fr', 'string');
  $body_en  = sanitize_array_element($data, 'body_en', 'string');
  $body_fr  = sanitize_array_element($data, 'body_fr', 'string');

  // Add the update to the database
  query(" INSERT INTO updates
          SET         updates.uuid      = UUID()      ,
                      updates.date      = '$date'     ,
                      updates.title_en  = '$title_en' ,
                      updates.title_fr  = '$title_fr' ,
                      updates.body_en   = '$body_en'  ,
                      updates.body_fr   = '$body_fr'  ");

  // Get the newly created update's id
  $update_id = sanitize(query_id(), "int");

  // Generate a slug for the update
  updates_generate_slug($update_id);
}




/**
 * Generates a unique slug identifier for an update.
 *
 * @param   string  $update_id  The id of the update.
 *
 * @return  void
 */

function updates_generate_slug( string $update_id ) : void
{
  // Sanitize the update's id
  $update_id = sanitize($update_id, 'int');

  // Make sure the update exists
  if(!database_row_exists('updates', $update_id))
    return;

  // Grab the update's title
  $update_data = query("  SELECT    updates.title_en AS 'u_title_en'
                          FROM      updates
                          WHERE     updates.id = '$update_id' ",
                          fetch_row: true);

  // Assemble a tentative slug
  $title      = ($update_data['u_title_en'])
              ? preg_replace("/[^a-zA-Z0-9]/", "", $update_data['u_title_en'])
              : $update_id;
  $slug_title = string_truncate(string_change_case($title, 'lowercase'), 39);
  $slug       = $slug_title;

  // Increment the slug until it's unique
  while(database_entry_exists('updates', 'slug', $slug))
    $slug = string_increment($slug);

  // Sanitize the slug
  $slug = sanitize($slug, 'string');

  // Update the slug in the database
  query(" UPDATE  updates
          SET     updates.slug = '$slug'
          WHERE   updates.id   = '$update_id' ");
}