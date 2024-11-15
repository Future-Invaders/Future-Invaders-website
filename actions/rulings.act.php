<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../../404")); die(); }


/*********************************************************************************************************************/
/*                                                                                                                   */
/*  rulings_add                      Adds a ruling to the database                                                   */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Adds a ruling to the database.
 *
 * @param   array   $data  An array containing the ruling's data.
 *
 * @return  void
 */

function rulings_add( array $data ) : void
{
  // Sanitize the data
  $ruling_date          = sanitize($data['ruling_date'], 'string');
  $ruling_name          = sanitize($data['ruling_name'], 'string');
  $ruling_title_en      = sanitize_array_element($data, 'ruling_title_en', 'string');
  $ruling_title_fr      = sanitize_array_element($data, 'ruling_title_fr', 'string');
  $ruling_situation_en  = sanitize_array_element($data, 'ruling_situation_en', 'string');
  $ruling_situation_fr  = sanitize_array_element($data, 'ruling_situation_fr', 'string');
  $ruling_ruling_en     = sanitize_array_element($data, 'ruling_ruling_en', 'string');
  $ruling_ruling_fr     = sanitize_array_element($data, 'ruling_ruling_fr', 'string');

  // Format the name
  $ruling_name = preg_replace('/[^a-zA-Z0-9\-]/', '-', $ruling_name);
  $ruling_name = str_replace(' ', '-', $ruling_name);

  // Add the ruling to the database
  query(" INSERT INTO rulings
          SET         rulings.uuid           = UUID()                 ,
                      rulings.date_ruling    = '$ruling_date'         ,
                      rulings.name           = '$ruling_name'         ,
                      rulings.title_en       = '$ruling_title_en'     ,
                      rulings.title_fr       = '$ruling_title_fr'     ,
                      rulings.situation_en   = '$ruling_situation_en' ,
                      rulings.situation_fr   = '$ruling_situation_fr' ,
                      rulings.ruling_en      = '$ruling_ruling_en'    ,
                      rulings.ruling_fr      = '$ruling_ruling_fr'    ");
}