<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\FormattedText;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Italic;

#[CoversClass(Italic::class)]
class ItalicTest extends TestCase
{
    #[Test]
    public function it_implements_formatted_text(): void
    {
        $reflection = new \ReflectionClass(Italic::class);

        $this->assertTrue($reflection->implementsInterface(FormattedText::class));
    }
}
