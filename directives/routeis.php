<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('routeis', function ($expression) {
    if ('' === $expression) {
        return '';
    }
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            "<?php if (fnmatch({$expression->get(0)}, Route::currentRouteName())) : ?>",
            "<?php echo {$expression->get(1)} ?>",
            '<?php endif; ?>',
        ]);
    }

    return "<?php if (fnmatch({$expression}, Route::currentRouteName())) : ?>";
});

Blade::directive('endrouteis', function () {
    return '<?php endif; ?>';
});
