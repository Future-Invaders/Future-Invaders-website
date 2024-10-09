<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../404")); die(); }

/*********************************************************************************************************************/
/*                                                                                                                   */
/*                        Include this page to display the API documentation's dropdown menu.                        */
/*                                                                                                                   */
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Prepare the menu entries

$api_menu_entries = array('intro', 'releases', 'factions');

foreach($api_menu_entries as $api_menu_entry)
  $api_menu[$api_menu_entry] = isset($api_menu[$api_menu_entry]) ? ' selected' : '';


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Display the menu                                                                                                  ?>

<div class="padding_bot align_center api_doc_menu">
  <fieldset>
    <h5>
      <?=__('api_menu_title').__(':')?>
      <select class="inh" id="api_doc_menu" name="api_doc_menu" onchange="api_doc_menu();">
        <?php foreach($api_menu_entries as $api_menu_entry): ?>
          <option value="<?=$api_menu_entry?>"<?=$api_menu[$api_menu_entry]?>>
            <?=__('api_menu_'.$api_menu_entry)?>
          </option>
        <?php endforeach; ?>
      </select>
    </h5>
  </fieldset>
</div>

<hr>