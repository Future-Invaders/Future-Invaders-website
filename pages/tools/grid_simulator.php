<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../lang/tools.lang.php';   # Translations

// Page summary
$page_lang        = array('FR', 'EN');
$page_url         = "pages/tools/grid_simulator";
$page_title_en    = "Grid simulator";
$page_title_fr    = "Simulateur de grille";
$page_description = "Game state simulator for the sci-fi card battling game Future Invaders";




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
/****************************************************************************/ include './../../inc/header.inc.php'; ?>

<div class="width_50">

  <h2>
    <?=__('grid_simulator_title')?>
  </h2>

  <p>
    <?=__('grid_simulator_body_1')?>
  </p>

  <p>
    <?=__('grid_simulator_body_2')?>
  </p>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/*******************************************************************************/ include './../../inc/footer.inc.php';