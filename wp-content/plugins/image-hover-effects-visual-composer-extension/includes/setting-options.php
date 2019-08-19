<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hoverEffects = array(
	'Effect 1'	=>	'effect1',
	'Effect 2'	=>	'effect2',
	'Effect 3'	=>	'effect3',
	'Effect 4'	=>	'effect4',
	'Effect 5'	=>	'effect5',
	'Effect 6'	=>	'effect6',
	'Effect 7'	=>	'effect7',
	'Effect 8'	=>	'effect8',
	'Effect 9'	=>	'effect9',
	'Effect 10'	=>	'effect10',
	'Effect 11'	=>	'effect11',
	'Effect 12'	=>	'effect12',
	'Effect 13'	=>	'effect13',
	'Effect 14'	=>	'effect14',
	'Effect 15'	=>	'effect15',
	'Effect 16'	=>	'effect16',
	'Effect 17'	=>	'effect17',
	'Effect 18'	=>	'effect18',
	'Effect 19'	=>	'effect19',
	'Effect 20'	=>	'effect20',
);

$settings_params = array( 
	
	array(
		"type" 			=> 	"attach_image",
		"heading" 		=> 	__("Image"),
		"param_name" 	=> 	"ihe_image",
		"description" 	=> 	__("Select the image"),
		"group" 		=> 'Image',
	),

	array(
		"type" 			=> "textfield", 
		"heading" 		=> __("Caption Heading"),
		"param_name" 	=> "ihe_heading",
		"description" 	=> __("Give heading for caption"),
		"group" 		=> 'Caption',
	),

	array(
		"type" 			=> "textarea_html",
		"heading" 		=> __("Caption Description"),
		"param_name" 	=> "content",
		"description" 	=> __("Caption description for Image.You can also use html."),
		"group" 		=> 'Caption',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("URL"),
		"param_name" 	=> "caption_url",
		"description" 	=> __("Leave blank to disable link"),
		"group" 		=> 'Links',
	),
	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Link Target"),
		"param_name" 	=> "caption_url_target",
		"description" 	=> __("Write _blank for opening link in new window and _self for same window."),
		"group" 		=> 'Links',
	),

	// Hover Effects Settings


	array(
		"type" => "dropdown",
		"heading" => "Hover Style",
		"param_name" => "caption_style",
		"value" => array(
			"Circle" => "circle",
			"Square" => "square",
		),
		"description" => "",
		"group" 		=> 'Hover Effects',
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __("Hover Effect"),
		"param_name" 	=> "hover_effect",
		"description" 	=> __("Select the hover effect"),
		"value" 		=> $hoverEffects,
		"group" 		=> 'Hover Effects',
	),


	array(
		"type" => "dropdown",
		"heading" => "Animation Direction",
		"param_name" => "caption_direction",
		"group" 		=> 'Hover Effects',
		"value" => array(
			"Left To Right" => "left_to_right",
			"Right To Left" => "right_to_left",
			"Top To Bottom" => "top_to_bottom",
			"Bottom To Top" => "bottom_to_top",
		),
		"description" => "Select direction of Caption on hover",
	),

	// PRO Features
	
	array(
		"type" => "dropdown",
		"heading" => "Touch behaviour on Touch Devices <b style='color:#E62117;'>(New)</b>",
		"param_name" => "caption_touch",
		"value" => array(
			"Default" => "",
			"First Tap Hover & Second Tap Open link" => "hoverontap",
		),
		"description" => "Select how you want links to behave on touch devices when touch over image.",
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "dropdown",
		"heading" 		=> __("Show Static Title Over Image <b style='color:#E62117;'>(New)</b>"),
		"value" => array(
			"Yes" => "yes",
			"No" => "no",
		),
		"param_name" 	=> "caption_static_title",
		'save_always' => true,
		"description" 	=> __("Select whether you want to display static tile over image before hover or not."),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "dropdown",
		"heading" 		=> __("Static Title Postion <b style='color:#E62117;'>(New)</b>"), 
		"value" => array(
			"Top" => "0",
			"Middle" => "50%",
			"Bottom" => "90%",
		),
		"param_name" 	=> "caption_static_title_position",
		'save_always' => true,
		"dependency" => array("element" => "caption_static_title", "value" => array("yes")),
		"description" 	=> __("Select position for the static title."),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Heading Font Size"),
		"param_name" 	=> "caption_heading_size",
		"description" 	=> __("Font size(px) For Caption Heading (Default 22)."),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Description Font Size"),
		"param_name" 	=> "caption_description_size",
		"description" 	=> __("Font size(px) For Caption Description (Default 12)."),
		"group" 		=> 'PRO Features',
	), 

	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Heading Background Color"),
		"param_name" 	=> "caption_heading_bg",
		"description" 	=> __("Caption Heading Background Color.It will be only for Square Style."),
		"group" 		=> 'PRO Features',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Heading Color"),
		"param_name" 	=> "caption_heading_color",
		"description" 	=> __("Caption heading Color"),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Description Color"),
		"param_name" 	=> "caption_desc_color",
		"description" 	=> __("Description Text Color"),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Thumbnail Width"),
		"param_name" 	=> "thumb_width",
		"description" 	=> __("Set thumbnail height for the image."),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Thumbnail Height"),
		"param_name" 	=> "thumb_height",
		"description" 	=> __("Set thumbnail height for the image."),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Thumbnail Border Width"),
		"param_name" 	=> "thumb_border_width",
		"description" 	=> __("Give border width(if want to hide border put 0) for the thumbnail(only square style).(Default 8)."),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Border Color"),
		"param_name" 	=> "thumb_border_color",
		"description" 	=> __("Choose border color for the thumbnail(Only for the Square Style)"),
		"group" 		=> 'PRO Features',
	),

	array(
		"type" => "dropdown",
		"heading" => "Caption Background Type",
		"param_name" => "caption_bg_type",
		"value" => array(
			"Color" => "color",
			"Image" => "image",
		),
		"description" => "",
		"group" 		=> 'PRO Features',
	),

	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Background Color"),
		"param_name" 	=> "caption_bg_color",
		"description" 	=> __("Choose background color for the caption."),
		"group" 		=> 'PRO Features',
		"dependency" => array("element" => "caption_bg_type", "value" => array("color"))
	),

	array(
		"type" 			=> 	"attach_image",
		"heading" 		=> 	__("Caption Background Image"),
		"param_name" 	=> 	"caption_bg_image",
		"description" 	=> 	__("Select the image"),
		"group" 		=> 	'PRO Features',
		"dependency" => array("element" => "caption_bg_type", "value" => array("image"))
	),

	array(
        "type" => "html",
        "heading" => "<h3><a style='background:#2c4b7d;color:#fff;padding:20px;text-decoration:none;display:block;' href='http://codecanyon.net/item/visual-composer-extension-image-hover-effects/15910791?ref=labibahmed' target='_blank' >Upgrade to PRO</a></h3>",
        "param_name" => "pro_feature",
        "group" 		=> 'PRO Features',
    ),

	array(
        "type" => "html",
        "heading" => "<h3><a style='background:#2c4b7d;color:#fff;padding:20px;text-decoration:none;display:block;' href='https://wordpress.org/plugins/image-over-image-vc-extension/' target='_blank' >Image Over Image - VC Extension</a></h3>",
        "param_name" => "related_plugins",
        "description" 	=> 	__("This plugin will help you to display images which changes on hover.<a style='text-decoration:none;' href='https://demo.webdevocean.com/image-over-image-wordpress-plugin/' target='_blank' ><b>See Demo</b></a>"),
        "group" 		=> 'Related Plugins',
    ),

    array(
        "type" => "html",
        "heading" => "<h3><a style='background:#2c4b7d;color:#fff;padding:20px;text-decoration:none;display:block;' href='https://wordpress.org/plugins/carousel-anything/' target='_blank' >Carousel Anything - VC Extension</a></h3>",
        "param_name" => "related_plugins",
        "description" 	=> 	__("It will help you to put any content in carousel slider.<a style='text-decoration:none;' href='https://demo.webdevocean.com/carousel-anything-for-wpbakery-page-builder/' target='_blank' ><b>See Demo</b></a>"),
        "group" 		=> 'Related Plugins',
    ),
);

?>