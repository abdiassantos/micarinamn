<?php
/**
 * Gmap - Shortcode Options
 */
add_action( 'init', 'lvsy_gmap_vc_map' );
if ( ! function_exists( 'lvsy_gmap_vc_map' ) ) {
  function lvsy_gmap_vc_map() {
    vc_map( array(
      "name" => __( "Google Map", 'livesay-core'),
      "base" => "lvsy_gmap",
      "description" => __( "Google Map Styles", 'livesay-core'),
      "icon" => "fa fa-map color-cadetblue",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "API KEY", 'livesay-core' ),
          "param_name"  => 'api_key',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter Map ID', 'livesay-core'),
          "param_name"  => "gmap_id",
          "value"       => "",
          "description" => __( 'Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong>', 'livesay-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter your Google Map API Key', 'livesay-core'),
          "param_name"  => "gmap_api",
          "value"       => "",
          "description" => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'livesay-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Map Settings", 'livesay-core' ),
          "param_name"  => 'map_settings',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Type', 'livesay-core' ),
          'value' => array(
            __( 'Select Type', 'livesay-core' ) => '',
            __( 'ROADMAP', 'livesay-core' ) => 'ROADMAP',
            __( 'SATELLITE', 'livesay-core' ) => 'SATELLITE',
            __( 'HYBRID', 'livesay-core' ) => 'HYBRID',
            __( 'TERRAIN', 'livesay-core' ) => 'TERRAIN',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_type',
          'description' => __( 'Select your google map type.', 'livesay-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Style', 'livesay-core' ),
          'value' => array(
            __( 'Select Style', 'livesay-core' ) => '',
            __( 'Gray Scale', 'livesay-core' ) => "gray-scale",
            __( 'Mid Night', 'livesay-core' ) => "mid-night",
            __( 'Blue Water', 'livesay-core' ) => 'blue-water',
            __( 'Light Dream', 'livesay-core' ) => 'light-dream',
            __( 'Pale Dawn', 'livesay-core' ) => 'pale-dawn',
            __( 'Apple Maps-esque', 'livesay-core' ) => 'apple-maps',
            __( 'Blue Essence', 'livesay-core' ) => 'blue-essence',
            __( 'Unsaturated Browns', 'livesay-core' ) => 'unsaturated-browns',
            __( 'Paper', 'livesay-core' ) => 'paper',
            __( 'Midnight Commander', 'livesay-core' ) => 'midnight-commander',
            __( 'Light Monochrome', 'livesay-core' ) => 'light-monochrome',
            __( 'Flat Map', 'livesay-core' ) => 'flat-map',
            __( 'Retro', 'livesay-core' ) => 'retro',
            __( 'becomeadinosaur', 'livesay-core' ) => 'becomeadinosaur',
            __( 'Neutral Blue', 'livesay-core' ) => 'neutral-blue',
            __( 'Subtle Grayscale', 'livesay-core' ) => 'subtle-grayscale',
            __( 'Ultra Light with Labels', 'livesay-core' ) => 'ultra-light-labels',
            __( 'Shades of Grey', 'livesay-core' ) => 'shades-grey',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_style',
          'description' => __( 'Select your google map style.', 'livesay-core' ),
          'dependency' => array(
            'element' => 'gmap_type',
            'value' => 'ROADMAP',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Height', 'livesay-core'),
          "param_name"  => "gmap_height",
          "value"       => "",
          "description" => __( "Enter the px value for map height. This will not work if you add this shortcode into the Map Tab shortcode.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Common Marker', 'livesay-core'),
          "param_name"  => "gmap_common_marker",
          "value"       => "",
          "description" => __( "Upload your custom marker.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Zoom', 'roof-core'),
          "param_name"  => "gmap_zoom",
          "value"       => "",
          "description" => __( "Enter zoom as numeric value. [Eg : 18]", 'roof-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Enable & Disable", 'livesay-core' ),
          "param_name"  => 'enb_disb',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Scroll Wheel', 'livesay-core'),
          "param_name"  => "gmap_scroll_wheel",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Street View Control', 'livesay-core'),
          "param_name"  => "gmap_street_view",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Map Type Control', 'livesay-core'),
          "param_name"  => "gmap_maptype_control",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Map Markers
        array(
          "type"        => "notice",
          "heading"     => __( "Map Pins", 'livesay-core' ),
          "param_name"  => 'map_pins',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Locations', 'livesay-core' ),
          'param_name' => 'locations',
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'livesay-core' ),
              'param_name' => 'latitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'livesay-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'livesay-core' ),
              'param_name' => 'longitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'livesay-core' ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Custom Marker', 'livesay-core' ),
              'param_name' => 'custom_marker',
              "description" => __( "Upload your unique map marker if your want to differentiate from others.", 'livesay-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Heading', 'livesay-core' ),
              'param_name' => 'location_heading',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'livesay-core' ),
              'param_name' => 'location_text',
            ),

          )
        ),

        LivesayLib::vt_class_option(),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'livesay-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'livesay-core'),
        ),

      )
    ) );
  }
}
