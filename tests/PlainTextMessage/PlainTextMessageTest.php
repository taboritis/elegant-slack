<?php

declare(strict_types=1);

namespace Tests\PlainTextMessage;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlackMessages\PlainTextMessage;

#[CoversClass(PlainTextMessage::class)]
class PlainTextMessageTest extends TestCase
{
    private PlainTextMessage $message;

    protected function setUp(): void
    {
        parent::setUp();
        $this->message = new PlainTextMessage();
    }

    #[Test]
    public function it_implements_stringable(): void
    {
        $this->assertInstanceOf(\Stringable::class, $this->message);
    }

    #[Test]
    public function it_cannot_be_converted_to_string_if_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->message->__toString();
    }

    #[Test]
    public function it_allows_to_add_a_string(): void
    {
        $this->message->add('Hello, world!');

        $this->assertSame('Hello, world!', $this->message->__toString());
    }

    #[Test]
    public function it_allows_to_add_multiple_texts_in_chain(): void
    {
        $this->message->add('Hello, ')->add('world!');

        $this->assertSame('Hello, world!', $this->message->__toString());
    }
}
