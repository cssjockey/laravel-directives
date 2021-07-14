<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('dd', function ($expression) {
    if(env("APP_ENV") === 'local' && $expression !== ''){
        return "<?php dd({$expression}); ?>";
    }
});
