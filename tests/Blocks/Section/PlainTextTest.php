<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlackMessages\Blocks\Block;
use Taboritis\ElegantSlackMessages\Blocks\Section\PlainText;

#[CoversClass(PlainText::class)]
class PlainTextTest extends TestCase
{
    #[Test]
    public function it_extends_block(): void
    {
        $this->assertInstanceOf(Block::class, new PlainText(fake()->sentence()));
    }

    #[Test]
    public function it_needs_a_text(): void
    {
        $phrase = fake()->sentence();
        $block = new PlainText($phrase);

        $result = $block->jsonSerialize();

        $this->assertIsArray($result);

        $this->assertEquals('section', $result['type']);
        $this->assertEquals($phrase, $result['text']['text']);
    }

    #[Test]
    public function it_has_an_emoji(): void
    {
        $phrase = fake()->sentence();
        $block = new PlainText($phrase);

        $result = $block->jsonSerialize();

        $this->assertTrue($result['text']['emoji']);
    }

    #[Test]
    public function emoji_can_be_disabled(): void
    {
        $phrase = fake()->sentence();
        $block = new PlainText($phrase, emoji: false);

        $result = $block->jsonSerialize();

        $this->assertFalse($result['text']['emoji']);
    }

    #[Test]
    public function it_is_stringable(): void
    {
        $phrase = fake()->sentence();
        $block = new PlainText($phrase, emoji: false);

        $this->assertJson((string)$block);
    }

    #[Test]
    public function it_cannot_be_empty(): void
    {
        $this->expectException(\RuntimeException::class);

        (new PlainText(''))->__toString();
    }
}
