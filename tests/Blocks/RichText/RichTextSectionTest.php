<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Bold;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Emoji;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Italic;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Strikethrough;
use Taboritis\ElegantSlack\Blocks\RichText\RichTextSection;

#[CoversClass(RichTextSection::class)]
class RichTextSectionTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(RichTextSection::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_contains_specific_keys(): void
    {
        $richTextSection = new RichTextSection();

        $this->assertIsArray($richTextSection->jsonSerialize());

        $this->assertEquals('rich_text', $richTextSection->jsonSerialize()['type']);
        $this->assertArrayHasKey('elements', $richTextSection->jsonSerialize());
        $this->assertEquals('rich_text_section', $richTextSection->jsonSerialize()['elements'][0]['type']);
        $this->assertArrayHasKey('elements', $richTextSection->jsonSerialize()['elements'][0]);
    }

    #[Test]
    public function it_allows_add_a_basic_text(): void
    {
        $richTextSection = new RichTextSection();

        $richTextSection->addText('Hello, world!');

        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertArrayNotHasKey('style', $result['elements'][0]['elements'][0]);
    }

    #[Test]
    public function it_can_add_bold_text(): void
    {
        $richTextSection = new RichTextSection();

        $richTextSection->addBold('Hello, world!');

        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertSame(true, $result['elements'][0]['elements'][0]['style']['bold']);
    }

    #[Test]
    public function it_can_add_italic_text(): void
    {
        $richTextSection = new RichTextSection();

        $richTextSection->addItalic('Hello, world!');

        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertSame(true, $result['elements'][0]['elements'][0]['style']['italic']);
    }

    #[Test]
    public function it_can_add_an_strikethrough_text(): void
    {
        $richTextSection = new RichTextSection();

        $richTextSection->addStrikethrough('Hello, world!');

        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertSame(true, $result['elements'][0]['elements'][0]['style']['strikethrough']);
    }

    #[Test]
    public function it_can_add_an_emoji_text(): void
    {
        $richTextSection = new RichTextSection();

        $richTextSection->addEmoji('basketball');

        $result = $richTextSection->jsonSerialize();

        $this->assertSame('emoji', $result['elements'][0]['elements'][0]['type']);
        $this->assertSame('basketball', $result['elements'][0]['elements'][0]['name']);
    }

    #[Test]
    public function it_can_add_a_bold(): void
    {
        $richTextSection = new RichTextSection();
        $richTextSection->addFormattedText(new Bold('Hello, world!'));
        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertSame(true, $result['elements'][0]['elements'][0]['style']['bold']);
    }

    #[Test]
    public function it_can_add_an_italic(): void
    {
        $richTextSection = new RichTextSection();
        $richTextSection->addFormattedText(new Italic('Hello, world!'));
        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertSame(true, $result['elements'][0]['elements'][0]['style']['italic']);
    }

    #[Test]
    public function it_can_add_a_strikethrough(): void
    {
        $richTextSection = new RichTextSection();
        $richTextSection->addFormattedText(new Strikethrough('Hello, world!'));
        $result = $richTextSection->jsonSerialize();

        $this->assertSame('Hello, world!', $result['elements'][0]['elements'][0]['text']);
        $this->assertSame(true, $result['elements'][0]['elements'][0]['style']['strike']);
    }

    #[Test]
    public function it_can_add_an_emoji(): void
    {
        $richTextSection = new RichTextSection();
        $richTextSection->addFormattedText(new Emoji('basketball'));
        $result = $richTextSection->jsonSerialize();

        $this->assertSame('emoji', $result['elements'][0]['elements'][0]['type']);
        $this->assertSame('basketball', $result['elements'][0]['elements'][0]['name']);
    }
}
