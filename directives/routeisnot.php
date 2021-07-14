<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('routeisnot', function ($expression) {
    return "<?php if (!fnmatch({$expression}, Route::currentRouteName())) : ?>";
});

Blade::directive('endrouteisnot', function () {
    return '<?php endif; ?>';
});
