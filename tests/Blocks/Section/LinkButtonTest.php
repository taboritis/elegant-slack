<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\LinkButtonSection;

#[CoversClass(LinkButtonSection::class)]
class LinkButtonTest extends \PHPUnit\Framework\TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(LinkButtonSection::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_rendered_to_link_button_array(): void
    {
        $linkButton = new LinkButtonSection(
            text: 'This is a link button',
            buttonText: "Click me",
            url: 'https://example.com',
            value: 'link_button',
            actionId: 'link_button'
        );

        $linkButtonArray = $linkButton->jsonSerialize();

        $this->assertArrayHasKey('type', $linkButtonArray);
        $this->assertArrayHasKey('text', $linkButtonArray);
        $this->assertArrayHasKey('accessory', $linkButtonArray);
        $this->assertArrayHasKey('type', $linkButtonArray['accessory']);
        $this->assertArrayHasKey('text', $linkButtonArray['accessory']);
        $this->assertArrayHasKey('url', $linkButtonArray['accessory']);
        $this->assertArrayHasKey('value', $linkButtonArray['accessory']);
        $this->assertArrayHasKey('action_id', $linkButtonArray['accessory']);
    }
}
