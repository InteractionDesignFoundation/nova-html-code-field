<?php declare(strict_types=1);

namespace InteractionDesignFoundation\NovaHtmlCodeField\Tests;

use InteractionDesignFoundation\HtmlCard\MarkdownConverter;
use Illuminate\Support\Facades\App;
use InteractionDesignFoundation\NovaHtmlCodeField\HtmlCode;

final class HtmlCodeTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_if_invlid_template_used(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $field = new HtmlCode('any_name');

        $field->previewTemplate('<p></p>');
    }
}
