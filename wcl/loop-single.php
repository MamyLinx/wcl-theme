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
?>

<?php $size = explode('x', osc_thumbnail_dimensions()); ?>

<div class="media col-md-4 text-muted mt-2 px-0">
	 <div class="col-3 p-1 text-center">
	      <?php if( osc_images_enabled_at_items() ) { ?>
		        <?php if(osc_count_item_resources()) { ?>
				      <a href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" class="w-75 img-fluid" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"></a>
		        <?php } else { ?>
		            <a href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" class="w-75 img-fluid" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"></a>
		        <?php } ?>
		    <?php } ?>
	 </div>
	 <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray">
			  <strong class="d-block text-gray-dark"><a href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>">
	        	<?php echo osc_highlight(osc_item_title(),45) ; ?></a></strong>
			   <span><?php echo osc_item_category() ; ?></span> -
           <i><?php echo osc_item_city(); ?> <?php if( osc_item_region()!='' ) { ?> (<?php echo osc_item_region(); ?>)<?php } ?></i> 
           <br>
           <i class="fa fa-calendar">&nbsp;</i><?php echo osc_format_date(osc_item_pub_date()); ?>&nbsp;
           <?php if( osc_price_enabled_at_items() ) { ?>
           <span class="text-success"><i class="fa fa-tag"></i><?php echo osc_format_price(osc_item_price()); ?></span>
           <?php } ?> 
           <?php if($admin){ ?>
              <span class="card-text">
                  <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender_black'); ?></a>
                  <span>|</span>
                  <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender_black')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'bender_black'); ?></a>
                  <?php if(osc_item_is_inactive()) {?>
                  <span>|</span>
                  <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'bender_black'); ?></a>
                  <?php } ?>
              </span>
          <?php } ?>
	 </p>
</div>