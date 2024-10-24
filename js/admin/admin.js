/*********************************************************************************************************************/
/*                                                                                                                   */
/*  admin_menu                  Navigates between administration pages.                                              */
/*                                                                                                                   */
/*  admin_cards_search          Searches the card list.                                                              */
/*  admin_cards_delete          Triggers the deletion of an entry in the card list.                                  */
/*  admin_card_hide_stats       Hides stats for extra cards.                                                         */
/*                                                                                                                   */
/*  admin_card_types_delete     Triggers the deletion of an entry in the card type list.                             */
/*                                                                                                                   */
/*  admin_card_rarities_delete  Triggers the deletion of an entry in the card rarity list.                           */
/*                                                                                                                   */
/*  admin_images_search         Searches the image list.                                                             */
/*  admin_images_preview        Fetches the preview of an image.                                                     */
/*  admin_images_delete         Triggers the deletion of an entry in the image list.                                 */
/*                                                                                                                   */
/*  admin_tags_search           Searches the tag list.                                                               */
/*  admin_tags_delete           Triggers the deletion of an entry in the tag list.                                   */
/*                                                                                                                   */
/*  admin_releases_search       Searches the release list.                                                           */
/*  admin_releases_delete       Triggers the deletion of an entry in the release list.                               */
/*                                                                                                                   */
/*  admin_factions_delete       Triggers the deletion of an entry in the faction list.                               */
/*                                                                                                                   */
/*********************************************************************************************************************/

/**
 * Navigates between administration pages.
 *
 * @returns {void}
 */

function admin_menu()
{
  // Fetch the requested page
  page = document.getElementById('admin_menu').value;

  // Go to the requested page
  window.location.href = page;
}



/**
 * Searches for cards.
 *
 * @param   {string}  [sort_data] The column which should be used to sort the data.
 *
 * @returns {void}
 */

function admin_cards_search( sort_data = null )
{
  // Update the search input if required
  if(sort_data)
    document.getElementById('admin_cards_sort').value = sort_data;

  // Assemble the postdata
  postdata =  'admin_cards_sort='               + document.getElementById('admin_cards_sort').value;
  postdata += '&admin_cards_search_name='       + document.getElementById('admin_cards_search_name').value;
  postdata += '&admin_cards_search_release='    + document.getElementById('admin_cards_search_release').value;
  postdata += '&admin_cards_search_type='       + document.getElementById('admin_cards_search_type').value;
  postdata += '&admin_cards_search_faction='    + document.getElementById('admin_cards_search_faction').value;
  postdata += '&admin_cards_search_rarity='     + document.getElementById('admin_cards_search_rarity').value;
  postdata += '&admin_cards_search_cost='       + document.getElementById('admin_cards_search_cost').value;
  postdata += '&admin_cards_search_income='     + document.getElementById('admin_cards_search_income').value;
  postdata += '&admin_cards_search_weapons='    + document.getElementById('admin_cards_search_weapons').value;
  postdata += '&admin_cards_search_durability=' + document.getElementById('admin_cards_search_durability').value;
  postdata += '&admin_cards_search_body='       + document.getElementById('admin_cards_search_body').value;
  postdata += '&admin_cards_search_extra='      + document.getElementById('admin_cards_search_extra').value;
  postdata += '&admin_cards_search_tags='       + document.getElementById('admin_cards_search_tags').value;

  // Submit the search
  fetch_page('cards', 'admin_cards_tbody', postdata);
}




/**
 * Triggers the deletion of an entry in the card list.
 *
 * @param   {string}  message   The confirmation message which will be displayed.
 * @param   {int}     card_id   The id of the card to delete.
 *
 * @returns {void}
 */

function admin_cards_delete( message   ,
                             card_id   )
{
  // Assemble the postdata
  postdata = 'admin_cards_delete=' + fetch_sanitize(card_id);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
    fetch_page('cards', 'admin_cards_tbody', postdata);
}




/**
 * Hides stats for extra cards.
 *
 * @returns {void}
 */

function admin_card_hide_stats()
{
  // Fetch the checkbox
  hide_stats = (document.getElementById('card_extra').checked) ? 0 : 1;

  // Toggle the stats
  if(hide_stats)
    toggle_element_oneway('card_stats', 1);
  else
    toggle_element_oneway('card_stats', 0);
}




/**
 * Triggers the deletion of an entry in the card type list.
 *
 * @param   {string}  message   The confirmation message which will be displayed.
 * @param   {int}     card_type The id of the card type to delete.
 *
 * @returns {void}
 */

function admin_card_types_delete( message   ,
                                  card_type )
{
  // Assemble the postdata
  postdata = 'admin_card_types_delete=' + fetch_sanitize(card_type);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
    fetch_page('card_types', 'admin_card_types_tbody', postdata);
}




/**
 * Triggers the deletion of an entry in the card rarity list.
 *
 * @param   {string}  message   The confirmation message which will be displayed.
 * @param   {int}     card_rarity The id of the card rarity to delete.
 *
 * @returns {void}
 */

function admin_card_rarities_delete( message   ,
                                     card_rarity )
{
  // Assemble the postdata
  postdata = 'admin_card_rarities_delete=' + fetch_sanitize(card_rarity);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
    fetch_page('card_rarities', 'admin_card_rarities_tbody', postdata);
}




/**
 * Searches for images.
 *
 * @param   {string}  [sort_data] The column which should be used to sort the data.
 *
 * @returns {void}
 */

