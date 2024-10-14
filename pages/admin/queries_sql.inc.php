<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../404")); die(); }

// Include pages that are required to make MySQL queries
include_once './../../inc/settings.inc.php';     # General settings
include_once './../../inc/sql.inc.php';          # MySQL connection
include_once './../../inc/sanitization.inc.php'; # Data sanitization

// If there is no table for settings, then create it
$settings_exists = 0;
$qtablelist = query(" SHOW TABLES ");

// Check if the settings table exists
while($dtablelist = query_row($qtablelist, return_format: 'both'))
  $settings_exists = ($dtablelist[0] === 'settings') ? 1 : $settings_exists;

// Create the settings table if it doesn't exist
if(!$settings_exists)
{
  sql_create_table('settings');
  sql_create_field('settings', 'latest_query_id', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  query(" INSERT INTO settings SET latest_query_id = 0 ");
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                       FUNCTIONS USED FOR STRUCTURAL QUERIES                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/
/*     These functions allow for "safe" manipulation of the database, and should only be used within this file.      */
/*********************************************************************************************************************/
/*                                                                                                                   */
/*  sql_check_query_id        Checks whether a query should be ran or not.                                           */
/*  sql_update_query_id       Updates the ID of the last query that was ran.                                         */
/*                                                                                                                   */
/*  sql_create_table          Creates a new table.                                                                   */
/*  sql_rename_table          Renames an existing table.                                                             */
/*  sql_empty_table           Gets rid of all the data in an existing table.                                         */
/*  sql_delete_table          Deletes an existing table.                                                             */
/*                                                                                                                   */
/*  sql_create_field          Creates a new field in an existing table.                                              */
/*  sql_rename_field          Renames an existing field in an existing table.                                        */
/*  sql_change_field_type     Changes the type of an existing field in an existing table.                            */
/*  sql_move_field            Moves an existing field in an existing table.                                          */
/*  sql_delete_field          Deletes an existing field in an existing table.                                        */
/*                                                                                                                   */
/*  sql_create_index          Creates an index in an existing table.                                                 */
/*  sql_delete_index          Deletes an existing index in an existing table.                                        */
/*                                                                                                                   */
/*  sql_insert_value          Inserts a value in an existing table.                                                  */
/*                                                                                                                   */
/*  sql_sanitize_data         Sanitizes data for MySQL queries.                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Checks whether a query should be ran or not.
 *
 * @return  int|null  Returns null if the query should be ran, otherwise return the id of the latest query that ran.
 */

function sql_check_query_id() : mixed
{
  // Fetch the id of the last query that was ran
  $last_query = query(" SELECT    settings.latest_query_id AS 'latest_query_id'
                        FROM      settings
                        ORDER BY  settings.latest_query_id DESC
                        LIMIT     1 ",
                        fetch_row: true);

  // Return that id
  return $last_query['latest_query_id'];
}




/**
 * Updates the ID of the last query that was ran.
 *
 * @param   int   $id   ID of the query.
 *
 * @return  void
 */

function sql_update_query_id( int $id ) : void
{
  // Data sanitization
  $id = intval($id);

  // Update the id in the database
  query(" UPDATE  settings
          SET     settings.latest_query_id = $id ");
}




/**
 * Creates a new table.
 *
 * The table will only contain one field, called "id", an auto incremented primary key.
 *
 * @param   string  $table_name   The name of the table to create.
 *
 * @return  void
 */

function sql_create_table( string $table_name ) : void
{
  // Create the table
  query(" CREATE TABLE IF NOT EXISTS ".$table_name." ( id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ) ENGINE=MyISAM;");
}




/**
 * Renames an existing table.
 *
 * @param   string  $table_name   The old name of the table.
 * @param   string  $new_name     The new name of the table.
 *
 * @return  void
 */

function sql_rename_table(  string  $table_name ,
                            string  $new_name   ) : void
{
  // Proceed only if the table exists and the new table name is not taken
  $query_old_ok = 0;
  $query_new_ok = 1;
  $qtablelist   = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
  {
    $query_old_ok = ($dtablelist[0] === $table_name) ? 1 : $query_old_ok;
    $query_new_ok = ($dtablelist[0] === $new_name)   ? 0 : $query_new_ok;
  }
  if(!$query_old_ok || !$query_new_ok)
    return;

  // Rename the table
  query(" ALTER TABLE $table_name RENAME $new_name ");
}




/**
 * Gets rid of all the data in an existing table.
 *
 * @param   string  $table_name   The table's name.
 *
 * @return  void
 */

function sql_empty_table( string $table_name ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Purge the table's contents
  query(" TRUNCATE TABLE ".$table_name);
}




/**
 * Deletes an existing table.
 *
 * @param   string  $table_name   The table's name.
 *
 * @return  void
 */

function sql_delete_table( string $table_name ) : void
{
  // Delete the table
  query(" DROP TABLE IF EXISTS ".$table_name);
}




/**
 * Creates a new field in an existing table.
 *
 * @param   string  $table_name         The existing table's name.
 * @param   string  $field_name         The new field's name.
 * @param   string  $field_type         The new field's MySQL type.
 * @param   string  $after_field_name   The name of the field that is located before the emplacement of the new one.
 *
 * @return  void
 */

function sql_create_field(  string  $table_name       ,
                            string  $field_name       ,
                            string  $field_type       ,
                            string  $after_field_name ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Fetch the table's structure
  $qdescribe = query(" DESCRIBE ".$table_name);

  // Proceed only if the preceeding field exists
  $query_ok = 0;
  while($ddescribe = query_row($qdescribe, 'both'))
    $query_ok = ($ddescribe['Field'] === $after_field_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Fetch the table's structure yet again
  $qdescribe = query(" DESCRIBE ".$table_name);

  // Proceed only if the field doesn't already exist
  $query_ko = 0;
  while($ddescribe = query_row($qdescribe, 'both'))
    $query_ko = ($ddescribe['Field'] === $field_name) ? 1 : $query_ko;
  if($query_ko)
    return;

  // Run the query
  query(" ALTER TABLE ".$table_name." ADD ".$field_name." ".$field_type." AFTER ".$after_field_name);
}




/**
 * Renames an existing field in an existing table.
 *
 * @param   string  $table_name       The existing table's name.
 * @param   string  $old_field_name   The field's old name.
 * @param   string  $new_field_name   The field's new name.
 * @param   string  $field_type       The MySQL type of the field.
 *
 * @return  void
 */

function sql_rename_field(  string  $table_name     ,
                            string  $old_field_name ,
                            string  $new_field_name ,
                            string  $field_type     ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Fetch the table's structure
  $qdescribe = query(" DESCRIBE ".$table_name);

  // Continue only if the new field name doesn't exist
  while($ddescribe = query_row($qdescribe, 'both'))
  {
    if ($ddescribe['Field'] === $new_field_name)
      return;
  }

  // Fetch the table's structure yet again
  $qdescribe = query(" DESCRIBE ".$table_name);

  // If the field exists in the table, rename it
  while($ddescribe = query_row($qdescribe, 'both'))
  {
    if($ddescribe['Field'] === $old_field_name)
      query(" ALTER TABLE ".$table_name." CHANGE ".$old_field_name." ".$new_field_name." ".$field_type);
  }
}




/**
 * Changes the type of an existing field in an existing table.
 *
 * @param   string  $table_name   The existing table's name.
 * @param   string  $field_name   The existing field's name.
 * @param   string  $field_type   The MySQL type to give the field.
 *
 * @return  void
 */

function sql_change_field_type( string  $table_name ,
                                string  $field_name ,
                                string  $field_type ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Fetch the table's structure
  $qdescribe = query(" DESCRIBE ".$table_name);

  // If the field exists in the table, rename it
  while($ddescribe = query_row($qdescribe, 'both'))
  {
    if($ddescribe['Field'] === $field_name)
      query(" ALTER TABLE ".$table_name." MODIFY ".$field_name." ".$field_type);
  }
}




/**
 * Moves an existing field in an existing table.
 *
 * @param   string  $table_name         The existing table's name.
 * @param   string  $field_name         The existing field's name.
 * @param   string  $field_type         The MySQL type of the field.
 * @param   string  $after_field_name   The name of the field that is located before the emplacement of the new one.
 *
 * @return  void
 */

function sql_move_field(  string  $table_name       ,
                          string  $field_name       ,
                          string  $field_type       ,
                          string  $after_field_name ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Fetch the table's structure
  $qdescribe = query(" DESCRIBE ".$table_name);

  // Continue only if both of the field names actually exist
  $field_ok       = 0;
  $field_after_ok = 0;
  while($ddescribe = query_row($qdescribe, 'both'))
  {
    $field_ok       = ($ddescribe['Field'] === $field_name)        ? 1 : $field_ok;
    $field_after_ok = ($ddescribe['Field'] === $after_field_name)  ? 1 : $field_after_ok;
  }
  if(!$field_ok || !$field_after_ok)
    return;

  // Move the field
  query(" ALTER TABLE ".$table_name." MODIFY COLUMN ".$field_name." ".$field_type." AFTER ".$after_field_name);
}




/**
 * Deletes an existing field in an existing table.
 *
 * @param   string  $table_name   The existing table's name.
 * @param   string  $field_name   The existing field's name
 *
 * @return  void
 */

function sql_delete_field(  string  $table_name ,
                            string  $field_name ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Fetch the table's structure
  $qdescribe = query(" DESCRIBE ".$table_name);

  // If the field exists in the table, delete it
  while($ddescribe = query_row($qdescribe, 'both'))
  {
    if($ddescribe['Field'] === $field_name)
      query(" ALTER TABLE ".$table_name." DROP ".$field_name);
  }
}




/**
 * Creates an index in an existing table.
 *
 * @param   string  $table_name               The name of the existing table.
 * @param   string  $index_name               The name of the index that will be created.
 * @param   string  $field_names              One or more fields to be indexed (eg. "my_field, other_field").
 * @param   bool    $fulltext     (OPTIONAL)  If set, the index will be created as fulltext.
 *
 * @return  void
 */

function sql_create_index(  string  $table_name           ,
                            string  $index_name           ,
                            string  $field_names          ,
                            bool    $fulltext     = false )
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Check whether the index already exists
  $qindex = query(" SHOW INDEX FROM ".$table_name." WHERE key_name LIKE '".$index_name."' ");

  // If it does not exist yet, then can create it and run a check to populate the table's indexes
  if(!query_row_count($qindex))
  {
    $query_fulltext = ($fulltext) ? ' FULLTEXT ' : '';
    query(" ALTER TABLE ".$table_name."
            ADD ".$query_fulltext." INDEX ".$index_name." (".$field_names."); ");
    query(" CHECK TABLE ".$table_name." ");
  }
}




/**
 * Deletes an existing index in an existing table.
 *
 * @param   string  $table_name   The existing table's name.
 * @param   string  $index_name   The existing index's name.
 *
 * @return  void
 */

function sql_delete_index(  string  $table_name ,
                            string  $index_name ) : void
{
  // Proceed only if the table exists
  $query_ok   = 0;
  $qtablelist = query(" SHOW TABLES ");
  while($dtablelist = query_row($qtablelist, 'both'))
    $query_ok = ($dtablelist[0] === $table_name) ? 1 : $query_ok;
  if(!$query_ok)
    return;

  // Check whether the index already exists
  $qindex = query(" SHOW INDEX FROM ".$table_name." WHERE key_name LIKE '".$index_name."' ");

  // If it exists, delete it and run a check to depopulate the index
  if(query_row_count($qindex))
  {
    query(" ALTER TABLE ".$table_name."
            DROP INDEX ".$index_name );
    query(" CHECK TABLE ".$table_name." ");
  }
}




/**
 * Inserts a value in an existing table.
 *
 * The only way to clarify the way this function works is with a concrete example, so here you go:
 * sql_insert_value(" SELECT my_string, my_int FROM my_table WHERE my_string LIKE 'test' AND my_int = 1 ",
 * " INSERT INTO my_table SET my_string = 'test' , my_int = 1 ");
 *
 * @param   string  $condition  A condition that must be matched before the query is ran.
 * @param   string  $query      The query to be ran to insert the value.
 *
 * @return  void
 */

function sql_insert_value(  string  $condition  ,
                            string  $query      ) : void
{
  // If the condition is met, run the query
  if(!query_row_count(query($condition)))
    query($query);
}




/**
 * Sanitizes data for MySQL queries.
 *
 * @param   mixed  $data  The data to sanitize.
 *
 * @return  mixed         The sanitized data
 */

function sql_sanitize_data( mixed $data ) : mixed
{
  // Sanitize the data using the currently open MySQL connection
  return trim(mysqli_real_escape_string($GLOBALS['db'], $data));
}




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                   QUERY HISTORY                                                   */
/*                                                                                                                   */
/*********************************************************************************************************************/
/*                                                                                                                   */
/*                               Allows replaying of queries that haven't been run yet                               */
/*                    in order to ensure a version upgrade between any two versions goes smoothly                    */
/*                                                                                                                   */
/*                               Older queries are archived in /dev/queries.archive.php                              */
/*                                                                                                                   */
/*********************************************************************************************************************/
// Those queries are treated like data migrations and will only be ran once, hence the storing of the last query id

// Fetch the id of the last query that was run
$last_query = sql_check_query_id();




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                       4.5.x                                                       */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Admin notes

if($last_query < 1)
{
  sql_create_table('notes');
  sql_create_field('notes', 'tasks', 'LONGTEXT NOT NULL', 'id');
  sql_create_field('notes', 'ideas', 'LONGTEXT NOT NULL', 'tasks');
  sql_create_field('notes', 'lore', 'LONGTEXT NOT NULL', 'ideas');

  query(" INSERT INTO notes SET notes.tasks = '', notes.ideas = '', notes.lore = '' ");

  sql_update_query_id(1);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Images

if($last_query < 2)
{
  sql_create_table('images');
  sql_create_field('images', 'image_path', 'TEXT NOT NULL', 'id');
  sql_create_field('images', 'name_en', 'TEXT NOT NULL', 'image_path');
  sql_create_field('images', 'name_fr', 'TEXT NOT NULL', 'name_en');
  sql_create_field('images', 'artist', 'TEXT NOT NULL', 'name_fr');

  sql_update_query_id(2);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Merge image names

if($last_query < 3)
{
  sql_delete_field('images', 'name_fr');
  sql_rename_field('images', 'name_en', 'name', 'TEXT NOT NULL');
  sql_rename_field('images', 'image_path', 'path', 'TEXT NOT NULL');

  sql_update_query_id(3);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Releases

if($last_query < 4)
{
  sql_create_table('releases');
  sql_create_field('releases', 'name_en', 'TINYTEXT NOT NULL', 'id');
  sql_create_field('releases', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('releases', 'release_date', 'DATE NOT NULL', 'name_fr');

  sql_update_query_id(4);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Factions

if($last_query < 5)
{
  sql_create_table('factions');
  sql_create_field('factions', 'sorting_order', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('factions', 'name_en', 'TINYTEXT NOT NULL', 'sorting_order');
  sql_create_field('factions', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');

  sql_update_query_id(5);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add UUIDs (for the API), and delete unnecessary IDs

if($last_query < 6)
{
  sql_create_field('factions', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('releases', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('images', 'uuid', 'VARCHAR(36) NOT NULL', 'id');

  query(" UPDATE  factions SET factions.uuid = UUID() ");
  query(" UPDATE  releases SET releases.uuid = UUID() ");
  query(" UPDATE  images SET images.uuid = UUID() ");

  sql_delete_field('notes', 'id');
  sql_delete_field('settings', 'id');

  sql_update_query_id(6);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Card types

if($last_query < 7)
{
  sql_create_table('card_types');
  sql_create_field('card_types', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('card_types', 'name_en', 'TINYTEXT NOT NULL', 'uuid');
  sql_create_field('card_types', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');

  sql_update_query_id(7);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Card rarities

if($last_query < 8)
{
  sql_create_table('card_rarities');
  sql_create_field('card_rarities', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('card_rarities', 'name_en', 'TINYTEXT NOT NULL', 'uuid');
  sql_create_field('card_rarities', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('card_rarities', 'max_card_count', 'INT UNSIGNED NOT NULL DEFAULT 0', 'name_fr');

  sql_update_query_id(8);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Tags, tag types, and image tags

if($last_query < 9)
{
  sql_create_table('tags');
  sql_create_field('tags', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('tags', 'fk_tag_types', 'INT UNSIGNED NOT NULL DEFAULT 0', 'uuid');
  sql_create_field('tags', 'name', 'TINYTEXT NOT NULL', 'fk_tag_types');
  sql_create_field('tags', 'description_en', 'TEXT', 'name');
  sql_create_field('tags', 'description_fr', 'TEXT', 'description_en');

  sql_create_table('tag_types');
  sql_create_field('tag_types', 'name', 'TINYTEXT NOT NULL', 'id');

  query(" INSERT INTO tag_types SET tag_types.name = 'Card' ");
  query(" INSERT INTO tag_types SET tag_types.name = 'Image' ");
  query(" INSERT INTO tag_types SET tag_types.name = 'Arsenal' ");
  query(" INSERT INTO tag_types SET tag_types.name = 'Ruling' ");

  sql_create_table('tags_images');
  sql_create_field('tags_images', 'fk_images', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('tags_images', 'fk_tags', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_images');

  sql_update_query_id(9);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add some indexes

if($last_query < 10)
{
  sql_create_index('images', 'images_uuid', 'uuid');
  sql_create_index('images', 'images_path', 'path(40)');
  sql_create_index('images', 'images_name', 'name(40)');

  sql_create_index('releases', 'releases_uuid', 'uuid');
  sql_create_index('releases', 'releases_date', 'release_date');

  sql_create_index('factions', 'factions_uuid', 'uuid');
  sql_create_index('factions', 'factions_sort', 'sorting_order');

  sql_create_index('card_types', 'card_types_uuid', 'uuid');
  sql_create_index('card_types', 'card_types_name_en', 'name_en(40)');
  sql_create_index('card_types', 'card_types_name_fr', 'name_fr(40)');

  sql_create_index('card_rarities', 'card_rarities_uuid', 'uuid');
  sql_create_index('card_rarities', 'card_rarities_max', 'max_card_count');
  sql_create_index('card_rarities', 'card_rarities_name_en', 'name_en(40)');
  sql_create_index('card_rarities', 'card_rarities_name_fr', 'name_fr(40)');

  sql_create_index('tags', 'tags_uuid', 'uuid');
  sql_create_index('tags', 'tags_type', 'fk_tag_types');
  sql_create_index('tags', 'tags_name', 'name(40)');

  sql_create_index('tags_images', 'tags_images_image', 'fk_images');
  sql_create_index('tags_images', 'tags_images_tag', 'fk_tags');

  sql_create_index('tags_types', 'tags_types_name', 'name(40)');

  sql_update_query_id(10);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Cards, card tags, and image languages

if($last_query < 11)
{
  sql_create_table('cards');
  sql_create_field('cards', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('cards', 'fk_releases', 'INT UNSIGNED NOT NULL DEFAULT 0', 'uuid');
  sql_create_field('cards', 'fk_images_en', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_releases');
  sql_create_field('cards', 'fk_images_fr', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_images_en');
  sql_create_field('cards', 'fk_factions', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_images_fr');
  sql_create_field('cards', 'fk_card_types', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_factions');
  sql_create_field('cards', 'fk_card_rarities', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_card_types');
  sql_create_field('cards', 'is_extra_card', 'TINYINT UNSIGNED NOT NULL DEFAULT 0', 'fk_card_rarities');
  sql_create_field('cards', 'is_hidden', 'TINYINT UNSIGNED NOT NULL DEFAULT 0', 'is_extra_card');
  sql_create_field('cards', 'name_en', 'TEXT NOT NULL', 'is_hidden');
  sql_create_field('cards', 'name_fr', 'TEXT NOT NULL', 'name_en');
  sql_create_field('cards', 'cost', 'TINYTEXT', 'name_fr');
  sql_create_field('cards', 'income', 'TINYTEXT', 'cost');
  sql_create_field('cards', 'weapons', 'INT UNSIGNED NOT NULL DEFAULT 0', 'income');
  sql_create_field('cards', 'durability', 'INT UNSIGNED NOT NULL DEFAULT 0', 'weapons');
  sql_create_field('cards', 'body_en', 'LONGTEXT', 'durability');
  sql_create_field('cards', 'body_fr', 'LONGTEXT', 'body_en');

  sql_create_index('cards', 'cards_uuid', 'uuid');
  sql_create_index('cards', 'cards_release', 'fk_releases');
  sql_create_index('cards', 'cards_image_en', 'fk_images_en');
  sql_create_index('cards', 'cards_image_fr', 'fk_images_fr');
  sql_create_index('cards', 'cards_faction', 'fk_factions');
  sql_create_index('cards', 'cards_type', 'fk_card_types');
  sql_create_index('cards', 'cards_rarity', 'fk_card_rarities');
  sql_create_index('cards', 'cards_extra', 'is_extra_card');
  sql_create_index('cards', 'cards_hidden', 'is_hidden');
  sql_create_index('cards', 'cards_name_en', 'name_en(40)');
  sql_create_index('cards', 'cards_name_fr', 'name_fr(40)');

  sql_create_table('tags_cards');
  sql_create_field('tags_cards', 'fk_cards', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('tags_cards', 'fk_tags', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_cards');

  sql_create_index('tags_cards', 'tags_cards_card', 'fk_cards');
  sql_create_index('tags_cards', 'tags_cards_tag', 'fk_tags');

  sql_create_field('images', 'language', 'TINYTEXT NOT NULL', 'path');

  sql_create_index('images', 'images_language', 'language(10)');

  sql_update_query_id(11);
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Arsenal tags

/*
if($last_query < X)
{
  sql_create_table('tags_arsenals');
  sql_create_field('tags_arsenals', 'fk_arsenals', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('tags_arsenals', 'fk_tags', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_arsenals');

  sql_create_index('tags_arsenals', 'tags_arsenals_arsenal', 'fk_arsenals');
  sql_create_index('tags_arsenals', 'tags_arsenals_tag', 'fk_tags');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Rulings tags

/*
if($last_query < X)
{
  sql_create_table('tags_rulings');
  sql_create_field('tags_rulings', 'fk_rulings', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('tags_rulings', 'fk_tags', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_rulings');

  sql_create_index('tags_rulings', 'tags_rulings_ruling', 'fk_rulings');
  sql_create_index('tags_rulings', 'tags_rulings_tag', 'fk_tags');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Arsenals

/*
if($last_query < X)
{
  sql_create_table('arsenals');
  sql_create_field('arsenals', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('arsenals', 'fk_releases', 'INT UNSIGNED NOT NULL DEFAULT 0', 'uuid');
  sql_create_field('arsenals', 'fk_formats', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_releases');
  sql_create_field('arsenals', 'fk_images_en', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_formats');
  sql_create_field('arsenals', 'fk_images_fr', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_images_en');
  sql_create_field('arsenals', 'image_path', 'TINYTEXT NOT NULL', 'fk_images_fr');
  sql_create_field('arsenals', 'name_en', 'TINYTEXT NOT NULL', 'image_path');
  sql_create_field('arsenals', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('arsenals', 'playstyle_en', 'TINYTEXT', 'name_fr');
  sql_create_field('arsenals', 'playstyle_fr', 'TINYTEXT', 'playstyle_en');
  sql_create_field('arsenals', 'summary_en', 'TEXT', 'playstyle_fr');
  sql_create_field('arsenals', 'summary_fr', 'TEXT', 'summary_en');
  sql_create_field('arsenals', 'gameplan_en', 'LONGTEXT', 'summary_fr');
  sql_create_field('arsenals', 'gameplan_fr', 'LONGTEXT', 'gameplan_en');
  sql_create_field('arsenals', 'reserves_en', 'LONGTEXT', 'gameplan_fr');
  sql_create_field('arsenals', 'reserves_fr', 'LONGTEXT', 'reserves_en');

  sql_create_index('arsenals', 'arsenals_uuid', 'uuid');
  sql_create_index('arsenals', 'arsenals_release', 'fk_releases');
  sql_create_index('arsenals', 'arsenals_format', 'fk_formats');
  sql_create_index('arsenals', 'arsenals_image_en', 'fk_images_en');
  sql_create_index('arsenals', 'arsenals_image_fr', 'fk_images_fr')
  sql_create_index('arsenals', 'arsenals_name_en', 'name_en(40)');
  sql_create_index('arsenals', 'arsenals_name_fr', 'name_fr(40)');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Arsenal factions

/*
if($last_query < X)
{
  sql_create_table('arsenals_factions');
  sql_create_field('arsenals_factions', 'fk_arsenals', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('arsenals_factions', 'fk_factions', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_arsenals');

  sql_create_index('arsenals_factions', 'arsenals_factions_arsenal', 'fk_arsenals');
  sql_create_index('arsenals_factions', 'arsenals_factions_faction', 'fk_factions');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Arsenal compositions

/*
if($last_query < X)
{
  sql_create_table('arsenals_compositions');
  sql_create_field('arsenals_compositions', 'fk_arsenals', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('arsenals_compositions', 'fk_cards', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_arsenals');
  sql_create_field('arsenals_compositions', 'amount', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_cards');
  sql_create_field('arsenals_compositions', 'is_in_reserves', 'TINYINT UNSIGNED NOT NULL DEFAULT 0', 'amount');

  sql_create_index('arsenals_compositions', 'arsenals_compositions_arsenal', 'fk_arsenals');
  sql_create_index('arsenals_compositions', 'arsenals_compositions_card', 'fk_cards');
  sql_create_index('arsenals_compositions', 'arsenals_compositions_reserves', 'is_in_reserves');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Rulings

/*
if($last_query < X)
{
  sql_create_table('rulings');
  sql_create_field('rulings', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('rulings', 'name_en', 'TEXT NOT NULL', 'uuid');
  sql_create_field('rulings', 'name_fr', 'TEXT NOT NULL', 'name_en');
  sql_create_field('rulings', 'ruling_en', 'LONGTEXT', 'name_fr');
  sql_create_field('rulings', 'ruling_fr', 'LONGTEXT', 'ruling_en');
  sql_create_field('rulings', 'date', 'DATE NOT NULL', 'ruling_fr');

  sql_create_index('rulings', 'rulings_uuid', 'uuid');
  sql_create_index('rulings', 'rulings_name_en', 'name_en(40)');
  sql_create_index('rulings', 'rulings_name_fr', 'name_fr(40)');
  sql_create_index('rulings', 'rulings_date', 'date');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Card rulings

/*
if($last_query < X)
{
  sql_create_table('cards_rulings');
  sql_create_field('cards_rulings', 'fk_cards', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('cards_rulings', 'fk_rulings', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_cards');

  sql_create_index('cards_rulings', 'cards_rulings_card', 'fk_cards');
  sql_create_index('cards_rulings', 'cards_rulings_ruling', 'fk_rulings');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Keywords

/*
if($last_query < X)
{
  sql_create_table('keywords');
  sql_create_field('keywords', 'fk_releases', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('keywords', 'name_en', 'TINYTEXT NOT NULL', 'fk_releases');
  sql_create_field('keywords', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('keywords', 'description_en', 'TEXT', 'name_fr');
  sql_create_field('keywords', 'description_fr', 'TEXT', 'description_en');

  sql_create_index('keywords', 'keywords_uuid', 'uuid');
  sql_create_index('keywords', 'keywords_release', 'fk_releases');
  sql_create_index('keywords', 'keywords_name_en', 'name_en(40)');
  sql_create_index('keywords', 'keywords_name_fr', 'name_fr(40)');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Keyword factions

/*
if($last_query < X)
{
  sql_create_table('keywords_factions');
  sql_create_field('keywords_factions', 'fk_keywords', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('keywords_factions', 'fk_factions', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_keywords');

  sql_create_index('keywords_factions', 'keywords_factions_keyword', 'fk_keywords');
  sql_create_index('keywords_factions', 'keywords_factions_faction', 'fk_factions');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Design identities

/*
if($last_query < X)
{
  sql_create_table('identities');
  sql_create_field('identities', 'fk_releases', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('identities', 'name_en', 'TINYTEXT NOT NULL', 'id');
  sql_create_field('identities', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('identities', 'description_en', 'TEXT', 'name_fr');
  sql_create_field('identities', 'description_fr', 'TEXT', 'description_en');

  sql_create_index('identities', 'identities_uuid', 'uuid');
  sql_create_index('identities', 'identities_release', 'fk_releases');
  sql_create_index('identities', 'identities_name_en', 'name_en(40)');
  sql_create_index('identities', 'identities_name_fr', 'name_fr(40)');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Faction identities

/*
if($last_query < X)
{
  sql_create_table('factions_identities');
  sql_create_field('factions_identities', 'fk_factions', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('factions_identities', 'fk_identities', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_factions');

  sql_create_index('factions_identities', 'factions_identities_faction', 'fk_factions');
  sql_create_index('factions_identities', 'factions_identities_identity', 'fk_identities');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Hybridizations

/*
if($last_query < X)
{
  sql_create_table('hybridizations');
  sql_create_field('hybridizations', 'name_en', 'TINYTEXT NOT NULL', 'id');
  sql_create_field('hybridizations', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');

  sql_create_index('hybridizations', 'hybridizations_name_en', 'name_en(40)');
  sql_create_index('hybridizations', 'hybridizations_name_fr', 'name_fr(40)');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Faction hybridizations

/*
if($last_query < X)
{
  sql_create_table('factions_hybridizations');
  sql_create_field('factions_hybridizations', 'fk_factions', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('factions_hybridizations', 'fk_hybridizations', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_factions');

  sql_create_index('factions_hybridizations', 'factions_hybridizations_faction', 'fk_factions');
  sql_create_index('factions_hybridizations', 'factions_hybridizations_hybridization', 'fk_hybridizations');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Banned cards

/*
if($last_query < X)
{
  sql_create_table('bans');
  sql_create_field('bans', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('bans', 'fk_cards', 'INT UNSIGNED NOT NULL DEFAULT 0', 'uuid');
  sql_create_field('bans', 'fk_formats', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_cards');
  sql_create_field('bans', 'date', 'DATE NOT NULL', 'fk_formats');
  sql_create_field('bans', 'is_a_ban', 'TINYINT UNSIGNED NOT NULL DEFAULT 0', 'date');
  sql_create_field('bans', 'reason_en', 'MEDIUMTEXT', 'is_a_ban');
  sql_create_field('bans', 'reason_fr', 'MEDIUMTEXT', 'reason_en');

  sql_create_index('bans', 'bans_uuid', 'uuid');
  sql_create_index('bans', 'bans_card', 'fk_cards');
  sql_create_index('bans', 'bans_format', 'fk_formats');
  sql_create_index('bans', 'bans_date', 'date');
  sql_create_index('bans', 'bans_ban', 'is_a_ban');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Card bans

/*
if($last_query < X)
{
  sql_create_table('cards_bans');
  sql_create_field('cards_bans', 'fk_cards', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('cards_bans', 'fk_formats', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_cards');

  sql_create_index('cards_bans', 'cards_bans_card', 'fk_cards');
  sql_create_index('cards_bans', 'cards_bans_format', 'fk_formats');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Game formats

/*
if($last_query < X)
{
  sql_create_table('formats');
  sql_create_field('formats', 'uuid', 'VARCHAR(36) NOT NULL', 'id');
  sql_create_field('formats', 'name_en', 'TINYTEXT NOT NULL', 'uuid');
  sql_create_field('formats', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('formats', 'description_en', 'TEXT', 'name_fr');
  sql_create_field('formats', 'description_fr', 'TEXT', 'description_en');

  sql_create_index('formats', 'formats_uuid', 'uuid');
  sql_create_index('formats', 'formats_name_en', 'name_en(40)');
  sql_create_index('formats', 'formats_name_fr', 'name_fr(40)');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Game updates

/*
if($last_query < X)
{
  sql_create_table('updates');
  sql_create_field('updates', 'datetime', 'DATETIME NOT NULL', 'id');
  sql_create_field('updates', 'name_en', 'TINYTEXT NOT NULL', 'datetime');
  sql_create_field('updates', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('updates', 'description_en', 'TEXT', 'name_fr');
  sql_create_field('updates', 'description_fr', 'TEXT', 'description_en');

  sql_create_index('updates', 'updates_datetime', 'datetime');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Development blog

/*
if($last_query < X)
{
  sql_create_table('blogs');
  sql_create_field('blogs', 'datetime', 'DATETIME NOT NULL', 'id');
  sql_create_field('blogs', 'name_en', 'TINYTEXT NOT NULL', 'datetime');
  sql_create_field('blogs', 'name_fr', 'TINYTEXT NOT NULL', 'name_en');
  sql_create_field('blogs', 'description_en', 'TEXT', 'name_fr');
  sql_create_field('blogs', 'description_fr', 'TEXT', 'description_en');

  sql_create_index('blogs', 'blogs_datetime', 'datetime');

  sql_update_query_id(X);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Card history (old versions)

/*
if($last_query < X)
{
  sql_create_table('card_history');
  sql_create_field('card_history', 'fk_cards', 'INT UNSIGNED NOT NULL DEFAULT 0', 'id');
  sql_create_field('card_history', 'fk_images_en', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_cards');
  sql_create_field('card_history', 'fk_images_fr', 'INT UNSIGNED NOT NULL DEFAULT 0', 'fk_images_en');
  sql_create_field('card_history', 'errata_en', 'LONGTEXT', 'fk_images_fr');
  sql_create_field('card_history', 'errata_fr', 'LONGTEXT', 'errata_en');

  sql_create_index('card_history', 'card_history_card', 'fk_cards');
  sql_create_index('card_history', 'card_history_image_en', 'fk_images_en');
  sql_create_index('card_history', 'card_history_image_fr', 'fk_images_fr');

  sql_update_query_id(X);
}
*/