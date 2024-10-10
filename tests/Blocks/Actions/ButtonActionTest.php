<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\Button;
use Taboritis\ElegantSlack\Blocks\Block;

#[CoversClass(Button::class)]
class ButtonActionTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Button::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_is_an_array_with_keys(): void
    {
        $button = new Button('Click me', 'action_id', 'value');
        $this->assertArrayHasKey('type', $button->jsonSerialize());
        $this->assertArrayHasKey('text', $button->jsonSerialize());
        $this->assertArrayHasKey('action_id', $button->jsonSerialize());
        $this->assertArrayHasKey('value', $button->jsonSerialize());
    }
}
