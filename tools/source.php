<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../inc/includes.inc.php'; # Core
include_once './../lang/tools.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "tools/source";
$page_title_en    = "Source code";
$page_title_fr    = "Code source";
$page_description = "Source code of the strategy sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/*******************************************************************************/ include './../inc/header.inc.php'; ?>

<div class="width_50">

  <div class="bigpadding_bot">
    <a href="<?=$path?>tools">
      <img src="<?=$path?>img/banners/banner_source.png" alt="<?=__('menu_source')?>">
    </a>
  </div>

  <h2>
    <?=__('source_code_title')?>
  </h2>

  <p>
    <?=__('source_code_body_1')?>
  </p>

  <p>
    <?=__('source_code_body_2')?>
  </p>

  <p>
    <?=__('source_code_body_3')?>
  </p>

  <p>
    <?=__('source_code_body_4')?>
  </p>

  <h5 class="bigpadding_top">
    <?=__('source_code_stack_title')?>
  </h5>

  <p>
    <?=__('source_code_stack_body_1')?>
  </p>

  <p>
    <?=__('source_code_stack_body_2')?>
  </p>

  <ul class="smallpadding_top">
    <li>
      <?=__('source_code_stack_list_1')?>
    </li>
    <li>
      <?=__('source_code_stack_list_2')?>
    </li>
    <li>
      <?=__('source_code_stack_list_3')?>
    </li>
    <li>
      <?=__('source_code_stack_list_4')?>
    </li>
    <li>
      <?=__('source_code_stack_list_5')?>
    </li>
  </ul>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/**********************************************************************************/ include './../inc/footer.inc.php';