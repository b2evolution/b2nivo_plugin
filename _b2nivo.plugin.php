<?php 
/**
 * This file implements the b2Nivo Nivo Slider widget/plugin for {@link http://b2evolution.net/}.
 *
 * @copyright (c)2010 by Emin Özlem - {@link http://eodepo.com/}.
 *
 * @license GNU General Public License 2 (GPL) - http://www.opensource.org/licenses/gpl-license.php
 *
 * @package plugins
 *
 * @author Emin Özlem
 *
 * @version $Id:  $
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
 * b2Nivo Nivo Slider Plugin *
 * This plugin Allows you to add "Nivo Slider" Slideshow widget to anywhere you want in your blog');
 *
 */
class b2nivo_plugin extends Plugin 
{
	var $author = 'Emin Özlem';
	var $code = 'b2nivo';
	var $group = 'eodepo';
	var $help_url = 'http://forums.b2evolution.net/viewtopic.php?p=23964';
	var $name = 'Nivo Slider Widget';
	var $long_desc = 'Allows you to add "Nivo Slider" Slideshow widget to anywhere you want in your blog';
	var $short_desc = 'Nivo Slider Widget.';
	var $number_of_installs = 1;
	var $priority = 50;
	var $version = '1.1';
	var $extra_info = 'test?';
	var $apply_rendering = 'never';

	function PluginInit( & $params ) 
	{
		$this->short_desc = $this->T_('Nivo Slider Widget.');
		$this->long_desc = $this->T_('Allows you to add "Nivo Slider" Slideshow widget to anywhere you want in your blog');
	}

