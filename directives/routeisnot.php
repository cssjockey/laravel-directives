<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('routeisnot', function ($expression) {
    if ('' === $expression) {
        return '';
    }
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            "<?php if (! fnmatch({$expression->get(0)}, Route::currentRouteName())) : ?>",
            "<?php echo {$expression->get(1)} ?>",
            '<?php endif; ?>',
        ]);
    }

    return "<?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?>";
});

Blade::directive('endrouteisnot', function () {
    return '<?php endif; ?>';
});
