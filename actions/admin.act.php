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