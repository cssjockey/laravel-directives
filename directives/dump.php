<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('dump', function ($expression) {
    return "<?php dump({$expression}); ?>";
});
