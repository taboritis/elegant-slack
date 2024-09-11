<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Input\MultiStaticSelect;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(MultiStaticSelect::class)]
class MultiStaticSelectTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(MultiStaticSelect::class);
        $this->assertTrue($reflection->isSubclassOf(\Taboritis\ElegantSlack\Blocks\Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $block = new MultiStaticSelect('placeholder', 'label', 'actionId');
        $result = $block->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('label', $result);
        $this->assertArrayHasKey('placeholder', $result['element']);
        $this->assertArrayHasKey('options', $result['element']);
        $this->assertArrayHasKey('action_id', $result['element']);
    }

    #[Test]
    public function it_allows_to_add_an_option(): void
    {
        $block = new MultiStaticSelect('placeholder', 'label', 'actionId');
        $block
            ->addOption(new Option('option1', 'value1'))
            ->addOption(new Option('option2', 'value2'));

        $result = $block->jsonSerialize();

        $this->assertCount(2, $result['element']['options']);
    }
}
