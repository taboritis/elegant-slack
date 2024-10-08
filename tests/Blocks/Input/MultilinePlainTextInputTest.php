<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\MultilinePlainTextInput;

#[CoversClass(MultilinePlainTextInput::class)]
class MultilinePlainTextInputTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(MultilinePlainTextInput::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $block = new MultilinePlainTextInput('Label', 'action-id');

        $result = $block->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('type', $result['element']);
        $this->assertArrayHasKey('multiline', $result['element']);
        $this->assertArrayHasKey('action_id', $result['element']);
        $this->assertArrayHasKey('label', $result);
    }
}
