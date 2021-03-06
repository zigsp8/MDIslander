<?php /* 
	Mods:
		12Aug2014 - Move Masthead around, use image for youtube, add calendar for date.
		9Sept2014 - take out search button & make saarch always show.
		28Oct2014 - add data-cfasync="false" to broadscreet init js
		12Nov14 zig - add google custom search.
*/
global $theme_url, $prl_data; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'PressLayer' ), max( $paged, $page ) );
	?></title>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:image" content="http://www.mdislander.com/wp-content/themes/origmag-mdi/images/ogi-mdi.jpg">
	<?php if($prl_data['site_fav']!='') {?>
	<link rel="shortcut icon" href="<?php echo trim($prl_data['site_fav']);?>">
	<?php } ?>
    <script data-cfasync="false" type="text/javascript" src="http://cdn.broadstreetads.com/init.js"></script>

<?php wp_head();?>	
	<?php if ( is_home() || is_front_page() )  { ?>
    	<meta http-equiv='Cache-Control' content='no-cache'>
    <?php }  ?>

<script type='text/javascript'>
(function() {
var useSSL = 'https:' == document.location.protocol;
var src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
})();
</script>

<script type='text/javascript'>
googletag.defineSlot('/5133009/mdi300x600', [[300, 250], [300, 600]], 'div-gpt-ad-1414724069544-0').addService(googletag.pubads());
googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.enableServices();
</script>
	
