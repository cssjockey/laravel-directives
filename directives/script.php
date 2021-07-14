<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('script', function ($expression) {
    if (!empty($expression)) {
        return '<script src="'.cjlbdStripQuotes($expression).'"></script>';
    }

    return '<script type="text/javascript">';
});

Blade::directive('endscript', function () {
    return '</script>';
});
