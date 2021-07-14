<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('ddd', function ($expression) {
    if ('local' === env('APP_ENV') && '' !== $expression) {
        return "<?php ddd({$expression}); ?>";
    }
});
