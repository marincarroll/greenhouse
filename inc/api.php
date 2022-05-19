<?php
/**
 * Fetch job data from the Greenhouse API.
 */
function mcgjb_fetch_greenhouse_jobs() {
    $data = wp_remote_get('https://boards-api.greenhouse.io/v1/boards/greenhouse/departments');
    $data = json_decode( $data['body'] );
    $departments = $data->departments;
    
    $return = [];
    foreach( $departments as $dep ){
        $jobs = $dep->jobs;
        
        if($jobs) {
            $return += [ $dep->name => $jobs ];
        }
    }
    return $return;
}

/**
 * Add job data to REST for use in edit.js
 */
function mcgjb_register_greenhouse_endpoint() {
    register_rest_route( 'mcgjb', '/greenhouse/', [
        'callback' => 'mcgjb_fetch_greenhouse_jobs'
    ] );
}
add_action( 'rest_api_init', 'mcgjb_register_greenhouse_endpoint' );
