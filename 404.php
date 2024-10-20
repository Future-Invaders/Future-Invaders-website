<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                   PAGE SETTINGS                                                   */
/*                                                                                                                   */
// Inclusions /*******************************************************************************************************/
include_once './inc/includes.inc.php'; # Core

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "404";
$page_title_en    = "404 Lost in space";
$page_title_fr    = "404 Perdus dans l'espace";
$page_description = "Error 404: Page not found…";

// Extra CSS & JS
$css  = array('404');
$js   = array('404');

// Hide the footer
$hide_footer = 1;



/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

// Make the page a hard 404
header("HTTP/1.0 404 Not Found");

// Inform the header that this is a 404
$this_page_is_a_404 = '';




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/**********************************************************************************/ include './inc/header.inc.php'; ?>

<div class="margin_auto bigpadding_top hugepadding_bot container404 desktop">
  <table class="indiv table404">
    <tbody>
      <tr class="desktop">
        <td class="img404 noborder">
          <a href="<?=$path?>index">
            <img class="img404left" src="<?=$path?>img/404/404_left.png" alt="404">
          </a>
        </td>
        <td class="noborder">
          <textarea class="indiv monospace text404" rows="10" id="text404_desktop" readonly></textarea>
        </td>
        <td class="img404 noborder">
          <a href="<?=$path?>index">
            <img class="img404right" src="<?=$path?>img/404/404_right.jpg" alt="404">
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="margin_auto align_center mobile">
  <a href="<?=$path?>index">
    <img class="img404left" src="<?=$path?>img/404/404_left.png" alt="404">
  </a>
  <textarea class="indiv monospace text404" rows="10" id="text404_mobile" readonly></textarea>
  <a href="<?=$path?>index">
    <img class="img404right" src="<?=$path?>img/404/404_right.jpg" alt="404">
  </a>
</div>

<div class="align_center padding_top padding_bot desktop">
  <a href="<?=$path?>index">
    <img src="<?=$path?>img/404/404_cat.png" alt="404">
  </a>
</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*************************************************************************************/ include './inc/footer.inc.php';