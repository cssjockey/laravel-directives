<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('style', function ($expression) {
    if (!empty($expression)) {
        return '<link rel="stylesheet" href="'.cjlbdStripQuotes($expression).'">';
    }

    return '<style>';
});

Blade::directive('endstyle', function () {
    return '</style>';
});
