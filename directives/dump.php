<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('dump', function ($expression) {
    if ('local' === env('APP_ENV') && '' !== $expression) {
        return "<?php dump({$expression}); ?>";
    }
});
