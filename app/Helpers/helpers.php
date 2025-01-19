<?php 

if (!function_exists('getDurationLabel')) {
    function getDurationLabel($duration)
    {
        $durations = [
            1 => 'Last 7 days',
            2 => 'Last 28 days',
            3 => 'Last 90 days',
            4 => 'Last 365 days',
            5 => 'Lifetime',
            6 => '2025',
            7 => '2024',
            8 => 'January',
            9 => 'December 2024',
            10 => 'November 2024',
            11 => 'Custom',
        ];

        return isset($durations[$duration]) ? $durations[$duration] : null;
    }
}