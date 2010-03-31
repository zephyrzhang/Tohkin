<?php
/*
Plugin Name: Lightbox Plus
Plugin URI: http://www.23systems.net/plugins/lightbox-plus/
Description: Lightbox Plus implements ColorBox as a lightbox image overlay tool for WordPress.  <a href="http://colorpowered.com/colorbox/">ColorBox</a> was created by Jack Moore of Color Powered and is licensed under the <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a>.
Author: Dan Zappone
Author URI: http://www.23systems.net/
Version: 1.6.9.7
*/
/*---- 8/30/2009 9:30:03 AM ----*/
global $post, $content;  // WordPress Globals
global $g_lightbox_plus_url;
$g_lightbox_plus_url = WP_PLUGIN_URL.'/lightbox-plus';
load_plugin_textdomain('lightboxplus', $path = $g_lightbox_plus_url);

if (!function_exists("lightboxPlusReload")) {
	function lightboxPlusReload($update) {
		$location = admin_url('/themes.php?page=lightboxplus');
		echo '<script type="text/javascript">'."\r\n";
		echo '<!--'."\r\n";
  	echo 'window.location="'.$location.'&updated='.$update.'"'."\r\n";
  	echo '//-->'."\r\n";
  	echo '</script>'."\r\n";
  }
}

