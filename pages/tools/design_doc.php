<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/tools.lang.php';   # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/design_doc";
$page_title_en    = "Design document";
$page_title_fr    = "Document de design";
$page_description = "The design document which spawned the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>pages/game">
      <img src="<?=$path?>img/banners/banner_designdoc.png" alt="<?=__('menu_designdoc')?>">
    </a>
  </div>

  <h2>
    <?=__('design_doc_dev_title')?>
  </h2>

  <p>
    <?=__('design_doc_dev_body_1')?>
  </p>

  <p>
    <?=__('design_doc_dev_body_2')?>
  </p>

  <p>
    <?=__('design_doc_dev_english')?>
  </p>

  <p class="bigpadding_top">
    <?=__('design_doc_dev_link')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';