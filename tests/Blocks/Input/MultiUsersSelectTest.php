<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Input\MultiUsersSelect;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(MultiUsersSelect::class)]
class MultiUsersSelectTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(MultiUsersSelect::class);
        $this->assertTrue($reflection->isSubclassOf(\Taboritis\ElegantSlack\Blocks\Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_an_array(): void
    {
        $block = new MultiUsersSelect('placeholder', 'label', 'actionId');
        $result = $block->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('label', $result);
        $this->assertArrayHasKey('placeholder', $result['element']);
        $this->assertArrayHasKey('action_id', $result['element']);
    }
}
