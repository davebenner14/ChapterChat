<?php

if (!function_exists('generateStars')) {
    function generateStars($rating)
    {
        $starFull = "<span class='fa fa-star text-yellow-500'></span>";
        $starHalf = "<span class='fa fa-star-half-alt text-yellow-500'></span>";
        $starEmpty = "<span class='far fa-star text-yellow-500'></span>";
    
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
        $emptyStars = 5 - $fullStars - $halfStar;
    
        $stars = str_repeat($starFull, $fullStars) . str_repeat($starHalf, $halfStar) . str_repeat($starEmpty, $emptyStars);
        return $stars;
    }
    
    
}