<?php
function format_post_date($post_date) {
    // Convert the input date to a timestamp
    $timestamp = strtotime($post_date);
    
    // Get the current timestamp
    $now = time();

    // Calculate the time difference in seconds
    $time_diff = $now - $timestamp;

    // Check if the post date is within the last minute
    if ($time_diff < 60) {
        return $time_diff . ' secs ago';
    }
    // Check if the post date is within the last hour
    elseif ($time_diff < 3600) {
        $minutes = floor($time_diff / 60);
        return $minutes . ' mins ago';
    }
    // Check if the post date is today
    elseif (date('Y-m-d', $timestamp) == date('Y-m-d', $now)) {
        $hours = floor($time_diff / 3600);
        return $hours . ' hrs ago';
    }
    // Check if the post date is yesterday
    elseif (date('Y-m-d', $timestamp) == date('Y-m-d', strtotime('yesterday', $now))) {
        return 'Yesterday';
    }
    // For other days, format the date as "Thursday 23 May 2023" using the date() function
    else {
        return date('l j F Y', $timestamp);
    }
}


function formatPostContent($content) {
    // Search for URLs in the content
    $pattern = '/https?:\/\/\S+/i'; // Regular expression pattern to match URLs
    $formattedContent = preg_replace_callback($pattern, function($match) {
        // Use the matched URL as the link text and href
        return '<a style="color:#1e90ff" href="' . $match[0] . '" target="_blank">' . $match[0] . '</a>'; 
    }, $content);

    return $formattedContent;
}