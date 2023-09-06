<?php
function format_post_date($post_date) {
    // Convert the input date to a timestamp
    $timestamp = strtotime($post_date);
    
    // Get the current timestamp
    $now = time();

    // Calculate the time difference in seconds
    $time_diff = $now - $timestamp;

    // Calculate the number of seconds in a minute, hour, day, week, and month
    $minute = 60;
    $hour = 3600;
    $day = 86400;
    $week = 604800;
    $month = 2628000; // An approximate value for a month

    // Check if the post date is within the last minute
    if ($time_diff < $minute) {
        return $time_diff . ' secs ';
    }
    // Check if the post date is within the last hour
    elseif ($time_diff < $hour) {
        $minutes = floor($time_diff / $minute);
        return $minutes . ' mins ';
    }
    // Check if the post date is within the last day
    elseif ($time_diff < $day) {
        $hours = floor($time_diff / $hour);
        return $hours . ' hrs ';
    }
    // Check if the post date is within the last week
    elseif ($time_diff < $week) {
        $days = floor($time_diff / $day);
        return $days == 1 ? '1 day ' : $days . ' days ';
    }
    // Check if the post date is within the last month
    elseif ($time_diff < $month) {
        $weeks = floor($time_diff / $week);
        return $weeks == 1 ? '1 week ' : $weeks . ' weeks ';
    }
    // For older posts, return the date as "1 month ago," "3 months ago," etc.
    else {
        $months = floor($time_diff / $month);
        return $months == 1 ? '1 month ' : $months . ' months';
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