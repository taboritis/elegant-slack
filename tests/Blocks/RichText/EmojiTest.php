<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Emoji;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\FormattedText;

#[CoversClass(Emoji::class)]
class EmojiTest extends TestCase
{
    #[Test]
    public function it_implements_formatted_text(): void
    {
        $reflection = new \ReflectionClass(Emoji::class);

        $this->assertTrue($reflection->implementsInterface(FormattedText::class));
    }
}
