<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/tools.lang.php';   # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/arsenal_builder";
$page_title_en    = "Arsenal builder";
$page_title_fr    = "Construction d'arsenal";
$page_description = "A custom arsenal builder for the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('arsenal_builder_title')?>
  </h2>

  <p>
    <?=__('arsenal_builder_body_1')?>
  </p>

  <p>
    <?=__('arsenal_builder_body_2')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';