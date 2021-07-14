<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('svg', function ($expression) {
    $expression = cjlbdStripQuotes($expression);
    $expression = str_replace('.svg', '', $expression);
    $expression = "{$expression}.svg";
    $filesystem = new Filesystem();
    if (Str::contains($expression, 'http')) {
        return file_get_contents($expression);
    }

    if (file_exists(public_path($expression))) {
        return $filesystem->get(public_path($expression));
    }

    return '';
});
