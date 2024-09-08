<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\MultiStaticSelectSection;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(MultiStaticSelectSection::class)]
class MultiStaticSelectSessionTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(MultiStaticSelectSection::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $section = new MultiStaticSelectSection(
            text: 'This is a section',
            placeholder: 'This is a placeholder',
            actionId: 'action-id',
        );

        $result = $section->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('text', $result);
        $this->assertArrayHasKey('accessory', $result);
        $this->assertArrayHasKey('type', $result['accessory']);
        $this->assertArrayHasKey('placeholder', $result['accessory']);
        $this->assertArrayHasKey('options', $result['accessory']);
        $this->assertArrayHasKey('action_id', $result['accessory']);
    }

    #[Test]
    public function it_allows_to_add_option(): void
    {
        $section = new MultiStaticSelectSection(
            text: 'This is a section',
            placeholder: 'This is a placeholder',
            actionId: 'action-id',
        );

        $section->addOption(new Option('Option 1', 'value-1'));

        $this->assertCount(1, $section->jsonSerialize()['accessory']['options']);
    }
}
