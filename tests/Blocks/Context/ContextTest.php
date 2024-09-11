<?php

declare(strict_types=1);

namespace Tests\Blocks\Context;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Context\Context;
use Taboritis\ElegantSlack\Support\Image;

#[CoversClass(Context::class)]
class ContextTest extends TestCase
{
    private Context $context;

    protected function setUp(): void
    {
        parent::setUp();
        $this->context = new Context();
    }

    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Context::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $result = $this->context->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('elements', $result);
    }

    #[Test]
    public function it_allows_to_add_plain_text(): void
    {
        $result = $this->context->addText('Hello, World!');

        $this->assertInstanceOf(Context::class, $result);

        $this->assertEquals('plain_text', $result->jsonSerialize()['elements'][0]['type']);
    }

    #[Test]
    public function it_allows_to_add_mrkdwn(): void
    {
        $result = $this->context->addMrkdwn('Hello, *World!*');

        $this->assertInstanceOf(Context::class, $result);

        $this->assertEquals('mrkdwn', $result->jsonSerialize()['elements'][0]['type']);
    }

    #[Test]
    public function it_allows_to_add_an_image(): void
    {
        $result = $this->context->addImage(new Image('https://example.com/image.jpg', 'alt text'));

        $this->assertInstanceOf(Context::class, $result);
        $this->assertEquals('image', $result->jsonSerialize()['elements'][0]['type']);
    }
}
