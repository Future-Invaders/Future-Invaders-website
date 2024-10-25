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
/*  admin_page_stats_list               Returns page stats for the website                                           */
/*  admin_page_stats_delete             Deletes a page stats entry                                                   */
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
                    FROM      notes",
                    fetch_row: true);

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
 * Returns page stats for the website.
 *
 * @return  array   An array containing page stats.
 */

function admin_page_stats_list() : array
{
  // Get the user's current language
  $lang = string_change_case(user_get_language(), 'lowercase');

  // Fetch the stats
  $stats = query("  SELECT    stats_pages.id              AS 'p_id'       ,
                              stats_pages.page_path       AS 'p_path'     ,
                              stats_pages.page_name_en    AS 'p_name_en'  ,
                              stats_pages.page_name_fr    AS 'p_name_fr'  ,
                              stats_pages.page_name_$lang AS 'p_name'     ,
                              stats_pages.last_viewed_at  AS 'p_last'     ,
                              stats_pages.view_count      AS 'p_views'    ,
                              stats_pages.query_count     AS 'p_queries'  ,
                              stats_pages.load_time       AS 'p_load'
                    FROM      stats_pages
                    ORDER BY  stats_pages.view_count      DESC  ,
                              stats_pages.last_viewed_at  DESC  ,
                              stats_pages.page_path       ASC   ");

  // Prepare the data
  for($i = 0; $row = query_row($stats); $i++)
  {
    $data[$i]['id']       = sanitize_output($row['p_id']);
    $data[$i]['path']     = sanitize_output(string_truncate($row['p_path'], 25, '...'));
    $data[$i]['fpath']    = sanitize_output($row['p_path']);
    $data[$i]['name']     = sanitize_output(string_truncate($row['p_name'], 25, '...'));
    $data[$i]['name_en']  = sanitize_output($row['p_name_en']);
    $data[$i]['name_fr']  = sanitize_output($row['p_name_fr']);
    $data[$i]['last']     = sanitize_output(time_since($row['p_last']));
    $data[$i]['views']    = sanitize_output($row['p_views']);
    $data[$i]['queries']  = sanitize_output($row['p_queries']);
    $data[$i]['load']     = sanitize_output($row['p_load'].' ms');
  }

  // Add the number of rows to the data
  $data['rows'] = $i;

  // Return the data
  return $data;
}




/**
 * Deletes a page stats entry.
 *
 * @param   int     $page_stats  The id of the page stats entry to delete.
 *
 * @return  void
 */

function admin_page_stats_delete( int $page_stats ) : void
{
  // Sanitize the data
  $page_stats = sanitize($page_stats, 'int');

  // Delete the page stats entry
  query(" DELETE FROM stats_pages
          WHERE       stats_pages.id = '$page_stats' ");
}