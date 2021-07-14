# Laravel Blade Directives

This package provides a collection of useful laravel blade directives.
## Installation

You can install the package via composer:

```bash
$ composer require cssjockey/laravel-directives
```
__Optional:__ The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:
```bash
'providers' => [
    // ...
    CSSJockey\LaravelDirectives\LaravelDirectivesServiceProvider::class,
];
```
## Usage

### @modeldata
Fetch any model by ID to display any data from result.
```bash
@modeldata('App\Models\User'|1|"email")
```
This will fetch the `User` with ID 1 and renders the email address.

### @arraydata
Renders the value of an array and supports array dot notation.
```bash
@arraydata($array|$variable)
```
__example with simple array:__
```bash
@arraydata(['key1' => 'value1', 'key2' => 'value2']|'key1')

Output: value1
```
```bash
@arraydata(['key1' => 'value1', 'key2' => 'value2']|'key2')

Output: value2
```

__example with multi-dimensional array:__
```bash
$data = [
    'parent' => [
        'child' => 'child value',
        'child2' => [
            'key' => 'child2 key value'
        ],
    ]
];
```
```bash
@arraydata($data|'parent')

Output: {"child":"child value","child2":{"key":"child2 key value"}}
```
This will return JSON string as the values is array.

__Supports dot notation.__
```bash
@arraydata($data|'parent.child')

Output (String): child value
```
```bash
@arraydata($data|'parent.child2.key')

Output (String): child2 key value
```

### @code | @code ... @endcode
Renders the content in `<pre>` tag.

__example of inline code__
```bash
@code('<div>Hello world</div>')

Output: <div>hello world</div>
```

__example with multi-line code block__
```bash
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

### @dd 
Die and dump, renders only if __APP_ENV__ is set to __local__.

__example__
```bash
@dd('die and dump here')

Output: "die and dump here"
```
### @ddd 
Dump, die and debug, renders only if __APP_ENV__ is set to __local__.

__example__
```bash
@ddd("Dump, Die, Debug")
```
### @dump 
Inline dump, renders only if __APP_ENV__ is set to __local__.

__example__
```bash
@ddd("Dump this inline")
```

### @haserror | @haserror ... @endhaserror
Output content for `$errors->has('input_name')` to determine if any error message found for the given input field.
```bash
@haserror('name'|"Message or class name goes here.")

Output (String): Message or class name goes here.
```
```bash
@haserror('name')
You can display any text or html here if any error message exists for input field name.
@endhaserror()
```

### @instanceof ... @endinstanceof
Quickly check if first parameter is an instance of second parameter.
```bash
@instanceof($user|'\App\Models\User')
Yes $user is an instance of '\App\Models\User'
@endinstanceof
```

### @typeof ... @endtypeof
Quickly check if the parameter is a specific type.
```bash
$variable = 'a valid string';

@typeof($variable|'string')
Yes $variable type is string.
@endtypeof

$variable = ['valid' => 'array'];

@typeof($variable|'array')
Yes $variable type is array.
@endtypeof
```

### @istrue | @istrue ... @endistrue
Display content if variable of condition is true.
```bash
$var1 = 'one';
$var2 = 'one';
$true = ($var1 === $var2);
```
```bash
@istrue($true|"Display this content")
@istrue($var1 === $var2|"Yes it is")
```
```bash
@istrue($true)
Display this line
@endistrue

@istrue($var1 === $var2)
Yes the condition is true
@endistrue
```
### @isfalse | @isfalse ... @endisfalse
Display content if variable of condition is false.
```bash
$var1 = 'one';
$var2 = 'two';
$false = ($var1 === $var2);
```
```bash
@isfalse($false|"Display this content")
@isfalse($var1 === $var2|"No it is not")
```
```bash
@isfalse($false)
Display this line
@endisfalse

@isfalse($var1 === $var2)
No the condition is not true
@endisfalse
```
### @isnull | @isnull ... @endisnull
Display content only if variable is NULL.
```
$variable = null;
```
```bash
@isnull($null_variable|"yes it is null")

@isnull($null_variable)
Yes variable is null
@endisnull
```

### @isnotnull | @isnotnull ... @endisnotnull
Display content only if variable is NOT NULL.
```
$variable = 'something other than null';
```
```bash
@isnotnull($variable|"yes variable is not null")

@isnotnull($variable)
Yes variable is not null
@endisnotnull
```

### @isuser | @isuser ... @endisuser
Display content only if the user is logged in.
```bash
@isuser("Yes user is logged in!")

@isuser
Yes user is logged in!
@endisuser
```

### @isguest | @isguest ... @endisguest
Display content only if the user is __not__ logged in.
```bash
@isguest("Show this line to the guest!")

@isguest
Show this content to the guest!
@endisguest
```

### @routeis | @routeis ... @endrouteis
Show content only if current route matches the first parameter.
```bash
@routeis("route.name.here"|"show this content")

@routeis("route.name.here")
show this content
@endrouteis
```

### @routeisnot | @routeisnot ... @endrouteisnot
Show content only if current route does not match the first parameter.
```bash
@routeisnot("route.name.here"|"show this content")

@routeisnot("route.name.here")
show this content
@endrouteisnot
```

### @repeat ... @endrepeat
Repeat any content specified number of times.
```bash
@repeat(10)
<div class="">Repeat this content</div>
@endrepeat
```

### @script | @script ... @endscript
Create a `script` element or include a javascript file.
```bash
@script('public/url/to/script.js')

@script
console.log('I run from this directive')
@endscript
```

### @style | @style ... @endstyle
Create a `style` element or include a javastyle file.
```bash
@style('public/url/to/style.css')

@style
body{ overflow: hidden }
@endstyle
```

### @tagattributes
Bind attributes to any html tag.
```bash
<div @tagattributes(['id' => 'some-id', 'class' => 'css-class', 'data-item' => 'value'])>
content goes here.
</div>

Output:
<div id="some-id" class="css-class" data-item="value">
    content goes here.
</div>
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
