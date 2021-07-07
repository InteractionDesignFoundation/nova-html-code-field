<?php declare(strict_types=1);

namespace InteractionDesignFoundation\NovaHtmlCodeField;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        Nova::serving(static function (ServingNova $event) {
            Nova::script('html-code-field', __DIR__.'/../dist/js/field.js');
        });
    }
}