function admin_images_search( sort_data = null )
{
  // Update the search input if required
  if(sort_data)
    document.getElementById('admin_images_sort').value = sort_data;

  // Assemble the postdata
  postdata =  'admin_images_sort='            + document.getElementById('admin_images_sort').value;
  postdata += '&admin_images_search_path='    + document.getElementById('admin_images_search_path').value;
  postdata += '&admin_images_search_name='    + document.getElementById('admin_images_search_name').value;
  postdata += '&admin_images_search_lang='    + document.getElementById('admin_images_search_lang').value;
  postdata += '&admin_images_search_artist='  + document.getElementById('admin_images_search_artist').value;
  postdata += '&admin_images_search_tags='    + document.getElementById('admin_images_search_tags').value;

  // Submit the search
  fetch_page('images', 'admin_images_tbody', postdata);
}




/**
 * Fetches the preview of an image.
 *
 * @param   {int}     image_id    The image's id.
 * @param   {string}  image_name  The image's name.
 * @param   {string}  short_name  The image's short name.
 * @param   {string}  root_path   The path to the root of the website.
 *
 * @returns {void}
 */

function admin_images_preview(  image_id    ,
                                image_name  ,
                                short_name  ,
                                root_path   )
{
  // Prepare the image
  image = document.createElement("img");
  image.setAttribute("src", root_path + image_name);

  // Add the image in the element
  document.getElementById('admin_image_container_' + image_id).innerHTML = short_name;
  document.getElementById('admin_image_container_' + image_id).appendChild(document.createElement("br"));
  document.getElementById('admin_image_container_' + image_id).appendChild(document.createElement("br"));
  document.getElementById('admin_image_container_' + image_id).appendChild(image);

  // Prevent the fetch from happening more than once
  document.getElementById('admin_image_preview_cell_' + image_id).onmouseover = null;
}




/**
 * Triggers the deletion of an entry in the image list.
 *
 * @param   {string}  message   The confirmation message which will be displayed.
 * @param   {int}     image_id  The id of the image to delete.
 *
 * @returns {void}
 */

function admin_images_delete( message   ,
                              image_id  )
{
  // Assemble the postdata
  postdata = 'admin_images_delete=' + fetch_sanitize(image_id);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
    fetch_page('images', 'admin_images_tbody', postdata);
}




/**
 * Searches for tags.
 *
 * @param   {string}  [sort_data] The column which should be used to sort the data.
 *
 * @returns {void}
 */

function admin_tags_search( sort_data = null )
{
  // Update the search input if required
  if(sort_data)
    document.getElementById('admin_tags_sort').value = sort_data;

  // Assemble the postdata
  postdata =  'admin_tags_sort='            + document.getElementById('admin_tags_sort').value;
  postdata += '&admin_tags_search_type='    + document.getElementById('admin_tags_search_type').value;
  postdata += '&admin_tags_search_name='    + document.getElementById('admin_tags_search_name').value;
  postdata += '&admin_tags_search_desc='    + document.getElementById('admin_tags_search_desc').value;

  // Submit the search
  fetch_page('tags', 'admin_tags_tbody', postdata);
}




/**
 * Triggers the deletion of an entry in the tag list.
 *
 * @param   {string}  message   The confirmation message which will be displayed.
 * @param   {int}     tag       The id of the tag to delete.
 *
 * @returns {void}
 */

function admin_tags_delete( message   ,
                            tag       )
{
  // Assemble the postdata
  postdata = 'admin_tags_delete=' + fetch_sanitize(tag);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
    fetch_page('tags', 'admin_tags_tbody', postdata);
}




/**
 * Searches for releases.
 *
 * @param   {string}  [sort_data] The column which should be used to sort the data.
 *
 * @returns {void}
 */

function admin_releases_search( sort_data = null )
{
  // Update the search input if required
  if(sort_data)
    document.getElementById('admin_releases_sort').value = sort_data;

  // Assemble the postdata
  postdata =  'admin_releases_sort='          + document.getElementById('admin_releases_sort').value;
  postdata += '&admin_releases_search_date='  + document.getElementById('admin_releases_search_date').value;
  postdata += '&admin_releases_search_name='  + document.getElementById('admin_releases_search_name').value;

  // Submit the search
  fetch_page('releases', 'admin_releases_tbody', postdata);
}




/**
 * Triggers the deletion of an entry in the release list.
 *
 * @param   {string}  message     The confirmation message which will be displayed.
 * @param   {int}     release_id  The id of the release to delete.
 *
 * @returns {void}
 */

function admin_releases_delete( message     ,
                                release_id  )
{
  // Assemble the postdata
  postdata = 'admin_releases_delete=' + fetch_sanitize(release_id);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
  fetch_page('releases', 'admin_releases_tbody', postdata);
}




/**
 * Triggers the deletion of an entry in the faction list.
 *
 * @param   {string}  message     The confirmation message which will be displayed.
 * @param   {int}     faction_id  The id of the faction to delete.
 *
 * @returns {void}
 */

function admin_factions_delete( message     ,
                                faction_id  )
{
  // Assemble the postdata
  postdata = 'admin_factions_delete=' + fetch_sanitize(faction_id);

  // Make sure the user knows what they're doing and trigger the deletion
  if(confirm(message))
    fetch_page('factions', 'admin_factions_tbody', postdata);
}