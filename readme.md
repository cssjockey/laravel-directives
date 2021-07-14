# Laravel Blade Directives

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
<!-- [![Build Status][ico-travis]][link-travis] -->
<!-- [![StyleCI][ico-styleci]][link-styleci] -->

This package provides a collection of useful laravel blade directives.
## Installation

You can install the package via composer:

```bash
$ composer require cssjockey/laravel-directives
```
__Optional:__ The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:
```php
'providers' => [
    // ...
    CSSJockey\LaravelDirectives\LaravelDirectivesServiceProvider::class,
];
```
## Usage

#### @arraydata
Renders the value of an array and supports array dot notation.
```php
@arraydata($array|$variable)
```
__example with simple array:__
```php
@arraydata(['key1' => 'value1', 'key2' => 'value2']|'key1')

Output: value1
```
```php
@arraydata(['key1' => 'value1', 'key2' => 'value2']|'key2')

Output: value2
```

__example with multi-dimensional array:__
```php
$data = [
    'parent' => [
        'child' => 'child value',
        'child2' => [
            'key' => 'child2 key value'
        ],
    ]
];
```
```php
@arraydata($data|'parent')

Output: {"child":"child value","child2":{"key":"child2 key value"}}
```
This will return JSON string as the values is array.

#### @code
Renders the content in `<pre>` tag.

__example of inline code __
```php
@code('<div>Hello world</div>')

Output: <div>hello world</div>
```

__example with multi-line code block__
```php
@code
<div>
    <a href="#">Click me</a>
</div>
@endcode

Output: is wrapped in <pre> tag
<div>
    <a href="#">Click me</a>
</div>
```


__Supports dot notation.__
```php
@arraydata($data|'parent.child')

Output (String): child value
```
```php
@arraydata($data|'parent.child2.key')

Output (String): child2 key value
```
## Changelog
Please see the changelog for more information on what has changed recently.
## Todo:
- Add more free icons to the package.
- Create an artisan command to optimize all the SVG files.
## Contributing
Please see contributing for details.
## Security
If you discover any security-related issues, please email admin@cssjockey.com instead of using the issue tracker.
## Credits
Mohit Aneja
All Contributors
## License
MIT Please see the license for more information.

[ico-version]: https://img.shields.io/packagist/v/cssjockey/laravel-directives.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/cssjockey/laravel-directives.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/cssjockey/laravel-directives/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/cssjockey/laravel-directives
[link-downloads]: https://packagist.org/packages/cssjockey/laravel-directives
[link-travis]: https://travis-ci.org/cssjockey/laravel-directives
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/cssjockey
[link-contributors]: ../../contributors
