<?php
/**
 * Tabs - Shortcode Options
 */

add_action( 'init', 'lvsy_tabs_vc_map' );
if ( ! function_exists( 'lvsy_tabs_vc_map' ) ) {
  function lvsy_tabs_vc_map() {

    $tab_one_id = time() . '-1-' . rand( 0, 100 );
    $tab_two_id = time() . '-2-' . rand( 0, 100 );
    $tab_three_id = time() . '-3-' . rand( 0, 100 );

    vc_map( array(
      "name"            => __( "Livesay Tabs", 'livesay-core'),
      'base'            => 'vc_tabs',
      'is_container'    => true,
      'icon'            => 'fa fa-list-alt color-blue',
      'description'     => __( "Tabs Style", 'livesay-core'),
      'category'        => LivesayLib::lvsy_cat_name(),
      'params'          => array(
        array(
          'type'        => 'dropdown',
          'heading'     => __( "Tab Style", 'livesay-core'),
          'param_name'  => 'tab_style',
          'value'       => array(
            __( "Select Tab Style", 'livesay-core') => '',
            __( "Style One", 'livesay-core')   => 'style-one',
            __( "Style Two", 'livesay-core')   => 'style-two',
            __( "Style Three", 'livesay-core') => 'style-three',
            __( "Style four", 'livesay-core') => 'style-four',
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Active Tab", 'livesay-core'),
          'param_name'  => 'active',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'livesay-core'),
        ),

      ),
      'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
      'default_content' => '
        [vc_tab title="Tab 1" tab_id="' . $tab_one_id . '"][/vc_tab]
        [vc_tab title="Tab 2" tab_id="' . $tab_two_id . '"][/vc_tab]
        [vc_tab title="Tab 3" tab_id="' . $tab_three_id . '"][/vc_tab]',
      'js_view'         => 'VcTabsView'
    ) );

    /* Tab */
    vc_map( array(
      'name'                      => __( "Tab", 'livesay-core'),
      'base'                      => 'vc_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => LivesayLib::lvsy_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'tab_id',
          'heading'     => __( "Tab Unique ID", 'livesay-core'),
          'param_name'  => 'tab_id'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title", 'livesay-core'),
          'param_name'  => 'title',
        ),
        array(
          'type'        => 'vt_icon',
          'heading'     => __( "Tab Icon", 'livesay-core'),
          'param_name'  => 'icon',
        ),
      ),
      'js_view'         => 'VcTabView'
    ) );

  }
}