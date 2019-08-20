<?php
/**
 * Accordion - Shortcode Options
 */

add_action( 'init', 'lvsy_accordion_vc_map' );
if ( ! function_exists( 'lvsy_accordion_vc_map' ) ) {
  function lvsy_accordion_vc_map() {

    vc_map( array(
      'name'            => __( 'Livesay Accordion', 'livesay-core'),
      'base'            => 'vc_accordion',
      'is_container'    => true,
      'description'     => __( 'Accordion Styles', 'livesay-core'),
      'icon'            => 'fa fa-bars color-pink',
      'category'        => LivesayLib::lvsy_cat_name(),
      'params'          => array(

        array(
          'type'        => 'dropdown',
          'heading'     => __( "Accordion Style", 'livesay-core'),
          'param_name'  => 'accordion_style',
          'value'       => array(
            __( "Select Accordion Style", 'livesay-core') => '',
            __( "Style One", 'livesay-core')   => 'style-one',
            __( "Style Two", 'livesay-core')   => 'style-two',
            __( "Style Three", 'livesay-core') => 'style-three',
          ),
          'description' => __( "Select Accordion Style", 'livesay-core'),
        ),
        LivesayLib::vt_id_option(),
        LivesayLib::vt_class_option(),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Active tab', 'livesay-core'),
          'param_name'  => 'active_tab',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'livesay-core'),
        ),
        array(
          'type'        => 'switcher',
          'heading'     => __( 'Only One Tab Active Mode', 'livesay-core'),
          'param_name'  => 'one_active',
          'description' => __( 'This will enable only one tab active at a time. All other tabs will be in-active mode.', 'livesay-core'),
        ),

      ),

      'custom_markup'   => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>',
      'default_content' => '
        [vc_accordion_tab title="Accordion Tab 1" sub_title="Sub Title 1"][/vc_accordion_tab]
        [vc_accordion_tab title="Accordion Tab 2" sub_title="Sub Title 2"][/vc_accordion_tab]
      ',
      'js_view'         => 'VcAccordionView'
    ) );

    // ==========================================================================================
    // VC ACCORDION TAB
    // ==========================================================================================
    vc_map( array(
      'name'                      => __( 'Accordion Section', 'livesay-core'),
      'base'                      => 'vc_accordion_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => LivesayLib::lvsy_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Title', 'livesay-core'),
          'param_name'  => 'title',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Sub Title', 'livesay-core'),
          'param_name'  => 'sub_title',
          'description' => __( "Enter your sub title here, this only shows at : <strong>Accordion Style Three</strong>", 'livesay-core'),
        ),
        array(
          'type'        => 'vt_icon',
          'heading'     => __( 'Icon', 'livesay-core'),
          'param_name'  => 'icon',
        )
      ),
      'js_view'         => 'VcAccordionTabView'
    ) );

  }
}