<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../404")); die(); }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Prepare the footer's contents

// Load time and query count
$load_time  = round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"], 3);
$metrics    = __('footer_loadtime').$load_time.'s'.__('with', 1, 1, 1).$GLOBALS['query'].__('query', $GLOBALS['query'], 1);

// Update the page's stats
if(isset($page_url) && $page_url !== '')
{
  // Sanitize the page stats
  $timestamp      = sanitize(time(), 'int');
  $page_path      = sanitize($page_url, 'string');
  $page_name_en   = isset($page_title_en) ? sanitize($page_title_en, 'string') : '';
  $page_name_fr   = isset($page_title_fr) ? sanitize($page_title_fr, 'string') : '';
  $page_queycount = sanitize($GLOBALS['query'], 'int');
  $page_loadtime  = sanitize($load_time * 1000, 'int');

  // Update the page stats if they already exist
  if(database_entry_exists('stats_pages', 'page_path', $page_path))
    query(" UPDATE  stats_pages
            SET     stats_pages.page_path       =     '$page_path'                ,
                    stats_pages.page_name_en    =     '$page_name_en'             ,
                    stats_pages.page_name_fr    =     '$page_name_fr'             ,
                    stats_pages.last_viewed_at  =     '$timestamp'                ,
                    stats_pages.view_count      =     stats_pages.view_count + 1  ,
                    stats_pages.query_count     =     '$page_queycount'           ,
                    stats_pages.load_time       =     '$page_loadtime'
            WHERE   stats_pages.page_path       LIKE  '$page_path'                ");

  // Otherwise create the missing page stats
  else
    query(" INSERT INTO stats_pages
            SET         stats_pages.page_path       = '$page_path'    ,
                        stats_pages.page_name_en    = '$page_name_en' ,
                        stats_pages.page_name_fr    = '$page_name_fr' ,
                        stats_pages.last_viewed_at  = '$timestamp'    ,
                        stats_pages.view_count      = 1               ,
                        stats_pages.query_count     = $page_queycount ,
                        stats_pages.load_time       = $page_loadtime  ");
}

// Copyright ending date
$copyright_date = date('Y');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                DISPLAY THE FOOTER                                                 */
/*                                                                                                                   */
/******************************************************************************************************************/ ?>

      <?php if(!isset($hide_footer)) { ?>

      <footer>

        <?=__link("social/contact", __('footer_contact'), "text_light text_white_hover", true, $path);?><br>

        <?=__link("social/legal", __('footer_legal'), "text_light text_white_hover", true, $path);?><br>

        <?=__link("social/copyright", __('footer_copyright', preset_values: array($copyright_date)), "text_light text_white_hover", true, $path);?><br>

      </footer>

      <?php } ?>

    </div>

  </body>
</html>