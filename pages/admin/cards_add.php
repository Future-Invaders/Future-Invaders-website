<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                       SETUP                                                       */
/*                                                                                                                   */
// File inclusions /**************************************************************************************************/
include_once './../../inc/includes.inc.php';  # Core
include_once './../../actions/game.act.php';  # Game actions
include_once './../../lang/admin.lang.php';   # Admin translations

// Page summary
$page_url       = "pages/admin/cards";
$page_title_en  = "Admin: Cards";
$page_title_fr  = "Admin : Cartes";

// Admin menu selection
$admin_menu['cards'] = 1;

// Extra CSS & JS
$css  = array('admin');
$js   = array('admin/admin');




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     BACK END                                                      */
/*                                                                                                                   */
/*********************************************************************************************************************/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch releases

$releases_list = releases_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch images

$images_list = images_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card types

$card_types = card_types_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card factions

$card_factions = factions_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card rarities

$card_rarities = card_rarities_list();




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fetch card tags

$card_tags = tags_list(search: array('ftype' => 'Card'));




/*********************************************************************************************************************/
/*                                                                                                                   */
/*                                                     FRONT END                                                     */
/*                                                                                                                   */
if(!page_is_fetched_dynamically()): /****/ include './../../inc/header.inc.php';  /****/ include './admin_menu.php'; ?>

<div class="width_50 padding_top padding_bot">

  <h2 class="padding_bot">
    <?=__('admin_card_add_title')?>
  </h2>

  <form action="cards" method="POST">
    <fieldset>

    <div class="flexcontainer smallpadding_bot">
        <div style="flex: 8">

          <div>
            <label for="card_name_en"><?=__('admin_card_add_name_en')?></label>
            <input class="indiv" type="text" name="card_name_en">
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="card_name_fr"><?=__('admin_card_add_name_fr')?></label>
            <input class="indiv" type="text" name="card_name_fr">
          </div>

        </div>
      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div>
            <label for="card_image_en"><?=__('admin_card_add_image_en')?></label>
            <select class="indiv align_left" name="card_image_en">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $images_list['rows']; $i++): ?>
              <option value="<?=$images_list[$i]['id']?>"><?=$images_list[$i]['spath']?> (<?=$images_list[$i]['name']?>)</option>
              <?php endfor; ?>
            </select>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label for="card_image_fr"><?=__('admin_card_add_image_fr')?></label>
            <select class="indiv align_left" name="card_image_fr">
              <option value="">&nbsp;</option>
              <?php for($i = 0; $i < $images_list['rows']; $i++): ?>
              <option value="<?=$images_list[$i]['id']?>"><?=$images_list[$i]['spath']?> (<?=$images_list[$i]['name']?>)</option>
              <?php endfor; ?>
            </select>
          </div>

        </div>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_type')?></label>
        <select class="indiv align_left" name="card_type">
          <?php for($i = 0; $i < $card_types['rows']; $i++): ?>
          <option value="<?=$card_types[$i]['id']?>"><?=$card_types[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_faction')?></label>
        <select class="indiv align_left" name="card_faction">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $card_factions['rows']; $i++): ?>
          <option value="<?=$card_factions[$i]['id']?>"><?=$card_factions[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_rarity')?></label>
        <select class="indiv align_left" name="card_rarity">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $card_rarities['rows']; $i++): ?>
          <option value="<?=$card_rarities[$i]['id']?>"><?=$card_rarities[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="padding_bot">
        <label for="card_release"><?=__('admin_card_add_release')?></label>
        <select class="indiv align_left" name="card_release">
          <option value="">&nbsp;</option>
          <?php for($i = 0; $i < $releases_list['rows']; $i++): ?>
          <option value="<?=$releases_list[$i]['id']?>"><?=$releases_list[$i]['name']?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="smallpadding_bot">
        <label><?=__('admin_card_add_properties')?></label>
        <input type="checkbox" name="card_hidden">
        <label class="label_inline" for="card_hidden"><?=__('admin_card_add_hidden')?></label><br>
        <input type="checkbox" name="card_extra" id="card_extra" onchange="admin_card_hide_stats();">
        <label class="label_inline" for="card_extra"><?=__('admin_card_add_extra')?></label>
      </div>

      <div id="card_stats">

        <div class="flexcontainer smallpadding_bot tinypadding_top">
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_weapons')?></label>
              <input class="indiv" type="text" name="card_weapons">
            </div>

          </div>
          <div style="flex: 1">
            &nbsp;
          </div>
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_durability')?></label>
              <input class="indiv" type="text" name="card_durability">
            </div>

          </div>
          <div style="flex: 10">
            &nbsp;
          </div>

        </div>

        <div class="flexcontainer padding_bot">
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_cost')?></label>
              <input class="indiv" type="text" name="card_cost">
            </div>

          </div>
          <div style="flex: 1">
            &nbsp;
          </div>
          <div style="flex: 3">

            <div>
              <label><?=__('admin_card_add_income')?></label>
              <input class="indiv" type="text" name="card_income">
            </div>

          </div>
          <div style="flex: 10">
            &nbsp;
          </div>

        </div>

      </div>

      <div class="flexcontainer padding_bot">
        <div style="flex: 8">

          <div>
            <label><?=__('admin_card_add_body_en')?></label>
            <textarea class="indiv" name="card_body_en"></textarea>
          </div>

        </div>
        <div style="flex: 1">
          &nbsp;
        </div>
        <div style="flex: 8">

          <div>
            <label><?=__('admin_card_add_body_fr')?></label>
            <textarea class="indiv" name="card_body_fr"></textarea>
          </div>

        </div>
      </div>

      <div class="padding_bot">
        <label><?=__('admin_card_add_tags')?></label>
        <?php for($i = 0; $i < $card_tags['rows']; $i++): ?>
        <div class="tooltip_container">
          <input type="checkbox" name="card_tag_<?=$card_tags[$i]['id']?>">
          <label class="label_inline" for="card_tag_<?=$card_tags[$i]['id']?>"><?=$card_tags[$i]['name']?></label>
          <div class="tooltip">
            <?=$card_tags[$i]['fdesc']?>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <input type="submit" name="card_add" value="<?=__('admin_card_add_submit')?>">

    </fieldset>
  </form>

</div>

<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                                                    END OF PAGE                                                    */
/*                                                                                                                   */
/************************************************************************/ include './../../inc/footer.inc.php'; endif;