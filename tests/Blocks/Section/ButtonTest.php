<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlackMessages\Blocks\Block;
use Taboritis\ElegantSlackMessages\Blocks\Section\Button;

#[CoversClass(Button::class)]
class ButtonTest extends TestCase
{
    private Button $button;

    protected function setUp(): void
    {
        parent::setUp();
        $this->button = new Button(
            section: 'This is section around the button',
            buttonText: 'button text',
            value: 'value',
            actionId: 'actionId'
        );
    }

    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, $this->button);
    }

    #[Test]
    public function it_needs_two_parts_to_construct(): void
    {
        $this->assertIsArray($this->button->jsonSerialize());
    }
}
