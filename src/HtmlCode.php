<?php declare(strict_types=1);

namespace InteractionDesignFoundation\NovaHtmlCodeField;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Field;

class HtmlCode extends Field
{
    /**
     * The field's component.
     * @var string
     */
    public $component = 'html-code-field';

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
     * @param string|\Closure $template
     * @return $this
     */
    public function previewTemplate($template): self
    {
        if (is_callable($template)) {
            $template = $template();
        }

        if (!Str::contains($template, '%CODE%')) {
            throw new \InvalidArgumentException('%CODE% placeholder is not found in your template. Please add it.');
        }

        return $this->withMeta([
            'template' => $template,
        ]);
    }

    /**Inject styles to template */
    public function styles(array $stylesUrls): self
    {
        return $this->withMeta([
            'styles' => $stylesUrls,
        ]);
    }
}
