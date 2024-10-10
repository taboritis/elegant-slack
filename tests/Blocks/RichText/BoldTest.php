<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Bold;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\FormattedText;
use Taboritis\ElegantSlack\Support\RichTextElement;

#[CoversClass(Bold::class)]
class BoldTest extends TestCase
{
    #[Test]
    public function it_implements_formatted_text(): void
    {
        $reflection = new \ReflectionClass(Bold::class);

        $this->assertTrue($reflection->implementsInterface(FormattedText::class));
    }
}
