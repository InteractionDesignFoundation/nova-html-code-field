# Nova HTML code Field

[![Latest Stable Version](https://poser.pugx.org/interaction-design-foundation/nova-html-code-field/v/stable)](https://packagist.org/packages/interaction-design-foundation/nova-html-code-field)
[![Total Downloads](https://poser.pugx.org/interaction-design-foundation/nova-html-code-field/downloads)](https://packagist.org/packages/interaction-design-foundation/nova-html-code-field)

![image](https://github.com/InteractionDesignFoundation/nova-html-code-field/blob/main/resources/img/demo-800x280@8.gif)


## ToDo

1. Add HTML validator (https://www.npmjs.com/package/html-validator)
1. Add toolbar
1. Optimize a preview: re-render only changed node

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require interaction-design-foundation/nova-html-code-field
```

## Usage

```php
public function fields()
{
    return [ 
        HtmlCode::make('HTML content'),
     ];
}
```


### Options

 - `->styles(array array $stylesUrls)`:  optional, you can inject your custom css files.
 - `->previewTemplate(string | \Closure $template)`: optional, wrap editable code to have even better preview.

Full example:
```php
HtmlCode::make('HTML content')
    ->styles([asset(mix('css/app.css'))]),
    ->previewTemplate('<section class="panel">%CODE%<section>')
```

### Changelog

Please see [Releases](https://github.com/InteractionDesignFoundation/nova-unlayer-field/releases) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Compiling Assets

```bash
# Compile and minify your assets:
npm run prod

# Compile your assets for local development:
npm run dev

# Run the NPM "watch" command to auto-compile your assets when they are changed:
npm run watch
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
