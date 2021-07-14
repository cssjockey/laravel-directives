<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('haserror', function ($expression) {
    return '<?php if (isset($errors) && $errors->has('.$expression.')): ?>';
});

Blade::directive('endhaserror', function ($expression) {
    return '<?php endif; ?>';
});
