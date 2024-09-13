<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use JsonSerializable;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\Bold;
use Taboritis\ElegantSlack\Blocks\RichText\RichTextList;

#[CoversClass(RichTextList::class)]
class RichTextListTest extends TestCase
{
    #[Test]
    public function it_implements_formatted_text(): void
    {
        $reflection = new \ReflectionClass(RichTextList::class);

        $this->assertTrue($reflection->isSubclassOf(JsonSerializable::class));
    }

    #[Test]
    public function it_allows_set_style(): void
    {
        $style = fake()->word();
        $richTextList = new RichTextList($style);

        $this->assertSame($style, $richTextList->jsonSerialize()['elements']['style']);
    }

    #[Test]
    public function it_allows_to_add_an_element(): void
    {
        $richTextList = new RichTextList(fake()->word());
        $richTextList->addElement(new Bold('Hi world'));

        $elements = $richTextList->jsonSerialize()['elements']['elements'];

        $this->assertCount(1, $elements);
        $this->assertSame('Hi world', $elements[0]['elements'][0]['text']);
        $this->assertTrue($elements[0]['elements'][0]['style']['bold']);
    }

    #[Test]
    public function it_allows_to_add_a_string_as_element(): void
    {
        $richTextList = new RichTextList(fake()->word());
        $richTextList->addElement('Hi world');

        $elements = $richTextList->jsonSerialize()['elements']['elements'];

        $this->assertCount(1, $elements);
        $this->assertSame('Hi world', $elements[0]['elements'][0]['text']);
        $this->assertArrayNotHasKey('style', $elements[0]['elements'][0]);
    }
}
