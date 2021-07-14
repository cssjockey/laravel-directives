<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('dd', function ($expression) {
    return "<?php dd({$expression}); ?>";
});
