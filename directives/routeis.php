<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('routeis', function ($expression) {
    return "<?php if (fnmatch({$expression}, Route::currentRouteName())) : ?>";
});

Blade::directive('endrouteis', function () {
    return '<?php endif; ?>';
});
