<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php'; # Core
include_once './../lang/social.lang.php'; # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "social/coc";
$page_title_en    = "Code of conduct";
$page_title_fr    = "Code de conduite";
$page_description = "Code of conduct when interacting with the community of the tactical sci-fi card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>social">
      <img src="<?=$path?>img/banners/banner_coc.png" alt="<?=__('menu_coc')?>">
    </a>
  </div>

  <h2>
    <?=__('coc_title')?>
  </h2>

  <p>
    <?=__('coc_body_1')?>
  </p>

  <ul class="smallpadding_top">
    <li>
      <?=__('coc_list_1')?>
    </li>
    <li>
      <?=__('coc_list_2')?>
    </li>
    <li>
      <?=__('coc_list_3')?>
    </li>
    <li>
      <?=__('coc_list_4')?>
    </li>
    <li>
      <?=__('coc_list_5')?>
    </li>
  </ul>

  <p>
    <?=__('coc_body_2')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';