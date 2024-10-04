/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                 Writes text in the textarea of the 404 error page                                 */
/*                                                                                                                   */
/*                            Original idea by ThArGos, thanks for the genius idea buddy!                            */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Prepare an array with the text of the 404 error
var text_404 = new Array("", "", "",
"You are lost",
"This is a Neutral base",
"Consider it a safe haven",
"But you may not stay",
"Resupply and leave",
"", "", "",
"Pray you find your way",
"Beware the Pirates",
"And most importantly",
"Don't let Organics find you",
"", "", "",
"Error 404: Page not found",
"", "", "", "");

// Prepare some global variables to track the state of the text
var text_length       = text_404[0].length
var textarea_contents = '';
var cursor_position   = 0;
var cursor_row        = 0;
var current_row       = 0;


/**
 * Controls the text flow of the 404 error.
 *
 * This function should be called through onLoad on the 404 page.
 *
 * @returns {void}
 */

function this_page_is_a_404()
{
  // Reset the contents of the textarea
  textarea_contents = '';

  // Decide where the cursor should be
  current_row = Math.max(0, (cursor_row - 7));

  // Fetch the required line of text
  while(current_row < cursor_row)
    textarea_contents += text_404[current_row++] + '\r\n';

  // Print the text in the textarea, then position an underscore at the end to simulate a cursor
  document.getElementById('text404_desktop').value = textarea_contents + text_404[cursor_row].substring(0,cursor_position) + "_";
  document.getElementById('text404_mobile').value = textarea_contents + text_404[cursor_row].substring(0,cursor_position) + "_";

  // Check if we need to move to the next line
  if(cursor_position++ === text_length)
  {
    // If we do, reposition the cursor
    cursor_position=0;
    cursor_row++;

    // Check if the text is done being printed
    if(cursor_row !== text_404.length)
    {
      // If not, update the current position and run this function again after a small pause
      text_length = text_404[cursor_row].length;
      setTimeout("this_page_is_a_404()", 500);
    }
  }

  // Otherwise, simply print the next character by calling the function again asap
  else
    setTimeout("this_page_is_a_404()", 50);
}