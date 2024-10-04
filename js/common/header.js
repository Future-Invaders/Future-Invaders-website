/*********************************************************************************************************************/
/*                                                                                                                   */
/*  toggle_header_menu              Toggles the visibility of a top menu.                                            */
/*                                                                                                                   */
/*  change_language            Changes the display language for a user.                                         */
/*                                                                                                                   */
/*********************************************************************************************************************/
// Close the lost account access popin if it is open upon loading the page
popin_close('popin_lost_access');

/**
 * Toggles the visibility of a top menu.
 *
 * @param   {string}  menu_name       The name of the menu to show or hide.
 * @param   {string}  [invert_title]  If set, inverts the color scheme of the menu's title.
 *
 * @returns {void}
 */

function toggle_header_menu(  menu_name             ,
                              invert_title  = null  )
{
  // Fetch the selected menu
  var selected_submenu = document.getElementById('header_submenu_' + menu_name);

  // Check the current visibility state of the menu
  var menu_visibility = selected_submenu.currentStyle ? selected_submenu.currentStyle.display : getComputedStyle(selected_submenu,null).display;

  // Fetch all submenus
  var all_submenus = document.getElementsByClassName('header_submenu');

  // Close all open submenus
  for(var i = 0; i < all_submenus.length; i++)
    all_submenus[i].style.display = 'none';

  // If the menu is invisible, open it
  if(menu_visibility === 'none')
    selected_submenu.style.display = 'grid';

  // Check whether this title's color scheme should be inverted
  invert_color_scheme = (invert_title && !document.getElementById('header_menu_title_' + menu_name).classList.contains('header_topmenu_title_selected'));

  // Restore all inverted color schemes (if there are any)
  var inverted_schemes = document.getElementsByClassName('header_topmenu_title_selected');
  while (inverted_schemes.length)
    inverted_schemes[0].classList.remove('header_topmenu_title_selected');

  // If the title's color scheme should be inverted, do it
  if(invert_color_scheme)
    document.getElementById('header_menu_title_' + menu_name).classList.add('header_topmenu_title_selected');

  // If the annoying new notification animation is there, replace it with the standard user icon upon clicking
  if(menu_name === 'account')
  {
    var account_icon = document.getElementById('header_topmenu_account_icon');
    account_icon.setAttribute('src', account_icon.getAttribute('src').replace("login_mail.svg", "login.svg"));
  }

  // Same for admin mail notifications
  else if(menu_name === 'admin')
  {
    var account_icon = document.getElementById('header_topmenu_admin_icon');
    account_icon.setAttribute('src', account_icon.getAttribute('src').replace("login_mail.svg", "admin_panel.svg"));
  }
}




/**
 * Changes the display language for a user.
 *
 * @returns {void}
 */

function user_change_language()
{
  // Log the user out
  document.getElementById('language').submit();
}