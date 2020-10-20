<?php
/**
 * Fired during plugin activation
 */
class QuickSearchAndReplace{
	
	function __construct(){
		/*Menu hook*/
		add_action( 'admin_menu', array($this,'register_quick_search_and_replace_menu' ));
		/*Register Styling Scripts*/
		add_action( 'quick_search_scripts', array($this,'script_styles' ));
	}

	function register_quick_search_and_replace_menu() {
		if(is_admin())
		add_menu_page('Quick Search and Replace', 'Quick Search & Replace', 'edit_pages', 'quick-search', array($this,'quick_search_and_replace'),  'dashicons-search', 30);
	}
	function script_styles(){
		echo '<link rel="stylesheet" href="'.QUICK_SEARCH_URL.'/assets/css/bootstrap.css">';
    	wp_enqueue_script( 'jquery-validate', QUICK_SEARCH_URL.'/assets/js/jquery-validate.js', '', '', true );
    	wp_enqueue_script( 'main-script', QUICK_SEARCH_URL.'/assets/js/main-script.js', '', '', true );
    	wp_localize_script('main-script', 'object',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
        )
    );
	}

	function quick_search_and_replace() {
		echo '<h1>'.__('Quick search and replace', 'quick-search').'</h1>';

		if(is_admin() && current_user_can('manage_options')){
			require(QUICK_SEARCH_PATH.'/templates/form.php');
		}
		else
		_e('Denied ! Only admin can see this.', 'quick-search');

	}
}
$QuickSearchAndReplace = new QuickSearchAndReplace();
