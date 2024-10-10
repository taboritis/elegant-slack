<?php

declare(strict_types=1);

namespace Tests\Blocks\Header;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Header\Header;

#[CoversClass(Header::class)]
class HeaderTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Header::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function json_serialize_returns_correct_structure(): void
    {
        $header = new Header('Test Header');
        $expected = [
            'type' => 'header',
            'text' => [
                'type' => 'plain_text',
                'text' => 'Test Header',
                'emoji' => true,
            ],
        ];

        $this->assertSame($expected, $header->jsonSerialize());
    }

    #[Test]
    public function json_serialize_handles_emoji_false(): void
    {
        $header = new Header('Test Header', false);
        $expected = [
            'type' => 'header',
            'text' => [
                'type' => 'plain_text',
                'text' => 'Test Header',
                'emoji' => false,
            ],
        ];

        $this->assertSame($expected, $header->jsonSerialize());
    }

    #[Test]
    public function json_serialize_handles_empty_text(): void
    {
        $header = new Header('');
        $expected = [
            'type' => 'header',
            'text' => [
                'type' => 'plain_text',
                'text' => '',
                'emoji' => true,
            ],
        ];

        $this->assertSame($expected, $header->jsonSerialize());
    }
}
