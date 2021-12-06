<?php declare(strict_types=1);

namespace InteractionDesignFoundation\NovaHtmlCodeField\Tests;

use InteractionDesignFoundation\NovaHtmlCodeField\ServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
