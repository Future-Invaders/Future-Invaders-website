<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/social.lang.php';  # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/social/contact";
$page_title_en    = "Contact info";
$page_title_fr    = "Infos de contact";
$page_description = "How to contact the people behind the card game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('contact_title')?>
  </h2>

  <p>
    <?=__('contact_body_1')?>
  </p>

  <p>
    <?=__('contact_body_2')?>
  </p>

  <p>
    <?=__('contact_body_3')?>
  </p>

  <p>
    <?=__('contact_body_4')?>
  </p>

  <p>
    <?=__('contact_body_5')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';