<?php

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $formattedDate = date_create_from_format("Y-m-d", $date);
        return $formattedDate;
    }
}
