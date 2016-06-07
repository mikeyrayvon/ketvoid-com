<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_igv_';

	/**
	 * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
	 */

  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Options & Images', 'cmb2' ),
    'object_types'  => array( 'post', ), // Post type
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Background Color', 'IGV' ),
    'desc'    => __( '', 'IGV' ),
    'id'      => $prefix . 'bg_color',
    'type'    => 'colorpicker',
    'default' => '#d3d3d3',
  ) );

  $group_images = $cmb->add_field( array(
    'id'          => $prefix . 'images',
    'type'        => 'group',
    'description' => __( 'Collection Images', 'cmb2' ),
    'options'     => array(
      'group_title'   => __( 'Image {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => __( 'Add Another Image', 'cmb2' ),
      'remove_button' => __( 'Remove Image', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $cmb->add_group_field( $group_images, array(
    'name' => __( 'Image File', 'cmb2' ),
    'id'   => 'image',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_images, array(
    'name' => __( 'Full width', 'cmb2' ),
    'id'   => 'full',
    'type' => 'checkbox',
  ) );

}
?>
