<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\ImageSection;

#[CoversClass(ImageSection::class)]
class ImageTest extends TestCase
{
    private ImageSection $image;

    protected function setUp(): void
    {
        parent::setUp();
        $this->image = new ImageSection(
            text: 'This is an image',
            imageUrl: 'https://example.com/image.jpg',
            altText: 'An image'
        );
    }

    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, $this->image);
    }

    #[Test]
    public function it_can_be_rendered_to_image_section(): void
    {
        $imageArray = $this->image->jsonSerialize();

        $this->assertArrayHasKey('type', $imageArray);
        $this->assertArrayHasKey('text', $imageArray);
        $this->assertArrayHasKey('accessory', $imageArray);
        $this->assertArrayHasKey('type', $imageArray['accessory']);
        $this->assertArrayHasKey('image_url', $imageArray['accessory']);
        $this->assertArrayHasKey('alt_text', $imageArray['accessory']);
    }
}
