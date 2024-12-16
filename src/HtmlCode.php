<?php declare(strict_types=1);

namespace InteractionDesignFoundation\NovaHtmlCodeField;

use Laravel\Nova\Fields\Textarea;

/** @phpcs:disable SlevomatCodingStandard.Classes.RequireAbstractOrFinal */
class HtmlCode extends Textarea
{
    /**
     * The field's component.
     * @var string
     */
    public $component = 'nova-html-code-field';

    /**
     * Indicates if the element should be shown on the index view.
     * @var bool
     */
    public $showOnIndex = false;

    /**
     * Indicates if the field label and form element should sit on top of each other.
     * @var bool
     */
    public $stacked = true;

    /**
     * Set default HTML code (template).
     * In order to instruct package where to inject generated HTML, please provide a special marker: "%CODE%"
     * Example: <section>%CODE%</section>
     * @param string|\Closure():string $template
     */
    public function previewTemplate($template): self
    {
        if (is_callable($template)) {
            $template = $template();
        }

        if (!str_contains($template, '%CODE%')) {
            throw new \InvalidArgumentException('%CODE% placeholder is not found in your template. Please add it.');
        }

        return $this->withMeta([
            'template' => $template,
        ]);
    }

    /**
     * Inject styles to template
     * @param list<string> $stylesUrls
     */
    final public function styles(array $stylesUrls): self
    {
        return $this->withMeta([
            'styles' => $stylesUrls,
        ]);
    }
}
