<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\PlainTextInput;

#[CoversClass(PlainTextInput::class)]
class PlainTextInputTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(PlainTextInput::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_implements_json_serialize(): void
    {
        $reflection = new \ReflectionClass(PlainTextInput::class);
        $this->assertTrue($reflection->hasMethod('jsonSerialize'));
    }

    #[Test]
    public function it_returns_an_array(): void
    {
        $plainTextInput = new PlainTextInput('label', 'actionId');
        $result = $plainTextInput->jsonSerialize();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('label', $result);
    }
}
