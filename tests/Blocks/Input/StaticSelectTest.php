<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\StaticSelect;

#[CoversClass(StaticSelect::class)]
class StaticSelectTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(StaticSelect::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_an_array(): void
    {
        $staticSelect = new StaticSelect('placeholder', 'label', 'actionId');
        $this->assertIsArray($staticSelect->jsonSerialize());

        $this->assertArrayHasKey('type', $staticSelect->jsonSerialize());
        $this->assertArrayHasKey('element', $staticSelect->jsonSerialize());
        $this->assertArrayHasKey('label', $staticSelect->jsonSerialize());
        $this->assertArrayHasKey('type', $staticSelect->jsonSerialize()['element']);
        $this->assertArrayHasKey('action_id', $staticSelect->jsonSerialize()['element']);
    }
}
