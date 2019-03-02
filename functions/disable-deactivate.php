<?php
add_filter( 'plugin_action_links', 'spd_disable_plugin_actions', 10, 4 );

function spd_disable_plugin_actions( $actions, $plugin_file, $plugin_data, $context ) {
	$plugins = array( 'wp-client/wp-client.php', 'wp-client-invoicing/wp-client-invoicing.php', 'no-self-ping/no-self-pings.php', 'wordpress-https/wordpress-https.php' );
	if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, $plugins ))
		unset( $actions['deactivate'] );
	return $actions;
}
?>