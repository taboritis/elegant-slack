<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\OverflowSection;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(OverflowSection::class)]
class OverflowSectionTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(OverflowSection::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_allows_add_an_option(): void
    {
        $section = new OverflowSection(
            text: 'This is a section',
            actionId: 'overflow-action'
        );

        $section->addOption(new Option('Option 1', 'option-1'));

        $this->assertCount(1, $section->jsonSerialize()['accessory']['options']);
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $section = new OverflowSection(
            text: 'This is a section',
            actionId: 'overflow-action'
        );

        $result = $section->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('text', $result);
        $this->assertArrayHasKey('accessory', $result);
        $this->assertArrayHasKey('type', $result['accessory']);
        $this->assertArrayHasKey('options', $result['accessory']);
        $this->assertArrayHasKey('action_id', $result['accessory']);
    }
}
