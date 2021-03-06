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

<div class="media col-md-6 text-muted m-1 px-1 bg-orange premium">
			 <div class="col-3 p-1 text-center my-auto">
	          <?php if( osc_images_enabled_at_items() ) { ?>
	          <a class="text-default" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>">
				        <?php if(osc_count_premium_resources()) { ?>
				            <img class="w-100 img-fluid" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>">
				        <?php } else { ?>
				            <img class="w-100 img-fluid" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>">
				        <?php } ?>
			    <?php } ?>
			    </a>
		    </div>
          <p class="media-body p-2 mb-0 small lh-125">
	          <a class="text-default" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>">
	            <strong class="d-block text-gray-dark"><?php echo osc_highlight(osc_premium_title(),30) ; ?></strong>
            </a>
            <span><?php echo osc_premium_category() ; ?></span>-
            <span><?php echo osc_premium_city(); ?> <?php if(osc_premium_region()!='') { ?>(<?php echo osc_premium_region(); ?>)<?php } ?></span><br>
            <i class="fa fa-calendar">&nbsp;</i><?php echo osc_format_date(osc_premium_pub_date()); ?>&nbsp;
            <?php if( osc_price_enabled_at_items() ) { ?>
               <span class="text-success"><i class="fa fa-tag"></i><?php echo osc_format_price(osc_premium_price(),osc_premium_currency_symbol()); ?></span>
            <?php } ?>
            <span class="descr text-dark d-xl-block d-none"><?php echo osc_highlight(strtolower(osc_premium_description()), 90 ); ?></span>
             <?php if($admin){ ?>
                 <span class="admin-options">
                     <a href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender_black'); ?></a>
                     <span>|</span>
                     <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender_black')); ?>')" href="<?php echo osc_premium_delete_url();?>" ><?php _e('Delete', 'bender_black'); ?></a>
                     <?php if(osc_premium_is_inactive()) {?>
                     <span>|</span>
                     <a href="<?php echo osc_premium_activate_url();?>" ><?php _e('Activate', 'bender_black'); ?></a>
                     <?php } ?>
                 </span>
             <?php } ?>
          </p>

</div>	