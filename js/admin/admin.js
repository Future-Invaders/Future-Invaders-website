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




/**
 * Fetches the preview of an image.
 *
 * @param   {int}   image_id    The image's id.
 * @param   {int}   image_name  The image's name.
 * @param   {int}   root_path   The path to the root of the website.
 *
 * @returns {void}
 */

function admin_images_preview(  image_id    ,
                                image_name  ,
                                root_path   )
{
  // Prepare the image
  image = document.createElement("img");
  image.setAttribute("src", root_path + image_name);

  // Add the image in the element
  document.getElementById('admin_image_container_' + image_id).appendChild(image);

  // Prevent the fetch from happening more than once
  document.getElementById('admin_image_preview_cell_' + image_id).onmouseover = null;
}