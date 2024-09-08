<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\SlackImage;

#[CoversClass(SlackImage::class)]
class SlackImageTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(SlackImage::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $section = new SlackImage(
            text: 'Hello, world!',
            imageUrl: 'https://example.com/image.jpg',
            altText: 'alt text'
        );

        $this->assertArrayHasKey('type', $section->jsonSerialize());
        $this->assertArrayHasKey('text', $section->jsonSerialize());
        $this->assertArrayHasKey('accessory', $section->jsonSerialize());
        $this->assertArrayHasKey('type', $section->jsonSerialize()['accessory']);
        $this->assertArrayHasKey('slack_file', $section->jsonSerialize()['accessory']);
        $this->assertArrayHasKey('url', $section->jsonSerialize()['accessory']['slack_file']);
        $this->assertArrayHasKey('alt_text', $section->jsonSerialize()['accessory']);
    }
}
