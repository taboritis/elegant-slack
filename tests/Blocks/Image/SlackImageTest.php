<?php

declare(strict_types=1);

namespace Tests\Blocks\Image;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Image\SlackImage;

#[CoversClass(SlackImage::class)]
class SlackImageTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(SlackImage::class);

        $this->assertTrue($reflection->isSubclassOf(\Taboritis\ElegantSlack\Blocks\Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $url = 'https://example.com/image.png';
        $altText = 'Example Image';
        $slackImage = new SlackImage($url, $altText);

        $expected = [
            'type' => 'image',
            'slack_file' => [
                'url' => $url,
            ],
            'alt_text' => $altText,
        ];

        $this->assertSame($expected, $slackImage->jsonSerialize());
    }
}
