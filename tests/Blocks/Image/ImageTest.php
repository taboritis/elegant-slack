<?php

declare(strict_types=1);

namespace Tests\Blocks\Image;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Image\Image;

#[CoversClass(Image::class)]
class ImageTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Image::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $image = new Image('https://example.com/image.jpg', 'alt text');

        $this->assertArrayHasKey('type', $image->jsonSerialize());
        $this->assertArrayHasKey('alt_text', $image->jsonSerialize());
    }
}
