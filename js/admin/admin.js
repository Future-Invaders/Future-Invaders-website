/*********************************************************************************************************************/
/*                                                                                                                   */
/*  admin_menu              Navigates between administration pages.                                                  */
/*                                                                                                                   */
/*  admin_images_search     Searches the image list.                                                                 */
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
  postdata += '&admin_images_search_artist='  + document.getElementById('admin_images_search_artist').value;

  // Submit the search
  fetch_page('images', 'admin_images_tbody', postdata);
}