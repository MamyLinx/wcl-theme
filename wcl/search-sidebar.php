<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
     $category = (array)__get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }
?>
<div id="sidebar">
<?php osc_alert_form(); ?>
<div class="filters">
    <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
        <input type="hidden" name="page" value="search"/>
        <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
        <?php foreach(osc_search_user() as $userId) { ?>
        <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
        <?php } ?>
        <div class="card bg-info my-4 text-white">
	        <div class="card-body">
		        <div class="form-group">
				    <label for="query"><?php _e('Your search', 'bender_black'); ?></label>
				    <input type="text" class="form-control" name="sPattern"  id="query" 
		                value="<?php echo osc_esc_html(osc_search_pattern()); ?>" >
				  </div>
				 
				  <div class="form-group">
				    <label for="sCity"><?php _e('City', 'bender_black'); ?></label>
				    <input class="form-control" type="hidden" id="sRegion" name="sRegion" value="<?php echo osc_esc_html(Params::getParam('sRegion')); ?>" />
		          <input class="form-control" type="text" id="sCity" name="sCity" value="<?php echo osc_esc_html(osc_search_city()); ?>" />
			  </div>
			  </div>
		  </div>
		  
        <?php if( osc_images_enabled_at_items() ) { ?>
        <div class="card bg-info my-4 text-white">
	        <div class="card-body">
		        <h5><?php _e('Show only', 'bender_black') ; ?></h5>
		        <hr>
		        <div class="form-check">
				  <input class="form-check-input" type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> >
				  <label class="form-check-label" for="withPicture">
				    <?php _e('listings with pictures', 'bender_black') ; ?>
				  </label>
				</div>
	        </div>
        </div>
        <?php } ?>
        
        <?php if( osc_price_enabled_at_items() ) { ?>
        <div class="card bg-info mt-4 text-white">
	        <div class="card-body">
		        <h5 class="card-title"><?php _e('Price', 'bender_black') ; ?></h5>
		        <hr>
		       
		        <div class="form-row">
			        
				    <div class="form-group col">
				    	<label for="priceMin"><?php _e('Min', 'bender_black') ; ?>.</label>
				      <input type="text" class="form-control" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="12" maxlength="12">
				    </div>
				    <div class="form-group col">
				    	<label for="priceMax"><?php _e('Max', 'bender_black') ; ?>.</label>
				      <input type="text" class="form-control" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="12" maxlength="12" />
				    </div>
				  </div>
	        </div>	       
		  </div>
        <?php } ?>
        <div class="plugin-hooks">
            <?php
            if(osc_search_category_id()) {
                osc_run_hook('search_form', osc_search_category_id()) ;
            } else {
                osc_run_hook('search_form') ;
            }
            ?>
        </div>
        <?php
        $aCategories = osc_search_category();
        foreach($aCategories as $cat_id) { ?>
            <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
        <?php } ?>
        <div class="actions">
            <button type="submit" class="btn btn-primary btn-sm"><?php _e('Apply', 'bender_black') ; ?></button>
        </div>
    </form>
    <div class="card">
        <div class="card-body ">
            <h5><?php _e('Refine category', 'bender_black') ; ?></h5>
            <?php bender_black_sidebar_category_search($category['pk_i_id']); ?>
        </div>
    </div>
</div>
</div>