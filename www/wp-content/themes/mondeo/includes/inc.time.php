<?php 
/*******************************************************************************
 * The time functions for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_filter('the_time', 'ht_timeago');

function ht_timeago() {
    global $post;
    
    $date = $post->post_date;
    
    $time = get_post_time('G', true, $post);

    $time_diff = time() - $time;
    
    if ( $time_diff > 0 && $time_diff < 24*60*60 )
        $display = sprintf( __('%s ago'), human_time_diff( $time ) );
    else
        $display = date(get_option('date_format'), strtotime($date) );
            
    return $display;
}


?>