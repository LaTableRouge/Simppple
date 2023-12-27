<?php

function simppple_update_themes($transient) {

	$stylesheet = get_template();
	$theme = wp_get_theme();
	$tested = $theme->get('Tested');
	$version = $theme->get('Version');
	$author = $theme->get('Author');
	$cache_key = 'simppple-theme-update';
	$cache_allowed = true;

	$remote = get_transient($cache_key);

	if(!$remote || !$cache_allowed) {
		$remote = wp_remote_get(
			"https://github.com/{$author}/{$stylesheet}/releases/latest/download/info.json",
			array(
				'timeout' => 10,
				'headers' => array(
					'Accept' => 'application/json'
				)
			)
		);

		if(
			is_wp_error( $remote )
			|| 200 !== wp_remote_retrieve_response_code( $remote )
			|| empty( wp_remote_retrieve_body( $remote ) )
		) {
			return $transient;
		}

		$remote = json_decode( wp_remote_retrieve_body( $remote ) );

		if( ! $remote ) {
			return $transient;
		}

		set_transient($cache_key, $remote, HOUR_IN_SECONDS );

	}

	// encode the response body

	$data = array(
		'theme' => $stylesheet,
		'url' => $remote->url,
		'tested' => $remote->tested,
		'requires' => $remote->requires,
		'requires_php' => $remote->requires_php,
		'new_version' => $remote->version,
		'package' => $remote->download_url,
	);

	if(
		$remote
		&& version_compare( $version, $remote->version, '<' )
		&& version_compare( $tested, $remote->tested, '<' )
		&& version_compare( $remote->requires, get_bloginfo( 'version' ), '<' )
		&& version_compare( $remote->requires_php, PHP_VERSION, '<' )
	) {

		$transient->response[ $stylesheet ] = $data;

	} else {

		$transient->no_update[ $stylesheet ] = $data;

	}

	return $transient;

}

add_filter('site_transient_update_themes', 'simppple_update_themes');

