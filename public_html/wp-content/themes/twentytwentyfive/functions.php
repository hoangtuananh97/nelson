<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );


// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    $first_name = sanitize_text_field($_POST["first_name"]);
//    $last_name = sanitize_text_field($_POST["last_name"]);
//    $phone = sanitize_text_field($_POST["phone"]);
//    $content = sanitize_text_field($_POST["content"]);
//    $email = sanitize_email($_POST["email"]);
//
//    // Add code to save the form data to the database
//    global $wpdb;
//    $table_name = $wpdb->prefix . 'contact_form_submissions';
//    $data = array(
//        'first_name' => $first_name,
//        'last_name' => $last_name,
//        'phone' => $phone,
//        'content' => $content,
//        'email' => $email,
//        'message' => $message,
//        'submission_time' => current_time('mysql')
//    );
//    $insert_result = $wpdb->insert($table_name, $data);
//
//    if ($insert_result === false) {
//        $response = array(
//            'success' => false,
//            'message' => 'Error saving the form data.',
//        );
//    } else {
//        $response = array(
//            'success' => true,
//            'message' => 'Form data saved successfully.'
//        );
//    }
//
//    // Return the JSON response
//    header('Content-Type: application/json');
//    echo json_encode($response);
//    exit;
//}

function display_contact_form_submissions_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_submissions';
    $form_data = $wpdb->get_results("SELECT * FROM $table_name WHERE name <> '' AND email <> '' AND message <> '' ORDER BY submission_time DESC", ARRAY_A);

    ?>
    <div class="wrap">
        <h1>Contact Form Submissions</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Submission Time</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($form_data as $data) : ?>
                <tr>
                    <td><?php echo esc_html($data['name']); ?></td>
                    <td><?php echo esc_html($data['email']); ?></td>
                    <td><?php echo esc_html($data['message']); ?></td>
                    <td><?php echo esc_html($data['submission_time']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

function register_contact_form_submissions_page() {
    add_menu_page(
        'Contact Form Submissions',
        'Form Submissions',
        'manage_options',
        'contact_form_submissions',
        'display_contact_form_submissions_page',
        'dashicons-feedback'
    );
}
add_action('admin_menu', 'register_contact_form_submissions_page');