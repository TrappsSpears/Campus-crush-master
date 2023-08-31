<?php
 function format_post_date($post_date) {
    // Convert the input date to a timestamp
    $timestamp = strtotime($post_date);
    
    // Get today's date at midnight
    $today = strtotime('today midnight');
    
    // Get yesterday's date at midnight
    $yesterday = strtotime('yesterday midnight');

    // Check if the post date is today
    if ($timestamp >= $today) {
        return 'Today';
    }
    // Check if the post date is yesterday
    elseif ($timestamp >= $yesterday) {
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