</head>
<?php
$body_class = array('Boxed'=>'site-boxed', 'Wide'=>'site-wide');
?>
<body <?php body_class($body_class[$prl_data['site_style']]); ?>>
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<div class="site-wrapper">
    <!--<div class="prl-container">-->

		<header id="masthead" class="clearfix">
			<div class="prl-container">
				<?php /* search box moved to top  hidden at tablet size*/ ?>
				<?php if($prl_data['header_search_btn']!='Disable'):?>
				<div class="prl-nav-flip-top hidden-tablet">
					<?php /*  <div class="right"><a href="#" id="search_btn" class="prl-nav-toggle prl-nav-toggle-search search_zoom" title="Search"></a></div> */ ?>
					<div class="search_form-top-gcs eai-gsc-nav" style="display: none;">
						<script>
						  (function() {
						    var cx = '004781325057155505268:ushh3sbawxu';
						    var gcse = document.createElement('script');
						    gcse.type = 'text/javascript';
						    gcse.async = true;
						    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
						        '//www.google.com/cse/cse.js?cx=' + cx;
						    var s = document.getElementsByTagName('script')[0];
						    s.parentNode.insertBefore(gcse, s);
						  })();
						</script>
						<gcse:searchbox-only></gcse:searchbox-only> 
					</div>
					<div id="search_form-top" class="nav_search">
						<form class="prl-search" action="<?php echo home_url();?>">
							<input style="min-width: 100px;" type="text" id="s" name="s" value="" placeholder="&#xF002;" class="nav_search_input" />
							<?php /* <input type="text" id="s" name="s" value="" placeholder="<?php _e('Search ...','presslayer');?>" class="nav_search_input" /> */ ?>
						</form>
					</div>
				</div>
					
				<?php endif;?>
				<?php /* add top nav menu  - added by zig */ ?>
				<nav id="topnav" class="hidden-tablet">
					<div class="nav-wrapper clearfix">
					<?php if ( has_nav_menu( 'top_nav' ) ) :
						wp_nav_menu( array (
							'theme_location' => 'top_nav',
							'container' => false,
							'menu_class' => 'sf-menu eai-menu',
							'menu_id' => 'top-menu',
							'depth' => 2,
							'fallback_cb' => false) );
					endif; ?>
					</div>
				</nav>
				
			</div> <?php /* end pr1-container for top menu & search */ ?>
			<div class="prl-container top-header"><div class="masthead-bg clearfix">
				<div class="prl-header-logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo sitelogo();?>" alt="<?php bloginfo('name'); ?>" /></a>
				</div>
				<div class="prl-header-mid">
					<?php  if($prl_data['header_custom_text']!=''){?>
					<span class="prl-header-custom-text"><?php echo trim($prl_data['header_custom_text']);?></span>
					<?php  } if($prl_data['header_time']!='Disable'){ $current_site = get_current_site();  ?>
					<span class="prl-header-time"><a href="<?php echo $current_site->domain; ?>/calendar/events/today/"><i class="fa fa-calendar"></i><?php echo date('l');?> - <?php echo date('M d, Y');?></a></span>
					<?php } ?>
				</div>
				<div class="prl-header-social">
					<?php if($prl_data['header_facebook']!=''){?><a href="<?php echo $prl_data['header_facebook'];?>" class="fa fa-facebook" title="Facebook" target="_blank"></a><?php }?>
					<?php if($prl_data['header_twitter']!=''){?><a href="https://twitter.com/<?php echo $prl_data['header_twitter'];?>" class="fa fa-twitter" title="Twitter" target="_blank"></a><?php }?>
					<?php if($prl_data['header_pinterest']!=''){?><a href="http://www.pinterest.com/<?php echo $prl_data['header_pinterest'];?>" class="fa fa-pinterest" title="Pinterest" target="_blank"></a><?php }?>
					<?php if($prl_data['header_google_plus']!=''){?><a href="<?php echo $prl_data['header_google_plus'];?>" class="fa fa-google-plus" title="Google plus"></a><?php }?>
					<?php if($prl_data['header_linkedin']!=''){?><a href="<?php echo $prl_data['header_linkedin'];?>" class="fa fa-linkedin" title="LinkedIn"></a><?php }?>
                    <?php if($prl_data['header_instagram']!=''){?><a href="<?php echo $prl_data['header_instagram'];?>" class="fa fa-instagram" title="Instagram"></a><?php }?>
                    <?php if($prl_data['header_youtube']!=''){?><a href="<?php echo $prl_data['header_youtube'];?>" class="youtube-pic" title="Youtube"><img src="<?php echo get_stylesheet_directory_uri().'/images/youtube.jpg'; ?>"</a><?php }?>
				</div>
				</div>
			</div>					
		</header>
		<nav id="nav" class="prl-navbar" role="navigation">
			<div class="prl-container">
				<div class="nav-wrapper clearfix centered-menu">
				<?php
				// Main Menu
				if ( has_nav_menu( 'main_nav' ) ) :
					
					$args = array (
						'theme_location' => 'main_nav',
						'container' => false,
						'container_class' => 'prl-navbar',
						'menu_class' => 'sf-menu',
						'menu_id' => 'sf-menu',
						'depth' => 4,
						'fallback_cb' => false
						
					 );
					if($prl_data['megamenu']!='Disable'):
						$mega = array ('walker' => new TMMenu());
						$args = array_merge($mega, $args);
					endif;
					wp_nav_menu($args);
				 else:
					echo '<div class="message warning"><i class="icon-warning-sign"></i>' . __( 'Define your site main menu', 'presslayer' ) . '</div>';
				 endif;
				 
				?>
				
				<div class="nav_menu_control"><a href="#" data-prl-offcanvas="{target:'#offcanvas'}"><span class="prl-nav-toggle prl-nav-menu"></span><span class="nav_menu_control_text"><?php _e('','presslayer');?></span></a>
				</div>
				<?php if($prl_data['header_search_btn']!='Disable'):?>
				<div class="prl-nav-flip show-tablet">
					<?php /*  <div class="right"><a href="#" id="search_btn" class="prl-nav-toggle prl-nav-toggle-search search_zoom" title="Search"></a></div> */ ?>
					
					<div id="search_form" class="nav_search show-tablet">

						<form class="prl-search" action="<?php echo home_url();?>">
							<input style="min-width: 100px;" type="text" id="s" name="s" value="" placeholder="&#xF002;" class="nav_search_input" width="20" />
							<?php /* <input type="text" id="s" name="s" value="" placeholder="<?php _e('Search ...','presslayer');?>" class="nav_search_input" /> */ ?>
						</form>
					</div>
					<div class="nav_search eai-gsc-nav" style="display: none;">
						<gcse:searchbox-only></gcse:searchbox-only> 
					<div>
				</div>
				<?php endif;?>
				
				</div>
			</div>
		</nav>
		
		<script>
			var $ = jQuery.noConflict();
			$(document).ready(function() { 
				var example = $('#sf-menu').superfish({
					delay:       100,
					animation:   {opacity:'show',height:'show'},
					dropShadows: false,
					autoArrows:  false
				});
			});
			
		</script>
        
    <!--</div>-->
	<?php $offstr = get_template_directory().'/offcanvas.php'; require_once ($offstr);?>

