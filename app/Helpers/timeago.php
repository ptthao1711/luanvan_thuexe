<?php

function timeAgo($datetime) {  
    $timestamp = strtotime($datetime);  
    $now = time();  
    $diff = $now - $timestamp;  

    if ($diff < 60) {  
        return $diff . ' giây trước';  
    } elseif ($diff < 3600) {  
        $minutes = floor($diff / 60);  
        return $minutes . ' phút trước';  
    } elseif ($diff < 86400) {  
        $hours = floor($diff / 3600);  
        return $hours . ' giờ trước';  
    } elseif ($diff < 604800) {  
        $days = floor($diff / 86400);  
        return $days . ' ngày trước';  
    } else {  
        $weeks = floor($diff / 604800);  
        return $weeks . ' tuần trước';  
    }  
}
