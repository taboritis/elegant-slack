<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Input\DispatchesActions;

#[CoversClass(DispatchesActions::class)]
class DispatchesActionsTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(DispatchesActions::class);

        $this->assertTrue($reflection->isSubclassOf(\Taboritis\ElegantSlack\Blocks\Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $block = new DispatchesActions(
            'Label',
            'action-01'
        );

        $result = $block->jsonSerialize();

        $this->assertArrayHasKey('dispatch_action', $result);
        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('type', $result['element']);
        $this->assertArrayHasKey('action_id', $result['element']);
        $this->assertArrayHasKey('label', $result);
    }
}
