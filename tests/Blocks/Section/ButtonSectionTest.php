<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\ButtonSection;

#[CoversClass(ButtonSection::class)]
class ButtonSectionTest extends TestCase
{
    private ButtonSection $button;

    protected function setUp(): void
    {
        parent::setUp();
        $this->button = new ButtonSection(
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
