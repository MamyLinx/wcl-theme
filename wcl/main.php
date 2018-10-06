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

    // meta tag robots
    osc_add_hook('header','bender_black_follow_construct');

    bender_black_add_body_class('home');


    $buttonClass = '';
    $listClass   = '';
    if(bender_black_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<div class="clear"></div>
<div class="mb-4">
  <?php
	  osc_get_premiums(6);
	
	  if (osc_count_premiums() > 0) {
	      echo '<h5 class="mt-2">' . __('Premium listings', 'bender_black') . '</h5>';
	      View::newInstance()->_exportVariableToView("listType", 'premiums');
	      View::newInstance()->_exportVariableToView("listClass", $listClass . ' premium-list');
	      osc_current_web_theme_path('loop.php');
	      echo '<div style="clear:both;"></div><br/>';
	  }
  ?>
	<span class="h2"><?php _e('Latest Listings', 'bender_black') ; ?></span>
	 <?php if( osc_count_latest_items() == 0) { ?>
	    <div class="clear"></div>
	    <p class="empty"><?php _e("There aren't listings available at this moment", 'bender_black'); ?></p>
	<?php } else { ?>
	    <?php
	    View::newInstance()->_exportVariableToView("listType", 'latestItems');
	    View::newInstance()->_exportVariableToView("listClass",$listClass);
	    osc_current_web_theme_path('loop.php');
	    ?>
	    <div class="clear"></div>
	    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
	        <p class="see_more_link"><a href="<?php echo osc_search_show_all_url() ; ?>">
	            <strong><?php _e('See all listings', 'bender_black') ; ?> &raquo;</strong></a>
	        </p>
	    <?php } ?>
	<?php } ?>
</div>
</div><!-- main -->
<div id="sidebar">
    <?php if( osc_get_preference('sidebar-300x250', 'bender_black') != '') { ?>
    <!-- sidebar ad 350x250 -->
    <div class="ads_300">
        <?php echo osc_get_preference('sidebar-300x250', 'bender_black'); ?>
    </div>
    <!-- /sidebar ad 350x250 -->
    <?php } ?>
    <div class="widget-box">
        <?php if(osc_count_list_regions() > 0 ) { ?>
        <div class="box location">
            <h3><strong><?php _e("Location", 'bender_black') ; ?></strong></h3>
            <ul>
            <?php while(osc_has_list_regions() ) { ?>
                <li><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name() ; ?> <em>(<?php echo osc_list_region_items() ; ?>)</em></a></li>
            <?php } ?>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>
<div class="clear"><!-- do not close, use main clossing tag for this case -->
<?php if( osc_get_preference('homepage-728x90', 'bender_black') != '') { ?>
<!-- homepage ad 728x60-->
<div class="mx-auto">
    <?php echo osc_get_preference('homepage-728x90', 'bender_black'); ?>
</div>
<!-- /homepage ad 728x60-->
<?php } ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
