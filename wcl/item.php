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
    if( osc_item_is_spam() || osc_premium_is_spam() ) {
        osc_add_hook('header','bender_black_nofollow_construct');
    } else {
        osc_add_hook('header','bender_black_follow_construct');
    }

    osc_enqueue_script('fancybox');
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('jquery-validate');

    bender_black_add_body_class('item');
    osc_add_hook('after-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('item-sidebar.php');
    }

    $location = array();
    if( osc_item_city_area() !== '' ) {
        $location[] = osc_item_city_area();
    }
    if( osc_item_city() !== '' ) {
        $location[] = osc_item_city();
    }
    if( osc_item_region() !== '' ) {
        $location[] = osc_item_region();
    }
    if( osc_item_country() !== '' ) {
        $location[] = osc_item_country();
    }

    osc_current_web_theme_path('header.php');
?>
<div id="item-content">
        <div class="p-2"><?php if( osc_price_enabled_at_items() ) { ?>
	        <span class="float-right bg-warning h2 px-2"><?php echo osc_item_formated_price(); ?></span> 
	        <?php } ?>
	        <span class="h1"><?php echo osc_item_title(); ?></span>
        </div>
        <div class="item-header">
            <div>
                <?php if ( osc_item_pub_date() !== '' ) { printf( __('<strong class="publish">Published date</strong>: %1$s', 'bender_black'), osc_format_date( osc_item_pub_date() ) ); } ?>
            </div>
            <div>
                <?php if ( osc_item_mod_date() !== '' ) { printf( __('<strong class="update">Modified date:</strong> %1$s', 'bender_black'), osc_format_date( osc_item_mod_date() ) ); } ?>
            </div>
            <?php if (count($location)>0) { ?>
                <ul id="item_location">
                    <li><strong><?php _e("Location", 'bender_black'); ?></strong>: <?php echo implode(', ', $location); ?></li>
                </ul>
            <?php }; ?>
        </div>
        <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
            <p id="edit_item_view">
                <strong>
                    <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender_black'); ?></a>
                </strong>
            </p>
        <?php } ?>


    <?php if( osc_images_enabled_at_items() ) { ?>
        <?php
        if( osc_count_item_resources() > 0 ) {
            $i = 0;
        ?>
        <div class="item-photos">
            <a href="<?php echo osc_resource_url(); ?>" title="<?php _e('Image', 'bender_black'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
                <img class="img-fluid" src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
            </a>
            <div class="thumbs">
                <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                <a href="<?php echo osc_resource_url(); ?>" class="fancybox" data-fancybox-group="group" title="<?php _e('Image', 'bender_black'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
                    <img src="<?php echo osc_resource_thumbnail_url(); ?>" width="75" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                </a>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
    <div id="description" class="card p-4 mb-4">
        <?php echo osc_item_description(); ?>
        <div id="custom_fields">
            <?php if( osc_count_item_meta() >= 1 ) { ?>
                <br />
                <div class="meta_list">
                    <?php while ( osc_has_item_meta() ) { ?>
                        <?php if(osc_item_meta_value()!='') { ?>
                            <div class="meta">
                                <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php osc_run_hook('item_detail', osc_item() ); ?>
        <p class="contact_button">
            <?php if( !osc_item_is_expired () ) { ?>
            <?php if( !( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) ) { ?>
                <?php     if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                    <a href="#contact" class="ui-button ui-button-middle ui-button-main resp-toogle"><?php _e('Contact seller', 'bender_black'); ?></a>
                <?php     } ?>
            <?php     } ?>
            <?php } ?>
<!--           <a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="ui-button ui-button-middle"><?php _e('Share', 'bender_black'); ?></a>-->
        </p>
        <?php osc_run_hook('location'); ?>
    </div>
    <!-- plugins -->
    <div id="useful_info" class="card">
	    <div class="card-body">
	       <div class="card-title">
		       <h3><?php _e('Useful information', 'bender_black'); ?></h3>
	       </div>
	        <ul class="text-muted">
	            <li><?php _e('Avoid scams by acting locally or paying with PayPal', 'bender_black'); ?></li>
	            <li><?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'bender_black'); ?></li>
	            <li><?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'bender_black'); ?></li>
	            <li><?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'bender_black'); ?></li>
	        </ul>
        </div>
    </div>

        <?php related_listings(); ?>
        <?php if( osc_count_items() > 0 ) { ?>
        <div class="similar_ads">
            <h2><?php _e('Related listings', 'bender_black'); ?></h2>
            <?php
            View::newInstance()->_exportVariableToView("listType", 'items');
            osc_current_web_theme_path('loop.php');
            ?>
            <div class="clear"></div>
        </div>
    <?php } ?>
    <?php if( osc_comments_enabled() ) { ?>
        <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
        <div id="comments">
            <h2><?php _e('Comments', 'bender_black'); ?></h2>
            <ul id="comment_error_list"></ul>
            <?php CommentForm::js_validation(); ?>
            <?php if( osc_count_item_comments() >= 1 ) { ?>
                <div class="comments_list">
                    <?php while ( osc_has_item_comments() ) { ?>
	                    <div class="media text-muted pt-3">
					          <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
						          <div class="d-flex justify-content-between align-items-center w-100">
						            <strong class="text-gray-dark">@<?php echo osc_comment_author_name(); ?></strong>
						            <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
	                                <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'bender_black'); ?>"><?php _e('Delete', 'bender_black'); ?></a>
	                            <?php } ?>
						          </div>
						          <span class="d-block"><?php echo nl2br( osc_comment_body() ); ?></span>
					          </div>
					        </div>
                    <?php } ?>
                    <div class="paginate" style="text-align: right;">
                        <?php echo osc_comments_pagination(); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
	                <div class="card-title">
	                    <span class="h6"><?php _e('Leave your comment (spam and offensive messages will be removed)', 'bender_black'); ?></span>
	                </div><hr>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                            <input type="hidden" name="action" value="add_comment" />
                            <input type="hidden" name="page" value="item" />
                            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                            <?php if(osc_is_web_user_logged_in()) { ?>
                                <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                            <?php } else { ?>
                                <div class="form-group">
                                    <label class="control-label" for="authorName"><?php _e('Your name', 'bender_black'); ?></label>
                                    <div class="controls">
                                        <?php CommentForm::author_input_text(); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="authorEmail"><?php _e('Your e-mail', 'bender_black'); ?></label>
                                    <div class="controls">
                                        <?php CommentForm::email_input_text(); ?>
                                    </div>
                                </div>
                            <?php }; ?>
                            
                            <div class="form-group">
                                <label class="control-label" for="body"><?php _e('Comment', 'bender_black'); ?></label>
                                <div class="controls textarea">
                                    <?php CommentForm::body_input_textarea(); ?>
                                </div>
                            </div>
                          <button type="submit" class="btn btn-primary"><?php _e('Send', 'bender_black'); ?></button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
