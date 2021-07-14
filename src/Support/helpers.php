<?php

if (!function_exists('cjlbdStripQuotes')) {
    function cjlbdStripQuotes($expression)
    {
        return str_replace(["'", '"'], '', $expression);
    }
}

if (!function_exists('cjlbdMultipleArgs')) {
    function cjlbdMultipleArgs($expression, $separator = '|')
    {
        return collect(explode($separator, $expression))->map(function ($item) {
            return trim($item);
        });
    }
}
