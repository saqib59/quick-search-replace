<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if directly accessed
do_action('quick_search_scripts');
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3>Quick Search And Replace</h3>
				<p><?php _e('Make sure to backup your website database before you use this plugin!', 'search-replace'); ?></p>
			</div>
			<div class="card-body">
				
				<form action="" method="post" id="quick-search">
					<div class="form-group row">
						<div class="col-sm-12">
							<?php wp_nonce_field( 'search_replace' ) ?>
							<label for="search_key"><?php _e('Search:', 'search-replace'); ?></label>
							<input type="text" name="search_key" id="search_key" /><br />
							<label for="replace_key"><?php _e('Replace by:', 'search-replace'); ?></label>
							<input type="text" name="replace_key" id="replace_key" />
							<br>
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<label for="in"><?php _e('In:', 'search-replace'); ?></label>
								<input type="hidden" name="action" value="quick_search_action">
								<?php
								$post_types = get_post_types( ['public' => true],object );
								unset( $post_types['attachment'] );
								foreach ( $post_types  as $post_type ) {
									echo "<label>".$post_type->labels->singular_name;
										echo '<input type="checkbox" value="'.$post_type->name.'" name="post_types[]" />';
									echo "</label>";
								}
								?>
							</div>
						</div>
						<div class="form-group row">
							<label for="quick_replace" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" id="quick_replace" name="quick_replace" class="btn btn-primary"><?php _e('Go!', 'quick-search'); ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>	</div>
	</div>
	<script>
		jQuery(document).ready(function(){
			jQuery('#quick-search input[type=submit]').click(function(){
	return confirm('<?php _e('Are you sure to do that?', 'quick-search'); ?>');
	});
	});
	</script>