<?php 
/**
* Custom Post Class
*/
class Custom_Post
{
	public $cp_slug_name = "wpdev-portfolio";
	public $taxo_slug_name = "wpdev-taxonomy";

	public $cp_singular = "Portfolio";
	public $cp_plural = "Portfolios";
	public $taxo_singular = "Category";
	public $taxo_plural = "Categories";
	
	/*
	Intialize all actions
	 */
	function __construct()
	{
		add_action( 'init', array(&$this, 'wpdev_register_custom_post') );
		add_action( 'init', array(&$this, 'wpdev_register_custom_taxonomies') );
	}

	/**
	* Registers a new post type
	* @uses $wp_post_types Inserts new post type object into the list
	*
	* @param string  Post type key, must not exceed 20 characters
	* @param array|string  See optional args description above.
	* @return object|WP_Error the registered post type object, or an error object
	*/
	function wpdev_register_custom_post() {
		$singular = $this->cp_singular;
		$plural = $this->cp_plural;
		$slug = $this->cp_slug_name;

		$labels = array(
			'name'                => __( $plural, 'text-domain' ),
			'singular_name'       => __( $singular, 'text-domain' ),
			'add_new'             => _x( 'Add New ' . $singular, 'text-domain', 'text-domain' ),
			'add_new_item'        => __( 'Add New ' . $singular, 'text-domain' ),
			'edit_item'           => __( 'Edit ' . $singular, 'text-domain' ),
			'new_item'            => __( 'New ' . $singular, 'text-domain' ),
			'view_item'           => __( 'View ' . $singular, 'text-domain' ),
			'search_items'        => __( 'Search ' . $plural, 'text-domain' ),
			'not_found'           => __( 'No '. $plural.' found', 'text-domain' ),
			'not_found_in_trash'  => __( 'No '.$plural.' found in Trash', 'text-domain' ),
			'parent_item_colon'   => __( 'Parent '.$singular.':', 'text-domain' ),
			'menu_name'           => __( $plural, 'text-domain' ),
		);
	
		$args = array(
			'labels'                   => $labels,
			'hierarchical'        => false,
			'description'         => 'description',
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => null,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,

			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title', 'editor', 'author', 'thumbnail',
				'excerpt','custom-fields', 'trackbacks', 'comments',
				'revisions', 'page-attributes', 'post-formats'
				)
		);
	
		register_post_type( $slug, $args );
	}

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function wpdev_register_custom_taxonomies() {
	$singular = $this->taxo_singular;
	$plural = $this->taxo_plural;
	$slug = $this->taxo_slug_name;
	$cp_name = $this->cp_slug_name;
	$labels = array(
		'name'					=> _x( $plural, 'Taxonomy '. $plural, 'text-domain' ),
		'singular_name'			=> _x( $singualar, 'Taxonomy ' . $singualar, 'text-domain' ),
		'search_items'			=> __( 'Search '. $plural, 'text-domain' ),
		'popular_items'			=> __( 'Popular '. $plural, 'text-domain' ),
		'all_items'				=> __( 'All ' . $plural, 'text-domain' ),
		'parent_item'			=> __( 'Parent ' . $singualar, 'text-domain' ),
		'parent_item_colon'		=> __( 'Parent ' . $singualar, 'text-domain' ),
		'edit_item'				=> __( 'Edit ' . $singualar, 'text-domain' ),
		'update_item'			=> __( 'Update ' . $singualar, 'text-domain' ),
		'add_new_item'			=> __( 'Add New ' . $singualar, 'text-domain' ),
		'new_item_name'			=> __( 'New ' . $singualar, 'text-domain' ),
		'add_or_remove_items'	=> __( 'Add or remove ' . $plural, 'text-domain' ),
		'choose_from_most_used'	=> __( 'Choose from most used text-domain', 'text-domain' ),
		'menu_name'				=> __( $singualar, 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( $slug, $cp_name, $args );
	}

}

$my_cp = new Custom_Post();
