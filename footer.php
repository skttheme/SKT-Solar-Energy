<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Solar Energy
 */
$footer_text = esc_html(get_theme_mod('footer_text'));
$hidefooter = esc_html(get_theme_mod('hide_footer_info', 1)); 
if($hidefooter == ''){?>
<div class="footer-infobox">
<div class="center">
<div class="footer-infobox-left"><div class="fotinfo-content1"><?php $phone_title = get_theme_mod('phone_title'); 
if (!empty($phone_title)) { ?><img src="<?php echo esc_url(get_template_directory_uri());?>/images/footer-info-icon1.png" alt="fot-icon"><div class="fot-phone"><h5><?php echo esc_html($phone_title); ?></h5><?php } $phone_number = get_theme_mod('phone_number'); if (!empty($phone_number)) { ?><span><?php echo esc_html($phone_number); ?></span><?php } ?></div></div></div>
<div class="footer-infobox-center"><div class="fotinfo-content2"><?php $email_title = get_theme_mod('email_title'); if (!empty($email_title)) { ?>   
<img src="<?php echo esc_url(get_template_directory_uri());?>/images/footer-info-icon2.png" alt="fot-icon"><div class="fot-email"><h5><?php echo esc_html($email_title); ?></h5><?php } $email_address = get_theme_mod('email_address'); if (!empty($email_address)) { ?><span><?php echo esc_html( antispambot( $email_address ) ); ?></span><?php } ?></div></div></div>
<div class="footer-infobox-right"><div class="fotinfo-content3"><?php $address = get_theme_mod('address'); if (!empty($address)) { ?><img src="<?php echo esc_url(get_template_directory_uri());?>/images/footer-info-icon3.png" alt="fot-icon"><div class="fot-add"><span><?php echo esc_html($address); ?></span>
<?php } ?></div></div></div>
<div class="clear"></div>
</div>
</div>
<?php } ?>
<div id="footer">
<div class="copyright-area">
<?php if ( is_active_sidebar( 'fc-1' ) || is_active_sidebar( 'fc-2' ) || is_active_sidebar( 'fc-3' )) : ?>
<div class="footerarea">
    	<div class="container footer ftr-widg">
        	<div class="footer-row">
            <?php if ( is_active_sidebar( 'fc-1' ) ) : ?>
            <div class="cols-3 widget-column-1">  
              <?php dynamic_sidebar( 'fc-1' ); ?>
            </div><!--end .widget-column-1-->                  
    		<?php endif; ?> 
			<?php if ( is_active_sidebar( 'fc-2' ) ) : ?>
            <div class="cols-3 widget-column-2">  
            <?php dynamic_sidebar( 'fc-2' ); ?>
            </div><!--end .widget-column-2-->
            <?php endif; ?> 
			<?php if ( is_active_sidebar( 'fc-3' ) ) : ?>    
            <div class="cols-3 widget-column-3">  
            <?php dynamic_sidebar( 'fc-3' ); ?>
            </div><!--end .widget-column-3-->
			<?php endif; ?> 	
            <div class="clear"></div>
            </div>
        </div><!--end .container--> 
</div>
<?php endif; ?>         
<div class="copyright-wrapper">
<div class="container">
     <div class="copyright-txt">
     
 			<?php if (!empty($footer_text)) { ?><?php echo esc_html($footer_text); ?><?php } ?>
        	<?php bloginfo('name'); ?> <?php esc_html_e('Theme By ','skt-solar-energy');?>  <a href="<?php echo esc_url('https://www.sktthemes.org/shop/free-clean-energy-wordpress-theme');?>" target="_blank">
        <?php esc_html_e('SKT Themes','skt-solar-energy'); ?>
        </a>
        </div>
     <div class="clear"></div>
</div>           
</div>
</div><!--end #copyright-area-->
</div>
<?php wp_footer(); ?>
</body>
</html>