if (!class_exists('wp_lightboxplus')) {

  class wp_lightboxplus {

    /*---- The name the options are saved under in the database ----*/
    var $lightboxOptionsName   = 'lightboxplus_options';
    var $lightboxInitName      = 'lightboxplus_init';
    var $lightboxStylePathName = 'lightboxplus_style_path';

    /*---- The PHP 4 Compatible Constructor ----*/
    function wp_lightboxplus( ) {
      $this->__construct( );
    }

    /*---- The PHP 5 Constructor ----*/
    function __construct( ) {
      $this->lightboxOptions = $this->getAdminOptions( $this->lightboxOptionsName );
      $this->lightboxInit = get_option( $this->lightboxInitName );
      if ( !$this->lightboxInit ) {
        $this->lightboxPlusInit( );
      }
		  add_filter( 'plugin_row_meta',array( &$this, 'RegisterLBPLinks'),10,2);
      add_action( 'admin_menu', array( &$this, 'lightboxPlusAddPages' ) );
      add_action( 'admin_head', array( &$this, 'lightboxPlusAdminHead' ) );
      add_action( 'wp_head', array( &$this, 'lightboxPlusAddHeader' ) );
      add_action( 'wp_footer', array( &$this, 'lightboxPlusAddFooter' ) );
      if ( !empty( $this->lightboxOptions ) ) {
        $lightboxPlusOptions = $this->getAdminOptions( $this->lightboxOptionsName );
        $autoLightbox = $lightboxPlusOptions['auto_lightbox'];
        $lightboxGallery = $lightboxPlusOptions['gallery_lightboxplus'];
      }
      if ( $autoLightbox != 1 ) {
        if ($lightboxGallery != 1) {
          add_filter( 'the_content', array( &$this, 'lightboxPlusReplace' ) );
        }
        else {
          remove_shortcode( 'gallery' );
          add_shortcode( 'gallery', array( &$this, 'lightboxPlusGallery' ), 10);
          add_filter( 'the_content', array( &$this, 'lightboxPlusReplace' ), 12 );
        }
      }
      add_action( "init", array( &$this, "addScripts" ) );
    }

    /*---- Retrieves the options from the database.  @return array ----*/
    function getAdminOptions( $optionsName ) {
      $savedOptions = get_option( $optionsName );
      if ( !empty( $savedOptions ) ) {
        foreach ( $savedOptions as $key => $option ) {
          $theOptions[$key] = $option;
        }
      }
      update_option( $optionsName, $theOptions );
      return $theOptions;
    }

    /*---- Saves the admin options to the database. ----*/
    function saveAdminOptions( $optionsName, $options ) {
      update_option( $optionsName, $options );
    }

    /*---- Tells WordPress to load the plugin JavaScript files and what library to use ----*/
    function addScripts( ) {
      global $g_lightbox_plus_url;
      wp_enqueue_script( 'lightbox', $g_lightbox_plus_url.'/js/jquery.colorbox-min.js', array( 'jquery' ), '1.3.6', true);
    }

    function getBaseName() {
		  return plugin_basename(__FILE__);
	  }

    function RegisterLBPLinks($links, $file) {
    	$base = wp_lightboxplus::getBaseName();
    	if ($file == $base) {
    		$links[] = '<a href="themes.php?page=lightboxplus">' . __('Settings') . '</a>';
    		$links[] = '<a href="http://www.23systems.net/plugins/lightbox-plus/frequently-asked-questions/">' . __('FAQ') . '</a>';
    		$links[] = '<a href="http://www.23systems.net/bbpress/forum/lightbox-plus">' . __('Support') . '</a>';
    		$links[] = '<a href="http://www.23systems.net/donate/">' . __('Donate') . '</a>';
    		$links[] = '<a href="http://twitter.com/23systems">' . __('Follow on Twitter') . '</a>';
    		$links[] = '<a href="http://www.facebook.com/pages/Austin-TX/23Systems-Web-Devsign/94195762502">' . __('Facebook Page') . '</a>';
    	}
    	return $links;
    }

    /*---- Parse page content looking for RegEx matches and add modify HTML to acomodate LBP display ----*/
    function lightboxPlusReplace( $content ) {
      global $post;
    	if (!empty($this->lightboxOptions)) {
				$lightboxPlusOptions   = $this->getAdminOptions($this->lightboxOptionsName);
	    }
      $postGroupID = $post->ID;
      /*---- Auto-Lightbox Match Patterns ----*/			
      $pattern_a[0] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)('|\")([^\>]*?)><img(.*?)title=('|\")(.*?)('|\")([^\>]*?)\/>/i";
			
			if ( $lightboxPlusOptions['text_links'] ) {
			  $pattern_a[1] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)('|\")([^\>]*?)>/i";
			}
      $pattern_a[2] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)('|\")(.*?)(rel=('|\")lightbox(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")lightbox(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
      $pattern_a[3] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)('|\")([^\>]*?)><img(.*?)/i";
      /*---- Replacement Patterns ---*/      
      /*---- In case Do Not Display Title is selected ----*/
      /*---- Contrary to what the option is called it now does the opposite ----*/
			switch ( $lightboxPlusOptions['display_title'] ) {
        case 1:
          switch ( $lightboxPlusOptions['class_method'] ) {
            case 1:
              $replacement_a[0] = '<a$1href=$2$3$4$5$6 class="'.$lightboxPlusOptions['class_name'].'" rel="lightbox['.$postGroupID.']"><img$7$11/>';   
              break;
            default:
              $replacement_a[0] = '<a$1href=$2$3$4$5$6 rel="lightbox['.$postGroupID.']"><img$7$11/>';
              break;
          }
          break;
        /*---- Display title ----*/
        default:
			    switch ( $lightboxPlusOptions['class_method'] ) {
  			    case 1:
  			      $replacement_a[0] = '<a$1href=$2$3$4$5$6 title="$9" class="'.$lightboxPlusOptions['class_name'].'" rel="lightbox['.$postGroupID.']"><img$7title=$8$9$10$11/>';
  			      break;
            default:
              $replacement_a[0] = '<a$1href=$2$3$4$5$6 title="$9" rel="lightbox['.$postGroupID.']"><img$7title=$8$9$10$11/>';
              break;
          }
        break;
			}
			
      switch ( $lightboxPlusOptions['text_links'] ) {
        case 1:
          switch ( $lightboxPlusOptions['class_method'] ) {
            case 1:
              $replacement_a[1] = '<a$1href=$2$3$4$5$6 class="'.$lightboxPlusOptions['class_name'].'" rel="lightbox['.$postGroupID.']">';
              break;
            default:
              $replacement_a[1] = '<a$1href=$2$3$4$5$6 rel="lightbox['.$postGroupID.']">';
              break;
        default:
            $replacement_a[1] = '<a$1href=$2$3$4$5$6 rel="lightbox['.$postGroupID.']">';
            break;
        }
      }
      
      $replacement_a[2] = '<a$1href=$2$3$4$5$6$7>';
      $replacement_a[3] = '<a$1href=$2$3$4$5$6 rel="lightbox['.$postGroupID.']"><img$7';
      
      $content = preg_replace( $pattern_a, $replacement_a, $content );
      /*---- Correct extra title and standardize quotes to double for links ---*/
      $pattern_b[0] = "/title='(.*?)'/i";
      $pattern_b[1] = "/href='([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)'/i";
      $pattern_b[2] = "/rel=('|\")lightbox(.*?)('|\") rel=('|\")lightbox(.*?)('|\")/i";
      $replacement_b[0] = '';
      $replacement_b[1] = 'href="$1$2"';
      $replacement_b[2] = 'rel=$1lightbox$2$3';
      $content = preg_replace( $pattern_b, $replacement_b, $content );
      return $content;
    }

    /*---- Add CSS styles to page header to activate LBP ----*/
    function lightboxPlusAddHeader( ) {
      global $g_lightbox_plus_url;
      if ( !empty( $this->lightboxOptions ) ) {
      
        $lightboxPlusOptions     = $this->getAdminOptions( $this->lightboxOptionsName );
        if ( $lightboxPlusOptions['disable_css'] ) {
          echo "<!-- User set lightbox styles -->".$this->EOL( ); 
        } else {
          $lightboxPlusStyleSheet = '<link rel="stylesheet" type="text/css" href="'.$g_lightbox_plus_url.'/css/'.$lightboxPlusOptions['lightboxplus_style'].'/colorbox.css" media="screen" />'.$this->EOL( );
          
          /*---- Check for and add conditional IE specific CSS fixes ----*/
          $currentStylePath       = get_option( 'lightboxplus_style_path' );
          $filename               = $currentStylePath.'/'.$lightboxPlusOptions['lightboxplus_style'].'/colorbox-ie.php';
          if ( file_exists( $filename ) ) {
            $lightboxPlusStyleSheet .= '<!--[if IE]>'.$this->EOL( );
            $lightboxPlusStyleSheet .= '     <link type="text/css" media="screen" rel="stylesheet" href="'.$g_lightbox_plus_url.'/css/'.$lightboxPlusOptions['lightboxplus_style'].'/colorbox-ie.php" title="IE fixes" />'.$this->EOL( );
            $lightboxPlusStyleSheet .= '<![endif]-->'.$this->EOL( );
          }
          echo $lightboxPlusStyleSheet;
        }
      }
    }

    /*---- Add JavaScript (jQuery) to page footer to activate LBP ----*/
    function lightboxPlusAddFooter( ) {
      global $g_lightbox_plus_url;
      if ( !empty( $this->lightboxOptions ) ) {
        $lightboxPlusOptions     = $this->getAdminOptions( $this->lightboxOptionsName );
        $lightboxPlusJavaScript  = "";
        $lightboxPlusJavaScript .= '<!-- Lightbox Plus v1.6.9.7 - 3/24/2010 AM -->'.$this->EOL( );
        $lightboxPlusJavaScript .= '<script type="text/javascript">'.$this->EOL( );
        $lightboxPlusJavaScript .= 'jQuery(document).ready(function($){'.$this->EOL( );
        $lightboxPlusFnA = '{transition:"'.$lightboxPlusOptions['transition'].'",speed:'.$lightboxPlusOptions['speed'].',width:'.$this->setValue( $lightboxPlusOptions['width'] ).',height:'.$this->setValue( $lightboxPlusOptions['height'] ).',innerWidth:'.$this->setValue( $lightboxPlusOptions['inner_width'] ).',innerHeight:'.$this->setValue( $lightboxPlusOptions['inner_height'] ).',initialWidth:'.$this->setValue( $lightboxPlusOptions['initial_width'] ).',initialHeight:'.$this->setValue( $lightboxPlusOptions['initial_height'] ).',maxWidth:'.$this->setValue( $lightboxPlusOptions['max_width'] ).',maxHeight:'.$this->setValue( $lightboxPlusOptions['max_height'] ).',scalePhotos:'.$this->setBoolean( $lightboxPlusOptions['resize'] ).',opacity:'.$lightboxPlusOptions['opacity'].',preloading:'.$this->setBoolean( $lightboxPlusOptions['preloading'] ).',current:"'.$lightboxPlusOptions['label_image'].' {current} '.$lightboxPlusOptions['label_of'].' {total}",previous:"'.$lightboxPlusOptions['previous'].'",next:"'.$lightboxPlusOptions['next'].'",close:"'.$lightboxPlusOptions['close'].'",overlayClose:'.$this->setBoolean( $lightboxPlusOptions['overlay_close'] ).',slideshow:'.$this->setBoolean( $lightboxPlusOptions['slideshow'] ).',slideshowAuto:'.$this->setBoolean( $lightboxPlusOptions['slideshow_auto'] ).',slideshowSpeed:'.$lightboxPlusOptions['slideshow_speed'].',slideshowStart:"'.$lightboxPlusOptions['slideshow_start'].'",slideshowStop:"'.$lightboxPlusOptions['slideshow_stop'].'"}';

        switch ( $lightboxPlusOptions['class_method'] ) {
          case 1:
            $lightboxPlusJavaScript .= '  $(".'.$lightboxPlusOptions['class_name'].'").colorbox('.$lightboxPlusFnA.');'.$this->EOL( );
            break;
          default:
            $lightboxPlusJavaScript .= '  $("a[rel*=lightbox]").colorbox('.$lightboxPlusFnA.');'.$this->EOL( );
            break;
        }        
        $lightboxPlusJavaScript .= '});'.$this->EOL( );
        $lightboxPlusJavaScript .= '</script>'.$this->EOL( );
        echo $lightboxPlusJavaScript;
      }
    }
        
    /*---- Replacement shortcode gallery function adds rel="lightbox" or class="cboxModal" ----*/
    function lightboxPlusGallery($attr) {
    	global $post;
    
    	static $instance = 0;
    	$instance++;
    
    	// Allow plugins/themes to override the default gallery template.
    	$output = apply_filters('post_gallery', '', $attr);
    	if ( $output != '' )
    		return $output;
    
    	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    	if ( isset( $attr['orderby'] ) ) {
    		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    		if ( !$attr['orderby'] )
    			unset( $attr['orderby'] );
    	}
    
    	extract(shortcode_atts(array(
    		'order'      => 'ASC',
    		'orderby'    => 'menu_order ID',
    		'id'         => $post->ID,
    		'itemtag'    => 'dl',
    		'icontag'    => 'dt',
    		'captiontag' => 'dd',
    		'columns'    => 3,
    		'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    	), $attr));
    
    	$id = intval($id);
		  
      if ( 'RAND' == $order )
		  $orderby = 'none';

      if ( !empty($include) ) {
      	$include = preg_replace( '/[^0-9,]+/', '', $include );
      	$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
      
      	$attachments = array();
      	foreach ( $_attachments as $key => $val ) {
      		$attachments[$val->ID] = $_attachments[$key];
      	}
      } 
      elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
      }
      else
      {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
      }
    
    	if ( empty($attachments) )
    		return '';
    
    	if ( is_feed() ) {
    		$output = "\n";
    		foreach ( $attachments as $att_id => $attachment )
    			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    		return $output;
    	}
    
    	$itemtag = tag_escape($itemtag);
    	$captiontag = tag_escape($captiontag);
    	$columns = intval($columns);
    	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    
    	$selector = "gallery-{$instance}";
    
    	$output = apply_filters('gallery_style', "
    		<style type='text/css'>
    			#{$selector} {
    				margin: auto;
    			}
    			#{$selector} .gallery-item {
    				float: left;
    				margin-top: 10px;
    				text-align: center;
    				width: {$itemwidth}%;			}
    			#{$selector} img {
    				border: 2px solid #cfcfcf;
    			}
    			#{$selector} .gallery-caption {
    				margin-left: 0;
    			}
    		</style>
    		<!-- see gallery_shortcode() in wp-includes/media.php -->
    		<div id='$selector' class='gallery galleryid-{$id}'>");
    
    	$i = 0;
    	foreach ( $attachments as $id => $attachment ) {
    		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
        
        $link = $this->lightboxPlusReplace($link);
    
    		$output .= "<{$itemtag} class='gallery-item'>";
    		$output .= "
    			<{$icontag} class='gallery-icon'>
    				$link
    			</{$icontag}>";
    		if ( $captiontag && trim($attachment->post_excerpt) ) {
    			$output .= "
    				<{$captiontag} class='gallery-caption'>
    				" . wptexturize($attachment->post_excerpt) . "
    				</{$captiontag}>";
    		}
    		$output .= "</{$itemtag}>";
    		if ( $columns > 0 && ++$i % $columns == 0 )
    			$output .= '<br style="clear: both" />';
    	}
    
    	$output .= "
    			<br style='clear: both;' />
    		</div>\n";
    
    	return $output;
    }

    /*---- Add some default options if they don't exist or if reinitialized ----*/
    function lightboxPlusInit( ) {
      global $g_lightbox_plus_url;
      delete_option( $this->lightboxOptionsName );
      delete_option( $this->lightboxInitName );
      delete_option( $this->lightboxStylePathName );
      $this->saveAdminOptions( $this->lightboxInitName, true );
      $lightboxPlusOptions = array(
        "lightboxplus_style"    => 'shadowed',
        "transition"            => 'elastic',
        "speed"                 => '350',
        "width"                 => 'false',
        "height"                => 'false',
        "inner_width"           => 'false',
        "inner_height"          => 'false',
        "initial_width"         => '300',
        "initial_height"        => '100',
        "max_width"             => 'false',
        "max_height"            => 'false',
        "resize"                => '1',
        "opacity"               => '0.8',
        "preloading"            => '1',
        "label_image"           => 'Image',
        "label_of"              => 'of',
        "previous"              => 'previous',
        "next"                  => 'next',
        "close"                 => 'close',
        "overlay_close"         => '1',
        "slideshow"             => '0',
        "slideshow_auto"        => '1',
        "slideshow_speed"       => '2500',
        "slideshow_start"       => 'start',
        "slideshow_stop"        => 'stop',
        "display_title"         => '0',
        "auto_lightbox"         => '0',
        "disable_css"           => '0',
        "class_method"          => '0',
        "class_name"            => 'cboxModal',
        "text_links"            => '0',
        "gallery_lightboxplus"  => '0'
      );
      $this->saveAdminOptions( $this->lightboxOptionsName, $lightboxPlusOptions );

      /*---- Where the styles reside ----*/
      $stylePath = ( dirname( __FILE__ )."/css" );
      $this->saveAdminOptions( $this->lightboxStylePathName, $stylePath );
    }

    /*---- Add styles to Admin Panel ----*/
    function lightboxPlusAdminHead( ) {
      global $g_lightbox_plus_url;
      echo '<link rel="stylesheet" type="text/css" href="'.$g_lightbox_plus_url.'/admin/admin.css" media="screen" />'.$this->EOL( );
    }

    /*---- Add new panel to WordPress under the Appearance category ----*/
    function lightboxPlusAddPages( ) {
      add_submenu_page( 'themes.php', "Lightbox Plus", "Lightbox Plus", 10, "lightboxplus", array( &$this, "lightboxPlusAdminPanel" ) );
    }

    /*---- The admin panel funtion - handles creating admin panel and processing of form submission ----*/
    function lightboxPlusAdminPanel( ) {
      global $g_lightbox_plus_url;
      load_plugin_textdomain( 'lightboxplus', $path = $g_lightbox_plus_url );
      $location = admin_url('/admin.php?page=lightboxplus');

      /*---- check form submission and update setting ----*/
      if ( $_POST['action'] ) {
        switch ( $_POST['sub'] ) {
          case 'settings':
            $lightboxPlusOptions = array(
              "lightboxplus_style"    => $_POST[lightboxplus_style],
              "transition"            => $_POST[transition],
              "speed"                 => $_POST[speed],
              "width"                 => $_POST[width],
              "height"                => $_POST[height],
              "inner_width"           => $_POST[inner_width],
              "inner_height"          => $_POST[inner_height],
              "initial_width"         => $_POST[initial_width],
              "initial_height"        => $_POST[initial_height],
              "max_width"             => $_POST[max_width],
              "max_height"            => $_POST[max_height],
              "resize"                => $_POST[resize],
              "opacity"               => $_POST[opacity],
              "preloading"            => $_POST[preloading],
              "label_image"           => $_POST[label_image],
              "label_of"              => $_POST[label_of],
              "previous"              => $_POST[previous],
              "next"                  => $_POST[next],
              "close"                 => $_POST[close],
              "overlay_close"         => $_POST[overlay_close],
              "slideshow"             => $_POST[slideshow],
              "slideshow_auto"        => $_POST[slideshow_auto],
              "slideshow_speed"       => $_POST[slideshow_speed],
              "slideshow_start"       => $_POST[slideshow_start],
              "slideshow_stop"        => $_POST[slideshow_stop],
              "display_title"         => $_POST[display_title],
              "auto_lightbox"         => $_POST[auto_lightbox],
              "text_links"            => $_POST[text_links],
              "disable_css"           => $_POST[disable_css],
              "class_method"          => $_POST[class_method],
              "class_name"            => $_POST[class_name],
              "gallery_lightboxplus"  => $_POST[gallery_lightboxplus],
            );
 
            $this->saveAdminOptions($this->lightboxOptionsName, $lightboxPlusOptions);
            lightboxPlusReload('settings');
            break;
          case 'reset':
            if ( !empty( $_POST[reinit_lightboxplus] )) {
              delete_option( $this->lightboxOptionsName );
              delete_option( $this->lightboxInitName );
              delete_option( $this->lightboxStylePathName );

              /*---- Used to remove old setting from previous versions of LBP ----*/
              $pluginPath = ( dirname( __FILE__ ));
              if ( file_exists( $pluginPath."/images" )) {
                echo "Deleting: ".$pluginPath."/images"."<br />";
                $this->delete_directory( $pluginPath."/images/" );
              } else {
                echo $pluginPath."/images"." already removed<br />";
              }
              if ( file_exists( $pluginPath."/js/"."lightbox.js" )) {
                echo "Deleting: ".$pluginPath."/js/"."lightbox.js"."<br />";
                $this->delete_file( $pluginPath."/js", "lightbox.js" );
              } else {
                echo $pluginPath."/js/"."lightbox.js"." already removed<br />";
              }
              $oldStyles = $this->dirList( $pluginPath."/css/" );
              if ( !empty( $oldStyles )) {
                foreach ( $oldStyles as $value ) {
                  if ( file_exists( $pluginPath."/css/".$value )) {
                    echo "Deleting: ".$pluginPath."/css/".$value."<br />";
                    $this->delete_file( $pluginPath."/css", $value );
                  }
                }
              }
              else {
                echo "Old styles already removed";
              }
            }
            /*---- Will reinitilize on reload where option lightboxplus_init is null ----*/
            lightboxPlusReload( 'reset' );
            break;
          default:
            break;
				} 
      }

      /*---- Get options to load in form ----*/
			if ( !empty( $this->lightboxOptions )) {	$lightboxPlusOptions   = $this->getAdminOptions( $this->lightboxOptionsName ); }

      /*---- Check if there are styles ----*/
      $stylePath = get_option( 'lightboxplus_style_path' );
      if ( $handle = opendir( $stylePath )) {
        while ( false !== ( $file = readdir( $handle ))) {
          if ( $file != "." && $file != ".." && $file != ".DS_Store" ) {
            $styles[$file] = $stylePath."/".$file."/";
          }
        }
        closedir( $handle );
      }

      $lightboxPlusStatus     = $_GET['updated'];
      if ($lightboxPlusStatus) {
        switch ($lightboxPlusStatus) {
  				case 'settings':
  				  echo '<div id="message" class="updated fade">';
  		    	_e( '<p><strong>Lightbox Plus settings have been saved</strong></p></div>','lightboxplus' );
  				  break;
  				case 'reset':
  				  echo '<div id="message" class="updated fade">';
  		    	_e(' <p><strong>Lightbox Plus has been reset to default settings.</strong></p></div>','lightboxplus' );
  				  break;
  				default:
  				  break;
				}
      }
?>
			<div class="wrap" id="lightbox">
				  <h2><?php _e( 'Lightbox Plus Options v1.6.9.7 (ColorBox v1.3.6)', 'lightboxplus' )?></h2>
				  <br style="clear:both;" />
<?php
			require('admin/admin-html.php');
?>
			</div>
      <script type="text/javascript">
  		<!--
  		jQuery('.postbox h3').click( function() { jQuery(jQuery(this).parent().get(0)).toggleClass('closed'); } );
  		jQuery('.postbox.close-me').each(function(){
  		jQuery(this).addClass("closed");
  		});
		
      function toggleVisibility(id) {
      var elmt = document.getElementById(id);
        if(elmt.style.display == 'block')
          elmt.style.display = 'none';
      else
        elmt.style.display = 'block';
      }
		  //-->
    	</script>      
<?php
    }

    /*---- CLASS UTILITY FUNCTIONS ----*/
    /*---- Not sure if WordPress has equivelents but cannot locate in API docs if so ----*/

    /*---- Create clean eols for source ----*/
    function EOL( ) {
      switch ( strtoupper( substr( PHP_OS, 0, 3 ) ) ) {
        case 'WIN':
          return "\r\n";
          break;
        case 'MAC':
          return "\r";
          break;
        default:
          return "\n";
          break;
      }
    }

    /*---- Create dropdown name from stylesheet ----*/
    function setProperName( $styleName ) {
      $proper = str_replace( '.css', '', $styleName );
      $proper = ucfirst( $proper );
      return $proper;
    }

    /*---- Convert DB booleans to text for use with JavaScript (jQuery) parameters ----*/
    function setBoolean( $nValue ) {
      switch ( $nValue ) {
        case 1:
          return 'true';
          break;
        default:
          return 'false';
          break;
      }
    }

    /*---- Convert DB booleans to text for use with JavaScript (jQuery) parameters ----*/
    function setValue( $rValue ) {
      if ($rValue == '' || $rValue == 'false') {
        $tmpValue = 'false';      
      } else {
        $tmpValue = '"'.$rValue.'"';
      }
      return $tmpValue;
    }

    /*---- Delete directory function used to remove old directories during upgrade from versions prior to 1.4 ----*/
    function delete_directory( $dirname ) {
      if ( is_dir( $dirname ) ) {
        $dir_handle = opendir( $dirname );
      }
      if ( !$dir_handle ) {
        return false;
      }
      while ( $file = readdir( $dir_handle ) ) {
        if ( $file != '.' && $file != '..' ) {
          if ( !is_dir( $dirname.'/'.$file ) ) {
            unlink( $dirname.'/'.$file );
          } else {
            delete_directory( $dirname.'/'.$file );
          }
        }
      }
      closedir( $dir_handle );
      rmdir( $dirname );
      return true;
    }

    /*---- Delete directory function used to remove old directories during upgrade from versions prior to 1.4 ----*/
    function delete_file( $dirname, $file ) {
      if ( $file != '.' && $file != '..' ) {
        if ( !is_dir( $dirname.'/'.$file ) ) {
          unlink( $dirname.'/'.$file );
        }
        return true;
      }
    }

    /*---- List directory function used to iterate theme directories ----*/
    function dirList( $dirname ) {
      $types = array(
        'css',
      );
      $results = array( );
      $dir_handle = opendir( $dirname );
      while ( $file = readdir( $dir_handle ) ) {
        $type = strtolower( substr( strrchr( $file, '.' ), 1 ) );
        if ( in_array( $type, $types ) ) {
          array_push( $results, $file );
        }
      }
      closedir( $dir_handle );
      sort( $results );
      return $results;
    }

  } /*---- END CLASS ----*/
} /*---- END CLASS CHECK ----*/

/*---- instantiate the class  ----*/
if (class_exists('wp_lightboxplus')) { $wp_lightboxplus = new wp_lightboxplus(); }