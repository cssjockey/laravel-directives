<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('ddd', function ($expression) {
    return "<?php ddd({$expression}); ?>";
});
