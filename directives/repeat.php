<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('repeat', function ($expression) {
    return "<?php for (\$i = 0 ; \$i < (int) {$expression}; \$i++): ?>";
});

Blade::directive('endrepeat', function () {
    return '<?php endfor; ?>';
});
