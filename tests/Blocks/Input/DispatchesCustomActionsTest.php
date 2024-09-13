<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\DispatchesCustomActions;

#[CoversClass(DispatchesCustomActions::class)]
class DispatchesCustomActionsTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(DispatchesCustomActions::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $block = new DispatchesCustomActions('Label', 'action-id');
        $result = $block->jsonSerialize();

        $this->assertArrayHasKey('dispatch_action', $result);
        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('type', $result['element']);
        $this->assertArrayHasKey('dispatch_action_config', $result['element']);
        $this->assertArrayHasKey('trigger_actions_on', $result['element']['dispatch_action_config']);
        $this->assertArrayHasKey('label', $result);
    }
}
