<?php 
/**
 * ajax
 */
class quick_search_ajax{
	function __construct(){

		add_action( "wp_ajax_quick_search_action", array($this, 'quick_search_and_replace'), 10 );
		add_action( "wp_ajax_nopriv_quick_search_action", array($this, 'quick_search_and_replace'), 10 );
		
	}
	public function quick_search_and_replace(){
		global $wpdb;
		if (!isset($_POST['search_key']) || !isset($_POST['replace_key']) || !isset($_POST['post_types']) ) {
			$response['message'] = "Oops Something is missing";
			$response['status'] = false;
		}
		else{
			$total_changes = 0;
			$post_types = $_POST['post_types'];
			foreach ($post_types as $key => $posttype) {

				$search = stripslashes_deep($_POST['search_key']);
				$replace = stripslashes_deep($_POST['replace_key']);

				$res = $wpdb->query( 
					$wpdb->prepare( 
						"UPDATE ".$wpdb->posts."
						 SET post_excerpt = REPLACE(post_excerpt, %s, %s),
						 post_content = REPLACE(post_content, %s, %s),
						 post_title = REPLACE(post_title, %s, %s)
						 WHERE post_type='$posttype'",
					     $search, $replace, $search, $replace, $search, $replace
				)
				);
				$total_changes = $res + $total_changes;
			}
			$response['message'] = $total_changes." records were updated";
			$response['status'] = true;
		}
		 $this->responseJsonResults($response);
	}
	function responseJsonResults($data){
        header('Content-Type: application/json');
        echo json_encode($data);
        wp_die();
    }
	

}
new quick_search_ajax();