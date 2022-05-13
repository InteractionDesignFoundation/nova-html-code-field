# Nova HTML code Field

[![Latest Stable Version](https://poser.pugx.org/interaction-design-foundation/nova-html-code-field/v/stable)](https://packagist.org/packages/interaction-design-foundation/nova-html-code-field)
[![Total Downloads](https://poser.pugx.org/interaction-design-foundation/nova-html-code-field/downloads)](https://packagist.org/packages/interaction-design-foundation/nova-html-code-field)

![image](https://user-images.githubusercontent.com/5278175/144928019-c295d08c-d8cc-412f-90c1-b94a83aa63a7.png)


Sometimes you need an option to write a raw HTML and have a real-time preview for it.
This package provides such ability. Under the hood this package uses iframe for HTML code your write,
so Nova styles will not leak to the preview. Additionally, you can provide URLs to your custom CSS file
and thus your HTML preview will be very close to the final result.

![image](https://github.com/InteractionDesignFoundation/nova-html-code-field/blob/main/resources/img/demo-800x280@8.gif)


## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require interaction-design-foundation/nova-html-code-field
```

## Usage

```php
use InteractionDesignFoundation\NovaHtmlCodeField\HtmlCode;

public function fields()
{
    return [
        HtmlCode::make('HTML content', 'content'),
     ];
}
```


### Options

Full example:
```php
HtmlCode::make('HTML content', 'content')
    ->styles([asset(mix('css/app.css'))]), // optional, you can inject your custom CSS files to have more realistic preview.
    ->previewTemplate('<section class="panel">%CODE%</section>') // optional, wrap editable code to have even better preview (good together with custom styles).
```


### Changelog

Please see [Releases](https://github.com/InteractionDesignFoundation/nova-unlayer-field/releases) for more information on what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.


## ToDo

1. Add toolbar
1. Add HTML validator (https://www.npmjs.com/package/html-validator)
1. Optimize a preview: re-render only changed node

