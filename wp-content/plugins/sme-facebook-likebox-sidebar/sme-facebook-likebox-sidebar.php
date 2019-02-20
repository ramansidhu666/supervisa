<?php
/**
 * @package sme-facebook-likebox-sidebar
*/
/*
Plugin Name: SME Facebook Like Box Sidebar
Plugin URI: http://www.socialmediaextensions.com
Description: Thanks for installing SME Facebook Like Box Sidebar
Version: 1.0
Author: John Steel
Author URI: http://www.socialmediaextensions.com
*/
class SMEFacebookLikeboxSidebar{
    
    public $options;
    
    public function __construct() {
        //you can run delete_option method to reset all data
        //delete_option('sme_fb_plugin_options');
        $this->options = get_option('sme_fb_plugin_options');
        $this->sme_fb_register_settings_and_fields();
    }
    
    public function add_sme_fb_tools_options_page(){
        add_options_page('SME Facebook Likebox Sidebar', 'SME Facebook Likebox Sidebar Configuration', 'administrator', __FILE__, array('SMEFacebookLikeboxSidebar','sme_fb_tools_options'));
    }
    
    public function sme_fb_tools_options(){
?>
<div class="wrap">
    <?php screen_icon(); ?>
    <h2>SME Facebook Likebox Sidebar</h2>
    <form method="post" action="options.php" enctype="multipart/form-data">
        <?php settings_fields('sme_fb_plugin_options'); ?>
        <?php do_settings_sections(__FILE__); ?>
        <p class="submit">
            <input name="submit" type="submit" class="button-primary" value="Save Changes"/>
        </p>
    </form>
</div>
<?php
    }
    public function sme_fb_register_settings_and_fields(){
        register_setting('sme_fb_plugin_options', 'sme_fb_plugin_options',array($this,'sme_fb_validate_settings'));
        add_settings_section('sme_fb_main_section', 'Settings', array($this,'sme_fb_main_section_cb'), __FILE__);
        //Start Creating Fields and Options
        //sidebar image
        add_settings_field('sidebarImage', 'Sidebar Image', array($this,'sidebarImage_settings'),__FILE__,'sme_fb_main_section');
        //marginTop
        add_settings_field('marginTop', 'Margin Top', array($this,'marginTop_settings'), __FILE__,'sme_fb_main_section');
        //pageURL
        add_settings_field('pageURL', 'Facebook Page URL', array($this,'pageURL_settings'), __FILE__,'sme_fb_main_section');
        //connection
        add_settings_field('connection', 'Connections Want to Show', array($this,'connection_settings'), __FILE__,'sme_fb_main_section');
        //width
        add_settings_field('width', 'Width', array($this,'width_settings'), __FILE__,'sme_fb_main_section');
        //height
        add_settings_field('height', 'Height', array($this,'height_settings'), __FILE__,'sme_fb_main_section');
        //streams options
        add_settings_field('streams', 'Streams', array($this,'streams_settings'),__FILE__,'sme_fb_main_section');
        //color_scheme options
        add_settings_field('color_scheme', 'Color Scheme', array($this,'color_scheme_settings'),__FILE__,'sme_fb_main_section');
        //show_faces options
        add_settings_field('show_faces', 'Show Faces', array($this,'show_faces_settings'),__FILE__,'sme_fb_main_section');
        //header options
        add_settings_field('header', 'Show Header', array($this,'header_settings'),__FILE__,'sme_fb_main_section');
        //border options
        add_settings_field('border', 'Show Border', array($this,'border_settings'),__FILE__,'sme_fb_main_section');
        //jQuery options
        //moduleclass_sfx
        add_settings_field('moduleclass_sfx', 'Module Class Suffix', array($this,'moduleclass_sfx_settings'), __FILE__,'sme_fb_main_section');
    }
    public function sme_fb_validate_settings($plugin_options){
        return($plugin_options);
    }
    public function sme_fb_main_section_cb(){
        //optional
    }
    //sidebarImage_settings
    public function sidebarImage_settings() {
        if(empty($this->options['sidebarImage'])) $this->options['sidebarImage'] = "ficon1";
        $items = array('ficon1','ficon2','ficon3');
        echo "<div class='sidebarImageRadioOptions'>";
        foreach($items as $item){
            $checked = ($this->options['sidebarImage'] === $item) ? 'checked = "checked"' : '';
            $plgURL = plugins_url('sme-facebook-likebox-sidebar/assets/');
            echo "<input type='radio' name='sme_fb_plugin_options[sidebarImage]' value='$item' $checked>
                    <img src='$plgURL$item.png'/><br>";
        }
        echo "</div>";
    }
    //marginTop_settings
    public function marginTop_settings() {
        if(empty($this->options['marginTop'])) $this->options['marginTop'] = "100";
        echo "<input name='sme_fb_plugin_options[marginTop]' type='text' value='{$this->options['marginTop']}' />";
    }
    //pageURL_settings
    public function pageURL_settings() {
        if(empty($this->options['pageURL'])) $this->options['pageURL'] = "https://www.facebook.com/facebook";
        echo "<input name='sme_fb_plugin_options[pageURL]' type='text' value='{$this->options['pageURL']}' />";
    }
    //connection_settings
    public function connection_settings() {
        if(empty($this->options['connection'])) $this->options['connection'] = "10";
        echo "<input name='sme_fb_plugin_options[connection]' type='text' value='{$this->options['connection']}' />";
    }
    //width_settings
    public function width_settings() {
        if(empty($this->options['width'])) $this->options['width'] = "292";
        echo "<input name='sme_fb_plugin_options[width]' type='text' value='{$this->options['width']}' />";
    }
    //height_settings
    public function height_settings() {
        if(empty($this->options['height'])) $this->options['height'] = "630";
        echo "<input name='sme_fb_plugin_options[height]' type='text' value='{$this->options['height']}' />";
    }
    //streams_settings
    public function streams_settings(){
        if(empty($this->options['streams'])) $this->options['streams'] = "true";
        $items = array('true','false');
        echo "<select name='sme_fb_plugin_options[streams]'>";
        foreach($items as $item){
            $selected = ($this->options['streams'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    //color_scheme_settings
    public function color_scheme_settings(){
        if(empty($this->options['color_scheme'])) $this->options['color_scheme'] = "light";
        $items = array('light','dark');
        echo "<select name='sme_fb_plugin_options[color_scheme]'>";
        foreach($items as $item){
            $selected = ($this->options['color_scheme'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    //show_faces_settings
    public function show_faces_settings(){
        if(empty($this->options['show_faces'])) $this->options['show_faces'] = "true";
        $items = array('true','false');
        echo "<select name='sme_fb_plugin_options[show_faces]'>";
        foreach($items as $item){
            $selected = ($this->options['show_faces'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    //header_settings
    public function header_settings(){
        if(empty($this->options['header'])) $this->options['header'] = "true";
        $items = array('true','false');
        echo "<select name='sme_fb_plugin_options[header]'>";
        foreach($items as $item){
            $selected = ($this->options['header'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    //border_settings
    public function border_settings(){
        if(empty($this->options['border'])) $this->options['border'] = "true";
        $items = array('true','false');
        echo "<select name='sme_fb_plugin_options[border]'>";
        foreach($items as $item){
            $selected = ($this->options['border'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    //moduleclass_sfx_settings
    public function moduleclass_sfx_settings(){
        if(empty($this->options['moduleclass_sfx'])) $this->options['moduleclass_sfx'] = "";
        echo "<input name='sme_fb_plugin_options[moduleclass_sfx]' type='text' value='{$this->options['moduleclass_sfx']}' />";
    }
    // put jQuery settings before here
}
add_action('admin_menu', 'sme_fb_trigger_options_function');

function sme_fb_trigger_options_function(){
    SMEFacebookLikeboxSidebar::add_sme_fb_tools_options_page();
}

add_action('admin_init','sme_fb_trigger_create_object');
function sme_fb_trigger_create_object(){
    new SMEFacebookLikeboxSidebar();
}
add_action('wp_footer','sme_fb_add_content_in_footer');
function sme_fb_add_content_in_footer(){
    
    $o = get_option('sme_fb_plugin_options');
    extract($o);
$print_facebook = '';
$print_facebook = '<div class="fb-page" data-href="'.$pageURL.'" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="'.$width.'" data-height="'.trim($height-10).'"data-hide-cover="false" data-show-facepile="'.$show_faces.'"><div class="fb-xfbml-parse-ignore"><blockquote cite="'.$pageURL.'"><a href="'.$pageURL.'">Facebook</a></blockquote></div></div>';
$print_facebook .= '<div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;"><a href="http://www.crayfishstudios.com" target="_blank" style="color: #808080;" title="Click here">Crayfish Dallas</a></div>';
$plgURL = plugins_url('sme-facebook-likebox-sidebar/assets/');
$sidebarImgURL = $plgURL . $sidebarImage . '.png';
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="sw_facebook_display" class="<?php echo $moduleclass_sfx; ?>">
	<div id="fbbox1" style="right: -<?php echo trim($width+10);?>px; top: <?php echo $marginTop;?>px; z-index: 10000; height:<?php echo trim($height);?>px;">
		<div id="fbbox2" style="text-align: left;width:<?php echo trim($width);?>px;height:<?php echo trim($height);?>;">
			<a class="open" id="fblink" href="#"></a><img style="top: 0px;left:-40px;" src="<?php echo $sidebarImgURL;?>" alt="">
			<?php echo $print_facebook; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function (){
jQuery(document).ready(function()
{
jQuery.noConflict();
jQuery(function (){
jQuery("#fbbox1").hover(function(){ 
jQuery('#fbbox1').css('z-index',101009);
jQuery(this).stop(true,false).animate({right:  0}, 500); },
function(){ 
	jQuery('#fbbox1').css('z-index',10000);
	jQuery("#fbbox1").stop(true,false).animate({right: -<?php echo trim($width+10); ?>}, 500); });
});}); });
jQuery.noConflict();
</script>
<?php
}
add_action( 'wp_enqueue_scripts', 'register_sme_facebook_likebox_sidebar_styles' );
 function register_sme_facebook_likebox_sidebar_styles() {
 	wp_register_style( 'sme_facebook_likebox_sidebar_style', plugins_url( 'assets/style.css' , __FILE__ ) );
 	wp_enqueue_style( 'sme_facebook_likebox_sidebar_style' );
        wp_enqueue_script('jquery');
 }
 $sme_fb_default_values = array(
     'sidebarImage' => 'ficon1',
     'marginTop' => 100,
     'pageURL' => 'http://www.facebook.com/facebook',
     'connection' => '10',
     'width' => '292',
     'height' => '450',
     'streams' => 'true',
     'color_scheme' => 'light',
     'show_faces' => 'true',
     'header' => 'true',
     'border' => 'true',
     'moduleclass_sfx' => ''
 );
 add_option('sme_fb_plugin_options', $sme_fb_default_values);