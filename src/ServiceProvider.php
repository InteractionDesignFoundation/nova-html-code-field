<?php declare(strict_types=1);

namespace InteractionDesignFoundation\NovaHtmlCodeField;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

final class ServiceProvider extends BaseServiceProvider
{
    /** Bootstrap any application services. */
    public function boot(): void
    {
        Nova::serving(static function (ServingNova $event) {
            Nova::script('html-code-field', __DIR__.'/../dist/js/field.js');
        });
    }
}