	function get_widget_param_definitions( $params ) 
    { 
    	global $baseurl, $plugins_subdir;
      	
      	$r = array( 
	  			'slider_id' => array(
					'label' => T_('Slider #ID'),
					'note' => T_('Choose a unique id to avoid conflicts, <span style="color:#FF0000;">!Important if you are using MULTIPLE INSTANCEs of the Nivo Slider widget, do not forget to change this.</span>'),
					'defaultvalue' => 'slider',
				),
				'slider_mode' => array(
					'label' => T_('Slider Config'),
					'note' => T_('Automatic: Simple,Out-of-the-box / Manual: Advanced.<br /> Automatic: Instantly working with minimal config. (No links) <br />Manual: Define additional link for your slides'),
					'defaultvalue' => 'automatic',
					'options' => array( 'automatic' => $this->T_('Automatic'), 'manual' => $this->T_('Manual') ),
					'type' => 'select',
				),
				'slider_folder' => array(
					'label' => T_('Image Folder'),
					'id' => $this->classname.'_slider_folder',
					'note' => T_('Folder path relative to your /blog baseurl. Default is:'.$baseurl.$plugins_subdir.'b2nivo_plugin/images/'),
					'defaultvalue' => $plugins_subdir.'b2nivo_plugin/images/',
					'size' => '60',
				),
				'slider_theme' => array(
						'label' => T_('Slider Theme'),
						'note' => T_('Choose from available themes.This is a global option not per widget, which means you can not individually choose themes per your multiple sliders.'),
						'defaultvalue' => 'default',
						'options' => array( 'default' => $this->T_('Default'), 'bar' => $this->T_('Bar'), 'dark' => $this->T_('Dark'), 'light' => $this->T_('Light') ),
						'type' => 'select',
				),
				
				'manual_options_begin' => array(
						'layout' => 'begin_fieldset',
						'label' => $this->T_('Manual Image Entries (Only Effective in "Manual Config" Mode)'),
				),
					'image_1_n' => array(
						'label' => T_('Img Name'),
						'note' => T_('Image file name in the folder above.'),
						'defaultvalue' => '1.jpg',
						'size' => '25',
					),
					'image_1_u' => array(
						'label' => T_('Img URL'),
						'note' => T_('The Url you want image to be linked to.Leave empty if you dont want.'),
						'defaultvalue' => 'http://www.tilqi.com',
						'size' => '45',
					),
					'image_1_c' => array(
						'label' => T_('Img Caption'),
						'note' => T_('Caption (Description) for the image to be displayed.Accepts html Ex: <br />
						Ex: &lt;p&gt;&lt;strong&gt;This&lt;/strong&gt; is an example of a &lt;em&gt;HTML&lt;/em&gt; caption with &lt;a href=&quot;#&quot;&gt;a link&lt;/a&gt;&lt;/p&gt;
						'),
						'defaultvalue' => '<p><strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.</p>',
						'type' => 'html_textarea',
					),
					array( 'layout' => 'separator' ),
					'image_2_n' => array(
						'label' => T_('Img Name'),
						'note' => T_('Image file name in the folder above.'),
						'defaultvalue' => '2.jpg',
						'size' => '25',
						
					),
					'image_2_u' => array(
						'label' => T_('Img URL'),
						'note' => T_('The Url you want image to be linked to.Leave empty if you dont want.'),
						'defaultvalue' => '',
						'size' => '45',
					),
					'image_2_c' => array(
						'label' => T_('Img Caption'),
						'note' => T_('Caption (Description) for the image to be displayed.Accepts html Ex: <br />
						Ex: &lt;p&gt;&lt;strong&gt;This&lt;/strong&gt; is an example of a &lt;em&gt;HTML&lt;/em&gt; caption with &lt;a href=&quot;#&quot;&gt;a link&lt;/a&gt;&lt;/p&gt;
						'),
						'defaultvalue' => '',
						'type' => 'html_textarea',
					),
					array( 'layout' => 'separator' ),
					'image_3_n' => array(
						'label' => T_('Img Name'),
						'note' => T_('Image file name in the folder above.'),
						'defaultvalue' => '3.jpg',
						'size' => '25',
					),
					'image_3_u' => array(
						'label' => T_('Img URL'),
						'note' => T_('The Url you want image to be linked to.Leave empty if you dont want.'),
						'defaultvalue' => '',
						'size' => '45',
					),
					'image_3_c' => array(
						'label' => T_('Img Caption'),
						'note' => T_('Caption (Description) for the image to be displayed.Accepts html Ex: <br />
						Ex: &lt;p&gt;&lt;strong&gt;This&lt;/strong&gt; is an example of a &lt;em&gt;HTML&lt;/em&gt; caption with &lt;a href=&quot;#&quot;&gt;a link&lt;/a&gt;&lt;/p&gt;
						'),
						'defaultvalue' => '',
						'type' => 'html_textarea',
					),
					array( 'layout' => 'separator' ),
					'image_4_n' => array(
						'label' => T_('Img Name'),
						'note' => T_('Image file name in the folder above.'),
						'defaultvalue' => '4.jpg',
						'size' => '25',
					),
					'image_4_u' => array(
						'label' => T_('Img URL'),
						'note' => T_('The Url you want image to be linked to.Leave empty if you dont want.'),
						'defaultvalue' => '',
						'size' => '45',
					),
					'image_4_c' => array(
						'label' => T_('Img Caption'),
						'note' => T_('Caption (Description) for the image to be displayed.Accepts html Ex: <br />
						Ex: &lt;p&gt;&lt;strong&gt;This&lt;/strong&gt; is an example of a &lt;em&gt;HTML&lt;/em&gt; caption with &lt;a href=&quot;#&quot;&gt;a link&lt;/a&gt;&lt;/p&gt;
						'),
						'defaultvalue' => '',
						'type' => 'html_textarea',
					),
					
				'manual_options_end' => array(
 					'layout' => 'end_fieldset',
				),
	
				'slider_config_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Slider Configuration'),
				),
					'slider_width' => array(
					'label' => T_('Slider Width'),
					'note' => T_('Ex: 618px'),
					'defaultvalue' => '618px',
					),
					'slider_height' => array(
					'label' => T_('Slider Width'),
					'note' => T_('Ex: 246px'),
					'defaultvalue' => '246px',
					),
					'slider_effect' => array(
					'label' => T_('Slider Effect'),
					'note' => T_('Choose a single effect if you like.Default is random.'),
					'defaultvalue' => 'random',
					'options' => array( 'random' => $this->T_('Random'), 'fade' => $this->T_('fade'), 'sliceDownRight' => $this->T_('sliceDownRight'), 'sliceDownLeft' => $this->T_('sliceDownLeft'), 'sliceUpRight' => $this->T_('sliceUpRight'), 'sliceUpLeft' => $this->T_('sliceUpLeft'), 'sliceUpDown' => $this->T_('sliceUpDown'), 'sliceUpDownLeft' => $this->T_('sliceUpDownLeft'), 'fold' => $this->T_('fold'), 'slideInRight' => $this->T_('slideInRight'), 'slideInLeft' => $this->T_('slideInLeft'), 'boxRandom' => $this->T_('boxRandom'), 'boxRain' => $this->T_('boxRain'), 'boxRainReverse' => $this->T_('boxRainReverse'), 'boxRainGrow' => $this->T_('boxRainGrow'), 'boxRainGrowReverse' => $this->T_('boxRainGrowReverse'),  ),
					'type' => 'select',
					),
					'slider_slices' => array(
					'label' => T_('Slider Slices'),
					'note' => T_('Default is 15, Numeric value between 1 to infinity, setting the number too high may result in performance issues'),
					'defaultvalue' => '15',
					),	
					'slider_boxCols' => array(
					'label' => T_('box animations columns'),
					'note' => T_('For box animations. Default is 8'),
					'defaultvalue' => '8',
					),		
					'slider_boxRows' => array(
					'label' => T_('box animations rows'),
					'note' => T_('For box animations. Default is 4'),
					'defaultvalue' => '4',
					),	
					'slider_animSpeed' => array(
					'label' => T_('Slider Animation Speed'),
					'note' => T_('Default is 500, Numeric value in miliseconds Ex: 1000'),
					'defaultvalue' => '500',
					),	
					'slider_pauseTime' => array(
					'label' => T_('Slider Pause Time'),
					'note' => T_('Default is 3000, Numeric value in miliseconds Ex: 1000'),
					'defaultvalue' => '3000',
					),	
					'slider_startSlide' => array(
					'label' => T_('Starting Slide'),
					'note' => T_('Set starting Slide (0 index) Default is 0'),
					'defaultvalue' => '0',
					),	
					'slider_directionNav' => array(
					'label' => T_('Direction Nav'),
					'note' => T_('Next & Prev'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_directionNavHide' => array(
					'label' => T_('Direction Nav Hide'),
					'note' => T_('Only show on hover'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_controlNav' => array(
					'label' => T_('Show Ordered Navigation'),
					'note' => T_('1,2,3...'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),		
					'slider_controlNavThumbs' => array(
					'label' => T_('Use thumbs for Nav ?'),
					'note' => T_('// Use thumbnails for Control Nav.'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),		
					'slider_controlNavThumbsFromRel' => array(
					'label' => T_('Image Rel from thumbs'),
					'note' => T_('Use image rel for thumbs'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),		
					'slider_controlNavThumbsSearch' => array(
					'label' => T_('Find img extension and ...'),
					'note' => T_(' Replace this with...'),
					'defaultvalue' => '.jpg',
					),	
					'slider_controlNavThumbsReplace' => array(
					'label' => T_('...replace it with'),
					'note' => T_('..this in thumb Image src'),
					'defaultvalue' => '_thumb.jpg',
					),	
					'slider_keyboardNav' => array(
					'label' => T_('Keyboard Navigation'),
					'note' => T_('Use left & right arrows'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_pauseOnHover' => array(
					'label' => T_('Pause on Hover'),
					'note' => T_('Use left & right arrows'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_manualAdvance' => array(
					'label' => T_('Manual Advance'),
					'note' => T_('Force manual transitions'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),
					'slider_captionOpacity' => array(
					'label' => T_('Caption Opacity'),
					'note' => T_('Universal caption opacity'),
					'defaultvalue' => '0.8',
					'options' => array( '0.1' => $this->T_('0.1'), '0.2' => $this->T_('0.2'), '0.3' => $this->T_('0.3'), '0.4' => $this->T_('0.4'), '0.5' => $this->T_('0.5'), '0.6' => $this->T_('0.6'), '0.7' => $this->T_('0.7'), '0.8' => $this->T_('0.8'), '0.9' => $this->T_('0.9'), '1' => $this->T_('1') ),
					'type' => 'select',
					),
					'slider_prevText' => array(
					'label' => T_('Prev text'),
					'note' => T_('Prev directionNav text'),
					'defaultvalue' => 'Prev',
					),	
					'slider_nextText' => array(
					'label' => T_('Next text'),
					'note' => T_('Next directionNav text'),
					'defaultvalue' => 'Next',
					),	
					'slider_randomStart' => array(
					'label' => T_('Random Start'),
					'note' => T_('Start on a random slide'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_beforeChange' => array(
					'label' => T_('BeforeChange'),
					'note' => T_('Triggers before a slide transition'),
					'defaultvalue' => 'function(){}',
					'type' => 'html_textarea',
					),	
					'slider_afterChange' => array(
					'label' => T_('AfterChange'),
					'note' => T_('Triggers after a slide transition'),
					'defaultvalue' => 'function(){}',
					'type' => 'html_textarea',
					),	
					'slider_slideshowEnd' => array(
					'label' => T_('slideshowEnd'),
					'note' => T_('Triggers after all slides have been shown'),
					'defaultvalue' => 'function(){}',
					'type' => 'html_textarea',
					),	
					'slider_lastSlide' => array(
					'label' => T_('lastSlide'),
					'note' => T_('Triggers when last slide is shown'),
					'defaultvalue' => 'function(){}',
					'type' => 'html_textarea',
					),	
					'slider_afterLoad' => array(
					'label' => T_('afterLoad'),
					'note' => T_('Triggers when slider has loaded'),
					'defaultvalue' => 'function(){}',
					'type' => 'html_textarea',
					),	
				'slider_config_end' => array(
 				'layout' => 'end_fieldset',
				),
			);
		return $r;
	}
	function GetDefaultSettings( & $params ) 
	{	global $baseurl;
		 $rr = array( 
				/*	
				'slider_config_begin' => array(
				'layout' => 'begin_fieldset',
				'label' => $this->T_('Slider Configuration'),
				),
					'slider_width' => array(
					'label' => T_('Slider Width'),
					'note' => T_('Ex: 618px'),
					'defaultvalue' => '618px',
					),
					'slider_height' => array(
					'label' => T_('Slider Width'),
					'note' => T_('Ex: 246px'),
					'defaultvalue' => '246px',
					),
					'slider_effect' => array(
					'label' => T_('Slider Effect'),
					'note' => T_('Choose a single effect if you like.Default is random.'),
					'defaultvalue' => 'random',
					'options' => array( 'random' => $this->T_('Random'), 'fade' => $this->T_('fade'), 'sliceDownRight' => $this->T_('sliceDownRight'), 'sliceDownLeft' => $this->T_('sliceDownLeft'), 'sliceUpRight' => $this->T_('sliceUpRight'), 'sliceUpLeft' => $this->T_('sliceUpLeft'), 'sliceUpDown' => $this->T_('sliceUpDown'), 'sliceUpDownLeft' => $this->T_('sliceUpDownLeft'), 'fold' => $this->T_('fold'), 'slideInRight' => $this->T_('slideInRight'), 'slideInLeft' => $this->T_('slideInLeft'), 'boxRandom' => $this->T_('boxRandom'), 'boxRain' => $this->T_('boxRain'), 'boxRainReverse' => $this->T_('boxRainReverse'), 'boxRainGrow' => $this->T_('boxRainGrow'), 'boxRainGrowReverse' => $this->T_('boxRainGrowReverse'),  ),
					'type' => 'select',
					),
					'slider_slices' => array(
					'label' => T_('Slider Slices'),
					'note' => T_('Default is 15, Numeric value between 1 to infinity, setting the number too high may result in performance issues'),
					'defaultvalue' => '15',
					),	
					'slider_boxCols' => array(
					'label' => T_('box animations columns'),
					'note' => T_('For box animations. Default is 8'),
					'defaultvalue' => '8',
					),	
					'slider_boxRows' => array(
					'label' => T_('box animations rows'),
					'note' => T_('For box animations. Default is 4'),
					'defaultvalue' => '4',
					),		
					'slider_animSpeed' => array(
					'label' => T_('Slider Animation Speed'),
					'note' => T_('Default is 500, Numeric value in miliseconds Ex: 1000'),
					'defaultvalue' => '500',
					),	
					'slider_pauseTime' => array(
					'label' => T_('Slider Pause Time'),
					'note' => T_('Default is 3000, Numeric value in miliseconds Ex: 1000'),
					'defaultvalue' => '3000',
					),	
					'slider_startSlide' => array(
					'label' => T_('Starting Slide'),
					'note' => T_('Set starting Slide (0 index) Default is 0'),
					'defaultvalue' => '0',
					),	
					'slider_directionNav' => array(
					'label' => T_('Direction Nav'),
					'note' => T_('Next & Prev'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_directionNavHide' => array(
					'label' => T_('Direction Nav Hide'),
					'note' => T_('Only show on hover'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_controlNav' => array(
					'label' => T_('Show Ordered Navigation'),
					'note' => T_('1,2,3...'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),		
					'slider_controlNavThumbs' => array(
					'label' => T_('Use thumbs for Nav ?'),
					'note' => T_('// Use thumbnails for Control Nav.'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),		
					'slider_controlNavThumbsFromRel' => array(
					'label' => T_('Image Rel from thumbs'),
					'note' => T_('Use image rel for thumbs'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),		
					'slider_controlNavThumbsSearch' => array(
					'label' => T_('Find img extension and ...'),
					'note' => T_(' Replace this with...'),
					'defaultvalue' => '.jpg',
					),	
					'slider_controlNavThumbsReplace' => array(
					'label' => T_('...replace it with'),
					'note' => T_('..this in thumb Image src'),
					'defaultvalue' => '_thumb.jpg',
					),	
					'slider_keyboardNav' => array(
					'label' => T_('Keyboard Navigation'),
					'note' => T_('Use left & right arrows'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_pauseOnHover' => array(
					'label' => T_('Pause on Hover'),
					'note' => T_('Use left & right arrows'),
					'defaultvalue' => 'true',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_manualAdvance' => array(
					'label' => T_('Manual Advance'),
					'note' => T_('Force manual transitions'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),
					'slider_captionOpacity' => array(
					'label' => T_('Caption Opacity'),
					'note' => T_('Universal caption opacity'),
					'defaultvalue' => '0.8',
					'options' => array( '0.1' => $this->T_('0.1'), '0.2' => $this->T_('0.2'), '0.3' => $this->T_('0.3'), '0.4' => $this->T_('0.4'), '0.5' => $this->T_('0.5'), '0.6' => $this->T_('0.6'), '0.7' => $this->T_('0.7'), '0.8' => $this->T_('0.8'), '0.9' => $this->T_('0.9'), '1' => $this->T_('1') ),
					'type' => 'select',
					),
					'slider_prevText' => array(
					'label' => T_('Prev text'),
					'note' => T_('Prev directionNav text'),
					'defaultvalue' => 'Prev',
					),	
					'slider_nextText' => array(
					'label' => T_('Next text'),
					'note' => T_('Next directionNav text'),
					'defaultvalue' => 'Next',
					),	
					'slider_randomStart' => array(
					'label' => T_('Random Start'),
					'note' => T_('Start on a random slide'),
					'defaultvalue' => 'false',
					'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
					'type' => 'select',
					),	
					'slider_beforeChange' => array(
					'label' => T_('BeforeChange'),
					'note' => T_('Triggers before a slide transition'),
					'defaultvalue' => 'function(){}',
					'type' => 'textarea',
					),	
					'slider_afterChange' => array(
					'label' => T_('AfterChange'),
					'note' => T_('Triggers after a slide transition'),
					'defaultvalue' => 'function(){}',
					'type' => 'textarea',
					),	
					'slider_slideshowEnd' => array(
					'label' => T_('slideshowEnd'),
					'note' => T_('Triggers after all slides have been shown'),
					'defaultvalue' => 'function(){}',
					'type' => 'textarea',
					),	
					'slider_lastSlide' => array(
					'label' => T_('lastSlide'),
					'note' => T_('Triggers when last slide is shown'),
					'defaultvalue' => 'function(){}',
					'type' => 'textarea',
					),	
					'slider_afterLoad' => array(
					'label' => T_('afterLoad'),
					'note' => T_('Triggers when slider has loaded'),
					'defaultvalue' => 'function(){}',
					'type' => 'textarea',
					),	
				'slider_config_end' => array(
 				'layout' => 'end_fieldset',
				),			*/
				'further_custom' => array(
					'label' => T_('Other Settings ? Where ?'),
					'size' => '80',
					'defaultvalue' => 'Insert your Slider as a "widget" into one of your available "containers".',
					'disabled' => true, 	
					'note' => 'Go to <a href="'.$baseurl.'admin.php?ctrl=widgets">Blog > Widgets</a> now to insert & configure your slider.',
				),
				'use_themes' => array(
					'label' => T_('Use "themes"'),
					'note' => T_('if you are not going to use orman-pascal themes, check this to UNLOAD extra 2 css files.'),
					'defaultvalue' => 1,
					'type' => 'checkbox',
				),
				'allow_backlinks' => array(
					'label' => 'Allow links ?',
					'defaultvalue' => '1',
					'type' => 'checkbox',
					'note' => 'The plugin will display a few (virtually harmless) backlinks in the bottom of your page, not visible at all.If you wish you can disable this to remove them.<br />But please remember, a lot of hours go into developing plugins.If you liked the plugin, let them stay please (:',
				),
				'debug_opt' => array(
					'label' => 'Debug ?',
					'defaultvalue' => '0',
					'type' => 'checkbox',
					'note' => 'Enable to view various info on skin output to fix problems.',
				),
			);
		return $rr;
	}
		
	function SkinBeginHtmlHead( $params )
	{
		global $plugins_url;

		$plug_url = $this->get_plugin_url();
		
		require_js( $plug_url . 'res/jquery.nivo.slider.pack.js', TRUE );
		require_js( '#jquery#' );

		// Load themes
		$themes = array('bar','dark','default','light');
		$use_themes = $this->Settings->get( 'use_themes' );
		if( $use_themes )
		{
			foreach($themes as $theme )
			{
				require_css( $plugins_url . 'b2nivo_plugin/themes/'.$theme.'/'.$theme.'.css' );
			}
		}
		else
		{
			require_css( $plugins_url . 'b2nivo_plugin/themes/default/default.css' );
		}
		
		require_css( $plugins_url . 'b2nivo_plugin/res/nivo-slider.css' );
	}

	function AfterInstall()
    {
    	global $baseurl;

        $this->msg( 'Slider plugin installed succesfully.<br />Go to <a href="'.$baseurl.'admin.php?ctrl=widgets">Blog > Widgets</a> now to insert & configure your slider.<br />If you want to use MULTIPLE instances of SLIDER just install one more of the plugin.See read more for additional info.' );
    }

	
	function SkinTag( $params )
	{	
		global $Plugins, $baseurl, $plugins_subdir, $plugins_path, $basepath;
		$slider_folder = $params['slider_folder'];
		$def_urf = $baseurl . $slider_folder;
		$def_folder = $basepath . $slider_folder;

		if( $params['slider_theme'] == 'pascal' || $params['slider_theme'] == 'orman' )
		{
			$params['slider_theme'] = 'default';
		}
		
		/* widget (slider) parameters - settings */
		$slider_id = $params['slider_id'];
		$slider_mode = $params['slider_mode'];
		$slider_width = $params['slider_width'];
		$slider_height = $params['slider_height'];
		$slider_theme = $params['slider_theme'];
		$slider_id = $params['slider_id'];
		$slider_effect = $params['slider_effect'];
		$slider_slices = $params['slider_slices'];
		$slider_boxCols = $params['slider_boxCols'];
		$slider_boxRows = $params['slider_boxRows'];
		$slider_animSpeed = $params['slider_animSpeed'];
		$slider_pauseTime = $params['slider_pauseTime'];
		$slider_startSlide = $params['slider_startSlide'];
		$slider_directionNav = $params['slider_directionNav'];
		$slider_directionNavHide = $params['slider_directionNavHide'];
		$slider_controlNav = $params['slider_controlNav'];
		$slider_controlNavThumbs = $params['slider_controlNavThumbs'];
		$slider_controlNavThumbsFromRel = $params['slider_controlNavThumbsFromRel'];
		$slider_controlNavThumbsSearch = $params['slider_controlNavThumbsSearch'];
		$slider_controlNavThumbsReplace = $params['slider_controlNavThumbsReplace'];
		$slider_keyboardNav = $params['slider_keyboardNav'];
		$slider_pauseOnHover = $params['slider_pauseOnHover'];
		$slider_manualAdvance = $params['slider_manualAdvance'];
		$slider_captionOpacity = $params['slider_captionOpacity'];
		$slider_prevText = $params['slider_prevText'];
		$slider_nextText = $params['slider_nextText'];
		$slider_randomStart = $params['slider_randomStart'];
		$slider_beforeChange = $params['slider_beforeChange'];
		$slider_afterChange = $params['slider_afterChange'];
		$slider_slideshowEnd = $params['slider_slideshowEnd'];
		$slider_lastSlide = $params['slider_lastSlide'];
		$slider_afterLoad = $params['slider_afterLoad'];
		$image_1_n = $params['image_1_n'];
		$image_1_u = $params['image_1_u'];
		$image_1_c = $params['image_1_c'];
		$image_2_n = $params['image_2_n'];
		$image_2_u = $params['image_2_u'];
		$image_2_c = $params['image_2_c'];
		$image_3_n = $params['image_3_n'];
		$image_3_u = $params['image_3_u'];
		$image_3_c = $params['image_3_c'];
		$image_4_n = $params['image_4_n'];
		$image_4_u = $params['image_4_u'];
		$image_4_c = $params['image_4_c'];

		echo $params['block_start']."\n";
		echo '<div class="slider-wrapper theme-'.$slider_theme.'">
				<div class="ribbon"></div>
					<div id="'.$slider_id.'" class="nivoSlider" style="width: '.$slider_width.'; height: '.$slider_height.';">';
		
		if ( $slider_mode == 'automatic' ) 
		{
			$directory = $def_folder;
			$allowed_types = array('jpg','jpeg','gif','png');
			$file_parts = array();
			$ext = '';
			$title = '';
			$i = 0;
			$dir_handle = @opendir($directory) or die("There is an error with your image directory!");			
			while ($file = readdir($dir_handle)) 
			{
				if( ! $this->checkImage($directory.DIRECTORY_SEPARATOR.$file) ) continue;
				
				$file_parts = explode('.',$file);
				$ext = strtolower(array_pop($file_parts));
				$title = implode('.',$file_parts);
				$title = htmlspecialchars($title);
				if(in_array($ext,$allowed_types))
				{
					if(($i+1)%4==0);
							echo '<img src="'.$def_urf.'/'.$file.'" alt="'.$title.'" title="'.$file.'" />';
						/*	echo '		
									<a href="http://dev7studios.com"><img src="'.$def_urf.'/'.$file.'" alt="" title="This is an example of a caption" /></a>
									<img src="images/walle.jpg" alt="" data-transition="slideInLeft" />
									<img src="images/nemo.jpg" alt="" title="#htmlcaption" />'*/
				//	}
				
					/*	echo $directory.'/'.$file;
					echo'
					<div class="pic '.$nomargin.'" style="background:url('.$def_urf.'/'.$file.') no-repeat 50% 50%;">
					<a href="'.$def_urf.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
					</div>';*/
					
					$i++;
				}
			}
				closedir($dir_handle);
		} // end if auto
		
		if($slider_mode == 'manual') 
		{
			if(!empty($image_1_u)) $manual_c = '<a href="'.$image_1_u.'">';
			if(!empty($image_1_n)) $manual_c .=  '<img src="'.$def_urf.$image_1_n.'" alt="" title="#image1c" />';
			if(!empty($image_1_u)) $manual_c .= '</a>';
			if(!empty($image_2_u)) $manual_c .= '<a href="'.$image_2_u.'">';
			if(!empty($image_2_n)) $manual_c .=  '<img src="'.$def_urf.$image_2_n.'" alt="" title="#image2c" />';
			if(!empty($image_2_u)) $manual_c .= '</a>';
			if(!empty($image_3_u)) $manual_c .= '<a href="'.$image_3_u.'">';
			if(!empty($image_3_n)) $manual_c .=  '<img src="'.$def_urf.$image_3_n.'" alt="" title="#image3c" />';
			if(!empty($image_3_u)) $manual_c .= '</a>';
			if(!empty($image_4_u)) $manual_c .= '<a href="'.$image_4_u.'">';
			if(!empty($image_4_n)) $manual_c .=  '<img src="'.$def_urf.$image_4_n.'" alt="" title="#image4c" />';
			if(!empty($image_4_u)) $manual_c .= '</a>';
			
			/*<a href="'.$image_2_u.'"><img src="'.$def_urf.$image_2_n.'" alt="" title="#image1c" /></a>
			<a href="'.$image_3_u.'"><img src="'.$def_urf.$image_3_n.'" alt="" title="#image1c" /></a>
			<a href="'.$image_4_u.'"><img src="'.$def_urf.$image_4_n.'" alt="" title="#image1c" /></a>
			';*/
			echo $manual_c;
		} // end if manual
				echo '</div>';
				if(!empty($image_1_c)) {echo '<div id="image1c" class="nivo-html-caption">'.$image_1_c.'</div>';};
				if(!empty($image_2_c)) {echo '<div id="image2c" class="nivo-html-caption">'.$image_2_c.'</div>';};
				if(!empty($image_3_c)) {echo '<div id="image3c" class="nivo-html-caption">'.$image_3_c.'</div>';};
				if(!empty($image_4_c)) {echo '<div id="image4c" class="nivo-html-caption">'.$image_4_c.'</div>';};
				echo '<div id="htmlcaption" class="nivo-html-caption">
					<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
				</div>
		  </div>';
		echo $params['block_end']."\n";
/*		
		 echo "<script type='text/javascript'>jQuery(window).load(function() {
                jQuery('#".$slider_id.".nivoSlider').nivoSlider();
            });
            </script>"; 
			obsolete */ 
			
							/* initiate the  widget (slider) with provided settings */

		$init_ns = "<script type='text/javascript'>jQuery(window).load(function() {
                jQuery('";
					if(!empty($slider_id)) $init_ns .= "#".$slider_id;
					$init_ns .= ".nivoSlider').nivoSlider({";
					if(!empty($slider_effect))	$init_ns .= "effect:'".$slider_effect."',";
					if(!empty($slider_slices))	$init_ns .= "slices: ".$slider_slices.",";
					if(!empty($slider_boxCols))	$init_ns .= "boxCols: ".$slider_boxCols.",";
					if(!empty($slider_boxRows))	$init_ns .= "boxRows: ".$slider_boxRows.",";
					if(!empty($slider_animSpeed))	$init_ns .= "animSpeed: ".$slider_animSpeed.",";
					if(!empty($slider_pauseTime))	$init_ns .= "pauseTime: ".$slider_pauseTime.",";
					if(!empty($slider_startSlide))	$init_ns .= "startSlide: ".$slider_startSlide.",";
					if(!empty($slider_directionNav))	$init_ns .= "directionNav: ".$slider_directionNav.",";
					if(!empty($slider_directionNavHide))	$init_ns .= "directionNavHide: ".$slider_directionNavHide.",";
					if(!empty($slider_controlNav))	$init_ns .= "controlNav: ".$slider_controlNav.",";
					if(!empty($slider_controlNavThumbs))	$init_ns .= "controlNavThumbs: ".$slider_controlNavThumbs.",";
					if(!empty($slider_controlNavThumbsFromRel))	$init_ns .= "controlNavThumbsFromRel: ".$slider_controlNavThumbsFromRel.",";
					if(!empty($slider_controlNavThumbsSearch))	$init_ns .= "controlNavThumbsSearch: '".$slider_controlNavThumbsSearch."',";
					if(!empty($slider_controlNavThumbsReplace))	$init_ns .= "controlNavThumbsReplace: '".$slider_controlNavThumbsReplace."',";
					if(!empty($slider_keyboardNav))	$init_ns .= "keyboardNav: ".$slider_keyboardNav.",";
					if(!empty($slider_pauseOnHover))	$init_ns .= "pauseOnHover: ".$slider_pauseOnHover.",";
					if(!empty($slider_manualAdvance))	$init_ns .= "manualAdvance: ".$slider_manualAdvance.",";
					if(!empty($slider_captionOpacity))	$init_ns .= "captionOpacity: ".$slider_captionOpacity.",";
					if(!empty($slider_prevText))	$init_ns .= "prevText: '".$slider_prevText."',";
					if(!empty($slider_nextText))	$init_ns .= "nextText: '".$slider_nextText."',";
					if(!empty($slider_randomStart))	$init_ns .= "randomStart: ".$slider_randomStart.",";
					if(!empty($slider_beforeChange))	$init_ns .= "beforeChange: ".$slider_beforeChange.",";
					if(!empty($slider_afterChange))	$init_ns .= "afterChange: ".$slider_afterChange.",";
					if(!empty($slider_slideshowEnd))	$init_ns .= "slideshowEnd: ".$slider_slideshowEnd.",";
					if(!empty($slider_lastSlide))	$init_ns .= "lastSlide: ".$slider_lastSlide.",";
					if(!empty($slider_afterLoad))	$init_ns .= "afterLoad: ".$slider_afterLoad;
					$init_ns .= "});
							});
					</script>";
				echo $init_ns;
		
		return ( true ) ;

	}

	function SkinEndHtmlBody( & $params )
    { 
		$debug_opt = $this->Settings->get( 'debug_opt' );
		
		if(($debug_opt)) 
		{
			echo "debug is on";
		};
		
		$allow_backlinks = $this->Settings->get( 'allow_backlinks' );

		if(($allow_backlinks)) 
		{
			echo '<div id="creditz" style="font-size: 9px; color: #ccc; position: absolute; bottom: -40px; text-indent: -9999px;">
	      	  <a href="http://www.tilqi.com" title="Ozlu Sozler, Guzel Sozler, Ask Sozleri, Einstein Sozleri, kisa anlamli en guzel sozler">ozlu Sozler</a>
	      	  <a href="http://www.gereksizgercek.com" title="İlginç Bilgiler, Bunlari biliyormusunuz, bunlari biliyormuydunuz, komik bilgiler">GereksizGercek</a>
	      	  <a href="http://www.havadurumum.com" title="Hava Durumu, izmir hava durumu, hava durumu istanbul, hava durumu ankara, mynet hava durumu bursa, istanbul ankara bursa izmir buyuksehir hava durumlari">Hava Durumu</a>
	      	  <a href="http://www.megarehberim.com" title="Firma rehberi izmir, Firmalar telefon ve adresleri, firmalar rehberi, Turkiye Firma rehberi, firma rehber, ankara bursa sehir rehberi, firma telefon rehberi, is rehberi, sektorel firmalar, tekstil rehberi, kayseri konya firmalar, antalya - megarehberim.com">Firma Rehberi</a>
	          <a href="http://www.havanasiloralarda.com" title="Hava Durumu, izmir hava durumu, hava durumu istanbul, hava durumu ankara, mynet hava durumu bursa, istanbul ankara bursa izmir buyuksehir hava durumlari">Hava Durumu</a>
	          <a href="http://www.megafirmarehberi.com" title="Firmalar telefon ve adresleri, Firma rehberi izmir, firmalar rehberi, Turkiye Firma rehberi, firma rehber, ankara bursa sehir rehberi, firma telefon rehberi, is rehberi, sektorel firmalar, tekstil rehberi, kayseri konya firmalar, antalya - megarehberim.com">Firma Rehberi</a>

	           <a href="http://www.eokulvelisi.com" title="e-okul, eokul lisemeb e-okule-okul yonetim bilgi sistemie-okul, veli bilgilendirme sistemie-okul karnee-okul vbse-okul yonetime-okul giris">E-okul Veli</a>
	           <a href="http://www.firmarehberi.co" title="sirket Firma rehberi izmir, Firmalar telefon ve adresleri, firmalar rehberi, Turkiye Firma rehberi, firma rehber, ankara bursa sehir rehberi, firma telefon rehberi, is rehberi, sektorel firmalar, tekstil rehberi, kayseri konya firmalar, antalya - megarehberim.com">Firma Rehberi</a>
	        </div>';
		};
	}

	function checkImage($filename) 
	{
		if ( ! $mimetype = @getimagesize($filename) )
		{
			return false;
		}

		$allowed_mimes = array('image/jpeg', 'image/gif', 'image/png');

		if ( isset($mimetype['mime']) && in_array($mimetype['mime'], $allowed_mimes) ) {
			return true;
		}

		return false;
	}

	/**
	 * TODO: allow multipla instances through widget $params, add debug.
	 * @version 1.0: initial release
	 * @09.03.2012
	 * @author Emin Özlem
	 */
} ?>