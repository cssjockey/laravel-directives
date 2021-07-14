<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('tagattributes', function ($expression) {
    $expression = cjlbdMultipleArgs($expression, '|');
    $output = 'collect((array) '.$expression->get(0).')
            ->map(function($value, $key) {
                return "{$key}=\"{$value}\"";
            })
            ->implode(" ")';

    return "<?php echo {$output}; ?>";
});
